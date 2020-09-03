<?php

namespace App\Http\Controllers;
use App\Slider;
use Session;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function manageSlide(){

    	$sliders = Slider::latest()->get();/*showing sub-category data with 'category id'*/
    	return view('admin.slider.manageSlider', compact('sliders'));
    }

    public function create(){
    	return view('admin.slider.create');
    }

     public function addSlider(){
    	return view('admin.slider.addslider');
    }

    public function saveSlider(Request $request){
    	$request->validate([
    		'title' => 'required|min:5|max:25',
    		'subtitle' => 'required|min:5|max:25',
    		'image' => 'required',
    		'url' => 'required',
    		'startdate' => 'required',
    		'enddate' => 'required'
    	]);

    	$slider = null;

    	try{
    		$image = $request->file('image');
    		$fileExt = $image->getClientOriginalExtension();
    		$fileName = date('ymdhis.') . $fileExt;
    		$image->move(public_path('uploads/slider/'), $fileName);

    		$slider = Slider::create([
    			'title' => $request->title,
    			'subtitle' => $request->subtitle,
    			'img' => $fileName,
    			'url' => $request->url,
    			'startdate' => $request->startdate,
    			'enddate' => $request->enddate,
    		]);
    	}catch(Exception $exception){
    		$slider = false;
    	}

    	if($slider){
    		Session::flash('message', 'Slider added successfully');
    	}

    	
    	return back();
    }

    public function sliderStatus($id, $status){
    	$subStatus = Slider::find($id);
    	$subStatus->status = $status;
    	$subStatus->save();

    	return response()->json(['message' => 'Success']);
    }

    public function editSlider($id){
    	$subId = Slider::find($id);
        $category = Category::orderBy('category_name', 'ASC')->get();
    	return view('admin.subcategory.editsub', compact('subId', 'category'));
    }

    public function updateSlider(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subCategory_name' => 'required'
        ]);

        $category = null;
        try{
            $name = $request->subCategory_name;
            
            $success = Slider::create([
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

    public function deleteSlide($id){
    	$deleteSlider = Slider::find($id);
    	$deleteSlider->delete();

    	Session::flash('message', 'Slider deleted successfully');
    	return back();
    }

    /*Slug Generator to prevent the special carecter*/
    public function slugGenerator($string){
    	$string = str_replace(' ', '-', $string);
    	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    	return strtolower(preg_replace('/-+/', '-', $string));
    }
}
