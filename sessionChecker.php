<?php
session_start();
	include("Classes\Routes.php");
	include("Classes\Validator.php");
	include("Classes\Database.php");

	if(isset($_SESSION["user_id"])) Routes::err_custom("Logining Out","logout.php");

	$db = new Database();
	$mysqli = $db->connect();
?>