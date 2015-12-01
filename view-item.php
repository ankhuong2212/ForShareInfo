<!--
	HelpConnect website by 15ICE Group29
-->
<script type="text/javascript">
	document.title = "Items Forshare";

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
	<div class="main-content mdl-color--grey-200 mdl-color-text--grey-700 mdl-base">
		<!--Display posts-->
		<?php
		$query = "SELECT * FROM ITEMS";
		$db->connect();
		$result = mysql_query( $query );
				
		if (mysql_num_rows($result)==0)
		{
		?>
			<h2>No post to display</h2>
		<?php
		} else {
			$query = "SELECT * FROM POST";
			$result = mysql_query( $query );							
			
			//Display info with each row
			while($post = mysql_fetch_assoc($result))
			{
				if ($post['item_id'] != 0)
				{
					$item_id = $post['item_id'];
					$post_id = $post['post_id'];
					$post_usr = $post['user_id'];
					
					$query = "SELECT * FROM ITEMS 
					WHERE item_id = '$item_id'";
					
					$iresult = mysql_query( $query );
					$item = mysql_fetch_assoc($iresult);
		?>
			<section class="section--center share-grid mdl-shadow--2dp" name="item-<?php echo $item_id ?>">
				
				<div class="mdl-grid mdl-grid--no-spacing">
					<div class="mdl-card__actions" id="mdl-card_meta">
						<a href="post.php?post_id=<?php echo $post['post_id'] ?>" class="mdl-button">Read more</a>
					</div>
				<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
					<?php
						$query = "SELECT * FROM PICTURES 
							WHERE post_id = '$post_id'";
						
						$pic_list = mysql_query( $query );
						
						if (mysql_num_rows($pic_list) != 0) {
							while ($pic = mysql_fetch_assoc($pic_list)) {
					?>
						<img class="mdl-shadow--2dp" src="uploads/<?php echo $pic['pic_img'] ?>" >
					<?php
							}
						} else {
					?>
						<i class="material-icons">play_circle_filled</i>
					<?php
						}
					?>
				</header>
				<div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
					<div class="mdl-card__supporting-text">
			<!--Content area-->
			
				<h4> <a href="post.php?post_id=<?php echo $post['post_id'] ?>"> <?php echo $post['title'] ?></a></h4>
			<?php 
						
			
						$output = explode(' ', $item['item_desc']);
						array_splice($output, 30);
						$output = implode(' ', $output)."...";
						echo $output;
			?>
					</div>
					<div class="mdl-card__actions">
						<a href="post.php?post_id=<?php echo $post['post_id'] ?>" class="mdl-button">Read more</a>
					</div>
				</div>
				</div>
				<?php
				if ($user_id == $post_usr)
				{
				?>
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btn<?php echo $post['post_id'] ?>">
					<i class="material-icons">more_vert</i>
				</button>
				<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btn<?php echo $post['post_id'] ?>">
					<li class="mdl-menu__item" disabled>Edit</li>
					<form name="remove-form" action="remove-item.php" method="POST">
						<li class="mdl-menu__item" onClick="return ConfirmDelete();" type="submit" name="remove" value="<?php echo $post['item_id'] ?>">Remove <?php echo $post['item_id'] ?></li>
					</form>
				</ul>				
				<?php
					}
				?>
			</section>
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