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
		//echo "<div id=\"mconregistro\">";

if(is_numeric($id)) {

	echo "
			<Script language=\"JavaScript\" src=\"../../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/chequeaforms.js\" type=\"text/javascript\"></Script>

			<div id=\"informeForm\">
			    <H5>Agregar Recursos Involucrados</H5>
			    <form action=\"agregarrec.php\" method=\"post\" name=\"formulario\" id=\"formulario\" onsubmit=\"return vldRec();\" >
				<input type=\"hidden\" name=\"sesAlfa\" value=\"$sesAlfa\" />
				<input type=\"hidden\" name=\"id\" value=\"$id\" />

				<table border=\"0\" align=\"center\">
					<tr><td height=\"25\"></td></tr>
					<tr><td style=\"border-top:3px solid #C0D2DC;\">&nbsp;</td></tr>

				  <tr><td >Recurso</td></tr>
					<tr>
				  		<td ><select name=\"recurso\" size=\"1\">";
$rsNec = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlNec = "SELECT RECURSO_ID, TIPORECURSO FROM RECURSOS";
$rsNec->Open($sqlNec);
$nroNec = $rsNec->RecordCount();
if($nroNec>0) {
	while($rsNec->moveNext() ) {
echo "<option value=\"".$rsNec->FieldByNumber(0)."\">".$rsNec->FieldByNumber(1)."</option>";
	}
}
echo "		  		</select></td>
					</tr>
				  
				  
				  <tr><td >Descripci&oacute;n</td></tr>
				  <tr><td ><input type=\"text\" name=\"descripcion\" size=\"50\" maxlenght=\"250\"></td></tr>
				  
					<tr><td >Cantidad</td></tr>
					<tr><td ><input type=\"text\" name=\"cantidad\" size=\"11\" maxlenght=\"11\"></td></tr>

					<tr><td >Gasto</td></tr>
					<tr><td ><input type=\"text\" name=\"gasto\" size=\"12\" maxlenght=\"12\"></td></tr>

					<tr><td height=\"25\"></td></tr>
					<tr><td style=\"border-top:3px solid #C0D2DC;\">&nbsp;</td></tr>
					
					<tr><td align=\"center\"><input type=\"submit\" name=\"masrec\" value=\" Guardar \"></td></tr>
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