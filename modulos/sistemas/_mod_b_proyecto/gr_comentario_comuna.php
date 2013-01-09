<? 

include ("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");

global $idusername,$id_m,$id_sub,$comuna,$desc_comuna,$Submit,$Submit2,$Submit3,$id,$a_com,$el_com;


while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
} 

session_start();

if($a_com==1)
{
  $SQL1="UPDATE `comuna` SET `descripcion`='".$desc_comuna."' WHERE `id_comuna`='".$comuna."'";	
  $resultado=mysql_query($SQL1);
  include("../../../funciones/bitacora.php");
	
  acciones('0',' Comentario Provincia',$id_m,$idusername,$id_sub);
  header("Location: frm_comentario_comuna.php?id=$id&tipo=Editar&id_m=$id_m&id_sub=$id_sub&el_com=0");
}

if($el_com==1)
{
  $SQL="UPDATE `comuna` SET `descripcion`='' WHERE `id_comuna`='".$comuna."'";	
  $resultado=mysql_query($SQL);
  include("../../../funciones/bitacora.php");
	
  acciones('2',' Comentario Provincia',$id_m,$idusername,$id_sub);
  header("Location: frm_comentario_comuna.php?id=$id&tipo=Editar&id_m=$id_m&id_sub=$id_sub");
}
?>