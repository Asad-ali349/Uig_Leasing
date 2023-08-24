<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\dealerController;
use App\Http\Controllers\helpdeskController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\accountPayController;
use App\Http\Controllers\accountRecieveController;
use App\Http\Controllers\dealerServiceController;
use App\Http\Controllers\customerServiceController;
use App\Http\Controllers\employeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// -----------------------------------------------Dealer----------------------------------------------//



// Route::get('/customer/gg/{contract_id}/{amount}/{dealer_id}',[customerController::class,'dealer_invoices']);

Route::get('/dealer',[dealerController::class,'index']);

Route::post('dealer/login',[dealerController::class,'login']);
Route::post('dealer/logout',[dealerController::class,'logout']);
Route::get('/dealer/register',[dealerController::class,'register']);
Route::get('/dealer/verification',[dealerController::class,'verification']);
Route::post('dealer/createdealer',[dealerController::class,'createdealer']);
Route::get('/dealer/verify/{token}',[dealerController::class,'verify']);
Route::get('/dealer/resendVerification/{id}',[dealerController::class,'resendverification']);
Route::get('/dealer/forget_password',[dealerController::class,'forget_password']);
Route::post('/dealer/submit_forget_password',[dealerController::class,'submit_forget_password']);
Route::get('/dealer/recover_password/{token}',[dealerController::class,'recover_password']);
Route::post('/dealer/submit_recover_password',[dealerController::class,'submit_recover_password']);

Route::group(['middleware'=>['auth:dealer']],function(){
    Route::post('dealer/update_dealer',[dealerController::class,'update_dealer']);
    Route::post('/dealer/submit_ticket',[dealerController::class,'submit_ticket']);
    Route::post('/dealer/upload_ticket_docs',[dealerController::class,'upload_ticket_docs']);
    Route::get('/dealer/view_detail_ticket/{id}',[dealerController::class,'view_detail_ticket']);
    Route::post('/dealer/submit_contract',[dealerController::class,'submit_contract']);
    Route::get('/dealer/edit_dealer_info',[dealerController::class,'edit_dealer_info']);
    Route::get('/dealer/dealer_info',[dealerController::class,'dealer_info']);
    Route::get('/dealer/dashboard',[dealerController::class,'dashboard']);
    Route::get('/dealer/add_customer',[dealerController::class,'add_customer']);
    Route::get('/dealer/add_contract_existing_customer',[dealerController::class,'add_contract_existing_customer']);
    Route::post('/dealer/submit_contract_existing_customer',[dealerController::class,'submit_contract_existing_customer']);
    Route::get('/dealer/create_ticket',[dealerController::class,'create_ticket']);
    Route::post('/dealer/calculate_customer_profile',[dealerController::class,'calculate_customer_profile']);
    Route::get('/dealer/non_approved_contract',[dealerController::class,'non_approved_contract']);
    Route::get('/dealer/approved_contract',[dealerController::class,'approved_contract']);
    Route::get('/dealer/rejected_contract',[dealerController::class,'rejected_contract']);
    Route::get('/dealer/non_approved_ticket',[dealerController::class,'non_approved_ticket']);
    Route::get('/dealer/approved_ticket',[dealerController::class,'approved_ticket']);
    Route::get('/dealer/completed_ticket',[dealerController::class,'completed_ticket']);
    Route::get('/dealer/rejected_ticket',[dealerController::class,'rejected_ticket']);
    Route::get('/dealer/add_notes',[dealerController::class,'add_notes']);
    Route::get('/dealer/view_notes',[dealerController::class,'view_notes']);
    Route::get('/dealer/view_customers',[dealerController::class,'view_customers']);
    Route::get('/dealer/customer_details/{id}',[dealerController::class,'customer_details']);
    Route::get('/dealer/change_password',[dealerController::class,'change_password']);
    Route::post('/dealer/submit_change_password',[dealerController::class,'submit_change_password']);
    Route::get('/dealer/contract_detail/{id}',[dealerController::class,'contract_detail']);
    Route::get('/dealer/invoice_detail_page/{contract_id}',[dealerController::class,'invoice_detail_page']);
    Route::get('/dealer/view_transaction',[dealerController::class,'view_transaction']);
    Route::post('/dealer/upload_contract_docs',[dealerController::class,'upload_contract_docs']);
    Route::post('/dealer/submit_notes',[dealerController::class,'submit_notes']);
    Route::get('/dealer/edit_notes/{id}',[dealerController::class,'edit_notes']);
    Route::post('/dealer/submit_edit_notes',[dealerController::class,'submit_edit_notes']);
    Route::get('/dealer/mark_as_done_notes/{id}',[dealerController::class,'mark_as_done_notes']);
    Route::get('/dealer/delete_notes/{id}',[dealerController::class,'delete_notes']);

    Route::get('/dealer/dealer_due_invoice',[dealerController::class,'dealer_due_invoice']);
    Route::get('/dealer/dealer_paid_invoice',[dealerController::class,'dealer_paid_invoice']);
    Route::get('/dealer/dealer_invoice_detail/{invoice_id}',[dealerController::class,'dealer_invoice_detail']);
});


// ---------------------------------------------End Dealer----------------------------------------------//



