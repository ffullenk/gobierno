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
			  $cobertura = $_POST['cobertura'];
			  $estado = $_POST['estado'];
			  
              $ModificaReg = "UPDATE tb_cobertura SET COBERTURA=\"$cobertura\",ESTADOCOBERTURA=\"$estado\" WHERE IDCOBERTURA=\"$id\"";
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Modificada la COBERTURA de Manera Satisfactoria.'); document.location.href='cobertura.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y la COBERTURA no Pudo Ser Modificada.'); document.location.href='cobertura.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>