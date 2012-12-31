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
			  
			  $id = $HTTP_POST_VARS['id'];
			  $func_nombre = $HTTP_POST_VARS['nombre'];
			  $func_rut = $HTTP_POST_VARS['rut'];
			  $func_email = $HTTP_POST_VARS['email'];
			  $func_clave = encrypt($HTTP_POST_VARS['clave'],0);
			  $func_tipo = $HTTP_POST_VARS['tipo'];
			  $func_estado = $HTTP_POST_VARS['estado'];
			  
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