// -----------------------------------------------Customer----------------------------------------------//
Route::get('/customer',[customerController::class,'index']);
Route::post('/login',[customerController::class,'login']);
Route::get('/customer/register',[customerController::class,'register']);
Route::post('createCustomer',[customerController::class,'createCustomer']);
Route::get('/customer/verification',[customerController::class,'verification']);
Route::get('/customer/verify/{token}',[customerController::class,'verify']);
Route::get('/customer/resendVerification/{id}',[customerController::class,'resendverification']);
Route::post('/customer/logout',[customerController::class,'logout']);
Route::get('/customer/forget_password',[customerController::class,'forget_password']);
Route::get('/customer/recover_password/{token}',[customerController::class,'recover_password']);
Route::post('/customer/submit_recover_password',[customerController::class,'submit_recover_password']);
Route::post('/customer/submit_forget_password',[customerController::class,'submit_forget_password']);
Route::get('/customer/make_due_Invoices/{contractId}/{duration}/{paymentmethod}/{amount}/{interest_rate}',[customerController::class,'make_due_Invoices']);
// Route::get('/customer/calculate_profile',[customerController::class,'calculate_profile']);
Route::group(['middleware'=>['auth:customer']],function(){
    
    Route::get('/customer/contract_pdf/{id}',[customerController::class,'contract_pdf']);
    Route::get('/customer/dashboard',[customerController::class,'dashboard']);
    Route::get('/customer/edit_customer_info',[customerController::class,'edit_customer_info']);
    Route::post('/customer/updateprofile',[customerController::class,'updateprofile']);
    Route::get('/customer/customer_info',[customerController::class,'customer_info']);
    Route::get('/customer/add_contract',[customerController::class,'add_contract']);
    Route::post('/customer/submit_contract',[customerController::class,'submit_contract']);
    Route::get('/customer/create_ticket',[customerController::class,'create_ticket']);
    Route::post('/customer/submit_ticket',[customerController::class,'submit_ticket']);
    Route::post('/customer/upload_ticket_docs',[customerController::class,'upload_ticket_docs']);
    Route::get('/customer/view_detail_ticket/{id}',[customerController::class,'view_detail_ticket']);
    Route::get('/customer/non_approved_contract',[customerController::class,'non_approved_contract']);
    Route::get('/customer/approved_contract',[customerController::class,'approved_contract']);
    Route::get('/customer/rejected_contract',[customerController::class,'rejected_contract']);
    Route::get('/customer/non_approved_ticket',[customerController::class,'non_approved_ticket']);
    Route::get('/customer/approved_ticket',[customerController::class,'approved_ticket']);
    Route::get('/customer/completed_ticket',[customerController::class,'completed_ticket']);
    Route::get('/customer/rejected_ticket',[customerController::class,'rejected_ticket']);
    Route::get('/customer/add_notes',[customerController::class,'add_notes']);
    Route::post('/customer/submit_notes',[customerController::class,'submit_notes']);
    Route::get('/customer/edit_notes/{id}',[customerController::class,'edit_notes']);
    Route::post('/customer/submit_edit_notes',[customerController::class,'submit_edit_notes']);
    Route::get('/customer/view_notes',[customerController::class,'view_notes']);
    Route::get('/customer/mark_as_done_notes/{id}',[customerController::class,'mark_as_done_notes']);
    Route::get('/customer/delete_notes/{id}',[customerController::class,'delete_notes']);
    Route::get('/customer/view_dealers',[customerController::class,'view_dealers']);
    Route::get('/customer/dealer_info/{id}',[customerController::class,'dealer_info']);
    Route::get('/customer/customer_details',[customerController::class,'customer_details']);

    Route::get('/customer/bank_account_verification',[customerController::class,'bank_verification'])->name('bankVerificationRoute');
    
    Route::get('/customer/change_password',[customerController::class,'change_password']);
    Route::post('/customer/submit_change_password',[customerController::class,'submit_change_password']);
    Route::get('/customer/contract_detail/{id}',[customerController::class,'contract_detail']);
    Route::post('/customer/upload_contract_docs',[customerController::class,'upload_contract_docs']);
    // Route::get('/customer/verify/{token}',[customerController::class,'verify']);
    Route::get('/customer/invoice_detail_page/{contract_id}',[customerController::class,'invoice_detail_page']);
    Route::get('/customer/view_transaction',[customerController::class,'view_transaction']);
    Route::get('/customer/due_invoice_contracts',[customerController::class,'due_invoice_contracts']);
    Route::get('/customer/due_invoice/{contract_id}',[customerController::class,'due_invoice']);
    Route::get('/customer/due_invoice_detail/{invoice_id}',[customerController::class,'due_invoice_detail']);
    Route::get('/customer/paid_invoice_detail/{invoice_id}',[customerController::class,'paid_invoice_detail']);
    Route::get('/customer/paid_invoice_contracts',[customerController::class,'paid_invoice_contracts']);
    Route::get('/customer/paid_invoice/{contract_id}',[customerController::class,'paid_invoice']);

});

// ---------------------------------------------End Customer----------------------------------------------//



// ---------------------------------------------Employee----------------------------------------------//

Route::get('/employee',[employeeController::class,'index']);
Route::post('/employee/login',[employeeController::class,'login']);

Route::get('/employee/register', function () {
    return view('employee/register');
});
Route::get('/employee/verification', function () {
    return view('employee/verification');
});
Route::get('/employee/forget_password', [employeeController::class,'forget_password']);
Route::post('employee/submit_forget_password',[employeeController::class,'submit_forget_password']);
Route::get('employee/recover_password/{token}',[employeeController::class,'recover_password']);
Route::post('employee/submit_recover_password',[employeeController::class,'submit_recover_password']);
Route::post('employee/change_password',[employeeController::class,'submit_change_password']);
Route::post('employee/logout',[employeeController::class,'logout']);
//--------------------------------------------- End Employee-------------------------------------------------//



//--------------------------------------------- Help Desk-------------------------------------------------//

