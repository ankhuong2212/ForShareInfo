<?php
	//fetch username and password
	$email =  strtolower($_POST['email']);
	$password =  $_POST['pass'];
	
	//write the sql statement
	$query = "SELECT *
            FROM USERS
            WHERE email = '$email' AND
                  password = '$password'";

	//including the connection page
	include('./connect_to_db.php');

	//get an instance
	$db = new Connection();

	//connect to database
	$db->connect();

	//query the database
	$result = mysql_query( $query );
	
	$row = mysql_fetch_assoc($result);
	$user_id = $row['user_id'];
	$nickname = $row['nickname'];
	
	//close once finished to free up resources
	$db->close();
 
	if( mysql_num_rows( $result ))
	{
		// record this decision using a session variable
		session_start();
		$_SESSION['login']=1; // log in is ok
		$_SESSION['email']= $email; // store the email for later use
		$_SESSION['user_id']= $user_id; // store the user_id for later use
		$_SESSION['nickname']= $nickname;
		
		header("Location: index.php?user_id=$user_id",true);
		exit();
	}
	else
	{
		session_start();
		$_SESSION['login']=0; // log in is not ok
		header("Location: login.php?authenticate=no",true);
		exit();
	}
?>
