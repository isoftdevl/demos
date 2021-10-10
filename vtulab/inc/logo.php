<?php 

$qrykey = mysqli_query($conn,"SELECT * FROM settings");

$keydata = mysqli_fetch_array($qrykey);


$sitelogo = $keydata['sitelogo'];

function logo($sitelogo){
	
echo '<img class="logo-img" src="../sitelogo/'.$sitelogo.'"  >';
}

function logo1($sitelogo){
	
echo '<img class="logo-img" src="../../sitelogo/'.$sitelogo.'" ';
}

function logo2($sitelogo){
	
echo '<img class="logo-img" src="sitelogo/'.$sitelogo.'"  >';
}

function logo3($sitelogo){
	
echo '<img class="logo-img" src="sitelogo/'.$sitelogo.'" width="150" >';
}

function gw(){
echo "Don't have API Key yet? <a href='https://epins.com.ng/ap/register.php' style='color:#00F' target='_blank'>Create API Key</a>";
	}

function cp(){
echo "Don't have Coinpayment API Key yet? <a href='https://gocps.net/sfg19sphdczurdh5x45f3gyh4wyf/' style='color:#00F' target='_blank'>Create API Key</a>";
	}	
	
function sm(){
echo "Don't have SMS API Account yet? <a href='http://epins.com.ng/sms/index.php/create-account' style='color:#00F' target='_blank'>Create API Account</a>";
	}	
	
	
?>