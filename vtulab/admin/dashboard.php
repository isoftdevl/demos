<?php
session_start();
require('../db.php');
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
 header("location: index.php");
 exit;
		}
include('../inc/logo.php');
?>

<?php include('inc/header.php');?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  
  <?php include('inc/nav.php');?>         
        
  <!-- Navigation Ends-->      
        
    
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          
        </li>
        <li class="nav-item dropdown">
         
          
            
           
        </li>
        <li class="nav-item">
         
        </li>
        <li class="nav-item">
        <a class="btn btn-secondary" href="logout.php">Logout</a>
          
        </li>
      </ul>
    </div>
  </nav>
    <?php 
		$user = $_SESSION['user'];
								
		$ins = mysqli_query($conn,"SELECT * FROM users WHERE email='$user' ");
		$data = mysqli_fetch_array($ins);
								
		$email = $data['email'];
		$rowpas = $data['pass'];
		$bal = $data['bal'];
							
								
	?> 
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Administrator/</li>
      </ol>
      <div class="row">
        <div class="col-12">
          
           
       
          <div class="card mb-3">
        <div class="card-header">
        
        
          <button class="alert alert-info"><i class="fa fa-signal"></i> Gateway Balance:
              <b>&#x20A6;<?php
              
        $query_rec = mysqli_query($conn,"SELECT * FROM api_setting");
			
			$apib = mysqli_fetch_array($query_rec); 
			
			$apikey =  $apib['APIkey'];
$host = "https://epins.com.ng/api/balance?apikey=$apikey";

//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);
$result = json_decode($data);

//Close the cURL handle.
curl_close($ch);


$num = $result; echo number_format($num, 2, '.', ',');
          
          ?></b> SMS Balance: <strong><?php 
          
          $data = array(
    
    'username' => $apib['smsUserid'],
    'password' => $apib['smsPass'],
	 'balance' => 'true'
	  
	    
);
# Create a connection
$url = $apib['baseurl'];
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

echo $response;
?></strong></button>   <button class="btn btn-success" onClick="excsv()">Export  CSV</button> <button class="btn btn-danger" onClick="expdf()">Export PDF</button>
        
     
          
          </div>
          
          <script>
              
            function excsv(){
                
            window.location.href="csv_export.php";    
            }  
              
              
               function expdf(){
                
            window.location.href="pdf_export.php";    
            }  
          </script>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</td>
                <th>Email Address</td>
                <th>Phone</td>
                <th>Status</td>
                
                <th>Balance</td>
                <th>Referal</td>
                 <th></td>
                <td></td>
                <td></td>
                
                <td></td>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>Name</td>
                <th>Email Address</td>
                <th>Phone</td>
                <th>Status</td>
                
                <th>Balance</td>
                <th>Referal</td>
                 <th></td>
                <th></td>
                <th></td>
                
                <th></td>
              </tr>
              </tfoot>
              <tbody>
              
             <?php 
			$sql_trans = "SELECT * FROM users  ORDER BY `user_id` DESC";
									
$Show_trans = $conn->query($sql_trans);
										
						while($trow = $Show_trans->fetch_assoc())
											
											{
							
							if($trow['level'] === 'free'){
							    
							    $accType = '<badge class="badge badge-pill badge-danger">Normal</badge>';
							}else{
							    
							    $accType = '<badge class="badge badge-pill badge-success">Reseller</badge>';
							}				
											?> 
              
             
                <tr>
                  <td><?php echo $trow['firstname']; ?> <?php echo $trow['lastname']; ?></td>
                  <td><?php echo $trow['email']; ?></td>
                  <td><?php echo $trow['phone']; ?></td>
                  <td><?php echo $accType; ?> </td>
                  
                  <td><?php echo $trow['currency']; ?> <?php  $num = $trow['bal']; echo number_format($num, 2, '.', ',');?></td>
                  <td><?php echo $trow['currency']; ?> <?php  $num = $trow['refwallet']; echo number_format($num, 2, '.', ',');?></td>
                  
                  <td><a href="credit-member.php?id=<?php echo $trow['accno']; ?>"><?php echo $trow['credit']; ?></a></td>
                   
                  <td><a href="activate.php?email=<?php echo $trow['email']; ?>"><?php echo $trow['activate']; ?></a></td>
                  <td><a href="block.php?email=<?php echo $trow['email']; ?>"><?php echo $trow['block']; ?></a></td>
                  
                   <td><a href="remov.php?email=<?php echo $trow['email']; ?>" onClick="window.confirm('Are you sure you want to delete user? ');"> <?php echo $trow['del']; ?> </a></td>
                  
                </tr>
                
                <?php } ?>
                </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('inc/footer.php');?>

