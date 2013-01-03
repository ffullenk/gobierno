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
<title>Administraci&oacute;n Sitio Web gorecoquimbo.cl  - Central -</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="760" border="0" cellpadding="0" cellspacing="0" bgcolor="#7CB6DE">
  <tr> 
    <td width="760" height="325" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr> 
    <td valign="top" height="105"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="760" height="20" valign="top" bgcolor="#A4CCE8">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="66">&nbsp;</td>
        </tr>
        <tr> 
          <td height="20" valign="top" bgcolor="#eeeeee">&nbsp;</td>
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
  echo " Logeese primero pue ...!!";
}
?>
