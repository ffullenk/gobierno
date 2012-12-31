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
	modOremi("A");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Obtenemos el ID
  $nIDAlerta = $_POST["id"];

	// Buscamos el ID en la tabla correspondiente
	$rsSQL=new Recordset($SERVER , $DB , $USER , $PASSWORD);
	$ssql = "SELECT ALERTA_ID, FECHA, TIEMPO, TPALERTA, ZONA, VARIABLE,  EXTENSION, SITUACION, ORIENTACION 
				FROM ALERTAS 
				WHERE ALERTA_ID=\"".$nIDAlerta."\" ";

	$rsSQL->Open($ssql);
	$num_total_registros = $rsSQL->RecordCount();
	if( $num_total_registros > 0 ) {
		$rsSQL->moveNext();
	  // Editamos la informacion
	  echo "
			<Script language=\"JavaScript\" src=\"../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/chequeaforms.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/fecha.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/calendar1.js\" type=\"text/javascript\"></Script>
	  
			<div id=\"mconregistro\">
			
 			  <div id=\"zeroForm\">
			    <H5>Formulario Actualizacion Detalle Centro de Alertas Vigentes</H5>
			    <form action=\"actualiza.php\" method=\"post\" name=\"actualiza\"  onsubmit=\"return vldAlerta();\" >
				<input type=\"hidden\" name=\"id\" value=\"".$rsSQL->FieldByNumber(0)."\" />
				      <dt>Fecha:</dt>
					  <dd>
<input type=\"text\" name=\"fecha\" size=\"10\" maxlength=\"10\" value=\"".fechaNuestra($rsSQL->FieldByNumber(1))."\" onchange=\"return ValidaFecha2(this.value);\">&nbsp;
						<a href=\"javascript:cal1.popup();\"><img src=\"../imagenes/cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Fecha de la Alerta \"></a>"; ?>
			<script language="JavaScript">
			<!-- // 
				var cal1 = new calendar1(document.forms['formulario'].elements['fecha']);
				cal1.year_scroll = true;
				cal1.time_comp = false;
			//-->
			</script>
<?php echo "			
					  </dd>

				      <dt>Hora:</dt>
					  <dd><input type=\"text\" name=\"hora\" size=\"5\" maxlength=\"5\" value=\"". $rsSQL->FieldByNumber(2) . "\" /></dd>

				      <dt>Zona de Riesgo:</dt>
					  <dd><input type=\"text\" name=\"zona\" size=\"50\" maxlength=\"128\" value=\"". $rsSQL->FieldByNumber(4) . "\"/></dd>
					  
				      <dt>Grado:</dt>
					  <dd>
					    <select name=\"alerta\" size=\"1\">";
						for($cAlerta=0; $cAlerta<strlen($_aAlerta);$cAlerta++) {
							if($rsSQL->FieldByNumber(3)==$cAlerta) {
							    echo "<option value=\"".$cAlerta."\" selected>".$_aAlerta[$cAlerta]."</option>";
							} else {
							    echo "<option value=\"".$cAlerta."\" >".$_aAlerta[$cAlerta]."</option>";
							}
						}
echo "
						</select>
					  </dd>

				      <dt>Extensi&oacute;n:</dt>
					  <dd><input type=\"text\" name=\"extension\" size=\"50\" maxlength=\"128\" value=\"".$rsSQL->FieldByNumber(6)."\" /></dd>

				      <dt>Variable de Riesgo:</dt>
					  <dd>
					  <select name=\"variable\" size=\"1\">";
						for($cVariable=0; $cVariable<strlen($_aVariable);$cVariable++) {
							if($rsSQL->FieldByNumber(5)==$cVariable) {
							    echo "<option value=\"".$cVariable."\" selected>".$_aVariable[$cVariable]."</option>";
							} else {
							    echo "<option value=\"".$cVariable."\" >".$_aVariable[$cVariable]."</option>";
							}
						}
echo "
						</select>
					  </dd>

				      <dt>Situaci&oacute;n General:</dt>
					  <dd><textarea name=\"situacion\" rows=\"5\" cols=\"35\" >".$rsSQL->FieldByNumber(7)."</textarea></dd>

				      <dt>Orientaci&oacute;n para la Gesti&oacute;n de Protecci&oacute;n Civil:</dt>
					  <dd><textarea name=\"orientacion\" rows=\"5\" cols=\"35\" >".$rsSQL->FieldByNumber(8)."</textarea></dd>


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