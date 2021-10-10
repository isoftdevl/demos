<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMSFORTH - Mobile Marketing Suite</title>
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
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form  method="post" action="" class="splash-container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Create Free Account</h3>
                <p>Please enter your user information.</p>
                <?php
									
									require('db.php');
									
									if(isset($_POST['sub'])){
										
										$username = $_POST['username'];
										$pass = $_POST['pass'];
										$email = $_POST['email'];
										$phone = $_POST['phone'];
										$fname = $_POST['fname'];
										$lname = $_POST['lname'];
										
										$rowpas = $_POST['pass'];
										$bal = 0;
										
										if(!empty($username) && !empty($pass) && !empty($email)&&!empty($phone) && !empty($fname) && !empty($lname)){
											
										$check = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' OR email='$email' ");
										
										if(mysqli_num_rows($check)> 0){
											
											echo'<div class="alert alert-warning">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Account Already Exist</strong> 
									</div>';
											
											}else{
											
										$inst = "INSERT into user(fname,lname,username,pass,email,phone,balance,rp)VALUES('$fname','$lname','$username','$pass','$email','$phone','$bal','$rowpas')"; 
										
										
										// API REG
										
										$ch = curl_init();
                                    $url = "https://epins.com.ng/ap/api/create/?email=$email&password=$rowpas&firstname=$fname&lastname=$lname&phone=$phone";
                                    curl_setopt($ch, CURLOPT_URL, $url); 
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
                                    $content = trim(curl_exec($ch));
                                    
                                   
                                    
                                    curl_close($ch);
										
									
										if(mysqli_query($conn,$inst) === true){
											
											echo'<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Registration Success!</strong> 
									</div>';
											
											}else{
												echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Something went wrong!</strong> 
									</div>';
												}
												
											}
												
												mysqli_close($conn);
												
											}else{
												echo'<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Enter required field</strong>  
									</div>'; }
										}
									 ?>
            </div>
            <div class="card-body">
                
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="fname" required placeholder="First Name" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="lname" required placeholder="Last Name" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="pass" id="pass" type="password" required placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="phone" required placeholder="Phone">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" name="sub" type="submit">Register My Account</button>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
                
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="index.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>