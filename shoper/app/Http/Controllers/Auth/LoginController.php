<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\ConfirmRegistration;
use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if($user->status == 1)
        {
            if(Auth::guard('web')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember))
            {
                return redirect()->intended(route('front-page'));
            }
        }else{
            if(!is_null($user))
            {
                $user->notify(new ConfirmRegistration($user));

                Session::flash('message', 'A new confirm message has been sent to your email, please confirm it!');
                return redirect('front-page');
            }else{
                Session::flash('message', 'You are not a member! Please register first');
                return redirect('front-page');
            }
        }
    }
}
