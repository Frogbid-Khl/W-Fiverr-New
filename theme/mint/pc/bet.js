function logo_menu() {
    location.href = '../main.html';
}

function meminfo() {
    $.getJSON('memberinfo.html', function (rst) {
        $('#myMnySpan').text(rst.nCurMoney);
        $('#myPointSpan').text(rst.nCurMile);
        //$('#myCurBetNum').text( rst.bt+' 건' );
        $('#myCurBetMny').text(rst.bm);
        //$('#myCurBetRst').text( rst.br+' 원' );
        if ($('#memLevel').length > 0) $('#memLevel').attr('src', '../images/icon_lv_' + rst.nLevel + '.png');
        if ($('#myNameSp').length > 0) {
            $('#myNameSp').val(rst.sName).text(rst.sName);
        }
        $('#editMYiNF').html('&nbsp;');
        if ($('#myMnySpan2').length > 0) $('#myMnySpan2').text(rst.nCurMoney);
        if ($('#myMnySpan3').length > 0) $('#myMnySpan3').text(rst.nCurMoney);
        if ($('#myPointSpan2').length > 0) $('#myPointSpan2').text(rst.nCurMile);
        if ($('#myPointSpan3').length > 0) $('#myPointSpan3').text(rst.nCurMile);
        if ($('#myCPointSpan').length > 0) $('#myCPointSpan').text(rst.nCurCPoint);
        if ($('#myCPointSpan2').length > 0) $('#myCPointSpan2').text(rst.nCurCPoint);
    });
}

function mailcheck() {
    //var mut_in = new Audio(); mut_in.src='../images/memo_on.mp3'; mut_in.load();
    $.getJSON('mailcheck.html', function (data) {
        if (data.p > 0) {
            var s = location.href;
            if (s.indexOf('/board/paper/') > 0) {
                if ($('#paperNum').text() != data.p) {
                    $('#paperNum').text(data.p);
                    $('body').append('<div id="overlay_t"></div><div id="popup_layer_paper" style="cursor:pointer;">쪽지가 도착했습니다. 빨리 확인해주세요!</div>');
                    $('#popup_layer_paper, #overlay_t').show();
                    $('#popup_layer_paper').css("top", Math.max(0, $(window).scrollTop() + 100) + "px");
                    $('#popup_layer_paper').click(function (e) {
                        e.preventDefault();
                        $('#popup_layer_paper, #overlay_t').hide();
                    });
                    //mut_in.play();
                    //new jBox('Notice', { content: '쪽지가 도착했습니다. 빨리 확인해주세요!'});
                    //$('#paperArrive').removeClass('btn-default').addClass('blink').addClass('btn-warning');
                }
                if ($('#paperNum2').length > 0) $('#paperNum2').text(data.p);
            } else
                document.location.href = '../board/paper/0.html';
        } else if (data.c > 0) {
            var s = location.href;
            if (s.indexOf('/board/center/') > 0) {
                //mut_in.play();
                //new jBox('Notice', { content: '답변완료된 문의내역이 있습니다. 빨리 확인해주세요!'});
                $('body').append('<div id="overlay_t"></div><div id="popup_layer_paper" style="cursor:pointer;">답변완료된 문의내역이 있습니다. 빨리 확인해주세요!</div>');
                $('#popup_layer_paper, #overlay_t').show();
                $('#popup_layer_paper').css("top", Math.max(0, $(window).scrollTop() + 100) + "px");
                $('#popup_layer_paper').click(function (e) {
                    e.preventDefault();
                    $('#popup_layer_paper, #overlay_t').hide();
                });
            } else
                document.location.href = '../board/center/0.html';
        }
    });
    //setTimeout("mailcheck()", 15000);
}

function mailcheck2() {
    $.getJSON('mailcheck.html', function (data) {
        if (data.cc > 0) {
            if ($('#paperNum').text() != data.cc) {
                new jBox('Notice', {content: '쪽지가 도착했습니다. 빨리 확인해주세요!', attributes: {x: 'right', y: 'bottom'}});
                $('#paperArrive').removeClass('btn-default').addClass('blink').addClass('btn-warning');
                $('#paperNum').text(data.cc);
            }
            if ($('#paperNum2').length > 0) $('#paperNum2').text(data.cc);
        }
    });
    setTimeout("mailcheck()", 15000);
}

function viewRule() {
    document.location.href = '../center/rule/1.html';
}

function seePaper() {
    document.location.href = '../board/paper/0.html';
}

function changePoint() {
    //askAmount = ( $('#IC_Amount').val() == "" ) ? 0 : parseInt( replaceComma($('#IC_Amount').val()) ) ;
    //if( askAmount < 10000 ){ alert('최소 포인트전환을 신청하실 수 있는 금액은 10,000원부터 가능합니다.'); return; } else if( askAmount % 1000 != 0 ){ alert('충전은 춴원단위로 신청해 주시기 바랍니다.'); return; }
    //if( askAmount <= 0 ) alert('충전하실 금액을 선택해 주세요.'); else
    if (confirm('적립된 포인트를 머니로 전환하시겠습니까?')) {
        $.post('../center/convertPoint', {amt: $('#myPointSpan').text()}, function (rst) {
            if (rst.status == 99) alert('정보를 정확히 입력해 주시기 바랍니다.');
            else if (rst.status == 91) {
                alert('전환할 포인트가 없습니다.');
            } else if (rst.status == 0) {
                alert('전환되었습니다.');
                document.location.reload();
            } else if (rst.status == 97) alert('전환금액은 보유포인트 보다 많을 수 없습니다');
            else alert('전환 실패했습니다.');
        }, "json");
    }
}

function viewLevelInfo() { /*$('#levelDv').show();*/
}

function clslevelDv() {
    $('#levelDv').hide();
}

function setCookie(name, value, expiredays) {
    var todayDate = new Date();
    todayDate.setDate(todayDate.getDate() + expiredays);
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}

function notice_getcookie(name) {
    var nameOfcookie = name + "=";
    var x = 0;
    while (x <= document.cookie.length) {
        var y = (x + nameOfcookie.length);
        if (document.cookie.substring(x, y) == nameOfcookie) {
            if ((endOfcookie = document.cookie.indexOf(";", y)) == -1) endOfcookie = document.cookie.length;
            return unescape(document.cookie.substring(y, endOfcookie));
        }
        x = document.cookie.indexOf(" ", x) + 1;
        if (x == 0) break;
    }
    return "";
}

function getNews() {
    /*$.getJSON('getNews', function (data) {
        if ($('#panelMqee').length > 0 && data.lst.length > 0) {
            $.each(data.lst, function (k, v) {
                $('#panelMqee').append('<span class="tx1" style="padding-right:30px;">' + v.sTitle + '</span>');
            });
            $('.led_bx').marquee({
                duration: 10000,
                gap: 50
            });
        }
    });*/
}

Number.prototype.format = function () {
    if (this == 0) return 0;
    var reg = /(^[+-]?\d+)(\d{3})/;
    var n = (this + '');
    while (reg.test(n)) n = n.replace(reg, '$1' + ',' + '$2');
    return n;
};
String.prototype.format = function () {
    var num = parseFloat(this);
    if (isNaN(num)) return "0";
    return num.format();
};
var isStck = true;
var cartArr = new Array();
var sumRati = 1.0;

function stopStick() {
    if (isStck) {
        isStck = false;
        $("#content_right").trigger("sticky_kit:detach");
        $('#imgBetlipPin').prop('src', '../images/betslip_pix_on.gif');
    } else {
        isStck = true;
        $("#content_right").stick_in_parent({offset_top: 60});
        $('#imgBetlipPin').prop('src', '/images/betslip_pix.gif');
    }
}

