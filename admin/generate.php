<?php
	require("sessionChecker.php");

	$status = false;
	$tag = mt_rand(1,99999); 
	$password = mt_rand(1,99999); 

	// echo $tag . " " . $password;

	/*$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}*/

	$query = "SELECT * FROM users WHERE number = '$tag'";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	while($status != true){
		if($result->num_rows===0){
			$status = true;
			$insert = "INSERT INTO users(id, number, password, poll_id) VALUES(NULL, '$tag', '$password', NULL)";
			$sql_insert = $mysqli->query($insert);
			if(!$sql_insert){
				echo "QUERY ERROR: $mysqli->error";
			}
			break;
		}
		else{
			$tag = mt_rand(1,99999); 
			$password = mt_rand(1,99999); 
			$query = "SELECT * FROM users WHERE number = '$tag'";
			$result = $mysqli->query($query);
		}
	}
?>