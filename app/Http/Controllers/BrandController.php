<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private $brandRepository;
    private $categoryRepository;

    public function __construct(BrandRepository $brandRepository, CategoryRepository $categoryRepository){
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get();
        return view('brands/index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = Brand::create($request->all());

        return redirect()->action('BrandController@edit', ['brand' => $brand])
        ->with(['message' => 'Successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brands/edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());
        return redirect()->action('BrandController@edit', ['brand' => $brand])
        ->with(['message' => 'Successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->action('BrandController@index')
        ->with(['message' => 'Successfully deleted']);
    }

    public function getProductsByUrl($url){
        $products = $this->brandRepository->getProductsByUrl($url);
        $brands = $this->brandRepository->all();
        $categories = $this->categoryRepository->all();
        $controller = 'Brand';

        return view('welcome', ['products'=>$products, 'brands'=>$brands, 'categories' => $categories, 'controller'=>$controller]);
    }
}
