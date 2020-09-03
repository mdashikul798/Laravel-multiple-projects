<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Stripe;
use App\Model\Product;
use Session;

class StripeController extends Controller
{
    public function index(){
    	$allProduct = Product::orderBy('id', 'DESC')->get();
    	return view('stripe.stripe_home', compact('allProduct'));
    }

    public function userProfile(){
    	return view('stripe.stripeUser.userProfile');
    }

    public function getAddToCart(Request $request, $id){
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Stripe($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);
    	/*dd($request->session()->get('cart'));*/
    	return redirect('/stripe-home');
    }

    public function getCart(){
    	if(!Session::has('cart')){
    		return view('stripe.stripeUser.cartCheckout');
    	}

    	$oldCart = Session::get('cart');
    	$cart = new Stripe($oldCart);
    	return view('stripe.stripeUser.cartCheckout', ['products'=>$cart->items, 'totalPrice'=> $cart->totalPrice]);
    }

    public function cartCheckout(){
    	
    }
}
