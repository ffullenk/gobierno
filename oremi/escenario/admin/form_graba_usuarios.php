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
    $nombre = $HTTP_POST_VARS['nombre'];
    $emailusuarios = $HTTP_POST_VARS['emailusuarios'];
    $rut = $HTTP_POST_VARS['rut'];
    $institucion = $HTTP_POST_VARS['institucion'];
    $clave = $HTTP_POST_VARS['clave'];
    $reclave = $HTTP_POST_VARS['reclave'];
    $tipo = $HTTP_POST_VARS['tipo'];
    $estado = $HTTP_POST_VARS['estado'];

    if($clave<>$reclave) { echo "<script>alert('Las Contraseñas No Coinciden'); document.location.href='form_agrega_usuarios.php';</script>\n"; }
			  
    // Encripta la clave
    $encpass = encrypt($clave,0);
    $fechaHoy = date("Y-m-d");
			  
    $InsertaReg = "INSERT INTO orm_usuarios(nombre,email,rut,clave,tipo,estado,fecha,ID_INSTITUCION) VALUES('".$nombre."','".$email."','".$rut."','".$encpass."','".$tipo."','".$estado."','".$fechaHoy."',".$institucion."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creada la Cuenta de Manera Satisfactoria.'); document.location.href='iusuarios.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y la Cuenta de Administrador no Pudo Ser Creada.'); document.location.href='iusuarios.php';</script>\n";
			  }    


 } else { 
   echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";
 }
?>
