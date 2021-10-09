@extends($activeTemplate.'layouts.master')


@section('content')
    <div class="container">
        <div class="row gy-4 justify-content-center">

            <div class="col-lg-12 text-end">
                <a href="{{ route('user.deposit.history') }}" class="btn btn--base mb-3">
                    @lang('Deposit History')
                </a>
            </div>

            @foreach($gatewayCurrency as $data)
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="custom--card">
                        <h5 class="card-header text-center">
                            {{__($data->name)}}
                        </h5>
                        <div class="card-body card-body-deposit">
                            <img src="{{$data->methodImage()}}" class="card-img-top" alt="{{__($data->name)}}" class="w-100">
                        </div>
                        <div class="card-footer">
                            <a href="javascript:void(0)" data-id="{{$data->id}}"
                               data-name="{{$data->name}}"
                               data-currency="{{$data->currency}}"
                               data-method_code="{{$data->method_code}}"
                               data-min_amount="{{showAmount($data->min_amount)}}"
                               data-max_amount="{{showAmount($data->max_amount)}}"
                               data-base_symbol="{{$data->baseSymbol()}}"
                               data-fix_charge="{{showAmount($data->fixed_charge)}}"
                               data-percent_charge="{{showAmount($data->percent_charge)}}" class="btn btn--base btn-block custom-success deposit w-100" data-bs-toggle="modal" data-bs-target="#depositModal">
                                @lang('Deposit')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


  <!-- Modal -->
  <div class="modal fade" id="depositModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title method-name" id="depositModalLabel"></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="las la-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('user.deposit.insert')}}" method="post" class="account-form login-form">
            @csrf

            <div class="form-group">
                <input type="hidden" name="currency" class="edit-currency">
                <input type="hidden" name="method_code" class="edit-method-code">
            </div>

            <p class="text--base depositLimit"></p>
            <p class="text--base depositCharge"></p>

            <div class="form-group">
                <label>@lang('Enter Amount')<sup class="text-danger">*</sup></label>
                <div class="input-group">
                    <input id="amount" type="text" class="form--control" name="amount" placeholder="@lang('Amount')" required  value="{{old('amount')}}" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                    <span class="input-group-text bg--base">{{__($general->cur_text)}}</span>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-2">
                    <button type="submit" class="btn btn--base w-100 bg-danger" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn--base w-100">@lang('Confirm')</button>
                </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

@endsection



@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.deposit').on('click', function () {
                var name = $(this).data('name');
                var currency = $(this).data('currency');
                var method_code = $(this).data('method_code');
                var minAmount = $(this).data('min_amount');
                var maxAmount = $(this).data('max_amount');
                var baseSymbol = "{{$general->cur_text}}";
                var fixCharge = $(this).data('fix_charge');
                var percentCharge = $(this).data('percent_charge');

                var depositLimit = `@lang('Deposit Limit'): ${minAmount} - ${maxAmount}  ${baseSymbol}`;
                $('.depositLimit').text(depositLimit);
                var depositCharge = `@lang('Charge'): ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' +percentCharge + ' % ' : ''}`;
                $('.depositCharge').text(depositCharge);
                $('.method-name').text(`@lang('Payment By ') ${name}`);
                $('.currency-addon').text(baseSymbol);
                $('.edit-currency').val(currency);
                $('.edit-method-code').val(method_code);
            });

            $('.prevent-double-click').on('click',function(){
                $(this).addClass('button-none');
                $(this).html('<i class="fas fa-spinner fa-spin"></i> @lang('Processing')...');
            });
        })(jQuery);
    </script>
@endpush

