<?php 
session_start();
require('../../db.php'); 
include('../../inc/func.php');
include('../../inc/gravatar.php');
include('../../inc/logo.php');
include('../../inc/coinpayments.inc.php');
include('../../inc/query_processor.php');
?> 
<?php include('../../inc/header2.php');?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
   
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include('../../inc/nav3.php'); ?>
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
                                          
                                    <h5 class="card-header"></h5>
                                    <div class="card-body">
                                    <?php
							
							if(isset($_GET['ref'])){
								       echo'<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Transaction successful</strong>  
									</div>'; 
									
									echo '<script>
									setTimeout(function(){ window.location.href="../../dashboard.php" }, 3000);</script>';
									      
								        }
								        
										$username = $_SESSION['user'];
										$amount = $_SESSION['amt'];
										$service = $_SESSION['service'];
										$phone = $_SESSION['phone'];
										$requestId = $_SESSION['transid'];
										$lname = $_SESSION['lname'];
										$fname = $_SESSION['fname'];
										
										
										
								$txtadmin = "08084121526";		
										// replace comma
						$str1 = $amount;
						$xamount = str_replace( ',', '', $str1);
						
						$customer = '<tr>
                            <td width="30%">Last Name</td>
                            <td id="mainService"> '.$lname.'  </td>
                        </tr>';
						
							
						
										
									if(isset($_POST['pay'])){
										
										$uid = rand(784755,99893);	
											
										if($xamount <= $bal){	
											$dat = date("d/m/Y");
											
											$token = uniqid();
											$stat = "pending";
											
			$ret = "SELECT * FROM transactions WHERE ref='$requestId' ";
		$resut = $conn->query($ret);
		$da = $resut->fetch_row();
		$tref = $da[7];
		
		if($da[11] === $da[12]){								
											

											
											
					$qsel = "UPDATE transactions SET status='Completed',token='0',refer='N/A',channel='Wallet' WHERE ref='$tref' ";	
			$sav = $conn->query($qsel);
			
			$debit = "UPDATE users SET bal=bal-$xamount WHERE email='$user'";
			$doDebit = $conn->query($debit);
								
			
			echo'<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Transaction Successful</strong>  
									</div>'; 
									
					} else{echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Error Occur: Please contact support@epins.com.ng</strong>  
									</div>';  }										
 
										}
                                   else{echo'<div class="alert alert-warning">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>[ Insufficient Balance ]</strong>, please pay with ATM card or <a href="../../buy_credit.php">Click here to credit wallet </a> 
									</div>';  }    
                                        
								
                                }	
                                
                       
					   if(isset($_POST['cardpay'])){
						   
						  //paystack

$curl = curl_init();

$email = $username;
$amount = "$xamount"."00";  //the amount in kobo. This value is actually NGN 300
$callback_url = "https://epins.com.ng/ap/paytvcallback.php";
$subaccount = "ACCT_gozv2jyi1ihjczc";
$bearer = "subaccount";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'email'=>$email,
	'subaccount'=>$subaccount,
	'bearer'=>$bearer,
    'callback_url' => $callback_url,
  ]),
  CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_live_3fef1bd27792b18c16219a2de30019602eca10ce", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx->status){
  // there was an error from the API
  
}

$_SESSION['transid'] = $requestId;
// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
//header('Location: ' . $tranx['data']['authorization_url']);

echo '<script> 
window.location=" '.$tranx['data']['authorization_url'].' "; </script>';
					
} 
						 
									 ?>
                       
                                        <form method="post" action="" >
                                        
                                   <h2 class='margin-tp-10'>Please Confirm your Transaction Details:</h2>     
                                      
                                        
                              <table class="table  margin-tp-10" id="transTable">
                     
                                                                        <tr>
                            <td width="30%">Product</td>
                            <td id="mainService"><?php echo $service;?>  </td>
                        </tr>
                        
                        <tr>
                            <td width="30%">First Name</td>
                            <td id="mainService"><?php echo $fname;?>  </td>
                        </tr>
                        
                         <?php echo $customer; ?>
                                                <tr>
                            <td width="30%">Phone</td>
                            <td><?php echo $_SESSION['phone'];?></td>
                        </tr>                   
                                                            <tr>
                        <td width="30%">Amount</td>
                        <td>₦ <?php echo number_format($_SESSION['amt'],2,'.',',');?> +  ₦ 0.00 <i class="conv_fee">
                            
                                                                (Convenience Fee)
                                                        
                        </i></td>
                    </tr>
                                          
                    <tr>
                        <td width="30%">Total Payable Amount</td>
                        <td>₦ <d id="total_amount"><?php echo number_format($_SESSION['amt'],2,'.',',');?></d></td>
                    </tr>                                       
                    <tr>
                        <td width="30%"><stro>Transaction ID</h4></td>
                        <td id="transactionId"><?php echo $_SESSION['transid'];?></td>
                    </tr>                    
                    <tr>
                        <td width="30%">Status</td>
                        <td>initiated</td>
                    </tr>       
                    
                    <tr>
                        <td width="30%">Time Left to Complete Transaction</td>
                        <td><?php echo '<strong id="timing">' ?></td>
                    </tr>             
                                            <tr>
                            <td colspan="2">
                                                                                            <div style="margin-top: 20px;"><strong>Choose Payment Method:</strong></div>
                                <div class="pay-button">
                                                                                                                                                                                                                                
                                </div>
                              							               </td>
                        </tr>
                                    </table>              
                                         
                                        
                                     <div class="col-sm-6 pl-0">
                                         
                                                <p class="text-center">
                                                    <button type="submit" name="pay" class="btn btn-rounded btn-primary"><i class="fas fa-fw fa-money-bill-alt"></i> Pay With Wallet</button>
    <button type="submit" name="cardpay" class="cardpay"></button>                  
                                                
                       
                                                </p>
                                                
                                                <p align="center">
                                                    
                                                
                                                     </p>
                                               
                                            </div>       
                                        </form>
                                        
                                  <script>
                           
						   function show9mobile() {
  var sourceOfPicture = "assets/images/9mobile.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
} 
                   
function showMTN() {
  var sourceOfPicture = "assets/images/mtn.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
} 

function showAirtel() {
  var sourceOfPicture = "assets/images/airtel.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
} 

function showGlo() {
  var sourceOfPicture = "assets/images/glo.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
} 
                    
                                  </script>
                                        
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
                            
                             <script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 0));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 1)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 30)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("timing").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
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
                            <h5 class="card-header">Recent Transactions</h5>
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
							$sql_trans = "SELECT * FROM transactions WHERE email='$user' ORDER BY `serial` DESC LIMIT 3 ";
									
$Show_trans = $conn->query($sql_trans);
										
										while($trow = $Show_trans->fetch_assoc())
											
											{
										
											?>
                                            <tr>
                                           
                                                <td><?php echo $trow['ref']; ?></td>
                                                
                                                <td><?php echo '&#x20A6;'.$trow['amount'].' ';?></td>
                                                 <td><?php echo $trow['status'];?></td>
                                                <td><?php echo $trow['date'];?></td>
                                                
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
           <?php include('../../inc/footer1.php');?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../../assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../../assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../../assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../../assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>