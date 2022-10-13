<?php
include_once('./_common.php');

$member_id = $_GET['member_id'];
if($member_id){
//$sql2 = "select count(*)coul from power_loader_betlist where bet_uid = '".$member_id."'";
}else{
//$sql2 = "select count(*)coul from power_loader_betlist";
}
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

$sql = " select * from power_loader_betlist where bet_uid = '".$member_id."' order by sid desc limit ".$pagw.", 15";

$result = sql_query($sql);

for($i=0; $row=sql_fetch_array($result); $i++){

         $list[$i] = $row;
}
//설정 로드
include_once("./setup.php");


//if ($member['mb_point']  < $min_point) {
//  alert("보유하신 포인트(".number_format($member['mb_point']).")가 모자라 게임이 불가능.\\n\\n".number_format($min_point)." 이상 포인트 모으신 후 다시 이용 !!", G5_URL);
//}

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


$g5['title'] = "파워사다리";

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
<br>
<br>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/sudda.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/toastr.js"></script>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/toastr.css">
<link rel="stylesheet" type="text/css" href="css/layout.css?ver=171222">
<center>

<div style="margin:auto; overflow:hidden;position:relative; padding:0px;">
   <iframe src="http://ntry.com/scores/power_ladder/live.php" width="850" height="641" scrolling="no" frameborder="0"></iframe>
    </div>
<div id="contents_wrap">
    <div class="contents_box">
        <div class="contents_in">
            <div class="contents_left">
            <div id="block">베팅시간이 마감되었습니다</div>
   <div class="cart_tit">
      <span class="font11" id="game_round"></span><span class="font11" id="day_round"></span>회차&nbsp;&nbsp;&nbsp;남은시간 <span class="font06" id="left_time">00:00</span>
   </div>

   <div class="w_tab_cont" id="tab_cont1">
      <div class="cart_box">
         <div class="con_box00">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_bet_table">
                    <tr>
                  <td width="10%" class="ps_1">
                     <div class="po_box" id="peven">
                        <a href="javascript:check_bet('peven')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">좌</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_aeven">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3">
                     <div class="po_box" id="podd">
                        <a href="javascript:check_bet('podd')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">우</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_aodd">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
               </tr>
                    <tr>
                  <td width="10%" class="ps_1">
                     <div class="po_box" id="pdown">
                        <a href="javascript:check_bet('pdown')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">3</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_adown">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3">
                     <div class="po_box" id="pup">
                        <a href="javascript:check_bet('pup')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">4</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_aup">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
               </tr>
            </table>
         </div>
            <div class="con_box05">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_bet_table" id="holJakBetting">
               <tr>
                  <td width="10%" class="ps_1">
                     <div class="po_box" id="aeven">
                        <a href="javascript:check_bet('aeven')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">홀</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_peven">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3">
                     <div class="po_box" id="aodd">
                        <a href="javascript:check_bet('aodd')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">짝</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_podd">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td width="10%" class="ps_1" style="display:none">
                     <div class="po_box" id="adown">
                        <a href="javascript:check_bet('adown')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">일언</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_pdown">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3" style="display:none">
                     <div class="po_box" id="aup">
                        <a href="javascript:check_bet('aup')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">일옵</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_pup">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
               </tr>
            </table>
         </div>
	
	<div class="con_box05" style="display:none">
	일반볼조합
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_bet_table" id="holJakBetting">
               <tr>
                  <td width="10%" class="ps_1">
                     <div class="po_box" id="ahdown">
                        <a href="javascript:check_bet('ahdown')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">홀언</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_ahdown">3.7</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3">
                     <div class="po_box" id="ahup">
                        <a href="javascript:check_bet('ahup')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">홀옵</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_ahup">3.7</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td width="10%" class="ps_1">
                     <div class="po_box" id="ajdown">
                        <a href="javascript:check_bet('ajdown')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">짝언</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_ajdown">3.7</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3">
                     <div class="po_box" id="ajup">
                        <a href="javascript:check_bet('ajup')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">짝옵</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_ajup">3.7</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
               </tr>
            </table>
         </div>
	
	<div class="con_box05" style="display:none">
	파워볼조합
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_bet_table" id="holJakBetting">
               <tr>
                  <td width="10%" class="ps_1">
                     <div class="po_box" id="phdown">
                        <a href="javascript:check_bet('phdown')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">홀언</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_phdown">3.7</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3">
                     <div class="po_box" id="phup">
                        <a href="javascript:check_bet('phup')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">홀옵</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_phup">3.7</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td width="10%" class="ps_1">
                     <div class="po_box" id="pjdown">
                        <a href="javascript:check_bet('pjdown')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">짝언</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_pjdown">3.7</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3">
                     <div class="po_box" id="pjup">
                        <a href="javascript:check_bet('pjup')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">짝옵</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_pjup">3.7</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
               </tr>
            </table>
         </div>

      </div>
      <div class="cart_line"></div>
      <div class="cart_box">
         <div class="bet_tit">
            최근 베팅내역
            <div class="arrow">
            </div>
         </div>
         <div class="cart_list1111">
            <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
         <tbody>
         <tr>
               <th>승식</th>
               <th>라운드</th>
               <th>종목</th>
               <th>배팅포인트</th>
               <th>당첨포인트</th>
               <th>결과</th>
            </tr>
         <?php
         
