<?php

	//include the connection page
	include('./connect_to_db.php');

	//get an instance
	$db = new Connection();

	//connect to database
	$db->connect();
	
	$people_id = $_POST['update'];
	
	$query = "SELECT * FROM POST
			WHERE people_id = '$people_id'";
	
	//query the database
	$result = mysql_query( $query );
	$post = mysql_fetch_assoc( $result );
	$new_post_id = $post['post_id'];
	
	
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
	
	/* Third, insert into the peopleS table */
	// load SESSION variable;
	
	//get the register information
	$title = $_POST['title'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$age = $_POST['age'];
	$sex = $_POST['gender'];
	$desc = $_POST['desc'];
	$type = $_POST['people-type'];
	
	$db->connect();
	//insert into the PEOPLE database
	$query = "UPDATE PEOPLE
				SET first_name = '$fname'
				WHERE people_id = '$people_id'";
			
			
	//insert into the database
	mysql_query( $query );
	
	$query = "UPDATE PEOPLE
				SET last_name = '$lname'
				WHERE people_id = '$people_id'";
			
			
	//insert into the database
	mysql_query( $query );
	
	$query = "UPDATE PEOPLE
				SET age = '$age'
				WHERE people_id = '$people_id'";
			
			
	//insert into the database
	mysql_query( $query );
	
	$query = "UPDATE PEOPLE
				SET gender = '$sex'
				WHERE people_id = '$people_id'";
			
			
	//insert into the database
	mysql_query( $query );
	
	$query = "UPDATE PEOPLE
				SET people_desc = '$desc'
				WHERE people_id = '$people_id'";
			
			
	//insert into the database
	mysql_query( $query );
	
	$query = "UPDATE PEOPLE
				SET people_type = '$type'
				WHERE people_id = '$people_id'";
			
			
	//insert into the database
	mysql_query( $query );
	
	//close once finished to free up resources
	$db->close();
	
	header("Location: post.php?update_item=$new_post_id",true);	
		
	exit();