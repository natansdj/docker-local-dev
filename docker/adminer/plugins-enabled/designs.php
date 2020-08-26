<?php
require_once('plugins/designs.php');

if(!isset($_SESSION["design"]) || empty($_SESSION["design"])){
	$_SESSION["design"] = "designs/pepa-linha/adminer.css";
}

$designs = array();
$enabled = array('hever', 'pepa-linha', 'nette', 'ng9');
$css = array();
foreach (glob("designs/*", GLOB_ONLYDIR) as $filename) {
	$css[] = basename($filename);
}

foreach ($css as $filename) {
	if(in_array($filename, $enabled)){
		$designs["designs/$filename/adminer.css"] = basename($filename);
	}
}

/**
	* @param array URL in key, name in value
	*/
return new AdminerDesigns($designs);
