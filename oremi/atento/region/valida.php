<?php 
session_start();

 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];

 $ejerBackEnd = $_SESSION['ejerBackEnd'];
 $tipoCargoBackEnd = $_SESSION['tipoCargoBackEnd'];
 $tipoCoberturaBackEnd = $_SESSION['tipoCoberturaBackEnd'];

 include("../cpanel/incluir/seteaConf.php");
 include("../cpanel/incluir/seteaBD.php");
 include("../cpanel/incluir/encripta.php");
 $link = conectar();

 include("../cpanel/incluir/funciones.php");

 // Recibimos el ID Ejercicio
 $idEjercicio = $_GET["id"];
  
 ?>
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>::. ONEMI COQUIMBO .::</title>
   <meta http-equiv="Content-Type" content="text/html"/>
   <link href="../hojas/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
   <form action="graba.php" method="post" name="conteosubzona" id="conteosubzona" enctype="multipart/form-data" >
      <input type="hidden" name="idEjercicio" id="idEjercicio" value="<?php echo $idEjercicio;?>" />
   <table border="0" cellspacing="0" cellpadding="0">
      <tr><th colspan="2">Validar Regionalmente</th></tr>

	  <tr><td colspan="2"></td></tr>

	  <tr><td colspan="2">
	  <?php
	  // Seleccionamos las subzonas a validar que pertenezcan a esta Provincia
      $qZonas = "SELECT CZ.IDCONTEOZONA, NOMBREZONA, CONTEO_CIVILES, CONTEO_ESCOLARES, FECHAHORA  ".
                   "   FROM tb_conteozona AS CZ, tb_zonaejercicio AS Z ".
                   "      WHERE ".
                   "         VALIDAZONA='N' AND ".
                   "         Z.IDZONAEJERCICIO=CZ.IDZONAEJERCICIO AND ".
                   "         Z.IDEJERCICIO='".$ejerBackEnd."'";
	  
	$rZonas = mysql_query($qZonas);

	if(mysql_num_rows($rZonas) > 0 )
	{
	    echo "<table border='1' cellpadding='2' cellspacing='1'>
		         <tr><th>ID</th><th>CONTEO CIVILES</th><th>CONTEO ESCOLARES</th><th>FECHAHORA</th></tr>";
		while($ptrZ=mysql_fetch_array($rZonas))
		{
			echo "<tr>
					<td>".$ptrZ['NOMBREZONA']."</td>
					<td>".$ptrZ['CONTEO_CIVILES']."</td>
					<td>".$ptrZ['CONTEO_ESCOLARES']."</td>
					<td>".$ptrZ['FECHAHORA']."</td>
				  </tr>";
		}
		echo "</table>";
	}
	  ?>	  
	  </td></tr>
	  
	  
      <tr><td colspan="2" align="center"><input title="Validar" alt=" Validar " src="../imagenes/validar.png" type="image" /></td></tr>
   </table>
   </form>
</body>
</html>