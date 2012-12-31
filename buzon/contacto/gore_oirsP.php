<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><head>
<title>Buzon Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="bz_contacto.css" rel="stylesheet" type="text/css">
  <script language="javascript" src="jsrsClient.js"></script>
  <script language="javascript" src="selectphp.js"></script>
  <script language="javascript" src="../js/gore_funcs.js"></script>
  <script type="text/javascript" language="javascript" src="../js/valida.js"></script>
  <script type="text/javascript" language="javascript" src="../js/funciones.js"></script>

</head>
<?php
  $Region = isset($_POST['lstRegion']) ? $_POST['lstRegion'] : -99;
  $Provincia = isset($_POST['lstProvincia']) ? $_POST['lstProvincia'] : -99;
  $Comuna = isset($_POST['lstComuna']) ? $_POST['lstComuna'] : -99;

	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
  
?>
<body  onload="preselect('<?php echo $Region;?>', '<?php echo $Provincia;?>', '<?php echo $Comuna;?>', 1);">
<table cellspacing="0" cellpadding="0" border="0" align="center" width="98%">
<tr align="center">
	<td bgcolor="#f8f8f8">
		<form name="QForm" method="post" action="gore_oirsS.php" onSubmit="return VldFormUs();">
		<input type="hidden" name="ddond" value="0" >

		<table width="550" >
		  <tr> 
		   <td style="color:#fff;background-color:#003366;text-align:center;font-size:12pt;font-family:Verdana,'Lucida Grande', Arial;">Registro de Datos para la realizaci&oacute;n de la consulta al Buz&oacute;n Ciudadano del Gobierno Regional de Coquimbo</td>
		  </tr>
		  <tr><td height="15"></td></tr>
		</table>
		<table width="550" >
		  <tr> 
		    <td width="97" bgcolor="#d6e6f5">Nacionalidad:</td>
		    <td width="160" bgcolor="#f8f8f8"> <select name="nacion" id="nacion" onChange="venacion()">
						        <option value="1">Chile</option>
						        <option value="0">Otro Pais</option>
	        </select></td>
		    <td width="10">&nbsp;</td>
		    <td width="97" bgcolor="#d6e6f5">Otro:</td>
		    <td width="148" bgcolor="#f8f8f8"><input name="otropais" type="text" id="otropais" size="20" maxlength="20"></td>
		  </tr>
		</table>
		<br />
		<table width="550">
		  <tr> 
		    <td width="97" bgcolor="#d6e6f5">Nombres:</td>
		    <td width="160" bgcolor="#f8f8f8"><input name="nombres" type="text" id="nombres" size="20" maxlength="20"></td>
		    <td width="10">&nbsp;</td>
		    <td width="97" bgcolor="#d6e6f5">Ap.Paterno:</td>
		    <td width="148" bgcolor="#f8f8f8"><input name="paterno" type="text" id="paterno" size="20" maxlength="20"></td>
		  </tr>
		  <tr> 
		    <td bgcolor="#d6e6f5">Ap.Materno:</td>
		    <td><input name="materno" type="text" id="materno" size="20" maxlength="20"></td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		  </tr>
		  <tr>
		    <td bgcolor="#d6e6f5">Direccion:</td>
		    <td><input name="direccion" type="text" id="direccion" size="20" maxlength="50"></td>
		    <td>&nbsp;</td>
		    <td bgcolor="#d6e6f5">Rut:</td>
		    <td><input name="rut" type="text" id="rut" size="20" maxlength="12"></td>
		  </tr>
		  <Tr><Td colspan="5" align="right">[ej:12345678-9] &nbsp;</Td></Tr>
		</table>
		<br />
		<table width="550">
		  <tr>
		    <td width="97" bgcolor="#d6e6f5">Email:</td>
		    <td width="437"><input name="email" type="text" id="email" size="50" maxlength="50"></td>
		  </tr>
		</table>
		<br />
		<table width="550">
		  <tr ALIGN="LEFT">
		    <td width="97" bgcolor="#d6e6f5"><label for="lstRegion">Region</label></td>
		    <td align="left">
		      <select name="lstRegion" id="lstRegion">
		        <option>--------- Sin Informacion Aun ---------</option>
		      </select>
		    </td>
		  </tr>
		  <tr ALIGN="LEFT">
		    <td width="97" bgcolor="#d6e6f5"><label for="lstProvincia">Provincia</label></td>
		    <td align="left">
		      <select name="lstProvincia" id="lstProvincia">
		        <option>--------- Sin Informacion Aun ---------</option>
		      </select>
		    </td>
		  </tr>
		  <tr ALIGN="LEFT">
		    <td width="97" bgcolor="#d6e6f5"><label for="lstComuna">Comuna</label></td>
		    <td align="left">
		      <select name="lstComuna" id="lstComuna">
		        <option>--------- Sin Informacion Aun ---------</option>
		      </select>
		    </td>
 		 </tr>
		
		  <?php /*SelectBox ("Region", "lstRegion");
		  SelectBox ("Provincia", "lstProvincia");
		  SelectBox ("Comuna", "lstComuna");*/?>
		</table>
		<br />
		<table width="550">
		  <tr> 
		    <td width="96" bgcolor="#d6e6f5">Edad:</td>
		    <td width="162"><select name="edad" id="edad">
		        <option value="0">Seleccione Rango...</option>
		        <option value="6-14">6-14</option>
		        <option value="15-29">15-29</option>
		        <option value="30-50">30-50</option>
		        <option value="51-65">51-65</option>
		        <option value="&gt;66">&gt;66</option>
		      </select>
			</td>
		    <td width="10">&nbsp;</td>
		    <td width="98">&nbsp;</td>
		    <td width="150">&nbsp;</td>
		  </tr>
		  <tr> 
		    <td colspan="2" bgcolor="#d6e6f5">Sexo:
		      <input type="radio" name="genero" value="M">
		      Hombre 
		      <input name="genero" type="radio" value="F" checked>
	        Mujer</td>
		    <td>&nbsp;</td>
		    <td bgcolor="#d6e6f5">Educacion:</td>
		    <td><select name="educacion" id="educacion">
			        <option value="0">Seleccione Educacion...</option>
			        <option value="Basica">Basica</option>
			        <option value="Media">Media</option>
			        <option value="Univ.Completa">Univ.Completa</option>
			        <option value="Univ.Incompleta">Univ.Incompleta</option>
			      </select>
			</td>
		</tr>
  		<tr>
		      <td colspan="5">&nbsp;</td>
		</tr>
		</table>
		<br/>
		<table width="550">
		  <tr> 
		    <td width="97" bgcolor="#d6e6f5">Tipo Consulta:</td>
		    <td><select name="tipo" class="formlist" tabindex="15"><?php
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
		    <td bgcolor="#d6e6f5">Tema:</td>
		    <td><select name="tema" class="formlist" tabindex="16"><?php
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
		  <tr><td bgcolor="#d6e6f5">Mensaje:</td></tr>
		  <tr align="center"><td><textarea name="mensaje" cols="60" rows="15" ></textarea></td> </tr>
          <tr align="center"><td><img src="captcha.php" ></td></tr>
          <tr align="center"><td><input type="text" name="vcap" value=""></td></tr>
		</table>
		<br />

		
<!--
<tr> 
<td><textarea name="mensaje" wrap="physical" onKeyDown="textCounter(document.QForm.mensaje,document.QForm.quedan,350)"
		onKeyUp="textCounter(document.QForm.mensaje,document.QForm.quedan,350)" cols="60" rows="7" ></textarea> Quedan &nbsp;<input readonly type="text" name="quedan" size="3" maxlength="3" value="350"> caracteres</td>
</tr> 
-->
		<table width="550">
		<tr>
			<td align="center"><input type="submit" name="envia" value="Enviar">&nbsp;&nbsp;
      					<input name="borra" type="Reset" value="Borrar">
			</td>
		</tr>
		</table>
</form>
</td>
</tr>
<tr><td height="10"></td></tr>
</table>
<br/>
<br/>
</body>
</html>

<?php

function SelectBox( $Label, $selectName ){
  ?>
  <tr ALIGN="LEFT">
    <td width="97"><?php echo $Label ?></td>
    <td align="left">
      <select name="<?php echo $selectName ?>">
        <option></option><option></option><option></option>
        <option>--------- No cargada aun ---------</option> 
      </select>
    </td>
  </tr>
<?php 
} 
?>

