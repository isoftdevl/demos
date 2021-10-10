<?php
//sms all members
			   $sm = "SELECT phone from users  ";
			  $acc =  mysqli_query($conn,$sm);
			
			
			if(mysqli_num_rows($acc)>0){
		   
		    $sms_array = array();
				
			while($row = mysqli_fetch_assoc($acc)){
			
		   $sms_array[] = $row["phone"];
			}}
			  $send = implode(",",$sms_array);
			  
			  $no = count($sms_array);
			  
$qryApi = mysqli_query($conn,"SELECT * FROM api_setting");
$apidata = mysqli_fetch_array($qryApi);

$apikey = $apidata['APIkey']; //email address()
$sender = 'Admin';	  
		
		if(isset($_POST['btn'])){
				
		$sendto = $_REQUEST['sendto'];
		$txt = $_REQUEST['message'];

$data = array(
    
    'username' => $apidata['smsUserid'],
    'password' => $apidata['smsPass'],
	 'sender' => $sender,
	  'recipient' => $sendto,
	   'message' => $txt
	    
);
# Create a connection
$url = $apidata['baseurl'];
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
			
echo '<div class="alert alert-success">Message Sent</div>';				

}
		
	
?>