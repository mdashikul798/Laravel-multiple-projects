<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [ 'product_id', 'user_id', 'order_id', 'ip_address', 'product_quentity',];

    /**
     * 
     *
     * These functions are for relation to the database table.
     *
     * @return carts
     */

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function order(){
    	return $this->belongsTo(Order::class);
    }

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    /**
     * 
     *
     * These function is for showing how many product is at the card.
     *
     * @return carts
     */

    public static function totalCarts(){
        /*Manage total cart*/
        if(Auth::check()){
            $carts = Cart::orWhere('user_id', Auth::id())
                ->orWhere('ip_address', request()->ip())
                ->get();
        }else{
            $carts = Cart::orWhere('ip_address', request()->ip())->get();
        }
        return $carts;
    }

    /**
     * 
     *
     * These function is for adding the product, when user add product at the card.
     *
     * @return Total product
     */

    public static function totalItems(){
        /*Total product added to the cart*/
        if(Auth::check()){
            $carts = Cart::orWhere('user_id', Auth::id())
                ->orWhere('ip_address', request()->ip())
                ->get();
        }else{
            $carts = Cart::orWhere('ip_address', request()->ip())->get();
        }

        $total_item = 0;
        foreach($carts as $cart){
            $total_item += $cart->product_quentity;
        }
        return $total_item;
    }
}
