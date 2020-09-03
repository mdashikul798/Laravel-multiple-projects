@extends('layouts.app')
@section('content')
    <div class="container">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" style="margin:20px">
            <div class="sparkline8-list mt-b-30">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Add Slider Section</h1>
                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <!-- including the success fully message -->
                            @include('admin.include.message')
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <div class="basic-login-inner">
                                    <form action="{{route('save-slider')}}" method="POST" enctype="multipart/form-data">
                                    	@csrf
                                        <div class="form-group-inner">
                                            <label>Slider Title</label>
                                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" required placeholder="Enter Title" />
                                        </div>
                                        <div class="form-group-inner">
                                            <label>Slider Sub Title</label>
                                            <input type="text" name="subtitle" value="{{ old('subtitle') }}" class="form-control" required placeholder="Enter Sub Title" />
                                        </div>
                                        <div class="form-group-inner">
                                            <label>Enter Url</label>
                                            <input type="url" name="url" value="{{ old('url') }}" class="form-control" required placeholder="Enter Url" />
                                        </div>
                                        <div class="form-group-inner">
                                            <label>Enter Start Date</label>
                                            <input type="date" name="startdate" value="{{ old('startdate') }}" class="form-control" required placeholder="yyyy-mm-dd" />
                                        </div>
                                        <div class="form-group-inner">
                                            <label>Enter End Date</label>
                                            <input type="date" name="enddate" value="{{ old('enddate') }}" class="form-control" required placeholder="yyyy-mm-dd" />
                                        </div>
                                        <div class="form-group-inner">
                                            <label>Choose you Image</label>
                                            <input type="file" name="image" value="{{ old('img') }}" class="form-control" required />
                                        </div>
                                        <div class="login-btn-inner">
                                            <div class="inline-remember-me">
                                                <button class="btn btn-sm btn-danger pull-right" type="submit">Add Slider</button>
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