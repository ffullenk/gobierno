<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");
/*echo "<table border=1> ";
echo "<tr> ";
echo "<th>Nombre</th> ";
echo "<th>Email</th> ";
echo "</tr> ";
echo "<tr> ";
echo "<td><font color=green>Manuel Gomez</font></td> ";
echo "<td>manuel@gomez.com</td> ";
echo "</tr> ";
echo "<tr> ";
echo "<td><font color=blue>Pago gomez</font></td> ";
echo "<td>paco@gomez.com</td> ";
echo "</tr> ";
echo "</table> ";*/
$conEmp = mysql_connect("localhost","grbc_coqbo","g0r3citzen");
mysql_select_db("grbuzon", $conEmp);
$queEmp = "SELECT BITACORA_C.COD_BITC AS CODIGO_CONSULTA, TIPO.TIPO,TEMAS.TEMA,PERSONA.NOMBRES AS Nombre_Usuario, PERSONA.PATERNO AS App_Usuario, PERSONA.EMAIL AS Email_Usuario, SUBSTRING(BITACORA_C.FECHA,1,10) as Fecha_Consulta, FUNCIONARIO.NOMBRES AS Nombre_Funcionario, FUNCIONARIO.APPAT AS App_Funcionario, BITACORA_R.FECHA AS Fecha_Respuesta
FROM BITACORA_C, BITACORA_R, FUNCIONARIO, PERSONA,TEMAS, TIPO
WHERE BITACORA_C.COD_BITC = BITACORA_R.COD_BITC
AND BITACORA_R.COD_FUNCIONARIO = FUNCIONARIO.COD_FUNCIONARIO
AND BITACORA_C.COD_PERS = PERSONA.COD_PERS
AND BITACORA_C.COD_TIPO = TIPO.COD_TIPO
AND BITACORA_C.COD_TEMA =TEMAS.COD_TEMA
";
$resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
//$totEmp = mysql_num_rows($resEmp);

echo "<table border=1> ";
echo "<tr> ";
echo "<th>Codigo Consulta</th> ";
echo "<th>Tipo</th> ";
echo "<th>Tema</th> ";
echo "<th>Nombre Usuario</th> ";
echo "<th>Apellido Usuario</th> ";
echo "<th>Email Usuario</th> ";
echo "<th>Fecha Consulta</th> ";
echo "<th>Nombre Funcionario</th> ";
echo "<th>Apellido Funcionario</th> ";
echo "<th>Fecha Respuesta</th> ";
echo "</tr> ";
echo "<tr> ";

// Creamos el array con los datos
while($datatmp = mysql_fetch_array($resEmp)) { 
//    $data[] = $datatmp; 
	echo "<td><font color=green>$datatmp[0]</font></td> ";
	echo "<td><font color=green>$datatmp[1]</font></td> ";
	echo "<td><font color=green>$datatmp[2]</font></td> ";
	echo "<td><font color=green>$datatmp[3]</font></td> ";
	echo "<td><font color=green>$datatmp[4]</font></td> ";
	echo "<td><font color=green>$datatmp[5]</font></td> ";
	echo "<td><font color=green>$datatmp[6]</font></td> ";
	echo "<td><font color=green>$datatmp[7]</font></td> ";
	echo "<td><font color=green>$datatmp[8]</font></td> ";
	echo "<td><font color=green>$datatmp[9]</font></td> ";
	echo "</tr> ";
	echo "<tr> ";
}
echo "</tr> ";
echo "</table> ";
?>
