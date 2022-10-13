<?php
include_once("./_common.php");
header("Expires: Mon 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d, M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//설정 로드
include_once("./setup.php");

$pgstc = (int)$_POST['gstc'];
$pmpoint = (int)$_POST['pmpoint'];
$okmoney = (int)$_POST['okmoney'];
$tokenkey = (int)$_POST['tokenkey'];
$sgametokenkey = (int)$_POST['gamekey'];
$member_point = $member['mb_point'];


insert_point($member['mb_id'], $okmoney, "파워볼 에서 포인트획득", "@dokroll", $member['mb_id'], "up".G5_TIME_YMDHIS);
?>