if($list && count($list) > 0) {    //추가 시작 - PHP 7.2.x count() 에러 해결
$countn = count($list);
}

         if($countn==0) {    //추가 시작 - PHP 7.2.x count() 에러 해결
         $countn = 0;
         }else if($countn==1){
   $countn = 1;
        }else if($countn==2){
   $countn = 2;
        }else if($countn==3){
   $countn = 3;
        }else if($countn==4){
   $countn = 4;
        }else{
   $countn = 5;
        }
        for ($i=0; $i<$countn; $i++) {
         $one_delete = '<a class="charge_delete" id="'.$list[$i]['mo_no'].'">삭제</a>';
         ?>
       
      <tr>
            <td>파워사다리</td>
            <td><?php echo $list[$i]['bet_round']?></td>
            <td style="text-align:left">
	    <div class="<?php if($list[$i]['bet_name'] == 1){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 2){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 3){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 4){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 5){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 6){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 7){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 8){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 57){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 58){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 67){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 68){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 13){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 14){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 23){
            echo "po_color1";
            }else{
            echo "po_color2";
            }?>"><?php if($list[$i]['bet_name'] == 1){
            echo "좌";
            }else if($list[$i]['bet_name'] == 2){
            echo "우";
            }else if($list[$i]['bet_name'] == 3){
            echo "3";
            }else if($list[$i]['bet_name'] == 4){
            echo "4";
            }else if($list[$i]['bet_name'] == 5){
            echo "홀";
            }else if($list[$i]['bet_name'] == 6){
            echo "짝";
            }else if($list[$i]['bet_name'] == 7){
            echo "언";
            }else if($list[$i]['bet_name'] == 8){
            echo "옵";
            }else if($list[$i]['bet_name'] == 57){
            echo "홀언";
            }else if($list[$i]['bet_name'] == 58){
            echo "홀오";
            }else if($list[$i]['bet_name'] == 67){
            echo "짝언";
            }else if($list[$i]['bet_name'] == 68){
            echo "짝오";
            }else if($list[$i]['bet_name'] == 13){
            echo "홀언";
            }else if($list[$i]['bet_name'] == 14){
            echo "홀오";
            }else if($list[$i]['bet_name'] == 23){
            echo "짝언";
            }else{
            echo "짝오";
            }?></div></td>
            <td><span class="font05"><?php echo $list[$i]['bet_money']?></span></td>
      <?php
      include_once('./_func.php');
      include_once('./_common.php');
         $sid = $list[$i]['sid'];
         $round = $list[$i]['bet_round'];
         $name = $list[$i]['bet_name'];
         $result = $list[$i]['bet_result'];
         $money = $list[$i]['bet_money'];
         $value = 1.95;
         $ifmoney = $money * $value;
         $url = 'https://bepick.net/game/default/ntry_pwladder';
         $data = webdata($url, 'GET', '');
         $data2 = splits($data, '</span><strong>'.$round.'</strong>', '</tr>', 1);
         $_count = explode('<span class="r_icon round15 ntry_pwladder_fd', $data2);
         $_count = count($_count);
         
         $Result1 = splits($data2,'<span class="r_icon round15 ntry_pwladder_fd','"', 1);
         $Result1 = str_replace('1_1', '1', $Result1);
         $Result1 = str_replace('1_2', '2', $Result1);
         $Result2 = splits($data2,'<span class="r_icon round15 ntry_pwladder_fd','"', 2);
         $Result2 = str_replace('2_1', '3', $Result2);
         $Result2 = str_replace('2_2', '4', $Result2);
         $Result3 = splits($data2,'<span class="r_icon round15 ntry_pwladder_fd','"', 3);
         $Result3 = str_replace('3_1', '5', $Result3);
         $Result3 = str_replace('3_2', '6', $Result3);
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
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[파워사다리] 적중 포인트');
                  $sql = "update power_loader_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);
               
            }else if($Result2==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[파워사다리] 적중 포인트');
                  $sql = "update power_loader_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);
               
            }else if($Result3==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[파워사다리] 적중 포인트');
                  $sql = "update power_loader_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);

            }else  if($Result3=="")
            {
               $Result5 = '대기중';
	 $Result8 = '0';
            }else 
            {
               $Result5 = '미적';
	 $Result8 = '0';
               $sql = "update power_loader_betlist set bet_result = '미적' where sid = '".$sid."'";
               sql_query($sql);
            }
         } 
         echo'<td>'.$Result8.'<br><span class="font07"></td><td>'.$Result5.'';
      ?>
      </td>      
      </tr>
      <?php
      if($Result6 == '1'){
      //insert_point( $member[ 'mb_id' ], $money*1.95, '[파워볼] 적중 포인트');
      //location.reload();
      }
      ?>
      <?php
      }
       ?>
       </tbody>
      </table>
         </div>
      </div>
   </div>
            </div>
            <div class="contents_right">   
   <div class="cart_box">
      <div class="bet_tit">
         <a class="po_box" href="javascript:window.open('https://ntry.com', '통계표', 'width=1000, height=650');" style="width:30%; float:left; padding-right: 8px; text-align: center;">
            통계표보기
         </a>
         <div style="float:right; padding: 12px;">
            보유포인트&nbsp;&nbsp;&nbsp; <span class="font06" id="user_point"></span>
         </div>
      </div>
      <div class="bet_cart">
         <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
            <tr>
               <td width="10%" align="center" class="ps_1"><a href="javascript:addMoneyBet(100);"><span class="cart_btn1">100P</span></a></td>
               <td width="10%" align="center" class="ps_2"><a href="javascript:addMoneyBet(1000)"><span class="cart_btn1">1,000P</span></a></td>
               <td width="10%" align="center" class="ps_3"><a href="javascript:addMoneyBet(10000)"><span class="cart_btn1">10,000P</span></a></td>
            </tr>
            <tr>
               <td width="10%" align="center" class="ps_1"><a href="javascript:addMoneyBet(50000)"><span class="cart_btn1">50,000P</span></a></td>
               <td width="10%" align="center" class="ps_2"><a href="javascript:addMoneyBet(100000)"><span class="cart_btn1">100,000P</span></a></td>
               <td width="10%" align="center" class="ps_3"><a href="javascript:addMoneyBet(500000)"><span class="cart_btn1">500,000P</span></a></td>
            </tr>
         </table>
         <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
            <tr>
               <td width="10%" align="center" class="ps_1"><a href="javascript:addMoneyBetMax();"><span class="cart_btn1">MAX</span></a></td>
               <td width="10%" align="center" class="ps_3"><a href="javascript:resetMoneyBet();"><span class="cart_btn1">RESET</span></a></td>
            </tr>
            <tr>
               <td width="10%" align="center" colspan="2">
                  <a href="javascript:Betting();">
                     <div class="cart_btn2 betting_cart">
                        <span style="float:right">베팅하기</span>
                     </div>
                  </a>
               </td>
            </tr>
         </table>
      </div>
      <!-- <div class="cart_line"></div> -->
      <div class="cart">
            <input type="hidden" class="betting_max_flag" />
         <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
            <tr>
               <td style="height:15px" colspan="2"></td>
            </tr>
            <tr>
               <td class="cart_style1">최소배팅포인트 <span class="cart_style2 min_bet_cost"></span></td>
               <td class="cart_style1">최대배팅포인트  <span class="cart_style2 max_bet_cost"></span></td>
            </tr>
            <tr>
               <td style="height:5px" colspan="2"></td>
            </tr>
            <tr>
               <td class="cart_style1" colspan="2">예상배당률 <span class="cart_style2 str_bet_rate">0.00</span></td>
            </tr>
            <tr>
               <td style="height:5px" colspan="2"></td>
            </tr>
            <tr>
               <td class="cart_style1" colspan="2">배당금<span class="cart_style2 font04 str_pre_money">0.00</span></td>
            </tr>
            <tr>
               <td style="height:5px" colspan="2"></td>
            </tr>
            <tr>
               <td class="cart_style1">
                        배팅포인트
               </td>
                    <td class="cart_style1" style="padding: 0 2px 0 10px;">
                        <input type="text" class="input1_1 str_bet_money" onkeyup = "formatCurrency(this);" style="text-align:right;float:right;padding-right:5px;" placeholder="0" />
               </td>
            </tr>
         </table>
      </div>      
   </div>
