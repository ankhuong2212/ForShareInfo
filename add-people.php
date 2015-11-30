<!--
	HelpConnect website by 15ICE Group29
-->
	<script type="text/javascript">
		document.title = "Add People | HelpConnect";
		function hiddenName(choice) {
			if (choice.value == "Skills") {
				document.getElementById('firstname').style.display = "none";
				document.getElementById('lastname').style.display = "none";
			} else {
				document.getElementById('firstname').style.display = "inline";
				document.getElementById('lastname').style.display = "inline";
			}
		}
	</script> 
	
<?php 
	include('header.php');
	session_start(); 
	
	if (isset($_SESSION['login']) && $_SESSION['login'] == 1 )
	{
?>				

	<div class="container">
		<div class="container" id="main">
			<h2>Provide People Information</h2>
			<div id="add-area">
				<form name="add-form" action="insert-people.php" method="POST" enctype="multipart/form-data">
					<div class="form-inline">
						<input type="text" class="form-control" name="title" placeholder="Title" required>
					</div>
					<div class="form-inline">
						<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First name" >
						<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last name" >
					</div>
					<div class="form-inline">
						<input type="number" class="form-control" name="age" min="1" max="99" placeholder="Age" required>
						<div class="radio-inline">
							<label>
								<input type="radio" name="gender" value="Male" checked>Male
							</label>
						</div>
						
						<div class="radio-inline">
							<label>
								<input type="radio" name="gender" value="Female">Female
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="upload-pic">Add a picture</label>
						<input type="file" name="upload-pic[]" id="upload-pic" accept="image/*" multiple="multiple" >
					</div>
					<textarea class="form-control" rows="12" name="desc" placeholder="Description" required></textarea>
					<br>
					<div class="form-group">
						<label for="people-type">Type of People</label>
						<select class="form-control" id="people-type" name="people-type" onchange="hiddenName(this)">
							<option value="Friend">Friend</option>
							<option value="Family">Family</option>
							<option value="Felationship">Relationship</option>
							<option value="Skills">Skills</option>
						</select>
					</div>
					<br>
					<button type="submit" class="btn btn-default" style="width: 250px">Add Post</button>
				</form>
			</div>
		</div>
	</div>
			
<?php 
	} else {
		header("Location: login.php?permission=no",true);
		$_SESSION['login'] = -1;
	}

	include('footer.php');
?>