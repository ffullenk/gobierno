<html>
<head>
<title>&middot;::&middot; Gobierno Regional de Coquimbo &middot;&middot;&middot;: Tesis :&middot;&middot;&middot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../estilo/tesis.css" rel="stylesheet" type="text/css">
<script src="../js/fecha.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
  function subWin(loc, nom, ancho, alto, posx, posy) {
    var options="toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1,location=0,directories=0,width=" + ancho + ",height=" + alto;      
        
    win = window.open(loc, nom, options);                 
    win.focus();
    win.moveTo(posx, posy);    
  }
  
  function vldform() {
    if(document.form.usname.value == '') {
	   document.form.usname.focus();
	   alert('Debe Digitar una Cuenta de Usuario.');
	   return false;
	}
	if(document.form.uspass.value == '') {
	   document.form.uspass.focus();
	   alert('Debe Especificar su contraseña.');
	   return false;
	} else {
	   document.form.submit();
	   return true;
	}
  }
</script>
</head>

<body bgcolor="#eaeaeb" onLoad="document.form.usname.focus();">
<table width="750" border="0" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr><td>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="75" height="75" bgcolor="#F2F2F2"><img src="../imagenes/logogore.png" width="75" height="75"></td>
          <td bgcolor="#C6CFE5"><img src="../imagenes/bnppal.png" width="675" height="75"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" height="1"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#5475C6" align="right" class="texto-peq"><font color="#FFFFFF">
	<!-- INSERTAR FECHA -->
      <script language="JavaScript">
      <!--
document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
      // -->
      </script>&nbsp;&nbsp;</font>
</td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td bgcolor="#FFFFFF" height="10"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="450" height="400" valign="top"><table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td align="center"><img src="../imagenes/secport.png" width="438" height="60"></td>
        </tr>
        <tr> 
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><form name="form" method="post" action="login.php" onSubmit="return vldform();">
		      <table width="350" border="0" align="center" cellpadding="0" cellspacing="0" class="tableform">
                <tr> 
                  <td width="103" height="25">Cuenta usuario:</td>
                <td width="247"><input name="usname" type="text" id="usname" size="40" maxlength="50"></td>
              </tr>
              <tr> 
                  <td height="25">Contrase&ntilde;a:</td>
                <td><input name="uspass" type="password" id="uspass" size="40" maxlength="15"></td>
              </tr>
                <tr align="right"> 
                  <td height="45" colspan="2"> 
                    <input type="submit" name="submit" value="  Entrar &raquo;">&nbsp;&nbsp;
                  </td>
              </tr>
            </table></form>
            </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    <td width="300" valign="top"><table width="295" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="20" align="center" background="../imagenes/bckimg-1.png" bgcolor="#E3E3E3" class="texto-tit"><strong>Solicitud 
                  de Temas <img src="../imagenes/nuevo.png" width="45" height="10"></strong></td>
              </tr>
              <tr> 
                <td height="400" valign="top" bgcolor="#F2F2F2" class="texto-tsis">
<p>Se dispone de una nueva secci&oacute;n para solicitar por parte de empresas 
                    temas que requieran estudios los cuales podr&aacute;n ser 
                    ingresados a fin que las instituciones y/o estudiantes de 
                    la regi&oacute;n puedan tener la posibilidad de conocer que 
                    ofertas existen para la formulaci&oacute;n de sus tesis.</p>
                  <p>Cualquier informaci&oacute;n adicional con respecto a esta 
                    p&aacute;gina web, por favor remitirla a <a href="mailto:tesis@gorecoquimbo.cl?subject=Respecto Pagina Tesis">tesis@gorecoquimbo.cl</a></p>
                  <p>&nbsp;</p></td>
              </tr>
            </table></td>
  </tr>
</table>
<table border="0" width="750" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
   <td><div id="lin-footer"><strong>www.gorecoquimbo.cl:</strong>&nbsp;P&aacute;gina desarrollada por <!--Luis Jim&eacute;nez Villalobos,--> Departamento de Inform&aacute;tica Servicio Administrativo GORE-COQUIMBO.</div></td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>