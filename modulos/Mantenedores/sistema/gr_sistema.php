<? 
	include("../../../funciones/conexion_gore_banco.php");
	include ("../../../funciones/fechas.php");

global $SubmitC, $SubmitAS, $SubmitES, $frm_nombre3, $id_sis, $estado,$id_ma,$idusername;
global $estado2, $estado3, $SubmitAS2, $frm_nuevo_sistema, $estado_nuevo_sistema, $url_sistema, $sube_archivo, $url, $modifica_url,$SubmitASUB,$SubmitACSUB,$SubmitESUB,$frm_modulo,$estado_modulo,$url_modulo;
	
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
	
	$nombre ="Mantenedor Sistema";
	$sql_mant ="SELECT * FROM mantenedores where nombre_mantenedor = '".$nombre."'";
	$result_mant = mysql_query($sql_mant);
	$row_mant=mysql_fetch_array($result_mant);
	$mantenedor = $row_mant['id_mantenedor'];

if ($SubmitAS == "Aceptar Cambios")
	{
	$actividad = "Modifica Sistema";
	
	$sql_consul="SELECT * FROM sistema where id_sistema ='".$id_sis."'";
	$result_consul= mysql_query($sql_consul);
	$row_consul = mysql_fetch_array($result_consul);
	if ($row_consul['id_sistema'] >4){
	$sql_sis = "UPDATE sistema SET nombre_sistema = '".$frm_nombre3."', estado_sistema='".$estado3."', url_sistema='".$modifica_url."' where id_sistema = '".$id_sis."' ";
	$result_sis = mysql_query($sql_sis);
	


	
	header("Location: frm_sistema.php?tipo=otra&id_ma=$id_ma");
	exit;
	
	}else{
	$sql_sis = "UPDATE sistema SET nombre_sistema = '".$frm_nombre3."', url_sistema='".$modifica_url."' where id_sistema = '".$id_sis."'";
	$result_sis = mysql_query($sql_sis);

/*	$sql="insert into auditar (fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada, id_mantenedor) values ('".fecha_formato_base($fecha)."','".$hora."','".fecha_formato_base($fecha).$vacio.$hora."','".$user."','0','".$actividad."','".$mantenedor."')";
	$result = mysql_query($sql);
*/
	
	header("Location: frm_sistema.php?tipo=otra&id_ma=$id_ma");
	exit;
	}
	}
	
if ($SubmitES=="Eliminar")
{
	$actividad="Elimina Sistema";
	$sql_elimina ="DELETE FROM sistema WHERE id_sistema = '".$id_sis."' ";
	$result_elimina = mysql_query($sql_elimina);
	
	$sql_adm_per ="DELETE FROM permiso WHERE id_sistema = '".$id_sis."' ";
	$result_el_adm_per=mysql_query($sql_adm_per);
	

	header("Location: frm_sistema.php?tipo=otra&id_ma=$id_ma");
}

if ($SubmitC=="Cancelar")
{   
	header("Location: frm_sistema.php?tipo=otra&id_ma=$id_ma");
	exit;
}

