@extends('layouts.app')

@section('title', 'Оплата не проведена')



@section('content')

    <div class="thank-you-section" style="
margin-top: 10%;
position: relative;
">
        <h1 style="
text-align: center;
">Thank you for <br> Your Order!</h1>
        <p style="
text-align: center;
">A confirmation email was sent</p>
        <div class="spacer"></div>
        <div style="
text-align: center;
margin-bottom: 10%;
">
            <a href="{{ route('home') }}" class="button">Home Page</a>
        </div>
    </div>

@endsection
