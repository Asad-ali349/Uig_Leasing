<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class dealer extends Authenticatable
{
    use HasFactory;
    protected $table="dealer";
    protected $fillable=[
        'id', 'owner_name', 'shop_name', 'email', 'password', 'ein', 'shop_address', 'shop_city', 'shop_state', 'shop_zip', 'shop_country', 'tax_certificate_doc','shop_logo', 'shop_contact', 'status','token','signature','is_verified', 'created-at', 'updated_at'
    ];

    public function contract()
    {
        return $this->hasMany('App\Models\Contract');
    }
    public function bank()
    {
        return $this->hasOne('App\Models\dealer_bank');
    }
}
