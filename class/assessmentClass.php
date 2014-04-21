<?php
class Assessment {
	
		public $numberQuestions;
		public $questions;
		public $survey;

		function set_assessment($email, $oneTimeKey){
			$this->email = $email;
			$this->key = $key;
		}
		function get_assessment(){
			return $this->email;
			return $this->key;
			
		}
	}
?>