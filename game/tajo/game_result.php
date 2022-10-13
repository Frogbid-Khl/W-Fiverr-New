<?php    
    include_once( '../../common.php' );
    $json = file_get_contents('php://input');    
    $json = json_decode( $json );
    $result = 0;    
    if( $json->winAmount != 0 ) {
        $result = insert_point( $json->userName, $json->winAmount, $json->description );
    }
    if( $json->winAmount1 != 0 ) {
        $result = insert_point( $json->userName, $json->winAmount1, $json->description1 );
    }
    echo $result;
?>