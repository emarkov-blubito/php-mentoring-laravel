@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category listing</div>

                <div class="card-body">
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
                                    <a href="/categories/{{$category->id}}/edit">Edit</a>
                                    <form method="POST" action="{{ action('CategoryController@destroy', ['category' => $category]) }}">
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
