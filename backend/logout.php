<?php
	session_start();
	//session_destroy();
	$temp = $_REQUEST["usuario"];
	unset($_SESSION[$temp]);
	header("location: http://localhost/web_project/frontend/build/index.html");
?>