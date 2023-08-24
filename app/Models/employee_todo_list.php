<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_todo_list extends Model
{
    use HasFactory;
    protected $table="employee_todo_list";
    protected $fillable=[
        'id', 'employee_id', 'title', 'description', 'assign_by', 'status', 'created_at', 'updated_at'
    ];
    public function assignby()
    {
        return $this->belongsTo(employees::class,'assign_by');
    }
}
