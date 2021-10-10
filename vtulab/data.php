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
        <?php 
				include('inc/func.php');
				
					//count rows
					$qr = "SELECT count(*) FROM contact WHERE username='$user'  ";
					
					$res = $conn->query($qr);
					
					$rows = $res->fetch_row();
					
					
					//call count
					$cal = "SELECT count(*) FROM log WHERE username='$user'  ";
					
					$clo = $conn->query($cal);
					
					$clog = $clo->fetch_row();
					
					?>
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
                                <h2 class="pageheader-title"><li class="fa fa-wifi"></li> DATA Bundle </h2>
                        
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
										$service = $_POST['service'];
										$plan = $_POST['plan'];
										$phone = $_POST['tel'];
										$iuc = $_POST['iuc'];
										$variation = $_POST['plan'];
						if(!empty($amount) && !empty($service)&& !empty($phone) ){
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
										$_SESSION['variation_code'] = $plan;
										
									
											$dat = date("d/m/Y");
											
											$token = uniqid();
											$stat = "pending";
											
										
										$pnt = $plan;

					
									
				$qsel = "INSERT INTO transactions(network,serviceid,vcode,meterno,phone,ref,refer,amount,email,status,token)VALUES('$pnt','$service','$variation','$iuc','$phone','$uid','$token','$amount','$username','$stat','$token')";	
								
								$sav = $conn->query($qsel);
								
			?>
        <script>						
       window.location="transaction-view/data?<?php echo $uid; ?>#transPreview";
          </script>
         <?php 
											
 
								
                                }	
                                
                       
                                else{
										echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Enter required fields</strong>  
									</div>'; }
									}
									
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
		
		<select class="form-control" id="IsGotv" required="required" ><option value = "" selected="selected" required="required">Select Data Bundle</option>
                <option data-plan="mtn-10mb-100" data-amount="100" data-service="mtn-data" >&#x20A6;100 75MB - 24hrs</option>
				<option data-plan="mtn-50mb-200" data-amount="200"  data-service="mtn-data">&#x20A6;200 250MB -48hrs</option>
				<option data-plan="mtn-150mb-500" data-amount="500" data-service="mtn-data">&#x20A6;500 750MB - 14 Days</option>
				
                <option data-plan="mtn-100mb-1000" data-amount="1000" data-service="mtn-data" >&#x20A6;1000 1.5GB - 30days</option>
                
                <option data-plan="mtn-500mb-2000" data-amount="2000" data-service="mtn-data" >&#x20A6;2000 3.5GB - 30days</option>
                
                <option data-plan="mtn-100hr-5000" data-amount="5000" data-service="mtn-data" >MTN Data 100 Hours - &#x20A6;5000</option>
                
                </select>
		
      </div>

                
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="mobile" type="phone" class="form-control" name="phone" onKeyDown="javascript:document.getElementById('tele').value = document.getElementById('mobile').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobile').value;">
                                            </div>             
                             
                                            
                </div>
                <!-- End GOTV hidden -->   
                
               
                <!-- Start DSTV hidden -->       
                              <div class="float-center" id="ifDstv" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Select Bundle:</label>
		
		<select class="form-control" id="IsDstv" required="required" ><option value = "" selected="selected" required="required">Select Data Bundle</option>
                <option data-plan="airt-50" data-amount="49.99" data-service="airtel-data">Airtel Data Bundle - &#x20A6;50 - 20MB  - 1Day</option>
                <option data-plan="airt-100" data-amount="99" data-service="airtel-data">Airtel Data Bundle - &#x20A6;100 - 1Day</option>
                
                <option data-plan="airt-200" data-amount="199.03" data-service="airtel-data">Airtel Data Bundle - &#x20A6;200 - 200MB - 3Days</option>
                
                <option data-plan="airt-300" data-amount="299.02" data-service="airtel-data">Airtel Data Bundle - &#x20A6;200 - 200MB - 3Days</option>
                
                <option data-plan="airt-500" data-amount="499" data-service="airtel-data">Airtel Data Bundle - &#x20A6;500 - 750MB - 14 Days</option>
                
                <option data-plan="airt-1500" data-amount="1499.01" data-service="airtel-data">Airtel Data Bundle - &#x20A6;1,500 - 2.5GB + 1GB Night Plan - 30 Days</option>
                
                <option data-plan="airt-2000" data-amount="1999" data-service="airtel-data">Airtel Data Bundle - &#x20A6;2,000 - 3.5GB - 30 Days</option>
                
                <option data-plan="airt-3000" data-amount="2999.02" data-service="airtel-data">Airtel Data Bundle - &#x20A6;3,000 - 5.5GB - 30 Days</option>
                
                <option data-plan="airt-4000" data-amount="3999.01" data-service="airtel-data">Airtel Data Bundle - &#x20A6;4,000 - 7.5GB + 2GB Night Plan - 30 Days</option>
                
                <option data-plan="airt-5000" data-amount="4999" data-service="airtel-data">Airtel Data Bundle - &#x20A6;5,000 - 10GB + 2GB Night Plan - 30 Days</option>
                
                <option data-plan="airt-10000" data-amount="9999" data-service="airtel-data">Airtel Data Bundle - &#x20A6;10,000 - 25GB - 30 Days</option>
                
                
                <option data-plan="airt-15000" data-amount="14999" data-service="airtel-data">Airtel Data Bundle - &#x20A6;15,000 - 40GB - 30 Days</option>
                
                
                <option data-plan="airt-20000" data-amount="19999" data-service="airtel-data">Airtel Data Bundle - &#x20A6;20,000 - 60GB - 30 Days</option>
                
                
                
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
		
		<select class="form-control" id="IsStar" required="required" ><option value = "" selected="selected" required="required">Select Data Bundle</option>
                <option data-plan="glo100" data-amount="100" data-service="glo-data"> Glo Data &#x20A6;100 -  35MB - 1 day</option>
                
          <option data-plan="glo200" data-amount="200" data-service="glo-data">Glo Data &#x20A6;200 -  100MB - 5 days</option>
          
          <option data-plan="glo500" data-amount="500" data-service="glo-data"> Glo Data &#x20A6;500 -  800MB - 10 days</option>
          
          
          <option data-plan="glo1000" data-amount="1000" data-service="glo-data">Glo Data &#x20A6;1000 -  1.6GB - 30 days</option>
          
          
          <option data-plan="glo2000" data-amount="2000" data-service="glo-data"> Glo Data &#x20A6;2000 -  3.75GB - 30 days</option>
          
          
          <option data-plan="glo2500" data-amount="2500" data-service="glo-data">Glo Data &#x20A6;2500 -  5GB - 30 days</option>
          
          
           <option data-plan="glo3000" data-amount="3000" data-service="glo-data">Glo Data &#x20A6;3000 -  6GB - 30 days</option>
           
           
            <option data-plan="glo4000" data-amount="4000" data-service="glo-data">Glo Data &#x20A6;4000 -  8GB - 30 days</option>
            
            
            <option data-plan="glo5000" data-amount="5000" data-service="glo-data">Glo Data &#x20A6;5000 -  12GB - 30 days</option>
            
            
            <option data-plan="glo8000" data-amount="8000" data-service="glo-data">Glo Data &#x20A6;8000 -  16GB - 30 days</option>
            
            
             <option data-plan="glo10000" data-amount="10000" data-service="glo-data">Glo Data &#x20A6;10000 -  23GB - 30 days</option>
             
              <option data-plan="glo15000" data-amount="15000" data-service="glo-data">Glo Data &#x20A6;15000 -  30GB - 30 days</option>
              
              <option data-plan="glo18000" data-amount="18000" data-service="glo-data">Glo Data &#x20A6;18000 -  45GB - 30 days</option>
                
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
		
		<select class="form-control" id="Is9mob" required="required" ><option value = "" selected="selected" required="required">Select Data Bundle</option>
                <option data-plan="eti-100" data-amount="100" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;100 - 40MB - 1Day </option>
                
          <option data-plan="eti-200" data-amount="200" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;200 - 150MB - 7Day</option>
          
          <option data-plan="eti-4000" data-amount="4000" data-service="etisalat-data"> 9mobile Data Bundle - &#x20A6;4000</option>
          
          
          <option data-plan="eti-1000" data-amount="1000" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;1000</option>
          
          
          <option data-plan="eti-500" data-amount="500" data-service="etisalat-data"> 9mobile Data Bundle - &#x20A6;500</option>
          
          
          <option data-plan="eti-10000" data-amount="10000" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;10000</option>
          
          
           <option data-plan="eti-18000" data-amount="18000" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;18,000</option>
           
           
            <option data-plan="eti-27500" data-amount="27500" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;27,500</option>
            
            
            <option data-plan="eti-55000" data-amount="55000" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;55,000</option>
            
            
            <option data-plan="eti-110000" data-amount="110000" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;110,000</option>
            
            
             <option data-plan="eti-8000" data-amount="8000" data-service="etisalat-data">9mobile Data Bundle - &#x20A6;8000</option>
             
              
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
         
         <input type="hidden" value="" name="iuc" id="iuc">
         
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