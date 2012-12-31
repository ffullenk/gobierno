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
   $fecha = convertir_fecha($HTTP_POST_VARS["fecha"]);
   $horax = $HTTP_POST_VARS["hora"].":".$HTTP_POST_VARS["minutos"];
   $tieneservrel = $HTTP_POST_VARS["tieneservrel"];

   $Idpto = $HTTP_POST_VARS['Idpto'];
   $Depto = $HTTP_POST_VARS['Depto'];
   $nroptos = count($Idpto);
   $ixNC_ptos = $HTTP_POST_VARS['ixNC_ptos'];

   $Idser = $HTTP_POST_VARS['Idser'];
   $Idptoser = $HTTP_POST_VARS['Idptoser'];
   $Deser = $HTTP_POST_VARS['Deser'];
   $nroserv = count($Idser);
   $ixNC_serv = $HTTP_POST_VARS['ixNC_serv'];


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