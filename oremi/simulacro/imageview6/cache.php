<?php
/*************************\
| Imageview 6             |
| By Jorge Schrauwen 2006 |
| http://www.blackdot.be  |
\*************************/

if(substr($_SERVER['PHP_SELF'], -9) == 'cache.php'){
	if(isset($_POST['id'])){
		//Imageview Core
		require_once('system/core/imageview.php');
		$id = ivdecode($_POST['id']);
		$id = base64_decode($id);
		$id = explode('|', $id);
		//generate response
		header('content-type: application/xml');
		echo '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n";
		echo '<imageview>'."\n";
		echo "\t".'<resourceuri><![CDATA['.generateURI($id[0], $id[1]).']]></resourceuri>'."\n";	
		echo '</imageview>';
	}
}

function generateURI($album, $file){
	//Imageview Core
	require_once('system/core/imageview.php');
	$imageview = new imageview();
	$ConfigXML = $imageview->tools->xml('./admin/config.xml');
				
	//read settings
	$MagickPath = $ConfigXML['imageview']['settings']['imagemagick'];
	$library = $ConfigXML['imageview']['settings']['library'];
	$annotation_text = $ConfigXML['imageview']['settings']['annotation']['text'];
	$annotation_color = $ConfigXML['imageview']['settings']['annotation']['color'];
	if(strtolower($ConfigXML['imageview']['settings']['cache']) == 'true'){$cache = true;}else{$cache = false;}
	$font_file = str_replace('\\', '/', realpath('./system/core/vera.ttf'));
	
	//decode variables
	$album = ivdecode($album);
	$file = ivdecode($file);
				
	if($annotation_text == ''){
		return 'albums/'.ivencode($album).'/'.ivencode($file); //no annotation so just give the URI
	}else{
		if($cache){
			//calculate identifier
			$identifier = sha1($annotation_text.$annotation_color);
			
			//remove cache directory if we have a cache dir but no identifier dir
			if(!file_exists('./cache/'.$identifier) && file_exists('./cache')){				
					$imageview->tools->remove_directory('./cache');
			}
			
			//create cache directory
			if(!is_dir('./cache')){
				$mask = umask(0);
				mkdir('./cache', 0777);
				mkdir('./cache/'.$identifier, 0777);
				umask($mask);
			}
						
			if(!file_exists('./cache/'.$identifier.'/'.$album.'/'.$file)){
				require_once('imgproc.php');
				ProcessImage('./albums/'.$album.'/'.$file, $library, $MagickPath, $annotation_text, $annotation_color, $font_file, $identifier);
			}
			return 'cache/'.$identifier.'/'.ivencode($album).'/'.ivencode($file);
		}else{
			if(is_dir('./cache')){ //clean up the cache directory
				$imageview->tools->remove_directory('./cache');
			}
			return 'imgproc.php?id='.ivencode(base64_encode(ivencode($album).'|'.ivencode($file)));
		}
	}
}
?>
