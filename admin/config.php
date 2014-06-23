<?php

//connect to database
try{
	$conn = mysqli_connect('bastiaanbitter.loc','root','1987brander1','basDB');
	}catch{
	or die("Error: Check yor settings " . mysqli_error($con));
}

date_default_timezone_set('Europe/Amsterdam");
?>