<?php
session_start();
	include("..\Classes\Routes.php");
	include("..\Classes\Validator.php");
	include("..\Classes\Database.php");

	if(!isset($_SESSION["user_id"])) Routes::err_custom("Please Login","../");
	if($_SESSION["role"] != "admin") Routes::redirect_to("user");

	$db = new Database();
	$mysqli = $db->connect();
?>