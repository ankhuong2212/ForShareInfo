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
	<div class="mdl-layout__content">
		<div class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
		<div class="main-content">
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
					
					$query = "SELECT * FROM ITEMS 
					WHERE item_id = '$item_id'";
					
					$iresult = mysql_query( $query );
					$item = mysql_fetch_assoc($iresult);
		?>
			<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp" name="item-<?php echo $item_id ?>">
				<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
					<?php
						$query = "SELECT * FROM PICTURES 
							WHERE post_id = '$post_id'";
						
						$pic_list = mysql_query( $query );
						
						if (mysql_num_rows($pic_list) != 0) {
							while ($pic = mysql_fetch_assoc($pic_list)) {
					?>
						<img src="uploads/<?php echo $pic['pic_img'] ?>" style="width: 200px;">
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
			<?php 
				if ($user_type != 'admin')
				{
			?>
								<!--<form name="remove-form" action="remove-item.php" method="POST">
					<button onClick="return ConfirmDelete();" type="submit" name="remove" id="bt-remove" value="<?php echo $post['item_id'] ?>" ></button>
				</form>-->
			<?php
				}
			?>
						<h4> <a href="post.php?post_id=<?php echo $post['post_id'] ?>"> <?php echo $post['title'] ?></a></h4>
			<?php 
						list($output)=explode("\n",wordwrap(strip_tags($item['item_desc']),100),1);
						echo $output;
			?>
					</div>
					<div class="mdl-card__actions">
						<a href="post.php?post_id=<?php echo $post['post_id'] ?>" class="mdl-button">Read more</a>
					</div>
				</div>
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btn1">
					<i class="material-icons">more_vert</i>
				</button>
				<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btn1">
					<li class="mdl-menu__item">Lorem</li>
					<li class="mdl-menu__item" disabled>Ipsum</li>
					<li class="mdl-menu__item">Dolor</li>
				</ul>
			</section>
		<?php
				}
			}
		}
			$db->close();
		?>
		</div>
		</div>
<?php
	include('footer.php');
?>