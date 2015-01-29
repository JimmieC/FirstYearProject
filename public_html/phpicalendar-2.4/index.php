<?php
if (!defined('BASE')) define('BASE', '/home/a9600570/public_html/phpicalendar-2.4/');
include_once(BASE.'functions/init.inc.php');

if ($phpiCal_config->printview_default == 'yes') {
	$theview ="print.php";
} else {
	$check = array ('day', 'week', 'month', 'year');
	if (in_array($phpiCal_config->default_view, $check)) {
		$theview = $phpiCal_config->default_view . '.php';
	} else {
		die('illegal view');
	}
}
if(isset($_GET['cpath'])){
	$theview .= '?cpath='.$_GET['cpath'];
}
header("Location: $theview");

?>
