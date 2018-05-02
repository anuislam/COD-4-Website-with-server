
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo bloginfo( 'description' ); ?>" />
<meta name="keywords" content="call, of, duty, 4, modern, warfare, DXP, gamers" />
<meta name="author" content="anuislam" />
<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">

<?php wp_head();

$prefix = 'dxp_';
$logo = cmb2_get_option($prefix.'theme_options', $prefix.'home_slider_logo');

?>
</head>
<body>
<div id="fh5co-wrapper">
<div id="fh5co-page">
<div id="fh5co-header">
	<header id="fh5co-header-section">
		<div class="container">
			<div class="nav-header">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				<h1 id="fh5co-logo"><a href="<?php echo dxp_site_url; ?>"><?php echo $logo; ?></a></h1>
				<!-- START #fh5co-menu-wrap -->
				<nav id="fh5co-menu-wrap" role="navigation">
					
					<?php
					
					wp_nav_menu( array(
					    'theme_location' => 'header_menu',
					    'menu_class' => 'sf-menu',
					    'menu_id' => 'fh5co-sub-ddown',
					    'container' => 'ul',
					) );
					
					?>
				</nav>
			</div>
		</div>
	</header>		
</div>
