
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

add_javascript('<script src="'.G5_THEME_JS_URL.'/simpleMobileMenu.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_CSS_URL.'/simpleMobileMenu.css">', 0);
add_javascript('<script src="'.G5_THEME_JS_URL.'/respond.min.js"></script>', 1);
?>

<?php

/* www/head.php */


if(strpos($_SERVER['PHP_SELF'], 'register_form.php') !== false){

	$user_chk = '1';

}

if(!$is_member && !$user_chk) {

	header("Location:".G5_BBS_URL."/login.php");

}

?>



<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<header class="cf" id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
	

    <div class="to_content"><a href="#container">본문 바로가기</a></div>
    
    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>

    <div id="hd_wr">
        <div id="logo"><a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_IMG_URL ?>/logo.gif" alt="<?php echo $config['cf_title']; ?>"></a></div>

<div style="font-weight: bold; float:right; padding: 12px; color:black;">    
<img src="http://fifa0000.dothome.co.kr/game/admin.gif" width="19" height="18" alt="" title="">
<?php
echo $member['mb_nick'] . '님 ' . number_format($member['mb_point']) . '원';?>
</div>



        <div class="navigation">
            <nav>
                <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                <ul class="mobimenu">
                    <?php if ($is_member) { ?>
                    <?php if ($is_admin) {  ?>
                    <li class="menu_admin"><a href="<?php echo G5_ADMIN_URL ?>"><b>관리자</b></a></li>
					
                    <?php }  ?>
<li class="menu_edit"><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php"><?php echo number_format($member['mb_point']) . '원'?></a></li>
<script>
document.querySelector(".menu_edit a").addEventListener("click", function(event){
    event.preventDefault()
});
</script>
					
					

				
					
					
                    <li class="menu_logout"><a href="<?php echo G5_BBS_URL ?>/logout.php" id="snb_logout">로그아웃</a></li>
                    <?php } else { ?>
                    <li class="menu_login"><a href="<?php echo G5_BBS_URL ?>/login.php" id="snb_login">로그인</a></li>
                    <?php } ?>
                    <?php
					$menu_datas = get_menu_db(1, true);
					$i = 0;
					$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
					foreach( $menu_datas as $row ){
						if( empty($row) ) continue;
					?>
                    <li class="gnb_1dli" style="z-index:<?php echo $gnb_zindex--; ?>">
                        <?php
                        $submenus = '';

						$k = 0;
						foreach( (array) $row['sub'] as $row2 ){
							if( empty($row2) ) continue;

                            if($k == 0)
                               $submenus .= '<button type="button" class="gnb_op">하위메뉴</button><ul class="gnb_2dul">'.PHP_EOL;

                            $submenus .= '<li class="gnb_2dli"><a href="'.$row2['me_link'].'" target="_'.$row2['me_target'].'" class="gnb_2da">'.$row2['me_name'].'</a></li>'.PHP_EOL;

							$k++;
                        }	//end foreach $row2

                        if($k > 0)
                            $submenus .= '</ul>'.PHP_EOL;

                        if($submenus)
                            $gnb_class = 'gnb_1da gnb_bg';
                        else
                            $gnb_class = 'gnb_1da';
                        ?>
                        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="<?php echo $gnb_class; ?>"><?php echo $row['me_name'] ?></a>
                        <?php echo $submenus; ?>
                    </li>
                <?php
				$i++;
                }	//end foreach $row2

                if ($i == 0) {  ?>
                    <li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하세요.<?php } ?></li>
                <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
<script>

jQuery(document).ready(function($) {
    $(".smobitrigger").smplmnu();
});

$(function(){
    $(".gnb_op").click(function(){
        $(this).next().slideToggle(300).siblings(".gnb_2dul").slideUp("slow");
    });
    $("#wrapper").on("click", function() {
        $(".gnb_2dul").fadeOut();
    });
});

</script>
<hr>

<div id="wrapper">
    
    <div id="container">
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
        