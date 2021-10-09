@extends($activeTemplate.'layouts.frontend')
@section('content')
    <!--=======Account-Service Starts Here=======-->
    <section class="account-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header margin-olpo left-style">
                <h2 class="title">@lang("Create $general->sitename Account")</h2>
            </div>
            <form class="account-form" action="{{ route('user.register') }}" method="POST" onsubmit="return submitUserForm();">
                @csrf

                @if (session()->get('reference') != null)
                    <div class="form-group col-md-6">
                        <label for="firstname"
                            class="">{{ __('Reference BY') }}</label>
                            <input type="text" name="referBy" id="referenceBy" class="form-control"
                                value="{{ session()->get('reference') }}" readonly>
                        
                    </div>
                @endif
                <div class="form-group col-md-6">
                    <label for="name01">@lang('First Name')</label>
                    <input id="firstname" type="text" class="form-control" name="firstname"
                                        value="{{ old('firstname') }}" required placeholder="@lang('First Name')">
                </div>
                <div class="form-group col-md-6">
                    <label for="name02">@lang('Last Name')</label>
                    <input id="lastname" type="text" class="form-control" name="lastname"
                                        value="{{ old('lastname') }}" required placeholder="@lang('Last Name')">
                </div>
                <div class="form-group col-md-6">
                    <label for="email01">@lang('Email Address')</label>
                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" required placeholder="@lang('Email')">
                </div>

                <div class="form-group col-md-6">
                    <label for="email01">@lang('User name')</label>
                    <input id="username" type="text" class="form-control" name="username"
                                        value="{{ old('username') }}" required placeholder="@lang('User Name')"> 
                </div>

                <div class="form-group col-md-6">

                                <label for="mobile" class="text-md-right">{{ __('Mobile') }}</label>
                                

                                    <div class=" country-code">

                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <select name="country_code">
                                                        @include('partials.country_code')
                                                    </select>
                                                </span>
                                            </div>
                                            <input type="text" name="mobile" class="form-control" placeholder="@lang('Your Phone Number')">
                                        </div>
                                    </div>

                                
                            </div>

                             <div class="form-group col-md-6">
                                <label for="email" class="text-md-right">{{ __('Country') }}</label>
                                <input type="text" name="country" class="form-control" readonly>
                            </div>

               
                <div class="form-group col-md-6">
                    <label for="pass01">@lang('Your Password')</label>
                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="new-password" placeholder="@lang('Password')">
                </div>
                <div class="form-group col-md-6">
                    <label for="pass02">@lang('Confirm Password')</label>
                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" placeholder="@lang('Confirm Password')">
                </div>

                <div class="form-group col-md-12">
                    <div class="row">
                        @include($activeTemplate.'partials.custom-captcha')
                    </div>
                </div>

               
                <div class="form-group checkgroup">
                    <input type="checkbox" id="check01" name="subscribe" value="1">
                    <label for="check01">@lang('Subscribe Our Newslater To get Regular Update News')</label>
                </div>

                 <div class="form-group col-md-12">
                    <input type="submit" value="Sign Up">
                </div>
                <div class="form-group checkgroup">
                <label for="check02" class="w-100 p-0">@lang('Already Have an account??') <a href="{{route('user.login')}}">@lang('Sign
                            In')</a></label>
                </div>
            </form>
        </div>
    </section>
    <!--=======Account-Service Ends Here=======-->

@endsection
@push('style-lib')

    <link href="{{ asset($activeTemplateTrue) . '/css/intlTelInput.css' }}" rel="stylesheet">

@endpush


@push('script-lib')
    <script src="{{ asset($activeTemplateTrue) . '/js/intlTelInput-jquery.min.js' }}"></script>
@endpush

@push('script')

    <script>
        'use strict'
        @if($country_code)
        var t = $(`option[data-code={{ $country_code }}]`).attr('selected','');
      @endif
        $('select[name=country_code]').change(function(){
            $('input[name=country]').val($('select[name=country_code] :selected').data('country'));
        }).change();

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    '<span style="color:red;">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }

    </script>
@endpush


@push('style')

    <style>
        .iti{
            display: block
        }

        .country-code .input-group-prepend .input-group-text{
        background: #fff !important;
    }
    .country-code select{
        border: none;
    }
    .country-code select:focus{
        border: none;
        outline: none;
    }

    .input-group-text{
            padding: 0;
    }
    

    </style>
    
@endpush