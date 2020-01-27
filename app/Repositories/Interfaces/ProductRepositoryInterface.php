<?php
namespace App\Repositories\Interfaces;

use App\Brand;
use App\Category;

interface ProductRepositoryInterface
{
    public function all();
    public function getByCategory(Category $category);
    public function getByBrand(Brand $brand);
    public function getByName($name);
}