<?php

namespace App\Repositories;

use App\Category;
use App\Product;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function getCategoryIdByUrl($url){
        return Category::where('url', $url)->first()->id;
    }

    public function getProductsByUrl($url)
    {
        return Product::where('category_id', $this->getCategoryIdByUrl($url))->with('category')->paginate(5);
    }

}
