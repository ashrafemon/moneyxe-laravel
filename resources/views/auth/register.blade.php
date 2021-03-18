@include('partials.client.css')

<div id="main-wrapper" class="h-100">
    <div class="container-fluid px-0 h-100">
        <div class="row no-gutters h-100">
            <div class="col-md-6">
                <!-- Get Verified! Text
        ============================================= -->
                <div class="hero-wrap d-flex align-items-center h-100">
                    <div class="hero-mask opacity-8 bg-primary"></div>
                    <div class="hero-bg hero-bg-scroll"
                        style="background-image:url({{asset('assets/client/images/bg/image-3.jpg')}});"></div>
                    <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
                        <div class="row  no-gutters">
                            <div class="col-10 col-lg-9 mx-auto">
                            <div class="logo mt-5 mb-5 mb-md-0"> <a class="d-flex" href="{{route('client.home.index')}}"
                                        title="Payyed - HTML Template"><img
                                            src="{{asset('assets/client/images/logo-light.png')}}" alt="Payyed"></a>
                                </div>
                            </div>
                        </div>
                        <div class="row my-auto">
                            <div class="col-10 col-lg-9 mx-auto">
                                <h1 class="text-11 text-white mb-4">Get Verified!</h1>
                                <p class="text-4 text-white line-height-4 mb-5">Every day, Payyed makes thousands of
                                    customers happy.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Get Verified! Text End -->
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <!-- SignUp Form
        ============================================= -->
                <div class="container my-4">
                    <div class="row">
                        <div class="col-11 col-lg-9 col-xl-8 mx-auto">
                            <h3 class="font-weight-400 mb-4">Sign Up</h3>
                            <form id="loginForm" method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Full Name</label>

                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Enter Your Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Enter Your Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Enter Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>

                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm Password">

                                </div>
                                <button class="btn btn-primary btn-block my-4" type="submit">Sign Up</button>
                            </form>
                            <p class="text-3 text-center text-muted">Already have an account? <a class="btn-link"
                                    href="{{route('login')}}">Log In</a></p>
                        </div>
                    </div>
                </div>
                <!-- SignUp Form End -->
            </div>
        </div>
    </div>
</div>

@include('partials.client.script')
