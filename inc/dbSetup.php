
<!-- This file should be included at the top of every page, it sets up the localhost to database -->
<?php


//$db = mysqli_connect("localhost", "student");

//database setup
/*
$host = "localhost";
$user = "root";
$pass = "spoder";
$db = "cas3database";
*/

/*
$host = "us-cdbr-iron-east-01.cleardb.net";
$user = "bc2574e51d0bec";
$pass = "ec60f96d";
$db = "heroku_31258337a5c58ce";
*/

$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

$host = $url["host"];
$user = $url["user"];
$pass = $url["pass"];
$db = substr($url["path"],1);

$con = mysql_connect($host,$user,$pass);
if(!$con){
	die("Cannot Connect: " . mysql_error());
}else{
	//echo "Connected!----";
}
	
mysql_select_db($db,$con);


?>