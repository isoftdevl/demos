
<?php 

$DbHost = "localhost";

$Dbname = "recharge";

$Dbuser = "root";

$Dbpass = "";

$conn = mysqli_connect("$DbHost","$Dbuser","$Dbpass","$Dbname");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>