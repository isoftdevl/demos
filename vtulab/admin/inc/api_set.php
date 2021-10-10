
<?php 

		$apikey = $_REQUEST['epinUsername'];
		
		
	if(!empty($apikey)  ) {	
		
		
	$sql_store = mysqli_query($conn,
	
	"UPDATE api_setting SET APIkey ='$apikey'");	

echo "<div class='alert alert-info'>Settings saved</div>";
	}else{
		
echo "<div class='alert alert-danger'>Field cannot be empty</div>";		
		}
		
	
?>