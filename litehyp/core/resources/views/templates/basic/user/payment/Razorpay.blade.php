@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-4">
                <img src="{{$deposit->gatewayCurrency()->methodImage()}}" class="card-img-top" alt="@lang('Image')" class="w-100">

                <div class="custom--card text-center mt-2 h-auto">
                    <div class="card-body">
                        <h4 class="text-center">@lang('Please Pay') {{showAmount($deposit->final_amo)}} {{$deposit->method_currency}}</h4>
                        <h4 class="my-3 text-center">@lang('To Get') {{showAmount($deposit->amount)}}  {{__($general->cur_text)}}</h4>
                        <form action="{{$data->url}}" method="{{$data->method}}">
                            <input type="hidden" custom="{{$data->custom}}" name="hidden">
                            <script src="{{$data->checkout_js}}"
                                    @foreach($data->val as $key=>$value)
                                    data-{{$key}}="{{$value}}"
                                @endforeach >
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('script')
    <script>
        (function ($) {
            "use strict";
            $('input[type="submit"]').addClass("ml-4 mt-4 btn-custom2 text-center btn-lg");
            $('.razorpay-payment-button').addClass('btn--base');
        })(jQuery);
    </script>
@endpush
