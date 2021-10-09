@extends($activeTemplate.'layouts.master')

@section('content')

 <div class="dashboard-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-md-12 col-lg-12">
                    <h3 class="text-center mb-3">@lang($page_title)</h3>
                    <div class="table-responsive">
                        <table class="transaction-table">
                            <thead class="t-header">
                                <tr>
                                    <th scope="col">@lang('Transaction ID')</th>
                                    <th scope="col">@lang('Receving Method')</th>
                                    <th scope="col">@lang('Send Amount')</th>
                                    <th scope="col">@lang('Rate')</th>
                                    <th scope="col">@lang('Charge')</th>
                                    <th scope="col">@lang('Receivable')</th>
                                    <th scope="col">@lang('Status')</th>
                                    <th scope="col">@lang('Time')</th>
                                    <th scope="col">@lang('Details')</th>
                                </tr>
                            </thead>
                            <tbody class="t-body">

                                @forelse($withdraws as $k=>$data)
                                    <tr>
                                        <td data-input="@lang('Transaction ID')">{{ $data->trx }}</td>
                                        <td data-input="@lang('Gateway')">{{ $data->method->name }}</td>
                                        <td data-input="@lang('Amount')">
                                            <strong>{{ getAmount($data->get_amount) }} {{ $general->cur_text }}</strong>
                                        </td>
                                        <td data-input="@lang('Rate')">
                                            {{ getAmount($data->rate) }} {{ $data->get_currency }}
                                        </td>
                                        <td data-input="@lang('Charge')" class="text-danger">
                                            {{ getAmount($data->charge) }} {{ $data->send_currency }}
                                        </td>
                                       
                                        <td data-input="@lang('Receivable')" class="text-success">
                                            <strong>{{ getAmount($data->final_amount) }} {{ $data->send_currency }}</strong>
                                        </td>
                                        <td data-input="@lang('Status')">
                                            @if ($data->status == 2)
                                                <span class="badge badge-warning">@lang('Pending')</span>
                                            @elseif($data->status == 1)
                                                <span class="badge badge-success">@lang('Completed')</span>
                                                
                                            @elseif($data->status == 3)
                                                <span class="badge badge-danger">@lang('Rejected')</span>
                                               
                                            @endif

                                        </td>
                                        <td data-input="@lang('Time')">
                                            <div class="time-deg">
                                                <i class="fa fa-calendar"></i> {{ showDateTime($data->created_at) }}
                                            </div>
                                        </td>
                                        <td data-input="@lang('Details')">
                                           <button class="btn btn-primary btn-sm approveBtn"
                                                    data-admin_feedback="{{ $data->admin_feedback }}"><i
                                                        class="fa fa-desktop"></i></button>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="8">{{ $empty_message }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     <div class="card-footer py-4">
                    {{ $withdraws->links('admin.partials.paginate') }}
                </div>
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
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="withdraw-detail py-3"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        'use strict';
        
        $('.approveBtn').on('click', function() {
            var modal = $('#detailModal');
            var feedback = $(this).data('admin_feedback');

            modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
            modal.modal('show');
        });

    </script>
@endpush

@push('style')

    <style>

        .approveBtn{
            width: 43px;
            height: 33px;
        }

        .table .thead-dark th {
            color: #fff;
            background-color: #3fcc71;
            border-color: #454d55;
        }
        
        .modal-header .close {
            padding: 1rem 1rem;
            margin: -1rem -1rem;
        }
        
        .modal-header{
            background: #0a0925;
        }
        .modal-header .modal-title {
            color: #fff;
        }
        .modal .btn {
            height: 40px;
        }

        .withdraw_log {
            width: 100%;
            overflow-y: auto;
        }
        .withdraw_log .transaction-table td {
            min-width: 130px;
        }

        .time-deg{
            min-width:170px;
            font-size:14px
        }
    </style>

@endpush
