@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-4">
                <img src="{{$deposit->gatewayCurrency()->methodImage()}}" class="card-img-top" alt="@lang('Image')" class="w-100">

                <div class="custom--card mt-2 h-auto">
                    <div class="card-body">
                    <form action="{{ route('ipn.'.$deposit->gateway->alias) }}" method="POST" class="text-center">
                        @csrf
                        <h34>@lang('Please Pay') {{showAmount($deposit->final_amo)}} {{__($deposit->method_currency)}}</h34>
                        <h4 class="my-3">@lang('To Get') {{showAmount($deposit->amount)}}  {{__($general->cur_text)}}</h4>
                        <button type="button" class="btn--base custom-success text-center btn-lg" id="btn-confirm">@lang('Pay Now')</button>
                        <script
                            src="//js.paystack.co/v1/inline.js"
                            data-key="{{ $data->key }}"
                            data-email="{{ $data->email }}"
                            data-amount="{{$data->amount}}"
                            data-currency="{{$data->currency}}"
                            data-ref="{{ $data->ref }}"
                            data-custom-button="btn-confirm"
                        >
                        </script>
                    </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
