<?php
session_start();
	include("..\Classes\Routes.php");
	if(!isset($_SESSION["user_id"])) Routes::err_custom("Please Login","../");
	if($_SESSION["role"] != "user") Routes::redirect_to("admin");
?>