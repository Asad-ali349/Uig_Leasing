<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_docs extends Model
{
    use HasFactory;
    protected $table="customer_docs";
    protected $fillable=[
        'id','customer_id','contract_id','document','created _at', 'updated_at'
    ];

}
