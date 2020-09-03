@extends('admin.partials.layout')

@section('content')
    
    <div class="calender-area mg-tb-30">
        <div class="container-fluid">

           @include('admin.partials.message')
           
           <div class="sparkline12-list mt-b-30">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Add Product</h1>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="input-knob-dial-wrap">
                    	<form action="{{ route('save.product') }}" method="post" enctype="multipart/form-data">
                    		@csrf
	                        <div class="row">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <div class="input-mask-title">
	                                    <label>Product Name / Model :</label>
	                                </div>
	                            </div>
	                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	                                <div class="input-mark-inner mg-b-22">
	                                    <input type="text" name="product_name" class="form-control" data-mask="999-99-999-9999-9" placeholder=" Enter product name" required>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <div class="input-mask-title">
	                                    <label>Product Price :</label>
	                                </div>
	                            </div>
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	                                <div class="form-select-list">
	                                    <input type="text" name="product_price" class="form-control basic-ele-mg-b-10" placeholder="Enter price" required>
	                                </div>
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                                <div class="form-select-list">Upload Image :
	                                    <label title="Upload image file" for="inputImage" class="btn btn-primary img-cropper-cp">
											<input type="file" accept="image/*" name="product_image" id="inputImage" class="hide" required> Upload product image
										</label>
	                                </div>
	                            </div>
	                        </div>
	                        
	                        <div class="row">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <div class="input-mask-title">
	                                    <label>Description : </label>
	                                </div>
	                            </div>
	                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	                                <div class="input-mark-inner mg-b-22">
	                                    <textarea class="form-control" name="description" cols="10" rows="5" placeholder="Describe about product"></textarea>
	                                </div>
	                            </div>
	                        </div>
	                        
	                        <div class="row">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <div class="input-mask-title">
	                                    <label>Category :</label>
	                                </div>
	                            </div>
	                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	                                <div class="input-mark-inner">
	                                    <select class="form-control" name="category" required>
											<option>Select Category</option>
											<option value="1">Phone</option>
											<option value="2">Talevishion</option>
											<option value="3">Mobile</option>
										</select>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
		                        	<button type="submit" class="btn btn-custon-rounded-four btn-primary pull-right">Add Product</button>
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
