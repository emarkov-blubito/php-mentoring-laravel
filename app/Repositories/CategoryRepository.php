<?php

namespace App\Repositories;

use App\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function getProductsByUrl($url)
    {
        return Category::where('url',$url)->first()->with('products')->paginate(15);
    }

}
