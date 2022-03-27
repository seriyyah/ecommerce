<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (Cart::count() == 0 )
        {
            return redirect('/');
        }

        Cart::destroy();

        $order = Auth::user()->orders()->latest()->first();
        $order->update(['status' => 'completed']);
        return view('ecom.thankyou', [
            'order' => $order
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->get('type') == 'checkout.session.completed') {
            Cart::instance('wishlist')->restore('username');
        }
    }
}
