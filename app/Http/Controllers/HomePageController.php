<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @TODO add here featured as well Product::where('featured', true)->get();
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(8)->get();
        $bestProduct = Product::where('featured', true)->take(4)->inRandomOrder()->get();

        return view('shop.index')->with([
            'products'      => $products,
            'bestProduct'    => $bestProduct
        ]);
    }
}
