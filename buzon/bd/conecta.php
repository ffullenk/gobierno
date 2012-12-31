<?php
function conexion() {
if(!($link=mysql_connect("localhost","grbc_coqbo","g0r3citzen") )) {
   echo "Error ... No se puede establecer conexion con la base de datos en estot momentos";
   exit();
}
if(!mysql_select_db("grbuzon", $link)) {
   echo "Error ... No se puede establecer conexion";
   exit();
}
return $link;
}?>
