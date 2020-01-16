<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

	public $timestamps = false;

    protected $fillable = [
        'name', 'url', 'description',
    ];
}
