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
	modOremi("D");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Obtenemos el ID
  $nIDTPNec = $_POST["id"];

	// Buscamos el ID en la tabla correspondiente
	$rsSQL=new Recordset($SERVER , $DB , $USER , $PASSWORD);
	$ssql = "SELECT TPNECESIDAD_ID, TPNECESIDAD FROM TP_NECESIDAD WHERE TPNECESIDAD_ID=\"".$nIDTPNec."\" ";
	$rsSQL->Open($ssql);
	$num_total_registros = $rsSQL->RecordCount();
	if( $num_total_registros > 0 ) {
		$rsSQL->moveNext();
	  // Editamos la informacion
	  echo "
			<div id=\"mconregistro\">
			
 			  <div id=\"zeroForm\">
			    <H5>Formulario Actualizacion Detalle Tipo de Necesidades</H5>
			    <form action=\"actualiza.php\" method=\"post\" name=\"actualiza\">
				<input type=\"hidden\" name=\"id\" value=\"".$rsSQL->FieldByNumber(0)."\" />
				  <dl>
				      <dt>Tipo de Necesidad:</dt>
					  <dd><input type=\"text\" name=\"necesidad\" size=\"30\" maxlenght=\"75\" value=\"".$rsSQL->FieldByNumber(1)."\" /></dd>
					  <dd><input type=\"submit\" value=\" Actualizar Cambios \" class=\"submit\" /></dd>
				  </dl>
				</form>
			  </div>
            </div>
	  ";
	}
?>
<!-- Central -->
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>