
<!-- This file should be included at the top of every page, it sets up the localhost to database -->
<?php


//$db = mysqli_connect("localhost", "student");

//database setup

$host = "localhost";
$user = "student";
$pass = "";
$db = "cas3database";

	
$con = mysql_connect($host,$user);
if(!$con){
	die("Cannot Connect: " . mysql_error());
}else{
	//echo "Connected!----";
}
	
mysql_select_db($db,$con);


?>