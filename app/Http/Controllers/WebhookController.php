<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebhookController
{
    public function stripeWebhook(Request $request)
    {

        if ($request->get('type') == 'checkout.session.completed') {
            $data = ($request->get('data'));
            $order = Order::where('id',  $data['object']['metadata']['order_id'])->first();
            $user = $order->user()->first();
            Mail::send(
                'emails/orderPaidEmail',
                [ 'user' => $user, 'order' => $order],
                function ($m) use ($user) {
                    $m->from('testim.mailer@gmail.com', 'Your order was paid');
                    $m->to($user->email, $user->name)->subject('Order Paid');
                }
            );
        }
    }
}
