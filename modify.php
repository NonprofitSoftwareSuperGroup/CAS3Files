<?php include('inc/header.php'); ?>
<?php include('inc/dbSetup.php'); ?>
<?php include('class/questionClass.php'); ?>

<div class="row">
<?php
/*if(!isset($_SESSION['start']))
{
	$_SESSION['start']=true;
}
if($_SESSION['start']==true)//message should only be displayed once
{
echo '
<script>
 
  alert("Note that checking an answer as correct makes all unckecked answers incorrect");
 
</script>';
}
*/

if((isset($_POST['courseSelect']) && isset($_POST['sectionSelect']))||(isset($_SESSION['course']) && isset($_SESSION['section'])))
{

	if(isset($_POST['courseSelect']) && isset($_POST['sectionSelect']))
	{
	$course = $_POST['courseSelect'];
	$section = $_POST['sectionSelect'];
	
	$_SESSION['course']=$course;
	$_SESSION['section']=$section;
	}
	
	
	echo '
		 <form action="modify.php" name="questionsandAnswers" method="POST">
		 <div class = "small-3 large-6 columns">	
		 ';
	

	$query = "SELECT question FROM question WHERE course='".$_SESSION['course']."' AND section='".$_SESSION['section']."'";
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
	//$first=true;
	while($i2<=$i)
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
			
			$query2 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result2 = mysql_query($query2) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		if($checkAnswer1)
		{
			$questions[$i2]->setAnswer1($_POST['answer1'.$i2.'']);
			//echo "works A1";
			$query3 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result3 = mysql_query($query3) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		if($checkAnswer2)
		{
			$questions[$i2]->setAnswer2($_POST['answer2'.$i2.'']);
			//echo "works A2";
			$query4 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result4 = mysql_query($query4) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		if($checkAnswer3)
		{
			$questions[$i2]->setAnswer3($_POST['answer3'.$i2.'']);
			//echo "works A3";
			$query5 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result5 = mysql_query($query5) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		if($checkAnswer4)
		{
			$questions[$i2]->setAnswer4($_POST['answer4'.$i2.'']);
			//echo "works A4";
			$query6 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result6 = mysql_query($query6) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		
		if($checkAnswer5)
		{
			$questions[$i2]->setAnswer5($_POST['answer5'.$i2.'']);
			//echo "works A5";
			$query7 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result7 = mysql_query($query7) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);
			
		}
		//echo $_POST['checkbox1'.$i2.''];
		
		//echo $first;
		//$first=true;
		
		if((($checkCheckBox1)||($checkCheckBox2)||($checkCheckBox3)||($checkCheckBox4)||($checkCheckBox5)))
		{
		//$first=false;
		//echo serialize($questions[$i2]);
		//echo "hi";
			$questions[$i2]->removeCorrectAnswers();
		}
		
		if($checkCheckBox1)
		{
		
			//echo $_POST['checkbox1'.$i2.''];
		
			//echo "the";
			//echo $questions[$i2]->getNumCorrect();
			
			//$questions[$i2]->removeCorrectAnswers();
			
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
			
			$query8 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result8 = mysql_query($query8) or die(mysql_error());
			
			//var_dump($result8);
			
			//$questions[$i2]->displayQuestion();
			
				//$query22 = "SELECT question FROM question WHERE course='".$_SESSION['course']."' AND section='".$_SESSION['section']."'";
	//$result22 = mysql_query($query22) or die(mysql_error());
	
	//echo $_SESSION['course'];
	//$i4=1;
	//while ($row22 = mysql_fetch_assoc($result22)) 
	//{
		//echo $row["question"];
		//$questions[$i4]=unserialize($row22["question"]);
		//$questions[$i4]->displayQuestion();
	//$i4++;
	//}

	
			
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);		
		}
		if($checkCheckBox2)
		{
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox2'.$i2.''];
			//echo $box;
			$questions[$i2]->addCorrectAnswer($box);
			//echo "works A5";
			$query9 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result9 = mysql_query($query9) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);			
		}
		if($checkCheckBox3)
		{
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox3'.$i2.''];
			//echo $box;
			$questions[$i2]->addCorrectAnswer($box);
			//echo "works A5";
			$query10 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result10 = mysql_query($query10) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);			
		}
		if($checkCheckBox4)
		{
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox4'.$i2.''];
			//echo $box;
			$questions[$i2]->addCorrectAnswer($box);
			//echo "works A5";
			$query11 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result11 = mysql_query($query11) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);			
		}
		if($checkCheckBox5)
		{
			
			$box = $questions[$i2]->getQuestionNum().".".$_POST['checkbox5'.$i2.''];
			//echo $box;
			$questions[$i2]->addCorrectAnswer($box);
			//echo "works A5";
			$query12 = "UPDATE question SET question='".serialize($questions[$i2])."' WHERE course='".$_SESSION['course']."' AND question='".$old[$i2]."' AND section='".$_SESSION['section']."'";
			$result12 = mysql_query($query12) or die(mysql_error());
			
			$check=true;
			
			$old[$i2]=serialize($questions[$i2]);			
		}
		
		
		if($check==true)
		{
			echo '<meta http-equiv="refresh" content="0">';//refresh page
		//	$_SESSION['start']=false;
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
	echo "Select both a course and a section";
}


?>
<form action="professorhomepage.php" >
		
<div class="small-7 small-centered columns">
	<input class="center button [tiny small large]" type="submit" value="Professor Home" />
</div>
</form>

<?php include('inc/footer.php'); ?>