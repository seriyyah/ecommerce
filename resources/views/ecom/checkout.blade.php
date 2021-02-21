@extends('layouts.app')

@section('title', 'Оформление заказа')



@section('content')

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Home</a>
                          <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                          <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    @if (session()->has('success_message'))
                    <div class="spacer"></div>
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="spacer"></div>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="accordion-list">
                        <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                            {{ csrf_field() }}
                        <div class="accordion">

                            <div class="accordion__title">
                               Доставка
                            </div>
                            <div class="accordion__body">
                                <div class="shipinfo">
                                    {{-- <div class="ship-to-another-content">
                                        <form action="#"> --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-input mt-0">
                                                        <select name="bil-country" id="coutry" name="country">
                                                            <option value="select">Выбирите Страну*</option>
                                                            <option value="ua">Украина</option>
                                                            <option value="rus">Россия</option>
                                                            <option value="pol">Польшп</option>
                                                            <option value="dutch">Гирмания</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Имя*" id="name" name="name" value="{{ old('name') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Фамилия*" value="{{ old('city') }}" required>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Company name">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="адресс/отдел новой почты*" id="address" name="address" value="{{ old('address') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="дом*" id="province" name="province" value="{{ old('province') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="City/State*" id="city" name="city" value="{{ old('city') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Post code/ zip*" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="email" placeholder="Е-Почта*" id="email" name="email" value="{{ old('email') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Номер*" id="phone" name="phone" value="{{ old('phone') }}" required>
                                                    </div>
                                                </div>
                                            {{-- </div>
                                        </form> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__title">
                                Оплата
                            </div>
                            <div class="accordion__body">
                                <div class="paymentinfo">
                                    <div class="single-method">
                                        <a href="#"><i class="zmdi zmdi-long-arrow-right"></i>Наличными</a>
                                    </div>
                                    <div class="single-method">
                                        <a href="#" class="paymentinfo-credit-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Картачкой</a>
                                    </div>
                                    <div class="paymentinfo-credit-content">


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-input mt-0">
                                                        <div class="form-group">
                                                                <label for="card-element">
                                                                    Кредит или Дебит карта.
                                                                </label>
                                                                <div id="card-element">

                                                                </div>
                                                                    <div id="card-errors" role="alert">

                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="spacer"></div>
                        <div class="dark-btn">
                        <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>
                       </div>
                      </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
             <div class="order-details">
                    <h5 class="order-details__title">Ваш Заказ</h5>
                    @foreach (Cart::content() as $item)
                    <div class="order-details__item">
                        <div class="single-item">
                            <div class="single-item__thumb">
                                <img src="images/cart/1.png" alt="ordered item">
                            </div>
                            <div class="single-item__content">
                                <a href="#">{{ $item->model->name }}</a>
                                <span class="price">{{ $item->model->price }}</span>
                            </div>
                            <div class="checkout-table-row-right">
                                <div class="checkout-table-quantity">{{ $item->qty }}</div>
                            </div>
                            <div class="single-item__remove">
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"class="cart-options"><i class="zmdi zmdi-delete"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
                    <div class="order-details__count">
                        <!-- dosn't have coupon -->

                            <div class="order-details__count__single">
                            <h5>sub total</h5>
                            <span class="price">$ {{ Cart::subtotal() }}</span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Tax</h5>
                            <span class="price">$ {{ Cart::tax() }}</span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Shipping</h5>
                            <span class="price">0</span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Discount({{ session()->get('coupon')['name']}})</h5>
                            <span class="price"> -{{ presentPrice($discount)}}</span>
                            @if (session()->has('coupon'))
                                 <form action="{{ route('coupon.destroy')}}" method="POST" style="display: inline">
                            {{ csrf_field() }}
                            {{method_field('delete')}}
                            <button type="submit">Remove</button>
                            </form>
                            @endif

                        </div>
                         @if (session()->has('coupon'))
                        <div class="order-details__count__single">

                            <!-- price  total without discount -->

                            <h5>Order total old</h5>
                            <span class="price">$ {{ Cart::total() }}</span>

                        </div>
                         @endif
                            <hr>

                        <!--has coupon -->
                        @if (session()->has('coupon'))
                        <h5>With discount:</h5>
                        <div class="order-details__count__single">
                        <h5>sub total</h5>
                        <span class="price">${{$newSubtotal}}</span>
                    </div>
                    <div class="order-details__count__single">
                        <h5>Tax</h5>
                        <span class="price">{{ presentPrice($newTax) }}</span>
                    </div>
                    <div class="order-details__count__single">
                        <h5>Shipping</h5>
                        <span class="price">0</span>
                    </div>
                    @endif


                    </div>
                    <div class="ordre-details__total">

                        <!-- price  total without discount -->
                        @if (!session()->has('coupon'))
                             <h5>Order total</h5>
                        <span class="price">$ {{ Cart::total() }}</span>
                        @endif
                       <!-- price total with discount  -->

                        @if (session()->has('coupon'))
                        <h5>New rder total old</h5>
                        <span class="price">{{$newTotal}}</span>
                        @endif
                    </div>
                    <!-- Start discount -->
                    @if (! session()->has('coupon'))
                          <div class="ht__coupon__code">
                            <span>enter your discount code</span>
                            <div class="coupon__box">
                                <form action="{{route('coupon.store')}}" method="POST">
                                    {{ csrf_field() }}
                                <input type="text" placeholder="" name="coupon_code" id="coupon_code">
                                <div class="ht__cp__btn">
                                    <button type="submit">enter</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    @endif


                    <!-- discount end -->
                </div>

            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra-js')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('{{ config('services.stripe.key') }}');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();
              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;
              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }
              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });
            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);
              // Submit the form
              form.submit();
            }


        })();
    </script>
@endsection
