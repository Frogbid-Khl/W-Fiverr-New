<?php 
include_once(G5_PATH.'/head.sub.php');
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


?>

	<link rel="stylesheet" href="<?php echo $member_skin_url; ?>/mobile/common.css">
	<link rel="stylesheet" href="<?php echo $member_skin_url; ?>/mobile/main.css">
	<link rel="stylesheet" href="<?php echo $member_skin_url; ?>/mobile/sub.css?1664211224">
	<link rel="stylesheet" href="<?php echo $member_skin_url; ?>/mobile/iconfont.css">
	<script type="text/javascript" src="<?php echo $member_skin_url; ?>/mobile/jquery-3.5.1.min.js"></script>	
    <script>
    	
	var isLogin = false;
		</script>
	<style>
    .join-pop-bg{background:rgba(0, 0, 0, 0.5);position: fixed;top: 0;left: 0;right: 0;bottom: 0;z-index: 1;display: none;}
    .widgets__img_check_box{text-align: center;position: absolute;top: 0;left: 0;right: 0;bottom: 0;margin: auto;background: #ffffff;/*border:2px solid #2f4e6a;*/z-index: 2;width: 278px;height: 285px;padding: 10px;color: #fff;border-radius: 5px;display:none;}
    .widgets__img_check_box::after{content:"";position:absolute;bottom:50px;left:0;right:0;height: 1px;background:#eaeaea;}
    .widgets-pop-close{position: absolute;bottom: 19px;right: 10px;z-index: 10;color: #fff;font-size: 10px;background: #7f7f7f;border-radius: 50%;width: 18px;height: 18px;line-height: 18px;text-align: center;}
    .widgets__img_check_box .txt{position: absolute;top: calc(50% + 30px);width: calc(100% - 20px);text-align: center;padding-left: 40px;color: #959595;font-size: 14px;}
    .widgets__img_display{position: relative;/* padding:16px 16px 7px; *//* border:1px solid #ddd; */background: #cccccc;/* border-radius:16px; *//* overflow:hidden; */margin:auto;width: 100% !important;}.widgets__img_cnt{/* position: relative; */width: 100% !important;height:150px;}
    .widgets__img_src,.widgets__img_fragment_hollow{position:absolute;left:0;top:0;z-index:10}
    .widgets__img_src{position:relative;box-shadow:0 0 6px 0 #73706e;width: 100% !important;height: 100%;}
    .widgets__img_fragment_cnt{top:0;left:-50px;position:absolute}
    .widgets__img_fragment_cnt .widgets__img_fragment_content,.widgets__img_fragment_cnt .widgets__img_fragment{position:absolute;z-index:20}
    .widgets__smooth_cnt{position: relative;background-color:aqua;height:50px;width: 100% !important;margin:auto;margin-top: 10px;/* border-left: 20px solid #fff; *//* border-right: 20px solid #fff; */border-radius:24px;background-color: #fff;}
    .widgets__smooth_bar,.widgets__smooth_circle{position: relative;top:50%;transform:translateY(-50%);}
    .widgets__smooth_bar{width: 100%;height: 37px;background-color: #dfe1e2;border-radius:24px;}
    .widgets__smooth_circle{position: absolute;width: 57px;height: 57px;background: linear-gradient(to right, #eaebeb, #d3d3d3);border-radius:50%;box-shadow:0 0 6px 0 #73706e;cursor:pointer;z-index: 10;}
    .widgets__smooth_circle::after{content:"";position: absolute;top: 0;bottom: 0;left: 0;right: 0;margin: auto;width: 18px;height: 16px;background: url(/images/icon.png) no-repeat center;}
    .widgets__icon_refresh{display: block;position: absolute;top: 240px;right: 30px;width:16px;height:16px;padding:2px;border:4px solid transparent;cursor:pointer;}
    .widgets__icon_refresh:before{position: absolute;content: "";top: -5px;left: -5px;background: url(/images/refesh.gif);display: block;width: 18px;height: 18px;}
    .widgets__icon_refresh:after{position:absolute;content:"";display: none;border:7px solid transparent;border-left:7px solid #b7b7b7;left:50%;top:-3.5px;}
    </style>
    <script language="javascript" type="text/javascript" src="/js/img_smooth_check.js?1664211224"></script>
	


<div class="login-wraper">	
	<div id="visual"></div>
	<div class="login-box">
		<div class="pop-join pop-mode">
			<div class="join-box">
				<div class="join-v">
					<div class="tit"><a href="/"><img src="<?php echo $member_skin_url; ?>/mobile/login-logo.png" style="width:140px;"></a></div>
					<div class="cont">
    <script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
    <?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
    <script src="<?php echo G5_JS_URL ?>/certify.js"></script>
    <?php } ?>
	
	
 <form name="fregisterform" id="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="url" value="<?php echo $urlencode ?>">
    <input type="hidden" name="agree" value="<?php echo $agree ?>">
    <input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
    <input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
    <input type="hidden" name="cert_no" value="">
    <?php if (isset($member['mb_sex'])) { ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php } ?>
    <?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면 ?>
    <input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
    <input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
    <?php } ?>
						
                        <ul>
                            <li>
                                <div class="first">아이디</div>
                                <div class="second">
                                   
                          <input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" class="frm_input iptC <?php echo $required ?> <?php echo $readonly ?>" minlength="3" maxlength="20" <?php echo $required ?> <?php echo $readonly ?>>
                     <span id="msg_mb_id" class="txt"class="txt"></span>
                                </div>
                            </li>
                            <li>
                                <div class="first">비밀번호</div>
                                <div class="second">
                                   <input type="password" name="mb_password" id="reg_mb_password" class="frm_input iptC <?php echo $required ?>" minlength="3" maxlength="20" <?php echo $required ?>>
                                    <p class="txt">*Password는 6-16자리 입니다.</p>
                                </div>
                            </li>
                            <li>
                                <div class="first">비밀번호 확인</div>
                                <div class="second">
                                    <input type="password" name="mb_password_re" id="reg_mb_password_re" class="frm_input iptC <?php echo $required ?>" minlength="3" maxlength="20" <?php echo $required ?>>
                                </div>
                            </li>
                            <li>
                                <div class="first">닉네임</div>
                                <div class="second">
                                    
<input type="hidden" name="mb_nick_default"  value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>">
                <input type="text" name="mb_nick" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>" id="reg_mb_nick" required class="frm_input iptC required nospace" maxlength="20">
                <span class="text" id="msg_mb_nick"></span>
                                </div>
								<div class="join-pop-bg"></div>
								<div class="widgets__img_check_box" id="select">
									<a href="#" class="widgets-pop-close iconfont icon-guanbi2"></a>
									<div class="widgets__img_display">
										<div class="widgets__img_cnt">
											<img src1="a.jpg" class="widgets__img_src" />
											<canvas class="widgets__img_fragment_hollow"></canvas>
											<div class="widgets__img_fragment_cnt">
												<canvas class="widgets__img_fragment widgets__img_fragment_shadow"></canvas>
												<canvas class="widgets__img_fragment widgets__img_fragment_content"></canvas>
											</div>
											<div class="widgets__icon_refresh"></div>
										</div>
									</div>
									<div class="widgets__smooth_cnt" style="position: relative;">
										<div class="widgets__smooth_bar"></div>
										<div class="widgets__smooth_circle"></div>
									</div>
									<p style="position: absolute;margin-top: -32px;color: #333;left: 72px;">옆으로 밀어서 퍼즐 완성해주세요.</p>
								</div>
                            </li>
                            <li>
                                <div class="first">휴대폰 번호</div>
                                <div class="second">
                                    <input type="text" class="iptC" name="mb_hp"  placeholder="사용중인 휴대폰 번호를 정확히 입력해주세요.">
				</div>

 <?php if ($config['cf_use_tel']) { ?>
        <div class="first">전화번호<?php if ($config['cf_req_tel']) { ?><strong class="sound_only">필수</strong><?php } ?></div>
<div class="second">            
<input type="text" name="mb_tel" value="<?php echo get_text($member['mb_tel']) ?>" id="reg_mb_tel" class="frm_input iptC <?php echo $config['cf_req_tel']?"required":""; ?>" maxlength="20" <?php echo $config['cf_req_tel']?"required":""; ?>>
       </div>
        <?php } ?>

        <?php if (!$config['cf_use_hp']) {  ?>
               <div class="first">휴대폰번호<?php if ($config['cf_req_hp']) { ?><strong class="sound_only">필수</strong><?php } ?></div>
            <div class="second">
                <input type="text" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> class="frm_input iptC <?php echo ($config['cf_req_hp'])?"required":""; ?>" maxlength="20">
             </div>               
 <?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
                <input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
                <?php } ?>
          
        <?php } ?>


                            </li>
													
							                            <li>
                                <div class="first">은행정보</div>
                                <div class="second">
                                    <div class="bank-box">
                                        <select class="seleD" name="mb_3" id="mb_3" >
                                            <option value="">은행선택</option>
                                            <option value="국민은행">국민은행</option>
                                            <option value="광주은행">광주은행</option>
                                            <option value="경남은행">경남은행</option>
                                            <option value="기업은행">기업은행</option>
                                            <option value="농협은행">농협은행</option>
                                            <option value="대구은행">대구은행</option>
                                            <option value="도이치은행">도이치은행</option>
                                            <option value="부산은행">부산은행</option>                                            
                                            <option value="새마을금고">새마을금고</option>
                                            <option value="수협은행">수협은행</option>
                                            <option value="신한은행">신한은행</option>
                                            <!--option value="외환은행">외환은행</option-->
                                            <option value="우리은행">우리은행</option>
                                            <option value="우체국">우체국</option>
                                            <option value="전북은행">전북은행</option>
                                            <option value="제주은행">제주은행</option>
                                            <option value="하나은행">하나은행</option>
                                            <option value="한국씨티은행">한국씨티은행</option>
                                            <option value="HSBC은행">HSBC은행</option>
                                            <option value="SC제일은행">SC제일은행</option>
                                            <option value="신협">신협</option>
                                            <option value="카카오뱅크">카카오뱅크</option>
											<option value="산업은행">산업은행</option>

											<option value="저축은행">저축은행</option>
											<option value="토스뱅크">토스뱅크</option>
											<option value="BOA">BOA</option>
											<option value="JP모간">JP모간</option>
											<option value="하나증권">하나증권</option>
											<option value="교보증권">교보증권</option>
											<option value="대신증권">대신증권</option>
											<option value="미래에셋증권">미래에셋증권</option>
											<option value="DB금융투자">DB금융투자</option>
											<option value="신한금융투자">신한금융투자</option>
											<option value="NH투자증권">NH투자증권</option>
											<option value="키움증권">키움증권</option>
											<option value="한국투자">한국투자</option>
											<option value="한화투자증권">한화투자증권</option>
											<!--option value="KB증권">KB증권</option-->
											<!--option value="이베스트투자증권">이베스트투자증권</option-->
											<option value="SK증권">SK증권</option>
											<!--option value="카카오페이증권">카카오페이증권</option-->
											<!--option value="IBK투자증권">IBK투자증권</option-->
											<option value="토스증권">토스증권</option>
                                        </select>
                                     
                                        <input type="text" id="reg_mb_name" name="mb_name" placeholder="계좌 소유자 이름

" value="<?php echo get_text($member['mb_name']) ?>" <?php echo $required ?> <?php echo $readonly; ?> class="frm_input iptD <?php echo $required ?> <?php echo $readonly ?>">
                                    </div>
                                    <div>

<input type="text" name="mb_1" value="<?php echo $member['mb_1'] ?>" placeholder="계좌 번호
" id="reg_mb_1" <?php echo $required ?> <?php echo $readonly ?> class="frm_input iptC <?php echo $required ?> <?php echo $readonly ?>" minlength="7" size="70" maxlength="300">
                <span id="msg_mb_1"  class="text"></span>
</div>
                                </div>
                            </li>
						   
                           					
                        </ul>
<table>

        <?php if ($config['cf_use_addr']) { ?>
        <tr>
            <th scope="row">
                주소
                <?php if ($config['cf_req_addr']) { ?><strong class="sound_only">필수</strong><?php } ?>
            </th>
            <td>
                <label for="reg_mb_zip" class="sound_only">우편번호<?php echo $config['cf_req_addr']?'<strong class="sound_only"> 필수</strong>':''; ?></label>
                <input type="text" name="mb_zip" value="<?php echo $member['mb_zip1'].$member['mb_zip2']; ?>" id="reg_mb_zip" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input <?php echo $config['cf_req_addr']?"required":""; ?>" size="5" maxlength="6">
                <button type="button" class="btn_frmline" onclick="win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">주소 검색</button><br>
                <label for="reg_mb_addr1" class="sound_only">주소<?php echo $config['cf_req_addr']?'<strong class="sound_only"> 필수</strong>':''; ?></label>
                <input type="text" name="mb_addr1" value="<?php echo get_text($member['mb_addr1']) ?>" id="reg_mb_addr1" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input frm_address <?php echo $config['cf_req_addr']?"required":""; ?>" size="50"><br>
                <label for="reg_mb_addr2" class="sound_only">상세주소</label>
                <input type="text" name="mb_addr2" value="<?php echo get_text($member['mb_addr2']) ?>" id="reg_mb_addr2" class="frm_input frm_address" size="50">
                <br>
                <label for="reg_mb_addr3" class="sound_only">참고항목</label>
                <input type="text" name="mb_addr3" value="<?php echo get_text($member['mb_addr3']) ?>" id="reg_mb_addr3" class="frm_input frm_address" size="50" readonly="readonly">
                <input type="hidden" name="mb_addr_jibeon" value="<?php echo get_text($member['mb_addr_jibeon']); ?>">
            </td>
        </tr>
        <?php } ?>
        </table>
    </div>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>기타 개인설정</caption>
        <?php if ($config['cf_use_signature']) { ?>
        <tr>
            <th scope="row"><label for="reg_mb_signature">서명<?php if ($config['cf_req_signature']){ ?><strong class="sound_only">필수</strong><?php } ?></label></th>
            <td><textarea name="mb_signature" id="reg_mb_signature" class="<?php echo $config['cf_req_signature']?"required":""; ?>" <?php echo $config['cf_req_signature']?"required":""; ?>><?php echo $member['mb_signature'] ?></textarea></td>
        </tr>
        <?php } ?>

        <?php if ($config['cf_use_profile']) { ?>
        <tr>
            <th scope="row"><label for="reg_mb_profile">자기소개</label></th>
            <td><textarea name="mb_profile" id="reg_mb_profile" class="<?php echo $config['cf_req_profile']?"required":""; ?>" <?php echo $config['cf_req_profile']?"required":""; ?>><?php echo $member['mb_profile'] ?></textarea></td>
        </tr>
        <?php } ?>

        <?php if ($config['cf_use_member_icon'] && $member['mb_level'] >= $config['cf_icon_level']) { ?>
        <tr>
            <th scope="row"><label for="reg_mb_icon">회원아이콘</label></th>
            <td>
                <span class="frm_info">
                    이미지 크기는 가로 <?php echo $config['cf_member_icon_width'] ?>픽셀, 세로 <?php echo $config['cf_member_icon_height'] ?>픽셀 이하로 해주세요.<br>
                    gif만 가능하며 용량 <?php echo number_format($config['cf_member_icon_size']) ?>바이트 이하만 등록됩니다.
                </span>
                <input type="file" name="mb_icon" id="reg_mb_icon" class="frm_input">
                <?php if ($w == 'u' && file_exists($mb_icon_path)) { ?>
                <img src="<?php echo $mb_icon_url ?>" alt="회원아이콘">
                <input type="checkbox" name="del_mb_icon" value="1" id="del_mb_icon">
                <label for="del_mb_icon">삭제</label>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>

        

        <?php if ($config['cf_use_hp']) { ?>
        
        <?php } ?>

        <?php if (isset($member['mb_open_date']) && $member['mb_open_date'] <= date("Y-m-d", G5_SERVER_TIME - ($config['cf_open_modify'] * 86400)) || empty($member['mb_open_date'])) { // 정보공개 수정일이 지났다면 수정가능 ?>
      
        <?php } else { ?>
        <tr>
            <th scope="row">정보공개</th>
            <td>
                <span class="frm_info">
                    정보공개는 수정후 <?php echo (int)$config['cf_open_modify'] ?>일 이내, <?php echo date("Y년 m월 j일", isset($member['mb_open_date']) ? strtotime("{$member['mb_open_date']} 00:00:00")+$config['cf_open_modify']*86400:G5_SERVER_TIME+$config['cf_open_modify']*86400); ?> 까지는 변경이 안됩니다.<br>
                    이렇게 하는 이유는 잦은 정보공개 수정으로 인하여 쪽지를 보낸 후 받지 않는 경우를 막기 위해서 입니다.
                </span>
                <input type="hidden" name="mb_open" value="<?php echo $member['mb_open'] ?>">
            </td>
        </tr>
        <?php } ?>

        <?php if ($w == "" && $config['cf_use_recommend']) { ?>
        <tr>
            <th scope="row"><label for="reg_mb_recommend">추천인아이디</label></th>
            <td><input type="text" name="mb_recommend" id="reg_mb_recommend" class="frm_input"></td>
        </tr>
        <?php } ?>

       
        </table>



						<!--div class="g-recaptcha" data-sitekey="6LcA7_QZAAAAAEG61IcJRFr67gF6D_f7k45-d106"></div-->
						<div class="join-btn">
							<p> <a href="javascript:void(0)"> <button type="submit" id="btn_submit" class="btn_submit" style="border:none;background:none;" accesskey="s" ><?php echo $w==''?'회원가입':'정보수정'; ?> </button> </a></p>
							<p class="mt10"><a href="<?php echo G5_URL; ?>/">취소</a></p>
						</div>
                    </div>
					</form>
                </div>
			</div>
		</div>
	</div>
</div>

<style>
header{
display:none;
}
#container_title{
display:none;
}

</style>

    <script>
    $(function() {
        $("#reg_zip_find").css("display", "inline-block");

        <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
        // 아이핀인증
        $("#win_ipin_cert").click(function() {
            if(!cert_confirm())
                return false;

            var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
            certify_win_open('kcb-ipin', url);
            return;
        });

        <?php } ?>
        <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
        // 휴대폰인증
        $("#win_hp_cert").click(function() {
            if(!cert_confirm())
                return false;

            <?php
            switch($config['cf_cert_hp']) {
                case 'kcb':
                    $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                    $cert_type = 'kcb-hp';
                    break;
                case 'kcp':
                    $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                    $cert_type = 'kcp-hp';
                    break;
                default:
                    echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                    echo 'return false;';
                    break;
            }
            ?>

            certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
            return;
        });
        <?php } ?>
    });

    // 인증체크
    function cert_confirm()
    {
        var val = document.fregisterform.cert_type.value;
        var type;

        switch(val) {
            case "ipin":
                type = "아이핀";
                break;
            case "hp":
                type = "휴대폰";
                break;
            default:
                return true;
        }

        if(confirm("이미 "+type+"으로 본인확인을 완료하셨습니다.\n\n이전 인증을 취소하고 다시 인증하시겠습니까?"))
            return true;
        else
            return false;
    }

    // submit 최종 폼체크
    function fregisterform_submit(f)
    {
        // 회원아이디 검사
        if (f.w.value == "") {
            var msg = reg_mb_id_check();
            if (msg) {
                alert(msg);
                f.mb_id.select();
                return false;
            }
        }

        if (f.w.value == '') {
            if (f.mb_password.value.length < 3) {
                alert('비밀번호를 3글자 이상 입력하십시오.');
                f.mb_password.focus();
                return false;
            }
        }

        if (f.mb_password.value != f.mb_password_re.value) {
            alert('비밀번호가 같지 않습니다.');
            f.mb_password_re.focus();
            return false;
        }

        if (f.mb_password.value.length > 0) {
            if (f.mb_password_re.value.length < 3) {
                alert('비밀번호를 3글자 이상 입력하십시오.');
                f.mb_password_re.focus();
                return false;
            }
        }

        // 이름 검사
        if (f.w.value=='') {
            if (f.mb_name.value.length < 1) {
                alert('이름을 입력하십시오.');
                f.mb_name.focus();
                return false;
            }
        }

        <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
        // 본인확인 체크
        if(f.cert_no.value=="") {
            alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
            return false;
        }
        <?php } ?>

        // 닉네임 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
            var msg = reg_mb_nick_check();
            if (msg) {
                alert(msg);
                f.reg_mb_nick.select();
                return false;
            }
        }

		
		// 계좌번호 검사
		        if (f.w.value=="") {
            if (f.mb_1.value.length < 1) {
                alert("계좌번호를 입력하십시오.");
                f.mb_1.focus();
                return false;
            }
 
 
        }
		
		// 은행선택 검사
		        if (f.w.value=="") {
            if (f.mb_2.value.length < 1) {
                alert("은행을 선택하십시오.");
                f.mb_2.focus();
                return false;
            }
 
 
        }

        <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
        // 휴대폰번호 체크
        var msg = reg_mb_hp_check();
        if (msg) {
            alert(msg);
            f.reg_mb_hp.select();
            return false;
        }
        <?php } ?>

        if (typeof f.mb_icon != 'undefined') {
            if (f.mb_icon.value) {
                if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
                    alert('회원아이콘이 gif 파일이 아닙니다.');
                    f.mb_icon.focus();
                    return false;
                }
            }
        }

        if (typeof(f.mb_recommend) != 'undefined' && f.mb_recommend.value) {
            if (f.mb_id.value == f.mb_recommend.value) {
                alert('본인을 추천할 수 없습니다.');
                f.mb_recommend.focus();
                return false;
            }

            var msg = reg_mb_recommend_check();
            if (msg) {
                alert(msg);
                f.mb_recommend.select();
                return false;
            }
        }

        <?php echo chk_captcha_js(); ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
