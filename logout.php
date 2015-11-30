<?php
	session_start();
	// Destroy the session variables
	session_destroy();
	header("Location: index.php");
?>