@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">

                <div class="custom--card">

                    <div class="card-body">

                        <form action="" method="post" class="register">
                            @csrf
                            <div class="form-group">
                                <label for="password">@lang('Current Password')</label>
                                <input id="password" type="password" placeholder="Old Password" class="form--control" name="current_password" required autocomplete="current-password">
                            </div>
                            <div class="form-group hover-input-popup">
                                <label for="new_password">@lang('Password')</label>
                                <input id="new_password" type="password" placeholder="New Password" class="form--control" name="password" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">@lang('Confirm Password')</label>
                                <input id="password_confirmation" type="password" placeholder="Confirm Password" class="form--control" name="password_confirmation" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="mt-4 w-100 btn btn--base" value="@lang('Change Password')">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
