@extends('admin/layout')

@section('container')
<h1 class="mb10">Manage Coupon</h1>
<a href="{{url('admin/coupon/couponList')}}">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <form action="{{url('admin/coupon/manage_coupon_process')}}" method="post">
                            <input type="hidden" value="{{$id}}" name="id" />
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title" class="control-label mb-1">Title</label>
                                        <input id="title" name="title" value="{{$title}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                                        <input id="coupon_code" name="coupon_code" value="{{$coupon_code}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        @error('coupon_code')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="coupon_value" class="control-label mb-1">Coupon Value</label>
                                        <input id="coupon_value" name="coupon_value" value="{{$coupon_value}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="value" class="control-label mb-1">Type</label>
                                        <select id="type" name="type" class="form-control" required>
                                            @if($type=='Value')
                                            <option value="Value" selected>Value</option>
                                            <option value="Per">Per</option>
                                            @elseif($type=='Per')
                                            <option value="Value">Value</option>
                                            <option value="Per" selected>Per</option>
                                            @else 
                                            <option value="Value"selected >Value</option>
                                            <option value="Per">Per</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="min_order_amt" class="control-label mb-1">Min Order Amt</label>
                                        <input id="min_order_amt" name="min_order_amt" value="{{$min_order_amt}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="is_one_time" class="control-label mb-1">IS One Time</label>
                                        <select id="is_one_time" name="is_one_time" class="form-control" required>
                                            @if($is_one_time=='1')
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                            @elseif($is_one_time=='0')
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                            @else       
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="control-label mb-1">Status</label>
                                        <select id="status" name="status" class="form-control" required>
                                            @if($status=='1')
                                            <option value="1" selected>Active</option>
                                            <option value="0">Deactive</option>
                                            @elseif($status=='0')
                                            <option value="1">Active</option>
                                            <option value="0" selected>Deactive</option>
                                            @else    
                                            <option value="1" selected>Active</option>
                                            <option value="0" >Deactive</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection