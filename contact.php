<!--
	HelpConnect website by 15ICE Group29
-->
<script type="text/javascript">
	document.title = "Contact Us | HelpConnect";
</script> 
<?php 
	include('header.php');
?>				
	<div class="container">
		<div class="container" id="main">
			<h2>Contact Us</h2>
			<div id="add-area">
				<form class="form-horizontal" name="mss-form" action="send-email.php" method="POST">
					<input type="text" class="form-control" name="email" value="To: admin@helpconnect.com" readonly>
					<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
					<textarea class="form-control" rows="12" name="message" placeholder="Message" required></textarea>
					<br>
					<button type="submit" class="btn btn-default" name="bt-email" value="admin@helpconnect.com" id="bt-email">Send Email</button>
				</form>
			</div>
			<br>
			<br>
			<div class="container" id="meta-area">
				<div class="col-sm-4 col-md-4" style="text-align: center;">
					Email: 
					<a>	admin@helpconnect.com</a>									
				</div>	
				
				<div class="col-sm-4 col-md-4" style="text-align: center;">
					Phone:
					<a>	0450702212 </a>
				</div>
				
				<div class="col-sm-4 col-md-4" style="text-align: center;">
					Adress:
					<a>	BG114 Latrobe University</a>									
				</div>
			</div>
		</div>
	</div>
			
<?php
	include('footer.php');
?>