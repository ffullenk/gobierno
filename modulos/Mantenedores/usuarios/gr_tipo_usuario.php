<? 
	include ("../../../funciones/conexion_gore_banco.php");
	include ("../../../funciones/fechas.php");

global $frm_nombre, $SubmitA, $SubmitE, $SubmitC, $id_tipo, $frm_nuevo_tipo,$SubmitI,$SubmitAS, $SubmitES, $frm_nombre3, $id_sis, $estado;
global $estado2, $estado3, $SubmitAS2,$a_cambios,$aingresar,$id_ma;
	while (list ($key, $val) = each ($_REQUEST))
		{
  			$$key = $val;
		} 
		
session_start();

$fecha= date("d-m-Y");

$hora = date ("h:i:s");

$vacio = " ";

$sql_usu = "SELECT * from usuario where nombre_completo = '".$_SESSION['usernameadmin']."' " ;
	$result_usu=mysql_query($sql_usu);
  	$row_usu=mysql_fetch_array($result_usu);
	$user = $row_usu['id_usuario'];
	
	$nombre ="Mantenedor Usuario";
	$sql_mant ="SELECT * FROM mantenedores where nombre_mantenedor = '".$nombre."'";
	$result_mant = mysql_query($sql_mant);
	$row_mant=mysql_fetch_array($result_mant);
	$mantenedor = $row_mant['id_mantenedor'];
		
if ($a_cambios==1)
	{
	$actividad="Modifica tipo Usuario";
	
	$sql_consul="SELECT * FROM tipo_usuario where id_tipo_usuario ='".$id_tipo."'";
	$result_consul= mysql_query($sql_consul);
	
	
	$row_consul = mysql_fetch_array($result_consul);
	if ($row_consul['id_tipo_usuario'] >3){
	
	$sql_tipo = "UPDATE tipo_usuario SET nombre_tipo_usuario = '".$frm_nombre."', estado_tipo_usuario = '".$estado."' where id_tipo_usuario = '".$id_tipo."' ";
	
	
	
	$result_tipo = mysql_query($sql_tipo);
	
/*	$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada, id_mantenedor) values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','0','".$actividad."','".$mantenedor."')";
	$result = mysql_query($sql);
	*/
	include("../../../funciones/bitacora.php");
	
	acciones('3',' perfiles de usuarios',$id_ma,$idusername);
	
	header("Location: frm_usuario.php?tipo=otra&id_ma=$id_ma");
		exit;
	}else{
	
	$sql_tipo = "UPDATE tipo_usuario SET nombre_tipo_usuario = '".$frm_nombre."', estado_tipo_usuario='".$estado."' where id_tipo_usuario = '".$id_tipo."' ";
	$result_tipo = mysql_query($sql_tipo);
	
/*		$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada, id_mantenedor) values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','0','".$actividad."','".$mantenedor."')";
	$result = mysql_query($sql);
	*/
	include("../../../funciones/bitacora.php");
	
	acciones('3',' perfiles de usuarios',$id_ma,$idusername);
	
		header("Location: frm_usuario.php?tipo=otra&id_ma=$id_ma");
		exit;
	}
	}
/*	
if ($SubmitE=="Eliminar")
{
	$actividad="Elimina tipo Usuario";
	$sql_elimina ="DELETE FROM tipo_usuario WHERE id_tipo_usuario = '".$id_tipo."'";
	$result_elimina = mysql_query($sql_elimina);
	
	$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada, id_mantenedor) values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','0','".$actividad."','".$mantenedor."')";
	$result = mysql_query($sql);
	
	header("Location: frm_usuario.php?tipo=otra&id_ma=$id_ma");
}
*/

if ($a_ingresar==1)
{
	$actividad ="Ingresa tipo Usuario";
	$sql_max = "SELECT MAX(id_tipo_usuario) as maximo from tipo_usuario";

    $result_max = mysql_query($sql_max);

   while($row_max=mysql_fetch_array($result_max)){ $id = $row_max["maximo"] + 1; }
   
   $sql_consulta ="SELECT * FROM tipo_usuario where nombre_tipo_usuario = '".$frm_nuevo_tipo."'";
	
	$result_consulta = mysql_query($sql_consulta);
	if ($row_consulta=mysql_fetch_array($result_consulta)>0){
		header("Location: frm_usuario.php?tipo=otra&existe=uno&id_ma=$id_ma");
		}else{
	if ($frm_nuevo_tipo=="")
	{
	header("Location: frm_usuario.php?vacio=campo&existe=dos&id_ma=$id_ma");	
	}
	else
	{
	
	$sql_nuevo="INSERT INTO tipo_usuario (id_tipo_usuario, nombre_tipo_usuario, estado_tipo_usuario)";
	$sql_nuevo.=" values ('".$id."', '".$frm_nuevo_tipo."','".$estado2."')";
	$result_nuevo=mysql_query($sql_nuevo);
	
	$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada, id_mantenedor)";
	$sql.=" values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','0','".$actividad."','".$mantenedor."')";
	$result = mysql_query($sql);

	include("../../../funciones/bitacora.php");
	
	acciones('0',' perfiles de usuarios',$id_ma,$idusername);
	
	header("Location: frm_usuario.php?tipo=otra&id_ma=$id_ma");
}
}

}

?>
