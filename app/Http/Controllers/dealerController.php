<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\dealer;
use App\Models\Contract;
use App\Models\customer;
use App\Models\customer_relatives;
use App\Models\customer_bank;
use App\Models\customer_income;
use App\Models\contract_product;
use App\Models\contract_type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\ticket_category;
use App\Models\dealer_ticket;
use App\Models\dealer_notes;
use App\Models\dealer_docs;
use App\Models\dealer_ticket_docs;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordRecoverMail;
use App\Mail\newAccountMail;
use App\Models\invoices;
use App\Models\dealer_invoices;
use App\Models\dealer_bank;

class dealerController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/dealer');
    }
    public function index()
    {
        return view('dealer/index');
    }
    public function login(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required', 
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }

        $user = dealer::where('email',$req->email)->first();

        if($user)
        {
            if($user->is_verified == 1)
            {
                if(Auth::guard('dealer')->attempt(['email'=>$req->email,'password'=>$req->password]))
                {
                    ///////////////////take to dashboard
                    $profile_status=$this->calculate_profile();
                    session(['profile_status'=>$profile_status]);
                    return redirect("dealer/dashboard");
                }
                else
                {
                    //////////////////////error msg password not correct
                    return redirect()->back()->with('error_msg', "Incorrect Password");
                }
            }
            else
            {
                $token = Str::random(32);
                $userId=$user->id;
                $updatetoken=dealer::where('id',$userId)->update([
                    'token'=>$token,
                ]);
                $link=$token;
                $resend=$userId;
                ////////////////take to verify email with compact $user
                return view("dealer/verification",compact("link","resend"));
            }
        }
        else
        {
            /////////////////////user not found wrong email
            return redirect()->back()->with('error_msg', "Incorrect Email");
        }        
    }
    public function register()
    {
        return view('dealer/register');
    }
    public function createdealer(Request $req)
    {

        $validator = Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required',
            'cpass'=>'required',
            'shopname'=>'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }
        if($req->password!=$req->cpass){
            return redirect()->back()->with('error_msg','Password and Confirm password are not same');
        }else{
            $user_exists=dealer::where('email',$req->email)->get();
            if(count($user_exists)>0){
                return redirect()->back()->with('error_msg',"User already Exists");
            }else{

                $token = Str::random(32);
                $create=dealer::create([
                    'shop_name'=>$req->shopname,
                    'password'=>Hash::make($req->password),
                    'email'=>$req->email,
                    'token'=>$token
                ]);
                if($create){
                    // session()->put('userid',$create->id);
                    $userId=$create->id;
                    $link=$token;
                    $resend=$userId;
                    return view('dealer/verification',compact(['link','resend']));
                }else{
                    return redirect()->back()->with('error_msg',"Unable to create Account");
                }
            }
        }

        // return view('dealer/register');
    }

    public function verification()
    {
        return view('dealer/verification');
    }
    public function verify($token)
    {
        // dd($token);
        $user=dealer::where("token",$token)->first();
        if($user!==null){
            $set_verified=dealer::where("token",$token)->update([
                'token'=>null,
                'is_verified'=>'1',
            ]);
            if($set_verified){
                return redirect('/dealer')->with('success_msg','Email Verified Successfully');
            }else{
                return redirect('/dealer')->with('error_msg',' Can Not Verify Email ');
            }
            
        }else{
            
            return abort(403,'Token Expired');
        }
        
    }
    public function resendVerification($id)
    {
        $token = Str::random(32);
        // $userId=Auth::guard('dealer')->user()->id;

        $updatetoken=dealer::where('id',$id)->update([
            'token'=>$token,
        ]);

        if($updatetoken){
            $link=$token;
            $resend=$id;
            return view("dealer/verification",compact('link','resend'));
        }else{
            return redirect()->back()->with('error_msg','Unable to send link');
        }
        // return $userId;
        
    }
    public function edit_dealer_info()
    {
        $user_id= Auth::guard('dealer')->user()->id;
        $user= dealer::with('bank')->where('id',$user_id)->first();
        // dd($user);
        return view('dealer/edit_dealer_info',compact('user'));
    }
    public function update_dealer(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'companyname'=>'required',
            'companycontact'=>'required',
            // 'companylogo'=>'required',
            'dealername'=>'required',
            'dealeremail'=>'required|email',
            'ein'=>'required',
            'dealerstreet'=>'required',
            'dealercity'=>'required',
            'dealerstate'=>'required',
            'dealerzip'=>'required',
            'dealercountry'=>'required',
            // 'taxcertificate'=>'required',
            'bank_name'=>'required',
            'account_type'=>'required',
            'account_number'=>'required',
            'card_type'=>'required',
            'card_number'=>'required',
            'card_expiry'=>'required',
            // 'sign'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            // return $req;
            $id=Auth::guard('dealer')->user()->id;
            
            $ein_exist=dealer::where('id','!=',$id)->where('ein',$req->ein)->get();
            
            if(count($ein_exist)>0){
                return redirect()->back()->with('error_msg', "Ein Already Exists");

            }else{

                if($req->companylogo!=null){
                    if(substr($req->companylogo->getMimeType(), 0, 5)=="image"){
                        $customerImage=$req->file('companylogo')->store('dealer_companylogo');
                        $uploadImage=dealer::where('id',$id)->update([
                            'shop_logo'=>$customerImage,
                        ]);
                        if(!$uploadImage){
                            ///return back with error
                            return redirect()->back()->with('error_msg',"Unable to Update Profile Image");
                        }
                    }else{
                        // back with error 
                        return redirect()->back()->with('error_msg',"Profile Picture can only be Image");
                    }
    
                }
                
                if($req->taxcertificate!=null){
                    if(substr($req->taxcertificate->getMimeType(), 0, 5)!="video"){
                        $licenseImage=$req->file('taxcertificate')->store('dealer_tax_picture');
                        $uploadlicense=dealer::where('id',$id)->update([
                            'tax_certificate_doc'=>$licenseImage,
                        ]);
                        if(!$uploadlicense){
                            ///return back with error
                            return redirect()->back()->with('error_msg',"Unable to Update License Image");
                        }
                    }else{
                        // back with error 
                        return redirect()->back()->with('error_msg',"License Copy can only be Image ");
                    }
    
                }
    
                if($req->sign!=null){
                    $update=dealer::where('id',$id)->update([
                        'owner_name'=>$req->dealername, 
                        'shop_name'=>$req->companyname, 
                        'email'=>$req->dealeremail, 
                        'ein'=>$req->ein, 
                        'shop_address'=>$req->dealerstreet, 
                        'shop_city'=>$req->dealercity, 
                        'shop_state'=>$req->dealerstate, 
                        'shop_zip'=>$req->dealerzip, 
                        'shop_country'=>$req->dealercountry,
                        'shop_contact'=>$req->companycontact,
                        'signature'=>$req->sign,
    
                    ]);
                    $delete_dealer_bank_info=dealer_bank::where('dealer_id',$id)->delete();
                    $update_dealer_bank=dealer_bank::create([
    
                        'dealer_id'=>$id, 
                        'bank_name'=>$req->bank_name, 
                        'account_type'=>$req->account_type, 
                        'account_number'=>$req->account_number, 
                        'card_type'=>$req->card_type, 
                        'card_number'=>$req->card_number, 
                        'card_expiry'=>$req->card_expiry,
                    ]);
                   
                }else{
                    $update=dealer::where('id',$id)->update([
                        'owner_name'=>$req->dealername, 
                        'shop_name'=>$req->companyname, 
                        'email'=>$req->dealeremail, 
                        'ein'=>$req->ein, 
                        'shop_address'=>$req->dealerstreet, 
                        'shop_city'=>$req->dealercity, 
                        'shop_state'=>$req->dealerstate, 
                        'shop_zip'=>$req->dealerzip, 
                        'shop_country'=>$req->dealercountry,
                        'shop_contact'=>$req->companycontact,
                        
    
                    ]);
                    $delete_dealer_bank_info=dealer_bank::where('dealer_id',$id)->delete();
                    $update_dealer_bank=dealer_bank::create([
    
                        'dealer_id'=>$id, 
                        'bank_name'=>$req->bank_name, 
                        'account_type'=>$req->account_type, 
                        'account_number'=>$req->account_number, 
                        'card_type'=>$req->card_type, 
                        'card_number'=>$req->card_number, 
                        'card_expiry'=>$req->card_expiry,
                    ]);
                    
                }
        
                if($update){
    
                    // session(['profile_status' => null]);
                    $profile_status=floor($this->calculate_profile());
                    session(['profile_status' => $profile_status]);
                    // dd($profile_status);
                    return redirect()->back()->with('success_msg',"Profile Updated Successfully");
                }else{
                    return redirect()->back()->with('error_msg',"Unable to Update Profile");
                }
            }


        }    
        // return view('dealer/edit_dealer_info');
    }
    public function dealer_info()
    {   $id=Auth::guard('dealer')->user()->id;
        $profile_percentage=$this->calculate_profile();
        // dd($profile_percentage);
        $user= dealer::with('bank')->where('id',$id)->first();
        // dd($user);
        return view('dealer/dealer_info',compact(['user','profile_percentage']));
    }
    public function forget_password()
    {
        return view('dealer/forget_password');
    }
    public function submit_forget_password(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'email'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
        //    return $req->email;
            $get_user=dealer::where('email',$req->email)->first();
            if($get_user!=null){
                $userid=$get_user->id;
                $token = Str::random(32);
                $updatetoken=dealer::where('id',$userid)->update([
                    'token'=>$token,
                ]);
                $url="localhost/lease/dealer/recover_password/".$token;
                $details=[
                    'title'=>"UIG LEASING",
                    'msg'=>"Click the link to change password",
                    'url'=>$url,
                ];
                Mail::to("asadking066@gmail.com")->send(new passwordRecoverMail($details));

                return redirect()->back()->with('success_msg', "We have sended you a link. Check Your Email");
            }else{
                // return "no user found";
                return redirect()->back()->with('error_msg', "Email Dosn't Exist");
            }
        }
        
    }
    public function recover_password($token)
    {
        // dd($token);
        $user=dealer::where('token',$token)->first();
        if($user!=null){

            return view('dealer/recover_password',compact('token'));
        }else{
            return abort(403, 'Link Expired.');
        }
    }
    public function submit_recover_password(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'user_token'=>'required',
            'newpass'=>'required',
            'cpass'=>'required',
            
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{

            if($req->newpass==$req->cpass){
                $update_pass=dealer::where('token',$req->user_token)->update([
                    'password'=>Hash::make($req->newpass),
                ]);
                if($update_pass){
                    $update_pass=dealer::where('token',$req->user_token)->update([
                        'token'=>null,
                    ]);
                    return redirect('/dealer')->with('success_msg', "password updated successfully");
                }else{
                    return redirect()->back()->with('error_msg', "unable to update password");
                }
            }else{
                return redirect()->back()->with('error_msg', "new password and confirm password are not matched");
            }
        }
    }
    public function dashboard()
    {
        $user_id=Auth::guard('dealer')->user()->id;
        $non_contracts=contract::where('contract.status','1')->where('dealer_id',$user_id)->get()->count();
        $ap_contracts=contract::where('contract.status','2')->where('dealer_id',$user_id)->get()->count();
        $rej_contracts=contract::where('contract.status','0')->where('dealer_id',$user_id)->get()->count();
        $pen_tickets=dealer_ticket::where('ticket_status_id','1')->where('dealer_id',$user_id)->get()->count();
        $inpr_tickets=dealer_ticket::where('ticket_status_id','2')->where('dealer_id',$user_id)->get()->count();
        $comp_tickets=dealer_ticket::where('ticket_status_id','3')->where('dealer_id',$user_id)->get()->count();

        return view('dealer/dashboard',compact(['non_contracts','ap_contracts','rej_contracts','pen_tickets','inpr_tickets','comp_tickets']));
    }
    public function add_customer()
    {   
        $contract_type=contract_type::get();
        // $profile_status=$this->calculate_profile();
        return view('dealer/add_customer');
    }
    public function submit_customer(Request $req)
    {
        // dd($req);
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'homephone'=>'required',
            'dob'=>'required',
            'ssn'=>'required',
            'licenseNumber'=>'required',
            'licenseissuedate'=>'required',
            'licenseexpirydate'=>'required',
            'sign'=>'required',
            'street'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required',
            'country'=>'required',
            'homeType'=>'required',
            'relative1name'=>'required',
            'relative1contact'=>'required',
            'relation1'=>'required',
            'relative1city'=>'required',
            'relative1state'=>'required',
            'relative1zip'=>'required',
            'relative2name'=>'required',
            'relative2contact'=>'required',
            'relation2'=>'required',
            'relative2city'=>'required',
            'relative2state'=>'required',
            'relative2zip'=>'required',
            'bankname'=>'required',
            'bankphone'=>'required',
            'bankrout'=>'required',
            'accountType'=>'required',
            'accountnumber'=>'required',
            'accountissuedate'=>'required',
            'cardType'=>'required',
            'cardnumber'=>'required',
            'cardexpiry'=>'required',
            'cardccv'=>'required',
            'bankcity'=>'required',
            'bankstate'=>'required',
            'bankzip'=>'required',
            'employername'=>'required',
            'employercontact'=>'required',
            'employercity'=>'required',
            'employerstate'=>'required',
            'employerzip'=>'required',
            'profession'=>'required',
            'joindate'=>'required',
            'directdeposit'=>'required',
            'income'=>'required',
            'lastpaydate'=>'required',
            'nextpaydate'=>'required',
            'incomemethod'=>'required',
            // 'contracttype'=>'required',
            // 'Paymentmethod'=>'required',
            // 'contractyear'=>'required',
            // 'leaseamount'=>'required',
            // 'contractduration'=>'required',
            // 'productname'=>'required',
            // 'productprice'=>'required',
            // 'productquantity'=>'required',
            // 'invoice'=>'required',
            // 'productdescription'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            // return $req;

            $user_exists=customer::where('email',$req->email)->orwhere('ssn',$req->ssn)->orwhere('ssn',$req->ssn)->get();
            $account_exist=customer_bank::where('account_number',$req->accountnumber)->get();
  
            $card_exist=customer_bank::where('card_number',$req->cardnumber)->get();
            if(count($user_exists)>0){
                return redirect()->back()->with('error_msg',"User already Exists");
            }else if(count($account_exist)>0){
                return redirect()->back()->with('error_msg', "Account Number Already exist");
            }else if(count($card_exist)>0){
                return redirect()->back()->with('error_msg', "Card Number Already exist");
            }else{


                $interest_rate=contract_type::where('id',$req->contracttype)->first();
                // dd();
                $pass = Str::random(8);
                $user_id=Auth::guard('dealer')->user()->id;
//------------------------------------------------------Customer Info-----------------------------------------
                $customer=new customer;
                $customer->name = $req->name;
                $customer->email = $req->email;
                $customer->password = Hash::make($pass);
                $customer->contact = $req->phone;
                $customer->home_contact = $req->homephone;
                $customer->dob = $req->dob;
                $customer->ssn = $req->ssn;
                $customer->drive_license_number = $req->licenseNumber;
                $customer->liscense_issue_date = $req->licenseissuedate;
                $customer->license_expiry = $req->licenseexpirydate;
                $customer->street = $req->street;
                $customer->city = $req->city;
                $customer->state = $req->state;
                $customer->zip = $req->zip;
                $customer->country = $req->country;
                $customer->home_type = $req->homeType;
                // $customer->signature = $req->sign;
                $customer->signature = $req->sign; 
                $customer->save();
    // ------------------------------------------------------relative 1-----------------------------------------
                $customer_id=$customer->id;
                $customer_relative1=customer_relatives::create([
                    'customer_id'=>$customer_id, 
                    'relative_name'=>$req->relative1name,
                    'relative_city'=>$req->relative1city, 
                    'relative_state'=>$req->relative1state, 
                    'relative_zip'=>$req->relative1zip, 
                    'relative_contact'=>$req->relative1contact, 
                    'relationship'=>$req->relation1, 
                ]);
    // -------------------------------------------------------relative 2-----------------------------------------
                $customer_relative2=customer_relatives::create([
                    'customer_id'=>$customer_id, 
                    'relative_name'=>$req->relative2name,
                    'relative_city'=>$req->relative2city, 
                    'relative_state'=>$req->relative2state, 
                    'relative_zip'=>$req->relative2zip, 
                    'relative_contact'=>$req->relative2contact, 
                    'relationship'=>$req->relation2, 
                ]);
    // --------------------------------------------------------customer bank-----------------------------------------
                $customer_bank=customer_bank::create([
                    'customer_id'=>$customer_id, 
                    'bank_name'=>$req->bankname, 
                    'bank_contact'=>$req->bankphone, 
                    'bank_routing'=>$req->bankrout, 
                    'account_type'=>$req->accountType, 
                    'account_number'=>$req->accountnumber, 
                    'account_open_date'=>$req->accountissuedate, 
                    'card_type'=>$req->cardType, 
                    'card_number'=>$req->cardnumber, 
                    'card_expiry'=>$req->cardexpiry, 
                    'card_cvv'=>$req->cardccv, 
                    'bank_city'=>$req->bankcity, 
                    'bank_state'=>$req->bankstate, 
                    'bank_zip'=>$req->bankzip,
                ]);
    
    // ---------------------------------------------------customer income-----------------------------------------
    
                $customer_income=customer_income::create([
                    'customer_id'=>$customer_id, 
                    'employer_name'=>$req->employername,
                    'employer_city'=>$req->employercity, 
                    'employer_state'=>$req->employerstate, 
                    'employer_zip'=>$req->employerzip, 
                    'employer_contact'=>$req->employercontact, 
                    'profession'=>$req->profession, 
                    'join_date'=>$req->joindate, 
                    'direct_desposit'=>$req->directdeposit, 
                    'income'=>$req->income, 
                    'last_pay_date'=>$req->lastpaydate, 
                    'next_pay_date'=>$req->nextpaydate, 
                    'paid_time'=>$req->incomemethod,
                ]);
    
    // --------------------------------------------customer picture-------------------------------------------------
    
                if($req->cimg!=null){
                    if(substr($req->cimg->getMimeType(), 0, 5)=="image"){
                        $customerImage=$req->file('cimg')->store('customer_profile_picture');
                        $uploadImage=customer::where('id',$customer_id)->update([
                            'image'=>$customerImage,
                        ]);
                        if(!$uploadImage){
                            ///return back with error
                            return redirect()->back()->with('error_msg',"Unable to Update Profile Image");
                        }
                    }else{
                        // back with error 
                        return redirect()->back()->with('error_msg',"Profile Picture can only be Image");
                    }
    
                }
    
    // --------------------------------------------customer license Copy-----------------------------------------
                if($req->licensecopy!=null){
                    if(substr($req->licensecopy->getMimeType(), 0, 5)=="image"){
                        $licenseImage=$req->file('licensecopy')->store('customer_license_picture');
                        $uploadlicense=customer::where('id',$customer_id)->update([
                            'license_copy_img'=>$licenseImage,
                        ]);
                        if(!$uploadlicense){
                            ///return back with error
                            return redirect()->back()->with('error_msg',"Unable to Update License Image");
                        }
                    }else{
                        // back with error 
                        return redirect()->back()->with('error_msg',"License Copy can only be Image ");
                    }
    
                }
// -------------------------------------------------------------Contract-----------------------------------------
                // $contract=contract::create([
                //     'dealer_id'=>$user_id, 
                //     'customer_id'=>$customer_id, 
                //     'invoice_number'=>$req->invoice, 
                //     'contract_type_id'=>$req->contracttype, 
                //     'total_years'=>$req->contractyear, 
                //     'months'=>$req->contractyear*12, 
                //     // 'amount'=>$req->leaseamount,
                //     'payment_method'=>$req->Paymentmethod,
                //     'interest_rate'=>$interest_rate['interest_rate'],
                // ]); 
                
// ------------------------------------------------------Contract Products-----------------------------------------
                // $contract_id=$contract->id;
                // $camount=0;
                // foreach($req->productname as $key=>$val){
                //     $name=$req->productname[$key];
                //     $price=$req->productprice[$key];
                //     $quantity=$req->productquantity[$key];
                //     $description=$req->productdescription[$key];
                //     $camount+=$req->productquantity[$key]*$req->productprice[$key];
                //     $contract_product=contract_product::create([
                //         'contract_id'=>$contract_id, 
                //         'product_name'=>$name, 
                //         'product_description'=>$description, 
                //         'product_price'=>$price,
                //     ]);
                // }
                // $update_contract_amount=contract::where('id',$contract_id)->update([
                //     'amount'=>$camount,
                // ]);
                if($customer ){
                    // $dealer_invoice=$this->dealer_invoices($contract_id,$camount,$user_id);
                    // $due_inv=$this->make_due_Invoices($contract_id,$req->contractyear,$req->Paymentmethod,$camount,$interest_rate['interest_rate'],$customer_id);

                    // if($due_inv){
                        $details=[
                            'title'=>"UIG LEASING",
                            'name'=>$req->name,
                            'email'=>$req->email,
                            'password'=>$pass,
                        ];
                        Mail::to($req->email)->send(new newAccountMail($details));
                        return $this->customer_details($customer_id);
                    // }else{
                    //     return redirect()->back()->with('error_msg',"Unable to make invoices");
                    // }
                    // return $this->contract_detail($contract_id);
                }else{
                    return redirect()->back()->with('error_msg', "unable to add Customer");
                }

            }
           
        }

        
    
    }
    public function add_contract_existing_customer()
    {   
        $uid=Auth::guard('dealer')->user()->id;
        $profile_status=$this->calculate_profile();
        $contract_type=contract_type::get();
        $customers=customer::where('is_verified','1')->where('is_bank_verified','1')->get();
        // dd($customers);
        return view('dealer/add_contract_existing_customer',compact(['contract_type','customers','profile_status']));
    }
    public function submit_contract_existing_customer(Request $req)
    {
        // dd($req);s
        $validator = Validator::make($req->all(),[
            'contracttype'=>'required',
            'Paymentmethod'=>'required',
            'contractyear'=>'required',
            // 'leaseamount'=>'required',
            // 'contractduration'=>'required',
            'customer'=>'required',
            'productname'=>'required',
            'productprice'=>'required',
            'productquantity'=>'required',
            'invoice'=>'required',
            'productdescription'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $interest_rate=contract_type::where('id',$req->contracttype)->first();
            $user_id=Auth::guard('dealer')->user()->id;
            $contract=contract::create([
                'dealer_id'=>$user_id, 
                'customer_id'=>$req->customer, 
                'invoice_number'=>$req->invoice, 
                'contract_type_id'=>$req->contracttype, 
                'total_years'=>$req->contractyear, 
                'months'=>$req->contractyear*12, 
                'amount'=>$req->leaseamount,
                'payment_method'=>$req->Paymentmethod,
                'interest_rate'=>$interest_rate['interest_rate'],
            ]);
            if($contract){
                $camount=0;
                $contract_id=$contract->id;
                foreach($req->productname as $key=>$val){
                    $name=$req->productname[$key];
                    $price=$req->productprice[$key];
                    $quantity=$req->productquantity[$key];
                    $description=$req->productdescription[$key];
                    $camount+=$req->productquantity[$key]*$req->productprice[$key];
                    $contract_product=contract_product::create([
                        'contract_id'=>$contract_id, 
                        'product_name'=>$name, 
                        'product_description'=>$description, 
                        'product_price'=>$price,
                    ]);
                }
                $update_contract_amount=contract::where('id',$contract_id)->update([
                    'amount'=>$camount,
                ]);
                if($contract_product){
                    $dealer_invoice=$this->dealer_invoices($contract_id,$camount,$user_id);
                    $due_inv=$this->make_due_Invoices($contract_id,$req->contractyear,$req->Paymentmethod,$camount,$interest_rate['interest_rate'],$req->customer);
                    if($due_inv){
                        return $this->contract_detail($contract_id);
                    }else{
                        return redirect()->back()->with('error_msg',"Unable to make invoices");
                    }
                   
                }else{
                    return redirect()->back()->with('error_msg',"Unable to add contract Products");    
                }
            }else{
                // back with message
                return redirect()->back()->with('error_msg',"Unable to add contract");
            }
        }

    }
    public function create_ticket()
    {
        $ticket_category=ticket_category::all();
        return view('dealer/create_ticket',compact('ticket_category'));
    }
    public function submit_ticket(Request $req)
    {
        
        $validator = Validator::make($req->all(),[
            'subject'=>'required',
            'ticket_type'=>'required',
            'description'=>'required',
            
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            
            $userId=Auth::guard('dealer')->user()->id;
            // return $req->ticket_type;
            // $create=new dealer_ticket;
            //     $create->dealer_id=$userId;
            //     $create->subject=$req->subject;
            //     $create->ticket_category_id=$req->ticket_type;
            //     $create->description=$req->description;
            //     $create->save();
            $create=dealer_ticket::create([
                'dealer_id'=>$userId, 
                'subject'=>$req->subject, 
                'ticket_category_id'=>$req->ticket_type, 
                'description'=>$req->description, 
            ]);
            $ticket_id=$create->id;
            foreach($req->file('file') as $key=>$name){
                $ticketdoc=$req->file('file')[$key]->store('dealer_ticket_docs');
                $add_docs=new dealer_ticket_docs;
                $add_docs->dealer_ticket_id=$ticket_id;
                $add_docs->document=$ticketdoc;
                $add_docs->save();
            }

            if($create){
                //return back with error
                return response()->json([
                    'id' => $create->id,
                ]);
            }else{
                return redirect()->back()->with('error_msg',"Unable to create ticket");
            }
            
        }

        return $req;
    }
    public function upload_ticket_docs(Request $req)
    {   
        // dd($req->ticket_id);
        $validator = Validator::make($req->all(),[
            'ticket_id'=>'required',
            
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $ticketdoc=$req->file('file')->store('dealer_ticket_docs');
            if($ticketdoc){
                $add_docs=new dealer_ticket_docs;
                $add_docs->dealer_ticket_id=$req->ticket_id;
                $add_docs->document=$ticketdoc;
                $add_docs->save();
            }else{
                return redirect()->back()->with('error_msg', "Unable to upload document");
            }
            
        }   
    }

    public function view_detail_ticket($id)
    {   
        $ticket=dealer_ticket::with(['ticket_docs','ticket_type'])->where('id',$id)->first();
        return view('dealer/view_detail_ticket',compact('ticket'));
    }
    public function non_approved_contract()
    {
        $uid=Auth::guard('dealer')->user()->id;
        $contracts=contract::where('dealer_id',$uid)->where('status','1')->orderBy('id','desc')->get();
        return view('dealer/non_approved_contract',compact('contracts'));
    }
    public function approved_contract()
    {
        $uid=Auth::guard('dealer')->user()->id;
        $contracts=contract::where('dealer_id',$uid)->where('status','2')->orderBy('id','desc')->get();
        return view('dealer/approved_contract',compact('contracts'));
    }
    public function rejected_contract()
    {
        $uid=Auth::guard('dealer')->user()->id;
        $contracts=contract::where('dealer_id',$uid)->where('status','0')->orderBy('id','desc')->get();
        return view('dealer/rejected_contract',compact('contracts'));
    }
    public function non_approved_ticket()
    {
        $user_id=Auth::guard('dealer')->user()->id;
        $tickets=dealer_ticket::with('ticket_type')->where('dealer_id',$user_id)->orderBy('id','desc')->get();;
        return view('dealer/non_approved_ticket',compact('tickets'));
    }
    public function approved_ticket()
    {
        return view('dealer/approved_ticket');
    }
    public function completed_ticket()
    {
        return view('dealer/completed_ticket');
    }
    public function rejected_ticket()
    {
        return view('dealer/rejected_ticket');
    }
    
    public function view_customers()
    {   

        $uid=Auth::guard('dealer')->user()->id;
        $customers=contract::with('customer')->where("dealer_id",$uid)->orderBy('id','desc')->get()->unique('customer_id');
        // dd($customers);
        return view('dealer/view_customers',compact('customers'));
    }
    public function customer_details($id)
    {
        $user_id=Auth::guard('dealer')->user()->id;
        $customer=customer::with(['income','relative','bank'])->where('id',$id)->first();
        $contracts=contract::with('contract_type')->where('dealer_id',$user_id)->where('customer_id',$id)->get();
        return view('dealer/customer_details',compact(['customer','contracts']));
    }
    public function change_password()
    {
        return view('dealer/change_password');
    }
    public function submit_change_password(Request $req)
    {
        // dd($req);
        $validator = Validator::make($req->all(),[
            'oldpassword'=>'required',
            'newpass'=>'required',
            'cpass'=>'required',
            
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $user_id=Auth::guard('dealer')->user()->id;
            // Hash::make($req->oldpassword);
            // dd();
            if(Hash::check($req->oldpassword,Auth::guard('dealer')->user()->password)){

                if($req->newpass==$req->cpass){
                    $update_pass=dealer::where('id',$user_id)->update([
                        'password'=>Hash::make($req->newpass),
                    ]);
                    if($update_pass){
                        return redirect()->back()->with('success_msg', "password updated successfully");
                    }else{
                        return redirect()->back()->with('error_msg', "unable to update password");
                    }
                }else{
                    return redirect()->back()->with('error_msg', "new password and confirm password are not matched");
                }
            }else{
                return redirect()->back()->with('error_msg', "inccorrect old password");
            }
        }
    }

    public function contract_detail($id)
    {
        $get_contract=contract::with(['contract_products','contract_type','customer_docs','customer','dealer_docs','employee_docs'])->where('id',$id)->first();
        // dd($get_contract);
        return view('dealer/contract_detail',compact('get_contract'));
    }
    
    public function add_notes()
    {
        return view('dealer/add_notes');
    }
    public function submit_notes(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'title'=>'required',
            'notes'=>'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $user_id=Auth::guard('dealer')->user()->id;
            $create=dealer_notes::create([
                'dealer_id'=>$user_id,
                'notes'=>$req->notes,
                'title'=>$req->title,
            ]);
            
            if($create){
                return redirect()->back()->with('success_msg',"Notes added Successfully");
            }else{
                return redirect()->back()->with('error_msg',"Unable to add Note");
            }
        }
    }

    public function view_notes()
    {
        $user_id=Auth::guard('dealer')->user()->id;
        $notes=dealer_notes::where('dealer_id',$user_id)->orderBy('id','desc')->get();
        return view('dealer/view_notes',compact('notes'));
    }
    public function edit_notes($id)
    {
        $notes=dealer_notes::where("id",$id)->first();
        return view('dealer/edit_notes',compact('notes'));
    }
    public function submit_edit_notes(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'id'=>'required',
            'title'=>'required',
            'notes'=>'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $note_id=$req->id;
            $update=dealer_notes::where('id',$note_id)->update([
                'notes'=>$req->notes,
                'title'=>$req->title,
            ]);
            if($update){
                return redirect()->back()->with('success_msg',"Notes updated successfully");
            }else{
                return redirect()->back()->with('error_msg',"Unable to update note");
            }
        }
    }
    public function mark_as_done_notes($id)
    {
        $update=dealer_notes::where('id',$id)->first();
        $update->status='1';
        $update->save();

        if($update){
           return $this->view_notes();
        }else{
            return redirect()->back()->with('error_msg',"Unable to mark as done");
        }
       
    }

    public function delete_notes($id)
    {
        $delete_note=dealer_notes::where('id',$id)->first();
        $delete_note->delete();
        if($delete_note){
            return $this->view_notes();
         }else{
             return redirect()->back()->with('error_msg',"Unable to mark as done");
         }
      
    }
    public function upload_contract_docs(Request $req)
    {   
        // dd($req->ticket_id);
        $validator = Validator::make($req->all(),[
            'contract_id'=>'required',
            'dealer_id'=>'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $contractdoc=$req->file('file')->store('dealer_docs');
            if($contractdoc){
                $add_docs=new dealer_docs;
                $add_docs->dealer_id=$req->dealer_id;
                $add_docs->contract_id=$req->contract_id;
                $add_docs->document=$contractdoc;
                $add_docs->save();
                // dd($req->ticket_id);
            }else{
                return redirect()->back()->with('error_msg', "Unable to upload document");
            }
            
        }   
    }
    public function calculate_profile()
    {
        $uid=Auth::guard('dealer')->user()->id;
        $profile=dealer::with('bank')->where('id',$uid)->first();
        // dd($profile);
        if ( ! $profile) {
            return 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($profile->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;

        foreach ($profile->toArray() as $key => $value) {
            if ($value !== NULL && $value !== [] && in_array($key, $columns)) {
                $total += $per_column;
            }
            if($key=='token'){
                $total += $per_column;
            }
        }

        if ( $profile['bank']=='') {
            $total1= 0;
        }else{
            $bankcol    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($profile['bank']->toArray()), PREG_GREP_INVERT);
            $per_column1 = 100 / count($bankcol);
            $total1      = 0;

            foreach ($profile['bank']->toArray() as $key => $value) {
                if ($value !== NULL && $value !== [] && in_array($key, $bankcol)) {
                    $total1 += $per_column1;
                }
            }
        }

        $avg= (($total + $total1)/200)*100;
        return floor($avg);
    }
    public function calculate_customer_profile(Request $req)
    {
        $id=$req->id;
        $profile=customer::where('id',$id)->first();
        $cust_info=customer::with(['income','relative','bank'])->where('id',$id)->first();
     
        if ( ! $profile) {
            $total= 0;
        }
        $columns    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($profile->toArray()), PREG_GREP_INVERT);
        $per_column = 100 / count($columns);
        $total      = 0;

        foreach ($profile->toArray() as $key => $value) {
            if ($value !== NULL && $value !== [] && $value !== 0 && in_array($key, $columns) && $key!=='token' && $key!=='home_type') {
                $total += $per_column;
            }
            if($key=='token'){
                $total += $per_column;
            }
            if($key=='home_type'){
                $total += $per_column;
            }
        }

        if ( $cust_info['bank']=='') {
            $total1= 0;
        }else{
            $bankcol    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($cust_info['bank']->toArray()), PREG_GREP_INVERT);
            $per_column1 = 100 / count($bankcol);
            $total1      = 0;

            foreach ($cust_info['bank']->toArray() as $key => $value) {
                if ($value !== NULL && $value !== [] && in_array($key, $bankcol)) {
                    $total1 += $per_column1;
                }
            }
        }
        

        if ( $cust_info['income']=='') {
            $total2= 0;
        }else{
            $incomecol    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($cust_info['income']->toArray()), PREG_GREP_INVERT);
            $per_column2 = 100 / count($incomecol);
            $total2      = 0;

            foreach ($cust_info['income']->toArray() as $key => $value) {
                if ($value !== NULL && $value !== [] && in_array($key, $incomecol)) {
                    $total2 += $per_column2;
                }
            }
        }

        $total3= 0;
        if ( count($cust_info['relative'])==0) {
            $total3= 0;
        }else{
            for($i=0;$i<2;$i++){
                $relativecol    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($cust_info['relative'][$i]->toArray()), PREG_GREP_INVERT);
                $per_column3 = 50 / count($relativecol);
    
                foreach ($cust_info['relative'][$i]->toArray() as $key => $value) {
                    if ($value !== NULL && $value !== [] && in_array($key, $relativecol)) {
                        $total3 += $per_column3;
                    }
                }
            }
        }
        
        


        $avg= (($total + $total1 + $total2 +$total3)/400)*100;


        return $avg;
    }
    public function invoice_detail_page($id)
    {
        $contract_products=contract_product::where('contract_id',$id)->get();
        $contract_customer=contract::with('customer')->where('id',$id)->first();
        return view('dealer/invoice_detail_page',compact(['contract_products','contract_customer']));
    }
    public function view_transaction()
    {
        return view('dealer/view_transaction');
    }
    public function make_due_Invoices($contractId,$duration,$paymentmethod,$amount,$interest_rate,$customer_id)
    {
        // $uid=Auth::guard('customer')->user()->id;
        if($paymentmethod=="Weekly"){
            $amount+=49;
            $am=$this->weekPMT($interest_rate, $duration, $amount);
            $saletax=($am*8.25)/100;
            $saletax=number_format((float)$saletax, 2, '.', '');
            // dd($am." ".$saletax);

            $number_of_Weaks=ceil((365/7)*$duration);
            $max_dates = $number_of_Weaks*7;
            $countDates = 0;
            $sample=0;
            while ($countDates < $max_dates) {
                if($countDates!=0){

                    $NewDate=Date('Y-m-d', strtotime("+".$countDates." days"));
                    $create_invoices=invoices::create([
                        'contract_id'=>$contractId,
                        'amount'=>$am,
                        'customer_id'=>$customer_id,
                        'sales_tax'=>$saletax,
                        'total_amount_to_pay'=>$am+$saletax,
                        'due_date'=>$NewDate,
                    ]);
                    
                    
                }
                $countDates += 7;
            }
            
            if($create_invoices){
                return true;
            }else{
                return false;
            }
            

        }else if($paymentmethod=="Bi weekly"){
            $amount+=49;
            $am=$this->biweekPMT($interest_rate, $duration, $amount);
            $saletax=($am*8.25)/100;
            $saletax=number_format((float)$saletax, 2, '.', '');
            // dd($am." ".$saletax);

            $number_of_Weaks=26*$duration;
            $max_dates = $number_of_Weaks*15;
            $countDates = 0;
            while ($countDates <= $max_dates) {
                if($countDates!=0){

                    $NewDate=Date('Y-m-d', strtotime("+".$countDates." days"));
                    $create_invoices=invoices::create([
                        'contract_id'=>$contractId,
                        'amount'=>$am,
                        'customer_id'=>$customer_id,
                        'sales_tax'=>$saletax,
                        'total_amount_to_pay'=>$am+$saletax,
                        'due_date'=>$NewDate,
                    ]);
                    
                    
                    
                }
                $countDates += 15;
            }
            if($create_invoices){
                return true;
            }else{
                return false;
            }
            
        }else if($paymentmethod=="Monthly"){
            $pv=$amount+49;

            $am=$this->monPMT($interest_rate,$duration,$pv);
            $saletax=($am*8.25)/100;
            $saletax=number_format((float)$saletax, 2, '.', '');
            // dd($am);

            $number_of_Weaks=12*$duration;
            $max_dates = $number_of_Weaks*30;
            $countDates = 0;
            while ($countDates <= $max_dates) {
                if($countDates!=0){

                    $NewDate=Date('Y-m-d', strtotime("+".$countDates." days"));
                    $create_invoices=invoices::create([
                        'contract_id'=>$contractId,
                        'amount'=>$am,
                        'customer_id'=>$customer_id,
                        'sales_tax'=>$saletax,
                        'total_amount_to_pay'=>$am+$saletax,
                        'due_date'=>$NewDate,
                    ]);
                    // echo "$NewDate <br>";
                    
                    
                }
                $countDates += 30;
            }
            if($create_invoices){
                return true;
            }else{
                return false;
            }
           
        }
        return false;
    }
    public function monPMT($apr, $term, $loan)
    {
        $term = $term * 12;
        $apr = $apr / 1200;
        $amount = $apr * -$loan * pow((1 + $apr), $term) / (1 - pow((1 + $apr), $term));
        return number_format((float)$amount, 2, '.', '');//getting only 2 decimals after point
    }
    public function weekPMT($apr, $term, $loan)
    {
        // dd($term);
        $term = $term * 52;
        $apr = $apr/5200;
        $amount = $apr * -$loan * pow((1 + $apr), $term) / (1 - pow((1 + $apr), $term));
        return number_format((float)$amount, 2, '.', '');
    }
    public function biweekPMT($apr, $term, $loan)
    {
        $term = $term * 26;
        $apr = $apr / 2600;
        $amount = $apr * -$loan * pow((1 + $apr), $term) / (1 - pow((1 + $apr), $term));
        return number_format((float)$amount, 2, '.', '');
    }
    public function dealer_invoices($contract_id,$contract_amount,$dealer_id)
    {
        $interest=(($contract_amount*7)/100)+59.4;
        $amount_for_dealer=$contract_amount-$interest;
        $dealer_invoice=dealer_invoices::create([
            'dealer_id'=>$dealer_id,
            'contract_id'=>$contract_id,
            'amount'=>$amount_for_dealer,
            'uig_fee'=>$interest,
            'processing_fee'=>'59.04',
        ]);
        if($dealer_invoice){
            return true;
        }else{
            return false;
        }
    }
    public function dealer_due_invoice()
    {
        $uid=Auth::guard('dealer')->user()->id;
        $invoices=dealer_invoices::with(['dealer','contract.contract_type'])->where('status','0')->where('dealer_id',$uid)->orderBy('id','desc')->get();
        return view('dealer/dealer_due_invoice',compact('invoices'));
    }
    public function dealer_paid_invoice()
    {
        $uid=Auth::guard('dealer')->user()->id;
        $invoices=dealer_invoices::with(['dealer','contract.contract_type'])->where('status','1')->where('dealer_id',$uid)->orderBy('id','desc')->get();
        return view('dealer/dealer_paid_invoice',compact('invoices'));
    }
    public function dealer_invoice_detail($id)
    {
        $invoice=dealer_invoices::with(['dealer','contract.contract_type'])->where('id',$id)->first();
        // dd($invoice);
        return view('dealer/dealer_invoice_detail',compact('invoice'));
    }
}


