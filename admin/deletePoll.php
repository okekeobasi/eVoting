<?php
	require("sessionChecker.php");

	$name = Validator::quoteChecker($_GET["delete"]);
	
	$fetch_id_query = "SELECT id from polls WHERE name='$name'";
	$fetch_id_result = $mysqli->query($fetch_id_query);
	if(!$fetch_id_result){
		echo "QUERY ERROR: $mysqli->error";
	}
	$fetch_id_result_row = $fetch_id_result->fetch_assoc();
	$id = $fetch_id_result_row['id'];

	$delete_from_polls_query = "DELETE FROM polls WHERE id=$id";
	$delete_from_polls_result = $mysqli->query($delete_from_polls_query);
	if(!$delete_from_polls_result){
		echo "QUERY ERROR: $mysqli->error";
	}

	$delete_from_candidates_query = "DELETE FROM candidates WHERE poll_id=$id";
	$delete_from_candidates_result = $mysqli->query($delete_from_candidates_query);
	if(!$delete_from_candidates_result){
		echo "QUERY ERROR: $mysqli->error";
	}



	Routes::err_custom("Deleted Poll $name", "/admin");
?>