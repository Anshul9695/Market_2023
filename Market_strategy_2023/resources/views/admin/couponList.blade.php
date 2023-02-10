@extends('admin/layout')

@section('container')
    <h1 class="mb10">Coupon</h1>
    <a href="{{url('admin/coupon/manage_coupon')}}">
        <button type="button" class="btn btn-success">
            Add Coupon
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
                            <th>Coupon Title</th>
                            <th>Coupon Code</th>
                            <th>Coupon Value</th>
                            <th>Coupon Type</th>
                            <th>Min Order Amt</th>
                            <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($CouponList as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->title}}</td>
                            <td>{{$list->coupon_code}}</td>
                            <td>{{$list->coupon_value}}</td>
                            <td>{{$list->type}}</td>
                            <td class="process">{{$list->min_order_amt}}</td>
                            <td>
                                <a href="{{url('admin/coupon/delete')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                <a href=""><button type="button" class="btn btn-warning">Active</button></a>
                                <a href="{{url('admin/coupon/manage_coupon')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Edit</button></a>
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