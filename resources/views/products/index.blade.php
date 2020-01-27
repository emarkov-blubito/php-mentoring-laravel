@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product listing</div>

                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert-success">{{ Session::get('message') }}</div>
                    @endif
                    <form method="POST" action="/products/filter" class="filter-products">
                        @csrf
                        <div class="form-group row">
                            <div class="col-4">
                                <select name="brand_id" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <input type="search" placeholder="Search..." name="name" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <a href="{{ action('ProductController@create') }}" class="btn btn-primary">
                                    Create
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="product-table">
                        @include('products/table');
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            var productsFilter = $('.filter-products');

            productsFilter.on('change', function (event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    data: productsFilter.serialize(),
                    url: productsFilter.attr('action'),
                    success: function(response){
                        $('.product-table').html(response.products);
                    }
                });
            });
        });
    </script>
@endsection