function addCartM(cc) {
    if (isNaN($('#nAmt').val().replace(/,/gi, ''))) {
        alert('금액을 숫자로 입력해 주시기 바랍니다.');
        $('#nAmt').val('');
        return;
    }
    if ($('#nAmt').val() == "") cm2 = cc;
    else cm2 = parseInt($('#nAmt').val().replace(/,/gi, '')) + cc;
    $('#nAmt').val(cm2.format());
    calc();
}

function calc() {
    bnsRatio = parseFloat($('#BONUS_RT_SET').val());
    sumRati = 1.0;
    $.each(cartArr, function (k, v) {
        sumRati *= v.rt;
    });
    sumRati += 0.00000001;
    if (bnsRatio > 0) sumRati = sumRati + (sumRati * bnsRatio);
    sumRati *= 100;
    sumRati = Math.floor(sumRati);
    sumRati = sumRati / 100;
    $('#bRto').text(sumRati);
    if (isNaN($('#nAmt').val().replace(/,/gi, ''))) {
        alert('금액을 숫자로 입력해 주시기 바랍니다.');
        $('#nAmt').val('');
        return;
    }
    amt = parseInt($('#nAmt').val().replace(/,/gi, ''));
    tmp = Math.floor(sumRati * amt) + "";
    $('#TotalBenefit').text(tmp.format());
}

var allSpe = false;
var allHdy = false;

function maxCalc() {
    var bet_cnt = 0;
    calc();
    if (typeof max_rst != 'undefined') {
        max_rst_f = max_rst;
        max_amt_f = max_amt;
        if ($('#bb_gt').val() == 'D') {
            if (allSpe) {
                max_rst_f = max_rst_s;
                max_amt_f = max_amt_s;
            } else if (allHdy) {
                max_rst_f = max_rst_h;
                max_amt_f = max_amt_h;
            }
        }
        $('.game_data .g_gr_c').each(function (i, e) {
            bet_cnt++;
        });
        if (bet_cnt == 1) {
            max_amt_f = minFoldermoney;
            max_rst_f = minFolderwinmoney;
        }
        bnsRst = parseFloat($('#BONUS_PR_SET').val());
        if (bnsRst > 0) max_rst2 = max_rst_f + (max_rst_f * bnsRst); else max_rst2 = max_rst_f;
        curAmt = Math.floor(max_rst2 / sumRati);
        aa = Math.floor(curAmt / 100);
        aa *= 100;
        if (aa > max_amt_f) aa = max_amt_f;
        $('#nAmt').val(aa.format());
        calc();
        //if( confirm( Hprice(aa)+' 배팅 하시겠습니까?' ) ){ betNowR(); }
    }
}

function betNow() {
	var my_msg = '배팅하시겠습니까?';
	if (confirm(my_msg)) {
		curAmt = parseInt($('#nAmt').val().replace(/,/gi, ''));
		betNowR();
	}
}

var keepGo = 0;
var isbet = false;

function betNowR() {
    var mdata = [];
    var mdata_ids = [];
    var temp_id = 0;
    var temp_pid = 0;
    var temp_t_id = '';
    var bet_cnt = 0;
    max_rst_f = max_rst;
    max_amt_f = max_amt;
    if ($('#bb_gt').val() == 'D') {
        if (allSpe) {
            max_rst_f = max_rst_s;
            max_amt_f = max_amt_s;
        } else if (allHdy) {
            max_rst_f = max_rst_h;
            max_amt_f = max_amt_h;
        }
    }
    //if( $('#bb_gt').val() != 'S' ){ max_amt_f = ( allSpe ) ? max_amt_s : max_amt; max_rst_f = ( allSpe ) ? max_rst_s : max_rst; } else { max_amt_f = max_amt; max_rst_f=max_rst; }
    if (cartArr.length > 0) {
        hasEvent = false;
        pol = 0;
        $.each(cartArr, function (k, v) {
            if (v.ev == 'Y') {
                pol = v.evp;
                hasEvent = true;
                return;
            }
        });
        if (hasEvent && cartArr.length <= pol) {
            alert(pol + '폴더 보너스가 포함되어 픽을 더 하셔야 됩니다.');
            return;
        }
    }
    if ($('#BONUSE_CP_TP').val() == 'CB') {
        isAcpt = true;
        $.each(cartArr, function (k, v) {
            if (v.jmk != $('#BONUSE_CB_J').val()) isAcpt = false;
        });
        if (isAcpt == false) {
            alert('같은 종목만 사용가능합니다.');
            return;
        }
        if (cartArr.length > 1) {
            alert('취소 쿠폰은 단폴 배팅에만 사용가능합니다.');
            return;
        }
    }
    if (isNaN($('#nAmt').val().replace(/,/gi, ''))) {
        alert('금액을 숫자로 입력해 주시기 바랍니다.');
        $('#nAmt').val('');
        return;
    }
    if ($('#nAmt').val() == "") {
        alert('금액을 숫자로 입력해 주시기 바랍니다.');
        $('#nAmt').val('');
        return;
    }
    curAmt = parseInt($('#nAmt').val().replace(/,/gi, ''));
    if (curAmt <= 0) {
        alert('배팅금액을 입력하세요');
        return;
    }
    if (curAmt < min_Amt || curAmt > max_amt_f) {
        alert('배팅 가능 금액은 ' + min_Amt.format() + ' ~ ' + max_amt_f.format() + ' 입니다...');
        return;
    }
    calc();
    betRatio = parseFloat($('#bRto').text());
    betRst = betRatio * curAmt;
    bnsRst = parseFloat($('#BONUS_PR_SET').val());
    if (bnsRst > 0) max_rst2 = max_rst_f + (max_rst_f * bnsRst); else max_rst2 = max_rst_f;
    //if( betRst > max_rst2 && $('#bb_gt').val() != 'Z' ){ alert('지급가능한 당첨금액은 '+max_rst2.format()+' 입니다'); return; }
    if (betRst > max_rst2) {
        alert('지급가능한 당첨금액은 ' + max_rst2.format() + ' 입니다');
        return;
    }
	/*$('.bonus_folder .g_gr_c').each(function (i, e) {
		temp_id = Number($.trim($($(this).parent('li')).attr('data-id')));//SportGames id        
        mdata.push({
            id: temp_id,
            baedang: Number($.trim($(this).find('.rt').text())),
            baedang2: Number(0),
            team: 'home',
            division: 'bonus'
        });
        mdata_ids.push(temp_id);
        bet_cnt++;
	});	
    $('.game_data .g_gr_c').each(function (i, e) {
        temp_id = Number($.trim($($(this).parent('ul')).attr('data-id')));//SportGames id
        temp_pid = Number($.trim($($(this).parent('ul')).attr('data-pid')));//sports id

        temp_t_id = "#bgm_m_" + temp_id;

		mdata.push({
            id: temp_id,
            baedang: Number($.trim($(this).find('.divd').text())),
            baedang2: Number($.trim($(temp_t_id).find('.divd2').text())),
            team: $.trim($(this).find('.name').attr('data-type')),
            division: $(this).parent('ul').attr('data-division')
        });
        mdata_ids.push(temp_id);

        bet_cnt++;
    });	*/

	var btNameArr = new Array();
	btNameArr[1] = 'home';
	btNameArr[2] = 'away';
	btNameArr[3] = 'draw';

    if (cartArr.length > 0) {
        $.each(cartArr, function (k, v) {
			 var arrrt2 = v.rt2.split("_");

				mdata.push({
					id: v.gky,
					baedang: v.rt,
					baedang2: arrrt2[2],
					team: btNameArr[v.bt],
					division: ''
				});
				mdata_ids.push(v.gky);

				bet_cnt++;

        });

    }

    $('#bb_nAmt').val(parseInt($('#nAmt').val().replace(/,/gi, '')));
    var _current_price = parseInt($('#nAmt').val().replace(/,/gi, ''));
    $('#bb_mtyp').val('C');
    $('#bb_bi').val(encodeURI(JSON.stringify(cartArr)));

	if(mdata_ids.length == 0){
		alert("참여하실 경기를 선택해주세요1.");
		return false;

	}

    if (isbet) {
        alert('배팅정보를 서버에 전송중입니다.');
        return false;
    }
    isbet = true;
	

    $.ajax({
        type: "post",
        url: "/main/sports.betting.php",
        data: {'cash': _current_price, 'data_ids': mdata_ids, 'data': mdata,"keepGo" : keepGo},
        dataType: "json",
        success: function (jData) {
            if (jData.result) {
                alert(jData.msg);
                if (jData.url == 'mobile') {
                    location.href = "/mobile/main/sports-betting.list.php";
                } else {
                    location.href = "/main/sports-betting.list.php";
                }
            } else if (jData.msg == "changeOdds") {
                var keepBet = confirm("변경된 배당이 있습니다.\r\n배당이변동된 게임: "+jData.data+"\r\n계속 진행 하시겠습니까?");
                if (keepBet == true) {
                    keepGo = 1;
                    isbet = false;
                    betNow();
                }else{
                    //location.reload();
                    isbet = false;
                }
            } else {
                alert(jData.msg);
                location.reload();
            }
        }
    });
    //$.post('betIt',{gt:$('#bb_gt'),nAmt:curAmt,mtyp:'C',bi:encodeURI(JSON.stringify( cartArr )),BONUS_RT_SET:$('#BONUS_RT_SET').val(),BONUS_PR_SET:$('#BONUS_PR_SET').val(),cpnno:$('#cpnno').val(),BONUSE_CP_TP:$('#BONUSE_CP_TP').val(),BONUSE_CB_J:$('#BONUSE_CB_J').val()},function(rst){
    //	eval(rst);
    //});
}

