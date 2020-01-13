<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;
use App\Brand;
use App\Product;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$categories = Category::all();
    	$brands = Brand::all();
    	$faker = Faker\Factory::create();
    	foreach($categories as $category) {
    		foreach($brands as $brand) {
	    		for($i = 0; $i < 50; $i++) {
					$name = $faker->name;
					$url = strtolower(str_replace(' ', '-', $name));
					$url = str_replace('.', '', $url);
	    			$data = [
	    				'category_id'	=> $category->id,
	    				'brand_id'	=> $brand->id,
				        'name' => $name,
				        'url' => $url,
				        'description' => $faker->text(),
	    			];
	    			Product::create($data);
	    		}
    		}
    	}
    }
}