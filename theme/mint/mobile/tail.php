<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    </div>
</div>



<div id="ft">

    <div id="ft_copy">
       
        <p>Copyright &copy; <b>fifa0000</b> All rights reserved.</p>
        <button type="button" id="top_btn"><img src="<?php echo G5_THEME_IMG_URL; ?>/top_btn.png" alt="상단으로"></button>
    </div>
</div>
<script>
$(function() {
    $("#top_btn").on("click", function() {
        $("html, body").animate({scrollTop:0}, '500');
        return false;
    });
});
</script>
<?php
if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
<a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전으로 보기</a>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>