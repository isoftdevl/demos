
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
	mtnA='$planA',
	mtnB='$planB',
	mtnC='$planC',
	mtnD='$planD',
	mtnE='$planE',
	mtnF='$planF' 
");	

echo "<div class='alert alert-success'>Settings saved</div>";
	}else{
		
echo "<div class='alert alert-danger'>Field cannot be empty</div>";		
		}
		
	
?>