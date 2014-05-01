<?php
class Question {

		var $answer1;
		var $answer2;
		var $answer3;
		var $answer4;
		var $question;
		var $correctAnswers = array();
		var $numCorrectAnswers;
		//var $professorName;			if using professors can only edit questions they created
		var $questionNum;

		public function Question($q){
			$this->question = $q;
			$this->numCorrectAnswers = 0;
		}
		
		public function getCorrectAnswers(){

			return $this->correctAnswers;
		}
		public function addCorrectAnswer($ans){
			$this->correctAnswers[$this->numCorrectAnswers] = $ans;
			$this->numCorrectAnswers++;
		}
		public function getNumCorrect(){
			return $this->numCorrectAnswers;
		}
		
		public function setQuestionNum($a)
		{
			$this->questionNum = $a;
		}
		
		public function getQuestionNum()
		{
			return $this->questionNum;
		}
		
		public function set_question($q){
	
			$this->question = $q;
			
		}
		public function get_question(){
			return $this->question;
			
		}
		public function setAnswer1($a){
			$this->answer1 = $a;
		}
		public function setAnswer2($a){
			$this->answer2 = $a;
		}
		public function setAnswer3($a){
			$this->answer3 = $a;
		}
		public function setAnswer4($a){
			$this->answer4 = $a;
		}
		public function getAnswer1(){
			return $this->answer1;
		}
		public function getAnswer2(){
			return $this->answer2;
		}
		public function getAnswer3(){
			return $this->answer3;
		}
		public function getAnswer4(){
			return $this->answer4;
		}
		/*public function setProf($a)     if using professors can only edit questions they created 
		{
			$this->professorName = $a;
		}
		public function getProf()
		{
			return $this->professorName;
		}*/
		
		
		
		public function displayQuestion(){
			echo $this->question;
			echo "<br>";
			echo $this->answer1;
			echo "<br>";
			echo $this->answer2;
			echo "<br>";
			echo $this->answer3;
			echo "<br>";
			echo $this->answer4;
			echo "<br>";
			echo "The number of correct answers for this question is: " . $this->numCorrectAnswers;
			echo "<br>";
			for($i = 0; $i<$this->numCorrectAnswers; $i++){
				 echo $this->correctAnswers[$i] . " is a correct answer";
				 echo "<br>";
				
			}	
		}
}
?>
