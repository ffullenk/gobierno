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

if($loginCorrecto ) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo _cabecera_ ;?></title>
<link href="<?php echo _rutaPanel_;?>estilos/principal.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="jsrsClient.js"></script>
<script language="javascript" src="selectphp.js"></script>
</head>
<?php
  $Region = isset($_POST['lstRegion']) ? $_POST['lstRegion'] : -99;
  $Provincia = isset($_POST['lstProvincia']) ? $_POST['lstProvincia'] : -99;
  $Comuna = isset($_POST['lstComuna']) ? $_POST['lstComuna'] : -99;

?>
<body onload="preselect('<?php echo $Region;?>', '<?php echo $Provincia;?>', '<?php echo $Comuna;?>', 1);">
<?php
	izqOremi();
	modOremi("E");
?>
    <div >
       <div >
<!-- Central -->
<?php
	echo "
			<Script language=\"JavaScript\" src=\"../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../js/chequeaforms.js\" type=\"text/javascript\"></Script>


			<div id=\"msinregistro\">
			Esta Tabla actualmente no posee Registros a visualizar. 
			El siguiente Formulario, le permitirá Añadir en la Base de Datos un nuevo Registro.</div>
			
			<div id=\"zeroForm\">
			    <H5>Formulario Ingreso Encagados Usuarios Del Sistema</H5>
			    <form action=\"graba.php\" method=\"post\" name=\"formulario\" onsubmit=\"return vldEncargado();\" >
				<dl>
					<fieldset>
					<legend>Identificacion del Funcionario</legend>
					<dt><strong>(*)</strong> Nombres:</dt>
						<dd><input type=\"text\" name=\"nombres\" id=\"nombres\" size=\"30\" maxlength=\"30\" /></dd>

					<dt><strong>(*)</strong> Apellidos:</dt>
						<dd><input type=\"text\" name=\"apellidos\" id=\"apellidos\" size=\"30\" maxlength=\"30\" /></dd>

					<dt><strong>(*)</strong> Email:</dt>
						<dd><input type=\"text\" name=\"email\" id=\"email\" size=\"50\" maxlength=\"50\" /></dd>


					<dt><strong>(*)</strong> Encargado:</dt>
						<dd>
							<select name=\"cargos\" size=\"1\">
								<option value=\"\">Seleccione Cargo....</option>";
$rsCargos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlCargos = "SELECT CARGO_ID, CARGO FROM CARGOS";
$rsCargos->Open($sqlCargos);
$nro_cargos = $rsCargos->RecordCount();
if( $nro_cargos > 0 ) {
  while($rsCargos->moveNext()) {
  	echo "<option value=\"".$rsCargos->FieldByNumber(0)."\">".$rsCargos->FieldByNumber(1)."</option>";  
  }

}

echo "						</select>
					</dd>			
					</fieldset>

					<fieldset>
					<legend>Ubicacion Telefonica</legend>
					<dt><strong>(*)</strong> Telefono:</dt>
						<dd><input type=\"text\" name=\"fono1\" size=\"12\" maxlength=\"12\" /></dd>

					<dt>Telefono(2):</dt>
						<dd><input type=\"text\" name=\"fono2\" size=\"12\" maxlength=\"12\" /></dd>

					<dt><strong>(*)</strong> Celular:</dt>
						<dd><input type=\"text\" name=\"celu1\" size=\"12\" maxlength=\"12\" /></dd>

					<dt>Celular(2):</dt>
						<dd><input type=\"text\" name=\"celu2\" size=\"12\" maxlength=\"12\" /></dd>

					<dt><strong>(*)</strong> Fax:</dt>
						<dd><input type=\"text\" name=\"fax\" size=\"12\" maxlength=\"12\" /></dd>

					</fieldset>
					
					<fieldset>
					<legend>Ubicacion Geografica</legend>
					<dt><strong>(*)</strong> Region</dt>
						<dd><select name=\"lstRegion\" id=\"lstRegion\">
								<option>--------- Sin Informacion Aun ---------</option>
							</select>
						</dd>

					<dt><strong>(*)</strong> Provincia</dt>
						<dd><select name=\"lstProvincia\" id=\"lstProvincia\">
								<option>--------- Sin Informacion Aun ---------</option>
							</select>
						</dd>

					<dt><strong>(*)</strong> Comuna</dt>
						<dd><select name=\"lstComuna\" id=\"lstComuna\">
								<option>--------- Sin Informacion Aun ---------</option>
							</select>
						</dd>

					</fieldset>
					
					<fieldset>
					<legend>Usuario del Sistema</legend>
					<dt><strong>(*)</strong> Cuenta de Usuario:</dt>
						<dd><input type=\"text\" name=\"cuenta\" size=\"16\" maxlength=\"16\" /></dd>

					<dt><strong>(*)</strong> Contrase&ntilde;a:</dt>
						<dd><input type=\"password\" name=\"contrasenya\" size=\"32\" maxlength=\"32\" /></dd>

					<dt><strong>(*)</strong> Repita Contrase&ntilde;a:</dt>
						<dd><input type=\"password\" name=\"clave\" size=\"32\" maxlength=\"32\" /></dd>

					<dt></dt>
					</fieldset>
					
					<dd><input type=\"submit\" value=\" Grabar \" class=\"submit\" /></dd>

				  </dl>
				</form>
				<p><strong>(*)</strong> Datos Obligatorios</p>
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


function SelectBox( $Label, $selectName ){ ?>
  <tr ALIGN="LEFT">
    <td width="97"><?php echo $Label ?></td>
    <td align="left">
      <select name="<?php echo $selectName ?>">
        <option></option><option></option><option></option>
        <option>--------- No cargada aun ---------</option> 
      </select>
    </td>
  </tr> <?php 
}

?>