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

    @include($activeTemplate. 'partials.header')

    @guest
        @include($activeTemplate. 'partials.modal')
    @endguest

    <div class="main-wrapper">

        @include($activeTemplate. 'partials.banner')

        <section class="pt-100 pb-100">
            @yield('content')
        </section>

    </div><!-- main-wrapper end -->

    @php
        $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
    @endphp

    @if(@$cookie->data_values->status && !session('cookie_accepted'))
    <div class="cookie__wrapper">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
          <p class="txt my-2">
            @php echo @$cookie->data_values->description @endphp<br>
            <a href="{{ @$cookie->data_values->link }}" target="_blank">@lang('Read Policy')</a>
          </p>
            <a href="{{ route('cookie.accept') }}" class="btn btn--base btn-md my-2 policy">@lang('Accept')</a>
        </div>
      </div>
    </div>
    @endif


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

        $(document).ready(function(){
            "use strict";

            $(".langSel").on("change", function() {
                window.location.href = "{{route('home')}}/change/"+$(this).val() ;
            });

            let currentRoute = '{{ Route::currentRouteName() }}'

            let sectionArray = ['#about', '#plan', '#feature', '#faq', '#gateway'];

            if(currentRoute != 'home'){

                let links = $('#linkItem a');

                links.on('click', function(){

                    let section = $(this).attr('href');
                    let base = '{{ route('home') }}';

                    if(sectionArray.includes(section)){
                        window.location = base+section;
                    }

                });

            }


        });

    </script>


  </body>
</html>
