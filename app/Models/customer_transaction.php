<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_transaction extends Model
{
    use HasFactory;
    protected $table="customer_transaction";
    protected $fillable=[
        'id', 'invoice_id','contract_id', 'amount', 'transaction_id','is_bank_transaction','is_card_transaction', 'created_at', 'updated_at'
    ];
    public function contract(){
        return $this->belongsTo(contract::class,'contract_id');
    }
    public function invoice(){
        return $this->belongsTo(invoices::class,'invoice_id');
    }
}
