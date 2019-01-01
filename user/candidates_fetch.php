<?php 
	require("sessionChecker.php"); 

	//Get the name of the poll parameter passed from the index.php 
	$name = urlencode($_GET["name"]);
	/*
	$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}*/

	// Get the maximum number of votes and ID from polls table
	$query = "SELECT * FROM polls WHERE name = '$name'";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	$row = $result->fetch_assoc();
	$poll_id = $row["id"];
	$max = $row["max"];

	// Get all the candidates for a poll from the candidates table
	$query = "SELECT * FROM candidates WHERE poll_id = $poll_id";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}
?>