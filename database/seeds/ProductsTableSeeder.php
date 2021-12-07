<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <30; $i++ ){
            Product::create([
            'name' => 'car' .$i,
            'slug' => 'car-' .$i,
            'details' => 'this is product detail demo for testing',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ])->categories()->attach(1);
    }

    /* to attach another category to excisting or
    to make it multiple use next peace of code

    //
    $product = Product::find(1);    taking cat 1 wich is definded as a car
    $product->categories()->attach(2);   attaching  cat 2 wich is monkey  now products from cat 1 will also display in cat 2
    //
     */

    for($i = 1; $i <10; $i++ ){
            Product::create([
            'name' => 'monkey' .$i,
            'slug' => 'monkey-' .$i,
            'details' => 'this is product detail demo for testing',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
                Similique facere cupiditate porro illo asperiores non cum ab harum.
                Et enim laborum nihil nobis beatae nemo ad!,',

    ])->categories()->attach(2);
}

    for($i = 1; $i <12; $i++ ){
             Product::create([
            'name' => 'just another cat' .$i,
            'slug' => 'just another cat-' .$i,
            'details' => 'this is product detail demo for testing',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ])->categories()->attach(3);
    }


         Product::create([
            'name' => 'phone',
            'slug' => 'phone-',
            'details' => 'this is product detail demo for testing',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ])->categories()->attach(4);


         Product::create([
            'name' => 'boat',
            'slug' => 'boat-',
            'details' => 'this is product detail demo for testing',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ])->categories()->attach(5);


        $product = Product::find(5);
        $product->categories()->attach(6);


         Product::create([
            'name' => 'bicycle',
            'slug' => 'bicycle',
            'details' => 'this is product detail demo for testing ',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ])->categories()->attach(6);
    }
}
