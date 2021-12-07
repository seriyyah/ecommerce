<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WebhookController
{
    public function stripeWebhook(Request $request)
    {
        if (!$request->get('type') == 'payment_intent.succeeded') {
            return null;
        }
    }
}
