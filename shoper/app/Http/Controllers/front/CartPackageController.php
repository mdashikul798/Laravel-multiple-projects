<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cart;

class CartPackageController extends Controller
{
    public function packageHome(){
    	return view('frontend.packageCart.packageHome');
    }

    public function cartStore(Request $request){

    	/*Cart::add(455, 'Sample Item', 100.99, 2, array());*/
    	Cart::add($request->id, $request->name, $request->price, 1,)
    	->associate('App\Product');

    	return redirect()->route('cartHome')->with('success', 'Item added successfully');
    }

    public function packageManage(){
    	return view('frontend.packageCart.packageCartManage');
    }

    public function packageCheckout(){
    	return view('frontend.packageCart.packageCheckout');
    }
}
