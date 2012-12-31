<?php
/*  header("Cache-Control: no-store, no-cache, must-revalidate");
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
	global $global_qk, $global_cg;
	$global_qk=0;
	$global_cg=0;

	require("../detect.php");

if($loginCorrecto ) { 
    cabOremi();
	izqOremi();
	modOremi("P"); // Servicio Periodistico
?>
    <div >
       <div >
	   <?php
//		echo "<div id=\"mconregistro\">";
		$id = $_POST["id"];
		
		// Eliminamos el Informe
		$rsInf = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$sacaRegistro=$rsInf->Open( "DELETE FROM INFORMATIVO WHERE INFORMATIVO_ID=\"".$id."\" ");	
		mensaje("okForm","okBD","El Registro ha sido Eliminado de forma satisfactoria."); ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>