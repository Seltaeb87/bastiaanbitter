<?php

error_reporting(E_ALL | E_STRICT);


session_start();

unset($_SESSION['loggedIn'])
	header('location: login.php');
	exit('location: login.php');
	session_write_close(); 

?>