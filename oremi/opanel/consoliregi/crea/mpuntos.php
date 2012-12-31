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
	modOremi("R"); // Crea un Nuevo Informe Alfa/Consolidado
?>
    <div >
       <div >
	   <?php
		//echo "<div id=\"mconregistro\">";
if(is_numeric($id)) {
	echo "
			<Script language=\"JavaScript\" src=\"../../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/chequeaforms.js\" type=\"text/javascript\"></Script>

			<div id=\"informeForm\">
			    <H5>Agregar Punto Cr&iacute;tico</H5>
			    <form action=\"agregarpto.php\" method=\"post\" name=\"formulario\" id=\"formulario\" onsubmit=\"return vldPto();\" >
				<input type=\"hidden\" name=\"sesAlfa\" value=\"$sesAlfa\" />
				<input type=\"hidden\" name=\"id\" value=\"$id\" />
				
				<table border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" >
				<tr><td height=\"25\"></td></tr>
				<tr>
					<th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\">Identificaci&oacute;n</th>
				</tr>
				
				<tr><td ><textarea name=\"identificar\" rows=\"5\" cols=\"55\"></textarea></td></tr>
				  
				<tr><td  height=\"25\"></td></tr>
				  
				<tr>
					<th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\">Ubicaci&oacute;n</th>
				</tr>

				<tr><td ><textarea name=\"ubicar\" rows=\"5\" cols=\"55\"></textarea></td></tr>
				  
				<tr><td height=\"25\"></td></tr>
  				
				<tr>
					<th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\">Da&ntilde;os</th>
				</tr>

				<tr><td ><textarea name=\"danar\" rows=\"7\" cols=\"55\"></textarea></td></tr>
				  
				<tr><td height=\"25\"></td></tr>
				  
				<tr>
					<th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\">Estado Actual</th>
				</tr>

				<tr><td ><textarea name=\"estactual\" rows=\"5\" cols=\"55\"></textarea></td></tr>
				  
				<tr><td height=\"25\"></td></tr>				  
				  
				<tr>
					<th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\">Soluci&oacute;n</th>
				</tr>
				
				<tr><td ><textarea name=\"solucionar\" rows=\"7\" cols=\"55\"></textarea></td></tr>
				  
				<tr><td height=\"25\"></td></tr>
				
				<tr>
					<th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\">Gesti&oacute;n</th>
				</tr>

				<tr><td ><textarea name=\"gestionar\" rows=\"5\" cols=\"55\"></textarea></td></tr>
				  
				<tr><td height=\"25\"></td></tr>
				<tr><td  style=\"border-top:3px solid #C0D2DC;\">&nbsp;</td></tr>
				<tr><td  height=\"25\"></td></tr>				  				  
				<tr><td align=\"center\"><input type=\"submit\" name=\"maspto\" value=\" Guardar \"></td></tr>
				</table>

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