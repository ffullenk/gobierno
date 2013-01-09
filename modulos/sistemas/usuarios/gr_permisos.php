<? 	include ("../../../funciones/conexion_comunicaciones.php");
	include ("../../../funciones/fechas.php");

global $SubmitAs, $ingresar, $modificar, $eliminar, $visualizar, $leer, $todas, $selec_sistema, $user,$busq,$tpo, $hora_inicio, $fecha_inicio,$id_not2;


while (list ($key, $val) = each ($_REQUEST))
	{
  		$$key = $val;
	} 
$fecha=date("d-m-Y");
$hora=date("H:i:s");
$vacio=" ";
	
if ($SubmitAs == "Asignar Permisos")
	{
	
	$usu = "SELECT * from permiso where id_usuario = '".$id_not2."' and id_sistema ='".$selec_sistema."'";
	$result=mysql_query($usu);
  	$row=mysql_fetch_array($result);
	$idsis = $row['id_sistema'];

	//echo $idsis;

	
	if ($idsis == $selec_sistema){
	$sql_act = "UPDATE permiso SET  ingresar= '".$ingresar."',modificar= '".$modificar."', eliminar= '".$eliminar."', visualizar= '".$visualizar."' where id_usuario='".$id_not2."' and id_sistema = '".$selec_sistema."' "; 
	$result_act=mysql_query($sql_act);
	
	
	$actividad = "Asignar Permisos";
	$sql_auditar="UPDATE auditar SET ultima_modificacion= '".fecha_formato_base($fecha).$vacio.$hora."', id_sistema= '".$selec_sistema."', accion_realizada='".$actividad."'  where id_usuario = '".$user."' and fecha_ingreso = '".fecha_formato_base($fecha)."' ";
	
	$result_aud = mysql_query($sql_auditar);
	
	
	
	
	header("Location: principal.php?id=$id_not2&tipo=Editar&busq=$busq&mostrar_ingreso=1&tpo=$tpo&seleccion=$selec_sistema");
	}
	else
	{
	$str_asig = "INSERT INTO permiso (ingresar, modificar, eliminar, visualizar, id_usuario, id_sistema) values ('".$ingresar."','".$modificar."','".$eliminar."','".$visualizar."', '".$id_not2."', '".$selec_sistema."')"; 
   $result_asig=mysql_query($str_asig);
//	echo $idsis;
	header("Location: principal.php?id=$id_not2&tipo=Editar&busq=$busq&mostrar_ingreso=1&tpo=$tpo&seleccion=$selec_sistema");
	}
}
?>