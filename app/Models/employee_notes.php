<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_notes extends Model
{
    use HasFactory;
    protected $table="employee_notes";
    protected $fillable=[
        'id','title','employee_id','notes','status','created_at','updated_at'
    ];
}
