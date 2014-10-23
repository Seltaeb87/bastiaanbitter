<?php

include('config.php');

session_start();

//check if user is not logged in, of not, go to login.php
	if(!isset($_SESSION['loggedIn'])){
		header('location: login.php');
		exit('location: login.php');
	}

	//check of textfield is submitted, if so place the content into the database
	if(isset($_POST['Submit'])){
		if(isset($_POST['postCont']) && !empty($_POST['postCont'])){
			$updateCont = mysqli_real_escape_string($conn, nl2br($_POST['postCont']));

			 mysqli_query($conn, 'UPDATE blog_posts SET postCont = "'. $updateCont .'" WHERE postID = 1');
		}
}

	//show content
	$postID = 1;
	$postCont = '';
	$text = mysqli_query($conn, 'SELECT postID, postCont FROM blog_posts LIMIT 1');
	if($text->num_rows === 1){
		$result = mysqli_fetch_assoc($text);
		$postID = $result['postID'];
		$postCont = $result['postCont'];
	}
	



?>

<form id='edit' action='edit.php' method='post'>
<fieldset>
<legend>Edit</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='postCont' >Edit:</label>
<textarea name='postCont' ><?php echo $postCont; ?></textarea>
 
<input type='submit' name='Submit' value='Submit' />
 
</fieldset>