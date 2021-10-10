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
                                  
                       
                         include('inc/coinpayments.inc.php');
                         
                       	
										 ?>
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"><li class="fa fa-tv"></li> TV Payment </h2>
                        
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
								        
								
									
									if(isset($_POST['tvCheck'])){
										
										$username = $_SESSION['user'];
										$amount = $_POST['amount'];
										$service = $_POST['service'];
										$plan = $_POST['plan'];
										$phone = $_POST['tel'];
										$iuc = $_POST['iuc'];
										$variation = $_POST['variation_code'];
						if(!empty($amount) && !empty($service)&& !empty($phone) && !empty($iuc) && !empty($variation) ){
										$uid = substr(str_shuffle("0123456789678901"), 0, 16);	
										
										// replace comma
		                        $str1 = $amount;
                                 $xamount = str_replace( ',', '', $str1);
										
										
										$_SESSION['amt'] = $xamount;
										$_SESSION['carier'] = $service;
										$_SESSION['phone'] = $phone;
										$_SESSION['iuc'] = $iuc;
										$_SESSION['transid'] = $uid;
										$_SESSION['plan'] = $plan;
										$_SESSION['variation_code'] = $variation;
										
									
											$dat = date("d/m/Y");
											
											$token = uniqid();
											$stat = "pending";
										
										if($service === 'gotv'){
											
											$pnt = "GOTV Payment";
											
											}elseif($service === 'dstv'){
												
												$pnt = "DSTV Payment";
												}else{
													
													$pnt = "Startimes Payment";
													}	
									
										
										
include('inc/verify.php');							    
							    
			
		if(is_null($result->description->Customer)){
			
			echo'<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Invalid IUC/SmartCard Number</strong>  
									</div>'; 
			
			}	else{		
					
									
		$qsel = "INSERT INTO transactions(network,serviceid,vcode,meterno,phone,ref,refer,amount,email,status,token,customer,del)VALUES('$pnt($plan)','$service','$variation','$iuc','$phone','$uid','$token','$amount','$username','$stat','$token','$fname $lname','Delete')";	
								
								$sav = $conn->query($qsel);
								
			?>
        <script>						
       window.location="transaction-view/paytv?<?php echo $uid; ?>#transPreview";
          </script>
         <?php 
											
 
			$_SESSION['customer'] = $result->description->Customer;
								
                                }	}
                                
                       
                                else{
										echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Enter required fields</strong>  
									</div>'; }
									}
									
									 ?>
                      
           
                   
                                        <label for="inputText3" class="col-form-label">Please Select TV Gateway To Recharge</label><br>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier"  class="custom-control-input" value="gotv" onclick="javascript:showTv();" id="gotv" ><span class="custom-control-label"><img src="assets/images/Gotv-Payment.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="dstv" onclick="javascript:showTv();" id="dstv"><span class="custom-control-label" ><img src="assets/images/Pay-DSTV-Subscription.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="startimes" onclick="javascript:showTv();" id="startimes"><span class="custom-control-label" ><img src="assets/images/Startimes-Subscription.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                       
                                           
                                        <p></p>
                                        <div class="float-center">
                                        <img style="display:none;" id="bigpic" src="bigpic"  width="120" height="90"/>     
                                                   
                                    </div>
                                    
                                   
                                 
                                  <!-- Start GOTV hidden -->       
                              <div class="float-center" id="ifGotv" style="display:none;">                 
                                       <div class="form-group" >
                                          
		 
        <label>Bouquet:</label>
		
		<select class="form-control" id="IsGotv" required="required" ><option value = "" selected="selected" required="required">Select Gotv Banquet</option>
                <option data-plan="Gotv Lite N400" data-amount="400" data-service="gotv" data-variation_code="gotv-lite" >Gotv Lite N400</option>
                
                <option data-plan="Gotv Value N1250" data-amount="1250" data-service="gotv" data-variation_code="gotv-value">Gotv Value N1250</option>
                
				<option data-plan="Gotv Plus N1900" data-amount="1900"  data-service="gotv" data-variation_code="gotv-plus" >Gotv Plus N1900</option>
				
				
				
                <option data-plan="Gotv Max N3200" data-amount="3200" data-service="gotv" data-variation_code="gotv-max" >Gotv Max N3200</option>
                
                
                <option data-plan="GOtv Jolli N2,400" data-amount="2400" data-service="gotv" data-variation_code="gotv-jolli" >GOtv Jolli N2,400</option>
                
                
                <option data-plan="GOtv Jinja N1,600" data-amount="1600" data-service="gotv" data-variation_code="gotv-jinja" >GOtv Jinja N1,600</option>
                
                
                
                </select>
		
		
      </div>


      
      <div class="form-group">
          <label for="inputText3" class="col-form-label">IUC Number</label>
    <input id="smartno" type="text" class="form-control" name="smartno" onKeyUp="javacript:document.getElementById('iuc').value = document.getElementById('smartno').value;" onSelect="javacript:document.getElementById('iuc').value = document.getElementById('smartno').value;">
                                            </div>
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="mobile" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('mobile').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobile').value;">
                                            </div>             
                             
                                            
                </div>
                <!-- End GOTV hidden -->   
                
               
                <!-- Start DSTV hidden -->       
                              <div class="float-center" id="ifDstv" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Bouquet:</label>
		
		<select class="form-control" id="IsDstv" required="required" ><option value = "" selected="selected" required="required">Select DSTV Banquet</option>
                <option data-plan="DStv Access N2000" data-amount="2000" data-service="dstv" data-variation_code="dstv1">DStv Access N2000</option>
                
                <option data-plan="DStv Family N4000" data-amount="4000" data-service="dstv" data-variation_code="dstv2">DStv Family N4000</option>
                
                <option data-plan="DStv Premium N15800" data-amount="15800" data-service="dstv" data-variation_code="dstv3">DStv Premium N15800</option>
                
                
                <option data-plan="DStv German only N3640" data-amount="3640" data-service="dstv" data-variation_code="dstv4">DStv German only N3640</option>
                
                
                <option data-plan="DStv French only N6050" data-amount="6050" data-service="dstv" data-variation_code="dstv5">DStv French only N6050</option>
                
                
                <option data-plan="DStv Asia only N5050" data-amount="5050" data-service="dstv" data-variation_code="dstv6">DStv Asia only N5050</option>
                
                
                <option data-plan="DStv Compact Plus N10650" data-amount="10650" data-service="dstv" data-variation_code="dstv7">DStv Compact Plus N10650</option>
                
                
                <option data-plan="DStv Premium-French N20780" data-amount="20780" data-service="dstv" data-variation_code="dstv9">DStv Premium-French N20780</option>
                
                
                <option data-plan="DStv Premium-Asia N17630" data-amount="17630" data-service="dstv" data-variation_code="dstv10">DStv Premium-Asia N17630</option>
                
                
                <option data-plan="DStv Premium - French - Asia N25580" data-amount="25580" data-service="dstv" data-variation_code="dstv13">DStv Premium - French - Asia N25580</option>
                
                
                <option data-plan="DStv Family - Asia N9400" data-amount="9400" data-service="dstv" data-variation_code="dstv18">DStv Family - Asia N9400</option>
                
                
                <option data-plan="DStv Access - Asia N7400" data-amount="7400" data-service="dstv" data-variation_code="dstv21">DStv Access - Asia N7400</option>
                
                
                <option data-plan="DStv Access - French N7850" data-amount="7850" data-service="dstv" data-variation_code="dstv22">DStv Access - French N7850</option>
                
                
                <option data-plan="DStv Access - Dual View N4200" data-amount="4200" data-service="dstv" data-variation_code="dstv23">DStv Access - Dual View N4200</option>
                
                
                <option data-plan="DStv Access - Extra View N4200" data-amount="4200" data-service="dstv" data-variation_code="dstv24">DStv Access - Extra View N4200</option>
                
                
                <option data-plan="DStv Access - PVR Access N4200" data-amount="4200" data-service="dstv" data-variation_code="dstv25">DStv Access - PVR Access N4200</option>
                
                
                <option data-plan="DStv Family - Dual View N6200" data-amount="6200" data-service="dstv" data-variation_code="dstv26">DStv Family - Dual View N6200</option>
                
                <option data-plan="DStv Family - Extra View N6200" data-amount="6200" data-service="dstv" data-variation_code="dstv27">DStv Family - Extra View N6200</option>
                
                
                <option data-plan="DStv Family - PVR Access N6200" data-amount="6200" data-service="dstv" data-variation_code="dstv28">DStv Family - PVR Access N6200</option>
                
                
                <option data-plan="DStv Compact - Dual View N9000" data-amount="9000" data-service="dstv" data-variation_code="dstv29">DStv Compact - Dual View N9000</option>
                
                
                <option data-plan="DStv Compact Extra View N9000" data-amount="9000" data-service="dstv" data-variation_code="dstv30">DStv Compact Extra View N9000</option>
                
                
                <option data-plan="DStv Compact - PVR Access N9000" data-amount="9000" data-service="dstv" data-variation_code="dstv31">DStv Compact - PVR Access N9000</option>
                
                
                <option data-plan="DStv Premium Dual View N18000" data-amount="18000" data-service="dstv" data-variation_code="dstv32">DStv Premium Dual View N18000</option>
                
                
                <option data-plan="DStv Premium - Extra View N18000" data-amount="18000" data-service="dstv" data-variation_code="dstv33">DStv Premium - Extra View N18000</option>
                
                
                <option data-plan="DStv Premium PVR Access N18000" data-amount="18000" data-service="dstv" data-variation_code="dstv34">DStv Premium PVR Access N18000</option>
                
                
                <option data-plan="DStv Family - French N10360" data-amount="10360" data-service="dstv" data-variation_code="dstv36">DStv Family - French N10360</option>
                
                
                <option data-plan="DStv Compact Plus - Asia N16050" data-amount="16050" data-service="dstv" data-variation_code="dstv40">DStv Compact Plus - Asia N16050</option>
                
                
                <option data-plan="DStv Compact Plus French N17010" data-amount="17010" data-service="dstv" data-variation_code="dstv43">DStv Compact Plus French N17010</option>
                
                
                <option data-plan="DStv Compact Plus Dual View N12850" data-amount="12850" data-service="dstv" data-variation_code="dstv44">DStv Compact Plus Dual View N12850</option>
                
                
                <option data-plan="DStv Compact Plus - Extra View N12850" data-amount="12850" data-service="dstv" data-variation_code="dstv45">DStv Compact Plus - Extra View N12850</option>
                
                
                <option data-plan="DStv Compact Plus - PVR Access N12850" data-amount="12850" data-service="dstv" data-variation_code="dstv46">DStv Compact Plus - PVR Access N12850</option>
                
                
                <option data-plan="DStv Compact Plus Asia PVR Access N18250" data-amount="12850" data-service="dstv" data-variation_code="dstv47">DStv Compact Plus Asia PVR Access N18250</option>
                
                
                <option data-plan="DStv Compact Plus Asia Dual View N18250" data-amount="18250" data-service="dstv" data-variation_code="dstv48">DStv Compact Plus Asia Dual View N18250</option>
                
                
                <option data-plan="DStv Premium - Asia - Dual View N19900" data-amount="19900" data-service="dstv" data-variation_code="dstv49">DStv Premium - Asia - Dual View N19900</option>
                
                
                <option data-plan="DStv Premium - French - Dual View N24400" data-amount="24400" data-service="dstv" data-variation_code="dstv50">DStv Premium - French - Dual View N24400</option>
                
                
                <option data-plan="DStv Premium - Asia - PVR Access N19900" data-amount="19900" data-service="dstv" data-variation_code="dstv58">DStv Premium - Asia - PVR Access N19900</option>
                
                
                <option data-plan="DStv Premium - French - PVR Access N24400" data-amount="24400" data-service="dstv" data-variation_code="dstv59">DStv Premium - French - PVR Access N24400</option>  
                
                
                
                <option data-plan="DStv Premium - Asia - Extra View N19900" data-amount="19900" data-service="dstv" data-variation_code="dstv61">DStv Premium - Asia - Extra View N19900</option>
                
                
                <option data-plan="DStv Premium - French - Extra View N24400" data-amount="24400" data-service="dstv" data-variation_code="dstv62">DStv Premium - French - Extra View N24400</option> 
                
                
                
                 <option data-plan="DStv Premium - French - Asia - Extra View N26640" data-amount="26640" data-service="dstv" data-variation_code="dstv64">DStv Premium - French - Asia - Extra View N26640</option>
                 
                 
                <option data-plan="DStv Premium - French - Asia - PVR Access N26640" data-amount="26640" data-service="dstv" data-variation_code="dstv65">DStv Premium - French - Asia - PVR Access N26640</option>
                
                
                <option data-plan="DStv Premium - French - Asia - Dual View N26640" data-amount="26640" data-service="dstv" data-variation_code="dstv66">DStv Premium - French - Asia - Dual View N26640</option>    
                
                
                
                <option data-plan="DStv Asia - Dual View N7600" data-amount="7600" data-service="dstv" data-variation_code="dstv76">DStv Asia - Dual View N7600</option>
                
                
                <option data-plan="DStv Asia - Extra View N7600" data-amount="7600" data-service="dstv" data-variation_code="dstv77">DStv Asia - Extra View N7600</option>
                
                
                <option data-plan="DStv  Asia - PVR Access N7600" data-amount="7600" data-service="dstv" data-variation_code="dstv78">DStv  Asia - PVR Access N7600</option>
                
                
                <option data-plan="DStv  Compact N6800" data-amount="6800" data-service="dstv" data-variation_code="dstv79">DStv  Compact N6800</option>
                
                
                <option data-plan="DStv Yanga N2,500" data-amount="2500" data-service="dstv" data-variation_code="dstv-yanga">DStv Yanga N2,500</option>
                
                
                <option data-plan="Dstv Confam N4,500" data-amount="4500" data-service="dstv" data-variation_code="dstv-confam">Dstv Confam N4,500</option>
                
                </select>
	
	
      </div>


      
      
      <div class="form-group">
          <label for="inputText3" class="col-form-label">Smartcard Number</label>
    <input id="smartcard" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('smartcard').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('smartcard').value;">
                                            </div>
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="phone" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('phone').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('phone').value;">
                                            </div>                
                                              
                                            
                </div>
                <!-- End DSTV hidden -->  
                
          <!-- Start STARTTIMES hidden -->       
                              <div class="float-center" id="ifStar" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Bouquet:</label>
		
		<select class="form-control" id="IsStar" required="required" ><option value = "" selected="selected" required="required">Select Startimes Banquet</option>
                <option data-plan="Nova - 900 Naira" data-amount="900" data-service="startimes" data-variation_code="nova"> Startimes Nova - 900 Naira</option>
                
          <option data-plan="Basic - 1,300 Naira" data-amount="1300" data-service="startimes" data-variation_code="basic">Startimes Basic - 1,300 Naira</option>
          
          
          <option data-plan="Smart - 1,900 Naira" data-amount="1900" data-service="startimes" data-variation_code="smart"> Startimes Smart - 1,900 Naira</option>
          
          
          <option data-plan="Classic - 1,900 Naira" data-amount="1900" data-service="startimes" data-variation_code="classic">Startimes Classic - 2,600 Naira</option>
          
          
          <option data-plan="Super - 3,800 Naira" data-amount="3800" data-service="startimes" data-variation_code="super"> Super - 3,800 Naira - 1 Month</option>
          
          
          <option data-plan="Nova - 300 Naira - 1 Week" data-amount="300" data-service="startimes" data-variation_code="nova-weekly">Nova - 300 Naira - 1 Week</option>
          
          
          <option data-plan="Basic - 450 Naira - 1 Week" data-amount="450" data-service="startimes" data-variation_code="basic-weekly">Basic - 450 Naira - 1 Week</option>
          
          
          <option data-plan="Smart - 600 Naira - 1 Week" data-amount="450" data-service="startimes" data-variation_code="smart-weekly">Smart - 600 Naira - 1 Week</option>
                
                </select>
	
      </div>


      
       
      <div class="form-group">
          <label for="inputText3" class="col-form-label">Smartcard Number</label>
    <input id="smart" type="text" class="form-control" name="smartno" onKeyUp="javascript:document.getElementById('iuc').value = document.getElementById('smart').value;" onSelect="javascript:document.getElementById('iuc').value = document.getElementById('smart').value;">
                                            </div>
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="mobil" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('mobil').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobil').value;">
                                            </div>                   
                                            
                </div>
                <!-- End STARTIMES hidden -->                                      
                 <form method="post" action="" >                            
          
                 <input type="hidden" value="" name="plan" id="plan">
		 <input type="hidden" value="" name="service" id="service">
         
         <input type="hidden" value="" name="amount" id="amount">
         
         <input type="hidden" value="" name="iuc" id="iuc">
         
         <input type="hidden" value="" name="tel" id="tele">
         <input type="hidden" value="" name="variation_code" id="variation_code">
                                            
                     <div class="col-sm-6 pl-0">
                           <p class="text-center">
                                                    <button type="submit" name="tvCheck" class="btn btn-rounded btn-primary" >Proceed </button>
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
    if (document.getElementById('gotv').checked) {
        document.getElementById('ifGotv').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Gotv-Payment.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
	
  $('#IsGotv').change(function(){
	  var selected = $(this).find('option:selected');
	  var amount = selected.data('amount');
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  var variation_code = selected.data('variation_code');
	  $('#amount').val(amount);
	  $('#service').val(service);
	  $('#plan').val(plan);
	  $('#variation_code').val(variation_code);
	  }); 
  
    }else document.getElementById('ifGotv').style.display = 'none';
	
	
	if (document.getElementById('dstv').checked) {
        document.getElementById('ifDstv').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Pay-DSTV-Subscription.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
  
  $('#IsDstv').change(function(){
	  var selected = $(this).find('option:selected');
	  var amount = selected.data('amount');
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  var variation_code = selected.data('variation_code');
	  $('#amount').val(amount);
	  $('#service').val(service);
	  $('#plan').val(plan);
	  $('#variation_code').val(variation_code);
	  });
		
	
		
		}else document.getElementById('ifDstv').style.display = 'none';
	
	if (document.getElementById('startimes').checked) {
        document.getElementById('ifStar').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Startimes-Subscription.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#IsStar').change(function(){
	  var selected = $(this).find('option:selected');
	  var amount = selected.data('amount');
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  var variation_code = selected.data('variation_code');
	  $('#amount').val(amount);
	  $('#service').val(service);
	  $('#plan').val(plan);
	  $('#variation_code').val(variation_code);
	  });
		
	}
    
	else document.getElementById('ifStar').style.display = 'none';
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