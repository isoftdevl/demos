@extends($activeTemplate .'layouts.frontend')
@section('content')
<div class="container">
            <div class="row justify-content-center padding-top padding-bottom">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border-left-0 border-right-0 border-top-0">
                            <h5 class="title m-0 text-center">@lang('Please Verify Your Email to Get Access')</h5>
                        </div>

                        <div class="card-body">

                            <form action="{{route('user.verify_email')}}" method="POST" class="login-form">
                                @csrf

                                <div class="form-group">
                                    <p class="text-center">@lang('Your Email:')  <strong>{{auth()->user()->email}}</strong></p>
                                </div>


                                <div class="form-group">
                                    <h5 class="col-md-12 mb-4 text-center">@lang('Enter Verification Code')</h5>

                                    <div id="phoneInput">

                                        <div class="field-wrapper">
                                            <div class=" phone">
                                                <input type="text" name="email_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                <input type="text" name="email_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                <input type="text" name="email_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                <input type="text" name="email_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                <input type="text" name="email_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                                <input type="text" name="email_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                <div class="btn-area text-center">
                                    <button type="submit" class="btn btn-success">@lang('Submit')</button>
                                </div>
                                </div>


                                    <div class="form-group mb-0">
                                        <p>@lang('Please check including your Junk/Spam Folder. if not found, you can ') <a href="{{route('user.send_verify_code')}}?type=email" class="forget-pass"> @lang('Resend code')</a></p>
                                        @if ($errors->has('resend'))
                                            <br/>
                                            <small class="text-danger">{{ $errors->first('resend') }}</small>
                                        @endif
                                    </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('script-lib')
    <script src="{{ asset($activeTemplateTrue.'js/jquery.inputLettering.js') }}"></script>
@endpush
@push('style')
    <style>

        #phoneInput .field-wrapper {
            position: relative;
            text-align: center;
        }

        #phoneInput .form-group {
            min-width: 300px;
            width: 50%;
            margin: 4em auto;
            display: flex;
            border: 1px solid rgba(96, 100, 104, 0.3);
        }

        #phoneInput .letter {
            height: 50px;
            border-radius: 0;
            text-align: center;
            max-width: calc((100% / 10) - 1px);
            flex-grow: 1;
            flex-shrink: 1;
            flex-basis: calc(100% / 10);
            outline-style: none;
            padding: 5px 0;
            font-size: 18px;
            font-weight: bold;
            color: red;
            border: 1px solid #0e0d35;
        }

        #phoneInput .letter + .letter {
        }

        @media (max-width: 480px) {
            #phoneInput .field-wrapper {
                width: 100%;
            }

            #phoneInput .letter {
                font-size: 16px;
                padding: 2px 0;
                height: 35px;
            }
        }

    </style>
@endpush

@push('script')
    <script>
        'use strict'
        $(function () {
            $('#phoneInput').letteringInput({
                inputClass: 'letter',
                onLetterKeyup: function ($item, event) {
                   
                },
                onSet: function ($el, event, value) {
                    
                }
            });
        });
    </script>
@endpush