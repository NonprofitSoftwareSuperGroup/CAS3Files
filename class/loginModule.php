<?php

//Professor login module 


if(isset($_POST['username']) && isset($_POST['password']))
{
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM professor WHERE username='".$username."' AND password='".$password."' LIMIT 1";
        $result = mysql_query($query) or die(mysql_error());

        if(mysql_num_rows($result) == 1){

          echo "Thanks for logging in";

          print "<script>";
          print ' window.open("professorhomepage.php","_self","false") ';
          print "</script>";

          $un = "SELECT * FROM professor WHERE username='".$username."'' LIMIT 1";

        }else{
          echo "invalid login info";
        }

 }
 
 //student login module
if(isset($_POST['otk']) && isset($_POST['courseSelect']))
{
$course = $_POST["courseSelect"];  
$OTK = $_POST["otk"];

$query2 = "SELECT * FROM students WHERE course='".$course."' AND otk='".$OTK."' LIMIT 1";
$result2 = mysql_query($query2) or die(mysql_error());		

    if(mysql_num_rows($result2) == 1)
	{
		session_start();
		$_SESSION['courseName']=$course;
        echo "Thanks for logging in";

        print "<script>";
        print ' window.open("studentConfirmationPage.php","_self","false") ';
        print "</script>";

	}

    else
	{
        echo "invalid login info";
    }
	
}




?>