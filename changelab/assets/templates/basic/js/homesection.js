$(function() {
            'use strict'
            $('#send').on('change', function() {

                $('.currency-rate .sell_field').empty();
                $('#min_max').empty();
                
                var min_max = $(this).find(':selected').data(
                    'min_max');

                var previous = $('#receive').find(':selected').data(
                        'min_max');
                
                 $('#send_val').css({
                            'border':'1px solid green',
                });

                var send_val = $('#send_val').val();

                

                var currentValue = $(this).val();

                $('#receive').find('option').each(function(index){
                    $('#receive').find('option').eq(index).show();
                    if($(this).val() == currentValue){
                        $('#receive').find('option').eq(index).hide();
                    }
                });

                $('.receiveData .list').find('li').each(function(index){
                    $('.receiveData .list li').eq(index).show();
                    if($(this).data('value') == currentValue){
                        $('.receiveData .list li').eq(index).hide();


                        if($('.receiveData .list li').eq(index).hasClass('selected')){
                            $('.receiveData .list li').eq(index).removeClass('selected');
                           
                            $('.receiveData .current').text($('.receiveData .list li').eq(0).text())
                            $('#receive').find('option').eq(0).attr('selected',true);
                        };
                    }

                    
                });

                if(send_val == ''){
                    return false;
                }

                $('.exchange-buy').removeClass('d-none');
                

                $('.exchange-buy .min-amount').text(min_max.cur_sym + " " + (min_max.min_exchange));

                $('.exchange-buy .max-amount').text(min_max.cur_sym + " " + (min_max.max_exchange));

              
                
                if(parseFloat(send_val) < parseFloat(min_max.min_exchange)){
                    $('#receive_val').val(0);

                    if(parseFloat(send_val) < parseFloat(min_max.min_exchange)){
                  
                        $('#send_val').css({
                            'border':'1px solid red',
                        });
                    }
                    return false;
                }
                    

                if ($('#receive_val').val() > 0) {
                    var prev = $('#receive').find(':selected').data(
                        'min_max');

                    var percent = (parseFloat(send_val) * min_max.percent_charge) / 100;
                    var totalCharge = percent + parseFlot(min_max.fixed_charge);
                    var getAmount = parseFloat(send_val) - totalCharge;

                   
                    var sendVal = getAmount * min_max.buy_at;
                    var getAmountIn = parseFloat(sendVal) / prev.sell_at;
                    $('#receive_val').val(getAmountIn.toFixed(4));

                    
                }

                if(previous != null){
                    var percent = (parseFloat(send_val) * min_max.percent_charge) / 100;
                    var totalCharge = percent + parseFloat(min_max.fixed_charge);
                    var getAmount = parseFloat(send_val) - totalCharge;
                        
                    var sendVal = getAmount * min_max.buy_at;
                    
                    var getAmountIn = parseFloat(sendVal) / previous.sell_at;
                    $('#receive_val').val(getAmountIn.toFixed(4));
                }
                

            });

            $('#receive').on('change', function() {
                
                var send_val = $('#send_val').val();

               if(send_val == ''){
                   return false;
               }

                var data = $('#send').find(':selected').data('min_max');
                   
                var current = $(this).find(':selected').data('min_max');
                $('.reserve-section').removeClass('d-none');
                $('.reserve .amount').text(current.cur_sym + " " + current.reserve);
                var exchange_text = `1 ${data.cur_sym} = ${(data.buy_at / current.sell_at).toFixed(4)} ${current.cur_sym}`;
                $('.conversion').text(exchange_text);

                // Calculation for Exchange currency with charge
                var percent = (parseFloat(send_val) * data.percent_charge) / 100;
                
                var totalCharge = percent + parseFloat(data.fixed_charge);
                var getAmount = parseFloat(send_val) - totalCharge;

                var sendVal = getAmount * data.buy_at;
                var getAmountIn = sendVal / current.sell_at;
                if(parseFloat(getAmountIn) < 0){
                    $('#receive_val').val(0);
                    return false;
                }
                $('.user_input_for_sell .account-form').empty();            

                if (send_val <= 0) {
                    return 0;
                }

                $('#receive_val').val(getAmountIn.toFixed(4));


            })

            $('#send_val').on('keyup paste', function() {
                var val = $(this).val();
                var data_key = $('#send').find(':selected').data(
                    'min_max');
                if(data_key == undefined){
                    return false;
                }
                
               
                var current = $('#receive').find(':selected').data(
                    'min_max');
                
                $(this).css({
                        'border':'1px solid green',
                });
                

                if(parseFloat(val) == parseFloat(data_key.min_exchange)){
                    
                    $(this).css({
                        'border':'1px solid green',
                    });
                }
                
                if(parseFloat(val) < parseFloat(data_key.min_exchange)){
                  
                     $(this).css({
                        'border':'1px solid red',
                    });
                }

                if(parseFloat(val) > parseFloat(data_key.max_exchange)){
                    $(this).css({
                        'border':'1px solid red',
                    });
                    
                }

                // Calculation for Exchange currency with charge
                if(current != null){
                    var percent = (parseFloat(val) * data_key.percent_charge) / 100;
                    var totalCharge = percent + parseFloat(data_key.fixed_charge);
                    var getAmount = parseFloat(val) - totalCharge;

                    var sendVal = getAmount * data_key.buy_at;
                    var getAmountIn = sendVal / current.sell_at;

                    if (getAmountIn < 0) {
                        $('#receive_val').val(0);
                        return false;
                    }
                     $('#receive_val').val(getAmountIn.toFixed(4));
                }


            })
        });