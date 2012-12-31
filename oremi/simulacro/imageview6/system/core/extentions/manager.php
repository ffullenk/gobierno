<?php
/*************************\
| Imageview 6             |
| By Jorge Schrauwen 2006 |
| http://www.blackdot.be  |
\*************************/
class manager{	
	function album($sAlbum, $sRoot=false){
		if(!$sRoot)
			return new album_manager($sAlbum);
		else
			return new album_manager($sAlbum, $sRoot);
	}
}

class album_manager{
	var $_root;
	var $_album;
	var $error;
	
	var $_tools;
	
	
	//internal routines
	function checkExists($sPath=false){
		if(!$sPath) $sPath = $this->_album;
		$aPath = explode('/', $sPath);
		
		$fullpath = $this->_root;
		$aReturn = array();
	
		//check path
		if(count($aPath) > 1){ 
			for ($i = 0; $i <= count($aPath)-2; $i++) {
				$fullpath .= '/'.$aPath[$i];
				if(is_file($fullpath.'/index.xml')){
					$this->error = '<strong>'.str_replace($this->_root.'/', '', $fullpath).'</strong> is an album!';
					return false;
				}
			}
		}
		$fullpath .= '/'.$aPath[count($aPath)-1];
		//check album
		if(is_file($fullpath.'/index.xml')){
			$this->error = 'An album with this name already exists!';
			return false;
		}elseif(is_dir($fullpath)){
			$this->error = 'There is a group with the path <strong>'.str_replace($this->_root.'/', '', $fullpath).'</strong>!';
			return false;
		}
		
		//all check passed :)
		$this->error = '';
		return true;
	}
	
	function save_file($name, $data){
		$f=@fopen($name,"w");
		if(!$f){
			return false;
		}else{
			fwrite($f,$data);
			fclose($f);
			return true;
		}
	}
			
	//public functions
	function album_manager($sPath, $sRoot='../albums'){ //php 4 workaround __construct
		//set root and path
		$sPath = str_replace('\\', '/', $sPath);
		if(substr($sPath, 0, 1) == '/') $sPath = substr($sPath, 1);	
		if(substr($sPath, -1) == '/') $sPath = substr($sPath, 0, -1);	
		$this->_album = $sPath;
		
		$sRoot = str_replace('\\', '/', $sRoot);
		if(substr($sRoot, -1) == '/') $sRoot = substr($sRoot, 0, -1);
		$this->_root = $sRoot;
		
		//initiate tools
		$this->_tools = new tools();
	}		
	
	function getName(){
		return $this->_album;
	}
	