function goMyBet() {
    $('#bb_nAmt').val('');
    document.location.replace('mybet');
}

function CouponApply() {
    var exp = document.getElementById("Coupon").value.split("|");
    var by_set = parseFloat('1.00');
    var ttl_set;
    var bonus = 0;
    var item;
    var result;
    document.getElementById("BONUS_RT_SET").value = 0; //추가배당
    document.getElementById("BONUS_PR_SET").value = 0; //상한가
    document.getElementById("BONUSE_CP_TP").value = ''; //상한가
    document.getElementById("cpnno").value = 0; //상한가
    if (document.getElementById("UseCoupon").checked == true) {
        if (exp[1] == 'BU') $('#BONUS_RT_SET').val(exp[3]);
        else if (exp[1] == 'MU') $('#BONUS_PR_SET').val(exp[3]);
        else if (exp[1] == 'CB') {
            if (!($('#bb_gt').val() == 'D' || $('#bb_gt').val() == 'H')) {
                alert('본 쿠폰은 해당 카테고리에서 사용이 제한됩니다.');
                $('#Coupon').val('');
                calc();
                return;
            }
            $('#BONUSE_CB_J').val(exp[2]);
        }
        $('#cpnno').val(exp[0]);
    }
    $('#BONUSE_CP_TP').val(exp[1]);
    calc();
}

function rmCart(ky) {
    toggleClickClass(cartArr[ky]["gky"], cartArr[ky]["bt"]);
    cartArr.splice(ky, 1);
    showLog();
}
function clearAll() {
    $('li.g_gr_c').removeClass('g_gr_c').addClass('g_gr_n');
    $('span.g_home_o').removeClass('g_home_o').addClass('g_home_n');
    $('span.g_home_odd_o').removeClass('g_home_odd_o').addClass('g_home_odd_n');
    $('span.g_away_o').removeClass('g_away_o').addClass('g_away_n');
    $('span.g_away_odd_o').removeClass('g_away_odd_o').addClass('g_away_odd_n');
    $('span.g_odd_o').removeClass('g_odd_o').addClass('g_odd_n');
	$('#cart_cnt').text(0);
	$('.bonus_folder ul li a').each(function() {
		$(this).removeClass('g_gr_c');
	});
    cartArr = new Array();
    showLog();
	addBamt(0);

}

function getTz(ss, ii) {
    ss = parseFloat(ss);
    ss = ss + ii;
    ss = ss.toFixed(2);
    return ss;
}
Array.prototype.removeArrVal = function(val) { 
		var index = this.indexOf(val); 
				if (index > -1) { 
				this.splice(index, 1); 
		} 
};


function clearKeyGames(ky) {
    $('[id=bgm_h_' + ky+']').removeClass('g_gr_c').addClass('g_gr_n');
    $('[id=bgm_h_' + ky+']').find('span.g_home_o').removeClass('g_home_o').addClass('g_home_n');
    $('[id=bgm_h_' + ky+']').find('span.g_home_odd_o').removeClass('g_home_odd_o').addClass('g_home_odd_n');
    $('[id=bgm_v_' + ky+']').removeClass('g_gr_c').addClass('g_gr_n');
    $('[id=bgm_v_' + ky+']').find('span.g_away_o').removeClass('g_away_o').addClass('g_away_n');
    $('[id=bgm_v_' + ky+']').find('span.g_away_odd_o').removeClass('g_away_odd_o').addClass('g_away_odd_n');
    $('[id=bgm_m_' + ky+']').removeClass('g_gr_c').addClass('g_gr_n');
    $('[id=bgm_m_' + ky+']').find('span.g_odd_o').removeClass('g_odd_o').addClass('g_odd_n');	

}

function toggleClickClass(ky, typ) {
	console.log("aaa");
    if (typ == 1) {
        if ($('[id=bgm_h_' + ky+']').hasClass('g_gr_c')) {clearKeyGames(ky);}else {
            clearKeyGames(ky);
            $('[id=bgm_h_' + ky+']').removeClass('g_gr_n').removeClass('g_gr_o').addClass('g_gr_c');
            $('[id=bgm_h_' + ky+']').find('span.g_home_n').removeClass('g_home_n').addClass('g_home_o');
            $('[id=bgm_h_' + ky+']').find('span.g_home_odd_n').removeClass('g_home_odd_n').addClass('g_home_odd_o');
        }
    } else if (typ == 2) {
        if ($('[id=bgm_v_' + ky+']').hasClass('g_gr_c')) {clearKeyGames(ky); }else {
            clearKeyGames(ky);
            $('[id=bgm_v_' + ky+']').removeClass('g_gr_n').removeClass('g_gr_o').addClass('g_gr_c');
            $('[id=bgm_v_' + ky+']').find('span.g_away_n').removeClass('g_away_n').addClass('g_away_o');
            $('[id=bgm_v_' + ky+']').find('span.g_away_odd_n').removeClass('g_away_odd_n').addClass('g_away_odd_o');
        }
    } else if (typ == 3) {
        if ($('[id=bgm_m_' + ky+']').hasClass('g_gr_c')) {clearKeyGames(ky); }else {
            clearKeyGames(ky);
            $('[id=bgm_m_' + ky+']').removeClass('g_gr_n').removeClass('g_gr_o').addClass('g_gr_c');
            $('[id=bgm_m_' + ky+']').find('span.g_odd_n').removeClass('g_odd_n').addClass('g_odd_o');
        }
    }
}
function toggleClickClassSoket(ky, typ) {
    if (typ == 1) {
		$('[id=bgm_h_' + ky+']').each(function(){
            $(this).removeClass('g_gr_n').removeClass('g_gr_o').addClass('g_gr_c');
            $(this).find('span.g_home_n').removeClass('g_home_n').addClass('g_home_o');
            $(this).find('span.g_home_odd_n').removeClass('g_home_odd_n').addClass('g_home_odd_o');		 
		});
        
    } else if (typ == 2) {
		 $('[id=bgm_v_' + ky+']').each(function(){
            $('[id=bgm_v_' + ky+']').removeClass('g_gr_n').removeClass('g_gr_o').addClass('g_gr_c');
            $('[id=bgm_v_' + ky+']').find('span.g_away_n').removeClass('g_away_n').addClass('g_away_o');
            $('[id=bgm_v_' + ky+']').find('span.g_away_odd_n').removeClass('g_away_odd_n').addClass('g_away_odd_o');
		 });

    } else if (typ == 3) {
		 $('[id=bgm_m_' + ky+']').each(function(){
            $('[id=bgm_m_' + ky+']').removeClass('g_gr_n').removeClass('g_gr_o').addClass('g_gr_c');
            $('[id=bgm_m_' + ky+']').find('span.g_odd_n').removeClass('g_odd_n').addClass('g_odd_o');
		});
      
    }
}
function toggleMove() {
    if ($('#MoveOff').length > 0) {
        if ($('#MoveOff:checked').length > 0) {
            $('#MoveOff').prop('checked', false);
            $('#tollgeMove').removeClass('hold').addClass('del');
        } else {
            $('#MoveOff').prop('checked', true);
            $('#tollgeMove').removeClass('del').addClass('hold');
        }
    }
}

