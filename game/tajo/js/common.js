// 토스트 관련 함수
function ShowToast( type, title, msg )
{
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-bottom-center toast-bottom-custom",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "0",
		"hideDuration": "2000",
		"timeOut": "3000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

    var $toast = toastr[type](msg, title);
}

function showModal(url)
{
	$("#memoModal").load(url, function() {
		$('#memoModal').modal('show');
	});
}

function closeMemoModal()
{
	$("#memoModal").modal('hide');
}

function CheckStr(strOriginal, strFind, strChange)
{
    var position, strOri_Length;
    position = strOriginal.indexOf(strFind);  
    
    while (position != -1){
		strOriginal = strOriginal.replace(strFind, strChange);
		position    = strOriginal.indexOf(strFind);
    }
  
    strOri_Length = strOriginal.length;
    return strOri_Length;
}

function CheckHangul(str) {
    strarr = new Array(str.length);
    schar = new Array('/', '.', '>', '<', ',', '?', '}', '{', ' ', '\\', '|', '(', ')', '+', '=');
    flag = true;
    for (i = 0; i < str.length; i++) {
        for (j = 0; j < schar.length; j++) {
            if (schar[j] == str.charAt(i)) {
                flag = false;
            }
        }
        strarr[i] = str.charAt(i)
        if ((strarr[i] >= 0) && (strarr[i] <= 9)) {
            flag = false;
        } else if ((strarr[i] >= 'a') && (strarr[i] <= 'z')) {
            flag = false;
        } else if ((strarr[i] >= 'A') && (strarr[i] <= 'Z')) {
            flag = false;
        } else if ((escape(strarr[i]) > '%60') && (escape(strarr[i]) < '%80')) {
            flag = false;
        }
    }
    if (flag) {
        return true;
    } else {
        return false;
    }

}

function EnNumCheck(word)
{
	  var str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	  for (i=0; i< word.length; i++)
	  {
		idcheck = word.charAt(i);
		for (j = 0 ;  j < str.length ; j++)
		{
		  if (idcheck == str.charAt(j)) break;
		  if (j+1 == str.length)
		  {
			return false;
		  }
		}
	  }
	  return true;
}

function NumCommaCheck(word)
{
	var str = ",1234567890";
	for (i=0; i< word.length; i++)
	  {
		idcheck = word.charAt(i);
		for (j = 0 ;  j < str.length ; j++)
		{
		  if (idcheck == str.charAt(j)) break;
		  if (j+1 == str.length)
		  {
			return false;
		  }
		}
	  }
	  return true;
}

function NumDash(word)
{
	var str = "-1234567890";
	for (i=0; i< word.length; i++)
	  {
		idcheck = word.charAt(i);
		for (j = 0 ;  j < str.length ; j++)
		{
		  if (idcheck == str.charAt(j)) break;
		  if (j+1 == str.length)
		  {
			return false;
		  }
		}
	  }
	  return true;
}

function NumCheck(word)
{
	var str = "1234567890";
	  for (i=0; i< word.length; i++) {
			idcheck = word.charAt(i);
			for (j = 0 ;  j < str.length ; j++)
			{
		  	if (idcheck == str.charAt(j)) break;
		  	if (j+1 == str.length)
		  	{
					return false;
		  	}
			}
	  }
	  return true;
}

function IsPhoneChek(strNumber)
{
	var regExpr = /^[0-9]{3,4}$/;
	
	if ( regExpr.test( strNumber ) )
		return true;
	else
		return false;
}


function keyCheck(){
	if(event.keyCode < 48 || event.keyCode > 57)// 0~9의 ASCII코드의 값 범위
	{
		alert("숫자만 사용할수 있습니다");
		event.returnValue= false ;//숫자가 아닌경우 입력이 안됨   
	}
}


// 숫자값인지 확인
function isNumeric(strA)
{
	var re = /^[0-9]+$/;
	return re.test(strA);
}


// 숫자에 컴마 넣기
function setComma(n)
{
	return Number(String(n).replace(/\..*|[^\d]/g, "")).toLocaleString().slice(0, -3);
}


// DIV팝업셋 시작
function setCookieDivpop( name, value, expiredays ) 
	{
		var todayDate = new Date();
        todayDate.setDate( todayDate.getDate() + expiredays );
        document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    }

function closeDivpop(setName, chkbox)
{
	var divPopid = document.getElementsByName(setName);
	var chkboxid = document.getElementsByName(chkbox);

	if (chkboxid[0].checked == true)
	{
		setCookieDivpop( setName, "done" , 1 );
    }

    document.all["" + setName + ""].style.visibility = "hidden";
}
// DIV팝업셋 끝


