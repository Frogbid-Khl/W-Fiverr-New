<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if (!$is_member){
   alert("로그인 후 이용하세요.", G5_URL);
 }

/***************************************************************

 버그신고 및 프로그램 개발문의 :
 메일+메신저 : kcho07@nate.com
 HP : 010-4273-0876 구춘호(헐랭이)

 프로그램의 버그 포스팅 및 안정화를 위해서 안정화가 될때 까지는
 베타버전으로 명명하며 베타버전 일때는 수정후 재배포를 금지합니다.

 그누보드 포인트연동 달팽이게임 베타버전 : 2.30

****************************************************************/

// 기본설정
  $today_max = 1000; // 하루에 게임가능 횟수

  $min_point = 100; // 게임 참여 가능한 최소 보유 포인트

  $set_min_point = 100; // 한 게임 당 걸수 있는 최저 합계포인트

  $set_maxmoney = 100; // 보유포인트의 몇 %까지 베팅 가능한지.

  $set_maxcnt = 1; // 베팅 가능한 달팽이 마리 수

  $set_number = 4; // 레이싱하는 달팽이 총 개수

  $set_speed = 1.5; // 달팽이가 달리는 속도

  $set_meter = 500; // 경기장 트랙길이


// 베팅한 달팽이의 포인트 지급설정

  $setno_point1 = 3; // 1등에게 적용할 베팅포인트 배수

  $setno_point2 = 1; // 2등에게 적용할 베팅포인트 배수

  $setno_point3 = 0; // 3등에게 지급할 위로포인트


// 경고메세지 출력후 부모창 리로드
function setalert_reload($msg){

	global $g5;
    //parent.location.reload();
	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset={$g5['charset']}\">";
    echo "<script type='text/javascript'> alert('$msg'); window.parent.document.location.href = window.parent.document.URL; window.close();</script>";
    exit;
}

?>
