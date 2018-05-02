<?php
$prefix = 'dxp_';
$bg_image = cmb2_get_option($prefix.'theme_options', $prefix.'slider_bg_image');
$players_url = cmb2_get_option($prefix.'theme_options', $prefix.'players_page_url');
$slider_content = cmb2_get_option($prefix.'theme_options', $prefix.'home_slider_content');
?>

<!-- end:fh5co-header -->
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo esc_url($bg_image); ?>);">
		<div class="desc animate-box">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<?php echo $slider_content; ?>
						<span><a class="btn btn-primary" href="<?php echo $players_url; ?>">See all players</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>