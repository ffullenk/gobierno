<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
  <head>
    <META NAME="Resource-Type" CONTENT="document">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <title>Buzón Ciudadano :: Gobierno Regional de Coquimbo</title>

    <link href="" rel="stylesheet" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!-- Dynamic Version by: Nannette Thacker -->
<!-- http://www.shiningstar.net -->
<!-- Original by :  Ronnie T. Moore -->
function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
//  End -->
</script>
</head>
<body leftMargin=0 topMargin=0 marginwidth="0" marginheight="0">
<form action=" " name="formOirs">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
	<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15%">Nombres</td>
    <td width="25%"><input class=caja_form size=20 name=nombres id="nombres2" value=""></td>
    <td width="5%">&nbsp;</td>
    <td width="20%">Apellido Paterno</td>
    <td width="35%"><input class=caja_form size=20 name=paterno value="" id="paterno2"></td>
  </tr>
  <tr>
    <td>Apellido Materno</td>
    <td><input class=caja_form size=20 name=materno value="" id="materno2"></td>
    <td>&nbsp;</td>
    <td>Email</td>
    <td><input class=caja_form size=20 name=email id="email2" value="" onBlur="javascript: ValidarEmail(this);"></td>
  </tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	<td>Rut</td>
    <td><input type="text" name="rut" class="caja_form" size="20" value="" id="rut2" onblur="javascript: VerificaRut();" onkeypress="javascript: valida_letra_k(this);"></td>
  </tr>
  <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
	</td>
</tr>
<tr><td height="15"></td></tr>
<tr>
	<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="15%">Nacionalidad</td>
          <td width="25%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="20%">Regi&oacute;n</td>
          <td width="35%">&nbsp;</td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Comuna</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td>Direcci&oacute;n</td>
          <td><input class=caja_form size=20 name="direccion" id="direccion2" value=""></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	</td>
</tr>
<tr><td height="15"></td></tr>
<tr>
	<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="15%">Edad</td>
    <td width="25%"><select name="edad" class="caja_form3" id="edad2" >
		<option value="-">Seleccione</option>
		<option value="6 - 14">6 - 14</option>
		<option value="15 - 29">15 - 29</option>
		<option value="30 - 50">30 - 50</option>
		<option value="51 - 65">51 - 65</option>
		<option value="> 66">> 66</option>
	</select>
	</td>
    <td width="5%">&nbsp;</td>
    <td width="20%">G&eacute;nero</td>
    <td width="35%"><input type=radio value=M name="genero" id="genero2" checked>
					</font><span class="txt-verd10azul">M</span><font color="#000066">
					<input type=radio value=F name="genero" id="genero2" {check2}>
					</font><span class="txt-verd10azul">F</span>
	</td>
  </tr>
  <tr>
    <td>Nivel Educacional</td>
    <td><select name="educa" class="caja_form3" id="educa2" >
		<option value="-">Seleccione</option>
		<option value="Básica">Básica</option>
		<option value="Media">Media</option>
		<option value="Universitaria Completa">Universitaria Completa</option>
		<option value="Universitaria Incompleta">Universitaria Incompleta</option>
	</select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	</td>
</tr>
<tr><td height="15"></td></tr>
<tr>
	<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="15%">Tipo Solicitud</td>
    <td width="25%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="20%">Tema</td>
    <td width="35%">&nbsp;</td>
  </tr>
</table>
	</td>
</tr>
<tr><td height="15"></td></tr>
<tr>
	<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="15%">Mensaje</td>
    <td width="85%"><textarea name="mensaje" wrap="physical" onKeyDown="textCounter(document.formOirs.mensaje,document.formOirs.quedan,350)"
onKeyUp="textCounter(document.formOirs.mensaje,document.formOirs.quedan,350)"cols="35" rows="7" class="caja_form2"></textarea></td>
  </tr>
  <tr> 
    <td colspan="2">Quedan <input readonly type="text" name="quedan" size="3" maxlength="3" value="350"> caracteres</td>
  </tr>
</table>
	</td>
</tr>
</table>
</form>
</body>
</html>