<?php
function estaActivo($usuario, $clave )
{      
if(isset($usuario)==false){
$usuario="user";}
if(isset($clave)==false){
$clave="pass";}

$query = "SELECT estado  
		  FROM orm_usuarios
		  WHERE rut='" . $usuario ."' AND 
				clave = '".encrypt($clave,0)."';";
$rsQ = mysql_query($query);
//el usuario no esta registrado
if(mysql_num_rows($rsQ) == 0 )
	 {return 0;}
else {
		$puntero = mysql_fetch_array($rsQ);
		if($puntero['estado']=="D")
		{return -1;}
		else return 1;}     	  
}


function esUsuario ($usuario, $clave )
{
   if(isset($usuario)==false){
     $usuario="user";}
   if(isset($clave)==false){
     $clave="pass";}

  
  
  $query = "SELECT tipo  
		  FROM orm_usuarios
		  WHERE rut='" . $usuario ."' AND 
				clave = '".encrypt($clave,0)."';";
$rsE = mysql_query($query);
  if(mysql_num_rows($rsE) == 0 ){return "";}
  else 
   {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['tipo'];
   }     
}

function idUsuario($usuario, $clave )
{
   if(isset($usuario)==false){
     $usuario="user";}
   if(isset($clave)==false){
     $clave="pass";}

  
  
  $query = "SELECT USUA_ID  
		  FROM usuarios
		  WHERE USUA_CUENTA='" . $usuario ."' AND 
				USUA_CLAVE = '".encrypt($clave,0)."';";
$rsE = mysql_query($query);
  if(mysql_num_rows($rsE) == 0 ){return "";}
  else 
   {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['USUA_ID'];
   }     
}


function seleccionaRegion($region )
{
  $query = "SELECT id, campo1  
		  FROM regiones
		  WHERE codigo='REG';";
  $rsR = mysql_query($query);
  if(mysql_num_rows($rsR)>0) {
     echo "<select name=\"ciudad_region\" id=\"ciudad_region\" class=\"inputselect\" size=\"1\">";
	 while($puntero = mysql_fetch_array($rsR)) {
	   if($puntero['id']==$region) {
	      echo "<option value=\"".$puntero['id']."\" selected>".htmlentities(substr($puntero['campo1'],6))."</option>";
	   } else {
          echo "<option value=\"".$puntero['id']."\">".htmlentities(substr($puntero['campo1'],6))."</option>";
	   }
	 }
	 echo "</select>";
  }
}


// Selecciona Categorias
function seleccionaCategoria($categoria )
{
  $query = "SELECT CATE_ID, CATEGORIA  
		  FROM categoria;";
  $rsC = mysql_query($query);
  if(mysql_num_rows($rsC)>0) {
     echo "<select name=\"scate_cate\" id=\"scate_cate\" class=\"inputselect\" size=\"1\">";
	 if($categoria==0) {
	    echo "<option value=\"0\" selected>Seleccione una Categoria...</option>";
	 }
	 while($punteroC = mysql_fetch_array($rsC)) {
	   if($punteroC['id']==$categoria) {
	      echo "<option value=\"".$punteroC['CATE_ID']."\" selected>".htmlentities($punteroC['CATEGORIA'])."</option>";
	   } else {
          echo "<option value=\"".$punteroC['CATE_ID']."\">".htmlentities($punteroC['CATEGORIA'])."</option>";
	   }
	 }
	 echo "</select>";
  }
}

// Anade nueva Ciudad
function nuevaCiudad() {
   $sqlNC="SELECT Cast( id AS unsigned )+1 as nuevo FROM regiones ORDER BY Cast( id AS unsigned ) DESC limit 1";
   $rsNC=mysql_query($sqlNC);
   if($ptrNC=mysql_fetch_array($rsNC)){
      return $ptrNC['nuevo'];
   }

}

function convertir_fecha( $fFecha ) {
 $fecha = split("-", $fFecha );
return $fecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
}
?>