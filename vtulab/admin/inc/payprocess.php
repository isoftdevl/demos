
<?php 
		$paystackpub = $_POST['paystackpub'];
		$paystacksec = $_POST['paystacksec'];
		$flutterpub = $_POST['flutterpub'];
		$fluttersec = $_POST['fluttersec'];
		$payactive =  $_POST['payactive'];
		$bitpub = $_POST['bitpub'];
		$bitsec = $_POST['bitsec'];
	
		if(!empty($payactive)){
	$sql_upd = mysqli_query($conn,
	
	"UPDATE payment SET 
	
paystackSecret='$paystacksec',
paystackpub='$paystackpub',
flutterpub='$flutterpub',
flutterSecret='$fluttersec',
activepay ='$payactive',
bitpub = '$bitpub',
bitsec = '$bitsec'

");	




echo "<div class='alert alert-success'>Settings saved</div>";
	
		}else{
			
echo "<div class='alert alert-warning'>Select Payment Processor</div>";			
			
			}
	
?>