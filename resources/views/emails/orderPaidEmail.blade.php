<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
Hi {{ $user->name }}! Your order {{ $order->name }} have been paid, CONGRATULATIONS!!!!!!!!!!!!!!!!!!!!!
</body>
