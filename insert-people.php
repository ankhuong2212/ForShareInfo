<?php

	session_start();
	
	
	/* First, get the maximum people id & post id from the database */
	//get the maximum people id from the database
	$query = "SELECT MAX(people_id) as people_id
            FROM PEOPLE";

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
		//new people id to be used
		$people_id = $row['people_id'] + 1;
	}
	
	$query = "SELECT MAX(post_id) as post_id
            FROM POST";
	
	$result = mysql_query( $query );
	
	while( $row = mysql_fetch_array( $result ))
	{
		//new people id to be used
		$new_post_id = $row['post_id'] + 1;
	}
	
	$query = "SELECT MAX(pic_id) as pic_id
		FROM PICTURES";
	
	$result = mysql_query( $query );
	
	while( $row = mysql_fetch_array( $result ))
	{
		//new people id to be used
		$pic_id = $row['pic_id'] + 1;
	}
	
	$path = "uploads/"; // Upload directory
	$max_file_size = 1024*300;
	$count = 0;

	foreach ($_FILES['upload-pic']['name'] as $f => $name) {  
		if ($_FILES['upload-pic']['error'][$f] == 4) {
			continue; // Skip file if any error found
		}	       
		if ($_FILES['upload-pic']['error'][$f] == 0) {	           
			if ($_FILES['upload-pic']['size'][$f] > $max_file_size) {
				echo $name . "is too large!.";
				continue; // Skip large files
			} else { // No error found! Move uploaded files 
				$pic = "post_".$new_post_id."_".$name;
				$target_file = $path.$pic;
				if(move_uploaded_file($_FILES["upload-pic"]["tmp_name"][$f], $target_file)) 
				{
					$query = "INSERT INTO PICTURES VALUES
					('$pic_id', '$new_post_id', '$pic')";
				
					mysql_query( $query );
					
					echo $pic_id;
					$count++; // Number of successfully uploaded file
					$pic_id = $pic_id + 1;
				}
			}
		}
	}
	
	//close once finished to free up resources
	$db->close();
	
	/* Second, get the user id */
	//get the user id from the database
	session_start();
	
	$user_id = $_SESSION['user_id'];
	
	/* Third, insert into the PEOPLE table */
	// load SESSION variable;
	
	//get the register information
	$title = $_POST['title'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$age = $_POST['age'];
	$sex = $_POST['gender'];
	$desc = $_POST['desc'];
	$type = $_POST['people-type'];
	$time = time();

	//insert into the PEOPLE database
	$query = "INSERT INTO PEOPLE VALUES
			( '$people_id', '$fname', '$lname', '$age', '$sex', '$desc', '$type')";
			
	$db->connect();

	//insert into the database
	mysql_query( $query );

	//close once finished to free up resources
	$db->close();
	
	/* Last, insert into the POST table */
	// load SESSION variable;

	//insert into the POST database
	$query = "INSERT INTO POST VALUES
			( '$new_post_id', '$title', '$time', '$user_id', '0', '$people_id', '')";
			
	$db->connect();

	//insert into the database
	mysql_query( $query );

	//close once finished to free up resources
	$db->close();
	
	header("Location: post.php?post_id=$new_post_id",true);
	exit();