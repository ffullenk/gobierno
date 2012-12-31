<?php
function estaActivo($usuario, $clave )
{      
if(isset($usuario)==false){
$usuario="user";}
if(isset($clave)==false){
$clave="pass";}

$query = "SELECT ESTADOENCARGADO  
		  FROM tb_encargados
		  WHERE CUENTA='" . $usuario ."' AND 
				CLAVE = '".encrypt($clave,0)."';";
$rsQ = mysql_query($query);
//el usuario no esta registrado
if(mysql_num_rows($rsQ) == 0 )
	 {return 0;}
else {
		$puntero = mysql_fetch_array($rsQ);
		if($puntero['ESTADOENCARGADO']=="D")
		{return -1;}
		else return 1;}     	  
}


function esUsuario ($usuario, $clave )
{
   if(isset($usuario)==false){
     $usuario="user";}
   if(isset($clave)==false){
     $clave="pass";}
  $query = "SELECT TIPOCUENTA  
		  FROM tb_encargados
		  WHERE CUENTA='" . $usuario ."' AND 
				CLAVE = '".encrypt($clave,0)."';";
$rsE = mysql_query($query);
  if(mysql_num_rows($rsE) == 0 ){return "";}
  else 
   {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['TIPOCUENTA'];
   }     
}


function cCobertura($usuario, $clave )
{
   if(isset($usuario)==false){
     $usuario="user";}
   if(isset($clave)==false){
     $clave="pass";}
  $query = "SELECT IDCOBERTURA  
		  FROM tb_encargados
		  WHERE CUENTA='" . $usuario ."' AND 
				CLAVE = '".encrypt($clave,0)."';";
$rsE = mysql_query($query);
  if(mysql_num_rows($rsE) == 0 ){return "";}
  else 
   {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['IDCOBERTURA'];
   }     
}


function cCargo($usuario, $clave )
{
   if(isset($usuario)==false){
     $usuario="user";}
   if(isset($clave)==false){
     $clave="pass";}
  $query = "SELECT IDCARGO  
		  FROM tb_encargados
		  WHERE CUENTA='" . $usuario ."' AND 
				CLAVE = '".encrypt($clave,0)."';";
$rsE = mysql_query($query);
  if(mysql_num_rows($rsE) == 0 ){return "";}
  else 
   {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['IDCARGO'];
   }     
}


function esEncargado ($usuario, $clave )
{
   if(isset($usuario)==false){
     $usuario="user";}
   if(isset($clave)==false){
     $clave="pass";}
  $query = "SELECT TIPOCUENTA  
		  FROM tb_encargados
		  WHERE CUENTA='" . $usuario ."' AND 
				CLAVE = '".encrypt($clave,0)."';";
$rsE = mysql_query($query);
  if(mysql_num_rows($rsE) == 0 ){return "";}
  else 
   {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['TIPOCUENTA'];
   }     
}

function idUsuario($usuario, $clave )
{
   if(isset($usuario)==false){
     $usuario="user";}
   if(isset($clave)==false){
     $clave="pass";}

  
  
  $query = "SELECT IDENCARGADO  
		  FROM tb_encargados
		  WHERE CUENTA='" . $usuario ."' AND 
				CLAVE = '".encrypt($clave,0)."';";
$rsE = mysql_query($query);
  if(mysql_num_rows($rsE) == 0 ){return "";}
  else 
   {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['IDENCARGADO'];
   }     
}


function NombreEncargado($nombreencargado )
{
   $query = "SELECT NOMBRE  
		  FROM tb_encargados
		  WHERE IDENCARGADO='" . $nombreencargado ."';";
   $rsE = mysql_query($query);
   if(mysql_num_rows($rsE) == 0 ){return "";}
   else {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['NOMBRE'];
   }     
}


function NombreZona($nombrezona )
{
   $query = "SELECT NOMBREZONA  
		  FROM tb_zonaejercicio
		  WHERE IDZONAEJERCICIO='" . $nombrezona ."';";
   $rsE = mysql_query($query);
   if(mysql_num_rows($rsE) == 0 ){return "";}
   else {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['NOMBREZONA'];
   }     
}

function NombreSubZona($nombresubzona )
{
   $query = "SELECT NOMBRESUBZONA  
		  FROM tb_subzonaejercicio
		  WHERE IDSUBZONAEJERCICIO='" . $nombresubzona ."';";
   $rsE = mysql_query($query);
   if(mysql_num_rows($rsE) == 0 ){return "";}
   else {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['NOMBRESUBZONA'];
   }     
}

function NombreEjercicio($nombreejercicio)
{
   $query = "SELECT NOMBREEJERCICIO  
		  FROM tb_ejercicios
		  WHERE IDEJERCICIO='" . $nombreejercicio ."';";
   $rsE = mysql_query($query);
   if(mysql_num_rows($rsE) == 0 ){return "";}
   else {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['NOMBREEJERCICIO'];
   }     
}


function NombreProvincia($nombreprovincia)
{
   $query = "SELECT provincia  
		  FROM provincia
		  WHERE idprovincia='" . $nombreprovincia ."';";
   $rsE = mysql_query($query);
   if(mysql_num_rows($rsE) == 0 ){return "";}
   else {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['provincia'];
   }     
}


function NombreComuna($nombrecomuna)
{
   $query = "SELECT comuna  
		  FROM comuna
		  WHERE idcomuna='" . $nombrecomuna ."';";
   $rsE = mysql_query($query);
   if(mysql_num_rows($rsE) == 0 ){return "";}
   else {
    $puntero = mysql_fetch_array($rsE);
	return $puntero['comuna'];
   }     
}


function TipoCargo($tipocargo )
{      
$query = "SELECT CARGO  
		  FROM tb_cargo
		  WHERE IDCARGO='" . $tipocargo ."' ;";
$rsQ = mysql_query($query);
//el usuario no esta registrado
if(mysql_num_rows($rsQ) == 0 )
	 {return 0;}
else {
	$puntero = mysql_fetch_array($rsQ);
	return $puntero['CARGO'];
}
}



function TipoCobertura($tipocobertura )
{      
$query = "SELECT COBERTURA  
		  FROM tb_cobertura
		  WHERE IDCOBERTURA='" . $tipocobertura ."' ;";
$rsQ = mysql_query($query);
//el usuario no esta registrado
if(mysql_num_rows($rsQ) == 0 )
	 {return 0;}
else {
	$puntero = mysql_fetch_array($rsQ);
	return $puntero['COBERTURA'];
}
}


function TipoOrganizador($tipoorganizador )
{      
$query = "SELECT ORGANIZADOR  
		  FROM tb_organizador
		  WHERE IDORGANIZADOR='" . $tipoorganizador ."' ;";
$rsQ = mysql_query($query);
//el usuario no esta registrado
if(mysql_num_rows($rsQ) == 0 )
	 {return 0;}
else {
	$puntero = mysql_fetch_array($rsQ);
	return $puntero['ORGANIZADOR'];
}
}



function TipoCuenta($tipocuenta )
{ 
if($tipocuenta=="S") { return "Administrador"; } else { return "Colaborador";}
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