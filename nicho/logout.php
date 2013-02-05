<?php
//Nos aseguramos que hayamos recibido el userid
if(isset($HTTP_POST_VARS["global_qk"])) {
   $global_qk=$HTTP_POST_VARS["global_qk"];
   if(is_numeric($global_qk)) {
     //Ahora, actualizo la Tabla
     include("../bd/conecta.php");
	 $link = Conexion();
	 $res=mysql_query("UPDATE usuarios SET sesionid='' WHERE id=$global_qk");
	 mysql_close();
	 setcookie('qknicho', '', 0, '/nicho', '', 0);
	}
}
//Redirijimos a una pagina de salida o bien a la index
header("Location: index.html");?>