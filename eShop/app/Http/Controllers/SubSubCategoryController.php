<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function manageSubSubCategory(){
    	return view('admin.subsubCategory.manageSubSubCategory');
    }
}
