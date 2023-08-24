<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $table="transactions";
    protected $fillable=[
        'id', 'invoice_id', 'amount', 'transaction_id', 'created_at', 'updated_at','is_card_transaction','is_bank_transaction'
    ];
}
