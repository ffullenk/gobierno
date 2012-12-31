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
			  $idE = $_POST['Encargado'];			  
			  $ejercicio_nombre = $_POST['ejercicio_nombre'];
			  $ejercicio_fecha = convertir_fecha($_POST['fecha']);
			  $ejercicio_horainicio = $_POST['ejercicio_horainicio'];
			  $ejercicio_horatermino = $_POST['ejercicio_horatermino'];
			  $ejercicio_cobertura = $_POST['ejercicio_cobertura'];
			  $ejercicio_organizador = $_POST['ejercicio_organizador'];
			  		  
			  $estado = $_POST['estado'];
			  		  
              $ModificaReg = "UPDATE tb_ejercicios SET ".
			  " NOMBREEJERCICIO=\"$ejercicio_nombre\", ".
			  " FECHAEJERCICIO=\"$ejercicio_fecha\", ".
			  " HORAINICIO=\"$ejercicio_horainicio\", ".
			  " HORATERMINO=\"$ejercicio_horatermino\", ".
			  " IDCOBERTURA=\"$ejercicio_cobertura\", ".
			  " IDORGANIZADOR=\"$ejercicio_organizador\", ".
			  " IDENCARGADO=\"$idE\", ".
			  " ESTADOEJERCICIO=\"$estado\" ".
			  " WHERE IDEJERCICIO=\"$id\"";
						  
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Modificada  el detalle del EJERCICIO de Manera Satisfactoria.'); document.location.href='ejercicio.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y  el detalle del EJERCICIO no Pudo Ser Modificada.'); document.location.href='ejercicio.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>