<?php
	header('Content-Type: application/xml');
	header('Expires: '.gmdate("D, d M Y H:i:s", mktime(date("H"), date("i")-1, date("s"), date("m"), date("d"), date("Y"))).' GMT');
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
	//create core
	require('system/core/imageview.php');
	$imageview = &new imageview();
	$MyAlbums = $imageview->tools->GetAlbumArray('./albums/');

	//function buildtree
	function buildtree($MyAlbums, $parent){
		//create core
		$imageview = &new imageview();
		
		//get lock icon
		$skin = $imageview->skin();
		$icolock = 'system/images/icons/tree/locked.png';
		if(file_exists('system/skins/'.$skin['name'].'/images/tree/locked.png')){
			$icolock = 'system/skins/'.$skin['name'].'/images/tree/locked.png';
		}
		
		$data = '';
		foreach ($MyAlbums as $key => $val) {
			if(!is_array($val)){
				if(file_exists('./albums/'.$parent.$val.'/index.xml')){
					$alb_settings = $imageview->tools->xml('./albums/'.$parent.$val.'/index.xml');
					$data .= '<tree>';
					$data .= '<text><![CDATA['.$val.']]></text>';
					$data .= '<action><![CDATA[javascript:oImageview.LoadAlbum(\''.$parent.$val.'\');]]></action>';
					if($alb_settings['imageview']['album']['information']['password'] !== 'no'){
						$data .= '<icon>'.$icolock.'</icon>';
					}	
					$data .= '</tree>';
				}else{
					if(is_array($MyAlbums[$val])){
						$data .=  '<tree text="'.$val.'">';
						$data .= buildtree($MyAlbums[$val], $parent.$val.'/');
						$data .=  '</tree>';
					}
				}
			}
		}
		
		return $data;
	}
		
	//begin building xml
	echo '<tree>';
	echo buildtree($MyAlbums, '');
	echo '</tree>';
?>