	function check(){
		if(!function_exists('index_addfile')){
			function index_addfile($list, $aFileInfo){
				$list .= "\n\t\t\t".'<image visible="'.$aFileInfo['visible'].'">';
				$list .= "\n\t\t\t\t".'<file><![CDATA['.$aFileInfo['file'].']]></file>';
				$list .= "\n\t\t\t\t".'<name><![CDATA['.$aFileInfo['name'].']]></name>';
				$list .= "\n\t\t\t\t".'<description><![CDATA['.$aFileInfo['description'].']]></description>';
				$list .= "\n\t\t\t".'</image>';
				return $list;
			}
		}
	
		if(is_file($this->_root.'/'.$this->_album.'/index.xml')){
			$iAdd = 0;
			$iRemove = 0;
			$mask = umask(0);
			
			//get information
			$oIndex = $this->_tools->xml($this->_root.'/'.$this->_album.'/index.xml');
			$sDescription = $oIndex['imageview']['album']['information']['description'];
			$sPassword = $oIndex['imageview']['album']['information']['password'];
			$sUpload = $oIndex['imageview']['album']['information']['upload'];
			
			//get files
			$imgColection = '';
			$images = dir($this->_root.'/'.$this->_album);
			while (false !== ($file = $images->read())){
				if(is_file($this->_root.'/'.$this->_album.'/'.$file)){
					if((strtolower(substr($file, -4)) == '.jpg') ||
					   (strtolower(substr($file, -5)) == '.jpeg') ||
					   (strtolower(substr($file, -4)) == '.png') ||
					   (strtolower(substr($file, -4)) == '.bmp') ||
					   (strtolower(substr($file, -4)) == '.gif') ||
					   (strtolower(substr($file, -4)) == '.tif') ||
					   (strtolower(substr($file, -5)) == '.tiff')){	$imgColection .= $file.'|'; $iAdd++; }
				}
			}
			$images->close();
			
			//copy file index
			$sFiles = '';							
			if(is_array($oIndex['imageview']['album']['files']['image'][0])){
				foreach($oIndex['imageview']['album']['files']['image'] as $oImage){
					if(file_exists($this->_root.'/'.$this->_album.'/'.$oImage['file'])){
						$sFiles = index_addfile($sFiles, $oImage);
						$imgColection = str_replace($oImage['file'].'|', '', $imgColection);
						$iAdd--;
					}else{
						$bUpdate = true;
						$iRemove++;
					}
				}
			}else{
				if(isset($oIndex['imageview']['album']['files']['image']['file'])){
					if(file_exists($this->_root.'/'.$this->_album.'/'.$oIndex['imageview']['album']['files']['image']['file'])){
						$sFiles = index_addfile($sFiles, $oIndex['imageview']['album']['files']['image']);
						$imgColection = str_replace($oIndex['imageview']['album']['files']['image']['file'].'|', '', $imgColection);
						$iAdd--;
					}else{
						$bUpdate = true;
						$iRemove++;
					}
				}
			}
			
			//update with new files
			if(!empty($imgColection)){
				$imgColection = explode('|', $imgColection);
				$mask = umask(0);
				foreach($imgColection as $oImage){
					if(!empty($oImage)){
						$oImgData = '';
						$oImgData['file'] = $oImage;
						$oImgData['visible'] = 'true';
						$oImgData['name'] = substr(substr($oImage, 0, strrpos($oImage, '.')), 0, 20);
						$oImgData['description'] = '';			 
						$sFiles = index_addfile($sFiles, $oImgData);
						@chmod($this->_root.'/'.$this->_album.'/'.$oImage, 0777);
					}
				}
				umask($mask);
			}
			
			if(($iAdd+$iRemove) !== 0){
				//update files
				require('album_template.inc');
				$index_xml = str_replace('%DESCRIPTION%', $sDescription, $index_xml);
				$index_xml = str_replace('%PASSWORD%', $sPassword, $index_xml);
				$index_xml = str_replace('%UPLOAD%', $sUpload, $index_xml);
				$index_xml = str_replace('%FILES%', $sFiles, $index_xml);
				$this->save_file($this->_root.'/'.$this->_album.'/index.xml', $index_xml);
				chmod($this->_root.'/'.$this->_album.'/index.xml', 0777);
				
				//cleanup thumbnails
				$this->_tools->remove_directory($this->_root.'/'.$this->_album.'/thumbs');
				mkdir($this->_root.'/'.$this->_album.'/thumbs', 0777);
				umask($mask);
				$sMsg = 'OK|';
				if($iAdd !== 0){
					$sMsg .= $iAdd.' image';
					if($iAdd > 1) 	$sMsg .= 's';				
					$sMsg .= ' where added.';
					if($iRemoved !== 0) $sMsg .= "\n";
				}
				if($iRemove !== 0){
					$sMsg .= $iRemove.' image';
					if($iRemove > 1) 	$sMsg .= 's';				
					$sMsg .= ' where removed.';
				}		
				return $sMsg;
			}else{
				umask($mask);
				return false;
			}
		}else return false;
	}
	