if($SubmitASUB=="Nuevo Modulo")
{

 $sql_max = "SELECT MAX(id_subsistema) as maximo from subsistemas";
 $result_max = mysql_query($sql_max);
 while($row_max=mysql_fetch_array($result_max)) {  $id = $row_max["maximo"] + 1; }
 
 $SQL="INSERT INTO `subsistemas` (`id_subsistema`, `nombre_subsistema`, `estado_subsistema`, `url_subsistema`, `id_sistema`)";
 $SQL.="VALUES ('".$id."', '".$frm_modulo."','".$estado_modulo."','".$url_modulo."','".$id_sis."')";

 $RESULT=mysql_query($SQL);

  $sql_Adm="select * from usuario where id_tipo_usuario=3";
  $result_adm=mysql_query($sql_Adm);
			
  $sql_max = "SELECT MAX(id_permiso) as maximo from permiso";
  $result_max = mysql_query($sql_max);
        
		while($row_max=mysql_fetch_array($result_max)){ $id_per = $row_max["maximo"] + 1;}
		
	$uno=1;	
	while($row_adm=mysql_fetch_array($result_adm)){
	$usuario = $row_adm['id_usuario'];
    $sql_per="INSERT into permiso (id_permiso,ingresar,modificar,eliminar,visualizar,id_usuario,id_sistema,id_subsistema)";
	$sql_per.="VALUES ('".$id_per."','".$uno."','".$uno."','".$uno."','".$uno."','".$usuario."','".$id_sis."','".$id."')";
	$restul_per=mysql_query($sql_per);
	$id_per++;
	}
	 $sql_max = "SELECT MAX(id_permiso) as maximo from permiso";
 	 $result_max = mysql_query($sql_max);
     while($row_max=mysql_fetch_array($result_max)){ $id_per = $row_max["maximo"] + 1;}
	 
    $sql_Adm2="select * from usuario where id_tipo_usuario<>3";
	$result_adm2=mysql_query($sql_Adm2);
	$uno=0;
	while($row_adm2=mysql_fetch_array($result_adm2)){
	$usuario = $row_adm2['id_usuario'];
    $sql_per="INSERT into permiso (id_permiso,ingresar,modificar,eliminar,visualizar,id_usuario,id_sistema,id_subsistema)";
	$sql_per.="VALUES ('".$id_per."','".$uno."','".$uno."','".$uno."','".$uno."','".$usuario."','".$id_sis."','".$id."')";
	
	$restul_per=mysql_query($sql_per);
	$id_per++;
	
	}	
	
//	header("Location: frm_sistema.php?id_sis=$id_sis&id_sub=id&tipo=otra&id_ma=$id_ma&EditarSub=1&nuevo_modulo=1");
	header("Location: frm_sistema.php?id_sis=$id_sis&id_subsis=$id&tipo=Nueva2&id_ma=$id_ma&EditarSub=1&nuevo_modulo=1");
 
}
if ($SubmitESUB=="Eliminar")
{
	$sql_elimina ="DELETE FROM subsistemas WHERE id_subsistema = '".$id_sub."' ";
	$result_elimina = mysql_query($sql_elimina);
	
	$sql_adm_per ="DELETE FROM permiso WHERE id_subsistema = '".$id_sub."' ";
	$result_el_adm_per=mysql_query($sql_adm_per);
	


	
	header("Location: frm_sistema.php?tipo=otra&id_ma=$id_ma&id_sis=$id_sis&tipo=Nueva2");
}
if($SubmitACSUB=="Aceptar Cambios")
{
	$SQL="UPDATE `subsistemas` SET `nombre_subsistema`='".$frm_modulo."', `estado_subsistema`='".$estado_modulo."',";
	$SQL.=" `url_subsistema`='".$url_modulo."' WHERE `id_subsistema`='".$id_sub."'";
	$RESULT=mysql_query($SQL);
	
	header("Location: frm_sistema.php?id_sis=$id_sis&id_sub=$id_sub&tipo=Nueva2&id_ma=$id_ma&EditarSub=1&nuevo_modulo=1");
}
if ($SubmitAS2 == "Ingresar Sistema")
{
	$sql_max = "SELECT MAX(id_sistema) as maximo from sistema";

                  $result_max = mysql_query($sql_max);

                  while($row_max=mysql_fetch_array($result_max))

                  {

                               $id = $row_max["maximo"] + 1;

                  }
	
	$sql_consulta ="SELECT * FROM sistema where nombre_sistema = '".$frm_nuevo_sistema."'";
	$result_consulta = mysql_query($sql_consulta);
	if ($row_consulta=mysql_fetch_array($result_consulta)>0){
		header("Location: frm_sistema.php?tipo=otra&existe=uno&id_ma=$id_ma");
		}else{
		if ($frm_nuevo_sistema==""){
		header("Location: frm_sistema.php?tipo=otra&existe=dos&id_ma=$id_ma");
		}else{
		
		$index = "/index.php";
		$sql_insert = "INSERT INTO sistema (id_sistema, nombre_sistema, estado_sistema, url_sistema)";
		$sql_insert.="values ('".$id."', '".$frm_nuevo_sistema."', '".$estado_nuevo_sistema."', '".$url.$frm_nuevo_sistema.$index."')";
		
		$result_insert= mysql_query($sql_insert);
	
		
		$sql_Adm="select * from usuario where id_tipo_usuario=3";
		$result_adm=mysql_query($sql_Adm);
			
		$sql_max = "SELECT MAX(id_permiso) as maximo from permiso";
        $result_max = mysql_query($sql_max);
        
		while($row_max=mysql_fetch_array($result_max)){ $id_per = $row_max["maximo"] + 1;}
	
	$uno=1;	
	while($row_adm=mysql_fetch_array($result_adm)){
	$usuario = $row_adm['id_usuario'];
    $sql_per="INSERT into permiso (id_permiso,ingresar,modificar,eliminar,visualizar,id_usuario,id_sistema,id_subsistema)";
	$sql_per.="VALUES ('".$id_per."','".$uno."','".$uno."','".$uno."','".$uno."','".$usuario."','".$id."',0)";
	
	$restul_per=mysql_query($sql_per);
	$id_per++;
	
		
	}
   
    $sql_Adm2="select * from usuario where id_tipo_usuario<>3";
	$result_adm2=mysql_query($sql_Adm2);
	
	$uno=0;
	while($row_adm2=mysql_fetch_array($result_adm2)){
	$usuario = $row_adm2['id_usuario'];
    $sql_per="INSERT into permiso (id_permiso,ingresar,modificar,eliminar,visualizar,id_usuario,id_sistema,id_subsistema)";
	$sql_per.="VALUES ('".$id_per."','".$uno."','".$uno."','".$uno."','".$uno."','".$usuario."','".$id."',0)";
	
	$restul_per=mysql_query($sql_per);
	$id_per++;
	
	}	  		
    	header("Location: frm_sistema.php?tipo=otra&id_ma=$id_ma");
	}	
			
			
	}			
					
	}	

	





?>