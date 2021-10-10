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
                                <h2 class="pageheader-title"><li class="fa fa-wifi"></li> Smile Internet Payment </h2>
                        
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
										$variation_code = $_POST['variation_code'];
										$type = $_POST['transType'];
										
										
						if(!empty($amount) && !empty($service)&& !empty($phone) && !empty($iuc) ){
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
										$_SESSION['variation_code'] = $variation_code;
										$_SESSION['type'] = $type;
									
											$dat = date("d/m/Y");
											
											$token = uniqid();
											$stat = "pending";
											
										
										
										$pnt = " Smile ".$plan."";
										
						if($type === 'voice'){
						
						$_SESSION['customer'] = $result->description->Customer;	
							?>
                            <script>
           window.location="transaction-view/paytv?<?php echo $uid; ?>#transPreview";
                            </script>
                            <?php
							}else{				
										
										
include('inc/verify.php');


					
		if(is_null($result->description->Customer)){
			
			echo'<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Invalid Smile Account Number</strong>  
									</div>'; 
			
			}	else{		
					
									
								$qsel = "INSERT INTO transactions(network,serviceid,vcode,meterno,phone,ref,refer,amount,email,status,token,customer,del)VALUES('$pnt','$service','$variation','$iuc','$phone','$uid','$token','$amount','$username','$stat','$token','$fname $lname','Delete')";	
								
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
                      
           
                   
                                        <label for="inputText3" class="col-form-label">Please Select Smile Service</label><br>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier"  class="custom-control-input" value="SmileData" onclick="javascript:showTv();" id="smiledata" ><span class="custom-control-label"><img src="assets/images/smiledata.png" ></span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="voice" onclick="javascript:showTv();" id="voice"><span class="custom-control-label" ><img src="assets/images/smilevoice.png" ></span>
                                            </label>
                                           
                                            
                                       
                                           
                                        <p></p>
                                        <div class="float-center">
                                        <img style="display:none;" id="bigpic" src="bigpic" />     
                                                   
                                    </div>
                                    
                                   
                                 
                                  <!-- Start SmileData hidden -->       
                              <div class="float-center" id="ifData" style="display:none;">                 
                                       <div class="form-group" >
                                          
		 
        <label>Smile Internet Bundles</label>
		
		<select class="form-control" id="IsData" required="required" ><option value = "" selected="selected" required="required">Select Data Bundle</option>
                
  <option data-plan="Flexi Daily" data-variation_code="545" data-amount="350" data-service="smile-direct" >Flexi Daily - &#x20A6;350</option>
  
  <option data-plan="Midnight 2GB" data-variation_code="413" data-amount="1000" data-service="smile-direct" >Midnight 2GB - &#x20A6;1,000 - 7 days</option>
  
  
  <option data-plan="ValuePlus 1.5GB" data-variation_code="522" data-amount="1000" data-service="smile-direct" >ValuePlus 1.5GB - &#x20A6;1,000 - 30 days</option>
  
	
    <option data-plan="Flexi Weekly" data-variation_code="546" data-amount="1000" data-service="smile-direct" >Flexi Weekly - &#x20A6;1,000 - 7 days</option>			
                
             
         <option data-plan="Midnight 3GB" data-variation_code="414" data-amount="1500" data-service="smile-direct" >Midnight 3GB - &#x20A6;1,500 - 7 days</option>	
         
        <option data-plan="Weekend Only 3GB" data-variation_code="415" data-amount="1500" data-service="smile-direct" >Weekend Only 3GB - &#x20A6;1,500 - 3 days</option> 
         
         <option data-plan="5GB ValuePlus" data-variation_code="525" data-amount="3000" data-service="smile-direct" >5GB ValuePlus - &#x20A6;3,000 - 30 days</option>
         
         
        <option data-plan="7GB ValuePlus" data-variation_code="528" data-amount="4000" data-service="smile-direct" >7GB ValuePlus - &#x20A6;4,000 - 30 days</option> 
        
        
        <option data-plan="11GB ValuePlus" data-variation_code="531" data-amount="5000" data-service="smile-direct" >11GB ValuePlus - &#x20A6;5,000 - 30 days</option>
        
        <option data-plan="Anytime 10GB" data-variation_code="543" data-amount="8000" data-service="smile-direct" >Anytime 10GB - &#x20A6;8,000 - 365 days</option> 
        
        <option data-plan="15GB ValuePlus" data-variation_code="534" data-amount="6000" data-service="smile-direct" >15GB ValuePlus - &#x20A6;6,000 - 30 days</option>
        
         
         <option data-plan="Unlimited Lite" data-variation_code="476" data-amount="10000" data-service="smile-direct" >Unlimited Lite - &#x20A6;10,000 - 30 days</option>
         
     <option data-plan="Bumpa Value 30GB" data-variation_code="358" data-amount="15000" data-service="smile-direct" >Bumpa Value 30GB - &#x20A6;15,000 - 60 days</option>    
         
         <option data-plan="Anytime 20GB" data-variation_code="544" data-amount="16000" data-service="smile-direct" >Anytime 20GB - &#x20A6;16,000 - 365 days</option>  
         
          <option data-plan="Unlimited Premium" data-variation_code="475" data-amount="19800" data-service="smile-direct" >Unlimited Premium - &#x20A6;19,800 - 30 days</option>  
                
          <option data-plan="Bumpa Value 60GB" data-variation_code="359" data-amount="30000" data-service="smile-direct" >Bumpa Value 60GB - &#x20A6;30,000 - 90 days</option>         
                
                <option data-plan="Anytime 50GB" data-variation_code="105" data-amount="36000" data-service="smile-direct" >Anytime 50GB - &#x20A6;36,000 - 365 days</option>    
                
  <option data-plan="Bumpa 80GB" data-variation_code="547" data-amount="40000" data-service="smile-direct" >Bumpa 80GB - &#x20A6;40,000 - 120 days</option>
  
  
  <option data-plan="Anytime 100GB" data-variation_code="128" data-amount="70000" data-service="smile-direct" >Anytime 100GB - &#x20A6;70,000 - 365 days</option>
  
  
  <option data-plan="Anytime 200GB" data-variation_code="129" data-amount="135000" data-service="smile-direct" >Anytime 200GB - &#x20A6;135,000 - 365 days</option>
  
  
  <option data-plan="21GB ValuePlus" data-variation_code="537" data-amount="8000" data-service="smile-direct" >21GB ValuePlus - &#x20A6;8,000 - 30 days</option>                  
  
   <option data-plan="31GB ValuePlus" data-variation_code="540" data-amount="11000" data-service="smile-direct" >31GB ValuePlus - &#x20A6;11,000 - 30 days</option>              
   
   <option data-plan="Unlimited Essential" data-variation_code="548" data-amount="15000" data-service="smile-direct" >Unlimited Essential - &#x20A6;15,000 - 30 days</option>
                
                
                </select>
		
      </div>


      
      <div class="form-group">
          <label for="inputText3" class="col-form-label">Smile Account Number</label>
    <input id="accno" type="text" class="form-control" name="smartno" onKeyUp="javacript:document.getElementById('iuc').value = document.getElementById('accno').value;" onSelect="javacript:document.getElementById('iuc').value = document.getElementById('accno').value;">
                                            </div>
                                            
                                         
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Phone Number</label>
    <input id="mobile" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('mobile').value;" onSelect="javascript:document.getElementById('tele').value = document.getElementById('mobile').value;">
                                            </div>             
                             
                                            
                </div>
                <!-- End SmileData hidden -->   
                
               
                <!-- Start SmileVoice hidden -->       
                              <div class="float-center" id="ifVoice" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
        <label>Smile Voice Package</label>
		
		<select class="form-control" id="IsVoice" required="required" ><option value = "" selected="selected" required="required">Select Voice Package</option>
                 
                 <option data-plan="Smile Voice - 65mins" data-variation_code="516" data-amount="500" data-service="smile-direct" data-trans="voice" >Smile Voice - 65mins - &#x20A6;500 </option>
  
  
  <option data-plan="Voice 135mins" data-variation_code="517" data-amount="1000" data-service="smile-direct" data-trans="voice" >Voice 135mins - &#x20A6;1,000</option>                  
  
   <option data-plan="Voice 430mins" data-variation_code="518" data-amount="3000" data-service="smile-direct" data-trans="voice" >Voice 135mins - &#x20A6;3,000 - 30 days</option>              
   
   
                
                </select>
	
      </div>


                                            
                                          
                                            
              <div class="form-group">
          <label for="inputText3" class="col-form-label">Smile Voice Number</label>
    <input id="phone" type="phone" class="form-control" name="phone" onKeyUp="javascript:document.getElementById('tele').value = document.getElementById('phone').value; document.getElementById('iuc').value = document.getElementById('phone').value" onSelect="javascript:document.getElementById('tele').value = document.getElementById('phone').value; document.getElementById('iuc').value = document.getElementById('phone').value">
                                            </div>                
                                              
                                            
                </div>
                <!-- End SmileVoice hidden -->  
                
                 
                
                                                   
                 <form method="post" action="" >                            
          
                 <input type="hidden" value="" name="plan" id="plan">
		 <input type="hidden" value="" name="service" id="service">
         
         <input type="hidden" value="" name="amount" id="amount">
         
         <input type="hidden" value="" name="variation_code" id="variation_code">
         
         <input type="hidden" value="" name="tel" id="tele">
         
         <input type="hidden" value="" name="iuc" id="iuc">
         
         <input type="hidden" value="" name="transType" id="transType">
                                            
                     <div class="col-sm-6 pl-0">
                           <p class="text-center">
                                                    <button type="submit" name="disco" class="btn btn-rounded btn-primary" onClick="alert('We will validate your smile account ID to be sure everything looks good')" >Proceed </button>
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
		
		var sourceOfPicture = "assets/images/smile-data.jpg";
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
		
		var sourceOfPicture = "assets/images/smile-voice.jpg";
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