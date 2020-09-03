<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
	/*Route redirect to the manageCategory page*/
    public function manageCategory(){
    	$categories = Category::orderBy('id', 'DESC')->get();
    	return view('admin.category.manageCategory', compact('categories'));
    }

    /*Route redirect to the add-category page*/
    public function addCategory(){
    	return view('admin.category.addCategory');
    }

    /*Adding category to the database*/
    public function saveCategory(Request $request){
    	$request->validate([
    		'category_name' => 'required'
    	]);

    	$category = new Category();
    	$category->category_name = $request->category_name;
    	$category->slug = $this->slugGenerator($request->category_name);
    	$category->save();

    	Session::flash('message', 'Category added successfully');
    	return back();
    }

    

    public function categoryStatus($id, $status){
    	$categoryStatus = Category::find($id);
    	$categoryStatus->status = $status;
    	$categoryStatus->save();

    	return response()->json(['message' => 'Success']);
    }

    public function editCategory($id){
    	$editCategory = Category::find($id);

    	return view('admin.category.editCategory', compact('editCategory'));
    }

    public function updateCategory(Request $request){
    	$category = Category::find($request->id);
    	$category->category_name = $request->category_name;
    	$category->slug = $this->slugGenerator($request->category_name);
    	$category->update();

    	Session::flash('message', 'Category updated successfully');
    	return redirect('/category/all-category');
    }

    public function deleteCategory($id){
    	$deleteCategory = Category::find($id);
    	$deleteCategory->delete();

    	Session::flash('message', 'Category deleted successfully');
    	return back();
    }

    /*Slug Generator to prevent the special carecter*/
    public function slugGenerator($string){
    	$string = str_replace(' ', '-', $string);
    	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    	return strtolower(preg_replace('/-+/', '-', $string));
    }
}
