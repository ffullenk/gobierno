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
			    <H5>Agregar Decisiones</H5>
			    <form action=\"agregardec.php\" method=\"post\" name=\"formulario\" id=\"formulario\" onsubmit=\"return vldDec();\" >
				<input type=\"hidden\" name=\"alfa\" value=\"$alfa\" />
				<input type=\"hidden\" name=\"id\" value=\"$id\" />

				<table border=\"0\" >
				  <tr><th >Acciones y Soluciones en Ejecuci&oacute;n</th></tr>
				  <tr><td ><input type=\"text\" name=\"decision\" size=\"45\" maxlenght=\"45\"></td></tr>
				  
				  <tr><td  height=\"25\"></td></tr>
				  
				  <tr><th >Tiempo Reestablecimiento</th></tr>
				  <tr><td ><input type=\"text\" name=\"tpodecision\" size=\"35\" maxlenght=\"35\"></td></tr>
				  
  				  <tr><td height=\"25\"></td></tr>
				  
				  <tr><td><input type=\"submit\" name=\"masdec\" value=\" Guardar \"></td></tr>
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