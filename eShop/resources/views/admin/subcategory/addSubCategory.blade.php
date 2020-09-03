@extends('layouts.app')
@section('content')
    <div class="container">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:20px">
            <div class="sparkline8-list mt-b-30">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Add Sub-Category</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <!-- including the success fully message -->
                            @include('admin.include.message')
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="basic-login-inner">
                                    <form action="{{route('save-subcategory')}}" method="POST">
                                    	@csrf
                                        <div class="form-group-inner">
                                            <label>Select Category</label>
                                            <select class="form-control" id="cat_id" name="category">
                                                <option value="">Select Category</option>
                                                @foreach($category as $row)
                                                <option value="{{ $row->id }}">{{ ucwords($row->category_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group-inner">
                                            <label>Sub Category Name</label>
                                            <input type="text" name="subCategory_name" value="{{ old('subCategory_name') }}" class="form-control" placeholder="Enter Sub Category Name" />
                                        </div>
                                        <div class="login-btn-inner">
                                            <div class="inline-remember-me">
                                                <button class="btn btn-sm btn-danger pull-right" type="submit">Submit</button>
                                                <label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection