<?
include ("../../../funciones/conexion_bd.php");
include ("../../../funciones/fechas.php");

global $frm_tipo_agenda,$frm_fecha,$frm_hora_inicio,$frm_hora_final,$frm_descripcion,$frm_lugar,$frm_comuna;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
}
conecta_agendas();


$str_graba_act = "INSERT INTO actividades (id_actividad, id_tipo_agenda, fecha_actividad, hora_inicio, hora_final, descripcion, lugar, comuna) VALUES ";
$str_graba_act.= "('".$id_actividad."','".$frm_tipo_agenda."','".fecha_formato_base($frm_fecha)."','".$frm_hora_inicio."','".$frm_hora_final."','".$frm_descripcion."','".$frm_lugar."','".$frm_comuna."')";

echo $str_graba_act;
//$result_graba=mysql_query($str_graba_act);
?>