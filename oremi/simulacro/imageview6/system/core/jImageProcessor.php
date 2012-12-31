<?php
/*
jImageProcessor class
By Jorge Scrhauwen

Requirements:
- PHP 4.3.0 or better
- GD2/ImageMagick (GD2 for the GD sub set or ImagemMagick for the ImageMagick sub set)

Usage:
require('jImageProcessor.php');
$image = &new jImageProcessor(); //the & can be removed if you use PHP5s

Functions:
- General -
$image->check(); :: check to see if GD and/or imagemagick is working

- Tools -
$image->extentiontolowercase($folder); :: turns all extentions into lowercase

- GD2 -
$Image->gd->load($file); :: load from file
$image->gd->save($img, $out_file); :: save to file
$image->gd->display($img); :: return the image
$image->gd->resize($img, $width, $height); :: resizes the image
$image->gd->rotate($img, $degrees); :: rotate the image x degrees
$image->gd->annotate($img, $text='', $font='vera', $color='255,255,255'); :: annotate the image

- ImageMagick -
$Image->imagemagick->load($file); :: load from file
$image->imagemagick->save($img, $out_file); :: save to file
$image->imagemagick->display($img); :: return the image
$image->imagemagick->resize($img, $width, $height); :: resizes the image
$image->imagemagick->rotate($img, $degrees); :: rotate the image x degrees
$image->imagemagick->annotate($img, $text='', $font='vera', $color='white', $position='SouthWest'); :: annotate the image
$image->imagemgaick->advance($img, $parameter); :: add a custom paremeter to the list for example '-unsharp 1';

Example:
require('jImageProcessor.phpp');
$image = &new jImageProcessor();
$img = $image->imagemagick->load('myfile.jpg');
$img = $image->imagemagick->resize($img, 100, 100);
$image->imagemagick->save($img, 'tn_myfile.jpg');
*/

ini_set('max_execution_time', 3600);
ini_set('memory_limit', '64M');

class jImageProcessor{
	var $imagemagick_path;
	var $interlace;
	var $quality;
	var $soft_error;

	function jImageProcessor(){
		$this->tools = new imgtools();
		$this->gd = &new gd($this);
		$this->imagemagick = &new imagemagick($this);
		$this->setup();
	}
	
	/*
	Function Setup
	*/
	function setup($imagemagick_path='convert', $imagequality=80, $use_interlace=false, $soft_error=false){
		$this->imagemagick_path = $imagemagick_path;
		$this->quality = $imagequality;
		$this->interlace = $use_interlace;
		$this->soft_error = $soft_error;
	}
	
	/*
	Function Check
	*/
	function check(){
		//check for imagemagick
		exec($this->imagemagick_path.' -version', $imstatus);
		$imstatus = $imstatus[0];
		if(strtolower(substr($imstatus, 9, 11)) == 'imagemagick'){
			$imstatus = '<font color=green>OK</font>';
		}else{
			$imstatus = '<font color=red>N/A</font>';		
		}
		//check gd2
		if(function_exists('imagecreatetruecolor')){
			$gdstatus = '<font color=green>OK</font>';
		}elseif(function_exists(imagecreate)){
			$gdstatus = '<font color=red>To Old(GD1)</font>';	
		}else{
			$gdstatus = '<font color=red>N/A</font>';		
		}
		echo 'Imagemagick: '.$imstatus.'<br>';
		echo 'Gd 2: '.$gdstatus.'<br>';
	}
}

/*
Tools
*/
class imgtools{
	/*
	Function FitToSize (c) Leo Schrauwen 2005
	*/
	function fittosize($img, $width, $height){
		if(file_exists($img)){
			list($old_width, $old_height) = getimagesize($file);
		}else{
			$old_width = imagesx($img);
			$old_height = imagesy($img);
		}
		
		if($old_width > $old_height){
			$iCal = ($width/$old_width);			
			$new_height = ($old_height*$iCal);		
			$new_width = $width;					
			if($new_height > $height){
				$iCal = ($height/$old_height);	
				$new_width = ($old_width*$iCal);
				$new_height = $height;				
			}
		}elseif($old_width < $old_height){
			$iCal = ($height/$old_height);
			$new_width = ($old_width*$iCal);
			$new_height = $height;
			if($new_width > $width){
				$iCal = ($width/$old_width);
				$new_height = ($old_height*$iCal);
				$new_width = $width;
			}		
		}elseif($old_width == $old_height){
			if($width > $height){
				$new_width = $height;
				$new_height = $height;
			}else{
				$new_width = $width;
				$new_height = $width;
			}
		}
		return array('width' => $new_width,'height' => $new_height);
	}
	
