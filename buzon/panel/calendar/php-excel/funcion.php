<?php

$bd_base = "grbuzon"; 
$con = mysql_connect("localhost","grbc_coqbo","g0r3citzen"); 
mysql_select_db($bd_base, $con); 

$consulta = "SELECT PERSONA.NOMBRES, PERSONA.PATERNO, PERSONA.EMAIL, FUNCIONARIO.NOMBRES, FUNCIONARIO.APPAT FROM PERSONA, FUNCIONARIO, BITACORA_R, BITACORA_C WHERE  BITACORA_C.COD_BITC = BITACORA_R.COD_BITC
AND BITACORA_R.COD_FUNCIONARIO = FUNCIONARIO.COD_FUNCIONARIO
AND BITACORA_C.COD_PERS = PERSONA.COD_PERS"; 

$datosLinia=mysql_query($consulta,$con); 

$nomFitxero = "c:\fichero.csv"; 

while($row = mysql_fetch_array($datosLinia)) 


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
