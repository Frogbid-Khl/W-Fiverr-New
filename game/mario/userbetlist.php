<?php
include_once("./_common.php");
//설정 로드
include_once("./setup.php");


if ($member['mb_point']  < $min_point) {
  alert("보유하신 포인트(".number_format($member['mb_point']).")가 모자라 게임이 불가능.\\n\\n".number_format($min_point)." 이상 포인트 모으신 후 다시 이용 !!", G5_URL);
}

$zzz = G5_TIME_YMD;

$sql = " select count(*) as cnt from {$g5['point_table']}
         where po_rel_table = '@daroll'
         and mb_id = '{$member['mb_id']}'
         and substring(po_rel_action,1,10) = '{$zzz}' ";
$row = sql_fetch($sql);
$today_cnt = $row['cnt'];


if ($today_cnt > $today_max) {
    alert("하루에 게임은 ".$today_max."회만 가능합니다.", G5_URL);
}


$g5['title'] = "배팅내역 > 파워사다리";

include_once("./_head.php");

/* 배추빌더5 사이트바 제거 시작 - 홈짱 */
if(defined('_MW5_')) {
	$is_sidebar = false;
	echo "<style>";
	echo "#mw5 .main { width:100%; }"; // theme.config.php 파일에서 정의 - 홈짱
	echo "#mw5 .menu_title { width:100%; margin-left:0; }";
	echo "</style>";
}
/* 배추빌더5 사이트바 제거 종료 - 홈짱 */

$membermb_point = $member['mb_point'] ? $member['mb_point'] : 0;

?>
<?php

$member_id = $_GET['member_id'];
$sql2 = "select count(*)coul from power_ball_betlist where bet_uid = '".$member_id."'";
$row2 = sql_fetch($sql2);
$total_page = floor($row2['coul'] / 15);
$page = $_GET['page'];
$nuser = "15";
$member_id = $member[ 'mb_id' ];
if($page){

$pagw = ($page - 1) * 15;
}else{
$page = 1;
$pagw = 0;
}

$g5['title'] = '충전 신청';
include_once('./admin.head.php');

$sql = " select * from power_ball_betlist where bet_uid = '".$member_id."' order by sid desc limit ".$pagw.", 15";

$result = sql_query($sql);

for($i=0; $row=sql_fetch_array($result); $i++){

			$list[$i] = $row;
}
?>
<script>
	$(function(){
		
		$('.search_but').on('click', function(){
			var member_id = $('#member_id').val();

			var url = "./charge_list.php?search=y&member_id="+member_id;
			location.href=url;
		});
	});
</script>

	<div class="tbl_head01 tbl_wrap">
		<table style="text-align:center">
			<thead>
				<tr>
					<th>승식</th>
					<th>라운드</th>
					<th>종목</th>
					<th>배팅포인트</th>
					<th>당첨포인트</th>
					<th>결과</th>
				</tr>
			</thead>
			<tbody>
			<?php
			

        for ($i=-0; $i<count($list); $i++) {
			$one_delete = '<a class="charge_delete" id="'.$list[$i]['mo_no'].'">삭제</a>';
         ?>
		 
		<tr>
				<td>파워볼</td>
				<td><?php echo $list[$i]['bet_round']?></td>
				<td><?php if($list[$i]['bet_name'] == 1){
				echo "파홀";
				}else if($list[$i]['mo_chk'] == 2){
				echo "파짝";
				}else if($list[$i]['mo_chk'] == 3){
				echo "파언";
				}else if($list[$i]['mo_chk'] == 4){
				echo "파옵";
				}else if($list[$i]['mo_chk'] == 5){
				echo "일홀";
				}else if($list[$i]['mo_chk'] == 6){
				echo "일짝";
				}else if($list[$i]['mo_chk'] == 7){
				echo "일언";
				}else{
				echo "일옵";
				}?></td>
				<td><?php echo $list[$i]['bet_money']?></td>
		<?php
		include_once '_func.php';
			$round = $list[$i]['bet_round'];
			$name = $list[$i]['bet_name'];
			$result = $list[$i]['bet_result'];
			$url = 'https://bepick.net/game/default/nlotto_power';
			$data = webdata($url, 'GET', '');
			$data2 = splits($data, '</span><strong>'.$round.'', '</tr>', 1);
			$_count = explode('<span class="r_icon round15 nlotto_power_fd', $data2);
			$_count = count($_count);
			
			$Result1 = splits($data2,'<span class="r_icon round15 nlotto_power_fd','"', 1);
         $Result1 = str_replace('1_1', '1', $Result1);
         $Result1 = str_replace('1_2', '2', $Result1);
         $Result2 = splits($data2,'<span class="r_icon round15 nlotto_power_fd','"', 2);
         $Result2 = str_replace('2_1', '3', $Result2);
         $Result2 = str_replace('2_2', '4', $Result2);
         $Result3 = splits($data2,'<span class="r_icon round15 nlotto_power_fd','"', 3);
         $Result3 = str_replace('3_1', '5', $Result3);
         $Result3 = str_replace('3_2', '6', $Result3);
         $Result4 = splits($data2,'<span class="r_icon round15 nlotto_power_fd','"', 4);
         $Result4 = str_replace('4_1', '7', $Result4);
         $Result4 = str_replace('4_2', '8', $Result4);
         $Result5 = '';
         $Result6 = '';
         $Result7 = '';
         $Result8 = '';
         
         if($result=='적중'){
         $Result5 = '적중';
         $Result8 = $list[$i]['bet_ifmoney'];
         } else if($result=='미적'){
         $Result5 = '미적';
         $Result8 = $list[$i]['bet_ifmoney'];
         }else if($result=='대기중'){ 
            if($Result1==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[파워볼] 적중 포인트');
                  $sql = "update power_ball_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);
               
            }else if($Result2==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[파워볼] 적중 포인트');
                  $sql = "update power_ball_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);
               
            }else if($Result3==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[파워볼] 적중 포인트');
                  $sql = "update power_ball_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);

            }else if($Result4==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[파워볼] 적중 포인트');
                  $sql = "update power_ball_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);

            }else  if($Result4=="")
            {
               $Result5 = '미적';
	 $Result8 = '0';
            }else 
            {
               $Result5 = '미적';
	 $Result8 = '0';
               $sql = "update power_ball_betlist set bet_result = '미적' where sid = '".$sid."'";
               sql_query($sql);
            }
         } 
         echo'<td>'.$Result8.'<br><span class="font07"></td><td>'.$Result5.'';
		?>
		</td>		
		</tr>
		<?php
		}
		 ?>
		 </tbody>
		</table>
		<?php 
		if($member_id){
		echo get_paging($nuser, $page, $total_page, './userbetlist.php?member_id='.$member_id);
		 }else{
		echo get_paging($nuser, $page, $total_page, './userbetlist.php?page=');
		 }?>
	</div>

<?php
include_once("./_tail.php");
?>

