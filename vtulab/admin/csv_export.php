<?php
include('../db.php'); 

$filename = "Portal_subscribers.csv";
$fp = fopen('php://output', 'w');


$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$dbname' AND TABLE_NAME='users'";
$result = mysql_query($query);
while ($row = mysql_fetch_row($result)) {
	$header[] = $row[0];
}	

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $header);

$query = "SELECT * FROM users";
$result = mysqli_query($query);
while($row = mysqli_fetch_row($result)) {
	fputcsv($fp, $row);
}
exit;
?>