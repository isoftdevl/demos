<?php
   header('Content-Type : application/json');
  
    require_once('../Connections/db.php');


	// API parameter
    
	if(isset($_REQUEST['apikey']) && isset($_REQUEST['service']) && isset($_REQUEST['accountno']) && isset($_REQUEST['vcode']) && isset($_REQUEST['amount']) && isset($_REQUEST['ref'])){
	
	$apikey = $_REQUEST['apikey'];
	$serviceID = $_REQUEST['service'];
	$billersCode = $_REQUEST['accountno'];
	$variation_code = $_REQUEST['vcode'];
	$amount = $_REQUEST['amount'];
	$requestid = $_REQUEST['ref'];
	$auth = "paid";
	$txtadmin = "08084121526";
	
    $dateTime = date('Y-m-d H:m:s');
	
	$convee = '';
	
	$customer = '';
	
	$xname = '';
	
	$action = "Pay";
	
	$email = $user;
	$proc = '_pay-tv';
	$charge = '';
	
	$channel = "API";
	$view = "View";
	
	// check if the account is valid
	
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
	
		$gb = mysqli_query($conn,"SElECT * FROM users WHERE apikey='$apikey' ") or die(mysqli_error());	
	$reco = mysqli_fetch_array($gb);
	
	$blc = $reco['bal'];
	$level = $reco['level'];
	$email = $reco['email'];
	
	$query_com = mysqli_query($conn,"SELECT * FROM billing");
	$rate = mysqli_fetch_array($query_com);
	
	$access = 'free';
	$dstv = $rate['dstv'];
	$gotv = $rate['gotv'];
	$startimes = $rate['startimes'];
	$ikeja = $rate['IkejaElectric'];
		$eko = $rate['EkoElectric'];
		$kano = $rate['Kedc'];
		$jos = $rate['JosElectric'];
		$phed = $rate['Phed'];
		$ibedc = $rate['Ibedc'];
		
		
		if($serviceID === 'gotv' && $level !== $access ){
		
		$per = $gotv;	
			
			}elseif($serviceID === 'dstv' && $level !== $access){
				
			$per = $dstv;	
				}elseif($serviceID === 'startimes' && $level !== $access){
					
				$per = $startimes;	
				
					}elseif($serviceID === 'ikeja-electric' && $level !== $access){
						
						$per = $ikeja;
						
			}elseif($serviceID === 'portharcourt-electric' && $level !== $access){	
										
				$per = $phed;	
					}
				elseif($serviceID === 'ibadan-electric' && $level !== $access){
						
					$per = $ibedc;	
						}
						elseif($serviceID === 'kano-electric' && $level !== $access){
							
						$per = $kano;		
							
							}
						elseif($serviceID === 'jos-electric' && $level !== $access){
								
							$per = $jos;	
								}
						elseif($serviceID === 'eko-electric' && $level !== $access){
								
							$per = $eko;	
								
							}else{
							
							if($level !== $access){
							
							$per = $eko;	
								
								}	
								
								}	
	
	
	$comi = ($per/100)*$amount;
	$debit = $amount-$comi;
	
	
	
	if($debit < $blc ){ 
	    
	    // check if ref number exist
	    
	  $req = mysqli_query($conn,"SElECT * FROM transactions WHERE ref = '$requestid' ") or die(mysqli_error());	
	$nu = mysqli_num_rows($req);

	if($nu == 0){
	    
       // debit account
	  $doupt = mysqli_query($conn,"UPDATE users set bal=$blc-$debit WHERE apikey='$apikey' ") or die(mysqli_error());

		
		if($doupt){
			

$host = "https://epins.com.ng/api/biller?apikey=$apikey&service=$serviceID&accountno=$billersCode&vcode=$variation_code&amount=$amount&ref=$requestid ";

//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);
$resp = json_decode($data);

//Close the cURL handle.
curl_close($ch);			
			

$tok = $resp->description->Token;

$units = $resp->description->Units;

$meterNumber = $resp->description->meterNumber;

$product_name = $resp->description->product_name;



if($resp->code === '101'){
    
$proces = "TRANSACTION SUCCESSFUL"; 

$stat = "Completed";

}else{
 
 $proces = "NETWORK ERROR";    
  
 $stat = "Failed";
}

$add = mysqli_query($conn,"INSERT INTO transactions (network,serviceid,channel,phone,amount,charge,ref,status,date,email) VALUES('$serviceID <br> $tok ','$variation_code','$channel','$billersCode','$debit','$convee','$requestid','$stat','$dateTime','$email')") or die(mysqli_error());



response(101,array("Status"=>$proces,"Token"=>$tok,"Units"=>$units,"meterNumber"=>$meterNumber,"product_name"=>$product_name));




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
    
  
   	