function rmCartOn(no) {
    rmCart(no);
    showLog();
}

function showLog() {
    $('#picklist').html('');//undefined
    if (cartArr.length > 0) {
        $.each(cartArr, function (k, v) {
            btype = '승무패';
            if(v.dsp2=='H') btype = '핸디';
            if (v.bt == 1) {
                if(v.dsp2=='U') {
                    cteam = '(오버)승';
                } else {
                    cteam = btype + '- (홈)승'; 
                }
            } else if (v.bt == 2) { 
                if(v.dsp2=='U') {
                    cteam = '(언더)승';
                } else {
                    cteam = btype + '- (홈)패'; 
                }
            } else {
                cteam = btype + '- 무';
            }
            $('#picklist').append('<dl class="bsp_event"><span class="remove"><a href="javascript:rmCartOn(' + k + ');"><i class="iconfont">&#xe64d;</i></a></span><dd><i style="color:#f30">' + v.tn1 + '</i><i style="color:#fff">@ ' + v.drto +'</i><i style="color:#006bfc">'+ v.tn2 + '</i><span></span></dd><dt><span class="checkteam">'+cteam+'</span><span class="checkrate">' + v.rt + '</span></dt></dl>');
        });
		$('#cart_cnt').text(cartArr.length);
    }
    calc();
}

