<?
include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");
include ("../../../funciones/setup.php");

global $Submit4,$Submit3,$file_foto1,$titulo,$colorfondo,$colortexto,$colorlink,$id_usu,$foto,$op,$id_img,$id,$titulo,$fuente,$bajada,$contenido,$nombre_archivo1,$nombre_archivo2,$fecha,$fecha_hoy,$hora,$tipo,$estado_not,$principal,$nombre_audio,$frm_descripcion_audio,$frm_titulo_audio,$id_gal,$id_not,$editar_imagen,$noticia,$f_estado;
global $eliminar_foto1,$eliminar_foto2,$tipo_noticia,$file_audio,$file_foto2,$file_foto1,$tipo_op,$descripcioncorta,$descripcion,$estado,$frm_audio,$foto_principal,$id_m,$id_m2;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();

include("../../../funciones/bitacora.php");
$dia=date("d");
$mes=date("m");
$ano=date("Y");

$fecha_foto=$dia."-".$mes."-".$ano;

$dir_img="pro_".$id_pro;
$filedir = '../../../imagenes/proyectos/'.$dir_img;


	if ($editar_imagen=="cancelar")
	{
	   header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&id_m=$id_m&id_sub=$id_sub");
	}
	
	if ($editar_imagen==1)
	{
	   $str_act = "UPDATE galeria_fotografica SET descripcion='".$frm_piefoto1."', foto_principal='".$foto_principal."' WHERE id_galeria=".$id_imagen; 
	   $result_act=mysql_query($str_act);
	
		
	acciones('3',' Imagen de Banco de Proyectos',$id_m,$idusername,$id_sub);   
	
	   header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&id_gal=$id_imagen&op=2&id_m=$id_m&id_sub=$id_sub");
	}
	
	if ($eliminar_foto1==1)
	{
	   $qry_galeria="select nom_archivo from galeria_fotografica WHERE id_galeria=".$id_gal;
	   $result_galeria=mysql_query($qry_galeria); 
	   $row_galeria=mysql_fetch_array($result_galeria);
	   
	   $imagen=$row_galeria['nom_archivo'];
	   
	   unlink($filedir.'/'.$imagen); 
	
	   $str_act = "DELETE FROM galeria_fotografica WHERE id_galeria=".$id_gal; 
	   $result_act=mysql_query($str_act);
	   
 
	
	acciones('2',' Imagen de Banco de Proyectos',$id_m,$idusername,$id_sub);
	   header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&id_m=$id_m&id_sub=$id_sub");
	}
	else
	{
	
	
	$size = 800; // the thumbnail height
	
	if(!is_dir($filedir))
	{ 
		 mkdir($filedir, 0777); 
	}

	$filedir = '../../../imagenes/proyectos/'.$dir_img.'/'; // the directory for the original image
	$thumbdir = '../../../imagenes/proyectos/'.$dir_img.'/'; // the directory for the thumbnail image
	$prefix =  'proyectos'; // the prefix to be added to the original name
	
	$maxfile = '2000000';
	$mode = '0666';
			   
	$userfile_name = $HTTP_POST_FILES['file_foto1']['name'];
	$userfile_tmp = $HTTP_POST_FILES['file_foto1']['tmp_name'];
	$userfile_size = $HTTP_POST_FILES['file_foto1']['size'];
	$userfile_type = $HTTP_POST_FILES['file_foto1']['type'];
	
	$userfile_name=limpiar_acentos(strtolower(str_replace(" ","_",$userfile_name)));
	
	$nombre_foto=$prefix."_".$fecha_foto."_".$userfile_name;
	$nombre_foto_full="full_".$prefix."_".$fecha_foto."_".$userfile_name;
			  
	if (isset($HTTP_POST_FILES['file_foto1']['name'])) 
	{
				   
				   $prod_img = $filedir.$nombre_foto;
				   $prod_img_thumb = $thumbdir.$nombre_foto;
				   
				   move_uploaded_file($userfile_tmp, $prod_img);        
				   
				   chmod ($prod_img, octdec($mode));
						  
				   $sizes = getimagesize($prod_img);
	
				   $aspect_ratio = $sizes[0]/$sizes[1]; 
						   
				   $new_width = $size;
				   $new_height = abs($new_width/$aspect_ratio);
									   
				   $destimg=ImageCreateTrueColor($new_width,$new_height)
						 or die('Problemas con el Tamaño de la Imagen');
				   $srcimg=ImageCreateFromJPEG($prod_img)
						 or die('Problema para Abrir Redimecionar el Tamaño de la Imagen');
				   if(function_exists('imagecopyresampled'))
				   {
						  imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
						  or die('Problemas para Redimencionar');
				   }
				   else
				   {
						  imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,ImageSX($srcimg),ImageSY($srcimg))
						  or die('Problemas para Redimencionar');
				   }
				   
				   ImageJPEG($destimg,$prod_img_thumb,90)
							 or die('Problemas para Guardar la Imagen');
				   imagedestroy($destimg);
				   
	}
	
	$sql_max = "SELECT MAX(id_galeria) as maximo from galeria_fotografica";
	$result_max = mysql_query($sql_max);
	while($row_max=mysql_fetch_array($result_max))
	{
		$id = $row_max["maximo"] + 1;
	}  	  
	
	$str_graba = "INSERT INTO `galeria_fotografica` (`id_galeria`, `nom_fotografia`, `nom_archivo`, `descripcion`, `fecha`, `foto_principal`, `id_proyecto`) VALUES";
	$str_graba.= "('".$id."','".$userfile_name."','".$nombre_foto."','".$frm_piefoto1."','".fecha_formato_base($fecha_foto)."','".$foto_principal."','".$id_pro."')";
	
	$result_graba=mysql_query($str_graba);
	

	
	acciones('0',' Imagen en Banco de Proyectos',$id_m,$idusername,$id_sub);		
	header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&id_m=$id_m&id_sub=$id_sub");
	
	}










?>