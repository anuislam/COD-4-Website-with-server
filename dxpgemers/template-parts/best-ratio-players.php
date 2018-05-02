<?php 
$skill_players = dxp_get_top_players('ratio');
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
					<h2>BEST RATIO PLAYERS</h2>
				</div>
			</div>
		</div>
		<div class="row text-center">
		<?php
		$counter = 0;
		if (count($skill_players) > 0) {
			foreach($skill_players as $player){
				
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
						] ); ?>" alt="Cycling" class="img-thumbnail"></a>
					<h3><a href="<?php echo $page_url; ?>?profile-id=<?php echo $player->id; ?>"><?php echo $player->name; ?></a></h3>
				</div>
			</div>

<?php
	}
}

?>

		</div>
	</div>
</div>