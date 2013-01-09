<?

include("../../../funciones/conexion_gore_banco.php");
include("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id;
global $nom,$nom2,$id_cambio,$estado,$ac_cambios,$id_sub,$id_m;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 
session_start();
if($nom2==1)
{
	$sql = "SELECT MAX(id_etapa) as maximo from etapa";
		$result = mysql_query($sql);
		while($rows=mysql_fetch_array($result))
		{
			$id = $rows["maximo"] + 1;
		}  	  			  
	$eta_sql="INSERT INTO `etapa` (`id_etapa`, `estado`, `nom_etapa`) VALUES ('".$id."','".$estado."', '".strtolower($nom)."')";
	$exec1=mysql_query($eta_sql);

	include("../../../funciones/bitacora.php");
	
	acciones('0',' Etapa de Banco de Proyectos',$id_m,$idusername,$id_sub);
	  
	header("Location: frm_mantenedor_bp2.php?id=$id&tipo=Editar&ingr=1&id_sub=$id_sub&id_m=$id_m");
}
if ($ac_cambios==1)
{
	$up1="UPDATE `etapa` SET `estado`='".$estado."', `nom_etapa`='".strtolower($nom)."' WHERE `id_etapa`='".$id_cambio."'";
	$Uexec=mysql_query($up1);
	include("../../../funciones/bitacora.php");
	
	acciones('3',' Etapa de Banco de Proyectos',$id_m,$idusername,$id_sub);
	
	header("Location: frm_mantenedor_bp2.php?id=$id_cambio&tipo=Editar&ingr=1&id_sub=$id_sub&id_m=$id_m");
}


if ($nom2==2)
{
		$sql = "SELECT MAX(id_financiamiento) as maximo from financiamiento";
		$result = mysql_query($sql);
		while($rows=mysql_fetch_array($result))
		{
			$id = $rows["maximo"] + 1;
		}  
	$tp_fin="INSERT INTO `financiamiento` (`id_financiamiento`, `estado`, `nom_financiamiento`)";
	$tp_fin.="VALUES ('".$id."', '".$estado."', '".strtolower($nom)."')";
	$ex_tp=mysql_query($tp_fin);

	include("../../../funciones/bitacora.php");
	
	acciones('0',' Tipos de Financiamiento de Banco de Proyectos',$id_m,$idusername,$id_sub);
	
	header("Location: frm_mantenedor_bp2.php?id=$id&tipo=Editar&ingr=2&id_sub=$id_sub&id_m=$id_m");
}
if ($ac_cambios==2)
{
	$up2="UPDATE `financiamiento` SET `estado`='".$estado."', `nom_financiamiento`='".strtolower($nom)."' WHERE `id_financiamiento`='".$id_cambio."'";
	$U2exec=mysql_query($up2);
	
	include("../../../funciones/bitacora.php");

	acciones('3',' Tipos de Financiamiento de Banco de Proyectos',$id_m,$idusername,$id_sub);		
	header("Location: frm_mantenedor_bp2.php?id=$id_cambio&tipo=Editar&ingr=2&id_sub=$id_sub&id_m=$id_m");
}

if($nom2==3)
{
		$sql = "SELECT MAX(id_tipo) as maximo from tipo";
		$result = mysql_query($sql);
		while($rows=mysql_fetch_array($result))
		{
			$id = $rows["maximo"] + 1;
		}  
		$sql3="INSERT INTO `tipo` (`id_tipo`, `estado`, `nom_tipo`) VALUES ('".$id."', '".$estado."', '".strtolower($nom)."')";
		$result3=mysql_query($sql3);
	include("../../../funciones/bitacora.php");
	
	acciones('0',' Tipos de Banco de Proyectos',$id_m,$idusername,$id_sub);	
		header("Location: frm_mantenedor_bp2.php?id=$id&tipo=Editar&ingr=3&id_sub=$id_sub&id_m=$id_m");
}
if($ac_cambios==3)
{
	$up3="UPDATE `tipo` SET `estado`='".$estado."', `nom_tipo`='".strtolower($nom)."' WHERE `id_tipo`='".$id_cambio."'";
	$resultUp=mysql_query($up3);
	include("../../../funciones/bitacora.php");
	
	acciones('3',' Tipos de Banco de Proyectos',$id_m,$idusername,$id_sub);
	header("Location: frm_mantenedor_bp2.php?id=$id_cambio&tipo=Editar&ingr=3&id_sub=$id_sub&id_m=$id_m");
}

if($nom2==4)
{
		$sql = "SELECT MAX(id_sector) as maximo from sector";
		$result = mysql_query($sql);
		while($rows=mysql_fetch_array($result))
		{
			$id = $rows["maximo"] + 1;
		} 
		$sql4="INSERT INTO `sector` (`id_sector`, `estado`, `nom_sector`) VALUES ('".$id."', '".$estado."', '".strtolower($nom)."')"; 
		$result4=mysql_query($sql4);
	include("../../../funciones/bitacora.php");
	
	acciones('0',' Sector de Banco de Proyectos',$id_m,$idusername,$id_sub);
		
		header("Location: frm_mantenedor_bp2.php?id=$id&tipo=Editar&ingr=4&id_sub=$id_sub&id_m=$id_m");
}
if($ac_cambios==4)
{
	$up4="UPDATE `sector` SET `estado`='".$estado."', `nom_sector`='".strtolower($nom)."' WHERE `id_sector`='".$id_cambio."'";
	$resultUp4=mysql_query($up4);
	include("../../../funciones/bitacora.php");
	
	acciones('3',' Sector de Banco de Proyectos',$id_m,$idusername,$id_sub);	
	header("Location: frm_mantenedor_bp2.php?id=$id_cambio&tipo=Editar&ingr=4&id_sub=$id_sub&id_m=$id_m");
}

if($nom2==5)
{
		$sql = "SELECT MAX(id_sector) as maximo from sector";
		$result = mysql_query($sql);
		while($rows=mysql_fetch_array($result))
		{
			$id = $rows["maximo"] + 1;
		} 
		$sql5="INSERT INTO `unidad_tecnica` (`id_unidad`, `estado`, `nom_unidad`) VALUES ('".$id."', '".$estado."', '".strtolower($nom)."')";
		$result5=mysql_query($sql5);
	include("../../../funciones/bitacora.php");
	
	acciones('0',' Unidad Tecnica de Banco de Proyectos',$id_m,$idusername,$id_sub);
		
		header("Location: frm_mantenedor_bp2.php?id=$id&tipo=Editar&ingr=5&id_sub=$id_sub&id_m=$id_m");
}
if($ac_cambios==5)
{
	$up5="UPDATE `unidad_tecnica` SET `estado`='".$estado."', `nom_unidad`='".strtolower($nom)."' WHERE `id_unidad`='".$id_cambio."'";
	$resultUp5=mysql_query($up5);
	include("../../../funciones/bitacora.php");
	
	acciones('3',' Unidad Tecnica de Banco de Proyectos',$id_m,$idusername,$id_sub);
		
	header("Location: frm_mantenedor_bp2.php?id=$id_cambio&tipo=Editar&ingr=5&id_sub=$id_sub&id_m=$id_m");
}

?>

