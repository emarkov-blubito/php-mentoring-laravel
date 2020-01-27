@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Brand listing</div>

                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-8">
                            <a href="{{ action('BrandController@create') }}" class="btn btn-primary">
                                Create
                            </a>
                        </div>
                    </div>
                    @if($brands)
                        <div class="row">
                            <div class="col-md-3">Name</div>
                            <div class="col-md-3">Url</div>
                            <div class="col-md-3">Description</div>
                            <div class="col-md-3">Operations</div>
                        </div>
                        @foreach($brands as $brand)
                            <div class="row">
                                <div class="col-md-3">{{$brand->name}}</div>
                                <div class="col-md-3">{{$brand->url}}</div>
                                <div class="col-md-3">{{$brand->description}}</div>
                                <div class="col-md-3">
                                    <a href="{{ action('BrandController@edit', ['brand' => $brand]) }}">Edit</a>
                                    <form method="POST" action="{{ action('BrandController@destroy', ['brand' => $brand]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
