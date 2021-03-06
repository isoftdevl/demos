@extends('admin.layouts.app')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="payment-method-item">
                            <div class="payment-method-header d-flex flex-wrap">
                                <div class="thumb">
                                    <div class="avatar-preview">
                                        <div class="profilePicPreview" style="background-image: url('{{getImage(imagePath()['gateway']['path'],'800x800')}}')"></div>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type="file" name="image" class="profilePicUpload" id="image" accept=".png, .jpg, .jpeg" />
                                        <label for="image" class="bg-primary"><i class="la la-pencil"></i></label>
                                    </div>
                                </div>

                                <div class="content">
                                    <div class="row mt-4 mb-none-15">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">
                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Currency Name') <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control " placeholder="@lang('Method Name')" name="name" value="{{ old('name') }}" id="currency" required autocomplete="off"/>
                                                
                                            </div>
                                        </div>

                                        

                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="input-group">
                                                <label class="w-100 font-weight-bold">@lang('Currency') <span class="text-danger">*</span></label>
                                                <input type="text" name="currency" class="form-control border-radius-5" value="{{ old('currency') }}" placeholder="@lang('Currency')" required/>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Reserve') <span class="text-danger">*</span></label>
                                                    
                                                    <input type="text" class="form-control" name="reserve" placeholder="0" value="{{ old('reserve') }}" required/>

                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <span class="currency_symbol"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                       

                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="form-group">
                                                <label class="form-control-label font-weight-bold">@lang('Available For sell') </label>
                                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                                    data-toggle="toggle" data-on="Active" data-off="Off" data-width="100%"
                                                    name="available_for_sell">
                                            </div>
                                            
                                        </div>

                                         <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="form-group ">
                                                <label class="form-control-label font-weight-bold">@lang('Available For buy') </label>
                                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                                    data-toggle="toggle" data-on="Active" data-off="Off" data-width="100%"
                                                    name="available_for_buy">
                                            </div>
                                            
                                        </div>


                                         <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="form-group ">
                                                <label class="form-control-label font-weight-bold">@lang('Rate Show') </label>
                                                <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                                    data-toggle="toggle" data-on="Active" data-off="Off" data-width="100%"
                                                    name="rate_show">
                                            </div>
                                            
                                        </div>


                                        

                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="form-group ">
                                                <label class="form-control-label font-weight-bold">@lang('Payment Type For Buy') </label>
                                                <select name="payment_type_buy" id="" class="form-control" required>
                                                    <option value="0">@lang('Manual')</option>
                                                    @foreach($gateways as $gate)
                                                      
                                                        <option value="{{$gate->id}}">{{$gate->name}}</option>
                                                        
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>


                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Buy At') <span class="text-danger">*</span></label>
                                                    
                                                    <input type="text" class="form-control" name="buy_at" placeholder="0" value="{{ old('buy_at') }}" required/>

                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">{{ trans($general->cur_text) }}</div>
                                                    </div>
                                                </div>
                                            
                                        </div>


                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-15">

                                            <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Sell At') <span class="text-danger">*</span></label>
                                                    
                                                    <input type="text" class="form-control" name="sell_at" placeholder="0" value="{{ old('sell_at') }}" required/>

                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">{{ trans($general->cur_text) }}</div>
                                                    </div>
                                                </div>
                                            
                                        </div>


                                        

                                    </div>
                                </div>
                            </div>
                            <div class="payment-method-body">
                                <div class="row">

                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card border--primary mt-3">
                                            <h5 class="card-header bg--primary">@lang('Range')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Minimum Amount') <span class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><span class="currency_symbol"></span></div>
                                                    </div>
                                                    <input type="text" class="form-control" name="min_limit" placeholder="0" value="{{ old('min_limit') }}" required/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Maximum Amount') <span class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><span class="currency_symbol"></div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0" name="max_limit" value="{{ old('max_limit') }}" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="card border--primary mt-3">
                                            <h5 class="card-header bg--primary">@lang('Charge')</h5>
                                            <div class="card-body">
                                                <div class="input-group mb-3">
                                                    <label class="w-100 font-weight-bold">@lang('Fixed Charge') <span class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><span class="currency_symbol"></div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0" name="fixed_charge" value="{{ old('fixed_charge') }}" required/>
                                                </div>
                                                <div class="input-group">
                                                    <label class="w-100 font-weight-bold">@lang('Percent Charge') <span class="text-danger">*</span></label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">%</div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="0" name="percent_charge" value="{{ old('percent_charge') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card border--dark mt-3">

                                            <h5 class="card-header bg--dark">@lang('Receiving Details (Where user can transaction)')</h5>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="w-100 font-weight-bold">@lang('Receving Details') <span class="text-danger">*</span></label>
                                                    <textarea rows="8" class="form-control border-radius-5 nicEdit" name="instruction">{{ old('instruction') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="card border--dark mt-3">
                                            <h5 class="card-header bg--dark  text-white">@lang('sending Details (example: wallet / email)')
                                                <button type="button" class="btn btn-sm btn-outline-light float-right addUserData"><i class="la la-fw la-plus"></i>@lang('Add New')
                                                </button>
                                            </h5>

                                            <div class="card-body">
                                                <div class="row addedField">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="card border--dark mt-3">
                                            <h5 class="card-header bg--dark  text-white">@lang('User Transaction Proof')
                                                <button type="button" class="btn btn-sm btn-outline-light float-right addUserProof"><i class="la la-fw la-plus"></i>@lang('Add New')
                                                </button>
                                            </h5>

                                            <div class="card-body">
                                                <div class="row addedProfField">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary btn-block">@lang('Save Currency')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('admin.currency') }}" class="btn btn-sm btn--primary box--shadow1 text--small"><i class="la la-fw la-backward"></i> @lang('Go Back') </a>
@endpush

@push('script')
    <script>

        $(function () {
            "use strict";

        $('#currency').on('click',function(){
            $('.list-group').removeClass('d-none').addClass('d-block');
            
        });

        $('#currency').on('keyup',function(){
            $('.list-group').addClass('d-none').removeClass('d-block');
            $('#method_code').val('');
        });

        $('.list-group li').each(function(key,item){
            $(this).on('click',function(){
                var itemText = $('.list-group li').eq(key).text();
                $('#currency').val(itemText);
                $('.list-group').addClass('d-none').removeClass('d-block');
                var code = $(this).data('value');

                $.ajax({
                    url:"{{route('admin.currency.ajax')}}",
                    method:"GET",
                    data:{method_code:code},
                    success:function(response){
                        $('#method_code').val(response.method_code);
                    }

                })

            })
        });



        $('input[name=currency]').on('input', function () {
            var uppercase = $(this).val().toUpperCase();
            $(this).val(uppercase);
            $('.currency_symbol').text($(this).val());
        });

        
        var i = 0;
        $('.addUserData').on('click', function () {
            var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <input name="user_data[${i}][field_name]" class="form-control" type="text" value="" required placeholder="@lang('Field Name')" >
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="user_data[${i}][type]" class="form-control">
                                    <option value="text" > @lang('Text') </option>
                                    <option value="email" > @lang('Email') </option>
                                   
                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="user_data[${i}][validation]"
                                        class="form-control">
                                    <option value="required"> @lang('Required') </option>
                                    <option value="nullable">  @lang('Optional') </option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2 text-right">
                                <span class="input-group-btn">
                                    <button class="btn btn--danger btn-lg removeBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;
            $('.addedField').append(html);
            i++;
        });

        var j= 0
        $('.addUserProof').on('click',function(){
           var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <input name="user_proof[${j}][field_name]" class="form-control" type="text" value="" required placeholder="@lang('Field Name')" >
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="user_proof[${j}][type]" class="form-control">
                                    <option value="text" > @lang('Text') </option>
                                    <option value="textarea" > @lang('Textarea') </option>
                                    <option value="file"> @lang('File upload') </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="user_proof[${j}][validation]"
                                        class="form-control">
                                    <option value="required"> @lang('Required') </option>
                                    <option value="nullable">  @lang('Optional') </option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2 text-right">
                                <span class="input-group-btn">
                                    <button class="btn btn--danger btn-lg removeBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;
            $('.addedProfField').append(html);
            j++;
        })

        $(document).on('click', '.removeBtn', function () {
            $(this).closest('.user-data').remove();
        });

        @if(old('currency'))
        $('input[name=currency]').trigger('input');
        @endif

        });
    </script>
@endpush

@push('style')
    <style>
        #currency{
            width: 100%;
            margin-bottom: 0;
        }

        .input-group{
            position: relative;
        }

        .d-block{
            width: 100%;
            position: absolute;
            top: 64px;
            z-index: 1;

        }
    
        .currency_symbol{
            margin-left: 3px;
            margin-right: 3px;
        }

        .payment-method-item .payment-method-header .thumb .avatar-edit {
            bottom: 30px;
        }
    
    </style>    
@endpush
