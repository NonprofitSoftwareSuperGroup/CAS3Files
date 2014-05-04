<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>
<?php include('class/questionClass.php');?>

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
  echo $section;//get info
  $keyArray = array();//declare the array that will be the answer key

  //WE HAVE TO REMEMBER TO UNCOMMENT THESE LINES BEFORE SUBMITTING BUT THEY MAKE TESTING A PAIN IN THE ASS
  //$query3 = "DELETE FROM students WHERE email='".$email."' AND section='".$section."' AND course='".$course."' LIMIT 1";
  //$result3 = mysql_query($query3) or die(mysql_error());
  //delete student from database once they finished exam
  ?>

  <?php 
   
  // get key from DB
  $query2 = "SELECT * FROM answerkeys WHERE course='".$course."' AND section='".$section."' LIMIT 1";
  $result2 = mysql_query($query2) or die(mysql_error());


  $correctBooleans = array();//this array will keep track of whether the student got the answer correct or not...each index is another question

  while ($fetched = mysql_fetch_array($result2))//unserialize the key
    {
      $keyArray = unserialize($fetched['answerKeyArray']);
    }

  
  $query = "SELECT * FROM question";//get question objects for this assessment
  $result = mysql_query($query) or die(mysql_error());
  $counter = 1;
  $serializedQuestions = array();
  $studentAnswers = array();
  while($row = mysql_fetch_array($result)) {//interpret rows
      $serializedQuestions[$counter] = $row['question'];//put serialized questions into the array
      //echo $row['index'] . " " . $row['question'] . " " . $row['course'] . " " . $row['section'];
      //echo "<br>";
      $counter++;
  }
 $questionObjects = array();
  for($i=1; $i<=count($serializedQuestions);$i++){
    $questionObjects[$i]= unserialize($serializedQuestions[$i]); //unserialize the questions
    $correctBooleans[$i] = true; //initialize to true

    for($y=1; $y<=$questionObjects[$i]->getNumAnswers(); $y++){
      if(isset($_POST['studentAnswer'.$i.$y])){ //interpret the student's answers
        $studentAnswers[$i][$y] = 1;
      } 
      else
        $studentAnswers[$i][$y] = 0;  
              
      if ($studentAnswers[$i][$y] != $keyArray[$i][$y]){//check if the student got the answer correct
        $correctBooleans[$i]=false;
      }

      //these lines were mostly for testing but we could also use them if we wanna show the professor what the student got wrong
      echo "<br>";
      echo "student answer: " . $studentAnswers[$i][$y];
      echo "<br>";
      echo "correct answer: " . $keyArray[$i][$y];
      echo "<br>";


    }
      if($correctBooleans[$i]){  //displays whether the student got the question correct...the code inside should be changed but the if statement will be used
        echo "<b>Student got question " . $i ." correct!</b>"; 
        echo "<br>";
      }
      else{
        echo "Student got question " . $i ." incorrect!";
        echo "<br>";
      }
  }


  $totalPossibleQuestions = count($questionObjects);
  $totalCorrect = 0;
  for($z=1; $z<=$totalPossibleQuestions; $z++){
    if($correctBooleans[$z])
      $totalCorrect++;
  }
  $grade = ($totalCorrect/$totalPossibleQuestions)*100;

  echo "This student's grade was a ". $grade;

  //place "grade" in another DB for analysis
  //mysql_query("INSERT INTO graded_assessments (Grade), VALUES ($grade)");
?>
    <p> Thank you for participating <br> </p>
    <h1> Your answers will remain anonymous and will never count against you. <br> 
       Please close your browser before walking away.</h1>

  </div>

 <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>


<?php include('inc/footer.php'); ?>
