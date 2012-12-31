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
	echo "
			<Script language=\"JavaScript\" src=\"../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/chequeaforms.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/fecha.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/calendar1.js\" type=\"text/javascript\"></Script>

			<div id=\"mconregistro\">
						
			<div id=\"zeroForm\">
			    <H5>Formulario Ingreso Detalle Centro de Alertas Vigentes</H5>
			    <form action=\"graba.php\" method=\"post\" name=\"formulario\" onsubmit=\"return vldAlerta();\" >
				  <dl>
				      <dt>Fecha:</dt>
					  <dd>
<input type=\"text\" name=\"fecha\" size=\"10\" maxlength=\"10\" onchange=\"return ValidaFecha2(this.value);\">&nbsp;
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
					  <dd><input type=\"text\" name=\"hora\" size=\"5\" maxlength=\"5\" value=\"". $hora . "\" /></dd>

				      <dt>Zona de Riesgo:</dt>
					  <dd><input type=\"text\" name=\"zona\" size=\"50\" maxlength=\"128\" /></dd>
					  
				      <dt>Grado:</dt>
					  <dd>
					    <select name=\"alerta\" size=\"1\">
							<option value=\"\">Seleccione Grado de Alerta</option>
							<option value=\"1\">Temprana</option>
							<option value=\"2\">Amarilla</option>
						</select>
					  </dd>

				      <dt>Extensi&oacute;n:</dt>
					  <dd><input type=\"text\" name=\"extension\" size=\"50\" maxlength=\"128\" /></dd>

				      <dt>Variable de Riesgo:</dt>
					  <dd>
					  <select name=\"variable\" size=\"1\">
							<option value=\"\">Seleccione Variable de Riesgo</option>
							<option value=\"1\">Hidrometeorologica</option>
							<option value=\"2\">Marejadas</option>
							<option value=\"3\">Hidrometeorologica y Marejadas</option>
							<option value=\"4\">Deshielos</option>
						</select>
					  </dd>

				      <dt>Situaci&oacute;n General:</dt>
					  <dd><textarea name=\"situacion\" rows=\"5\" cols=\"35\" ></textarea></dd>

				      <dt>Orientaci&oacute;n para la Gesti&oacute;n de Protecci&oacute;n Civil:</dt>
					  <dd><textarea name=\"orientacion\" rows=\"5\" cols=\"35\" ></textarea></dd>

					  <dd><input type=\"submit\" value=\" Grabar \" class=\"submit\" /></dd>
					  
				  </dl>

				</form>
			</div>
		</div>
	";

?>
<!-- Central -->
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>