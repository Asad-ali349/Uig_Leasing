<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract_type extends Model
{
    use HasFactory;
    protected $table="contract_type";
    protected $fillable=[
        'id','name','interest_rate','created_at','updated_at'
    ];
    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
}
