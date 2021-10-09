@extends($activeTemplate.'layouts.frontend')
@section('content')

    <div class="container my-5">
        <div class="row justify-content-center mt-4">
            
            <div class="col-md-8">
                <div class="card">
                <div class="card-header text-center">
                    <h5 class="m-0">@lang('Verify Your Code')</h5>
                </div>


                <div class="card-body">
                    <form action="{{ route('user.password.verify-code') }}" method="POST" class="cmn-form mt-30">
                    @csrf

                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="form-group text-center">
                        <label for="email">@lang('Verification Code')</label>

                        <div id="phoneInput">
                            <div class="field-wrapper">
                                <div class=" phone">
                                    <input type="text" name="code[]" class="letter"
                                           pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                    <input type="text" name="code[]" class="letter"
                                           pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                    <input type="text" name="code[]" class="letter"
                                           pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                    <input type="text" name="code[]" class="letter"
                                           pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                    <input type="text" name="code[]" class="letter"
                                           pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                    <input type="text" name="code[]" class="letter"
                                           pattern="[0-9]*" inputmode="numeric" maxlength="1">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success custom-button">@lang('Verify Code') <i
                                class="las la-sign-in-alt"></i></button>
                    </div>

                    <div class="form-group d-flex justify-content-between align-items-center">
                        @lang('Please check including your Junk/Spam Folder. if not found, you can ')
                        <a href="{{ route('user.password.request') }}">@lang('Try to send again')</a>
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
            border: 1px solid #e5e5e5;
            background: #f4f4f4;
        }

         .card-header {
            padding: 23px;
        }

        .form-group input,
        .input-group input {

            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            height: 60px;
            padding: 0 25px;
            color: #ffffff;
            font-size: 20px;
            background: #0E0D35;
           
        }

        input.letter {
    border: 1px solid cornflowerblue !important;
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
