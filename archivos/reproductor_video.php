<<<<<<< HEAD
<?

include("../../../funciones/conexion_comunicaciones.php"); 

global $video, $id_not;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 }  
 
$qry_galeria="select * from galeria_fotografica where id_noticias=".$id_not;
$result_galeria=mysql_query($qry_galeria); 
$row_galeria=mysql_fetch_array($result_galeria);
?>
										
      <script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	  <script type="text/javascript" src="swfobject.js"></script>
	  <script type="text/javascript">swfobject.registerObject("player","9.0.98","expressInstall.swf");</script><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>

	    
<script type="text/javascript">
AC_FL_RunContent( 'type','application/x-shockwave-flash','data','player.swf','width','328','height','200','movie','player','allowfullscreen','true','allowscriptaccess','always','flashvars','file=<? echo $video;?>&image=<? echo $row_galeria['nombre_archivo'];?>','wmode','transparent' ); //end AC code
</script><noscript><object type="application/x-shockwave-flash" data="player.swf" width="328" height="200">
	       <param name="movie" value="player.swf" />
	    <param name="allowfullscreen" value="true" />
	    <param name="allowscriptaccess" value="always" />
	    <param name="flashvars" value="file=<? echo $video;?>&image=<? echo $row_galeria['nombre_archivo'];?>" />
	    <param name="wmode" value="transparent" />
        </object>
</noscript>
=======
<?

include("../../../funciones/conexion_comunicaciones.php"); 

global $video, $id_not;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 }  
 
$qry_galeria="select * from galeria_fotografica where id_noticias=".$id_not;
$result_galeria=mysql_query($qry_galeria); 
$row_galeria=mysql_fetch_array($result_galeria);
?>
										
      <script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	  <script type="text/javascript" src="swfobject.js"></script>
	  <script type="text/javascript">swfobject.registerObject("player","9.0.98","expressInstall.swf");</script><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
-->
</style>

	    
<script type="text/javascript">
AC_FL_RunContent( 'type','application/x-shockwave-flash','data','player.swf','width','328','height','200','movie','player','allowfullscreen','true','allowscriptaccess','always','flashvars','file=<? echo $video;?>&image=<? echo $row_galeria['nombre_archivo'];?>','wmode','transparent' ); //end AC code
</script><noscript><object type="application/x-shockwave-flash" data="player.swf" width="328" height="200">
	       <param name="movie" value="player.swf" />
	    <param name="allowfullscreen" value="true" />
	    <param name="allowscriptaccess" value="always" />
	    <param name="flashvars" value="file=<? echo $video;?>&image=<? echo $row_galeria['nombre_archivo'];?>" />
	    <param name="wmode" value="transparent" />
        </object>
</noscript>
>>>>>>> a803fcd8d17807cb43ca5787c54c86082ee7e5cb
