<?php 
function conexion() {
if(!($link=mysql_connect("localhost","","") )) {
   echo "Error ... No se puede establecer conexion con la base de datos en estos momentos";
   exit();
}
if(!mysql_select_db("", $link)) {
   echo "Error ... No se puede establecer conexion";
   exit();
}
return $link;
}?>
