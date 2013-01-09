<?
include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");
include("../../../funciones/setup.php");

global $Submit4,$Submit3,$file_foto1,$titulo,$colorfondo,$colortexto,$colorlink,$id_usu,$foto,$op,$id_img,$id,$titulo,$fuente,$bajada,$contenido,$nombre_archivo1,$nombre_archivo2,$fecha_i,$fecha_hoy,$hora,$tipo,$estado_not,$principal,$nombre_audio,$frm_descripcion_audio,$frm_titulo_audio,$embed,$eliminar_embed,$ingresa,$g_maps,$nuevo_ingresar,$Eliminar;
global $codigobip,$nom,$s_tipo,$s_pro,$s_com,$s_etapa,$s_sector,$s_tecnica,$costoT,$costoFNDR,$descripcion,$s_provicion,$g_maps,$go_maps;
global $eliminar_foto1,$eliminar_foto2,$tipo_noticia,$file_audio,$file_foto2,$file_foto1,$tipo_op,$descripcioncorta,$descripcion,$estado,$frm_audio,$frm_idfuente,$frm_principal,$id_m2,$b_hombres,$b_mujeres;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();

if ($Eliminar==	1)
{   
	
    $str_act = "DELETE FROM galeria_fotografica WHERE id=".$id_pro; 
    $result_act=mysql_query($str_act);
	
    $str_act= "DELETE FROM galeria_video WHERE id_proyecto=".$id_pro; 
    $result_act=mysql_query($str_act);
	
	$str_act= "DELETE FROM documentos_proyecto WHERE id_proyecto=".$id_pro; 
    $result_act=mysql_query($str_act);
	
	$str_act = "DELETE FROM proyectos WHERE id=".$id_pro; 
    $result_act=mysql_query($str_act);
		
	$fecha=date("d-m-Y"); ;

	/*			$buffer='<?xml version="1.0" encoding="ISO-8859-1"?>';
				$buffer.='
				<rss version="2.0">
				<channel>
				<title>Gobierno Regional de Coquimbo - Noticias</title>
				<link>http://www.gorecoquimbo.cl/rss/rss.xml</link>
				<description>Gobierno Regional de Coquimbo - Noticias.</description>
				<language>en-us</language>
				<pubDate>'.rss().'</pubDate>
				<lastBuildDate>'.rss().'</lastBuildDate>
				<generator>Sección Informática</generator>
				<webMaster>webmaster@gorecoquimbo.cl</webMaster>
				<image> 
				<url>http://www.gorecoquimbo.cl/favicon.ico</url> 
				<title>Gobierno Regional de Coquimbo</title> 
				<link>http://www.gorecoquimbo.cl</link> 
				</image>';
				
				$sql_rss="select * from proyecto  ORDER BY FECHA DESC limit 0,10";  
				$result_rss=mysql_query($sql_rss);	  
				while($row_rss=mysql_fetch_array($result_rss))
				{ 
				   $titulo=$row_rss['titulo'];
				   $link='http://www.gorecoquimbo.cl/gore_noticias_vista.php?';
				   $id_rss=$row_rss['id'];
				   $buffer.='
					<item>
					   <title><![CDATA['.$titulo.']]></title>
					   <link><![CDATA['.$link.'id_not='.$id_rss.'&amp;noticia=1]]></link>
					   <description><![CDATA['.$row_rss['cuerpo'].']]></description>
					   <pubDate>'.convertir_rss($row_rss['fecha']).'</pubDate>
					   <guid isPermaLink="true"><![CDATA['.$link.'id_not='.$id_rss.'&amp;noticia=1]]></guid>
					 </item>';
				 }
				$buffer.='
				</channel>
				</rss>';
			  $file=fopen("../rss/rss.xml","w+"); 
			  fwrite ($file,$buffer); 
			  fclose($file);  
	
	*/
	include("../../../funciones/bitacora.php");
	
	acciones('2',' Banco de Proyectos',$id_m2,$idusername,$id_sub);
	header("Location: frm_proyectos.php?id_m=$id_m2&id_sub=$id_sub");
}


