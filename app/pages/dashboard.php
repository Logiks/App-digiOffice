<?php
if(!defined('ROOT')) exit('No direct script access allowed');
session_check(true);

$_REQUEST['chart_plugins']="corechart,treemap,calendar";
loadModule("dashboard");
?>
