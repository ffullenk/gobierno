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
   $idP = $HTTP_POST_VARS["idP"];
   $ptocritico = $HTTP_POST_VARS["ptocritico"];
   $servicio = $HTTP_POST_VARS["servicio"];
   $estadoptocritico = $HTTP_POST_VARS["estadoptocritico"];


   $sB = "UPDATE orm_ptoscriticos SET PTOCRITICO=\"$ptocritico\", SERVREL=\"$servicio\", ESTADOPTOCRITICO=\"$estadoptocritico\" WHERE ID_PTOCRITICO=\"$idP\" ";
   $rB = mysql_query($sB);
 
   if($rB) {
      echo "<script>alert('El Registro ha sido actualizado de manera satisfactoria.'); document.location.href='iptoscrit.php';</script>\n";
   }
   else
   {
      echo "<script>alert('Error... Ocurrio un problema interno y el registro no pudo ser Actualizado.'); document.location.href='iptoscrit.php';</script>\n";
   }


 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
