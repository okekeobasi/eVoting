<?php
	require("sessionChecker.php");

	$name = $_POST["name"];

	$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}

	$query = "SELECT * FROM polls WHERE name = '$name'";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	if($result->num_rows===0){
		$insert = "INSERT INTO polls(id, name) VALUES(NULL, '$name')";
		$sql_insert = $mysqli->query($insert);
		if(!$sql_insert){
			echo "QUERY ERROR: $mysqli->error";
		}
	}
	else{
		Routes::err_return("Poll name already taken");
	}

	// The Candidates insert	
	$query = "SELECT * FROM polls WHERE name = '$name'";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	$candidateIndex = "candidate";	
	$candidates = $_POST["candidates"];
	$candidateName = "";

	$row = $result->fetch_assoc();
	$poll_id = $row["id"];
	for($i = 0; $i < $candidates; $i++){
		$candidateIndex = "candidate" . $i;
		$candidateName = $_POST["$candidateIndex"];
		if(trim($candidateName) != ""){
			$insert = "INSERT INTO candidates(id, poll_id, user_id, name, picture) VALUES(NULL, $poll_id, NULL, '$candidateName', NULL)";
			$sql_insert = $mysqli->query($insert);
			if(!$sql_insert){
				echo "QUERY ERROR: $mysqli->error";
			}
		}
	}

	Routes::err_custom("Poll and Candidates Created", "index.php");
?>