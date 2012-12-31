<?php
/******************************************\
| Imageview 6 :: AJAX Edition              |
| By Jorge Schrauwen                       |
\******************************************/
//create core
require('system/core/imageview.php');
$imageview = &new imageview();

//get skin
$skin = $imageview->skin();

if($_GET['action'] == 'upload'){
	if(@is_uploaded_file($_FILES['imgFile']['tmp_name'])){
		if(!file_exists('albums/'.$_POST['album'].'/'.$_FILES['imgFile']['name'])){
			//read settings
			$tools = new tools();
			$ConfigXML = $tools->xml('admin/config.xml');
			$imagemagick = $ConfigXML['imageview']['settings']['imagemagick'];
			$library = $ConfigXML['imageview']['settings']['library'];
			$tn_width = $ConfigXML['imageview']['settings']['thumbnails']['width'];
			$tn_height = $ConfigXML['imageview']['settings']['thumbnails']['height'];
			$tn_quality = $ConfigXML['imageview']['settings']['thumbnails']['quality'];
			//check file type
			$filecheck = false;	
			if(strtolower($library) == 'imagemagick'){
				if(($_FILES['imgFile']['type'] == 'image/jpeg') ||
					($_FILES['imgFile']['type'] == 'image/pjpeg') ||
					($_FILES['imgFile']['type'] == 'image/png') ||
					($_FILES['imgFile']['type'] == 'image/x-png') ||
					($_FILES['imgFile']['type'] == 'image/gif') ||
					($_FILES['imgFile']['type'] == 'image/tiff') ||
					($_FILES['imgFile']['type'] == 'image/bmp')){
					$filecheck = true;	
				}
			}else{
				if(($_FILES['imgFile']['type'] == 'image/jpeg') ||
					($_FILES['imgFile']['type'] == 'image/pjpeg') ||
					($_FILES['imgFile']['type'] == 'image/png') ||
					($_FILES['imgFile']['type'] == 'image/x-png')){
					$filecheck = true;	
				}
			}
			if($filecheck){
				if(@move_uploaded_file($_FILES['imgFile']['tmp_name'], 'albums/'.$_POST['album'].'/'.$_FILES['imgFile']['name'])){	//generate thumbnail
					require_once('system/core/jImageProcessor.php');
					
					//setup ImageProcessor
					$ImgProcessor = &new jImageProcessor();
					$ImgProcessor->setup($imagemagick, $tn_quality, true);
					
					//save thumbnail
					if(strtolower($library) == 'imagemagick'){
						$ImgRes = $ImgProcessor->imagemagick->load('albums/'.$_POST['album'].'/'.$_FILES['imgFile']['name']);
						$ImgRes = $ImgProcessor->imagemagick->resize($ImgRes, $tn_width, $tn_height);
						$ImgProcessor->imagemagick->save($ImgRes, 'albums/'.$_POST['album'].'/thumbs/tn_'.$_FILES['imgFile']['name']);
					}else{
						$ImgRes = $ImgProcessor->gd->load('albums/'.$_POST['album'].'/'.$_FILES['imgFile']['name']);
						$ImgRes = $ImgProcessor->gd->resize($ImgRes, $tn_width, $tn_height);
						$ImgProcessor->gd->save($ImgRes, 'albums/'.$_POST['album'].'/thumbs/tn_'.$_FILES['imgFile']['name']);
					}
					
					if(file_exists('albums/'.$_POST['album'].'/thumbs/tn_'.$_FILES['imgFile']['name'])){	
						$tools = new tools();
						$albumXML = $tools->xml('albums/'.$_POST['album'].'/index.xml');			
						$albumXML = $albumXML['imageview']['album'];
						require('system/core/extentions/album_template.inc');
						
						if($albumXML['information']['upload'] == 'yes'){ //check if uploading is allowed
							if(is_array($albumXML['files']['image'][0])){
								foreach($albumXML['files']['image'] as $fileInfo){
									if(!empty($fileInfo['file'])){
										$fileList[($fileInfo['file'])]['name'] = $fileInfo['name'];
										$fileList[($fileInfo['file'])]['visible'] = $fileInfo['visible'];
										$fileList[($fileInfo['file'])]['description'] = $fileInfo['description'];
									}
								}
							}else{
								if(!empty($albumXML['files']['image']['file'])){
									$fileList[($albumXML['files']['image']['file'])]['name'] = $albumXML['files']['image']['name'];
									$fileList[($albumXML['files']['image']['file'])]['visible'] = $albumXML['files']['image']['visible'];
									$fileList[($albumXML['files']['image']['file'])]['description'] = $albumXML['files']['image']['description'];
								}
							}
		
							//set default label
							if($_POST['txtLabel'] == '')
								$_POST['txtLabel'] = substr(substr($_FILES['imgFile']['name'], 0, strrpos($_FILES['imgFile']['name'], '.')), 0, 20);
							
							//add file
							$fileList[($_FILES['imgFile']['name'])]['name'] = $_POST['txtLabel'];
							$fileList[($_FILES['imgFile']['name'])]['visible'] = 'true';
							$fileList[($_FILES['imgFile']['name'])]['description'] = stripslashes($_POST['txtDescription']);
							
							ksort($fileList);		
							
							//update index.xml
							$index_xml = str_replace('%DESCRIPTION%', $albumXML['information']['description'], $index_xml);
							$index_xml = str_replace('%PASSWORD%', $albumXML['information']['password'], $index_xml);
							$index_xml = str_replace('%UPLOAD%', $albumXML['information']['upload'], $index_xml);
							$files = '';
									
							foreach($fileList as $fileInfo => $fileData){
								$files .= "\n\t\t\t".'<image visible="'.$fileData['visible'].'">';
								$files .= "\n\t\t\t\t".'<file><![CDATA['.$fileInfo.']]></file>';
								$files .= "\n\t\t\t\t".'<name><![CDATA['.$fileData['name'].']]></name>';
								$files .= "\n\t\t\t\t".'<description><![CDATA['.$fileData['description'].']]></description>';
								$files .= "\n\t\t\t".'</image>';
							}			
							$index_xml = str_replace('%FILES%', $files, $index_xml);
										
							//make file writable
							$mask = umask(0);
							chmod('albums/'.$_POST['album'].'/index.xml', 0777);
							umask($mask);
							
							//write xml to file
							$cfgFile = fopen('albums/'.$_POST['album'].'/index.xml', 'w') or $msg = 'ERR';
							fwrite($cfgFile, $index_xml);
							fclose($cfgFile);			
							
							if($msg !== 'ERR') $msg = '<font color="green">Complete!</font>';
							else $msg = '<font color="red">Updating index failed!</font>';
						}else{
							$msg = '<font color="red">Bad Haxor! Go read a book or something. Nice try though!</font>'; 
							@unlink('albums/'.$_POST['album'].'/thumbs/tn_'.$_FILES['imgFile']['name']);
							@unlink('albums/'.$_POST['album'].'/'.$_FILES['imgFile']['name']);
						}
					}else $msg = '<font color="red">Generating thumbnail failed!</font>';
				}else $msg = '<font color="red">Copy to album failed!</font>';
			}else $msg = '<font color="red">Wrong filetype!</font>';
		}else $msg = '<font color="red">File allready exists!</font>';
	}else $msg = '<font color="red">Upload failed!</font>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Imageview 6 :: Upload Image</title>
<style type="text/css">
	<?php
	if(isset($skin['style'])){
		echo "/* skin dependent styles */\n";
		if(isset($skin['style']['file'])){
			echo "\t".'@import "system/skins/'.$skin['name'].'/'.$skin['style']['file'].'";'."\n";
		}elseif(is_array($skin['style'])){
			foreach($skin['style'] as $sheet){
				echo "\t".'@import "system/skins/'.$skin['name'].'/'.$sheet['file'].'";'."\n";	
			}
		}
	}

	?>
</style>
<script type="text/javascript" src="system/javascript/jXCore/jXCore.js"></script>
<script type="text/javascript">
//<![CDATA[
	//jXCore Includes
	jXCore.include('Utils', 'system/javascript/jXCore/');
		
	//functions
	function upload(){
		if($('imgFile').value !== ''){
			//fix label & descripotion content
			$('txtLabel').value = $('txtLabel').value.stripHTML();
			$('txtDescription').value = $('txtDescription').value.stripHTML();
			
			//upload
			$('frmUpload').submit();
			
			//disable controle
			$('txtDescription').disabled = true;
			$('txtLabel').disabled = true;
			$('imgFile').disabled = true;
			$('cmdUpload').disabled = true;
		}
	}
	
	function CloseWindow(){
		window.opener.location.href = 'main.php?album=' + window.opener.oImageview.state.album;
		window.close();
	}
	
	function ReloadWindow(){
		location.href = location.href.replace(location.search, '?album=<?php echo $_POST['album']; ?>');
	}
//]]>
</script>
</head>

<body>
	<?php if(isset($msg)){ ?>
		<table width="100%" height="80" border="0" cellspacing="0" cellpadding="1">
		  <tr>
			<td align="center" valign="middle">
				<?php echo $msg; ?><br />
				<?php if(substr($msg, 13, 3) == 'red') { ?><input type="button" value="Back" onclick="ReloadWindow();" />&nbsp;<?php } ?><input type="button" value="Close" onclick="CloseWindow();" />
			</td>
		  </tr>
		</table>

	<?php }else{ ?>
	<form id="frmUpload" action="upload.php?action=upload" method="post" enctype="multipart/form-data" target="_self">
		<table width="100%" border="0" cellspacing="0" cellpadding="1">
		  <tr>
			<td width="80"><strong>Name:</strong></td>
			<td><input id="txtLabel" name="txtLabel" type="text" maxlength="20" style="width: 305px;" /></td>
		  </tr>
		  <tr>
			<td><strong>Description:</strong></td>
			<td><input id="txtDescription" name="txtDescription" type="text"  style="width: 305px;" /></td>
		  </tr>
		  <tr>
			<td><strong>File:</strong></td>
			<td><input id="imgFile" name="imgFile" type="file" />&nbsp;<input id="cmdUpload" type="button" value="Upload" onclick="upload()" /></td>
		  </tr>
		</table>
		<input id="txtAlbum" name="album" type="hidden" value="<?php echo utf8_decode($_GET['album']) ?>" />
	</form>
	<?php } ?>
</body>
</html>
