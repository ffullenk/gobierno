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
   // Recogemos las variables del formulario
   $frmTipoEven = $_POST["tipoevento"];
   $frmTipoFeno = $_POST["tipofeno"];
   $frmOcurrenc = convertir_fecha($_POST["fecha"]);
   $frmTipoLuga = $_POST["lugar"];
   $frmDescEven = $_POST["describeevento"];
   $frmEstadoEs = $_POST["estadoescenario"];
   $frmOcurHora = $_POST["hora"].":".$_POST["minutos"];
   


   // Grabamos en la tabla orm_escenario
   $gReg = "INSERT INTO orm_escenario(tpevento_id,ID_TIPOFENO,OCURRENCIA,HORA,ID_LUGAR,DESCRIBEESCENARIO,ESTADOESCENARIO) VALUES('".$frmTipoEven."','".$frmTipoFeno."','".$frmOcurrenc."','".$frmOcurHora."','".$frmTipoLuga."','".$frmDescEven."','".$frmEstadoEs."')";

   $rsRegistro = mysql_query($gReg);
	
   if($rsRegistro) {
     // Se Grabo de manera correcta
     echo "<script>alert('Ha Sido Creado el Registro de Manera Satisfactoria.'); document.location.href='iescenari.php';</script>\n";

   } else {
     // Ocurrio un problema interno y el registro no pudo anexarse a la tabla
     echo "<script>alert('Error... Ocurrio un Problema Interno y el Registro no Pudo Ser Creada.'); document.location.href='iescenari.php';</script>\n";
   }
   

 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
