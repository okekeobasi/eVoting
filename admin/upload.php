<?php
	//image upload
/*
	var_dump($_FILES);
	$target_dir =  __dir__ . '/candidatePics/';
	$target_file = $target_dir . "/$candidateImg";
	move_uploaded_file($_FILES["$imgIndex"]["$candidateImg"], $target_file);
*/

    $image = $_FILES['pic'];
    //Stores the filename as it was on the client computer.
    $imagename = $_FILES['pic']['name'];
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['pic']['type'];
    //Stores any error codes from the upload.
    $imageerror = $_FILES['pic']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['pic']['tmp_name'];

    //The path you wish to upload the image to
    $imagePath = __DIR__."/candidatePics/";

    if(is_uploaded_file($imagetemp)) {
        if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
            echo "Sussecfully uploaded your image.";
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }
?>			