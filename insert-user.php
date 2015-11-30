<?php
	
	//get the register information
	$remail = strtolower($_POST['email']);
	$rpass = $_POST['pass'];
	$repass = $_POST['re-pass'];
	$rnickname = $_POST['nickname'];
	$raddress = $_POST['address'];
	$rphone = $_POST['phone'];

	$query = "SELECT * FROM USERS
			WHERE email = '$remail'";
	
	include('./connect_to_db.php');

	//get an instance
	$db = new Connection();
	
	$db->connect();
	
	$result = mysql_query( $query );
	
	if( mysql_num_rows( $result ))
	{
		session_start();
		$_SESSION['signup'] = 0;
		// record this decision using a session variable
		header("Location: register.php?user_id=exists",true);
		exit();
	}
	else if ($rpass == $repass) {
		session_start();
		
		//get the maximum user id from the database
		$query = "SELECT MAX(user_id) as user_id
				FROM USERS";

		//connect to database
		$db->connect();

		//query the database
		$result = mysql_query( $query );

		//close once finished to free up resources
		$db->close();

		while( $row = mysql_fetch_array( $result ))
		{
			//new user id to be used
			$user_id = $row['user_id'] + 1;
		}

		//insert into the USERS database
		$query = "INSERT INTO USERS VALUES
				( '$user_id', '$remail', '$rpass', '$rnickname', '$raddress', '$rphone', 'Client')";
				
		$db->connect();

		//insert into the database
		mysql_query( $query );

		//close once finished to free up resources
		$db->close();
		
		$_SESSION['email']= $remail;
		$_SESSION['user_id']= $user_id;
		$_SESSION['nickname']= $rnickname;
		$_SESSION['signup'] = 1;
		$_SESSION['login'] = 1;
		
		header("Location: dashboard.php?user_id=$user_id",true);
		exit();
	} else {
		session_start();
		$_SESSION['signup'] = -1;
		
		header("Location: register.php?passwords=notmatch",true);
		exit();
	}
?>

