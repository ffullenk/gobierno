<?php
//Nos aseguramos que hayamos recibido el userid
if(isset($HTTP_POST_VARS['global_qk'])) {
   $userid=$HTTP_POST_VARS['global_qk'];
   //Nos aseguramos que el valor sea numerico
   if(is_numeric($userid)) {
     //Ahora, actualizo la Tabla
     include('../bd/conecta.php');
     $link = Conexion();
     $res=mysql_query("UPDATE FUNCIONARIO SET SESIONID=NULL WHERE COD_FUNCIONARIO='$userid' ");
     mysql_close();
     setcookie('Bzr'); //, '', 0, '', '', 0);
     echo "<HTML><HEAD><META HTTP-EQUIV=Refresh CONTENT='0; URL=index.php'></HEAD><Body BgColor=White></Body></HTML>";
     die();
   }
}
//Redirijimos a una pagina de salida o bien a la index
//header("Location: index.php");
exit;
?>
