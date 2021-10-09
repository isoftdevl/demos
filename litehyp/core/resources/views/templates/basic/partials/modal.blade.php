@php
    $mobile_code = @implode(',', $info['code']);
    $countries = json_decode(file_get_contents(resource_path('views/partials/country.json')));
    $policy = getContent('policy_pages.element');
@endphp

 <!-- Login -->
  <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">@lang('Login your account')</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="las la-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <form class="account-form" action="{{ route('user.login')}}" method="post">
            @csrf
            <div class="form-group">
              <label>@lang('Username or Email') <sup class="text-danger">*</sup></label>
              <input type="text" name="username" value="{{ old('username') }}" class="form--control" required>
            </div>
            <div class="form-group">
              <label>@lang('Password') <sup class="text-danger">*</sup></label>
              <input id="password" type="password" class="form--control" name="password" required required>
            </div>
            <div class="form-group text-end">
              <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#resetModal" data-bs-dismiss="modal">@lang('Forget Password')?</a>
            </div>
            <button type="submit" class="btn btn--base w-100">@lang('Login Now')</button>
            <p class="text-center mt-3"><span class="text-white">@lang('New to') {{ __($general->sitename) }}?</span> <a href="#0" class="text--base" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">@lang('Signup here')</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Register --}}
  <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">@lang('Create an account')</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="las la-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <form class="account-form registration-form" action="{{ route('user.register') }}" method="post">
            @csrf
            <div class="row">
                @if(session()->get('reference') != null)
                    <div class="col-lg-12">
                        <label for="referenceBy">@lang('Reference By')</label>
                        <input type="text" name="referBy" id="referenceBy" class="form--control" value="{{session()->get('reference')}}" readonly>
                    </div>
                @endif
                <div class="col-lg-6">
                    <label for="firstname" class="">@lang('First Name')</label>
                    <input id="firstname" type="text" class="form--control" name="firstname" value="{{ old('firstname') }}" required>
                </div>
                <div class="col-lg-6">
                    <label for="lastname" class="">@lang('Last Name')</label>
                    <input id="lastname" type="text" class="form--control" name="lastname" value="{{ old('lastname') }}" required>
                </div>
                <div class="col-lg-6">
                    <label class="" for="country">{{ __('Country') }}</label>
                    <select name="country" id="country" class="form--control">
                        @foreach($countries as $key => $country)
                            <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}" data-code="{{ $key }}">{{ __($country->country) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="mobile" class="">@lang('Mobile')</label>
                    <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-text mobile-code"></span>
                                <input type="hidden" name="mobile_code">
                                <input type="hidden" name="country_code">
                            <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" class="form--control checkUser">
                        </div>
                        <small class="text-danger mobileExist"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="username" class="">{{ __('Username') }}</label>
                    <input id="username" type="text" class="form--control checkUser" name="username" value="{{ old('username') }}" required>
                    <small class="text-danger usernameExist"></small>
                </div>
                <div class="col-lg-6">
                    <label for="email" class="">@lang('E-Mail Address')</label>
                    <input id="email" type="email" class="form--control checkUser" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="col-lg-6">
                    <label for="password" class="">@lang('Password')</label>
                    <input id="registerPassword" type="password" class="form--control" name="password" required>
                    @if($general->secure_password)
                        <div class="input-popup">
                            <p class="error lower">@lang('1 small letter minimum')</p>
                            <p class="error capital">@lang('1 capital letter minimum')</p>
                            <p class="error number">@lang('1 number minimum')</p>
                            <p class="error special">@lang('1 special character minimum')</p>
                            <p class="error minimum">@lang('6 character password')</p>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <label for="password-confirm" class="">@lang('Confirm Password')</label>
                    <input id="password-confirm" type="password" class="form--control" name="password_confirmation" required autocomplete="new-password">
                </div>

                @if($general->agree)
                    <div class="col-lg-12 mt-4">
                        <input type="checkbox" id="agree" name="agree">
                        <label for="agree">
                            @lang('I agree with ')
                            @foreach($policy as $singleData)
                                <a href="{{ route('privacy.page', ['slug'=> slug($singleData->data_values->title), 'id'=>$singleData->id]) }}" class="text--base" target="_blank">
                                    {{ __($singleData->data_values->title) }} {{ $loop->last == true ? '.' : ',' }}
                                </a>
                            @endforeach
                        </label>
                    </div>
                @endif

            </div>
            <button type="submit" class="btn btn--base w-100 mt-3">SignUp Now</button>
            <p class="text-center mt-3"><span class="text-white">Have an account?</span> <a href="#0" class="text--base" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login here.</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Password Reset --}}
  <div class="modal fade" id="resetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">@lang('Reset Password')</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="las la-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <form class="account-form" method="POST" action="{{ route('user.password.email') }}">
            @csrf
            <div class="form-group">
                <label class="">@lang('Select One')</label>
                <select class="form--control" name="type">
                    <option value="email">@lang('E-Mail Address')</option>
                    <option value="username">@lang('Username')</option>
                </select>
            </div>
            <div class="form-group">
                <label class="my_value"></label>
                <input type="text" class="form--control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required autofocus="off">
                @error('value')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn--base w-100">@lang('Send Password Code')</button>
            <p class="text-center mt-3"><span class="text-white"></span> <a href="#0" class="text--base" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">@lang('Login here')</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>


@push('script')
    <script>
      "use strict";

        $(document).ready(function(){

            myVal();
            $('select[name=type]').on('change',function(){
                myVal();
            });
            function myVal(){
                $('.my_value').text($('select[name=type] :selected').text());
            }

            @if($mobile_code)
            $(`option[data-code={{ $mobile_code }}]`).attr('selected','');
            @endif

            $('select[name=country]').change(function(){
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+'+$('select[name=country] :selected').data('mobile_code'));

            let anyError = '{{ $errors->any() }}';
            let modalType = '{{ Session::get('modalType') }}';

            if(anyError || modalType){
                let errorModal = '{{ Session::get('modal') }}';
                $(errorModal).modal('show');
            }

        });

    </script>
@endpush
