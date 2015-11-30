<!--	HelpConnect website by 15ICE Group29-->
<script type="text/javascript">		
	document.title = "Login | HelpConnect";	
</script> 

<?php include('header.php');?>				
	<div class="container">
		<div class="container" id="main">			
			<div class="col-md-7" id="left-container">				
			<?php session_start();
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
					<div class="col-md-4">		
						<img src="images/donate.png" alt="" />
					</div>				
					<div class="col-md-8" style="padding-left: 30px;">
						<h4>Item Seeker & Donor</h4>
						<p>Who is looking for an item to take or an people to donate.</p>		
					</div>	
				</div>		
				
				<div class="row" style="margin: 20px 0; float: left;" >	
					<div class="col-md-4">	
						<img src="images/people-seek.png" alt="" />				
					</div>					
					<div class="col-md-8" style="padding-left: 30px;">		
						<h4>People Seeker</h4>				
						<p>Who is looking for a lost people whose relation with them.</p>		
					</div>			
				</div>	
				
				<div class="row" style="margin: 20px 0; float: left;" >			
					<div class="col-md-4">						
						<img src="images/join.png" alt="" />			
					</div>				
					<div class="col-md-8" style="padding-left: 30px;">	
						<h4>People Helper</h4>				
						<p>Who know information about lost people, need to provide</p>			
					</div>		
				</div>		
			</div>
				
			<div class="col-md-5" id="form-container">		
				<h2>Sign in</h2>		
				<span id="meta">		
					Or <a href="register.php">Sign up<a>	
				</span>		
				<br>
				<br>
				<br>
				<br>		
				<form class="form-horizontal" name="login" action="authenticate.php" method="POST">		
					<input type="email" class="form-control" name="email" placeholder="Email" required>		
					<input type="password" class="form-control" name="pass" placeholder="Password" required>	
					<button type="submit" class="btn btn-default" id="bt-signin">Sign In</button>			
				<?php			
					session_start();			
					if (isset($_SESSION['login']) && $_SESSION['login'] == 0 )	
					{			
				?>				
					<center><font color="red" size ="2">Your email and password do not match !</font></center>	
				<?php			
					}				
				?>			
				</form>		
			</div>	
		</div>	
	</div>
	
<?php include('footer.php');?>
			
			