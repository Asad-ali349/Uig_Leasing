<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_income extends Model
{
    use HasFactory;
    protected $table="customer_income";
    protected $fillable=[
        'id', 'customer_id', 'employer_name', 'employer_city', 'employer_state', 'employer_zip', 'employer_contact', 'profession', 'join_date', 'direct_desposit', 'income', 'last_pay_date', 'next_pay_date', 'paid_time', 'created_at', 'updated_at'
    ];
}
