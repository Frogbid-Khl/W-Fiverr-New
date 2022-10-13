<!doctype html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<!--<title>휴게소</title>-->
	<title>휴게소</title>
	<link rel="stylesheet" href="/css/common.css?1665461011">
	<link rel="stylesheet" href="/css/main.css?1665461011">
	<link rel="stylesheet" href="/css/sub.css?1665461011">
	<link rel="stylesheet" href="/css/iconfont.css?v=1613542334">
	<link rel="stylesheet" href="/css/swiper-bundle.min.css">
    <link rel="shortcut icon" href="/favicon.ico">
	<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
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
    /***    
	// F12 버튼 방지         
	$(document).ready(function(){ 
		$(document).bind('keydown',function(e){ 
			if ( e.keyCode == 123) { 
				e.preventDefault(); 
				e.returnValue = false; 
			} 
		}); 
	}); 
	// 우측 클릭 방지 
	document.onmousedown=disableclick; 
	status="Right click is not available."; 
	function disableclick(event){ 
		if (event.button==2) { 
			alert(status); 
			return false; 
		} 
	} 
    ***/
    function getPayback(){
        $.ajax({
            type: "POST"
            , url: "/ajax.payback.php"
            , data: {}
            , dataType: "json"
            , cache: false
            , success: function (calData) {
                if (calData.result) {
                    alert(calData.msg);
                    location.reload();
                } else {
                    alert(calData.msg);
                }
            }
            , error: function () {
                console.log("member nickname check error! ");
            }
        });
    }    
	</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="/js/common3.js?1665461011"></script>
    <script type="text/javascript" src="/js/bet.js?1665461011"></script>
	<style>
#loading {
 width:100%;
 height:100%;
 line-height:100%;
 position: fixed;
 z-index:100000000; 
 filter: opacity(86%);
    opacity:0.85;
 background-color:#000;
 display:none;
}
#loading p{
 position:absolute;
 text-align:center;
 top:40%;
 left:50%;
 margin-left:-50px; 
 vertical-align:middle;
 font-size:18pt;
 color:#fff;
}
</style>
</head>
<body><!-- oncontextmenu='return false' onselectstart='return false' ondragstart='return false'-->

<div id="loading">
 <p><img src="/images/loading.gif?111" width="100" height="100" /><br /><br />로딩중..</p >
