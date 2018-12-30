<?php
session_start();
	// The required classes in for the user module
	require __DIR__ . "\Classes\Routes.php";
	require __DIR__ . "\Classes\Database.php";

	// Check if the client accessing this module has logged in
	if(!isset($_SESSION["user_id"])) Routes::err_custom("Please Login","../eVoting");
	if($_SESSION["role"] != "user") Routes::redirect_to("admin");

	// get connected to the DB
	$db = new Database();
	$mysqli = $db->connect();
?>