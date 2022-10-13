<?php
include_once("./_common.php");
//설정 로드
include_once("./setup.php");


if ($member['mb_point']  < $min_point) {
  alert("보유하신 포인트(".number_format($member['mb_point']).")가 모자라 게임이 불가능.\\n\\n".number_format($min_point)." 이상 포인트 모으신 후 다시 이용 !!", G5_URL);
}

$zzz = G5_TIME_YMD;

$sql = " select count(*) as cnt from {$g5['member_table']}
         where mb_recommend = '{$member['mb_id']}'";
$row = sql_fetch($sql);
$today_cnt = $row['cnt'];


$g5['title'] = "파트너 > 유저목록";

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
$sql2 = "select count(*)coul from {$g5['member_table']} where mb_recommend = '".$member_id."'";
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

$sql = " select * from {$g5['member_table']} where mb_recommend = '".$member_id."' order by mb_no desc limit ".$pagw.", 15";

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

<script language="JavaScript">
function open_pop(id){
    var frmPop= document.frmPopup;
    var url = 'http://ikrla06052.dothome.co.kr/game/powerball/muserbetlist.php';  
    window.open("", "popForm", "toolbar=no, width=679 height=630 directories=no status=no scrollorbars=no, resizable=no fullscreen=no menubar=no, status=no, toolbar=no");
    frmPop.action = url;
    frmPop.method="post";
    frmPop.target = 'popForm'; //window,open()의 두번째 인수와 같아야 하며 필수다.  
    frmPop.member_id.value = id;
    frmPop.submit();   
     
}

function open_pop2(id){
    var frmPop= document.frmPopup;
    var url = 'http://ikrla06052.dothome.co.kr/game/power_loader/muserbetlist.php';  
    window.open("", "popForm", "toolbar=no, width=679 height=630 directories=no status=no scrollorbars=no, resizable=no fullscreen=no menubar=no, status=no, toolbar=no");
    frmPop.action = url;
    frmPop.method="post";
    frmPop.target = 'popForm'; //window,open()의 두번째 인수와 같아야 하며 필수다.  
    frmPop.member_id.value = id;
    frmPop.submit();   
     
}
</script>

<form name="frmPopup">
<input type="hidden" name="member_id">
</form>

	<div class="tbl_head01 tbl_wrap">
		<table style="text-align:center">
			<thead>
				<tr>
					<th>아이디</th>
					<th>이름</th>
					<th>닉네임</th>
					<th>상태</th>
					<th>레벨</th>
					<th>보유금액</th>
					<th>파워볼 배팅내역</th>
					<th>파워사다리 배팅내역</th>
				</tr>
			</thead>
			<tbody>
			<?php
			
        for ($i=-0; $i<count($list); $i++) {
         ?>
		
		<tr>
				<td><?php echo $list[$i]['mb_id']?></td>
				<td><?php echo $list[$i]['mb_name']?></td>
				<td><?php echo $list[$i]['mb_nick']?></td>
				<td><?php
	$leave_msg = '';
        $intercept_msg = '';
        $intercept_title = '';
        if ($list[$i]['mb_leave_date']){ 
            $mb_id = $mb_id;
            $leave_msg = '<span class="mb_leave_msg">탈퇴함</span>';
        }
        else if ($list[$i]['mb_intercept_date']) {
            $mb_id = $mb_id;
            $intercept_msg = '<span class="mb_intercept_msg">차단됨</span>';
            $intercept_title = '차단해제';
        }
            if ($leave_msg || $intercept_msg) echo $leave_msg.' '.$intercept_msg;
            else echo "정상";
            ?></td>
				<td><?php echo $list[$i]['mb_level']?></td>
				<td><?php echo $list[$i]['mb_point']?></td>
				<td><span onclick="open_pop('<?php echo $list[$i]['mb_id']?>');">내역보기</span></td>
				<td><span onclick="open_pop2('<?php echo $list[$i]['mb_id']?>');">내역보기</span></td>
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
