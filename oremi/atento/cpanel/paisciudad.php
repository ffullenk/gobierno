<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"regiones"=>"lista_regiones",
"provincias"=>"lista_provincias",
"comunas"=>"lista_comunas"
);

function pc_validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function pc_validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_string($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];
//echo "selectDestino: " . $selectDestino . " Opcion Seleccionada: ". $opcionSeleccionada . "<br />";
//&& validaOpcion($opcionSeleccionada)
if(pc_validaSelect($selectDestino) )
{
	$tabla=$listadoSelects[$selectDestino];
	//echo "Tabla: ". $tabla;
	include("incluir/seteaBD.php");
	$link = conectar();
	
	if($selectDestino=="provincias")
	{
	   $consulta=mysql_query("SELECT idprovincia, provincia FROM provincia WHERE region_idregion='$opcionSeleccionada' ORDER BY provincia") or die(mysql_error());
	} elseif($selectDestino=="comunas")
	{
	   $consulta=mysql_query("SELECT idcomuna, comuna FROM comuna WHERE provincia_idprovincia='$opcionSeleccionada' ORDER BY comuna") or die(mysql_error());
	}
	
	
	//desconectar();
	
	// Comienzo a imprimir el select
	echo "<select name='".$selectDestino."' id='".$selectDestino."' onChange='pc_cargaContenido(this.id)' class='validate-selection'>";
	echo "<option value='0'>Seleccione...</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		$registro[1]=htmlentities($registro[1]);
		// Imprimo las opciones del select
		echo "<option value=".$registro[0].">".$registro[1]."</option>";
	}			
	echo "</select>";
}
?>
