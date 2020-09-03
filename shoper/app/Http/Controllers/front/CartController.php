<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe;
use App\Order;
use App\Cart;
use PDF;
use Auth;
use Session;

class CartController extends Controller
{
	public function index(){
		return view('frontend.cart.manageCart');
	}

    public function store(Request $request)
    {	
    	if(Auth::check()){
    		/*if user is loged in then, it will check*/
    		$cart = Cart::where('user_id', Auth::id())
    			->where('product_id', $request->product_id)
    			->first();
    	}else{
    		/*if user is not loged in then, check it*/
    		$cart = Cart::where('ip_address', request()->ip())
    			->where('product_id', $request->product_id)
    			->first();
    	}
    	

    	if(!is_null($cart)){
    		/*if there is product at the cart then add another product*/
    		$cart->increment('product_quentity');

    	}else{
    		/*if there is no item at cart then add one product*/
    		$cart = new Cart();

	    	if( Auth::check() ){
	    		$cart->user_id = Auth::id();
	    	}
    	}

    	$cart->ip_address = request()->ip();
    	$cart->product_id = $request->product_id;
    	$cart->save();

    	Session::flash('message', 'Product added successfully');
    	return back();
    }

    public function updateCart(Request $request, $id){
    	$cart = Cart::find($id);
    	if( !is_null($cart )){
    		$cart->product_quentity = $request->product_quentity;
    		$cart->save();
    	}else{
    		return redirect('carts');
    	}

    	Session::flash('message', 'Product updated successfully');
    	return back();
    }

    public function deleteCart($id){
    	$cart = Cart::find($id);
    	if( !is_null($cart )){
    		$cart->delete();
    	}else{
    		return redirect('carts');
    	}

    	Session::flash('message', 'Cart deleted successfully');
    	return back();
    }

    public function checkoutCart(){
    	return view('frontend.cart.checkout');
    }

    public function createInvoice(){
        $order = Order::where('id', 1)->first();

        $pdf = PDF::loadView('frontend.cart.pdfview', compact('order'));
        return $pdf->stream('pdfview.pdf');
    }

    public function manualStripePay(){
        Stripe\Stripe::setApiKey('sk_test_51HLLAgFpEXEGCmdN6ZugPdTSMXuHsJn8TB4487Uf39noVZ3gl6mjbRVT82TeCZcNqA0we3F4EFZR6TWZKzhSBdhR00txHtUscE');
        $token = Stripe\Token::create([
            'card' => [
                'number' => request('card_number'),
                'cvc' => request('card_cvc'),
                'exp_month' => request('exp_month'),
                'exp_year' => request('exp_year')
            ]
        ]);

        Stripe\Charge::create ( array (
                /*"amount" => request('input_amount') * 100,*/
                "amount" => 200 * 100,
                "currency" => "usd",
                "source" => $token['id'], // obtained with Stripe.js
                "description" => "Test payment." 
        ) );

         Session::flash('success', 'Payment successful!');
          
        return back();
    }

}
