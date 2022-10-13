<?php
include_once('./_common.php');

$member_id = $_GET['member_id'];
if($member_id){
//$sql2 = "select count(*)coul from tajo_betlist where bet_uid = '".$member_id."'";
}else{
//$sql2 = "select count(*)coul from tajo_betlist";
}
$row2 = sql_fetch($sql2);
$total_page = floor($row2['coul'] / 15);
$page = $_GET['page'];
$nuser = "15";
$member_id = $member[ 'mb_id' ];
if($page){

$pagw = ($page - 1) * 15;
}else{
$page = 1;
$pagw = 0;
}

$sql = " select * from tajo_betlist where bet_uid = '".$member_id."' order by sid desc limit ".$pagw.", 15";

$result = sql_query($sql);

for($i=0; $row=sql_fetch_array($result); $i++){

         $list[$i] = $row;
}

$zzz = G5_TIME_YMD;

$sql = " select count(*) as cnt from {$g5['point_table']}
         where po_rel_table = '@daroll'
         and mb_id = '{$member['mb_id']}'
         and substring(po_rel_action,1,10) = '{$zzz}' ";
$row = sql_fetch($sql);
$today_cnt = $row['cnt'];


$membermb_point = $member['mb_point'] ? $member['mb_point'] : 0;

?>

         <div class="cart_list1111">
            <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
         <tbody>
         <tr>
               <th>승식</th>
               <th>라운드</th>
               <th>종목</th>
               <th>배팅포인트</th>
               <th>당첨포인트</th>
               <th>결과</th>
            </tr>
         <?php
         
