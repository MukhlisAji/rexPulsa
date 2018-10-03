<?php

	
	session_start();
	
	if (!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) {
	    header("location: cre.php");
	    exit();
	}

	$session_id = $_SESSION['username'];
	$user_id  = $_SESSION['user_id'];

?>