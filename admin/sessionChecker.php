<?php
session_start();
	define("ROOT_PATH", dirname(__DIR__));

	require ROOT_PATH . "/Classes/Routes.php";
	require ROOT_PATH . "/Classes/Validator.php";
	require ROOT_PATH . "/Classes/Database.php";

	if(!isset($_SESSION["user_id"])) Routes::err_custom("Please Login","");
	if($_SESSION["role"] != "admin") Routes::redirect_to("user");

	$db = new Database();
	$mysqli = $db->connect();
?>