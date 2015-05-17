<?php
$_REQUEST['page']=404;
?>
<style>
html,body {
	background:#c6dd62;
	color:maroon;
}
.workspace {
	text-align:center;
	font-style:Comic Sans, Comic Sans MS, cursive !important;
	font-style: oblique;
	font-size:1.5em;
}
</style>
<div class='workspace'>
	<br/><br/>
	Sorry !..., 
	<br/><br/><br/>
	Not available on Browser for your device.
	<br/><br/>
	Try out our app instead...
	<?php
		if(session_check(false)) {
			echo "<br/><br/><a href='<?=SiteLocation?>logout.php'>Logout</a>";
		}
	?>
</div>
<?php
exit();
?>