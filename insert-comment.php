<?php
	
	/* First, get the maximum comment id from the database */
	//get the maximum comment id from the database
	$query = "SELECT MAX(comment_id) as comment_id
            FROM COMMENTS";

	//include the connection page
	include('./connect_to_db.php');

	//get an instance
	$db = new Connection();

	//connect to database
	$db->connect();
	
	//query the database
	$result = mysql_query( $query );

	while( $row = mysql_fetch_array( $result ))
	{
		//new comment id to be used
		$comment_id = $row['comment_id'] + 1;
	}
	
	//close once finished to free up resources
	$db->close();
	
	/* Second, get the user id and post id*/
	session_start();
	$email = $_SESSION['email'];
	$post_id = $_POST['bt-signin'];
		
	$query = "SELECT * FROM USERS 
			WHERE email = '$email'";
			
	$db->connect();		
			
	$result = mysql_query( $query );
	$user = mysql_fetch_assoc($result);	
	$user_id = $user['user_id'];
	
	$db->close();
	
	$query = "SELECT * FROM POST 
			WHERE post_id = '$post_id'";
			
	$db->connect();		
			
	$result = mysql_query( $query );
	$post = mysql_fetch_assoc($result);	
	$cmt_num = $post['cmt_num'] + 1;
	
	$db->close();
	
	/* Third, insert into the COMMENTS table */
	// load SESSION variable;
	
	$content = $_POST['reply-content'];
	
	$time = time();
	
	//insert into the COMMENTS database
	$query = "INSERT INTO COMMENTS VALUES
			( '$comment_id', '$post_id', '$content', '$time', '$user_id' )";
			
	$db->connect();

	//insert into the database
	mysql_query( $query );

	//close once finished to free up resources
	$db->close();
	
	//update cmt_num into the POST database
	$query = "UPDATE POST
			SET cmt_num = '$cmt_num'
			WHERE post_id = '$post_id'";
			
	$db->connect();

	//insert into the database
	mysql_query( $query );

	//close once finished to free up resources
	$db->close();
	
	header("Location: post.php?post_id=$post_id",true);
	exit();