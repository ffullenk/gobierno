<?php
include("cpanel/incluir/seteaConf.php");
include("cpanel/incluir/seteaBD.php");
include("cpanel/incluir/encripta.php");
$link = conectar();

include("cpanel/incluir/funciones.php");

$usrname = trim($_POST["usrname"]);
$password = trim($_POST["pass"]);
$ejercicio = $_POST["ejercicio"];
 
if($usrname=="" )
 {
 	echo "<script>alert('Por Favor Ingrese El Nombre de la Cuenta'); document.location.href='index.php';</script>\n"; 
 }
 if($password=="")
 {
 	echo "<script>alert('Por Favor Ingrese Su Password'); document.location.href='index.php';</script>\n"; 
 }
 if($ejercicio=="-")
 {
 	echo "<script>alert('Por Favor Seleccione un Ejercicio'); document.location.href='index.php';</script>\n"; 
 }
 
$estadoUsuario = estaActivo($usrname, $password);

if ($estadoUsuario == 0) //no esta registrado
{
   echo "<script>alert('Usuario o Contrase&ntilde;a Invalidos'); document.location.href='index.php';</script>\n";
}
if ($estadoUsuario == -1) //esta inactivo
{
   echo "<script>alert('Su cuenta de usuario ha sido desabilitada del sistema. comuniquese con el administrador'); document.location.href='index.php';</script>\n";
}
if ($estadoUsuario == 1)//esta registrado y activo
{
	$tipoCobertura = cCobertura($usrname, $password);
	$tipoCargo = cCargo($usrname, $password);
	
	 ///Levanta Session;
		
		$userBackEnd = $usrname;
		$passBackEnd = $password;
		$ejerBackEnd = $ejercicio;
		$tipoCargoBackEnd = $tipoCargo;
		$tipoCoberturaBackEnd = $tipoCobertura;
		
		session_register("userBackEnd");
		session_register("passBackEnd");
		session_register("ejerBackEnd");
		session_register("tipoCargoBackEnd");
		session_register("tipoCoberturaBackEnd");
		
		//redireccionar pagina administracion
		if($tipoCobertura=="2")  // Comunal
	    {
		   header("location:"._ntbkURL_."comuna");			
	    }
	    elseif($tipoCobertura=="3") // Provincial
		{
		   header("location:"._ntbkURL_."provincia");	
		} elseif($tipoCobertura=="4") // Regional
	    {
		   header("location:"._ntbkURL_."region");	
		} elseif($tipoCobertura=="5") // Nacional
		{
		   header("location:"._ntbkURL_."pais");	
		} else {
		   echo "<script>alert('Uds no tiene los privilegios suficientes para Ingresar'); document.location.href='index.php';</script>\n"; 
	    }
}
?>