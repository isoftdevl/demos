<?php 
session_start();
require('../db.php');
						
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    						header("location: index.php");
   							 exit;
								}
						
								
								$user = $_SESSION['user'];
								
								$ins = mysqli_query($conn,"SELECT * FROM users WHERE email='$user' ");
								$data = mysqli_fetch_array($ins);
								
								$email = $data['email'];
								$rowpas = $data['pass'];
								$bal = $data['bal'];
							
			$deps = "SELECT * FROM deposit  ";
			$payment = $conn->query($deps);
							
include('../inc/logo.php');							
								
?> 
<?php include('inc/header.php');?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">



  <!-- Navigation-->
 <?php include('inc/nav.php');?>
        
  <!-- Navigation Ends--> 
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
  
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     
      <div class="row">
        <div class="col-12">
          
     
     <h2 class="w3-xxxlarge w3-text-green" align="center"><b>Payment Gateway</b></h2>
       

      <!-- Example Bar Chart Card-->
       
     <?php 
		   // define variables and set to empty values
 
		
		if(isset($_POST['rate'])){
		include('inc/payprocess.php');
		
						}
			
			
			$query_rec = mysqli_query($conn,"SELECT * FROM payment");
			
			$apib = mysqli_fetch_array($query_rec);
			
			if($apib['activepay'] === 'paystack'){
				
				$pstat = "checked";
				$fstat = "unchecked";
				
				}else{
				
				$pstat = "unchecked";
				$fstat = "checked";	
					
					}
		?> 
       
  <form action="" method="post" autocomplete = 'off' > 
  
  
               
         <label class="custom-radio custom-control-inline">
         <input type="radio" id=" payactive" name="payactive"  class="form-control" value="paystack"  <?php echo $pstat; ?> ><span class="custom-control-label"> Paystack</span>
                                            </label>    
                                            
                                            
                                             <label class="custom-radio custom-control-inline">
          <input type="radio" id=" payactive" name="payactive"  class="form-control" value="flutterwave" <?php echo $fstat; ?> > <span class="custom-control-label"> Flutterwave</span>
                                            </label> 
  
  
     <table class="table  margin-tp-10" id="transTable">
                                                                  <tr>
                            <td width="30%"><i class="fa fa-link"></i> Paystack Secret Key</td>
                            <td id="mainService"> <input type="text" name="paystacksec" value="<?php echo $apib['paystackSecret'];?>"  class="form-control" > </td>
                        </tr>
                        
                        
   <tr>
                        <td width="30%"><i class="fa fa-link"></i> Paystack Public Key</td>
                        <td><input type="text"  name="paystackpub" value="<?php echo$apib['paystackpub'];?>"  class="form-control"   > </td>
                    </tr>     
                    
                                         
                                                <tr>
                            <td width="30%"><i class="fa fa-compass"></i> Flutterwave Public Key</td>
                            <td><input type="text"  name="flutterpub"  class="form-control" value="<?php echo $apib['flutterpub'];?>"  > </td>
                        </tr>                   
                                                            <tr>
                        <td width="30%"><i class="fa fa-compass"></i> Flutterwave Secret Key</td>
                        <td><input type="text"  name="fluttersec"  class="form-control" value="<?php echo $apib['flutterSecret'];?>"  ></td>
                    </tr>
                    
                    <tr>
                        <td width="30%"><i class="fa fa-bitcoin"></i> CoinPayment Public Key</td>
                        <td><input type="text"  name="bitpub"  class="form-control" value="<?php echo $apib['bitpub'];?>"  ></td>
                    </tr>
                    
                    <tr>
                        <td width="30%"><i class="fa fa-bitcoin"></i> CoinPayment Private Key </td>
                        <td><input type="text"  name="bitsec"  class="form-control" value="<?php echo $apib['bitsec'];?>"  ></td>
                        
                     
                    </tr>
                    
                    <tr>
                        <td width="30%"> </td>
                        <td><?php cp();?></td>
                        
                     
                    </tr>
                                          
              
                
                            <td colspan="2">
                                                                                            <button type="submit" id="submit" name="rate" class="btn btn-info">Save Settings</button>
                                <div class="pay-button">
                                                                                                                                                                                                                                
                                </div>
                              							               </td>
                        </tr>
                                    </table> 
  
  </form>
  
  
  
                              
        
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('inc/footer.php');?>