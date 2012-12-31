<?php 

$link=mysql_connect("192.168.33.20","usr_ejercicios","72rDy5xUaKDRNJeE");
mysql_select_db("EJERCICIOS",$link);

if($link) { echo "conecta";} else { echo "no conecta";}

$qsql = "SELECT * FROM `comuna`";
$rsql = mysql_query($qsql);
echo date("d-m-y H:i:s");

while($prtC=mysql_fetch_array($rsql)) {
echo "Comuna: ". $prtC['comuna'] . "<br />";

}


?>
