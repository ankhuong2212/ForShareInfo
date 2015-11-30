<!--
	HelpConnect website by 15ICE Group29
-->
	<script type="text/javascript">
		document.title = "Register | HelpConnect";
	</script> 

<?php 
	include('header.php');
?>				
	<div class="container">
		<div class="container" id="main">
			<div class="col-md-7" id="left-container">
				<?php
					session_start(); 
					if (isset($_SESSION['login']) && $_SESSION['login'] == -1 )
					{
				?>
				<h2> Please Login First!</h2>
				<?php 
					session_start();
					unset($_SESSION['login']);
					} else {
				?>
				<h2> Welcome back</h2>
				<?php 
					}
				?>
				<div class="row" style="margin: 20px 0; float: left;" >
					<div class="col-md-4 col-lg-4">
						<img src="images/donate.png" alt="" />
					</div>
					<div class="col-md-8 col-lg-8" style="padding-left: 30px;">
						<h4>Item Seeker & Donor</h4>
						<p>Who is looking for an item to take or an people to donate.</p>
					</div>
				</div>
				
				<div class="row" style="margin: 20px 0; float: left;" >
					<div class="col-md-4 col-lg-4">
						<img src="images/people-seek.png" alt="" />
					</div>
					<div class="col-md-8 col-lg-8" style="padding-left: 30px;">
						<h4>People Seeker</h4>
						<p>Who is looking for a lost people whose relation with them.</p>
					</div>
				</div>
				
				<div class="row" style="margin: 20px 0; float: left;" >
					<div class="col-md-4 col-lg-4">	
						<img src="images/join.png" alt="" />
					</div>
					<div class="col-md-8 col-lg-8" style="padding-left: 30px;">
						<h4>People Helper</h4>
						<p>Who know information about lost people, need to provide</p>
					</div>
				</div>
			</div>
				
			<div class="col-md-5" id="form-container">
				<h2>Create Account</h2>
				<span id="meta">
					Or <a href="login.php">Sign in<a>
				</span>
				<br>
				<br>
				<br>
				<br>
				<form class="form-horizontal" name="signup" action="insert-user.php" method="POST">
					<input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter a valid email." placeholder="Email" required>
					<input type="password" class="form-control" name="pass" pattern=".{6,}" title="Valid password is at least 6 characters." placeholder="Password" required>
					<input type="password" class="form-control" name="re-pass" placeholder="Confirm password" required>
					<?php
					if (isset($_SESSION['signup']) && $_SESSION['signup'] == -1 )
					{
					?>
						<font color="red">Passwords do not matched!</font>
					<?php
						unset($_SESSION['signup']);
					}
					?>
					<input type="text" class="form-control" name="nickname" placeholder="Nickname">
					<input type="text" class="form-control" name="address" placeholder="Address">
					<input type="text" class="form-control" name="phone"  pattern="\d{9,10}" title="Phone number is 9 or 10 digits." placeholder="Phone number" required>
					<button type="submit" class="btn btn-default" id="bt-signin" onClick="return validate();">Register</button>
				</form>
			</div>
		</div>
	</div>
		
<?php
	include('footer.php');
?>