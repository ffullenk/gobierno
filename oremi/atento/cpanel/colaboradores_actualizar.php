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
			  $colaborador_nombre = $_POST['colaborador_nombre'];
			  $colaborador_cargo = $_POST['colaborador_cargo'];
			  $estado = $_POST['estado'];
			  
              $ModificaReg = "UPDATE tb_colaboradores SET COLABORADOR=\"$colaborador_nombre\",IDCARGO=\"$colaborador_cargo\", ESTADOCOLABORADOR=\"$estado\" WHERE IDCOLABORADOR=\"$id\"";
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Modificada la Informacion del COLABORADOR de Manera Satisfactoria.'); document.location.href='colaboradores.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y la Informacion del COLABORADOR no Pudo Ser Modificada.'); document.location.href='colaboradores.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>