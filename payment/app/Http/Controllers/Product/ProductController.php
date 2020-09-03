<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use Session;

class ProductController extends Controller
{
    public function index(){
    	return view('admin.product.manageProduct');
    }

    public function addProduct(){
    	return view('admin.product.addProduct');
    }

    public function saveProduct(Request $request){
    	$request->validate([
    		'product_name' => 'required',
    		'product_price' => 'required',
    		'category' => 'required'
    	]);

    	$product = null;
    	try
    	{
    		$image = $request->file('product_image');
    		$fileExt = $image->getClientOriginalExtension();
    		$fileName = date('ymdhis.') . $fileExt;
    		$image->move(public_path('uploads/product/'), $fileName);

    		$product = new Product();
			$product->product_name = $request->product_name;
			$product->product_price = $request->product_price;	
			$product->product_image = $fileName;
			$product->description = $request->description;
			$product->category = $request->category;
			$product->save();

    	}catch(Exception $exception){
    		$product = false;
    	}

		if($product){
			Session::flash('success', 'Product added successfully');
		}

		return back();
    }
}
