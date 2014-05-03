<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>


	<!--  This is a sample question page. -->
<!--  Please check out Foundation 5 framework if you plan on changing any of the visuals -->

<div class="row">
 <div class="small-6 large-2 columns"> Left part of the grid</div>

  <div class="small-6 large-8 columns">
	<?php
		include('class/questionClass.php');
		
		
		$course = $_SESSION['course'];
		$exam = $_SESSION['exam'];
		$section = $_SESSION['section'];
		$numQuestions = $_SESSION['questions'];
		echo "<h3> Professor, please confirm that the information for the " . $exam . " exam of " . $course . "-" . $section . " is all correct<br><br></h3>";
		$questions = array();//array containing the question strings from addQuestions.php
		$answers = array();//array containing the answer strings from addQuestions.php
		$questionObj = array();//array containing question Objects 
		$serializedQuestions = array();//array containing the serialized versions of questions
		$correctAnswers = array();//array containing the correct answers for questions
		$whichAnswersCorrect = array();
		for($i = 1; $i <= $numQuestions; $i++){//loop through numQuestiosn(however many the user put in on last page)
			
			$questions[$i] = $_POST['question' . $i];//assign the question to the question array
			//echo $questions[$i];
			$questionObj[$i]= new Question($questions[$i]);
			for($y = 1; $y <= 5; $y++){
				$answers[$i][$y] = $_POST['answer' . $i.$y];//get answers from form and add them to question object
				if($y==1){
					$questionObj[$i]->setAnswer1($answers[$i][$y]);
					$questionObj[$i]->incrementNumAnswers();
				}
				if($y==2){
					$questionObj[$i]->setAnswer2($answers[$i][$y]);
					$questionObj[$i]->incrementNumAnswers();
				}
				if($y==3){
					$questionObj[$i]->setAnswer3($answers[$i][$y]);
					$questionObj[$i]->incrementNumAnswers();
				}
				if($y==4){
					$questionObj[$i]->setAnswer4($answers[$i][$y]);
					$questionObj[$i]->incrementNumAnswers();
				}
				if($y==5){
					$questionObj[$i]->setAnswer5($answers[$i][$y]);
					$questionObj[$i]->incrementNumAnswers();
				}

				if(isset($_POST['checkbox' . $i.$y])){//if checkbox is clicked
					$whichAnswersCorrect[$i][$y] = $_POST['checkbox' . $i.$y];//save the value(this will correspond to the answer number, so the end result is that each question object has the answer numbers that are correct)
					$x = $i . "." . $y;
					$questionObj[$i]->addCorrectAnswer($x);	
				}
				if(isset($_POST['checkbox' . $i.$y])){
					$correctAnswers[$i][$y] =1;	
				}else
					$correctAnswers[$i][$y] = 0;
				 
			
			}
			$serializedQuestions[$i] = serialize($questionObj[$i]);

			$query = "INSERT INTO question (question, course, section) VALUES ('$serializedQuestions[$i]','$course','$section')";
			$result = mysql_query($query) or die(mysql_error());

			$test = unserialize($serializedQuestions[$i]);
			echo "<br>";
			echo $i. ".)";
			$test->displayQuestion();

			//test to see if objects can be stoerd in session variables
			//echo "<br>";
			//$qOBJ = $_SESSION['qOBJ'];
			//echo $qOBJ->get_question();
			
		
			//echo $questionObj[$i]->get_question();
			//echo "<br>";
			/*$query = "INSERT INTO questionobjects (SerialNum) VALUES ('$serializedQuestions[$i]')";
			$result = mysql_query($query) or die(mysql_error());
			$query = "SELECT * FROM questionobjects";
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result);
			//echo $row['SerialNum'];
			*/
		}
			$serializedAnswerKey = serialize($correctAnswers);
			$query = "INSERT INTO answerkeys (answerKeyArray, course, section) VALUES ('$serializedAnswerKey', '$course', '$section')";
						$result = mysql_query($query) or die(mysql_error());

	?>
	<br>
    <a href="sendEmails.php"><input class="center button [tiny small large]" type="submit" value="Confirm" /></a>

  


  </div>

 <div class="small-12 large-2 columns"> Right part of the grid</div>
</div>


<?php include('inc/footer.php'); ?>
