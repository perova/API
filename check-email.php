<?php

	require_once 'config.php';

	if ( isset($_REQUEST['email']) && !empty($_REQUEST['email']) ) {
		
		$email = trim($_REQUEST['email']);
		$email = strip_tags($email);
		
		$query = "SELECT email FROM users WHERE email=:email";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':email'=>$email));
		
		if ($stmt->rowCount() == 1) {
			echo 'false'; // email already taken
		} else {
			echo 'true'; 
		}
	}