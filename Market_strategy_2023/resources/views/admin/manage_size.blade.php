@extends('admin/layout')

@section('container')
    <h1 class="mb10">Manage Size</h1>
    <a href="{{url('admin/size/sizeList')}}">
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
                                        <form action="{{url('admin/size/manage_size_process')}}" method="post">
                                        <input type="hidden" name="id" value=""/>
                                            @csrf
                                           
                                            <div class="form-group">
                                                <label for="size" class="control-label mb-1">Size Name :</label>
                                                <input id="size" name="size" type="text" value="" class="form-control">
                                            </div>
                                            @error('size')
                                            <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                        <label for="status" class="control-label mb-1">Status</label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
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