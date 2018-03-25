<?php
require("Classes/Routes.php");
	session_start();
	session_destroy();
	Routes::redirect_to("index.php")
?>