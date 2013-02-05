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
   $idEscenario = $_POST["idEscenario"];
   $tipoevento = $_POST["tipoevento"];
   $tipofeno = $_POST["tipofeno"];
   $fecha = convertir_fecha($_POST["fecha"]);
   $ocurrencia = $_POST["hora"] . ":" . $_POST["minutos"];
   $lugar = $_POST["lugar"];
   $describeevento = $_POST["describeevento"];
   $estadoescenario = $_POST["estadoescenario"];


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
