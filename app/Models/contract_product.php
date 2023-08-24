<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract_product extends Model
{
    use HasFactory;
    protected $fillable=[
        'id', 'contract_id', 'product_name', 'product_description', 'product_price','quantity', 'created_at', 'updated_at'
    ];
}
