<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>
<?php include('class/questionClass.php'); ?>

<div class="row">
<?php


if((isset($_POST['courseSelect']) && isset($_POST['sectionSelect']) && isset($_POST['examSelect']) && isset($_SESSION['user']))||(isset($_SESSION['course']) && isset($_SESSION['section']) && isset($_SESSION['exam'])))// && isset($_SESSION['user'])
{
//echo $_POST['examSelect'];
	if(isset($_POST['courseSelect']) && isset($_POST['sectionSelect']) && isset($_POST['examSelect']))
	{
		
		$course = $_POST['courseSelect'];
		$section = $_POST['sectionSelect'];
		$exam = $_POST['examSelect'];
		//echo $exam;
		
		//set to sessions because the page refreshs to show the prof the edits made
		
		$_SESSION['course']=$course;
		$_SESSION['section']=$section;
		$_SESSION['exam']=$exam;
		
	}
	/*  checks displays answerkeyarray column
		$result4 = mysql_query("SELECT answerkeyarray FROM answerkeys WHERE course='".$_SESSION['course']."' AND section='".$_SESSION['section']."' AND exam ='".$_SESSION['exam']."'") or die(mysql_error());
		$olderKey = mysql_fetch_assoc($result4);
		$older=$olderKey["answerkeyarray"];
		echo $older;*/
	
	function questionClassStorage($editUnserialize, $older)//make the code more readable, used to update the correct answers for a question in the question class
	{
		$edit = serialize($editUnserialize);
		$result2 = mysql_query("UPDATE question SET question='".$edit."' WHERE course='".$_SESSION['course']."' AND question='".$older."' AND section='".$_SESSION['section']."' AND exam ='".$_SESSION['exam']."'") or die(mysql_error());//AND prof='".$_SESSION['user']."')
	}
	
	function keyArrayStorage($key)//used to update the correct answers for a question in the answerkeyarray
	{
		$answerKeys = serialize($key);
		
		$result4 = mysql_query("SELECT answerkeyarray FROM answerkeys WHERE course='".$_SESSION['course']."' AND section='".$_SESSION['section']."' AND exam ='".$_SESSION['exam']."'") or die(mysql_error());
		$olderKey = mysql_fetch_assoc($result4);
		$older=$olderKey["answerkeyarray"];
		
		$result5 = mysql_query("UPDATE answerkeys SET answerkeyarray='".$answerKeys."' WHERE course='".$_SESSION['course']."' AND answerkeyarray='".$older."' AND section='".$_SESSION['section']."' AND exam ='".$_SESSION['exam']."'") or die(mysql_error());
	
	    //echo mysql_error();
		//var_dump($result5);
		//$course = $_SESSION['course'];
		//$section = $_SESSION['section'];
		//$exam = $_SESSION['exam'];
		//$result3 = mysql_query("INSERT INTO answerkeys(answerkeyarray,course,section,exam) VALUES('$answerKeys','$course','$section','$exam')") or die(mysql_error());
		//echo mysql_error();
		//var_dump($result3);
	}
	
	echo '
		 <form action="modify.php" name="questionsandAnswers" method="POST">
		 <div class = "small-3 large-6 columns">	
		 ';
	

	$query = "SELECT question FROM question WHERE course='".$_SESSION['course']."' AND section='".$_SESSION['section']."' AND exam ='".$_SESSION['exam']."'";//AND prof='".$_SESSION['user']."'
	$result = mysql_query($query) or die(mysql_error());
	
	
	if(mysql_num_rows($result)==0)		//sends the professor back if no questions are there to be modified
	{
		echo '
			<script>
			 
			  alert("No questions to be modified in this course and section");
			  window.location = "professorhomepage.php";
			</script>'
			;
	}
	
	
	$i=1;
	while ($row = mysql_fetch_assoc($result)) 
	{
		//echo $row["question"];
		$questions[$i]=unserialize($row["question"]);
		
		//echo $questions->getProf();
		//echo '</br>';
		//echo $_SESSION['user'];
		//echo '</br>';
		
		//if($questions[$i]->getProf()==$_SESSION['user'])     if using professors can only edit questions they created
		//{
		$questions[$i]->displayQuestion();
		
		//var_dump($questions[$i]->getQuestionNum());
		
		$old[$i]= serialize($questions[$i]);
		echo '	
			
        <label> Question:  </label>
         <input type="text" name="question'.$i.'" placeholder="New Question" />
		
		 <label> Answer 1: </label>
		 <input name = "checkbox1'.$i.'" value="1" type="checkbox" />
		 <input type="text" name="answer1'.$i.'" placeholder="New Answer 1" />
		
		 <label> Answer 2: </label>
		 <input name = "checkbox2'.$i.'" value="2" type="checkbox">
		 <input type="text" name="answer2'.$i.'" placeholder="New Answer 2" />

		 <label> Answer 3: </label>
		 <input name = "checkbox3'.$i.'" value="3" type="checkbox">
		 <input type="text" name="answer3'.$i.'" placeholder="New Answer 3" />

		 <label> Answer 4: </label>
		 <input name = "checkbox4'.$i.'" value="4" type="checkbox">
		 <input type="text" name="answer4'.$i.'" placeholder="New Answer 4" />
		 
		 <label> Answer 5: </label>
		 <input name = "checkbox5'.$i.'" value="5" type="checkbox">
		 <input type="text" name="answer5'.$i.'" placeholder="New Answer 5" />

		';
		
		$i++;
		//echo "index is".$i;
		
		/*}    if using professors can only edit questions they created 
		else
		{
		$questions[$i]->displayQuestion();
		$i++;
		}*/
	}
	
	//echo $i;
	
	echo ' 
		<div class="small-6 small-centered columns">
	<input class="center button [tiny small large]" type="submit" value="Edit" />
	        </div>

		</form>
		</div>
		</div>
		';
		
	//echo	$_POST['checkbox1'.'1'.''];
		

	$i2=1;
	$check=false;

	while($i2<$i)
	{
		$checkQuestion = isset($_POST['question'.$i2.'']) && !$_POST['question'.$i2.'']=='';
		$checkAnswer1 = isset($_POST['answer1'.$i2.'']) && !$_POST['answer1'.$i2.'']=='';
		$checkAnswer2 = isset($_POST['answer2'.$i2.'']) && !$_POST['answer2'.$i2.'']=='';
		$checkAnswer3 = isset($_POST['answer3'.$i2.'']) && !$_POST['answer3'.$i2.'']=='';
		$checkAnswer4 = isset($_POST['answer4'.$i2.'']) && !$_POST['answer4'.$i2.'']=='';
		$checkAnswer5 = isset($_POST['answer5'.$i2.'']) && !$_POST['answer5'.$i2.'']=='';
		$checkCheckBox1 = isset($_POST['checkbox1'.$i2.'']);
		$checkCheckBox2 = isset($_POST['checkbox2'.$i2.'']);
		$checkCheckBox3 = isset($_POST['checkbox3'.$i2.'']);
		$checkCheckBox4 = isset($_POST['checkbox4'.$i2.'']);
		$checkCheckBox5 = isset($_POST['checkbox5'.$i2.'']);
		//print_r($checkQuestion);
		
		if($checkQuestion)
		{
			$questions[$i2]->set_question($_POST['question'.$i2.'']);
			//echo $_POST['question'.$i2.''];
			//echo "works Q";
		
			//echo serialize($questions[$i2]);
			
			//echo "<br>";
			
			//echo $old[$i2];
			
			questionClassStorage($questions[$i2],$old[$i2]);
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		if($checkAnswer1)
		{
			$questions[$i2]->setAnswer1($_POST['answer1'.$i2.'']);

			questionClassStorage($questions[$i2],$old[$i2]);
			
			//var_dump($questions[$i2]->getQuestionNum());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		if($checkAnswer2)
		{
			$questions[$i2]->setAnswer2($_POST['answer2'.$i2.'']);

			questionClassStorage($questions[$i2],$old[$i2]);
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		if($checkAnswer3)
		{
			$questions[$i2]->setAnswer3($_POST['answer3'.$i2.'']);

			questionClassStorage($questions[$i2],$old[$i2]);
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		if($checkAnswer4)
		{
			$questions[$i2]->setAnswer4($_POST['answer4'.$i2.'']);

			questionClassStorage($questions[$i2],$old[$i2]);
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		
		if($checkAnswer5)
		{
			$questions[$i2]->setAnswer5($_POST['answer5'.$i2.'']);

			questionClassStorage($questions[$i2],$old[$i2]);
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		//echo $_POST['checkbox1'.$i2.''];
		
		
		if((($checkCheckBox1)||($checkCheckBox2)||($checkCheckBox3)||($checkCheckBox4)||($checkCheckBox5)))
		{
		//echo serialize($questions[$i2]);
		//echo "hi";
			$questions[$i2]->removeCorrectAnswers();
		
			for($i3=1; $i3<6; $i3++)
			{
				$correctAnswers[$i2][$i3]=0;
			}
			

		}
		
		if($checkCheckBox1)
		{
		
			//echo $_POST['checkbox1'.$i2.''];
		
			//echo "the";
			//echo $questions[$i2]->getNumCorrect();
			
			//$questions[$i2]->removeCorrectAnswers();
			
			//var_dump($questions[$i2]->getQuestionNum());
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox1'.$i2.''];
			//echo $box;
			$questions[$i2]->addCorrectAnswer($box);
			//echo "works A5";
			//$questions[$i2]->removeCorrectAnswers($box);
			
			//var_dump($questions[$i2]->getCorrectAnswers());
			
			//echo "<br>";
			//echo serialize($questions[$i2]);
			//echo "<br>";
			//echo $old[$i2];
			
			questionClassStorage($questions[$i2],$old[$i2]);

							
			$correctAnswers[$i2][1] =1;
			//var_dump(serialize($correctAnswers));
			
			keyArrayStorage($correctAnswers);
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);		
		}
		if($checkCheckBox2)
		{
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox2'.$i2.''];

			$questions[$i2]->addCorrectAnswer($box);

			questionClassStorage($questions[$i2],$old[$i2]);
			
			$correctAnswers[$i2][2] =1;	

			keyArrayStorage($correctAnswers);
			$check=true;
			
			
			$old[$i2]=serialize($questions[$i2]);			
		}
		if($checkCheckBox3)
		{
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox3'.$i2.''];

			$questions[$i2]->addCorrectAnswer($box);

			questionClassStorage($questions[$i2],$old[$i2]);

			$correctAnswers[$i2][3] =1;	

			keyArrayStorage($correctAnswers);
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);			
		}
		if($checkCheckBox4)
		{
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox4'.$i2.''];
			//echo $box;
			$questions[$i2]->addCorrectAnswer($box);

			questionClassStorage($questions[$i2],$old[$i2]);

			$correctAnswers[$i2][4] =1;	
			
			keyArrayStorage($correctAnswers);
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);			
		}
		if($checkCheckBox5)
		{
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox5'.$i2.''];

			$questions[$i2]->addCorrectAnswer($box);

			questionClassStorage($questions[$i2],$old[$i2]);

			$correctAnswers[$i2][5] =1;	
			
			keyArrayStorage($correctAnswers);

			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);			
		}
		
		
		if($check==true)
		{
			echo '<meta http-equiv="refresh" content="0">';//refresh page
		}
		
		
		else
		{
			//echo "Nothing was changed";
		}
	$i2++;
	$check=false;
	}	
	
}


else
{
	echo "Select a course, section and if it is entry or exit first";
}


?>
<form action="professorhomepage.php" >
		
<div class="small-7 small-centered columns">
	<input class="center button [tiny small large]" type="submit" value="Professor Home" />
</div>
</form>

<?php include('inc/footer.php'); ?>
