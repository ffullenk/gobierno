<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];

include("../incluir/seteaConf.php");
include("../incluir/seteaBD.php");
include("../incluir/encripta.php");
$link = conectar();
include("../incluir/funciones.php");

if(estaActivo($userBackEnd, $passBackEnd)) {

		      // Recibimos las variables del formulario
			  $nombre = $HTTP_POST_VARS['nombre'];
			  $email = $HTTP_POST_VARS['email'];
			  $rut = $HTTP_POST_VARS['rut'];
			  $clave = $HTTP_POST_VARS['clave'];
			  $tipo = $HTTP_POST_VARS['tipo'];
			  $estado = $HTTP_POST_VARS['estado'];
			  
			  // Encripta la clave
			  $encpass = encrypt($clave,0);
			  $fechaHoy = date("Y-m-d");
			  
              $InsertaReg = "INSERT INTO orm_usuarios(nombre,email,rut,clave,tipo,estado,fecha) VALUES('".$nombre."','".$email."','".$rut."','".$encpass."','".$tipo."','".$estado."','".$fechaHoy."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creada la Cuenta de Administrador de Manera Satisfactoria.'); document.location.href='usuarios.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y la Cuenta de Administrador no Pudo Ser Creada.'); document.location.href='usuarios.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>