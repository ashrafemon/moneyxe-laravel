@include('partials.admin.css')

<div id="global-loader"></div>

<div class="page">
    <div class="page-main">
        <!-- Sidebar menu-->
        @include('partials.admin.sidenav')
        <!-- Sidebar menu-->

        <!-- app-content-->
        <div class="app-content">
            <div class="side-app">
                <div class="main-content">

                    <!-- Top navbar -->
                    @include('partials.admin.navbar')
                    <!-- Top navbar-->

                    <!-- Page content -->
                    <div class="container-fluid pt-8">
                        @include('partials.admin.title')

                        @yield('content')

                        @include('partials.admin.footer')
                    </div>
                </div>
            </div>
        </div>
        <!-- app-content-->
    </div>
</div>
<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

@include('partials.admin.script')
