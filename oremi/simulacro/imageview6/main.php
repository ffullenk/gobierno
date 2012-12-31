<?php
/******************************************\
| Imageview 6 :: AJAX Edition              |
| By Jorge Schrauwen                       |
\******************************************/
//headers so this page doesn't get cached
header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );

//create core
require('system/core/imageview.php');
$imageview = &new imageview();

//get skin
$skin = $imageview->skin();

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Imageview 6 :: By Jorge Schrauwen</title>
<style type="text/css">
	/* default styles */
	@import "system/style/base.css";
	@import "system/style/thumbnails.php";
	@import "system/javascript/xtree/xtree.css";
	<?php
	if(isset($skin['style'])){
		echo "/* skin dependent styles */\n";
		if(isset($skin['style']['file'])){
			if(isset($skin['style']['media'])) $skin['style']['media'] = ' '.$skin['style']['media'];
			if((!isset($skin['style']['iehack'])) || ($IEHack))
				echo "\t".'@import "system/skins/'.$skin['name'].'/'.$skin['style']['file'].'";'."\n";
		}elseif(is_array($skin['style'])){
			foreach($skin['style'] as $sheet){
				if(isset($sheet['media'])) $sheet['media'] = ' '.$sheet['media'];
				if((!isset($sheet['iehack'])) || ($IEHack))
					echo "\t".'@import "system/skins/'.$skin['name'].'/'.$sheet['file'].'"'.$sheet['media'].';'."\n";	
			}
		}
	}
	?>
</style>
<!-- Include the javascripts -->
<!--[if lt IE 7]><script type="text/javascript" src="system/javascript/pngfix.js"></script><![endif]-->
<script type="text/javascript" src="system/javascript/jXCore/jXCore.js"></script>
<script type="text/javascript" src="system/javascript/imgprotect.js"></script>
<script type="text/javascript" src="system/javascript/imageview.js"></script>	
<script type="text/javascript">
//<![CDATA[
	//jXCore Includes
	jXCore.include('XMLParser', 'system/javascript/jXCore/');
	jXCore.include('ExtendedPreFetch');
	jXCore.include('CookieManager');
	jXCore.include('Events');
	jXCore.include('BrowserInfo');
	jXCore.include('SuperString');
	jXCore.include('Utils');	
	jXCore.include('Encoder');
	
	//init function
	var oImageview;
	function init(){
		//check if if frameset exists
		if(top.location.href !== location.href.replace('main.php' + location.search, '')){ //switching to frame
			top.location.href = location.href.replace('main.php', '');
		}else{ //all is as it should be
			//create oImageview Object
			oImageview = new imageview();
			if(!oImageview) throw new Error('Failed to initialize oImageview!');			
		}
	}

//]]>
</script>

</head>

<body onload="init();">
<?php 
	//fix the values
	$skin['layout'] = str_replace('%base%', 'system/skins/'.rawurlencode($skin['name']), $skin['layout']);
	$skin['layout'] = str_replace('%album_dropdown%', $imageview->album_dropdown(), $skin['layout']);
	$skin['layout'] = str_replace('%album_tree%', $imageview->album_tree(), $skin['layout']);
	$skin['layout'] = str_replace('%content%', '<span id="iContent"></span>', $skin['layout']);
	//show the content
	print $skin['layout'];
?>
</body>
</html>
