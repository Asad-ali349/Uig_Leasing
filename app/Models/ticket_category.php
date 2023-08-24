<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket_category extends Model
{
    use HasFactory;
    protected $table="ticket_category";
    protected $fillable=[
        'id', 'category_name', 'created_at', 'updated_at'
    ];

    public function ticket()
    {
        return $this->hasMany('App\Model\customer_ticket');
    }
    
}
