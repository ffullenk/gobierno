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
	modOremi("C"); // Crea un Nuevo Informe Alfa/Consolidado
?>
    <div >
       <div >
	   <?php
if(isset($masdec)) {
		// Grabar Decision
		$rsDec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsDec->FieldByInsert( "TPO", "'$sesAlfa'" );
		$rsDec->FieldByInsert( "ACCION", "'$decision'" );
		$rsDec->FieldByInsert( "TIEMPO", "'$tpodecision'" );
		$poneRegistro = $rsDec->execInsert( "TEMPDEC" , 1);


		echo "<div style=\"margin:0 auto;text-align:center;border:1px solid #990000;font:10pt Verdana;color:#333;width:75%;\">";
		if($poneRegistro==true) {
			// Los datos se grabaron correctamente
			echo "El Registro ha sido A&ntilde;adido de forma satisfactoria.<br /> 
					Por favor, para volver al formulario del Informe alfa, presione el bot&oacute;n <strong>Aceptar</strong>";
		} else {
			echo "Error... Se ha encontrado un problema interno y por lo tanto, no ha sido posible a&ntilde;adir el registro. Por favor, intente de nuevo. Si el problema persiste, p&oacute;ngase en contacto con el administrador de esta p&aacute;gina.";
		
		}
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