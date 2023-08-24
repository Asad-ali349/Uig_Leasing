<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_roles extends Model
{
    use HasFactory;
    protected $table="employee_roles";
    protected $fillable=[
        'id', 'name', 'created_at', 'updated_at'
    ];
    public function employee()
    {
        return $this->hasMany('App\Models\employee_todo_list');
    }
}
