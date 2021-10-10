<?php
  

 header('Content-Type : application/json');
  
    require_once('../Connections/db.php');


	// API parameter
    
	if(isset($_REQUEST['apikey']) ){
	
	$apikey = $_REQUEST['apikey'];
	$auth = "paid";
	
	
	$stat = "Completed";

	
	// check if the account is valid
	
	if(!isset($apikey)){
	    
	    response(107,"BAD REQUEST");} else{
	
	$retr = mysqli_query($conn,"SELECT * FROM users WHERE apikey='$apikey' ");
	
	$rob = mysqli_fetch_array($retr);
	
	
	$user = $rob['apikey'];
	
	$aut = $rob['level'];
	
	$arr = array("$apikey","$auth");
	
	$pair = array("$user","$aut");	
	
	if($arr === $pair){
	    
	    // check if the user have balance
	
		$gb = mysqli_query($conn,"SElECT * FROM users WHERE apikey = '$user' ");	
	
	$reco = mysqli_fetch_array($gb);
	
	$blc = $reco['bal'];

	
	response(202, " $blc" );
	
	
	
	
// close account not found
  } 
 else{  
    
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
	
	
	$deko = json_decode($json_response);
	
	echo $deko->status_message;
}
    
    ?>
    
  
   	

