$(document).ready(function(){
	/*메인 실시간 입금 현황*/
	//每隔两秒进行一次滚动
	var timingCashout =setInterval("mainCashout()",1000);

	$("ul.main-cashout-slide").hover(
	function(){clearInterval(timingCashout);},
	function(){timingCashout = setInterval("mainCashout()",1000);}
	);

	var timingCashin =setInterval("mainCashin()",1000);

	$("ul.main-cashin-slide").hover(
	function(){clearInterval(timingCashin);},
	function(){timingCashin = setInterval("mainCashin()",1000);}
	);
	
	  /*var $main_visual = $(".main_visual .main_slider");
	  var $visualList = $(".main_visual .main_slider .slide_box > div");
	  var $visual_length = $visualList.length;
	  var _visualNum = 0;
	  var _visualIn = 0;
	  var setT = 0;
	  var bool = true;

	  function autoVisual(){
		_visualIn = setInterval(function(){
		  if( _visualNum > $visual_length - 2 ){
			_visualNum = 0;
		  }else{
			_visualNum ++;
		  }
		  fadeEvent( _visualNum )
		} , 7000 )
	  }
	  autoVisual()

	  function fadeEvent( targets ){
		$visualList.removeClass("on");
		$main_visual.eq(targets).addClass("on");
		$visualList.eq(targets).addClass("on");
		$(".thum li").removeClass("on").eq(targets).addClass("on");
	  }
	  
	  var dotNum = 0; 
	  $visualList.each(function(i){
		 if(i < 9){
			dotNum = "0" + ++i;
		 }else{
			dotNum = ++i
		 }
		$(".thum").append("<li>"+ dotNum +"</li>")
		$(".thum li").eq(0).addClass("on")
	  })
	
	  $(".thum").append("<li class='last'></li>")

	  $(".thum li.last").click(function(){
		clearInterval(_visualIn);
		clearTimeout(setT)
		if( !$(this).hasClass("play") ){
		  $(this).addClass("play");
		}else{
		  $(this).removeClass("play");
		  autoVisual()
		}
		bool = false;
	  })
	
	  $(".thum li").click(function(){
		var idx = $(this).index();
		if( $visual_length > idx ){
		  $(".thum li").removeClass("on").eq(idx).addClass("on");
		  clearInterval(_visualIn);
		  clearTimeout(setT)
		  fadeEvent( idx );
		  setT = setTimeout(function(){
			autoVisual()
		  } , 3000 )
		  _visualNum =  idx ;
		}
	  })
	
	  $(".main_visual button").click(function(){
	   clearInterval(_visualIn)
	   if( $(this).hasClass("slick-prev") ){
		 ( _visualNum < 1 ) ? _visualNum = $visual_length -1 : _visualNum--;
	   }else{
		 ( _visualNum > $visual_length-2 ) ? _visualNum = 0 : _visualNum++;
	   }
	   fadeEvent( _visualNum );
	   autoVisual();
	 });
	
	$(".main_visual .main_slider .slide_box > div").eq(0).addClass("on");

*/

	var banTotal1 =  $('.main-floor1 .bxslider> li').size();
	if(banTotal1 > 9){
		banTotal1 = banTotal1
	}else{
		banTotal1 = "0" + banTotal1
	}
	$(".bxslider li:eq(0) a").addClass("on");
	if(banTotal1 > 0){
		$('.bxslider').bxSlider({
			infiniteLoop : true,
			hideControlOnEnd : true,
			auto : true,
			controls: true,
			autoControls: false, 
			pager: true,
			pause : 5000,
			autoHover : true,
			onSlideAfter : function($slideElement, oldIndex, newIndex) {
				var bancount = newIndex+1;
				$(".bxslider li a").removeClass("on");
				$(".bxslider li:eq("+bancount+") a").addClass("on");

			}
		});

	}






	$(".register").click(function(){
		//$("#visual").addClass("pop");
		$(".login-code-pop, .login-code-pop-bg").show();
	});

	$(".code-cancel").click(function(){
		//$("#visual").removeClass("pop");
		$(".login-code-pop, .login-code-pop-bg").hide();
	});

	$(".nav > ul > li").mouseover(function(){
		$(this).find("ul.deph2").slideDown('fast');
		$(this).children("a").addClass("on");
	});
	$(".nav > ul > li").mouseleave(function(){
		$(".nav > ul > li > a").removeClass("on");
		$("ul.deph2").stop().slideUp('fast');
	});


	$(".join-v .cont li input, .join-v .cont li select").click(function(){
		$(this).parents("li").addClass("on");
	});

	$(".join-v .cont li input, .join-v .cont li select").blur(function(){
		$(this).parents("li").removeClass("on");
	});


	$(".quick .twi a, .quick .url-addr a").click(function(){
		$(this).addClass("on");
		return false;
	});

	$(".quick .q-close").click(function(e){
		e.preventDefault();
		$(this).parents("a").removeClass("on");
		return false;
	});

	$(".quick .top").click(function(){
		$("body, html").animate({scrollTop: 0}, 500);
		return false;
	});

	$(".pop-bt a.pop-close").click(function(){
		$(this).parents(".pop1").hide();
	});

	$(".question").click(function(){
		if($(this).parent().parent().get(0).tagName.toLowerCase() == "tr"){
			if($(this).parent().parent().next().hasClass("answer")){
				if($(this).hasClass("on")){
					$(this).parent().parent().next().hide();
					$(".question").removeClass("on");
					$(this).parents("tr").removeClass("memo-on");
				}else{
					$(".answer").hide();
					$(".question").removeClass("on");
					$("tr").removeClass("memo-on");
					$(this).parent().parent().next().show();
					$(this).parent().parent().find(".question").addClass("on");
					$(this).parents("tr").addClass("memo-on");
				}
			}
		}
	});
	$(".memo-close a").click(function(){
		$(".answer").hide();
		$(".question").removeClass("on");
		$("tr").removeClass("memo-on");
	});

	$(".header-tab > ul > li > a").click(function(){
		var num = $(this).parent().index();
		$(".header-tab > ul > li > a").removeClass("on")
		$(".header-tab-cont > div").hide();
		$(this).addClass("on")
		$(".header-tab-cont > div").eq(num).show();
	});
	/**
	$(".header-tab-cont > div.header-tab-cont-tab1 > ul > li > a").hover(function(){
		if($(this).find(".tit")[0].scrollWidth > 185){
			$(this).find(".tit").addClass("hover");
		}
	},function(){
		$(this).find(".tit").removeClass("hover");
	});

	$(".header-tab-cont > div > ul > li > a").click(function(){
		if($(this).hasClass("on")){
			$(".hd-cont-depth2").stop().slideUp('fast');
			$(this).removeClass("on");
		}else{
			$(".hd-cont-depth2").stop().slideUp('fast');
			$(".header-tab-cont > div > ul > li > a").removeClass("on");
			$(this).next(".hd-cont-depth2").slideDown('fast');
			$(this).addClass("on");
		}
		return false;
	});
	**/

	$(".popup-box .popup-close").click(function(){
		$(".popup-bg").hide();
	});
	$("a.notandum").click(function(){
		$("#notandum").show();
	});
	$(".pop-btn a").click(function(){
		$(".popup-bg").hide();
	});

	


	$(".game_home_name_bg").click(function(){
		if($(this).hasClass("game_home_name_bg_pickup")){
			$(this).removeClass("game_home_name_bg_pickup");
		}else{
			$(this).parents("ul").find("li").removeClass("game_home_name_bg_pickup");
			$(this).parents("ul").find("li").removeClass("game_away_name_bg_pickup");
			$(this).parents("ul").find("li").removeClass("game_tie_bg_pickup");
			$(this).addClass("game_home_name_bg_pickup");
		}
	});

	$(".game_away_name_bg").click(function(){
		if($(this).hasClass("game_away_name_bg_pickup")){
			$(this).removeClass("game_away_name_bg_pickup");
		}else{
			$(this).parents("ul").find("li").removeClass("game_home_name_bg_pickup");
			$(this).parents("ul").find("li").removeClass("game_away_name_bg_pickup");
			$(this).parents("ul").find("li").removeClass("game_tie_bg_pickup");
			$(this).addClass("game_away_name_bg_pickup");
		}
	});

	$(".game_tie_bg").click(function(){
		if($(this).hasClass("game_tie_bg_pickup")){
			$(this).removeClass("game_tie_bg_pickup");
		}else{
			$(this).parents("ul").find("li").removeClass("game_home_name_bg_pickup");
			$(this).parents("ul").find("li").removeClass("game_away_name_bg_pickup");
			$(this).parents("ul").find("li").removeClass("game_tie_bg_pickup");
			$(this).addClass("game_tie_bg_pickup");
		}
	});

	$(".bet_count_show").click(function(){
		if(!$(this).hasClass("on") && $(this).parents(".game_bet_data").next(".game-bet-more").length > 0){
			$(this).parents(".game_bet_data").next(".game-bet-more").show();
			$(this).addClass("on");
		}else{
			$(this).removeClass("on");
			$(this).parents(".game_bet_data").next(".game-bet-more").hide();
		}
	});

	$(".betslip_w .bsp_top .move span").click(function(){
		$(".betslip_w .bsp_top .move span").addClass("active");
		$(this).removeClass("active");

		/*$(".betslip_w .bsp_top .move span").removeClass("active");
		$(this).addClass("active");*/
	});

	$(".game-close-btn a").click(function(){
		if($(this).hasClass("on")){
			$(".game-cont").slideDown('fast');
			$(this).text("게임 현황판 닫기");
			$(this).removeClass("on");
		}else{
			$(".game-cont").slideUp('fast');
			$(this).text("게임 현황판 열기");
			$(this).addClass("on");
		}
	});
	
	$(".game-box .cont > ul > li").click(function(){
		if($(this).hasClass("on")){
			$(this).removeClass("on");
		}else{
			$(this).parents(".cont").find("ul > li").removeClass("on");
			$(this).addClass("on");
		}
	});

	$(".game-iframe-close").click(function(){
		$(".game-iframe").slideToggle()
		if($(this).hasClass("on")){
			$(".game-iframe-close strong").text("게임 현황판 펼침 ▼");
			$(this).removeClass("on");
		}else{
			$(".game-iframe-close strong").text("게임 현황판 닫기 ▲");
			$(this).addClass("on");
		}
	});
	/**
	$(".game-select-box-cont1 .cont ul li").click(function(){
		if($(this).hasClass("on")){
			$(this).removeClass("on");
		}else{
			$(".game-select-box-cont1 .cont ul li").removeClass("on");
			$(this).addClass("on");
		}
	});
	$(".game-select-box-cont2 .cont ul li").click(function(){
		if($(this).hasClass("on")){
			$(this).removeClass("on");
		}else{
			$(".game-select-box-cont2 .cont ul li").removeClass("on");
			$(this).addClass("on");
		}
	});
	$(".game-select-box-cont3 .cont ul li").click(function(){
		if($(this).hasClass("on")){
			$(this).removeClass("on");
		}else{
			$(".game-select-box-cont3 .cont ul li").removeClass("on");
			$(this).addClass("on");
		}
	});
	$(".game-select-box-cont4 .cont ul li").click(function(){
		if($(this).hasClass("on")){
			$(this).removeClass("on");
		}else{
			$(".game-select-box-cont4 .cont ul li").removeClass("on");
			$(this).addClass("on");
		}
	});
	$(".game-select-box-cont5 .cont ul li").click(function(){
		if($(this).hasClass("on")){
			$(this).removeClass("on");
		}else{
			$(".game-select-box-cont5 .cont ul li").removeClass("on");
			$(this).addClass("on");
		}
	});	
	***/

	$(".live-sports-tp .big-class .spi-ss li").hover(function(){
		console.log($(this).find(".tit")[0].scrollWidth);
		if($(this).find(".tit")[0].scrollWidth > 228){
			$(this).find(".tit").addClass("hover");
		}
	},function(){
		$(this).find(".tit").removeClass("hover");
	});

	$(".live-sports-tp .big-class .spi-s .spi-ss-t").click(function(){
		if($(this).next(".spi-ss").length > 0){
			$(this).next(".spi-ss").toggle()
		}
	});

	$(".btn_contatct").click(function(){
		if($(this).hasClass("on")){
			$(this).removeClass("on");
			$(".btn_contatct_list").removeClass("open").addClass("close");
			$(this).find(".icon-jiantou1").removeClass("on").text("펼쳐보기");
		}else{
			$(this).addClass("on");
			$(".btn_contatct_list").removeClass("close").addClass("open");
			$(this).find(".icon-jiantou1").addClass("on").text("닫기");
		}
	});

	$(".sub_bet .sb_tit").click(function(){
		if($(this).parent(".sub_bet").hasClass("opened")){
			$(this).removeClass("active");
			$(this).parent(".sub_bet").removeClass("opened");
			$(this).next(".sb_list").slideUp("fast");
		}else{
			$(this).addClass("active");
			$(this).parent(".sub_bet").addClass("opened");
			$(this).next(".sb_list").slideDown("fast");
		}
	});

	
	$(".sub_bet .sb_list li").click(function(){
		$(this).parents(".sb_list").find("li").removeClass("select");
		$(this).addClass("select");
	});

	$(".game_select .bet_w .bet_list li:not(.b_more)").click(function(){
		$(this).parents(".bet_list").find("li").removeClass("on");
		$(this).addClass("on");
	});
	$(".game_select .bet_w .bet_list .b_more").click(function(){
		if($(this).hasClass("select")){
			$(this).removeClass("select");
			$(this).parents(".bet_list").next(".default_in").slideUp('fast');
		}else{
			$(this).addClass("select");
			$(this).parents(".bet_list").next(".default_in").slideDown('fast');
		}
	});

	$(".gw_l > ul > li > a").click(function(){
		$(".gw_l > ul > li").removeClass("on");
		$(".gw_l > ul > li > a").removeClass("on");
		$(this).addClass("on");
		$(this).parents("li").addClass("on");
	});
	
});


