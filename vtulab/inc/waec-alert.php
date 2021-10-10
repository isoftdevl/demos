<?php 
$billa = array("ikeja-electric","eko-electric","jos-electric","kano-electric","ibadan-electric","portharcourt-electric");					
			
			
			
			if(in_array($network, $billa)){			
									
						$qrysit = mysqli_query($conn,"SELECT * FROM settings");
						$sit = mysqli_fetch_array($qrysit);
					
					$toke = $resp->description->Content;
					$productName = $resp->description->product_name;
					
					
			$qsel = "UPDATE transactions SET network='$productName <br> $toke',serviceid='$productName', status='Completed',token='0',refer='N/A',channel='Wallet' WHERE ref='$tref' ";	
			$sav = $conn->query($qsel);		
					
					
				$sitname = $sit['sitename'];
				$hosturl = $_SERVER['HTTP_HOST'];
									
				// send email

$from = "$sitname<support@$hosturl>"; //the email address from which this is sent
$to = "$email"; //the email address you're sending the message to
$subject = "Welcome to $hosturl "; //the subject of the message

// To send HTML mail, the Content-type header must be set
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "Return-Path: $sitname<support@$hosturl>\r\n";
$headers .= "Organization: $sitname\r\n";
 
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

<img src='https://$hosturl/assets/images/logo.png'>

<h3>Hey $fname,</h3>

Your transaction is succeessful <br>

<strong>Your transaction details are as follows:</strong> <p>

<table class='table' >
  
   <tr>
    <td>Product Name</td>
    <td>$productName</td>
  </tr>
  <tr>
    <td>Serial No</td>
    <td> $toke</td>
  </tr>
  
</table> <p>


If you have any question regarding this transaction please.<p>
 
 <strong>Email:</strong> support@$hosturl 
<p>


Regards, <p>


$hosturl

</body><html>";

//now mail
$DoMail = mail($to,$subject,$message,$headers);
				
				
								
	$qryApi = mysqli_query($conn,"SELECT * FROM api_setting");
$apidata = mysqli_fetch_array($qryApi);

$apikey = $apidata['APIkey']; //email address()

	 $sender = $sitname;
	  $recipient = $phone;
	   $message = 'Hello $fname, Your WAEC PIN is: $toke Thank you! $hosturl ';
	   
                $ch = curl_init();
                $url = "https://epins.com.ng/api/sendsms/?apikey=$apikey&sender=$sender&recipient=$recipient&message=$message";
                curl_setopt($ch, CURLOPT_URL, $url); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, '3');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
                $revers = trim(curl_exec($ch));
                                    
                curl_close($ch);
}

?>