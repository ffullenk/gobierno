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
			  $ejercicio_nombre = $_POST['ejercicio_nombre'];
			  $ejercicio_fecha = convertir_fecha($_POST['fecha']);
			  $ejercicio_horainicio = $_POST['ejercicio_horainicio'];
			  $ejercicio_horatermino = $_POST['ejercicio_horatermino'];
			  $ejercicio_cobertura = $_POST['ejercicio_cobertura'];
			  $ejercicio_organizador = $_POST['ejercicio_organizador'];
			  
			  $ejercicio_encargado = idUsuario(userBackEnd,passBackEnd);
			  
			  $estado = $_POST['estado'];
			  
              $InsertaReg = "INSERT INTO tb_ejercicios(NOMBREEJERCICIO,FECHAEJERCICIO,HORAINICIO,HORATERMINO,IDCOBERTURA,IDORGANIZADOR,IDENCARGADO,ESTADOEJERCICIO) VALUES('".$ejercicio_nombre."','".$ejercicio_fecha."','".$ejercicio_horainicio."','".$ejercicio_horatermino."','".$ejercicio_cobertura."','".$ejercicio_organizador."','".$ejercicio_encargado."','".$estado."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creada el detalle del EJERCICIO de Manera Satisfactoria.'); document.location.href='ejercicio.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y el detalle del EJERCICIO no Pudo Ser Creada.'); document.location.href='ejercicio.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>