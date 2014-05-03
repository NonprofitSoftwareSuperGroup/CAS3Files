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

  $query = "SELECT * FROM question";//database query
  $result = mysql_query($query) or die(mysql_error());
  $counter = 1;
  $serializedQuestions = array();
  $questionObjects = array();

  while($row = mysql_fetch_array($result)) {//interpret rows
      $serializedQuestions[$counter] = $row['question'];//put serialized questions into the array
      //echo $row['index'] . " " . $row['question'] . " " . $row['course'] . " " . $row['section'];
      //echo "<br>";
      $counter++;
  }
  ?>
  <form action ="studentFarewell.php" method = "POST"><?php
  for($i=1; $i<=count($serializedQuestions);$i++){
    $questionObjects[$i]= unserialize($serializedQuestions[$i]);
    echo "<br>";
    echo $i . ".) " . $questionObjects[$i]->get_question();
    echo "<br>";
    for($y=1; $y<=$questionObjects[$i]->getNumAnswers(); $y++){
      if($y==1){
        echo "A.) "?><input type="checkbox" name="studentAnswer<?php echo $i?>1"> <?php echo $questionObjects[$i]->getAnswer1();
        echo "<br>";
      }

      if($y==2){  
        echo "B.) "?><input type="checkbox" name="studentAnswer<?php echo $i?>2"> <?php echo $questionObjects[$i]->getAnswer2();
        echo "<br>";
      }

      if($y==3){  
        echo "C.) "?><input type="checkbox" name="studentAnswer<?php echo $i?>3"> <?php echo $questionObjects[$i]->getAnswer3();        
        echo "<br>";
      }

      if($y==4){  
        echo "D.) "?><input type="checkbox" name="studentAnswer<?php echo $i?>4"> <?php echo $questionObjects[$i]->getAnswer4();
        echo "<br>";
      }

      if($y==5){  
        echo "E.) "?><input type="checkbox" name="studentAnswer<?php echo $i?>5"> <?php echo $questionObjects[$i]->getAnswer5();        
        echo "<br>";
      }
      
    }
  }
  ?>
  <input class="center button [tiny small large]" type="submit" value = "Submit!">
  </form>
  <?php
  mysql_close($con);
  //$query3 = "DELETE FROM students WHERE email='".$email."' AND section='".$section."' AND course='".$course."' LIMIT 1";
  //$result3 = mysql_query($query3) or die(mysql_error());
  ?>
  	

  </div>

 <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>


<?php include('inc/footer.php'); ?>
