<?php get_header();
$prefix = 'dxp_';
$bg_image = cmb2_get_option($prefix.'theme_options', $prefix.'404_bg_image');
?>

<!-- end:fh5co-header -->
<div class="fh5co-parallax" style="background-image: url(<?php echo esc_url($bg_image); ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
				<div class="fh5co-intro fh5co-table-cell animate-box">
					<h1 style="margin: 8px 0 0 0;" class="text-center">404 Page Not Found</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: fh5co-parallax -->
<?php get_template_part( 'template-parts/top-ranked-players' ); ?>
<?php get_template_part( 'template-parts/top-killers' ); ?>
<?php get_template_part( 'template-parts/best-ratio-players' ); ?>
<?php get_template_part( 'template-parts/show-all-button' ); ?>


<?php get_footer(); ?>