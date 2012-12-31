<?php

/* Conectamos a la base de datos
$conexion = mysql_connect("localhost","grbc_coqbo","grbc_coqbo");
mysql_select_db("grbuzon", $conexion);
*/
function creaCSV() 
{ 


$bd_base = "bdd"; 
$con = mysql_connect("localhost","grbc_coqbo","grbc_coqbo");
mysql_select_db("grbuzon", $con);


$consulta = "SELECT * FROM FUNCIONARIO"; 
$datosLinia=mysql_query($consulta,$con); 

$nomFitxero = "c:\fichero.csv"; 

while($row = mysql_fetch_array($datosLinia)) 
{ 

$linia = $row[1]; 
$linia .= ";".$row[2]; 
$linia .= ";".$row[3]; 
$linia .= ";".$row[4]; 
$linia .= ";".$row[5]; 
$linia .= ";".$row[6]."rn"; 

$p = fopen($nomFitxero,a); 
if($p)fputs($p,$linia); 
} 
fclose($p); 
// Ojo ! fitxero separado por ';' 
// Si no te funciona prueba con ',' debido a las versiones de Excel. 
}

?>
