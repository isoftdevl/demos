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
                <ul class="navbar-nav main-menu me-auto">
                  <li><a href="{{ route('user.home') }}">@lang('Dashboard')</a></li>
                  <li><a href="{{ route('user.deposit') }}">@lang('Deposit')</a></li>
                  <li><a href="{{ route('user.withdraw') }}">@lang('Withdraw')</a></li>
                  <li><a href="{{ route('user.referrals') }}">@lang('Referrals')</a></li>

                    <li class="menu_has_children">
                        <a href="#0">@lang('Report')</a>
                        <ul class="sub-menu" style="background: #20204E;">
                            <li><a href="{{ route('user.trx.log') }}">@lang('Transaction Log')</a></li>
                            <li><a href="{{ route('user.investment.log') }}">@lang('Investment Log')</a></li>
                        </ul>
                    </li>

                    <li class="menu_has_children">
                        <a href="#0">@lang('Account')</a>
                        <ul class="sub-menu" style="background: #20204E;">
                            <li><a href="{{ route('user.profile.setting') }}">@lang('Profile')</a></li>
                            <li><a href="{{ route('user.twofactor') }}">@lang('2FA Security')</a></li>
                            <li><a href="{{ route('user.change.password') }}">@lang('Change Password')</a></li>
                            <li><a href="{{ route('user.logout') }}">@lang('Logout')</a></li>
                        </ul>
                    </li>


                </ul>
                <div class="nav-right">
                  <a href="#0" class="btn btn-sm btn--base me-3 btn--capsule px-3" data-bs-toggle="modal" data-bs-target="#loginModal">@lang('Logout')</a>
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
