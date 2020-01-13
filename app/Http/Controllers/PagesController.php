<?php

namespace App\Http\Controllers;

use App\Category;

class PagesController extends Controller
{
    public function homepage()
    {

        $category = Category::find(1);

        return view('welcome', ['category' => $category]);
    }
}
