$(document).ready(function(){
	  var $main_visual = $(".main_visual .main_slider");
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




	$(".menu-close a").click(function(){
		$(".menu-box").animate({"left":"-100%"},100);
		$(".menu-box-bg").hide();
	});

	$(".menu a").click(function(){
		$(".menu-box").animate({"left":"0"},100);
		$(".menu-box-bg").show();
	});

	$(".info-close a").click(function(){
		$(".info-box").animate({"left":"-100%"},100);
		$(".menu-box-bg").hide();
	});

	$(".info a").click(function(){
		$(".info-box").animate({"left":"0"},100);
		$(".menu-box-bg").show();
	});

	for(var i = 0; i <= $(".menu-box-cont > ul > li").length; i++){
		if($(".menu-box-cont > ul > li:eq("+i+") > a").next(".deph2").length > 0){
			$(".menu-box-cont > ul > li:eq("+i+") > a").addClass("deph1-icon");
		}
	}

	$(".menu-box-cont > ul > li > a").click(function(){
		if($(this).hasClass("on")){
			$(this).next(".deph2").slideUp('fast');
			$(this).removeClass("on");
		}else{
			$(".deph2").slideUp('fast');
			$(".menu-box-cont > ul > li > a").removeClass("on");
			$(this).next(".deph2").slideDown('fast');
			$(this).addClass("on");
		}
	});



	$(".nav > ul > li > a").click(function(){
		if($(this).hasClass("on")){
			$(".nav > ul > li > a").removeClass("on");
			$("ul.mdeph2").stop().slideUp('fast');
		}else{
			$(".nav > ul > li > a").removeClass("on");
			$("ul.mdeph2").stop().slideUp('fast');
			$(this).next("ul.mdeph2").slideDown('fast');
			$(this).addClass("on");
		}
	});
	

	$(".popup-box .popup-close").click(function(){
		$(".popup-bg").hide();
	});	
	$(".go-recommender-code").click(function(){
		$(".popup-bg").hide();
		$("#recommender-code").show();

	});
	$("a.notandum").click(function(){
		console.log(11);
		$("#notandum").show();
	});
	$(".pop-btn a").click(function(){
		$(".popup-bg").hide();
	});

	$(".question > a").click(function(){
		if($(this).parent().parent().parent().get(0).tagName.toLowerCase() == "dl"){
			if($(this).parent().parent().parent().next().hasClass("answer")){
				if($(this).hasClass("on")){
					$(this).parent().parent().parent().next().hide();
					$(".question > a").removeClass("on");
					$(this).parents("li").removeClass("memo-on");
				}else{
					$(".answer").hide();
					$(".question > a").removeClass("on");
					$(".table-dl li").removeClass("memo-on");
					$(this).addClass("on");
					$(this).parent().parent().parent().next().show();
					$(this).parents("li").addClass("memo-on");
				}
			}
		}
	});
	$(".memo-close a").click(function(){
		$(".answer").hide();
		$(".question > a").removeClass("on");
		$(".table-dl li").removeClass("memo-on");
	});
	/**
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

	***/


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

/*
	$(".cart a").click(function(){
		cartOn();
	});
*/
	$(".cart-close, .cart-close-box a").click(function(){
		$(".cart-info").fadeOut('fast');
		$(".cart").fadeIn();
		$("#cart").slideUp('fast');
	});

	function cartOn(){
		$(".cart").fadeOut();
		$(".cart-info").fadeIn('fast');
		$("#cart").slideDown('fast');

	}
	$('#cart .down-btn a').click(function(){
		$("#cart").animate({"bottom":"-100%"},100);
		$('.cart-info .up-btn').show();
		$('#cart-switch').removeClass('on');
		$('#cart-switch').text('카트열기');
	});

/*카트열기*/
	$('.cart-info .up-btn a').click(function(){
		$("#cart").show();
		$("#cart").animate({"bottom":"0"},100);
		$('.cart-info .up-btn').hide();
		$('#cart-switch').addClass('on');
		$('#cart-switch').text('카트닫기');
	});

	$('#cart-switch').click(function(){
		if($(this).hasClass('on')){
			$("#cart").animate({"bottom":"-100%"},100);
			$('.cart-info .up-btn').show();
			$('#cart-switch').removeClass('on');
			$('#cart-switch').text('카트열기');
		}else{			
			$("#cart").show();
			$("#cart").animate({"bottom":"0"},100);
			$('.cart-info .up-btn').hide();
			$('#cart-switch').addClass('on');
			$('#cart-switch').text('카트닫기');
		}
	});

	let pageGameInfo = [
		{
			path: '/mobile/main/eospower1.php',
			width: 855,
			height: 640
		},
		{
			path: '/mobile/main/eospower3.php',
			width: 855,
			height: 640
		},
		{
			path: '/mobile/main/eospower5.php',
			width: 855,
			height: 640
		},
		{
			path: '/mobile/main/keno_ladder.php',
			width: 855,
			height: 640
		},
		{
			path: '/mobile/main/power.php',
			width: 855,
			height: 640
		},
		{
			path: '/mobile/main/power_ladder.php',
			width: 855,
			height: 640
		},
		{
			path: '/mobile/main/janggu_power1.php',
			width: 830,
			height: 800
		},
		{
			path: '/mobile/main/janggu_power3.php',
			width: 830,
			height: 800
		},
		{
			path: '/mobile/main/janggu_power5.php',
			width: 830,
			height: 800
		},
		{
			path: '/mobile/main/janggu_ladder1.php',
			width: 830,
			height: 760
		},
		{
			path: '/mobile/main/janggu_ladder2.php',
			width: 830,
			height: 760
		},
		{
			path: '/mobile/main/janggu_ladder3.php',
			width: 830,
			height: 760
		}
	];
	let selGame = {};
	for (let i = 0; i < pageGameInfo.length; i++) {
		if (pageGameInfo[i].path.indexOf(location.pathname) > -1) {
			selGame = pageGameInfo[i];
			gameResize();
			$(window).resize(function() {
				gameResize();
			});
		}
	}
	
	
	function gameResize() {
		let tansValue = document.body.clientWidth - 10 > selGame.width ? 1 : (document.body.clientWidth - 10) / selGame.width;
		$('#game_frame').css({'width':selGame.width + 'px', 'height':selGame.height + 'px', 'transform':'scale(calc(' + tansValue + ')'});
		$('.minigame_screen, .minigame_screen > div').css({'height': selGame.height * tansValue + 'px'});
	}


});


$(window).scroll(function(){
	var height = $(document).height() - $(window).height();
	if($(document).scrollTop() > height / 2){
		$(".top").fadeIn('fast');
	}else{
		$(".top").fadeOut('fast');
	}
});
