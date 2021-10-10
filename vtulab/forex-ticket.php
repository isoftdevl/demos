<?php 
session_start();
require('db.php');
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
include('inc/gravatar.php');
include('inc/logo.php');
?> 

<!doctype html>
<html lang="en">
<?php
include('inc/social_icon.php');
?>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta property="og:image" content="https://epins.com.ng/ap/assets/images/lagos-forex.masterclass.jpg"/>  
<meta property="og:title" content="Lagos Forex Masterclass"/>  
<meta property="og:description" content="Learn how to trade forex on your smartphone and make money daily"/> 



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title><?php echo $_SERVER['SERVER_NAME']; ?></title>
    <style>
        
        .responsive {
  width: 75%;
  height: auto;
  
}
 
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard.php"><?php logo2($sitelogo); ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <button  class="btn btn-rounded btn-success" onClick="buy()">Credit Wallet</button>
                            </div>
                            
                            <script>
                            
                            function buy(){    
                        window.location="buy_credit.php";        
                            }
                            </script>
                        </li>
                       
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $grav_url; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $data['firstname'];?> <?php echo $data['lastname'];?> </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
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
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="dashboard.php" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Bulk SMS</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                          <a class="nav-link" href="sendsms.php">Send SMS</a>
                                        </li>
                                        
                                         <li class="nav-item">
                                          <a class="nav-link" href="message-history">Message History</a>
                                        </li>
                                        
                                         <li class="nav-item">
                                          <a class="nav-link" href="#">Register Sender ID</a>
                                        </li>
                                  
                                    </ul>
                                </div>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-tv"></i>TV Payment</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="paytv.php">GOTV</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="paytv.php">DSTV</a>
                                        </li>
                                        
                                         <li class="nav-item">
                                            <a class="nav-link" href="paytv.php">STARTIMES</a>
                                        </li>
                                     
                                    </ul>
                                </div>
                            </li>
                            
                             <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-fw fa-tasks"></i>VTU Airtime</a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="airtime.php">Buy Airtime</a>
                                        </li>
                                      
                                     
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11"><i class="fas fa-fw fa-signal"></i>Data Bundle</a>
                                <div id="submenu-11" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="data.php">MTN Data</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="data.php">Airtel Data</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="data.php">Glo Data</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="data.php">9Mobile Data</a>
                                        </li>
                                      <li class="nav-item">
                                            <a class="nav-link" href="smile.php">Smile Data</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="sme-data.php">SME Data</a>
                                        </li>
                                     
                                    </ul>
                                </div>
                            </li>   
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-fw fa-address-book"></i>Contacts</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Create New List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">View Contacts</a>
                                        </li>
                                     
                                    </ul>
                                </div>
                            </li>
                            
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-money-bill-alt"></i>Credit Wallet</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="buy_credit.php">Credit Wallet</a>
                                        </li>
                                        
                                       
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">New Payment Alert</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </li>
                          
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-tasks"></i> Transactions </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="transaction-history">Transaction History</a>
                                        </li>
                                       
                                  
                                    
                                    </ul>
                                </div>
                            </li>
                            
                          
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-hand-holding-usd"></i>Reseller<span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                      
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Setup Your Own Portal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Request Reseller API</a>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-download"></i>Generate Numbers</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Generate Phone Numbers</a>
                                        </li>
                                      
                                   
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-wrench"></i>Settings</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Change Password</a>
                                        </li>
                                      
                                        
                                         <li class="nav-item">
                                            <a class="nav-link" href="#">Manage Profile</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout" ><i class="fas fa-f fa-power-off"></i>Logout</a>
                                
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
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
                                <h2 class="pageheader-title"><li class="fa fa-signal"></li> Lagos Forex MasterClass </h2>
                        <p class="pageheader-title">Invite a friend and earn 5% Commission  <a href="whatsapp://send?text=Do you know you can turn your smartphone to ATM machine by trading forex. Attend Lagos Forex Masterclass- Lekki Invasion and Learn new trick to profit in the Forex Market. Register here <?php echo $data['reflink']; echo $data['refid'];?>" data-action="share/whatsapp/share"><?php echo $whatsapp; ?> </a> 