$(window).scroll(function(){
	var height = $(document).height() - $(window).height();
	if($(document).scrollTop() > height / 2){
		$(".top").fadeIn('fast');
	}else{
		$(".top").fadeOut('fast');
	}
	var topset = $(window).scrollTop();	
	if($("#betslipmove").children("span").hasClass("on active")){
		//console.log(topset);
		if( topset < 170 ){
			$(".right-box").css("top", 0);
		}else{
			$(".right-box").css("top", $(window).scrollTop() - 170 );
		}
	}
});	


function mainCashout(){
	//复制第一个li

	var li =$("ul.main-cashout-slide>li:eq(0)").clone();

	//使用animate对li的外边距进行调整从而达到向上滚动的效果
	$("ul.main-cashout-slide>li:eq(0)").animate({height:"+35px",marginTop:'-35px'},1000,function(){

		//对已经消失的li进行删除
		$("ul.main-cashout-slide>li:eq(0)").remove();

		//把复制后的li插入到最后
		$("ul.main-cashout-slide").append(li);
	});
}

function mainCashin(){
	//复制第一个li

	var li =$("ul.main-cashin-slide>li:eq(0)").clone();

	//使用animate对li的外边距进行调整从而达到向上滚动的效果
	$("ul.main-cashin-slide>li:eq(0)").animate({height:"+35px",marginTop:'-35px'},1000,function(){

		//对已经消失的li进行删除
		$("ul.main-cashin-slide>li:eq(0)").remove();

		//把复制后的li插入到最后
		$("ul.main-cashin-slide").append(li);
	});
}