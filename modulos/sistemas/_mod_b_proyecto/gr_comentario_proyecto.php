<?
include ("../../../funciones/conexion_comunicaciones.php");
include ("../../../funciones/fechas.php");

global $Submit4,$Submit3,$file_foto1,$titulo,$colorfondo,$colortexto,$colorlink,$id_usu,$foto,$op,$id_img,$id,$titulo,$fuente,$bajada,$contenido,$nombre_archivo1,$fecha,$fecha_hoy,$hora,$tipo,$estado_not,$principal,$noticia;
global $eliminar_foto,$tipo_noticia,$file_foto2,$file_foto1,$tipo_op,$descripcioncorta,$descripcion,$estado,$id_m;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();

if ($Submit4=="Cancelar")
{   
	header("Location: comentarios_proyecto.php?tipo=Nueva&id_m=$id_m&id_sub=$id_sub");
	exit;
}


if ($Submit3=="Eliminar")
{   
	$str_act = "DELETE FROM comentarios_noticias WHERE id_comentario='".$id_not."'"; 
    $result_act=mysql_query($str_act);
	include("../../../funciones/bitacora.php");
	
	acciones('2',' Comentario Banco de Proyectos',$id_m,$idusername,$id_sub);
		
	header("Location: comentarios_proyecto.php?id_m=$id_m&id_sub=$id_sub");
}
else
{

	if ($tipo_noticia=="Editar")
	{
	  
		 $str_act = "UPDATE comentarios_noticias SET comentario= '".$frm_descripcion."', estado= '".$frm_estado."' WHERE id_comentario = '".$id_not."'"; 
		 $result_act=mysql_query($str_act);
	
	include("../../../funciones/bitacora.php");
	
	acciones('3',' Comentarios Banco de Proyectos',$id_m,$idusername,$id_sub);
	
	   header("Location: comentarios_proyecto.php?id=$id_not&tipo=Editar&id_m=$id_m&id_sub=$id_sub");
	}
}
?>