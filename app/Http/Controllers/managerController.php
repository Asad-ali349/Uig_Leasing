<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\customer;
use App\Models\customer_relatives;
use App\Models\customer_bank;
use App\Models\customer_income;
use App\Models\Contract;
use App\Models\contract_product;
use App\Models\contract_type;
use App\Models\customer_ticket;
use App\Models\dealer_ticket;
use App\Models\dealer;
use App\Models\employee_notes;
use App\Models\employee_docs;
use App\Models\employee_todo_list;
use App\Models\ticket_category;
use App\Models\employee_roles;
use App\Models\invoices;
use App\Models\dealer_invoices;
use App\Models\dealer_ticket_docs;
use Illuminate\Support\Facades\Mail;
use App\Mail\newAccountMail;
use App\Models\dealer_transaction;
use App\Models\customer_transaction;

class managerController extends Controller
{
   
    
    public function employee_info()
    {
        $user_id=Auth::guard('employee')->user()->id;
        $employee=employees::where('id',$user_id)->first();
        return view('employee/manager/employee_info',compact('employee'));
    }
    public function edit_employee_info()
    {
        # code...
        $user_id=Auth::guard('employee')->user()->id;
        $employee=employees::where('id',$user_id)->first();
        // dd($employee);
        return view('employee/manager/edit_employee_info',compact('employee'));
    }
    public function update_employee_info(Request $req){
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required | email',
            'ssn'=>'required',
            'telephone'=>'required',
            // 'image'=>'required',
            'employeestreet'=>'required',
            'employeecity'=>'required',
            'employeestate'=>'required',
            'employeezip'=>'required',
            'employeecountry'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $user_id=Auth::guard('employee')->user()->id;
            $ssn_exist=employees::where('id','!=',$user_id)->where('ssn',$req->ssn)->get();
            $email_exist=employees::where('id','!=',$user_id)->where('email',$req->email)->get();
            if(count($ssn_exist)>0){
                return redirect()->back()->with('error_msg', "Ein Already Exists");

            }else if(count($email_exist)>0){
                return redirect()->back()->with('error_msg', "Email Already Exist");
            }else{
                
                if($req->image!=null){
                    // dd("with");
                    if(substr($req->image->getMimeType(), 0, 5)=="image"){
                        $employeeImage=$req->file('image')->store('employee_profile_pic');
                        if($employeeImage){
                            $update=employees::where('id',$user_id)->update([
                                'name'=>$req->name, 
                                'email'=>$req->email,  
                                'contact'=>$req->telephone, 
                                'address'=>$req->employeestreet,
                                'image'=>$employeeImage,
                                'city'=>$req->employeecity, 
                                'state'=>$req->employeestate, 
                                'zip'=>$req->employeezip, 
                                'country'=>$req->employeecountry, 
                                'ssn'=>$req->ssn,
                            ]);
                            if($update){
                                $profile_status=ceil($this->calculate_profile());
                                session(['profile_status' => $profile_status]);
                                return $this->employee_info();
                            }else{
                                return redirect()->back()->with('error_msg', "Unable to update profile");
                            }
                        }else{
                            return redirect()->back()->with('error_msg', "Unable to update profile");
                        }
                    }else{
                        return redirect()->back()->with('error_msg', "Profile Picture must be an Image");
                    }    
                }else{
                    // dd("without");
                    $update=employees::where('id',$user_id)->update([
                        'name'=>$req->name, 
                        'email'=>$req->email,  
                        'contact'=>$req->telephone, 
                        'address'=>$req->employeestreet,
                        'city'=>$req->employeecity, 
                        'state'=>$req->employeestate, 
                        'zip'=>$req->employeezip, 
                        'country'=>$req->employeecountry, 
                        'ssn'=>$req->ssn,
                    ]);
                    if($update){
                        $profile_status=ceil($this->calculate_profile());
                        session(['profile_status' => $profile_status]);
                        return $this->employee_info();
                    }else{
                        return redirect()->back()->with('error_msg', "Unable to update profile");
                    }
                }
            }
            
        }
    }
    
    

    public function view_detail_ticket_dealer($id)
    {   
        $ticket=dealer_ticket::with(['ticket_docs','ticket_type'])->where('id',$id)->first();
        return view('employee/manager/view_detail_ticket_dealer',compact('ticket'));
    }
    public function view_detail_ticket_customer($id)
    {   
        $ticket=customer_ticket::with(['ticket_docs','ticket_type'])->where('id',$id)->first();
        return view('employee/manager/view_detail_ticket_customer',compact('ticket'));
    }
    public function non_approved_ticket()
    {
        // $user_id=Auth::guard('dealer')->user()->id;
        $customer_tickets=customer_ticket::with(['ticket_type','customer'])->where('ticket_category_id','7')->orderBy('id','desc')->get();
        $dealer_tickets=dealer_ticket::with(['ticket_type','dealer'])->where('ticket_category_id','7')->orderBy('id','desc')->get();
        // dd($dealer_tickets);
        return view('employee/manager/non_approved_ticket',compact(['customer_tickets','dealer_tickets']));
    }
    public function change_customer_ticket_status($id,$status)
    {
        $update=customer_ticket::where('id',$id)->first();
        $update->ticket_status_id=$status;
        $update->save();

        if($update){
           return $this->non_approved_ticket();
        }else{
            return redirect()->back()->with('error_msg',"Unable to mark as done");
        }
       
    }
    public function change_dealer_ticket_status($id,$status)
    {
        $update=dealer_ticket::where('id',$id)->first();
        $update->ticket_status_id=$status;
        $update->save();

        if($update){
           return $this->non_approved_ticket();
        }else{
            return redirect()->back()->with('error_msg',"Unable to mark as done");
        }
       
    }
    public function dashboard()
    {
        $non_contracts=contract::where('contract.status','1')->get()->count();
        $ap_contracts=contract::where('contract.status','2')->get()->count();
        $rej_contracts=contract::where('contract.status','0')->get()->count();
         // customer tickets
        $non_customer_tickets=customer_ticket::where('ticket_category_id','7')->where('ticket_status_id','1')->get()->count();
        $ip_customer_tickets=customer_ticket::where('ticket_category_id','7')->where('ticket_status_id','2')->get()->count();
        $comp_customer_tickets=customer_ticket::where('ticket_category_id','7')->where('ticket_status_id','3')->get()->count();
        // dealer tickets
        $non_dealer_tickets=dealer_ticket::where('ticket_status_id','1')->where('ticket_category_id','7')->get()->count();
        $ip_dealer_tickets=dealer_ticket::where('ticket_status_id','2')->where('ticket_category_id','7')->get()->count();
        $comp_dealer_tickets=dealer_ticket::where('ticket_status_id','3')->where('ticket_category_id','7')->get()->count();
        $non_ticket=$non_customer_tickets+$non_dealer_tickets;
        $ip_ticket=$ip_customer_tickets+$ip_dealer_tickets;
        $comp_ticket=$comp_customer_tickets+$comp_dealer_tickets;


        $customers=customer::where('status','1')->get()->count();
        $dealers=dealer::where('status','1')->get()->count();
        $employees=employees::where('status','1')->where('role_id','!=','1')->where('role_id','!=','2')->get()->count();
        
        return view('employee/manager/dashboard',compact(['non_contracts','ap_contracts','rej_contracts','non_ticket','ip_ticket','comp_ticket','customers','dealers','employees']));
    }
    public function view_customers()
    {
        $customers=customer::orderBy('id','desc')->get();
        return view('employee/manager/view_customers',compact('customers'));
    }
    public function view_dealers()
    {
        $dealers=dealer::orderBy('id','desc')->get();
        return view('employee/manager/view_dealers',compact('dealers'));
    }
    public function dealer_info($id)
    {
        $user= dealer::with(['contract'])->where('id',$id)->first();
        $contracts=contract::with(['contract_type','customer'])->where('dealer_id',$id)->orderBy('id','desc')->get();
        return view('employee/manager/dealer_info',compact(['user','contracts']));
    }
    public function customer_details($id)
    {
        $customer=customer::with(['income','relative','bank','contracts.contract_type'])->where('id',$id)->first();
        return view('employee/manager/customer_details',compact('customer'));
        
    }
    public function change_password()
    {
        return view('employee/manager/change_password');
    }
    public function non_approved_contract()
    {
        $contracts=contract::with(['contract_type','customer','dealer'])->where('contract.status','1')->orderBy('id','desc')->get();
        return view('employee/manager/non_approved_contract',compact('contracts'));
    }
    public function approved_contract()
    {
        $contracts=contract::with(['contract_type','customer','dealer'])->where('contract.status','2')->orderBy('id','desc')->get();
        return view('employee/manager/approved_contract',compact('contracts'));
    }
    public function rejected_contract()
    {
        $contracts=contract::with(['contract_type','customer','dealer'])->where('contract.status','0')->orderBy('id','desc')->get();
        return view('employee/manager/rejected_contract',compact('contracts'));
    }
    public function contract_detail($id)
    {
        $get_contract=contract::with(['contract_products','contract_type','customer_docs','customer','dealer','dealer_docs','employee_docs'])->where('id',$id)->first();
        // dd($get_contract);
        return view('employee/manager/contract_detail',compact('get_contract'));
    }
    public function add_notes()
    {
        return view('employee/manager/add_notes');
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
            $user_id=Auth::guard('employee')->user()->id;
            $create=employee_notes::create([
                'employee_id'=>$user_id,
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
        $user_id=Auth::guard('employee')->user()->id;
        $notes=employee_notes::where('employee_id',$user_id)->orderBy('id','desc')->get();
        return view('employee/manager/view_notes',compact('notes'));
    }
    public function edit_notes($id)
    {
        $notes=employee_notes::where("id",$id)->first();
        return view('employee/manager/edit_notes',compact('notes'));
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
            $update=employee_notes::where('id',$note_id)->update([
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
        $update=employee_notes::where('id',$id)->first();
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
        $delete_note=employee_notes::where('id',$id)->first();
        $delete_note->delete();
        if($delete_note){
            return $this->view_notes();
         }else{
             return redirect()->back()->with('error_msg',"Unable to delete note");
         }
      
    }
    public function add_task()
    {
        return view('employee/manager/add_task');
    }
    public function submit_task(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'title'=>'required',
            'task'=>'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $user_id=Auth::guard('employee')->user()->id;
            $create=employee_todo_list::create([
                'employee_id'=>$user_id,
                'description'=>$req->task,
                'title'=>$req->title,
                'assign_by'=>$user_id,
            ]);
            if($create){
                return redirect()->back()->with('success_msg',"Task added Successfully");
            }else{
                return redirect()->back()->with('error_msg',"Unable to add Task");
            }
        }

    }
    public function view_todo_list()
    {
        $user_id=Auth::guard('employee')->user()->id;
        $tasks=employee_todo_list::with(['assignby.role'])->where('employee_id',$user_id)->orderBy('id','desc')->get();
        // dd($tasks);
        return view('employee/manager/view_todo_list',compact('tasks'));
    }
    public function mark_as_done_tasks($id)
    {
        $update=employee_todo_list::where('id',$id)->first();
        $update->status='1';
        $update->save();

        if($update){
           return $this->view_todo_list();
        }else{
            return redirect()->back()->with('error_msg',"Unable to mark as done");
        }
       
    }
    public function delete_tasks($id)
    {
        $delete_task=employee_todo_list::where('id',$id)->first();
        $delete_task->delete();
        if($delete_task){
            return $this->view_todo_list();
         }else{
             return redirect()->back()->with('error_msg',"Unable to delete task");
         }
      
    }

    public function invoice_detail_page($id)
    {
        $contract=contract::with(['customer','dealer','contract_products'])->where('id',$id)->first();
        return view('employee/manager/invoice_detail_page',compact('contract'));
    }

    
    public function add_employee()
    {
        $roles=employee_roles::where('id','!=','1')->where('id','!=','2')->get();
        // dd($roles);
        return view('employee/manager/add_employee',compact('roles'));
    }
    public function submit_employee(Request $req)
    {
        
        $validator = Validator::make($req->all(),[

            'name'=>'required',
            'email'=>'required | email',
            'ssn'=>'required',
            'telephone'=>'required',
            // 'image'=>'required',
            'role'=>'required',
            'employeestreet'=>'required',
            'employeecity'=>'required',
            'employeestate'=>'required',
            'employeezip'=>'required',
            'employeecountry'=>'required',

        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $user_exists=employees::where('email',$req->email)->orwhere('ssn',$req->ssn)->get();
            // dd($user_exists);
            if(count($user_exists)>0){
                return redirect()->back()->with('error_msg',"User already Exists");
            }else{
            
                if($req->file('image')!=null){
                    if(substr($req->image->getMimeType(), 0, 5)=="image"){
                        $employeeImage=$req->file('image')->store('employee_profile_picture');
                        
                        if($employeeImage){
                            $pass = Str::random(8);
                            $add_employee=employees::create([
                                'name'=>$req->name, 
                                'email'=>$req->email, 
                                'password'=>Hash::make($pass), 
                                'contact'=>$req->telephone, 
                                'address'=>$req->employeestreet,
                                'city'=>$req->employeecity, 
                                'state'=>$req->employeestate, 
                                'zip'=>$req->employeezip, 
                                'country'=>$req->employeecountry, 
                                'ssn'=>$req->ssn, 
                                'image'=>$employeeImage, 
                                'role_id'=>$req->role,
                            ]);
                            if($add_employee){
                                $details=[
                                    'title'=>"UIG LEASING",
                                    'name'=>$req->name,
                                    'email'=>$req->email,
                                    'password'=>$pass,
                                ];
                                Mail::to("asadking066@gmail.com")->send(new newAccountMail($details));
                                return redirect()->back()->with('success_msg', "Employee added Successfully");
                            }else{
                                return redirect()->back()->with('error_msg', "Unable to add Employee");
                            }
                        }else{
                            return redirect()->back()->with('error_msg', "Unable to add Profile Image");
                        }
                    }else{
                        return redirect()->back()->with('error_msg', "Only image is allowed for Profile Image");
                    }
                }else{
                    $pass = Str::random(8);
                    $add_employee=employees::create([
                        'name'=>$req->name, 
                        'email'=>$req->email, 
                        'password'=>$pass, 
                        'contact'=>$req->telephone, 
                        'address'=>$req->employeestreet,
                        'city'=>$req->employeecity, 
                        'state'=>$req->employeestate, 
                        'zip'=>$req->employeezip, 
                        'country'=>$req->employeecountry, 
                        'ssn'=>$req->ssn, 
                        // 'image'=>$req->, 
                        'role_id'=>$req->role,
                    ]);
                    if($add_employee){
                        $details=[
                            'title'=>"UIG LEASING",
                            'name'=>$req->name,
                            'email'=>$req->email,
                            'password'=>$pass,
                        ];
                        Mail::to("asadking066@gmail.com")->send(new newAccountMail($details));
                        return redirect()->back()->with('success_msg', "Employee added Successfully");
                    }else{
                        return redirect()->back()->with('error_msg', "Unable to add Employee");
                    }
                }
            }    
        }
        
    }
    public function add_dealer()
    {
        return view('employee/manager/add_dealer');
    }
    public function submit_dealer(Request $req)
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
            // 'sign'=>'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{

            $user_exists=dealer::where('email',$req->dealeremail)->orwhere('ein',$req->ein)->get();
            // dd($user_exists);
            if(count($user_exists)>0){
                return redirect()->back()->with('error_msg',"User already Exists");
            }else{

                if($req->sign!=null){
                    $adddealer=dealer::create([
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
                }else{
                    $adddealer=dealer::create([
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
                }
                $id=$adddealer->id;
                if($req->companylogo!=null){
                    if(substr($req->companylogo->getMimeType(), 0, 5)=="image"){
                        $customerImage=$req->file('companylogo')->store('dealer_companylogo');
                        $uploadImage=dealer::where('id',$id)->update([
                            'shop_logo'=>$customerImage,
                        ]);
                        if(!$uploadImage){
                            ///return back with error
                            return redirect()->back()->with('error_msg',"Unable to Add Profile Image");
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
                            return redirect()->back()->with('error_msg',"Unable to Add License Image");
                        }
                    }else{
                        // back with error 
                        return redirect()->back()->with('error_msg',"License Copy can only be Image ");
                    }
    
                }
    
                
                if($adddealer){
                    return redirect()->back()->with('success_msg',"Dealer Added Successfully");
                }else{
                    return redirect()->back()->with('error_msg',"Unable to Add Dealer");
                }
            }
                
        }    
        
    }
    public function add_customer()
    {
        return view('employee/manager/add_customer');
    }
    public function view_employee()
    {
        $employees=employees::with('role')->where('role_id','!=','1')->orderBy('id','desc')->get();
        // dd($employees);
        return view('employee/manager/view_employee',compact('employees'));
    }
    public function view_employee_detail($id)
    {
        $employee=employees::where('id',$id)->first();
        return view('employee/manager/view_employee_detail',compact('employee'));
    }
    public function calculate_profile() 
    {
        $uid=Auth::guard('employee')->user()->id;
        $profile=employees::where('id',$uid)->first();
        // dd($profile);s
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

        return ceil($total);
    }
    public function due_invoice($contract_id)
    {
        $current_date=date('Y-m-d');
        $increased_date=date('Y-m-d',strtotime('+10 days'));

        $pend_in=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','0')->where('due_date','<',$current_date)->orderBy('id','desc')->get();
        $in=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','0')->whereBetween('due_date',[$current_date,$increased_date])->orderBy('id','desc')->get();
        
        return view('employee/manager/due_invoice',compact(['in','pend_in']));
    }
    public function paid_invoice($contract_id)
    {
        $in=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','1')->orderBy('id','desc')->get();
        return view('employee/manager/paid_invoice',compact('in'));
    }
    public function due_invoice_contract()
    {
        $increased_date=date('Y-m-d',strtotime('+10 days'));
        // $contracts=invoices::with(['contract','contract.customer'])->where('status','0')->where('due_date','<',$increased_date)->get()->unique('contract_id');
        
        $contracts=DB::select("SELECT customer.name as customer,contract_type.name as type,contract.*,contract_id,COUNT(*) as count FROM invoices INNER JOIN contract ON invoices.contract_id=contract.id INNER JOIN customer ON contract.customer_id=customer.id INNER JOIN contract_type ON contract.contract_type_id=contract_type.id where invoices.status=0  AND invoices.due_date<'$increased_date' GROUP By invoices.contract_id");
        // dd($contracts);
        return view('employee/manager/due_invoice_contracts',compact('contracts'));
    }
    public function paid_invoice_contract()
    {
        $contracts=invoices::with(['contract','contract.customer'])->where('status','1')->get()->unique('contract_id');
        return view('employee/manager/paid_invoice_contracts',compact('contracts'));
    }
    public function due_invoice_detail($id)
    {
        $invoice=invoices::with('customer')->where('id',$id)->first();
        // dd($invoice);
        return view('employee/manager/due_invoice_detail',compact('invoice'));
    }
    public function paid_invoice_detail($id)
    {
        $invoice=invoices::with('customer')->where('id',$id)->first();
        // dd($invoice);
        return view('employee/manager/paid_invoice_detail',compact('invoice'));
    }
    public function dealer_due_invoice()
    {
        $invoices=dealer_invoices::with(['dealer','contract.contract_type'])->where('status','0')->orderBy('id','desc')->get();
        return view('employee/manager/dealer_due_invoice',compact('invoices'));
    }
    public function dealer_paid_invoice()
    {
        $invoices=dealer_invoices::with(['dealer','contract.contract_type'])->where('status','1')->orderBy('id','desc')->get();
        return view('employee/manager/dealer_paid_invoice',compact('invoices'));
    }
    public function dealer_invoice_detail($id)
    {
        $invoice=dealer_invoices::with(['dealer','contract.contract_type'])->where('id',$id)->first();
        // dd($invoice);
        return view('employee/manager/dealer_invoice_detail',compact('invoice'));
    }
    public function dealer_transaction()
    {
        $transactions=dealer_transaction::with(['invoice','contract.contract_type'])->orderBy('id','desc')->get();
        return view('employee/manager/dealer_transaction',compact('transactions'));
    }
    public function customer_transaction()
    {
        $transactions=customer_transaction::with(['invoice','contract.contract_type'])->orderBy('id','desc')->get();
        return view('employee/manager/customer_transaction',compact('transactions'));
    }
    public function view_reports()
    {
        $filter='all';
        $dealers=dealer::where('status','1')->orderBy('id','desc')->get();
        $customers=customer::where('status','1')->orderBy('id','desc')->get();

        $contracts=contract::orderBy('id','desc')->get();
        $contract_count=count($contracts);
        $customer_paid_sum=0.0;
        $customer_paid_counts=0;
        $customer_unpaid_sum=0.0;
        $customer_unpaid_counts=0;
        $dealer_paid_sum=0.0;
        $dealer_paid_counts=0;
        $dealer_unpaid_sum=0.0;
        $dealer_unpaid_counts=0;
        if($contract_count>0){
            foreach($contracts as $contract){
                //customer
                $amount_to_pay=invoices::where('status','1')->where('contract_id',$contract->id)->sum('total_amount_to_pay');
                $late_fee=invoices::where('status','1')->where('contract_id',$contract->id)->sum('late_fee');
                $customer_paid_sum+=($amount_to_pay+$late_fee);
                $paid_count=invoices::where('status','1')->where('contract_id',$contract->id)->count();
                $customer_paid_counts+=$paid_count;

                $amount_to_pay=invoices::where('status','0')->where('contract_id',$contract->id)->sum('total_amount_to_pay');
                $late_fee=invoices::where('status','0')->where('contract_id',$contract->id)->sum('late_fee');
                $customer_unpaid_sum+=($amount_to_pay+$late_fee);
                $unpaid_count=invoices::where('status','0')->where('contract_id',$contract->id)->count();
                $customer_unpaid_counts+=$unpaid_count;

                //dealer 
                $amount_to_pay=dealer_invoices::where('status','1')->where('contract_id',$contract->id)->sum('amount');
                
                $dealer_paid_sum+=$amount_to_pay;
                $paid_count=dealer_invoices::where('status','1')->where('contract_id',$contract->id)->count();
                $dealer_paid_counts+=$paid_count;

                $amount_to_pay=dealer_invoices::where('status','0')->where('contract_id',$contract->id)->sum('amount');
                $dealer_unpaid_sum+=$amount_to_pay;
                $unpaid_count=dealer_invoices::where('status','0')->where('contract_id',$contract->id)->count();
                $dealer_unpaid_counts+=$unpaid_count;
            }
        }
        
        return view('employee/manager/view_reports',compact(['filter','dealers','customers','customer_paid_sum','customer_paid_counts','customer_unpaid_sum','customer_unpaid_counts','dealer_paid_sum','dealer_paid_counts','dealer_unpaid_sum','dealer_unpaid_counts','contracts','contract_count'
        ]));
    }
    public function filter_invoices(Request $req)
    {
        //FOR filter on next page in modal
        $dealers=dealer::where('status','1')->orderBy('id','desc')->get();
        $customers=customer::where('status','1')->orderBy('id','desc')->get();


        $validator = Validator::make($req->all(),[
            'filters'=>'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $filter=$req->filters;
            if($req->filters=="customers"){
                if($req->fromdate=="" && $req->todate==""){
                    $contracts=contract::with(['customer','dealer','contract_type'])->where('customer_id',$req->customer)->orderBy('id','desc')->get();
                }else if($req->todate==""){
                    $contracts=contract::with(['customer','dealer','contract_type'])->where('customer_id',$req->customer)->whereDate('created_at', '>',$req->fromdate)->orderBy('id','desc')->get();
                }else if($req->fromdate==""){
                    $contracts=contract::with(['customer','dealer','contract_type'])->where('customer_id',$req->customer)->whereDate('created_at', '<',$req->todate)->orderBy('id','desc')->get();
                }else{
                    $contracts=contract::with(['customer','dealer','contract_type'])->where('customer_id',$req->customer)->whereDate('created_at', '>=',$req->fromdate)->whereDate('created_at', '<=',$req->todate)->orderBy('id','desc')->get();
                }
                
            }else if($req->filters=="dealers"){
                if($req->fromdate=="" && $req->todate==""){
                    $contracts=contract::with(['customer','dealer'])->where('dealer_id',$req->dealer)->orderBy('id','desc')->get();
                }else if($req->todate==""){
                    $contracts=contract::with(['customer','dealer'])->where('dealer_id',$req->dealer)->whereDate('created_at', '>',$req->fromdate)->orderBy('id','desc')->get();
                }else if($req->fromdate==""){
                    $contracts=contract::with(['customer','dealer'])->where('dealer_id',$req->dealer)->whereDate('created_at', '<',$req->todate)->orderBy('id','desc')->get();
                }else{
                    $contracts=contract::with(['customer','dealer'])->where('dealer_id',$req->dealer)->whereDate('created_at', '>=',$req->fromdate)->whereDate('created_at', '<=',$req->todate)->orderBy('id','desc')->get();
                }
            
            }else if($req->filters=="all"){
                if($req->fromdate=="" && $req->todate==""){
                    $contracts=contract::get();
                }else if($req->todate==""){
                    $contracts=contract::with(['customer','dealer'])->whereDate('created_at', '>',$req->fromdate)->orderBy('id','desc')->get();
                }else if($req->fromdate==""){
                    $contracts=contract::with(['customer','dealer'])->whereDate('created_at', '<',$req->todate)->orderBy('id','desc')->get();
                }else{
                    $contracts=contract::with(['customer','dealer'])->whereDate('created_at', '>=',$req->fromdate)->whereDate('created_at', '<=',$req->todate)->orderBy('id','desc')->get();
                }
                
                
            }
            
            $contract_count=count($contracts);
            $customer_paid_sum=0.0;
            $customer_paid_counts=0;
            $customer_unpaid_sum=0.0;
            $customer_unpaid_counts=0;
            $dealer_paid_sum=0.0;
            $dealer_paid_counts=0;
            $dealer_unpaid_sum=0.0;
            $dealer_unpaid_counts=0;

            if(count($contracts)>0){
                


                if($req->filters=="customers"){
                    foreach($contracts as $contract){
                    
                        $amount_to_pay=invoices::where('status','1')->where('contract_id',$contract->id)->sum('total_amount_to_pay');
                        $late_fee=invoices::where('status','1')->where('contract_id',$contract->id)->sum('late_fee');
                        $customer_paid_sum+=($amount_to_pay+$late_fee);
                        $paid_count=invoices::where('status','1')->where('contract_id',$contract->id)->count();
                        $customer_paid_counts+=$paid_count;
        
                        $amount_to_pay=invoices::where('status','0')->where('contract_id',$contract->id)->sum('total_amount_to_pay');
                        $late_fee=invoices::where('status','0')->where('contract_id',$contract->id)->sum('late_fee');
                        $customer_unpaid_sum+=($amount_to_pay+$late_fee);
                        $unpaid_count=invoices::where('status','0')->where('contract_id',$contract->id)->count();
                        $customer_unpaid_counts+=$unpaid_count;
                    }
                
                }else if($req->filters=="dealers"){
                    foreach($contracts as $contract){
                    
                        $amount_to_pay=dealer_invoices::where('status','1')->where('contract_id',$contract->id)->sum('amount');
                        
                        $dealer_paid_sum+=$amount_to_pay;
                        $paid_count=dealer_invoices::where('status','1')->where('contract_id',$contract->id)->count();
                        $dealer_paid_counts+=$paid_count;
        
                        $amount_to_pay=dealer_invoices::where('status','0')->where('contract_id',$contract->id)->sum('amount');
                        $dealer_unpaid_sum+=$amount_to_pay;
                        $unpaid_count=dealer_invoices::where('status','0')->where('contract_id',$contract->id)->count();
                        $dealer_unpaid_counts+=$unpaid_count;
                    }
                    
                }else if($req->filters=="all"){
                    foreach($contracts as $contract){
                        //customer
                        $amount_to_pay=invoices::where('status','1')->where('contract_id',$contract->id)->sum('total_amount_to_pay');
                        $late_fee=invoices::where('status','1')->where('contract_id',$contract->id)->sum('late_fee');
                        $customer_paid_sum+=($amount_to_pay+$late_fee);
                        $paid_count=invoices::where('status','1')->where('contract_id',$contract->id)->count();
                        $customer_paid_counts+=$paid_count;
        
                        $amount_to_pay=invoices::where('status','0')->where('contract_id',$contract->id)->sum('total_amount_to_pay');
                        $late_fee=invoices::where('status','0')->where('contract_id',$contract->id)->sum('late_fee');
                        $customer_unpaid_sum+=($amount_to_pay+$late_fee);
                        $unpaid_count=invoices::where('status','0')->where('contract_id',$contract->id)->count();
                        $customer_unpaid_counts+=$unpaid_count;

                        //dealer 
                        $amount_to_pay=dealer_invoices::where('status','1')->where('contract_id',$contract->id)->sum('amount');
                        
                        $dealer_paid_sum+=$amount_to_pay;
                        $paid_count=dealer_invoices::where('status','1')->where('contract_id',$contract->id)->count();
                        $dealer_paid_counts+=$paid_count;
        
                        $amount_to_pay=dealer_invoices::where('status','0')->where('contract_id',$contract->id)->sum('amount');
                        $dealer_unpaid_sum+=$amount_to_pay;
                        $unpaid_count=dealer_invoices::where('status','0')->where('contract_id',$contract->id)->count();
                        $dealer_unpaid_counts+=$unpaid_count;
                    }
                  
                }

                return view('employee/manager/view_reports',compact(['filter','dealers','customers','customer_paid_sum','customer_paid_counts','customer_unpaid_sum','customer_unpaid_counts','dealer_paid_sum','dealer_paid_counts','dealer_unpaid_sum','dealer_unpaid_counts','contracts','contract_count']));
            }else{
                return view('employee/manager/view_reports',compact(['filter','dealers','customers','customer_paid_sum','customer_paid_counts','customer_unpaid_sum','customer_unpaid_counts','dealer_paid_sum','dealer_paid_counts','dealer_unpaid_sum','dealer_unpaid_counts','contracts','contract_count']));
                
            }
        }
        
    }
    public function contract_invoice_dealer($contract_id)
    {
        $invoices=dealer_invoices::with('dealer')->where('contract_id',$contract_id)->get();
        // dd($invoices);
        return view('employee/manager/contract_invoice_status_dealer',compact('invoices'));
    }
    public function contract_invoice_customer($contract_id)
    {
        $current_date=date('Y-m-d');
        $increased_date=date('Y-m-d',strtotime('+10 days'));

        $pend_in=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','0')->where('due_date','<',$current_date)->orderBy('id','desc')->get();
        $in=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','0')->whereBetween('due_date',[$current_date,$increased_date])->orderBy('id','desc')->get();
        $paid=invoices::with(['contract','contract.contract_type'])->where('contract_id',$contract_id)->where('status','1')->get();
        // $invoices=invoices::with('customer')->where('contract_id',$contract_id)->get();
        // dd($invoices);
        return view('employee/manager/contract_invoice_status_customer',compact(['in','paid','pend_in']));
    }
    public function upload_contract_docs(Request $req)
    {   
        // dd($req->ticket_id);
        $validator = Validator::make($req->all(),[
            'contract_id'=>'required',
            'employee_id'=>'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('error_msg', $validator->errors()->first());
        }else{
            $contractdoc=$req->file('file')->store('employee_docs');
            if($contractdoc){
                $add_docs=new employee_docs;
                $add_docs->employee_id=$req->employee_id;
                $add_docs->contract_id=$req->contract_id;
                $add_docs->document=$contractdoc;
                $add_docs->save();
                // dd($req->ticket_id);
            }else{
                return redirect()->back()->with('error_msg', "Unable to upload document");
            }
            
        }   
    }
}