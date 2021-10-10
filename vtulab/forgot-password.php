<!doctype html>
<html lang="en">
<?php require('db.php');
include('inc/logo.php');
?>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $_SERVER['SERVER_NAME']; ?></title>
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
            <div class="card-header text-center"><a href="index.php"><?php logo2($sitelogo); ?></a>
            
       <h3>Forgot Password?</h3>     
       <span class="splash-description">Don't worry, we'll send you an email to recover your password.</span>
            
                      <?php
		
		$errorMessage = '';			  
					  
if(isset($_POST["reset"]) ) {	
	
	$para = $_POST['resetpass'];
	
	$qry = "SELECT * FROM users WHERE email='$para' OR phone='$para' ";
	$RunQry =$conn->query($qry);
	
	$data = $RunQry->fetch_row();
	
	$comb = array($data[4],$data[6]);
	
	if(in_array($para, $comb)){
		
		
		function sendmail($to,$subject,$body,$headers){
			
			$from = "ePINs Nigeria<no-reply@".$_SERVER['SERVER_NAME'].">"; //the email address from which this is sent
$to = $data[4]; //the email address you're sending the message to
$subject = "Your Password has arrived"; //the subject of the message

// To send HTML mail, the Content-type header must be set
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "X-Priority: 1\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$body = "<html><body>

<a href='http://".$_SERVER['SERVER_NAME']."'><img src=$img></a><br>

<h3 style='color:#f40;'>Hey $data[3]</h3>

You requested for password recovery on your ePINs Account.<br>

Your Password is: <strong>$data[5]</strong><p>

If you didn't make this request, <br>

kindly contact support@".$_SERVER['SERVER_NAME']." or <br>

Call: <b>08084121526</b><p>

Support Team<br>

<b>".$_SERVER['SERVER_NAME']."</b><br>
<a href='http://".$_SERVER['SERVER_NAME']."'>www.".$_SERVER['SERVER_NAME']."</a> <p>




</body><html>";


//now mail

$send = mail($to,$subject,$body,$headers);

$successMessage = "Password sent to your registered email.";
			
echo '<div  class="alert alert-success col-sm-12">'.$successMessage.'</div>';	
			
			
			}
		
		}else{
			
			$errorMessage = "Account doesn't exist";
			
			echo '<div  class="alert alert-danger col-sm-12">'.$errorMessage.'</div>';
			
			}
		
} 
?>
       
        

                <form method="post" action="">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="resetpass" id="resetpass" type="text" placeholder="Enter Email or Phone Number " autocomplete="off" value="">
                    </div>
                  
                   
                   
                    <button type="submit"  name="reset" class="btn btn-primary btn-lg btn-block">Recover Password</button>
                </form>
                
                
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                   Don't have an account? <a href="register.php" class="footer-link">signup</a></div>
              
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