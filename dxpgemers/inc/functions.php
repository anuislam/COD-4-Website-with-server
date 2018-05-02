<?php
function dxp_get_game_data_func(){
    if (empty($_POST) === false) {
        $dxp_nonce = $_POST['dxp_nonce'];
        
        if ( ! wp_verify_nonce( $dxp_nonce, 'dxp_nonce' ) ) {
        
            echo 'error'; 
        
        } else {
            $prefix = 'dxp_';
            $dxp_url = cmb2_get_option($prefix.'theme_options', $prefix.'dxp_url');
            $dxp_key = cmb2_get_option($prefix.'theme_options', $prefix.'dxp_key');
            $data = file_get_contents(esc_url($dxp_url.'?key='.$dxp_key));
            echo $data;
        
        }

    }
    die();
}
add_action('wp_ajax_dxp_get_game_data', 'dxp_get_game_data_func');


function dxp_update_data_into_database(){
    if (empty($_POST) === false) {
        global $wpdb;
	    $dxp_db_bane = $wpdb->prefix.'players_status';
        $dxp_nonce = $_POST['dxp_nonce'];
        if ( ! wp_verify_nonce( $dxp_nonce, 'dxp_nonce' ) ) {
        
            echo 'error'; 
        
        } else {
            if (is_array($_POST)) {
                foreach($_POST as $key => $value){
                    $_POST[$key] = ($value == 'null') ? 0 : $value ;
                }
            }
            $data = file_get_contents('http://www.geoplugin.net/json.gp?ip='.sanitize_text_field($_POST['player_ip']));
            $data = json_decode($data);
            $player = dxp_get_player((int)$_POST['player_id']);
            if ($player) {
                $wpdb->update(
                    $dxp_db_bane, 
                    array(
                		'player_id' 		=> (int)$_POST['player_id'],
                		'player_ip' 		=> sanitize_text_field($_POST['player_ip']),
                		'country' 		=> sanitize_text_field($data->geoplugin_countryName),
                		'name' 		=> sanitize_text_field($_POST['player_name']),
                		'time_add' 		=> sanitize_text_field($_POST['time_add']),
                		'time_edit' 		=> sanitize_text_field($_POST['time_edit']),
                		'kills' 		=> sanitize_text_field($_POST['kills']),
                		'deaths' 		=> sanitize_text_field($_POST['deaths']),
                		'teamkills' 		=> sanitize_text_field($_POST['teamkills']),
                		'teamdeaths' 		=> sanitize_text_field($_POST['teamdeaths']),
                		'suicides' 		=> sanitize_text_field($_POST['suicides']),
                		'ratio' 		=> sanitize_text_field($_POST['ratio']),
                		'skill' 		=> sanitize_text_field($_POST['skill']),
                		'assists' 		=> sanitize_text_field($_POST['assists']),
                		'assistskill' 		=> sanitize_text_field($_POST['assistskill']),
                		'curstreak' 		=> sanitize_text_field($_POST['curstreak']),
                		'winstreak' 		=> sanitize_text_field($_POST['winstreak']),
                		'rounds' 		=> sanitize_text_field($_POST['rounds']),
                		'fixed_name' 		=> sanitize_text_field($_POST['fixed_name']),
                    	),
                    array(
                    	'player_id' => (int)$_POST['player_id'],
                    	)
                );
            }else{
                $wpdb->insert($dxp_db_bane, array(
                	 	'player_id'	=> (int)$_POST['player_id'],
                	 	'player_ip'	=> sanitize_text_field($_POST['player_ip']),
                	 	'country'	=> sanitize_text_field($data->geoplugin_countryName),
                	 	'name' 		=> sanitize_text_field($_POST['player_name']),
                	 	'time_add' 		=> sanitize_text_field($_POST['time_add']),
                	 	'time_edit' 		=> sanitize_text_field($_POST['time_edit']),
                	 	'kills' 		=> sanitize_text_field($_POST['kills']),
                	 	'deaths' 		=> sanitize_text_field($_POST['deaths']),
                	 	'teamkills' 		=> sanitize_text_field($_POST['teamkills']),
                	 	'teamdeaths' 		=> sanitize_text_field($_POST['teamdeaths']),
                	 	'suicides' 		=> sanitize_text_field($_POST['suicides']),
                	 	'ratio' 		=> sanitize_text_field($_POST['ratio']),
                	 	'skill' 		=> sanitize_text_field($_POST['skill']),
                	 	'assists' 		=> sanitize_text_field($_POST['assists']),
                	 	'assistskill' 		=> sanitize_text_field($_POST['assistskill']),
                	 	'curstreak' 		=> sanitize_text_field($_POST['curstreak']),
                	 	'winstreak' 		=> sanitize_text_field($_POST['winstreak']),
                	 	'rounds' 		=> sanitize_text_field($_POST['rounds']),
                	 	'fixed_name' 		=> sanitize_text_field($_POST['fixed_name']),
                	 ), array( 
                	 	'%d','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',
                	 )
                );
            }
        }

    }
    die();
}
add_action('wp_ajax_dxp_update_data_into_database', 'dxp_update_data_into_database');



    function url_gard($name, $value){
		if (empty($value) === false) {
			switch ($name) {
            case 'integer':
                return (preg_match('/^[0-9]{0,250}$/', $value)) ? true : false ;
                break;   
            case 'string':
                return (preg_match('/^[a-zA-Z]{0,250}$/', $value)) ? true : false ;
                break;  
            case 'mix':
                return (preg_match('/^[a-zA-Z0-9\-]{0,250}$/', $value)) ? true : false ;
                break;            
            default:
                return true;
                break;
	        
	        }		
	    }
	    return false;
    }



