<?php

$sev = $_POST['service'];
	$sno = $_POST['iuc'];
	$tp = $_POST['plan'];
								
$qryApi = mysqli_query($conn,"SELECT * FROM api_setting");
$apidata = mysqli_fetch_array($qryApi);

$apikey = $apidata['APIkey']; //email address()

$host = "https://epins.com.ng/api/electric-verify?apikey=$apikey&service=$sev&meterno=$sno ";


//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);
$result = json_decode($data);

//Close the cURL handle.
curl_close($ch);
?>