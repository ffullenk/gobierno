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
   $idE = $_POST["idE"];
   $fecha = convertir_fecha($_POST["fecha"]);
   $horax = $_POST["hora"].":".$_POST["minutos"];
   $tieneservrel = $_POST["tieneservrel"];

   $Idpto = $_POST['Idpto'];
   $Depto = $_POST['Depto'];
   $nroptos = count($Idpto);
   $ixNC_ptos = $_POST['ixNC_ptos'];

   $Idser = $_POST['Idser'];
   $Idptoser = $_POST['Idptoser'];
   $Deser = $_POST['Deser'];
   $nroserv = count($Idser);
   $ixNC_serv = $_POST['ixNC_serv'];


   // Grabamos en Acciones Puntos Criticos
   $Npto = 0;

   while($Npto<$ixNC_ptos) {

      $qInsPto = "INSERT INTO orm_acciones_ptoscriticos(ID_ESCENARIO, ID_PTOCRITICO, OCURRENCIAPTOCRITICO, HORA, DESCRIBEENTIEMPO) VALUES('".$idE."','".$Idpto[$Npto]."','".$fecha."','".$horax."','".$Depto[$Npto]."')";

      $rInsPto = mysql_query($qInsPto);
      
      //if($rInsPto) { $swPto = true; }
      $Npto++;
   }

   // Si Existen servicios relacionados
   if($tieneservrel=="S") {
      $Nser = 0;
      while($Nser<$ixNC_serv) {

         $qInsSer = "INSERT INTO orm_acciones_servrel(ID_ESCENARIO,ID_SERVREL,OCURRENCIASERVREL,HORA,DESCRIBEENTIEMPO) VALUES('".$idE."','".$Idser[$Nser]."','".$fecha."','".$horax."','".$Deser[$Nser]."')";

         $rInsSer = mysql_query($qInsSer);

         $Nser++;
      }
   }

   echo "<script>alert('Accion Completada.'); document.location.href='../inicio2.php';</script>\n";


 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
