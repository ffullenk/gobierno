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
		$rsInf = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$sqlInf = "SELECT MATERIA, FECHA, RESUMEN, INFORMATIVO_ID 
					FROM INFORMATIVO 
					WHERE INFORMATIVO_ID=\"$id\" ";
		$rsInf->Open($sqlInf);
			
		$nroInf=$rsInf->RecordCount();
		if($nroInf>0) { 
			$rsInf->moveNext();

			$fecha_ = date("d-m-Y");
echo "
			<Script language=\"JavaScript\" src=\"../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/chequeaforms.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/fecha.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/calendar1.js\" type=\"text/javascript\"></Script>

			<div id=\"informeForm\">
			    <H5>Formulario Actualizar Informe Period&iacute;stico</H5>
			    <form action=\"actualiza.php\" method=\"post\" name=\"formulario\" id=\"formulario\" onsubmit=\"return vldInforme();\" >
				<input type=\"hidden\" name=\"id\" value=\"".$rsInf->FieldByNumber(3)."\" />

<table border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" >
<tr>
   <th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\" colspan=\"2\">Informe</th>
</tr>

<tr><td>(*) Materia:</td>
	<td><input type=\"text\" name=\"titulo\" size=\"75\" maxlength=\"250\" value=\"".$rsInf->FieldByNumber(0)."\"  /></td>
</tr>

<tr><td colspan=\"2\" height=\"15\"></td></tr>

<tr><td>(*) Fecha</td>
	<td><input type=\"text\" name=\"fecha\" size=\"10\" maxlength=\"10\" value=\"".fechaNuestra($rsInf->FieldByNumber(1))."\" onchange=\"return ValidaFecha2(this.value);\">&nbsp;
							<a href=\"javascript:cal1.popup();\"><img src=\""._imagenesPanel_."cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Fecha Ocurrencia \"></a>"; ?>
<script language="JavaScript">
<!-- // 
var cal1 = new calendar1(document.forms['formulario'].elements['fecha']);
cal1.year_scroll = true;
cal1.time_comp = false;
//-->
</script>
<?php echo "			
				  </td>
</tr>
					  
<tr><td colspan=\"2\" height=\"15\"></td></tr>

<tr><td>(*) Descripci&oacute;n</td>
	<td><textarea name=\"observaciones\" rows=\"7\" cols=\"50\">".$rsInf->FieldByNumber(2)."</textarea></td>
</tr>

<tr><td colspan=\"2\" height=\"25\"></td></tr>
<tr><td colspan=\"2\" style=\"border-top:3px solid #C0D2DC;\">&nbsp;</td></tr>
<tr><td colspan=\"2\" height=\"25\"></td></tr>

<tr><td colspan=\"2\" align=\"center\">(*) Campos Obligatorios</td></tr>
<tr><td colspan=\"2\" height=\"25\"></td></tr>
<tr><td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\" Guardar Cambios\" name=\"actualiza\" class=\"submit\" /></td></tr>
</table>
				</form>
			</div>";

		} else { // No se hallo el registro 
		}
       ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>