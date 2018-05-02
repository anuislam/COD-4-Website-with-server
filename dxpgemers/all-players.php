<?php

/*
Template Name: All players
*/


get_header();
$prefix = 'dxp_';
$bg_image = cmb2_get_option($prefix.'theme_options', $prefix.'players_bg_image');
?>


<?php while(have_posts())  : the_post(); ?>
<!-- end:fh5co-header -->
<div class="fh5co-parallax" style="background-image: url(<?php echo esc_url($bg_image); ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
				<div class="fh5co-intro fh5co-table-cell animate-box">
					<h1 style="margin: 8px 0 0 0;" class="text-center"><?php echo get_the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: fh5co-parallax -->
<?php endwhile; ?>

<?php 
$players = dxp_get_players(8);
?>


<?php
    $prefix = 'dxp_';
    $page_url = cmb2_get_option($prefix.'theme_options', $prefix.'profile_page_url');

?>
<div id="fh5co-programs-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="heading-section text-center animate-box">
					<h2>All PLAYERS</h2>
				</div>
			</div>
		</div>
		<div class="row text-center">
		<?php
		$counter = 0;
		if (count($players) > 0) {
			foreach($players as $player){
				
			if ($counter > 0) {
				if ($counter % 4 == 0) {
				   echo '</div><div class="row text-center">';
				}
			}
			$counter++;
				
		?>

			<div class="col-md-3 col-sm-4">
				<div class="program animate-box">
					<a href="<?php echo $page_url; ?>?profile-id=<?php echo $player->id; ?>"><img src="<?php echo get_avatar_url( 'email@example.com', [
							'size' => '120'
						] ); ?>" alt="<?php echo $player->name; ?>" class="img-thumbnail"></a>
					<h3><a href="<?php echo $page_url; ?>?profile-id=<?php echo $player->id; ?>"><?php echo $player->name; ?></a></h3>
				</div>
			</div>

<?php
	}
}

?>

		</div>
		<div class="dex_load_more"></div>
	</div>
</div>

<div id="fh5co-programs-section" style="padding:0;margin:0 0 80px 0;">
	<div class="container">
		<div class="row">
		    <div class="col-sm-12">
		        <a id="dxp_players_load_more" href="#" class="btn btn-default btn-block">Show more</a>
		    </div>
		</div>
    </div>
</div>






<?php get_template_part( 'template-parts/top-ranked-players' ); ?>


<?php get_footer(); ?>