@extends('admin/layout')

@section('container')
    <h1 class="mb10">Category</h1>
    <a href="{{url('admin/catagory/manage_category')}}">
        <button type="button" class="btn btn-success">
            Add Category
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
        {{session('message')}}
        </div>
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Catagory Name</th>
                            <th>Catagory Slug</th>
                            <th>Created_at</th>
                            <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->catagory_name}}</td>
                            <td>{{$list->catagory_slug}}</td>
                            <td class="process">{{$list->created_at}}</td>
                            <td>
                                <a href="{{url('admin/catagory/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                <a href=""><button type="button" class="btn btn-warning">Active</button></a>
                                <a href="{{url('admin/catagory/manage_category')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
                        
@endsection