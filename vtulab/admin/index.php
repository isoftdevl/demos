<?php
session_start();
require_once('../db.php');
$errorMessage = '';
if(isset($_POST["login"]) && !empty($_POST["loginId"])&& !empty($_POST["loginPass"])) {	
	$loginId = $_POST['loginId'];
	$password = $_POST['loginPass'];
	$sqlQuery = "SELECT user_id,pass FROM administrator WHERE user_id='$loginId' AND pass='$password'";
	$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
	$isValidLogin = mysqli_num_rows($resultSet);	
	if($isValidLogin){
		if(!empty($_POST["remember"])) {
			setcookie ("loginId", $loginId, time()+ (10 * 365 * 24 * 60 * 60));  
			setcookie ("loginPass",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			setcookie ("loginId",""); 
			setcookie ("loginPass","");
		}
		$userDetails = mysqli_fetch_assoc($resultSet);
		$_SESSION["user"] = $userDetails['user_id'];
		$_SESSION["loggedin"] = true;
		$uid = mt_rand(100,1000);
		if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header('location: dashboard.php?a='.$uid.'');
    exit;
}
		
	} else {		
		$errorMessage = "Incorrect Login Details!";		 
	}
} else if(!empty($_POST["loginId"])){
	$errorMessage = "Enter Both user and password!";	
}	
?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $_SERVER['SERVER_NAME']; ?></title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dar">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><h2 align="center">VTU Portal Administrator</h2></div>
      <div class="card-body">
     


<?php if ($errorMessage != '') { ?>
				<div id="login-alert" class="alert alert-danger"><?php echo $errorMessage; ?></div>                            
			<?php } ?>    
            </div>
            
        <form action="" method="POST" >
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input name="loginId" type="text" class="form-control" id="loginId" placeholder="Enter Username" aria-describedby="textHelp" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="loginPass" type="password" class="form-control" id="loginPass" placeholder="Enter Password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>">
          </div>
          
          <label class="checkbox">
                <input type="checkbox" value="remember-me" name="remember" <?php if(isset($_COOKIE["loginId"])) { ?> checked <?php } ?> > Remember me
                
            </label>
          
            <div class="form-group">
          <input type="submit" value="Login" name="login" class="btn btn-primary btn-lg btn-block">
          </div>
        </form>
        
        
       
        
        <div class="text-center">
          
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
