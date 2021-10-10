<?php 
require('db.php');
include('inc/logo.php');

include('inc/recaptcha.php');
?>
<!doctype html>
<html lang="en">
 
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Create Free account - Nigeria No 1 Mobile Marketing Suite</title>
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <meta property="og:image" content="https://epins.com.ng/vtoper/wp-content/uploads/2020/02/vtu-portal-creator.png"/>
      
<meta property="og:title" content="VTU Portal Creator"/>  
<meta property="og:description" content="Instantly Access The First And Only
VTU Portal Creator Software That Allows
You To SetUp Automated VTU Portal
In Less Than 60 Seconds!"/> 

<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="600" />

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
        <h3 class="mb-1" align="center"><a href="index.php"><?php logo2($sitelogo); ?></a></h3>
        <hr>
                <h3 class="mb-1" align="center">Create Free Account</h3>
                <p align="center">Please enter your user information.</p>
<?php include('inc/reginfo.php');?>
            </div>
            <div class="card-body">
                
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="fname" required placeholder="First Name" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="lname" required placeholder="Last Name" autocomplete="off">
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
                
               
               <!-- Google reCAPTCHA box -->
    <div class="g-recaptcha" data-sitekey="<?php echo $capkey; ?>"></div>
                
                <input name="country" type="hidden" class="form-control" id="country" value="


">
                
                
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" name="sub" type="submit">Create My Account</button>
                </div>
               
                
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="index.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>