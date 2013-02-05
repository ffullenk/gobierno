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
			  $tipoevento = $_POST['tipoevento'];
			  $atributo = $_POST['atributo'];
			  $tipounidad = $_POST['tipounidad'];
			  $func_estado = $_POST['estado'];
			  			  	  
              $ModificaReg = "UPDATE orm_datostipoevento SET dtatributo=\"$atributo\", dtunidad_id=\"$tipounidad\", dtevento_id=\"$tipoevento\", estado=\"$func_estado\" WHERE dt_id=\"$id\"";
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('El Registro ha sido actualizado de manera satisfactoria.'); document.location.href='datosevento.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un problema interno y el registro no pudo ser Actualizado.'); document.location.href='datosevento.php';</script>\n";
			  }
 } else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";}
?>
