<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_relatives extends Model
{
    use HasFactory;
    protected $table="customer_relatives";
    protected $fillable=[
        'id', 'customer_id', 'relative_name', 'relative_city', 'relative_state', 'relative_zip', 'relative_contact', 'relationship', 'created_at', 'updated_at'
    ];
}
