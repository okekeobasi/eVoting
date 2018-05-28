<?php 
	require("sessionChecker.php"); 
	/*
	$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}*/

	$query = "SELECT * FROM polls";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	$user_id = $_SESSION['user_id'];

	$select_user_query = "SELECT poll_id FROM users WHERE id='$user_id' ";
	$select_user_result = $mysqli->query($select_user_query);
	if(!$select_user_result){
		echo "QUERY ERROR: $mysqli->error";
	}
?>