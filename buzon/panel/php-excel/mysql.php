<?php
require_once("excel.php"); 
require_once("excel-ext.php"); 

$conEmp = mysql_connect("localhost","grbc_coqbo","g0r3citzen");
mysql_select_db("grbuzon", $conEmp);
$queEmp = "SELECT concat(A.nombres,' ',A.appat) as nombre, C.tema FROM FUNCIONARIO as A, QRESPONDE as B, TEMAS as C WHERE A.cod_funcionario= B.cod_funcionario and C.cod_tema = B.cod_tema order by  C.tema";
$resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$data[] = $datatmp; 
}  
createExcel("excel-mysql.xls", $data);
exit;
?>