<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><head>
<title>Buzon Ciudadan@ :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="bz_contacto.css" rel="stylesheet" type="text/css">
  <script language="javascript" src="jsrsClient.js"></script>
  <script language="javascript" src="selectphp.js"></script>
  <script language="javascript" src="../js/gore_funcs.js"></script>
  <script type="text/javascript" language="javascript" src="../js/valida.js"></script>
  <script type="text/javascript" language="javascript" src="../js/funciones.js"></script>
</head>
<?php
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
  
?>
<body >
<form name="formulario" method="post" action="gore_oirsB.php" onSubmit="return VldUsuario();">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="middle"><img src="../imagenes/titulo.jpg" alt="Buzon Ciudadano" width="300" height="101"></td>
  </tr>
  <tr>
    <td>Si ha realizado consultas anteriormente, por favor, ingrese el <strong>email</strong> con la cual registr&oacute; sus datos:</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" ><input name="email" type="text" id="email" size="40" maxlength="50">
      <input type="submit" name="usuar" value="Usuario(a) Registrado(a)" >    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Si es primera vez que realizar&aacute; una consulta, por favor, lo invitamos a pasar a la siguientes secci&oacute;n: &nbsp;<a href="gore_oirsP.php" title="Registrar Datos Para realizar Consulta">Registrar Datos para realizar consulta</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>