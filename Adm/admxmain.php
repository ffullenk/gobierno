<?
  //Conectar a Base de Datos
  include("conexion.php");
  $link = Conexion();

  // Constatar logeo previo
  include("admxsesion.php");

  if($loginCorrecto)
  {
	// Se Había Logeado Previamente
	 echo('<HTML>');
        echo('<HEAD>');
        echo('<TITLE>Zona Acceso Restringido Administración Sitio Web gorecoquimbo.cl -</TITLE>');
        echo('<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">');
        echo('<meta name="author" content="Luis Jiménez Villalobos">');
        echo('<LINK href="css_adm.css" rel="stylesheet" type="text/css">');
        echo('</HEAD>');
        echo('<BODY BGCOLOR="#FFFFFF" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0">');
        echo('<CENTER>');
        echo('  <TABLE BORDER="0" CELLSPACING="1" CELLPADDING="1" BGCOLOR="#00CCFF">');
        echo('    <TR><TD HEIGHT="5"></TD></TR>');
        echo('    <TR>');
        echo "      <TD CLASS='normal' HEIGHT='35'>Hola: $Ncta -- Tienes Acceso: $Nniv -- Tu ID de Sesion es: $Nses</TD>";
        echo('    </TR>');
        echo('  </TABLE>');
        echo('</CENTER>');
        echo('</BODY>');
        echo('</HTML>');

	echo "Tabai logeao puh wea...";
  }
  else
  {
	// Nunca Se Logeo
	echo "Logeate primero puh wea...";
  }

?>

