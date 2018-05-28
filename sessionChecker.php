<?php
session_start();
	include("Classes\Routes.php");
	include("Classes\Validator.php");
	if(isset($_SESSION["user_id"])) Routes::err_custom("Logining Out","logout.php");
?>