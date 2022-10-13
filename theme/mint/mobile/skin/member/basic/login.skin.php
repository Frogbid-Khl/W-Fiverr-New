
<?php
if (!defined('_GNUBOARD_')) exit; 
?>
<!doctype html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<title>휴게소</title>
<?php 
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/mobile/common.css?v=1663874566">', 0); 
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/mobile/mobile/main.css?v=1663874566">', 0); 
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/mobile/sub.css?v=1663874566">', 0); 
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/mobile/iconfont.css">', 0); 

 ?>
</head>
<style>
.popup-bg2 {
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    z-index: 1000000;
    top: 0;
    left: 0;
}
.popup-bg2 .popup-box2 {
    width: 300px; height: 428px;
    left:50%;
	transform:translateX(-50%);
	top:10%;
    background: #282a3f;
    position: absolute;
}
.cont .ipt.pull-left { width:65%; }
.cont .ipt.pull-right { width:calc(35% - 6px); }
.pl10 { padding-left:10px; }
.tme-box .pull-left { padding-top:5px; }
.tme-box .pull-right a {
    width: 80px;
    height: 54px;
    border-radius: 5px;
    background: #0f3445;
    box-shadow: 3px 3px 10px #051a23 inset;
    text-align: center;
    color: #fff;
    padding-top: 10px;
}
#captcha_container_1 {width: 100%;}
#captcha_container_1 img {width: 32px;height: 32px;}
#captcha_image {width: 270px !important;height: 65px !important;}
#captcha_code {
    background: rgba(0,0,0,0.8) !important;
    border: 1px solid #232f54;
    width: 100%;
    padding: 0.6em 1em;
    margin: 5px 0;
    border-radius: 0.5em !important;
}
</style>
<style>
    #slider {
        width: 100%;
        height: 47px;
        position: relative;
        border-radius: 4px;
        background-color: #dae2d0;
        overflow: hidden;
        text-align: center;
        user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none;
    }

    #slider_bg {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        background-color: #7AC23C;
        z-index: 1;
    }

    #label {
        width: 60px;
        position: absolute;
        left: 0;
        top: 0;
        height: 47px;
        line-height: 47px;
        border: 1px solid #cccccc;
        z-index: 3;
        cursor: move;
        color: #ff9e77;
        font-size: 18px;
        font-weight: 900;
    }

    .s_bg {
        background: #fff url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo0ZDhlNWY5My05NmI0LTRlNWQtOGFjYi03ZTY4OGYyMTU2ZTYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTEyNTVEMURGMkVFMTFFNEI5NDBCMjQ2M0ExMDQ1OUYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTEyNTVEMUNGMkVFMTFFNEI5NDBCMjQ2M0ExMDQ1OUYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MTc5NzNmZS02OTQxLTQyOTYtYTIwNi02NDI2YTNkOWU5YmUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NGQ4ZTVmOTMtOTZiNC00ZTVkLThhY2ItN2U2ODhmMjE1NmU2Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+YiRG4AAAALFJREFUeNpi/P//PwMlgImBQkA9A+bOnfsIiBOxKcInh+yCaCDuByoswaIOpxwjciACFegBqZ1AvBSIS5OTk/8TkmNEjwWgQiUgtQuIjwAxUF3yX3xyGIEIFLwHpKyAWB+I1xGSwxULIGf9A7mQkBwTlhBXAFLHgPgqEAcTkmNCU6AL9d8WII4HOvk3ITkWJAXWUMlOoGQHmsE45ViQ2KuBuASoYC4Wf+OUYxz6mQkgwAAN9mIrUReCXgAAAABJRU5ErkJggg==") no-repeat center;
    }

    .ok_bg {
        background: #fff url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo0ZDhlNWY5My05NmI0LTRlNWQtOGFjYi03ZTY4OGYyMTU2ZTYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDlBRDI3NjVGMkQ2MTFFNEI5NDBCMjQ2M0ExMDQ1OUYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDlBRDI3NjRGMkQ2MTFFNEI5NDBCMjQ2M0ExMDQ1OUYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDphNWEzMWNhMC1hYmViLTQxNWEtYTEwZS04Y2U5NzRlN2Q4YTEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NGQ4ZTVmOTMtOTZiNC00ZTVkLThhY2ItN2U2ODhmMjE1NmU2Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+k+sHwwAAASZJREFUeNpi/P//PwMyKD8uZw+kUoDYEYgloMIvgHg/EM/ptHx0EFk9I8wAoEZ+IDUPiIMY8IN1QJwENOgj3ACo5gNAbMBAHLgAxA4gQ5igAnNJ0MwAVTsX7IKyY7L2UNuJAf+AmAmJ78AEDTBiwGYg5gbifCSxFCZoaBMCy4A4GOjnH0D6DpK4IxNSVIHAfSDOAeLraJrjgJp/AwPbHMhejiQnwYRmUzNQ4VQgDQqXK0ia/0I17wJiPmQNTNBEAgMlQIWiQA2vgWw7QppBekGxsAjIiEUSBNnsBDWEAY9mEFgMMgBk00E0iZtA7AHEctDQ58MRuA6wlLgGFMoMpIG1QFeGwAIxGZo8GUhIysmwQGSAZgwHaEZhICIzOaBkJkqyM0CAAQDGx279Jf50AAAAAABJRU5ErkJggg==") no-repeat center;
    }

    #labelTip {
        position: absolute;
        right: 0;
        width: 78%;
        height: 100%;
        font-size: 18px;
        font-family: 'Microsoft Yahei', serif;
        color: #787878;
        line-height: 47px;
        text-align: center;
        z-index: 2;
    }

    .StTip {
        padding-left: 0;
    }

    .OkTip {
        padding-right: 100px;
    }

    .hide {
        display: none
    }
