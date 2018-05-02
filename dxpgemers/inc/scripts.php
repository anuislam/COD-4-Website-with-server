<?php 


function dxp_load_scripts(){
	wp_enqueue_style( 'dxp-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' );
	wp_enqueue_style( 'dxp-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dxp-animate', dxp_root_url.'/css/animate.css' );
	wp_enqueue_style( 'dxp-icomoon', dxp_root_url.'/css/icomoon.css' );
	wp_enqueue_style( 'dxp-bootstrap', dxp_root_url.'/css/bootstrap.css' );
	wp_enqueue_style( 'dxp-superfish', dxp_root_url.'/css/superfish.css' );
	wp_enqueue_style( 'dxp-styletwo', dxp_root_url.'/css/style.css' );




	wp_register_script( 'dxp-modernizr', dxp_root_url.'/js/modernizr-2.6.2.min.js', null, 1.0, false );

	wp_register_script( 'dxp-jquery-easing', dxp_root_url.'/js/jquery.easing.1.3.js', 'jquery', 1.0, true );
	wp_register_script( 'dxp-bootstrap-min', dxp_root_url.'/js/bootstrap.min.js', 'jquery', 1.0, true );
	wp_register_script( 'dxp-waypoints', dxp_root_url.'/js/jquery.waypoints.min.js', 'jquery', 1.0, true );
	wp_register_script( 'dxp-stellar', dxp_root_url.'/js/jquery.stellar.min.js', 'jquery', 1.0, true );
	wp_register_script( 'dxp-hoverIntent', dxp_root_url.'/js/hoverIntent.js', 'jquery', 1.0, true );
	wp_register_script( 'dxp-superfish', dxp_root_url.'/js/superfish.js', 'jquery', 1.0, true );
	wp_register_script( 'dxp-circle-progress', dxp_root_url.'/js/circle-progress.min.js', 'jquery', 1.0, true );
	wp_register_script( 'dxp-main', dxp_root_url.'/js/main.js', 'jquery', 1.0, true );

    wp_localize_script( 'dxp-main', 'dxp_object',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'dxp_nonce' ),
        )
    );



	wp_enqueue_script('jquery');

	wp_enqueue_script( 'dxp-modernizr' );

	wp_enqueue_script( 'dxp-jquery-easing' );
	wp_enqueue_script( 'dxp-waypoints' );
	wp_enqueue_script( 'dxp-stellar' );
	wp_enqueue_script( 'dxp-hoverIntent' );
	wp_enqueue_script( 'dxp-superfish' );
	wp_enqueue_script( 'dxp-circle-progress' );
	wp_enqueue_script( 'dxp-main' );


}

add_action( 'wp_enqueue_scripts', 'dxp_load_scripts' );

function dxp_admin_scripts(){
	wp_register_script( 'dxp_dxp_admin', dxp_root_url.'/js/dxp_admin.js', 'jquery', 1.0, true );
	wp_enqueue_script( 'dxp_dxp_admin' );
}
add_action( 'admin_enqueue_scripts', 'dxp_admin_scripts' );


function dxp_admin_head(){
	?>
		
		<meta name="dxp_nonce" content="<?php echo wp_create_nonce( 'dxp_nonce' ); ?>">
		
	<?php
}
add_action('admin_head','dxp_admin_head');














