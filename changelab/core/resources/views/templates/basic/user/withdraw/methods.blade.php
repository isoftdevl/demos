@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center mt-2">


            <div class="col-md-8">
                <div class="card w-100 section-bg">
                    <div class="card-header">
                        <h5 class="m-0 title text-white text-center">@lang('Withdraw Balance')</h5>
                    </div>

                    <div class="card-body">
                        <form action="" method="POST" id="formResubmit">
                            @csrf
                            <div class="form-group">
                                <label for="currency">@lang('Select Method for Withdraw')</label>
                                <select name="currency" id="currency" class="form-control" required>
                                    <option value="">@lang('Select Withdraw Method')</option>
                                    @foreach ($currencys as $currency)

                                        <option value="{{ $currency->id }}"
                                            data-url="{{ route('user.withdraw.ajax', $currency->id) }}">
                                            {{ $currency->name }}
                                        </option>

                                    @endforeach
                                </select>

                                <div class="d-flex justify-content-between mt-3 d-none min_max">
                                    <div class="min"></div>
                                    <div class="max"></div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                            <label for="" class="w-100">@lang('Send Amount')</label>
                                             <input type="text" name="send" class="form-control" placeholder="@lang('Enter Amount')" id="send" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon">{{$general->cur_sym}}</span>
                                            </div>
                                        </div>
                                   
                                    </div>

                                <div class="col">
                                      <div class="input-group mb-3">
                                            <label for="" class="w-100">@lang('Get Amount')</label>
                                             <input type="text" name="get_amount" class="form-control" placeholder="@lang('Enter Amount')" id="getAmount" required readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"></span>
                                            </div>
                                        </div>
                                  
                                </div>
                            </div>

                            <div class="user_input">

                            </div>


                            <div class="form-group m-0">
                                <input type="submit" value="Withdraw Balance" id="submitForm">
                            </div>






                        </form>
                    </div>


                </div>
            </div>


        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalConfirm">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">@lang('Withdraw Balance')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-danger p-3">@lang('Are you sure all information is correct')?</p>
          </div>
          <div class="modal-footer d-flex">
              <div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
              </div>

              <div>
                <button type="button" class="btn btn-primary confirmed">@lang('Withdraw')</button>
              </div>
            
            
          </div>
        </div>
      </div>
    </div>


@endsection
@push('script')
    <script>
            "use strict"
        $(document).ready(function() {
            
            $('#currency').on('change', function() {
                $('.user_input').empty();
                $('.min_max').removeClass('d-none');

                $('input[name=send]').val('');
                $('input[name=get_amount]').val('');

                var value = $(this).val();
                if(value == ''){
                    $('.min_max').addClass('d-none');
                   
                   return 0;
                }
                var url = $(this).find('option:selected').data('url');
                $.ajax({
                    url: url,
                    method: "GET",
                    data: {
                        currency: value
                    },
                    success: function(response) {
                        
                        $('.min').text("Min Exchange: " + response.min +
                            " {{ $general->cur_sym }}");
                        $('.max').text("Max Exchange: " + response.max +
                            " {{ $general->cur_sym }}");
                        $('#basic-addon2').text(response.cur_sym)
                        var length = response.user_input.length;
                      
                            for (let index = 0; index < length; index++) {
                                $('.user_input').append(`
                                    
                                    <div class="form-group">
                                        <label for="">${response.user_input[index].field_name}</label>
                                        <input class="form-control" type="${response.user_input[index].type}" placeholder="${response.user_input[index].field_name}" name="wallet_info[${response.user_input[index].field_name.toLowerCase().replace(/\s/g,'_')}]" ${response.user_input[index].validation}>
                                    </div>
                                        
                                    
                                    `);

                            }
                       

                       

                    }
                })
            });


            $('#send').on('keyup paste',function() {
                
                var inputFieldValue = $(this).val();
                var optionValue = $('#currency').find('option:selected').val();

                $.ajax({
                    method:'GET',
                    url:"{{route('user.withdraw.ajax.amount')}}",
                    data:{inputValue:inputFieldValue, option:optionValue},
                    success:function(response){
                        if(response < 0){
                            $('#getAmount').val(0);
                            return 0;
                        }
                        var value = parseFloat(response).toFixed(2);
                        $('#getAmount').val(value);
                    }
                })


            });


            $('#submitForm').on('click',function(e){
                e.preventDefault();
                $('#modalConfirm').modal('show');
            });


            $('.confirmed').on('click',function(){
                $('#formResubmit').submit();
            })




        });

    </script>

@endpush
