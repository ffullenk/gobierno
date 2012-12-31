<?php
/*************************\
| Imageview 6             |
| By Jorge Schrauwen 2006 |
| http://www.blackdot.be  |
\*************************/

//function ProcessImage
function ProcessImage($ImgURI, $library, $MagickPath, $annotation_text, $annotation_color, $font_file, $cache=false){
	//setup ImageProcessor
	require_once('system/core/jImageProcessor.php');
	$ImgProcessor = &new jImageProcessor();
	$ImgProcessor->setup($MagickPath, 100, true, true);
	
	//generate image
	if(strtolower($library) == 'imagemagick'){
		$ImgRes = $ImgProcessor->imagemagick->load($ImgURI);
		$ImgRes = $ImgProcessor->imagemagick->annotate($ImgRes, $annotation_text, $font_file, 'rgb('.$ImgProcessor->tools->hex2rgb($annotation_color).')');
		if($cache){
			$ImgProcessor->imagemagick->save($ImgRes, str_replace('./albums/', './cache/', $ImgURI));
		}else{
			$ImgProcessor->imagemagick->display($ImgRes);
		}
	}else{
		$ImgRes = $ImgProcessor->gd->load($ImgURI);
		$ImgRes = $ImgProcessor->gd->annotate($ImgRes, $annotation_text, $font_file, $ImgProcessor->tools->hex2rgb($annotation_color));
		if($cache){
			$ImgProcessor->gd->save($ImgRes, str_replace('./albums/', './cache/'.$cache.'/', $ImgURI));
		}else{
			$ImgProcessor->gd->display($ImgRes);
		}
	}
}

//stop if included in cache.php
if(substr($_SERVER['PHP_SELF'], -11) == 'imgproc.php'){
	//let generate the image =)
	if(isset($_GET['id'])){
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
		
		//decode data
		$id = ivdecode($_GET['id']);
		$id = base64_decode($id);
		$id = explode('|', $id);
				
		//build URI
		$ImgURI = './albums/'.ivdecode($id[0]).'/'.ivdecode($id[1]);
					
		//send image
		if(file_exists($ImgURI)){
			header('Expires: '.gmdate("D, d M Y H:i:s", mktime(date("H"), date("i")+15, date("s"), date("m"), date("d"), date("Y"))).' GMT');
			ProcessImage($ImgURI, $library, $MagickPath, $annotation_text, $annotation_color, $font_file, false);
			exit; //don't get to the 404
		}
	}
	
	//generate can't locate image
	include('system/core/paintbox.php');
}
?>