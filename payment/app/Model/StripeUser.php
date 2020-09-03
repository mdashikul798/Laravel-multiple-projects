<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StripeUser extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
