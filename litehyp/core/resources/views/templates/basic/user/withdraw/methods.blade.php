@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center gy-4">

            <div class="col-lg-12 text-end">
                <a href="{{ route('user.withdraw.history') }}" class="btn btn--base mb-3">
                    @lang('Withdraw History')
                </a>
            </div>

            @foreach($withdrawMethod as $data)

                <div class="col-lg-4 col-md-6">
                    <div class="custom--card">
                        <h5 class="card-header text-center">{{__($data->name)}}</h5>
                        <div class="card-body card-body-withdraw">
                            <img src="{{getImage(imagePath()['withdraw']['method']['path'].'/'. $data->image,imagePath()['withdraw']['method']['size'])}}" class="card-img-top" alt="{{__($data->name)}}" class="w-100">
                            <ul class="list-group text-center">
                                <li class="list-group-item">@lang('Limit')
                                    : {{showAmount($data->min_limit)}}
                                    - {{showAmount($data->max_limit)}} {{__($general->cur_text)}}</li>

                                <li class="list-group-item"> @lang('Charge')
                                    - {{showAmount($data->fixed_charge)}} {{__($general->cur_text)}}
                                    + {{showAmount($data->percent_charge)}}%
                                </li>
                                <li class="list-group-item">@lang('Processing Time')
                                    - {{$data->delay}}</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="javascript:void(0)"  data-id="{{$data->id}}"
                               data-resource="{{$data}}"
                               data-min_amount="{{showAmount($data->min_limit)}}"
                               data-max_amount="{{showAmount($data->max_limit)}}"
                               data-fix_charge="{{showAmount($data->fixed_charge)}}"
                               data-percent_charge="{{showAmount($data->percent_charge)}}"
                               data-base_symbol="{{__($general->cur_text)}}"
                               class="btn btn-block btn--base w-100 withdraw" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                                @lang('Withdraw')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="modal fade" id="withdrawModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title method-name" id="depositModalLabel"></h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="las la-times"></i>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{route('user.withdraw.money')}}" method="post" class="account-form login-form">
                @csrf

                <div class="form-group">
                    <input type="hidden" name="currency" class="edit-currency form-control">
                    <input type="hidden" name="method_code" class="edit-method-code  form-control">
                </div>

                <p class="text--base withdrawLimit"></p>
                <p class="text--base withdrawCharge"></p>

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
            $('.withdraw').on('click', function () {
                var id = $(this).data('id');
                var result = $(this).data('resource');
                var minAmount = $(this).data('min_amount');
                var maxAmount = $(this).data('max_amount');
                var fixCharge = $(this).data('fix_charge');
                var percentCharge = $(this).data('percent_charge');

                var withdrawLimit = `@lang('Withdraw Limit'): ${minAmount} - ${maxAmount}  {{__($general->cur_text)}}`;
                $('.withdrawLimit').text(withdrawLimit);
                var withdrawCharge = `@lang('Charge'): ${fixCharge} {{__($general->cur_text)}} ${(0 < percentCharge) ? ' + ' + percentCharge + ' %' : ''}`
                $('.withdrawCharge').text(withdrawCharge);
                $('.method-name').text(`@lang('Withdraw Via') ${result.name}`);
                $('.edit-currency').val(result.currency);
                $('.edit-method-code').val(result.id);
            });
        })(jQuery);
    </script>

@endpush

@push('style')
<style>
    .list-group-item{
        background: transparent;
    }
</style>
@endpush
