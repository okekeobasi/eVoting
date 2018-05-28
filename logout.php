<?php
require("Classes/Routes.php");
	session_start();
	// Destroy the session
	session_destroy();
	// Redirect to the home page
	Routes::redirect_to("index.php")
?>