<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StripePay;
use App\Model\Order;
use Stripe;
use App\Model\Product;
use Auth;
use Session;

class StripeController extends Controller
{
    public function index(){
    	$allProduct = Product::orderBy('id', 'DESC')->get();
    	return view('stripe.stripe_home', compact('allProduct'));
    }

    public function userProfile(){
    	$urerOrders = Order::get();
    	$urerOrders->transform(function($urerOrder, $key){
    		$urerOrder->cart = unserialize($urerOrder->cart);
    		return $urerOrder;
    	});
    	
    	return view('stripe.stripeUser.userProfile', compact('urerOrders'));
    }

    public function getAddToCart(Request $request, $id){
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new StripePay($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);
    	/*dd($request->session()->get('cart'));*/
    	return redirect('/stripe-home');
    }

    public function getCart(){
    	if(!Session::has('cart')){
    		return view('stripe.stripeUser.getCart');
    	}

    	$oldCart = Session::get('cart');
    	$cart = new StripePay($oldCart);
    	return view('stripe.stripeUser.getCart', ['products'=>$cart->items, 'totalPrice'=> $cart->totalPrice]);
    }

    public function cartCheckout(){
    	/*Checking, the user is loged-in or not, if not, it will redirect to the login page*/
    	$this->stripeAuthCheck();

    	if(!Session::has('cart')){
    		return view('stripe.stripeUser.stripeCheckOut');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new StripePay($oldCart);
    	$total = $cart->totalPrice;
    	return view('stripe.stripeUser.stripeCheckOut', ['products'=>$cart->items, 'total' => $total]);
    }

    /*Making the payment to the 'Stripe Account'*/
    public function stripePay(Request $request){
    	/*Checking, the user is loged-in or not, if not, it will redirect to the login page*/
    	$this->stripeAuthCheck();
    	if(!Session::has('cart')){
    		return redirect('stripe.home');
    	}

    	Stripe\Stripe::setApiKey('test_api_key_would_be_here');
        $token = Stripe\Token::create([
            'card' => [
                'name' => request('card_name'),
                'number' => request('card_number'),
                'cvc' => request('card_cvc'),
                'exp_month' => request('exp_month'),
                'exp_year' => request('exp_year')
            ]
        ]);

    	try{
	        $oldCart = Session::get('cart');
	    	$cart = new StripePay($oldCart);
	    	$total = $cart->totalPrice;
    		$charge = Stripe\Charge::create ( array (
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $token['id'], // obtained with Stripe.js
                "description" => "Test payment."
                /*'receipt_email' => 'email would be here'*/
        ) );

        $order = new Order();
        $orderUser = Session::get('id');
        
        $order->first_name = $request->first_name;
        $order->user_id = $orderUser;
        $order->last_name = $request->last_name;
        $order->user_name = $request->user_name;
        $order->email = $request->email;
		$order->address = $request->address;
        $order->address_2 = $request->address_2;
        $order->district = $request->district;
        $order->street = $request->street;
        $order->zip = $request->zip;
        $order->cart = serialize($cart);
        $order->card_name = $request->card_name;
        $order->payment_id = $charge->id;
        $order->save();

    	}catch(\Exception $e){
    		return redirect('/stripe-checkout')->with('error', $e->getMessage());
    	}
    	Session::forget('cart');
    	return redirect('/stripe-home');
    }

    /*Checking, the user is loged-in or not, if not, it will redirect to the login page*/
    public function stripeAuthCheck(){
    	$authId = Session::get('id');
    	if($authId){
    		return redirect('/stripe-checkout');
    	}else{
    /*Conditioning, after loged-in, it will go to the previous link*/
    	
    	/*Session::put('oldUrl', $request->oldUrl);*/
    	return redirect('/stripe-login')->send();
    	}
    }

    public function addQty($id){
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new StripePay($oldCart);
    	$cart->addQtyByOne($id);
    	Session::put('cart', $cart);
    	return redirect('/stripe-getCart');
    }

    public function reduceQty($id){
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new StripePay($oldCart);
    	$cart->reduceQtyByOne($id);
    	if(count($cart->items) > 0){
    		Session::put('cart', $cart);
    	}else{
    		Session::forget('cart');
    	}
    	
    	return redirect('/stripe-getCart');
    }
}

