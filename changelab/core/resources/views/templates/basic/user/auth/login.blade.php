@extends($activeTemplate.'layouts.frontend')

@section('content')

<!--=======Account-Service Starts Here=======-->
    <section class="account-section padding-top padding-bottom">
        <div class="container">
            <div class="section-header margin-olpo left-style">
                <h2 class="title">@lang('Login To '.$general->sitename)</h2>
            </div>
            <form class="account-form" method="POST" action="{{ route('user.login')}}" onsubmit="return submitUserForm();">
            @csrf
                <div class="form-group col-md-6">
                    <label for="name01">@lang('Username')</label>
                    <input type="text" id="name01" class="form-control" required name="username" placeholder="@lang('Username')">
                </div>
                <div class="form-group col-md-6">
                    <label for="pass01">@lang('Your Password')</label>
                    <input type="password" name="password" class="form-control" id="pass01" required placeholder="@lang('Password')">
                </div>

                <div class="form-group col-md-12">
                @php
                    echo loadReCaptcha()
                @endphp
                </div>

               
                @include($activeTemplate.'partials.custom-captcha')
                
                
                <div class="form-group">
                    <input type="submit" class="text-white form-control" value="Sign In">
                </div>
                <div class="form-group checkgroup">
                <label for="check01"><a href="{{route('user.password.request')}}">@lang('Forget Password')</a></label>
                </div>
                <div class="form-group checkgroup">
                <label for="check02" class="w-100 p-0">@lang("Don't Have any account??") <a href="{{route('user.register')}}">@lang('Sign Up Now')</a></label>
                </div>
            </form>
        </div>
    </section>
    <!--=======Account-Service Ends Here=======-->

@endsection

@push('script')
    <script>
        'use strict';
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">@lang("Captcha field is required.")</span>';
                return false;
            }
            return true;
        }
        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush
