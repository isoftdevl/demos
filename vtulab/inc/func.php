<?php 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
header("location: index.php");
   exit;
				}
								
$user = $_SESSION['user'];
								
$ins = mysqli_query($conn,"SELECT * FROM users WHERE email='$user' ");
$data = mysqli_fetch_array($ins);
$fname = $data['firstname'];
$lname = $data['lastname'];								
$email = $data['email'];
$rowpas = $data['pass'];
$level = $data['level'];
$bal = $data['bal'];
$rebid = $data['refbyid'];


$cal = mysqli_query($conn,"SELECT * FROM earnings WHERE user='$user' LIMIT 3 ");
$clog = mysqli_fetch_array($cal);
					
$qrypat = "SELECT * FROM payalert WHERE email='$user' LIMIT 5 ";
$paynoti = $conn->query($qrypat);		
			

$fcal = "SELECT * FROM earnlog WHERE refby='$user' ORDER BY `date` DESC LIMIT 5  ";
$enlog = $conn->query($fcal);					
					
					if($data['level'] === 'free'){
							    
							    $accType = 'Normal';
							}else{
							    
							    $accType = 'Reseller';
							}	
							
$bnk = mysqli_query($conn,"SELECT * FROM bankinfo");
$payinfo = mysqli_fetch_array($bnk);


$sel = "SELECT * FROM contactx WHERE username='$user'  ";
$rc = $conn->query($sel);
											

$sql = "SELECT * FROM deposit WHERE email='$user' ORDER BY `serial` DESC LIMIT 3";
									
$resu = $conn->query($sql);


$service = "SELECT * FROM services ORDER BY RAND() ";
									
$getfil = $conn->query($service);
	
$apikey = substr(str_shuffle("0123456789ABCDEFGHIJklmnopqrstvwxyzAbAcAdAeAfAgAhBaBbBcBdC1C23C3C4C5C6C7C8C9xix2x3"), 0, 60);

$query_rec = mysqli_query($conn,"SELECT * FROM settings");
			
			$settings = mysqli_fetch_array($query_rec);
			
$query_bank = mysqli_query($conn,"SELECT * FROM add_bank");
			
$bank = mysqli_fetch_array($query_bank);

$query_rec = mysqli_query($conn,"SELECT * FROM billing");
$bil = mysqli_fetch_array($query_rec);

$query_com = mysqli_query($conn,"SELECT * FROM commission");
$afi = mysqli_fetch_array($query_com);

$qrefer = mysqli_query($conn,"SELECT * FROM users WHERE refid='$rebid' ");
$datref = mysqli_fetch_array($qrefer);
$affto = $datref['email'];
?>