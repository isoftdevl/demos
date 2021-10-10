<?php

 $request_dir = $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);	

if(isset($_GET['refid'])){
	
$aff = $_GET['refid'];
	
	}else{
	
	$aff = "system";	
		}				

$qryaff = mysqli_query($conn,"SELECT * FROM users WHERE refid='$aff' ");
$getref = mysqli_fetch_array($qryaff);

if($aff === $getref['refid']){

$refby = " ".$getref['firstname']." ".$getref['lastname']." ";
$refbyid = $getref['refid'];

$invitecount = $getref['refcount'] + 1;

	
	}else{
		
	$refby = "System";	
	$refbyid = "System";
	$refcount = 1;
		}
							
if(isset($_POST['sub'])){
										
									
$pass = $_POST['pass'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$rowpas = $_POST['pass'];
$bal = 0;
										
$level = "free";
$block = "Block";
$activate = "Activate";
$del = "Delete";
$bal = 0;
$cur = "₦";
$log=$_SERVER['REMOTE_ADDR'];
$acctype = "normal";
$country = $_POST['country'];
$accno = mt_rand(1000,100000);

$ref = mt_rand(1000,100000);

$refwallet = 0;
$refid = "Admin";

$pincredit = 0;

$blockpro = '0';

$refcount = 0;

	
if(!empty($pass) && !empty($email) && !empty($phone) && !empty($fname) && !empty($lname)){
	

		
$reflink = 'https://'.$request_dir.'register.php?refid=';
$refunverified = 0;
$refverified = 0;	
	
	
			
			
		// Validate reCAPTCHA box 
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
            // Google reCAPTCHA API secret key 
            $secretKey = $capsec; 
             
            // Verify the reCAPTCHA response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode json data 
            $responseData = json_decode($verifyResponse); 
            
           
			
		// If reCAPTCHA response is valid 
            if($responseData->success){ 
                
											
		$validphone = preg_replace("/[^0-9]/", '', $phone);
		
	
		if(strlen($validphone) == 11)  {									
										//  REG
								
	$check=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' OR phone='$phone' ");//looking through existing usernames
   
    $num = mysqli_num_rows($check);
    
    
    if ($num ==0){ //If there is already such username...

$sql = mysqli_query($conn,"INSERT into users(firstname,lastname,email,pass,phone,level,IPaddress,block,blockpro,activate,del,bal,pincredit,currency,acctype,country,accno,refid,refcount,refby,refwallet,reflink,refunverified,refverified,refbyid,credit) VALUES('$fname','$lname','$email','$pass','$validphone','$level','$log','$block','$blockpro','$activate','$del','$bal','$pincredit','$cur','$acctype','$country','$accno','$ref','$refcount','$refby','$refwallet','$reflink','$refunverified','$refverified','$refbyid','Credit')") or die(mysqli_error());


	
										
echo'<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Account created successfully. Please login to continue</strong> 
									</div>';										

	$updaff = mysqli_query($conn,"UPDATE users SET refcount='$invitecount' WHERE refid='$aff' ");								
									
	// add to mailing list
    
    
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://solutionforth.ipzmarketing.com/api/v1/subscribers",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"status\":\"active\",\"email\":\"$email\",\"name\":\"$fname\",\"group_ids\":[2]}",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "content-type: application/json",
    "x-auth-token: eoaJgH3Nq7FP3BD1i6ocQ17SLVG9FceJVsGHCZzi"
  ),
));

$response = curl_exec($curl);
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$err = curl_error($curl);

curl_close($curl);
									
							
							
							
// send email

$from = "".$_SERVER['SERVER_NAME']."<support@".$_SERVER['SERVER_NAME'].">"; //the email address from which this is sent
$to = "$email"; //the email address you're sending the message to
$subject = "Welcome to ".$_SERVER['SERVER_NAME']." "; //the subject of the message

// To send HTML mail, the Content-type header must be set
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "Return-Path: ".$_SERVER['SERVER_NAME']."<support@".$_SERVER['SERVER_NAME'].">\r\n";
$headers .= "Organization: ".$_SERVER['SERVER_NAME']."\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$message = "

<html>
<head>
<style>
.table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


.button {
  background-color: #008CBA; /* Blue */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 8px;
  cursor: pointer;
  
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}

</style>
</head>

<body>

<img src='https://".$request_dir."/assets/images/logo.png'>

<h3>Hey $fname,</h3>

We are glad to welcome you on Nigeria <br>
most trusted Instant & Automated digital recharge solution.<p> 

We have got lots of stuff to eliminate stress<br>
recharging your devices and in turn put some money <br>
in your wallet while doing so.<p>


<strong>Your login details are as follows:</strong> <p>

<table class='table' >
  
  <tr>
    <td>Login ID</td>
    <td>$email</td>
  </tr>
  <tr>
    <td>Password</td>
    <td> $pass</td>
  </tr>
  
   <tr>
    <td>Account Type</td>
    <td> Normal </td>
  </tr>
  
</table> <p>

".$_SERVER['SERVER_NAME']." give you instant and automated recharge for Airtime, <br>
Internet Data, Gotv, Dstv, Startimes, Electric Token,Smile Internet.<p>

<a href='https://".$_SERVER['SERVER_NAME']."'><button class='button'>Try it Now!</button></a> <br>


<p>
Our support team is standby to assist you wherever you need help.<p>
 
 <strong>Email:</strong> support@".$_SERVER['SERVER_NAME']." 
<p>


Warm Regards, <p>


".$_SERVER['SERVER_NAME']."

</body><html>";

//now mail
$DoMail = mail($to,$subject,$message,$headers);
             	
    
		
		
    }

else {
	
	
	
	echo '<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Account Already Exist!  please login to continue</strong> 
									</div>';
	
}
			// check if phone is valid
			
		}
		else{echo '<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Enter a valid phone number</strong> 
									</div>'; }
									
									
									
            }else{echo '<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Robot verification failed, please try again.</strong> 
									</div>';}							
									
        }else{ echo '<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Please check on the reCAPTCHA box.</strong> 
									</div>';
		
            
        }
									
									
												
											}
												
											else{
												echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Enter required field</strong>  
									</div>'; }
									
									mysqli_close($conn);
										}

?>