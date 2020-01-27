@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit brand {{$brand->name}}</div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert-success">{{ Session::get('message') }}</div>
                        @endif
                        <form method="POST" action="{{ action('BrandController@update', ['brand' => $brand]) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label>Name</label>
                                <input type="text" class="form-control"
                                   name="name" value="{{$brand->name}}" required autocomplete="name" autofocus>
                            </div>
                            <div class="form-group row">
                                <label>Url</label>
                                <input type="text" class="form-control"
                                   name="url" value="{{$brand->url}}" required>
                            </div>
                            <div class="form-group row">
                                <label>Description</label><br>
                                <textarea name="description" style="width:100%;height:100px;">{{$brand->description}}</textarea>
                            </div>
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
