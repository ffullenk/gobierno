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
			  $tipoeventonombre = $_POST['tipoeventonombre'];
			  $estado = $_POST['estado'];
			  
              $InsertaReg = "INSERT INTO orm_tipoevento(tpevento,estado) VALUES('".$tipoeventonombre."','".$estado."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creado el Tipo de Evento de Manera Satisfactoria.'); document.location.href='tipoevento.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y el Tipo de Evento no Pudo Ser Creada.'); document.location.href='tipoevento.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>
