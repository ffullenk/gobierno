<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "slkad98n32f";
  global $global_qk;
  $global_qk=0;
  require('detecta.php');


if($loginCorrecto ) {  
   //Nos aseguramos que el valor sea numerico
   if(is_numeric($global_qk)) {
//Ahora, actualizo la Tabla
$res=mysql_query("UPDATE ENCUESTADOS SET SESIONID='' WHERE COD_PERS='$global_qk' ");

mysql_close();
setcookie('gore');

header("Location: ../../index.php");
   }
}
//Redirijimos a una pagina de salida o bien a la index
//header("Location: index.php");
exit;
?>