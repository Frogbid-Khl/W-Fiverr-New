<?php
include_once('./_common.php');

$member_id = $_GET['member_id'];
if($member_id){
//$sql2 = "select count(*)coul from bubble_loader_betlist where bet_uid = '".$member_id."'";
}else{
//$sql2 = "select count(*)coul from bubble_loader_betlist";
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

$sql = " select * from bubble_loader_betlist where bet_uid = '".$member_id."' order by sid desc limit ".$pagw.", 15";

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


$g5['title'] = "보글 사다리";

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


    	
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/sudda.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/toastr.js"></script>

<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/layout.css?ver=171222">
<link rel="stylesheet" type="text/css" href="css/toastr.css">


<link rel="stylesheet" href="../../new/mobile/common.css?1664819318">
	<link rel="stylesheet" href="../../new/mobile/main.css?1664819318">
	<link rel="stylesheet" href="../../new/mobile/sub.css?1664819318">
	<link rel="stylesheet" href="../../new/mobile/iconfont.css?1664819318">
	<link rel="stylesheet" href="../../new/mobile/swiper-bundle.css">
         <link rel="stylesheet" type="text/css" href="./css/new.css">
	<script type="text/javascript" src="../../new/mobile/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../../new/mobile/jquery.bxslider.min.js"></script>



    <script type="text/javascript">
		var isLogin = true;		
		
	setInterval(function() {
    	var caldatetime = new Date();
        var _H = caldatetime.getHours();
        if (_H < 10) { _H = "0" + _H; }
        var _I = caldatetime.getMinutes();
        if (_I < 10) { _I = "0" + _I; }
        var _S = caldatetime.getSeconds();
        if (_S < 10) { _S = "0" + _S; }
        $("#showtime").text(_H  + ":" + _I + ":" + _S);
    }, 1000);
   </script>
	<script type="text/javascript" src="../../new/mobile/common3.js?1664819318"></script>
    <script type="text/javascript" src="../../new/mobile/mobile/js/bet.js?1664819318"></script>






<div id="container">
	<div class="sub-container">
		<div class="sub-container-wrap">
			<div class="content-box">
		
            <div style="height:300px;overflow:hidden;">
             <iframe  src="https://bepick.net/live/bubbleladder" width="1024" height="768" style="transform:scale(calc(0.35));transform-origin: left top;"  scrolling="no" frameborder="0"></iframe>
            </div>

				<div class="power-box">
					<ul class="left">
						<li>
							<i>◎</i>
							 짱구사다리3분 <br><span class="yellow">
                               <span class="font11" style="color: #93ba0f !important;" id="game_round"></span>
                               <span class="font11" style="color: #93ba0f !important;" id="day_round"></span>

                            </span> 회차 
						</li>
					</ul>
					<span class="flip-clock-wrapper">
                    <span style="width:100%;text-align:right;display:none;" class="font06" id="left_time">00:00</span>
						<ul class="flip">
							<li class="flip-clock-active">
								<a href="#">
									<div class="up">
										<div class="inn" id="fliptimer_min1up">0</div>
									 </div>
									<div class="down">
										<div class="inn" id="fliptimer_min1down">0</div>
									</div>
								</a>
							</li>
						</ul>
						<ul class="flip">
							<li class="flip-clock-active">
								<a href="#">
									<div class="up">
										<div class="inn" id="fliptimer_min2up">0</div>
									</div>
									<div class="down">
										<div class="inn" id="fliptimer_min2down">0</div>
									</div>
								</a>
							</li>
						</ul>
						<span class="flip-clock-divider seconds m-t-7">
							<span class="flip-clock-dot topx">	</span>
							<span class="flip-clock-dot bottom">	</span>
						</span>
						<ul class="flip">
							<li class="flip-clock-active">
								<a href="#">
									<div class="up">
										<div class="inn" id="fliptimer_sec1up">0</div>
									</div>
									<div class="down">
										<div class="inn" id="fliptimer_sec1down">0</div>
									</div>
								</a>
							</li>
						</ul>
						<ul class="flip">
							<li class="flip-clock-active">
								<a href="#">
									<div class="up">
										<div class="inn" id="fliptimer_sec2up">0</div>
									</div>
									<div class="down">
										<div class="inn" id="fliptimer_sec2down">0</div>
									</div>
								</a>
							</li>
						</ul>
					</span>
				</div>
				<div class="section-box">
                	<div class="betting_lock" id="block">
                        <div class="line-center">배팅 마감</div>
                    </div>
					<div class="game-select-box-cont1">
						<div class="small-tit">홀/짝,좌/우,3줄/4줄  맞추는 게임.</div>
						<div class="cont">
							<ul>
								<li onclick="check_bet('peven')" id="peven">
									<div class="game-ctrl blue-box round">
										<p>홀<span class="str_prate rate_aeven po_no">1.95</span></p>
									</div>
								</li>

								<li onclick="check_bet('podd')" id="podd">
									<div class="game-ctrl red-box round">
										<p>짝<span class="str_prate rate_aodd po_no">1.95</span></p>
									</div>
								</li>
							</ul>
							<ul>
								<li onclick="check_bet('pdown')" id="pdown">
									<div class="game-ctrl blue-box round">
										<p>좌<span class="str_prate rate_adown po_no">1.95</span></p>
									</div>
								</li>
								<li onclick="check_bet('pup')" id="pup">
									<div class="game-ctrl red-box round">
										<p>우<span class="str_prate rate_aup po_no">1.95</span></p>
									</div>
								</li>
							</ul>
							<ul>
								<li onclick="check_bet('aeven')" id="aeven">
									<div class="game-ctrl blue-box round">
										<p>3줄<span class="str_prate rate_peven po_no">1.95</span></p>
									</div>
								</li>
								<li onclick="check_bet('aodd')" id="aodd">
									<div class="game-ctrl red-box round">
										<p>4줄<span class="str_prate rate_podd po_no">1.95</span></p>
									</div>
								</li>
							</ul>
							<!-- <ul>
								<li onclick="check_bet('adown')"  id="adown">
									<div class="game-ctrl red-box round">
										<p>좌3짝<span class="str_prate rate_pdown po_no">3.50</span></p>
									</div>
								</li>
								<li onclick="check_bet('aup')" id="aup">
									<div class="game-ctrl blue-box round">
										<p>우3홀<span class="str_prate rate_pup po_no">3.50</span></p>
									</div>
								</li>
							</ul>
							<ul>
								<li onclick="SETBETTYPE(9);">
									<div class="game-ctrl blue-box round">
										<p>좌4홀<span>3.50</span></p>
									</div>
								</li>
								<li onclick="SETBETTYPE(10);">
									<div class="game-ctrl red-box round">
										<p>우4짝<span>3.50</span></p>
									</div>
								</li> -->
							</ul>
						</div>
                    </div>
                </div>
            	<div class="section-box">
					<div class="section-box-tit">◎베팅내역 <span>최근 5회차만 확인 가능합니다. </span></div>
					<div class="table-style2 mt10">
						
                    
                    <table>
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
            <td>보글사다리</td>
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
         $url = 'https://bepick.net/game/default/bubble_ladder3';
         $data = webdata($url, 'GET', '');
         $data2 = splits($data, '</span><strong>'.$round.'</strong>', '</tr>', 1);
         $_count = explode('<span class="r_icon round15 bubble_ladder3_fd', $data2);
         $_count = count($_count);
         
         $Result1 = splits($data2,'<span class="r_icon round15 bubble_ladder3_fd','"', 1);
         $Result1 = str_replace('1_1', '1', $Result1);
         $Result1 = str_replace('1_2', '2', $Result1);
         $Result2 = splits($data2,'<span class="r_icon round15 bubble_ladder3_fd','"', 2);
         $Result2 = str_replace('2_1', '3', $Result2);
         $Result2 = str_replace('2_2', '4', $Result2);
         $Result3 = splits($data2,'<span class="r_icon round15 bubble_ladder3_fd','"', 3);
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
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[보글사다리] 적중 포인트');
                  $sql = "update bubble_loader_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);
               
            }else if($Result2==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[보글사다리] 적중 포인트');
                  $sql = "update bubble_loader_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);
               
            }else if($Result3==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[보글사다리] 적중 포인트');
                  $sql = "update bubble_loader_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);

            }else  if($Result3=="")
            {
               $Result5 = '대기중';
	 $Result8 = '0';
            }else 
            {
               $Result5 = '미적';
	 $Result8 = '0';
               $sql = "update bubble_loader_betlist set bet_result = '미적' where sid = '".$sid."'";
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
				<!-- <div class="go-cart" style="display: block;"><a href="#go-cart" class="iconfont"><img src="/mobile/images/hg/go-cart.png" alt=""></a></div> -->
				<div id="cart" class="mini-cart">
					<div id="go-cart" style="position: absolute; top:-200px; "></div>
					<div class="cart-top">
						<div class="betscroll">
							<ul class="ct_list" id="picklist">
							</ul>
						</div>
						<div class="cart-container">
                        <input type="hidden" class="betting_max_flag" />
							<div class="clearfix cart-detail">
								<p class="pull-left">나의베팅:</p>
								<p class="pull-right"><span class="yellow-lgreen" id="picklist"></span></p>
							</div>
							<div class="clearfix cart-detail">
								<p class="pull-left">예상적중배당:</p>
								<p class="pull-right"><span style="color:#ffd800;" class="str_pre_money">0</span></p>
							</div>
							<div class="clearfix cart-money">
								<dl class="pull-left">
									<dt>베팅금액</dt>
									<dd><input type="text" class="input1_1 str_bet_money" onkeyup="formatCurrency(this)" placeholder="0" ></dd>
								</dl>

								<dl class="pull-right">
									<dt>예상적중금액: </dt>
									<dd><span class="c-r str_bet_rate" >0</span><i class="c-w">원</i></dd>
								</dl>
							</div>
						</div>
						<div class="ct_betbt">
							<div>
								<button  style="color:black;" class="betbt" type="button" onClick="addMoneyBet(5000)">5,000원</button>
								<button  style="color:black;" class="betbt" type="button" onClick="addMoneyBet(10000)">10,000원</button>
								<button  style="color:black;" class="betbt" type="button" onClick="addMoneyBet(50000)">50,000원</button>
								<button  style="color:black;" class="betbt" type="button" onClick="addMoneyBet(100000)">100,000원</button>
								<button  style="color:black;" class="betbt" type="button" onClick="addMoneyBet(500000)">500,000원</button>
								<button  style="color:black;" class="betbt" type="button" onClick="addMoneyBet(1000000)">1,000,000원</button>
								<span><a href="javascript:resetMoneyBet();" class="cbt_re">RESET</a></span>
								<span><a href="javascript:resetMoneyBet();" class="cbt_max">잔돈</a></span>
							</div>
						</div>
						<div class="clearfix bsp-betbtn-box">
							<button class="pull-left bet-btn1" type="button" data-money="0" onClick="addMoneyBetMax()">MAX</button>
							<button class="pull-right bet-btn2" type="button" onclick="Betting()" id="btnBett">베팅하기</button>
						</div>
						<div class="bet-bt">
							<dl class="left">
								<dt>최소배팅포인트</dt>
								<dd><span class="min_bet_cost"></span></dd>
							</dl>										
							<dl class="right">
								<dt>최대배팅포인트</dt>
								<dd><span class="max_bet_cost"></span> </dd>
							</dl>
						</div>
						<!--div class="cart-close-box"><a href="#">카트닫기</a></div-->
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

<?php
include_once("./_tail.php");
?>