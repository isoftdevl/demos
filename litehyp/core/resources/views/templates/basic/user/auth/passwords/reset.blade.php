@extends($activeTemplate.'layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="custom--card">
                <h3 class="card-header text-center">@lang('Reset Password')</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.password.update') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="password" class="">@lang('Password')</label>
                            <div class="col-lg-12 hover-input-popup">
                                <input id="password" type="password" class="form--control @error('password') is-invalid @enderror" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="">@lang('Confirm Password')</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form--control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn--base w-100">
                                    @lang('Reset Password')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
