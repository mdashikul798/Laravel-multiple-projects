<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

       foreach(range(1, 7) as $index){

       	$slider = $faker->name;
       	Slider::create([
       		'title' => $faker->sentence,
       		'subtitle' => $faker->paragraph,
       		'img' => $faker->imageUrl(),
       		'url' => $faker->imageUrl(),
       		'startdate' => $faker->date(),
       		'enddate' => $faker->date(),
       		'status' => rand(0, 1)
       	]);

       }
    }
}
