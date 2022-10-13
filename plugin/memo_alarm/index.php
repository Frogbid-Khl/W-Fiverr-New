<?php
//ver1.0 150727 @_untitle_d


if ($is_member){
?>

<div id="memo_alarm" style="display:none;"></div>
<script>
setInterval(function(){
	$.ajax({url:"<?php echo G5_PLUGIN_URL; ?>/memo_alarm/realtime.php", success:function(data){
		$("#memo_alarm").html(data);
    }});
}, 10000);

$.ajax({url:"<?php echo G5_PLUGIN_URL; ?>/memo_alarm/realtime.php", success:function(data){
	$("#memo_alarm").html(data);
}});
</script>



<?php } ?>