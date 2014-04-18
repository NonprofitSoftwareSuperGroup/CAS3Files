<?php

if(isset($_POST['otk']) && isset($_POST['courseSelect']))
{
$course = $_POST["courseSelect"];  
$OTK = $_POST["otk"];

$query2 = "SELECT * FROM students WHERE course='".$course."' AND otk='".$OTK."' LIMIT 1";
$result2 = mysql_query($query2) or die(mysql_error());		
$check=mysql_num_rows($result2);

	if($OTK=='' || $course=='')
	{
		$check=2;
	//so invalid statement is displayed on start
	}

    if($check == 1)
	{
		session_start();
		$_SESSION['courseName']=$course;
        echo "Thanks for logging in, now confirm your course";

        print "<script>";
        print ' window.open("studentConfirmationPage.php","_self","false") ';
        print "</script>";

	}

    if($check == 0)
	{
        echo "invalid student login info";
    }
	
}

?>
