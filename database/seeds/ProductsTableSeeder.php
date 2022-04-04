<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index)  {
            DB::table('products')->insert([
                'name' => $faker->unique()->name,
                'slug' => $faker->unique()->slug,
                'details' => $faker->sentence,
                'price' => $faker->numberBetween($min = 500, $max = 8000),
                'description'=> $faker->paragraph($nb =8)
            ]);
        }
    }
}
