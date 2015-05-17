<?php
if(!defined('ROOT')) exit('No direct script access allowed');
//session_check(true);

loadModule("page");

$params["toolbar"]=null;//"printToolbar";
$params["contentarea"]="printContent";

printPageContent("apppage",$params);

_css('settingsUser');
_js(['settingsUser','jquery.form.min','validator']);

function printToolbar() { ?>
<button onclick="window.location.reload()" style='width:46px;' ><div class='reloadicon'>&nbsp;</div></button>
<?php
}
function printContent() {
	$path = dirname(__FILE__) . '/panels';
	$panels = array();
	$files = glob($path . '/*.php');
	foreach($files as $panel) {
		$name = basename($panel);
		$file_name = substr($name,0,strrpos($name,'.'));
		$file_arr = explode('.',$file_name);
		
		if(isset($file_arr[1])){
			$file_name = toTitle($file_arr[1]);
		}
		$panels[] = array(
			'path' => $panel,
			'name' => $file_name
		);		
	}
?>
	<div style='width:100%;height:100%;overflow:auto;'>
		<div class="tabs">
			<ul class="tab-links">
				<?php 
					$cnt = 0;
					foreach($panels as $panel) { $cnt++; ?>
					<li <?php if($cnt == 1) echo 'class="ui-tabs-selected ui-state-active"'; ?>><a href="#tab<?php echo $cnt; ?>"><?php echo $panel['name']; ?></a></li>
				<?php } ?>
			</ul>
		 
			<div class="tab-content">			
				<?php 
					$cnt = 0;
					foreach($panels as $panel) { $cnt++; ?>
					<div id="tab<?php echo $cnt; ?>" class="tab <?php if($cnt == 1) echo 'ui-tabs-selected ui-state-active'; ?>">
						<?php require_once($panel['path']); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>