// 게시판
function freeBoardForm_ok() {
	var subject = freeBoardForm.subject.value.replace(/(^\s*)|(\s*$)/gi,"");
	if (subject == "") {
	   alert("제목을 입력해주세요");
	   document.freeBoardForm.subject.focus();
	   return;
	}

	var content = freeBoardForm.content.value;

	if(content=="")
	{
		alert("내용을 입력해주세요");
		ed1.focus();
		return;
	}

	if (confirm("입력하신 내용을 등록 하시겠습니까?")) {
		document.freeBoardForm.submit();
	} else {
		return;
	}
}


// 콤마 붙이기
function insertComma(Num) {
    Num += '';
    Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
    Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
    x = Num.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1))
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    return x1;
}

// 숫자만 입력
function pressCheck(gubun) {
	if ( event.keyCode >= 48 && event.keyCode <= 57 ){ 	// 숫자만 입력가능.
		event.returnValue = true;
	}else {
		event.returnValue = false;
	}
}

function goLink(m, sid) {
    var boolPopup = false;
    var w = 100;
    var h = 100;
    var url = "";


    switch (m.toLowerCase()) {
        case "main":
            url = "/Member/main.aspx";
            break;
        case "horse":
            url = "/Member/horse.aspx";
            break;
        case "sudda":
            url = "/Member/sudda.aspx";
            break;
        case "charge":
            url = "/Member/charge.aspx";
            break;

        case "exchange":
            url = "/Member/discharge.aspx";
            break;

        case "bethist":
            url = "/Member/pwbhist.aspx";
            break;

        case "cscenter":
            url = "/Member/cscenter.aspx";
            break;

        case "notice":
            url = "/Member/notice.aspx";
            break;

        case "roundhist":
            url = "/Member/roundhist.aspx";
            break;

        case "moneyhist":
            url = "/Member/moneyhist.aspx";
            break;

        case "pointhist":
            url = "/Member/pointhist.aspx";
            break;

        case "memo":
            url = "/Member/memo.aspx";
            break;

        case "logout":
            url = "/logout.aspx";
            break;

        case "login":
            url = "login.aspx";
            break;
    }

    if (m.toLowerCase() == "ready")
        alert('업데이트 준비중입니다.');
    else {

        if (sid != null && parseInt(sid) >= 0)
            url = url + "&secID=" + sid;

        if (boolPopup)
            window.open(url, m, "width=" + w + ", height=" + h);
        else
            document.location.href = url;
    }
}

function Url(url) {
    var target = "";
    switch (url.toLowerCase()) {
        case "p_normal":
            target = "/Member/powerball_normal.aspx";
            break;
        case "p_power":
            target = "/Member/powerball_power.aspx";
            break;
    }
    //$("#layer-popup iframe").attr("src", target);
    //$("#layer-popup").show();
    $(".w_tab_cont iframe").attr("src", target);
}

function Url_pass(url) {
    var inputString = prompt('비밀번호를 입력하세요', '');

    if (inputString == "" || inputString == null) return;

    $.ajax({
        url: '/api_pb/check_pass.aspx',
        type: 'GET',
        dataType: 'text',
        data: { "pass": inputString },
        success: function(data, textStatus, jqXHR) {
            if (data == "ok") {
                Url(url)
            }
            else {
                alert("비밀번호가 일치하지 않습니다");
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("시스템 에러. 관리자에 문의하세요");
        }
    });
}


function hide_popup() {
    document.location.reload();
}
//공백이 있으면 안된다
function isEmpty(str) {
    if (str == null || str.replace(/ /gi, "") == "") {
        return false;
    }
    return true;
}

//영문소문자와 숫자여야만 한다
function checkStrNumRower(str) {
    var lalp_num = str;
    var str = "0123456789abcdefghijklmnopqrstuvwxyz";

    for (i = 0; i < lalp_num.length; i++) {
        if (lalp_num.value != "" && str.indexOf(lalp_num.charAt(i)) < 0) {
            return false;
        }
    }
    return true;
} 
//영문대소문자, 한글, 수자만 있어야 한다.
function checkStrEngKo(str) {
    var pattern = /[^(가-힣a-zA-Z0-9)]/; //한글 영문(대소), 수자 허용

    if (pattern.test(str)) {
        return false;
    }

    return true;
}

//영문대소문자, 숫자만 있어야 한다.
function checkStrEngNum(str) {
    var pattern = /[^(0-9a-zA-Z)]/; //숫자 영문(대소) 허용

    if (pattern.test(str)) {
        return false;
    }

    return true;
}

//영문소문자, 숫자만 있어야 한다.
function checkStrRowEngNum(str) {
    var pattern = /[^(0-9a-z)]/; //숫자 영문(대소) 허용

    if (pattern.test(str)) {
        return false;
    }

    return true;
}
//숫자여야만 한다
function checkNumber(str) {

    var lalp_num = str;
    var str = "0123456789";

    for (i = 0; i < lalp_num.length; i++) {
        if (lalp_num.value != "" && str.indexOf(lalp_num.charAt(i)) < 0) {
            return false;
        }
    }
    return true;
}

function checkNumeric(){
    return event.keyCode >= 48 && event.keyCode <= 57;
}

function formatCurrency(ctrl) {
    //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
    if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
        return;
    }

    var val = ctrl.value;
    inputAddMoneyBet();
    val = val.replace(/,/g, "")
    ctrl.value = "";
    val += '';
    x = val.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';

    var rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }

    ctrl.value = x1 + x2;
}

