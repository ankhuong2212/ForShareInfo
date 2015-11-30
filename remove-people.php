<?php

	//include the connection page
	include('./connect_to_db.php');

	//get an instance
	$db = new Connection();

	//connect to database
	$db->connect();
	
	$people_id = $_POST['remove'];
	
	$query = "SELECT * FROM POST
			WHERE people_id = '$people_id'";
	
	//query the database
	$result = mysql_query( $query );
	$post = mysql_fetch_assoc( $result );
	$post_id = $post['post_id'];
	
	$query = "DELETE FROM POST
			WHERE post_id = '$post_id'";
	
	//query the database
	mysql_query( $query );
	
	$query = "DELETE FROM PEOPLE
			WHERE people_id = '$people_id'";
	
	//query the database
	mysql_query( $query );
	
	$query = "DELETE FROM COMMENTS
			WHERE post_id = '$post_id'";
	
	//query the database
	mysql_query( $query );
	
	//close once finished to free up resources
	$db->close();
	
	header("Location: view-people.php?remove_people=$people_id",true);	
		
	exit();