Route::group(['middleware'=>['auth:employee','helpdesk']],function(){
    Route::get('/employee/helpdesk/customer_info',[helpdeskController::class,'customer_info']);
    Route::get('/employee/helpdesk/calculate_profile',[helpdeskController::class,'calculate_profile']);
    Route::get('/employee/helpdesk/dealer_info/{id}',[helpdeskController::class,'dealer_info']);
    Route::get('/employee/helpdesk/employee_info',[helpdeskController::class,'employee_info']);
    Route::get('/employee/helpdesk/edit_employee_info',[helpdeskController::class,'edit_employee_info']);
    Route::post('/employee/helpdesk/update_employee_info',[helpdeskController::class,'update_employee_info']);
    Route::get('/employee/helpdesk/view_dealers',[helpdeskController::class,'view_dealers']);
    Route::get('/employee/helpdesk/forget_password',[helpdeskController::class,'forget_password']);
    Route::get('/employee/helpdesk/dashboard',[helpdeskController::class,'dashboard']);
    Route::get('/employee/helpdesk/add_contract',[helpdeskController::class,'add_contract']);
    Route::get('/employee/helpdesk/create_ticket',[helpdeskController::class,'create_ticket']);
    Route::get('/employee/helpdesk/non_approved_contract',[helpdeskController::class,'non_approved_contract']);
    Route::get('/employee/helpdesk/approved_contract',[helpdeskController::class,'approved_contract']);
    Route::get('/employee/helpdesk/rejected_contract',[helpdeskController::class,'rejected_contract']);
    Route::get('/employee/helpdesk/non_approved_ticket',[helpdeskController::class,'non_approved_ticket']);
    Route::get('/employee/helpdesk/approved_ticket',[helpdeskController::class,'approved_ticket']);
    Route::get('/employee/helpdesk/completed_ticket',[helpdeskController::class,'completed_ticket']);
    Route::get('/employee/helpdesk/rejected_ticket',[helpdeskController::class,'rejected_ticket']);
    Route::get('/employee/helpdesk/view_customers',[helpdeskController::class,'view_customers']);
    Route::get('/employee/helpdesk/customer_details/{id}',[helpdeskController::class,'customer_details']);
    Route::get('/employee/helpdesk/change_password',[helpdeskController::class,'change_password']);
    Route::get('/employee/helpdesk/contract_detail/{id}',[helpdeskController::class,'contract_detail']);
    Route::get('/employee/helpdesk/invoice_detail_page/{contract_id}',[helpdeskController::class,'invoice_detail_page']);
    Route::get('/employee/helpdesk/view_detail_ticket_dealer/{id}',[helpdeskController::class,'view_detail_ticket_dealer']);
    Route::get('/employee/helpdesk/view_detail_ticket_customer/{id}',[helpdeskController::class,'view_detail_ticket_customer']);
    Route::get('/employee/helpdesk/add_notes',[helpdeskController::class,'add_notes']);
    Route::get('/employee/helpdesk/view_notes',[helpdeskController::class,'view_notes']);
    Route::post('/employee/helpdesk/submit_notes',[helpdeskController::class,'submit_notes']);
    Route::get('/employee/helpdesk/edit_notes/{id}',[helpdeskController::class,'edit_notes']);
    Route::post('/employee/helpdesk/submit_edit_notes',[helpdeskController::class,'submit_edit_notes']);
    Route::get('/employee/helpdesk/mark_as_done_notes/{id}',[helpdeskController::class,'mark_as_done_notes']);
    Route::get('/employee/helpdesk/delete_notes/{id}',[helpdeskController::class,'delete_notes']);
    Route::get('/employee/helpdesk/add_task',[helpdeskController::class,'add_task']);
    Route::get('/employee/helpdesk/view_todo_list',[helpdeskController::class,'view_todo_list']);
    Route::post('/employee/helpdesk/submit_task',[helpdeskController::class,'submit_task']);
    Route::get('/employee/helpdesk/delete_tasks/{id}',[helpdeskController::class,'delete_tasks']);
    Route::get('/employee/helpdesk/mark_as_done_tasks/{id}',[helpdeskController::class,'mark_as_done_tasks']);
    Route::get('/employee/helpdesk/change_customer_ticket_status/{id}/{status}',[helpdeskController::class,'change_customer_ticket_status']);
    Route::get('/employee/helpdesk/change_dealer_ticket_status/{id}/{status}',[helpdeskController::class,'change_dealer_ticket_status']);
    Route::post('/employee/helpdesk/upload_contract_docs',[helpdeskController::class,'upload_contract_docs']);
});

//---------------------------------------------End help desk-------------------------------------------------//



//---------------------------------------------Account-------------------------------------------------//

Route::group(['middleware'=>['auth:employee','account']],function(){
    Route::get('/employee/account/employee_info',[accountController::class,'employee_info']);
    Route::get('/employee/account/edit_employee_info',[accountController::class,'edit_employee_info']);
    Route::post('/employee/account/update_employee_info',[accountController::class,'update_employee_info']);
    Route::get('/employee/account/customer_info',[accountController::class,'customer_info']);
    Route::get('/employee/account/dealer_info/{id}',[accountController::class,'dealer_info']);
    Route::get('/employee/account/view_dealers',[accountController::class,'view_dealers']);
    Route::get('/employee/account/forget_password',[accountController::class,'forget_password']);
    Route::get('/employee/account/dashboard',[accountController::class,'dashboard']);
    Route::get('/employee/account/add_contract',[accountController::class,'add_contract']);
    Route::get('/employee/account/create_ticket',[accountController::class,'create_ticket']);
    Route::get('/employee/account/non_approved_contract',[accountController::class,'non_approved_contract']);
    Route::get('/employee/account/approved_contract',[accountController::class,'approved_contract']);
    Route::get('/employee/account/rejected_contract',[accountController::class,'rejected_contract']);
    Route::get('/employee/account/non_approved_ticket',[accountController::class,'non_approved_ticket']);
    Route::get('/employee/account/approved_ticket',[accountController::class,'approved_ticket']);
    Route::get('/employee/account/completed_ticket',[accountController::class,'completed_ticket']);
    Route::get('/employee/account/rejected_ticket',[accountController::class,'rejected_ticket']);
    Route::get('/employee/account/add_notes',[accountController::class,'add_notes']);
    Route::get('/employee/account/view_notes',[accountController::class,'view_notes']);
    Route::post('/employee/account/submit_notes',[accountController::class,'submit_notes']);
    Route::get('/employee/account/edit_notes/{id}',[accountController::class,'edit_notes']);
    Route::post('/employee/account/submit_edit_notes',[accountController::class,'submit_edit_notes']);
    Route::get('/employee/account/mark_as_done_notes/{id}',[accountController::class,'mark_as_done_notes']);
    Route::get('/employee/account/delete_notes/{id}',[accountController::class,'delete_notes']);
    Route::get('/employee/account/view_customers',[accountController::class,'view_customers']);
    Route::get('/employee/account/customer_details/{id}',[accountController::class,'customer_details']);
    Route::get('/employee/account/change_password',[accountController::class,'change_password']);
    Route::get('/employee/account/contract_detail/{id}',[accountController::class,'contract_detail']);
    Route::get('/employee/account/invoice_detail_page/{contract_id}',[accountController::class,'invoice_detail_page']);
    Route::get('/employee/account/add_task',[accountController::class,'add_task']);
    Route::get('/employee/account/view_todo_list',[accountController::class,'view_todo_list']);
    Route::post('/employee/account/submit_task',[accountController::class,'submit_task']);
    Route::get('/employee/account/delete_tasks/{id}',[accountController::class,'delete_tasks']);
    Route::get('/employee/account/mark_as_done_tasks/{id}',[accountController::class,'mark_as_done_tasks']);
    Route::get('/employee/account/dealer_due_invoice',[accountController::class,'dealer_due_invoice']);
    Route::get('/employee/account/dealer_paid_invoice',[accountController::class,'dealer_paid_invoice']);
    Route::get('/employee/account/dealer_invoice_detail/{invoice_id}',[accountController::class,'dealer_invoice_detail']);
    Route::get('/employee/account/due_invoice_contract',[accountController::class,'due_invoice_contract']);
    Route::get('/employee/account/due_invoice/{contract_id}',[accountController::class,'due_invoice']);
    Route::get('/employee/account/due_invoice_detail/{contract_id}',[accountController::class,'due_invoice_detail']);
    Route::get('/employee/account/paid_invoice_contract',[accountController::class,'paid_invoice_contract']);
    Route::get('/employee/account/paid_invoice/{contract_id}',[accountController::class,'paid_invoice']);
    Route::get('/employee/account/paid_invoice_detail/{contract_id}',[accountController::class,'paid_invoice_detail']);
    Route::get('/employee/account/view_reports',[accountController::class,'view_reports']);
    Route::get('/employee/account/change_customer_ticket_status/{id}/{status}',[accountController::class,'change_customer_ticket_status']);
    Route::get('/employee/account/change_dealer_ticket_status/{id}/{status}',[accountController::class,'change_dealer_ticket_status']);
    Route::post('/employee/account/upload_contract_docs',[accountController::class,'upload_contract_docs']);
    Route::get('/employee/account/view_detail_ticket_dealer/{id}',[accountController::class,'view_detail_ticket_dealer']);
    Route::get('/employee/account/view_detail_ticket_customer/{id}',[accountController::class,'view_detail_ticket_customer']);

    Route::get('/employee/account/dealer_transaction',[accountController::class,'dealer_transaction']);
    Route::get('/employee/account/customer_transaction',[accountController::class,'customer_transaction']);
    Route::get('/employee/account/dealer_pay_invoice/{invoice_id}',[accountController::class,'dealer_pay_invoice']);
});
//--------------------------------------------- EndAccount-------------------------------------------------//

