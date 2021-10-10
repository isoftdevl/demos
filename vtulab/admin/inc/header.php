
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
   <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  
  <!-- Navigation-->
  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script> 
<script type="text/javascript">
$(function() {
  $('.tabs nav a').on('click', function() {
    show_content($(this).index());
  });
  
  show_content(0);

  function show_content(index) {
    // Make the content visible
    $('.tabs .content.visible').removeClass('visible');
    $('.tabs .content:nth-of-type(' + (index + 1) + ')').addClass('visible');

    // Set the tab to selected
    $('.tabs nav a.selected').removeClass('selected');
    $('.tabs nav a:nth-of-type(' + (index + 1) + ')').addClass('selected');
  }
});</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript">
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	setTimeout(function(){ $(".se-pre-con").fadeOut("slow");
	$(window).load(function() {
		// Animate loader off screen
		
	});},1000);  </script>
    
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>    
<link rel="stylesheet" href="menustyle/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="menustyle/script.js"></script> 
 <script>

  $( function() {
    $("#content" ).accordion({icons:{"header": "ui-icon-plus", "activeHeader": "ui-icon-minus"},
    	collapsible:true, active: false
    });
  } );
</script>


  
</head>
	
