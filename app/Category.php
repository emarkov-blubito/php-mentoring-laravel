<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'url', 'description',
    ];

    public function products()
    {
    	$this->hasMany('App\Product');
    }
}
