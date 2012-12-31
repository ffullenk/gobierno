<?php
function conexion(){
 if (!($link=mysql_connect("localhost","t3515","coqbostud"))) {
       echo "Imposible Conectar Con la Base de Datos en estos momentos... Intente nuevamente.";
       exit();
 }
 if (!mysql_select_db("bdtesis",$link))
 {  echo "Error ... Seleccionando la Base de Datos.";
    exit();
 }
 return $link;
} ?>