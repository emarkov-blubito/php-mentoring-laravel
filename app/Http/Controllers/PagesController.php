<?php

namespace App\Http\Controllers;

use App\Category;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function homepage()
    {
        $products = Product::paginate(10);
        $categories = Category::limit(5)->get();

        return view('welcome', ['products' => $products , 'categories' => $categories]);
    }

    public function loadProducts($offset)
    {
    	//if($request->ajax()) {
    		$products = Product::limit(10)->offset($offset)->get();
    		return response()->json(['products' => $products->toJson()], 200);
    	//}
    }
}
