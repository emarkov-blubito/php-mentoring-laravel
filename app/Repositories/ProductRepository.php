<?php
namespace App\Repositories;


use App\Brand;
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
        return Product::where('brand_id', $brand->id)->get();
    }

    public function getByCategory($categoryId)
    {
        return Product::where('category_id', $categoryId)->get();
    }

    public function getByName($name)
    {
        return Product::where('name', $name)->get();
    }
}