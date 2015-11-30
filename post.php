<!--
	HelpConnect website by 15ICE Group29
-->
	<script type="text/javascript">
		document.title = "Post | HelpConnect";
		
		function ConfirmDelete()
		{
		  var x = confirm("Do you want to remove this post?");
		  if (x)
			  return true;
		  else
			return false;
		}
		
		function ConfirmUpdate()
		{
		  var x = confirm("Do you want to edit this post?");
		  if (x)
			  return true;
		  else
			return false;
		}
	</script> 

<?php 
	include('header.php');
?>				
	
	<div class="container">
		<div class="container" id="main">
		<?php 					
			if ($user_type != 'guest') 
			{
				$db->connect();
				
				$url_array =  explode('=', $_SERVER['REQUEST_URI']) ; //divide url to array by '='
				$post_id = end($url_array); //get the last ele of array (after '=')
				
				$query = "SELECT * FROM POST 
				WHERE post_id = '$post_id'";
				
				session_start();
				$_SESSION['post_id'] = $post_id;
				
				$result = mysql_query( $query );

				$post = mysql_fetch_assoc($result);
				$title = $post['title'];
				$time = $post['postdate'];
				$post_user_id = $post['user_id'];
				
				$query = "SELECT * FROM USERS 
					WHERE user_id = '$post_user_id'";
					
				$result = mysql_query( $query );
				$user = mysql_fetch_assoc($result);
				$nickname = $user['nickname'];
		?>
		
					
		<!--Display post with people info-->
		<?php
		//Check this post is PEOPLE or ITEMS type
			if ($post['people_id'] != 0){
				$people_id = $post['people_id'];
				
				$query = "SELECT * FROM PEOPLE 
				WHERE people_id = '$people_id'";
				
				$result = mysql_query( $query );
				$people = mysql_fetch_assoc($result);	
				
				if (($user_type == 'admin') || ($user_id == $post_user_id))
				{
		?>
				<form name="remove-form" action="remove-people.php" method="POST">
					<button onClick="return ConfirmDelete();" type="submit" name="remove" id="bt-remove" value="<?php echo $post['people_id'] ?>" ></button>
				</form>
		<?php
				}
				if ($user_id == $post_user_id)
				{
		?>
				<form name="edit-form" action="edit-people.php" method="POST">
					<button type="submit" name="edit" id="bt-edit" value="<?php echo $post['people_id'] ?>" ></button>
				</form>
		<?php
				}
		?>
				
				
				<h2><?php echo $title ?> </h2>
				<div id="meta-area">
					<table cellspacing="0" cellpadding="1">
						<tr> 
							<td width="300px" align="center">
								Name: 
								<a>
									<?php 
										echo $people['first_name']; 
									?> 
									<?php
										echo  $people['last_name'];
									?>
								</a>									
							</td>
							<td width="300px" align="center">
								Age:
								<a>
									<?php echo $people['age'];  ?>
								</a>
								 - Gender:
								<a>
									<?php echo $people['gender'];  ?>
								</a>
							</td>
							<td width="300px" align="center">
								Category:
								<a>
									<a>
										<?php echo $people['people_type'];  ?>
									</a>
								</a>									
							</td>
						</tr>
					</table>
				</div>
				
				<div id="desc-area">
					<span>
						<?php echo $people['people_desc']; ?>
					</span>
				</div>
				
				<!--Picture area-->
				<div id="pic-area">
					<ul class="enlarge">
					<?php
						$query = "SELECT * FROM PICTURES 
							WHERE post_id = '$post_id'";
						
						$pic_list = mysql_query( $query );
						
						if (mysql_num_rows($pic_list) != 0) {
							while ($pic = mysql_fetch_assoc($pic_list)) {
					?>
				
						<li>
							<img class="img-responsive" src="uploads/<?php echo $pic['pic_img']?>" style="max-height: 90px; width: auto;">
							<span> <!--span contains the popup image-->
								<img src="uploads/<?php echo $pic['pic_img'] ?>" style="max-height: 200px; width: auto;">
							</span>
						</li>
					<?php
							}
						}
					?>
					</ul>
				</div>
				
				<!--Meta area-->
				<div id="meta-area">
					<table cellspacing="0" cellpadding="1">
						<tr> 
							<td width="300px" align="center">
								Post type: <a>PEOPLE</a>									
							</td>
							<td width="300px" align="center">
								Added by:
								<a href="dashboard.php?user_id=<?php echo $post_user_id ?>">
									<?php echo $nickname; ?>
								</a>
							</td>
							<td width="300px" align="center">
								Post time:
								<a>
									<?php
										echo(date("H:i d-m-Y",$time));
									?>
								</a>									
							</td>
						</tr>
					</table>
				</div>
					
				
				<!--Display post with item info-->	
				<?php
				} else if ($post['item_id'] != 0){
					$item_id = $post['item_id'];
					
					$query = "SELECT * FROM ITEMS 
					WHERE item_id = '$item_id'";
					
					$result = mysql_query( $query );
					$item = mysql_fetch_assoc($result);
					if ($user_type == 'admin' || ($user_id == $post_user_id))
					{
				?>
					<form name="remove-form" action="remove-item.php" method="POST">
						<button onClick="return ConfirmDelete();" type="submit" name="remove" id="bt-remove" value="<?php echo $post['item_id'] ?>" ></button>
					</form>
				<?php
					}
				
					if ($user_id == $post_user_id)
					{
				?>
					<form name="edit-form" action="edit-item.php" method="POST">
						<button type="submit" name="edit" id="bt-edit" value="<?php echo $post['item_id'] ?>" ></button>
					</form>
				<?php
					}
				?>
				
				<h2><?php echo $title ?> </h2>
				<div id="meta-area" align="center">
					<table cellspacing="0" cellpadding="1">
						<tr> 
							<td width="450px" align="center">
								Item Type:
								<a>
									<?php echo $item['item_trade'];  ?>
								</a>
							</td>
							<td width="450px" align="center">
								Category:
								<a>
									<?php echo $item['item_type'];  ?>
								</a>
							</td>
						</tr>
					</table>
				</div>
				
				<!--Description area-->
				<div id="desc-area">
					<span>
						<?php echo $item['item_desc']; ?>
					</span>
				</div>
				
				<!--Picture area-->
				<div id="pic-area">
					<ul class="enlarge">
					<?php
						$query = "SELECT * FROM PICTURES 
							WHERE post_id = '$post_id'";
						
						$pic_list = mysql_query( $query );
						
						if (mysql_num_rows($pic_list) != 0) {
							while ($pic = mysql_fetch_assoc($pic_list)) {
					?>
						
						<li>
							<img class="img-responsive" src="uploads/<?php echo $pic['pic_img']?>" style="max-height: 90px; width: auto;">
							<span> <!--span contains the popup image-->
								<img src="uploads/<?php echo $pic['pic_img'] ?>" style="max-height: 200px; width: auto;">
							</span>
						</li>

					<?php
							}
						}
					?>
					</ul>
				</div>
				
				<div id="meta-area">
					<table cellspacing="0" cellpadding="1">
						<tr> 
							<td width="300px" align="center">
								Post type: <a>ITEM</a>									
							</td>
							<td width="300px" align="center">
								Added by:
								<a href="dashboard.php?user_id=<?php echo $post_user_id ?>">
									<?php echo $nickname; ?>
								</a>
							</td>
							<td width="300px" align="center">
								Post time:
								<a>
									<?php
										echo(date("H:i d-m-Y",$time));
									?>
								</a>									
							</td>
						</tr>
					</table>
				</div>
					
				<?php
					}
					$db->close();
				?>
		</div>
		
		<div class="container" id="comment-area">
			<form name="reply-form" action="insert-comment.php" method="POST">
				<textarea class="form-control" rows="8" name="reply-content" placeholder="Leave a message" required></textarea>
				<br>
				<button type="submit" name="bt-reply" class="btn btn-default" style="width: 250px; margin-bottom: 0;" value="<?php echo $post_id ?>">Add Comment</button>
			</form>
		</div>
		

		<!--Display comments-->
		<?php
			//Select comments from database
			$count = 0;
			
			$query = "SELECT * FROM COMMENTS
			WHERE post_id = '$post_id'";
			
			$db->connect();
			
			$result = mysql_query( $query );							
		
			//Display info with each row
			while($cmt = mysql_fetch_assoc($result))
			{
				$count++;
				if ($count == 1)
				{
		?>
					<center><h2>Comments</h2></center>
			<?php
				}
			?>
		
			<div class="container" id="cmt-element">
				<!--Description area-->
				<div id="cmt-content">
					<span>
						<?php echo $cmt['content']; ?>
					</span>
				</div>

				<div id="meta-area">
					<table cellspacing="0" cellpadding="1">
						<tr> 
							<td width="300px" align="center">
								No: <a><?php echo $count; ?></a>									
							</td>
							<td width="300px" align="center">
								Replied by:
								<?php 
									$cmt_user_id = $cmt['user_id'];
								
									$query = "SELECT * FROM USERS
											WHERE user_id = '$cmt_user_id'";
									
									$ulist = mysql_query( $query );
									$cmt_user = mysql_fetch_assoc($ulist);
									
								?>
								<a href="dashboard.php?user_id=<?php echo $cmt_user_id ?>">
									<?php echo $cmt_user['nickname']; ?>
								</a>
							</td>
							<td width="300px" align="center">
								Reply time:
								<a>
									<?php
										echo(date("H:i d-m-Y",$cmt['comment_time']));
									?>
								</a>									
							</td>
						</tr>
					</table>
				</div>
			</div>
		<?php
			}
		} else {
			header("Location: login.php?permission=no",true);
			$_SESSION['login'] = -1;
		}
		
			$db->close();
		?>
		
	</div>
			
			
<?php
	include('footer.php');
?>