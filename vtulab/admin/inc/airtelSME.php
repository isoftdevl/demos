
<?php 
		$planA = $_POST['a'];
		$planB = $_POST['b'];
		$planC = $_POST['c'];
		$planD = $_POST['d'];
		$planE = $_POST['e'];
		$planF = $_POST['f'];
		
		
	if(!empty($planA) && !empty($planB) && !empty($planC) && !empty($planD) && !empty($planE) && !empty($planF)) {	
		
		
	$sql_store = mysqli_query($conn,
	
	"UPDATE sme_data SET
	airtelA='$planA',
	airtelB='$planB',
	airtelC='$planC',
	airtelD='$planD',
	airtelE='$planE',
	airtelF='$planF' 
");	

echo "<div class='alert alert-success'>Settings saved</div>";
	}else{
		
echo "<div class='alert alert-danger'>Field cannot be empty</div>";		
		}
		
	
?>