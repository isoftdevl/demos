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
                                <h2 class="pageheader-title"><li class="fa fa-plug"></li> Electricity Payment </h2>
                        
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
							
							if(isset($_GET['ref'])){
								       echo'<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Transaction successful</strong>  
									</div>'; 
									
									echo '<script>
									setTimeout(function(){ window.location.href="dashboard.php" }, 3000);</script>';
									      
								        }
								        
								
									
									if(isset($_POST['disco'])){
										
										$username = $_SESSION['user'];
										$amount = $_POST['amount'];
										$service = $_POST['service'];
										$plan = $_POST['plan'];
										$phone = $_POST['tel'];
										$iuc = $_POST['iuc'];
						if(!empty($amount) && !empty($service)&& !empty($phone) && !empty($iuc) ){
										$uid = substr(str_shuffle("0123456789678901"), 0, 16);	
										$_SESSION['amt'] = $amount;
										$_SESSION['carier'] = $service;
										$_SESSION['phone'] = $phone;
										$_SESSION['iuc'] = $iuc;
										$_SESSION['transid'] = $uid;
										$_SESSION['plan'] = $plan;
										$_SESSION['variation_code'] = $plan;
										
									
											$dat = date("d/m/Y");
											
											$token = uniqid();
											$stat = "pending";
											
										// replace comma
		$str1 = $amount;
        $xamount = str_replace( ',', '', $str1);	
											
										
										if($service === 'ikeja-electric'){
							
							$pnt = "Ikeja Electricity Payment - IKEDC";
							
							}elseif($service === 'portharcourt-electric'){
								
								$pnt = "Port Harcourt Electricity Payment - PHED";
								
								}elseif($service === 'ibadan-electric'){
									
									$pnt = "Ibadan Electricity Payment - IBEDC";
									
									}elseif($service === 'kano-electric'){
										
										$pnt = "Kano Electricity Payment - KEDCO";
										
										}elseif($service === 'jos-electric'){
											
										$pnt = "Jos Electricity Payment - JED";	
										
											}else{
											
										$pnt = "Eko Electricity Payment - EKEDC";	
											}	
												
									
										
							$disc = array("eedc","abuja-electric");
										
						if(in_array($service,$disc)){
							
						include('inc/electric-verify.php');
						
						if(is_null($result->description->Customer)){
			
			echo'<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Invalid Meter Number. Please Check your Meter Number and Try Again</strong>  
									</div>'; 
			
			}else{
				
			$qsel = "INSERT INTO transactions(network,serviceid,vcode,meterno,phone,ref,refer,amount,email,status,token,customer,del)VALUES('$pnt','$service','$plan','$iuc','$phone','$uid','$token','$amount','$username','$stat','$token','$fname $lname','Delete')";	
								
								$sav = $conn->query($qsel);
						
			$_SESSION['customer'] = $result->description->Customer;	
							?>
                            <script>
           window.location="transaction-view/electric?<?php echo $uid; ?>#transPreview";
                            </script>
                            <?php
			}
							}else{	
							    
include('inc/verify.php');							    
							    
			
		if(is_null($result->description->Customer)){
			
			echo'<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Invalid Meter Number. Please Check your Meter Number and Try Again</strong>  
									</div>'; 
			
			}	else{		
					
									
		$qsel = "INSERT INTO transactions(network,serviceid,vcode,meterno,phone,ref,refer,amount,email,status,token)VALUES('$pnt','$service','$plan','$iuc','$phone','$uid','$token','$amount','$username','$stat','$token')";	
								
								$sav = $conn->query($qsel);
								
		
			?>
        <script>						
       window.location="transaction-view/paytv?<?php echo $uid; ?>#transPreview";
          </script>
         <?php 								
 
			$_SESSION['customer'] = $result->description->Customer;
								
                                }	}
                                
						}
                                else{
										echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Enter required fields</strong>  
									</div>'; }
									}
									
									 ?>
                      
           
                   
                                        <label for="inputText3" class="col-form-label">Please Select DISCO</label><br>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier"  class="custom-control-input" value="Eko" onclick="javascript:showTv();" id="Eko" ><span class="custom-control-label"><img src="assets/images/Eko-Electric-Payment-PHCN.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="EEDC" onclick="javascript:showTv();" id="EEDC"><span class="custom-control-label" ><img src="assets/images/EEDC-Enugu-electricity-payment.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="ikeja" onclick="javascript:showTv();" id="Ikeja"><span class="custom-control-label" ><img src="assets/images/ikeja.png" width="70" height="30"></span>
                                            </label>
                                            
                       <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="phc" onclick="javascript:showTv();" id="phc"><span class="custom-control-label" ><img src="assets/images/phc.png" width="70" height="30"></span>
                                            </label>
                                            
                                            
    <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="ibedc" onclick="javascript:showTv();" id="ibedc"><span class="custom-control-label" ><img src="assets/images/IBEDC-Ibadan-Electricity-Distribution-Company.jpg" width="55" height="30"></span>
                                            </label>
                                            
                                            
                                  <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="kedco" onclick="javascript:showTv();" id="kedco"><span class="custom-control-label" ><img src="assets/images/Kano-Electricity-Distribution-Company-KEDCO-logo.png" width="55" height="30"></span>
                                            </label>    
                                            
                                            
           <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="jos" onclick="javascript:showTv();" id="jos"><span class="custom-control-label" ><img src="assets/images/Jos-Electric-JED.jpg" width="55" height="30"></span>
                                            </label>
                     
                                            
<label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="abuja" onclick="javascript:showTv();" id="abuja"><span class="custom-control-label" ><img src="assets/images/abuja.jpg" width="55" height="30"></span>
                                            </label>                                  
                                           
                                        <p></p>
                                        <div class="float-center">
                                        <img style="display:none;" id="bigpic" src="bigpic"  width="120" height="90"/>     
                                                   
                                    </div>
                                    
                                   
                                 
                                  <!-- Start Eko Electric hidden -->       
                              <div class="float-center" id="ifEko" style="display:none;">                 
                                       <div class="form-group" >
                                          
		 
        <label>Meter Type</label>
		
		<select class="form-control" id="IsEko" required="required" ><option value = "" selected="selected" required="required">Select Meter Type</option>
                
                <option data-plan="prepaid" data-service="eko-electric"> Prepaid</option>
          <option data-plan="postpaid" data-service="eko-electric">Postpaid</option> 
                
                
                </select>
		
      </div>


      
      <div class="form-group">
          <label for="inputText3" class="col-form-label">Meter Number</label>
    <input id="smartno" type="text" class="form-control" name="smartno" onKeyUp="javacript:document.getElementById('iuc').value = document.getElementById('smartno').value;" onSelect="javacript:document.getElementById('iuc').value = document.getElementById('smartno').value;">
                                            </div>
                                            
                                            
             <div class="form-group">
          <label for="inputText3" class="col-form-label">Enter Amount</label>
    <input id="amt" type="text" class="form-control" name="amt" onKeyUp="javascript:document.getElementById('amount').value = document.getElementById('amt').value;" onSelect="javascript:document.getElementById('amount').value = document.getElementById('amt').value;">
                                            </div>                              
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="mobile" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('mobile').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobile').value;">
                                            </div>             
                             
                                            
                </div>
                <!-- End EKO Electric hidden -->   
                
               
                <!-- Start EEDC hidden -->       
                              <div class="float-center" id="ifEEDC" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Meter Type</label>
		
		<select class="form-control" id="IsEEDC" required="required" ><option value = "" selected="selected" required="required">Select Meter Type</option>
                 <option data-plan="prepaid"  data-service="enugu-electric"> Prepaid</option>
          <option data-plan="postpaid"  data-service="enugu-electric">Postpaid</option>
                
                </select>
	
      </div>


      
      
      <div class="form-group">
          <label for="inputText3" class="col-form-label">Meter Number</label>
    <input id="smartcard" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('smartcard').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('smartcard').value;">
                                            </div>
                                            
           <div class="form-group">
          <label for="inputText3" class="col-form-label">Enter Amount</label>
    <input id="amtPay" type="text" class="form-control" name="amt" onKeyUp="javascript:document.getElementById('amount').value = document.getElementById('amtPay').value;" onSelect="javascript:document.getElementById('amount').value = document.getElementById('amtPay').value;">
                                            </div>                                
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="phone" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('phone').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('phone').value;">
                                            </div>                
                                              
                                            
                </div>
                <!-- End EEDC hidden -->  
                
          <!-- Start Ikeja Electric hidden -->       
                              <div class="float-center" id="ifIkeja" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Meter Type</label>
		
		<select class="form-control" id="IsIkeja" required="required" ><option value = "" selected="selected" required="required">Select Meter Type</option>
              <option data-plan="prepaid"  data-service="ikeja-electric"> Prepaid</option>
          <option data-plan="postpaid"  data-service="ikeja-electric">Postpaid</option>
                
                </select>
	
      </div>


      
       
      <div class="form-group">
          <label for="inputText3" class="col-form-label">Meter Number</label>
    <input id="smart" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('smart').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('smart').value;">
                                            </div>
                                            
           <div class="form-group">
          <label for="inputText3" class="col-form-label">Enter Amount</label>
    <input id="payamt" type="text" class="form-control" name="amt" onKeyUp="javascript:document.getElementById('amount').value = document.getElementById('payamt').value;" onSelect="javascript:document.getElementById('amount').value = document.getElementById('payamt').value;">
                                            </div>                                  
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="mobil" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('mobil').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobil').value;">
                                            </div>                   
                                            
                </div>
                <!-- End Ikeja Electric hidden -->   
                
         <!-- Start PHC Electric hidden -->       
                              <div class="float-center" id="ifPhc" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Meter Type</label>
		
		<select class="form-control" id="IsPhc" required="required" ><option value = "" selected="selected" required="required">Select Meter Type</option>
              
         <option data-plan="prepaid"  data-service="portharcourt-electric">Prepaid</option>
                <option data-plan="postpaid"  data-service="portharcourt-electric">Postpaid</option>
                </select>
	
      </div>


      <div class="form-group">
          <label for="inputText3" class="col-form-label">Meter Number</label>
    <input id="meterNo" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('meterNo').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('meterNo').value;">
                                            </div>
                                            
        
         <div class="form-group">
          <label for="inputText3" class="col-form-label">Enter Amount</label>
    <input id="topay" type="text" class="form-control" name="amt" onKeyUp="javascript:document.getElementById('amount').value = document.getElementById('topay').value;" onSelect="javascript:document.getElementById('amount').value = document.getElementById('topay').value;">
                                            </div>                                    
                                            
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="mobi" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('mobi').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobi').value;">
                                            </div>                   
                                            
                </div>
                <!-- End PHC Electric hidden -->   
                
                
                <!-- Start IBADAN Electric hidden -->       
                              <div class="float-center" id="ifIbedc" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Meter Type</label>
		
		<select class="form-control" id="IsIbedc" required="required" ><option value = "" selected="selected" required="required">Select Meter Type</option>
              
         <option data-plan="prepaid"  data-service="ibadan-electric">Prepaid</option>
                <option data-plan="postpaid"  data-service="ibadan-electric">Postpaid</option>
                </select>
	
      </div>


      <div class="form-group">
          <label for="inputText3" class="col-form-label">Meter Number</label>
    <input id="IbmeterNo" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('IbmeterNo').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('IbmeterNo').value;">
                                            </div>
                                            
        
         <div class="form-group">
          <label for="inputText3" class="col-form-label">Enter Amount</label>
    <input id="itopay" type="text" class="form-control" name="amt" onKeyUp="javascript:document.getElementById('amount').value = document.getElementById('itopay').value;" onSelect="javascript:document.getElementById('amount').value = document.getElementById('itopay').value;">
                                            </div>                                    
                                            
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="ibmobi" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('ibmobi').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('ibmobi').value;">
                                            </div>                   
                                            
                </div>
                <!-- End IBADAN Electric hidden -->       
                
                
                
                <!-- Start KANO Electric hidden -->       
                              <div class="float-center" id="ifKedco" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Meter Type</label>
		
		<select class="form-control" id="IsKedco" required="required" ><option value = "" selected="selected" required="required">Select Meter Type</option>
              
         <option data-plan="prepaid"  data-service="kano-electric">Prepaid</option>
                <option data-plan="postpaid"  data-service="kano-electric">Postpaid</option>
                </select>
	
      </div>


      <div class="form-group">
          <label for="inputText3" class="col-form-label">Meter Number</label>
    <input id="kedmeterNo" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('kedmeterNo').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('kedmeterNo').value;">
                                            </div>
                                            
        
         <div class="form-group">
          <label for="inputText3" class="col-form-label">Enter Amount</label>
    <input id="kedpay" type="text" class="form-control" name="amt" onKeyUp="javascript:document.getElementById('amount').value = document.getElementById('kedpay').value;" onSelect="javascript:document.getElementById('amount').value = document.getElementById('kedpay').value;">
                                            </div>                                    
                                            
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="kdmobi" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('kdmobi').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('kdmobi').value;">
                                            </div>                   
                                            
                </div>
                <!-- End KANO Electric hidden --> 
                
                
               <!-- Start JOS Electric hidden -->       
                              <div class="float-center" id="ifJos" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Meter Type</label>
		
		<select class="form-control" id="IsJos" required="required" ><option value = "" selected="selected" required="required">Select Meter Type</option>
              
         <option data-plan="prepaid"  data-service="jos-electric">Prepaid</option>
                <option data-plan="postpaid"  data-service="jos-electric">Postpaid</option>
                </select>
	
      </div>


      <div class="form-group">
          <label for="inputText3" class="col-form-label">Meter Number</label>
    <input id="josmeterNo" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('josmeterNo').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('josmeterNo').value;">
                                            </div>
                                            
        
         <div class="form-group">
          <label for="inputText3" class="col-form-label">Enter Amount</label>
    <input id="jospay" type="text" class="form-control" name="amt" onKeyUp="javascript:document.getElementById('amount').value = document.getElementById('jospay').value;" onSelect="javascript:document.getElementById('amount').value = document.getElementById('jospay').value;">
                                            </div>                                    
                                            
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="josmobi" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('josmobi').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('josmobi').value;">
                                            </div>                   
                                            
                </div>
                <!-- End JOS Electric hidden -->  
               
               <!-- Start Abuja Electric hidden -->       
                              <div class="float-center" id="ifAbuja" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Meter Type</label>
		
		<select class="form-control" id="IsAbuja" required="required" ><option value = "" selected="selected" required="required">Select Meter Type</option>
              
         <option data-plan="prepaid"  data-service="abuja-electric">Prepaid</option>
                <option data-plan="postpaid"  data-service="abuja-electric">Postpaid</option>
                </select>
	
      </div>


      <div class="form-group">
          <label for="inputText3" class="col-form-label">Meter Number</label>
    <input id="abjmeterNo" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('abjmeterNo').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('abjmeterNo').value;">
                                            </div>
                                            
        
         <div class="form-group">
          <label for="inputText3" class="col-form-label">Enter Amount</label>
    <input id="abjpay" type="text" class="form-control" name="amt" onKeyUp="javascript:document.getElementById('amount').value = document.getElementById('abjpay').value;" onSelect="javascript:document.getElementById('amount').value = document.getElementById('abjpay').value;">
                                            </div>                                    
                                            
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="abjmobi" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('abjmobi').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('abjmobi').value;">
                                            </div>                   
                                            
                </div>
                <!-- End Abuja Electric hidden -->   
                
                                                   
                 <form method="post" action="" >                            
          
                 <input type="hidden" value="" name="plan" id="plan">
		 <input type="hidden" value="" name="service" id="service">
         
         <input type="hidden" value="" name="amount" id="amount">
         
         <input type="hidden" value="" name="iuc" id="iuc">
         
         <input type="hidden" value="" name="tel" id="tele">
                                            
                     <div class="col-sm-6 pl-0">
                           <p class="text-center">
                                                    <button type="submit" name="disco" class="btn btn-rounded btn-primary" onClick="alert('We will validate your Meter Number to be sure everything is good')" >Proceed </button>
                           <button class="btn btn-rounded btn-secondary">Cancel</button>                    
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
 
 
 
 function showTv(){
    if (document.getElementById('Eko').checked) {
        document.getElementById('ifEko').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Eko-Electric-Payment-PHCN.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
	
  $('#IsEko').change(function(){
	  var selected = $(this).find('option:selected');
	 
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  
	  $('#service').val(service);
	  $('#plan').val(plan);
	  
	  }); 
  
    }else document.getElementById('ifEko').style.display = 'none';
	
	
	if (document.getElementById('EEDC').checked) {
        document.getElementById('ifEEDC').style.display = 'block';
		
		var sourceOfPicture = "assets/images/EEDC-Enugu-electricity-payment.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
  
  $('#IsEEDC').change(function(){
	  var selected = $(this).find('option:selected');
	  
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	
		
		}else document.getElementById('ifEEDC').style.display = 'none';
	
	if (document.getElementById('Ikeja').checked) {
        document.getElementById('ifIkeja').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Ikeja-Electric-Payment-PHCN.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#IsIkeja').change(function(){
	  var selected = $(this).find('option:selected');
	  
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	}
    
	else document.getElementById('ifIkeja').style.display = 'none';
	
	
	
	if (document.getElementById('phc').checked) {
        document.getElementById('ifPhc').style.display = 'block';
		
		var sourceOfPicture = "assets/images/18112019141721Port-Harcourt-Electric.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#IsPhc').change(function(){
	  var selected = $(this).find('option:selected');
	 
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	 
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	}
    
	else document.getElementById('ifPhc').style.display = 'none';
	
	
	
	if (document.getElementById('ibedc').checked) {
        document.getElementById('ifIbedc').style.display = 'block';
		
		var sourceOfPicture = "assets/images/IBEDC-Ibadan-Electricity-Distribution-Company.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#IsIbedc').change(function(){
	  var selected = $(this).find('option:selected');
	 
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	 
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	}
    
	else document.getElementById('ifIbedc').style.display = 'none';
	
	
	
	if (document.getElementById('kedco').checked) {
        document.getElementById('ifKedco').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Kano-Electricity-Distribution-Company-KEDCO-logo.png";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#IsKedco').change(function(){
	  var selected = $(this).find('option:selected');
	 
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	 
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	}
    
	else document.getElementById('ifKedco').style.display = 'none';
	
	
	
	if (document.getElementById('jos').checked) {
        document.getElementById('ifJos').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Jos-Electric-JED.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#IsJos').change(function(){
	  var selected = $(this).find('option:selected');
	 
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	 
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	}
    
	else document.getElementById('ifJos').style.display = 'none';
	
	
	
	if (document.getElementById('abuja').checked) {
        document.getElementById('ifAbuja').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Abuja-Electric.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#IsAbuja').change(function(){
	  var selected = $(this).find('option:selected');
	 
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	 
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	}
    
	else document.getElementById('ifAbuja').style.display = 'none';
	
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
                          
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- sales  -->
                         
                            <!-- end new customer  -->
                           
                        </div>
                        <div class="row">
              
                        </div>
                        <div class="row">
                      
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include('inc/footer.php');?>