if($list && count($list) > 0) {    //추가 시작 - PHP 7.2.x count() 에러 해결
$countn = count($list);
}

         if($countn==0) {    //추가 시작 - PHP 7.2.x count() 에러 해결
         $countn = 0;
         }else if($countn==1){
   $countn = 1;
        }else if($countn==2){
   $countn = 2;
        }else if($countn==3){
   $countn = 3;
        }else if($countn==4){
   $countn = 4;
        }else{
   $countn = 5;
        }
        for ($i=0; $i<$countn; $i++) {
         $one_delete = '<a class="charge_delete" id="'.$list[$i]['mo_no'].'">삭제</a>';
         ?>
       
      <tr>
            <td>타조</td>
            <td><?php echo $list[$i]['bet_round']?></td>
            <td style="text-align:left">
	    <div class="<?php if($list[$i]['bet_name'] == 1){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 2){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 3){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 4){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 5){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 6){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 7){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 8){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 57){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 58){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 67){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 68){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 13){
            echo "po_color1";
            }else if($list[$i]['bet_name'] == 14){
            echo "po_color2";
            }else if($list[$i]['bet_name'] == 23){
            echo "po_color1";
            }else{
            echo "po_color2";
            }?>"><?php if($list[$i]['bet_name'] == 1){
            echo "Left";
            }else if($list[$i]['bet_name'] == 2){
            echo "Right";
            }else if($list[$i]['bet_name'] == 3){
            echo "1";
            }else if($list[$i]['bet_name'] == 4){
            echo "2";
            }else if($list[$i]['bet_name'] == 5){
            echo "3";
            }else if($list[$i]['bet_name'] == 6){
            echo "4";
            }else if($list[$i]['bet_name'] == 7){
            echo "언";
            }else if($list[$i]['bet_name'] == 8){
            echo "옵";
            }else if($list[$i]['bet_name'] == 57){
            echo "홀언";
            }else if($list[$i]['bet_name'] == 58){
            echo "홀오";
            }else if($list[$i]['bet_name'] == 67){
            echo "짝언";
            }else if($list[$i]['bet_name'] == 68){
            echo "짝오";
            }else if($list[$i]['bet_name'] == 13){
            echo "홀언";
            }else if($list[$i]['bet_name'] == 14){
            echo "홀오";
            }else if($list[$i]['bet_name'] == 23){
            echo "짝언";
            }else{
            echo "짝오";
            }?></div></td>
            <td><span class="font05"><?php echo $list[$i]['bet_money']?></span></td>
      <?php
      include_once('./_func.php');
      include_once('./_common.php');
         $sid = $list[$i]['sid'];
         $round = $list[$i]['bet_round'];
         $name = $list[$i]['bet_name'];
         $result = $list[$i]['bet_result'];
         $money = $list[$i]['bet_money'];
         $value = 1.95;
         $ifmoney = $money * $value;
         $url = 'https://bepick.net/game/default/jw_ostrichrun';
         $data = webdata($url, 'GET', '');
         $data2 = splits($data, '</span><strong>'.$round.'</strong>', '</tr>', 1);
         $_count = explode('<span class="r_icon round15 jw_ostrichrun_fd', $data2);
         $_count = count($_count);
         
         $Result1 = splits($data2,'<span class="r_icon round15 jw_ostrichrun_fd','"', 1);
         $Result1 = str_replace('1_1', '1', $Result1);
         $Result1 = str_replace('1_2', '2', $Result1);
         $Result2 = splits($data2,'<span class="r_icon round15 jw_ostrichrun_fd','"', 2);
         $Result2 = str_replace('2_1', '3', $Result2);
         $Result2 = str_replace('2_2', '4', $Result2);
         $Result2 = str_replace('2_3', '5', $Result2);
         $Result2 = str_replace('2_4', '6', $Result2);
         $Result3 = splits($data2,'<span class="r_icon round15 jw_ostrichrun_fd','"', 3);
         $Result3 = str_replace('3_1', '7', $Result3);
         $Result3 = str_replace('3_2', '8', $Result3);
         $Result4 = splits($data2,'<span class="r_icon round15 jw_ostrichrun_fd','"', 4);
         $Result4 = str_replace('4_1', '9', $Result4);
         $Result4 = str_replace('4_2', '10', $Result4);
         $Result5 = '';
         $Result6 = '';
         $Result7 = '';
         $Result8 = '';
         
         if($result=='적중'){
         $Result5 = '적중';
         $Result8 = $list[$i]['bet_ifmoney'];
         } else if($result=='미적'){
         $Result5 = '미적';
         $Result8 = $list[$i]['bet_ifmoney'];
         }else if($result=='대기중'){ 
            if($Result1==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[타조] 적중 포인트');
                  $sql = "update tajo_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);
               
            }else if($Result2==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[타조] 적중 포인트');
                  $sql = "update tajo_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);
               
            }else if($Result3==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[타조] 적중 포인트');
                  $sql = "update tajo_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);

            }else if($Result4==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*1.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[타조] 적중 포인트');
                  $sql = "update tajo_betlist set bet_result = '적중', bet_ifmoney = '".$money*1.95."'  where sid = '".$sid."'";
                  sql_query($sql);

            }else if($Result3.$Result4==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    $Result8 = $money*3.95;
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[타조] 적중 포인트');
                  $sql = "update tajo_betlist set bet_result = '적중', bet_ifmoney = '".$Result8."'  where sid = '".$sid."'";
                  sql_query($sql);

            }else if($Result1.$Result2==$name)
            {
	    $Result6 = '1';
	    $Result7 = "'".$money."'";
	    if($Result1.$Result2=='13')
            {
	    $Result8 = $money*4.12;
	    }else if($Result1.$Result2=='24')
            {
	    $Result8 = $money*4.12;
	    }else{
	    $Result8 = $money*3.12;
	    }
                  $Result5 = '적중';
	    insert_point( $member[ 'mb_id' ], $money*1.95, '[타조] 적중 포인트');
                  $sql = "update tajo_betlist set bet_result = '적중', bet_ifmoney = '".$Result8."'  where sid = '".$sid."'";
                  sql_query($sql);

            }else  if($Result4=="")
            {
            $Result5 = '대기중';
	    $Result8 = '0';
            }else 
            {
               $Result5 = '미적';
	 $Result8 = '0';
               $sql = "update tajo_betlist set bet_result = '미적' where sid = '".$sid."'";
               sql_query($sql);
            }
         } 
         echo'<td>'.$Result8.'<br><span class="font07"></td><td>'.$Result5.'';
      ?>
      </td>      
      </tr>
      <?php
      if($Result6 == '1'){
      //insert_point( $member[ 'mb_id' ], $money*1.95, '[타조] 적중 포인트');
      //location.reload();
      }
      ?>
      <?php
      }
       ?>
       </tbody>
      </table>