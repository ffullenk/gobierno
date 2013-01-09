<?

include ("../../../funciones/fechas.php");
include("../../../funciones/bitacora.php");
include("../../../funciones/conexion_gore_banco.php");
global  $usernameadmin,$a_permiso,$ac_cambios,$a_ingresar,$a_eliminar,$id_m;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 


session_start();

$fecha= date("d-m-Y");

$hora = date ("h:i:s");

if($a_ingresar==1)
{
 $sqlU="SELECT * FROM usuario WHERE usuario='".$frm_usuario."'";
 $resultU=mysql_query($sqlU);
 $c=mysql_num_rows($resultU);

 if($c==0){
 
 $sql_max = "SELECT MAX(id_usuario) as maximo from usuario";
 $result_max = mysql_query($sql_max);
 while($row_max=mysql_fetch_array($result_max)) { $id = $row_max["maximo"] + 1;   }  	  
	$pass = md5($frm_contrasena);
	$sql1="INSERT INTO `usuario` (`id_usuario`,`nombre_completo`, `correo_usuario`, `clave_usuario`, `id_tipo_usuario`, `usuario`)";
	$sql1.="VALUES ('".$id."','".$frm_nombre."','".$frm_correo."','".$pass."','".$tpo_usuario."','".$frm_usuario."')";
	$result1=mysql_query($sql1);
	
	$sql2="SELECT * FROM  sistema";
	$result_c=mysql_query($sql2);
	$sql_max = "SELECT MAX(id_permiso) as maximo from permiso";
	$result_max = mysql_query($sql_max);
	while($row_max=mysql_fetch_array($result_max)) { $id_p = $row_max["maximo"] + 1;   } 
	
	while($rowsi=mysql_fetch_array($result_c)) 
	{
 
		if(($tpo_usuario==3) || ($tpo_usuario==2))
		{
	 	 	$sql="INSERT INTO `permiso` (`id_permiso`,`ingresar`, `modificar`, `eliminar`, `visualizar`, `id_usuario`, `id_sistema`,id_subsistema)";
			$sql.="VALUES ('".$id_p."','1','1','1','1','".$id."','".$rowsi['id_sistema']."',0)";
			$result=mysql_query($sql);
			$id_p++;
			
			$SQL="SELECT * FROM subsistemas where id_sistema='".$rowsi['id_sistema']."'";
			$RESULTADO=mysql_query($SQL);
			while($row=mysql_fetch_array($RESULTADO)){
			
			$IN="INSERT INTO `permiso` (`id_permiso`,`ingresar`, `modificar`, `eliminar`, `visualizar`, `id_usuario`, `id_sistema`,id_subsistema)";
			$IN.=" VALUES ('".$id_p."','1','1','1','1','".$id."','".$rowsi['id_sistema']."','".$row['id_subsistema']."')";
			$exe=mysql_query($IN);
			$id_p++;
			}
		}
		else
		{
		 	$sql="INSERT INTO `permiso` (`id_permiso`,`ingresar`, `modificar`, `eliminar`, `visualizar`, `id_usuario`, `id_sistema`,`id_subsistema`)";
			$sql.="VALUES ('".$id_p."','0','0','0','0','".$id."','".$rowsi['id_sistema']."',0)";
			$result=mysql_query($sql);
			$id_p++;
					
			$SQL="SELECT * FROM subsistemas where id_sistema='".$rowsi['id_sistema']."'";
			$RESULTADO=mysql_query($SQL);
			while($row=mysql_fetch_array($RESULTADO)){
			$IN="INSERT INTO `permiso` (`id_permiso`,`ingresar`, `modificar`, `eliminar`, `visualizar`, `id_usuario`, `id_sistema`,id_subsistema)";
			$IN.=" VALUES ('".$id_p."','0','0','0','0','".$id."','".$rowsi['id_sistema']."','".$row['id_subsistema']."')";
			$exe=mysql_query($IN);
			$id_p++;
			}
		 }
	}

	acciones('0',' Usuarios',$id_m,$idusername,$id_sub); 
	
   header("Location: administrador.php?id=$id&tipo=Editar&mostrar_ingreso=1&opR=1&id_m=$id_m&id_sub=$id_sub");
   } else {
	

	acciones('0',' Usuarios',$id_m,$idusername,$id_sub);   
	header("Location: administrador.php?errorU=1&opR=1&mostrar_ingreso=1&id_m=$id_m&id_sub=$id_sub");
   }
}

