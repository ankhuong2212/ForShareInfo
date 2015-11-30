<?php
	session_start();
	$from    = $_SESSION['email'];
	$to      = $_POST['email'];
	$msg_user_id = $_POST['bt-email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$headers = 'From: ' . echo $from . "\r\n" .
		'Reply-To: ' . $to . "\r\n" .
		'X-Mailer: PHP/';

	mail($to, $subject, $message, $headers);
	
	header("Location: dashboard.php?user_id=$msg_user_id",true);
	exit();
?> 