</style>	
<body class="login">
<div class="login-wraper">	
	<div class="popup-bg2">
        <div id="popup2" class="popup-box2"><img src="https://i.imgur.com/CMGNKfk.png" style="width:100%"></div>
	</div>
	<div id="visual"></div>
	<div class="login-box">
		<div class="pop-mode">
			<div class="login-cont" style="position: relative;">
				<div class="tit">
					<a href="/"><img src="<?php echo $member_skin_url; ?>/mobile/login-logo.png" style="width:212px;"></a>
				</div>
				<!-- <form id="login_form" name="login_form" method="post" action="/mobile/wel/login.php"> -->
   
                <form name="flogin" action="<?php echo $login_action_url ?>"  method="post">
                 <input type="hidden" name="url" value="<?php echo $login_url ?>">

				<div class="cont">
					<div class="clearfix">
						<p class="ipt pull-left"><input type="text" id="uid" name="mb_id"  placeholder="아이디" tabindex="1"></p>
						<p class="ipt pull-right"><button type="submit"   class="login-btn" tabindex="3">로그인</button></p>
					</div>
					<div class="clearfix">
						<p class="ipt pull-left"><input type="password" id="pwd" name="mb_password" id="login_pw"  placeholder="비밀번호" tabindex="2"></p>
                        <p class="ipt pull-right"><a href="./register_form.php" class="login-btn">회원가입</a></p>					</div>
				</div>

				</form>
				<br>
				<div class="tme-cont" >
                    <a href="https://t.me/HGS365" target="_blank"></a>
					
				</div>
			</div>
		</div>
	</div>
