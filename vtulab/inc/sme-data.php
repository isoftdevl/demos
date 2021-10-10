<?php 

$qryApi = mysqli_query($conn,"SELECT * FROM api_setting");
$apidata = mysqli_fetch_array($qryApi);

$apikey = $apidata['APIkey']; //email address()
$host = "https://epins.com.ng/api/sme-data?apikey=$apikey&service=$network&MobileNumber=$phone&DataPlan=$plan ";

//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$resdata = curl_exec($ch);
$result = json_decode($data);

//Close the cURL handle.
curl_close($ch);




?>