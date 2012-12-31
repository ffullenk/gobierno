<?php
session_start();
 
 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];

include("incluir/seteaConf.php");
include("incluir/seteaBD.php");
include("incluir/encripta.php");
$link = conectar();
include("incluir/funciones.php");

if(estaActivo($userBackEnd, $passBackEnd)) {

		      // Recibimos las variables del formulario
			  $encargado_nombre = $_POST['encargado_nombre'];
			  $encargado_cargo = $_POST['encargado_cargo'];
			  $regiones = $_POST['regiones'];
			  $provincias = $_POST['provincias'];
			  $comunas = $_POST['comunas'];
			  $encargado_cobertura = $_POST['encargado_cobertura'];
			  $encargado_tipo = $_POST['encargado_tipo'];
			  $encargado_cuenta = $_POST['encargado_cuenta'];
			  $encargado_clave = $_POST['encargado_clave'];
			  $encargado_claveR = $_POST['encargado_claveR'];			  
			  $estado = $_POST['estado'];
			  
			  $encpass = encrypt($encargado_clave,0);
			  
              $InsertaReg = "INSERT INTO tb_encargados(IDCARGO,IDREGION,IDPROVINCIA,IDCOMUNA,IDCOBERTURA,TIPOCUENTA,NOMBRE,CUENTA,CLAVE,ESTADOENCARGADO) VALUES('".$encargado_cargo."','".$regiones."','".$provincias."','".$comunas."','".$encargado_cobertura."','".$encargado_tipo."','".$encargado_nombre."','".$encargado_cuenta."','".$encpass."','".$estado."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creada la cuenta de ENCARGADO de Manera Satisfactoria.'); document.location.href='encargados.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y la cuenta de ENCARGADO no Pudo Ser Creada.'); document.location.href='encargados.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>