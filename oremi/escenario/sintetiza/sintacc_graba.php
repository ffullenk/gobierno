<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 $tipoUsrBackEnd = $_SESSION['tipoUsrBackEnd'];
 
 include("../incluir/seteaConf.php");
 include("../incluir/seteaBD.php");
 include("../incluir/encripta.php");
 $link = conectar();

 include("../incluir/seteaScr.php");
 include("../incluir/funciones.php");

 if(estaActivo($userBackEnd, $passBackEnd)) {

   // Obtenemos los valores desde el formulario
   $idE = $HTTP_POST_VARS["idE"];
   $ids = $HTTP_POST_VARS["ids"];
   $sintetiza = $HTTP_POST_VARS["sintetiza"];

   $qUpdPto = "UPDATE orm_acciones_servrel SET SINTETIZA=\"$sintetiza\" WHERE ID_ESCENARIO=\"$idE\" AND ID_ACCSERVREL=\"$ids\" ";

   $rUpdPto = mysql_query($qUpdPto);
   
   if($rUpdPto) {
      echo "<script>alert('Registro Actualizado satisfactoriamente.'); document.location.href='index.php?idE=$idE';</script>\n"; }
   else {
      echo "<script>alert('Debido a un Error, no se ha podido actualizar el Registro.'); document.location.href='index.php?idE=$idE';</script>\n"; }


 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>