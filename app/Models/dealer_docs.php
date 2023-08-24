<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dealer_docs extends Model
{
    use HasFactory;
    protected $table="dealer_docs";
    protected $fillable=[
        'id', 'dealer_id', 'contract_id', 'document', 'created_at', 'updated_at'
    ];
}
