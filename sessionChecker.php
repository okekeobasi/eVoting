<?php
// This file contains necessary file inclusions and the checks the session status for logging out user
session_start();
	// $_SERVER['DOCUMENT_ROOT']
	// echo get_include_path();
	// echo __DIR__;
	// This class redirects requests
	require __DIR__ . "/Classes/Routes.php";
	// This class checks for quotes in the user's name
	require __DIR__ . "/Classes/Validator.php";
	// This connects to the DB
	require __DIR__ . "/Classes/Database.php";

	// If the user is logged in and wants to access the root folder
	if(isset($_SESSION["user_id"])) Routes::err_custom("Logining Out","logout.php");

	// instance of the database class
	$db = new Database();
	$mysqli = $db->connect();
?>