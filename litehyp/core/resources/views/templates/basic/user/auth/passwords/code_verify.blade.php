@extends($activeTemplate.'layouts.frontend')
@section('content')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">

                <div class="custom--card">
                    <div class="card-header">
                        <div class="card-body">
                            <form action="{{ route('user.password.verify.code') }}" method="POST" class="cmn-form mt-30">
                                @csrf

                                <input type="hidden" name="email" value="{{ $email }}">

                                <div class="form-group">
                                    <label>@lang('Verification Code')</label>
                                    <input type="text" name="code" id="code" class="form--control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn--base w-100">@lang('Verify Code')</button>
                                </div>

                                <div class="">
                                    @lang('Please check including your Junk/Spam Folder. if not found, you can')
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#resetModal" class="text--base">@lang('Try to send again')</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    (function($){
        "use strict";
        $('#code').on('input change', function () {
          var xx = document.getElementById('code').value;
          $(this).val(function (index, value) {
             value = value.substr(0,7);
              return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
          });
      });
    })(jQuery)
</script>
@endpush
