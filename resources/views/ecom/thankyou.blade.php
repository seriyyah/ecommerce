@extends('layouts.app')

@section('title', 'Спасибо за покупку!!')



@section('content')

<div class="thank-you-section" style="
margin-top: 10%;
position: relative;
">
   <h1 style="
text-align: center;
">Thank you for <br> Your Order {{ $order->name }}!</h1>
   <p style="
text-align: center;
">A confirmation email was sent</p>
   <div class="spacer"></div>
   <div style="
text-align: center;
margin-bottom: 10%;
">
       <a href="{{ route('home') }}" class="button">Home Page</a>
       <a href="{{ route('orderPdf', $order->id) }}" class="button">get Pdf</a>
   </div>
</div>

@endsection
