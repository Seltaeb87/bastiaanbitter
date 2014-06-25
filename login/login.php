<?php

session_start();
error_reporting(E_ALL | E_STRICT);
include('config.php');

//login.php
$user = '';
$username = '';
$password = '';
$userFound = false;


	//When session is already set proceed to edit.php
	if(isset($_SESSION['loggedIn'])){
		header('location: edit.php');
		exit('location: edit.php');
	}

	//Check if form is submitted and check if username and password are filled in. If filled in and not empty, proceed with database
	if(isset($_POST['Submit'])){
		if(isset($_POST['username']) && !empty($_POST['username'])){
			if(isset($_POST['password']) && !empty($_POST['password'])){
				$username = mysqli_real_escape_string($conn, $_POST['username']);
				$password = mysqli_real_escape_string($conn, $_POST['password']);

				$user = mysqli_query($conn, 'SELECT userID FROM blog_members WHERE username = "'. $username. '" AND password = MD5("'. $password .'") LIMIT 1');
		}
	}
}

	//check if $user has info in it, if yes, proceed to edit.php
	if($user->num_rows === 1){
		$_SESSION['loggedIn'] = true;
		header('location: edit.php');
		exit('location: edit.php');
	}

?>

<!-- Login form -->
<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='username' >Username*:</label>
<input type='text' name='username' id='username'  maxlength="50" />
 
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
 
<input type='submit' name='Submit' value='Submit' />
 
</fieldset>