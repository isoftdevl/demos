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
	
	
	$varr = array("545","522","413","546","414","415","525","528","531","543","534","476","358","544","475","359","105","547","128","129","537","540","548","516","517","518");
	
	if(in_array($variation_code,$varr)){
		
	$dateTime = date('Y-m-d H:m:s');	
	$convee = '';
	
	$customer = '';
	
	$xname = '';
	
	$action = "Pay";
	
	$stat = "Completed";
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
	
		$gb = mysqli_query($conn,"SElECT * FROM users WHERE apikey = '$user' ") or die(mysqli_error());	
	$reco = mysqli_fetch_array($gb);
	
	$blc = $reco['bal'];
	$level = $reco['level'];
	$email = $reco['email'];
	
	$query_com = mysqli_query($conn,"SELECT * FROM billing");
	$rate = mysqli_fetch_array($query_com);
	
	$access = 'free';
	$smile = $rate['smile'];
	
	if($serviceID === 'smile-direct' && $level !== $access ){
		
		$per = $smile;	
			
			}
	
	$comi = ($per/100)*$amount;
	$debit = $amount-$comi;
	
	
	
	if($debit < $blc ){ 
	    
	    // check if ref number exist
	    
	  $req = mysqli_query($conn,"SElECT * FROM transactions WHERE ref = '$ref' ") or die(mysqli_error());	
	$nu = mysqli_num_rows($req);

	if($nu == 0){
	    
       // debit account
	  $doupt = mysqli_query($conn,"UPDATE users set bal=$blc-$debit WHERE email='$user' ") or die(mysqli_error());

		
		if($doupt){
	
$host = "https://epins.com.ng/api/smile?apikey=$apikey&service=$serviceID&accountno=$billersCode&vcode=$variation_code&amount=$amount&ref=$requestid ";

//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$resdata = curl_exec($ch);
$result = json_decode($resdata, true);

//Close the cURL handle.
curl_close($ch);

  $add = mysqli_query($conn,"INSERT INTO transactions (network,serviceid,channel,phone,mobile,amount,charge,ref,date,status,email,customer,action,view,process) VALUES('$network $serviceID','$variation_code','$channel','$billersCode','$phone','$debit','$convee','$requestid','$stat','$dateTime',$email','$xname','$action','$view','$proc')") or die(mysqli_error());

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


} 
// close wrong variation code
	} else{
		
	response(407,"MISSING VARIATION CODE"); 
		
		}
// close wrong parameter

	}   else{ 
	   
	   response(400,"INVALID PARAMETER"); 
	       
	       
	   }
	    

function response($status,$status_message)
{
	
	
	$response['code']=$status;
	$response['status_message']=$status_message;
	
	
	$json_response = json_encode($response);
	echo $json_response;
}
    
    ?>
    
  
   	