	function create($sDescription=false, $sPassword=false, $sUpload=false){
		$aPath = explode('/', $this->_album);
	
		if($this->checkExists()){
			$mask = umask(0);
			
			//build path
			$fullpath = $this->_root;
			for ($i = 0; $i <= count($aPath)-1; $i++) {
				$fullpath .= '/'.$aPath[$i];
				if(!is_dir($fullpath))
					mkdir($fullpath.'/', 0777);
			}
			
			//setup album settings
			require('album_template.inc');
			if($sDescription == false) $sDescription = '';
			if($sPassword == false) $sPassword = 'no';
			if($sUpload == false) $sUpload = 'no';
						
			//create album files
			if($sPassword !== 'no') $sPassword = sha1($sPassword);
			$index_xml = str_replace('%DESCRIPTION%', $sDescription, $index_xml);
			$index_xml = str_replace('%PASSWORD%', $sPassword, $index_xml);
			$index_xml = str_replace('%UPLOAD%', $sUpload, $index_xml);
			$index_xml = str_replace('%FILES%', '', $index_xml);
			$this->save_file($fullpath.'/index.xml', $index_xml);
			chmod($fullpath.'/index.xml', 0777);
			
			$this->save_file($fullpath.'/index.htm', $index_htm);
			chmod($fullpath.'/index.htm', 0777);
						
			mkdir($fullpath.'/thumbs/', 0777);
			
			umask($mask);
			
			//return status
			$this->error = '';
			return true;
		}else return false;
	}
	
	function remove(){
		//cache path
		$tools = new tools();	
		$ConfigXML = $tools->xml(str_replace('albums', 'admin/config.xml', $this->_root));
		$ConfigXML = $ConfigXML['imageview']['settings']['annotation'];
		$cache_root = str_replace('albums', 'cache', $this->_root);
		if(!is_dir($cache_root)){
			$cache_root = '../dummy/';
		}
		
		$aPath = explode('/', $this->_album);
		
		//check if album exists
		if(is_file($this->_root.'/'.$this->_album.'/index.xml')){
			$this->_tools->remove_directory($this->_root.'/'.$this->_album);
			if(is_dir($cache_root.'/'.$this->_album)){
				$this->_tools->remove_directory($cache_root.'/'.$this->_album);
			}
			array_pop($aPath); //remove parent dir
		}
		//do groups
		while(count($aPath) != 0){ //try to delete group
			if(!$this->_root.'/'.implode('/', $aPath).'/index.xml'){
				if(@rmdir($this->_root.'/'.implode('/', $aPath).'/')){
					@rmdir($cache_root.'/'.implode('/', $aPath).'/');
					array_pop($aPath);
				}else break;
			}	
		}	
		if(is_dir($this->_root.'/'.$this->_album.'/')){
			$this->error = 'Error removing <strong>'.$this->_album.'</strong>. Check Permissions!';
			return false;	
		}return true;
	}
	
