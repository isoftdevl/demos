@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container padding-top padding-bottom">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">

                <div class="card section-bg">

                    <div class="card-header py-2 text-center">
                        <h4 class="m-0 text-white">@lang('Change Password')</h4>
                    </div>
                    <div class="card-body section-bg">

                        <form action="" method="post" class="register">
                            @csrf
                            <div class="form-group">
                                <label for="c_password">{{trans('Current password')}}</label>
                                <input id="c_password" type="password" class="white-light-border form-control" name="current_password" required
                                       autocomplete="current-password">
                            </div>

                            <div class="form-group">
                                <label for="password">{{trans('password')}}</label>
                                <input id="password" type="password" class="white-light-border form-control" name="password" required
                                       autocomplete="current-password">
                            </div>


                            <div class="form-group">
                                <label for="password_confirmation">{{trans('Confirm password')}}</label>
                                <input id="password_confirmation" type="password" class="white-light-border form-control"
                                       name="password_confirmation" required autocomplete="current-password">
                            </div>


                            <div class="form-group text-right mb-0">
                                <input type="submit" class="mt-4 btn btn-success" value="{{trans('Change password')}}">
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection




@push('style')
    <style>
        .form-group label {
            text-transform: capitalize;
        }
        .form-group input,
        .input-group input {

            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            height: 60px;
            padding: 0 25px;
            font-size: 20px;
            background: #fff;
        }

        .card-header {
            background: #0e0d35;
            padding: 23px;
        }

        .card-body {
            background: #13114a;
        }

        .table {
            color: #ffffff;
        }


        input[type=submit] {
            background: #5350ff !important;
            height: 50px;
            text-transform: uppercase;
            width: unset;
            padding: 0 25px;
            font-size: 16px;
            border: none;
        }

    </style>
@endpush