//---------------------------------------------manager-------------------------------------------------//
Route::group(['middleware'=>['auth:employee','manager']],function(){
        
    Route::get('/employee/manager/add_employee',[managerController::class,'add_employee']);
    Route::post('/employee/manager/submit_employee',[managerController::class,'submit_employee']);
    Route::get('/employee/manager/view_employee',[managerController::class,'view_employee']);
    Route::get('/employee/manager/view_employee_detail/{id}',[managerController::class,'view_employee_detail']);

    Route::get('/employee/manager/employee_info',[managerController::class,'employee_info']);
    Route::get('/employee/manager/edit_employee_info',[managerController::class,'edit_employee_info']);
    Route::post('/employee/manager/update_employee_info',[managerController::class,'update_employee_info']);

    //Route::get('/employee/manager/customer_info',[managerController::class,'customer_info']);

    Route::get('/employee/manager/non_approved_ticket',[managerController::class,'non_approved_ticket']);
    Route::get('/employee/manager/non_approved_ticket',[managerController::class,'non_approved_ticket']);
    Route::get('/employee/manager/change_customer_ticket_status/{id}/{status}',[managerController::class,'change_customer_ticket_status']);
    Route::get('/employee/manager/change_dealer_ticket_status/{id}/{status}',[managerController::class,'change_dealer_ticket_status']);
    Route::get('/employee/manager/view_detail_ticket_dealer/{id}',[managerController::class,'view_detail_ticket_dealer']);
    Route::get('/employee/manager/view_detail_ticket_customer/{id}',[managerController::class,'view_detail_ticket_customer']);

    Route::get('/employee/manager/add_dealer',[managerController::class,'add_dealer']);
    Route::post('/employee/manager/submit_dealer',[managerController::class,'submit_dealer']);
    Route::get('/employee/manager/view_dealers',[managerController::class,'view_dealers']);
    Route::get('/employee/manager/dealer_info/{id}',[managerController::class,'dealer_info']);

    Route::get('/employee/manager/add_customer',[managerController::class,'add_customer']);
    Route::get('/employee/manager/view_customers',[managerController::class,'view_customers']);
    Route::get('/employee/manager/customer_details/{id}',[managerController::class,'customer_details']);



    Route::get('/employee/manager/forget_password',[managerController::class,'forget_password']);
    Route::get('/employee/manager/dashboard',[managerController::class,'dashboard']);


    Route::get('/employee/manager/non_approved_contract',[managerController::class,'non_approved_contract']);
    Route::get('/employee/manager/approved_contract',[managerController::class,'approved_contract']);
    Route::get('/employee/manager/rejected_contract',[managerController::class,'rejected_contract']);
    Route::get('/employee/manager/contract_detail/{id}',[managerController::class,'contract_detail']);
    Route::post('/employee/manager/upload_contract_docs',[managerController::class,'upload_contract_docs']);


    Route::get('/employee/manager/add_notes',[managerController::class,'add_notes']);
    Route::get('/employee/manager/view_notes',[managerController::class,'view_notes']);
    Route::post('/employee/manager/submit_notes',[managerController::class,'submit_notes']);
    Route::get('/employee/manager/edit_notes/{id}',[managerController::class,'edit_notes']);
    Route::post('/employee/manager/submit_edit_notes',[managerController::class,'submit_edit_notes']);
    Route::get('/employee/manager/mark_as_done_notes/{id}',[managerController::class,'mark_as_done_notes']);
    Route::get('/employee/manager/delete_notes/{id}',[managerController::class,'delete_notes']);

    Route::get('/employee/manager/change_password',[managerController::class,'change_password']);
    Route::get('/employee/manager/invoice_detail_page/{contract_id}',[managerController::class,'invoice_detail_page']);
    // Route::get('/employee/manager/view_todo_list',[managerController::class,'view_todo_list']);

    Route::get('/employee/manager/add_task',[managerController::class,'add_task']);
    Route::get('/employee/manager/view_todo_list',[managerController::class,'view_todo_list']);
    Route::post('/employee/manager/submit_task',[managerController::class,'submit_task']);
    Route::get('/employee/manager/delete_tasks/{id}',[managerController::class,'delete_tasks']);
    Route::get('/employee/manager/mark_as_done_tasks/{id}',[managerController::class,'mark_as_done_tasks']);
    Route::post('/employee/manager/upload_contract_docs',[managerController::class,'upload_contract_docs']);

    Route::get('/employee/manager/view_reports',[managerController::class,'view_reports']);

    Route::get('/employee/manager/due_invoice_contract',[managerController::class,'due_invoice_contract']);
    Route::get('/employee/manager/due_invoice/{contract_id}',[managerController::class,'due_invoice']);
    Route::get('/employee/manager/due_invoice_detail/{contract_id}',[managerController::class,'due_invoice_detail']);
    Route::get('/employee/manager/paid_invoice_contract',[managerController::class,'paid_invoice_contract']);
    Route::get('/employee/manager/paid_invoice/{contract_id}',[managerController::class,'paid_invoice']);
    Route::get('/employee/manager/paid_invoice_detail/{contract_id}',[managerController::class,'paid_invoice_detail']);

    Route::get('/employee/manager/dealer_due_invoice',[managerController::class,'dealer_due_invoice']);
    Route::get('/employee/manager/dealer_paid_invoice',[managerController::class,'dealer_paid_invoice']);
    Route::get('/employee/manager/dealer_invoice_detail/{invoice_id}',[managerController::class,'dealer_invoice_detail']);

    Route::get('/employee/manager/dealer_transaction',[managerController::class,'dealer_transaction']);
    Route::get('/employee/manager/customer_transaction',[managerController::class,'customer_transaction']);
    
    Route::post('/employee/manager/filter_invoices',[managerController::class,'filter_invoices']);
    Route::get('/employee/manager/contract_invoice_dealer/{contract_id}',[managerController::class,'contract_invoice_dealer']);
    Route::get('/employee/manager/contract_invoice_customer/{contract_id}',[managerController::class,'contract_invoice_customer']);
});
//--------------------------------------------- End Manager-------------------------------------------------//


