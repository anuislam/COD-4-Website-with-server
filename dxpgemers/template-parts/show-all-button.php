<?php
    $prefix = 'dxp_';
    $players_url = cmb2_get_option($prefix.'theme_options', $prefix.'players_page_url');

?>
<div id="fh5co-programs-section" style="padding:0;margin:0 0 80px 0;">
	<div class="container">
		<div class="row">
		    <div class="col-sm-12">
		        <a href="<?php echo $players_url; ?>" class="btn btn-primary btn-block">See all players</a>
		    </div>
		</div>
    </div>
</div>