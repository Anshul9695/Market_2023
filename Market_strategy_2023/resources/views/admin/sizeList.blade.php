@extends('admin/layout')

@section('container')
<h1 class="mb10">Size</h1>
<a href="{{url('admin/size/manage_size')}}">
    <button type="button" class="btn btn-success">
        Add Size
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
                        <th>Size Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($size as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td class="process">{{$list->size}}</td>
                        <td>
                            @if($list->status==1)
                            <a href="{{url('admin/size/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary"> Active</button></a>
                            @elseif($list->status==0)
                            <a href="{{url('admin/size/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning"> Deactive</button></a>
                            @endif
                            <a href="{{url('admin/size/manage_size')}}/{{$list->id}}"><button type="button" class="btn btn-success"> Edit</button></a>
                            <a href="{{url('admin/size/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger"> Delete</button></a>
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