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
			  $subzona_nombre = $_POST['subzona_nombre'];
			  $ejercicio = $_POST['ejercicio'];
			  $zonas = $_POST['zonas'];
			  
			  $estado = $_POST['estado'];
			  $subzona_fecha = date('Y-m-d H:i:s');
			  
              $InsertaReg = "INSERT INTO tb_subzonaejercicio(IDZONAEJERCICIO,NOMBRESUBZONA,FECHACREACION,ESTADOSUBZONA) VALUES('".$zonas."','".$subzona_nombre."','".$subzona_fecha."','".$estado."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creada la SUBZONA de Manera Satisfactoria.'); document.location.href='subzona.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y la SUBZONA no Pudo Ser Creada.'); document.location.href='subzona.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>