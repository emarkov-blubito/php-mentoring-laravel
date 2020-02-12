<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\Category;
use App\Brand;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->search($request);
        $categories = Category::all();
        $brands = Brand::all();
        $controller = 'Product';
        return view('products/index', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'controller' => $controller
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products/create', ['categories' => $categories, 'brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->all());

        return redirect()->action('ProductController@edit', ['product' => $product])
        ->with(['message' => 'Successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products/edit', ['product' => $product, 'categories'=>$categories, 'brands'=>$brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->action('ProductController@edit', ['product' => $product])
        ->with(['message' => 'Successfully updated']);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->action('ProductController@index')
        ->with(['message' => 'Successfully deleted']);
    }

    public function filter(Request $request)
    {
        if ($request->ajax()) {
            $products = $this->productRepository->search($request);
            $controller = 'Product';
            $html = view('products/table', [
                'products' => $products,
                'categories' => Category::all(),
                'brands' => Brand::all(),
                'controller' => $controller
            ])->render();
            return response()->json(['products' => $html], 200);
        }
    }
}
