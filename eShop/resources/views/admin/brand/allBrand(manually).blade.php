@extends('layouts.app')
@section('content')
	<br>
	@include('admin.include.message')
	<div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>All Brand</h4>
                        <div class="add-product">
                            <a href="{{route('add-brand')}}">Add Brand</a>
                        </div>
                        <table>
                            <tbody>
                            <tr>
                                <th>SL No.</th>
                                <th>Brand Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @php($i = 1)
                            @foreach($allBrand as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->brad_name }}</td>
                                <td>
									<input {{ $row->brand_status ==1 ? 'checked':''}} id="brandStatus" data-id="{{ $row->id}}" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive">
                                </td>
                                <td>
                                	@if($row->brand_status == 1)
                                    <a href="{{route('inactive-brand', $row->id)}}">
                                    	<button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Status"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
                                    </a>
									@else
									<a href="{{ route('active-brand', $row->id) }}">
									<button style="color:#f16631fa;" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Status"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
									</a>
									@endif
									<a href="{{route('edit-brand', $row->id)}}">
                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </a>
                                    <a href="{{ route('delete-brand', $row->id) }}">
                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @php($i++)
                            @endforeach
                        </tbody></table>
                        <div class="custom-pagination">
							<ul class="pagination">
								<li class="page-item"><a class="page-link" href="#">Previous</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">Next</a></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
@endsection