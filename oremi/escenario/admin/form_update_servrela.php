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

   // Recibimos las variables
   $idS = $_POST["idS"];
   $ptocritico = $_POST["ptocritico"];
   $servicio = $_POST["servicio"];
   $estadoservrel = $_POST["estadoservrel"];


   $sB = "UPDATE orm_serviciosrelacionados SET ID_PTOCRITICO=\"$ptocritico\", SERVICIO=\"$servicio\", ESTADOSERVREL=\"$estadoservrel\" WHERE ID_SERVREL=\"$idS\" ";
   $rB = mysql_query($sB);
 
   if($rB) {
      echo "<script>alert('El Registro ha sido actualizado de manera satisfactoria.'); document.location.href='iservrela.php';</script>\n";
   }
   else
   {
      echo "<script>alert('Error... Ocurrio un problema interno y el registro no pudo ser Actualizado.'); document.location.href='iservrela.php';</script>\n";
   }


 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