function setCookie(key, val) {
    var today = new Date();
    document.cookie = key + "=" + escape(val) + "; path=/;";
}
function getCookie(key) {
    var nameOfCookie = key + "=";
    var x = 0;
    while (x <= document.cookie.length) {
        var y = (x + nameOfCookie.length);
        if (document.cookie.substring(x, y) == nameOfCookie) {
            if ((endOfCookie = document.cookie.indexOf(";", y)) == -1)
                endOfCookie = document.cookie.length;
            return unescape(document.cookie.substring(y, endOfCookie));
        }
        x = document.cookie.indexOf(" ", x) + 1;
        if (x == 0)
            break;
    }
    return "";
}

function wrapWindowBybg_mask(el) {
    //화면의 높이와 너비를 구한다.
    var bg_maskHeight = $(document).height();
    var bg_maskWidth = $(window).width();

    //마스크의 높이와 너비를 화면 것으로 만들어 전체 화면을 채운다.
    $('#bg_mask').css({ 'width': '100%', 'height': bg_maskHeight });
    //$('#bg_mask').css({'width':'100%','height':'100%'});

    //애니메이션 효과 - 일단 1초동안 까맣게 됐다가 80% 불투명도로 간다.
    //$('#bg_mask').fadeIn(1000);      
    //$('#bg_mask').fadeTo(0,0.50);    
    $('#bg_mask').fadeTo("slow", 0.9);
    //$('#bg_mask').fadeOut(1000);    

    //윈도우 같은 거 띄운다.
    //$('.bg_mask_pop').show();
    $('.' + el).show();

    //$('.bg_mask_pop').fadeTo(0,0.5);
    var temp = $('.' + el);

    // 화면의 중앙에 레이어를 띄운다.
    if (temp.outerHeight() < $(document).height()) temp.css('margin-top', '-' + temp.outerHeight() / 2 + 'px');
    else temp.css('top', '0px');
    if (temp.outerWidth() < $(document).width()) temp.css('margin-left', '-' + temp.outerWidth() / 2 + 'px');
    else temp.css('left', '0px');


}

function layer_pop_mask(mode, layer1, layer2) {

   
    //띄우기
    if (mode == "open") {
        wrapWindowBybg_mask(layer1);
        if (layer2) {
            $('.' + layer2).hide();
        }
        window.scrollTo(0, 0);
    }

    //닫기 버튼을 눌렀을 때
    if (mode == "close") {
        $('#bg_mask').hide();
        $('.' + layer1).hide();
    }

    //이동 버튼을 눌렀을 때
    if (mode == "move") {
        $('.' + layer1).hide();
        wrapWindowBybg_mask(layer2);
    }
}

function setCookie(key, val) {
    var today = new Date();
    document.cookie = key + "=" + escape(val) + "; path=/;";
}
function getCookie(key) {
    var nameOfCookie = key + "=";
    var x = 0;
    while (x <= document.cookie.length) {
        var y = (x + nameOfCookie.length);
        if (document.cookie.substring(x, y) == nameOfCookie) {
            if ((endOfCookie = document.cookie.indexOf(";", y)) == -1)
                endOfCookie = document.cookie.length;
            return unescape(document.cookie.substring(y, endOfCookie));
        }
        x = document.cookie.indexOf(" ", x) + 1;
        if (x == 0)
            break;
    }
    return "";
}
function deleteCookie(key) {
    document.cookie = key + "=; path=/;";
}