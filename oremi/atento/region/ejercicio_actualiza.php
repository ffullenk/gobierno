<?php 
session_start();

 $userBackEnd = $_SESSION['userBackEnd'];
 $passBackEnd = $_SESSION['passBackEnd'];
 
 $ejerBackEnd = $_SESSION['ejerBackEnd'];
 $tipoCargoBackEnd = $_SESSION['tipoCargoBackEnd'];
 $tipoCoberturaBackEnd = $_SESSION['tipoCoberturaBackEnd'];
 
 include("../cpanel/incluir/seteaConf.php");
 include("../cpanel/incluir/seteaBD.php");
 include("../cpanel/incluir/encripta.php");
 $link = conectar();

 include("../cpanel/incluir/funciones.php");
 
    // Recibimos las variables del formulario
	$idEjercicio = $_POST['idEjercicio'];
	$horainicio = $_POST['horainicio'];
	$horatermino = $_POST['horatermino'];
		
	// Actualiza punto
	$upEjer = "UPDATE tb_ejercicios SET HORAINICIO='".$horainicio."', HORATERMINO='".$horatermino."' WHERE IDEJERCICIO='".$ejerBackEnd."'";
	mysql_query($upEjer);
	
	if($upEjer)
	{
		echo "<script>alert('Datos de Ejercicio Actualizados Correctamente'); document.location.href='index.php';</script>\n";
	} else {
		echo "<script>alert('Error... Ocurrio un Problema Interno y No Pudo Ser Actualizada la Informacion.'); document.location.href='index.php';</script>\n";
	}

			    
 ?>