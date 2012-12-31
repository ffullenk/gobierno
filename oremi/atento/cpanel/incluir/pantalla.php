<?php
include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>OREMi :: COQUIMBO</title>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css" />
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="780" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="margin:0 auto;">
  <tbody>
     <tr><td colspan="2" height="75"></td><tr>
	 <tr>
	    <td width="280"><img src="" title="ONEMI Region de Coquimbo"></td>
		<td>DIRECCI&Oacute;N REGIONAL ONEMI <br /> EJERCICIOS DE SIMULACRO <br /> REGI&Oacute;N DE COQUIMBO</td>
	 </tr>
  </tbody>
</table>

<table width="780" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" style="border:1px solid #ccc">
  <tbody>
     <tr><td colspan="2" height="75"></td><tr>
	 <tr>
	    <!-- Lado Menu Principal -->
		<td width="170">
		   <table border="0" cellspacing="0" cellpadding="0" >
		     <tr><th>EJERCICIO</th></tr>
			 <tr><td><a href="<?php echo _ntbkUrlPanel_;?>ejercicio.php" accesskey="1" title="" <?php if($opcion==1) { echo "class=\"actual\"";}?>>Ejercicios de Simulacro</a></td></tr>
			 
			 <tr><th>USUARIOS</th></tr>
			 <tr><td><a href="<?php echo _ntbkUrlPanel_;?>encargados.php" accesskey="2" title="" <?php if($opcion==1) { echo "class=\"actual\"";}?>>Encargados</a></td></tr>
			 <tr><td><a href="<?php echo _ntbkUrlPanel_;?>colaboradores.php" accesskey="3" title="" <?php if($opcion==1) { echo "class=\"actual\"";}?>>Colaboradores</a></td></tr>
			 <tr><td><a href="<?php echo _ntbkUrlPanel_;?>cargos.php" accesskey="4" title="" <?php if($opcion==1) { echo "class=\"actual\"";}?>>Cargos</a></td></tr>
			 
			 <tr><th>COBERTURA</th></tr>
			 <tr><td><a href="<?php echo _ntbkUrlPanel_;?>cobertura.php" accesskey="5" title="" <?php if($opcion==1) { echo "class=\"actual\"";}?>>Cobertura</a></td></tr>
			 
			 <tr><th>ZONAS y SUBZONAS</th></tr>
			 <tr><td><a href="<?php echo _ntbkUrlPanel_;?>zona.php" accesskey="6" title="" <?php if($opcion==1) { echo "class=\"actual\"";}?>>Zonas</a></td></tr>
			 <tr><td><a href="<?php echo _ntbkUrlPanel_;?>subzona.php" accesskey="7" title="" <?php if($opcion==1) { echo "class=\"actual\"";}?>>SubZonas</a></td></tr>
			 
		   </table>
		</td>
		
		<!-- Lado Principal -->
		<td width="">
		
		</td>
	  </tr>
	  <tr><td colspan="2" height="75"></td><tr>
  </tbody>
</table>

<table width="780" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" >
  <tbody>
     <tr><td colspan="2" height="75"></td><tr>
	 <tr>
	    <td>Desarrollado por <a href="mailto:luis.jimenez.villalobos@gmail.com" target="_blank">Luis Jimenez Villalobos</a></td>
	 </tr>
  </tbody>
</table>	 
	 
	 
<?php

?>