function cartadd(ky, typ, rk) {
    inf = rk.split("@");
    ismine = false;
    if (typ == 1) rto = inf[4]; else if (typ == 2) rto = inf[5]; else rto = inf[6];
    if (parseFloat(rto) <= 1) {
        alert('1.0 이하 배당 경기는 선택이 안됩니다.');
        return;
    }
    t1 = inf[2];
    t2 = inf[3];
    tk = inf[1];
    aif = inf[4] + "_" + inf[5] + "_" + inf[6] + "_" + inf[7] + "_" + inf[0];
    jmk = inf[11];
    dsp = inf[12];
    dsp2 = inf[13];
    drto = $('#bgm_m_' + ky).find('.divd2').text();
    //console.log(inf+' // tk='+tk+'dsp='+dsp);
    lgk = $('#bgm_h_' + ky).attr('ln');

    if (myl < inf[10]) {
        alert(inf[10] + ' 레벨 이상만 배팅이 가능한 경기 입니다.');
        return;
    }
    if (inf[8] == 'Y') {
        if (cartArr.length > 0) {
            hasEvent = false;
            $.each(cartArr, function (k, v) {
                if (v.ev == 'Y' && v.gky != ky) {
                    hasEvent = true;
                    return;
                } else if (v.ev == 'Y' && v.gky == ky) ismine = true;
            });
            if (hasEvent) {
                alert('보너스 경기는 하나만 선택할 수 있습니다.');
                return;
            }
        }
        //if( cartArr.length != inf[9] && ismine == false ){ alert(inf[9]+'폴더 픽하신뒤 선택해 주시기 바랍니다.'); return; }
        //if( cartArr.length < inf[9] && ismine == false ){ alert(inf[9]+'폴더이상 픽하신뒤 선택해 주시기 바랍니다.'); return; }
    }
    //이벤트 포함 여부 체크
    if (cartArr.length > 0) {
        hasEvent = false;
        pol = 0;
        isReduce = false;
        $.each(cartArr, function (k, v) {
            if (v.ev == 'Y') {
                pol = v.evp;
                hasEvent = true;
                return;
            }
        });
        $.each(cartArr, function (k, v) {
            if (v.gky == ky && v.bt == typ) isReduce = true;
        });
        //if( isReduce && hasEvent && cartArr.length-1 <= pol && ismine == false ){ alert(pol+'폴더 보너스가 포함되어 더이상 픽을 줄이실 수 없습니다.'); return; }
        //if( hasEvent && cartArr.length+1 < pol && ismine == false ){ alert(pol+'폴더 보너스가 포함되어 더이상 픽을 줄이실 수 없습니다.'); return; }
    }
    isOk = isOk2 = isOk3 = isOk4 = isOk5 = true;
    if (cartArr.length >= mx_ch_g) {
        $.each(cartArr, function (k, v) {
            if (v.gky == ky) isOk = false;
        });
        if (isOk == true) {
            alert('한번에 배팅 가능한 게임은 ' + mx_ch_g + '개까지 입니다.');
            return;
        }
        isOk = true;
    }
    otname = t1;
	owname = t2;
    if (otname.indexOf('[') == 0) {
        tx = otname.split("]");
        otname = $.trim(tx[1]);
    } else if (otname.indexOf('(') == 0) {
        tx = otname.split(")");
        otname = $.trim(tx[1]);
    }
    if (otname.indexOf('[') > 0) {
        tx = otname.split("[");
        otname = $.trim(tx[0]);
    } else if (otname.indexOf('(') > 0) {
        tx = otname.split("(");
        otname = $.trim(tx[0]);
    } else otname = $.trim(otname);
	
	if (owname.indexOf('[') == 0) {
        tx = owname.split("]");
        owname = $.trim(tx[1]);
    } else if (owname.indexOf('(') == 0) {
        tx = owname.split(")");
        owname = $.trim(tx[1]);
    }
    if (owname.indexOf('[') > 0) {
        tx = owname.split("[");
        owname = $.trim(tx[0]);
    } else if (owname.indexOf('(') > 0) {
        tx = owname.split("(");
        owname = $.trim(tx[0]);
    } else owname = $.trim(owname);
	
    if (cartArr.length > 0) {
        if (tk == 'D' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
            });
        }
        if (tk == 'H') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S' && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 승무와 핸디를 동시에 픽하실 수 없습니다1.');
            return;
        }
        //크로스 같은경기 1인 언더/오버
        /*
        * lgk 리그명
        * v.lgi 리그명
        * */
        if (tk == 'D2' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
            });
        }
        if (tk == 'U') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S') isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 1이닝 언더오버를 동시에 픽하실 수 없습니다.');
            return;
        }
        // 크로스 같은경기 첫홈럼 승무패
        /*
        * lgk 리그명
        * v.lgi 리그명
        * */
        if (tk == 'D5' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                //console.log(v.tk+'//'+v.tt+'//'+otname+'//'+v.gky+'//'+ky+'//'+lgk+'//'+v.lgk);
                if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
            });
        }
        if (tk == 'D') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D5' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S') isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 첫홈런 승무패를 동시에 픽하실 수 없습니다.');
            return;
        }
        if (tk == 'D5' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                //console.log(v.tk+'//'+v.tt+'//'+otname+'//'+v.gky+'//'+ky+'//'+lgk+'//'+v.lgk);
                if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
            });
        }
        if (tk == 'H') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D5' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S') isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 첫홈런 핸디는 동시에 픽하실 수 없습니다.');
            return;
        }
        /*if (tk == 'D2' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
            });
        }
        if (tk == 'D2') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S') isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 이닝은 동시에 픽하실 수 없습니다.');
            return;
        }*/

        if (tk == 'D9' && dsp == 'D') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'H' && lgk == v.lgk) isOk = false;
            });
        }
        if (tk == 'D2' && dsp == 'H') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D9' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'D' && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('첫볼넷 핸디는 동시에 픽하실 수 없습니다.');
            return;
        }


        if (tk == 'H') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 핸디끼리는 동시에 픽하실 수 없습니다.');
            return;
        }
        if (tk == 'U') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 언오버끼리는 동시에 픽하실 수 없습니다.');
            return;
        }
        if (tk == 'D' && dsp == 'S') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
            });
        }
        if (tk == 'U') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'S' && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('스페셜 승무와 언오버를 동시에 픽하실 수 없습니다.');
            return;
        }
        if ($('#bgm_h_' + ky).attr('jj') == 'jong_2') {
            if(dsp == 'L'){
                if (tk == 'D') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'U' && v.dsp == 'L' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                } else if (tk == 'U' && dsp == 'L') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                }
                if (isOk === false) {
                    alert('야구 라이브 같은경기 동시에 픽하실 수 없습니다.');
                    return;
                }
                if (tk == 'D') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'D' && v.dsp == 'L' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                } else if (tk == 'D' && dsp == 'L') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                }
                if (isOk === false) {
                    alert('야구 라이브 같은경기 동시에 픽하실 수 없습니다.');
                    return;
                }
                if (tk == 'H') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'U' && v.dsp == 'L' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                } else if (tk == 'H' && dsp == 'L') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                }
                if (isOk === false) {
                    alert('야구 라이브 같은경기 동시에 픽하실 수 없습니다.');
                    return;
                }
                if (tk == 'U') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'H' && v.dsp == 'L' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                } else if (tk == 'U' && dsp == 'L') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                }
                if (isOk === false) {
                    alert('야구 라이브 같은경기 동시에 픽하실 수 없습니다.');
                    return;
                }
            }
			if (tk == 'D2') {
            	$.each(cartArr, function (k, v) {
                    if (v.tk == 'D9' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
           	}
			if (tk == 'D9') {
            	$.each(cartArr, function (k, v) {
                	if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
           	}
            if (isOk === false) {
            	alert('야구 같은경기 첫볼넷과 이닝경기는 동시에 픽하실 수 없습니다.');
                return;
            }
        }
		
        if ($('#bgm_h_' + ky).attr('jj') == 'jong_1') {
            //if( tk == 'D' ){ $.each( cartArr, function(k,v){ if( v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk==v.lgk ) isOk = false;  }); }
            //else if( tk == 'U' ){ $.each( cartArr, function(k,v){ if( v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk==v.lgk ) isOk = false; }); }
            //if( isOk === false ){	alert('같은경기의 승무와 언오버를 동시에 픽하실 수 없습니다.');	return;	}			
            if (tk == 'D') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.dsp != 'S' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            } else if (tk == 'U' && dsp != 'S') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 승무와 언오버를 동시에 픽하실 수 없습니다1.');
                return;
            }
            if (tk == 'D' && dsp == 'S') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'D' && dsp == 'D') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'S' && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('승무와 스페셜 승무를 동시에 픽하실 수 없습니다.');
                return;
            }
            if (tk == 'D' && dsp == 'S') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'H') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'S' && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('핸디와 스페셜 승무를 동시에 픽하실 수 없습니다.');
                return;
            }
            if (tk == 'H') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.dsp != 'S' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            } else if (tk == 'U' && dsp != 'S') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 핸디와 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
            //if( tk == 'D' && lgk == 'leag_B2052' && typ == 2 ){ $.each( cartArr, function(k,v){ if( v.tk == 'D' && v.gky != ky && v.typ == 3 ) isOk = false;  }); }
            //else if( tk == 'D' && typ == 3 ){ $.each( cartArr, function(k,v){ if( v.tk == 'D' && v.gky != ky && v.lgk == 'leag_B2052' && v.typ == 2 ) isOk = false; }); }
            //if( isOk === false ){	alert('스코어홀짝 경기는 무와 동시에 픽하실 수 없습니다.');	return;	}
        }
		if ($('#bgm_h_' + ky).attr('jj') == 'jong_9') {
			if (tk == 'D') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'U') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('스페셜 승무와 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
            if (isOk === false) {
                alert('같은경기의 언오버끼리는 동시에 픽하실 수 없습니다.');
                return;
            }
            if (tk == 'H') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            else if (tk == 'U') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 핸디와 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
		}
        if ($('#bgm_h_' + ky).attr('jj') == 'jong_3') {
            /***
            console.log(tk+"==="+dsp+" "+otname+" "+owname+" "+ky+" "+lgk);
            if (tk == 'D' && dsp == 'D') {
                //console.log(ky + '//'+ typ + '//' + rk+'//' + dsp);
                $.each(cartArr, function (k, v) {                    
                    if (v.tk == 'D4' && v.dsp == 'D4' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
            }            
            if (tk == 'D4' && dsp == 'D4') {
                $.each(cartArr, function (k, v) {
                    console.log(v.tk+"==="+v.dsp+" "+v.tt+" "+v.tw+" "+v.gky+" "+v.lgk);
                    if (v.tk == 'D' && v.dsp == 'D' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 첫7득점과 승무패를 동시에 픽하실 수 없습니다.');
                return;
            }
            ***/
            if (tk == 'D') {               
                $.each(cartArr, function (k, v) {                    
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
            }                        
            if (isOk === false) {
                alert('같은경기의 승무패와 승무패를 동시에 픽하실 수 없습니다.');
                return;
            }

            if (tk == 'H') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
            }
            else if (tk == 'D') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 핸디와 승무패를 동시에 픽하실 수 없습니다.');
                return;
            }
        }
        if ($('#bgm_h_' + ky).attr('jj') == 'jong_5') {
            if (tk == 'D' && dsp == 'D') {
                //console.log(ky + '//'+ typ + '//' + rk+'//' + dsp);
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky  && v.dsp == 'U' && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'U' && dsp == 'U') {
                $.each(cartArr, function (k, v) {
                    console.log(v);
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'D' && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 승무패와 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
            if (tk == 'D' && dsp == 'D' && typ == 3) {
                //console.log(ky + '//'+ typ + '//' + rk+'//' + dsp);
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'U') {
                $.each(cartArr, function (k, v) {
                    console.log(v);
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'D' && v.bt== 3 && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 무 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
        }
    }
    toggleClickClass(ky, typ);
    if (cartArr.length == 0) cartArr.push({
        "gky": ky,
        "bt": typ,
        "tn1": t1,
        "tn2": t2,
        "rt": rto,
        "rt2": aif,
        "tk": tk,
        "rto": rto,
        "ev": inf[8],
        "evp": inf[9],
        "tt": otname,
		"tw": owname,
        "jmk": jmk,
        "dsp": dsp,
		"dsp2": dsp2,
        "drto": drto,
        "lgk": lgk
    });
    else {
        nEntry = -1;
        if (cartArr.length == 1 && cartArr[0]["gky"] == ky) {
            nEntry = 0;
        } else {
            $.each(cartArr, function (k, v) {
                if (v.gky == ky) nEntry = k;
            });
        }
        if (nEntry >= 0) {
            if (typ == cartArr[nEntry]["bt"]) cartArr.splice(nEntry, 1);
            else {
                cartArr[nEntry]["gky"] = ky;
                cartArr[nEntry]["bt"] = typ;
                cartArr[nEntry]["rt"] = rto;
                cartArr[nEntry]["rto"] = rto;
            }
        } else
            cartArr.push({
                "gky": ky,
                "bt": typ,
                "tn1": t1,
                "tn2": t2,
                "rt": rto,
                "rt2": aif,
                "tk": tk,
                "rto": rto,
                "ev": inf[8],
                "evp": inf[9],
                "tt": otname,
				"tw": owname,
                "jmk": jmk,
                "dsp": dsp,
				"dsp2": dsp2,
                "drto": drto,
                "lgk": lgk
            });
    }
    max_rst_f = max_rst;
    max_amt_f = max_amt;
    if ($('#bb_gt').val() == 'D') {
        allSpe = true;
        allHdy = true;
        $.each(cartArr, function (k, v) {
            if (v.dsp != 'S') allSpe = false;
            if (v.dsp != 'H') allHdy = false;
        });
        if (allSpe) $('#max_money_tmp').text(max_amt_s.format());
        else if (allHdy) $('#max_money_tmp').text(max_amt_h.format());
        else $('#max_money_tmp').text(max_amt.format());
    }
    //if( $('#bb_gt').val() != 'S' ){ allSpe = true; $.each( cartArr, function(k,v){ if( v.dsp!='S' ) allSpe = false; }); if( allSpe ) $('#max_money_tmp').text( max_amt_s.format() ); else $('#max_money_tmp').text( max_amt.format() ); }
    showLog();
}

function clearKeyGames_m(ky) {
    $('#bgm_h_' + ky).attr('class', 'g_home g_gr_n');
    $('#bgm_h_' + ky + ' span.g_home_o').attr('class', 'g_home_n name');
    $('#bgm_h_' + ky + ' span.g_home_odd_o').attr('class', 'g_home_odd_n divd');
    $('#bgm_v_' + ky).attr('class', 'g_away g_gr_n');
    $('#bgm_v_' + ky + ' span.g_away_o').attr('class', 'g_away_n name');
    $('#bgm_v_' + ky + ' span.g_away_odd_o').attr('class', 'g_away_odd_n divd');
    $('#bgm_m_' + ky).attr('class', 'g_odd g_gr_n');
    $('#bgm_m_' + ky + ' span.g_odd_o').attr('class', 'g_odd_n divd2');
}

function toggleClickClass_m(ky, typ) {
    if (typ == 1) {
        if ($('#bgm_h_' + ky).hasClass('g_gr_c')) clearKeyGames_m(ky); else {
            clearKeyGames_m(ky);
            $('#bgm_h_' + ky).attr('class', 'g_home_over game_gr_o g_gr_c name');
            $('#bgm_h_' + ky + ' span.g_home_n').attr('class', 'g_home_o name');
            $('#bgm_h_' + ky + ' span.g_home_odd_n').attr('class', 'g_home_odd_o divd');
        }
    } else if (typ == 2) {
        if ($('#bgm_v_' + ky).hasClass('g_gr_c')) clearKeyGames_m(ky); else {
            clearKeyGames_m(ky);
            $('#bgm_v_' + ky).attr('class', 'g_away_over game_gr_o g_gr_c name');
            $('#bgm_v_' + ky + ' span.g_away_n').attr('class', 'g_away_o name');
            $('#bgm_v_' + ky + ' span.g_away_odd_n').attr('class', 'g_away_odd_o divd');
        }
    } else if (typ == 3) {
        if ($('#bgm_m_' + ky).hasClass('g_gr_c')) clearKeyGames_m(ky); else {
            clearKeyGames_m(ky);
            $('#bgm_m_' + ky).attr('class', 'g_odd_over game_gr_o g_gr_c');
            $('#bgm_m_' + ky + ' span.g_odd_n').attr('class', 'g_odd_o divd2');
        }
    }
}

function cartadd_m(ky, typ, rk) {
    inf = rk.split("@");
    ismine = false;
    if (typ == 1) rto = inf[4]; else if (typ == 2) rto = inf[5]; else rto = inf[6];
    if (parseFloat(rto) <= 1) {
        alert('1.0 이하 배당 경기는 선택이 안됩니다.');
        return;
    }
    t1 = inf[2];
    t2 = inf[3];
    tk = inf[1];
    aif = inf[4] + "_" + inf[5] + "_" + inf[6] + "_" + inf[7] + "_" + inf[0];
    jmk = inf[11];
    dsp = inf[12];
    lgk = $('#bgm_h_' + ky).attr('ln');
    if (myl < inf[10]) {
        alert(inf[10] + ' 레벨 이상만 배팅이 가능한 경기 입니다.');
        return;
    }
    if (inf[8] == 'Y') {
        if (cartArr.length > 0) {
            hasEvent = false;
            $.each(cartArr, function (k, v) {
                if (v.ev == 'Y' && v.gky != ky) {
                    hasEvent = true;
                    return;
                } else if (v.ev == 'Y' && v.gky == ky) ismine = true;
            });
            if (hasEvent) {
                alert('보너스 경기는 하나만 선택할 수 있습니다.');
                return;
            }
        }
        //if( cartArr.length != inf[9] && ismine == false ){ alert(inf[9]+'폴더 픽하신뒤 선택해 주시기 바랍니다.'); return; }
        //if( cartArr.length < inf[9] && ismine == false ){ alert(inf[9]+'폴더이상 픽하신뒤 선택해 주시기 바랍니다.'); return; }
    }
    //이벤트 포함 여부 체크
    if (cartArr.length > 0) {
        hasEvent = false;
        pol = 0;
        isReduce = false;
        $.each(cartArr, function (k, v) {
            if (v.ev == 'Y') {
                pol = v.evp;
                hasEvent = true;
                return;
            }
        });
        $.each(cartArr, function (k, v) {
            if (v.gky == ky && v.bt == typ) isReduce = true;
        });
        if (isReduce && hasEvent && cartArr.length - 1 <= pol && ismine == false) {
            alert(pol + '폴더 보너스가 포함되어 더이상 픽을 줄이실 수 없습니다.');
            return;
        }
        //if( hasEvent && cartArr.length+1 < pol && ismine == false ){ alert(pol+'폴더 보너스가 포함되어 더이상 픽을 줄이실 수 없습니다.'); return; }
    }
    isOk = true;
    isOk2 = true;
    isOk3 = true;
    if (cartArr.length >= mx_ch_g) {
        $.each(cartArr, function (k, v) {
            if (v.gky == ky) isOk = false;
        });
        if (isOk == true) {
            alert('한번에 배팅 가능한 게임은 ' + mx_ch_g + '개까지 입니다.');
            return;
        }
        isOk = true;
    }
    otname = t1;
	owname = t2;
	
    if (otname.indexOf('[') == 0) {
        tx = otname.split("]");
        otname = $.trim(tx[1]);
    } else if (otname.indexOf('(') == 0) {
        tx = otname.split(")");
        otname = $.trim(tx[1]);
    }
    if (otname.indexOf('[') > 0) {
        tx = otname.split("[");
        otname = $.trim(tx[0]);
    } else if (otname.indexOf('(') > 0) {
        tx = otname.split("(");
        otname = $.trim(tx[0]);
    } else otname = $.trim(otname);
	
	if (owname.indexOf('[') == 0) {
        tx = owname.split("]");
        owname = $.trim(tx[1]);
    } else if (owname.indexOf('(') == 0) {
        tx = owname.split(")");
        owname = $.trim(tx[1]);
    }
    if (owname.indexOf('[') > 0) {
        tx = owname.split("[");
        owname = $.trim(tx[0]);
    } else if (owname.indexOf('(') > 0) {
        tx = owname.split("(");
        owname = $.trim(tx[0]);
    } else owname = $.trim(owname);
	
    if (cartArr.length > 0) {
        if (tk == 'D' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
            });
        }
        if (tk == 'H') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S' && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 승무와 핸디를 동시에 픽하실 수 없습니다.');
            return;
        }
        //크로스 같은경기 1인 언더/오버
        /*
        * lgk 리그명
        * v.lgi 리그명
        * */
        //console.log(tk+'//'+dsp);
        if (tk == 'D1' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                //console.log(tk+'//'+v.tk+'//'+v.tt+'//'+otname+'//'+v.gky+'//'+ky+'//'+dsp);
                if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
            });
        }
        if (tk == 'U') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D1' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S') isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 1이닝 언더오버를 동시에 픽하실 수 없습니다.');
            return;
        }
        // 크로스 같은경기 첫홈럼 승무패
        /*
        * lgk 리그명
        * v.lgi 리그명
        * */
        if (tk == 'D5' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                //console.log(v.tk+'//'+v.tt+'//'+otname+'//'+v.gky+'//'+ky+'//'+lgk+'//'+v.lgk);
                if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
            });
        }
        if (tk == 'D') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D5' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S') isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 첫홈런 승무패를 동시에 픽하실 수 없습니다.');
            return;
        }
        if (tk == 'D5' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                //console.log(v.tk+'//'+v.tt+'//'+otname+'//'+v.gky+'//'+ky+'//'+lgk+'//'+v.lgk);
                if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
            });
        }
        if (tk == 'H') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D5' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S') isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 첫홈런 핸디는 동시에 픽하실 수 없습니다.');
            return;
        }
        /*if (tk == 'D2' && dsp != 'S') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
            });
        }
        if (tk == 'D2') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp != 'S') isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 이닝은 동시에 픽하실 수 없습니다.');
            return;
        }*/

        if (tk == 'D9' && dsp == 'D') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'H' && lgk == v.lgk) isOk = false;
            });
        }
        if (tk == 'D2' && dsp == 'H') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D9' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'D' && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('첫볼넷 핸디는 동시에 픽하실 수 없습니다.');
            return;
        }

        if (tk == 'H') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 핸디끼리는 동시에 픽하실 수 없습니다.');
            return;
        }
        if (tk == 'U') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('같은경기의 언오버끼리는 동시에 픽하실 수 없습니다.');
            return;
        }
        if (tk == 'D' && dsp == 'S') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
            });
        }
        if (tk == 'U') {
            $.each(cartArr, function (k, v) {
                if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'S' && lgk == v.lgk) isOk = false;
            });
        }
        if (isOk === false) {
            alert('스페셜 승무와 언오버를 동시에 픽하실 수 없습니다.');
            return;
        }

        if ($('#bgm_h_' + ky).attr('jj') == 'jong_2') {
            if(dsp == 'L'){
                if (tk == 'D') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'U' && v.dsp == 'L' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                } else if (tk == 'U' && dsp == 'L') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                }
                if (isOk === false) {
                    alert('야구 라이브 같은경기 동시에 픽하실 수 없습니다.');
                    return;
                }
                if (tk == 'D') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'D' && v.dsp == 'L' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                } else if (tk == 'D' && dsp == 'L') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                }
                if (isOk === false) {
                    alert('야구 라이브 같은경기 동시에 픽하실 수 없습니다.');
                    return;
                }
                if (tk == 'H') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'U' && v.dsp == 'L' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                } else if (tk == 'H' && dsp == 'L') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                }
                if (isOk === false) {
                    alert('야구 라이브 같은경기 동시에 픽하실 수 없습니다.');
                    return;
                }
                if (tk == 'U') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'H' && v.dsp == 'L' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                } else if (tk == 'U' && dsp == 'L') {
                    $.each(cartArr, function (k, v) {
                        if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                    });
                }
                if (isOk === false) {
                    alert('야구 라이브 같은경기 동시에 픽하실 수 없습니다.');
                    return;
                }
            }
			if (tk == 'D2') {
            	$.each(cartArr, function (k, v) {
                    if (v.tk == 'D9' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
           	}
			if (tk == 'D9') {
            	$.each(cartArr, function (k, v) {
                	if (v.tk == 'D2' && v.tt == otname && v.tw == owname && v.gky != ky) isOk = false;
                });
           	}
            if (isOk === false) {
            	alert('야구 같은경기 첫볼넷과 이닝경기는 동시에 픽하실 수 없습니다.');
                return;
            }
        }
		if ($('#bgm_h_' + ky).attr('jj') == 'jong_9') {
			if (tk == 'D') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'U') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('스페셜 승무와 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
            if (isOk === false) {
                alert('같은경기의 언오버끼리는 동시에 픽하실 수 없습니다.');
                return;
            }
            if (tk == 'H') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            else if (tk == 'U') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 핸디와 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
		}
        if ($('#bgm_h_' + ky).attr('jj') == 'jong_1') {
            //if( tk == 'D' ){ $.each( cartArr, function(k,v){ if( v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk==v.lgk ) isOk3 = false;  }); }
            //else if( tk == 'U' ){ $.each( cartArr, function(k,v){ if( v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk==v.lgk ) isOk3 = false; }); }
            //if( isOk3 === false ){	alert('같은경기의 승무와 언오버를 동시에 픽하실 수 없습니다.');	return;	}
            if (tk == 'D') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.dsp != 'S' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            } else if (tk == 'U' && dsp != 'S') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 승무와 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
            if (tk == 'D' && dsp == 'S') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'D' && dsp == 'D') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'S' && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('승무와 스페셜 승무를 동시에 픽하실 수 없습니다.');
                return;
            }
            if (tk == 'D' && dsp == 'S') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'H') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'S' && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('핸디와 스페셜 승무를 동시에 픽하실 수 없습니다.');
                return;
            }
            if (tk == 'H') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.dsp != 'S' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            } else if (tk == 'U' && dsp != 'S') {
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'H' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 핸디와 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
            //if( tk == 'D' && lgk == 'leag_B2052' && typ == 2 ){ $.each( cartArr, function(k,v){ if( v.tk == 'D' && v.gky != ky && v.typ == 3 ) isOk = false;  }); }
            //else if( tk == 'D' && typ == 3 ){ $.each( cartArr, function(k,v){ if( v.tk == 'D' && v.gky != ky && v.lgk == 'leag_B2052' && v.typ == 2 ) isOk = false; }); }
            //if( isOk === false ){	alert('스코어홀짝 경기는 무와 동시에 픽하실 수 없습니다.');	return;	}
        }
        if ($('#bgm_h_' + ky).attr('jj') == 'jong_5') {
            if (tk == 'D' && dsp == 'D' && typ == 3) {
                //console.log(ky + '//'+ typ + '//' + rk+'//' + dsp);
                $.each(cartArr, function (k, v) {
                    if (v.tk == 'U' && v.tt == otname && v.tw == owname && v.gky != ky && lgk == v.lgk) isOk = false;
                });
            }
            if (tk == 'U') {
                $.each(cartArr, function (k, v) {
                    console.log(v);
                    if (v.tk == 'D' && v.tt == otname && v.tw == owname && v.gky != ky && v.dsp == 'D' && v.bt== 3 && lgk == v.lgk) isOk = false;
                });
            }
            if (isOk === false) {
                alert('같은경기의 무 언오버를 동시에 픽하실 수 없습니다.');
                return;
            }
        }
    }
    toggleClickClass(ky, typ);
    if (cartArr.length == 0) cartArr.push({
        "gky": ky,
        "bt": typ,
        "tn1": t1,
        "tn2": t2,
        "rt": rto,
        "rt2": aif,
        "tk": tk,
        "rto": rto,
        "ev": inf[8],
        "evp": inf[9],
        "tt": otname,
		"tw": owname,
        "jmk": jmk,
        "dsp": dsp,
		 "bt_type_name": inf[13],	
        "lgk": lgk
    });
    else {
        nEntry = -1;
        if (cartArr.length == 1 && cartArr[0]["gky"] == ky) {
            nEntry = 0;
        } else {
            $.each(cartArr, function (k, v) {
                if (v.gky == ky) nEntry = k;
            });
        }
        if (nEntry >= 0) {
            if (typ == cartArr[nEntry]["bt"]) cartArr.splice(nEntry, 1);
            else {
                cartArr[nEntry]["gky"] = ky;
                cartArr[nEntry]["bt"] = typ;
                cartArr[nEntry]["rt"] = rto;
                cartArr[nEntry]["rto"] = rto;
            }
        } else
            cartArr.push({
                "gky": ky,
                "bt": typ,
                "tn1": t1,
                "tn2": t2,
                "rt": rto,
                "rt2": aif,
                "tk": tk,
                "rto": rto,
                "ev": inf[8],
                "evp": inf[9],
                "tt": otname,
				"tw": owname,
                "jmk": jmk,
                "dsp": dsp,
				"bt_type_name": inf[13],
                "lgk": lgk
            });
    }
    if ($('#bb_gt').val() == 'D') {
        allSpe = true;
        allHdy = true;
        $.each(cartArr, function (k, v) {
            if (v.dsp != 'S') allSpe = false;
            if (v.dsp != 'H') allHdy = false;
        });
        if (allSpe) $('#max_money_tmp').text(max_amt_s.format());
        else if (allHdy) $('#max_money_tmp').text(max_amt_h.format());
        else $('#max_money_tmp').text(max_amt.format());
    }
    //if( $('#bb_gt').val() != 'S' ){ allSpe = true; $.each( cartArr, function(k,v){ if( v.dsp!='S' ) allSpe = false; }); if( allSpe ) $('#max_money_tmp').text( max_amt_s.format() ); else $('#max_money_tmp').text( max_amt.format() ); }
    showLog_m();
}

