<?php
//Nos aseguramos que hayamos recibido el userid
if(isset($HTTP_POST_VARS['global_qk'])) {
   $global_qk=$HTTP_POST_VARS['global_qk'];
   //Nos aseguramos que el valor sea numerico
   if(is_numeric($global_qk)) {
     //Ahora, actualizo la Tabla
     include("../bd/conecta.php");
	 $link = conexion();
	 mysql_query("UPDATE admuser SET sesionid='' WHERE id='$global_qk'");
	 mysql_close();
	 setcookie('tsis', '', 0, '/tesis', '', 0);
	}
}
//Redirijimos a una pagina de salida o bien a la index
header("Location: index.php");
exit;
?>