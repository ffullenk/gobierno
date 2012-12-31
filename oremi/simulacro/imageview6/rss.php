<?php 
if(!isset($_GET['album'])) exit;
header('content-type: application/xml');

//create core
require('system/core/imageview.php');
$imageview = &new imageview();

//configure cache
require('cache.php');

$ConfigXML = $imageview->tools->xml('./admin/config.xml');
if($ConfigXML['imageview']['settings']['annotation']['text'] !== '')
	$annotate = true;
else
	$annotate = false;

//fix album variables
$_GET['album'] = ivdecode($_GET['album']);

//check for authentication
$rssItems = $imageview->tools->xml('albums/'.$_GET['album'].'/index.xml');
if($rssItems['imageview']['album']['information']['password'] !== 'no'){
	if($_COOKIE['ivAuth'.str_replace('/', '_', str_replace(' ', '_', $_GET['album']))] !== $rssItems['imageview']['album']['information']['password'])
		$auth_required = true;
	else
		$rssItems = $rssItems['imageview']['album']['files']['image'];
}else{
	$rssItems = $rssItems['imageview']['album']['files']['image'];
}


//function RSSItem
function CreateRSSIcon($name, $file, $description, $encoding){
	$id = base64_encode(ivencode($_GET['album'])."|".ivencode($file));
	if($description == '') $description = '<em>n/a</em>';
	?>
	<item>
		<title><![CDATA[<?php echo html_entity_decode($name); ?>]]></title>
		<link><![CDATA[<?php echo 'http://'.$_SERVER['HTTP_HOST'].str_replace('rss.php', '', $_SERVER['PHP_SELF']).'?id='.$id; ?>]]></link>
		<description>
			<![CDATA[
				<strong>Filename:</strong> <?php echo htmlentities($file); ?><br />
				<strong>Description:</strong> <?php echo html_entity_decode($description); ?><br />
			]]>
		</description>
	</item>
	<?php
}
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
  <channel>
    <title><![CDATA[Imageview 6 :: <?php echo $_GET['album']; ?>]]></title>
    <link><![CDATA[<?php echo 'http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, strlen($_SERVER['PHP_SELF'])-7).'?album='.$_GET['album']; ?>]]></link>
    <description><?php echo $description; ?></description>
	<generator>Imageview 6</generator>
	<copyright>Imageview 6 :: By Jorge Schrauwen</copyright>
    <language>en-us</language>
	<ttl>1440</ttl>
	<?php
		if($auth_required){
			?>
			<item>
				<title>Private Album</title>
				<link><![CDATA[<?php echo 'http://'.$_SERVER['HTTP_HOST'].str_replace('rss.php', '', $_SERVER['PHP_SELF']).'?album='.$_GET['album']; ?>]]></link>
				<description>
					<![CDATA[
					<strong><?php echo htmlentities($_GET['album']); ?> is privated!</strong><br />
					You can only view it in your browser!<br />
					[Some aggregators do work once you are logged in.]
					]]>
				</description>
			</item>
			<?php
		}else{
			if(is_array($rssItems[0])){
				foreach($rssItems as $item)
					if($item['visible'] !== 'false') CreateRSSIcon($item['name'], $item['file'], $item['description'], $encoding);
			}else{
				CreateRSSIcon($rssItems['name'], $rssItems['file'], $rssItems['description'], $encoding);
			}
		}
	?>
  </channel>
</rss>