<?

include("calendario.php");
echo <<< HTML

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
<title>Administración Sitio Web gorecoquimbo.cl</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="STYLESHEET" type="text/css" href="estilo.css">
</head>
<body bgcolor="#eeeeee">
HTML;
if (!$HTTP_POST_VARS && !$HTTP_GET_VARS){
        $tiempo_actual = time();
        $mes = date("n", $tiempo_actual);
        $ano = date("Y", $tiempo_actual);
        $dia=date("d");
        $fecha=$ano . "-" . $mes . "-" . $dia;
}else {
        $mes = $nuevo_mes;
        $ano = $nuevo_ano;
        $dia = $dia;
        $fecha=$ano . "-" . $mes . "-" . $dia;
}


echo "<table border=0>";
echo "<tr valign='middle' align='center'><td class='tdnrm'><br>";
echo mostrar_calendario($dia,$mes,$ano);
echo "</td></tr>";
echo "</table>";

echo <<< HTML
</body>
</html>
HTML;

?>


