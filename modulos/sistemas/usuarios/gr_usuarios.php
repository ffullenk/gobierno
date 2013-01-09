<?
include ("../../../funciones/conexion_comunicaciones.php");
include ("../../../funciones/fechas.php");

global  $usernameadmin,$Submit1, $Submit2,$Submit3,$Submit4,$SubmitB1,$frm_nombre,$frm_usuario,$frm_correo,$frm_contrasena,$id_not,$tpo_busq,$frm_busqueda,$user,$tpo_usuario;


while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();

$fecha= date("d-m-Y");

$hora = date ("h:i:s");

$vacio = " ";
if ($SubmitB1=="Buscar"){
	
	if($frm_busqueda==""){
		
		header("Location: principal.php?campo_blanco=1");
		
	}
	else 
	if($tpo_busq==0){
		header("Location: principal.php?busq=$frm_busqueda&tpo_busq_blanco=1");
	}
	else
	{
	$actividad = "Buscar";
	$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada) values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','4','".$actividad."')";
	$result = mysql_query($sql);
			
			header("Location: principal.php?busq=$frm_busqueda&tpo=$tpo_busq");
	}		
		
}


if($Submit1=="Ingresar Usuario")
{
 $sql="select * from usuario where usuario='".$frm_usuario."'";
 $result = mysql_query($sql);
 $cont_sql=mysql_num_rows($result);
	if($cont_sql>0){
	
	header("Location: principal.php?mostrar_ingreso=1&errorusuario=1");

	}else{

	$pass = md5($frm_contrasena);
	
	
	$str_graba = "insert into usuario (nombre_completo,correo_usuario,clave_usuario,id_tipo_usuario,usuario) values ('".$frm_nombre."','".$frm_correo."','".$pass."','".$tpo_usuario."','".$frm_usuario."')";
	
	$result_graba=mysql_query($str_graba);
	
	$sql_id="select * from usuario where usuario='".$frm_usuario."'";
	$result=mysql_query($sql_id);
	$row=mysql_fetch_array($result);
	$id_us = $row['id_usuario'];
	$actividad = "Ingresa";
	
	$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada) values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','4','".$actividad."')";
	$result = mysql_query($sql);
	
	header("Location: principal.php?id=$id_us&pass=$frm_contrasena&tipo=Editar&mostrar_ingreso=1&categoria_usuario=$tpo_usuario");
}
}
if ($Submit2=="Cancelar")
{   
	header("Location: principal.php");
	exit;
}
if($Submit3=="Aceptar Cambios"){
	$pass = md5($frm_contrasena);
	
	$sql_act = "UPDATE usuario SET  nombre_completo= '".$frm_nombre."',correo_usuario='".$frm_correo."',clave_usuario='".$pass."',usuario='".$frm_usuario."',id_tipo_usuario='".$tpo_usuario."' WHERE id_usuario= '".$id_not."'"; 
	
	$result_act=mysql_query($sql_act);
	$actividad = "Editar";
	$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada) values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','4','".$actividad."')";
	$result = mysql_query($sql);
	
	header("Location: principal.php?id=$id_not&pass=$frm_contrasena&tipo=Editar&mostrar_ingreso=1&categoria_usuario=$tpo_usuario");
}
if($Submit4=="Eliminar"){
	$str_act = "DELETE FROM usuario WHERE id_usuario= '".$id_not."'"; 
    $result_act=mysql_query($str_act);
	$actividad = "Eliminar";
	$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada) values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','4','".$actividad."')";
	$result = mysql_query($sql);
	header("Location: principal.php");
}

?>