<?php
session_start();
	require __DIR__ . "\Classes\Routes.php";
	require __DIR__ . "\Classes\Validator.php";
	require __DIR__ . "\Classes\Database.php";

	if(!isset($_SESSION["user_id"])) Routes::err_custom("Please Login","../");
	if($_SESSION["role"] != "admin") Routes::redirect_to("user");

	$db = new Database();
	$mysqli = $db->connect();
?>