</div>
<div id="wraper">
	<div id="header">
		<div class="header-tp">
			<div class="header-tp-cont">
				<div class="logo"><a href="/main.php"><img src="/images/hg/logo.png?1665461011" alt=""></a></div>
				<!--<p class="day-box">2022년 10월 11일 (화) <span id="showtime">13:03:31</span></p>-->
				<div class="header-tp-rt">
					<ul>
						<li><img src="/images/common/lv1.png?1665461011" title="Lv. 1"><span class="white">까까쥬</span> 님,</li>
						<li><span class="icon iconfont">&#xe63b;</span><a href="/main/memo.php">쪽지함: <span class="white">0</span> 통</a></li>
						<li><span class="icon iconfont">&#xe6cc;</span><a href="/main/cashin.php">보유머니: <span class="yellow-green money_view01">0</span> 원</a> </li>
						<li><span class="icon iconfont">&#xe7fb;</span><a href="/main/point.php">보유포인트: <span class="white">0</span> Point</a> <a href="/main/point.php"><span class="gray iconfont">&#xe771;</span></a></li>
						<!-- 20210620 -->
						<li class="attend"><span><a href="javascript:getPayback();"><i class="iconfont icon" style="font-size:21px; position:relative; top:1px;">&#xed81;</i>페이백</a></span></li>
						<li class="attend"><span><a href="/main/attendance.php"><i class="iconfont icon">&#xe6f9;</i>출석부</a></span></li>
						<li class="coupon"><span><a href="/main/bok.php"><i class="iconfont icon">&#xe6a8;</i>쿠폰(<b id="bok_num">0</b>)</a></span></li>
						<!-- //20210620 -->

						<li>
							<!--<a href="/main/mypage.php" class="recommend">회원정보수정</a>-->
							<a href="/include/logout.php" class="logout"><i class="iconfont">&#xeb82;</i>로그아웃</a>
						</li>
					</ul>
				</div>
				<div class="header-tp-rt" style="display:none;">
					<ul>
						<li><input type="text" placeholder="회원아이디"> <input type="text" placeholder="비밀번호"> <a href="#n" class="btn pink sh login"><span>로그인하기</span></a> <a href="#n" class="btn black sh join"><span>무료회원가입</span></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header-bt">	
			<div class="header-bt-cont">
				<div class="nav">
					<ul>
						<!--li><a href="/main/sports-cross.php"><i class="iconfont">&#xe617;</i>스포츠</a>
							<ul class="deph2">
								<li><a href="/main/sports-cross.php">크로스</a></li>
								<li><a href="/main/sports-special.php">스페셜</a></li>
								<li><a href="/main/sports-live.php">실시간</a></li>
							</ul>
						</li-->
						<li><a href="/main/sports-cross.php">스포츠</a></li>
						<li><a href="/main/livesports.php">인플레이</a></li>
						<li><a href="/main/janggu_power1.php">미니게임</a>
							<!--ul class="deph2">
								<li><a href="/main/power.php">파워볼</a></li>
								<li><a href="/main/power_ladder.php">파워사다리</a></li>
								<li><a href="/main/bladder1.php">별다리1분</a></li>
								<li><a href="/main/bladder2.php">별다리2분</a></li>
								<li><a href="/main/bladder3.php">별다리3분</a></li>
								<li><a href="/main/bpower1.php">1분파워볼</a></li>
							</ul-->
						</li>
						<li><a href="/main/casino.php">카지노</a></li>
						<li><a href="javascript:location.href='http://hg-ssqq.com/main/slot_list.php';">슬롯게임</a></li>
						<li><a href="/main/hilo10.php">토큰게임</a></li>
						<li><a href="/main/vsoccer.php">BET365</a></li>
						<li><a href="javascript:location.href='http://hg-ssqq.com/main/vsports.php';">Leap 가상스포츠</a></li>
						<li><a href="#" class="wopen_mini" data-id="bom_game">지뢰게임</a></li>
						<!--<li><a href="javascript:location.href='http://hg-ssqq.com/main/vsports.php'"><i class="iconfont">&#xe979;</i>가상스포츠</a></li>-->
						<!--<li><a href="javascript:location.href='http://hg-ssqq.com/main/casino.php'"><i class="iconfont">&#xe648;</i>카지노</a>					
							<ul class="deph2">
								<li><a href="javascript:void(0);" onclick="onOpenBcr('MGLIVE')">마이크론</a></li>
                        		<li><a href="javascript:void(0);" onclick="onOpenBcr('OGT')">오리엔탈</a></li>
                        		<li><a href="javascript:void(0);" onclick="onOpenBcr('88CASINO')">88카지노</a></li>
								<li><a href="javascript:void(0);" onclick="onOpenBcr('DG')">드림게임</a></li>
								<li><a href="javascript:void(0);" onclick="onOpenBcr('AG')">Asia게임</a></li>
								<li><a href="javascript:void(0);" onclick="onOpenBcr('VIVO')">VIVO게임</a></li>
								<li><a href="javascript:void(0);" onclick="onOpenBcr('bbin')">bbin게임</a></li>
								<li><a href="javascript:void(0);" onclick="onOpenBcr('EVOLUTION')">에볼루션</a></li>
							</ul>
						</li>-->
						<!--
						<li><a href="javascript:location.href='http://hg-ssqq.com/main/slot.php'"><i class="iconfont">&#xe66c;</i>슬롯게임</a></li>
						
						<li><a href="javascript:location.href='http://hg-ssqq.com/main/hilo10.php'"><i class="iconfont">&#xe6b1;</i>토큰게임</a></li>
						<li><a href="#" class="wopen_mini" data-id="bom_game"><i class="iconfont">&#xe631;</i>폭탄게임</a></li>-->
						<!--li><a href="/main/multi.bet.php">멀티방</a></li-->
                        <!--
						<li><a href="/main/sports_result.php" class=""><i class="iconfont">&#xe97b;</i>경기결과</a></li>
						<li><a href="javascript:location.href='http://hg-ssqq.com/main/sports_tv.php'"><i class="iconfont">&#xe62d;</i>스포츠TV</a></li> 
                        -->
						<li><a href="/main/sports-betting.list.php" class="c-g">베팅내역</a></li>
						<li><a href="/main/freeboard.php" class="c-g">자유게시판</a></li>
						<li><a href="/main/event.php" class="c-g">이벤트</a></li>
						<!--li><a href="/main/freeboard.php">자유게시판</a></li-->
						<li><a href="/main/qna.php" class="c-g">고객센터</a></li>						
						<!--li><a href="/main/cashin.php">입금신청</a></li>
						<li><a href="/main/cashout.php">출금신청</a></li-->
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

        <div class="pop1" style="left:300px !important; top:150px !important;" id="ppoDv_6">
            <div class="cont">
               	<img alt="" src="https://i.imgur.com/CN74GPI.png" />           	</div>
            <div class="pop-bt">
                <label for="no">
					<input type="checkbox" class="cb_box cb_box6" data-pop="ppoDv_6" onClick="closePopupNotice(6)">
						하루동안 이 창을 열지 않음
				</label>
                <a href="javascript:closePopup(6);" class="pop-close">닫기</a>                
            </div>
        </div>


        <div class="pop1" style="left:960px !important; top:150px !important;" id="ppoDv_7">
            <div class="cont">
               	<img alt="" src="https://i.imgur.com/yBBhndS.png" />           	</div>
            <div class="pop-bt">
                <label for="no">
					<input type="checkbox" class="cb_box cb_box7" data-pop="ppoDv_7" onClick="closePopupNotice(7)">
						하루동안 이 창을 열지 않음
				</label>
                <a href="javascript:closePopup(7);" class="pop-close">닫기</a>                
            </div>
        </div>


        <div class="pop1" style="left:1300px !important; top:150px !important;" id="ppoDv_9">
            <div class="cont">
               	<img alt="" src="https://i.imgur.com/0eRvEbW.png" />           	</div>
            <div class="pop-bt">
                <label for="no">
					<input type="checkbox" class="cb_box cb_box9" data-pop="ppoDv_9" onClick="closePopupNotice(9)">
						하루동안 이 창을 열지 않음
				</label>
                <a href="javascript:closePopup(9);" class="pop-close">닫기</a>                
            </div>
        </div>


        <div class="pop1" style="left:630px !important; top:150px !important;" id="ppoDv_13">
            <div class="cont">
               	<div><img alt="" src="https://i.imgur.com/mZCbQ9C.png" /></div><br />
           	</div>
            <div class="pop-bt">
                <label for="no">
					<input type="checkbox" class="cb_box cb_box13" data-pop="ppoDv_13" onClick="closePopupNotice(13)">
						하루동안 이 창을 열지 않음
				</label>
                <a href="javascript:closePopup(13);" class="pop-close">닫기</a>                
            </div>
        </div>

