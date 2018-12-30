<?php
/*
*This class connects to the database
*/
	Class Database{
		public $host = "";
		public $port = "";
		public $database = "";
		public $username = "";
		public $password = "";

		//constructor to read database configuration from .env file 
		public function __construct(){
			//get the directory
			$file_path = dirname(__DIR__);	
			//read the file
			$file = fopen($file_path.'/.env','r') or die('.env file not created');
			while ($line = fgets($file)) {
			  $db_config = explode("=", trim($line));

			  if($db_config[0]=="DB_HOST") $this->host=trim($db_config[1]);
			  if($db_config[0]=="DB_PORT") $this->port=trim($db_config[1]);
			  if($db_config[0]=="DB_DATABASE") $this->database=trim($db_config[1]);
			  if($db_config[0]=="DB_USERNAME") $this->username=trim($db_config[1]);
			  if($db_config[0]=="DB_PASSWORD") $this->password=trim($db_config[1]);
			}
			fclose($file);
		}

		public function connect(){
			// echo $this->host ." ". $this->port." ". $this->database." ". $this->username." ". $this->password;
			$mysqli = new mysqli("localhost", $this->username, $this->password, $this->database);
			if($mysqli->connect_errno){
				echo "$mysqli->connect_errno: $mysqli->connect_error";
			}

			// Return this to the files that need it
			return $mysqli;
		}
	}

/*
	admins table
	+----+--------+--------------------------------------------------------------+
	| id | name   | password                                                     |
	+----+--------+--------------------------------------------------------------+

	users table
	+----+--------+----------+----------+
	| id | number | password | poll_id  |
	+----+--------+----------+----------+

	polls table
	+----+----------------------+-----+
	| id | name                 | max |
	+----+----------------------+-----+

	candidates table
	+----+---------+---------+-------------------+-----------------------------------------------+
	| id | poll_id | user_id | name              | picture                                       |
	+----+---------+---------+-------------------+-----------------------------------------------+
*/	
?>