if($ac_cambios==1)
{
 	$pass = md5($frm_contrasena);
	$sql1="UPDATE `usuario` SET `nombre_completo`='".$frm_nombre."', `correo_usuario`='".$frm_correo."', `clave_usuario`='".$pass."', `usuario`='".$frm_usuario."',`id_tipo_usuario`='".$tpo_usuario."' WHERE `id_usuario`='".$id_us."'";
	$result1=mysql_query($sql1);
	
	$sql2="SELECT * FROM  sistema";
	$result_c=mysql_query($sql2);
	$sql_max = "SELECT MAX(id_permiso) as maximo from permiso";
	$result_max = mysql_query($sql_max);
	while($row_max=mysql_fetch_array($result_max)) { $id_p = $row_max["maximo"] + 1;   } 
	
	while($rowsi=mysql_fetch_array($result_c)) 
	{
		if($tpo_usuario==3)
		{
			$sql="UPDATE `permiso` SET `ingresar`=1, `modificar`=1, `eliminar`=1, `visualizar`=1 ";
			$sql.="WHERE `id_usuario`='".$id_us."' AND id_sistema='".$rowsi['id_sistema']."'";
			$result=mysql_query($sql);
			$id_p++;
					
		}
		else
		{
			$sql="UPDATE `permiso` SET `ingresar`=0, `modificar`=0, `eliminar`=0, `visualizar`=0 ";
			$sql.="WHERE `id_usuario`='".$id_us."' AND id_sistema='".$rowsi['id_sistema']."'";
			$result=mysql_query($sql);
			$id_p++;
		 }
	}


	acciones('3',' Usuarios',$id_m,$idusername,$id_sub); 
		
	header("Location: administrador.php?id=$id_us&tipo=Editar&mostrar_ingreso=1&opR=1&id_m=$id_m&id_sub=$id_sub");
}
if($a_eliminar==1)
{
	$sql1="DELETE FROM `usuario` WHERE `id_usuario`='".$id_us."'";
	$result1=mysql_query($sql1);
	
	$sql2="DELETE FROM permiso WHERE id_usuario='".$id_us."'";
	$result2=mysql_query($sql2);
	
	
	acciones('2',' Usuarios',$id_m,$idusername,$id_sub); 	
	header("Location: administrador.php?id_m=$id_m&id_sub=$id_sub");
}
	
if ($a_permiso == 1)
	{

	if($selec_sistema==''){
	$sql_p="UPDATE `permiso` SET `ingresar`='".$ingresar."', `modificar`='".$modificar."', `eliminar`='".$eliminar."', `visualizar`='".$visualizar."' WHERE `id_usuario`='".$id_us."'  and id_subsistema='".$subsistema."'";
	$result2=mysql_query($sql_p);
		acciones('3',' Permisos de Usuarios',$id_m,$idusername,$id_sub); 
		header("Location: administrador.php?id=$id_us&tipo=Editar&mostrar_ingreso=1&opR=1&s&id_m=$id_m&id_sub=$subsistema");
	}
	if($subsistema=='')
	{
	$sql_p="UPDATE `permiso` SET `ingresar`='".$ingresar."', `modificar`='".$modificar."', `eliminar`='".$eliminar."', `visualizar`='".$visualizar."' WHERE `id_usuario`='".$id_us."'  and id_sistema='".$selec_sistema."'";
	$result2=mysql_query($sql_p);
	acciones('3',' Permisos de Usuarios',$id_m,$idusername,$id_sub); 
	header("Location: administrador.php?id=$id_us&tipo=Editar&mostrar_ingreso=1&opR=1&seleccion=$selec_sistema&id_m=$id_m&id_sub=$id_sub");
	}

		
	

}
?>