function dxp_players_load_more(){
    if (empty($_POST) === false) {
        if ( ! wp_verify_nonce( $_POST['nonce'], 'dxp_nonce' ) ) {
        
            echo 'error'; 
        
        } else {
        $players = dxp_get_players(8,(int)$_POST['counter']);
        if (empty($players)) {
            die('not');
        }
        $prefix = 'dxp_';
        $page_url = cmb2_get_option($prefix.'theme_options', $prefix.'profile_page_url');


        ?>


		<div class="row text-center">
		<?php
		$counter = 0;
		if (empty($players) === false) {
			foreach($players as $player){
				
			if ($counter > 0) {
				if ($counter % 4 == 0) {
				   echo '</div><div class="row text-center">';
				}
			}
			$counter++;
				
		?>

			<div class="col-md-3 col-sm-4">
				<div class="program">
					<a href="<?php echo $page_url; ?>?profile-id=<?php echo $player->id; ?>"><img src="<?php echo get_avatar_url( 'email@example.com', [
							'size' => '120'
						] ); ?>" alt="<?php echo $player->name; ?>" class="img-thumbnail"></a>
					<h3><a href="<?php echo $page_url; ?>?profile-id=<?php echo $player->id; ?>"><?php echo $player->name; ?></a></h3>
				</div>
			</div>

<?php
	   }
    }

?>

		</div>


<?php
        }
    }
    die();
}
add_action('wp_ajax_dxp_players_load_more', 'dxp_players_load_more');
add_action('wp_ajax_nopriv_dxp_players_load_more', 'dxp_players_load_more');


function dxp_ratio($data){
    $data = (int)$data;
    if ($data > 5) {
       $data = 5;
    }
    if ($data <= 0.5) {
        return '0.10';
    }
    if ($data <= 1) {
        return '0.20';
    }
    if ($data <= 1.5) {
        return '0.30';
    }
    if ($data <= 2) {
       return '0.40';
    }
    if ($data <= 2.5) {
        return '0.50';
    }
    if ($data <= 3) {
        return '0.60';
    }
    if ($data <= 3.5) {
        return '0.70';
    }
    if ($data <= 4) {
        return '0.80';
    }
    if ($data <= 4.5) {
        return '0.90';
    }
    if ($data <= 5) {
        return 1;
    }
}

