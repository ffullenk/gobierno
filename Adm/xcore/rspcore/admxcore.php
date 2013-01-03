<?

function cabeceraHTML()
{
echo <<< HTML
 <html>
 <head>
 <title>Consejo Regional de Coquimbo - Administración de Sesiones -</title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <link rel="STYLESHEET" type="text/css" href="estilo.css">
 <script src="../../js/browser.js"></script>
 <script src="../../js/util.js"></script>
 <script language="JavaScript">
 if(is_nav4up) {
   document.write('<link rel="stylesheet" href="../../css/gore/ns.css">');
 }
 if(is_ie4up) {
   document.write('<link rel="stylesheet" href="../../css/gore/ie.css">');
 }
 </script>
 </head>
 <body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0">
HTML;
}


if (isset($HTTP_GET_VARS['error'])){

$error_accion_ms[0]= "No se puede borrar la actividad, debe existir por lo menos una.<br>Si desea borrarlo, primero cree una n
ueva.";
$error_accion_ms[1]= "Faltan Datos.";
$error_accion_ms[2]= "Passwords no coinciden.";
$error_accion_ms[3]= "No es Correcto el Valor Hora.";
$error_accion_ms[4]= "La Actividad ya está registrada.";

$error_cod = $HTTP_GET_VARS['error'];
echo "<div align='center'>$error_accion_ms[$error_cod]</div><br>";

}

if (!isset($HTTP_GET_VARS['accion'])){

cabeceraHTML();

}



