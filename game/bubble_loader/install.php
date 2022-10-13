<?
include_once("./_common.php");

if ($is_admin != "super")
    alert("최고관리자만 접근 가능합니다.", $g4[path]);

$t1 = explode(" ",microtime());



//	아래 함수의 주석을 제거 후 실행하세요.


	install_qstock();





$t2 = explode(" ",microtime()); 
echo "<br>Q Stock Setup Success!!<br>";
echo ($t2[1]-$t1[1])+($t2[0]-$t1[0]);
?>





<? //sql 시작
function install_qstock() {

global $g4;

$sql = " CREATE TABLE IF NOT EXISTS `bubble_loader_betlist` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `bet_uid` varchar(255) NOT NULL,
  `bet_round` int(7) NOT NULL,
  `bet_name` varchar(255) NOT NULL DEFAULT '0',
  `bet_money` int(11) NOT NULL DEFAULT '0',
  `bet_ifmoney` int(11) NOT NULL DEFAULT '0',
  `bet_result` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `qst_code` (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ";
sql_query($sql);

$sql = " select * from bubble_loader_betlist ";
$row = sql_fetch($sql);


}//sql 끝
?>