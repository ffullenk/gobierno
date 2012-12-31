<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pag </title>
</head>
<form id="form1" name="form1" method="post" action="">
  <label>desde
  <input type="text" name="desde" id="desde" />
  </label>
  <label>hasta
  <input type="text" name="hasta" id="hasta" />
  </label>
  <label>
  <input type="submit" name="ver" id="ver" value="Enviar" />
  </label>
</form>
<body>
</body>
</html>
<?php
if(isset($_POST['ver'])){
$var1 = $_POST['desde'];
$var2 = $_POST['hasta'];
$var1='2006-01-12';
$var2='2006-01-13';

require_once("excel.php"); 
require_once("excel-ext.php"); 
// Consultamos los datos desde MySQL
$conEmp = mysql_connect("localhost","grbc_coqbo","g0r3citzen");
mysql_select_db("grbuzon", $conEmp);
$queEmp = "SELECT BITACORA_C.COD_BITC AS CODIGO_CONSULTA, TIPO.TIPO,TEMAS.TEMA,PERSONA.NOMBRES AS Nombre_Usuario, PERSONA.PATERNO AS App_Usuario, PERSONA.EMAIL AS Email_Usuario, SUBSTRING(BITACORA_C.FECHA,1,10) as Fecha_Consulta, FUNCIONARIO.NOMBRES AS Nombre_Funcionario, FUNCIONARIO.APPAT AS App_Funcionario, BITACORA_R.FECHA AS Fecha_Respuesta
FROM BITACORA_C, BITACORA_R, FUNCIONARIO, PERSONA,TEMAS, TIPO
WHERE BITACORA_C.COD_BITC = BITACORA_R.COD_BITC
AND BITACORA_R.COD_FUNCIONARIO = FUNCIONARIO.COD_FUNCIONARIO
AND BITACORA_C.COD_PERS = PERSONA.COD_PERS
AND BITACORA_C.COD_TIPO = TIPO.COD_TIPO
AND BITACORA_C.COD_TEMA =TEMAS.COD_TEMA
AND SUBSTRING(BITACORA_C.FECHA,1,10) BETWEEN '$var1' AND '$var2'";
echo($queEmp);
/*$resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);
// Creamos el array con los datos
while($datatmp = mysql_fetch_assoc($resEmp)) { 
    $data[] = $datatmp; 
}
// Generamos el Excel  
createExcel("excel-mysql.xls", $data);
exit; */
}?>