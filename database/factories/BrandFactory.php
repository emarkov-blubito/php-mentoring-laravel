<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Brand::class, function (Faker $faker) {
	$name = $faker->name;
	$url = strtolower(str_replace(' ', '-', $name));
	$url = str_replace('.', '', $url);
    return [
        'name' => $name,
        'url' => $url,
        'description' => $faker->text(),
    ];
});
