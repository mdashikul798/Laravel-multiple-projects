<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Session;

class CategoryController extends Controller
{
	public function index(){
		return view('admin.category.manageCategory');
	}

    public function addCategory(){
    	return view('admin.category.addCategory');
    }

    public function saveCategory(Request $request){
    	$request->validate([
    		'category_name' => 'required|unique:categories'
    	]);

    	$category = new Category();
    	$img = $request->file('category_image');

    	if(!is_null($img))
    	{	
    		$image = $request->file('category_image');
    		$fileExt = $image->getClientOriginalExtension();
    		$fileName = date('ymdhis.') . $fileExt;
    		$image->move(public_path('uploads/category/'), $fileName);

	    	$category->category_name = $request->category_name;
	    	$category->category_image = $fileName;
	    	$category->save();
    	}else
    	{
    		$category->category_name = $request->category_name;
    		$category->category_image = $request->category_image;
	    	$category->save();
    	}
    	
    	Session::flash('success', 'Category added successfully');
    	return back();
    }
}
