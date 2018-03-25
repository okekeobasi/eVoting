<?php 
	require("sessionChecker.php"); 

	$name = $_GET["name"];
	$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}

	$query = "SELECT * FROM polls WHERE name = '$name'";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	$row = $result->fetch_assoc();
	$poll_id = $row["id"];

	$query = "SELECT * FROM candidates WHERE poll_id = $poll_id";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}
?>