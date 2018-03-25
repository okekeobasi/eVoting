<?php
session_start();
	include("Classes\Routes.php");
	if(isset($_SESSION["user_id"])) Routes::err_custom("Logining Out","logout.php");
?>