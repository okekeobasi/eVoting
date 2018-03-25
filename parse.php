<?php
require("sessionChecker.php");

	// var_dump($_POST);
	$username = $_POST["tag"];
	$password = $_POST["password"];
	
	$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}

	$query = "SELECT * FROM users WHERE number = '$username'";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	if($result->num_rows===0){
		$query = "SELECT * FROM admins WHERE name = '$username'";
		$result = $mysqli->query($query);
		if(!$result){
			echo "QUERY ERROR: $mysqli->error";
		}

		if($result->num_rows===0){	
			Routes::err_display("Username");
		}
		else{
			$row = $result->fetch_assoc();
			if(password_verify($password, $row['password'])) {
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['role'] = "admin";

				Routes::redirect_to("admin");
			}
			else{
				Routes::err_display("Password");
			}
		}
		
	}
	else{
		$row = $result->fetch_assoc();
		if($password == $row['password']) {
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['role'] = "user";

			Routes::redirect_to("user");
		}
		else{
			Routes::err_display("Password");
		}
	}
?>