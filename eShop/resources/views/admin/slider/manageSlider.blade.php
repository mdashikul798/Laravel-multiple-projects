@extends('layouts.app')
@section('content')
    <br>
    @include('admin.include.message')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Manage Slider</h4>
                        <div class="add-product">
                            <a href="{{route('add-slider')}}">Add Slider</a>
                        </div>
                        <table>
                            <tbody>
                            <tr>
                                <th>SL No.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Sub Title</th>
                                <th>Date</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @php($i = 1)
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ substr($slider->title, 0, 30) }}</td>
                                <td><img style="width:60px;height:50px;" src="{{ asset('uploads/slider/'.$slider->img) }}" alt=""></td>
                                <td>{{ substr($slider->subtitle, 0, 30) }}</td>
                                <td>{{ $slider->startdate .' - '. $slider->enddate }}</td>
                                <td>
                                	<a href="{{ $slider->url }}" target="_blank" class="btn btn-primany btn-xs">Click Here</a>
                                </td>
                                
                                <td>
                                    <input {{ $slider->status ==1 ? 'checked':''}}  data-size="mini" id="sliderStatus" data-id="{{ $slider->id}}" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive">
                                </td>
                                <td>
                                    <a href="{{route('edit-slider', $slider->id)}}">
                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </a>
                                    <a id="delete" href="{{ route('delete-slider', $slider->id) }}">
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