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
         Product::create([
            'name' => 'product1',
            'slug' => 'product1slug',
            'details' => 'this is  Product one dummy',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ]);

         Product::create([
            'name' => 'product2',
            'slug' => 'product2slug',
            'details' => 'this is  Product two dummy',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ]);

         Product::create([
            'name' => 'product3',
            'slug' => 'product3slug',
            'details' => 'this is  Product three dummy',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ]);


         Product::create([
            'name' => 'product4',
            'slug' => 'product4slug',
            'details' => 'this is  Product four dummy',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ]);


         Product::create([
            'name' => 'product5',
            'slug' => 'product5slug',
            'details' => 'this is  Product five dummy',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ]);


         Product::create([
            'name' => 'product6',
            'slug' => 'product6slug',
            'details' => 'this is  Product six dummy',
            'price' => '50.50',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque odio corrupti nemo.
             Similique facere cupiditate porro illo asperiores non cum ab harum.
              Et enim laborum nihil nobis beatae nemo ad!,',

        ]);
    }
}
