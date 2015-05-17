<?php
loadModule("tabbedspace");
?>
<script language="javascript">
var pingCnt=0;
$(function() {
	$("body").attr("oncontextmenu","return false");
	$("body").attr("onselectstart","return false");
	$("body").attr("ondragstart","return false");

	setInterval(function() {
		lx=_service("ping");
		processAJAXQuery(lx);
	},300000);
});
</script>