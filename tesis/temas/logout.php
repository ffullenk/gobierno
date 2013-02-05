<?php
//Nos aseguramos que hayamos recibido el userid
if(isset($_POST['global_qk'])) {
   $global_qk=$_POST['global_qk'];
   //Nos aseguramos que el valor sea numerico
   if(is_numeric($global_qk)) {
     //Ahora, actualizo la Tabla
     include("../bd/conecta.php");
	 $link = conexion();
	 mysql_query("UPDATE admemp SET sesionid='' WHERE id='$global_qk'");
	 mysql_close();
	 setcookie('tsis_emp', '', 0, '/tesis', '', 0);
	}
}
//Redirijimos a una pagina de salida o bien a la index
header("Location: index.php");
exit;
?>
