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
     * @return \Illuminate\Http\Response
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function($item)
        {
            return $item->model->slug.','.$item->qty;
        });
//            ->values()->toJson();
        try{
            $charge = Stripe::charges()->create([
                'amount'        => $this->getNumbers()->get('newTotal'),
                'currency'      => 'USD', // change here for diff curency
                'source'        => $request->stripeToken,
                'description'   => 'Order',
                'receipt_email' => $request->email,
                'metadata'      =>[
                    'contents'  => $contents,
                    'quntity'   => Cart::instance('default')->count(),
                    'discount'  => collect(session()->get('coupon'))->toJson(),
                ],
            ]);
            Cart::instance('default')->destroy();
            session()->forget('coupon');
            return redirect()->route('confirmation.index')->with('success_message', 'Благадарим за пакупку ваша оплата прошла успешно');
        }catch (CardErrorException $e){
            return back()->withErrors('Error!' .$e->getMessage());
        }


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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
