<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer_notes extends Model
{
    use HasFactory;
    protected $table="dealer_notes";
    protected $fillable=[
        'id','title','dealer_id','notes','status','created_at','updated_at'
    ];
}
