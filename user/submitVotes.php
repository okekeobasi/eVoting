<?php
	require("sessionChecker.php");

	$id = $_GET['id'];
	$data = $_GET["data"];
	$poll_name = $_GET["poll_name"];
	$poll_id = $_GET["poll_id"];
	$this_poll_id = $_GET["poll_id"];

	// var_dump($data);
	// print_r($poll_id);

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
	
	// if (strpos($select_users_result_row['poll_id'], ':') !== false) {
	//     $poll_id = $select_users_result_row['poll_id'] . $poll_id;
	// }
	// else{
	// 	$poll_id = $select_users_result_row['poll_id'] .":".$poll_id;
	// }
	
	$poll_id = $select_users_result_row['poll_id'] . $poll_id;
	// echo $poll_id."\n";

	// update users
	$update_users_query = "UPDATE users SET poll_id='${poll_id}:' WHERE id='${id}' ";
	$update_users_result = $mysqli->query($update_users_query);
	if(!$update_users_result){
		echo "QUERY ERROR: $mysqli->error";
	}

	var_dump($data);
	for($i = 0; $i < sizeof($data); $i++){
		// select from candidates
		echo "\n" . $data[$i];
		echo $this_poll_id;
		$select_candidates_query = "SELECT user_id FROM candidates WHERE name='$data[$i]' AND poll_id=$this_poll_id";
		$select_candidates_result = $mysqli->query($select_candidates_query);
		if(!$select_candidates_result){
			echo "QUERY ERROR: $mysqli->error";
		}
		$select_candidates_result_row = $select_candidates_result->fetch_assoc();
		
		// if (strpos($select_candidates_result_row['user_id'], ':') !== false) {
		//     $id = $select_candidates_result_row['user_id'] . $id;
		// }
		// else{
		// 	$id = $select_candidates_result_row['user_id'] .":".$id;
		// }
		
		$id = $select_candidates_result_row['user_id'] . $id;
		// echo $id."\n";
		// update candidates
		$update_candidates_query = "UPDATE candidates SET user_id='${id}:' WHERE name='$data[$i]' AND poll_id=$this_poll_id";
		$update_candidates_result = $mysqli->query($update_candidates_query);
		if(!$update_candidates_result){
			echo "QUERY ERROR: $mysqli->error";
		}

		$id = $_GET['id'];
	}

	$response_array['status'] = 'success'; 
	// echo json_encode($response_array);
?>