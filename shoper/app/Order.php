<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'name', 'ip_address', 'phone_number', 'shipping_address', 'email', 'message', 'is_paid', 'is_completed', 'is_seen',];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function cart(){
    	return $this->belongsTo(Cart::class);
    }
}
