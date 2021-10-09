 @php
    
    $banner = getContent('banner.content',true);

@endphp

@extends($activeTemplate.'layouts.frontend')
@section('content')
    <section class="banner-section bg_fixed bg_img banner-overlay" data-background="{{ asset('assets/images/frontend/banner/' . $banner->data_values->background_image) }}">
        <div class="container">
            <div class="banner-content row justify-content-between">
                <div class="col-lg-6">
                    <div class="content cl-white">
                    <h2 class="title text-white">{{ __($banner->data_values->heading) }}</h2>
                    <p>
                        {{ __($banner->data_values->sub_heading) }}
                    </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="currency-converter">
                        <form class="exchange-form" method="POST" action="{{ route('user.exchange') }}">
                            @csrf
                            <div class="form-group">
                                <label for="send">@lang('You Send')</label>
                                <input type="text" name="send_amount" id="send_val" placeholder="@lang('Send')" required
                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                <select class="select-bar" name="send" id="send">
                                    <option value="">@lang('Select Currency')</option>
                                    @foreach ($currencys_sell as $currency)
                                        <option value="{{ $currency->id }}"
                                            data-min_max="{{ filterCollection($currency, 'rate', 'sell_at', 'buy_at', 'fixed_charge', 'percent_charge', 'reserve', 'min_exchange', 'max_exchange', 'cur_sym', 'payment_type_sell') }}">
                                            {{ $currency->name }} {{$currency->cur_sym}}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="exchange-limit exchange-buy d-none">
                                    <div class="item">
                                        <span class="subtitle">@lang('Min')</span>
                                        <span class="amount min-amount"></span>
                                    </div>
                                    <div class="item">
                                        <span class="subtitle">@lang('Max')</span>
                                        <span class="amount max-amount"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group receiveData">
                                <label for="receive">@lang('You Get')</label>

                                <input type="text" name="receive_amount" id="receive_val" min="0" placeholder="@lang('Receive')"
                                    readonly>
                                <select class="select-bar" name="receive" id="receive">
                                    <option value="" class="wrap">@lang('Select Currency')</option>
                                    @foreach ($currencys_buy as $currency)
                                        <option value="{{ $currency->id }}"
                                            data-min_max="{{ filterCollection($currency, 'cur_sym', 'rate', 'sell_at', 'buy_at', 'fixed_charge', 'percent_charge', 'reserve', 'min_exchange', 'max_exchange', 'payment_type_sell') }}">
                                            {{ $currency->name }} {{$currency->cur_sym}}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="exchange-limit reserve-section d-none">
                                    <div class="item reserve">
                                        <span class="subtitle">@lang('Reserve')</span>
                                        <span class="amount"></span>
                                    </div>

                                        <div class="item reserve">
                                        <span class="subtitle">@lang('Rate')</span>
                                        <span class="amount conversion"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group submit">
                                <input type="submit" value="@lang('Exchange')">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======Banner-Section Ends Here=======-->

    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate.'sections.'.$sec)
        @endforeach
    @endif



@endsection


@push('script')

<script src="{{ asset($activeTemplateTrue . 'js/homesection.js') }}"></script>
@endpush




