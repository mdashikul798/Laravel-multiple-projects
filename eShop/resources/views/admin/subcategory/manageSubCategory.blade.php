@extends('layouts.app')
@section('content')
    <br>
    @include('admin.include.message')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Manage Sub-Category</h4>
                        <div class="add-product">
                            <a href="{{route('add-subcategory')}}">Add Sub-Category</a>
                        </div>
                        <table>
                            <tbody>
                            <tr>
                                <th>SL No.</th>
                                <th>Category Name</th>
                                <th>Sub Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @php($i = 1)
                            @foreach($subCat as $row)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $row->category->category_name }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <input {{ $row->status ==1 ? 'checked':''}}  data-size="mini" id="subCategoryStatus" data-id="{{ $row->id}}" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive">
                                </td>
                                <td>
                                    <a href="{{route('edit-sub-category', $row->id)}}">
                                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </a>
                                    <a id="delete" href="{{ route('delete-subCategory', $row->id) }}">
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