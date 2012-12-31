<?php
/*  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/
  
	@include("../../../lib/config.php");
	@include("../../../lib/oremi.php");
    @include("../../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../../lib/global.php");
	@include("../../../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk, $global_cg;
	$global_qk=0;
	$global_cg=0;

	require("../../detect.php");

if($loginCorrecto ) { 
    cabOremi();
	izqOremi();
	modOremi("F"); // Crea un Nuevo Informe Alfa/Consolidado
?>
    <div >
       <div >
	   <?php
if(is_numeric($id) && is_numeric($rec)) {
		// Eliminar Decision
		$rsDec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$sacaRegistro=$rsDec->Open( "delete from TEMPREC WHERE TEMPREC_ID=\"".$rec."\" ");

		echo "<div style=\"margin:0 auto;text-align:center;border:1px solid #990000;font:10pt Verdana;color:#333;width:75%;\">";

			// Los datos se grabaron correctamente
			echo "El Registro ha sido Eliminado de forma satisfactoria.<br /> 
					Por favor, para volver al formulario del Informe alfa, presione el bot&oacute;n <strong>Aceptar</strong>";

echo "			<form action=\"index.php\" method=\"post\">
				<input type=\"hidden\" name=\"sesAlfa\" value=\"$sesAlfa\" />
				<input type=\"hidden\" name=\"id\" value=\"$id\" />
				<input type=\"submit\" name=\"actualiza\" value=\"Aceptar\">
			</form>
		</div>";

}

	   ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../../logout.php"); }
?>