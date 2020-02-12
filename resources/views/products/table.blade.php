@if($products)
    <div class="row">
        <div class="col-md-2">Category</div>
        <div class="col-md-2">Brand</div>
        <div class="col-md-2">Name</div>
        <div class="col-md-2">Url</div>
        <div class="col-md-2">Description</div>
        <div class="col-md-2">Operations</div>
    </div>
    @foreach($products as $product)
        <div class="row">
            <div class="col-md-2">{{$product->category->name}}</div>
            <div class="col-md-2">{{$product->brand->name}}</div>
            <div class="col-md-2">{{$product->name}}</div>
            <div class="col-md-2">{{$product->url}}</div>
            <div class="col-md-2">{{$product->description}}</div>
            <div class="col-md-2">
                @auth
                    <a href="{{ action('ProductController@edit', ['product' => $product]) }}">Edit</a>
                    <form method="POST" action="{{ action('ProductController@destroy', ['product' => $product]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                @else
                    <a href="{{ action('ProductController@show', ['product' => $product]) }}">Show</a>
                @endauth
            </div>
        </div>
    @endforeach

    @if(isset($controller))
        @if($controller == 'Product')
            {{$products->appends(request()->input())->withPath('products')->render()}}
        @elseif($controller == 'Category')
            {{$products->appends(request()->input())->render()}}
        @endif
    @endif
@endif