//---------------------------------------------admin-------------------------------------------------//

Route::group(['middleware'=>['auth:employee','admin']],function(){
        
    Route::get('/employee/admin/add_employee',[adminController::class,'add_employee']);
    Route::post('/employee/admin/submit_employee',[adminController::class,'submit_employee']);
    Route::get('/employee/admin/view_employee',[adminController::class,'view_employee']);
    Route::get('/employee/admin/view_employee_detail/{id}',[adminController::class,'view_employee_detail']);

    Route::get('/employee/admin/employee_info',[adminController::class,'employee_info']);
    Route::get('/employee/admin/edit_employee_info',[adminController::class,'edit_employee_info']);
    Route::post('/employee/admin/update_employee_info',[adminController::class,'update_employee_info']);

    Route::get('/employee/admin/non_approved_ticket',[adminController::class,'non_approved_ticket']);
    Route::get('/employee/admin/non_approved_ticket',[adminController::class,'non_approved_ticket']);
    Route::get('/employee/admin/change_customer_ticket_status/{id}/{status}',[adminController::class,'change_customer_ticket_status']);
    Route::get('/employee/admin/change_dealer_ticket_status/{id}/{status}',[adminController::class,'change_dealer_ticket_status']);
    Route::get('/employee/admin/view_detail_ticket_dealer/{id}',[adminController::class,'view_detail_ticket_dealer']);
    Route::get('/employee/admin/view_detail_ticket_customer/{id}',[adminController::class,'view_detail_ticket_customer']);

    Route::get('/employee/admin/view_dealers',[adminController::class,'view_dealers']);
    Route::get('/employee/admin/dealer_info/{id}',[adminController::class,'dealer_info']);

    Route::get('/employee/admin/add_customer',[adminController::class,'add_customer']);
    Route::get('/employee/admin/view_customers',[adminController::class,'view_customers']);
    Route::get('/employee/admin/customer_details/{id}',[adminController::class,'customer_details']);

    Route::get('/employee/admin/non_approved_contract',[adminController::class,'non_approved_contract']);
    Route::get('/employee/admin/approved_contract',[adminController::class,'approved_contract']);
    Route::get('/employee/admin/rejected_contract',[adminController::class,'rejected_contract']);
    Route::get('/employee/admin/contract_detail/{id}',[adminController::class,'contract_detail']);
    Route::post('/employee/admin/upload_contract_docs',[adminController::class,'upload_contract_docs']);

    Route::get('/employee/admin/add_notes',[adminController::class,'add_notes']);
    Route::get('/employee/admin/view_notes',[adminController::class,'view_notes']);
    Route::post('/employee/admin/submit_notes',[adminController::class,'submit_notes']);
    Route::get('/employee/admin/edit_notes/{id}',[adminController::class,'edit_notes']);
    Route::post('/employee/admin/submit_edit_notes',[adminController::class,'submit_edit_notes']);
    Route::get('/employee/admin/mark_as_done_notes/{id}',[adminController::class,'mark_as_done_notes']);
    Route::get('/employee/admin/delete_notes/{id}',[adminController::class,'delete_notes']);

    Route::get('/employee/admin/add_task',[adminController::class,'add_task']);
    Route::get('/employee/admin/view_todo_list',[adminController::class,'view_todo_list']);
    Route::post('/employee/admin/submit_task',[adminController::class,'submit_task']);
    Route::get('/employee/admin/delete_tasks/{id}',[adminController::class,'delete_tasks']);
    Route::get('/employee/admin/mark_as_done_tasks/{id}',[adminController::class,'mark_as_done_tasks']);
    Route::post('/employee/admin/upload_contract_docs',[adminController::class,'upload_contract_docs']);

    Route::get('/employee/admin/dashboard',[adminController::class,'dashboard']);
    Route::get('/employee/admin/forget_password',[adminController::class,'forget_password']);
    Route::get('/employee/admin/change_password',[adminController::class,'change_password']);
    Route::get('/employee/admin/invoice_detail_page/{contract_id}',[adminController::class,'invoice_detail_page']);
    Route::get('/employee/admin/view_reports',[adminController::class,'view_reports']);
    Route::get('/employee/admin/lease_interests',[adminController::class,'lease_interest']);
    Route::post('/employee/admin/submit_lease_interest',[adminController::class,'submit_lease_interest']);
    Route::get('/employee/admin/loan_interests',[adminController::class,'loan_interest']);
    Route::post('/employee/admin/submit_loan_interest',[adminController::class,'submit_loan_interest']);
    // Route::get('/employee/admin/due_invoice',[adminController::class,'due_invoice']);
    // Route::get('/employee/admin/paid_invoice',[adminController::class,'paid_invoice']);

    Route::get('/employee/admin/due_invoice_contract',[adminController::class,'due_invoice_contract']);
    Route::get('/employee/admin/due_invoice/{contract_id}',[adminController::class,'due_invoice']);
    Route::get('/employee/admin/due_invoice_detail/{contract_id}',[adminController::class,'due_invoice_detail']);
    Route::get('/employee/admin/paid_invoice_contract',[adminController::class,'paid_invoice_contract']);
    Route::get('/employee/admin/paid_invoice/{contract_id}',[adminController::class,'paid_invoice']);
    Route::get('/employee/admin/paid_invoice_detail/{contract_id}',[adminController::class,'paid_invoice_detail']);
    
    Route::get('/employee/admin/dealer_due_invoice',[adminController::class,'dealer_due_invoice']);
    Route::get('/employee/admin/dealer_paid_invoice',[adminController::class,'dealer_paid_invoice']);
    Route::get('/employee/admin/dealer_invoice_detail/{invoice_id}',[adminController::class,'dealer_invoice_detail']);
    Route::get('/employee/admin/dealer_transaction',[adminController::class,'dealer_transaction']);
    Route::get('/employee/admin/customer_transaction',[adminController::class,'customer_transaction']);

    Route::post('/employee/admin/filter_invoices',[adminController::class,'filter_invoices']);
    Route::get('/employee/admin/contract_invoice_dealer/{contract_id}',[adminController::class,'contract_invoice_dealer']);
    Route::get('/employee/admin/contract_invoice_customer/{contract_id}',[adminController::class,'contract_invoice_customer']);
});
//--------------------------------------------- end admin-------------------------------------------------//


