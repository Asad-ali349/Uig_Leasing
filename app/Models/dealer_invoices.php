<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer_invoices extends Model
{
    use HasFactory;

    protected $table="dealer_invoices";
    protected $fillable=[
        'id', 'dealer_id', 'contract_id','uig_fee','processing_fee', 'amount', 'paid_date', 'status', 'created_at', 'updated_at'
    ];
    public function dealer()
    {
        return $this->belongsTo(dealer::class,'dealer_id');
    }
    public function contract()
    {
        return $this->belongsTo(contract::class,'contract_id');
    }
}
