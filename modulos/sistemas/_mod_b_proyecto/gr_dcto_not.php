<?
include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");
include ("../../../funciones/setup.php");

global $Submit4,$Submit3,$file_foto1,$titulo,$colorfondo,$colortexto,$colorlink,$id_usu,$foto,$op,$id_img,$id,$titulo,$fuente,$bajada,$contenido,$nombre_archivo1,$nombre_archivo2,$fecha,$fecha_hoy,$hora,$tipo,$estado_not,$principal,$nombre_audio,$frm_descripcion_audio,$frm_titulo_audio,$eliminar_audio,$nombre_dcto,$file_dcto,$frm_descripcion_dcto,$eliminar,$id_doc,$nom_archivo,$noticia,$id_pro;
global $eliminar_foto1,$eliminar_foto2,$tipo_noticia,$file_audio,$file_foto2,$file_foto1,$tipo_op,$descripcioncorta,$descripcion,$estado,$frm_audio;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();
include("../../../funciones/bitacora.php");
if ($eliminar==1)
{

	 $str_graba = "DELETE FROM documentos_proyecto WHERE id_documento=".$id_doc;				  
	 $result_graba=mysql_query($str_graba);
	 
	 unlink("../../../documentos/proyectos/pro_".$id_pro."/".$nom_archivo);
	 acciones('2',' Documentos Banco de Proyecto',$id_m,$idusername,$id_sub);
     header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&id_m=$id_m&id_sub=$id_sub");
	 exit;


}
$nombre_dcto = $HTTP_POST_FILES['file_dcto']['name'];
$tipo_archivo_dcto = $HTTP_POST_FILES['file_dcto']['type'];
$tamano_archivo_dcto = $HTTP_POST_FILES['file_dcto']['size'];



    $dir_img="pro_".$id_pro;
	$filedir = '../../../documentos/proyectos/'.$dir_img;
	
	if(!is_dir($filedir))
	{ 
		 mkdir($filedir, 0777); 
	}


		$nombre_dcto="documento_".$nombre_dcto;
		$sql_dcto = "SELECT MAX(id_documento) as maximo from documentos_proyecto";
		$result_dcto = mysql_query($sql_dcto);
		while($row_dcto=mysql_fetch_array($result_dcto))
		{
			$id = $row_dcto["maximo"] + 1;
		}  	  			  
		$str_graba = "INSERT INTO `documentos_proyecto` (`id_documento`, `id_proyecto`, `nom_archivo`, `descripcion`) VALUES ";
		$str_graba.= "('".$id."','".$id_pro."','".$nombre_dcto."','".$frm_descripcion_dcto."')";
					  
		$result_graba=mysql_query($str_graba);
		
		move_uploaded_file($HTTP_POST_FILES['file_dcto']['tmp_name'], $filedir."/".$nombre_dcto);
		acciones('0',' Documentos Banco de Proyecto',$id_m,$idusername,$id_sub);
		header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&id_m=$id_m&id_sub=$id_sub");


?>