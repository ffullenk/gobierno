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

 // Recibimos el ID Zona
 $idZona = $_GET["id"];
 
 ?>
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>::. ONEMI COQUIMBO .::</title>
   <meta http-equiv="Content-Type" content="text/html"/>
   <link href="../hojas/estilo.css" rel="stylesheet" type="text/css" />

</head>
<body >
   
   <table border="0" width="350" cellspacing="3" cellpadding="2" style="margin:0 auto;border:1px solid #c0c0c0;background-color: #f2f2f2;">
      <tr><th colspan="2" align="center" style="background-color:#ffffff;">ZONA <?php echo NombreZona($idZona);?></th></tr>

	  <tr><td colspan="2"></td></tr>
      
	  <tr><td colspan="2" style=" border: 1px solid #F2F2F2;">
	  
	  <?php
	    $qSubzonas = "SELECT IDSUBZONAEJERCICIO, IDZONAEJERCICIO, NOMBRESUBZONA FROM tb_subzonaejercicio WHERE IDZONAEJERCICIO='".$idZona."' AND ESTADOSUBZONA=\"A\"";
	    $rSubzonas = mysql_query($qSubzonas);
		
		if(mysql_num_rows($rSubzonas) > 0 ) {
		   while($ptrSZ = mysql_fetch_array($rSubzonas))
		   {
		      echo "<hr />";
			  echo "
			     <h4 style='margin:0;padding:0;color:black;'> ". htmlentities($ptrSZ['NOMBRESUBZONA'])."</h4> 
			  <table border='0' width='300' cellspacing='2' cellpadding='0' style='margin:0 auto;background-color: navy; text-align:center;color: white;border:1px solid #C0C0C0;'>
			     <tr><td >Nro.Evacuados</td><td>Hora &Uacute;ltimo Reporte</td></tr>
			     <tr>
				    <td style='color: yellow; font-weight: bold; font-size: 12px;'>";
				    // Busca Conteo SubZona Ultimo
					$sNroEvSZ = "SELECT CONTEO_CIVILES, CONTEO_ESCOLARES, DATE_FORMAT(FECHAHORA,'%d-%m-%Y %H:%i:%s') as FECHA FROM tb_conteosubzona WHERE IDSUBZONAEJERCICIO='".$ptrSZ['IDSUBZONAEJERCICIO']."' ORDER BY FECHAHORA DESC";
					//AND VALIDASUBZONA='S' 
					$rNroEvSZ = mysql_query($sNroEvSZ);
					$conteosubzona_conteo = 0;
			  $conteosubzona_fecha = " ";
					if(mysql_num_rows($rNroEvSZ) > 0 ) {
					   $ptrNESZ = mysql_fetch_array($rNroEvSZ);
					   $conteosubzona_conteo = $ptrNESZ['CONTEO_CIVILES'] + $ptrNESZ['CONTEO_ESCOLARES'];
					   $conteosubzona_fecha = $ptrNESZ['FECHA'];					
					}
					echo $conteosubzona_conteo;
					
			  echo "</td>
			        <td style='color: white; font-weight: bold; font-size: 12px;'>";
					// Busca Hora Conteo SubZona Ultimo
					echo $conteosubzona_fecha . "
			        </td></tr>
			  </table>			  
			  <br />";
			   
		   }
		   
		}
	  ?>
	  
	  </td></tr>
	  
	  
   </table>
   </form>
</body>
</html>