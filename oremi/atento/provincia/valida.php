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

 // Recibimos el ID Provincia
 $zona_Provincia = $_GET["id"];
  
 ?>
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>::. ONEMI COQUIMBO .::</title>
   <meta http-equiv="Content-Type" content="text/html"/>
   <link href="../hojas/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div style="margin:0;padding:0;">
   <form action="graba.php" method="post" name="conteosubzona" id="conteosubzona" enctype="multipart/form-data" >
      <input type="hidden" name="zona_Provincia" id="zona_Provincia" value="<?php echo $zona_Provincia;?>" />
   <table border="0" width="400" cellspacing="3" cellpadding="2" style="margin:0 auto;border:1px solid #c0c0c0;background-color: #f0f0f0;">
      <tr><th colspan="2">Validar Provincialmente</th></tr>

	  <tr><td colspan="2" style="background-color:#ffffff;text-align:center;">Provincia de <?php echo NombreProvincia($zona_Provincia);?></td></tr>

	  <tr><td colspan="2">
	  <?php
	  // Seleccionamos las subzonas a validar que pertenezcan a esta Provincia
      $qSubZonas = "SELECT DISTINCT (CSZ.IDSUBZONAEJERCICIO), CONTEO_CIVILES, CONTEO_ESCOLARES, CSZ.FECHAHORA ".
				" FROM tb_subzonaejercicio AS SZ, tb_conteosubzona AS CSZ, tb_zonaejercicio AS Z ".
				" WHERE ".
					//" VALIDASUBZONA='N' AND ".
					" Z.IDZONAEJERCICIO=SZ.IDZONAEJERCICIO AND ".
					" SZ.IDSUBZONAEJERCICIO=CSZ.IDSUBZONAEJERCICIO AND ".
					" Z.IDEJERCICIO='".$ejerBackEnd."' AND Z.IDPROVINCIA='".$zona_Provincia."' ".
				" GROUP BY CSZ.IDSUBZONAEJERCICIO ".
				" ORDER BY CSZ.FECHAHORA DESC";

	$rSubZonas = mysql_query($qSubZonas);

	if(mysql_num_rows($rSubZonas) > 0 )
	{
	    echo "<table border='0' cellpadding='1' cellspacing='2' style='border:1px solid #c0c0c0;'>
		         <tr><th>SUBZONAS</th><th>CONTEO CIVILES</th><th>CONTEO ESCOLARES</th><th>FECHAHORA</th></tr>";
		while($ptrSZ=mysql_fetch_array($rSubZonas))
		{
			echo "<tr >
					<td style='background-color:#e0e0e0;'>".NombreSubZona($ptrSZ['IDSUBZONAEJERCICIO'])."</td>
					<td style='background-color:#e0e0e0;'>".$ptrSZ['CONTEO_CIVILES']."</td>
					<td style='background-color:#e0e0e0;'>".$ptrSZ['CONTEO_ESCOLARES']."</td>
					<td style='background-color:#e0e0e0;'>".$ptrSZ['FECHAHORA']."</td>
				  </tr>";
		}
		echo "</table>";
	}
	  ?>	  
	  </td></tr>
	  
	  
      <tr><td colspan="2" align="center"><input title="Validar" alt=" Validar " src="../imagenes/validar.png" type="image" /></td></tr>
   </table>
   </form>
</div>
</body>
</html>