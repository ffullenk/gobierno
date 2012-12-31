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
			  $ejercicio = $_POST['ejercicio'];
			  $zonas = $_POST['zonas'];
			  
			  $subzona_nombre = $_POST['subzona_nombre'];
			 
			  $estado = $_POST['estado'];
			  $subzona_fecha = date('Y-m-d H:i:s');
			  		  
              $ModificaReg = "UPDATE tb_subzonaejercicio SET ".
			  " IDZONAEJERCICIO=\"$zonas\", ".
			  " NOMBRESUBZONA=\"$subzona_nombre\", ".
			  " FECHACREACION=\"$zona_fecha\", ".
			  " ESTADOSUBZONA=\"$estado\" ".
			  " WHERE IDSUBZONAEJERCICIO=\"$id\"";
						  
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Modificada  el detalle de la SUBZONA del Ejercicio de Manera Satisfactoria.'); document.location.href='subzona.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y  el detalle de la SUBZONA del Ejercicio no Pudo Ser Modificada.'); document.location.href='subzona.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>