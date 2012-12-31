<?
include("incluir/seteaConf.php");
include("incluir/seteaBD.php");
include("incluir/encripta.php");
$link = conectar();

include("incluir/funciones.php");



 $usrname = trim($_POST["usrname"]);
 $password = trim($_POST["pass"]);
 
 if($usrname=="")
 {
 	echo "<script>alert('Por favor ingrese su Rut'); document.location.href='index.php';</script>\n"; 
 }
 if($password=="")
 {
 	echo "<script>alert('Por favor ingrese su Password'); document.location.href='index.php';</script>\n"; 
 }
 
$estadoUsuario = estaActivo($usrname, $password);

if ($estadoUsuario == 0)//no esta registrado
{
echo "<script>alert('Usuario o Contrase&ntilde;a Invalidos'); document.location.href='index.php';</script>\n";
}
if ($estadoUsuario == -1) //esta inactivo
{
echo "<script>alert('Su cuenta de usuario ha sido desabilitada del sistema. comuniquese con el administrador'); document.location.href='index.php';</script>\n";
}
if ($estadoUsuario == 1)//esta registrado y activo
{
	$tipoUsuario = esUsuario($usrname, $password);
	 ///Levanta Session;
	if($tipoUsuario!="")
	{	
		$userBackEnd = $usrname;
		$passBackEnd = $password;
		$tipoUsrBackEnd = $tipoUsuario;
		
		session_register("userBackEnd");
		session_register("passBackEnd");
		session_register("tipoUsrBackEnd");
		//redireccionar pagina administracion
		
		header("location:"._urlPanel_."inicio2.php");			
	}
	else
	{
		echo "<script>alert('Uds no tiene los privilegios suficientes para Ingresar'); document.location.href='index.php';</script>\n"; 
	}
}
?>