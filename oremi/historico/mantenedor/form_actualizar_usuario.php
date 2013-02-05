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
			  $func_nombre = $_POST['nombre'];
			  $func_rut = $_POST['rut'];
			  $func_email = $_POST['email'];
			  $func_clave = encrypt($_POST['clave'],0);
			  $func_tipo = $_POST['tipo'];
			  $func_estado = $_POST['estado'];
			  
			  // Encripta la clave
			  $fechaHoy = date("Y-m-d");
			  
              $ModificaReg = "UPDATE orm_usuarios SET nombre=\"$func_nombre\", clave=\"$func_clave\", email=\"$func_email\",  rut=\"$func_rut\", tipo=\"$func_tipo\", fecha=\"$fechaHoy\", estado=\"$func_estado\" WHERE ormusr_id=\"$id\"";
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('El Registro ha sido actualizado de manera satisfactoria.'); document.location.href='usuarios.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un problema interno y el registro no pudo ser Actualizado.'); document.location.href='usuarios.php';</script>\n";
			  }
 } else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
