<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\customer;
use App\Models\customer_relatives;
use App\Models\customer_bank;
use App\Models\customer_transaction;
use App\Models\customer_income;
use App\Models\Contract;
use App\Models\contract_product;
use App\Models\contract_type;
use App\Models\customer_ticket;
use App\Models\customer_notes;
use App\Models\ticket_category;
use App\Models\customer_ticket_docs;
use App\Models\customer_docs;
use App\Models\dealer_invoices;
use App\Models\dealer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordRecoverMail;
use App\Models\invoices;
class customerController extends Controller
{
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/customer');
    }
    public function index()
    {
        return view('customer/index');
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

        $user = customer::where('email',$req->email)->first();

        if($user)
        {
            if($user->is_verified == 1)
            {
                if(Auth::guard('customer')->attempt(['email'=>$req->email,'password'=>$req->password]))
                {
                    ///////////////////take to dashboard
                    $profile_status=floor($this->calculate_profile());
                    session(['profile_status' => $profile_status]);
                    return redirect("customer/dashboard");
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
                $updatetoken=customer::where('id',$userId)->update([
                    'token'=>$token,
                ]);
                $link=$token;
                $resend=$userId;
                ////////////////take to verify email with compact $user
                return view("customer/verification",compact("link","resend"));
            }
        }
        else
        {
            /////////////////////user not found wrong email
            return redirect()->back()->with('error_msg', "Incorrect Email");
        }        
    }
    public function createCustomer(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'email'=>'required|email',
            'password'=>'required',
            'cpass'=>'required',
            'username'=>'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }
        if($req->password!=$req->cpass){
            return redirect()->back()->with('error_msg','Password and Confirm password are not same');
        }else{
            $user_exists=customer::where('email',$req->email)->get();
            if(count($user_exists)>0){
                return redirect()->back()->with('error_msg',"User already Exists");
            }else{
                $token = Str::random(32);
                $create=customer::create([
                    'name'=>$req->username,
                    'password'=>Hash::make($req->password),
                    'email'=>$req->email,
                    'token'=>$token
                ]);
                if($create){
                    $userId=$create->id;
                    $link=$token;
                    $resend=$userId;
                    // session()->put('userid',$create->id);
                    return view('customer/verification',compact('link','resend'));
                }else{
                    return redirect()->back()->with('error_msg',"Unable to create Account");
                }
            }

            
        }

    }
    public function register()
    {
        return view('customer/register');
    }
    public function resendVerification($id)
    {
        $token = Str::random(32);
        // $userId=Auth::guard('customer')->user()->id;

        $updatetoken=customer::where('id',$id)->update([
            'token'=>$token,
        ]);

        if($updatetoken){
            $link=$token;
            $resend=$id;
            return view("customer/verification",compact('link','resend'));
        }else{
            return redirect()->back()->with('error_msg','Unable to send link');
        }
        // return $userId;
        
    }
    public function verification()
    {
        
        return view('customer/verification');
    }
    public function verify($token)
    {
        // dd($token);
        $user=customer::where("token",$token)->first();
        if($user!==null){
            $set_verified=customer::where("token",$token)->update([
                'token'=>'null',
                'is_verified'=>'1',
            ]);
            if($set_verified){
                return redirect('/customer')->with('success_msg','Email Verified Successfully');
            }else{
                return redirect('/customer')->with('error_msg',' Can Not Verify Email ');
            }
            
        }else{
            
            return abort(403,'Token Expired');
        }
        
    }
    public function updateprofile(Request $req)
    {
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
            // 'sign'=>'required',
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
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{

            $id=Auth::guard('customer')->user()->id;
            $email_exist=customer::where('id','!=',$id)->where('email',$req->email)->get();
            $ssn_exist=customer::where('id','!=',$id)->where('ssn',$req->ssn)->get();
            $license_exist=customer::where('id','!=',$id)->where('drive_license_number',$req->licenseNumber)->get();
            $account_exist=customer_bank::where('customer_id','!=',$id)->where('account_number',$req->accountnumber)->get();
            // dd($account_exist);
            $card_exist=customer_bank::where('customer_id','!=',$id)->where('card_number',$req->cardnumber)->get();

            if(count($email_exist)>0){
                return redirect()->back()->with('error_msg', "Email Already exist");
            }else if(count($ssn_exist)>0){
                return redirect()->back()->with('error_msg', "SSN Already exist");
            }else if(count($license_exist)>0){
                return redirect()->back()->with('error_msg', "License Number Already exist");
            }else if(count($account_exist)>0){
                return redirect()->back()->with('error_msg', "Account Number Already exist");
            }else if(count($card_exist)>0){
                return redirect()->back()->with('error_msg', "Card Number Already exist");
            }else{

                $customer=customer::with(['income','relative','bank'])->where('id',$id)->first();

                if($req->cimg!=null){
                    if(substr($req->cimg->getMimeType(), 0, 5)=="image"){
                        $customerImage=$req->file('cimg')->store('customer_profile_picture');
                        $uploadImage=customer::where('id',$id)->update([
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
                
                if($req->licensecopy!=null){
                    if(substr($req->licensecopy->getMimeType(), 0, 5)=="image"){
                        $licenseImage=$req->file('licensecopy')->store('customer_license_picture');
                        $uploadlicense=customer::where('id',$id)->update([
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
                
                $customer_update=customer::where('id',$id)->first();
                
                $customer_update->name = $req->name;
                $customer_update->email = $req->email;
                $customer_update->contact = $req->phone;
                $customer_update->home_contact = $req->homephone;
                $customer_update->dob = $req->dob;
                $customer_update->ssn = $req->ssn;
                $customer_update->drive_license_number = $req->licenseNumber;
                $customer_update->liscense_issue_date = $req->licenseissuedate;
                $customer_update->license_expiry = $req->licenseexpirydate;
                $customer_update->street = $req->street;
                $customer_update->city = $req->city;
                $customer_update->state = $req->state;
                $customer_update->zip = $req->zip;
                $customer_update->country = $req->country;
                $customer_update->home_type = $req->homeType;
                $customer_update->signature = $req->sign; 
                $customer_update->save();

                
                
                $delete=customer_relatives::where('customer_id',$id)->delete();
                $customer_relative1=customer_relatives::create([
                    'customer_id'=>$id, 
                    'relative_name'=>$req->relative1name,
                    'relative_city'=>$req->relative1city, 
                    'relative_state'=>$req->relative1state, 
                    'relative_zip'=>$req->relative1zip, 
                    'relative_contact'=>$req->relative1contact, 
                    'relationship'=>$req->relation1, 
                ]);
                $customer_relative2=customer_relatives::create([
                    'customer_id'=>$id, 
                    'relative_name'=>$req->relative2name,
                    'relative_city'=>$req->relative2city, 
                    'relative_state'=>$req->relative2state, 
                    'relative_zip'=>$req->relative2zip, 
                    'relative_contact'=>$req->relative2contact, 
                    'relationship'=>$req->relation2, 
                ]);
                
                

                if($customer->bank==null){
                    $customer_bank=customer_bank::create([
                        'customer_id'=>$id, 
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
                        'is_bank_verified'=>0,
                    ]);
                }else{
                    $customer_bank=customer_bank::where('customer_id',$id)->update([
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
                        'is_bank_verified'=>0,
                    ]);

                }
                
            
                if($customer->income==null){
                    $customer_income=customer_income::create([
                        'customer_id'=>$id, 
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
                }else{
                    $customer_income=customer_income::where('customer_id',$id)->update([
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
                }
                //  dd( $customer_update );
                // dd($customer_update);
                if($customer_income==true && $customer_update==true && $customer_bank==true && $customer_relative1==true ){
                    $profile_status=floor($this->calculate_profile());
                    session(['profile_status' => $profile_status]);
                    return redirect()->back()->with('success_msg',"Profile Updated Successfully");
                }else{
                    return redirect()->back()->with('error_msg',"Unable to Update Profile");
                }
            }

            
            
        }
    }
    public function edit_customer_info()
    {
        $id=Auth::guard('customer')->user()->id;
        $customer=customer::with(['income','relative','bank'])->where('id',$id)->first();
        return view('customer/edit_customer_info',compact('customer'));
    }
    
    public function forget_password()
    {
        return view('customer/forget_password');
    }
    public function recover_password($token)
    {
        $user=customer::where('token',$token)->first();
        if($user!=null){

            return view('customer/recover_password',compact('token'));
        }else{
            return abort(403, 'Link Expired.');
        }
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
            $get_user=customer::where('email',$req->email)->first();
            if($get_user!=null){
                $userid=$get_user->id;
                $token = Str::random(32);
                $updatetoken=customer::where('id',$userid)->update([
                    'token'=>$token,
                ]);
                $url="localhost/lease/customer/recover_password/".$token;
                $details=[
                    'title'=>"UIG LEASING",
                    'msg'=>"Click the link to change password",
                    'url'=>$url,
                ];
                Mail::to("asadking066@gmail.com")->send(new passwordRecoverMail($details));

                return redirect()->back()->with('success_msg', "We have sended you a link. Check Your Email");
            }else{
                return redirect()->back()->with('error_msg', "Email Dosn't Exist");
            }
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
                $update_pass=customer::where('token',$req->user_token)->update([
                    'password'=>Hash::make($req->newpass),
                ]);
                if($update_pass){
                    $update_pass=customer::where('token',$req->user_token)->update([
                        'token'=>null,
                    ]);
                    return redirect('/customer')->with('success_msg', "password updated successfully");
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

        $user_id=Auth::guard('customer')->user()->id;
        $non_contracts=contract::where('contract.status','1')->where('customer_id',$user_id)->get()->count();
        $ap_contracts=contract::where('contract.status','2')->where('customer_id',$user_id)->get()->count();
        $rej_contracts=contract::where('contract.status','0')->where('customer_id',$user_id)->get()->count();
        $pen_tickets=customer_ticket::where('ticket_status_id','1')->where('customer_id',$user_id)->get()->count();
        $inpr_tickets=customer_ticket::where('ticket_status_id','2')->where('customer_id',$user_id)->get()->count();
        $comp_tickets=customer_ticket::where('ticket_status_id','3')->where('customer_id',$user_id)->get()->count();
        // dd($comp_tickets);


        return view('customer/dashboard',compact(['non_contracts','ap_contracts','rej_contracts','pen_tickets','inpr_tickets','comp_tickets']));
    }
    public function add_contract()
    {
        $contract_type=contract_type::get();
        $dealers=dealer::get();
        $profile_status=floor($this->calculate_profile());
        return view('customer/add_contract',compact(['contract_type','dealers','profile_status']));
    }
    public function submit_contract(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'contracttype'=>'required',
            'Paymentmethod'=>'required',
            'contractyear'=>'required',
            'dealer'=>'required',
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
            $user_id=Auth::guard('customer')->user()->id;
            $duration=
            $contract=contract::create([
                'dealer_id'=>$req->dealer, 
                'customer_id'=>$user_id, 
                'invoice_number'=>$req->invoice, 
                'contract_type_id'=>$req->contracttype, 
                'total_years'=>$req->contractyear, 
                'months'=>$req->contractyear*12, 
                // 'amount'=>$req->leaseamount,
                'payment_method'=>$req->Paymentmethod,
                'interest_rate'=>$interest_rate['interest_rate'],
            ]);
            if($contract){
                $contract_id=$contract->id;
                $camount=0;
                foreach($req->productname as $key=>$val){
                    $name=$req->productname[$key];
                    $price=$req->productprice[$key];
                    $quantity=$req->productquantity[$key];
                    $description=$req->productdescription[$key];
                    // $quantity=$req->productquantity[$key];
                    $camount+=$req->productquantity[$key]*$req->productprice[$key];
                    $contract_product=contract_product::create([
                        'contract_id'=>$contract_id, 
                        'product_name'=>$name, 
                        'product_description'=>$description, 
                        'product_price'=>$price,
                        'quantity'=>$quantity,
                        
                    ]);
                }
                $update_contract_amount=contract::where('id',$contract_id)->update([
                    'amount'=>$camount,
                ]);

                if($contract_product){
                    // make_due_Invoices($contractId,$duration,$paymentmethod,$amount,$interest_rate)
                    // dd($req->contractyears); 
                    $due_inv=$this->make_due_Invoices($contract_id,$req->contractyear,$req->Paymentmethod,$camount,$interest_rate['interest_rate']);
                    $dealer_invoice=$this->dealer_invoices($contract_id,$camount,$req->dealer);
                    if($due_inv){
                        $get_contract=contract::with(['contract_products'])->where('id',$contract_id)->first();
                        return view('customer/contract_detail',compact('get_contract'))->with('succuess_msg',"Successfully added");
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
    public function upload_contract_docs(Request $req)
    {   
        // dd($req->ticket_id);
        $validator = Validator::make($req->all(),[
            'contract_id'=>'required',
            'customer_id'=>'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $contractdoc=$req->file('file')->store('customer_docs');
            if($contractdoc){
                $add_docs=new customer_docs;
                $add_docs->customer_id=$req->customer_id;
                $add_docs->contract_id=$req->contract_id;
                $add_docs->document=$contractdoc;
                $add_docs->save();
                // dd($req->ticket_id);
            }else{
                return redirect()->back()->with('error_msg', "Unable to upload document");
            }
            
        }   
    }
    public function create_ticket()
    {
        $ticket_category=ticket_category::all();
        return view('customer/create_ticket',compact('ticket_category'));
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
            $userId=Auth::guard('customer')->user()->id;
            $create=customer_ticket::create([
                'customer_id'=>$userId, 
                'ticket_category_id'=>$req->ticket_type, 
                'subject'=>$req->subject, 
                'description'=>$req->description, 
            ]);
            $ticket_id=$create->id;
            foreach($req->file('file') as $key=>$name){
                $ticketdoc=$req->file('file')[$key]->store('customer_ticket_docs');
                $add_docs=new customer_ticket_docs;
                $add_docs->customer_ticket_id=$ticket_id;
                $add_docs->document=$ticketdoc;
                $add_docs->save();
            }

            if($create){
                ///return back with error
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
            $ticketdoc=$req->file('file')->store('customer_ticket_docs');
            if($ticketdoc){
                $add_docs=new customer_ticket_docs;
                $add_docs->customer_ticket_id=$req->ticket_id;
                $add_docs->document=$ticketdoc;
                $add_docs->save();
            }else{
                return redirect()->back()->with('error_msg', "Unable to upload document");
            }
            
        }   
    }

    public function view_detail_ticket($id)
    {   
        $ticket=customer_ticket::with(['ticket_docs','ticket_type'])->where('id',$id)->first();
        return view('customer/view_detail_ticket',compact('ticket'));
    }
    public function non_approved_contract()
    {
        $user_id=Auth::guard('customer')->user()->id;
        $contracts=contract::with(['contract_type','customer','dealer'])->where('contract.status','1')->where('customer_id',$user_id)->orderBy('id','desc')->get();
        return view('customer/non_approved_contract',compact('contracts'));
    }
    public function approved_contract()
    {
        $user_id=Auth::guard('customer')->user()->id;
        $contracts=contract::with(['contract_type','customer','dealer'])->where('customer_id',$user_id)->where('contract.status','2')->orderBy('id','desc')->get();
        return view('customer/approved_contract',compact('contracts'));
    }
    public function rejected_contract()
    {
        $user_id=Auth::guard('customer')->user()->id;
        $contracts=contract::with(['contract_type','customer','dealer'])->where('customer_id',$user_id)->where('contract.status','0')->orderBy('id','desc')->get();
        return view('customer/rejected_contract',compact('contracts'));
    }
    public function non_approved_ticket()
    {
        $user_id=Auth::guard('customer')->user()->id;
        $tickets=customer_ticket::with('ticket_type')->where('customer_id',$user_id)->orderBy('id','desc')->get();
        // dd($tickets);
        return view('customer/non_approved_ticket',compact('tickets'));
    }
    public function approved_ticket()
    {
        return view('customer/approved_ticket');
    }
    public function completed_ticket()
    {
        return view('customer/completed_ticket');
    }
    public function rejected_ticket()
    {
        return view('customer/rejected_ticket');
    }
    public function add_notes()
    {
        return view('customer/add_notes');
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
            $user_id=Auth::guard('customer')->user()->id;
            $create=customer_notes::create([
                'customer_id'=>$user_id,
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
        $user_id=Auth::guard('customer')->user()->id;
        $notes=customer_notes::where('customer_id',$user_id)->orderBy('id','desc')->get();
        return view('customer/view_notes',compact('notes'));
    }
    public function edit_notes($id)
    {
        $notes=customer_notes::where("id",$id)->first();
        return view('customer/edit_notes',compact('notes'));
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
            $update=customer_notes::where('id',$note_id)->update([
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
        $update=customer_notes::where('id',$id)->first();
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
        $delete_note=customer_notes::where('id',$id)->first();
        $delete_note->delete();
        if($delete_note){
            return $this->view_notes();
         }else{
             return redirect()->back()->with('error_msg',"Unable to mark as done");
         }
      
    }
    public function view_dealers()
    {
        $uid=Auth::guard('customer')->user()->id;
        $dealers=contract::with('dealer')->where("customer_id",$uid)->orderBy('id','desc')->get()->unique('dealer_id');
        // dd($dealers[0]->dealer->owner_name);
        return view('customer/view_dealers',compact('dealers'));
    }
    public function dealer_info($id)
    {
        $user= dealer::with(['contract'])->where('id',$id)->first();
        return view('customer/dealer_info',compact('user'));
    }
    //pointer
    public function ach_payment_charge($amount)
    {   
        $cid = Auth::guard('customer')->user()->id;
        $setup_variable = env('PLAID_MODE');
        $plaid_client_id = env('PLAID_CLIENT');
        $plaid_secret = env('PLAID_SECRET');
        $stripe_sk = env('STRIPE_SECRET');
        $customer_object_raw = customer_bank::where('customer_id',$cid)->first();
        $customer_object = $customer_object_raw->toArray();
        \Stripe\Stripe::setApiKey($stripe_sk);

        $charge = \Stripe\Charge::create(['amount' => $amount*100,'currency'=>'usd','customer'=>$customer_object['bank_stripe_customer_ach']]);

        $create_transaction=customer_transaction::create([
                'invoice_id'=>2, 
                'amount'=>$amount, 
                'transaction_id'=>$charge->id,
                'is_bank_transaction'=>1
            ]);

    }

    //bank verification flag in db.
    //transaction saving in db.
    //transaction table flag type.

    public function change_password()
    {
        return view('customer/change_password');
    }
    public function contract_detail($id)
    {   
        
        $get_contract=contract::with(['contract_products','contract_type','customer_docs','dealer','dealer_docs','employee_docs'])->where('id',$id)->first();
        // dd($get_contract->customer_docs);
        return view('customer/contract_detail',compact('get_contract'));
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
            $user_id=Auth::guard('customer')->user()->id;
            if(Hash::check($req->oldpassword,Auth::guard('customer')->user()->password)){

                if($req->newpass==$req->cpass){
                    $update_pass=customer::where('id',$user_id)->update([
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
    public function calculate_profile()
    {
        $id=Auth::guard('customer')->user()->id;
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
        // dd($total);
        if ( $cust_info['bank']=='') {
            $total1= 0;
        }else{
            $bankcol    = preg_grep('/(.+ed_at)|(.*id)/', array_keys($cust_info['bank']->toArray()), PREG_GREP_INVERT);
            $per_column1 = 100 / count($bankcol);
            $total1      = 0;

            foreach ($cust_info['bank']->toArray() as $key  => $value) {
                if ($value !== NULL && $value !== [] && $value !== '' && in_array($key, $bankcol) && $key!=='bank_access_token' && $key!=='bank_stripe_customer_ach') {
                    $total1 += $per_column1;
                }
                if($key=='bank_access_token'){
                    $total1 += $per_column1;
                }
                if($key=='bank_stripe_customer_ach'){
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


        return floor($avg);
    }

    public function make_due_Invoices($contractId,$duration,$paymentmethod,$amount,$interest_rate)
    {
        $uid=Auth::guard('customer')->user()->id;
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
                        'customer_id'=>$uid,
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
                        'customer_id'=>$uid,
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
                        'customer_id'=>$uid,
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
    public function contract_pdf($id)
    {
        $customer=Auth::guard('customer')->user();
        $get_contract=contract::with(['contract_products','contract_type','customer_docs','dealer_docs','employee_docs'])->where('id',$id)->first();
        // dd($get_contract);
        // return $get_contract;
        return view("customer/contract_pdf",compact(['get_contract','customer']));
    }
    public function paid_invoice($contract_id)
    {
        $in=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','1')->orderBy('id','desc')->get();
        return view("customer/paid_invoice",compact('in'));
    } 
    
    public function due_invoice($contract_id)
    {
        $current_date=date('Y-m-d');
        $increased_date=date('Y-m-d',strtotime('+10 days'));

        $pend_in=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','0')->where('due_date','<',$current_date)->orderBy('id','desc')->get();
        
        $in=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','0')->whereBetween('due_date',[$current_date,$increased_date])->orderBy('id','desc')->get();
        
        return view("customer/due_invoice",compact(['in','pend_in']));
    }
    public function due_invoice_contracts()
    {
        $increased_date=date('Y-m-d',strtotime('+10 days'));
        $uid=Auth::guard('customer')->user()->id; 

        // $contracts=invoices::with(['contract','contract.dealer'])->where('status','0')->where('due_date','<',$increased_date)->where('customer_id',$uid)->get()->groupBy('invoices.contract_id')->count();
        // getting count of  late and due invoice

        $contracts=DB::select("SELECT dealer.owner_name as dealer,contract_type.name as type,contract.*,contract_id,COUNT(*) as count FROM invoices INNER JOIN contract ON invoices.contract_id=contract.id INNER JOIN dealer ON contract.dealer_id=dealer.id INNER JOIN contract_type ON contract.contract_type_id=contract_type.id where invoices.status=0 AND invoices.customer_id='$uid' AND invoices.due_date<'$increased_date' GROUP By invoices.contract_id");

        // dd($contracts);

        return view("customer/due_invoice_contracts",compact('contracts'));
    }
    public function paid_invoice_contracts()
    {
        $uid=Auth::guard('customer')->user()->id;
        $contracts=invoices::with(['contract','contract.dealer'])->where('status','1')->where('customer_id',$uid)->get()->unique('contract_id');
        return view("customer/paid_invoice_contracts",compact('contracts'));
    }
    public function invoice_detail_page($id)
    {
        $contract_products=contract_product::where('contract_id',$id)->get();
        $contract_dealer=contract::with('dealer')->where('id',$id)->first();
        // dd($contract_dealer);
        return view('customer/invoice_detail_page',compact(['contract_products','contract_dealer']));
    }
    public function view_transaction()
    {
        return view('customer/view_transaction');
    }
    public function due_invoice_detail($id)
    {
        $invoice=invoices::where('id',$id)->first();
        // dd($invoice);
        return view('customer/due_invoice_detail',compact('invoice'));
    }
    public function paid_invoice_detail($id)
    {
        $invoice=invoices::where('id',$id)->first();
        // dd($invoice);
        return view('customer/paid_invoice_detail',compact('invoice'));
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


//https://55d5-103-150-209-229.ngrok.io
//https://8907-103-150-209-229.ngrok.io
//https://63d1-103-150-209-229.ngrok.io
//https://6cbc-103-150-209-229.ngrok.io
//https://8b95-103-150-209-229.ngrok.io



    public function customer_details()
    {   
        $id=Auth::guard('customer')->user()->id;
        $percentage=$this->calculate_profile();
        $customer=customer::with(['income','relative','bank','contracts.contract_type'])->where('id',$id)->first();
        $verified_by_plaid = $this->bank_verified_by_plaid();
        if($verified_by_plaid == 1)
        {
            $plaid_array = ['bank_verified' => 1];
        }
        else
        {
            $setup_variable = env('PLAID_MODE');
            $plaid_client_id = env('PLAID_CLIENT');
            $plaid_secret = env('PLAID_SECRET');
            $plaid_exchange_url                = "https://".$setup_variable.".plaid.com/item/public_token/exchange";
            $plaid_btok_generator_url          = "https://".$setup_variable.".plaid.com/processor/stripe/bank_account_token/create";
            $plaid_public_token_generation_url = "https://".$setup_variable.".plaid.com/item/add_token/create";
            $plaid_ustring = "Plaid ".ucfirst($setup_variable)." Services for UIG Leasing.";
            $plaid_public_token = $this->plaid_public_token_generator($plaid_client_id,$plaid_secret,$plaid_public_token_generation_url,$plaid_ustring);            
            $plaid_array =  ['bank_verified' => 0,'setup_variable'=>$setup_variable,'plaid_client_id'=>$plaid_client_id,'plaid_secret'=>$plaid_secret,'plaid_exchange_url'=>$plaid_exchange_url,'plaid_btok_generator_url'=>$plaid_btok_generator_url,'plaid_public_token_generation_url'=>$plaid_public_token_generation_url,'plaid_ustring'=>$plaid_ustring,'plaid_public_token'=>$plaid_public_token];
        }
        return view('customer/customer_details',compact(['customer','percentage','plaid_array']));
    }
    private function bank_verified_by_plaid()
    {
        $customer=Auth::guard('customer')->user();
      
            if($customer->is_bank_verified == 1){
                return 1;
            }
            else{
                return 0;
            }
       
    }

    private function plaid_public_token_generator($pci,$ps,$pptgu,$pus)
    {

        $cid=Auth::guard('customer')->user()->id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $pptgu);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"client_id\": \"$pci\",\"secret\": \"$ps\",\"user\": {\"client_user_id\":\"$pus\"}}");
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Plaid-Version: 2019-05-29';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) 
        {
            $ret =  'Error:' . curl_error($ch);
        }
        else
        {
            $decode = json_decode($result, true);
            if(isset($decode['add_token'])){
                $ret = $decode['add_token'];
            }
            else 
                $ret = '';
        }
        curl_close($ch);

        return $ret;
    }

    public function bank_verification(Request $request)
    {

        $setup_variable = env('PLAID_MODE');
        $plaid_client_id = env('PLAID_CLIENT');
        $plaid_secret = env('PLAID_SECRET');
        $stripe_sk = env('STRIPE_SECRET');
        $headers[] = 'Content-Type: application/json';
        $params = [
           'client_id' => $plaid_client_id,
           'secret' => $plaid_secret,
           'public_token' => $request->public_token
        ];
       try{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://".$setup_variable.".plaid.com/item/public_token/exchange");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if(!$result = curl_exec($ch)) {
           trigger_error(curl_error($ch));
        }

        curl_close($ch);
        $jsonParsed = json_decode($result);

        $cid             = Auth::guard('customer')->user()->id;
        $customer_object_ = customer_bank::where('customer_id',$cid)->first();
        $customer_object = $customer_object_->toArray();
        $btok_params = [
           'client_id'    => $plaid_client_id,
           'secret'       => $plaid_secret,
           'access_token' => $jsonParsed->access_token,
           'account_id'   => $request->account_id
        ];

        $chx = curl_init();
        curl_setopt($chx, CURLOPT_URL, "https://".$setup_variable.".plaid.com/processor/stripe/bank_account_token/create");
        curl_setopt($chx, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chx, CURLOPT_POST, 1);
        curl_setopt($chx, CURLOPT_POSTFIELDS, json_encode($btok_params));
        curl_setopt($chx, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($chx, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($chx, CURLOPT_TIMEOUT, 80);
        curl_setopt($chx, CURLOPT_SSL_VERIFYPEER, false);

        if(!$result = curl_exec($chx)) {
           trigger_error(curl_error($chx));
        }
        curl_close($chx);
        $btok_parsed = json_decode($result);
        \Stripe\Stripe::setApiKey($stripe_sk);

        $customer = \Stripe\Customer::create([
          'description' => "Dedicated customer made for Plaid Btok",
          'source' => $btok_parsed->stripe_bank_account_token,
        ]);

        $account_update = customer_bank::where('customer_id',$cid)->update(['bank_access_token'=>$jsonParsed->access_token,'bank_stripe_customer_ach'=> $customer->id,'is_bank_verified'=> 1]);
        $update_customer_bank_status=customer::where('id',$cid)->update([
            'is_bank_verified'=> 1,
        ]);

        $profile_status=floor($this->calculate_profile());
        session(['profile_status' => $profile_status]);
        // dd($account_update);

        $this->ach_payment_charge(100);
        return json_encode(array('status'=>'success'));

      } 
      catch(Throwable $e){
        echo '<pre>';print_r($e);echo'</pre>';
        exit;
      }
      catch(Exception $e){
        echo '<pre>';print_r($e);echo'</pre>';
        exit;
      } 

    }
}