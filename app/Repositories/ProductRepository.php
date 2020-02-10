<?php
namespace App\Repositories;


use App\Brand;
use App\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::paginate(5);
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

    public function search(Request $request)
    {
        $product = new Product();
        $flag = false;
        if ($request->category_id) {
            $product = $product->where('category_id', $request->category_id);
            $flag = true;
        }
        if ($request->brand_id) {
            $product = $product->where('brand_id', $request->brand_id);
            $flag = true;
        }
        if ($request->name) {
            $product = $product->where('name', 'like', '%' . $request->name . '%');
            $flag = true;
        }

        if($flag == false){
            return $this->all();
        }

        return $product->paginate(5);
    }
}