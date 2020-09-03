<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Session;

class BrandController extends Controller
{
    public function addBrand(){
    	return view('admin.brand.addBrand');
    }

    public function saveBrand(Request $request){
    	$request->validate([
    		'brand_name' => 'required'
    	]);
    	$brand = new Brand();

    	$brand->brad_name = $request->brand_name;
    	$brand->brand_slugs = $this->slugGenerator($request->brand_name);
    	$brand->save();
    	
    	//return back()->with('message', 'Brand added successfully!');
    	Session::flash('message', 'Brand added successfully');
    	return back();
    }

    public function allBrand(){
    	$allBrand = Brand::orderBy('id', 'DESC')->get();
    	return view('admin.brand.allBrand', compact('allBrand'));
    }

/*Updating data using ajax*/
    public function brandStatus($id, $status){
    	$activeBrand = Brand::find($id);
    	$activeBrand->brand_status = $status;
    	$activeBrand->save();

    	return response()->json(['message' => 'Success']);
    }

    public function editBrand($id){
    	$editBrand = Brand::find($id);
    	return view('admin.brand.editBrand', compact('editBrand'));
    }

    public function updateBrand(Request $request){
    	$brand = Brand::find($request->id);
    	$brand->brad_name = $request->brand_name;
    	$brand->brand_slugs = $this->slugGenerator($request->brand_name);
    	$brand->save();

    	Session::flash('message', 'Brand Updated Successfully');
    	return redirect('/brand/all-brand');
    }

    public function deleteBrand($id){
    	$deleteBrand = Brand::find($id);
    	$deleteBrand->delete();

    	Session::flash('message', ' Brand delete successfylly');
    	return back();
    }

    /*Slug Generator to prevent the special carecter*/
    public function slugGenerator($string){
    	$string = str_replace(' ', '-', $string);
    	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    	return strtolower(preg_replace('/-+/', '-', $string));
    }
}
