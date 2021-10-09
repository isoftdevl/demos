<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @include('partials.seo')

  <title>{{ $general->sitename(__($pageTitle)) }}</title>

  <!-- bootstrap 5  -->
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue. 'css/lib/bootstrap.min.css') }}">
  <!-- fontawesome 5  -->
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue. 'css/all.min.css') }}">
  <!-- lineawesome font -->
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue. 'css/line-awesome.min.css') }}">
  <!-- slick slider css -->
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue. 'css/lib/slick.css') }}">
  <!-- main css -->
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue. 'css/main.css') }}">

  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}">

  <link rel="stylesheet" href="{{ asset($activeTemplateTrue. 'css/color.php?color='.$general->base_color.'&secondColor='.$general->secondary_color) }}">

  @stack('style-lib')

  @stack('style')

</head>
  <body>

    <div class="preloader">
      <div class="preloader-container">
        <span class="animated-preloader"></span>
      </div>
    </div>

    <!-- scroll-to-top start -->
    <div class="scroll-to-top">
        <span class="scroll-icon">
            <i class="las la-chevron-up"></i>
        </span>
    </div>
      <!-- scroll-to-top end -->

    @include($activeTemplate. 'partials.auth_header')

      <!-- Modal -->
  <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="loginModalLabel">@lang('Confirmation')!</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="las la-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <form class="account-form login-form">
            <div class="form-group">
                <h4 class="text-center p-2">@lang('Are you sure to Logout')?</h4>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-2">
                    <button type="submit" class="btn btn--base w-100 bg-danger" data-bs-dismiss="modal">@lang('Cancel')</button>
                </div>
                <div class="col-lg-6">
                    <a href="{{ route('user.logout') }}" class="btn btn--base w-100">@lang('Logout')</a>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <div class="main-wrapper">

      @include($activeTemplate. 'partials.banner')

      <section class="pt-100 pb-100">
        @yield('content')
      </section>


    </div><!-- main-wrapper end -->

    @include($activeTemplate. 'partials.footer')

    <!-- jQuery library -->
  <script src="{{ asset($activeTemplateTrue. 'js/lib/jquery-3.6.0.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset($activeTemplateTrue. 'js/lib/bootstrap.bundle.min.js') }}"></script>
  <!-- slick slider js -->
  <script src="{{ asset($activeTemplateTrue. 'js/lib/slick.min.js') }}"></script>
  <!-- scroll animation -->
  <script src="{{ asset($activeTemplateTrue. 'js/lib/wow.min.js') }}"></script>
  <!-- main js -->
  <script src="{{ asset($activeTemplateTrue. 'js/app.js') }}"></script>

  @stack('script-lib')

  @stack('script')

  @include('partials.plugins')

  @include('partials.notify')


    <script>

        (function ($) {
            "use strict";
            $(".langSel").on("change", function() {
                window.location.href = "{{route('home')}}/change/"+$(this).val() ;
            });

        })(jQuery);

    </script>


  </body>
</html>
