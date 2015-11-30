<!--
	HelpConnect website by 15ICE Group29
-->
	<script type="text/javascript">
		document.title = "Add Item | HelpConnect";
	</script> 

<?php 
	include('header.php');
	session_start(); 
	
	if (isset($_SESSION['login']) && $_SESSION['login'] == 1 )
	{
?>

	<div class="container">
		<div class="container" id="main">
			<h2>Add an Item</h2>
			<div id="add-area">
				<form name="add-form" action="insert-item.php" method="POST" enctype="multipart/form-data">
					<div class="form-inline">
						<input type="text" class="form-control" name="title" placeholder="Title" required>
					</div>
					<div class="radio-inline">
						<label>
							<input type="radio" name="item-type" value="Donate" checked>For Donate
						</label>
					</div>
					<div class="radio-inline">
						<label>
							<input type="radio" name="item-type" value="Seek">For Seek
						</label>
					</div>
					<br>
					<div class="form-group">
						<label for="upload-pic">Add a picture</label>
						<input type="file" name="upload-pic[]" id="upload-pic" accept="image/*" multiple="multiple" >
					</div>
					<textarea class="form-control" rows="12" name="desc" placeholder="Description" required></textarea>
					<br>
					<div class="form-group">
						<label for="item-cat">Type of Item</label>
						<select class="form-control" id="item-cat" name="item-cat">
							<option value="Clothing">Clothing</option>
							<option value="Electrical">Electrical</option>
							<option value="Kitchen Items">Kitchen Items</option>
							<option value="Furniture">Furniture</option>
							<option value="Toys, Games, Sports Equipmet">Toys, Games, Sports Equipmet</option>
							<option value="Book and Multimedia">Book and Multimedia</option>
							<option value="Other">Other</option>
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