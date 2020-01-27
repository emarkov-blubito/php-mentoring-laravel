<?php
namespace App\Repositories;


use App\Brand;
use App\Category;
use App\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function getByBrand(Brand $brand)
    {
        return Product::where('brand_id' . $brand->id)->get();
    }

    public function getByCategory(Category $category)
    {
        return Product::where('category_id' . $category->id)->get();
    }
}