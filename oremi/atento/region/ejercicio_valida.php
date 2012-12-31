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
 
 $qEjer = "SELECT HORAINICIO, HORATERMINO FROM tb_ejercicios WHERE IDEJERCICIO='".$ejerBackEnd."'";
 $rEjer = mysql_query($qEjer);
 
 if(mysql_num_rows($rEjer) > 0 )
 {
    $ptrE = mysql_fetch_array($rEjer);
	$horainicio = $ptrE['HORAINICIO'];
	$horatermino = $ptrE['HORATERMINO'];
  }
  
 ?>
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>::. ONEMI COQUIMBO .::</title>
   <meta http-equiv="Content-Type" content="text/html"/>
   <link href="../hojas/estilo.css" rel="stylesheet" type="text/css" />
   <script language="javascript" type="text/javascript">
	function setFocus() {
		document.actualiza.horainicio.select();
		document.actualiza.horainicio.focus();
	}
</script>
</head>
<body onload="setFocus();">
   <form action="ejercicio_actualiza.php" method="post" name="actualiza" id="actualiza" enctype="multipart/form-data" >
      <input type="hidden" name="idEjercicio" id="idEjercicio" value="<?php echo $idEjercicio;?>" />
   <table border="0" width="300" cellspacing="3" cellpadding="2" style="margin:0 auto;border:1px solid #c0c0c0;background-color: #f2f2f2;">
      <tr><th colspan="2">Actualiza Datos Ejercicio</th></tr>

	  <tr><td colspan="2"></td></tr>
      <tr><td>Hora Inicio:</td><td><input type="text" name="horainicio" size="7" maxlength="5" id="horainicio" value="<?php echo $horainicio;?>" /></td></tr>
	  <tr><td>Hora T&eacute;rmino:</td><td><input type="text" name="horatermino" size="7" maxlength="5" id="horatermino" value="<?php echo $horainicio;?>" /></td></tr>
	  <tr><td colspan="2"></td></tr>
	  
	  
	  <tr><td colspan="2" align="center"><input title="Validar" alt=" Validar " src="../imagenes/validar.png" type="image" /></td></tr>
   </table>
   </form>
</body>
</html>