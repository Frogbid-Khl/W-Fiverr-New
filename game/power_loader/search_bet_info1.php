<?php    
    include_once('../../command.php');
    include_once( '../../common.php' );
    include_once( '../../sudda_config.php' );
    $obj = new Request( );
    $data =  $obj->send_command( [
        'command' => 'http://'.G5_SUDDA_API_Address.'/api_pb/search_bet_info.aspx',
        'headers' => [
            'Content-Type: text/html'
        ],
        'user_id' => $member[ 'mb_no' ],
        'user_name' => $member[ 'mb_id' ],
        'r' => $_GET[ 'r' ]
    ], 'json' );      
    echo json_encode( $data );
?>