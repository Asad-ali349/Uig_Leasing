<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_ticket_docs extends Model
{
    use HasFactory;
    protected $table="customer_ticket_docs";
    protected $fillable=[
        'id', 'document', 'ticket_id', 'created_at', 'updated_at'
    ];

}
