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
    // Recibimos Variables del Formulario
    $institucion = $_POST["institucion"];
    $estadoinst = $_POST["estadoinst"];

    // Grabamos en la tabla orm_institucion
    $gReg = "INSERT INTO orm_institucion(INSTITUCION,ESTADOINST) VALUES('".$institucion."','".$estadoinst."')";

   $rsRegistro = mysql_query($gReg);
	
   if($rsRegistro) {
     // Se Grabo de manera correcta
     echo "<script>alert('Ha Sido Creado el Registro de Manera Satisfactoria.'); document.location.href='iinstituc.php';</script>\n";

   } else {
     // Ocurrio un problema interno y el registro no pudo anexarse a la tabla
     echo "<script>alert('Error... Ocurrio un Problema Interno y el Registro no Pudo Ser Creada.'); document.location.href='iinstituc.php';</script>\n";
   }

 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
