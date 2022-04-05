<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ProductService
{
    public function getProducts(): View
    {
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')
                ->whereHas('categories', function ($query) {
                    $query->where('slug', request()->category);
                });

            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'All products';
        }

        switch (request()->sort) {
            case 'low_high':
                $products = $products->orderBy('price')
                    ->paginate(9);
                break;
            case 'high_low':
                $products = $products->orderBy('price', 'desc')
                    ->paginate(9);
                break;
            case 'new':
                $products = $products->orderBy('updated_at', 'desc')
                    ->paginate(9);
                break;
            default:
                $products = $products->paginate(9);
        }

        return view('shop.products')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'recommended' => $this->recommendedProduct(request()->category)->take(3)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Application|Factory|View
     */
    public function showProduct(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('shop.show')->with([
            'product' => $product,
            'recommended' => $this->recommendedProduct($slug)->take(4)
        ]);
    }

    private function recommendedProduct(?string $slug): Product
    {
        return Product::where('slug', '!=', $slug)->inRandomOrder()->get();
    }
}
