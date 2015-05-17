<?php
if(!defined('ROOT')) exit('No direct script access allowed');

$site=SITENAME;
$subMenus=APPROOT."config/menugenerator.json";
$menuID=getConfig("DEFAULT_NAVIGATION");

if(isset($_SESSION['SESS_USER_NAME'])) $userName=$_SESSION['SESS_USER_NAME'];
else $userName="Guest";
?>
<div id="menubar" class='menubar'>
	<ul class="clearfix">
		<?php
			loadModule("navigator",array(
				"menuid"=>$menuID,
				"menuAutoGroupFile"=>$subMenus,
				"menuType"=>"menubar",
				""=>true));
		?>
		<!--<li><a style='cursor:pointer;font-size:1.5em;font-weight:bold;' title='Help OnSpot'
			onclick="jqPopupData('Hello Help Me','Hello, How May I Help You ?',null,false,700,450);">?</a></li>-->
		<li class="adminmenu" style="float: right !important;min-width:150px;" align=right>
			<h2>
				<a href="##">
					<span class='txt'><?=$userName?></span>
				</a>
			</h2>
			<ul align=left>
				<li><a href="page=modules&mod=settingsUser">My Settings</a></li>
				<li><a href="#" onclick="document.location='<?=SiteLocation?>logout.php'">Logout</a></li>
			</ul>
		</li>
	</ul>
</div>
<script>
fldrIcn="<img src='<?=loadMedia("images/types/group.png")?>' width='20px' height='20px' alt='' style='margin:0px;margin-right:10px;float:left;'>";
$(function() {
	$("#menubar>ul>li>a").each(function() {
		
	});
		
	<?php if(getConfig("MENUBAR_SHOW_DISABLED")=="false") { ?>
	$("#menubar>ul>li>a").each(function() {
		$(this).parent().addClass("disabled").hide();
	});
	<?php } ?>
	
	$("#menubar a").click(function(e) {
		e.preventDefault();
	});
	activateClickMenu("#menubar",true);
});
</script>

