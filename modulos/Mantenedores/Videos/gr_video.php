<? 
include ("../../../funciones/conexion_comunicaciones.php");
include ("../../../funciones/fechas.php");

global  $usernameadmin,$Submit1,$Submit1AV,$Submit2,$Submit3,$Submit4,$frm_titulo,$id_user,$file_video,$file_doc,$id_not,$frm_fecha,$arch_vid,$sistema;

$hora = date ("h:i:s");

$vacio = " ";

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();
if($Submit1AV=="Agregar Otro Video"){
	header("Location: frm_video.php");

}

if($Submit2=="Cancelar"){

	header("Location: frm_video.php");
	exit;
}
$nombre_video1 = $HTTP_POST_FILES['file_video']['name'];
$tipo_video1 = $HTTP_POST_FILES['file_video']['type'];
$tamano_video1 = $HTTP_POST_FILES['file_video']['size'];

$nombre_archivo1 = $HTTP_POST_FILES['file_doc']['name'];
$tipo_archivo1 = $HTTP_POST_FILES['file_doc']['type'];
$tamano_archivo1 = $HTTP_POST_FILES['file_doc']['size'];

	$sql_max = "SELECT MAX(id_auditar) as maximo from auditar";

                  $result_max = mysql_query($sql_max);

                  while($row_max=mysql_fetch_array($result_max))

                  {

                               $id_aud = $row_max["maximo"] + 1;

                  }
				  

if($Submit1=="Agregar Video"){
 		if($frm_titulo==""){ header("Location: frm_video.php?campo_blanco=1");}
		else{ 
		    $sql_max = "SELECT MAX(id_vid_senal) as maximo from video_senal";
        	$result_max = mysql_query($sql_max);
            while($row_max=mysql_fetch_array($result_max)){ $id_vi = $row_max["maximo"] + 1;}
		
		if (!((strpos($tipo_video1, "x-flv") || strpos($tipo_archivo1, "doc") || strpos($tipo_archivo1, "pdf"))) && ($tamano_video1 < 300000000) && ($tamano_archivo1 < 300000000)) { header("Location: frm_video.php?error_flv=1&a=$tipo_archivo1");
		}
		else{
$sql_video="INSERT INTO  video_senal  (id_vid_senal,fecha_vid_senal,titulo_vid_senal,direccion_vid_senal,archivo_doc,id_usuario) values ('".$id_vi."','".fecha_formato_base($frm_fecha)."','".$frm_titulo."','".$nombre_video1."','".$nombre_archivo1."','".$id_user."')";		
		
		$result_video =mysql_query($sql_video);
		$nombre_carpeta = fecha_formato_base($frm_fecha);

		if(!is_dir("../../../videos/".$nombre_carpeta)){
			mkdir("../../../videos/".$nombre_carpeta);
			move_uploaded_file($HTTP_POST_FILES['file_video']['tmp_name'], "../../../videos/".$nombre_carpeta."/".$id_vi.".flv");
			if($tipo_archivo1=="application/msword"){
			move_uploaded_file($HTTP_POST_FILES['file_doc']['tmp_name'], "../../../videos/".$nombre_carpeta."/".$id_vi.".doc");
			}
			if($tipo_archivo1 == "application/pdf"){
			move_uploaded_file($HTTP_POST_FILES['file_doc']['tmp_name'], "../../../videos/".$nombre_carpeta."/".$id_vi.".pdf");
			}
			}else{
			 move_uploaded_file($HTTP_POST_FILES['file_video']['tmp_name'],"../../../videos/".$nombre_carpeta."/".$id_vi.".flv");
		 	if($tipo_archivo1=="application/msword"){
			move_uploaded_file($HTTP_POST_FILES['file_doc']['tmp_name'], "../../../videos/".$nombre_carpeta."/".$id_vi.".doc");
			}
			if($tipo_archivo1 == "application/pdf"){
			move_uploaded_file($HTTP_POST_FILES['file_doc']['tmp_name'], "../../../videos/".$nombre_carpeta."/".$id_vi.".pdf");
			}
 //        move_uploaded_file($HTTP_POST_FILES['file_doc']['tmp_name'], "../../../videos/".$nombre_carpeta."/".$id_vi.".doc");
				 }
	
		 
		$actividad = "Agrego Video";
		$sql="insert into auditar (id_auditar,fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada) values ('".$id_aud."','".fecha_formato_base($frm_fecha)."','".$hora."','".fecha_formato_base($frm_fecha).$vacio.$hora."','".$id_user."','".$sistema."','".$actividad."')";
	$result = mysql_query($sql);
					
		header("Location: frm_video.php?id=$id_vi&tipo=Editar&p=$tipo_archivo1");
		}
	}
}
if($Submit4=="Eliminar"){
	$str_act = "DELETE FROM video_senal WHERE id_vid_senal= '".$id_not."'"; 
    $result_act=mysql_query($str_act);
	$nombre_carpeta =  fecha_formato_base($frm_fecha);
	$carpeta="../../../videos/".$nombre_carpeta."/";
	$video = $carpeta.$id_not.".flv";
	$doc = $carpeta.$id_not.".doc";
	$pdf = $carpeta.$id_not.".pdf";
	
	if( (file_exists($video)) && (file_exists($doc)) ){
	unlink($video); 
	unlink($doc);
		}
	if((file_exists($video)) && (file_exists($pdf)) ){
		unlink($video); 
		unlink($pdf);	
		}
		
	$actividad = "Elimino Video";
	$sql="insert into auditar (id_auditar,fecha_ingreso,hora_ingreso,ultima_modificacion,id_usuario,id_sistema,accion_realizada) values ('".$id_aud."','".fecha_formato_base($frm_fecha)."','".$hora."','".fecha_formato_base($frm_fecha).$vacio.$hora."','".$id_user."','".$sistema."','".$actividad."')";
	$result = mysql_query($sql);


	header("Location: frm_video.php");
}

?>
