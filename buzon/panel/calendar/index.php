<?php
require_once("excel.php");  
require_once("excel-ext.php"); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>GORE COQUIMBO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td><form name="form1" method="post" action="">
            <div align="center">
              <p class="Estilo1">           	Ingrese Fecha de Busqueda              </p>
              <p class="Estilo1">(AAAA-MM-DD)  </p>
            </div>
            <form id="form1" name="form1" method="post" action="">
  <label>desde
  <input type="text" name="desde" id="desde" value="2006-01-12" />
  </label>
  <label>hasta
  <input type="text" name="hasta" id="hasta" value="2006-01-13"/>
  </label>
  <label>
  <input type="submit" name="ver" id="ver" value="Enviar" />
  </label>
  <label></label>
           	<label></label>
            <a href="../home.php"><img src="back.gif" width="35" height="25"></a>
            </form>
           </form>          </td>
        </tr>
      </table>
  </tr>
</table>
</body>
</html>
<?php
if(isset($_POST['ver'])){
$var1 = $_POST['desde'];
$var2 = $_POST['hasta'];

/*header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");*/
$conEmp = mysql_connect("localhost","grbc_coqbo","g0r3citzen");
mysql_select_db("grbuzon", $conEmp);
$queEmp = "SELECT @ROW_NUMBER:=@ROW_NUMBER+1 AS ROW_NUMBER, TIPO.TIPO,TEMAS.TEMA, concat(PERSONA.NOMBRES,' ',PERSONA.PATERNO) as nombre_persona , PERSONA.EMAIL AS Email_Usuario, BITACORA_C.mensaje as MENSAJE, BITACORA_R.respuesta as RESPUESTA, concat(FUNCIONARIO.NOMBRES,' ',FUNCIONARIO.APPAT) as nombre_funcionario, SUBSTRING(BITACORA_C.FECHA,1,10) as Fecha_Consulta, SUBSTRING(BITACORA_R.FECHA,1,10) AS Fecha_Respuesta, datediff(date(BITACORA_R.FECHA), date(BITACORA_C.FECHA)) as diferencia

FROM BITACORA_C, BITACORA_R, FUNCIONARIO, PERSONA,TEMAS, TIPO, (SELECT @ROW_NUMBER:=0) r
WHERE BITACORA_C.COD_BITC = BITACORA_R.COD_BITC
AND BITACORA_R.COD_FUNCIONARIO = FUNCIONARIO.COD_FUNCIONARIO
AND BITACORA_C.COD_PERS = PERSONA.COD_PERS
AND BITACORA_C.COD_TIPO = TIPO.COD_TIPO
AND BITACORA_C.COD_TEMA =TEMAS.COD_TEMA
AND DATE(BITACORA_C.FECHA) BETWEEN '$var1' AND '$var2'
";
$resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
//$totEmp = mysql_num_rows($resEmp);

echo "<table border=1 >";
echo "<tr> ";
echo "<th>Nº</th> ";
echo "<th>Tipo</th> ";
echo "<th>Tema</th> ";
echo "<th>Ciudadan@ Consultante</th> ";
echo "<th>Email Usuario</th> ";
echo "<th>Consulta</th> ";
echo "<th>Respuesta funcionario</th> ";
echo "<th>Funcionario que Responde</th> ";
echo "<th>Fecha Consulta</th> ";
echo "<th>Fecha Respuesta</th> ";
echo "<th>Nº de Dias en responder</th> ";
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
	echo "<td><font color=green>$datatmp[10]</font></td> ";
	echo "</tr> ";
	echo "<tr> ";
}
echo "</tr> ";
echo "</table> ";
}
if(isset($_POST['EXCEL'])){
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");
}
if(isset($_POST['regresar'])){

}
?>


