<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
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

    public function stripeCheckout(Request $request)
    {
        $contents = Cart::content()->map(function($item)
        {
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
                ]
            ]);

      return redirect($stripe->url);
    }

    public function stripeError()
    {
        return view('ecom.paymentUnsuccesfull');
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
}
