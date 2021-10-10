<?php 
session_start();
require('db.php'); 
include('inc/func.php');
include('inc/gravatar.php');
include('inc/logo.php');
include('inc/coinpayments.inc.php');
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
                                <h2 class="pageheader-title">Bulk Messaging </h2>
                        
                               
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
                                    <h5 class="card-header">Compose SMS</h5>
                                    <div class="card-body">
                                    
                               
<?php
									
$qryApi = mysqli_query($conn,"SELECT * FROM api_setting");
$apidata = mysqli_fetch_array($qryApi);

$query_rec = mysqli_query($conn,"SELECT * FROM billing");
			
$bil = mysqli_fetch_array($query_rec);
 	

									
if(isset($_POST['send'])){
										
										
$from = $_POST['sender'];
										
$sendto = $_POST['sendto'];
$txt = $_POST['message'];
$schedule = $_POST['sendlater'];
										
$reff = mt_rand(200888544,748988444);
										
$Charlen = strlen($txt);
			
			 $sms_array = explode("," , $sendto);
			  
			  $no = count($sms_array);
			  
			  if($Charlen <='160'){
				  
				 $bi = $bil['sms']; 
				  }elseif($Charlen <='320'){
					  
					$bi = $bil['sms']*2;  
					  }elseif($Charlen <= '480'){
						  
						$bi = $bil['sms']*3;  
						  }elseif($Charlen <= '640'){
							
							$bi = $bil['sms']*4;  
							  
						  }else{
							  
							$bi = $bil['sms']*10;  
							  }

				$debit = $bi * $no;
				
				
			if(!empty($from) &&!empty($sendto) && !empty($txt) ){
											
									
			if($bal >= $debit){
										    
		// debit ACCOUNT
		
		$qry_debit = "UPDATE users SET bal=bal-$debit WHERE email='$user'";
			$doDebit = $conn->query($qry_debit);								
			
		//send message
								
$data = array(
    
    'username' => $apidata['smsUserid'],
    'password' => $apidata['smsPass'],
	 'sender' => $from,
	  'recipient' => $sendto,
	   'message' => $txt
	    
);
# Create a connection
$url = $apidata['baseurl'];
$ch = curl_init($url);
# Form data string
$postString = http_build_query($data, '', '&');
# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$response = curl_exec($ch);
curl_close($ch); 		
			
        
$dest = $sendto;

$dlr = "";

$settime = date('d-m-Y H:m:s');

$action = "View Report";

$stor = mysqli_query($conn, "INSERT INTO message_history(mobile,username, sender,message,refid,status,senttime,action,charge) VALUES('$dest','$user','$from','$txt','$reff','$dlr','$settime','$action','$debit') ");   
        
			
				 
                                        
                                  echo $msg_stat = '<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Message Sent</strong> 
									</div>';
											      
                               
			
											}else{
												
										echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Insufficient Balance</strong> 
									</div>';
											}	
											}else{
												echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Enter required field</strong>  
									</div>'; }
										
										$conn->close();
										
									}
									 ?>                   
                                     
                                     
                                     
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Sender ID</label>
                                                <input id="inputText3" type="text" class="form-control" name="sender">
                                            </div>
                       
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Receipient</label>
                                                <textarea class="form-control" id="sendto" rows="8" name="sendto"  ></textarea>
                                            </div>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method"  class="custom-control-input" value="card" onclick="javascript:cont();" id="phonebook"><span class="custom-control-label">Send to saved contact</span>
                                            </label>
                                            
                                            
                                             
                                                <select class="form-control" id="ifYes" style="display:none">
												<?php 
											
												while($md = $rc->fetch_assoc())
												{
													
											?>
                                            
                                            <option  value="<?php echo $md['name']; ?> "><?php echo $md['name']; ?></option>
                                                    
                                                    <?php } ?>
                                                </select>
                                                
                                               
                               
			            <div class="form-group">
			                <label class="col-lg-2 col-md-12 control-label"></label>
			                <div class="col-lg-8 col-md-12">
			                	<p><strong id="destcount"></strong> <strong id="grp_select_check"></strong></p>  
			                </div>
			            </div>
                                
                                
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Message</label>
                                                <textarea class="form-control" id="message" onchange="countMsgsText(this.value);" onkeyup="countMsgsText(this.value);" rows="7" name="message"></textarea>
                                            </div>
                                       
                                        <div class="form-group">
			                <label class="col-lg-2 col-md-12 control-label"></label>
			                <div class="col-lg-8 col-md-12">
			                <div>
			                	<b id="paget"></b>
			                	<b id="count"></b>
			                </div>                
							<div class="hidden" id="hiddenCount"></div>    
			                </div>
                               </div> 
                               
                                
       <label class="col-lg-2 col-md-12 control-label">Sending Route</label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" checked="" name="route"  class="custom-control-input" value="3"><span class="custom-control-label">Normal</span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="route" class="custom-control-input"value="4"  onClick="alert('You must register corporate ID to use this ')"><span class="custom-control-label" >Corporate</span>
                                            </label> 
                                            
       <label class="col-lg-2 col-md-12 control-label">Message Type</label>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" checked="" name="msgtype"  class="custom-control-input" value="0"><span class="custom-control-label">Inbox</span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="msgtype" class="custom-control-input"value="1" ><span class="custom-control-label" >Flash</span>
                                            </label>
                               
                                  
         <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="schedule"  class="custom-control-input" value="card" onclick="javascript:cont();" id="schedule"><span class="custom-control-label">Schedule Message</span>
                                            </label>
                                            
                                            
                                             
                                                <input type="date" class="form-control" id="sendlater" style="display:none" name="sendlater" > 
                                                
                                          
												
                                                <p></p>                      
                               
                                     <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" name="send" class="btn btn-space btn-primary">Send Message</button>
                                                    
                                                </p>
                                            </div> 
                                             
                                            <p></p>     
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                            
                            <script>
                                
                             
 function cont() {
    if (document.getElementById('phonebook').checked) {
        document.getElementById('ifYes').style.display = 'block';
    }
    else  document.getElementById('ifYes').style.display = 'none';
    
    
   if (document.getElementById('schedule').checked) {
        document.getElementById('sendlater').style.display = 'block';
    }
    else  document.getElementById('sendlater').style.display = 'none'; 
   
}    
                      
   $("#sendto").on("keyup", function() {
  $(this).val($(this).val().replace(/[\,\-\n]/g, ","));
});           
                                
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
                                        <h5 class="text-muted">Total Contacts</h5>
                                        <h2 class="mb-0"> 0</h2>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fa fa-user fa-fw fa-sm text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            
                          
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
                            
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                           
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->
                        </div>
                        <div class="row">
                          <!-- ============================================================== -->
                            <!-- end sales traffice source  -->
                            <!-- ============================================================== -->
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <?php include('inc/footer.php');?>