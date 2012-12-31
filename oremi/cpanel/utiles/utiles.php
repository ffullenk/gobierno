<?php
// Funciones Layaout Principal
function Ruta( $nPath ) { 
    global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk;
$ruta = "<a href=\"". _rutaPanel_ . "inicio.php\">Inicio</a>";
  switch( $nPath ) {
      case "E": $ruta.= " | <a href=\"". _rutaPanel_ . "encargados/index.php\">Encargados</a>"; break;
      case "U": $ruta.= " | <a href=\"". _rutaPanel_ . "ubicacion/index.php\">Encargados</a>"; break;
      case "R": $ruta.= " | <a href=\"". _rutaPanel_ . "recursos/index.php\">Encargados</a>"; break;
      case "N": $ruta.= " | <a href=\"". _rutaPanel_ . "niveles/index.php\">Encargados</a>"; break;
      case "C": $ruta.= " | <a href=\"". _rutaPanel_ . "cargos/index.php\">Cargos Usuarios del Sistema</a>"; break;
      case "V": $ruta.= " | <a href=\"". _rutaPanel_ . "esteven/index.php\">Estados de los Eventos</a>"; break;
      case "F": $ruta.= " | <a href=\"". _rutaPanel_ . "estalfa/index.php\">Estados de los Informes Alfas</a>"; break;
      case "D": $ruta.= " | <a href=\"". _rutaPanel_ . "necesidad/index.php\">Tipo de Necesidad</a>"; break;
      case "I": $ruta.= " | Panel de Control Sistema Generacion de Informes Alfas"; break;	  
  }
return $ruta;
}


function tituloModulo( $cPath ) { 
    global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk;
  switch( $cPath ) {
      case "E": $titulo = " Encargados Oficina Protección Civil Región de Coquimbo"; break;
      case "U": $titulo = " Ubicacion"; break;
      case "R": $titulo = " Recursos Involucrados"; break;
      case "N": $titulo = " Niveles de Capacidad de Respuesta"; break;
      case "A": $titulo = " Alertas"; break;
      case "V": $titulo = " Estados de los Eventos"; break;
      case "F": $titulo = " Estados de los Informes Alfas"; break;
      case "T": $titulo = " Tipos de Evento"; break;
      case "C": $titulo = " Cargos Usuarios del Sistema"; break;
      case "D": $titulo = " Tipo de Necesidades"; break;
      case "I": $titulo = " Portada"; break;
  }
return $titulo;
}



function cabOremi() {
  global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo _cabecera_ ;?></title>
<link href="<?php echo _rutaPanel_;?>estilos/principal.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
}


function encOremi() {
  global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo _cabecera_ ;?></title>
<link href="<?php echo _rutaPanel_;?>estilos/principal.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
}



function izqOremi() {
  global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk;?>
<div id="container">
  <div id="top"><h1>Sistema Generaci&oacute;n de Informes Alfas<br />www.gorecoquimbo.cl<br />Panel de Administraci&oacute;n</h1></div>
  <div id="leftnav">
  	<div id="misesion">Identificacion de la sesion <br />
<?php 
$rsSes = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlSes = "SELECT NOMBRES_PERSONA, NICK_PERSONA FROM FUNCIONARIOS WHERE PERSONA_ID='$global_qk.' ";
$rsSes->Open($sqlSes);
if($rsSes->moveNext()) { echo $rsSes->FieldbyNumber(0); }
?>
<p>
		<a href="<?php echo _rutaPanel_; ?>inicio.php"><img src="<?php echo _imagenesPanel_; ?>portada.gif" border="0" width="39" height="37" alt=" Portada" /></a>
		<a href="<?php echo _rutaPanel_; ?>modificar/index.php"><img src="<?php echo _imagenesPanel_; ?>misdatos.gif" border="0" width="39" height="37" hspace="3" alt=" Mis Datos " /></a>
		<a href="<?php echo _rutaPanel_; ?>logout.php"><img src="<?php echo _imagenesPanel_; ?>salirsesion.gif" border="0" width="39" height="37" hspace="3" alt=" Salir de la Sesión" /></a>
</p>
	</div>
	<div id="contenidos">
		<div id="navcontainer">
		<p >M&oacute;dulo Administradores</p>
		<ul id="navlist">					
	    <li><a href="<?php echo _rutaPanel_; ?>encargados/index.php">Encargados Oficina Protecci&oacute;n Civil</a></li>
		<li><a href="<?php echo _rutaPanel_; ?>cargos/index.php">Cargos Usuarios del Sistema</a></li>
		<li><a href="<?php echo _rutaPanel_; ?>tipos/index.php">Tipos de Evento</a></li>
		<li><a href="<?php echo _rutaPanel_; ?>ubicacion/index.php">Ubicaci&oacute;n</a></li>
		<li><a href="<?php echo _rutaPanel_; ?>recursos/index.php">Recursos Involucrados</a></li>
		<li><a href="<?php echo _rutaPanel_; ?>niveles/index.php">Niveles de Respuesta</a></li>
		<li><a href="<?php echo _rutaPanel_; ?>esteven/index.php">Estados de los Eventos</a></li>
		<li><a href="<?php echo _rutaPanel_; ?>estalfa/index.php">Estados de los Informe Alfa</a></li>
		<li><a href="<?php echo _rutaPanel_; ?>necesidad/index.php">Tipos de Necesidades</a></li>
<!--		<li><a href="<?php echo _rutaPanel_; ?>alertas/index.php">Alertas Vigentes</a></li> -->
	  </ul>
	</div>
	</div>
  </div>
<?php
}


function modOremi( $cPath ) {
  global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk;?>
  <div id="content">
    <div id="aki"><? echo Ruta($cPath);?></div>
    <h2><? echo tituloModulo($cPath);?></h2>

<?php
}


function pieOremi() {
  global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk;?>
  <div id="footer"><strong>www.gorecoquimbo.cl</strong>: Desarrollado por <a href="mailto:ljimenez@gorecoquimbo.cl">Luis Jim&eacute;nez Villalobos</a> para la Oficina Regional de Emergencias regi&oacute;n de Coquimbo. 
  </div>
</div>
</body>
</html>
<?php 
}



// Funciones Especiales
function existenRegistros( $nCampo, $nTabla ) {
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk;
  $rsReg = new Recordset($SERVER, $DB, $USER, $PASSWORD);
  $sqlReg = "SELECT ". $nCampo . " FROM " . $nTabla;

  $rsReg->Open($sqlReg);
  if($rsReg->moveNext()) {
     return true;
  } else { return false; }
}


function mensaje( $tID, $nGIF, $nMensaje) {
echo "
	<div id=\"".$tID."\">
		<img src=\"../../imagenes/panel/". $nGIF . ".gif\" /> &nbsp; ". $nMensaje ."<br />
		<a href=\"index.php\"> Aceptar </a>
	</div>
";
}


function errorLogin( $nMens ) {
echo "
<link href=\""._rutaPanel_."estilos/principal.css\" rel=\"stylesheet\" type=\"text/css\" />

	<div id=\"errorLogin\">
		<img src=\"../../imagenes/panel/errorlogin.gif\" /> &nbsp; ". $nMens ."<br />
		<a href=\"".  _rutaPanel_ . "index.php\">Aceptar</a>
	</div>
";

}

function convertir_fecha( $fFecha ) {
global $global_qk;
$fecha = split("-", $fFecha );
return $fecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
}

function fechaNuestra( $fFecha ) {
global $global_qk;
$fecha = split("-", $fFecha );
return $fecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
}
?>