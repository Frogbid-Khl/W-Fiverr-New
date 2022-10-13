<?php
include_once('./_common.php');

$member_id = $_GET['member_id'];
if($member_id){
//$sql2 = "select count(*)coul from tajo_betlist where bet_uid = '".$member_id."'";
}else{
//$sql2 = "select count(*)coul from tajo_betlist";
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

$sql = " select * from tajo_betlist where bet_uid = '".$member_id."' order by sid desc limit ".$pagw.", 15";

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


$g5['title'] = "타조";

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

<script type="text/javascript"> 
//<![CDATA[
function calcHeight(){
 //find the height of the internal page

 var the_height=
 document.getElementById('the_iframe').contentWindow.
 document.body.scrollHeight;

 //change the height of the iframe
 document.getElementById('the_iframe').height=
 the_height;

 //document.getElementById('the_iframe').scrolling = "no";
 document.getElementById('the_iframe').style.overflow = "hidden";
}
//
</script>

<div style="display: inline-block;
    width: 360px;
    height: 290px;
    overflow: hidden;
    position: relative;
    padding-left: 10px;
    padding:0px;">
      <iframe src="https://jwcasino.net/ostrichrun" id="live-iframe" scrolling="no" frameborder="0" style="
    width: 200%;
    height: 720px;
    border: 0;
    display: block;
    margin: 0;
    padding: 6px 0;
    -ms-zoom: 0.55;
    -moz-transform: scale(0.55);
    -moz-transform-origin: 0 0;
    -o-transform: scale(0.55);
    -o-transform-origin: 0 0;
    -webkit-transform: scale(0.48);
    -webkit-transform-origin: 0 0;
"></iframe>
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
                                 <td class="td_left"><div class="po_color1">Left</div></td>
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
                                 <td class="td_left"><div class="po_color2">Right</div></td>
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
                  <td width="10%" class="ps_1" style="display:none">
                     <div class="po_box" id="pdown">
                        <a href="javascript:check_bet('pdown')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">1</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_adown">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3" style="display:none">
                     <div class="po_box" id="pup">
                        <a href="javascript:check_bet('pup')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">2</div></td>
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
            <div class="con_box05" style="display:none">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="main_bet_table" id="holJakBetting">
               <tr>
                  <td width="10%" class="ps_1">
                     <div class="po_box" id="aeven">
                        <a href="javascript:check_bet('aeven')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color1">3</div></td>
                                 <td class="td_right">
                                                <span class="str_prate rate_peven">1.95</span>
                                 </td>
                              </tr>
                           </table>
                        </a>
                     </div>
                  </td>
                  <td width="10%" class="ps_3" style="display:none">
                     <div class="po_box" id="aodd">
                        <a href="javascript:check_bet('aodd')">
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                 <td class="td_left"><div class="po_color2">4</div></td>
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
      </div>
      <div class="cart_line"></div>

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
<div class="cart_line"></div>
      <div class="cart_box">
         <div class="bet_tit">
            최근 베팅내역
            <div class="arrow">
            </div>
         </div>
        <div class="cart_list1111" id='cart_list1111'>
        </div>
      </div>
   </div>
<script>


function get_my_list()
{
	$.ajax({  
		type: "GET" 
		,url: "./get_betting_list.php?timeId=2"
		,dataType: 'html'
		,success:function(data){
			$("#cart_list1111").html(data);
		}
		,error:function(data){
			alert("베팅내역 확인중 오류가 발생했습니다. 페이지를 새로고침해주세요");
		}
	});
}

function numberWithCommas(x) {

    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

}

function all_cancel()
{
	var f=document.bet;
	f.bet_point.value = 0;
	$("#bet_point").html("0");

	f.bet_character.value='';
	//기존 클래스 지우기!!!
	document.getElementById("ca_button0").className = ""; 
	document.getElementById("ca_button1").className = ""; 
	document.getElementById("ca_button2").className = ""; 
	document.getElementById("ca_button3").className = ""; 
}

function select_character(val)
{
	var f = document.bet;
	f.bet_character.value=val;
	//기존 클래스 지우기!!!
	document.getElementById("ca_button0").className = ""; 
	document.getElementById("ca_button1").className = ""; 
	document.getElementById("ca_button2").className = ""; 
	document.getElementById("ca_button3").className = ""; 
	document.getElementById("ca_button"+val).className = "character_button_select"; 
}

function update_bet_rate() {

	$.ajax({
		dataType: 'json',
		url: './get_info.php?timeId=<?=$timeId?>',
		success: function (result) {

			//{"data":[{"batting_point":0,"batting_count":"0","rate":1},{"batting_point":0,"batting_count":"0","rate":1},{"batting_point":0,"batting_count":"0","rate":1},{"batting_point":0,"batting_count":"0","rate":1}]}

			$("#character0_point").html(result['data'][0]['batting_point']);
			$("#character0_rate").html(result['data'][0]['rate']);


			$("#character1_point").html(result['data'][1]['batting_point']);
			$("#character1_rate").html(result['data'][1]['rate']);


			$("#character2_point").html(result['data'][2]['batting_point']);
			$("#character2_rate").html(result['data'][2]['rate']);


			$("#character3_point").html(result['data'][3]['batting_point']);
			$("#character3_rate").html(result['data'][3]['rate']);



			$("#total_point").html(result['total_betpoint']);
			$("#my_point").html(result['my_betpoint']);


			$("#mb_point").html(result['mb_point']);
			try{
			$("#login_point").html(result['mb_point']);
			}catch(e){
			}
			

			//console.log(result);
		}// success
	});// ajax



	$.ajax({
		dataType: 'json',
		url: './getTime.php?timeId=<?=$timeId?>',
		success: function (result) {

			if(result.now_time==0||result.now_time>57){
				var f=document.bet;
				f.bet_point.value = 0;
				$("#bet_point").html("0");
				get_my_list();
				//game_result();
			}
			//console.log(result);
		}// success
	});// ajax


}
setInterval(function(){
	update_bet_rate();
},1500);
get_my_list();



/*
function game_result()
{
	$.ajax({
		dataType: 'json',
		url: './ajax/get_result.php?time_id=<?=$timeId?>',
		success: function (result) {
			get_my_list();
		}// success
	});// ajax
}
*/

setInterval(function(){
	get_my_list();
},7000);


</script>
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
</div>
<?php
include_once("./_tail.php");
?>