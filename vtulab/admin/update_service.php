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
          
     
     <h1 class="w3-xxxlarge w3-text-blue" align="center"><b>Update Service</b></h1>
       

      <!-- Example Bar Chart Card-->
       
     <?php 
		   // define variables and set to empty values

 if(isset($_GET['id'])){

	 $id = $_GET['id'];
	 
$qryDesc = mysqli_query($conn,"SELECT * FROM services WHERE serial='$id'");

$dataRec = mysqli_fetch_array($qryDesc);	
$title  =  $dataRec['name'];
$decription  =  $dataRec['description'];
$actionButton = $dataRec['action'];
$img = $dataRec['filename'];
	 }else{
		 
$title  =  "";
$decription  =  "";	
$actionButton = ""; 
$img = ""; 

		 }
		
if(isset($_POST['upd'])){

$servname = $_POST['servname'];

$descr = $_POST['desc'];

$action = $_POST['action'];
  
$store = mysqli_query($conn,"UPDATE services SET name='$servname',description='$descr',action='$action' WHERE serial='$id' ");

 echo "<div class='alert alert-info'>Update Successful. </div> 
 <script>
setTimeout(function(){ document.location='view_service.php' }, 2000);</script>"; 
   
    } 
		
?> 
       
  <form action="" method="post" autocomplete = 'off' > 
  
  <div class="form-group">
        <label><img src="../uploads/<?php echo $img; ?>" width="250" height="130"></label>
	
      </div>
  
  <div class="form-group">
        <label><strong>Service Name</strong></label>
		
		 <input type="text" id="servname" name="servname" value="<?php echo $title; ?>"  class="form-control" required>
		
      </div>
  
 
      
	 <div class="form-group">
        <label><strong>Description</strong></label>
		
		 <textarea name="desc"  class="form-control" ><?php echo $decription; ?></textarea>
		
      </div>

	   <div class="form-group">
        <label><strong>Edit Action Button</strong></label>
		
		 <input type="text" id="action" name="action" value="<?php echo $actionButton;?>"  class="form-control" required>
		
      </div>
<button type="submit" id="submit" name="upd" class="btn btn-info">Update</button>
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