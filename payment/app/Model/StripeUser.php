<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StripeUser extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function orders(){
    	return $this->hasMany(Order::class, 'id');
    }
}
