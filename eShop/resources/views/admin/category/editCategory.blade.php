@extends('layouts.app')
@section('content')
    <div class="container">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:20px">
            <div class="sparkline8-list mt-b-30">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Edit Category Section</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <!-- including the success fully message -->
                            @include('admin.include.message')
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="basic-login-inner">
                                    <form action="{{route('update-category')}}" method="POST">
                                    	@csrf
                                        <div class="form-group-inner">
                                            <label>Brand Name</label>
                                            <input type="hidden" name="id" value="{{ $editCategory['id'] }}">
                                            <input type="text" name="category_name" value="{{ $editCategory['category_name'] }}" class="form-control" placeholder="Enter Brand Name" />
                                        </div>
                                        <div class="login-btn-inner">
                                            <div class="inline-remember-me">
                                                <button class="btn btn-sm btn-danger pull-right" type="submit">Update Category</button>
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