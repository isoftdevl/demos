@extends($activeTemplate.'layouts.master')
@section('content')

  <!-- dashboard section start -->
    <div class="container">
      <div class="row gy-4 align-items-center">
        <div class="col-lg-12 mb-30">
            <div class="form-group">
                <label>@lang('Referral Link')</label>
                <div class="input-group">
                    <input type="text" class="form-control form-controller" id="referralURL" value="{{ route('home') }}?reference={{ auth()->user()->username }}" readonly>
                    <div class="input-group-append">
                        <span class="input-group-text copytext copyBoard" id="copyBoard"> <i class="fa fa-copy"></i> </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a href="{{ route("user.trx.log") }}" class="d-block">
                <div class="balance-card">
                    <span class="text--dark">@lang('Total Balance')</span>
                    <h3 class="number text--dark">
                        {{ $general->cur_sym }}
                        {{ showAmount($user->balance) }}
                    </h3>
                </div><!-- dashboard-card end -->
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="dashboard-card">
            <span>@lang('Total Deposit')</span>
            <a href="{{ route('user.deposit.history') }}" class="view--btn">@lang('View all')</a>
            <h3 class="number">
                {{ $general->cur_sym }}
                {{ showAmount($totalDeposit) }}
            </h3>
            <i class="las la-dollar-sign icon"></i>
          </div><!-- dashboard-card end -->
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="dashboard-card">
              <span>@lang('Total Withdraw')</span>
              <a href="{{ route('user.withdraw.history') }}" class="view--btn">@lang('View all')</a>
              <h3 class="number">
                {{ $general->cur_sym }}
                {{ showAmount($totalWithdraw) }}
              </h3>
              <i class="las la-hand-holding-usd icon"></i>
            </div><!-- dashboard-card end -->
          </div>
        <div class="col-lg-3 col-sm-6">
          <div class="dashboard-card">
            <span>@lang('Total Investment')</span>
            <a href="{{ route('user.investment.log') }}" class="view--btn">@lang('View all')</a>
            <h3 class="number">
                {{ $general->cur_sym }}
                {{ showAmount($totalInvest) }}
            </h3>
            <i class="las la-dollar-sign icon"></i>
          </div><!-- dashboard-card end -->
        </div>
      </div><!-- row end -->
      <div class="row mt-5 justify-content-center gx-4 gy-5">

          @forelse($plans as $singlePlan)
            <div class="col-md-6 col-lg-4 col-sm-10">
                <div class="package-card text-center bg_img" style="background-image: url('{{ asset($activeTemplateTrue. 'images/bg/plan.jpg') }}');">
                        <h4 class="package-card__title">{{ __($singlePlan->name) }}</h4>
                    <div class="package-card__range mt-4 base--color">
                        {{ $general->cur_sym }}{{ showAmount($singlePlan->min_amount, 0) }}
                        -
                        {{ $general->cur_sym }}{{ showAmount($singlePlan->max_amount, 0) }}
                    </div>
                    <ul class="package-card__features mt-3">
                        <li>
                            {{ showAmount($singlePlan->interest_amount) }}
                            {{ $singlePlan->interest_type == 0 ? 'Fixed' : '%' }}
                        </li>
                        <li>@lang('Every Day')</li>
                        <li>@lang('For') {{ $singlePlan->total_return }} @lang('Times')</li>
                    </ul>
                    <a href="#0"
                    data-name="{{ __($singlePlan->name) }}"
                    data-id="{{ $singlePlan->id }}"
                    class="btn btn-md btn--base mt-4 planModal"
                    data-bs-toggle="modal"
                    data-bs-target="#planModal">
                        @lang('Invest Now')
                    </a>
                </div><!-- package-card end -->
            </div>
            @empty
                <h2 class="text-center">@lang('Plan Not Found')</h2>
            @endforelse

      </div>
      <div class="row mt-5">
        <div class="col-lg-12">
          <div class="table-responsive--md">
            <table class="table custom--table">
              <thead>
                <tr>
                    <th>@lang('Trx')</th>
                    <th>@lang('Transacted')</th>
                    <th>@lang('Amount')</th>
                    <th>@lang('Charge')</th>
                    <th>@lang('Post Balance')</th>
                    <th>@lang('Detail')</th>
                </tr>
              </thead>
              <tbody>

                @forelse($latestTrx as $index => $data)
                <tr>
                    <td data-label="@lang('Trx')">{{ $data->trx }}</td>
                    <td data-label="@lang('Transacted')">
                        {{ showDateTime($data->created_at) }}</td>
                    <td data-label="@lang('Amount')">
                        <strong>
                            {{ $data->trx_type }}
                            {{ showAmount($data->amount) }}
                            {{ __($general->cur_text) }}
                        </strong>
                    </td>
                    <td data-label="@lang('Trx')">{{ showAmount($data->charge) }} {{ __($general->cur_text) }}</td>
                    <td data-label="@lang('Post Balance')">
                        <strong>
                            {{ showAmount($data->post_balance) }}
                            {{ __($general->cur_text) }}
                        </strong>
                    </td>
                    <td data-label="@lang('Detail')">{{ __($data->details) }}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="100%">{{ __($emptyMessage) }}</td>
                    </tr>
                @endforelse

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  <!-- dashboard section end -->


  <div class="modal fade" id="planModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title method-name" id="planModalLabel"></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="las la-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('user.investment')}}" method="post" class="account-form login-form">
            @csrf

            <div class="form-group">
                <input type="hidden" name="id" required>
            </div>

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

@push('style')
<style type="text/css">
  #copyBoard{
    cursor: pointer;
    height: 100%;
  }
    .input-group-text {
        background-color: #0a1227;
        border: 1px solid #373768;
        color: #fff;
    }
    #referralURL{
        background: #20204e;
        border-color: #20204e;
        color: #fff;
    }
</style>
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        $('.planModal').on('click', function () {
            var modal = $('#planModal');
            modal.find('input[name=id]').val($(this).data('id'));
            modal.find($('#planModalLabel').text($(this).data('name')));
        });
        $('.copyBoard').click(function(){
            "use strict";
                var copyText = document.getElementById("referralURL");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                /*For mobile devices*/
                document.execCommand("copy");
                iziToast.success({message: "Copied: " + copyText.value, position: "topRight"});
          });
    })(jQuery);
</script>
@endpush
