@include('partials.client.css')

<div id="main-wrapper" class="h-100">
    <div class="container-fluid px-0 h-100">
        <div class="row no-gutters h-100">
            <!-- Welcome Text
      ============================================= -->
            <div class="col-md-6">
                <div class="hero-wrap d-flex align-items-center h-100">
                    <div class="hero-mask opacity-8 bg-primary"></div>
                    <div class="hero-bg hero-bg-scroll"
                        style="background-image:url({{asset('assets/client/images/bg/image-3.jpg')}});"></div>
                    <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
                        <div class="row no-gutters">
                            <div class="col-10 col-lg-9 mx-auto">
                                <div class="logo mt-5 mb-5 mb-md-0"> <a class="d-flex" href="{{route('client.home.index')}}"
                                        title="Payyed - HTML Template"><img
                                            src="{{asset('assets/client/images/logo-light.png')}}" alt="Payyed"></a>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters my-auto">
                            <div class="col-10 col-lg-9 mx-auto">
                                <h1 class="text-11 text-white mb-4">Welcome back!</h1>
                                <p class="text-4 text-white line-height-4 mb-5">We are glad to see you again! Instant
                                    deposits, withdrawals & payouts trusted by millions worldwide.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Welcome Text End -->

            <!-- Login Form
      ============================================= -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="container my-4">
                    <div class="row">
                        <div class="col-11 col-lg-9 col-xl-8 mx-auto">
                            <h3 class="font-weight-400 mb-4">Log In</h3>
                            <form id="loginForm" method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="emailAddress">Email Address</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Enter Your Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="loginPassword">Password</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Enter Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-check custom-control custom-checkbox">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm text-right">
                                        @if (Route::has('password.request'))
                                        <a class="btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block my-4" type="submit">Login</button>
                            </form>
                            <p class="text-3 text-center text-muted">Don't have an account? <a class="btn-link"
                                    href="{{route('register')}}">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Form End -->
        </div>
    </div>
</div>

@include('partials.client.script')