<a href="http://www.facebook.com/sharer.php?u=<?php echo $data['reflink'];?><?php echo $data['refid'];?> text=Do you know you can turn your smartphone to ATM machine by trading forex. Attend Lagos Forex Masterclass- Lekki Invasion and Learn new trick to profit in the Forex Market. Register here" target="_blank"><?php echo $facebook; ?> </a>

<!-- Twitter -->
    <a href="https://twitter.com/share?url=<?php echo $data['reflink'];echo $data['refid'];?>&amp;text=Do you know you can turn your smartphone to ATM machine by trading forex. Attend Lagos Forex Masterclass- Lekki Invasion and Learn new trick to profit in the Forex Market. Register here <?php echo $row_access['reflink'];echo $data['refid'];?>&amp;hashtags=epins" target="_blank"><?php echo $twitter; ?> </a>

</p>
                            
                        
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
                                 
                             <h2 class="card-header">Hi <?php echo $data['lastname']?>, </h2>            
                              <p class="card-header">
                              
                              

<span class="float-right">
<img src="assets/images/lagos-forex.masterclass.jpg" width="450" height="250"class="responsive" > </span>

Do you know you can turn your smartphone to ATM machine by trading forex with minimal or zero loss? <br>

Attend Lagos Forex Masterclass- Lekki Invasion and
Learn new tricks to profit big in the Forex Market <br>

trading from your smartphone<br>

Limited Slots Available. Buy Ticket Now


