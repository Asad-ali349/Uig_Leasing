<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_bank extends Model
{
    use HasFactory;
    protected $table="customer_bank";
    protected $fillable = [
        'id', 'customer_id', 'bank_name', 'bank_contact', 'bank_routing', 'account_type', 'account_number', 'account_open_date', 'card_type', 'card_number', 'card_expiry', 'card_cvv','bank_city', 'bank_state', 'bank_zip', 'created_at', 'updated_at'
    ];
}
