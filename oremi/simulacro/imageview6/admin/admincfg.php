<?php
	//generate header
	if(($_GET['action'] !== 'upload') && ($_GET['action'] !== 'uplform') && ($_GET['action'] !== 'buildthumbs')){
		header('Content-Type: application/xml');
		echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
	}

	if(!function_exists('authenticate')) exit;
	
	//open cfg file
	$cfgXML = file_get_contents('pages/cfg.inc');
	function saveXML($cfgXML, $msg){
		//make file writable
		$mask = umask(0);
		chmod('config.xml', 0777);
		umask($mask);
		
		//write xml to file
		$cfgFile = fopen('config.xml', 'w') or $msg = '<font color="red">Can\'t upated config.xml. <a href="javascript:OpenPage(\'troubleshooting\');">Check File Permissions</a>!</font>';
		fwrite($cfgFile, $cfgXML);
		fclose($cfgFile);		
		
		//output message		
		echo "<message>\n";
		echo "\t<![CDATA[".$msg."]]>\n";
		echo "</message>";
	}
	
	//cfg handler
	if($_GET['action'] == 'savecfg'){

		//update config
		$cfgXML = str_replace('%encode%', $_POST['encode'], $cfgXML);
		$cfgXML = str_replace('%library%', $_POST['library'], $cfgXML);
		$cfgXML = str_replace('%impath%', $_POST['impath'], $cfgXML);
		$cfgXML = str_replace('%tnwidth%', $_POST['tnwidth'], $cfgXML);
		$cfgXML = str_replace('%tnheight%', $_POST['tnheight'], $cfgXML);
		$cfgXML = str_replace('%tnquality%', $_POST['tnquality'], $cfgXML);
		$cfgXML = str_replace('%antext%', utf8_decode($_POST['antext']), $cfgXML);
		$cfgXML = str_replace('%ancolor%', $_POST['ancolor'], $cfgXML);
		$cfgXML = str_replace('%cache%', $_POST['cache'], $cfgXML);
		$cfgXML = str_replace('%imgprotect%', $_POST['imgprotect'], $cfgXML);
		$cfgXML = str_replace('%defablum%', utf8_decode($_POST['defablum']), $cfgXML);
		$cfgXML = str_replace('%template%', $_POST['template'], $cfgXML);
		$cfgXML = str_replace('%rss%', $_POST['rss'], $cfgXML);
		$cfgXML = str_replace('%pl_ui%', $_POST['pl_ui'], $cfgXML);
		$cfgXML = str_replace('%pl_albums%', $_POST['pl_albums'], $cfgXML);
		$cfgXML = str_replace('%pl_images%', $_POST['pl_images'], $cfgXML);
		$cfgXML = str_replace('%pl_sizecheck%', $_POST['pl_sizecheck'], $cfgXML);
		$cfgXML = str_replace('%sstime%', $_POST['sstime'], $cfgXML);
		$cfgXML = str_replace('%key%', $_POST['license'], $cfgXML);
		if(file_exists('license.key')){ //delete license.key
			if(isset($_POST['license'])){
				$mask = umask(0);
				chmod('license.key', 0755);
				umask($mask);
				unlink('license.key');
			}
		}

		//insert users	
		$tools = new tools();
		$userXML = $tools->xml('config.xml');
		$userXML = $userXML['imageview'];
		
		$users = '';
		if(is_array($userXML['users']['user'][0])){
			foreach($userXML['users']['user'] as $UID){
				if($users !== "") $users .= "\n";
				$users .= "\t\t".'<user name="'.$UID['name'].'" password="'.$UID['password'].'" type="'.$UID['type'].'" />';
			}
		}else{
			$users = "\t\t".'<user name="'.$userXML['users']['user']['name'].'" password="'.$userXML['users']['user']['password'].'" type="'.$userXML['users']['user']['type'].'" />';
		}
		$cfgXML = str_replace('%users%', $users, $cfgXML);
		
		//update cfg
		$msg = '<font color="green">Settings updated!</font>';
		saveXML($cfgXML, $msg);
		
		//clear cache
		if(($_POST['cache'] == 'false') || ($_POST['antext'] == '')){
			if(is_dir("../cache/")) $tools->remove_directory("../cache/");	
		}			
	}elseif($_GET['action'] == 'getuser'){
		$tools = new tools();
		$userXML = $tools->xml('config.xml');
		$userXML = $userXML['imageview'];
		
		if(is_array($userXML['users']['user'][0])){
			foreach($userXML['users']['user'] as $UID){
				if($_GET['user'] == $UID['name'])
					echo '<userinfo name="'.$UID['name'].'" type="'.$UID['type'].'" />';
			}
		}else{
			if($_GET['user'] == $userXML['users']['user']['name'])
				echo '<userinfo name="'.$userXML['users']['user']['name'].'" type="'.$userXML['users']['user']['type'].'" />';
		}
	}elseif($_GET['action'] == 'deleteuser'){
		if(($_GET['user'] == '') || ($_GET['user'] == $_SERVER['PHP_AUTH_USER'])){
			exit;
		}
	
		$tools = new tools();
		$configXML = $tools->xml('config.xml');
		$userXML = $configXML['imageview'];
		$LicenseKey = $configXML['imageview']['key'];
		$configXML = $configXML['imageview']['settings'];
		
		//build array
		if(is_array($userXML['users']['user'][0])){
			foreach($userXML['users']['user'] as $UID){
				if($UID['name'] !== $_GET['user']){
					$userList[($UID['name'])]['password'] = $UID['password'];
					$userList[($UID['name'])]['type'] = $UID['type'];
				}
			}
		}else{
			if($userXML['users']['user']['name'] !== $_GET['user']){
				$userList[($userXML['users']['user']['name'])]['password'] = $userXML['users']['user']['password'];
				$userList[($userXML['users']['user']['name'])]['type'] = $userXML['users']['user']['type'];
			}
		}
		ksort($userList);
		
		//copy settings
		$cfgXML = str_replace('%encode%', $configXML['encode'], $cfgXML);
		$cfgXML = str_replace('%library%', $configXML['library'], $cfgXML);
		$cfgXML = str_replace('%impath%', $configXML['imagemagick'], $cfgXML);
		$cfgXML = str_replace('%tnwidth%', $configXML['thumbnails']['width'], $cfgXML);
		$cfgXML = str_replace('%tnheight%', $configXML['thumbnails']['height'], $cfgXML);
		$cfgXML = str_replace('%tnquality%', $configXML['thumbnails']['quality'], $cfgXML);
		$cfgXML = str_replace('%antext%', $configXML['annotation']['text'], $cfgXML);
		$cfgXML = str_replace('%ancolor%', $configXML['annotation']['color'], $cfgXML);
		$cfgXML = str_replace('%cache%', $configXML['cache'], $cfgXML);
		$cfgXML = str_replace('%imgprotect%', $configXML['imageprotection'], $cfgXML);
		$cfgXML = str_replace('%defablum%', $configXML['display']['default'], $cfgXML);
		$cfgXML = str_replace('%template%', $configXML['display']['skin'], $cfgXML);
		$cfgXML = str_replace('%rss%', $configXML['display']['rss'], $cfgXML);
		$cfgXML = str_replace('%pl_ui%', $configXML['display']['preload']['interface'], $cfgXML);
		$cfgXML = str_replace('%pl_albums%', $configXML['display']['preload']['albums'], $cfgXML);
		$cfgXML = str_replace('%pl_images%', $configXML['display']['preload']['images'], $cfgXML);
		$cfgXML = str_replace('%pl_sizecheck%', $configXML['display']['preload']['sizecheck'], $cfgXML);
		$cfgXML = str_replace('%sstime%', $configXML['display']['slideshow'], $cfgXML);
		if(strlen($LicenseKey) > 10) $LicenseKey = "\n\t<key>".$LicenseKey."</key>";
		$cfgXML = str_replace('%key%', $LicenseKey, $cfgXML);
		
		//update users
		$users = '';
		foreach($userList as $UID => $Data){
			if($users !== "") $users .= "\n";
			$users .= "\t\t".'<user name="'.$UID.'" password="'.$Data['password'].'" type="'.$Data['type'].'" />';
		}
		$cfgXML = str_replace('%users%', $users, $cfgXML);
		
		//update cfg
		$msg = 'OK';
		saveXML($cfgXML, $msg);	
	}elseif($_GET['action'] == 'updateuser'){
		$tools = new tools();
		$configXML = $tools->xml('config.xml');
		$userXML = $configXML['imageview'];
		$LicenseKey = $configXML['imageview']['key'];
		$configXML = $configXML['imageview']['settings'];
		
		//build array
		if(is_array($userXML['users']['user'][0])){
			foreach($userXML['users']['user'] as $UID){
				if($UID['name'] !== $_POST['name']){
					$userList[($UID['name'])]['password'] = $UID['password'];
					$userList[($UID['name'])]['type'] = $UID['type'];
				}else{
					if($_GET['mode'] == 'create'){
						echo "<message>\n";
						echo "\t<![CDATA[<font color=\"red\">User already exists!</font>]]>\n";
						echo "</message>";
						exit;
					}
				}
			}
		}else{
			if($userXML['users']['user']['name'] !== $_POST['name']){
				$userList[($userXML['users']['user']['name'])]['password'] = $userXML['users']['user']['password'];
				$userList[($userXML['users']['user']['name'])]['type'] = $userXML['users']['user']['type'];
			}else{
				if($_GET['mode'] == 'create'){
					echo "<message>\n";
					echo "\t<![CDATA[<font color=\"red\">User already exists!</font>]]>\n";
					echo "</message>";
					exit;
				}
			}
		}
		
		//add new user
		if(($_GET['mode'] == 'create') || ($_POST['password'] !== '_iv6dummypw_')){
			$userList[($_POST['name'])]['password'] = sha1($_POST['password']);
		}else{
			if(is_array($userXML['users']['user'][0])){
				foreach($userXML['users']['user'] as $UID){
					if($UID['name'] == $_POST['name'])
						$userList[($_POST['name'])]['password'] = $UID['password'];
				}
			}else{
				$userList[($_POST['name'])]['password'] = $userXML['users']['user']['password'];
			}
		}
		$userList[($_POST['name'])]['type'] = $_POST['type'];
		ksort($userList, SORT_STRING);
		
		//copy settings
		$cfgXML = str_replace('%encode%', $configXML['encode'], $cfgXML);
		$cfgXML = str_replace('%library%', $configXML['library'], $cfgXML);
		$cfgXML = str_replace('%impath%', $configXML['imagemagick'], $cfgXML);
		$cfgXML = str_replace('%tnwidth%', $configXML['thumbnails']['width'], $cfgXML);
		$cfgXML = str_replace('%tnheight%', $configXML['thumbnails']['height'], $cfgXML);
		$cfgXML = str_replace('%tnquality%', $configXML['thumbnails']['quality'], $cfgXML);
		$cfgXML = str_replace('%antext%', $configXML['annotation']['text'], $cfgXML);
		$cfgXML = str_replace('%ancolor%', $configXML['annotation']['color'], $cfgXML);
		$cfgXML = str_replace('%cache%', $configXML['cache'], $cfgXML);
		$cfgXML = str_replace('%imgprotect%', $configXML['imageprotection'], $cfgXML);
		$cfgXML = str_replace('%defablum%', $configXML['display']['default'], $cfgXML);
		$cfgXML = str_replace('%template%', $configXML['display']['skin'], $cfgXML);
		$cfgXML = str_replace('%rss%', $configXML['display']['rss'], $cfgXML);
		$cfgXML = str_replace('%pl_ui%', $configXML['display']['preload']['interface'], $cfgXML);
		$cfgXML = str_replace('%pl_albums%', $configXML['display']['preload']['albums'], $cfgXML);
		$cfgXML = str_replace('%pl_images%', $configXML['display']['preload']['images'], $cfgXML);
		$cfgXML = str_replace('%pl_sizecheck%', $configXML['display']['preload']['sizecheck'], $cfgXML);
		$cfgXML = str_replace('%sstime%', $configXML['display']['slideshow'], $cfgXML);
		if(strlen($LicenseKey) > 10) $LicenseKey = "\n\t<key>".$LicenseKey."</key>";
		$cfgXML = str_replace('%key%', $LicenseKey, $cfgXML);
		
		//update users
		$users = '';
		foreach($userList as $UID => $Data){
			if($users !== '') $users .= "\n";
			$users .= "\t\t".'<user name="'.$UID.'" password="'.$Data['password'].'" type="'.$Data['type'].'" />';
		}
		$cfgXML = str_replace('%users%', $users, $cfgXML);
		
		//update cfg
		if($_GET['mode'] == 'create')
			$msg = '<font color="green">User <strong>'.$_POST['name'].'</strong> has been created!</font>';
		else
			$msg = '<font color="green">User <strong>'.$_POST['name'].'</strong> has been updated!</font>';
		saveXML($cfgXML, $msg);	

	}elseif($_GET['action'] == 'fixperms'){
		function rchmod($path, $filemode){ //recursive chmod
			//fix $path
			if(substr($path, -1) == '/') $path = substr($path, 0, -1);
			
			//it's a file
			if(is_file($path)) return chmod($path, $filemode);
			
			//it's a directory
			$handle = dir($path);
			while(false !== ($file = $handle->Read())){
				if($file != '.' && $file != '..'){
					$fullpath = $path.'/'.$file;
					if(!is_dir($fullpath)){
						if(!chmod($fullpath, $filemode)) return false;
					}else{
						if(!rchmod($fullpath, $filemode)) return false;
					}
				}
			}
			$handle->close();
			
			return chmod($path, $filemode);
		}
		
		//fix target (%root% -> ..) - mod_security blocks ../ in url
		$_GET['target'] = str_replace('%root%', '..', $_GET['target']);
		//do chmod
		$mask = umask(0);
		rchmod($_GET['target'], 0777);
		umask($mask);
	}elseif($_GET['action'] == 'buildthumbs'){
		require_once('../system/core/jImageProcessor.php');
		
		function createThumb($ImgProc, $library, $tn_width, $tn_height, $album, $file){
			@unlink('../albums/'.$album.'/thumbs/tn_'.$file);
			if(strtolower($library) == 'imagemagick'){
				$ImgRes = $ImgProc->imagemagick->load('../albums/'.$album.'/'.$file);
				$ImgRes = $ImgProc->imagemagick->resize($ImgRes, $tn_width, $tn_height);
				$ImgProc->imagemagick->save($ImgRes, '../albums/'.$album.'/thumbs/tn_'.$file);
			}else{
				$ImgRes = $ImgProc->gd->load('../albums/'.$album.'/'.$file);
				$ImgRes = $ImgProc->gd->resize($ImgRes, $tn_width, $tn_height);
				$ImgProc->gd->save($ImgRes, '../albums/'.$album.'/thumbs/tn_'.$file);
			}
		}
		
		//read settings
		$tools = new tools();
		$ConfigXML = $tools->xml('config.xml');
		$imagemagick = $ConfigXML['imageview']['settings']['imagemagick'];
		$library = $ConfigXML['imageview']['settings']['library'];
		$tn_width = $ConfigXML['imageview']['settings']['thumbnails']['width'];
		$tn_height = $ConfigXML['imageview']['settings']['thumbnails']['height'];
		$tn_quality = $ConfigXML['imageview']['settings']['thumbnails']['quality'];
		
		//read index
		$albumXML = $tools->xml('../albums/'.utf8_decode($_GET['album']).'/index.xml');			
		$albumXML = $albumXML['imageview']['album'];
		
		//setup ImageProcessor
		$ImgProcessor = &new jImageProcessor();
		$ImgProcessor->setup($imagemagick, $tn_quality, true);
		
		if(is_array($albumXML['files']['image'][0])){
			foreach($albumXML['files']['image'] as $fileInfo){
				if(!empty($fileInfo['file'])){
					createThumb($ImgProcessor, $library, $tn_width, $tn_height, utf8_decode($_GET['album']), $fileInfo['file']);
				}
			}
		}else{
			if(!empty($albumXML['files']['image']['file'])){
				createThumb($ImgProcessor, $library, utf8_decode($_GET['album']), $albumXML['files']['image']['file']);
			}
		}
	}elseif($_GET['action'] == 'albcheck'){
		require('../system/core/extentions/manager.php');
		$manager = new manager();
		if($_GET['album'] !== ''){
			$MyAlbum = $manager->album(utf8_decode($_GET['album']));
			$ret = explode('|', $MyAlbum->check());
			if($ret[0] == 'OK') $msg = $ret[1];	
			else $msg = 'ERR';
		}else $msg = 'ERR';
		//send message to client
		echo "<message>\n";
		echo "\t<![CDATA[".$msg."]]>\n";
		echo "</message>";	
	}elseif($_GET['action'] == 'rmAlbum'){
		require('../system/core/extentions/manager.php');
		$manager = new manager();
		
		if($_POST['album'] !== ''){
			$MyAlbum = $manager->album(utf8_decode($_POST['album']));
			if($MyAlbum->remove()){
				$msg = '<font color="green"><strong>'.$MyAlbum->getName().'</strong> has been removed!</font>';
			}else{
				$msg = '<font color="red">'.$MyAlbum->error.'</font>';
			}
		}else{
			$msg = '<font color="red">No album specified!</font>';
		}
			
		//send message to client
		echo "<message>\n";
		echo "\t<![CDATA[".$msg."]]>\n";
		echo "</message>";	
	}elseif($_GET['action'] == 'mkAlbum'){
		require('../system/core/extentions/manager.php');
		$manager = new manager();
		
		if($_POST['album'] !== ''){		
			$MyAlbum = $manager->album(utf8_decode($_POST['album']));
			
			if($MyAlbum->create($_POST['desc'], $_POST['password'], $_POST['upload'])){
				$msg = '<font color="green"><strong>'.$MyAlbum->getName().'</strong> has been created!</font>';
			}else{
				$msg = '<font color="red">'.$MyAlbum->error.'</font>';
			}
		}else{
			$msg = '<font color="red">No album specified!</font>';
		}
		
		//send message to client
		echo "<message>\n";
		echo "\t<![CDATA[".$msg."]]>\n";
		echo "</message>";
	}elseif($_GET['action'] == 'updAlbum'){
		require('../system/core/extentions/manager.php');
		$manager = new manager();
		
		if($_POST['album'] !== ''){
			$MyAlbum = $manager->album(utf8_decode($_POST['album']));
			
			//rename album if needed
			if(isset($_POST['move'])){
				if(!$MyAlbum->move(utf8_decode($_POST['move']))) $msg = '<font color="red">'.$MyAlbum->error.'</font>';
			}
			
			//update album
			if($msg  == ''){
				if($_POST['password'] == '_iv6_password_') $_POST['password'] = false;
				if($MyAlbum->update($_POST['desc'], $_POST['password'], $_POST['upload'])){
					$msg = '<font color="green"><strong>'.$MyAlbum->getName().'</strong> has been updated!</font>';
				}else{
					$msg = '<font color="red">'.$MyAlbum->error.'</font>';
				}		
			}
		}else{
			$msg = '<font color="red">No album specified!</font>';
		}
		
		//send message to client
		echo "<message>\n";
		echo "\t<![CDATA[".$msg."]]>\n";
		echo "</message>";
	}elseif($_GET['action'] == 'rmImage'){
		//cache
		$tools = new tools();
		$ConfigXML = $tools->xml('config.xml');
		$AnnotationXML = $ConfigXML['imageview']['settings']['annotation'];
			
		$tools = new tools();
		$albumXML = $tools->xml('../albums/'.utf8_decode($_POST['album']).'/index.xml');			
		$albumXML = $albumXML['imageview']['album'];
		require('../system/core/extentions/album_template.inc');
		
		//remove image from file list
		if(is_array($albumXML['files']['image'][0])){
			foreach($albumXML['files']['image'] as $fileInfo){
				if($fileInfo['file'] !== utf8_decode($_POST['file'])){
					$fileList[($fileInfo['file'])]['name'] = $fileInfo['name'];
					$fileList[($fileInfo['file'])]['visible'] = $fileInfo['visible'];
					$fileList[($fileInfo['file'])]['description'] = $fileInfo['description'];
				}
			}
		}else{
			if($albumXML['files']['image']['file'] !== utf8_decode($_POST['file'])){
				$fileList[($albumXML['files']['image']['file'])]['name'] = $albumXML['files']['image']['name'];
				$fileList[($albumXML['files']['image']['file'])]['visible'] = $albumXML['files']['image']['visible'];
				$fileList[($albumXML['files']['image']['file'])]['description'] = $albumXML['files']['image']['description'];
			}
		}
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
		chmod('../albums/'.utf8_decode($_POST['album']).'/index.xml', 0777);
		umask($mask);
		
		//write xml to file
		$cfgFile = fopen('../albums/'.utf8_decode($_POST['album']).'/index.xml', 'w') or $msg = 'ERR';
		fwrite($cfgFile, $index_xml);
		fclose($cfgFile);			
		
		if($msg !== 'ERR'){
			if(@unlink('../albums/'.utf8_decode($_POST['album']).'/'.utf8_decode($_POST['file']))){
				@unlink('../albums/'.utf8_decode($_POST['album']).'/thumbs/tn_'.utf8_decode($_POST['file']));
				@unlink('../cache/'.utf8_decode($_POST['album']).'/'.utf8_decode($_POST['file']));		
				$msg = 'OK';
			}else{
				$msg = 'ERR';
			}
		}
		
		//send message to client
		echo "<message>\n";
		echo "\t<![CDATA[".$msg ."]]>\n";
		echo "</message>";	
	}elseif($_GET['action'] == 'updImage'){
		//file, album, name, desc, visible
		$tools = new tools();
		$albumXML = $tools->xml('../albums/'.utf8_decode($_POST['album']).'/index.xml');			
		$albumXML = $albumXML['imageview']['album'];
		require('../system/core/extentions/album_template.inc');
		
		//update image in file list
		if(is_array($albumXML['files']['image'][0])){
			foreach($albumXML['files']['image'] as $fileInfo){
				if($fileInfo['file'] !== utf8_decode($_POST['file'])){
					$fileList[($fileInfo['file'])]['name'] = $fileInfo['name'];
					$fileList[($fileInfo['file'])]['visible'] = $fileInfo['visible'];
					$fileList[($fileInfo['file'])]['description'] = $fileInfo['description'];
				}else{
					$fileList[($fileInfo['file'])]['name'] = stripslashes($_POST['name']);
					$fileList[($fileInfo['file'])]['visible'] = $_POST['visible'];
					$fileList[($fileInfo['file'])]['description'] = stripslashes($_POST['desc']);
				}
			}
		}else{
			if($albumXML['files']['image']['file'] !== utf8_decode($_POST['file'])){
				$fileList[($albumXML['files']['image']['file'])]['name'] = $albumXML['files']['image']['name'];
				$fileList[($albumXML['files']['image']['file'])]['visible'] = $albumXML['files']['image']['visible'];
				$fileList[($albumXML['files']['image']['file'])]['description'] = $albumXML['files']['image']['description'];
			}else{
				$fileList[($albumXML['files']['image']['file'])]['name'] = stripslashes($_POST['name']);
				$fileList[($albumXML['files']['image']['file'])]['visible'] = $_POST['visible'];
				$fileList[($albumXML['files']['image']['file'])]['description'] = stripslashes($_POST['desc']);
			}
		}
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
		chmod('../albums/'.utf8_decode($_POST['album']).'/index.xml', 0777);
		umask($mask);
		
		//write xml to file
		$cfgFile = fopen('../albums/'.utf8_decode($_POST['album']).'/index.xml', 'w') or $msg = 'ERR';
		fwrite($cfgFile, $index_xml);
		fclose($cfgFile);	
		
		if($msg  !== 'ERR') $msg  = 'OK';
		
		//send message to client
		echo "<message>\n";
		echo "\t<![CDATA[".$msg ."]]>\n";
		echo "</message>";
	}elseif($_GET['action'] == 'uplform'){
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Upload Image</title>
	<style type="text/css">
		@import url('../system/style/admin.css');
		body{
			margin: 0px;
			background: #EEEEEE;
		}
	</style>
	<script type="text/javascript">
	//<![CDATA[
		function upload(oSelf){
			var oStatusField = window.parent.$('oFile_<?php echo $_GET['id']; ?>').lastChild;
			var oStatusText = '<font color="orange">Uploading...</font>&nbsp;' + oStatusField.innerHTML;
			oStatusField.innerHTML = oStatusText;
			
			oSelf.parentNode.submit()
			oSelf.disabled = true;
		}
	//]]>
	</script>
	</head>
	
	<body>
		<form action="?action=upload" method="post" enctype="multipart/form-data" target="_self">
			<img src="../system/images/interface/admin/image.png" alt="" style="float: left; padding: 1px;" />
			<input name="imgFile" id="imgFile" type="file" style="height: 18px; border: 0px hidden white;" onchange="upload(this);"/>	
			<input name="album" type="hidden" value="<?php echo $_GET['album']; ?>" />
			<input name="statusField" type="hidden" value="oFile_<?php echo $_GET['id']; ?>" />
		</form>
	</body>
	</html>
	<?php	
	}elseif($_GET['action'] == 'upload'){
		if(@is_uploaded_file($_FILES['imgFile']['tmp_name'])){
			if(!file_exists('../albums/'.utf8_decode($_POST['album']).'/'.$_FILES['imgFile']['name'])){
				//read settings
				$tools = new tools();
				$ConfigXML = $tools->xml('config.xml');
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
					if(@move_uploaded_file($_FILES['imgFile']['tmp_name'], '../albums/'.utf8_decode($_POST['album']).'/'.$_FILES['imgFile']['name'])){				
						//generate thumbnail
						require_once('../system/core/jImageProcessor.php');
						
						//setup ImageProcessor
						$ImgProcessor = &new jImageProcessor();
						$ImgProcessor->setup($imagemagick, $tn_quality, true);
						
						//save thumbnail
						if(strtolower($library) == 'imagemagick'){
							$ImgRes = $ImgProcessor->imagemagick->load('../albums/'.utf8_decode($_POST['album']).'/'.$_FILES['imgFile']['name']);
							$ImgRes = $ImgProcessor->imagemagick->resize($ImgRes, $tn_width, $tn_height);
							$ImgProcessor->imagemagick->save($ImgRes, '../albums/'.utf8_decode($_POST['album']).'/thumbs/tn_'.$_FILES['imgFile']['name']);
						}else{
							$ImgRes = $ImgProcessor->gd->load('../albums/'.utf8_decode($_POST['album']).'/'.$_FILES['imgFile']['name']);
							$ImgRes = $ImgProcessor->gd->resize($ImgRes, $tn_width, $tn_height);
							$ImgProcessor->gd->save($ImgRes, '../albums/'.utf8_decode($_POST['album']).'/thumbs/tn_'.$_FILES['imgFile']['name']);
						}
						
						if(file_exists('../albums/'.utf8_decode($_POST['album']).'/thumbs/tn_'.$_FILES['imgFile']['name'])){	
							$tools = new tools();
							$albumXML = $tools->xml('../albums/'.utf8_decode($_POST['album']).'/index.xml');			
							$albumXML = $albumXML['imageview']['album'];
							require('../system/core/extentions/album_template.inc');
							
							//remove image from file list
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
		
							//add file
							$fileList[($_FILES['imgFile']['name'])]['name'] = stripslashes(htmlentities(substr(substr($_FILES['imgFile']['name'], 0, strrpos($_FILES['imgFile']['name'], '.')), 0, 20)));
							$fileList[($_FILES['imgFile']['name'])]['visible'] = 'true';
							$fileList[($_FILES['imgFile']['name'])]['description'] = '';
							
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
							chmod('../albums/'.utf8_decode($_POST['album']).'/index.xml', 0777);
							umask($mask);
							
							//write xml to file
							$cfgFile = fopen('../albums/'.utf8_decode($_POST['album']).'/index.xml', 'w') or $msg = 'ERR';
							fwrite($cfgFile, $index_xml);
							fclose($cfgFile);			
							
							if($msg !== 'ERR') $msg = '<font color="green">Complete!</font>';
							else $msg = '<font color="red">Updating index failed!</font>';
						}else $msg = '<font color="red">Generating thumbnail failed!</font>';
					}else $msg = '<font color="red">Copy to album failed!</font>';
				}else $msg = '<font color="red">Wrong filetype!</font>';
			}else $msg = '<font color="red">File allready exists!</font>';
		}else $msg = '<font color="red">Upload failed!</font>';
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Upload Image</title>
		<style type="text/css">
			@import url('../system/style/admin.css');
			body{
				margin: 0px;
				background: #EEEEEE;
			}
		</style>
		<script type="text/javascript">
		//<![CDATA[
			function updateStatus(){
				window.parent.$('<?php echo $_POST['statusField']; ?>').lastChild.innerHTML = '<?php echo $msg; ?>';
			}
		//]]>
		</script>
		</head>
		
		<body onload="updateStatus();">
		<img src="../system/images/interface/admin/image.png" alt="" align="absmiddle" style="padding: 1px;" />&nbsp;<?php echo substr($_FILES['imgFile']['name'], 0, strrpos($_FILES['imgFile']['name'], '.')); ?>
		</body>
		</html>
		<?php	
	}
?>