</p>
 
        
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
								        
								
									
									if(isset($_POST['ticket'])){
										
										$username = $_SESSION['user'];
										$amount = $_POST['amount'];
										$service = $_POST['service'];
										$fname = $_POST['fname'];
										$phone = $_POST['tel'];
										$lname = $_POST['lname'];
						if(!empty($amount) && !empty($service)&& !empty($phone) && !empty($lname) ){
										$uid = substr(str_shuffle("0123456789678901"), 0, 16);	
										$_SESSION['amt'] = $amount;
										$_SESSION['service'] = $service;
										$_SESSION['phone'] = $phone;
										$_SESSION['lname'] = $lname;
										$_SESSION['transid'] = $uid;
										$_SESSION['fname'] = $fname;
										
										
									
											$dat = date("d/m/Y");
											
											$token = uniqid();
											$stat = "pending";
											
										// replace comma
		$str1 = $amount;
        $xamount = str_replace( ',', '', $str1);	
												
										
									
								$qsel = "INSERT INTO transactions(network,phone,ref,refer,amount,email,status,token)VALUES('$pnt','$phone','$uid','$token','$amount','$username','$stat','$token')";	
								
								$sav = $conn->query($qsel);
								
			?>
        <script>						
       document.location="transaction-view/ticket?<?php echo $uid; ?>#transPreview";
          </script>
         <?php 
											
 
			
								
                                	}
                                
                       
                                else{
										echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Please Select Ticket Type</strong>  
									</div>'; }
									}
									
									 ?>
                      
           
                   
                                        <label for="inputText3" class="col-form-label">Please Select Ticket Type</label><br>
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier"  class="custom-control-input" value="VIP" onclick="javascript:showTicket(); vip_value() " id="VIP" ><span class="custom-control-label">VIP Ticket</span>
                                            </label>
                                            
                                            
                                            <label class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="carier" class="custom-control-input"value="Regular" onclick="javascript:showTicket(); regular_value()" id="Regular"><span class="custom-control-label" >Regular Ticket</span>
                                            </label>
                                            
                                            
                                            
                                       
                                           
                                        <p></p>
                                        <div class="float-center">
                                        <img style="display:none;" id="bigpic" src="bigpic"  width="120" height="90"/>     
                                                   
                                    </div>
                                    
                                   
                                 
                                  <!-- Start VIP hidden -->       
                              <div class="float-center" id="ifVIP" style="display:none;">                 
                                       <div class="form-group" >
                                
		
		<h1 class="card-header">&#x20A6;10,000</h1>
      </div>
                
                </div>
                <!-- End VIP hidden -->   
                
               
                <!-- Start Regular hidden -->       
                              <div class="float-center" id="ifRegular" style="display:none;">                 
                                       <div class="form-group" >
                                                 
		 
       <h1 class="card-header">&#x20A6;2,000</h1>
		
      </div>

              
                                              
                                            
                </div>
                <!-- End Regular hidden -->  
                
                                             
                 <form method="post" action="" >                            
          
                 <input type="hidden" value="" name="fname" id="fname">
		 <input type="hidden" value="" name="service" id="service">
         
         <input type="hidden" value="" name="amount" id="amount">
         
         <input type="hidden" value="" name="lname" id="lname">
         
         <input type="hidden" value="" name="tel" id="tele">
         
                                            
                     <div class="col-sm-6 pl-0">
                           <p class="text-center">
                                                    <button type="submit" name="ticket" class="btn btn-rounded btn-primary" >Proceed </button>
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

function vip_value()
{
var hidden_field = document.getElementById('amount');
hidden_field.value = '10000';

var hidden_field = document.getElementById('service');
hidden_field.value = 'VIP Ticket - Lagos Forex MasterClass';

var hidden_field = document.getElementById('tele');
hidden_field.value = '<?php echo $data['phone'];?>';

var hidden_field = document.getElementById('lname');
hidden_field.value = '<?php echo $data['lastname']?>';

var hidden_field = document.getElementById('fname');
hidden_field.value = '<?php echo $data['firstname']?>';
}

function regular_value()
{
var hidden_field = document.getElementById('amount');
hidden_field.value = '2000';

var hidden_field = document.getElementById('service');
hidden_field.value = 'Regular Ticket - Lagos Forex MasterClass';

var hidden_field = document.getElementById('tele');
hidden_field.value = '<?php echo $data['phone'];?>';

var hidden_field = document.getElementById('lname');
hidden_field.value = '<?php echo $data['lastname']?>';

var hidden_field = document.getElementById('fname');
hidden_field.value = '<?php echo $data['firstname']?>';
}

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
 
 
 
 function showTicket(){
    if (document.getElementById('VIP').checked) {
        document.getElementById('ifVIP').style.display = 'block';
		
		var sourceOfPicture = "assets/images/vip-ticket.png";
  var img = document.getElementById('bigpic')
  img.src = sourceOfPicture.replace('90x90', '225x225');
  img.style.display = "block";
  
  
 

  
    }else document.getElementById('ifVIP').style.display = 'none';
	
	
	if (document.getElementById('Regular').checked) {
        document.getElementById('ifRegular').style.display = 'block';
		
		var sourceOfPicture = "assets/images/regular-ticket.png";
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
		
	
		
		}else document.getElementById('ifRegular').style.display = 'none';
	
	
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
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © <SCRIPT language=JavaScript><!--
function makeArray() {
     for (i = 0; i<makeArray.arguments.length; i++)
          this[i + 12] = makeArray.arguments[i];
}

var months = new makeArray('January','February','March',
    'April','May','June','July','August','September',
    'October','November','December');

var date = new Date();
var day  = date.getDate();
var month = date.getMonth() + 1;
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;

document.write(year + " " );
//--></SCRIPT> ePINs Nigeria. All rights reserved. 
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script type="text/javascript">
		//datepicker plugin
		//link	
        $(".type_radiobox").on('change', function(){
            $self = $(this);
            $showDropdow = ['corporate', 'transactional'];
            $extra = $('.extra-div');
            if ($showDropdow.indexOf($self.val()) != -1) $extra.removeClass('hidden');
            else $extra.addClass('hidden').find('input').val(""); 
        });
		
	</script>
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>