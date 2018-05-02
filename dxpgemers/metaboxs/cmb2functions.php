<?php


if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'dxp_register_theme_options' );

function dxp_register_theme_options() {
	$prefix = 'dxp_';

	$cmb_options = new_cmb2_box( array(
		'id'           => $prefix.'options_page',
		'title'        => esc_html__( 'Theme Options', 'dxp' ),
		'object_types' => array( 'options-page' ),


		'option_key'      => $prefix.'theme_options', // The option key and admin menu page slug.
		'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
		// 'parent_slug'     => 'themes.php', // Make options page a submenu item of the themes menu.
		// 'capability'      => 'manage_options', // Cap required to view options-page.
		// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
		// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
		// 'message_cb'      => 'yourprefix_options_page_message_callback',
	) );

	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Home page slider image', 'dxp' ),
		'id'      => $prefix.'slider_bg_image',
		'type'	  => 'file',
	) );
	
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Logo', 'dxp' ),
		'id'      => $prefix.'home_slider_logo',
		'type'    => 'textarea',
		'attributes' => array(
			'style' => 'width:100%;height:50px',
		),
	) );
	
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Home slider content', 'dxp' ),
		'id'      => $prefix.'home_slider_content',
		'type'    => 'textarea',
		'attributes' => array(
			'style' => 'width:100%;;',
		),
	) );
	
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Profile page url', 'dxp' ),
		'id'      => $prefix.'profile_page_url',
		'type'    => 'text_url',
		'attributes' => array(
			'style' => 'width:100%;',
		),
	) );

	
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'All players url', 'dxp' ),
		'id'      => $prefix.'players_page_url',
		'type'    => 'text_url',
		'attributes' => array(
			'style' => 'width:100%;',
		),
	) );
	
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'All players bg image', 'dxp' ),
		'id'      => $prefix.'players_bg_image',
		'type'	  => 'file',
	) );
	
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Profile bg image', 'dxp' ),
		'id'      => $prefix.'profile_bg_image',
		'type'	  => 'file',
	) );
	
	$cmb_options->add_field( array(
		'name'    => esc_html__( '404 bg image', 'dxp' ),
		'id'      => $prefix.'404_bg_image',
		'type'	  => 'file',
	) );
	
	
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Server Url', 'dxp' ),
		'id'      => $prefix.'dxp_url',
		'type'    => 'text_url',
		'attributes' => array(
			'style' => 'width:100%;',
		),
	) );
	
	$cmb_options->add_field( array(
		'name'    => esc_html__( 'Server Key', 'dxp' ),
		'id'      => $prefix.'dxp_key',
		'type'    => 'text',
		'attributes' => array(
			'style' => 'width:100%;',
		),
	) );
	
}