	function move($sAlbum){
		//cache path
		$tools = new tools();	
		$ConfigXML = $tools->xml(str_replace('albums', 'admin/config.xml', $this->_root));
		$ConfigXML = $ConfigXML['imageview']['settings']['annotation'];
		$cache_root = str_replace('albums', 'cache', $this->_root);
		if(!is_dir($cache_root)){
			$cache_root = '../dummy/';
		}
		
		//prepare $album	
		$sAlbum = str_replace('\\', '/', $sAlbum);
		if(substr($sAlbum, 0, 1) == '/') $sAlbum = substr($sAlbum, 1);	
		if(substr($sAlbum, -1) == '/') $sAlbum = substr($sAlbum, 0, -1);		
		
		//check the old album
		if(!is_file($this->_root.'/'.$this->_album.'/index.xml')){
			$this->error = '<strong>'.$this->_album.'</strong> doesn\'t exists!';
			return false;
		}
		
		//create the new album
		if($this->checkExists($sAlbum)){
			$aPath = explode('/', $sAlbum);
			
			//build path
			$fullpath = $this->_root;
			$cachepath = $cache_root;
			array_pop($aPath); //cut off target dir
			$mask = umask(0);
			for ($i = 0; $i < count($aPath); $i++) {
				$fullpath .= '/'.$aPath[$i];
				$cachepath .= '/'.$aPath[$i];
				if(!is_dir($fullpath)){
					mkdir($fullpath.'/', 0777);
					if(!substr($cachepath, 0, 9) == '../dummy/') mkdir($cachepath.'/', 0777);
				}
				
			}
			umask($mask);
				
			//move album
			if(rename($this->_root.'/'.$this->_album, $this->_root.'/'.$sAlbum)){
				@rename($cache_root.'/'.$this->_album, $cache_root.'/'.$sAlbum); //rename cache
				//clean old path
				$aPath = explode('/', $this->_album);
				array_pop($aPath);
				while(count($aPath) != 0){ //try to delete group
					if(!file_exists($this->_root.'/'.implode('/', $aPath).'/index.xml')){
						if(@rmdir($this->_root.'/'.implode('/', $aPath).'/')){
							@rmdir($cache_root.'/'.implode('/', $aPath).'/');
							array_pop($aPath);
						}else break;
					}	
				}	
			
				$this->_album = $sAlbum;
				$this->error = '';
				return true;
			}else{
				$this->error = 'Something went wrong while moving the album!';
				return false;
			}
		}return false;
	}
	
	function update($sDescription=false, $sPassword=false, $sUpload=false){
		if(!function_exists('index_addfile')){
			function index_addfile($list, $aFileInfo){
				$list .= "\n\t\t\t".'<image visible="'.$aFileInfo['visible'].'">';
				$list .= "\n\t\t\t\t".'<file><![CDATA['.$aFileInfo['file'].']]></file>';
				$list .= "\n\t\t\t\t".'<name><![CDATA['.$aFileInfo['name'].']]></name>';
				$list .= "\n\t\t\t\t".'<description><![CDATA['.$aFileInfo['description'].']]></description>';
				$list .= "\n\t\t\t".'</image>';
				return $list;
			}
		}
	
		if(is_file($this->_root.'/'.$this->_album.'/index.xml')){
			$mask = umask(0);
			
			//replace old information
			$oIndex = $this->_tools->xml($this->_root.'/'.$this->_album.'/index.xml');
			
			if(is_bool($sDescription) && !$sDescription){
				$sDescription = $oIndex['imageview']['album']['information']['description'];
			}
			if($sPassword == false){
				$sPassword = $oIndex['imageview']['album']['information']['password'];
			}else{
				if($sPassword !== 'no') $sPassword = sha1($sPassword);
			}
			if($sUpload == false) $sUpload = $oIndex['imageview']['album']['information']['upload'];
			
			//copy file index
			$sFiles = '';							
			if(is_array($oIndex['imageview']['album']['files']['image'][0])){
				foreach($oIndex['imageview']['album']['files']['image'] as $oImage){
					$sFiles = index_addfile($sFiles, $oImage);
				}
			}else{
				if(isset($oIndex['imageview']['album']['files']['image']['file']))
					$sFiles = index_addfile($sFiles, $oIndex['imageview']['album']['files']['image']);
			}
			
			//update files
			require('album_template.inc');
			$index_xml = str_replace('%DESCRIPTION%', $sDescription, $index_xml);
			$index_xml = str_replace('%PASSWORD%', $sPassword, $index_xml);
			$index_xml = str_replace('%UPLOAD%', $sUpload, $index_xml);
			$index_xml = str_replace('%FILES%', $sFiles, $index_xml);
			$this->save_file($this->_root.'/'.$this->_album.'/index.xml', $index_xml);
			chmod($this->_root.'/'.$this->_album.'/index.xml', 0777);
			umask($mask);
			
			//return status
			return true;
		}else{
			$this->error = '<strong>'.$this->_album.'</strong> doesn\'t exists or isn\'t an album!';
			return false;
		}
	}
}
?>