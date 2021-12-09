<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SebastianBergmann\ObjectReflector\ObjectReflector;
use Stripe\Product;
use Stripe\Stripe;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        return view('ecom.checkout')->with([
            'discount'      => $this->getNumbers()->get('discount'),
            'newSubtotal'   => $this->getNumbers()->get('newSubtotal'),
            'newTax'        => $this->getNumbers()->get('newTax'),
            'newTotal'      => $this->getNumbers()->get('newTotal'),
        ]);
    }

    public function stripeCheckout()
    {
        $user = Auth::user();
        $order = $user->orders()->create([
            'name' => Str::random(10),
            'status' => 'created'
        ]);
        $contents = Cart::content()->map(function($item) use ($order)
        {
            $order->orderItems()->create([
                'quantity' => $item->qty,
                'product_id' => $item->model->id
            ]);
            return [
                'price_data' => [
                    'currency' => 'USD',
                    'unit_amount' => $item->price * 100,
                    'product_data' => [
                        'name' => $item->name
                    ],
                ],
                'quantity' => $item->qty,
            ];
        })->values()->toArray();

        $priceUnitAmount = $this->getNumbers()->get('newTotal');

        $stripe = new StripeClient(
            config('services.stripe.secret')
        );

        Stripe::setApiKey(config('services.stripe.secret'));

        $stripe =  $stripe->checkout->sessions->create([
            'success_url' => url(route('confirmation.index')),
            'cancel_url' => url(route('stripe.error')),
            'line_items' => [
                $contents

            ],
            'mode' => 'payment',
            'payment_method_types' => [
                'card'
            ],
            'metadata' => ['order_id' => $order->id]
        ]);

        return redirect($stripe->url);
    }


    private function getNumbers()
    {
        $tax            = config('cart.tax') / 100 ;
        $discount       = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal    = (Cart::subtotal() - $discount);
        $newTax         = $newSubtotal * $tax;
        $newTotal       = $newSubtotal * (1 + $tax);

        return collect([
            'tax'           => $tax,
            'discount'      => $discount,
            'newSubtotal'   => $newSubtotal,
            'newTax'        => $newTax,
            'newTotal'      => $newTotal,
        ]);
    }

    public function getPdf(Order $order)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML("<h1>invoice of you order $order->name</h1> <br> BLAH-BLAH-BLAH-BLAH-BLAH");
        return $pdf->stream();
    }
}
