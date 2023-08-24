<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer_ticket_docs extends Model
{
    use HasFactory;
    protected $table="dealer_ticket_docs";
    protected $fillable=[
        'id', 'document', 'dealer_ticket_id', 'created_at', 'updated_at'
    ];
}
