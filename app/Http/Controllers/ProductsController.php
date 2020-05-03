<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(12)->get();

        return view('ecom.products')->with('products', $products);
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $recom = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();
        return view('ecom.show')->with([
            'product' => $product,
            'recom' => $recom,
            ]);
    }

    public function recom($slug)

    {

    }


}
