<?
include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");
include ("../../../funciones/setup.php");

global $Submit4,$Submit3,$file_foto1,$titulo,$colorfondo,$colortexto,$colorlink,$id_usu,$foto,$op,$id_img,$id,$titulo,$fuente,$bajada,$contenido,$nombre_archivo1,$nombre_archivo2,$fecha,$fecha_hoy,$hora,$tipo,$estado_not,$principal,$nombre_video,$frm_descripcion_video,$frm_titulo_video,$eliminar_video,$id_gal,$id_pro;
global $eliminar_foto1,$eliminar_foto2,$tipo_noticia,$file_audio,$file_foto2,$file_foto1,$tipo_op,$descripcioncorta,$descripcion,$estado,$frm_audio,$noticia;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();
include("../../../funciones/bitacora.php");
if ($eliminar_video==1)
{
  
       $str_act = "DELETE FROM galeria_video WHERE id_video=".$id_gal;
	   $result_act=mysql_query($str_act);
	   acciones('2',' Video de Banco de Proyecto',$id_m,$idusername,$id_sub);
	   header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&id_m=$id_m&id_sub=$id_sub");
	   exit;
  
}


	$directorio=$id_pro."_pro_video";
	$ruta="../../../archivos/videos/".$directorio."/";
	
	$nombre_video=limpiar_acentos(strtolower(str_replace(" ","_",$nombre_video)));
	
	$nombre_video = $HTTP_POST_FILES['file_video']['name'];
	
	if(!is_dir($ruta))
	{    
		$nombre="video";
		mkdir($ruta,0777); 
		$path="../../../archivos/videos/".$directorio."/";
		
		move_uploaded_file($HTTP_POST_FILES['file_video']['tmp_name'], "../../../archivos/videos/".$directorio."/".$nombre_video);
		
		$origen="../../../archivos/expressInstall.swf";
		$destino="../../../archivos/videos/".$directorio."/expressInstall.swf";
		$origen1="../../../archivos/yt.swf";
		$destino1="../../../archivos/videos/".$directorio."/yt.swf";
		$origen2="../../../archivos/player.swf";
		$destino2="../../../archivos/videos/".$directorio."/player.swf";
		$origen3="../../../archivos/swfobject.js";
		$destino3="../../../archivos/videos/".$directorio."/swfobject.js";
		$origen4="../../../archivos/reproductor_video.php";
		$destino4="../../../archivos/videos/".$directorio."/reproductor_video.php";
		
		copy($origen, $destino);
		copy($origen1, $destino1);
		copy($origen2, $destino2);
		copy($origen2, $destino3);
		copy($origen4, $destino4);
		
		$sql_dcto = "SELECT MAX(id_video) as maximo from galeria_video";
		$result_dcto = mysql_query($sql_dcto);
		while($row_dcto=mysql_fetch_array($result_dcto))
		{
			$id = $row_dcto["maximo"] + 1;
		}  	  
		
		$str_act = "INSERT INTO `galeria_video` (`id_video`, `nom_archivo`, `descripcion`, `id_proyecto`) VALUES "; 
		$str_act.=  "('".$id."','".$nombre_video."','".$frm_descripcion_video."','".$id_pro."')";
		$result_act=mysql_query($str_act);
		
		
		 acciones('0',' Video de Banco de Proyecto',$id_m,$idusername,$id_sub);
		header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&id_m=$id_m&id_sub=$id_sub");
	}
	else
	{
		
		$nombre="video";
		$path="../../../archivos/video/".$directorio."/";
		
		move_uploaded_file($HTTP_POST_FILES['file_video']['tmp_name'], "../../../archivos/videos/".$directorio."/".$nombre_video);
		
		$origen="../../../archivos/expressInstall.swf";
		$destino="../../../archivos/videos/".$directorio."/expressInstall.swf";
		$origen1="../../../archivos/yt.swf";
		$destino1="../../../archivos/videos/".$directorio."/yt.swf";
		$origen2="../../../archivos/player.swf";
		$destino2="../../../archivos/videos/".$directorio."/player.swf";
		$origen3="../../../archivos/swfobject.js";
		$destino3="../../../archivos/videos/".$directorio."/swfobject.js";
		$origen4="../../../archivos/reproductor_video.php";
		$destino4="../../../archivos/videos/".$directorio."/reproductor_video.php";
		
		copy($origen, $destino);
		copy($origen1, $destino1);
		copy($origen2, $destino2);
		copy($origen2, $destino3);
		copy($origen4, $destino4);

		$sql_dcto = "SELECT MAX(id_video) as maximo from galeria_video";
		$result_dcto = mysql_query($sql_dcto);
		while($row_dcto=mysql_fetch_array($result_dcto))
		{
			$id = $row_dcto["maximo"] + 1;
		} 
		
		$str_act = "INSERT INTO `galeria_video` (`id_video`, `nom_archivo`, `descripcion`, `id_proyecto`) VALUES "; 
		$str_act.=  "('".$id."','".$nombre_video."','".$frm_descripcion_video."','".$id_pro."')";
		
		$result_act=mysql_query($str_act);
		acciones('0',' Video de Banco de Proyecto',$id_m,$idusername,$id_sub);
		header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&id_m=$id_m&id_sub=$id_sub");	 
	}

?>