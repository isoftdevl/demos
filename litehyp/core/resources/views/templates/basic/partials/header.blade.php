    <!-- header-section start  -->
    <header class="header">
        <div class="header__bottom">
          <div class="container-fluid px-lg-5">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
              <a class="site-logo site-title" href="{{ route('home') }}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="logo"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu-toggle"></span>
              </button>
              <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
                <ul class="navbar-nav main-menu me-auto" id="linkItem">
                  <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                  <li><a href="#about">@lang('About')</a></li>
                  <li><a href="#plan">@lang('Plan')</a></li>
                  <li><a href="#feature">@lang('Feature')</a></li>
                  <li><a href="#faq">@lang('Faq')</a></li>
                  <li><a href="#gateway">@lang('Gateway')</a></li>

                    @foreach($pages as $k => $data)
                        <li>
                            <a href="{{route('pages',[$data->slug])}}">
                                {{__($data->name)}}
                            </a>
                        </li>
                    @endforeach

                  <li><a href="{{ route('contact') }}">@lang('Contact')</a></li>
                </ul>
                <div class="nav-right">

                @auth
                    <a href="{{ route('user.home') }}" class="btn btn-sm btn--base me-3 btn--capsule px-3">
                        @lang('Dashboard')
                    </a>
                @else
                    <a href="#0" class="btn btn-sm btn--base me-3 btn--capsule px-3" data-bs-toggle="modal" data-bs-target="#loginModal">@lang('Sign In')</a>
                    <a href="#0" class="text-white fs--14px me-3" id="open-registration-modal" data-bs-toggle="modal" data-bs-target="#registerModal">@lang('Sign Up')</a>
                @endauth

                  <select class="language-select langSel">

                    @foreach($language as $item)
                        <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif>
                            {{ __($item->name) }}
                        </option>
                    @endforeach

                  </select>
                </div>
              </div>
            </nav>
          </div>
        </div><!-- header__bottom end -->
      </header>
      <!-- header-section end  -->
