<?php

//Professor login module 


if(isset($_POST['username']) && isset($_POST['password']))
{
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM professor WHERE username='".$username."' AND password='".$password."' LIMIT 1";
        $result = mysql_query($query) or die(mysql_error());

        if(mysql_num_rows($result) == 1)
		{
			
		  $_SESSION['user']=$username;      //if using professors can only edit questions they created
		  
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
if(isset($_POST['otk']) && isset($_POST['courseSelect']) && isset($_POST['courseSection']))
{
$course = $_POST["courseSelect"];  
$OTK = $_POST["otk"];
$section = $_POST["courseSection"];

$query2 = "SELECT * FROM students WHERE course='".$course."' AND otk='".$OTK."' AND section='".$section."' LIMIT 1";
$result2 = mysql_query($query2) or die(mysql_error());

$row=mysql_fetch_row($result2);//used to get email
//echo $row[1];

    if(mysql_num_rows($result2) == 1)
	{
		$_SESSION['courseName']=$course;//used in surveyAssessment.php
		$_SESSION['section']=$section;//used in surveyAssessment.php
		$_SESSION['email']=$row[1];//used in studentFarewell.php
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
