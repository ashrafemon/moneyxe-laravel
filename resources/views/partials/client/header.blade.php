<header id="header">
    <div class="container">
        <div class="header-row">

            <div class="header-column justify-content-start">
                <!-- Logo
        ============================= -->
                <div class="logo">
                    <a class="d-flex" href="{{route('client.home.index')}}" title="Payyed - HTML Template">
                        <img src="{{asset('assets/client/images/logo.png')}}" alt="Payyed" />
                    </a>
                </div>
                <!-- Logo end -->
                <!-- Collapse Button
        ============================== -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav">
                    <span></span> <span></span> <span></span> </button><!-- Collapse Button end -->

                <!-- Primary Navigation
        ============================== -->
                @include('partials.client.navbar')
                <!-- Primary Navigation end -->
            </div>

            <div class="header-column justify-content-end">
                <!-- Login & Signup Link
        ============================== -->
                <nav class="login-signup navbar navbar-expand">
                    <ul class="navbar-nav">
                        @if(Auth::check())
                            @if(Auth::user()->role == "admin")
                            <li><a href="{{route('admin.dashboard.index')}}">Admin</a></li>
                            @endif

                            @if(request()->segment(1) != 'profile')
                            <li><a href="{{route('client.dashboard.index')}}">Dashboard</a></li>
                            @else
                            <li><a href="{{route('client.profile.index')}}">Profile</a></li>
                            @endif
                            <li class="align-items-center h-auto ml-sm-3">
                                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li class="align-items-center h-auto ml-sm-3">
                            <a class="btn btn-primary d-none d-sm-block" href="{{route('register')}}">
                                Sign Up
                            </a>
                        </li>
                        @endif

                    </ul>
                </nav>
                <!-- Login & Signup Link end -->
            </div>
        </div>
    </div>
</header>
