<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;

class ConfirmRegistration extends Controller
{
    public function varify($remember_token)
    {
    	$user = User::where('remember_token', $remember_token)->first();
    	$user->status = 1;
    	$user->remember_token = null;
    	$user->save();

    	if(!is_null($user)){
			Session::flash('message', 'You have successfully confirm your registration!!');
    		return redirect('login');
    	}else{
    		Session::flash('errors', 'Sorry !! Your token is not matched');
    		return redirect('front-page');
    	}
    	
    }
}
