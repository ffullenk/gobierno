<?php
/*************************\
| Imageview 6             |
| By Jorge Schrauwen 2006 |
| http://www.blackdot.be  |
\*************************/

//sub classes
require('extentions/tools.php');
require('extentions/config.php');
require('extentions/encoding.php');

class imageview{
	var $tools;
	var $config;
	var $manager;
	
	function imageview(){
		$this->tools = new tools();
		$this->config = &new config($this);
	}
	
	//get skin
	function skin(){
		//read the xml file
		$skin = $this->tools->xml('system/skins/'.$this->config->skin().'/skin.xml');
		//strip some parts
		$skin = $skin['imageview']['skin'];
		$skin['name'] = $this->config->skin();
		return $skin;
	}
	
	//generate album dropdown
	function album_dropdown(){
		$data =  '<select id="iAlbumSelect" name="iAlbumSelect" onchange="eval(this.value);">'."\n";
		$data .= '<option value="">[Loading...]</option>'."\n";
		$data .= '</select>'."\n";
		return $data;
	}
	
	//generate album dropdown
	function album_tree(){
		$skin = $this->skin();
		$data = '<script type="text/javascript" src="system/javascript/xtree/xtree.js"></script>'."\n";
		$data .= '<script type="text/javascript" src="system/javascript/xtree/xmlextras.js"></script>'."\n";
		$data .= '<script type="text/javascript" src="system/javascript/xtree/xloadtree.js"></script>'."\n";
		$data .= '<script type="text/javascript">'."\n";
		$data .= '//<![CDATA['."\n";
		$data .= 'var tree = new WebFXLoadTree("Albums", "albumtree.php");'."\n";
		$data .= 'tree.setBehavior("classic");'."\n";
		$data .= 'document.write(tree);'."\n";
		$data .= '//]]>'."\n";
		$data .= '</script>'."\n";
		return $data;
	}
}
?>