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
            <div class="col-md-2">
                @foreach($categories as $category)
                    {{($category->id == $product->category_id) ? $category->name : ""}}
                @endforeach
            </div>
            <div class="col-md-2">
                @foreach($brands as $brand)
                    {{($brand->id == $product->brand_id) ? $brand->name : ""}}
                @endforeach
            </div>
            <div class="col-md-2">{{$product->name}}</div>
            <div class="col-md-2">{{$product->url}}</div>
            <div class="col-md-2">{{$product->description}}</div>
            <div class="col-md-2">
                <a href="{{ action('ProductController@edit', ['product' => $product]) }}">Edit</a>
                <form method="POST" action="{{ action('ProductController@destroy', ['product' => $product]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    {{$products->render()}}
@endif