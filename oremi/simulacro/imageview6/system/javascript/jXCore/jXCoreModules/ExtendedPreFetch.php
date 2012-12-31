<?php
// imports
require('../jXCoreLibraries/json.php');

// start buffer
ob_start();

// locals
$json = new Services_JSON();
$base = $_POST['base'];
$self = $_SERVER['PHP_SELF'];
$files = stripslashes($_POST['files']);
$total = 0;
$return = null;

// strip file from base
$base = explode("/", $base);
$self = explode("/", $self);
$base = str_repeat("../", count($self) - count($base));

// decode json
$files = $json->decode($files);

// update array
for ($i = 0; $i < count($files); $i++) {
	$size = filesize($base . $files[$i]->name);
	$total += $size;
	$files[$i]->size = $size;
}

// build result
$return = array();
$return[] = $total;
$return[] = $files;

// clear buffer
ob_clean();

// output
header("content-type: plain/text");
print $json->encode($return);

ob_end_flush();
?>