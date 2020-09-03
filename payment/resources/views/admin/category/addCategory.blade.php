@extends('admin.partials.layout')

@section('content')
    
    <div class="calender-area mg-tb-30">
        <div class="container-fluid">
        	
           	@include('admin.partials.message')
            
           <div class="sparkline12-list mt-b-30">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Add Category</h1>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="input-knob-dial-wrap">
                    	<form action="{{ route('save.category') }}" method="post" enctype="multipart/form-data">
                    		@csrf
	                        
	                        <div class="row">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <div class="input-mask-title">
	                                    <label>Category Name :</label>
	                                </div>
	                            </div>
	                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
	                                <div class="form-select-list">
	                                    <input type="text" name="category_name" class="form-control basic-ele-mg-b-10" placeholder="Enter category name" required>
	                                </div>
	                            </div>
	                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                                <div class="form-select-list">Upload Image : 
	                                    <label title="Upload image file" for="inputImage" class="btn btn-primary img-cropper-cp">
											<input type="file" accept="image/*" name="category_image" id="inputImage" class="hide"> Upload category image
										</label>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                        	<button style="margin-top:20px;margin-left:25.7%;" type="submit" class="btn btn-custon-rounded-four btn-primary">Add Category</button>
		                        </div>
	                        </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
		    
        </div>
    </div>
@endsection
