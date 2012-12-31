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
		//echo "<div id=\"mconregistro\">";

if(is_numeric($id) && is_numeric($alfa)) {

	echo "
			<Script language=\"JavaScript\" src=\"../../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/chequeaforms.js\" type=\"text/javascript\"></Script>

			<div id=\"informeForm\">
			    <H5>Agregar Necesidades</H5>
			    <form action=\"agregarnec.php\" method=\"post\" name=\"formulario\" id=\"formulario\" onsubmit=\"return vldNec();\" >
				<input type=\"hidden\" name=\"alfa\" value=\"$alfa\" />
				<input type=\"hidden\" name=\"id\" value=\"$id\" />

				<table border=\"0\" align=\"center\">
					<tr><td height=\"25\"></td></tr>
					<tr><td style=\"border-top:3px solid #C0D2DC;\">&nbsp;</td></tr>

				  <tr><td >Tipo</td></tr>
					<tr>
				  		<td ><select name=\"necesidad\" size=\"1\">";
$rsNec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlNec = "SELECT TPNECESIDAD_ID, TPNECESIDAD FROM TP_NECESIDAD";
$rsNec->Open($sqlNec);
$nroNec = $rsNec->RecordCount();
if($nroNec>0) {
	while($rsNec->moveNext() ) {
echo "<option value=\"".$rsNec->FieldByNumber(0)."\">".$rsNec->FieldByNumber(1)."</option>";
	}
}
echo "		  		</select></td>
					</tr>
				  
				  
					<tr><td >Cantidad</td></tr>
					<tr><td ><input type=\"text\" name=\"cantidad\" size=\"11\" maxlenght=\"11\"></td></tr>

					<tr><td >Motivo</td></tr>
					<tr><td ><textarea name=\"motivo\" rows=\"7\" cols=\"45\"></textarea></td></tr>

					<tr><td height=\"25\"></td></tr>
					<tr><td style=\"border-top:3px solid #C0D2DC;\">&nbsp;</td></tr>
					
					<tr><td align=\"center\"><input type=\"submit\" name=\"masnec\" value=\" Guardar \"></td></tr>
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