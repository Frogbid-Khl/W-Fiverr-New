<?php    
    include_once('../../command.php');
    include_once( '../../common.php' );
    include_once( '../../sudda_config.php' );
    //json encode 변환
    $json = json_encode(array(
            array('user_point' => '100','round' => 'Park','day_round' => '153','round' => '15342412','min_bet_amounts' => '5000','max_bet_amounts' => '1000000','disableDraw' => 'enable','left_time' => '3','close_time' => '20')
        )
    );
 
//json decode 변환
$student = json_decode($json);



    //$obj = new Request( );
    //$data =  $obj->send_command( [
    //    'command' => 'http://'.G5_SUDDA_API_Address.'/api_pb/get_config.aspx',
    //    'headers' => [
    //        'Content-Type: application/json'
    //    ],
   //     'user_id' => $member[ 'mb_no' ],
   //     'user_name' => $member[ 'mb_id' ]
   // ], 'json' );
//        'disableDraw' => 'enable', //배팅제한
    $data = json_decode( $json );
    //$game = sql_fetch( "select * from g5_game" );
    $odds_array = explode( '*', $data[ 'bet_odds' ] );
    $odds = [
        'user_point' => $member['mb_point'],
        'round' => 'Park','day_round' => '153',
        'round' => '15342412',
        'min_bet_amounts' => '100',
        'max_bet_amounts' => '100000000',

        'left_time' => '3',
        'close_time' => '10',
        'aeven' => floatval( '1.95' ),
        'aodd' => floatval( '1.95' ),
        'adown' => floatval( '1.95' ),
        'aup' => floatval( '1.95' ),
        'peven' => floatval( '1.95' ),
        'podd' => floatval( '1.95' ),
        'pdown' => floatval( '1.95' ),
        'pup' => floatval( '1.95' ),
        'ahdown' => floatval( '3.95' ),
        'ahup' => floatval( '3.95' ),
        'ajdown' => floatval( '3.95' ),
        'ajup' => floatval( '3.95' ),   
        'phdown' => floatval( '4.12' ),
        'phup' => floatval( '3.12' ),    
        'pjdown' => floatval( '3.12' ),
        'pjup' => floatval( '4.12' )
    ];
    $user_point = $member['mb_point'] == null ? 0 : $member['mb_point'];
    $game[ "user_point" ] = $user_point;
    unset( $game[ "bet_odds" ] );
    $data = array_merge( $game, $odds );
    header("content-type: application/json");
    $Result3 = json_encode( $data );
    //echo json_encode( $data );

    include_once('./_func.php');
    include_once('./_common.php');
    $value = 1.95;
    $url = 'https://bepick.net/json/game/bubble_ladder3.json';
    $data = webdata($url, 'GET', '');
    $data1 = splits($data, 'round":', ',', 1);
    $data2 = splits($data, 'nextTime":', ',', 1);
    
    $Result1 = splits($Result3, 'day_round":',',', 1);
    $Result3 = str_replace($Result1, $data1, $Result3);

    $Result2 = splits($Result3, 'round":',',', 1);
    $Result3 = str_replace($Result2, $data1, $Result3);

    $Result4 = splits($Result3, 'left_time":"',',', 1);
    $Result3 = str_replace($Result4, $data2.'"', $Result3);
    echo	"$Result3";
?>
      