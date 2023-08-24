<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer_bank extends Model
{
    use HasFactory;
    protected $table="dealer_bank";
    protected $fillable=[
        'id', 'dealer_id', 'bank_name', 'account_type', 'account_number', 'card_type', 'card_number', 'card_expiry', 'created_at', 'updated_at'
    ];
}
