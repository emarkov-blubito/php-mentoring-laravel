@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit product {{$product->name}}</div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <form method="POST" action="{{ action('ProductController@update', ['product' => $product]) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                            <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option {{ ($category->id == $product->category_id) ? "selected" : "" }} value="{!! $category->id !!}">{!! $category->name !!}</option>
                                    @endforeach
                                </select>   
                            </div>
                            @error('category_id') <div class="alert-danger">{{$message}}</div> @enderror
                            <div class="form-group row">
                            <label>Brand</label>
                                <select name="brand_id" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option {{ ($brand->id == $product->brand_id) ? "selected" : "" }} value="{!! $brand->id !!}">{!! $brand->name !!}</option>
                                    @endforeach
                                </select>   
                            </div>
                            @error('brand_id') <div class="alert-danger">{{$message}}</div> @enderror
                            <div class="form-group row">
                                <label>Name</label>
                                <input type="text" class="form-control"
                                   name="name" value="{{$product->name}}" required autocomplete="name" autofocus>
                            </div>
                            @error('name') <div class="alert-danger">{{$message}}</div> @enderror
                            <div class="form-group row">
                                <label>Url</label>
                                <input type="text" class="form-control"
                                   name="url" value="{{$product->url}}" required>
                            </div>
                            @error('url') <div class="alert-danger">{{$message}}</div> @enderror
                            <div class="form-group row">
                                <label>Description</label><br>
                                <textarea name="description" style="width:100%;height:100px;">{{$product->description}}</textarea>
                            </div>
                            @error('description') <div class="alert-danger">{{$message}}</div> @enderror
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
