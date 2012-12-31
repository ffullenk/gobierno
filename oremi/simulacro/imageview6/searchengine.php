<?php
/******************************************\
| Imageview 6 :: AJAX Edition              |
| By Jorge Schrauwen                       |
\******************************************/
//search engine index page
$agent = $_SERVER['HTTP_USER_AGENT']; 
if((!eregi("bot",$agent)) || (!eregi("slurp",$agent))|| (!eregi("teoma",$agent))){
	if(substr($_SERVER['PHP_SELF'], -16) == 'searchengine.php'){
		header('Location: '.str_replace('searchengine.php', '', $_SERVER['PHP_SELF']));
		exit;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Imageview 6 :: By Jorge Schrauwen</title>
</head>

<body>
<?php
	require('system/core/imageview.php');
	$imageview = &new imageview();
	
	if($ConfigXML['imageview']['settings']['annotation']['text'] !== '')
		$annotate = true;
	else
		$annotate = false;
				
	if(!isset($_GET['album'])){
		//output album index
		$MyAlbums = $imageview->tools->GetAlbumArray('./albums/');
		
		//function albumlist
		function albumlist($MyAlbums, $parent){
			$imageview = &new imageview();
			$data = '';
			foreach ($MyAlbums as $key => $val) {
				if(!is_array($val)){
					if(file_exists('./albums/'.$parent.$val.'/index.xml')){
						$alb_settings = $imageview->tools->xml('./albums/'.$parent.$val.'/index.xml');
						if($alb_settings['imageview']['album']['information']['password'] == 'no'){
							$data .= "<li><a href=\"?album=".ivencode($parent.$val)."\">".$parent.$val."</a></li>\n";
						}
					}else{
						if(is_array($MyAlbums[$val])){
							$data .= albumlist($MyAlbums[$val], $parent.$val.'/');
						}
					}
				}
			}
			
			return $data;
		}
			
		//album index
		echo 'Album Index:';
		echo '<ul>';
		echo albumlist($MyAlbums, '');
		echo '</ul>';
	}else{
		require('cache.php');
		$_GET['album'] = ivdecode($_GET['album']);
		if(file_exists('./albums/'.$_GET['album'].'/index.xml')){
			echo 'Viewing <strong>'.htmlentities($_GET['album']).'</strong> Album:<br />';
			$albumXML = $imageview->tools->xml('./albums/'.$_GET['album'].'/index.xml');	
			$albumXML = $albumXML['imageview']['album'];	
						
			if(is_array($albumXML['files']['image'][0])){
				foreach($albumXML['files']['image'] as $fileInfo){
					if(!empty($fileInfo['file'])){
						if($fileInfo['visible'] !== 'false'){
							$imgRes = generateURI(ivencode($_GET['album']), ivencode($fileInfo['file']));
							if(substr($imgRes, 0, 7) == 'imgproc'){
								$imgRes = str_replace('imgproc.php?id=', '', $imgRes);
								$imgRes = base64_decode(ivdecode($imgRes));
								$imgRes = explode('|', $imgRes);
								$imgRes = 'albums/'.$imgRes[0].'/'.$imgRes[1];
							}
							echo '<img src="'.$imgRes.'" title="'.$fileInfo['name'].'" alt="'.$fileInfo['description'].'" /><br />'."\n";
						}
					}
				}
			}else{
				if(!empty($albumXML['files']['image']['file'])){
					if($albumXML['files']['image']['visible'] !== 'false'){
						$imgRes = generateURI(ivencode($_GET['album']), ivencode($albumXML['files']['image']['file']));
						if(substr($imgRes, 0, 7) == 'imgproc'){
								$imgRes = str_replace('imgproc.php?id=', '', $imgRes);
								$imgRes = base64_decode(ivdecode($imgRes));
								$imgRes = explode('|', $imgRes);
								$imgRes = 'albums/'.$imgRes[0].'/'.$imgRes[1];
						}
						echo '<img src="'.$imgRes.'" title="'.$albumXML['files']['image']['name'].'" alt="'.$albumXML['files']['image']['description'].'" />'."\n";
					}
				}
			}
		}
	}
?>
</body>
</html>
