<?php

function dxp_chack_table(){
	global $wpdb;
	$dxp_name = $wpdb->prefix.'players_status';
	if($wpdb->get_var("SHOW TABLES LIKE '$dxp_name'") != $dxp_name) {
		return true;
	}else{
		return false;
	}
}

function dxp_create_tbl(){
	global $wpdb;
	if(dxp_chack_table() === true){
	    $dxp_tbl_query = "
	            CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}players_status` (
	              `id` mediumint(9) NOT NULL AUTO_INCREMENT,
	              `player_id` mediumint(9) NOT NULL,
	              `player_ip` VARCHAR(255) NOT NULL,
	              `country` VARCHAR(255) NOT NULL,
	              `kills` VARCHAR(255) NOT NULL,
	              `deaths` VARCHAR(255) NOT NULL,
	              `teamkills` VARCHAR(255) NOT NULL,
	              `teamdeaths` VARCHAR(255) NOT NULL,
	              `suicides` VARCHAR(255) NOT NULL,
	              `ratio` VARCHAR(255) NOT NULL,
	              `skill` VARCHAR(255) NOT NULL,
	              `assists` VARCHAR(255) NOT NULL,
	              `assistskill` VARCHAR(255) NOT NULL,
	              `curstreak` VARCHAR(255) NOT NULL,
	              `winstreak` VARCHAR(255) NOT NULL,
	              `rounds` VARCHAR(255) NOT NULL,
	              `hide` VARCHAR(255) NOT NULL,
	              `fixed_name` VARCHAR(255) NOT NULL,
	              `name` VARCHAR(255) NOT NULL,
	              `time_add` VARCHAR(255) NOT NULL,
	              `time_edit` VARCHAR(255) NOT NULL,
	              PRIMARY KEY  (id)

	            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
	    ";
	    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	    dbDelta( $dxp_tbl_query );
	}

}
register_activation_hook ( __FILE__, 'dxp_create_tbl' );
add_action('after_setup_theme', 'dxp_create_tbl');


function dxp_get_top_players($name, $limit = 8){
	$name  = sanitize_text_field($name);
	global $wpdb;
	$dxp_db_bane = $wpdb->prefix.'players_status';
	$dxp_sql = "SELECT * FROM $dxp_db_bane 
	ORDER BY $name DESC 
	LIMIT $limit";
	$dxp_results = $wpdb->get_results($dxp_sql);
	return count($dxp_results) > 0 ? $dxp_results : false;
}

function dxp_get_player($id){
	$id = (int)$id;
	global $wpdb;
	$dxp_db_bane = $wpdb->prefix.'players_status';
	$data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $dxp_db_bane WHERE player_id = %d", $id));
	return (count($data) > 0) ? $data : false ;
}

function dxp_get_players($limit = 8, $offest = 0){
	global $wpdb;
	$dxp_db_bane = $wpdb->prefix.'players_status';
	$dxp_sql = "SELECT * FROM $dxp_db_bane 
	ORDER BY id DESC 
	LIMIT $offest,$limit";
	$dxp_results = $wpdb->get_results($dxp_sql);
	return count($dxp_results) > 0 ? $dxp_results : false;
}

function dxp_get_player_for_profile($id){
	$id = (int)$id;
	global $wpdb;
	$dxp_db_bane = $wpdb->prefix.'players_status';
	$data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $dxp_db_bane WHERE id = %d", $id));
	return (count($data) > 0) ? $data : false ;
}
