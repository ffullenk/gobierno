<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();

 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {
   
   // Recibimos las variables del Formulario de Actualizacion
   $idEscenario = $HTTP_POST_VARS["idEscenario"];
   $tipoevento = $HTTP_POST_VARS["tipoevento"];
   $tipofeno = $HTTP_POST_VARS["tipofeno"];
   $fecha = convertir_fecha($HTTP_POST_VARS["fecha"]);
   $ocurrencia = $HTTP_POST_VARS["hora"] . ":" . $HTTP_POST_VARS["minutos"];
   $lugar = $HTTP_POST_VARS["lugar"];
   $describeevento = $HTTP_POST_VARS["describeevento"];
   $estadoescenario = $HTTP_POST_VARS["estadoescenario"];


   $sB = "UPDATE orm_escenario SET tpevento_id=\"$tipoevento\", DESCRIBEESCENARIO=\"$describeevento\", OCURRENCIA=\"$fecha\", HORA=\"$ocurrencia\", ESTADOESCENARIO=\"$estadoescenario\", ID_TIPOFENO=\"$tipofeno\" WHERE ID_ESCENARIO=\"$idEscenario\" ";
   $rB = mysql_query($sB);
 
   if($rB) {
      echo "<script>alert('El Registro ha sido actualizado de manera satisfactoria.'); document.location.href='iescenari.php';</script>\n";
   }
   else
   {
      echo "<script>alert('Error... Ocurrio un problema interno y el registro no pudo ser Actualizado.'); document.location.href='iescenari.php';</script>\n";
   }

 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>