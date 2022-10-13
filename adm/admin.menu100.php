<?php
$menu['menu100'] = array (

	array('200000', '회원관리', G5_ADMIN_URL.'/member_list.php', 'member'),
    array('200100', '회원관리', G5_ADMIN_URL.'/member_list.php', 'mb_list'),
	array('100200', '권한설정', G5_ADMIN_URL.'/auth_list.php',     'cf_auth'),
    array('200200', '머니관리', G5_ADMIN_URL.'/point_list.php', 'mb_point'),	
    array('300500', '1:1문의설정', ''.G5_ADMIN_URL.'/qa_config.php', 'qa'),
    array('300000', '게시판관리', ''.G5_ADMIN_URL.'/board_list.php', 'board'),
    array('300100', '게시판관리', ''.G5_ADMIN_URL.'/board_list.php', 'bbs_board'),
    array('300600', '내용관리', G5_ADMIN_URL.'/contentlist.php', 'scf_contents', 1),
    array('300700', 'FAQ관리', G5_ADMIN_URL.'/faqmasterlist.php', 'scf_faq', 1),
	array('100280', '테마설정', G5_ADMIN_URL.'/theme.php',     'cf_theme', 1),
    array('100290', '메뉴설정', G5_ADMIN_URL.'/menu_list.php',     'cf_menu', 1),
    array('200800', '접속자기록', G5_ADMIN_URL.'/visit_list.php', 'mb_visit', 1),
    array('200810', '현재접속자', G5_ADMIN_URL.'/visit_search.php', 'mb_search', 1),	
    array('300820', '글,댓글 현황', G5_ADMIN_URL.'/write_count.php', 'scf_write_count'),
    array('100000', '환경설정', G5_ADMIN_URL.'/config_form.php',   'config'),
    array('100100', '기본환경설정', G5_ADMIN_URL.'/config_form.php',   'cf_basic'),	
	
	// 원본 메뉴
    // array('100000', '환경설정', G5_ADMIN_URL.'/config_form.php',   'config'),
    // array('100100', '기본환경설정', G5_ADMIN_URL.'/config_form.php',   'cf_basic'),
    // array('100200', '관리권한설정', G5_ADMIN_URL.'/auth_list.php',     'cf_auth'),
    // array('100280', '테마설정', G5_ADMIN_URL.'/theme.php',     'cf_theme', 1),
    // array('100290', '메뉴설정', G5_ADMIN_URL.'/menu_list.php',     'cf_menu', 1),
    // array('100300', '메일 테스트', G5_ADMIN_URL.'/sendmail_test.php', 'cf_mailtest'),
    // array('100310', '팝업레이어관리', G5_ADMIN_URL.'/newwinlist.php', 'scf_poplayer'),
    // array('100800', '세션파일 일괄삭제',G5_ADMIN_URL.'/session_file_delete.php', 'cf_session', 1),
    // array('100900', '캐시파일 일괄삭제',G5_ADMIN_URL.'/cache_file_delete.php',   'cf_cache', 1),
    // array('100910', '캡챠파일 일괄삭제',G5_ADMIN_URL.'/captcha_file_delete.php',   'cf_captcha', 1),
    // array('100920', '썸네일파일 일괄삭제',G5_ADMIN_URL.'/thumbnail_file_delete.php',   'cf_thumbnail', 1),
    // array('100500', 'phpinfo()',        G5_ADMIN_URL.'/phpinfo.php',       'cf_phpinfo')
);

if(version_compare(phpversion(), '5.3.0', '>=') && defined('G5_BROWSCAP_USE') && G5_BROWSCAP_USE) {
    // $menu['menu100'][] = array('100510', 'Browscap 업데이트', G5_ADMIN_URL.'/browscap.php', 'cf_browscap');
    // $menu['menu100'][] = array('100520', '접속로그 변환', G5_ADMIN_URL.'/browscap_convert.php', 'cf_visit_cnvrt');
}

// $menu['menu100'][] = array('100410', 'DB업그레이드', G5_ADMIN_URL.'/dbupgrade.php', 'db_upgrade');
// $menu['menu100'][] = array('100400', '부가서비스', G5_ADMIN_URL.'/service.php', 'cf_service');