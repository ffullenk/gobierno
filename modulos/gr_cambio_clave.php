<?
include ("../funciones/conexion_gore_banco.php");
include ("../funciones/fechas.php");

global $Submit4,$Submit3,$Submit,$Submit2,$titulo,$colorfondo,$id_usu,$id,$fecha_inicio,$fecha_hoy,$fecha_fin,$hora,$tipo,$estado_not,$principal,$contrasena2,$usernameadmin;
global $frm_op1,$frm_op2,$frm_op3,$frm_op4,$frm_op5,$frm_op6,$frm_op7,$frm_op8,$frm_op9,$frm_op10,$frm_op1,$frm_op12;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 
$fecha=date("d-m-Y");
$fecha_hoy=date("Y-m-d");
$hora=date("H:i:s");

session_start();

if ($Submit4=="Cancelar")
{   
	header("Location: administrador.php");
	exit;
}


$valor="Modificar";
$vacio=" ";

			
		$pass = md5($contrasena);
		$sql="update usuario set clave_usuario='".$pass."' where id_usuario=".$id_not;
		$result=mysql_query($sql);
		
		
		$id_user=$_SESSION['idusername'];
		
		include("../funciones/bitacora.php");
		
		acciones('3',' clave usuario',$idusername,'0','0');
	
		header("Location: cambio_clave.php");

?>