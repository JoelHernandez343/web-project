<?php
	session_start();
	//session_destroy();
	$temp = $_POST["email"];
	unset($_SESSION['usuario']);

	$ansajax = array();
	$ansajax['site'] = './index.php';

	echo json_encode($ansajax);
?>