function showLog_m() {
    //console.log(cartArr);
    $('#picklist').html('');
    if (cartArr.length > 0) {
        $.each(cartArr, function (k, v) {
            if (v.bt == 1) cteam = '(홈)승'; else if (v.bt == 2) cteam = '(홈)패'; else cteam = '무';
            $('#picklist').append('<li class="crt_gm"><p><span class="tm">' + v.tn1 + '</span> <a href="javascript:rmCartOn(' + k + ');" class="icon_set del iconfont">&#xe61a;</a></p><p><span class="tm cho">' + v.tn2 + '</span> <span class="odd"><i class="wol">' + cteam + '</i>@ ' + v.rt + '</span></p></li>');
			//$('#picklist').append('<dl class="bsp_event"><span class="remove"><i class="iconfont">&#xe64d;</i></span><dd><span>Cimarrones Sonora vs Tampico Madero</span><span>승무패 [ 연장미포함 ]</span></dd><dt><span class="checkteam">Tampico Madero</span><span class="checkrate">3.15</span></dt></dl>');
        });
		$('#cart_cnt').text(cartArr.length);
    }
    calc();
}

function rmCartOn_m(no) {
    rmCart_m(no);
    showLog_m();
}

function rmCart_m(ky) {
    toggleClickClass_m(cartArr[ky]["gky"], cartArr[ky]["bt"]);
    cartArr.splice(ky, 1);
    showLog_m();
}

