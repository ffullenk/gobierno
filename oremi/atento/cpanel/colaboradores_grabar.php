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
			  $colaborador_nombre = $_POST['colaborador_nombre'];
			  $colaborador_cargo = $_POST['colaborador_cargo'];
			  $estado = $_POST['estado'];
			  
              $InsertaReg = "INSERT INTO tb_colaboradores(COLABORADOR,IDCARGO,ESTADOCOLABORADOR) VALUES('".$colaborador_nombre."','".$colaborador_cargo."','".$estado."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creada la cuenta de COLABORADOR de Manera Satisfactoria.'); document.location.href='colaboradores.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y la cuenta de COLABORADOR no Pudo Ser Creado.'); document.location.href='colaboradores.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>