<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        if (Cart::count() == 0 )
        {
            return redirect('/');
        }
        Cart::destroy();
        return view('ecom.thankyou');
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