function clearAll_m() {
    $('li.g_home_over').attr('class', 'g_home g_gr_n');
    $('span.g_home_o').attr('class', 'g_home_n');
    $('span.g_home_odd_o').attr('class', 'g_home_odd_n');
    $('li.g_away_over').attr('class', 'g_away g_gr_n');
    $('span.g_away_o').attr('class', 'g_away_n');
    $('span.g_away_odd_o').attr('class', 'g_away_odd_n');
    $('li.g_odd_over').attr('class', 'g_odd g_gr_n').find('span.g_odd_o').attr('class', 'g_odd_n');
    cartArr = new Array();
    showLog_m();
}

function maxCalc2() {
    if (typeof max_rst != 'undefined') {
        curAmt = Math.floor(max_rst / sumRati);
        aa = Math.floor(curAmt / 100);
        aa *= 100;
        if (aa > max_amt) aa = max_amt;
        $('#maxBShow').text(aa.format());
    }
}

function flashShow(url, w, h, id, bg, win) {
    domain = document.URL;
    parse = domain.split("/");
    loc = parse[3];
    loc_par = '';
    switch (loc) {
        case"Company":
            loc_par = '1';
            break;
        case"Glyco":
            loc_par = '2';
            break;
        case"Community":
            loc_par = '3';
            break;
        case"Data":
            loc_par = '4';
            break;
        case"Customer":
            loc_par = '5';
            break;
        case"MyOffice":
            loc_par = '6';
            break;
    }
    var flashStr = "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='../../fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0/#version=8,0,0,0/default.htm' width='" + w + "' height='" + h + "' id='" + id + "' align='middle'>" + "<param name='movie' value='" + url + "' />" + "<param name='menu' value='false' />" + "<param name='quality' value='high' />" + "<param name='wmode' value='transparent' />" + "<param name='FlashVars' value='main=" + loc_par + "&'>" + "<embed src='" + url + "' menu='false' wmode='transparent' quality='high' width='" + w + "' height='" + h + "' name='" + id + "' align='middle' type='application/x-shockwave-flash' pluginspage='../../www.macromedia.com/go/getflashplayer' />" + "</object>";
    document.write(flashStr);
}

