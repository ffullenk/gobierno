<?php
/******************************************\
| Imageview 6 :: AJAX Edition              |
| By Jorge Schrauwen                       |
\******************************************/
//create core
require('system/core/imageview.php');
$imageview = &new imageview();
$skin = $imageview->skin();

//check if preload needed
if((!$imageview->config->preload_ui()) || (isset($_COOKIE['ivPreloaded']))){
	header('location: '.str_replace('preload.php', 'main.php', $_SERVER['REQUEST_URI']));
}

//progressbar color
$color = 'black';
if(file_exists('system/images/loadbar/'.$skin['progressbar'].'/pgb_left.png')){
	$color = $skin['progressbar'];
}

//build aditional preload list
function PreLoadInclude($FolderPath, $FileWC='', $bSubFolders=false){
	if(!function_exists('_GetFileList')){ //check to see if we need to declare the functions
		function _GetFileList($Path){ //generates a array with files and folder
			$i = 0;
			$MyFiles = dir($Path);
			while(false !== ($file = $MyFiles->Read())){
				if(($file !== '.') && ($file !== '..')){
					if(is_file($Path.$file)){
						$arr[$i] = $file;	
					}elseif(is_dir($Path.$file)){
						$arr[$file] = _GetFileList($Path.$file.'/');
					}	
					$i++;
				}
			}
			$MyFiles->close();
			if(is_array($arr))
				asort($arr);
			return $arr;
		}
		
		function _Genlist($Files, $parent, $FileWC, $bSubFolders){ //print the javascript code
			$data = "";
			if(is_array($Files)){
				foreach ($Files as $key => $val){
					if(!is_array($val)){
						if(($FileWC == '') || (strtolower(substr($val, (0-strlen($FileWC)))) == strtolower($FileWC))){
							if(strtolower(substr($val, -9)) !== '.ds_store'){
								if(strtolower(substr($val, -9)) !== 'thumbs.db'){
									$data .= "\t\toMyPreFetch.add('".$parent."/".$val."');\n";
								}
							}							
						}
					}else{
						if($bSubFolders)
							$data .= _Genlist($Files[$key], $parent.'/'.$key, $FileWC, $bSubFolders);
					}
				}
			}
			
			return $data;
		}
	}
	//fix FolderPath
	if(substr($FolderPath, -1) == '/')	
		$FolderPath = substr($FolderPath, 0, -1);
	//build prelaod list	
	if(is_dir($FolderPath))
		return _Genlist(_GetFileList($FolderPath.'/'), $FolderPath, $FileWC, $bSubFolders);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Imageview 6 :: By Jorge Schrauwen</title>
<link href="favicon.ico" rel="shortcut icon" />
<script type="text/javascript" src="system/javascript/jXCore/jXCore.js"></script>
<script type="text/javascript">
//<![CDATA[
	//jXCore Includes
	jXCore.include('ExtendedPreFetch', 'system/javascript/jXCore/');
	jXCore.include('CookieManager', 'system/javascript/jXCore/');
	
	//global variables
	var oCookieManager, oMyPreFetch;

	//preload imageview files
	function iv_load(){
		//reset oMyPreFetch
		oMyPreFetch.clear();
		oMyPreFetch.sizecheck(<?php print ($imageview->config->preload_sizecheck()) ? "true" : "false"; ?>);
		oMyPreFetch.onsizecheckcomplete = function() {
			$('oFStatus').innerHTML = '&nbsp;Files loaded: <span id="oFDone">0/' + oMyPreFetch.FileList.length + '</span> ...'; //set file counter
			$('oFProgress').style.display = '';
		};
		oMyPreFetch.oncomplete = function(){
			//set cookie and reload
			oCookieManager.create('ivPreloaded', true, '', '', location.pathname.replace('preload.php', ''));
			setTimeout("location.replace('<?php echo str_replace('preload.php', 'main.php', $_SERVER['REQUEST_URI']); ?>');", 250);		
		};
		oMyPreFetch.onprogress = function(oProgress){
			//update status text
			if($('oFDone')) $('oFDone').innerHTML = oProgress.file.transfured + '/' + oProgress.file.total;
			
			var iProc = (oMyPreFetch.checksize) ? 
				Math.round((100/oProgress.size.total)*oProgress.size.transfured) : 
				Math.round((100/oProgress.file.total)*oProgress.file.transfured);
							
			//Update Progressbars
			var barSpace = 178;
			var pgb_left = 'system/images/loadbar/<?php echo $color; ?>/pgb_left.png';
			var pgb_fill = 'system/images/loadbar/<?php echo $color; ?>/pgb_fill.png';
			var pgb_right = 'system/images/loadbar/<?php echo $color; ?>/pgb_right.png';
			
			//oFProgress
			if(oProgress.file.transfured > 1){
				if($('imgFPLeft') == null){ //add left size if not present
					$('oFProgress').innerHTML = '<img id="imgFPLeft" src="' + pgb_left + '" width="2" height="12" />';
				}
			}
			
			if(oProgress.file.transfured > 1){
				var width = Math.round((barSpace/100)*iProc);
				if((width-1) !== 0){
					if(width >= barSpace){
						width = (barSpace-2);
					}else{
						width = (width-1);
					}
					if($('imgFPFill') == null){
						$('oFProgress').innerHTML += '<img id="imgFPFill" src="' + pgb_fill + '" width="' + width + '" height="12" />';	
					}else{
						$('imgFPFill').style.width = width + 'px';
					}
				}
			}
			
			if(oProgress.file.transfured == oProgress.file.total){
				if($('imgFPRight') == null){
					$('oFProgress').innerHTML += '<img id="imgFPRight" src="' + pgb_right + '" width="2" height="12" />';
				}
			}
			
		};
		
		<?php
			echo "//core files\n";
			echo "\t\toMyPreFetch.add('favicon.ico');\n";
			echo "\t\toMyPreFetch.add('albumtree.php');\n";
			echo "\t\toMyPreFetch.add('admin/config.xml');\n";
			echo PreLoadInclude('system/style/', '', true);		
			echo PreLoadInclude('system/images/');	
			echo PreLoadInclude('system/images/icons/', '', true);
			echo PreLoadInclude('system/images/interface/', '', true);
			
			echo "\t\t//javascript files\n";
			echo PreLoadInclude('system/javascript/', 'js', true);	
			
			echo "\t\t//skin files\n";
			if(isset($skin['style'])){
				if(isset($skin['style']['file'])){
					echo "\t\toMyPreFetch.add('system/skins/".$skin['name']."/".$skin['style']['file']."');\n";
				}elseif(is_array($skin['style'])){
					foreach($skin['style'] as $sheet){
						echo "\t\toMyPreFetch.add('system/skins/".$skin['name']."/".$sheet['file']."');\n";	
					}
				}
			}
			echo PreLoadInclude('system/skins/'.$skin['name'].'/images/', '', true);
			
			echo "\t\t//help files\n";
			echo PreLoadInclude('help/books/', 'xml');	
		?>
		oMyPreFetch.start(); //start preloading
	}
	
	//startup function
	function init(){
		//initialize objects
		oCookieManager = jXCore.CookieManager;
		oMyPreFetch = new jXCore.PreFetch;
	
		//preload progressbar images
		oMyPreFetch.clear();
		oMyPreFetch.oncomplete = function(){
			iv_load(); //start loading the required files
		}
		oMyPreFetch.add('system/images/loadbar/progressbar_bg.png');
		oMyPreFetch.add('system/images/loadbar/<?php echo $color; ?>/pgb_left.png');
		oMyPreFetch.add('system/images/loadbar/<?php echo $color; ?>/pgb_fill.png');
		oMyPreFetch.add('system/images/loadbar/<?php echo $color; ?>/pgb_right.png');
		oMyPreFetch.start()
	
	}
//]]>
</script>
<style type="text/css">
body{
	background-color: #FAFAFA;
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}

#frmLoading{
	background-color: #EEEEEE;
	border: #999999 solid 1px;
	width: 200px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 50px;
}

#iTitleBar{
	border-bottom: #999999 solid 1px;
	background-color: #CCCCCC;
	font-weight: bold;
	text-align: center;
	height: 15px;
}

#iContentBox{ padding: 9px; } 

.iProgressbar{
	height: 14px;
	padding: 1px;
	background: top no-repeat url(system/images/loadbar/progressbar_bg.png);
}
</style>
</head>

<body onload="init(); ">
	<div id="frmLoading" onclick="oMyPreFetch.skip();">
		<div id="iTitleBar">:: Imageview 6 ::</div>
		<div id="iContentBox">
			<div id="oFStatus">&nbsp;Checking files...</div>
			<div id="oFProgress" class="iProgressbar" style="display: none;">&nbsp;</div>
		</div>
	</div>
	<!--
		progressbar size: 180x12;
		fill image: 1x12;
		left image: 2x12;
		right image: 2x12;
		background image: 180x12 + 1px border = 182x14;
	-->
</body>
</html>
