<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class employees extends Authenticatable
{
    use HasFactory;
    protected $table="employees";
    protected $fillable=[
        'id', 'name', 'email', 'password', 'contact', 'address','city', 'state', 'zip', 'country', 'ssn', 'image', 'role_id', 'status', 'created_at', 'updated_at'
    ];
    public function task()
    {
        return $this->hasOne('App\Models\employee_todo_list');
    }
    public function role()
    {
        return $this->belongsTo(employee_roles::class,'role_id');
    }
}
