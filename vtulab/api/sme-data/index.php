<?php
  

 header('Content-Type : application/json');
  
    require_once('../Connections/db.php');


	// API parameter
    
	if(isset($_REQUEST['apikey']) && isset($_REQUEST['service']) && isset($_REQUEST['MobileNumber']) && isset($_REQUEST['DataPlan']) ){
	
	$apikey = $_REQUEST['apikey'];
	$serviceID = $_REQUEST['service'];
	$MobileNumber = $_REQUEST['MobileNumber'];
	$Dataplan = $_REQUEST['DataPlan'];
	$requestid = mt_rand(3456789123,5678901267);
	
	$auth = "paid";
	
	
$servName = $_SERVER['HTTP_HOST'];
	
	$convee = '';
	
	$customer = '';
	
	$xname = '';
	
	$action = "Pay";
	
	$dateTime = date('Y-m-d H:m:s');
	$email = $user;
	$proc = '_pay-tv';
	$charge = '';
	
	$channel = "API";
	$view = "View";
	
	// check if the account is valid
	
	$query_akey = mysqli_query($conn,"SELECT * FROM api_setting");
	$keyrate = mysqli_fetch_array($query_akey);

$mykey = $keyrate['APIkey'];
	
	if($param){
	    
	    response(107,"BAD REQUEST");} else{
	
	$retr = "SELECT * FROM users WHERE apikey='$apikey' ";
	
	$exe = mysqli_query($conn,$retr);
	$rob = mysqli_fetch_array($exe);
	
	$user = $rob['apikey'];
	$aut = $rob['level'];
	
	$arr = array("$apikey","$auth");
	
	$pair = array("$user","$aut");		
	
	if($arr === $pair){
	    
	    // check if the user have balance
	
		$gb = mysqli_query($conn,"SElECT * FROM users WHERE apikey = '$user' ") or die(mysqli_error());	
	$reco = mysqli_fetch_array($gb);
	
	$blc = $reco['bal'];
	$level = $reco['level'];
	$email = $reco['email'];
	
	$query_com = mysqli_query($conn,"SELECT * FROM sme_data");
	$rate = mysqli_fetch_array($query_com);

	$mtnA = $rate['mtnA'];
	$mtnB = $rate['mtnB'];
	$mtnC = $rate['mtnC'];
	$mtnD = $rate['mtnD'];
	$mtnE = $rate['mtnE'];
	$mtnF = $rate['mtnF'];
	
	
	$airtelA = $rate['airtelA'];
	$airtelB = $rate['airtelB'];
	$airtelC = $rate['airtelC'];
	$airtelD = $rate['airtelD'];
	$airtelE = $rate['airtelE'];
	$airtelF = $rate['airtelF'];
	
	$gloA = $rate['gloA'];
	$gloB = $rate['gloB'];
	$gloC = $rate['gloC'];
	$gloD = $rate['gloD'];
	$gloE = $rate['gloE'];
	$gloF = $rate['gloF'];
	$gloG = $rate['gloG'];
	$gloH = $rate['gloH'];
	$gloI = $rate['gloI'];
	
	
	$etisalatA = $rate['etisalatA'];
	$etisalatB = $rate['etisalatB'];
	$etisalatC = $rate['etisalatC'];
	$etisalatD = $rate['etisalatD'];
	$etisalatE = $rate['etisalatE'];
	$etisalatF = $rate['etisalatF'];
	$etisalatG = $rate['etisalatG'];
	$etisalatH = $rate['etisalatH'];
	$etisalatI = $rate['etisalatI'];
		
		//mtn Data
		if($serviceID == '01' || $Dataplan == '1000'  ){
		
		$amount = $mtnA;
		
		$valu = "MTN 1 GB ";
		
		
			
			}elseif($serviceID == '01' || $Dataplan == '2000' ){
				
    		$amount = $mtnB;
    		
    		$valu = "MTN 2 GB ";
			
				}elseif($serviceID == '01' || $Dataplan == '3500' ){
					
				$amount = $mtnC;
				
				$valu = "MTN 2.5 GB ";
				
					}elseif($serviceID == '01' || $Dataplan == '5000' ){
						
						$amount = $mtnD;
						
						$valu = "MTN 5 GB ";
						
			}elseif($serviceID == '01' || $Dataplan == '10000.01'){	
										
			        $amount = $mtnE;
			        
			        $valu = "MTN 10 GB ";
					}
				elseif($serviceID == '01' || $Dataplan == '22000.01' ){
						
					$amount = $mtnF;
					
					$valu = "MTN 22 GB ";
						}
						
						
					// airtel Data	
						
						elseif($serviceID == '04' || $Dataplan == '1500.01' ){
							
						$amount = $airtelA;	
						
						$valu = "Airtel 1.5 GB ";
							
							}
						elseif($serviceID == '04' || $Dataplan == '3500.01' ){
								
							$amount = $airtelB;	
							
							$valu = "Airtel 3.5 GB ";
								}
						elseif($serviceID == '04' || $Dataplan == '7000.01'){
								
							$amount = $airtelC;	
							
							$valu = "Airtel 7 GB ";
								
							}
							elseif($serviceID == '04' || $Dataplan == '10000.01'){
								
							$amount = $airtelD;	
							
							$valu = "Airtel 10 GB ";
								
							}
							
							elseif($serviceID == '04' || $Dataplan == '16000.01'){
								
							$amount = $airtelE;	
							
							$valu = "Airtel 16 GB ";
								
							}
							elseif($serviceID == '04' || $Dataplan == '22000.01'){
								
							$amount = $airtelF;	
							
							$valu = "Airtel 22 GB ";
								
							}
							
						//glo data	
							
							elseif($serviceID == '02' || $Dataplan == '1600.01'){
								
							$amount = $gloA;
							
							$valu = "Glo 2 GB ";
								
							}
							elseif($serviceID == '02' || $Dataplan == '3750.01'){
								
							$amount = $gloB;
							
							$valu = "Glo 4.5 GB ";
								
							}
							elseif($serviceID == '02' || $Dataplan == '5000.01'){
								
							$amount = $gloC;
							
							$valu = "Glo 7.2 GB ";
								
							}
							elseif($serviceID == '02' || $Dataplan == '6000.01'){
								
							$amount = $gloD;
							
							$valu = "Glo 8.7 GB ";
								
							}
							elseif($serviceID == '02' || $Dataplan == '8000.01'){
								
							$amount = $gloE;
							
							$valu = "Glo 12.5 GB ";
								
							}
							elseif($serviceID == '02' || $Dataplan == '12000.01'){
								
							$amount = $gloF;
							
							$valu = "Glo 15 GB ";
								
							}
							elseif($serviceID == '02' || $Dataplan == '16000.01'){
								
							$amount = $gloG;
							
							$valu = "Glo 22 GB ";
								
							}
							elseif($serviceID == '02' || $Dataplan == '30000.01'){
								
							$amount = $gloH;
							
							$valu = "Glo 52.5 GB ";
								
							}
							
							elseif($serviceID == '02' || $Dataplan == '45000.01'){
								
							$amount = $gloI;
							
							$valu = "Glo 62.5 GB ";
								
							}
							
							
							//etisalat data
							
							elseif($serviceID == '03' || $Dataplan == '500.01'){
								
							$amount = $etisalatA;
							
							$valu = "9Mobile 500 MB ";
								
							}
							elseif($serviceID == '03' || $Dataplan == '1000.01'){
								
							$amount = $etisalatB;
							
							$valu = "9Mobile 1 GB ";
								
							}
							elseif($serviceID == '03' || $Dataplan == '1500.01'){
								
							$amount = $etisalatC;
							
							$valu = "9Mobile 1.5 GB ";
								
							}
							elseif($serviceID == '03' || $Dataplan == '2500.01'){
								
							$amount = $etisalatD;
							
							$valu = "9Mobile 2.5 GB ";
								
							}
							elseif($serviceID == '03' || $Dataplan == '4000.01'){
								
							$amount = $etisalatE;
							
							$valu = "9Mobile 4 GB ";
								
							}
							elseif($serviceID == '03' || $Dataplan == '5500.01'){
								
							$amount = $etisalatF;
							
							$valu = "9Mobile 5.5 GB ";
								
							}
							elseif($serviceID == '03' || $Dataplan == '11500.01'){
								
							$amount = $etisalatG;	
							
							$valu = "9Mobile 11.5 GB ";
								
							}
							elseif($serviceID == '03' || $Dataplan == '15000.01'){
								
							$amount = $etisalatH;	
							
							$valu = "9Mobile 15 GB ";
								
							}
							
							elseif($serviceID == '03' || $Dataplan == '27000.01'){
								
							$amount = $etisalatI;
							
							$valu = "9Mobile 27 GB ";
								
							}
							
							
							else{
							
							
							$amount = $Dataplan;	
								
							
								}	
	      $per = 1.5;
	
		$comi = ($per/100)*$amount;
		
	$debit = $amount-$comi;
	
	
	
	if($debit < $blc ){ 
	    
	    // check if ref number exist
	    
	  $req = mysqli_query($conn,"SElECT * FROM transactions WHERE ref = '$requestid' ") or die(mysqli_error());	
	$nu = mysqli_num_rows($req);

	if($nu == 0){
	    
       // debit account
	  $doupt = mysqli_query($conn,"UPDATE users set bal=$blc-$debit WHERE email='$email' ") or die(mysqli_error());

		
		if($doupt){
		    

$host ="https://epins.com.ng/api/sme-data?apikey=$mykey&service=$serviceID&MobileNumber=$MobileNumber&DataPlan=$Dataplan";

//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$resdata = curl_exec($ch);
$result = json_decode($resdata, true);

//Close the cURL handle.
curl_close($ch);


if($result->code === '101'){
    
    $stat = "Processing";
} else{
    
     $stat = "Failed";
}


$add = mysqli_query($conn,"INSERT INTO transactions (network,serviceid,channel,phone,amount,charge,ref,status,date,email) VALUES('$valu ','$Dataplan','$channel','$MobileNumber','$debit','$convee','$requestid','$stat','$dateTime','$email')") or die(mysqli_error());




response(101,array("Status"=>'TRANSACTION SUCCESSFUL')); 


}else{ response(204,"network error");}

}else{ response(104,"TRANSACTION ID ALREADY EXIST");
    
    
}
}
// echo low balance
else{ 
    
    response(102,"LOW BALANCE"); 


    
} 

// close account not found
} else{  
    
    response(103,"INVALID ACCOUNT"); 


    }


} // close wrong parameter



	}   else{ 
	   
	   response(400,"INVALID PARAMETER"); 
	       
	       
	   }
	    

function response($status,$status_message)
{
	
	
	$response['code']=$status;
	$response['description']=$status_message;
	
	
	$json_response = json_encode($response);
	echo $json_response;
}
    
    ?>
    
  
   	

