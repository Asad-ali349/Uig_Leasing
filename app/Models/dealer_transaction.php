<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer_transaction extends Model
{
    use HasFactory;
    protected $table="dealer_transaction";
    protected $fillable=[
        'id', 'invoice_id', 'contract_id', 'amount_paid', 'transaction_id', 'created_at', 'updated_at'
    ];
    public function contract(){
        return $this->belongsTo(contract::class,'contract_id');
    }
    public function invoice(){
        return $this->belongsTo(dealer_invoices::class,'invoice_id');
    }
}
