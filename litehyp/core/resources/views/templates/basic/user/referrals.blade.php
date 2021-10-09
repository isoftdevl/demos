@extends($activeTemplate.'layouts.master')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive--md">
          <table class="table custom--table">
            <thead>
              <tr>
                <th scope="col">@lang('Username')</th>
                <th scope="col">@lang('Email')</th>
                <th scope="col">@lang('Phone')</th>
                <th scope="col">@lang('Total Deposit')</th>
              </tr>
            </thead>
            <tbody>

            @forelse($referrals as $user)
                <tr>
                    <td data-label="@lang('Username')">{{$user->username}}</td>
                    <td data-label="@lang('Email')">{{$user->email}}</td>
                    <td data-label="@lang('Phone')">{{$user->mobile}}</td>
                    <td data-label="@lang('Total Deposit')">{{getAmount($user->deposits()->sum('amount'))}} {{ $general->cur_text }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%"> @lang('No results found')!</td>
                </tr>
            @endforelse

            </tbody>
          </table>
        </div>

        {{$referrals->links()}}

      </div>
    </div>
  </div>



@endsection
