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
                <th>@lang('Amount')</th>
                <th>@lang('Per Return Interest')</th>
                <th>@lang('Interest Type')</th>
                <th>@lang('Total Return')</th>
                <th>@lang('Get Return')</th>
                <th>@lang('Status')</th>
                <th>@lang('Next Return Date')</th>
              </tr>
            </thead>
            <tbody>

            @forelse($logs as $index => $data)
            <tr>
                <td data-label="@lang('Trx')">{{ $data->trx }}</td>
                <td data-label="@lang('Amount')">
                    <strong>
                        {{ showAmount($data->amount) }}
                        {{ __($general->cur_text) }}
                    </strong>
                </td>
                <td data-label="@lang('Per Return Interest')">
                    <strong>
                        {{ showAmount($data->interest_amount) }}
                        {{ __($general->cur_text) }}
                    </strong>
                </td>
                <td data-label="@lang('Interest Type')">
                    @if($data->interest_type == 0)
                        @lang('Fixed')
                    @else
                        @lang('Percent')
                    @endif
                </td>
                <td data-label="@lang('Total Return')">
                    <strong>
                        {{ $data->total_return }} @lang('Times')
                    </strong>
                </td>
                <td data-label="@lang('Get Return')">
                    <strong>
                        {{ $data->total_paid }} @lang('Times')
                    </strong>
                </td>
                <td data-label="@lang('Status')">
                    @if($data->status == 0)
                        <span class="badge badge--info">@lang('Running')</span>
                    @else
                        <span class="badge badge--success">@lang('Completed')</span>
                    @endif
                </td>
                <td data-label="@lang('Next Return Date')">{{ showDateTime($data->next_return_date) }}</td>
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


@endsection
