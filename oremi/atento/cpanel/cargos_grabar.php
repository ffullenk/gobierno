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
			  $cargo = $_POST['cargo'];
			  $estado = $_POST['estado'];
			  
              $InsertaReg = "INSERT INTO tb_cargo(CARGO,ESTADOCARGO) VALUES('".$cargo."','".$estado."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creada el CARGO de Manera Satisfactoria.'); document.location.href='cargos.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y el CARGO no Pudo Ser Creado.'); document.location.href='cargos.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>