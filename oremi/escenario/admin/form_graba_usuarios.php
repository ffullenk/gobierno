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
    $nombre = $_POST['nombre'];
    $emailusuarios = $_POST['emailusuarios'];
    $rut = $_POST['rut'];
    $institucion = $_POST['institucion'];
    $clave = $_POST['clave'];
    $reclave = $_POST['reclave'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];

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
