<?php 

$qryApi = mysqli_query($conn,"SELECT * FROM api_setting");
$apidata = mysqli_fetch_array($qryApi);

$apikey = $apidata['APIkey']; 

$host = "https://epins.com.ng/api/airtime?apikey=$apikey&network=$network&phone=$phone&amount=$xamount&ref=$requestId ";


//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$vdata = curl_exec($ch);
$result = json_decode($vdata);

//Close the cURL handle.
curl_close($ch);

?>