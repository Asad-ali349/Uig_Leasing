<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer_ticket extends Model
{
    use HasFactory;
    protected $table="dealer_ticket";
    protected $fillable=[
        'id', 'dealer_id', 'subject', 'description', 'ticket_category_id', 'ticket_status-id', 'document', 'created_at', 'updated_at'
    ];
    public function ticket_docs()
    {
        return $this->hasMany('App\Models\dealer_ticket_docs');
    }
    public function ticket_type()
    {
        return $this->belongsTo(ticket_category::class,'ticket_category_id');
    }
    public function dealer()
    {
        return $this->belongsTo(dealer::class,'dealer_id');
    }
}
