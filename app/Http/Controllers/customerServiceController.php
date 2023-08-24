<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
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
// use App\Models\customer_docs;
// use App\Models\dealer_ticket;
use App\Models\dealer_ticket_docs;
use App\Models\dealer_bank;

class customerServiceController extends Controller
{
    public function employee_info()
    {
        $user_id=Auth::guard('employee')->user()->id;
        $employee=employees::where('id',$user_id)->first();
        return view('employee/customer_service/employee_info',compact('employee'));
    }
    public function edit_employee_info()
    {
        # code...
        $user_id=Auth::guard('employee')->user()->id;
        $employee=employees::where('id',$user_id)->first();
        // dd($employee);
        return view('employee/customer_service/edit_employee_info',compact('employee'));
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
    
    public function create_ticket()
    {
        
        return view('employee/customer_service/create_ticket');
    }

    public function view_detail_ticket_dealer($id)
    {   
        $ticket=dealer_ticket::with(['ticket_docs','ticket_type'])->where('id',$id)->first();
        return view('employee/customer_service/view_detail_ticket_dealer',compact('ticket'));
    }
    public function view_detail_ticket_customer($id)
    {   
        $ticket=customer_ticket::with(['ticket_docs','ticket_type'])->where('id',$id)->first();
        return view('employee/customer_service/view_detail_ticket_customer',compact('ticket'));
    }
    public function non_approved_ticket()
    {
        // $user_id=Auth::guard('dealer')->user()->id;
        $customer_tickets=customer_ticket::with(['ticket_type','customer'])->where('ticket_category_id','5')->orderBy('id','desc')->get();
        $dealer_tickets=dealer_ticket::with(['ticket_type','dealer'])->where('ticket_category_id','5')->orderBy('id','desc')->get();
        // dd($dealer_tickets);
        return view('employee/customer_service/non_approved_ticket',compact(['customer_tickets','dealer_tickets']));
    }
    public function dashboard()
    {
        $non_contracts=contract::where('contract.status','1')->get()->count();
        $ap_contracts=contract::where('contract.status','2')->get()->count();
        $rej_contracts=contract::where('contract.status','0')->get()->count();
         // customer tickets
        $non_customer_tickets=customer_ticket::where('ticket_category_id','5')->where('ticket_status_id','1')->get()->count();
        $ip_customer_tickets=customer_ticket::where('ticket_category_id','5')->where('ticket_status_id','2')->get()->count();
        $comp_customer_tickets=customer_ticket::where('ticket_category_id','5')->where('ticket_status_id','3')->get()->count();
        // dealer tickets
        $non_dealer_tickets=dealer_ticket::where('ticket_status_id','1')->where('ticket_category_id','5')->get()->count();
        $ip_dealer_tickets=dealer_ticket::where('ticket_status_id','2')->where('ticket_category_id','5')->get()->count();
        $comp_dealer_tickets=dealer_ticket::where('ticket_status_id','3')->where('ticket_category_id','5')->get()->count();
        $non_ticket=$non_customer_tickets+$non_dealer_tickets;
        $ip_ticket=$ip_customer_tickets+$ip_dealer_tickets;
        $comp_ticket=$comp_customer_tickets+$comp_dealer_tickets;


        $customers=customer::where('status','1')->get()->count();
        $dealers=dealer::where('status','1')->get()->count();
        return view('employee/customer_service/dashboard',compact(['non_contracts','ap_contracts','rej_contracts','non_ticket','ip_ticket','comp_ticket','customers','dealers']));
    }
    public function view_customers()
    {
        $customers=customer::orderBy('id','desc')->get();
        return view('employee/customer_service/view_customers',compact('customers'));
    }
    public function view_dealers()
    {
        $dealers=dealer::orderBy('id','desc')->get();
        return view('employee/customer_service/view_dealers',compact('dealers'));
    }
    public function dealer_info($id)
    {
        $user= dealer::with(['contract','bank'])->where('id',$id)->first();
        $contracts=contract::with(['contract_type','customer'])->where('dealer_id',$id)->orderBy('id','desc')->get();
        return view('employee/customer_service/dealer_info',compact(['user','contracts']));
    }
    public function customer_details($id)
    {
        $customer=customer::with(['income','relative','bank','contracts.contract_type'])->where('id',$id)->first();
        return view('employee/customer_service/customer_details',compact('customer'));
        
    }
    public function change_password()
    {
        return view('employee/customer_service/change_password');
    }
    public function non_approved_contract()
    {
        $contracts=contract::with(['contract_type','customer','dealer'])->where('contract.status','1')->orderBy('id','desc')->get();
        return view('employee/customer_service/non_approved_contract',compact('contracts'));
    }
    public function approved_contract()
    {
        $contracts=contract::with(['contract_type','customer','dealer'])->where('contract.status','2')->orderBy('id','desc')->get();
        return view('employee/customer_service/approved_contract',compact('contracts'));
    }
    public function rejected_contract()
    {
        $contracts=contract::with(['contract_type','customer','dealer'])->where('contract.status','0')->orderBy('id','desc')->get();
        return view('employee/customer_service/rejected_contract',compact('contracts'));
    }
    public function contract_detail($id)
    {
        $get_contract=contract::with(['contract_products','contract_type','customer_docs','customer','dealer','dealer_docs','employee_docs'])->where('id',$id)->first();
        // dd($get_contract);
        return view('employee/customer_service/contract_detail',compact('get_contract'));
    }
    public function invoice_detail_page($id)
    {
        $contract=contract::with(['customer','dealer','contract_products'])->where('id',$id)->first();
        return view('employee/customer_service/invoice_detail_page',compact('contract'));
    }
    public function add_notes()
    {
        return view('employee/customer_service/add_notes');
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
        return view('employee/customer_service/view_notes',compact('notes'));
    }
    public function edit_notes($id)
    {
        $notes=employee_notes::where("id",$id)->first();
        return view('employee/customer_service/edit_notes',compact('notes'));
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
        return view('employee/customer_service/add_task');
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
        return view('employee/customer_service/view_todo_list',compact('tasks'));
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
}
