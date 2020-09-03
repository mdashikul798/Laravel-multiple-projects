<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;
use Session;

class SubCategoryController extends Controller
{
    public function manageSubCategory(){
    	$subCat = SubCategory::with('category')->get();/*showing sub-category data with 'category id'*/
    	return view('admin.subcategory.manageSubCategory', compact('subCat'));
    }

    public function addSubCategory(){
    	$category = Category::
    		 where('status', 1)
    		->orderBy('category_name', 'ASC')/*showing category name from category table*/
    		->get();
    	return view('admin.subcategory.addSubCategory', compact('category'));
    }

    public function saveSubCategory(Request $request){
    	$request->validate([
    		'category' => 'required',
    		'subCategory_name' => 'required'
    	]);
    	$subCategory = new SubCategory();
    	$subCategory->name = $request->subCategory_name;
    	$subCategory->cat_id = $request->category;
    	$subCategory->slug = $this->slugGenerator($request->subCategory_name);
    	$subCategory->save();

    	Session::flash('message', 'Sub-Category added successfully');
    	return back();
    }

    public function subCategoryStatus($id, $status){
    	$subStatus = SubCategory::find($id);
    	$subStatus->status = $status;
    	$subStatus->save();

    	return response()->json(['message' => 'Success']);
    }

    public function editSubCategory($id){
    	$subId = SubCategory::find($id);
        $category = Category::orderBy('category_name', 'ASC')->get();
    	return view('admin.subcategory.editsub', compact('subId', 'category'));
    }

    public function updateSubCategory(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subCategory_name' => 'required'
        ]);

        $category = null;
        try{
            $name = $request->subCategory_name;
            
            $success = SubCategory::create([
                'cat_id' => $request->category_id,
                'name' => $name,
                'slug' => $this->slugGenerator($request->$name)
            ]);
        }catch(Exception $exception){
            $success = false;
        }

        if($success){
            Session::flash('message', 'Sub Category updated successfully');
        }
    	
    	return redirect('/category/sub-category');
    }

    public function deleteSubCategory($id){
    	$deleteSubCate = SubCategory::find($id);
    	$deleteSubCate->delete();

    	Session::flash('message', 'Sub Category deleted successfully');
    	return back();
    }

    /*Slug Generator to prevent the special carecter*/
    public function slugGenerator($string){
    	$string = str_replace(' ', '-', $string);
    	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    	return strtolower(preg_replace('/-+/', '-', $string));
    }
}