function Flash(id, iWith, iHeight, strFileUrl, bId, fmode, bgcolor) {
    var NaviType = navigator.appName;
    if (NaviType == "Netscape") {
        document.write("<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"../../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\" width=\"" + iWith + "\" height=\"" + iHeight + "\" align=\"middle\">");
        if (id != "loveChatApp") {
            document.write("<param name=\"wmode\" value=\"transparent\">");
        }
        document.write("<param name=\"allowScriptAccess\" value=\"sameDomain\" />");
        document.write("<param name=\"movie\" value=\"" + strFileUrl + "?" + fmode + "\" id=\"" + id + "\"/>");
        document.write("<param name=\"quality\" value=\"high\" />");
        if (bgcolor != "") {
            document.write("<param name=\"bgcolor\" value=\"" + bgcolor + "\">");
        }
        document.write("<embed src=\"" + strFileUrl + "?" + fmode + "\" quality=\"high\" wmode=\"transparent\" width=\"" + iWith + "\" height=\"" + iHeight + "\" name=\"" + bId + "\" id=\"" + id + "\" align=\"middle\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"../../www.macromedia.com/go/getflashplayer\" />");
        document.write("</object>");
    } else {
        var str = "";
        str += "<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"../../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\" width=\"" + iWith + "\" height=\"" + iHeight + "\" id=\"" + id + "\" name=\"" + bId + "\">";
        if (fmode != "") {
            str += "<param name=\"flashvars\" value=\"" + fmode + "\">";
        }
        if (id != "loveChatApp") {
            str += "<param name=\"wmode\" value=\"transparent\">";
        }
        str += "<param name=\"allowScriptAccess\" value=\"sameDomain\">";
        str += "<param name=\"movie\" value=\"" + strFileUrl + "\">";
        str += "<param name=\"quality\" value=\"high\">";
        if (bgcolor != "") {
            str += "<param name=\"bgcolor\" value=\"" + bgcolor + "\">";
        }
        str += "<embed src=\"" + strFileUrl + "?" + fmode + "\" quality=\"high\" wmode=\"transparent\" pluginspage=\"../../www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"" + iWith + "\" height=\"" + iHeight + "\" id=\"" + id + "\"></embed>";
        str += "</object>";
        document.write(str);
    }
}

function UseCouponSet() {
    if (document.getElementById('UseCoupon').checked == true) {
        document.getElementById('Coupon').disabled = false;
    } else {
        document.getElementById('Coupon').disabled = true;
    }
    CouponApply();
}