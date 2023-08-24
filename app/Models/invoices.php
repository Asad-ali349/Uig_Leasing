<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use HasFactory;
    protected $table="invoices";
    protected $fillable=[
        'id', 'contract_id','customer_id', 'amount', 'fee', 'sales_tax','total_amount_to_pay', 'due_date', 'late_fee', 'status', 'created_at', 'updated_at'
    ];

    public function contract()
    {
        return $this->belongsTo(contract::class,'contract_id');
    }
    public function customer()
    {
        return $this->belongsTo(customer::class,'customer_id');
    }
}
