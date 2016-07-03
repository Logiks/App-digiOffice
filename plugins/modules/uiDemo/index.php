<?php
if(!defined('ROOT')) exit('No direct script access allowed');

$slug=_slug("module/param1/param2");
if(!isset($slug['param1'])) $slug['param1']="general";
else $slug['param1']=strtolower($slug['param1']);

$fs=[
		__DIR__."/comps/component_{$slug['param1']}.php"=>"comps",
		__DIR__."/comps/page_{$slug['param1']}.php"=>"page",
		__DIR__."/comps/template_{$slug['param1']}.php"=>"template",
	];

$loaded=false;
foreach ($fs as $f=>$t) {
	if(file_exists($f)) {
		$loaded=true;
		echo _css("uiDemo");
		echo "<div class='container-fluid uiDemo-container'>";
		include_once $f;
		echo "</div>";
		echo _js("uiDemo");
	}
}
if(!$loaded) {
	echo "<h1 class='error text-center'><br><br>Sorry, requested view not found.</h1>";
}
?>