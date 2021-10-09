@extends($activeTemplate.'layouts.master')
@section('content')
    <!-- Dashboard Section -->
    <div class="dashboard-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-md-6 col-lg-4">
                    <div class="dashboard-item">
                        <div class="dashboard-thumb">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="dashboard-content">
                            <h5 class="title">@lang('Current Balance')</h5>
                            <h4 class="amount">{{ $general->cur_sym }} {{ getAmount($current_balance->balance) }}</h4>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-6 col-lg-4">
                    <div class="dashboard-item">
                        <div class="dashboard-thumb">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="dashboard-content">
                            <h5 class="title"><a href="{{route('user.reffer.log')}}">@lang('Refferal Commission')</a></h5>
                            <h4 class="amount">{{ $general->cur_sym }} {{ $refferal_bonus }}</h4>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6 col-lg-4">
                    
                        <div class="dashboard-item">
                            <div class="dashboard-thumb">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="dashboard-content">
                            <h5 class="title"><a href="{{route('user.exchange.cancled')}}">@lang('Cancled Exchange')</a></h5>
                                <h4 class="amount">{{ $total_transaction }}</h4>
                            </div>
                        </div>
                     
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="dashboard-item">
                        <div class="dashboard-thumb">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="dashboard-content">
                            <h5 class="title"><a href="{{route('user.exchange.pending')}}">@lang('Pending Exchange')</a></h5>
                            <h4 class="amount">{{ $pending_exchange_count }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="dashboard-item">
                        <div class="dashboard-thumb">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="dashboard-content">
                            <h5 class="title">
                                <a href="{{route('user.exchange.approved')}}">@lang('Approved Exchange')</a>
                            </h5>
                            <h4 class="amount">{{ $accpted_exchange_count }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="dashboard-item">
                        <div class="dashboard-thumb">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="dashboard-content">
                            <h5 class="title">
                              <a href="{{route('user.exchange.refunded')}}">@lang('Refunded Exchange')</a>  
                            </h5>
                            <h4 class="amount">{{ $refunded_exchange->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>


            
        </div>
    </div>
    <!-- Dashboard Section -->


@endsection


@push('style')
    <style>
        .nowrap {
            white-space: nowrap;
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #39ba71;
            background-color: #0e0d35;
            border: 1px solid #ffffff;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #3fcc71;
            border-color: #ffffff;
        }

    </style>
@endpush
