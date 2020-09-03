<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

class SubCategoriesTableSeeder extends Seeder
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
        	SubCategory::create([
        		'cat_id' => rand(0, 10),
        		'name' => $faker->name,
        		'status' => rand(0, 1),
        		'slug' => $faker->slug
        	]);

        }
    }
}
