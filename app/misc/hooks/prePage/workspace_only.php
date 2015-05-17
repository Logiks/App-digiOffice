<?php
if(isset($_REQUEST["page"]) && strlen($_REQUEST["page"])>0 && $_REQUEST["page"]!=getConfig("LANDING_PAGE")) {
	$sessKey=SITENAME.session_id();
?>
<script>
if(typeof parent.SESS_KEY=='string') {
	sessKey=parent.SESS_KEY;
	if(sessKey==null || sessKey.length<0 || sessKey!='<?=$sessKey?>') {
		window.location=_link("");
	}
} else if(typeof top.SESS_KEY=='string') {
	sessKey=top.SESS_KEY;
	if(sessKey==null || sessKey.length<0 || sessKey!='<?=$sessKey?>') {
		window.location=_link("");
	}
} else {
	window.location=_link("");
}
</script>
<?php
} else {
	//echo "<script>SESS_KEY='lgkscms';</script>";
	echo "<script>SESS_KEY='".SITENAME.session_id()."';</script>";
}
?>
