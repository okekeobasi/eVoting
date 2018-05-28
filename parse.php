<?php
require("sessionChecker.php");

	// var_dump($_POST);
	// username
	$username = $_POST["tag"];
	// password
	$password = $_POST["password"];

	// use this to check for quotes
	$username = Validator::quoteChecker($username);
	$password = Validator::quoteChecker($password);
	
	/*
	$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}
	*/

	// Checking if the username inputed is assigned to any unsername
	$query = "SELECT * FROM users WHERE number = '$username'";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	//If nothing is returned it might be an admin or invalid
	if($result->num_rows===0){
		// Check if its an admin username
		$query = "SELECT * FROM admins WHERE name = '$username'";
		$result = $mysqli->query($query);
		if(!$result){
			echo "QUERY ERROR: $mysqli->error";
		}

		// No its not a valid username
		if($result->num_rows===0){	
			Routes::err_display("Username");
		}
		else{
			$row = $result->fetch_assoc();
			// If its an admnin username then verify the hashed password
			if(password_verify($password, $row['password'])){
				// Assign role and an ID to the session
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['role'] = "admin";

				// redirect to an admin page
				Routes::redirect_to("admin");
			}
			else{
				// prompt the user of the error problem
				Routes::err_display("Password");
			}
		}
		
	}
	else{
		$row = $result->fetch_assoc();
		// if its a valid tag, check if the password is correct, no hash here
		if($password == $row['password']){
			// Assign role and an ID to the session
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['role'] = "user";
			
			// SELECT the poll ID from the users table, the poll ID contains the ID 
			// of all the polls a user has taken part in
			$_SESSION['poll_id'] = $row["poll_id"];

			Routes::redirect_to("user");
		}
		else{
			//Prompt the user if the incorrect password
			Routes::err_display("Password");
		}
	}
?>