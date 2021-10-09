@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-lg-8">
                <div class="card section-bg">
                   
                    <div class="card-header">
                        <h5 class="text-white text-center">@lang('Withdraw Preview')</h5>
                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <div class="">
                                @lang('Status : ')
                            </div>

                            <div>
                                @if($withdraw->status == 2)

                                    <span class="badge badge-danger">@lang('Pending')</span>

                                @endif

                                @if($withdraw->status == 1)

                                    <span class="badge badge-danger">@lang('Success')</span>

                                @endif


                                @if($withdraw->status == 3)

                                    <span class="badge badge-danger">@lang('Cancle')</span>

                                @endif
                            </div>
                        </div>



                        <div class="d-flex justify-content-between">
                            <div class="">
                                @lang('Withdraw Method : ')
                            </div>

                            <div>
                                {{$withdraw->method->name}}
                            </div>
                        </div>


                        <div class="d-flex justify-content-between">
                            <div class="">
                                @lang('Withdraw Currency : ')
                            </div>

                            <div>
                                {{$withdraw->method->cur_sym}}
                            </div>
                        </div>




                        <div class="d-flex justify-content-between">
                            <div class="">
                                @lang('Withdraw Amount : ')
                            </div>

                            <div>
                                {{getAmount($withdraw->get_amount)}} {{$withdraw->get_currency}}
                            </div>
                        </div>

                         <div class="d-flex justify-content-between">
                            <div class="">
                                @lang('Rate : ')
                            </div>

                            <div>
                                1 {{$withdraw->method->cur_sym .' = '}} {{getAmount($withdraw->rate)}} {{$withdraw->get_currency}}
                            </div>
                        </div>


                        <div class="d-flex justify-content-between">
                            <div class="">
                                @lang('Get Amount : ')
                            </div>

                            <div>
                                {{getAmount($withdraw->send_amount)}} {{$withdraw->send_currency}}
                            </div>
                        </div>


                         <div class="d-flex justify-content-between">
                            <div class="">
                                @lang('Charge : ')
                            </div>

                            <div>
                                {{getAmount($withdraw->charge)}} {{$withdraw->send_currency}}
                            </div>
                        </div>

                         <div class="d-flex justify-content-between">
                            <div class="">
                                @lang('Total Amount : ')
                            </div>

                            <div>
                                {{getAmount($withdraw->final_amount)}} {{$withdraw->send_currency}}
                            </div>
                        </div>

                        



                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .justify-content-between{
            border-bottom: 1px dashed #524f4f;
            padding: 15px 0px; 
        }

        .justify-content-between:last-child{
            border-bottom: none;
        }
       


        .list-group-item {
            position: relative;
            display: block;
            padding: .75rem 1.25rem;
            background-color: #13114a;
            border: 1px solid rgba(0, 0, 0, .125);
        }

    </style>
@endpush

