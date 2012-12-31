<<<<<<< HEAD
<?
global $audio;
   
while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 
   
 $reprod=$audio.".swf";

?>
<script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','300','height','34','src','<? echo $reprod; ?>','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','<? echo $reprod; ?>' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="34">
  <param name="movie" value="<? echo $reprod; ?>" />
  <param name="quality" value="high" />
  <param name="wmode" value="transparent" />
  <embed src="<? echo $reprod; ?>" width="300" height="34" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
</object>
</noscript>
=======
<?
global $audio;
   
while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 
   
 $reprod=$audio.".swf";

?>
<script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','300','height','34','src','<? echo $reprod; ?>','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','wmode','transparent','movie','<? echo $reprod; ?>' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="300" height="34">
  <param name="movie" value="<? echo $reprod; ?>" />
  <param name="quality" value="high" />
  <param name="wmode" value="transparent" />
  <embed src="<? echo $reprod; ?>" width="300" height="34" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
</object>
</noscript>
>>>>>>> a803fcd8d17807cb43ca5787c54c86082ee7e5cb
