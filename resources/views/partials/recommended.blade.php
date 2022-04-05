<div class="row">
    <div class="product__wrap clearfix">
        @foreach ($recommended as $product)
            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                <div class="category">
                    <div class="ht__cat__thumb">
                        <a href="{{ route('product.show', $product->slug) }}">
                            {{-- <img src="/images/product/1.jpg" alt="product images"> --}}
                            <img src="{{ asset('storage/'.$product->image)}}" onerror="this.src='/images/product/1.jpg'"
                                 alt="full-image">
                        </a>
                    </div>
                    <div class="fr__hover__info">
                        <ul class="product__action">
                            {{--  <li><form action="{{ route('wishadd') }}" method="POST">
                                {{ csrf_field() }}
                                <button class="buttons-add checkout--btn" type="submit" style="margin-top: 10px;">
                                    <i class="icon-heart icons"></i>
                                </button>
                                </form>
                            </li>  --}}
                            <li>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button class="buttons-add checkout--btn" type="submit" style="margin-top: 10px;">
                                        <i class="icon-handbag icons"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </div>
                    <div class="fr__product__inner">
                        <h4><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                        <ul class="fr__pro__prize">
                            <li class="old__prize">$30.3</li>
                            <li>{{ $product->presentPrice() }}</li>
                        </ul>
                    </div>
                </div>
            </div>

        @endforeach


    </div>
</div>
