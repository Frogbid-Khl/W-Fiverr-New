<?php
include_once('./_common.php');

?>
<?php

// define('G5_MOBILE_AGENT',   'phone|samsung|lgtel|mobile|[^A]skt|nokia|blackberry|android|sony');  // config.php 선언
if(preg_match("/".G5_MOBILE_AGENT."/i", $_SERVER['HTTP_USER_AGENT'])) {
     goto_url("resgame_m.php");

} else {
     goto_url("resgame.php");

} 

?>