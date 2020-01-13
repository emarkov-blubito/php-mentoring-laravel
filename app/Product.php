<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'url', 'description', 'brand_id', 'category_id'
    ];
}
