<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class CartController extends Controller
{
    public const CART_HOME = 'cart.home';
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('shop.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $duplicates = Cart::search(static function ($cartItem) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route(self::CART_HOME)->with('success_message', 'Product ' . $request->name . ' is already in cart!');
        }

        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate(Product::class);

        return redirect()->route(self::CART_HOME)->with('success_message', $request->name . ' was added to cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated!');
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        Cart::remove($id);

        return back()->with('success_message', 'Product removed from cart!');
    }

    /**
     * add products to wishlist.
     *
     * @param string $id
     * @return RedirectResponse
     */

    public function addToWish(string $id)
    {
        $item = Cart::get($id);


        Cart::remove($id);

        $duplicates = Cart::instance('add-to-wish')->search(function ($rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route(self::CART_HOME)->with('success_message', $item->name . ' is already in wish list!');
        }

        Cart::instance('add-to-wish')->add($item->id, $item->name, 1, $item->price)
            ->associate(Product::class);

        return redirect()->route(self::CART_HOME)->with('success_message', $item->name . ' saved for later!');
    }
}
