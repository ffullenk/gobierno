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

$id = $_GET["id"]; 
$HoraMinutos = getdate(time()); 
$Hora =  $HoraMinutos["hours"]; 
$Minutos =  $HoraMinutos["minutes"];
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <title>::. ONEMI COQUIMBO .::</title>
   <meta http-equiv="Content-Type" content="text/html"/>
   <link href="../hojas/estilo.css" rel="stylesheet" type="text/css" />
   <script language="javascript" type="text/javascript">
	function setFocus() {
		document.conteosubzona.evacua_civiles.select();
		document.conteosubzona.evacua_civiles.focus();
	}
</script>
</head>
<body onload="setFocus();">
   <form action="graba.php" method="post" name="conteosubzona" id="conteosubzona" enctype="multipart/form-data" onSubmit="chequea_form_conteosubzona(); return false">
      <input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
   <table border="0" width="300" cellspacing="3" cellpadding="2" style="margin:0 auto;border:1px solid #c0c0c0;background-color: #f2f2f2;">
      <tr><th colspan="2">INGRESO DE REPORTE</th></tr>
	  
	  <tr><td colspan="2" align="center" style="background-color:#ffffff;"><?php echo NombreSubZona($id);?></td></tr>
	  
	  <tr><td>Hora Reporte</td><td><input type="text" name="evacua_hora" id="evacua_hora" size="10" maxlength="5" value="<?php echo $Hora .":". $Minutos;?>" /></td></tr>
	  
	  <tr><th colspan="2" align="center">N&uacute;mero Evacuados</th></tr>
	  <tr><td>Civiles</td><td><input type="text" name="evacua_civiles" id="evacua_civiles" size="10" maxlength="5" /></td></tr>
	  <tr><td>Estudiantes</td><td><input type="text" name="evacua_escolares" id="evacua_escolares" size="10" maxlength="5" /></td></tr>
      <tr><td colspan="2" align="center"><input title="Validar" alt=" Validar " src="../imagenes/validar.png" type="image" /></td></tr>
   </table>
   </form>
</body>
</html>