	/*
	Function hex2rgb
	*/
	function &hex2rgb($hex, $asString = true){
		// strip off any leading #
		if (0 === strpos($hex, '#')) {
			$hex = substr($hex, 1);
		} else if (0 === strpos($hex, '&H')) {
		    $hex = substr($hex, 2);
		}     
		
		// break into hex 3-tuple
		$cutpoint = ceil(strlen($hex) / 2)-1;
		$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
		
		// convert each tuple to decimal
		$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
		$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
		$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
		
		return ($asString ? "{$rgb[0]},{$rgb[1]},{$rgb[2]}" : $rgb);
	}
	
	/*
	Function extentiontolowercase
	*/
	function extentiontolowercase($folder){
		if ($handle = opendir($folder)){
			while (false !== ($file = readdir($handle))) {
				if($file == "."){
					// do nothing is parent
				}elseif($file == "..") {
					// do nothing is parent
				}elseif($file == "...") {
					// do nothing is parent
				}else{
					$ext = explode('.', $file);
					$ext = strtolower($ext[(count($ext)-1)]);
					$file_new = substr($file, 0, (strlen($file)-strlen($ext)));
					rename($folder.$file, $folder.$file_new.$ext);
				}
			}
			closedir($handle);
		}
	}
	
	/*
	Function recursive_touch
	*/
	function recursive_touch($filepath){
		//fix slashes
		$filepath = str_replace('\\', '/', $filepath);
		//split array
		$filepath = split('/', $filepath);
		$filename = array_pop($filepath); //strip the filename
		//walk the directory tree
		$mask = umask(0);
		$parent = ''; //reset parent
		foreach($filepath as $dir){
			$parent .= $dir.'/';
			if($dir !== '.'){
				if(!is_dir($parent))
					mkdir($parent, 0777);
			}
		}
		umask($mask);
		touch($parent.'/'.$filename);
	}
}

/* 
GD 2
*/
class gd{
	//putenv('GDFONTPATH=' . realpath('.'));
	var $image;
	function gd(&$parent){
		$this->image =& $parent;
	}
	
	/*
	Function Load
	*/
	function load($file){
		if(!file_exists($file)){
			if($this->image->soft_error) {
				return -1;
			}
			die('Image Not Found!');
		}
		$im = getimagesize($file);
		if($im[2] == '1'){
			$img = imagecreatefromgif($file);
		}elseif($im[2] == '2'){
			$img = imagecreatefromjpeg($file);
		}elseif($im[2] == '3'){
			$img = imagecreatefrompng($file);
		}else{
			if($this->image->soft_error) {
				return -1;
			}
			die('Not a valid image type! (Only JPEG/PNG/GIF)');
			exit;
		}
		return $img;
		imagedestroy($img); 
	}
	
	/*
	Function Save
	*/ 
	function save($img, $file){
		if($file == ''){
			if($this->image->soft_error) {
				return false;
			}
			die('you did not give a file name!');
		}
		imageinterlace($img, $this->image->interlace);
		$ext = explode('.', $file);
		$ext = strtolower($ext[(count($ext)-1)]);
		if(($ext == 'jpg') || ($ext == 'jpeg')){
			$this->image->tools->recursive_touch($file);
			if(imagejpeg($img, $file, $this->image->quality)){
				$old = umask(0);
				chmod($file, 0777);
				umask($old);
				return true;
			}
		}elseif($ext == 'png'){
			$this->image->tools->recursive_touch($file);
			if(imagepng($img, $file)){
				$old = umask(0);
				chmod($file, 0777);
				umask($old);			
				return true;
			}
		}else{
			if($this->image->soft_error) {
				return false;
			}
			die('Not a valid image type! (Only JPEG/PNG)');
		}
		imagedestroy($img);
	}
	
	/*
	Function Display
	*/ 
	function display($img){
		imageinterlace($img, $this->image->interlace);
		header('Content-type: image/jpeg');
		imagejpeg($img, '', $this->image->quality);
		imagedestroy($img); 
	}
	
