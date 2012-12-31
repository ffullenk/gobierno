<?
  //Conectar a Base de Datos
  include("conexion.php");
  $link = Conexion();

  // Constatar logeo previo
  include("admxsesion.php");

  if($loginCorrecto)
  {
echo <<< HTML

<html>
<head>
<title>Administraci&oacute;n Sitio gorecoquimbo.cl  - Menu -</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#ffffff" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="760" border="0" cellpadding="0" cellspacing="0" bgcolor="#7CB6DE">
  <tr> 
    <td valign="top" height="65" width="360">&nbsp;</td>
    <td width="400" rowspan="2" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td valign="top" height="25"> 
      <table width="100%" border="0" cellpadding="1" cellspacing="0">
        <tr> 
          <td width="18" height="25" valign="top">&nbsp;</td>
          <td width="83" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="83" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="83" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="83" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>

</table>
</body>
</html>
HTML;

}
else
{
  // Sin Logeo
  echo " Logeese primero pue .. !! ";
}
?>
