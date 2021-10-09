@extends($activeTemplate.'layouts.master')
@section('content')

<div class="container">
    <div class="row">
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

            @forelse($logs as $index => $data)
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

        {{$logs->links()}}

      </div>
    </div>
  </div>


      {{-- APPROVE MODAL --}}
      <div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item dark-bg">@lang('Amount') : <span class="withdraw-amount "></span></li>
                        <li class="list-group-item dark-bg">@lang('Charge') : <span class="withdraw-charge "></span></li>
                        <li class="list-group-item dark-bg">@lang('After Charge') : <span class="withdraw-after_charge"></span></li>
                        <li class="list-group-item dark-bg">@lang('Conversion Rate') : <span class="withdraw-rate"></span></li>
                        <li class="list-group-item dark-bg">@lang('Payable Amount') : <span class="withdraw-payable"></span></li>
                    </ul>
                    <ul class="list-group withdraw-detail mt-1">
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Detail MODAL --}}
    <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="withdraw-detail"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>


@endsection



@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.approveBtn').on('click', function() {
                var modal = $('#approveModal');
                modal.find('.withdraw-amount').text($(this).data('amount'));
                modal.find('.withdraw-charge').text($(this).data('charge'));
                modal.find('.withdraw-after_charge').text($(this).data('after_charge'));
                modal.find('.withdraw-rate').text($(this).data('rate'));
                modal.find('.withdraw-payable').text($(this).data('payable'));
                var list = [];
                var details =  Object.entries($(this).data('info'));

                var ImgPath = "{{asset(imagePath()['verify']['deposit']['path'])}}/";
                var singleInfo = '';
                for (var i = 0; i < details.length; i++) {
                    if (details[i][1].type == 'file') {
                        singleInfo += `<li class="list-group-item">
                                            <span class="font-weight-bold "> ${details[i][0].replaceAll('_', " ")} </span> : <img src="${ImgPath}/${details[i][1].field_name}" alt="@lang('Image')" class="w-100">
                                        </li>`;
                    }else{
                        singleInfo += `<li class="list-group-item">
                                            <span class="font-weight-bold "> ${details[i][0].replaceAll('_', " ")} </span> : <span class="font-weight-bold ml-3">${details[i][1].field_name}</span>
                                        </li>`;
                    }
                }

                if (singleInfo)
                {
                    modal.find('.withdraw-detail').html(`<br><strong class="my-3">@lang('Payment Information')</strong>  ${singleInfo}`);
                }else{
                    modal.find('.withdraw-detail').html(`${singleInfo}`);
                }
                modal.modal('show');
            });

            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');
                var feedback = $(this).data('admin_feedback');
                modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
                modal.modal('show');
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
