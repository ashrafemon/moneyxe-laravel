@include('partials.client.css')

<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End -->

<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper">

    <!-- Header
  ============================================= -->
    @include('partials.client.header')
    <!-- Header End -->

    <!-- Content
  ============================================= -->
    @yield('content')
    <!-- Content end -->

    <!-- Footer
  ============================================= -->
    @include('partials.client.footer')
    <!-- Footer end -->

</div>
<!-- Document Wrapper end -->

<!-- Back to Top
============================================= -->
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i
        class="fa fa-chevron-up"></i></a>

<!-- Video Modal
============================================= -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="close text-white opacity-10 ml-auto mr-n3 font-weight-400" data-dismiss="modal"
                aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body p-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" id="video" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal end -->

@include('partials.client.script')
