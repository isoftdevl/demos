<?php 
session_start();
require('db.php'); 
include('inc/func.php');
include('inc/gravatar.php');
include('inc/logo.php');
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
                     <?php 
                                  
                         include('inc/func.php');
                         include('inc/coinpayments.inc.php');
                         
                       	
										 ?>
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                
                        
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
                                          
                                    <h5 class="card-header"></h5>
                                    <div class="card-body">
                              
<?php 

$qrysit = mysqli_query($conn,"SELECT * FROM settings");
$sit = mysqli_fetch_array($qrysit);
$sitename = $sit['sitename'];
$ad_email = $sit['email'];
$serName = $_SERVER['HTTP_HOST'];
	  		
if(isset($_POST['mgt'])){

$pnam = $_POST['depositor'];
 $plnam = $_POST['bank_name'];
 $amountpaid = $_POST['amount'];
 $tref = $_POST['ref'];

 if(!empty($pnam) && !empty($plnam) && !empty($amountpaid) && !empty($tref) ){

$updat = mysqli_query($conn,"INSERT INTO payalert(name,bank,amount,teller,status,action,email,del) VALUES('$pnam','$plnam','$amountpaid','$tref','Pending','Add Credit','$user','Delete');") or die(mysqli_error()); 


echo "<div class='alert alert-success'>Payment Notification submitted successfully</div>";

$from = "$sitename<support@$serName>"; //the email address from which this is sent
$to = "$ad_email"; //the email address you're sending the message to
$subject = "Payment Notification"; //the subject of the message

// To send HTML mail, the Content-type header must be set
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "Return-Path: $sitename<support@$serName>\r\n";
$headers .= "Organization: $sitename\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$message = "

<html>
<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>

<h3>Hi Admin,</h3>

You have new payment Notification <br> 

<table class='table' >
  
  <tr>
    <td>Depositor Name</td>
    <td>$pnam</td>
  </tr>
  
   <tr>
    <td>Amount Paid</td>
    <td>$amountpaid</td>
  </tr>
  
   <tr>
    <td>Bank Name</td>
    <td>$plnam</td>
  </tr>
  
</table> <p>



</body><html>";

//now mail
$DoMail = mail($to,$subject,$message,$headers);
             

	 }else{echo "<div class='alert alert-danger'>Enter required field</div>";}
 
    } 

?>    
            
                   <h2 class="post-title">
                                <a href="#">Payment Notification</a>
                            </h2>
                                                                                    <p>
                            <form method="POST" action="" accept-charset="UTF-8">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                	<tr>
                                		<td>Depositor's Name</td>
                                		<td><input class="form-control" placeholder="Name on The Account" name="depositor" type="text" value=""></td>
                                	</tr>
                                    
                                   <tr>
                                		<td>Bank Name</td>
                                		<td>
                                        <select class="form-control" placeholder="Bank Name" name="bank_name"><option value="<?php echo $bank['BankName'];?> (<?php echo $bank['AccName'];?>)"><?php echo $bank['BankName'];?> (<?php echo $bank['AccName'];?>)</option></select></td>
                                	</tr>
                                     
                                     <tr>
                                		<td>Amount Paid (&#x20A6;)</td>
                                		<td><input class="form-control" placeholder="Amount" name="amount" type="text" ></td>
                                	</tr>
                                  
                                  <tr>
                                		<td>Teller/Refrence Number</td>
                                		<td><input class="form-control" placeholder="Teller/Refrence Number" name="ref" type="text" value=""></td>
                                	</tr>
                                            
                                                                                                            <tr>
                                        <td>&nbsp;</td>
                                        <td><button type="submit" name="mgt" class="btn btn-info">Send</button></td>
                                    </tr>
                                </table>
                            </div>
                            </form>
                            </p>                      
                                 
                                 
                        
                                 
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

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
                            <h5 class="card-header">Latest Transaction</h5>
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
										
										while($row = $paynoti->fetch_assoc())
											
											{
										
											?>
                                            <tr>
                                           
                                                <td><?php echo $row['teller']; ?></td>
                                                
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