	/*
	Function resize
	*/
	function resize($img, $width, $height){
		$size = $this->image->tools->fittosize($img, $width, $height);
		$width = $size['width'];
		$height = $size['height'];
		$old_x=imageSX($img);
		$old_y=imageSY($img);
		$dst_img=ImageCreateTrueColor($width,$height);
		imagecopyresampled($dst_img,$img,0,0,0,0,$width,$height,$old_x,$old_y); 
		imageinterlace($dst_img, $this->image->interlace);
		return $dst_img;
		imagedestroy($dst_img); 
		imagedestroy($img); 
	}
	
	/*
		Function annotate
	*/
	function annotate($img, $text='', $font='vera', $color='255,255,255'){
		//get the color
		$color = explode(',', $color);
		$color = imagecolorallocate($img, $color[0], $color[1], $color[2]);
		//draw string
		if(function_exists('imagettftext')){
			imagettftext($img, 10, 0, 5, imagesy($img)-5, $color, $font, $text);
		}else{
			if($this->image->soft_error) {
				return $img; //return unannotated image
			}
			die('GD2 is not compiled with annotation support!');
		}
		return $img;
		imagedestroy($img); 
	}
	
	/*
	Function rotate
	*/
	function rotate($img, $degrees){
		$img = imagerotate($img, $degrees, 0);
		return $img;
		imagedestroy($img); 
	}
}

/* 
ImageMagick
*/
class imagemagick{
	var $image;
	function imagemagick(&$parent){
		$this->image =& $parent;
	}
	
	/*
	Function Load
	*/
	function load($file){
		if(!file_exists($file)){
			if($this->image->soft_error) {
				return -1;
			}
			die('Image Not Found!');
		}
		//get file path
		$file = realpath($file);
		return $this->image->imagemagick_path.' "'.$file.'"';
	}
	
	/*
	Function Save
	*/
	function save($img, $file){
		if($file == ''){
			if($this->image->soft_error) {
				return false;
			}
			die('you did not give a file name!');
		}
		//get file path
		$this->image->tools->recursive_touch($file);
		$file = realpath($file);
		$old = umask(0);
		chmod($file, 0777);
		//check if interlace is on
		if($this->image->interlace){
			$img = $img.' -interlace Partition';
		}
		//check quality
		$img = $img.' -quality '.$this->image->quality;
		//add output file
		$img = $img.' "'.$file.'"';
		chmod($file, 0777);
		$out =  exec($img);
		if($out == ''){
			return true;
		}else{
			return $out;
		}
		umask($old);
	}
	
	/*
	Function Display
	*/ 
	function display($img){
		//get a temp file
		$outfile = tempnam(realpath('.'), 'im_');
		//check if interlace is on
		if($this->image->interlace){
			$img = $img.' -interlace Partition';
		}
		//check quality
		$img = $img.' -quality '.$this->image->quality;
		//add output file
		$img = $img.' "'.$outfile.'"';
		//exec imagemagick
		exec($img);
		//open file
		$file = implode('', file($outfile));
		$image = @getimagesize($outfile);
		header('content-type: '.$image[mime]);
		echo $file;
		//remove temp file
		unlink($outfile);
	}
		
	/*
	Function resize
	*/
	function resize($img, $width, $height){	
		$img = $img.' -resize '.$width.'x'.$height;
		return $img;
	}
	
	/*
	Function annotate
	*/
	function annotate($img, $text='', $font='vera', $color='white', $position='SouthWest'){
		//-antialias = turn off anti aliasing(can be removed)
		if(substr($color, 0,3) == 'rgb') $color = '"'.$color.'"';
		if(substr($color, 0,1) == '#') $color = '"'.$color.'"';
		$img = $img.' -font '.$font.' -gravity '.$position.' -fill '.$color;
		$img = $img.' -draw "text 3,1 \''.$text.'\'"';
		return $img;
	}
	
	/*
	Funtion rotate
	*/
	function rotate($img, $degrees){
		$img = $img.' -rotate '.$degrees;
		return $img;
	}

	/*
	Funtion Advance
	*/
	function advance($img, $cmd){
		$img = $img.' '.$cmd;
		return $img;
	}
	
	/*
	Function Path
	*/
	function path($MagickHome, $FontPath='', $ConfigPath=''){
		if($MagickHome !== ''){
			putenv('MAGICK_HOME='.$MagickHome);
		}
		if($ConfigPath !== ''){
			putenv('MAGICK_CONFIGURE_PATH='.$ConfigPath);
		}
		if($FontPath !== ''){
			putenv('MAGICK_FONT_PATH='.$FontPath);
		}
	}
}
?>