<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        if(request()->category)
        {
            $products = Product::with('categories')->whereHas('categories', function ($query){
                $query->where('slug', request()->category);

            });

            $categoryName   = optional( $categories->where('slug', request()->category)->first())->name;
        }else{
        $products   = Product::where('featured', true);
        $categoryName = 'Все Товары';

        }

        if(request()->sort == 'low_high')
        {
            $products = $products->orderBy('price')->paginate(9);
        }elseif (request()->sort == 'high_low')
        {
            $products = $products->orderBy('price', 'desc')->paginate(9);

        }else{
            $products = $products->paginate(9);
        }

        return view('ecom.products')->with([
            'products'      => $products,
            'categories'    => $categories,
            'categoryName'  => $categoryName,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
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


}
