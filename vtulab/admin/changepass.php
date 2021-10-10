<?php 
session_start();
require('../db.php');
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    						header("location: index.php");
   							 exit;
								}
						
	$user = $_SESSION['user'];
								
	$ins = mysqli_query($conn,"SELECT * FROM users WHERE email='$user' ");
	$data = mysqli_fetch_array($ins);
								
	$email = $data['email'];
	$rowpas = $data['pass'];
	$bal = $data['bal'];
							
	$deps = "SELECT * FROM deposit  ";
	$payment = $conn->query($deps);
	
	define("sitename","Vtoper");
define("footername","vtoper.com");
include('../inc/logo.php');
							
?> 

<?php include('inc/header.php');?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">



  <!-- Navigation-->
 <?php include('inc/nav.php');?>
        
  <!-- Navigation Ends--> 
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
  
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     
      <div class="row">
        <div class="col-12">
          
     
     <h1 class="w3-xxxlarge w3-text-green" align="center"><b>Change Password</b></h1>
       

      <!-- Example Bar Chart Card-->
       
     <?php 
	 
$chek = mysqli_query($conn,"SELECT * FROM administrator WHERE user_id='$user' ");
 
 $pdata = mysqli_fetch_array($chek);
		  		
		if(isset($_POST['reset'])){
			
$oldpwd = $_POST['pwd'];

$newpwd = $_POST['newpwd'];

$userid = $_POST['userid'];


 
 if(!empty($oldpwd) && !empty($newpwd) && !empty($userid)){
 
 if($pdata['pass'] !== $oldpwd ){
	 
echo "<div class='alert alert-danger'>Password Do not match </div>"; 


	 
	 } else{     
	   
	   
$updat = mysqli_query($conn,"UPDATE administrator SET pass='$newpwd',user_id='$userid' WHERE user_id ='$user' ") or die(mysqli_error()); 



echo "<div class='alert alert-success'>Password Changed</div>";

	 }
   
 }else{
	 
	echo "<div class='alert alert-danger'>No Entry made </div>"; 
	 }
       
    } 


			

	 
		?> 
       
  <form action="" method="post" autocomplete = 'off' > 
  
  <div class="form-group">
        <label><strong>Admin Username</strong></label>
		
		 <input type="text" id="userid" name="userid" value="<?php echo $pdata['user_id'];?>"  class="form-control" required>
		
      </div>
  
  <div class="form-group">
        <label><strong>Current Password</strong></label>
		
		 <input type="password" id="pwd" name="pwd"  class="form-control" required>
		
      </div>
  
  <div class="form-group">
        <label><strong>New Password</strong> </label>
		 <input type="password" name="newpwd" id="newpwd" class="form-control" required >
		    
		 <div id="charNum"></div>
		 
      </div> 
      
      
	  
      <button type="submit" id="submit" name="reset" class="btn btn-info">Save Changes</button>
    </form>  
 
             
            </div>
            
          </div>
          <!-- Card Columns Example Social Feed-->    
         </p>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('inc/footer.php');?>