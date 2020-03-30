@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category listing</div>

                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-8">
                            <a href="{{ action('CategoryController@create') }}" class="btn btn-primary">
                                Create
                            </a>
                        </div>
                    </div>
                    @if($categories)
                        <div class="row">
                            <div class="col-md-3">Name</div>
                            <div class="col-md-3">Url</div>
                            <div class="col-md-3">Description</div>
                            <div class="col-md-3">Operations</div>
                        </div>
                        @foreach($categories as $category)
                            <div class="row">
                                <div class="col-md-3">{{$category->name}}</div>
                                <div class="col-md-3">{{$category->url}}</div>
                                <div class="col-md-3">{{$category->description}}</div>
                                <div class="col-md-3">
                                    <a href="{{ action('CategoryController@edit', ['category' => $category]) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ action('CategoryController@destroy', ['category' => $category]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="javascript:;" onclick="$(this).parent().submit();">
                                            <i class="fa fa-trash"></i>
                                        </button>
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