<script>
$(function () {
	if( $.cookie('ppoDv_6') != 'done' ){ $('#ppoDv_6').show(); } if( $.cookie('ppoDv_7') != 'done' ){ $('#ppoDv_7').show(); } if( $.cookie('ppoDv_9') != 'done' ){ $('#ppoDv_9').show(); } if( $.cookie('ppoDv_13') != 'done' ){ $('#ppoDv_13').show(); } });
function closePopupNotice(no){
	var d_pop = $(".cb_box"+no).attr("data-pop");
    var date = new Date();
    date.setTime(date.getTime() + 12*60*60*1000);
    $.cookie(d_pop, 'done', {expires: date});
    return closePopup(no);
}
function closePopup(no){ $('#ppoDv_'+no).hide(); }
	
(function ($) {
	$.fn.drags = function (opt) {

		opt = $.extend({handle: "", cursor: "move"}, opt);

		if (opt.handle === "") {
			var $el = this;
		} else {
			var $el = this.find(opt.handle);
		}

		return $el.css('cursor', opt.cursor).on("mousedown", function (e) {
			if (opt.handle === "") {
				var $drag = $(this).addClass('draggable');
			} else {
				var $drag = $(this).addClass('active-handle').parent().addClass('draggable');
			}
			var z_idx = $drag.css('z-index'),
				drg_h = $drag.outerHeight(),
				drg_w = $drag.outerWidth(),
				pos_y = $drag.offset().top + drg_h - e.pageY,
				pos_x = $drag.offset().left + drg_w - e.pageX;
			$drag.css('z-index', 1000).parents().on("mousemove", function (e) {
				$('.draggable').offset({
					top: e.pageY + pos_y - drg_h,
					left: e.pageX + pos_x - drg_w
				}).on("mouseup", function () {
					$(this).removeClass('draggable').css('z-index', z_idx);
				});
			});
			e.preventDefault(); // disable selection
		}).on("mouseup", function () {
			if (opt.handle === "") {
				$(this).removeClass('draggable');
			} else {
				$(this).removeClass('active-handle').parent().removeClass('draggable');
			}
		});
	}
})(jQuery);

