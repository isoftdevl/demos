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
                                <h2 class="pageheader-title"><li class="fa fa-book"></li> WAEC PINs </h2>
                        
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
										$phone = $_POST['telNumber'];
										$iuc = $_POST['iuc'];
										$variation_code = $_POST['variation_code'];
										$type = $_POST['transType'];
										
										
						if(!empty($amount) && !empty($service)&& !empty($phone) && !empty($iuc) ){
										$uid = substr(str_shuffle("0123456789678901"), 0, 16);
			
										$_SESSION['amt'] = $amount;
										$_SESSION['carier'] = $service;
										$_SESSION['phone'] = $phone;
										$_SESSION['iuc'] = $iuc;
										$_SESSION['transid'] = $uid;
										$_SESSION['plan'] = $plan;
										$_SESSION['variation_code'] = $variation_code;
										$_SESSION['type'] = $type;
									
											$dat = date("d/m/Y");
											
											$token = uniqid();
											$stat = "pending";
											
										
										
										$pnt = $plan;
						
					
									
					$qsel = "INSERT INTO transactions(network,serviceid,vcode,phone,ref,refer,amount,email,status,token,customer,del)VALUES('$pnt','$service','$variation_code','$phone','$uid','$token','$amount','$username','$stat','$token','$fname $lname','Delete')";	
								
								$sav = $conn->query($qsel);
								
			?>
        <script>						
       window.location="transaction-view/waec?<?php echo $uid; ?>#transPreview";
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
                      
           
                   
                                        <label for="inputText3" class="col-form-label">Please Select Service</label><br>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier"  class="custom-control-input" value="WAEC Result Checker" onclick="javascript:showTv();" id="smiledata" ><span class="custom-control-label"><img src="assets/images/waec-result.jpg" ></span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="voice" onclick="javascript:showTv();" id="voice"><span class="custom-control-label" ><img src="assets/images/waec-reg.jpg" ></span>
                                            </label>
                                           
                                            
                                       
                                           
                                        <p></p>
                                        <div class="float-center">
                                        <img style="display:none;" id="bigpic" src="bigpic" width="250" />     
                                                   
                                    </div>
                                    
                                   
                                 
                                  <!-- Start SmileData hidden -->       
                              <div class="float-center" id="ifData" style="display:none;">                 
                                       <div class="form-group" >
                                          
		 
        <label>WAEC Result Checking PIN</label>
		
		<select class="form-control" id="IsData" required="required" ><option value = "" selected="selected" required="required">Select ExamType</option>
                
  <option data-plan="WAEC Result Checker PIN" data-variation_code="waecdirect" data-amount="900" data-service="waec" >WASSCE</option>
 
                </select>
		
      </div>


      
      <div class="form-group">
          <label for="inputText3" class="col-form-label">Quantity</label>
    <input id="qty" type="text" class="form-control" name="qty" onKeyUp="javacript:document.getElementById('iuc').value = document.getElementById('qty').value;" onSelect="javacript:document.getElementById('iuc').value = document.getElementById('qty').value;">
                                            </div>
                                            
                                         
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="pNumb" type="phone" class="form-control" name="pNumb" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('pNumb').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('pNumb').value;">
                                            </div>             
                             
                                            
                </div>
                <!-- End SmileData hidden -->   
                
               
                <!-- Start SmileVoice hidden -->       
                              <div class="float-center" id="ifVoice" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>WAEC REGISTRATION PIN</label>
		
		<select class="form-control" id="IsVoice" required="required" ><option value = "" selected="selected" required="required" >Please Select ExamType</option>
                 
                 <option data-plan="Smile Voice - 65mins" data-variation_code="516" data-amount="500" data-service="smile-direct" data-trans="voice">Service not available</option>
  
             
   
   
                
                </select>
	
      </div>


                                            
                                          
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Service is not available at the moment. Please check back later </label>
    <input id="mobi" type="hidden" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('mobi').value; document.getElementById('iuc').value = document.getElementById('mobi').value" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobi').value; document.getElementById('iuc').value = document.getElementById('mobi').value">
                                            </div>                
                                              
                                            
                </div>
                <!-- End SmileVoice hidden -->  
                
                 
                
                                                   
                 <form method="post" action="" >                            
          
                 <input type="hidden" value="" name="plan" id="plan">
		 <input type="hidden" value="" name="service" id="service">
         
         <input type="hidden" value="" name="amount" id="amount">
         
         <input type="hidden" value="" name="variation_code" id="variation_code">
         
         <input type="hidden" value="" name="telNumber" id="tele">
         
         <input type="hidden" value="" name="iuc" id="iuc">
         
         <input type="hidden" value="" name="transType" id="transType">
                                            
                     <div class="col-sm-6 pl-0">
                           <p class="text-center">
                                                    <button type="submit" name="disco" class="btn btn-rounded btn-primary" >Proceed </button>
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
    if (document.getElementById('smiledata').checked) {
        document.getElementById('ifData').style.display = 'block';
		
		var sourceOfPicture = "assets/images/WAEC-Result-Checker.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
	
  $('#IsData').change(function(){
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
  
    }else document.getElementById('ifData').style.display = 'none';
	
	
	if (document.getElementById('voice').checked) {
        document.getElementById('ifVoice').style.display = 'block';
		
		var sourceOfPicture = "assets/images/WAEC-Registration.jpg";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
  
  $('#IsVoice').change(function(){
	  var selected = $(this).find('option:selected');
	  var amount = selected.data('amount');
	  var service = selected.data('service');
	  var plan = selected.data('plan');
	  var variation_code = selected.data('variation_code');
	  var trans = selected.data('trans');
	  
	  $('#amount').val(amount);
	  $('#service').val(service);
	  $('#plan').val(plan);
	  $('#variation_code').val(variation_code);
	  $('#transType').val(trans);
	  });
		
	
		
		}else document.getElementById('ifVoice').style.display = 'none';
	
	
	
	
	
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