//--------------------------------------------- Account Pay------------------------------------------------//

Route::group(['middleware'=>['auth:employee','accountPay']],function(){

    Route::get('/employee/account_pay/dealer_info/{id}',[accountPayController::class,'dealer_info']);
    Route::get('/employee/account_pay/employee_info',[accountPayController::class,'employee_info']);
    Route::get('/employee/account_pay/edit_employee_info',[accountPayController::class,'edit_employee_info']);
    Route::post('/employee/account_pay/update_employee_info',[accountPayController::class,'update_employee_info']);
    Route::get('/employee/account_pay/view_dealers',[accountPayController::class,'view_dealers']);
    Route::get('/employee/account_pay/forget_password',[accountPayController::class,'forget_password']);
    Route::get('/employee/account_pay/dashboard',[accountPayController::class,'dashboard']);
    Route::get('/employee/account_pay/create_ticket',[accountPayController::class,'create_ticket']);
    Route::get('/employee/account_pay/non_approved_contract',[accountPayController::class,'non_approved_contract']);
    Route::get('/employee/account_pay/approved_contract',[accountPayController::class,'approved_contract']);
    Route::get('/employee/account_pay/rejected_contract',[accountPayController::class,'rejected_contract']);

    Route::get('/employee/account_pay/view_customers',[accountPayController::class,'view_customers']);
    Route::get('/employee/account_pay/customer_details/{id}',[accountPayController::class,'customer_details']);
    Route::get('/employee/account_pay/change_password',[accountPayController::class,'change_password']);
    Route::get('/employee/account_pay/contract_detail/{id}',[accountPayController::class,'contract_detail']);
    Route::post('/employee/account/upload_contract_docs',[accountPayController::class,'upload_contract_docs']);
    Route::get('/employee/account_pay/invoice_detail_page/{contract_id}',[accountPayController::class,'invoice_detail_page']);

    Route::get('/employee/account_pay/add_notes',[accountPayController::class,'add_notes']);
    Route::get('/employee/account_pay/view_notes',[accountPayController::class,'view_notes']);
    Route::post('/employee/account_pay/submit_notes',[accountPayController::class,'submit_notes']);
    Route::get('/employee/account_pay/edit_notes/{id}',[accountPayController::class,'edit_notes']);
    Route::post('/employee/account_pay/submit_edit_notes',[accountPayController::class,'submit_edit_notes']);
    Route::get('/employee/account_pay/mark_as_done_notes/{id}',[accountPayController::class,'mark_as_done_notes']);
    Route::get('/employee/account_pay/delete_notes/{id}',[accountPayController::class,'delete_notes']);

    Route::get('/employee/account_pay/add_task',[accountPayController::class,'add_task']);
    Route::get('/employee/account_pay/view_todo_list',[accountPayController::class,'view_todo_list']);
    Route::post('/employee/account_pay/submit_task',[accountPayController::class,'submit_task']);
    Route::get('/employee/account_pay/delete_tasks/{id}',[accountPayController::class,'delete_tasks']);
    Route::get('/employee/account_pay/mark_as_done_tasks/{id}',[accountPayController::class,'mark_as_done_tasks']);
    Route::post('/employee/account_pay/upload_contract_docs',[accountPayController::class,'upload_contract_docs']);

    Route::get('/employee/account_pay/non_approved_ticket',[accountPayController::class,'non_approved_ticket']);
    Route::get('/employee/account_pay/change_customer_ticket_status/{id}/{status}',[accountPayController::class,'change_customer_ticket_status']);
    Route::get('/employee/account_pay/change_dealer_ticket_status/{id}/{status}',[accountPayController::class,'change_dealer_ticket_status']);
    Route::get('/employee/account_pay/view_detail_ticket_dealer/{id}',[accountPayController::class,'view_detail_ticket_dealer']);
    Route::get('/employee/account_pay/view_detail_ticket_customer/{id}',[accountPayController::class,'view_detail_ticket_customer']);

    Route::get('/employee/account_pay/dealer_due_invoice',[accountPayController::class,'dealer_due_invoice']);
    Route::get('/employee/account_pay/dealer_invoice_detail/{contract_id}',[accountPayController::class,'dealer_invoice_detail']);
    Route::get('/employee/account_pay/dealer_paid_invoice',[accountPayController::class,'dealer_paid_invoice']);
    Route::get('/employee/account_pay/view_reports',[accountPayController::class,'view_reports']);

    Route::get('/employee/account_pay/dealer_transaction',[accountPayController::class,'dealer_transaction']);
});
//--------------------------------------------- Account receive------------------------------------------------//

