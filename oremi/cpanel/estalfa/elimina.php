<?php
/* header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/

	@include("../../lib/config.php");
	@include("../../lib/oremi.php");
    @include("../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../lib/global.php");
	@include("../../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk;
	$global_qk=0;
	require("../detect.php");

if($loginCorrecto ) { 
    encOremi();
	izqOremi();
	modOremi("F");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Seteamos, que los campos se hayan completado
  $nIdAlfa = $_POST["id"];
  
  // Procedemos a Eliminar el Registro
	$rsAlfa = new Recordset($SERVER, $DB, $USER, $PASSWORD);
	$sacaRegistro=$rsAlfa->Open( "DELETE FROM TPALFAS WHERE TPALFA_ID=\"".$nIdAlfa."\" ");	
		
    /*El registro fue Eliminado corecctamente*/
	mensaje("okForm","okBD","El Registro ha sido Eliminado de forma satisfactoria.");
?>
<!-- Central -->
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>