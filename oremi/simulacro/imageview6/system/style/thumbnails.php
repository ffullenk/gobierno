<?php 
/*
Imageview 6 Thumbnail Style
By Jorge Schrauwen
*/

//generate headers
header('Expires: '.gmdate("D, d M Y H:i:s", mktime(date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y"))).' GMT');
header('Content-type: text/css');

//change directory to parent dir
chdir('../../');

//create core
require('system/core/imageview.php');
$imageview = &new imageview();

//get width and height
$width = ($imageview->config->tn_width()+20).'px';
$height = ($imageview->config->tn_height()+20).'px';

//enable IEHack
$IEHack = false;
$agent = $_SERVER['HTTP_USER_AGENT'];
if(eregi("msie",$agent) && !eregi("opera",$agent)){
	$agent = explode(" ",stristr($agent,"msie"));
	if($agent[0] == "MSIE"){
		if(substr($agent[1], 0, 1) < 7) $IEHack = true;
	}
}
?>

/* thumbnails */
.thumbnail{
	border: 1px solid #CCCCCC;
	display: block;
	margin: 2px;
	float: left;
	cursor: <?php if($IEHack == false){ echo 'pointer'; }else{ echo 'hand'; }?>;
}

.thumbnail div{
	width: <?php echo $width; ?>;
	height: <?php echo $height; ?>;
	background-color: #FFFFFF;
	background-position: center;
	background-repeat: no-repeat;
}

.thumbnail:hover div{
	background-color: #eff7ff;
}
		
.thumbnail span{
	width: <?php echo $width; ?>;
	background-color: #EEEEEE;
	text-align: center;
	border-top: 1px solid #CCCCCC;
	overflow: hidden;
	display: block;
}