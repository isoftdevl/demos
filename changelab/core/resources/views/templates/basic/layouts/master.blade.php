<!doctype html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('partials.seo')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . '/css/bootstrap-fileinput.css') }}">

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/main.css') }}">
    <link href="{{ asset($activeTemplateTrue . 'css/color.php') }}?color={{$general->base_color}}" rel="stylesheet" />

    @stack('style-lib')

    @stack('style')
</head>

<body>

    <!--========== Preloader ==========-->
    
    <div class="preloader" id="preloader">
        <div class="logo">
        </div>
        <div class="loader-frame">
            <div class="loader1" id="loader1">
            </div>
            <div class="circle"></div>
            <h6 class="wellcome">
                <span class="d-block w-100 text-white">@lang('Wellcome to')</span>
                <span class="d-block w-100">{{$general->sitename}}</span>
            </h6>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--========== Preloader ==========-->

    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-area">
                    <div class="header-wrapper">
                        <div class="header-top-item">
                            <div class="header-top-icon">
                               
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="header-top-content">
                                
                                <span>{{ $general->location }}</span>
                            </div>
                        </div>
                        <div class="header-top-item">
                            <div class="header-top-icon">
                                
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="header-top-content">
                                
                                <a href="Mailto:{{ $general->email_from }}">{{ $general->email_from }}</a>
                            </div>
                        </div>
                        <div class="header-top-right-item header-top-item">
                            <a href="tel:959-595-959">
                                <i class="fas fa-phone"></i>
                            </a>
                            <span>{{ $general->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom-area">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logoIcon/logo.png') }}" alt="@lang('logo')">
                        </a>
                    </div>
                    <div class="menu-area">
                        <ul class="menu">
                            
                            @guest
                           

                            @foreach ($pages as $k => $data)

                            @auth
                                @if($data->name == 'Contact')
                                
                                    @continue
                                
                                @endif
                            @endauth
                                <li>
                                    <a href="{{ route('pages', [$data->slug]) }}">{{ trans($data->name) }}</a>
                                </li>
                            @endforeach
                           

                            
                               
                                <li>
                                    <a href="{{ route('user.login') }}">@lang('Login')</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.register') }}">@lang('Registration')</a>
                                </li>
                            @endguest    
                            
                            @auth

                                <li>
                                    <a href="{{ route('user.home') }}">@lang('Dashboard')</a>
                                </li>

                            <li>
                                <a href="#">@lang('Transaction History')</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('user.exchange.approved') }}">@lang('Approved Transaction')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.exchange.pending') }}">@lang('Pending Transaction')</a>
                                    </li>

                                     <li>
                                        <a href="{{ route('user.exchange.refunded') }}">@lang('Refunded Transaction')</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('user.exchange.cancled') }}">@lang('Cancled Transaction')</a>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="#">@lang('Ticket')</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('ticket.open') }}">@lang('Create New')</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('ticket') }}">@lang('My Ticket')</a>
                                    </li>
                                </ul>
                            </li>
                           

                            <li>
                                <a href="#0">@lang('Withdraw')</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.withdraw') }}">@lang('Withdraw Money')</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.withdraw.history') }}">@lang('Withdraw
                                            Log')</a>
                                    </li>
                                </ul>

                            </li>
                            <li>
                                <a href="#0">{{ Auth::user()->fullname }}</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.change-password') }}">
                                            @lang('Change Password')
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.profile-setting') }}">
                                            @lang('Profile Setting')
                                        </a>
                                    </li>


                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.affiliate') }}">
                                            @lang('Affiliation')
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.twofactor') }}">
                                            @lang('2FA Security')
                                        </a>
                                    </li>

                                    

                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.logout') }}">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                            <a href="#">@lang('Balance :') {{getAmount(auth()->user()->balance)}} {{$general->cur_sym}}</a>
                            </li>
                            @endauth

                        </ul>
                        <div class="header-bar-area d-lg-none">
                            <div class="header-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="ellipsis-bar d-xl-none">
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=======Header-Section Ends Here=======-->

    @if (!request()->is('/'))
        @include($activeTemplate.'partials.breadcumb')
    @endif
    @yield('content')

    @php
    $footer_content = getContent('footer.content',true);
    $socials = getContent('footer.element',false);

    @endphp
    <!--=======Footer-Section Starts Here=======-->
    <footer>
        <div class="footer-top padding-top padding-bottom">
            <div class="container">
                <div class="footer-area">
                    <div class="footer-widget widget-about">
                        <div class="footer-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logoIcon/logo.png') }}" alt="@lang('footer')">
                            </a>
                        </div>
                        <p>
                            {{ __($footer_content->data_values->details) }}
                        </p>
                       
                    </div>
                    <div class="footer-widget widget-link">
                        <h5 class="title">@lang('Support')</h5>
                        <ul>
                            <li>
                            <a href="{{route('contact')}}">@lang('Contact')</a>
                            </li>
                            <li>
                                <a href="{{route('pages','blog')}}">@lang('Blog')</a>
                            </li>
                            <li>
                                <a href="{{route('pages','affiliate-program')}}">@lang('Affiliation')</a>
                            </li>
                           
                        </ul>
                    </div>
                  
                    <div class="footer-widget widget-link">
                        <h5 class="title">@lang('Exchange Gateways')</h5>
                        <ul>
                            @foreach ($currency_all as $cur )
                            <li>
                            <a href="#0">{{trans($cur->name)}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-widget widget-link">
                        <h5 class="title">@lang('Useful Link')</h5>
                        <ul>
                            <li>
                            <a href="{{route('contact')}}">@lang('Contact')</a>
                            </li>
                            
                            <li>
                            <a href="{{route('pages','blog')}}">@lang('Blog')</a>
                            </li>
                            <li>
                                <a href="{{route('pages','policy')}}">@lang('Privacy & Policy')</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom section-bg">
            <div class="container d-flex flex-wrap align-items-center justify-content-between">
                <p>
                &copy; @lang('All Right Reserved By') <a href="{{ route('home') }}">{{ $general->sitename }}</a>
                </p>
                  <ul class="social-icons">
                            @foreach ($socials as $social)
                                <li>
                                    <a href="{{ $social->data_values->url }}"
                                        class="{{ strtolower($social->data_values->icon_title) }}">
                                        <?= $social->data_values->feature_icon ?>
                                    </a>
                                </li>
                            @endforeach
                            
                        </ul>
            </div>
        </div>
    </footer>
    <!--=======Footer-Section Ends Here=======-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="{{ asset($activeTemplateTrue . 'js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/plugins.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/bootstrap.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/swiper.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/wow.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/odometer.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/viewport.jquery.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/nice-select.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/main.js') }}"></script>

    @stack('script-lib')
    @include('admin.partials.notify')
    @stack('script')

    @include('partials.plugins')


    <script>
        "use strict";
        (function($) {
            $(document).on("change", ".langSel", function() {
                window.location.href = "{{ url('/') }}/change/" + $(this).val();
            });
        })(jQuery);

    </script>

</body>

</html>
