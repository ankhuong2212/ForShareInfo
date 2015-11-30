<!--
	HelpConnect website by 15ICE Group29
-->
<script type="text/javascript">
	document.title = "ForShare Info.";
</script> 

<?php 
	include('header.php');
	
	$query = "SELECT * FROM ADS";
	
	$db->connect();
	
	$list_ads = mysql_query($query);
	
	$db->close();
?>				
			<div class="forshare-content mdl-layout__content">
				<div class="forshare-people-section mdl-typography--text-center">
				<a name="people"></a>
					<div class="logo-font forshare-slogan">People zone</div>
					<div class="logo-font forshare-sub-slogan">You can looking for people whose relationship with you, or provide a person information to be looked for.</div>
				</div>
				<div class="forshare-item-section mdl-typography--text-center">
				<a name="items"></a>
					<div class="logo-font forshare-slogan">Item zone</div>
					<div class="logo-font forshare-sub-slogan">You can looking for items from others, or donate your items to someone.</div>
				</div>
				<div class="forshare-dark-background-section">
					<div class="forshare-ads-section">
						<div class="forshare-section-title mdl-typography--display-1-color-contrast">Advertisement zone</div>
						<div class="forshare-card-container mdl-grid">
							<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
								<?php
									$ads = mysql_fetch_assoc($list_ads);
								?>
								<div class="mdl-card__media">
									<img src="uploads/<?php echo $ads['ads_img']?>">
								</div>
								<div class="mdl-card__title">
									<h4 class="mdl-card__title-text"><?php echo $ads['caption'] ?></h4>
								</div>
								<div class="mdl-card__supporting-text">
									<span class="mdl-typography--font-light mdl-typography--subhead">Four tips to make your switch to forshare quick and easy</span>
								</div>
								<div class="mdl-card__actions">
									<a class="forshare-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="<?php echo $ads['link'] ?>">
										More
										<i class="material-icons">chevron_right</i>
									</a>
								</div>
							</div>
							
							<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
								<?php
									$ads = mysql_fetch_assoc($list_ads);
								?>
								<div class="mdl-card__media">
									<img src="uploads/<?php echo $ads['ads_img']?>">
								</div>
								<div class="mdl-card__title">
									<h4 class="mdl-card__title-text"><?php echo $ads['caption'] ?></h4>
								</div>
								<div class="mdl-card__supporting-text">
									<span class="mdl-typography--font-light mdl-typography--subhead">Four tips to make your switch to forshare quick and easy</span>
								</div>
								<div class="mdl-card__actions">
									<a class="forshare-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="<?php echo $ads['link'] ?>">
										More
										<i class="material-icons">chevron_right</i>
									</a>
								</div>
							</div>

							<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
								<?php
									$ads = mysql_fetch_assoc($list_ads);
								?>
								<div class="mdl-card__media">
									<img src="uploads/<?php echo $ads['ads_img']?>">
								</div>
								<div class="mdl-card__title">
									<h4 class="mdl-card__title-text"><?php echo $ads['caption'] ?></h4>
								</div>
								<div class="mdl-card__supporting-text">
									<span class="mdl-typography--font-light mdl-typography--subhead">Four tips to make your switch to forshare quick and easy</span>
								</div>
								<div class="mdl-card__actions">
									<a class="forshare-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="<?php echo $ads['link'] ?>">
										More
										<i class="material-icons">chevron_right</i>
									</a>
								</div>
							</div>							
							
							<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
								<?php
									$ads = mysql_fetch_assoc($list_ads);
								?>
								<div class="mdl-card__media">
									<img src="uploads/<?php echo $ads['ads_img']?>">
								</div>
								<div class="mdl-card__title">
									<h4 class="mdl-card__title-text"><?php echo $ads['caption'] ?></h4>
								</div>
								<div class="mdl-card__supporting-text">
									<span class="mdl-typography--font-light mdl-typography--subhead">Four tips to make your switch to forshare quick and easy</span>
								</div>
								<div class="mdl-card__actions">
									<a class="forshare-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="<?php echo $ads['link'] ?>">
										More
										<i class="material-icons">chevron_right</i>
									</a>
								</div>
							</div>								
						</div>								
					</div>
				</div>
				
<?php
	include('footer.php');
?>