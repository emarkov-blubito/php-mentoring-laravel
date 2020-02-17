<?php

namespace App\Repositories;

use App\Brand;
use App\Product;
use App\Repositories\Interfaces\BrandRepositoryInterface;
//use Your Model

/**
 * Class BrandRepository.
 */
class BrandRepository implements BrandRepositoryInterface
{
    public function all(){
        return Brand::all();
    }

    public function getBrandIdByUrl($url){
        return Brand::where('url', $url)->first()->id;
    }

    public function getProductsByUrl($url){
        return Product::where('brand_id', $this->getBrandIdByUrl($url))->paginate(5);
    }
}
