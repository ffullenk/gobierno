<?
include ("calendario/calendario.php");
?>
<html>
<head>
	<title>Utilización del calendario</title>
	<script language="JavaScript" src="calendario/javascripts.js"></script>
</head>

<body>
<h1>Uso del Calendario</h1>
Para seleccionar una fecha que se colocaría en un campo de formulario
<br>
<br>
<br>
<form name="fcalen"> 
Fecha: 
    <INPUT name="fecha1" size="10"> 
    <input type="button" value="Seleccionar una fecha" onclick="muestraCalendario('','fcalen','fecha1')"> 
</form>

</body>
</html>	
