<?php
/*
*  Formato de pantalla
*/

function oremiCab() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OREMi :: COQUIMBO</title>
<link href="<?php echo _urlRaiz_?>estilos/estilos.css" rel="stylesheet" type="text/css" />
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="780" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
  <tbody>
     <tr><td colspan="2" height="75"></td><tr>
<?php
}

function oremiLogeo() {
?>
<tr><td colspan="2" height="25" align="right">usted esta logeado como:  &nbsp; <a href="">Cerrar Sesion</a>&nbsp;&nbsp;&nbsp;</td><tr>
	 <tr>
<?php
}


function oremiMenu($opcion) { 
?>
<!--  Columna Menu -->
	    <td width="120" valign="top">
		   <div id="menu">
		      <h2>Inicio</h2>
			     <ul>
				    <li <?php if($opcion=="1") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>inicio.php">Pagina de Inicio</a></li>
				 </ul>
			  
			  <h2>Eventos</h2>
			  <ul>
				    <li <?php if($opcion=="2") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>eventos/">Ingresar Evento</a></li>
					<li <?php if($opcion=="3") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>eventos/">Modificar Evento</a></li>
				 </ul>
			  
			  <h2>Consultas</h2>
			  <ul>
				    <li <?php if($opcion=="4") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>">Eventos por Region</a></li>
					<li <?php if($opcion=="5") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>">Eventos por Provincia</a></li>
					<li <?php if($opcion=="6") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>">Eventos por Comuna</a></li>
					<li <?php if($opcion=="7") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>">Eventos por Localidad</a></li>
				 </ul>
			  
			  <h2>Mantenedor</h2>
			  <ul>
				    <li <?php if($opcion=="8") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>supervisor/index.php">Administradores</a></li>
					<li <?php if($opcion=="9") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>supervisor/tipoevento.php">Tipos de Evento</a></li>
					<li <?php if($opcion=="10") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>supervisor/obrartevial.php">Obras de Arte Vial</a></li>
					<li <?php if($opcion=="11") { echo "class=\"actual\""; } ?>><a href="<?php echo _urlRaiz_?>supervisor/otrainfra.php">Otra Infraestructura</a></li>
				 </ul>
		   </div>
		</td>
		<!--  Columna Menu -->
<?php
}


function oremiCentralTop() {
?>
<!--  Columna Central -->
		<td width="660" valign="top">
		   <div id="central">
<?php
}


function oremiRutaTop() {
?>
<div id="ruta">
    <p>Usted esta en:</p>
</div>
<?php
}


function oremiCentralPie() {
?>
		   </div>
		</td>
		<!--  Columna Central -->
     </tr>
<?php
}




function oremiPie(){
?>
<tr><td colspan="2">www.gorecoquimbo.cl</td></tr>
	 
  </tbody>
</table>
</body>
</html>
<?php
}
?>