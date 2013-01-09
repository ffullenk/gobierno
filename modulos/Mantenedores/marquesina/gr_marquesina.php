<? 
include ("../../../funciones/conexion_comunicaciones.php");
include ("../../../funciones/fechas.php");

global  $usernameadmin,$Submit1,$Submit1AV,$Submit2,$Submit3,$Submit4,$frm_titulo,$id_marquesina,$frm_fecha,$arch_vid,$sistema,$frm_fecha_inicio,$frm_fecha_termino,$estado,$update;

$hora = date ("h:i:s");

$vacio = " ";

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();
if($Submit1AV=="Agregar Otro Destacado")
{
	header("Location: frm_marquesina.php");
}

if($Submit2=="Cancelar")
{

	header("Location: frm_marquesina.php");
	exit;
}

if($Submit1=="Agregar Destacado")
{
	$sql_max = "SELECT MAX(id_marquesina) as maximo from marquesina";
    $result_max = mysql_query($sql_max);
    while($row_max=mysql_fetch_array($result_max))
	{ 
	          $id_marquesina = $row_max["maximo"] + 1;
	}
		
	$sql_video="INSERT INTO marquesina (id_marquesina, mensaje, fecha_inicio, fecha_termino, estado) VALUES ('".$id_marquesina."','".$frm_titulo."','".fecha_formato_base($frm_fecha_inicio)."','".fecha_formato_base($frm_fecha_termino)."','".$estado."')";		
		
	$result_video =mysql_query($sql_video);
					
	header("Location: frm_marquesina.php?id=$id_marquesina&tipo=Editar");
}

if($update=="Aceptar Cambios Destacado")
{
    
	$sql_video="UPDATE marquesina SET mensaje='".$frm_titulo."', fecha_inicio='".fecha_formato_base($frm_fecha_inicio)."', fecha_termino='".fecha_formato_base($frm_fecha_termino)."', estado='".$estado."' WHERE id_marquesina='".$id_marquesina."'";		
		
	$result_video =mysql_query($sql_video);
	
	header("Location: frm_marquesina.php?id=$id_marquesina&tipo=Editar");
}

if($Submit4=="Eliminar")
{
	$str_act = "DELETE FROM marquesina WHERE id_marquesina= '".$id_marquesina."'"; 
    $result_act=mysql_query($str_act);
	
	header("Location: frm_marquesina.php");
}

?>