Route::group(['middleware'=>['auth:employee','accountReceive']],function(){

    Route::get('/employee/account_receive/dashboard',[accountRecieveController::class,'dashboard']);
    Route::get('/employee/account_receive/employee_info',[accountRecieveController::class,'employee_info']);
    Route::get('/employee/account_receive/edit_employee_info',[accountRecieveController::class,'edit_employee_info']);
    Route::post('/employee/account_receive/update_employee_info',[accountRecieveController::class,'update_employee_info']);

    Route::get('/employee/account_receive/non_approved_ticket',[accountRecieveController::class,'non_approved_ticket']);
    Route::get('/employee/account_receive/non_approved_ticket',[accountRecieveController::class,'non_approved_ticket']);
    Route::get('/employee/account_receive/change_customer_ticket_status/{id}/{status}',[accountRecieveController::class,'change_customer_ticket_status']);
    Route::get('/employee/account_receive/change_dealer_ticket_status/{id}/{status}',[accountRecieveController::class,'change_dealer_ticket_status']);
    Route::get('/employee/account_receive/view_detail_ticket_dealer/{id}',[accountRecieveController::class,'view_detail_ticket_dealer']);
    Route::get('/employee/account_receive/view_detail_ticket_customer/{id}',[accountRecieveController::class,'view_detail_ticket_customer']);
    // Route::get('/employee/account_receive/approved_ticket',[accountRecieveController::class,'approved_ticket']);

    Route::get('/employee/account_receive/view_customers',[accountRecieveController::class,'view_customers']);
    Route::get('/employee/account_receive/customer_info',[accountRecieveController::class,'customer_info']);
    Route::get('/employee/account_receive/customer_details/{id}',[accountRecieveController::class,'customer_details']);

    // Route::get('/employee/account_receive/dealer_info',[accountRecieveController::class,'dealer_info']);
    // Route::get('/employee/account_receive/view_dealers',[accountRecieveController::class,'view_dealers']);

    Route::get('/employee/account_receive/forget_password',[accountRecieveController::class,'forget_password']);
    // Route::get('/employee/account_receive/add_contract',[accountRecieveController::class,'add_contract']);

    Route::get('/employee/account_receive/non_approved_contract',[accountRecieveController::class,'non_approved_contract']);
    Route::get('/employee/account_receive/approved_contract',[accountRecieveController::class,'approved_contract']);
    Route::get('/employee/account_receive/rejected_contract',[accountRecieveController::class,'rejected_contract']);
    Route::get('/employee/account_receive/contract_detail/{id}',[accountRecieveController::class,'contract_detail']);


    Route::get('/employee/account_receive/add_notes',[accountRecieveController::class,'add_notes']);
    Route::get('/employee/account_receive/view_notes',[accountRecieveController::class,'view_notes']);
    Route::post('/employee/account_receive/submit_notes',[accountRecieveController::class,'submit_notes']);
    Route::get('/employee/account_receive/edit_notes/{id}',[accountRecieveController::class,'edit_notes']);
    Route::post('/employee/account_receive/submit_edit_notes',[accountRecieveController::class,'submit_edit_notes']);
    Route::get('/employee/account_receive/mark_as_done_notes/{id}',[accountRecieveController::class,'mark_as_done_notes']);
    Route::get('/employee/account_receive/delete_notes/{id}',[accountRecieveController::class,'delete_notes']);

    Route::get('/employee/account_receive/add_task',[accountRecieveController::class,'add_task']);
    Route::get('/employee/account_receive/view_todo_list',[accountRecieveController::class,'view_todo_list']);
    Route::post('/employee/account_receive/submit_task',[accountRecieveController::class,'submit_task']);
    Route::get('/employee/account_receive/delete_tasks/{id}',[accountRecieveController::class,'delete_tasks']);
    Route::get('/employee/account_receive/mark_as_done_tasks/{id}',[accountRecieveController::class,'mark_as_done_tasks']);
    Route::post('/employee/account_receive/upload_contract_docs',[accountRecieveController::class,'upload_contract_docs']);

    Route::get('/employee/account_receive/change_password',[accountRecieveController::class,'change_password']);
    Route::get('/employee/account_receive/invoice_detail_page/{contract_id}',[accountRecieveController::class,'invoice_detail_page']);


    Route::get('/employee/account_receive/due_invoice_contract',[accountRecieveController::class,'due_invoice_contract']);
    Route::get('/employee/account_receive/due_invoice/{contract_id}',[accountRecieveController::class,'due_invoice']);
    Route::get('/employee/account_receive/due_invoice_detail/{contract_id}',[accountRecieveController::class,'due_invoice_detail']);
    Route::get('/employee/account_receive/paid_invoice_contract',[accountRecieveController::class,'paid_invoice_contract']);
    Route::get('/employee/account_receive/paid_invoice/{contract_id}',[accountRecieveController::class,'paid_invoice']);
    Route::get('/employee/account_receive/paid_invoice_detail/{contract_id}',[accountRecieveController::class,'paid_invoice_detail']);

    Route::get('/employee/account_receive/view_reports',[accountRecieveController::class,'view_reports']);
    Route::get('/employee/account_receive/customer_transaction',[accountRecieveController::class,'customer_transaction']);
});

// ---------------------------------------------dealer Service---------------------------------------------------

