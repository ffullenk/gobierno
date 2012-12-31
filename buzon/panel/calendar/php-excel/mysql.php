<?php
require_once("excel.php"); 
require_once("excel-ext.php"); 
// Consultamos los datos desde MySQL
$conEmp = mysql_connect("localhost","grbc_coqbo","g0r3citzen");
mysql_select_db("grbuzon", $conEmp);
$queEmp = "SELECT BITACORA_C.COD_BITC AS CODIGO_CONSULTA, TIPO.TIPO,TEMAS.TEMA,PERSONA.NOMBRES AS Nombre_Usuario, PERSONA.PATERNO AS App_Usuario, PERSONA.EMAIL AS Email_Usuario, BITACORA_C.FECHA as Fecha_Consulta, FUNCIONARIO.NOMBRES AS Nombre_Funcionario, FUNCIONARIO.APPAT AS App_Funcionario, BITACORA_R.FECHA AS Fecha_Respuesta
FROM BITACORA_C, BITACORA_R, FUNCIONARIO, PERSONA,TEMAS, TIPO
WHERE BITACORA_C.COD_BITC = BITACORA_R.COD_BITC
AND BITACORA_R.COD_FUNCIONARIO = FUNCIONARIO.COD_FUNCIONARIO
AND BITACORA_C.COD_PERS = PERSONA.COD_PERS
AND BITACORA_C.COD_TIPO = TIPO.COD_TIPO
AND BITACORA_C.COD_TEMA =TEMAS.COD_TEMA
AND SUBSTRING(BITACORA_C.FECHA,1,10) BETWEEN '2006-01-12' AND '2006-01-13'
ORDER BY CODIGO_CONSULTA


";
$resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);
// Creamos el array con los datos
while($datatmp = mysql_fetch_assoc($resEmp)) { 
    $data[] = $datatmp; 
}
// Generamos el Excel  
createExcel("excel-mysql.xls", $data);
exit; ?>