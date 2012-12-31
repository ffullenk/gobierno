<?php
/*************************\
| Imageview 6             |
| By Jorge Schrauwen 2006 |
| http://www.blackdot.be  |
\*************************/

class tools{
	//convert an xml document to an array
	function xml($XML, $iFile=true){
		if($iFile == true){
			$XML = file_get_contents($XML);
		}
		
		$xml_parser = xml_parser_create();
		xml_parse_into_struct($xml_parser, $XML, $vals);
		xml_parser_free($xml_parser);
		$_tmp='';
		

		foreach($vals as $xml_elem){
			$x_tag=strtolower($xml_elem['tag']);
			$x_level=$xml_elem['level'];
			$x_type=$xml_elem['type'];
			if($x_level!=1 && $x_type == 'close'){
				if(isset($multi_key[$x_tag][$x_level])){
					$multi_key[$x_tag][$x_level]=1;
				}else{
					$multi_key[$x_tag][$x_level]=0;
				}
			}
			if($x_level!=1 && $x_type == 'complete'){
				if ($_tmp==$x_tag){
					$multi_key[$x_tag][$x_level]=1;
				}
				$_tmp=$x_tag;
			}
		}
		
		foreach($vals as $xml_elem){
			$x_tag=strtolower($xml_elem['tag']);
			$x_level=$xml_elem['level'];
			$x_type=$xml_elem['type'];
			if ($x_type == 'open'){
				$level[$x_level] = $x_tag;
			}
			$start_level = 1;
			$php_stmt = '$xml_array';
			if ($x_type=='close' && $x_level!=1){
				$multi_key[$x_tag][$x_level]++;
			}   
			while($start_level < $x_level){
				$php_stmt .= '[$level['.$start_level.']]';
				if (isset($multi_key[$level[$start_level]][$start_level]) && $multi_key[$level[$start_level]][$start_level]){
					$php_stmt .= '['.($multi_key[$level[$start_level]][$start_level]-1).']';
				}
				$start_level++;
			}
			$add='';
			if(isset($multi_key[$x_tag][$x_level]) && $multi_key[$x_tag][$x_level] && ($x_type=='open' || $x_type=='complete')){
				if (!isset($multi_key2[$x_tag][$x_level])){
					$multi_key2[$x_tag][$x_level]=0;
				}else{
					$multi_key2[$x_tag][$x_level]++;
				}	   
				$add='['.$multi_key2[$x_tag][$x_level].']';
			}
			if(isset($xml_elem['value']) && trim($xml_elem['value'])!='' && !array_key_exists('attributes',$xml_elem)){
				$xml_elem['value'] = utf8_decode($xml_elem['value']);
				if ($x_type == 'open'){
					$php_stmt_main=$php_stmt.'[$x_type]'.$add.'[\'content\'] = $xml_elem[\'value\'];';
				}else{
					$php_stmt_main=$php_stmt.'[$x_tag]'.$add.' = $xml_elem[\'value\'];';
				}
				eval($php_stmt_main);
			}
			if(array_key_exists('attributes',$xml_elem)){
				$xml_elem['value'] = utf8_decode($xml_elem['value']);
				if(isset($xml_elem['value'])){
					$php_stmt_main=$php_stmt.'[$x_tag]'.$add.'[\'content\'] = $xml_elem[\'value\'];';
					eval($php_stmt_main);
				}
				foreach($xml_elem['attributes'] as $key=>$value){
					$key = strtolower($key);
					$value = utf8_decode($value);
					$php_stmt_att=$php_stmt.'[$x_tag]'.$add.'[$key] = $value;';
					eval($php_stmt_att);
				}
			}
		}
		
		return $xml_array;
	}
	//recursive rmdir
	function remove_directory($dir){
		$handle = dir($dir);
		while(false !== ($file = $handle->Read())){
			if($file != "." && $file != ".."){
				if (is_dir("$dir/$file")) {
					$this->remove_directory("$dir/$file");
				}else{
					unlink("$dir/$file");
				}
			}
		}
		$handle->close();
		rmdir($dir);
	}

	//get folder list
	function GetAlbumArray($Path){
		$i = 0;
		$MyAlbums = dir($Path);
		while(false !== ($file = $MyAlbums->Read())){
			if(($file !== '.') && ($file !== '..')){
				if(is_dir($Path.$file)){
					if(file_exists($Path.$file.'/index.xml')){
						$arr[$i] = $file;	
					}else{
						$arr[$i] = $file; 
						$arr[$file] = $this->GetAlbumArray($Path.$file.'/');
					}	
				}
				$i++;
			}
		}
		$MyAlbums->close();
		if(is_array($arr)){
			asort($arr);
		}
		return $arr;
	}
}
?>