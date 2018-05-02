<?php

function dxp_add_menu_page(){
    add_menu_page( 'Update data', 'Update data', 'manage_options', 'updatedata', 'dxp_update_data_func' );
}

add_action('admin_menu', 'dxp_add_menu_page');


function dxp_update_data_func(){
    $prefix = 'dxp_';
    $dxp_url = cmb2_get_option($prefix.'theme_options', $prefix.'dxp_url');
    $dxp_key = cmb2_get_option($prefix.'theme_options', $prefix.'dxp_key');
    ?>
    <meta name="send_data_page_chack" content="ready">
    
    <div class="wrap">
        <h1>Update Game Data</h1>
        <form id="dxp_update_game_data">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="dxp_url" >Server Url</label>
                        </th>
                        <td>
                            <input name="dxp_url" type="text" id="dxp_url" class="regular-text" value="<?php echo $dxp_url; ?>">
                            <p>Server Url</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="dxp_key" >Server Key</label>
                        </th>
                        <td>
                            <input name="dxp_key" type="text" id="dxp_key" class="regular-text" value="<?php echo $dxp_key; ?>">
                            <p>Server Key</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="dxp_data_count" >Data count</label>
                        </th>
                        <td>
                            <input name="dxp_data_count" type="text" id="dxp_data_count" class="regular-text">
                            <p>Game Data Form Server</p>
                            <div class="dxp_loading" style="display:none;">
                                <img src="<?php echo dxp_root_url; ?>/images/loading-gif.gif"></img>
                            </div>
                            <ul id="dxp_data_load_html" style="display:none;">
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Start">
            </p>
        </form>
    </div>
    
    
    <?php
}