<?php
function conectar() {
 $link=mysql_connect("192.168.33.20","protcivil","g0r30r3m1m011ac0");
 mysql_select_db("oremi",$link);
 return $link;
}

function desconectar($link) {
  mysql_close($link);
}
?>
