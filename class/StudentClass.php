<?php
class Student {
		public $email;
		public $key;
		function set_student($email, $key){
			$this->email = $email;
			$this->key = $key;
		}
		function get_student(){
			return $this->email;
			return $this->key;
			
		}
	}
?>