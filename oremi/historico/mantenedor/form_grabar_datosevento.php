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
			  $tipoevento = $HTTP_POST_VARS['tipoevento'];
			  $atributo = $HTTP_POST_VARS['atributo'];
			  $tipounidad = $HTTP_POST_VARS['tipounidad'];
			  $estado = $HTTP_POST_VARS['estado'];
			  
              $InsertaReg = "INSERT INTO orm_datostipoevento(dtatributo,dtevento_id,dtunidad_id,estado) VALUES('".$atributo."','".$tipoevento."','".$tipounidad."','".$estado."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creado el Tipo de Evento de Manera Satisfactoria.'); document.location.href='datosevento.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y el Tipo de Evento no Pudo Ser Creada.'); document.location.href='datosevento.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>