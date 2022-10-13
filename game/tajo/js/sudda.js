var inter = null;
var left_time = 0;
var str_left_time = "";
var refresh_time = 0;
var bCount = false;
var type = "sudda";
var kind = "";
var bet_key = 0;
var checked_bet = null;
var rate = 0;
var result = "진행중";

$(document).ready(function () {
    if ($(".clspager td table tr td:last a").html() == "...")
        $(".clspager td table tr td:last a").html("다음");


    if ($(".clspager td table tr td:first a").html() == "...")
        $(".clspager td table tr td:first a").html("이전");

    //window.onbeforeunload = function () {
    //    console.log('event');
    //    $.ajax({
    //        url: '/doLogout.aspx',
    //        type: 'GET',
    //        dataType: 'json',
    //        data: {},
    ////        success: function (data, textStatus, jqXHR) {

    ////        },
    ////        error: function (jqXHR, textStatus, errorThrown) {
    ////        }
    ////    });
    ////    return false; //here also can be string, that will be shown to the user
    //}
});


function hidePopup() {
    $('#cartpopup').popup('hide');
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


$(document).ready(function () {
    init();
});

function init() {
    // getUserInfo();
    // setInterval(getUserInfo, 3000);
    getGameInfo(type);

    //$(".hover").mouseleave(function () {
    //    $(this).removeClass("hover");
    //});

    $(".str_bet_rate").text("0.00");
    $(".str_pre_money").text("0");
    $(".str_bet_money").text("0");
    $("#block").hide();
    bCount = false;
    clearInterval(inter);
    inter = null;
}

var odds = {
    aeven: 1.95,
    aodd: 1.95,
    adown: 1.95,
    aup: 1.95,
    peven: 1.95,
    podd: 1.95,
    pdown: 1.95,
    pup: 1.95,
    ahdown: 3.7,
    ahup: 3.7,
    ajdown: 3.7,
    ajup: 3.7,
    phdown: 4.12,
    phup: 3.02,
    pjdown: 3.02,
    pjup: 4.12
}

var bet = {
    kind: "",
    gameType: 0,
    value: 0,
    odds: 0,
    amount: 0,
    round: "",
    result: "진행중"
};

function getGameInfo(t) {
    var d = new Date();
    type = t;
    resetMoneyBet();
    $.ajax({
        url: './game_info.php',
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (data, textStatus, jqXHR) {
            // console.log(data);
            if(data.result == "fail") {
                //ShowToast("error", "실패", data.msg);
                //$("#contents_wrap").css("display", "none");
            }
            $("#user_point").html(insertComma(data.user_point));
            $("#game_round").html(data.round);
            //$("#day_round").html(" (" + data.day_round + ")");

            $(".min_bet_cost").html(insertComma(data.min_bet_amounts));
            $(".max_bet_cost").html(insertComma(data.max_bet_amounts));

            if(data.disableDraw) {
                $("#drawBetting").addClass("isDisabled");
                $("#holJakBetting").addClass("isDisabled");
            }
            if(!data.disableDraw) {
                $("#drawBetting").removeClass("isDisabled");
                $("#holJakBetting").removeClass("isDisabled");
            }
            odds = {
                aeven: data.aeven,
                aodd: data.aodd,
                adown: data.adown,
                aup: data.aup,
                peven: data.peven,
                podd: data.podd,
                pdown: data.pdown,
                pup: data.pup,
	     ahdown: data.ahdown,
                ahup: data.ahup,
                ajdown: data.ajdown,
                ajup: data.ajup,
                phdown: data.phdown,
                phup: data.phup,
                pjdown: data.pjdown,
                pjup: data.pjup,
	     round: data.round
            }

            Object.keys(odds).forEach(function (key) {
                $(".rate_" + key).html( odds[key].toFixed(2) );
            });

            refresh_time = parseInt(data.left_time);
            left_time = parseInt(data.left_time) - parseInt(data.close_time);

            time_count();
            bCount = true;

            if (inter == null) {
                inter = setInterval(time_count, 1000);
            }

            get_bet_list(data.round, data.day_round);
	 bet.round = data.day_round
	 

        },
        error: function () {
            //$("#contents_wrap").css("display", "none");
        }
    });
}

function time_count() {
    if (bCount == false) return;

    left_time -= 1;
    refresh_time -= 1;

    if (left_time < 0) {
        $("#block").show();
    }

    if (refresh_time < -15) {
        init();
        return;
    }
    mm = Math.floor(refresh_time / 60);
    ss = refresh_time % 60;
    if (ss >= 0 && ss < 10)
        ss = "0" + ss;
    if(mm < 0) {
        mm = 0;
    }
    if(ss < 0) {
        ss = "00";
    }
    if(mm == 00) {
        if(ss == 20) {
        }
    }
    str_left_time = "0" + mm + ":" + ss;
    $("#left_time").html(str_left_time);
}

function get_bet_list(r, r1) {
    var d = new Date();
    $.ajax({
        url: './search_bet_info.php?r=' + r + '&_t=' + d.getTime() + '&game_type=4',
        type: 'GET',
        dataType: 'json',
        data: {},
        success: function (data, textStatus, jqXHR) {
            $(".cart_list1111").html(data.html);
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });

    var tabs = "";
    if (r1 == 1) {
        rl = 289;
    }
    //tabs = "<a href=\"javascript:get_bet_list(" + (parseInt(r) - 1) + "," + (parseInt(r1) - 1) + ");\"><img src=\"./images/cart_arrow_left.png\"></a>";
    //tabs = tabs + "<a href=\"javascript:get_bet_list(" + (parseInt(r) + 1) + "," + (parseInt(r1) + 1) + ");\"><img src=\"./images/cart_arrow_right.png\"></a>";

    $(".arrow").html(tabs);

    var title = "";
    $("#game_round_hist").text(r + " (" + r1 + ")");
}


function check_bet(kind) {
    $("#" + bet.kind).removeClass("po_boxon_blue");
    $("#" + kind).addClass("po_boxon_blue");
    bet.kind = kind;
    bet.odds = odds[kind].toFixed(2);
    $(".str_bet_rate").text(bet.odds);
    var choice = "";
    if (bet.kind == 'peven') {
        choice = "<div class=\"po_color1\">Left</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 1;
        bet.gameType = 1;
    } else if (bet.kind == 'podd') {
        choice = "<div class=\"po_color2\">Right</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 2;
        bet.gameType = 1;
    } else if (bet.kind == 'pdown') {
        choice = "<div class=\"po_color1\">1</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 3;
        bet.gameType = 1;
    } else if (bet.kind == 'pup') {
        choice = "<div class=\"po_color2\">2</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 4;
        bet.gameType = 1;
    } else if (bet.kind == 'aeven') {
        choice = "<div class=\"po_color1\">3</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 5;
        bet.gameType = 1;
    } else if (bet.kind == 'aodd') {
        choice = "<div class=\"po_color2\">4</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 6;
        bet.gameType = 1;
    } else if (bet.kind == 'adown') {
        choice = "<span class=\"cart_list_btn_1\">일반볼</span><div class=\"po_color1\">언더</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 7;
        bet.gameType = 2;
    } else if (bet.kind == 'aup') {
        choice = "<span class=\"cart_list_btn_1\">일반볼</span><div class=\"po_color2\">오버</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 8;
        bet.gameType = 2;
    } else if (bet.kind == 'ahdown') {
        choice = "<span class=\"cart_list_btn_1\">일반볼</span><div class=\"po_color1\">홀언</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 57;
        bet.gameType = 2;
    } else if (bet.kind == 'ahup') {
        choice = "<span class=\"cart_list_btn_1\">일반볼</span><div class=\"po_color1\">홀오</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 58;
        bet.gameType = 2;
    } else if (bet.kind == 'ajdown') {
        choice = "<span class=\"cart_list_btn_1\">일반볼</span><div class=\"po_color2\">짝언</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 67;
        bet.gameType = 2;
    } else if (bet.kind == 'ajup') {
        choice = "<span class=\"cart_list_btn_1\">일반볼</span><div class=\"po_color2\">짝오</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 68;
        bet.gameType = 2;
    } else if (bet.kind == 'phdown') {
        choice = "<span class=\"cart_list_btn_2\">파워볼</span><div class=\"po_color1\">홀언</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 13;
        bet.gameType = 1;
    } else if (bet.kind == 'phup') {
        choice = "<span class=\"cart_list_btn_2\">파워볼</span><div class=\"po_color1\">홀오</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 14;
        bet.gameType = 1;
    } else if (bet.kind == 'pjdown') {
        choice = "<span class=\"cart_list_btn_2\">파워볼</span><div class=\"po_color2\">짝언</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 23;
        bet.gameType = 1;
    } else if (bet.kind == 'pjup') {
        choice = "<span class=\"cart_list_btn_2\">파워볼</span><div class=\"po_color2\">짝오</div><span style=\"color: #98a3ae; float: left\">" + bet.odds + "</span>";
        bet.value = 24;
        bet.gameType = 21
    }
    choice = choice + "<span style=\"float: right\">베팅하기</span>";
    $(".betting_cart").html(choice);
}


function inputAddMoneyBet() {
    //var value = $(obj).val();

    var obj = $(".str_bet_money");
    bet.amount = obj.val() ? obj.val() : 0;
    bet.amount = bet.amount.toString().replace(/,/g, "");
    bet.amount = parseInt(bet.amount, 0);

    if (bet.amount > 0) {
        rate = $(".str_bet_rate").text();
        $(".str_pre_money").text(insertComma((Math.round(rate * bet.amount)).toString()));
    }
}

function addMoneyBet(money) {
    if ($(".betting_max_flag").val() == 1) {
        $(".betting_max_flag").val(0)
    }
    limit_money = $(".max_bet_cost").text().toString().replace(/,/g, "");

    if ((bet.amount + money) > parseInt(limit_money)) {
        ShowToast("error", "베팅 오류", "베팅최대금액을 초과하였습니다.");
        return;
    }

    bet.amount += money;    
    var predic_money = parseInt(bet.amount) * parseFloat(bet.odds);

    $(".str_pre_money").text(insertComma(predic_money.toString()));
    $(".str_bet_money").val(insertComma(bet.amount.toString()));    
}

function addMoneyBetMax() {
    bet.amount = $(".max_bet_cost").text().toString().replace(/,/g, "");    
    var predic_money = parseInt(bet.amount) * parseFloat(bet.odds);

    $(".str_pre_money").text(insertComma(predic_money.toString()));
    $(".str_bet_money").val(insertComma(bet.amount));

    $(".betting_max_flag").val(1);
}

function resetMoneyBet() {
    $(".str_bet_rate").text("0.00");
    $(".str_nmoney").val("");
    $(".str_bet_money").val("0");
    $(".str_pre_money").text("0");
    $(".betting_cart").html("<span style=\"float: right\">베팅하기</span>");
    bet.amount = 0;
}

function Betting() {
    if (parseInt(bet.amount) <= 0) {
        ShowToast("error", "베팅 실패", "베팅금액을 입력하여 주세요.");
        return;
    }

    if (parseFloat(bet.odds) <= 0) {
        ShowToast("error", "베팅 실패", "베팅하실 게임을 선택해주세요");
        return;
    }
    
    if (parseInt(refresh_time) <= 5) {
        ShowToast("error", "베팅 실패", "배팅가능한시간이 아닙니다");
        return;
    }

    $.ajax({
	url: './betting_sudda.php',
        type: 'POST',
        dataType: 'json',
        data: bet,
        success: function (data) {
            {
	     //if ($member['mb_point']  > bet.amount) {
	     //ShowToast("success", "베팅 실패", "베팅금액이 부족합니다");
	     //}else{
                ShowToast("success", "베팅 성공", "베팅이 정상적으로 처리되었습니다");
                getGameInfo();
                //get_bet_list($("#game_round").text(), parseInt($("#day_round").text().replace("(", "").replace(")", "")));
                clearBettingSlip();
	     //}
                if (window.external.text != null) {
                    PrintPow();
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            resetMoneyBet();
            ShowToast("error", jqXHR, errorThrown);
        }
    });
}

function clearBettingSlip() {
    $(".str_bet_rate").text("0.00");
    $(".str_pre_money").text("0");
    $(".str_bet_money").val("0");
    $(".betting_max_flag").val(0);
    $(".po_box.po_boxon_blue").removeClass('po_boxon_blue');
    $(".po_number.po_number_blue").removeClass('po_number_blue');
}

function PrintPow() {
    var d = new Date();
    $.ajax({
        url: '/api_pb/bet_info.aspx?_t=' + d.getTime(),
        type: 'POST',
        dataType: 'json',
        data: {},
        success: function (data, textStatus, jqXHR) {
            var resultString = "";

            for (i = 0; i < data.count; i++) {
                resultString = "";
                resultString += data.data[i].nick + "|";
                resultString += data.data[i].game_no + "|";
                resultString += "===================|";
                resultString += data.data[i].round + "회차|";
                resultString += data.data[i].bet_time + "|";
                resultString += data.data[i].select + "|";
                resultString += data.data[i].betprice + "|";
                resultString += "===================|";
                resultString += "예상적중 " + data.data[i].result_money + "|";
                resultString += ".";

                console.log(resultString);

                window.external.CallForm(resultString);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            ShowToast("error", jqXHR, errorThrown);
        }
    });
}