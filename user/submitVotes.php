<?php
	require("sessionChecker.php");

	$id = $_GET['id'];
	$data = $_GET["data"];
	$poll_name = $_GET["poll_name"];
	$poll_id = $_GET["poll_id"];

	print_r($poll_id);

	/*$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}*/

	// select from users
	$select_users_query = "SELECT poll_id FROM users WHERE id='${id}' ";
	$select_users_result = $mysqli->query($select_users_query);
	if(!$select_users_result){
		echo "QUERY ERROR: $mysqli->error";
	}
	$select_users_result_row = $select_users_result->fetch_assoc();
	$poll_id = $select_users_result_row['poll_id'] . $poll_id;

	// update users
	$update_users_query = "UPDATE users SET poll_id='${poll_id}:' WHERE id='${id}' ";
	$update_users_result = $mysqli->query($update_users_query);
	if(!$update_users_result){
		echo "QUERY ERROR: $mysqli->error";
	}


	for($i = 0; $i < sizeof($data); $i++){
		// select from candidates
		$select_candidates_query = "SELECT user_id FROM candidates WHERE name='$data[$i]' ";
		$select_candidates_result = $mysqli->query($select_candidates_query);
		if(!$select_candidates_result){
			echo "QUERY ERROR: $mysqli->error";
		}
		$select_candidates_result_row = $select_candidates_result->fetch_assoc();
		$id = $select_candidates_result_row['user_id'] . $id;
		// update candidates
		$update_candidates_query = "UPDATE candidates SET user_id='${id}:' WHERE name='$data[$i]' ";
		$update_candidates_result = $mysqli->query($update_candidates_query);
		if(!$update_candidates_result){
			echo "QUERY ERROR: $mysqli->error";
		}
	}

?>