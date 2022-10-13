<?php
    include_once('../../command.php');
    include_once( '../../common.php' );
    include_once( '../../sudda_config.php' );
    $obj = new Request( );    
    if($member['mb_id'] == null) {
        echo json_encode( [
            'result' => "fail",
            'msg' => "로그인 하여 주세요"
        ] );
        return;
    }
    if($_POST[ 'amount' ] > $member['mb_point']) {
        echo json_encode( [
            'result' => "fail",
            'msg' => "보유하신 포인트가 부족합니다."
        ] );
        return;
    }
    $betid = addslashes($member['mb_no']);
    $num = addslashes($_POST['round']);
    $name = addslashes($_POST['kind']);
    $momey = addslashes($_POST['amount']);
    $result = addslashes($_POST['result']);
    
    

   {

	global $g5, $LADDERCONF, $member, $is_member, $is_admin;

	$userpoint = $member['mb_point'] - $point;
	$member['mb_point'] = $userpoint;
	sql_query(" insert into 
					{$g5['point_table']} 
				set
					mb_id = '{$member['mb_id']}',
					po_datetime = now(),
					po_content = '파워사다리 베팅',
					po_point = -{$get['money']},
					po_use_point = 0,
					po_expired = 0,
					po_expire_date = '9999-12-31',
					po_mb_point = '{$userpoint}',
					po_rel_table = '{$LADDERCONF['bo_table']}',
					po_rel_id    = '{$LADDERCONF['wr_id']}',
					po_rel_action = '{$get['name']} 베팅'
				");

	sql_query("	update 
					{$g5['member_table']} 
				set 
					mb_point={$userpoint} 
				where 
					mb_id='{$member['mb_id']}' 
				");

	sql_query("	insert into
					power_loader_betlist
				set
					sid = '{$LADDERCONF['sid']}',
					bet_uid = '{$member['mb_id']}',
					bet_round = '{$_POST['round']}',
					bet_name = '{$_POST['value']}',
					bet_money = '{$_POST['amount']}',
					bet_ifmoney = '0',
					bet_result = '대기중'
				");

        insert_point( $member[ 'mb_id' ], $_POST[ 'amount' ] * ( -1 ), '[파워사다리] 베팅 차감');

        $point_tet = "".$member['mb_id']."회원 파워사다리 배팅 롤링금";

        insert_point($member['mb_recommend'], ($_POST[ 'amount' ]*0.0242), $point_tet );
    }
    echo json_encode( $response );
?>