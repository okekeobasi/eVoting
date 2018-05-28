<?php
/*
*This class connects to the database
*/
	Class Database{
		public $user = "mica";
		public $database = "polls_db";
		public $password = "";

		public function connect(){
			$mysqli = new mysqli("localhost", $this->user, $this->password, $this->database);
			if($mysqli->connect_errno){
				echo "$mysqli->connect_errno: $mysqli->connect_error";
			}

			// Return this to the files that need it
			return $mysqli;
		}
	}
?>