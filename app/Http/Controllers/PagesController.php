<?php

namespace App\Http\Controllers;

use App\Category;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage()
    {

        $products = Product::limit(10)->get();

        return view('welcome', ['products' => $products]);
    }

    public function loadProducts($offset)
    {
    	//if($request->ajax()) {
    		$products = Product::limit(10)->offset($offset)->get();
    		return response()->json(['products' => $products->toJson()], 200);
    	//}
    }
}
