@extends('layouts.client')


@section('content')
<div id="content">

    <!-- Send Money
    ============================================= -->
    <section class="hero-wrap section">
        <div class="hero-mask opacity-9 bg-primary"></div>
        <div class="hero-bg" style="background-image:url({{asset('assets/client/images/bg/image-5.jpg')}});"></div>
        <div class="hero-content py-2 py-lg-5">
            <div class="container text-center">
                <h2 class="text-14 text-white">Receive Money from Around The World with Payyed</h2>
                <p class="text-5 text-white mb-4">Quickly and easily receive and request money online with Payyed.<br
                        class="d-none d-lg-block">
                    Over 180 countries and 120 currencies supported.</p>
                <a class="btn btn-light video-btn" href="#" data-src="https://www.youtube.com/embed/7e90gBu4pas"
                    data-toggle="modal" data-target="#videoModal"><span class="text-2 mr-3"><i
                            class="fas fa-play"></i></span>See How it Works</a>
            </div>
        </div>
    </section>
    <!-- Send Money End -->

    <!-- How it works
    ============================================= -->
    <section class="section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="row">
                        <div class="col-md-5 col-lg-6 text-center my-auto order-2 order-md-1"> <img
                                class="img-fluid shadow" src="{{asset('assets/client/images/request-money.png')}}"
                                alt=""> </div>
                        <div class="col-md-7 col-lg-6 order-1 order-md-2">
                            <h2 class="text-9"> The simple way to Receive Money</h2>
                            <p class="text-3 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.</p>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="featured-box style-3">
                                        <div class="featured-box-icon text-light"><span
                                                class="w-100 text-20 font-weight-500">1</span></div>
                                        <h3>Sign Up Your Account</h3>
                                        <p>Become a register user first, then log in to your account and enter your card
                                            or bank details that is required for you.</p>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="featured-box style-3">
                                        <div class="featured-box-icon text-light"><span
                                                class="w-100 text-20 font-weight-500">2</span></div>
                                        <h3>Enter Payer Details</h3>
                                        <p>Enter your payer name, email address then add an amount with currency to
                                            request payment.</p>
                                    </div>
                                </div>
                                <div class="col-12 mb-4 mb-sm-0">
                                    <div class="featured-box style-3">
                                        <div class="featured-box-icon text-light"><span
                                                class="w-100 text-20 font-weight-500">3</span></div>
                                        <h3>Receive Money</h3>
                                        <p>After the request payment, the payer will be notified via an email for
                                            payment.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How it works End -->

    <!-- Why choose us
    ============================================= -->
    <section class="section">
        <div class="container">
            <h2 class="text-9 text-center">Why choose payyed?</h2>
            <p class="text-4 text-center mb-4">Here’s Top 4 reasons why using a Payyed account for manage your money.
            </p>
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="featured-box style-1">
                                <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
                                <h3>Over 180 countries</h3>
                                <p>Essent lisque persius interesset his et, in quot quidam.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box style-1">
                                <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
                                <h3>Lower Fees</h3>
                                <p>Lisque persius interesset his et, in quot quidam persequeris.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box style-1">
                                <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
                                <h3>Easy to Use</h3>
                                <p>Essent lisque persius interesset his et, in quot quidam.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box style-1">
                                <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
                                <h3>Faster Payments</h3>
                                <p>Quidam lisque persius interesset his et, in quot quidam.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box style-1">
                                <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
                                <h3>100% secure</h3>
                                <p>Essent lisque persius interesset his et, in quot quidam.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="featured-box style-1">
                                <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
                                <h3>24/7 customer service</h3>
                                <p>Quidam lisque persius interesset his et, in quot quidam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4"><a href="#"
                            class="btn btn-outline-primary shadow-none text-uppercase">Sign up Now</a></div>
                </div>
            </div>
        </div>
</div>
@endsection
