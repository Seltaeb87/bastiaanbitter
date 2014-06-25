<?php
date_default_timezone_set('Europe/Amsterdam');

//connect to database
try{
	$conn = mysqli_connect('bastiaanbitter.loc','root','root','basDB');
	}catch(Exception $e){
	 die("Error: Check yor settings " . mysqli_error($conn));
	}
?>