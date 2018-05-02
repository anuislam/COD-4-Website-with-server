<?php 
//**********************************
// define some path and url
//**********************************

define('dxp_root_path', get_template_directory());
define('dxp_root_url', get_template_directory_uri());
define('dxp_site_url', site_url());

//************************************************
//after setup theme
//************************************************
require_once(dxp_root_path.'/inc/setup_theme.php');

//************************************************
//load script
//************************************************

require_once(dxp_root_path.'/inc/scripts.php');

require_once(dxp_root_path.'/metaboxs/cmb2functions.php');

require_once(dxp_root_path.'/inc/functions.php');
require_once(dxp_root_path.'/inc/database.php');
require_once(dxp_root_path.'/inc/update_data.php');
