<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample question page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 <div class="small-6 large-2 columns"> Left part of the grid</div>

  <div class="small-6 large-8 columns">
  <h1> PAGE CONTENT GOES IN HERE! </h1>
  <?php 
  $email = $_SESSION['email'];  //use to set used to delete row
  $course = $_SESSION['courseName'];
  $section = $_SESSION['section'];
  echo $email;
  echo $course;
  echo $section;
  
  $query3 = "DELETE FROM students WHERE email='".$email."' AND section='".$section."' AND course='".$course."' LIMIT 1";
  $result3 = mysql_query($query3) or die(mysql_error());
  ?>

  <?php 
	//get answers from submitAssessment
	$answers = $_POST['answers'];

	// get key from DB
  $query2 = "SELECT Answers FROM answer_keys WHERE Course='".$course."' AND Section='".$section."' LIMIT 1";
  $result2 = mysql_query($query2) or die(mysql_error());

  $x = 0;
  while ($fetched = mysql_fetch_array($result2))
    {
      $keyarray = unserialize($fetched['Serials']);
      while ($x < count($keyarray))
      {
        $key[$x] = $keyarray[$x];  
      }
    }

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
?>
  	<p> Thank you for participating <br> </p>
  	<h1> Your answers will remain anonymous and will never count against you. <br> 
  		 Please close your browser before walking away.</h1>


  </div>

 <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>


<?php include('inc/footer.php'); ?>