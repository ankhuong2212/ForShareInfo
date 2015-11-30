<?php
		
	session_start();
	unset($_SESSION['post_id']);
	
	/* First, get the maximum item id from the database */
	//get the maximum item id from the database
	$query = "SELECT MAX(item_id) as item_id
            FROM ITEMS";

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
		//new item id to be used
		$item_id = $row['item_id'] + 1;
	}
	
	$query = "SELECT MAX(post_id) as post_id
            FROM POST";
	
	$result = mysql_query( $query );
	
	while( $post = mysql_fetch_array( $result ))
	{
		//new people id to be used
		$new_post_id = $post['post_id'] + 1;
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
							
					$count++; // Number of successfully uploaded file
					$pic_id = $pic_id + 1;
				}
			}
		}
	}
	
	//close once finished to free up resources
	$db->close();
	
	/* Second, get the user id from the database */
	//get the user id from the database
	session_start();
	$user_id = $_SESSION['user_id'];
	
	/* Third, insert into the ITEMS table */
	// load SESSION variable;
	
	//get the register information
	$title = $_POST['title'];
	$type = $_POST['item-type'];
	$desc = $_POST['desc'];
	$cat = $_POST['item-cat'];
	$time = time();
	
	//insert into the ITEMS database
	$query = "INSERT INTO ITEMS VALUES
			( '$item_id', '$title', '$type', '$desc', '$cat')";
			
	$db->connect();

	//insert into the database
	mysql_query( $query );

	//close once finished to free up resources
	$db->close();
	
	/* Last, insert into the POST table */
	// load SESSION variable;

	//insert into the POST database
	$query = "INSERT INTO POST VALUES
			( '$new_post_id', '$title', '$time', '$user_id', '0', '', '$item_id')";
			
	$db->connect();

	//insert into the database
	mysql_query( $query );

	//close once finished to free up resources
	$db->close();

	header("Location: post.php?post_id=$new_post_id",true);
	exit();