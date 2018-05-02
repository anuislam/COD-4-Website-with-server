<?php
if ( ! function_exists( 'allstor_setup' ) ) :
function allstor_setup() {

	//************************************************
	//Load textdomain for translate
	//************************************************

	load_theme_textdomain( 'dxp', get_template_directory() . '/languages' );

	//************************************************
	//support automatic-feed-links
	//************************************************

	add_theme_support( 'automatic-feed-links' );

	//************************************************
	//support title tag
	//************************************************

	add_theme_support( 'title-tag' );

	//************************************************
	//support post-thumbnails
	//************************************************

	add_theme_support( 'post-thumbnails' );

	//************************************************
	//image resize
	//************************************************

	add_image_size( 'dxp_slider_image', 1920, 1080, true );


	register_nav_menus( array(
		'header_menu' => esc_html__( 'Header menu', 'allstor' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif;
add_action( 'after_setup_theme', 'allstor_setup' );


function dxp_wp_head(){
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo dxp_root_url; ?>/js/respond.min.js"></script>
	<![endif]-->
	<?php
}
add_action('wp_head', 'dxp_wp_head');

