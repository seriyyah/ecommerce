@extends('layouts.app')

@section('content')

<section class="htc__blog__details bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="htc__blog__details__wrap">
                    <div class="ht__bl__thumb">
                        <img src="{{ asset('storage/'.$blogPost->image)}}" alt="blog images">
                    </div>
                    <div class="bl__dtl">
                        {!! $blogPost->body !!}
                    </div>
                    <!-- Start Comment Area -->
                    <div class="htc__comment__area">
                        <h4 class="title__line--5">HAVE 2 COMMENTS</h4>
                        <div class="ht__comment__content">
                            <!-- Start Single Comment -->
                            <div class="comment">
                                <div class="comment__thumb">
                                    <img src="images/comment/1.png" alt="comment images">
                                </div>
                                <div class="ht__comment__details">
                                    <div class="ht__comment__title">
                                        <h2><a href="#">JOHN NGUYEN</a></h2>
                                        <div class="reply__btn">
                                            <a href="#">reply</a>
                                        </div>
                                    </div>
                                    <span>July 15, 2016 at 2:39 am</span>
                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed.</p>
                                </div>
                            </div>
                            <!-- End Single Comment -->
                            <!-- Start Single Comment -->
                            <div class="comment comment--reply">
                                <div class="comment__thumb">
                                    <img src="images/comment/2.png" alt="comment images">
                                </div>
                                <div class="ht__comment__details">
                                    <div class="ht__comment__title">
                                        <h2><a href="#">JOHN NGUYEN</a></h2>
                                        <div class="reply__btn">
                                            <a href="#">reply</a>
                                        </div>
                                    </div>
                                    <span>July 15, 2016 at 2:39 am</span>
                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed.</p>
                                </div>
                            </div>
                            <!-- End Single Comment -->
                            <!-- Start Single Comment -->
                            <div class="comment">
                                <div class="comment__thumb">
                                    <img src="images/comment/3.png" alt="comment images">
                                </div>
                                <div class="ht__comment__details">
                                    <div class="ht__comment__title">
                                        <h2><a href="#">JOHN NGUYEN</a></h2>
                                        <div class="reply__btn">
                                            <a href="#">reply</a>
                                        </div>
                                    </div>
                                    <span>July 15, 2016 at 2:39 am</span>
                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed.</p>
                                </div>
                            </div>
                            <!-- End Single Comment -->
                        </div>
                    </div>
                    <!-- End Comment Area -->
                    <!-- Start comment Form -->
                    <div class="ht__comment__form">
                        <h4 class="title__line--5">Leave a Comment</h4>
                        <div class="ht__comment__form__inner">
                            <div class="comment__form">
                                <input type="text" placeholder="Name *">
                                <input type="email" placeholder="Email *">
                                <input type="text" placeholder="Website">
                            </div>
                            <div class="comment__form message">
                                <textarea name="message" placeholder="Your Comment"></textarea>
                            </div>
                        </div>
                        <div class="ht__comment__btn--2 mt--30">
                            <a class="fr__btn" href="#">Send</a>
                        </div>
                    </div>
                    <!-- End comment Form -->

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
