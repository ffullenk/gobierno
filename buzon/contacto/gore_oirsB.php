<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><head>
<title>Buzon Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="bz_contacto.css" rel="stylesheet" type="text/css">
  <script language="javascript" src="jsrsClient.js"></script>
  <script language="javascript" src="selectphp.js"></script>
  <script language="javascript" src="../js/gore_funcs.js"></script>
  <script type="text/javascript" language="javascript" src="../js/valida.js"></script>
  <script type="text/javascript" language="javascript" src="../js/funciones.js"></script>
<script>
function valida() {
    if (document.QForm.mensaje.value.length==0){ 
		alert("Debe ingresar su consulta.")
		document.QForm.mensaje.focus()
		return 0; 
	}
	// el  formulario se envia
	document.QForm.submit();
}
</script>
</head>
<?php
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
  
?>
<body >
<table cellspacing="0" cellpadding="0" border="0" align="center" width="98%">
<tr align="center">
  <td>
<?php

	$email = $_POST['email'];
	
	// Consultamos en la Tabla por la existencia del email
	$rsTabla =new Recordset($SERVER , $DB , $USER , $PASSWORD);
	$query = "SELECT COD_PERS, NOMBRES, PATERNO, MATERNO FROM PERSONA WHERE EMAIL = '".$email."';";
	$rsTabla->Open($query);
	$nro_registros = $rsTabla->RecordCount();
	if($nro_registros>0)
	{
		/* Existe un email ingresado para este user. */
		$rsTabla->moveNext();
		$CodPersona	= $rsTabla->fieldByName("COD_PERS");
		$nombres	= $rsTabla->fieldByName("NOMBRES");
		$paterno	= $rsTabla->fieldByName("PATERNO");
		$materno	= $rsTabla->fieldByName("MATERNO");
?>
		<form name="QForm" method="post" action="gore_oirsS.php">
		<input type="hidden" name="ddond" value="1" >
		<input type="hidden" name="CodPersona" value="<?=$CodPersona?>" >
		<input type="hidden" name="email" value="<?=$email?>" >
		<input type="hidden" name="nombres" value="<?=$nombres?>" >
		<input type="hidden" name="paterno" value="<?=$paterno?>" >
		<input type="hidden" name="materno" value="<?=$materno?>" >
		
			<table width="550" >
			<tr> 
			   <td colspan="2" style="color:#CCFF00;background-color:#000;text-align:center;font-size:12pt;font-family:Verdana,'Lucida Grande', Arial;">Realizaci&oacute;n de la consulta al Buz&oacute;n Ciudadano del Gobierno Regional de Coquimbo</td>
			</tr>
			<tr><td height="25" colspan="2"></td></tr>
			<tr><td width="115">Usuario Registrado:</td>
			<td width="423" align="left"><strong><?=$nombres ." ". $paterno." ". $materno?></strong></td>
			</tr>
			</table>

			<table width="550" >
			  <tr> 
				<td width="97">Tipo Consulta:</td>
			    <td><select name="tipo" class="formlist"><?php
					$rsTabla = new Recordset($SERVER , $DB , $USER , $PASSWORD);
					$rsTabla->Open("SELECT COD_TIPO, TIPO FROM TIPO ORDER BY TIPO ASC");
					for ($i = 0 ; $i < $rsTabla->RecordCount() ; $i++)
					{
						$rsTabla->moveNext();
						echo"<option value='".$rsTabla->FieldByNumber(0)."'>".
						$rsTabla->FieldByNumber(1) . "</option>"; 
					}?>
				</select>
				</td>
			  </tr>
			  <tr> 
			    <td>Tema:</td>
			    <td><select name="tema" class="formlist"><?php
					$rsTema = new Recordset($SERVER , $DB , $USER , $PASSWORD);
					$rsTema->Open("SELECT COD_TEMA, TEMA FROM TEMAS WHERE ACTIVADO=\"S\" ORDER BY TEMA ASC");
					for ($i = 0 ; $i < $rsTema->RecordCount() ; $i++)
					{
						$rsTema->moveNext();
						echo"<option value='".$rsTema->FieldByNumber(0)."'>".
						$rsTema->FieldByNumber(1) . "</option>"; 
					}?>
					</select></td>
			  </tr>
			</table>
			<br/>

			<table width="550">
				<tr><td>Mensaje:</td></tr>
				<tr align="center"> 
					<td><textarea name="mensaje"  cols="80" rows="15" ></textarea>
					</td>
				</tr>

			</table>
			<br />
			<table width="550">
			<tr>
				<td align="center"><input type="button" name="envia" value="Enviar" onclick="valida()">
				</td>
			</tr>
		</table>
		</form>
<?php

		
	
	}
	else {
		// El email no se encuentra. Lo redirijimos a la pagina inicial
?>
		<tr>
			<td>El email que suministr&oacute; no se encuentra en nuestra base de datos. Deber&aacute; <a href="gore_oirsP.php" title="Registrar Datos Para realizar Consulta">Registrar Datos para realizar consulta</a></td>
		</tr>
<?php
	}

?>
</table>
</body>
</html>