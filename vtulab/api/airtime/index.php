<?php
  

 header('Content-Type : application/json');
  
    require_once('../Connections/db.php');


	// API parameter
    
	if(isset($_REQUEST['apikey']) && isset($_REQUEST['network']) && isset($_REQUEST['phone']) && isset($_REQUEST['amount']) && isset($_REQUEST['ref'])){
	
	$apikey = $_REQUEST['apikey'];
	$network = $_REQUEST['network'];
	$phone = $_REQUEST['phone'];
	$amount = $_REQUEST['amount'];
	$ref = $_REQUEST['ref'];
	$auth = "paid";
	

	
	$convee = '';
	
	$customer = '';
	
	$xname = '';
	
	$action = "Pay";
	
	
	$email = $user;
	$proc = '_pay-tv';
	$charge = '';
	$billersCode = $phone;
	$serviceID = 'Airtime';
	$channel = "API";
	$view = "View";
	
	// check if the account is valid
	
	if($param){
	    
	    response(107,"BAD REQUEST");} else{
	
	$retr = mysqli_query($conn,"SELECT * FROM users WHERE apikey='$apikey' ");

	$rob = mysqli_fetch_array($retr);
	
	
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
	
	$query_com = mysqli_query($conn,"SELECT * FROM billing");
	$rate = mysqli_fetch_array($query_com);
	
	$access = 'free';
	$airtelvtu = $rate['airtelvtu'];
		$mtnvtu = $rate['mtnvtu'];
		$glovtu = $rate['glovtu'];
		$etisalatvtu = $rate['9mobilevtu'];
		
		if($network === 'mtn' && $level !== $access ){
		
		$per = $mtnvtu;	
		
		$productName = "MTN Airtime VTU";
			
			}elseif($network === 'airtel' && $level !== $access){
				
			$per = $airtelvtu;	
			
			$productName = "Airtel Airtime VTU";
				}elseif($network === 'etisalat' && $level !== $access){
					
				$per = $etisalatvtu;
				$productName = "9Mobile Airtime VTU";
				
					}else{
						
					if($level !== $access){	
					$per = $glovtu;	
					$productName = "Glo Airtime VTU";
					}
						}
	
	$comi = ($per/100)*$amount;
	$debit = $amount-$comi;
	
$dateTime = date('Y-m-d H:m:s');	
	
	if($debit < $blc ){ 
	    
	    // check if ref number exist
	    
	  $req = mysqli_query($conn,"SElECT * FROM transactions WHERE ref = '$ref' ") or die(mysqli_error());	
	
	$nu = mysqli_num_rows($req);

	if($nu == 0){
	    
       // debit account
	  $doupt = mysqli_query($conn,"UPDATE users set bal=$blc-$debit WHERE apikey='$apikey' ") or die(mysqli_error());
		
		
		if($doupt){
	

$host = "https://epins.com.ng/api/airtime?apikey=$apikey&network=$network&phone=$phone&amount=$amount&ref=$ref ";


//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);
$result = json_decode($data);

//Close the cURL handle.
curl_close($ch);
					


if($resp->status === '101'){
    
    $stat = "Completed";
}else{
    $stat = "Failed";
}

 $add = mysqli_query($conn,"INSERT INTO transactions (network,serviceid,channel,phone,amount,charge,ref,date,status,email,view) VALUES('$productName','$serviceID','$channel','$billersCode','$debit','$convee','$ref','$dateTime',' $stat','$email','$view')") or die(mysqli_error());
 

response(101,"TRANSACTION SUCCESSFUL"); 


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
	
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	
	
	$json_response = json_encode($response);
	echo $json_response;
}
    
    ?>
    
  
   	

