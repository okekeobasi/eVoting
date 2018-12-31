<?php
	require("sessionChecker.php");
	// ini_set("upload_tmp_dir", __DIR__.'/candidatePics');


	$name = $_POST["name"];
	$max = $_POST["max"];
	$name = Validator::quoteChecker($name);

	/*$mysqli = new mysqli("localhost","mica","","polls_db");
	if($mysqli->connect_errno){
		echo "$mysqli->connect_errno: $mysqli->connect_error";
	}*/

	$query = "SELECT * FROM polls WHERE name = '$name'";
	$result = $mysqli->query($query);
	if(!$result){
		echo "QUERY ERROR: $mysqli->error";
	}

	if($result->num_rows===0){
		$insert = "INSERT INTO polls(id, name, max) VALUES(NULL, '$name', '$max')";
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
	$candidateImg = "";
	$fail_count = 0;

	$row = $result->fetch_assoc();
	$poll_id = $row["id"];
	for($i = 0; $i < $candidates; $i++){
		$candidateIndex = "candidate" . $i;
		$imgIndex = "img" . $candidateIndex;
		$candidateName = Validator::quoteChecker($_POST["$candidateIndex"]);
		$candidateImg = date('dmyHs') . $_FILES[$imgIndex]['name'];
		if(trim(urldecode($candidateName)) != ""){
			$insert = "INSERT INTO candidates(id, poll_id, user_id, name, picture) VALUES(NULL, $poll_id, NULL, '$candidateName', 
			'$candidateImg')";
			$sql_insert = $mysqli->query($insert);
			if(!$sql_insert){
				echo "QUERY ERROR: $mysqli->error";
			}

			//image upload
			$target_dir =  __DIR__.'/candidatePics';
			$target_file = $target_dir . "/$candidateImg";
			// var_dump($_FILES);
			if(is_uploaded_file($_FILES["$imgIndex"]["tmp_name"])) {
			    if(move_uploaded_file($_FILES["$imgIndex"]["tmp_name"], $target_file)) {
			        echo "Sussecfully uploaded your image. <br>";
			    }
			    else {
			        echo "Failed to move your image.<br>";
			        $fail_count++;
			    }
			}
			else {
			    echo "Failed to upload your image.<br>";
			    $fail_count++;
			}
		}
	}
	Routes::err_custom("Poll and Candidates Created; ${fail_count} images failed to be uploaded", "admin/index.php");
?>