if ($nuevo_ingresar==1){
    
			  $sql_max = "SELECT MAX(id) as maximo from proyectos ";
			  $result_max = mysql_query($sql_max);
			  while($row_max=mysql_fetch_array($result_max))
			  {
				$id = $row_max["maximo"] + 1;
			  }  	  
			   $sq_com="SELECT * FROM comuna where id_comuna='".$s_com."'";
			   $restulcom=mysql_query($sq_com);
			   $rowCM=mysql_fetch_array($restulcom);
			   
$str_graba="INSERT INTO `proyectos` (`id`, `codigo_bip`, `id_etapa`, `nombre`, `id_tipo`, `id_Provincia`, `id_comuna`, `id_Sector`,  `id_provision`, `fecha_inicio`, `costo_total`, `costo_fndr`,`descripcion`,`cod_maps`,`b_hombres`,`b_mujeres`) VALUES"; 		  
			
$str_graba.= "('".$id."','".limpiar_acentos(strtolower($codigobip))."','".$s_etapa."','".$nom."','".$s_tipo."','".$rowCM['id_provincia']."','".$s_com."','".$s_sector."','".$s_provicion."','".fecha_formato_base($fecha_i)."','".$costoT."','".$costoFNDR."','".$descripcion."','".$g_maps."','".$b_hombres."','".$b_mujeres."')";


$result_graba=mysql_query($str_graba);
			  
/*			    $fecha=date("d-m-Y"); ;

				$buffer='<?xml version="1.0" encoding="ISO-8859-1"?>';
				$buffer.='
				<rss version="2.0">
				<channel>
				<title>Gobierno Regional de Coquimbo - Noticias</title>
				<link>http://www.gorecoquimbo.cl/rss/rss.xml</link>
				<description>Gobierno Regional de Coquimbo - Noticias.</description>
				<language>en-us</language>
				<pubDate>'.rss().'</pubDate>
				<lastBuildDate>'.rss().'</lastBuildDate>
				<generator>Sección Informática</generator>
				<webMaster>webmaster@gorecoquimbo.cl</webMaster>
				<image> 
				<url>http://www.gorecoquimbo.cl/favicon.ico</url> 
				<title>Gobierno Regional de Coquimbo</title> 
				<link>http://www.gorecoquimbo.cl</link> 
				</image>';
				
				$sql_rss="select * from noticia WHERE dstc=1 ORDER BY FECHA DESC limit 0,10";  
				$result_rss=mysql_query($sql_rss);	  
				while($row_rss=mysql_fetch_array($result_rss))
				{ 
				   $titulo=$row_rss['titulo'];
				   $link='http://www.gorecoquimbo.cl/gore_noticias_vista.php?';
				   $id_rss=$row_rss['id'];
				   $buffer.='
					<item>
					   <title><![CDATA['.$titulo.']]></title>
					   <link><![CDATA['.$link.'id_not='.$id_rss.'&amp;noticia=1]]></link>
					   <description><![CDATA['.$row_rss['cuerpo'].']]></description>
					   <pubDate>'.convertir_rss($row_rss['fecha']).'</pubDate>
					   <guid isPermaLink="true"><![CDATA['.$link.'id_not='.$id_rss.'&amp;noticia=1]]></guid>
					 </item>';
				 }
				$buffer.='
				</channel>
				</rss>';
			  $file=fopen("../rss/rss.xml","w+"); 
			  fwrite ($file,$buffer); 
			  fclose($file);  */
			include("../../../funciones/bitacora.php");
	
			acciones('0',' Banco de Proyectos',$id_m2,$idusername,$id_sub);	  
			
			header("Location: frm_proyectos.php?id=$id&tipo=Editar&op=2&id_m=$id_m2&id_sub=$id_sub");
		}

if ($ac_cambios==1)
{

$sqlPRo="SELECT * FROM comuna where id_comuna='".$s_com."'"	;
$rePro=mysql_query($sqlPRo);
$rowspro=mysql_fetch_array($rePro);


$str_act="UPDATE `proyectos` SET `codigo_bip`='".limpiar_acentos(strtolower($codigobip))."', `id_etapa`='".$s_etapa."', `nombre`='".$nom."', `id_tipo`='".$s_tipo."', `id_Provincia`='".$rowspro['id_provincia']."', `id_comuna`='".$s_com."', `id_Sector`='".$s_sector."', `id_provision`='".$s_provicion."', `fecha_inicio`='".fecha_formato_base($fecha_i)."', `costo_total`='".$costoT."', `costo_fndr`='".$costoFNDR."', `descripcion`='".$descripcion."',`cod_maps`='".$g_maps."',`b_hombres`='".$b_hombres."',`b_mujeres`='".$b_mujeres."'  WHERE `id`='".$id_pro."'";
$result_act=mysql_query($str_act);
			
	/*		$fecha=date("d-m-Y"); ;

				$buffer='<?xml version="1.0" encoding="ISO-8859-1"?>';
				$buffer.='
				<rss version="2.0">
				<channel>
				<title>Gobierno Regional de Coquimbo - Noticias</title>
				<link>http://www.gorecoquimbo.cl/rss/rss.xml</link>
				<description>Gobierno Regional de Coquimbo - Noticias.</description>
				<language>en-us</language>
				<pubDate>'.rss().'</pubDate>
				<lastBuildDate>'.rss().'</lastBuildDate>
				<generator>Sección Informática</generator>
				<webMaster>webmaster@gorecoquimbo.cl</webMaster>
				<image> 
				<url>http://www.gorecoquimbo.cl/favicon.ico</url> 
				<title>Gobierno Regional de Coquimbo</title> 
				<link>http://www.gorecoquimbo.cl</link> 
				</image>';
				
				$sql_rss="select * from noticia WHERE dstc=1 ORDER BY FECHA DESC limit 0,10";  
				$result_rss=mysql_query($sql_rss);	  
				while($row_rss=mysql_fetch_array($result_rss))
				{ 
				   $titulo=$row_rss['titulo'];
				   $link='http://www.gorecoquimbo.cl/gore_noticias_vista.php?';
				   $id_rss=$row_rss['id'];
				   $buffer.='
					<item>
					   <title><![CDATA['.$titulo.']]></title>
					   <link><![CDATA['.$link.'id_not='.$id_rss.'&amp;noticia=1]]></link>
					   <description><![CDATA['.$row_rss['cuerpo'].']]></description>
					   <pubDate>'.convertir_rss($row_rss['fecha']).'</pubDate>
					   <guid isPermaLink="true"><![CDATA['.$link.'id_not='.$id_rss.'&amp;noticia=1]]></guid>
					 </item>';
				 }
				$buffer.='
				</channel>
				</rss>';
			  $file=fopen("../rss/rss.xml","w+"); 
			  fwrite ($file,$buffer); 
			  fclose($file);   
		*/	
		include("../../../funciones/bitacora.php");
	
		acciones('3',' Banco de Proyectos',$id_m2,$idusername,$id_sub); 
		
			header("Location: frm_proyectos.php?id=$id_pro&tipo=Editar&op=2&list=1&id_m=$id_m2&id_sub=$id_sub");
		}

?>