</div>
<style>
.warn-box{position:fixed;top:0;left:0;z-index: 100000000000000;width: 100%;height: 100%; display: none;}
.warn-box-bg{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0, 0, 0, 0.5);}
.warn-box-cont{position:absolute;top:50%;left:0;right:0;margin:5px auto;padding: 20px 10px;text-align: center;transform:translateY(-50%);width:340px;background:#11191f;border:1px solid #404654;border-top:2px solid #ff5500;}
.warn-box-cont .icon i{font-size:56px;color:#ff5500;}
.warn-box-cont .txt{margin:10px 0 30px;color: #fff !important;font-size: 16px; line-height: 24px; text-align: left!important; padding: 0 26px; }
.warn-box-cont .txt	h4 { font-size: 18px; color: #E1BA64;}
.warn-box-cont .btn a{padding:0 10px;min-width:89px;text-align:center;height:39px;line-height:39px;font-size:16px;font-weight:700;color:#ffffff;background: #2e333d;}
</style>
<div class="warn-box">
	<div class="warn-box-bg"></div>
	<div class="warn-box-cont">
		<p class="icon"><i class="iconfont">&#xe79c;</i></p>
		<div class="txt">
		<h4 align="center">정류장 사칭 사이트 주의</h4>
<br>
			
최근 정류장을 사칭하여 각종 SNS를 통해 
먹튀사이트로 유도하는 일이 발생되고 있습니다.<br>
이와 같은 허위광고 글에 현혹되지 마시길 바라며,
저희 정류장은 회원님들의 보안을 최우선으로 합니다.
			
		</div>
		<p class="btn">
			<a href="javascript: confrim_c();">확인</a>
		</p>
	</div>
</div>
<script>
    var startTime = 0;
    var endTime = 0;
    var numTime = 0;


    function nowTime() {
        var myDate = new Date();
        var H = myDate.getHours();
        var M = myDate.getMinutes();
        var S = myDate.getSeconds();
        var MS = myDate.getMilliseconds();
        var milliSeconds = H * 3600 * 1000 + M * 60 * 1000 + S * 1000 + MS;
        return milliSeconds;
    }

    $(function () {

        $(".ask-btn a").click(function () {
            showPopup();
        });

        $(".answer-btn a").click(function () {
            showPopup();
			$('.discuss-box').addClass('showAnswer');
        });

        function showPopup(){
            $(".discuss-box").fadeIn();
            $(".bg-black").show();
        }

        $(".discuss-close").click(function () {
            $(".discuss-box").fadeOut(function(){
                $('.discuss-box').removeClass('showAnswer');
				$('#qa_cts').hide();
            });
            $(".bg-black").hide();
        });
        $(".discuss-ans-close, .discuss-ans .btn_warp a").click(function () {
            $(".discuss-ans").fadeOut();
            $(".bg-black").hide();
        });
        var slider = new SliderUnlock("#slider", {successLabelTip: "인증통과"}, function () {
            var sli_width = $("#slider_bg").width();
            endTime = nowTime();
            numTime = endTime - startTime;
            endTime = 0;
            startTime = 0;
            $("#label").removeClass('s_bg');
            $("#label").addClass('ok_bg');
            $("#labelTip").removeClass('StTip');
            $("#labelTip").addClass('OkTip');
            $('#login_btn').attr("onClick", "return LoginFrmChk();");
            $.ajax({
                type: "POST"
                , url: "/getsss.php"
                , data: {}
                , dataType: "json"
                , cache: false
                , success: function (calData) {
                    $('#token').val(calData.result);
                }
                , error: function () {
                    console.log("send message error! ");
                }
            });
        });

        slider.init();
    });

    ;(function ($, window, document, undefined) {
        function SliderUnlock(elm, options, success) {
            var me = this;
            var $elm = me.checkElm(elm) ? $(elm) : $;
            success = me.checkFn(success) ? success : function () {
            };

            var opts = {
                successLabelTip: "Successfully Verified",
                duration: 200,
                swipestart: false,
                min: 0,
                max: $elm.width(),
                index: 0,
                IsOk: false,
                lableIndex: 0
            };

            opts = $.extend(opts, options || {});

            me.elm = $elm;
            me.opts = opts;
            me.swipestart = opts.swipestart;
            me.min = opts.min;
            me.max = opts.max;
            me.index = opts.index;
            me.isOk = opts.isOk;
            me.labelWidth = me.elm.find('#label').width();
            me.sliderBg = me.elm.find('#slider_bg');
            me.lableIndex = opts.lableIndex;
            me.success = success;
        }

        SliderUnlock.prototype.init = function () {
            var me = this;

            me.updateView();
            me.elm.find("#label").on("mousedown", function (event) {
                var e = event || window.event;
                me.lableIndex = e.clientX - this.offsetLeft;
                me.handerIn();
            }).on("mousemove", function (event) {
                me.handerMove(event);
            }).on("mouseup", function (event) {
                me.handerOut();
            }).on("mouseout", function (event) {
                me.handerOut();
            }).on("touchstart", function (event) {
                var e = event || window.event;
                me.lableIndex = e.originalEvent.touches[0].pageX - this.offsetLeft;
                me.handerIn();
            }).on("touchmove", function (event) {
                me.handerMove(event, "mobile");
            }).on("touchend", function (event) {
                me.handerOut();
            });
        };

        SliderUnlock.prototype.handerIn = function () {
            var me = this;
            me.swipestart = true;

            var myDate = new Date();
            var H = myDate.getHours();
            var M = myDate.getMinutes();
            var S = myDate.getSeconds();
            var MS = myDate.getMilliseconds();
            var milliSeconds = H * 3600 * 1000 + M * 60 * 1000 + S * 1000 + MS;

            startTime = milliSeconds;


            me.min = 0;
            me.max = me.elm.width();
        };

        SliderUnlock.prototype.handerOut = function () {
            var me = this;
            me.swipestart = false;

            weizhi = me.labelWidth;
            if (me.index < me.max) {
                me.reset();
            }
        };

        SliderUnlock.prototype.handerMove = function (event, type) {
            var me = this;
            if (me.swipestart) {
                event.preventDefault();
                event = event || window.event;
                if (type == "mobile") {
                    me.index = event.originalEvent.touches[0].pageX - me.lableIndex;
                } else {
                    me.index = event.clientX - me.lableIndex;
                }
                me.move();
            }
        };

        SliderUnlock.prototype.move = function () {
            var me = this;
            if ((me.index + me.labelWidth) >= me.max) {
                me.index = me.max - me.labelWidth - 2;
                me.swipestart = false;
                me.isOk = true;
            }
            if (me.index < 0) {
                me.index = me.min;
                me.isOk = false;
            }
            if (me.index + me.labelWidth + 2 == me.max && me.max > 0 && me.isOk) {
                $('#label').unbind().next('#labelTip').text(me.opts.successLabelTip).css({'color': '#fff'});

                me.success();
            }
            me.updateView();
        };

        SliderUnlock.prototype.updateView = function () {
            var me = this;

            me.sliderBg.css('width', me.index);
            me.elm.find("#label").css("left", me.index + "px")
        };

        SliderUnlock.prototype.reset = function () {
            var me = this;

            startTime = 0;

            me.index = 0;
            me.sliderBg.animate({'width': 0}, me.opts.duration);
            me.elm.find("#label").animate({left: me.index}, me.opts.duration)
                .next("#lableTip").animate({opacity: 1}, me.opts.duration);
            me.updateView();
        };

        SliderUnlock.prototype.checkElm = function (elm) {
            if ($(elm).length > 0) {
                return true;
            } else {
                throw "this element does not exist.";
            }
        };

        SliderUnlock.prototype.checkFn = function (fn) {
            if (typeof fn === "function") {
                return true;
            } else {
                throw "the param is not a function.";
            }
        };


        window['SliderUnlock'] = SliderUnlock;
    })(jQuery, window, document);
</script>	
<script>
function confrim_c(){
	//$('.warn-box').stop().slideUp('fast');
	$("#login_form").submit();
}	
$("#popup1,#popup2").click(function (){
    $(this).hide();
	if($('.popup-bg2 div:visible').length == 0){
		$(".popup-bg2").hide();		
	}
});
$(function(){
	$(".discuss-btn, .login-cont .btn-log .btn-bt a.btn.grey").click(function(){
		$(".discuss-box").fadeIn();
		var num = $(this).index();
		if(num == 0){
			$(".discuss-box").removeClass("show2").addClass("show");
            $(".cnts-s").show();
		}else{
			$(".discuss-box").removeClass("show").addClass("show2");
            $(".cnts-s").hide();
		}
	});
	$(".discuss-close").click(function(){
		$(".discuss-box").fadeOut();
	});
	$(".discuss-ans-close, .discuss-ans .btn_warp a").click(function(){
		$(".discuss-ans").fadeOut();
	});
});		
function on_return() {
	if (window.event.keyCode == 13) {
    	LoginFrmChk();
    }
}	
function LoginFrmChk() {
	frm= document.login_form;
	if ((frm.uid.value == "") || (frm.uid.value.length < 3)) {
		alert("회원님의 ID를 입력해 주세요.");
		frm.user.focus();
		return false;
	}

	if ((frm.pwd.value == "") || (frm.pwd.value.length < 3)) {
		alert("회원님의 패스워드를 입력해 주세요.");
		frm.password.focus();
		return false;
	}
	confrim_c();
	//$('.warn-box').stop().slideDown('fast');
}
	
function sub2() {
	$('#form').attr("action", "/wel/send_notice.php");
    $('#form').submit();
}	
	
function sub3() {
	var user = $('#n_user').val();
	var phone = $('#n_tel').val();
	//$('.discuss-box').hide();
	$.ajax({
		type: "POST"
		, url: "/wel/show_notice.php"
		, data: {'user':user,'tel':phone}
		, dataType: "json"
		, cache: false
		, success: function (response) {
			console.log(response)
			var html = '';
			if(response.status) {
				html += '<p>';
				html += response.data.content;
				html += '</p>';
				$('#qa_cts').html(html);							
				$('.discuss-ans').show();
			} else {
				alert(response.msg);
			}
		}
		, error: function () {
			console.log("error! >>  game_time >> ");
		}
	});
}
</script>
<script>

function flogin_submit(f)
{
    if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>



</body>
</html>