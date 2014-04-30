<?php 
	//get answers from submitAssessment
	$answers = $_POST['answers'];

	// get key from DB
  $query2 = "SELECT Answers FROM answer_keys WHERE Course='".$course."' AND Section='".$section."' LIMIT 1";
  $result2 = mysql_query($query2) or die(mysql_error());

  $key = mysql_fetch_array($result2);

  // loop through key and answers, and compare to find "grade"
  $x = 0;
  $grade = 0;
  while ($x < count($key)) { 
  	if ($key[$x] == $answers[$x])
  	{
  		$grade += (1/count($key))*100;
  		round($grade,2);
  	}
  }	

  //place "grade" in another DB for analysis
  mysql_query("INSERT INTO graded_assessments (Grade), VALUES ($grade)");