</div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src='jquery.keyframes.min_.js'></script>

<script>
var rotationsTime = 8;
    var wheelSpinTime = 6;
    var ballSpinTime = 5;
    var numorder = [0, 32, 15, 19, 4, 21, 2, 25, 17, 34, 6, 27, 13, 36, 11, 30, 8, 23, 10, 5, 24, 16, 33, 1, 20, 14, 31, 9, 22, 18, 29, 7, 28, 12, 35, 3, 26];
    var numred = [32, 19, 21, 25, 34, 27, 36, 30, 23, 5, 16, 1, 14, 9, 18, 7, 12, 3];
    var numblack = [15, 4, 2, 17, 6, 13, 11, 8, 10, 24, 33, 20, 31, 22, 29, 28, 35, 26];
    var numgreen = [0];
    var numbg = $('.pieContainer');
    var ballbg = $('.ball');
    var btnSpin = $('#btnSpin');
    var toppart = $("#toppart");
    var pfx = $.keyframe.getVendorPrefix();
    var transform = pfx + 'transform';
    var rinner = $("#rcircle");
    var numberLoc = [];

    createWheel();
function createWheel() {
        var temparc = 360 / numorder.length;
        for (var i = 0; i < numorder.length; i++) {


            numberLoc[numorder[i]] = [];
            numberLoc[numorder[i]][0] = i * temparc;
            numberLoc[numorder[i]][1] = (i * temparc) + temparc;

            newSlice = document.createElement("div");
            $(newSlice).addClass("hold");
            newHold = document.createElement("div");
            $(newHold).addClass("pie");
            newNumber = document.createElement("div");
            $(newNumber).addClass("num");

            newNumber.innerHTML = numorder[i];
            $(newSlice).attr('id', 'rSlice' + i);
            $(newSlice).css('transform', 'rotate(' + numberLoc[numorder[i]][0] + 'deg)');
            
            $(newHold).css('transform', 'rotate(9.73deg)');
            $(newHold).css('-webkit-transform', 'rotate(9.73deg)');

            if ($.inArray(numorder[i], numgreen) > -1) {
                $(newHold).addClass("greenbg");
            } else if ($.inArray(numorder[i], numred) > -1) {
                $(newHold).addClass("redbg");
            } else if ($.inArray(numorder[i], numblack) > -1) {
                $(newHold).addClass("greybg");
            }

            $(newNumber).appendTo(newSlice);
            $(newHold).appendTo(newSlice);
            $(newSlice).appendTo(rinner);
        }
        //console.log(numberLoc);

    }

    btnSpin.click(function () {
        if($( '.betnum1' ).val()!=""){
   strpost_update( $( '.betnum2' ).val());
           var rndNum = Math.floor((Math.random() * 34) + 0);
        }
        


        
        winningNum = rndNum;
        spinTo(winningNum);
        

    });

    $("#btnb").click(function(){
      $(".spinner").css("font-size","+=.3em");
    });
    $("#btns").click(function(){
      $(".spinner").css("font-size","-=.3em");
    });


