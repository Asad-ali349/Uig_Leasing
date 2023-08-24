<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_docs extends Model
{
    use HasFactory;
    protected $table="employee_docs";
    protected $fillable=[
        'id', 'employee_id', 'contract_id', 'document', 'created_at', 'updated_at'
    ];

}
