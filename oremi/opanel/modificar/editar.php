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
	modOremi("M"); // Servicio Periodistico
?>
    <div >
       <div >
<!-- Central -->
<?php
// Editamos Informacion del Usuario ID
$rsAdmin = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlAdmin = "SELECT NOMBRES, APELLIDOS, FONO, FONO2, MOVIL, MOVIL2, FAX, EMAIL, CUENTA 
				FROM ENCARGADOS 
				WHERE ENCARGADO_ID=\"".$global_qk."\"  ";
$rsAdmin->Open($sqlAdmin);
$nroAdmin=$rsAdmin->RecordCount();
if( $nroAdmin>0) {
	$rsAdmin->moveNext();

	  echo "
			<Script language=\"JavaScript\" src=\"../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/chequeaforms.js\" type=\"text/javascript\"></Script>

			<div id=\"mconregistro\">
			
 			  <div id=\"zeroForm\">
			    <H5>Formulario Actualizacion Administradores</H5>
			    <form action=\"actualiza.php\" method=\"post\" name=\"formulario\" onsubmit=\"return vldAdmin();\">
				  <dl>
			
			<fieldset>
				<legend>Antencedentes Usuario Administrador</legend>
				<dt>Nombres:</dt>
				<dd><input type=\"text\" name=\"nombres\" size=\"30\" maxlength=\"50\" value=\"".$rsAdmin->FieldByNumber(0)."\" /></dd>
				
				<dt>Apellidos:</dt>
				<dd><input type=\"text\" name=\"apellidos\" size=\"30\" maxlength=\"50\" value=\"".$rsAdmin->FieldByNumber(1)."\" /></dd>
				
					<dt><strong>(*)</strong> Email:</dt>
						<dd><input type=\"text\" name=\"email\" id=\"email\" value=\"".$rsAdmin->FieldByNumber(7)."\"size=\"50\" maxlength=\"50\" /></dd>

			</fieldset>					  

					<fieldset>
					<legend>Ubicacion Telefonica</legend>
					<dt><strong>(*)</strong> Telefono:</dt>
						<dd><input type=\"text\" name=\"fono1\" value=\"".$rsAdmin->FieldByNumber(2)."\" size=\"12\" maxlength=\"12\" /></dd>

					<dt>Telefono(2):</dt>
						<dd><input type=\"text\" name=\"fono2\" value=\"".$rsAdmin->FieldByNumber(3)."\" size=\"12\" maxlength=\"12\" /></dd>

					<dt><strong>(*)</strong> Celular:</dt>
						<dd><input type=\"text\" name=\"celu1\" size=\"12\" value=\"".$rsAdmin->FieldByNumber(4)."\" maxlength=\"12\" /></dd>

					<dt>Celular(2):</dt>
						<dd><input type=\"text\" name=\"celu2\" value=\"".$rsAdmin->FieldByNumber(5)."\" size=\"12\" maxlength=\"12\" /></dd>

					<dt><strong>(*)</strong> Fax:</dt>
						<dd><input type=\"text\" name=\"fax\" value=\"".$rsAdmin->FieldByNumber(6)."\" size=\"12\" maxlength=\"12\" /></dd>

					</fieldset>


			<fieldset>
				<legend>Antecedentes Para Ingreso al Sistema</legend>
				<dt>Cuenta de Usuario:</dt>
				<dd><input type=\"text\" name=\"cuenta\" size=\"30\" maxlength=\"16\" value=\"".$rsAdmin->FieldByNumber(8)."\" /></dd>

				<dt>Contrase&ntilde;a:</dt>
				<dd><input type=\"password\" name=\"clave\" size=\"30\" maxlength=\"36\" /></dd>

				<dt>Repetir Contrase&ntilde;a:</dt>
				<dd><input type=\"password\" name=\"repite\" size=\"30\" maxlength=\"36\" /></dd>
				
				
			</fieldset>
			
			  <dd><input type=\"submit\" value=\" Actualizar Cambios \" class=\"ingresar\" /></dd>

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