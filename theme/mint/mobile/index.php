<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
?>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!-- 메인화면 최신글 시작 -->
<link rel="stylesheet" href="./new/mobile/common.css?1664124059">
<link rel="stylesheet" href="./new/mobile/main.css?1664124059">
<link rel="stylesheet" href="./new/mobile/sub.css?1664124059">
<link rel="stylesheet" href="./new/mobile/iconfont.css?1664124059">
<link rel="stylesheet" href="./new//mobile/swiper-bundle.css">

<script type="text/javascript" src="./new/mobile/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="./new/mobile/jquery.bxslider.min.js"></script>


  
    <div id="container">
        <div class="main-container" style="padding-top:10px;">
<div class="notice-container">										
		<span class="notice">
			<img src="/images/hg/-icon.png" alt=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">공지:
		</font></font></span>
		<marquee scrolldelay="1" onmouseover="this.stop()" onmouseout="this.start()"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
		배팅의민족 평생주소: 배팅의민족.com / 배팅의민족.net		</font></font></marquee>
	</div>
            <div class="main-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://i.imgur.com/1lMSSTZ.png" alt=""
                            >
                    </div>
                    <div class="swiper-slide">
                        <img src="https://i.imgur.com/K4E2wwI.png" alt=""
                            >
                    </div>
                </div>
              
                	<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
		</div>
		<script src="./new/mobile/swiper-bundle.js"></script>
		<script>
			var swiper = new Swiper('.main-swiper', {
				autoplay: {
					delay: 2000,
					stopOnLastSlide: false,
					disableOnInteraction: true,
				},
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
					type: 'bullets',
				},
			});
					console.log(swiper.pagination.bullets.length);
			for(i=0;i<swiper.pagination.bullets.length;i++){
				console.log(swiper.pagination.bullets[i]);
			}
		</script>

            <div class="main-floor1">
                <ul class="clearfix" style="color:#000000;">
                    <li><a style="color:#000000;" href=""><i class="iconfont">&#xe676;</i>충전</a></li>
                    <li><a style="color:#000000;" href=""><i class="iconfont">&#xe677;</i>환전</a></li>
                    <li><a style="color:#000000;" href="http://fifa0000.dothome.co.kr/bbs/qalist.php"><i class="iconfont">&#xe678;</i>고객센터</a></li>
                    <li><a style="color:#000000;" href="http://fifa0000.dothome.co.kr/bbs/content.php?co_id=company"><i class="iconfont">&#xed81;</i>게임규정</a></li>
                </ul>
            </div>
            <div class="main-floor2">
                <ul>
                    <li>
                        <span>
                            <a href="http://fifa0000.dothome.co.kr/game/bubble_loader/index.php">
                                <i><img src="./new/mobile/a1.png" alt="Leap가상스포츠" height="20"></i>
                                <span>보글사다리</span>
                            </a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="http://fifa0000.dothome.co.kr/game/power_loader/index.php">
                                <i><img src="./new/mobile/a1.png" alt="Leap가상스포츠" height="20"></i>
                                <span>파워사다리</span>
                            </a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="http://fifa0000.dothome.co.kr/game/jwad/index.php">
                                 <i><img src="./new/mobile/a2.png" alt="Leap가상스포츠" height="20"></i>
                                <span>천사와악마</span>
                            </a>
                        </span>
                    </li>
   
                    <li>
                        <span>
                            <a href="http://fifa0000.dothome.co.kr/game/mario/index.php">
                                <i><img src="./new/mobile/a3.png" alt="Leap가상스포츠" height="20"></i>
                                <span>마리오</span>
                            </a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="http://fifa0000.dothome.co.kr/game/tajo/index.php">
                                 <i><img src="./new/mobile/a4.png" alt="Leap가상스포츠" height="20"></i>
                                <span>타조</span>
                            </a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="javascript:alert('준비중 입니다')">
                                 <i><img src="./new/mobile/a5.png" alt="Leap가상스포츠" height="20"></i>
                                <span>준비중</span>
                            </a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="javascript:alert('준비중 입니다')">
                               <i><img src="./new/mobile/a5.png" alt="Leap가상스포츠" height="20"></i>
                                <span>준비중</span>
                            </a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="javascript:alert('준비중 입니다')">
                               <i><img src="./new/mobile/a5.png" alt="Leap가상스포츠" height="20"></i>
                                <span>준비중</span>
                            </a>
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="javascript:alert('준비중 입니다')" class="wopen_mini" data-id="bom_game">
                               <i><img src="./new/mobile/a5.png" alt="Leap가상스포츠" height="20"></i>
                                <span>준비중</span>
                            </a>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>


<div id="lt_slide" class="col_l_60 latest">
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수, 캐시타임, option);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    //$options = array(
    //    'thumb_width'    => 600, // 썸네일 width
    //    'thumb_height'   => 455,  // 썸네일 height
    //);
   // echo latest('theme/main_slide', 'slide', 4, 55, 1, $options);
    ?>
</div> 
<!-- <div id="main_work" class="col_l_40 latest">
    <ul>
        <li>
            <a href="#" class="work_img"><img src="<?php echo G5_THEME_IMG_URL; ?>/bn1.gif" alt="배너이미지1"></a>
            <a href="#" class="work_txt"><span class="work_txt_tit">공지사항</span><span class="work_txt_p">NOTICE<br>실시간 공지사항 페이지입니다.</span></a>
            
        </li>
        <li class="main_work_1">
            <a href="#" class="work_img"><img src="<?php echo G5_THEME_IMG_URL; ?>/bn2.gif" alt="배너이미지2"></a>
            <a href="#" class="work_txt"><span class="work_txt_tit">미니게임</span><span class="work_txt_p">MINI GAME<br>실시간 미니게임을 즐겨보세요!</span></a>
        </li>
        <li>
            <a href="#" class="work_img"><img src="<?php echo G5_THEME_IMG_URL; ?>/bn3.gif" alt="배너이미지3"></a>
            <a href="#" class="work_txt"><span class="work_txt_tit">게임 가이드</span><span class="work_txt_p">GAME GIUDE<br>휴게소의 게임 규정안내 입니다.</span></a>
        </li>
    </ul>

</div> -->

<!-- <div id="lt_notice" class="latest">
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
	
    /* 
	echo latest('theme/notice', 'notice', 3, 38);
    ?>
</div>

<div id="lt_board" class="latest col_l_60 ">
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    /echo latest('theme/basic', 'free', 5, 38);
    ?>
</div>

<div id="lt_board2" class="latest col_l_40 ">
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/basic', 'event', 5, 18);
    */
	?>
	
</div> -->


<!-- 메인화면 최신글 끝 -->

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>