<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];

include("incluir/seteaConf.php");
include("incluir/seteaBD.php");
include("incluir/encripta.php");
$link = conectar();
include("incluir/funciones.php");

if(estaActivo($userBackEnd, $passBackEnd)) {

		      // Recibimos las variables del formulario
			  $id = $_POST['id'];
			  $organizador = $_POST['organizador'];
			  $estado = $_POST['estado'];
			  
              $ModificaReg = "UPDATE tb_organizador SET ORGANIZADOR=\"$organizador\",ESTADOORGANIZADOR=\"$estado\" WHERE IDORGANIZADOR=\"$id\"";
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Modificada el detalle de ORGANIZADOR de Manera Satisfactoria.'); document.location.href='organizador.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y el detalle de ORGANIZADOR no Pudo Ser Modificada.'); document.location.href='organizador.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>