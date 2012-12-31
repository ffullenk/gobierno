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
			  $zona_nombre = $_POST['zona_nombre'];
			  $zona_ejercicio = $_POST['zona_ejercicio'];
			  $regiones = $_POST['regiones'];
			  $provincias = $_POST['provincias'];
			  $comunas = $_POST['comunas'];
			  $zona_encargado = $_POST['zona_encargado'];
			  $zona_colaborador = $_POST['zona_colaborador'];
			  $estado = $_POST['estado'];
			  $zona_fecha = date('Y-m-d H:i:s');
			  
              $InsertaReg = "INSERT INTO tb_zonaejercicio(IDREGION,IDPROVINCIA,IDCOMUNA,NOMBREZONA,FECHACREACION,IDENCARGADO,IDEJERCICIO,IDCOLABORADOR,ESTADOZONA) VALUES('".$regiones."','".$provincias."','".$comunas."','".$zona_nombre."','".$zona_fecha."','".$zona_encargado."','".$zona_ejercicio."','".$zona_colaborador."','".$estado."');";
              $query = mysql_query($InsertaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Creada la ZONA de Manera Satisfactoria.'); document.location.href='zona.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y la ZONA no Pudo Ser Creada.'); document.location.href='zona.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>