<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StripePay extends Model
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    
	/*The cart would be empty for the first time for that, the below code would work*/
    public function __construct($oldCart){
    	if($oldCart){
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    /*Every time after adding a product the cart will be added with a product*/
    public function add($item, $id){
    	$storedItem = ['qty'=>0, 'price'=>$item->price, 'item'=>$item];
    	if($this->items){
    		if(array_key_exists($id, $this->items)){
    			$storedItem = $this->items[$id];
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['price'] = $item->price * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty++;
    	$this->totalPrice += $item->price;
    }

    public function addQtyByOne($id){
        $this->items[$id]['qty']++;
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price']; 
    }

    public function reduceQtyByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }
}