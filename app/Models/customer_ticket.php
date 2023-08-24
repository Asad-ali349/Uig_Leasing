<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_ticket extends Model
{
    use HasFactory;
    protected $table="customer_ticket";
    protected $fillable=[
        'id', 'customer_id', 'ticket_category_id', 'subject', 'description', 'document', 'ticket_status_id', 'created_at', 'updated_at'
    ];

    public function ticket_docs()
    {
        return $this->hasMany('App\Models\customer_ticket_docs');
    }
    public function ticket_type()
    {
        return $this->belongsTo(ticket_category::class,'ticket_category_id');
    }
    public function customer()
    {
        return $this->belongsTo(customer::class,'customer_id');
    }
}
