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
			  $id = $_POST['id'];
			  $zona_nombre = $_POST['zona_nombre'];
			  $zona_ejercicio = $_POST['zona_ejercicio'];
			  $regiones = $_POST['regiones'];
			  $provincias = $_POST['provincias'];
			  $comunas = $_POST['comunas'];
			  $zona_encargado = $_POST['zona_encargado'];
			  $zona_colaborador = $_POST['zona_colaborador'];
			  $estado = $_POST['estado'];
			  $zona_fecha = date('Y-m-d H:i:s');
			  		  
              $ModificaReg = "UPDATE tb_zonaejercicio SET ".
			  " IDREGION=\"$regiones\", ".
			  " IDPROVINCIA=\"$provincias\", ".
			  " IDCOMUNA=\"$comunas\", ".
			  " NOMBREZONA=\"$zona_nombre\", ".
			  " FECHACREACION=\"$zona_fecha\", ".
			  " IDENCARGADO=\"$zona_encargado\", ".
			  " IDEJERCICIO=\"$zona_ejercicio\", ".
			  " IDCOLABORADOR=\"$zona_colaborador\", ".
			  " ESTADOZONA=\"$estado\" ".
			  " WHERE IDZONAEJERCICIO=\"$id\"";
						  
              $query = mysql_query($ModificaReg);
			  
			  if($query) 
			  {
			     echo "<script>alert('Ha Sido Modificada  el detalle de la ZONA del Ejercicio de Manera Satisfactoria.'); document.location.href='zona.php';</script>\n";
			  }
			  else
			  {
			     echo "<script>alert('Error... Ocurrio un Problema Interno y  el detalle de la ZONA del Ejercicio no Pudo Ser Modificada.'); document.location.href='zona.php';</script>\n";
			  }


} else { echo "<script>alert('Su Sesion de Trabajo no esta Activa, por favor intente reingresando sus datos.'); document.location.href='../index.php';</script>\n";} 
?>