<?php
	include('./connect_to_db.php');

	//get an instance
	$db = new Connection();

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
	
	$ads_desc = $_POST['caption'];
	$ads_link = $_POST['link'];
	$ads_id = $_POST['ads-select'];
	$name = basename($_FILES["upload-ads"]["name"]);
	
	if (!empty($name)) {
	$target_dir = "uploads/";
	$pic = "ads_" . $ads_id . "_" . $name;
	$target_file = $target_dir . $pic;
	$uploadOk = 1;
	
	echo $ads_link;
	echo $name;
	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["upload-ads"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["upload-ads"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["upload-ads"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["upload-ads"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	
	/* First, get the maximum item id from the database */
	//get the maximum item id from the database
	$query = "UPDATE ADS
			SET ads_img = '$pic'
			WHERE ads_id = '$ads_id'";
			
	$db->connect();

	//insert into the database
	mysql_query( $query );
	$db->close();
	}
	
	if (!empty($ads_desc)) {
	$query = "UPDATE ADS
			SET caption = '$ads_desc'
			WHERE ads_id = '$ads_id'";

	//insert into the database
	$db->connect();

	//insert into the database
	mysql_query( $query );
	$db->close();
	}
	
	if (!empty($ads_link)) {
	$query = "UPDATE ADS
			SET link = '$ads_link'
			WHERE ads_id = '$ads_id'";
			
	//insert into the database
	$db->connect();

	//insert into the database
	mysql_query( $query );
	$db->close();
	}

	header("Location: dashboard.php?user_id=$user_id",true);
	exit();
?>
