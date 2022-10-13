<?php
include_once('./_common.php');
?>
$member_id = $_GET['member_id'];
</span><strong>'.$Result5.'';
			echo"</script>function strpost_update(val)
	{
		var f = document.strfpost;
		var action_url = 'resgame_on.php';
		var action_point = <?php echo $member['mb_point']?>;
		var action_kenkey = <?php echo $member['mb_point']?>;
			f.tokenkey.value = action_point;
			f.gamekey.value = action_kenkey;
			f.pmpoint.value = val;
			f.target = 'game_hframe';
			f.action = action_url;
			f.submit();
	}
	function stcpost_update(val)
	{
		var f = document.stcfpost;
		var action_url = 'resgame_on.php';
		var actions_point = <?php echo $member['mb_point']?>;
		var actions_kenkey = <?php echo $member['mb_point']?>;
			f.tokenkey.value = actions_point;
			f.gamekey.value = actions_kenkey;
			f.okmoney.value = val;
			f.target = 'game_hframe';
			f.action = action_url;
			f.submit();
	}
</script>
</center>
	<form name='strfpost' method='post'>
	 <input type='hidden' name='gstc' value='1'>
	 <input type='hidden' name='tokenkey'>
	 <input type='hidden' name='gamekey'>
	 <input type='hidden' name='pmpoint'>
	</form>
	<form name='stcfpost' method='post'>
	 <input type='hidden' name='gstc' value='2'>
	 <input type='hidden' name='tokenkey'>
	 <input type='hidden' name='gamekey'>
	 <input type='hidden' name='okmoney'>
	</form>
	<iframe width=0 height=0 name='game_hframe' style='display:none;'></iframe>
</div><!--id="snail"-->