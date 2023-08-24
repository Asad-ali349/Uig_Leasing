<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\invoices;
use App\Models\customer;
use App\Models\customer_relatives;
use App\Models\customer_bank;
use App\Models\customer_income;
use App\Models\Contract;
use App\Models\contract_product;
use App\Models\contract_type;
use App\Models\customer_ticket;
use App\Models\customer_notes;
use App\Models\ticket_category;
use App\Models\customer_ticket_docs;
use App\Models\customer_docs;
use App\Models\customer_transaction;
use App\Models\dealer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordRecoverMail;
use Session;
use Stripe;

class apiController extends Controller
{
    //
    public function due_invoice()
    {
        $response=['error'=>true];
        $current_date=date('Y-m-d');
        // dd($current_date);
        $invoices=invoices::with('customer.bank')->where("due_date",$current_date)->where('status','0')->get();
        if(count($invoices)>0){
            $count=1;
            foreach($invoices as $invoice ){
            
            
                $stripe = new \Stripe\StripeClient(
                    'pk_test_51JlDAzF40gdBNDIaMgu9RmYBPjuwaL6KiuxaPEFkT2hGKjGA8nwQ3aVHxZqSjc60NcmMy1uzYTkyhNXzd1rTi15H00uclELlzL'
                );
                $token=$stripe->tokens->create([
                    'card' => [
                      'number' => '4242424242424242',
                      'exp_month' => 2,
                      'exp_year' => 2023,
                      'cvc' => '314',
                    ],
                ]);
                //   return $token;
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $pay=Stripe\Charge::create ([
                        "amount" => ($invoice->total_amount_to_pay+$invoice->late_fee) * 100,
                        "currency" => "usd",
                        "source" => $token,
                        "description" => $invoice->customer->email
                ]);
    
                if($pay->captured){
                    $mark_as_paid=invoices::where('id',$invoice->id)->update([
                        'status'=>1,
                        'paid_date'=>$current_date,
                    ]);
                    $create_transaction=customer_transaction::create([
                        'invoice_id'=>$invoice->id, 
                        'amount'=>$invoice->total_amount_to_pay+$invoice->late_fee,
                        'contract_id'=>$invoice->contract_id, 
                        'transaction_id'=>$pay->id,
                        'is_card_transaction'=>1,
                    ]);
                }
                if($pay->captured && $create_transaction){
                    $response['api_msg'][$invoice->id]="Transaction Successfull for $invoice->id and Saved to Record";
                }else if($pay->captured){
                    $response['api_msg'][$invoice->id]="Transaction Successfull for $invoice->id But not saved to Record";
                }else if(!$pay->captured && !$create_transaction){
                    $response['api_msg'][$invoice->id]="Transaction failed for $invoice->id";
                }

                $count++;
            }
            $response['error']=false;
            return $response;
            // return "yes";
        }
        
        $response['error_msg']="No invoice found";
        return $response;
    }
    public function due_late_invoice()
    {
        $response=['error'=>true];
        $current_date=date('Y-m-d');
        $yesterday_date=date('Y-m-d',strtotime("-1 days"));
        // dd($current_date);
        $invoices=invoices::with('customer.bank')->where("due_date",$yesterday_date)->where('status','0')->get();
        
        if(count($invoices)>0){
            $count=1;
            foreach($invoices as $invoice ){
            
            
                $stripe = new \Stripe\StripeClient(
                    'pk_test_51JlDAzF40gdBNDIaMgu9RmYBPjuwaL6KiuxaPEFkT2hGKjGA8nwQ3aVHxZqSjc60NcmMy1uzYTkyhNXzd1rTi15H00uclELlzL'
                  );
                  $token=$stripe->tokens->create([
                    'card' => [
                      'number' => '4242424242424242',
                      'exp_month' => 2,
                      'exp_year' => 2023,
                      'cvc' => '314',
                    ],
                  ]);
                //   return $token;
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $pay=Stripe\Charge::create ([
                        "amount" => ($invoice->total_amount_to_pay+$invoice->late_fee) * 100,
                        "currency" => "usd",
                        "source" => $token,
                        "description" => $invoice->customer->email
                ]);
    
                if($pay->captured){
                    $mark_as_paid=invoices::where('id',$invoice->id)->update([
                        'status'=>1,
                        'paid_date'=>$current_date,
                    ]);
                    $create_transaction=transaction::create([
                        'invoice_id'=>$invoice->id, 
                        'amount'=>$invoice->total_amount_to_pay+$invoice->late_fee, 
                        'contract_id'=>$invoice->contract_id,
                        'transaction_id'=>$pay->id,
                    ]);
                }
                if($pay->captured && $create_transaction){
                    $response['api_msg'][$invoice->id]="Transaction Successfull for $invoice->id and Saved to Record";
                }else if($pay->captured){
                    $response['api_msg'][$invoice->id]="Transaction Successfull for $invoice->id But not saved to Record";
                }else if(!$pay->captured && !$create_transaction){
                    $add_late_fee=invoices::where('id',$invoice->id)->update([
                        'late_fee'=>'30',
                    ]);

                    $response['api_msg'][$invoice->id]="Transaction failed for $invoice->id";
                }

                $count++;
            }
            $response['error']=false;
            return $response;
            // return "yes";
        }
        
        $response['error_msg']="No invoice found";
        return $invoices;
    }
    public function late_invoice()
    {
        $response=['error'=>true];
        $current_date=date('Y-m-d');
        $yesterday_date=date('Y-m-d',strtotime("-1 days"));
        $invoices=invoices::with('customer.bank')->where("due_date",'<',$yesterday_date)->where('status','0')->get();
        if(count($invoices)>0){
            $count=1;
            foreach($invoices as $invoice ){
            
            
                $stripe = new \Stripe\StripeClient(
                    'pk_test_51JlDAzF40gdBNDIaMgu9RmYBPjuwaL6KiuxaPEFkT2hGKjGA8nwQ3aVHxZqSjc60NcmMy1uzYTkyhNXzd1rTi15H00uclELlzL'
                  );
                  $token=$stripe->tokens->create([
                    'card' => [
                      'number' => '4242424242424242',
                      'exp_month' => 2,
                      'exp_year' => 2023,
                      'cvc' => '314',
                    ],
                  ]);
                //   return $token;
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $pay=Stripe\Charge::create ([
                        "amount" => ($invoice->total_amount_to_pay+$invoice->late_fee) * 100,
                        "currency" => "usd",
                        "source" => $token,
                        "description" => $invoice->customer->email
                ]);
    
                if($pay->captured){
                    $mark_as_paid=invoices::where('id',$invoice->id)->update([
                        'status'=>1,
                        'paid_date'=>$current_date,
                    ]);
                    $create_transaction=customer_transaction::create([
                        'invoice_id'=>$invoice->id, 
                        'amount'=>$invoice->total_amount_to_pay+$invoice->late_fee,
                        'contract_id'=>$invoice->contract_id,
                        'transaction_id'=>$pay->id,
                    ]);
                }
                if($pay->captured && $create_transaction){
                    $response['api_msg'][$invoice->id]="Transaction Successfull for $invoice->id and Saved to Record";
                }else if($pay->captured){
                    $response['api_msg'][$invoice->id]="Transaction Successfull for $invoice->id But not saved to Record";
                }else if(!$pay->captured && !$create_transaction){
                    $response['api_msg'][$invoice->id]="Transaction failed for $invoice->id";
                }

                $count++;
            }
            $response['error']=false;
            return $response;
            // return "yes";
        }
        
        $response['error_msg']="No invoice found";
        return $invoices;
    }
   
}
