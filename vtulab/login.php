<?php
session_start();
require('db.php');
include('inc/logo.php');
$errorMessage = '';
if(isset($_POST["login"]) && !empty($_POST["loginId"])&& !empty($_POST["loginPass"])) {	
$loginId = $_POST['loginId'];
$password = $_POST['loginPass'];
$sqlQuery = "SELECT email,pass FROM users WHERE email='$loginId' AND pass='$password'";
$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
$isValidLogin = mysqli_num_rows($resultSet);	
if($isValidLogin){
if(!empty($_POST["remember"])) {setcookie ("loginId", $loginId, time()+ (10 * 365 * 24 * 60 * 60)); 
setcookie ("loginPass",	$password,	time()+ (10 * 365 * 24 * 60 * 60));} 
else {setcookie ("loginId",""); setcookie ("loginPass","");
		}
$userDetails = mysqli_fetch_assoc($resultSet);
$_SESSION["user"] = $userDetails['email'];
$_SESSION["loggedin"] = true;
$uid = mt_rand(100,10000);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
header('location: dashboard.php?a='.$uid.'');
    
exit;
}
		
} else {		
		$errorMessage = "Invalid login!";		 
}
} else if(!empty($_POST["loginId"])){
	$errorMessage = "Enter Both user and password!";	
}	

?>
<!doctype html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="index.php"><?php logo2($sitelogo); ?></a><span class="splash-description">Please enter your user information.</span>

        <?php if ($errorMessage != '') { ?>
				<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
			<?php } ?>    
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="loginId" id="loginId" type="text" placeholder="Email" autocomplete="off" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="loginPass" id="loginPass" type="password" placeholder="Password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" <?php if(isset($_COOKIE["loginId"])) { ?> checked <?php } ?>><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit"  name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
                
                
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="register.php" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="forgot-password.php" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>