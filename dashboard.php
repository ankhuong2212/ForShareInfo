<!--
	HelpConnect website by 15ICE Group29
-->
<script type="text/javascript">
	document.title = "Dashboard | HelpConnect";
</script> 

<?php 
	include('header.php');	

	function active_menu($current_page){
		$url_array = explode('#', $_SERVER['REQUEST_URI']) ;
		$url = end($url_array); 
		
		if ($current_page == $url)
		{
			echo 'active';
		} 
	}
		
	if ($user_type != 'guest') 
	{
		
		$db->connect();
		session_start(); 
		$url_array =  explode('=', $_SERVER['REQUEST_URI']) ; //divide url to array by '='
		$dboard_user_id = end($url_array); //get the last ele of array (after '=')
		
		$query = "SELECT * FROM USERS 
			WHERE user_id = '$dboard_user_id'";
			
		$result = mysql_query( $query );
		$user = mysql_fetch_assoc($result);
		$nickname = $user['nickname'];
		
		if ($user_type == 'admin')
		{
			$query = "SELECT * FROM ADS";

			$list_ads = mysql_query($query);
			
			$ads1 = mysql_fetch_assoc($list_ads);
			$ads2 = mysql_fetch_assoc($list_ads);
			$ads3 = mysql_fetch_assoc($list_ads);
			$ads4 = mysql_fetch_assoc($list_ads);
		}
?>	

<script type="text/javascript">
	function swapAds() {
		var rd1 = document.getElementById("ads1");
		var rd2 = document.getElementById("ads2");
		var rd3 = document.getElementById("ads3");
		var rd4 = document.getElementById("ads4");
		
		document.getElementById("caption").disabled = false;
		document.getElementById("link").disabled = false;
		document.getElementById("upload-ads").disabled = false;
		document.getElementById("upload-bt").disabled = false;

		if (rd1.checked) {
			document.getElementById("caption").value = "<?php echo $ads1['caption']?>";
			document.getElementById("link").value = "<?php echo $ads1['link']?>";
		} else if (rd2.checked) {
			document.getElementById("caption").value = "<?php echo $ads2['caption']?>";
			document.getElementById("link").value = "<?php echo $ads2['link']?>";
		} else if (rd3.checked) {
			document.getElementById("caption").value = "<?php echo $ads3['caption']?>";
			document.getElementById("link").value = "<?php echo $ads3['link']?>";
		} else if (rd4.checked) {
			document.getElementById("caption").value = "<?php echo $ads4['caption']?>";
			document.getElementById("link").value = "<?php echo $ads4['link']?>";
		}
	}

	function displayInfo() {
		document.getElementById("info").className = "active";
		document.getElementById("post").className = "";
		document.getElementById("cont").className = "";
		
		
		document.getElementById("info-content").style.display = "block";
		document.getElementById("contact-content").style.display = "none";
		document.getElementById("posts-content").style.display = "none";
		document.getElementById("ads-content").style.display = "none";
	}

	function displayPost() {
		document.getElementById("post").className = "active";
		document.getElementById("info").className = "";
		document.getElementById("cont").className = "";
		
		
		
		document.getElementById("info-content").style.display = "none";
		document.getElementById("contact-content").style.display = "none";
		document.getElementById("posts-content").style.display = "block";
		document.getElementById("ads-content").style.display = "none";
	}
	
	function displayContact() {
		document.getElementById("cont").className = "active";
		document.getElementById("post").className = "";
		document.getElementById("info").className = "";		
				
		document.getElementById("info-content").style.display = "none";
		document.getElementById("contact-content").style.display = "block";
		document.getElementById("posts-content").style.display = "none";
		document.getElementById("ads-content").style.display = "none";
	}
	
	function displayAds() {
		document.getElementById("cont").className = "";
		document.getElementById("post").className = "";
		document.getElementById("info").className = "";				

		document.getElementById("info-content").style.display = "none";
		document.getElementById("contact-content").style.display = "none";
		document.getElementById("posts-content").style.display = "none";
		document.getElementById("ads-content").style.display = "block";
	}
	
	
	var x = document.getElementById("demo");

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition, showError);
		} else {
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) {
		var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="+
		"<?php echo $user[address]?>"+"&zoom=14&size=600x300&sensor=false";
		
		document.getElementById("mapholder").innerHTML = "<img class='img-responsive' style='margin: 0 auto;' src='"+img_url+"'>";
		document.getElementById("image").src = img_url;
	}

	function showError(error) {
		switch(error.code) {
			case error.PERMISSION_DENIED:
				x.innerHTML = "User denied the request for Geolocation."
				break;
			case error.POSITION_UNAVAILABLE:
				x.innerHTML = "Location information is unavailable."
				break;
			case error.TIMEOUT:
				x.innerHTML = "The request to get user location timed out."
				break;
			case error.UNKNOWN_ERROR:
				x.innerHTML = "An unknown error occurred."
				break;
		}
	}
	
