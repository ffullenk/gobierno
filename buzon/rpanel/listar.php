<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bzrrevalidate";
  global $global_qk;
  $global_qk=0;
require('detect.php');
  global $c;

if($loginCorrecto ) {  
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
 
 echo "Directo";
}
?>