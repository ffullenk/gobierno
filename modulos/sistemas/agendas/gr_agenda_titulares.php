<?
include ("../../../funciones/conexion_bd.php");
include ("../../../funciones/fechas.php");

global $frm_tipo_agenda,$frm_fecha,$frm_titular1,$frm_titular2,$frm_titular3;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
}
conecta_agendas();

$str_graba_tit = "INSERT INTO titulares (id_tipo_agenda, fecha_titular, titular1, titular2, titular3) VALUES ";
$str_graba_tit.= "('".$frm_tipo_agenda."','".fecha_formato_base($frm_fecha)."','".$frm_titular1."','".$frm_titular2."','".$frm_titular3."')";

echo $str_graba_tit;
//$result_graba=mysql_query($str_graba_tit);
?>