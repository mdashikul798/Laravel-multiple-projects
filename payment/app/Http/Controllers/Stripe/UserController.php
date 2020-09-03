<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\StripeUser;
use Session;
use DB;

class UserController extends Controller
{
    public function getLogin(){
    	return view('stripe.stripeUser.stripeLogin');
    }

    public function postLogin(Request $request){
    	$request->validate([
    		
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        
    	]);

    	$email = $request->email;
        $password = md5($request['password']);

        $result = DB::table('stripe_users')
                    ->where('email', $email)
                    ->where('password', $password)
                    ->first();

    	if($result){
            Session::put('name', $result->name);
            Session::put('id', $result->id);
    		return redirect('/stripe-home');
    	}

        Session::flash('error', 'Email or Password is incorrect');
    	return back();
    }

    public function stripeLogout(){
        Session::flush();
        return back();
    }

    public function userRegister(){
    	return view('stripe.stripeUser.stripeRegister');
    }

    public function addUser(Request $request){
    	$request->validate([
    		
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        
    	]);

    	$user = new StripeUser([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => md5($request['password']),
        ]);

        $user->save();
        return redirect('/stripe-home');
    }
}
