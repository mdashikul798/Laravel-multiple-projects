<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();

       foreach(range(1, 10) as $index){

       	$category = $faker->name;
       	Category::create([
       		'category_name' => $category,
       		'status' => rand(0, 1),
       		'slug' => $faker->slug
       	]);

       }
    }
}
