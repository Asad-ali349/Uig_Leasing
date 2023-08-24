<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\employees;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordRecoverMail;
class employeeController extends Controller
{   
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/employee');
    }
    public function index()
    {
        return view('employee/index');
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
        }else{
            // return $req;
            if(Auth::guard('employee')->attempt(['email'=>$req->email,'password'=>$req->password]))
            {
                ///////////////////take to dashboard
                $profile_status=$this->calculate_profile();
                    session(['profile_status' => $profile_status]);
                if(Auth::guard('employee')->user()->role_id == 1)
                {
                    // admin
                    return redirect('employee/admin/dashboard');
                }
                else if(Auth::guard('employee')->user()->role_id == 2)
                {
                    // manager
                    return redirect('employee/manager/dashboard');
                }
                else if(Auth::guard('employee')->user()->role_id == 3)
                {
                    // accountant
                    return redirect('employee/account/dashboard');
                }
                else if(Auth::guard('employee')->user()->role_id == 4)
                {
                    // helpdesk
                    return redirect('employee/helpdesk/dashboard');
                }
                else if(Auth::guard('employee')->user()->role_id == 5)
                {
                    // helpdesk
                    return redirect('employee/account_pay/dashboard');
                }
                else if(Auth::guard('employee')->user()->role_id == 6)
                {
                    // helpdesk
                    return redirect('employee/account_receive/dashboard');
                }
                else if(Auth::guard('employee')->user()->role_id == 8)
                {
                    // helpdesk
                    return redirect('employee/customer_service/dashboard');
                }
                else if(Auth::guard('employee')->user()->role_id == 7)
                {
                    // helpdesk
                    return redirect('employee/dealer_service/dashboard');
                }
            }
            else
            {
                //////////////////////error msg password not correct
                return redirect()->back()->with('error_msg', "Incorrect Password");
            }
        }         
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
            $user_id=Auth::guard('employee')->user()->id;
            // Hash::make($req->oldpassword);
            // dd();
            if(Hash::check($req->oldpassword,Auth::guard('employee')->user()->password)){

                if($req->newpass==$req->cpass){
                    $update_pass=employees::where('id',$user_id)->update([
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
    public function forget_password()
    {
        return view('employee/forget_password');
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
            $get_user=employees::where('email',$req->email)->first();
            if($get_user!=null){
                $userid=$get_user->id;
                $token = Str::random(32);
                $updatetoken=employees::where('id',$userid)->update([
                    'token'=>$token,
                ]);
                $url="localhost/lease/employee/recover_password/".$token;
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
        $user=employees::where('token',$token)->first();
        if($user!=null){

            return view('employee/recover_password',compact('token'));
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
                $update_pass=employees::where('token',$req->user_token)->update([
                    'password'=>Hash::make($req->newpass),
                ]);
                if($update_pass){
                    $update_pass=employees::where('token',$req->user_token)->update([
                        'token'=>null,
                    ]);
                    return redirect('/employee')->with('success_msg', "password updated successfully");
                }else{
                    return redirect()->back()->with('error_msg', "unable to update password");
                }
            }else{
                return redirect()->back()->with('error_msg', "new password and confirm password are not matched");
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
