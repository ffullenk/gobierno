<?php
function conectar() {
 $link=mysql_connect("192.168.33.20","usr_ejercicios","72rDy5xUaKDRNJeE");
 mysql_select_db("EJERCICIOS",$link);
 return $link;
}

function desconectar($link) {
  mysql_close($link);
}
?>
