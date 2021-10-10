
    <?php
  

 header('Content-Type : application/json');
  
    require_once('../Connections/db.php');


	// API parameter
    
	if(isset($_REQUEST['apikey']) && isset($_REQUEST['service']) && isset($_REQUEST['smartNo']) && $_REQUEST['type'] ){
	
	$apikey = $_REQUEST['apikey'];
	
	$serviceID = $_REQUEST['service'];
	$smartNo = $_REQUEST['smartNo'];
	$type = $_REQUEST['type'];
	$auth = "paid";
	
	
	// check if the account is valid

	
	$retr = mysqli_query($conn,"SELECT * FROM users WHERE apikey='$apikey' ");

	$rob = mysqli_fetch_array($retr);
	
	$user = $rob['apikey'];
	$aut = $rob['level'];
	
	$arr = array("$apikey","$auth");
	
	$pair = array("$user","$aut");		
	
	if($arr === $pair){

$host = "https://epins.com.ng/api/merchant-verify?apikey=$apikey&service=$serviceID&smartNo=$smartNo&type=$type ";


//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);
$result = json_decode($data);

//Close the cURL handle.
curl_close($ch);	


$nam = $result->description->Customer;	   

$addr = $result->description->Address;

$metr = $result->description->MeterNumber;

	response(119,array("Customer"=>$nam,"Address"=>$addr,"MeterNumber"=>$metr));
	

	
  } 
  
 else{  
    
    response(103,"INVALID ACCOUNT"); 


    }


} // close wrong parameter



	  else{ 
	   
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
    
  
   	

