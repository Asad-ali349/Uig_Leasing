<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table="contract";
    protected $fillable=[
        'id', 'dealer_id', 'customer_id', 'invoice_number', 'contract_type_id', 'payment_days','payment_method', 'total_years', 'months', 'amount', 'paid_amount','interest_rate', 'created_at', 'updated_at'
    ];

    public function contract_products()
    {
        return $this->hasMany('App\Models\contract_product');
    }
    public function contract_type()
    {
        return $this->belongsTo(contract_type::class,'contract_type_id');
    }
    public function customer()
    {
        return $this->belongsTo(customer::class,'customer_id');
    }
    public function dealer()
    {
        return $this->belongsTo(dealer::class,'dealer_id');
    }
    public function customer_docs()
    {
        return $this->hasMany('App\Models\customer_docs');
    }
    public function dealer_docs()
    {
        return $this->hasMany('App\Models\dealer_docs');
    }
    public function employee_docs()
    {
        return $this->hasMany('App\Models\employee_docs');
    }

    



    
}
