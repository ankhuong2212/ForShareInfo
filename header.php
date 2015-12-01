<!--
	For Share Information
	Powered by Material Design Lite
	Copyright 2015 Google Inc. All rights reserved.
-->
<script src="js/material.min.js"></script>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Forshare community, share any information.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<title id="ttl">ForShare Information</title>
		
		<!-- Add to homescreen for Chrome on Android -->
		<meta name="mobile-web-app-capable" content="yes">

		<!-- Add to homescreen for Safari on iOS -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-title" content="Material Design Lite">

		<!-- Tile icon for Win8 (144x144 + tile color) -->
		<meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
		<meta name="msapplication-TileColor" content="#3372DF">
		
		<!-- Page styles -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/material.min.css">
		<link rel="stylesheet" href="css/styles.css">
		<style>
		#view-source {
		  position: fixed;
		  display: block;
		  right: 0;
		  bottom: 0;
		  margin-right: 40px;
		  margin-bottom: 40px;
		  z-index: 900;
		}
		</style>
  
		<?php
			include('./connect_to_db.php');
			$db = new Connection();
		?>
	</head>
	
	<body>
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
			<!-- Header -->
			<header class="forshare-header mdl-layout__header mdl-layout__header--waterfall">
				<div class="mdl-layout__header-row">
					<span class="forshare-title mdl-layout-title">
						<a href="index.php"><img class="forshare-logo-image" src="images/logo.png"></a>
					</span>
					<div class="forshare-header-spacer mdl-layout-spacer"></div>
					<div class="forshare-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
						<label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
							<i class="material-icons">search</i>
						</label>
						<div class="mdl-textfield__expandable-holder">
							<input class="mdl-textfield__input" type="text" id="search-field">
						</div>
					</div>
					<!-- Navigation bar-->
					<div class="forshare-navigation-container">
						<nav class="forshare-navigation mdl-navigation">
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php">Home</a>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="view-item.php" id="items-menu">Items</a>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="view-people.php" id="people-menu">People</a>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Contact</a>
							<!-- Sign In | Sign Up-->
							<?php
								session_start(); 
								if (empty($_SESSION['email']))
								{
									$user_type = 'guest';
							?>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="login.php">Login</a>
							<a class="mdl-navigation__link mdl-typography--text-uppercase" href="register.php">Register</a>
							<?php
								} else {
																
									session_start(); 
									$email = $_SESSION['email'];
									
									$query = "SELECT * FROM USERS 
											WHERE email = '$email'";
											
									$db->connect();		
											
									$result = mysql_query( $query );
									$user = mysql_fetch_assoc($result);	
									$user_id = $user['user_id'];
									$nickname = $user['nickname'];
									$user_type = $user['user_type'];
									
									$db->close();
							?>
							<button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="user-account">
								<i class="material-icons item-icons">account_circle</i>
							</button>
								<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-center mdl-js-ripple-effect" for="user-account">
									<li class="mdl-menu__item"><a href="dashboard.php?user_id=<?php echo $user_id ?>"><?php
									echo $_SESSION['nickname']
								?></a></li>
									<li class="mdl-menu__item"><a href="logout.php">Logout</a></li>
								</ul>
							<?php
								}
							?>
						</nav>
					</div>
					<span class="forshare-mobile-title mdl-layout-title">
						<img class="forshare-logo-image" src="images/logo.png">
					</span>
				</div>
			</header>
			
			<div class="forshare-drawer mdl-layout__drawer">
				<span class="mdl-layout-title">
					<?php
						session_start(); 
						if (empty($_SESSION['email']))
						{
							$user_type = 'guest';
					?>
					<img class="forshare-logo-image" src="images/forshare.png">
					<?php
						} else {
							session_start(); 
							$email = $_SESSION['email'];
							
							$query = "SELECT * FROM USERS 
									WHERE email = '$email'";
									
							$db->connect();		
									
							$result = mysql_query( $query );
							$user = mysql_fetch_assoc($result);	
							$user_id = $user['user_id'];
							$nickname = $user['nickname'];
							$user_type = $user['user_type'];
							
							$db->close();
					?>
				
					<a class="forshare-logo-image" href="dashboard.php?user_id=<?php echo $user_id ?>">
						<?php
							echo $_SESSION['nickname']
						?>
					</a>
					<?php
						}
					?>
				</span>
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="index.php"><i class="material-icons item-icons">home</i> Home</a>
					<a class="mdl-navigation__link" href="view-item.php"><i class="material-icons item-icons">local_offer</i> Items</a>
					<a class="mdl-navigation__link" href="view-people.php"><i class="material-icons item-icons">group</i> People</a>
					<a class="mdl-navigation__link" href=""><i class="material-icons item-icons">feedback</i> Contact</a>
					<div class="forshare-drawer-separator"></div>
					<?php
						if ($user_type == 'guest')
						{
					?>
					<a class="mdl-navigation__link" href="login.php">Login</a>
					<a class="mdl-navigation__link" href="register.php">Register</a>
					<?php
						} else {
					?>
					<a class="mdl-navigation__link" href="logout.php"><i class="material-icons item-icons">exit_to_app</i> Logout</a>
					<?php
						}
					?>
				</nav>
			</div>
			<div class="mdl-layout__content">