function resetAni() {

        animationPlayState = "animation-play-state";
        playStateRunning = "running";

        $(ballbg).css(pfx + animationPlayState, playStateRunning).css(pfx + "animation", "none");

        $(numbg).css(pfx + animationPlayState, playStateRunning).css(pfx + "animation", "none");
        $(toppart).css(pfx + animationPlayState, playStateRunning).css(pfx + "animation", "none");

        $("#rotate2").html("");
        $("#rotate").html("");

    }

    function spinTo(num) {
        //get location
        var temp = numberLoc[num][0] + 4;

        //randomize
        var rndSpace = Math.floor((Math.random() * 360) + 1);

        resetAni();
        setTimeout(function () {
            bgrotateTo(rndSpace);
            ballrotateTo(rndSpace + temp);
        }, 500);
   
   
    }

    function ballrotateTo(deg) {
        var temptime = (rotationsTime * 1000);
        var dest = (-360 * ballSpinTime) - (360 - deg);

        $.keyframe.define({
            name: 'rotate2',
            from: {
                transform: 'rotate(0deg)'
            },
            to: {
                transform: 'rotate(' + dest + 'deg)'
            }
        });

        $(ballbg).playKeyframe({
            name: 'rotate2', // name of the keyframe you want to bind to the selected element
            duration: temptime, // [optional, default: 0, in ms] how long you want it to last in milliseconds
            timingFunction: 'ease-in-out', // [optional, default: ease] specifies the speed curve of the animation
            complete: function () {
   if($( '.betnum1' ).val() == winningNum){
   stcpost_update( $( '.betnum2' ).val()*10);
   alert("적중!! 축하드립니다.");
   }
   else{
   alert("실패");
   }
                finishSpin();
      
            } //[optional]  Function fired after the animation is complete. If repeat is infinite, the function will be fired every time the animation is restarted.
        });
   
    }

    function bgrotateTo(deg) {
        var dest = 360 * wheelSpinTime + deg;
        var temptime = (rotationsTime * 1000) - 1000;



        $.keyframe.define({
            name: 'rotate',
            from: {
                transform: 'rotate(0deg)'
            },
            to: {
                transform: 'rotate(' + dest + 'deg)'
            }
        });

        $(numbg).playKeyframe({
            name: 'rotate', // name of the keyframe you want to bind to the selected element
            duration: temptime, // [optional, default: 0, in ms] how long you want it to last in milliseconds
            timingFunction: 'ease-in-out', // [optional, default: ease] specifies the speed curve of the animation
            complete: function () {

            } //[optional]  Function fired after the animation is complete. If repeat is infinite, the function will be fired every time the animation is restarted.
        });

        $(toppart).playKeyframe({
            name: 'rotate', // name of the keyframe you want to bind to the selected element
            duration: temptime, // [optional, default: 0, in ms] how long you want it to last in milliseconds
            timingFunction: 'ease-in-out', // [optional, default: ease] specifies the speed curve of the animation
            complete: function () {

            } //[optional]  Function fired after the animation is complete. If repeat is infinite, the function will be fired every time the animation is restarted.
        });

   
    }
   function strpost_update(val)
   {
      var f = document.strfpost;
      var action_url = 'resgame_on.php';
      var action_point = <?php echo $member['mb_point']?>;
      var action_kenkey = <?php echo $member['mb_point']?>;
         f.tokenkey.value = action_point;
         f.gamekey.value = action_kenkey;
         f.pmpoint.value = val;
         f.target = 'game_hframe';
         f.action = action_url;
         f.submit();
   }
   function stcpost_update(val)
   {
      var f = document.stcfpost;
      var action_url = 'resgame_on.php';
      var actions_point = <?php echo $member['mb_point']?>;
      var actions_kenkey = <?php echo $member['mb_point']?>;
         f.tokenkey.value = actions_point;
         f.gamekey.value = actions_kenkey;
         f.okmoney.value = val;
         f.target = 'game_hframe';
         f.action = action_url;
         f.submit();
   }
</script>
</center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include_once("./_tail.php");
?>