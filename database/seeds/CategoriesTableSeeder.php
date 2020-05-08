<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'car', 'slug' => 'car', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'monkey', 'slug' => 'monkey', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'just another cat', 'slug' => 'just another cat', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'phone', 'slug' => 'phone', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'boat', 'slug' => 'boat', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'bicycle', 'slug' => 'bicycle', 'created_at' => $now, 'updated_at' => $now],

        ]);
    }
}
