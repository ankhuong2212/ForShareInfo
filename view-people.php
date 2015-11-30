<!--
	HelpConnect website by 15ICE Group29
-->
<script type="text/javascript">
	document.title = "People List | HelpConnect";

    function ConfirmDelete()
    {
      var x = confirm("Do you want to remove this post?");
      if (x)
          return true;
      else
        return false;
    }
</script>    

<?php 
	include('header.php');
?>				
	<div class="container" style="min-height: 100%;">
		<!--Display posts-->
		<?php
		
		$query = "SELECT * FROM PEOPLE";
			
		$db->connect();
		
		$result = mysql_query( $query );
			
		if (mysql_num_rows($result)==0)
		{
		?>
			<h2>No post to display</h2>
		<?php
		} else {
			//Select post from database
			$query = "SELECT * FROM POST";
			
			$result = mysql_query( $query );
			
			//Display info with each row
			while($post = mysql_fetch_assoc($result))
			{
				if ($post['people_id'] != 0)
				{
					$people_id = $post['people_id'];
					
					$query = "SELECT * FROM PEOPLE 
					WHERE people_id = '$people_id'";
					
					$presult = mysql_query( $query );
					$people = mysql_fetch_assoc($presult);
									
		?>
		
		<div class="container" id="post-element">
			<!--Content area-->
			<?php 
				if ($user_type == 'admin')
				{
			?>
				<form name="remove-form" action="remove-people.php" method="POST">
					<button onClick="return ConfirmDelete();" type="submit" name="remove" id="bt-remove" value="<?php echo $post['people_id'] ?>" ></button>
				</form>
			<?php
				}
			?>
			<h2> <a href="post.php?post_id=<?php echo $post['post_id'] ?>"> <?php echo $post['title'] ?></a></h2>
			<div class="container" id="post-content">
				<span>
					<?php 
						list($output)=explode("\n",wordwrap(strip_tags($people['people_desc']),100),1);
						echo $output;
					?>
					
					<a href="post.php?post_id=<?php echo $post['post_id'] ?>"> [Read more]</a>
				</span>
			</div>

			<div class="container" id="meta-area">
				<div class="col-xs-2 col-sm-2 col-md-2" style="text-align: center;">
					No: <a><?php echo $people_id; ?></a>									
				</div>
				
				<div class="col-xs-4 col-sm-4 col-md-4" style="text-align: center;">
					Posted by:
					<?php 
						$user_id = $post['user_id'];
					
						$query = "SELECT * FROM USERS
								WHERE user_id = '$user_id'";
						
						$uresult = mysql_query( $query );
						$post_user = mysql_fetch_assoc($uresult);
						
					?>
					<a href="dashboard.php?user_id=<?php echo $user_id ?>">
						<?php echo $post_user['nickname']; ?>
					</a>
				</div>
				
				<div class="col-xs-4 col-sm-4 col-md-4" style="text-align: center;">
					Post time:
					<a><?php echo(date("H:i d-m-Y",$post[postdate])); ?></a>									
				</div>
				
				<div class="col-xs-2 col-sm-2 col-md-2" style="text-align: center;">
					Reply:
					<a><?php echo $post['cmt_num']; ?></a>									
				</div>
			</div>
		</div>
		<?php
				}
			}
		}

			$db->close();
		?>
	
	</div>
			
<?php
	include('footer.php');
?>