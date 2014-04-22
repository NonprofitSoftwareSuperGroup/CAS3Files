<?php
class Question {

		public $answer1;
		public $answer2;
		public $answer3;
		public $answer4;
		public $question;

		function set_question($email, $oneTimeKey){
			$this->answer1 = $answer1;
			$this->answer2 = $answer2;
			$this->answer3 = $answer3;
			$this->answer4 = $answer4;
			$this->question = $question;
			
		}
		function get_question(){
			$this->answer1 = $answer1;
			$this->answer2 = $answer2;
			$this->answer3 = $answer3;
			$this->answer4 = $answer4;
			$this->question = $question;
			
		}
	}
?>