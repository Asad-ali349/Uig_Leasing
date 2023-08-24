<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_notes extends Model
{
    use HasFactory;
    protected $table="customer_notes";
    protected $fillable=[
        'id','title','customer_id','notes','status','created_at','updated_at'
    ];
}