$('.home-page-pop-up').drags();	
</script>
<style>
	body { background:#000; }
</style>
	<div id="container">
		<div class="main-container">			
			<div class="main-lfctrt2">
				<div id="content_left">
					<div class="cont betscroll2">
						<div class="nav-item0">
							<ul class="ul1">
								<li><a href="/main/cashin.php"><p><i class="iconfont">&#xe82f;</i></p><p>입금</p></a></li>
								<li><a href="/main/cashout.php"><p><i class="iconfont">&#xe82e;</i></p><p>출금</p></a></li>
								<li><a href="/main/qna.php"><p><i class="iconfont">&#xe768;</i></p><p>고객센터</p></a></li>
								<li><a href="/main/memo.php"><p><i class="iconfont">&#xe6a5;</i></p><p>쪽지함</p></a></li>
							</ul>
							<ul class="ul2">
								<li><a href="/main/sports-cross.php">스포츠</a></li>
								<li><a href="/main/livesports.php">인플레이</a></li>
								<li><a href="/main/janggu_power1.php">미니게임</a></li>
								<li><a href="javascript:location.href='http://hg-ssqq.com/main/hilo10.php'">토큰게임</a></li>
								<!--<li><a href="javascript:location.href='http://hg-ssqq.com/main/vsports.php'">가상스포츠</a></li>
								<li><a href="javascript:location.href='http://hg-ssqq.com/main/casino.php'">카지노</a></li>-->			
								<li><a href="/main/casino.php">카지노</a></li>	
								<li><a href="javascript:location.href='http://hg-ssqq.com/main/slot_list.php';">슬롯게임</a></li>
								<!--<li><a href="#" class="wopen_mini" data-id="bom_game">폭탄게임</a></li>-->
								<li><a href="/main/vsoccer.php">BET365</a></li>
								<li><a href="javascript:location.href='http://hg-ssqq.com/main/vsports.php';">Leap가상스포츠</a></li>
								<li><a href="#" class="wopen_mini" data-id="bom_game">지뢰게임</a></li>
								<li><a href="/main/freeboard.php">자유게시판</a></li>
								<li><a href="/main/event.php">이벤트</a></li>
								<li><a href="/main/attendance.php">출석부</a></li>
								<li><a href="/main/bok.php">쿠폰</a></li>                    
								<li><a href="/main/sports-betting.list.php">베팅내역</a></li>           
								<li><a href="/main/point.php">포인트전환</a></li>
								<li><a href="/main/sports_result.php">경기결과</a></li>
								<li><a href="/main/recommend.php">지인현황</a></li>
								<!--<li><a href="/main/notice.php">공지사항</a></li>-->
								<!--li><a href="/main/memo.php">쪽지함</a></li--> 
								<!--<li><a href="javascript:location.href='http:///main/sports_tv.php'">스포츠TV</a></li>-->
                                <li><a href="http://hg.livetv01.com" target="_blank">스포츠TV</a></li>
							</ul>
						</div>
						<div class="left-box">
							<div class="header-tab-cont">
								<div class="header-tab-cont-tab1">									
									<ul>
										<!--li>
											<a href="/main/sports-cross.php?jj=축구">
												<div class="pull-left">
													<i class="iconfont">&#xe617;</i>
													<span class="tit">축구</span>
												</div>
												<div class="pull-right">
													<strong>0</strong>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/sports-cross.php?jj=야구">
												<div class="pull-left">
													<i class="iconfont">&#xe700;</i>
													<span class="tit">야구</span>
												</div>
												<div class="pull-right">
													<strong>0</strong>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/sports-cross.php?jj=농구">
												<div class="pull-left">
													<i class="iconfont">&#xea73;</i>
													<span class="tit">농구</span>
												</div>
												<div class="pull-right">
													<strong>0</strong>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/sports-cross.php?jj=배구">
												<div class="pull-left">
													<i class="iconfont">&#xe60a;</i>
													<span class="tit">배구</span>
												</div>
												<div class="pull-right">
													<strong>0</strong>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/sports-cross.php?jj=아이스하키">
												<div class="pull-left">
													<i class="iconfont">&#xe701;</i>
													<span class="tit">아이스하키</span>
												</div>
												<div class="pull-right">
													<strong>0</strong>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/livesports.php">
												<div class="pull-left">
													<i class="iconfont">&#xe70f;</i>
													<span class="tit">실시간</span>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/sports-live.php">
												<div class="pull-left">
													<i class="iconfont">&#xe697;</i>
													<span class="tit">인플레이</span>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/sports-cross.php?jj=기타">
												<div class="pull-left">
													<i class="iconfont">&#xe63d;</i>
													<span class="tit">기타</span>
												</div>
												<div class="pull-right">
													<strong>0</strong>
												</div>
											</a>
										</li-->
										<li>
											<a href="/main/sports-cross.php">
												<div class="pull-left">
													<i class="iconfont">&#xe73c;</i>
													<span class="tit">크로스</span>
												</div>
                                                <div class="pull-right">
													<strong>173</strong>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/sports-special.php">
												<div class="pull-left">
													<i class="iconfont">&#xe6db;</i>
													<span class="tit">스페셜</span>
												</div>
                                                <div class="pull-right">
													<strong>16</strong>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/sports-live.php">
												<div class="pull-left">
													<i class="iconfont">&#xe70f;</i>
													<span class="tit">실시간</span>
												</div>
                                                <div class="pull-right">
													<strong>10</strong>
												</div>
											</a>
										</li>
										<li>
											<a href="/main/livesports.php">
												<div class="pull-left">
													<i class="iconfont">&#xe697;</i>
													<span class="tit">인플레이</span>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>						
					</div>
				</div>

						<div class="notice-container">										
		<span class="notice">
			<img src="/images/hg/notice-icon.png" alt=""> 공지사항:
		</span>
		<marquee scrolldelay="1" onmouseover="this.stop()" onmouseout="this.start()">
		평생 예비주소 : 휴게소.net / 휴게소주소.com		</marquee>
	</div>
				<div class="main-floor1 clearfix">
					<div class="pull-left">
						<div class="main-visual">
							<ul class="bxslider">
								<li>
									<a href="/main/freeboard_view.php?wr_id=200660">
										<img src="https://i.imgur.com/qTYMJGT.gif"/>
									</a>
								</li>
								<li>
									<a href="/main/event_view.php?id=206535">
										<img src="https://i.imgur.com/V0mdcRG.gif"/>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="pull-right clearfix">
						<div class="pull-left">
							<div class="main-top-box">
								<p class="tit"><i class="iconfont">&#xe79d;</i>자유게시판</p>
								<ul class="main-slide-box main-cashin-slide">
																	<li>
										<span>419592</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419592">미니게임 연승 </a></strong>
									</li>
                    												<li>
										<span>419538</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419538">미니게임이벤트</a></strong>
									</li>
                    												<li>
										<span>419389</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419389">챔스</a></strong>
									</li>
                    												<li>
										<span>419363</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419363">터키</a></strong>
									</li>
                    												<li>
										<span>419340</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419340">ㅊㅅ</a></strong>
									</li>
                    												<li>
										<span>419333</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419333">극장</a></strong>
									</li>
                    												<li>
										<span>419243</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419243">출첵요</a></strong>
									</li>
                    												<li>
										<span>419190</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419190">NBA 건승 좀 빌어주십쇼</a></strong>
									</li>
                    												<li>
										<span>419108</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419108">ㅎㅇㅌ</a></strong>
									</li>
                    												<li>
										<span>419092</span>
										<strong><a href="/main/freeboard_view.php?wr_id=419092">스포츠무조건지급</a></strong>
									</li>
                    											</ul>
							</div>
						</div>
						<div class="pull-right">
							<div class="main-top-box ml10">
								<p class="tit"><i class="iconfont">&#xe79b;</i>이벤트</p>
								<ul class="main-slide-box main-cashout-slide">
																	<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=397974">월요일일병 극복 EVENT</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=283942">신규회원 EVENT	</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=283941">충전포인트 EVENT	</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=283940">일일 누적 충전 EVENT</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=277416">두끼 EVENT	</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=266480">페이백 EVENT	</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=253538">개인 정산 EVENT</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=206535">레벨업 EVENT</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=200672">지인추천 EVENT</a></strong>
									</li>
                    												<li>
										<span>EVENT</span>
										<strong><a href="/main/event_view.php?id=200671">복귀자 EVENT</a></strong>
									</li>
                    											</ul>
							</div>
						</div>
					</div>
				</div>

			<!-- <script src="http://demo5.gd234.net/js/jquery.nicescroll.min.js"></script>
			<script>
				$(function(){
					$(".img-list").niceScroll(".img-list > ul",{/*cursorcolor:"#f50",*/cursoropacitymax:0.7,boxzoom:false,touchbehavior:true});
				});
			</script> -->

				<div class="main-floor2">
					<div id="boxscroll2">
						<div id="contentscroll2">
							<div class="img-list">
								<ul class="clearfix">
									<li>
										<a href="/main/sports-cross.php">
											<img src="/images/hg/m_01.png" alt="">
										</a>
										<p>크로스</p>
									</li>
									<li>
										<a href="/main/janggu_power1.php">
											<img src="/images/hg/m_02.png" alt="">
										</a>
										<p>미니게임</p>
									</li>
									<li>
										<a href="/main/casino.php">
											<img src="https://i.imgur.com/7BPzakD.png" alt="">
										</a>
										<p>카지노</p>
									</li>
									<li>
										<a href="/main/hilo10.php">
											<img src="/images/hg/m_04.png" alt="">
										</a>
										<p>토큰게임</p>
									</li>
									<li>
										<a href="/main/vsoccer.php">
											<img src="/images/hg/m_5.png" alt="">
										</a>
										<p>BET365</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="right-box">
					<div id="cart" style="position: relative; top: 0px;">
						<div class="betslip_w" id="betslip_w">
    <div class="cart-top">
        <dl class="bsp_top">
            <dt class="tit">
                <i class="iconfont">&#xe661;</i>
                베팅카트
            </dt>
            <dd class="move" id="betslipmove">
                <span class="off">
                    <i class="iconfont">&#xe6a7;</i>
                    고정
                </span>
                <span class="on active">
                    <i class="iconfont">&#xe6a7;</i>
                    이동
                </span>
            </dd>
        </dl>
        <span style="display: none">
            <input type="checkbox" id="MvOff" value="MoveOff">
        </span>
        <div class="betslip" id="betslip">
            <!--<div class="betslip-tit">베팅할 게임을 선택하세요!</div>-->
            <div class="betscroll bsp_event_w" id="bsp_event_w">
                <div class="ct_list" id="picklist"></div>
            </div>
            <!--//Check Bet List-->
            <div class="bsp_max">
                <a href="javascript:void(0);" id="betlistalldel" class="btn1" onclick="window.location.reload()">카트비우기
                </a>
            </div>
            <dl class="rate">
                <dt>보유금액</dt>
                <dd id="betslipmycarat">
                    <span class="caratcolor">0</span>
                    원
                </dd>
            </dl>
            <dl class="rate line">
                <dt>합산배당</dt>
                <dd>
                    <span id="bRto">1.00</span>
                    배
                </dd>
            </dl>
            <dl class="rate line">
                <dt>베팅금액</dt>
                <dd style="width:65%">
                    <input type="text" value="0" name="Bprice" id="nAmt" class="bsp_mybetmoney">
                </dd>
            </dl>
            <dl class="rate line">
                <dt>예상적중금액</dt>
                <dd>
                    <span class="white" id="TotalBenefit">0</span>
                    <i class="white">원</i>
                </dd>
            </dl>
            <div class="bsp_money" id="btnPayPlus">
                <ul>
                    <li>
                        <span class="btn1" data-money="5000" onClick="addBamt(0.5)">5,000원</span>
                    </li>
                    <li>
                        <span class="btn1" data-money="10000" onClick="addBamt(1)">10,000원</span>
                    </li>
                    <li>
                        <span class="btn1" data-money="50000" onClick="addBamt(5)">50,000원</span>
                    </li>
                    <li>
                        <span class="btn1" data-money="100000" onClick="addBamt(10)">100,000원</span>
                    </li>
                    <li>
                        <span class="btn1" data-money="500000" onClick="addBamt(50)">500,000원</span>
                    </li>
                    <li>
                        <span class="btn1" data-money="1000000" onClick="addBamt(100)">1,000,000원</span>
                    </li>
                    <li class="reset">
                        <span class="btn1" data-money="0" onClick="addBamt(0)">금액비우기</span>
                    </li>
                    <li class="max">
                        <span class="btn1" data-money="0" onClick="changesCalc()">잔돈</span>
                    </li>
                    <li class="max">
                        <span class="btn1" data-money="0" onClick="maxCalc()">MAX</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bsp_betbtn carat" id="bsp_betbtn" onClick="betNow()">베팅하기</div>
        <div class="bet-bt">
            <dl>
                <dt>최소베팅금액</dt>
                <dd>
                    <span class="">0</span>
                    원
                </dd>
            </dl>
            <dl>
                <dt>최대베팅금액</dt>
                <dd>
                    <span class="">0</span>
                    원
                </dd>
            </dl>
            <dl>
                <dt>적중상한금액</dt>
                <dd>
                    <span class="">0</span>
                    원
                </dd>
            </dl>
        </div>
    </div>
    <!--div class="left-talk">
        <p><img src="/images/common/tel01.gif" alt=""></p>
    </div-->
    <!-- <div class="betslip_bt hg-bg">
        <p class="src-tit">언제 어디서나 확인 가능한 평생도메인!</p>
        <p class="src"><a href="http://휴게소.net" target="_blank">휴게소.net</a></p>
    </div> -->
    <div class="tel-box new">
        <a href="https://t.me/HGS365" target="_blank">
            <img src="/images/hg/tel_right.gif" alt="텔레그램">
        </a>
        <!-- <div class="pull-left"><img src="/images/hg/feiji.png" alt=""/></div>
        <div class="pull-left tit-txt">
            <p class="tit">휴게소 고객센터</p>
            <p class="txt">@HGS365</p>
        </div>
        <div class="pull-right">
            <a href="https://t.me/HGS365">자동<br>친구추가&gt;</a>
        </div> -->
    </div>
    <div class="tel-box new">
        <a href="http://hg.livetv01.com" target="_blank">
            <img src="/images/hg/right_sports.gif" alt="스포츠중계">
        </a>
    </div>
    <div class="tel-box new">
        <a href="http://휴게소주소.com" target="_blank">
            <img src="/images/hg/forever_domain.gif" alt="평생도메인">
        </a>
    </div>
    <!--<div class="left-talk">
						<p><i class="iconfont">&#xe65e;</i><span>정류장 텔레그램</span> </p>
					</div>
					<div class="betslip_bt">
						<p class="txt">언제 어디서나 <br>확인 가능한 평생도메인!</p>
						<p class="box">www.정류장.com</p>
					</div>-->
</div>
<script>
    function changesCalc() {
        var cash = parseInt($(".money_view01").text().replace(/,/gi, ''));
        aa = cash % 1000; //0;
        aa = parseFloat($('#nAmt').val().replace(/,/gi, '')) + aa;
        $('#nAmt').val((aa + "").format());
        calc();
    }
</script>					</div>
				</div>
			</div>
			
			<!-- <div class="main-floor3">
				<div class="contact-method">
					<ul class="clearfix">
						<li>
							<p class="icon-box"><span class="icon iconfont">&#xe660;</span></p>
							<div class="txt">
								<p class="tit">입출금상담</p>
								<h3 class="tit">010-1234-5678</h3>
							</div>
						</li>
						<li>
							<p class="icon-box"><span class="icon iconfont">&#xe65d;</span></p>
							<div class="txt">
								<p class="tit">카카오톡 ID</p>
								<h3 class="tit">demo123</h3>
							</div>
						</li>
						<li>
							<p class="icon-box"><span class="icon iconfont">&#xe65e;</span></p>
							<div class="txt">
								<p class="tit">텔레그램 ID</p>
								<h3 class="tit">demo55</h3>
							</div>
						</li>
						<li>
							<p class="icon-box"><span class="icon iconfont">&#xe835;</span></p>
							<div class="txt">
								<p class="tit">고객센터</p>
								<h3 class="tit">24시간 문의 가능</h3>
							</div>
						</li>
					</ul>
				</div>
			</div> -->

<!--
			<div class="main-floor6 clearfix">
				<div class="main-floor6-cont">
					<div class="notice-box left">
						<h3 class="tit"><span>공지사항</span> <a href="/main/notice.php" class="more-btn">더보기 +</a></h3>
						<div class="notice-list">
							<ul>
								
								<li>
									<a href="/main/notice_view.php?wr_id=302235">
										<p class="tit"> 코인 입금안내</p>
										<p class="day">관리자</p>
									</a>
								</li>
								
								<li>
									<a href="/main/notice_view.php?wr_id=224516">
										<p class="tit"> 충전&환전 규정</p>
										<p class="day">관리자</p>
									</a>
								</li>
								
								<li>
									<a href="/main/notice_view.php?wr_id=224513">
										<p class="tit"> 레벨별 등급혜택</p>
										<p class="day">관리자</p>
									</a>
								</li>
								
								<li>
									<a href="/main/notice_view.php?wr_id=220873">
										<p class="tit"> 스포츠 통합 규정</p>
										<p class="day">관리자</p>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
					<div class="notice-box right">					
						<h3 class="tit"><span>이벤트</span> <a href="/main/event.php" class="more-btn">더보기 +</a></h3>
						<div class="notice-list">
							<ul>
								
								<li>
									<a href="/main/event_view.php?id=397974">
										<p class="tit"> 월요일일병 극복 EVENT</p>                                                
										<p class="day">관리자</p>
									</a>
								</li>
								
								<li>
									<a href="/main/event_view.php?id=283942">
										<p class="tit"> 신규회원 EVENT	</p>                                                
										<p class="day">관리자</p>
									</a>
								</li>
								
								<li>
									<a href="/main/event_view.php?id=283941">
										<p class="tit"> 충전포인트 EVENT	</p>                                                
										<p class="day">관리자</p>
									</a>
								</li>
								
								<li>
									<a href="/main/event_view.php?id=283940">
										<p class="tit"> 일일 누적 충전 EVENT</p>                                                
										<p class="day">관리자</p>
									</a>
								</li>
															</ul>
						</div>
					</div>
				</div>	
			</div>
-->			
		</div>
	</div>
	
	<div class="quick">
		<div class="top"><a href="#"><img src="/images/hg/top.png" alt=""></a></div>
	</div>

	<div id="footer">
		<div class="footer-txt">
			<p>COPYRIGHT &copy; <span>휴게소</span>. ALL RIGHTS RESERVED.</p>
		</div>
	</div>
	
	</div>
</div><!-- wraper -->
</body>
<script language="javascript" type="text/javascript" src="/js/function.js?v=199887"></script>
<script>
/*
function doCasino(){    
    $('.warn-box').show();
}
function confrim_c(){	
        //$('.warn-box').stop().slideUp('fast');        
	$.ajax({
		type: "POST"
		, url: "/send_notice2.php"
		, data: {}
		, dataType: "json"
		, cache: false
		, success: function (response) {
			if(response.msg == 'ok'){				
				$('.warn-box').stop().slideUp('fast');
                //location.href = '/main/casino.php';
                onOpenBcr2('');
			 } else {
				alert(response.msg);
			 }
		}
		, error: function () {
			console.log("error! >>  game_time >> ");
		}
	});
    //onOpenBcr('evolution_game_shows');
    }	

function close_r(){
	$('.warn-box').stop().slideUp('fast');
	//location.href = '/main.php';
}
*/
function askNow() {
	if (confirm('고객센터에 계좌문의 글을 남기시겠습니까?')) {
    	$.ajax({
        	type: "POST"
            , url: "/account.request.php"
            , data: {}
            , dataType: "json"
            , cache: false
            , success: function (calData) {
            	if (calData.result) {
                	alert("계좌요청이 완료되었습니다.");					
                    location.href = '/main/qna.php';
               	} else {
                	alert(calData.msg);
                }
           	}
            , error: function () {
            	console.log("board save error! ");
            }
        });
   	}
}
	
function LoginFrmChk() {

	frm= document.login_form;
	if ((frm.user.value == "") || (frm.user.value.length < 4)) {
		alert("회원님의 ID를 입력해 주세요.");
		frm.user.focus();
		return false;
	}

	if ((frm.password.value == "") || (frm.password.value.length < 4)) {
		alert("회원님의 패스워드를 입력해 주세요.");
		frm.password.focus();
		return false;
	}

	frm.action = "/wel/login.php";
	frm.submit();
}

function checkJoinCode() {
	$.ajax({
    	type: "POST"
        , url: "/wel/check.code.php"
        , data: {regcode: $('#pincode').val()}
        , dataType: "json"
        , cache: false
        , success: function (calData) {
        	if (calData.result) {
				$(".pop-mode").hide().removeClass("pop-show");
				$(".black-bg").fadeIn('fast');
				$(".pop-join").fadeIn('fast').addClass("pop-show");                
            } else {
                alert(calData.msg);
            }
  		}
        , error: function () {
            console.log("partner save error! ");
        }
    });
}

function showLoginBox(){
	$(".pop-mode").hide().removeClass("pop-show");
	$(".black-bg").fadeIn('fast');
	$(".pop-login").fadeIn('fast').addClass("pop-show");
}


	
	





function changePass() {
	var new_pass = $("#new_pass").val();
	var new_pass_confrim = $("#Inew_pass_confrim").val();
	if (new_pass.length == 0 || new_pass.length < 6 || new_pass.length > 16) {
    	alert(" 사용하실 비밀번호를 정확히 넣어주세요.\n비밀번호는 6~16자 숫자,영문,특수문자 조합으로 입력해주세요.");
        $("#new_pass").select();
        $("#new_pass").focus();
        return false;
	}
		
	var checkNumber = new_pass.search(/[0-9]/g);		
	var checkEnglish = new_pass.search(/[a-z]/ig);
	var checkSrc = new_pass.search(/[~!@#$%^&*()_+|<>?:{}]/ig);
		
	if(checkNumber <0 || checkEnglish <0 || checkSrc <0){		
		alert("비밀번호는 숫자와 영문자, 특수문자를 조합하여 입력해야 합니다.");
		$("#new_pass").select();
        $("#new_pass").focus();
		return false;		
	}
	if(new_pass != new_pass_confrim){
		alert("두번 입력한 비밀번호가 일치하지 않습니다.");
		$("#new_pass").select();
        $("#new_pass").focus();
		return false;		
	}
	$.ajax({
        type: "POST"
        , url: "/member/updatePass.php"
        , data: {'password': new_pass}
        , dataType: "json"
        , cache: false
        , success: function (calData) {
           	if (calData.result) {
               	alert("비밀번호가 변경되었습니다. 다시 로그인해 주세요.");
				location.href="/";
            } else {
                alert(calData.msg);
            }
       	}
        , error: function () {
           	console.log("member nickname check error! ");
		}
	});
}

$(".wopen_mini").click(function () {
	var datas = $(this).attr("data-id");
    switch (datas){
        case 'bom_game':
        	window.open("/bom/newplayer.php?datas="+datas , "power", "width=700, height=800, left=250, top=100","resizable,scrollbars,status");
            break;
    }
});

function onOpenBcr(code){
    var lobby = '';
    switch (code) {
        case 'MGLIVE':
        case 'OGT':
        case '88CASINO':
        case 'DG':
        case 'AG':
        case 'VIVO':
            window.open("/main/bca.php?code=" + code, code, "width=1356, height=835, left=250, top=100", "resizable,scrollbars,status");
            break;
        default:
			if(code == 'silm' || code == 'door' || code == 'boom' || code == '') {
				lobby = code;
				code = 'evolution_reward_games';
			}
            $.ajax({
                async: true,
                type: "post",
                url: "/get_url.php",
                beforeSend: function () {
                    ShowDiv();
                },
                complete: function () {
                    HiddenDiv();
                },
                data: {'code': code,'lobby': lobby},
                dataType: "json",
                success: function (jData) {
                    if (jData.result) {
                        //var home = '<a href="/main" class="casion_home" style="display: inline;">홈</a>';
                        //var iframe = '<iframe style="width: 100%;height: 100%;position: absolute;left: 0;right: 0;top:0;bottom: 0;z-index: 10000;overflow:hidden;border: 0;" src="'+jData.msg+'"></iframe>';
                        //$("body").append(iframe).append(home);
                        //$("body").append(home);
                        //$("body").css('overflow':'hidden');
                        window.open(jData.msg, 'casino', "width=1356, height=835, left=250, top=100", "resizable,scrollbars,status");
                    } else {
                        alert(jData.msg);
                    }
                }
            });
            break;
    }
}

function ShowDiv() {
	$("#loading").show();
}
function HiddenDiv() {	
	setInterval(function () {
    	$("#loading").hide();
	}, 5000);
}	

$(document).ready(function () {
	$.member_stat = function () {
    	$.ajax({
        	type: "POST"
            , url: "/include/member.stat.php"
            , data: {}
            , dataType: "json"
            , cache: false
            , success: function (calData) {
            	if (calData.result) {
                } else {
                	alert(calData.msg);
                    location.href = "/include/logout.php";
				}
           	}
            , error: function () {
            	console.log("error! >>  delete >> ");
            }
		});
   	}
    var auto_run_cnt = 0;
    var auto_run = setInterval(function () {
    	if (auto_run_cnt % 10 == 0) {
        	$.member_stat();
       	}
        auto_run_cnt++;
  	}, 2000);
    setInterval(function () {
    	$.member_stat();
	}, 5000);

    $.member_stat();
});

</script>
</html>