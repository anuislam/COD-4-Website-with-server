<?php

$key = 'sdspdkpskdpk';

if (empty($_GET['key'])) {
    echo 'error';
    die();
}


if ($_GET['key'] != $key) {
    echo 'error';
    die();
}

require_once(__DIR__.'/database/pdo.php');
$data = new as_database();
$clients = $data->as_getdata('clients');
$rer_data = array();
if (count($clients) > 0) {
    foreach ($clients as $client) {
        
        if (empty($client['id']) === false) {
         $stats = $data->as_getdata('xlr_playerstats', array(
                                'client_id' => (int)$client['id']
                            ));
        $stats_data = array();
            if ( $stats) {
                $stats_data['kills'] = (empty($stats[0]['kills']) === false) ? $stats[0]['kills'] : '0' ;
                $stats_data['deaths'] = (empty($stats[0]['deaths']) === false) ? $stats[0]['deaths'] : '0' ;
                $stats_data['teamkills'] = (empty($stats[0]['teamkills']) === false) ? $stats[0]['teamkills'] : '0' ;
                $stats_data['teamdeaths'] = (empty($stats[0]['teamdeaths']) === false) ? $stats[0]['teamdeaths'] : '0' ;
                $stats_data['suicides'] = (empty($stats[0]['suicides']) === false) ? $stats[0]['suicides'] : '0' ;
                $stats_data['ratio'] = (empty($stats[0]['ratio']) === false) ? $stats[0]['ratio'] : '0' ;
                $stats_data['skill'] = (empty($stats[0]['skill']) === false) ? $stats[0]['skill'] : '0' ;
                $stats_data['assists'] = (empty($stats[0]['assists']) === false) ? $stats[0]['assists'] : '0' ;
                $stats_data['assistskill'] = (empty($stats[0]['assistskill']) === false) ? $stats[0]['assistskill'] : '0' ;
                $stats_data['curstreak'] = (empty($stats[0]['curstreak']) === false) ? $stats[0]['curstreak'] : '0' ;
                $stats_data['winstreak'] = (empty($stats[0]['winstreak']) === false) ? $stats[0]['winstreak'] : '0' ;
                $stats_data['rounds'] = (empty($stats[0]['rounds']) === false) ? $stats[0]['rounds'] : '0' ;
                $stats_data['hide'] = (empty($stats[0]['hide']) === false) ? $stats[0]['hide'] : '0' ;
                $stats_data['fixed_name'] = (empty($stats[0]['fixed_name']) === false) ? $stats[0]['fixed_name'] : '0' ;
            }

        }
        $rer_data[] = array(
                'player_id' => (empty($client['id']) === false) ? $client['id'] : false ,
                'player_ip' => (empty($client['ip']) === false) ? $client['ip'] : false ,
                'player_name' => (empty($client['name']) === false) ? $client['name'] : false ,
                'time_add' => (empty($client['time_add']) === false) ? $client['time_add'] : false ,
                'time_edit' => (empty($client['time_edit']) === false) ? $client['time_edit'] : false ,
                'player_stats' => array(
                        'kills' => $stats_data['kills'],
                        'deaths' => $stats_data['deaths'],
                        'teamkills' => $stats_data['teamkills'],
                        'teamdeaths' => $stats_data['teamdeaths'],
                        'suicides' => $stats_data['suicides'],
                        'ratio' => $stats_data['ratio'],
                        'skill' => $stats_data['skill'],
                        'assists' => $stats_data['assists'],
                        'assistskill' => $stats_data['assistskill'],
                        'curstreak' => $stats_data['curstreak'],
                        'winstreak' => $stats_data['winstreak'],
                        'rounds' => $stats_data['rounds'],
                        'fixed_name' => $stats_data['fixed_name'],
                    )
            );

    }
}

echo json_encode($rer_data);

?>