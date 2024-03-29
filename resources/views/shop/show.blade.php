@extends('layouts.app')
{{--  @section('title', $product->name)  --}}


@section('content')


<div class="wrapper">


    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">
        <!-- Start Search Popap -->
        <div class="search__area">
            <div class="container" >
                <div class="row" >
                    <div class="col-md-12" >
                        <div class="search__inner">
                            <form action="#" method="get">
                                <input placeholder="Search here... " type="text">
                                <button type="submit"></button>
                            </form>
                            <div class="search__close__btn">
                                <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Popap -->
        <!-- Start Cart Panel -->
        <div class="shopping__cart">
            <div class="shopping__cart__inner">
                <div class="offsetmenu__close__btn">
                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                </div>
                <div class="shp__cart__wrap">
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="/images/product-2/sm-smg/1.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                            <span class="quantity">QTY: 1</span>
                            <span class="shp__price">$105.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="/images/product-2/sm-smg/2.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">Brone Candle</a></h2>
                            <span class="quantity">QTY: 1</span>
                            <span class="shp__price">$25.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="shoping__total">
                    <li class="subtotal">Subtotal:</li>
                    <li class="total__price">$130.00</li>
                </ul>
                <ul class="shopping__btn">
                    <li><a href="cart.html">View Cart</a></li>
                    <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                </ul>
            </div>
        </div>
        <!-- End Cart Panel -->
    </div>
    <!-- End Offset Wrapper -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                              <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                              <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                              <a class="breadcrumb-item" href="{{ route('products') }}">Products</a>
                              <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                              <span class="breadcrumb-item active">{{ $product->name }}</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Product Details Area -->
    <section class="htc__product__details bg__white ptb--100">
        <!-- Start Product Details Top -->
        <div class="htc__product__details__top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="htc__product__details__tab__content">
                            <!-- Start Product Big Images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                        <img src="{{ productImg($product->image)}}" class="prod active" id="currentImage">
                                    </div>
                                <!-- Start Small images -->

                                <div class="product-section-images">
                                    <div class="product-section-thumbnail selected">
                                        <img src="{{ productImg($product->image)}}">
                                    </div>
                                        @if ($product->images)
                                        @foreach (json_decode($product->images, true) as $image)
                                             <div class="product-section-thumbnail">
                                                <img src="{{ productImg($image)}}">
                                            </div>
                                        @endforeach

                                        @endif
                                </div>
                            <!-- End Small images -->
                                </div>
                            </div>
                            <!-- End Product Big Images -->

                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="ht__product__dtl">
                            <h2>{{ $product->name }}</h2>
                            <h6>Model: <span>MNG001</span></h6>
                            <ul class="rating">
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                            </ul>
                            <ul  class="pro__prize">
                                <li class="old__prize">{{ $product->presentPrice() }}</li>
                                <li>$75.2</li>
                            </ul>
                            <p class="pro__info">{{ $product->details }}</p>
                            <div class="ht__pro__desc">
                                <div class="sin__desc">
                                    <p><span>Availability:</span> In Stock</p>
                                </div>
                                <div class="sin__desc align--left">
                                    <p><span>color:</span></p>
                                    <ul class="pro__color">
                                        <li class="red"><a href="#">red</a></li>
                                        <li class="green"><a href="#">green</a></li>
                                        <li class="balck"><a href="#">balck</a></li>
                                    </ul>
                                    <div class="pro__more__btn">
                                        <a href="#">more</a>
                                    </div>
                                </div>
                                <div class="sin__desc align--left">
                                    <p><span>size</span></p>
                                    <select class="select__size">
                                        <option>s</option>
                                        <option>l</option>
                                        <option>xs</option>
                                        <option>xl</option>
                                        <option>m</option>
                                        <option>s</option>
                                    </select>
                                </div>


                                <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">

                                <button class="buttons-cart checkout--btn" type="submit" style="margin-top: 10px;">
                                В корзину
                                </button>
                                </form>

                                <div class="sin__desc align--left">
                                    <p><span>Categories:</span></p>
                                    <ul class="pro__cat__list">
                                        <li><a href="#">Fashion,</a></li>
                                        <li><a href="#">Accessories,</a></li>
                                        <li><a href="#">Women,</a></li>
                                        <li><a href="#">Men,</a></li>
                                        <li><a href="#">Kid,</a></li>
                                        <li><a href="#">Mobile,</a></li>
                                        <li><a href="#">Computer,</a></li>
                                        <li><a href="#">Hair,</a></li>
                                        <li><a href="#">Clothing,</a></li>
                                    </ul>
                                </div>
                                <div class="sin__desc align--left">
                                    <p><span>Product tags:</span></p>
                                    <ul class="pro__cat__list">
                                        <li><a href="#">Fashion,</a></li>
                                        <li><a href="#">Accessories,</a></li>
                                        <li><a href="#">Women,</a></li>
                                        <li><a href="#">Men,</a></li>
                                        <li><a href="#">Kid,</a></li>
                                    </ul>
                                </div>

                                <div class="sin__desc product__share__link">
                                    <p><span>Share this:</span></p>
                                    <ul class="pro__share">
                                        <li><a href="#" target="_blank" rel="noopener"><i class="icon-social-twitter icons"></i></a></li>

                                        <li><a href="#" target="_blank" rel="noopener"><i class="icon-social-instagram icons"></i></a></li>

                                        <li><a href="#" target="_blank" rel="noopener"><i class="icon-social-facebook icons"></i></a></li>

                                        <li><a href="#" target="_blank" rel="noopener"><i class="icon-social-google icons"></i></a></li>

                                        <li><a href="#" target="_blank" rel="noopener"><i class="icon-social-linkedin icons"></i></a></li>

                                        <li><a href="#" target="_blank" rel="noopener"><i class="icon-social-pinterest icons"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Details Top -->
    </section>
    <!-- End Product Details Area -->
    <!-- Start Product Description -->
    <section class="htc__produc__decription bg__white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Start List And Grid View -->
                    <ul class="pro__details__tab" role="tablist">
                        <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">review</a></li>
                        <li role="presentation" class="shipping"><a href="#shipping" role="tab" data-toggle="tab">shipping</a></li>
                    </ul>
                    <!-- End List And Grid View -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="ht__pro__details__content">
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                            <div class="pro__tab__content__inner">
                                <h4 class="ht__pro__title">Description</h4>
                                <p>{!! $product->description !!}</p>
                                <h4 class="ht__pro__title">Standard Featured</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in</p>
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                            <div class="pro__tab__content__inner">
                                <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.</p>
                                <h4 class="ht__pro__title">Description2</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>

                                <h4 class="ht__pro__title">Standard Featured</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="shipping" class="pro__single__content tab-pane fade">
                            <div class="pro__tab__content__inner">
                                <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.</p>
                                <h4 class="ht__pro__title">Description3</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                <h4 class="ht__pro__title">Standard Featured</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Description -->
    <!-- Start Product Area -->
    <section class="htc__product__area--2 pb--100 product-details-res">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">New Arrivals</h2>
                        <p>But I must explain to you how all this mistaken idea</p>
                    </div>
                </div>
            </div>
            @include('partials.recommended')
        </div>
    </section>
    <!-- End Product Area -->
    <!-- Start Banner Area -->
    <div class="htc__brand__area bg__cat--4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ht__brand__inner">
                        <ul class="brand__list owl-carousel clearfix">
                            <li><a href="#"><img src="/images/brand/1.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="/images/brand/2.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="/images/brand/3.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="/images/brand/4.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="/images/brand/5.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="/images/brand/5.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="/images/brand/1.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="/images/brand/2.png" alt="brand images"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->
    <!-- End Banner Area -->

</div>

@endsection

@section('extra-js')
<script>
    (function(){
        const currentImage = document.querySelector('#currentImage');
        const images = document.querySelector('.product-section-thumbnail');

        images.forEach((element) => element.addEventListener('click', thumbnailClick));

        function thumbnailClick(e)
        {
            currentImage.classList.remove('active');

            currentImage.addEventListener('transitioned', () => {
                currentImage.src = this.querySelector('img').src;
                currentImage.classList.add('active');
            })

            images.forEach((element) => element.classList.remove('selected'));
            this.classList.add('selected');

        }
    })();
</script>

@endsection