</script>
		<div class="container">
			<div class="container" id="profile-container">		
				<div class="col-sm-12 col-md-12 col-lg-12" id="info-zone">
					<h2><?php echo $nickname ?></h2>
				</div>
				<ul class="nav nav-tabs" style="background: #282c2f;">
					<li class="active" id="info" onClick="displayInfo()">
						<a href="#profile">Profile</a>
					</li>	
					<li id="cont" onClick="displayContact()">
						<a href="#contact">Contact</a>
					</li>		
					<li id="post" onClick="displayPost()">
						<a href="#posts">Posts</a>
					</li>
					<?php 
						if ($user_type == 'admin') 
						{
					?>
						<li id="ads" onClick="displayAds()">
							<a href="#advertise">Ads</a>
						</li>
					<?php
						}
					?>
				</ul>
				
				<div id="content-zone">
					<!--Display profile-->
					<div class="container" id="info-content">
						<div class="row">
							<div class="col-md-4">
								<a>User ID: </a>
								<span>
									<?php 
										echo $user['user_id']; 
									?> 
								</span>								
							</div>
							<div class="col-md-4">
								<a>Name: </a>
								<span>
									<?php echo $user['nickname'];  ?>
								</span>
							</div>
							<div class="col-md-4">
								<a>Type: </a>
								<span>
									<?php echo $user['user_type'];  ?>
								</span>									
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<a>Email: </a>
								<span>
									<?php 
										echo $user['email']; 
									?> 
								</span>								
							</div>
							<div class="col-md-6">
								<a>Phone: </a>
								<span>
									<?php echo $user['phone'];  ?>
								</span>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12">
								<a>Address: </a>
								<span>
									<?php 
										echo $user['address']; 
									?> 
								</span>	
								<span style="color: orange;" onclick="getLocation()" class="glyphicon glyphicon-map-marker"></span>
							</div>
							<br>
							<br>
							<br>
							<div class="col-xs-12" id="mapholder" style="margin-bottom: 20px;" ></div>
						</div>
					</div>
					
					<!--Display message-->
					<div class="container" id="contact-content">
						<form name="mg-form" action="send-email.php" method="POST">
							<input type="text" class="form-control" name="email" value="To: <?php echo $user['email'] ?>" readonly>
							<input type="text" class="form-control"  name="subject" id="subject" placeholder="Subject" required>
							<textarea class="form-control" rows="8" name="message" placeholder="Message" required></textarea>
							<br>
							<button type="submit" class="btn btn-default" name="bt-email" style="width: 220px" value="$dboard_user_id">Send Email</button>
						</form>
					</div>
					
					<!--Display posts-->
					<div id="posts-content">
						<?php 
							$query = "SELECT * FROM POST
								WHERE user_id = '$dboard_user_id'";
								
							$result = mysql_query( $query );
							
							if (mysql_fetch_row($result) == 0)
							{
						?>
								<h2>This user has no post to display</h2>
						<?php
							} else {
								while ($post = mysql_fetch_assoc($result))
								{
						?>
						<div class="container" id="posts-ele">
							<a href="post.php?post_id=<?php echo $post['post_id'] ?>"><?php echo $post['title'] ?></a>
							<div class="row">
								<div class="col-md-3">
									Post Type
									<span>
										<?php 
											if ($post['people_id'] != 0) 
											{
												echo 'PEOPLE';
												
												$people_id = $post['people_id'];
						
												$query = "SELECT * FROM PEOPLE 
												WHERE people_id = '$people_id'";
												
												$presult = mysql_query( $query );
												$people = mysql_fetch_assoc($presult);	
																								
											} else if ($post['item_id'] != 0) 
											{
												echo 'ITEM'; 
												
												$item_id = $post['item_id'];
						
												$query = "SELECT * FROM ITEMS 
												WHERE item_id = '$item_id'";
												
												$iresult = mysql_query( $query );
												$item = mysql_fetch_assoc($iresult);
											}
										?> 
									</span>		
								</div>
								<div class="col-md-4">
									Category
									<span>
										<?php 
											if ($post['people_id'] != 0) 
											{
												echo $people['people_type']; 
											} else if ($post['item_id'] != 0) 
											{
												echo $item['item_type']; 
											}
										?>
									</span>
								</div>
								<div class="col-md-5">
									Post Time
									<span>
										<?php echo (date("H:i d-m-Y",$post['postdate'])); ?>
									</span>
								</div>
							</div>	
						</div>	
						<?php
								}
							}
						?>
					</div>
				
					<div class="container" id="ads-content">
						<form name="add-form" action="insert-ads.php" method="POST" enctype="multipart/form-data">
							<div class="container" id="ads-small">
								<div class="col-xs-3 col-sm-3 col-md-3">
									<img class="img-responsive" src="uploads/<?php echo $ads1['ads_img']?>" alt="<?php echo $ads1['caption']?>" />
									<input type="radio" id="ads1" name="ads-select" onclick="swapAds()" value="1">
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3">
									<img class="img-responsive" src="uploads/<?php echo $ads2['ads_img']?>" alt="<?php echo $ads2['caption']?>" />
									<input type="radio" id="ads2" name="ads-select" onclick="swapAds()" value="2">
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3">
									<img class="img-responsive" src="uploads/<?php echo $ads3['ads_img']?>" alt="<?php echo $ads3['caption']?>" />
									<input type="radio" id="ads3" name="ads-select" onclick="swapAds()" value="3">											
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3">
									<img class="img-responsive" src="uploads/<?php echo $ads4['ads_img']?>" alt="<?php echo $ads4['caption']?>" />
									<input type="radio" id="ads4" name="ads-select" onclick="swapAds();" value="4">											
								</div>
							</div>
							<div class="col-md-12" id="ads-input">
								<input type="text" id="caption" name="caption" placeholder="Description" disabled>
								<br>
								<input type="text" id="link" name="link" placeholder="Link" disabled>							
								<br>
								<font color="#666"><b>Attach a picture</b></font>
								<input type="file" id="upload-ads" name="upload-ads" accept="image/*" disabled>
								<br>
								<button type="submit" id="upload-bt" class="btn btn-default" style="width: 200px" disabled>Update Ads</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
		
<?php
	} else {
		header("Location: login.php?permission=no",true);
		$_SESSION['login'] = -1;
	}
	
	$db->close();

	include('footer.php');
?>