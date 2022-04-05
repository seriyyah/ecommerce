<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Redirector|View
     */
    public function index()
    {
        if (Cart::count() === 0) {
            return redirect('/');
        }

        Cart::destroy();

        $order = Auth::user()->orders()->latest()->first();
        $order->update(['status' => 'completed']);
        return view('shop.thank-you', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): void
    {
        if ($request->get('type') === 'checkout.session.completed') {
            Cart::instance('wishlist')->restore('username');
        }
    }
}
