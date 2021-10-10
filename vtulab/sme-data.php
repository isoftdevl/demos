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
                                <h2 class="pageheader-title"><li class="fa fa-wifi"></li> SME DATA Bundle </h2>
                        
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
								        
								
									
									if(isset($_POST['DataCheck'])){
										
										$username = $_SESSION['user'];
										$amount = $_POST['amount'];
										$serviceID = $_POST['service'];
										$Dataplan = $_POST['plan'];
										$phone = $_POST['tel'];
										$variation = $_POST['plan'];
										
						if(!empty($amount) && !empty($service)&& !empty($phone) ){
										$uid = substr(str_shuffle("0123456789678901"), 0, 16);	
										
										// replace comma
		                        $str1 = $amount;
                                 $xamount = str_replace( ',', '', $str1);
										
										
										$_SESSION['amt'] = $xamount;
										$_SESSION['carier'] = $serviceID;
										$_SESSION['phone'] = $phone;
										
										$_SESSION['transid'] = $uid;
										$_SESSION['plan'] = $Dataplan;
										$_SESSION['variation_code'] = $Dataplan;
										
									
											$dat = date("d/m/Y");
											
											$token = uniqid();
											$stat = "pending";
											
										
										
										
										//mtn Data
		if($serviceID == '01' && $Dataplan == '1000'  ){
		
		$amount = $mtnA;
		
		$valu = "MTN 1 GB ";
		
		
			
			}elseif($serviceID == '01' && $Dataplan == '2000' ){
				
    		$amount = $mtnB;
    		
    		$valu = "MTN 2 GB ";
			
				}elseif($serviceID == '01' && $Dataplan == '3500' ){
					
				$amount = $mtnC;
				
				$valu = "MTN 2.5 GB ";
				
					}elseif($serviceID == '01' && $Dataplan == '5000' ){
						
						$amount = $mtnD;
						
						$valu = "MTN 5 GB ";
						
			}elseif($serviceID == '01' && $Dataplan == '10000.01'){	
										
			        $amount = $mtnE;
			        
			        $valu = "MTN 10 GB ";
					}
				elseif($serviceID == '01' && $Dataplan == '22000.01' ){
						
					$amount = $mtnF;
					
					$valu = "MTN 22 GB ";
						}
						
						
					// airtel Data	
						
						elseif($serviceID == '04' && $Dataplan == '1500.01' ){
							
						$amount = $airtelA;	
						
						$valu = "Airtel 1.5 GB ";
							
							}
						elseif($serviceID == '04' && $Dataplan == '3500.01' ){
								
							$amount = $airtelB;	
							
							$valu = "Airtel 3.5 GB ";
								}
						elseif($serviceID == '04' && $Dataplan == '7000.01'){
								
							$amount = $airtelC;	
							
							$valu = "Airtel 7 GB ";
								
							}
							elseif($serviceID == '04' && $Dataplan == '10000.01'){
								
							$amount = $airtelD;	
							
							$valu = "Airtel 10 GB ";
								
							}
							
							elseif($serviceID == '04' && $Dataplan == '16000.01'){
								
							$amount = $airtelE;	
							
							$valu = "Airtel 16 GB ";
								
							}
							elseif($serviceID == '04' && $Dataplan == '22000.01'){
								
							$amount = $airtelF;	
							
							$valu = "Airtel 22 GB ";
								
							}
							
						//glo data	
							
							elseif($serviceID == '02' && $Dataplan == '1600.01'){
								
							$amount = $gloA;
							
							$valu = "Glo 2 GB ";
								
							}
							elseif($serviceID == '02' && $Dataplan == '3750.01'){
								
							$amount = $gloB;
							
							$valu = "Glo 4.5 GB ";
								
							}
							elseif($serviceID == '02' && $Dataplan == '5000.01'){
								
							$amount = $gloC;
							
							$valu = "Glo 7.2 GB ";
								
							}
							elseif($serviceID == '02' && $Dataplan == '6000.01'){
								
							$amount = $gloD;
							
							$valu = "Glo 8.7 GB ";
								
							}
							elseif($serviceID == '02' && $Dataplan == '8000.01'){
								
							$amount = $gloE;
							
							$valu = "Glo 12.5 GB ";
								
							}
							elseif($serviceID == '02' && $Dataplan == '12000.01'){
								
							$amount = $gloF;
							
							$valu = "Glo 15 GB ";
								
							}
							elseif($serviceID == '02' && $Dataplan == '16000.01'){
								
							$amount = $gloG;
							
							$valu = "Glo 22 GB ";
								
							}
							elseif($serviceID == '02' && $Dataplan == '30000.01'){
								
							$amount = $gloH;
							
							$valu = "Glo 52.5 GB ";
								
							}
							
							elseif($serviceID == '02' && $Dataplan == '45000.01'){
								
							$amount = $gloI;
							
							$valu = "Glo 62.5 GB ";
								
							}
							
							
							//etisalat data
							
							elseif($serviceID == '03' && $Dataplan == '500.01'){
								
							$amount = $etisalatA;
							
							$valu = "9Mobile 500 MB ";
								
							}
							elseif($serviceID == '03' && $Dataplan == '1000.01'){
								
							$amount = $etisalatB;
							
							$valu = "9Mobile 1 GB ";
								
							}
							elseif($serviceID == '03' && $Dataplan == '1500.01'){
								
							$amount = $etisalatC;
							
							$valu = "9Mobile 1.5 GB ";
								
							}
							elseif($serviceID == '03' && $Dataplan == '2500.01'){
								
							$amount = $etisalatD;
							
							$valu = "9Mobile 2.5 GB ";
								
							}
							elseif($serviceID == '03' && $Dataplan == '4000.01'){
								
							$amount = $etisalatE;
							
							$valu = "9Mobile 4 GB ";
								
							}
							elseif($serviceID == '03' && $Dataplan == '5500.01'){
								
							$amount = $etisalatF;
							
							$valu = "9Mobile 5.5 GB ";
								
							}
							elseif($serviceID == '03' && $Dataplan == '11500.01'){
								
							$amount = $etisalatG;	
							
							$valu = "9Mobile 11.5 GB ";
								
							}
							elseif($serviceID == '03' && $Dataplan == '15000.01'){
								
							$amount = $etisalatH;	
							
							$valu = "9Mobile 15 GB ";
								
							}
							
							elseif($serviceID == '03' && $Dataplan == '27000.01'){
								
							$amount = $etisalatI;
							
							$valu = "9Mobile 27 GB ";
								
							}
							
							
							else{
							
							
							$amount = $Dataplan;	
								
							
								}	

					
									
								$qsel = "INSERT INTO transactions(network,serviceid,vcode,phone,ref,refer,amount,email,status,token,customer,del)VALUES('$valu','$serviceID','$variation','$phone','$uid','$token','$xamount','$username','$stat','$token','$fname $lname','Delete')";	
								
								$sav = $conn->query($qsel);
								
			?>
        <script>						
       window.location="transaction-view/sme-data?<?php echo $uid; ?>#transPreview";
          </script>
         <?php 
											
 
								
                                }	
                                
                       
                                else{
										echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Enter required fields</strong>  
									</div>'; }
									}
									
									
						$query_rec = mysqli_query($conn,"SELECT * FROM sme_data");
			
			$sme = mysqli_fetch_array($query_rec);			
									 ?>
                      
           
                   
                                        <label for="inputText3" class="col-form-label">Please Network To Recharge</label><br>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier"  class="custom-control-input" value="mtn-data" onclick="javascript:showTv();" id="gotv" ><span class="custom-control-label"><img src="assets/images/mtn.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="airtel-data" onclick="javascript:showTv();" id="dstv"><span class="custom-control-label" ><img src="assets/images/airtel.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="glo-data" onclick="javascript:showTv();" id="startimes"><span class="custom-control-label" ><img src="assets/images/glo.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="etisalat-data" onclick="javascript:showTv();" id="9mobile"><span class="custom-control-label" ><img src="assets/images/9mobile.jpg" width="35" height="30"></span>
                                            </label>
                                            
                                       
                                           
                                        <p></p>
                                        <div class="float-center">
                                        <img style="display:none;" id="bigpic" src="bigpic"  width="120" height="90"/>     
                                                   
                                    </div>
                                    
                                   
                                 
                                  <!-- Start GOTV hidden -->       
                              <div class="float-center" id="ifGotv" style="display:none;">                 
                                       <div class="form-group" >
                                          
		 
        <label>Select Bundle:</label>
		
		<select class="form-control" id="IsGotv" required="required" ><option value = "" selected="selected" required="required">Select SME Data Bundle</option>
                <option data-plan="1000" data-amount="<?php echo $sme['mtnA'];?>" data-service="01" >&#x20A6;<?php echo $sme['mtnA'];?> 1GB - 30 days</option>
				<option data-plan="2000" data-amount="<?php echo $sme['mtnB'];?>"  data-service="01">&#x20A6;<?php echo $sme['mtnB'];?> 2GB - 30 days</option>
				
				
                <option data-plan="5000" data-amount="<?php echo $sme['mtnD'];?>" data-service="01" >&#x20A6;<?php echo $sme['mtnD'];?> - 5GB - 30days</option>
                
                   
                
                </select>
		
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
                                                 
		 
        <label>Select Bundle:</label>
		
		<select class="form-control" id="IsDstv" required="required" ><option value = "" selected="selected" required="required">Select SME Data Bundle</option>
                <option data-plan="1500.01" data-amount="<?php echo $sme['airtelA'];?>" data-service="04">Airtel SME Data Bundle - &#x20A6;<?php echo $sme['airtelA'];?> - 1.5GB  - 30 Days</option>
                <option data-plan="3500.01" data-amount="<?php echo $sme['airtelB'];?>" data-service="04">Airtel SME Data Bundle - &#x20A6;<?php echo $sme['airtelB'];?> - 3.5GB - 30 Days</option>
                
                <option data-plan="7000.01" data-amount="<?php echo $sme['airtelC'];?>" data-service="04">Airtel SME Data Bundle - &#x20A6;<?php echo $sme['airtelC'];?> - 7GB - 30 Days</option>
                
                <option data-plan="10000.01" data-amount="<?php echo $sme['airtelD'];?>" data-service="04">Airtel SME Data Bundle - &#x20A6;<?php echo $sme['airtelD'];?> - 10GB - 30 Days</option>
                
                <option data-plan="16000.01" data-amount="<?php echo $sme['airtelE'];?>" data-service="04">Airtel SME Data Bundle - &#x20A6;<?php echo $sme['airtelE'];?> - 16GB - 30 Days</option>
                
                <option data-plan="22000.01" data-amount="<?php echo $sme['airtelF'];?>" data-service="04">Airtel SME Data Bundle - &#x20A6;<?php echo $sme['airtelF'];?> - 22GB  - 30 Days</option>
                
                
                
                </select>
	
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
                                                 
		 
        <label>Select Bundle:</label>
		
		<select class="form-control" id="IsStar" required="required" ><option value = "" selected="selected" required="required">Select SME Data Bundle</option>
                <option data-plan="1600.01" data-amount="<?php echo $sme['gloA'];?>" data-service="02"> Glo SME Data &#x20A6;<?php echo $sme['gloA'];?> -  2GB - 30 day</option>
                
          <option data-plan="3750.01" data-amount="<?php echo $sme['gloB'];?>" data-service="02">Glo SME Data &#x20A6;<?php echo $sme['gloB'];?> -  4.5GB - 30 days</option>
          
          <option data-plan="5000.01" data-amount="<?php echo $sme['gloC'];?>" data-service="02"> Glo SME Data &#x20A6;<?php echo $sme['gloC'];?> -  7.2GB - 30 days</option>
          
          
          <option data-plan="6000.01" data-amount="<?php echo $sme['gloD'];?>" data-service="02">Glo SME Data &#x20A6;<?php echo $sme['gloD'];?> -  8.75GB - 30 days</option>
          
          
          <option data-plan="8000.01" data-amount="<?php echo $sme['gloE'];?>" data-service="02"> Glo SME Data &#x20A6;<?php echo $sme['gloE'];?> -  12.5GB - 30 days</option>
          
          
          <option data-plan="12000.01" data-amount="<?php echo $sme['gloF'];?>" data-service="02">Glo SME Data &#x20A6;<?php echo $sme['gloF'];?> -  15GB - 30 days</option>
          
          
           <option data-plan="16000.01" data-amount="<?php echo $sme['gloG'];?>" data-service="02">Glo SME Data &#x20A6;<?php echo $sme['gloG'];?> -  25GB - 30 days</option>
           
           
            <option data-plan="30000.01" data-amount="<?php echo $sme['gloH'];?>" data-service="02">Glo SME Data &#x20A6;<?php echo $sme['gloH'];?> -  52.5GB - 30 days</option>
            
            
            <option data-plan="45000.01" data-amount="<?php echo $sme['gloI'];?>" data-service="02">Glo SME Data &#x20A6;<?php echo $sme['gloI'];?> -  62.5GB - 30 days</option>
            
            
                
                </select>
	
      </div>


   
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="mobil" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('mobil').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobil').value;">
                                            </div>                   
                                            
                </div>
                <!-- End STARTIMES hidden --> 
                
                
                
           <!-- Start 9Mobile hidden -->       
                              <div class="float-center" id="if9mob" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Select Bundle:</label>
		
		<select class="form-control" id="Is9mob" required="required" ><option value = "" selected="selected" required="required">Select SME Data Bundle</option>
                <option data-plan="500.01" data-amount="<?php echo $sme['etisalatA'];?>" data-service="03">9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatA'];?> - 500MB - 30 Days </option>
                
          <option data-plan="1000.01" data-amount="<?php echo $sme['etisalatB'];?>" data-service="03">9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatB'];?> - 1GB - 30 Days</option>
          
          <option data-plan="1500.01" data-amount="<?php echo $sme['etisalatC'];?>" data-service="03"> 9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatC'];?> - 1.5GB - 30 Days</option>
          
          
          <option data-plan="2500.01" data-amount="<?php echo $sme['etisalatD'];?>" data-service="03">9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatD'];?> - 2.5GB - 30 Days</option>
          
          
          <option data-plan="4000.01" data-amount="<?php echo $sme['etisalatE'];?>" data-service="03"> 9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatE'];?> - 4GB - 30 Days</option>
          
          
          <option data-plan="5500.01" data-amount="<?php echo $sme['etisalatF'];?>" data-service="03">9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatF'];?> - 5.5GB - 30 Days</option>
          
          
           <option data-plan="11500.01" data-amount="<?php echo $sme['etisalatG'];?>" data-service="03">9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatG'];?> - 11.5GB - 30 Days</option>
           
           
            <option data-plan="15000.01" data-amount="<?php echo $sme['etisalatH'];?>" data-service="03">9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatH'];?> - 15GB - 30 Days</option>
            
            
            <option data-plan="27000.01" data-amount="<?php echo $sme['etisalatI'];?>" data-service="03">9mobile SME Data Bundle - &#x20A6;<?php echo $sme['etisalatI'];?> - 27GB - 30 Days</option>
            
         
            
             
              
                </select>
	
      </div>


   
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="9mobil" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('9mobil').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('9mobil').value;">
                                            </div>                   
                                            
                </div>
                <!-- End 9Mobile hidden -->      
                
                
                 <form method="post" action="" >                            
          
                 <input type="hidden" value="" name="plan" id="plan">
		 <input type="hidden" value="" name="service" id="service">
         
         <input type="hidden" value="" name="amount" id="amount">
         
                 
         <input type="hidden" value="" name="tel" id="tele">
                                            
                     <div class="col-sm-6 pl-0">
                           <p class="text-center">
                                                    <button type="submit" name="DataCheck" class="btn btn-rounded btn-primary" >Proceed </button>
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
		
		var sourceOfPicture = "assets/images/Data-mtn.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
	
  $('#IsGotv').change(function(){
	  var selected = $(this).find('option:selected');
	  var amount = selected.data('amount');
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  $('#amount').val(amount);
	  $('#service').val(service);
	  $('#plan').val(plan);
	  
	  }); 
  
    }else document.getElementById('ifGotv').style.display = 'none';
	
	
	if (document.getElementById('dstv').checked) {
        document.getElementById('ifDstv').style.display = 'block';
		
		var sourceOfPicture = "assets/images/Airtel-Data.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
  
  $('#IsDstv').change(function(){
	  var selected = $(this).find('option:selected');
	  var amount = selected.data('amount');
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  $('#amount').val(amount);
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	
		
		}else document.getElementById('ifDstv').style.display = 'none';
	
	if (document.getElementById('startimes').checked) {
        document.getElementById('ifStar').style.display = 'block';
		
		var sourceOfPicture = "assets/images/GLO-Data.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#IsStar').change(function(){
	  var selected = $(this).find('option:selected');
	  var amount = selected.data('amount');
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  $('#amount').val(amount);
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	}
    
	else document.getElementById('ifStar').style.display = 'none';
	


if (document.getElementById('9mobile').checked) {
        document.getElementById('if9mob').style.display = 'block';
		
		var sourceOfPicture = "assets/images/9mobile-Data.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
		
		
		$('#Is9mob').change(function(){
	  var selected = $(this).find('option:selected');
	  var amount = selected.data('amount');
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  $('#amount').val(amount);
	  $('#service').val(service);
	  $('#plan').val(plan);
	  });
		
	}
    
	else document.getElementById('if9mob').style.display = 'none';
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
                                        <h5 class="text-muted">Check Data Balance</h5>
                                        <p class="mb-0"> 
                                        
                                        <img src="assets/images/mtn.jpg" width="35" height="30"></span>  => *461*4# (SME)<hr>
                                            
                                       <img src="assets/images/mtn.jpg" width="35" height="30"></span> => *131*4# (Normal)<hr>
                                           
                                        <img src="assets/images/9mobile.jpg" width="35" height="30"></span> => *228#<hr>
                                            
                                        <img src="assets/images/glo.jpg" width="35" height="30"></span> => *127*0#
                                        <hr>
                                            
                                        <img src="assets/images/airtel.jpg" width="35" height="30"></span> => *140#
                                        
                                        
                                        </p>
                                        
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