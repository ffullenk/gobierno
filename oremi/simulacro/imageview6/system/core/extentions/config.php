<?php
/*************************\
| Imageview 6             |
| By Jorge Schrauwen 2006 |
| http://www.blackdot.be  |
\*************************/
class config{
	var $xml;
	
	//init config class
	function config(&$parent){
		$this->xml = $parent->tools->xml('admin/config.xml');
	}
	
	//library used (gd/imagemagick)
	function library(){
		return $this->xml['imageview']['settings']['library'];
	}
	
	//imagemagick path
	function impath(){
		return $this->xml['imageview']['settings']['imagemagick'];
	}
	
	//thumbnail width
	function tn_width(){
		return $this->xml['imageview']['settings']['thumbnails']['width'];
	}
	
	//thumbnail height
	function tn_height(){
		return $this->xml['imageview']['settings']['thumbnails']['height'];
	}
	
	//thumbnail quality
	function tn_quality(){
		return $this->xml['imageview']['settings']['thumbnails']['quality'];
	}
	
	//annotation text
	function annotation_text(){
		return $this->xml['imageview']['settings']['annotation']['text'];
	}

	//imagemagick path
	function annotation_color(){
		return $this->xml['imageview']['settings']['annotation']['color'];
	}
	
	//cache enabled?
	function cache(){
		if($this->xml['imageview']['settings']['cache'] == 'true'){
			return true;
		}else{
			return false;
		}
	}	
	
	//default album
	function default_album(){
		return $this->xml['imageview']['settings']['display']['default'];
	}

	//skin
	function skin(){
		return $this->xml['imageview']['settings']['display']['skin'];
	}
	
	//rss enabled?
	function rss(){
		if($this->xml['imageview']['settings']['display']['rss'] == 'true'){
			return true;
		}else{
			return false;
		}
	}

	//preload ui?
	function preload_ui(){
		if($this->xml['imageview']['settings']['display']['preload']['interface'] == 'true'){
			return true;
		}else{
			return false;
		}
	}
	
	//preload album?
	function preload_albums(){
		if($this->xml['imageview']['settings']['display']['preload']['albums'] == 'true'){
			return true;
		}else{
			return false;
		}
	}
	
	//preload img?
	function preload_images(){
		if($this->xml['imageview']['settings']['display']['preload']['images'] == 'true'){
			return true;
		}else{
			return false;
		}
	}

	//preload img?
	function preload_sizecheck(){
		if($this->xml['imageview']['settings']['display']['preload']['sizecheck'] == 'true'){
			return true;
		}else{
			return false;
		}
	}


	//slideshow time
	function slideshow(){
		if($this->xml['imageview']['settings']['display']['slideshow'] == 'true'){
			return true;
		}else{
			return false;
		}
	}

	//encoding time
	function encoding(){
		return $this->xml['imageview']['settings']['encode'];
	}
	
}
?>