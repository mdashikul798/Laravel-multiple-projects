<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function stripeUser(){
    	return $this->belongsTo(StripeUser::class, 'id');
    }
}
