<?php
namespace App\Repositories\Interfaces;

interface BrandRepositoryInterface
{
    public function all();
    public function getProductsByUrl($url);
}
