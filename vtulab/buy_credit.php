<?php 
session_start();
require('db.php'); 
include('inc/func.php');
include('inc/gravatar.php');
include('inc/logo.php');
include('inc/coinpayments.inc.php');
include('inc/query_processor.php');

?> 

<?php include('inc/header.php');?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
     
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
         <?php include('inc/nav.php');?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                     
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><li class="fas fa-fw fa-money-bill-alt"></li> Credit Wallet </h2>
                        
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row"></div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    
                                    <?php
                                    
                                   
							
							if(isset($_GET['ref'])){
								       echo'<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Transaction successful</strong>  
									</div>'; 
									
									echo '<script>
									setTimeout(function(){ window.location.href="dashboard.php" }, 3000);</script>';
									      
								        }
								        
					$servName = $_SERVER['HTTP_HOST'];
									
									if(isset($_POST['topup'])){
										
										$username = $_SESSION['user'];
										
										$amount = $_POST['amt'];
										$meth = $_POST['method'];
										
										if(!empty($amount) && !empty($meth) ){
											
											$dat = date("d/m/Y");
											$uid = substr(str_shuffle("0123456789678901"), 0, 16);
											$token = uniqid();
											$stat = "Pending";
											$description = "Wallet Credit";
											$channel = '';
										// replace comma
		$str1 = $amount;
        $xamount = str_replace( ',', '', $str1);	
											
											
	$qsel = "INSERT INTO transactions (network,channel,amount,charge,ref,status,email,del,refer,token,customer,credit) VALUES('$description','$channel','$xamount','$xamount','$uid','$stat','$username','Delete','$token','$token','$fname $lname','Credit')";	
$sav = $conn->query($qsel);
								
							$request_dir = $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);	
								$dola = $xamount/365;
											
if($meth === 'card'){
    
    	$_SESSION['ref'] = $uid;
    	
    	$comm = (1.5 / 100 )* $xamount;
    	
    	$Payable = $xamount + $comm;

// payprocessor
 if($apib['activepay'] == 'paystack'){
include('inc/paystack.php');
 }else{
	 
include('inc/flutterwave.php');	 
	 }
					
}
if($meth ==='cash'){ 

echo '<div class="card-body border-top">
                                            
                                            <div class="alert alert-primary" role="alert">
                                                <h4 class="alert-heading">PAYMENT DETAILS</h4>
                                                To fund your wallet,
                                                <p>Kindly pay &#x20A6;'.$xamount.' into our bank account below through bank deposit/transfer, online transfer, mobile app transfer etc.</p>
                                                <hr>
                                                <p class="mb-0"><strong>Account Name:</strong> '.$bank['AccName'].' <br>
                                                
                                            <strong>Account Number:</strong> '.$bank['AccNo'].' <br>    
                                               
                                               <strong>Bank Name:</strong> '.$bank['BankName'].' <br> 
                                                </p>
                                                <hr>
                                                <p class="mb-0">After payment is made, send depositor name, amount paid, your  account email to '.$settings['mobile'].' or support@'.$servName.'. <br>
                                                Your wallet will be credited once payment is confirmed. Thank you!
                                            </p>
                                            </div>
                                        </div>';  }	
                                        
                                
                                 if($meth === 'bitcoin'){
                                    
                                    $cps = new CoinPaymentsAPI();
	$cps->Setup(''.$coinsec.'', ''.$coinpub.'');

	$req = array(
		'amount' => $dola,
		'currency1' => 'USD',
		'currency2' => 'BTC',
		'buyer_email' => $email,
		'item_name' => 'Wallet funding',
		'address' => '', // leave blank send to follow your settings on the Coin Settings page
		'ipn_url' => 'https://'.$request_dir.'/buy_credit.php?ref='.$meth.' ',
	);
	// See https://www.coinpayments.net/apidoc-create-transaction for all of the available fields
			
	$result = $cps->CreateTransaction($req);
	if ($result['error'] == 'ok') {
		
		?>
		
		<script>
		
	 window.location="<?php echo' '.$result['result']['status_url'].$le ?>";
	 
	 </script>
	 <?php
		
	} else {
		print 'Error: '.$result['error']."\n";
	}
                                    
                                    
                                }        
                                        
								
                                }	
                                
                       
                                else{
										echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Enter amount</strong>  
									</div>'; }
									}
									
									 ?>
                                    
                                   
                                    <div class="card-body">
                                    
                                        <form method="post" action="">
                                           
                                      <h5>Enter Amount</h5>
                                  <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">&#x20A6;</span></div>
                                                <input type="text" class="form-control"onKeyUp="javascript:this.value=Comma(this.value);" name="amt" >
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                        
                                        <h5>How do you want to pay?</h5>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" checked name="method"  class="custom-control-input" value="card" onclick="javascript:yesnoCheck();" id="yescard"><span class="custom-control-label">ATM Card</span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" class="custom-control-input"value="cash" onclick="javascript:yesnoCheck();" id="yescash" ><span class="custom-control-label" >Cash Deposit/Transfer</span>
                                            </label>
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" class="custom-control-input"value="bitcoin" onclick="javascript:yesnoCheck();" id="yesbitcoin"><span class="custom-control-label" >Bitcoin</span>
                                            </label>
                                            
                                          
                                         
                                     <div class="col-sm-6 pl-0">
                                         
                                        
                                             
                                                <p class="text-center">
                                                    <button type="submit" name="topup" class="btn btn-space btn-info">Proceed</button>
                                                    
                                                
                                                   
                                                </p>
                                                
                                                <p align="center">
                                                    
                                                    <img src="assets/images/paystack-secured.png" class="responsive">
                                                    
                                                     </p>
                                               
                                            </div>       
                                        </form>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
<script>
							 
							 function Comma(Num)
 {
       Num += '';
       Num = Num.replace(/,/g, '');

       x = Num.split('.');
       x1 = x[0];

       x2 = x.length > 1 ? '.' + x[1] : '';

       
         var rgx = /(\d)((\d{3}?)+)$/;

       while (rgx.test(x1))

       x1 = x1.replace(rgx, '$1' + ',' + '$2');
     
       return x1 + x2;       
        
 }
 
 
 
 function yesnoCheck() {
    if (document.getElementById('yescard').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    
     if (document.getElementById('yescash').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    
     if (document.getElementById('yesbitcoin').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    
    

}



                            </script> 
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Account Status</h5>
                                    <div class="card-body">
                                   <div class="d-inline-block">
                                        <h5 class="text-muted">Current Balance</h5>
                                        <h2 class="mb-0"> &#x20A6;<?php echo number_format($bal,2,'.',',');?></h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                        <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
                                    </div>
                                   
                                    </div>
                                </div>
                                
                                <div class="card">
                                <div class="card-body">
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Affiliate Link:</h5>
                                        <p class="mb-0"> <?php echo $data['reflink'];echo $data['refid'];?></p>
                                        
                                    </div>
                                    <div class="float-left"><p class="text-muted"><strong>Total Referred:</strong> <?php echo $data['refcount']; ?> <br> 
                                    
                                   <strong> Earning:</strong> &#x20A6;<?php echo number_format($data['refwallet'],2,'.',','); ?>
                                    </p> </div>
                                    
                                    
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        
                                        <i class="fa fa-users fa-fw fa-sm text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Transaction History</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Transaction ID</th>
                                                
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
										
										while($row = $resu->fetch_assoc())
											
											{
										
											?>
                                            <tr>
                                           
                                                <td><?php echo $row['orderno']; ?></td>
                                                
                                                <td><?php echo '&#x20A6;'.$row['amount'].' ';?></td>
                                                 <td><?php echo $row['status'];?></td>
                                                <td><?php echo $row['date'];?></td>
                                                
                                            </tr>
                                           
                                           <?php } ?>
                                          
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Transaction ID</th>
                                                
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>      
                          
                            <!-- ============================================================== -->
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
              				                        <!-- product category  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end product category  -->
                          
  	<script type="text/javascript">
		//datepicker plugin
		//link	
		$('#sendWithPhoneBook').click(function(e){
		    $('#pb_groups').css('display','block');
		    e.preventDefault();
		});

		$("input[type=checkbox].grp_select").change( function() {
		    if($(this).is(":checked")){
		    	var bin = chkK();
		    		$("#grp_select_check").html('+'+bin+' Selected Phonebook Group Recepient(s)');	       	
			}else{
				var bin = chkK();
				if (bin > 0) {
					$("#grp_select_check").html('+'+bin+' Selected Phonebook Group Recepient(s)');
				}else{
					$("#grp_select_check").html('');
				}
			}
	  	});

		function countDest(){
			destcount = jQuery("#recipient").val();
			destcount = destcount.split(' ').join(',').split("\n").join(',').split(',,').join(',');
			// console.log(countUnit());
			destcount = destcount.split(',').length;
			if(destcount < 2) jQuery("#destcount").html(destcount+" recipient typed");
			else jQuery("#destcount").html(destcount+" recipients typed");
			$('#hiddenCount').html(destcount);
			// return destcount;
		}

		function chkK() {
			var val = [];
			$(':checkbox:checked').each(function(i){
	          val[i] = $(this).val();
	        });
	        return (val.length);
		}



		function countMsgsText(val){

			val = val.split("\n").join('??').split('{').join('??').split('}').join('??');

			val = val.split('\\').join('??').split('[').join('??').split(']').join('??');

			val = val.split('~').join('??').split('|').join('??').split('^').join('??');

			val = val.split('€').join('??').split('"').join('??').split("'").join('??');

			len = val.length;

			if(len<=160){

				jQuery('#paget').html('Page: '+Math.ceil(len/160));
				jQuery('#count').html(', Characters left: ' + (1+((160 - 1) * Math.ceil(len/160))-len) + ', Total Typed Characters: '+len);

				jQuery('#hiddenCount').html(Math.ceil(len/160)+' page');

			} else {
				jQuery('#paget').html('Page: '+Math.ceil(len/151));
				jQuery('#count').html(', Characters left: ' + (1+((151 - 1) * Math.ceil(len/151))-len) + ', Total Typed Characters: '+len);	

				jQuery('#hiddenCount').html(Math.ceil(len/151)+' pages');

			}

			countDest();

		}

		
		$('#recipient').keyup(function(){
			if (this.value.length > 0) {
				$('#destcount').css('display','block');
				countDest();
			}else{
				$('#destcount').css('display','none');
			}
		});
		
		function showUsage(messagesCount) {
			var x = jQuery('#paget').html()+", "+jQuery('#destcount').html()+"\nSend Message? Duplicate Numbers will be removed";
			return confirm(x);
		}
		function showUsageFree(messagesCount) {
			var x = jQuery('#paget').html()+", "+jQuery('#destcount').html()+"\nSend Message. You are using Free SMS Units and it ll contain an Advert?";
			return confirm(x);
		}
		$('#myForm input').on('change', function() {
		   var oname = ($('input[name="mode"]:checked', '#myForm').val()); 
		   // alert(oname);
		   if (oname =='sms') {
		   		$('#emailbox').css("display","none");
		   		$('#smsbox').css("display","block");
		   }else if(oname =='email'){
		   		$('#smsbox').css("display","none");
		   		$('#emailbox').css("display","block");
		   }
		});
		$('#form-field-select-1').on('change',function () {
			var selectVal = $('#form-field-select-1').val();
			if (selectVal == '4') {
				$('#date-range').css("display","none");
				$('#wallet-range').css("display","block");
			}else{
				$('#date-range').css("display","block");
				$('#wallet-range').css("display","none");
			}
		});
		</script>
		<script type="text/javascript">
	$(function() {
	    var scntDiv = $('#more-xtra');
	    var i = $('#more-xtra div').length + 1;
	    $('#addScnt').on('click', function() {
	    	// alert('ooooo');
	    	console.log(i);
	    	$('#addScnt').html('Add More Date');
	        $('<div id="extr" class="form-group"><label class="col-md-4 control-label">Schedule Date</label><div class="col-md-8"><div class="input-group"><input type="datetime-local" value="2019-11-05T18:18" id="example-input2-group1" name="schedule_date[]" class="form-control" placeholder="Email"><span  id="remScnt"class="input-group-addon"><i class="fa fa-minus"></i></span></div></div></div>').appendTo(scntDiv);
	        i++;
	        return false;
	    });
	    
	    $('#more-xtra').on('click','#remScnt' ,function(e) { 
	    	// alert(i);
	        // if( i > 2 ) {
	        	$('#more-xtra #extr:last').remove();
	            i--;

	        // }
	        e.preventDefault();
	        return false;
	    });
	});

	</script>
                                   <!-- product sales  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end product sales  -->
                            <!-- ============================================================== -->
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- sales  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end sales  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- new customer  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end new customer  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- visitor  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end visitor  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- total revenue  -->
                            <!-- ============================================================== -->
  
                            
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- category revenue  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->
                        </div>
                        <div class="row">
                          <!-- ============================================================== -->
                            <!-- end sales traffice source  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- sales traffic country source  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end sales traffice country source  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include('inc/footer.php');?>