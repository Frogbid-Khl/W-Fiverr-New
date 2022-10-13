<?php
include_once('./_common.php');

//ver1.0 150727 @_untitle_d


if ($is_guest) exit;

if (isset($_SESSION['realtime_memo_datetime'])){
    if ($_SESSION['realtime_memo_datetime'] >= (G5_SERVER_TIME - (60*2))) exit;
}

$sql = " select count(*) as cnt from {$g5['memo_table']} where me_recv_mb_id = '{$member['mb_id']}' and me_read_datetime = '0000-00-00 00:00:00' ";
$row = sql_fetch($sql);
if ($row['cnt']){
	set_session("realtime_memo_datetime", G5_SERVER_TIME);
	echo '<audio src="'.G5_PLUGIN_URL.'/memo_alarm/sound.mp3" autoplay style="display:none;"></audio>';
}	
exit;




?>