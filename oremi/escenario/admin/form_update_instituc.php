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
   $idI = $_POST["idI"];
   $institucion = $_POST["institucion"];
   $estadoinst = $_POST["estadoinst"];


   $sB = "UPDATE orm_institucion SET INSTITUCION=\"$institucion\", ESTADOINST=\"$estadoinst\" WHERE ID_INSTITUCION=\"$idI\" ";
   $rB = mysql_query($sB);
 
   if($rB) {
      echo "<script>alert('El Registro ha sido actualizado de manera satisfactoria.'); document.location.href='iinstituc.php';</script>\n";
   }
   else
   {
      echo "<script>alert('Error... Ocurrio un problema interno y el registro no pudo ser Actualizado.'); document.location.href='iinstituc.php';</script>\n";
   }


 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
