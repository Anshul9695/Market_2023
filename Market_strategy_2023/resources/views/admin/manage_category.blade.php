@extends('admin/layout')

@section('container')
    <h1 class="mb10">Manage Category</h1>
    <a href="{{url('admin/category')}}">
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
                                        <form action="{{route('catagory.insert')}}" method="post">
                                        <input type="hidden" name="id" value="{{$id}}"/>
                                            @csrf
                                            <div class="form-group">
                                                <label for="catagory" class="control-label mb-1">Catagory Name :</label>
                                                <input id="catagory_name" name="catagory_name" type="text" value="{{$catagory_name}}" class="form-control">
                                            </div>
                                            @error('catagory_name')
                                            <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                                <label for="catagory_slug" class="control-label mb-1">Catagory Slug :</label>
                                                <input id="catagory_slug" name="catagory_slug" type="text" value="{{$catagory_slug}}" class="form-control">
                                            </div>
                                            @error('catagory_slug')
                                            <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                             </div>
                                            @enderror
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