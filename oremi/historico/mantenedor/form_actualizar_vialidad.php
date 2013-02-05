<?php
 session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();
 
 include("../incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
  // Recibimos las variables del formulario
			  
			  $id = $_POST['id'];
			  $nombre = $_POST['nombre'];
			  $func_estado = $_POST['estado'];
			  			  	  
              $ModificaReg = "UPDATE orm_vialidad SET vialidad=\"$nombre\", estado=\"$func_estado\" WHERE vialidad_id=\"$id\"";
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('El Registro ha sido actualizado de manera satisfactoria.'); document.location.href='vialidad.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un problema interno y el registro no pudo ser Actualizado.'); document.location.href='vialidad.php';</script>\n";
			  }
 } else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
