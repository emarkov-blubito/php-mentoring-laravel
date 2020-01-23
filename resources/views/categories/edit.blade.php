@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit category {{$category->name}}</div>
                    <div class="card-body">
                        <div class="content">
                            <input type="text" class="form-control"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <textarea>{{$category->description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
