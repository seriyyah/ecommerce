<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use TCG\Voyager\Models\Post;

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
        $posts = Post::inRandomOrder()->take(3)->get();

        return view('shop.index')->with([
            'products'      => $products,
            'bestProduct'   => $bestProduct,
            'posts'         => $posts
        ]);
    }

    /**
     * @param string $slug
     * @return Application|Factory|View
     */
    public function post(string $slug)
    {
        $blogPost = Post::where('slug', $slug)->firstOrFail();
        return view('shop.post', compact('blogPost'));
    }
}