Route::group(['middleware'=>['auth:employee','dealerService']],function(){

    Route::get('/employee/dealer_service/dashboard',[dealerServiceController::class,'dashboard']);
    Route::get('/employee/dealer_service/invoice_detail_page/{contract_id}',[dealerServiceController::class,'invoice_detail_page']);
    Route::get('/employee/dealer_service/forget_password',[dealerServiceController::class,'forget_password']);
    Route::get('/employee/dealer_service/change_password',[dealerServiceController::class,'change_password']);
    // Route::get('/employee/dealer_service/customer_info',[dealerServiceController::class,'customer_info']);

    Route::get('/employee/dealer_service/employee_info',[dealerServiceController::class,'employee_info']);
    Route::get('/employee/dealer_service/edit_employee_info',[dealerServiceController::class,'edit_employee_info']);
    Route::post('/employee/dealer_service/update_employee_info',[dealerServiceController::class,'update_employee_info']);

    Route::get('/employee/dealer_service/non_approved_ticket',[dealerServiceController::class,'non_approved_ticket']);
    Route::get('/employee/dealer_service/non_approved_ticket',[dealerServiceController::class,'non_approved_ticket']);
    Route::get('/employee/dealer_service/change_customer_ticket_status/{id}/{status}',[dealerServiceController::class,'change_customer_ticket_status']);
    Route::get('/employee/dealer_service/change_dealer_ticket_status/{id}/{status}',[dealerServiceController::class,'change_dealer_ticket_status']);
    Route::get('/employee/dealer_service/view_detail_ticket_dealer/{id}',[dealerServiceController::class,'view_detail_ticket_dealer']);
    Route::get('/employee/dealer_service/view_detail_ticket_customer/{id}',[dealerServiceController::class,'view_detail_ticket_customer']);


    Route::get('/employee/dealer_service/dealer_info',[dealerServiceController::class,'dealer_info']);
    Route::get('/employee/dealer_service/view_dealers',[dealerServiceController::class,'view_dealers']);



    Route::get('/employee/dealer_service/dealer_info/{id}',[dealerServiceController::class,'dealer_info']);
    Route::get('/employee/dealer_service/view_dealers',[dealerServiceController::class,'view_dealers']);

    Route::get('/employee/dealer_service/view_customers',[dealerServiceController::class,'view_customers']);
    Route::get('/employee/dealer_service/customer_details/{id}',[dealerServiceController::class,'customer_details']);

    Route::get('/employee/dealer_service/non_approved_contract',[dealerServiceController::class,'non_approved_contract']);
    Route::get('/employee/dealer_service/approved_contract',[dealerServiceController::class,'approved_contract']);
    Route::get('/employee/dealer_service/rejected_contract',[dealerServiceController::class,'rejected_contract']);
    Route::get('/employee/dealer_service/contract_detail/{id}',[dealerServiceController::class,'contract_detail']);
    Route::post('/employee/dealer_service/upload_contract_docs',[dealerServiceController::class,'upload_contract_docs']);
    Route::get('/employee/dealer_service/invoice_detail_page/{contract_id}',[dealerServiceController::class,'invoice_detail_page']);

    Route::get('/employee/dealer_service/add_notes',[dealerServiceController::class,'add_notes']);
    Route::get('/employee/dealer_service/view_notes',[dealerServiceController::class,'view_notes']);
    Route::post('/employee/dealer_service/submit_notes',[dealerServiceController::class,'submit_notes']);
    Route::get('/employee/dealer_service/edit_notes/{id}',[dealerServiceController::class,'edit_notes']);
    Route::post('/employee/dealer_service/submit_edit_notes',[dealerServiceController::class,'submit_edit_notes']);
    Route::get('/employee/dealer_service/mark_as_done_notes/{id}',[dealerServiceController::class,'mark_as_done_notes']);
    Route::get('/employee/dealer_service/delete_notes/{id}',[dealerServiceController::class,'delete_notes']);


    Route::get('/employee/dealer_service/add_task',[dealerServiceController::class,'add_task']);
    Route::get('/employee/dealer_service/view_todo_list',[dealerServiceController::class,'view_todo_list']);
    Route::post('/employee/dealer_service/submit_task',[dealerServiceController::class,'submit_task']);
    Route::get('/employee/dealer_service/delete_tasks/{id}',[dealerServiceController::class,'delete_tasks']);
    Route::get('/employee/dealer_service/mark_as_done_tasks/{id}',[dealerServiceController::class,'mark_as_done_tasks']);

});

// --------------------------------------------customer Service---------------------------------------------------
Route::group(['middleware'=>['auth:employee','customerService']],function(){

    Route::get('/employee/customer_service/forget_password',[customerServiceController::class,'forget_password']);
    Route::get('/employee/customer_service/change_password',[customerServiceController::class,'change_password']);
    Route::get('/employee/customer_service/dashboard',[customerServiceController::class,'dashboard']);

    Route::get('/employee/customer_service/employee_info',[customerServiceController::class,'employee_info']);
    Route::get('/employee/customer_service/edit_employee_info',[customerServiceController::class,'edit_employee_info']);
    Route::post('/employee/customer_service/update_employee_info',[customerServiceController::class,'update_employee_info']);

    Route::get('/employee/customer_service/non_approved_ticket',[customerServiceController::class,'non_approved_ticket']);
    Route::get('/employee/customer_service/non_approved_ticket',[customerServiceController::class,'non_approved_ticket']);
    Route::get('/employee/customer_service/change_customer_ticket_status/{id}/{status}',[customerServiceController::class,'change_customer_ticket_status']);
    Route::get('/employee/customer_service/change_dealer_ticket_status/{id}/{status}',[customerServiceController::class,'change_dealer_ticket_status']);
    Route::get('/employee/customer_service/view_detail_ticket_dealer/{id}',[customerServiceController::class,'view_detail_ticket_dealer']);
    Route::get('/employee/customer_service/view_detail_ticket_customer/{id}',[customerServiceController::class,'view_detail_ticket_customer']);

    Route::get('/employee/customer_service/dealer_info/{id}',[customerServiceController::class,'dealer_info']);
    Route::get('/employee/customer_service/view_dealers',[customerServiceController::class,'view_dealers']);

    Route::get('/employee/customer_service/view_customers',[customerServiceController::class,'view_customers']);
    Route::get('/employee/customer_service/customer_details/{id}',[customerServiceController::class,'customer_details']);

    Route::get('/employee/customer_service/non_approved_contract',[customerServiceController::class,'non_approved_contract']);
    Route::get('/employee/customer_service/approved_contract',[customerServiceController::class,'approved_contract']);
    Route::get('/employee/customer_service/rejected_contract',[customerServiceController::class,'rejected_contract']);
    Route::get('/employee/customer_service/contract_detail/{id}',[customerServiceController::class,'contract_detail']);
    Route::post('/employee/customer_service/upload_contract_docs',[customerServiceController::class,'upload_contract_docs']);
    Route::get('/employee/customer_service/invoice_detail_page/{contract_id}',[customerServiceController::class,'invoice_detail_page']);

    Route::get('/employee/customer_service/add_notes',[customerServiceController::class,'add_notes']);
    Route::get('/employee/customer_service/view_notes',[customerServiceController::class,'view_notes']);
    Route::post('/employee/customer_service/submit_notes',[customerServiceController::class,'submit_notes']);
    Route::get('/employee/customer_service/edit_notes/{id}',[customerServiceController::class,'edit_notes']);
    Route::post('/employee/customer_service/submit_edit_notes',[customerServiceController::class,'submit_edit_notes']);
    Route::get('/employee/customer_service/mark_as_done_notes/{id}',[customerServiceController::class,'mark_as_done_notes']);
    Route::get('/employee/customer_service/delete_notes/{id}',[customerServiceController::class,'delete_notes']);


    Route::get('/employee/customer_service/add_task',[customerServiceController::class,'add_task']);
    Route::get('/employee/customer_service/view_todo_list',[customerServiceController::class,'view_todo_list']);
    Route::post('/employee/customer_service/submit_task',[customerServiceController::class,'submit_task']);
    Route::get('/employee/customer_service/delete_tasks/{id}',[customerServiceController::class,'delete_tasks']);
    Route::get('/employee/customer_service/mark_as_done_tasks/{id}',[customerServiceController::class,'mark_as_done_tasks']);
});


