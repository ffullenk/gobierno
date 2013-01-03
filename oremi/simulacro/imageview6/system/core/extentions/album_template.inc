<?php
$index_xml = <<<END
<?xml version="1.0" encoding="ISO-8859-1"?>
<imageview>
	<album>
		<information>
			<description><![CDATA[%DESCRIPTION%]]></description>
			<password>%PASSWORD%</password>
			<upload>%UPLOAD%</upload>
		</information>
		<files>%FILES%
		</files>
	</album>
</imageview>
END;

$index_htm = <<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Imageview 6 :: Album Redirect</title>
<script type="text/javascript">
//<![CDATA[
	function redirect(){
		//get the album name
		var sURL = location.href;
		var iPos = (sURL.toLowerCase().indexOf('album'));
		var sAlbum = sURL.substr(iPos + 7);
		if(sAlbum.substr(-1) == '/'){
			sAlbum = sAlbum.substr(0, (sAlbum.length -1));
		}
		location.href = sURL.substr(0, iPos) + '?album=' + sAlbum;
	}
//]]>
</script>
</head>

<body onload="redirect();">
Redirecting...
</body>
</html>
END;
?>