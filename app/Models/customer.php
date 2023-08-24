<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class customer extends Authenticatable 
{
    use Notifiable;
    protected $table ='customer';
    protected $fillable=[ 'id','name', 'email', 'password', 'contact', 'home_contact', 'dob', 'ssn', 'drive_license_number', 'liscense_issue_date','license_expiry', 'street', 'city', 'state', 'zip', 'country', 'home_type', 'image', 'status','token','is_verified','is_bank_verified', 'created_at', 'updated_at'
    ];
    protected $hidden = ['password','token'];


    public function income()
    {
        return $this->hasOne('App\Models\customer_income');
    }
    public function relative()
    {
        return $this->hasMany('App\Models\customer_relatives');
    }
    public function bank()
    {
        return $this->hasOne('App\Models\customer_bank');
    }
    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
}
