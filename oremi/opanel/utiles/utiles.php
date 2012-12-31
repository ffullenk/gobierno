<?php
// Funciones Layaout Principal
function Ruta( $nPath ) { 
    global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk, $global_cg;
$ruta = "<a href=\"". _rutaoPanel_ . "inicio.php\">Inicio</a>";
  switch( $nPath ) {
      case "S": $ruta.= " | Nuevo Informe"; break;
      case "C": $ruta.= " | <a href=\"". _rutaoPanel_ . "cerrar/index.php\">Cerrar Eventos</a>"; break;
      case "N": $ruta.= " | <a href=\"". _rutaoPanel_ . "nuevo/index.php\">Creaci&oacute;n de un Nuevo Evento</a>"; break;
      case "I": $ruta.= " | Panel de Control Sistema Generacion de Informes Alfas"; break;	  
      case "V": $ruta.= " | Visualizaci&oacute;n de Eventos"; break;
      case "T": $ruta.= " | <a href=\"". _rutaoPanel_ . "vistas/index.php\">Vista de Consolidados</a>"; break;
      case "R": $ruta.= " | <a href=\"". _rutaoPanel_ . "inicio.php\">Informes Consolidados</a>"; break;
      case "M": $ruta.= " | <a href=\"". _rutaoPanel_ . "modificar/index.php\">Actualizar Mis Datos</a>"; break;
      case "P": $ruta.= " | <a href=\"". _rutaoPanel_ . "informa/index.php\">Servicio Period&iacute;stico</a>"; break;
      case "A": $ruta.= " | <a href=\"". _rutaoPanel_ . "alertas/index.php\">Servicio de Alertas</a>"; break;
case "L": $ruta.= " | <a href=\"". _rutaoPanel_ . "inicio.php\">Consolidado Provincial</a>"; break;
case "F": $ruta.= " | <a href=\"". _rutaoPanel_ . "inicio.php\">Informe Alfa</a>"; break;

  }
return $ruta;
}


function tituloModulo( $cPath ) { 
    global $SERVER, $DB, $USER, $PASSWORD;
	global $global_qk, $global_cg;
	switch( $cPath ) {
      case "S": $titulo = " Nuevo Informe"; break;
      case "V": $titulo = " Ver Eventos Hist&oacute;ricos"; break;
      case "T": $titulo = " Informes Consolidados"; break;
      case "C": $titulo = " Cerrar Evento"; break;
      case "P": $titulo = " Servicio Period&iacute;stico"; break;
      case "N": $titulo = " Nuevo Evento"; break;
      case "M": $titulo = " Actualizar Mis Datos"; break;
      case "R": $titulo = " Informes Consolidados"; break;
      case "A": $titulo = " Servicio de Alertas"; break;
      case "I": $titulo = " Portada"; break;
      case "L": $titulo = " Consolidado Provincial"; break;
      case "F": $titulo = " Actualizar Informe Alfa"; break;
	  
  }
return $titulo;
}



function cabOremi() {
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo _cabecera_ ;?></title>
<link href="<?php echo _rutaoPanel_;?>estilos/principal.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
}


function encOremi() {
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo _cabecera_ ;?></title>
<link href="<?php echo _rutaoPanel_;?>estilos/principal.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
}



function izqOremi() {
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;  ?>
  <div id="container">
  <div id="top"><h1>Sistema Generaci&oacute;n de Informes Alfas<br />www.gorecoquimbo.cl<br />Panel de Administraci&oacute;n</h1></div>
  <div id="leftnav">
  	<div id="misesion">
	  <strong>Identificacion de la sesion</strong> <br />
	  <?php 
		$rsSes = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$sqlSes = "SELECT NOMBRES, APELLIDOS, CARGO FROM ENCARGADOS, CARGOS 
						WHERE ENCARGADO_ID='".$global_qk."' AND CARGOS.CARGO_ID='".$global_cg."'";
		$rsSes->Open($sqlSes);			
		if($rsSes->moveNext()) {
			echo $rsSes->FieldbyNumber(2) . "<br />";
			echo $rsSes->FieldbyNumber(0) . " " . $rsSes->FieldbyNumber(1);
		}
	  ?>
<br />
<a href="<?php echo _rutaoPanel_; ?>inicio.php"><img src="<?php echo _imagenesPanel_; ?>portada.gif" border="0" width="39" height="37" alt=" Portada" /></a>
<a href="<?php echo _rutaoPanel_; ?>modificar/index.php"><img src="<?php echo _imagenesPanel_; ?>misdatos.gif" border="0" width="39" height="37" hspace="3" alt=" Mis Datos " /></a>
<a href="<?php echo _rutaoPanel_; ?>logout.php"><img src="<?php echo _imagenesPanel_; ?>salirsesion.gif" border="0" width="39" height="37" hspace="3" alt=" Salir de la Sesión" /></a>
	  
	</div>
	<div id="contenidos">
		<div id="navcontainer">
		<p >M&oacute;dulo Administradores</p>
		<ul id="navlist">					
<?php if($global_cg>="1" && $global_cg<="3") { ?>
<li><a href="<?php echo _rutaoPanel_; ?>nuevo/index.php" accesskey="N">Nuevo Evento</a></li>
<li><a href="<?php echo _rutaoPanel_; ?>cerrar/index.php" accesskey="C">Cerrar Evento</a></li>
<?php } 

if($global_cg=="1") { ?>
<li><a href="<?php echo _rutaoPanel_; ?>informealfa/alfas/index.php" accesskey="A">Alfas Hist&oacute;ricos</a></li>
<?php	}

if($global_cg=="2") { ?>
<li><a href="<?php echo _rutaoPanel_; ?>consoliprov/consolidados/index.php" accesskey="A">Consolidados Provinciales Anteriores</a></li>
<?php	}

if($global_cg>="2" && $global_cg<="5") { ?>
<li><a href="<?php echo _rutaoPanel_; ?>vistas/index.php" accesskey="V">Ver Consolidados Regionales</a></li>
<?php   }

if($global_cg=="3" || $global_cg=="5") { ?>
<li><a href="<?php echo _rutaoPanel_; ?>informa/index.php" accesskey="P">Servicio Period&iacute;stico</a></li>
<!-- <li><a href="<?php echo _rutaoPanel_; ?>alertas/index.php" accesskey="T">Servicio de Alertas</a></li> -->
<?php   } ?>
	  </ul>
	</div>
	</div>
  </div>
<?php
}


function modOremi( $cPath ) {
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;?>
  <div id="content">
    <div id="aki"><? echo Ruta($cPath);?></div>
    <h2 style="padding:15px;"><? echo tituloModulo($cPath);?></h2>

<?php
}


function pieOremi() {
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;?>
    <div id="footer">
	<strong>www.gorecoquimbo.cl</strong>: Desarrollado por <a href="mailto:ljimenez@gorecoquimbo.cl">Luis Jim&eacute;nez Villalobos</a> para la Oficina Regional de Emergencias regi&oacute;n de Coquimbo. 
  </div>
</div>
</body>
</html>
<?php 
}



// Funciones Especiales
/*
   Nos permite chequear que existan registros sobre Tabla consultada, en caso contrario,
   presentará formulario para añadir nuevo registro sobre la Tabla.
*/
function existenRegistros( $nCampo, $nTabla ) {
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;
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
		<a href=\"../inicio.php\"> Aceptar </a>
	</div>
";
}

function mensajeIA( $tID, $nGIF, $nMensaje) {
echo "
	<div id=\"".$tID."\">
		<img src=\"../../../imagenes/panel/". $nGIF . ".gif\" /> &nbsp; ". $nMensaje ."<br />
		<a href=\""._rutaoPanel_."inicio.php\"> Aceptar </a>
	</div>
";
}


function errorLogin( $nMens ) {
echo "
<link href=\""._rutaoPanel_."estilos/principal.css\" rel=\"stylesheet\" type=\"text/css\" />

	<div id=\"errorLogin\">
		<img src=\"../../imagenes/panel/errorlogin.gif\" /> &nbsp; ". $nMens ."<br />
		<a href=\""._rutaoPanel_."inicio.php\">Aceptar</a>
	</div>
";

}

function convertir_fecha( $fFecha ) {
  global $global_qk, $global_cg;
$fecha = split("-", $fFecha );
return $fecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
}

function fechaNuestra( $fFecha ) {
global $global_qk, $global_cg;
$fecha = split("-", $fFecha );
return $fecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
}

// Funcion verificaCargo
/*
	Permite chequear de acuerdo al CARGO del usuario, visualizar la información que le corresponda ver.
*/
function verificaCargo( $nCargo ) {
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;

  $esteAnyo = Date("Y");
  $AnyoAnterior = "2011";

	/* verifica via switch el tipo de Cargo */
	switch( $nCargo ) {
	  case "1":
	  //Encargado Comunal: chequeamos eventos en proceso de los Encargados Comunales
	  $ssql = "SELECT EVENTOALFA_ID, NRO_EVENTOS, TITULOEVENTO, FECHA_INICIO, HORA_INICIO 
	  			FROM EVENTOALFA 
				WHERE ENCARGADO_ID='".$global_qk."' AND ESTADOEVENTO_ID='"._eventoAbierto_."'  AND ( DATE_FORMAT(FECHA_INICIO, \"%Y\")=\"$esteAnyo\" OR DATE_FORMAT(FECHA_INICIO, \"%Y\")=\"$AnyoAnterior\" ) ORDER BY FECHA_INICIO DESC";
				 break;
				 
	  case "2":
	  //Encargado Provincial
	  $ssql = "SELECT EVENTOPROVINCIA_ID, NRO_EVENTOS, TITULOEVENTO, FECHA_INICIO, HORA_INICIO 
	  			FROM EVENTOPROVINCIA 
				WHERE ENCARGADO_ID='".$global_qk."' AND ESTADOEVENTO_ID='"._eventoAbierto_."'  AND ( DATE_FORMAT(FECHA_INICIO, \"%Y\")=\"$esteAnyo\" OR DATE_FORMAT(FECHA_INICIO, \"%Y\")=\"$AnyoAnterior\" ) ORDER BY FECHA_INICIO DESC";
				 break;
				 
	  case "3":
	  //Encargado Regional
	  $ssql = "SELECT EVENTOREGION_ID, NRO_EVENTOS, TITULOEVENTO, FECHA_INICIO, HORA_INICIO 
	  			FROM EVENTOREGION 
				WHERE ENCARGADO_ID='".$global_qk."' AND ESTADOEVENTO_ID='"._eventoAbierto_."' AND ( DATE_FORMAT(FECHA_INICIO, \"%Y\")=\"$esteAnyo\" OR DATE_FORMAT(FECHA_INICIO, \"%Y\")=\"$AnyoAnterior\" ) ORDER BY FECHA_INICIO DESC ";
				 break;
				 
	  case "4":
	  //Visita Consolidados
	  $ssql = "SELECT EVENTOREGION_ID, NRO_EVENTOS, TITULOEVENTO, FECHA_INICIO, HORA_INICIO 
	  			FROM EVENTOREGION 
				WHERE ENCARGADO_ID='".$global_qk."' AND ( DATE_FORMAT(FECHA_INICIO, \"%Y\")=\"$esteAnyo\" OR DATE_FORMAT(FECHA_INICIO, \"%Y\")=\"$AnyoAnterior\" ) ORDER BY FECHA_INICIO DESC ";
				break;
	}
return $ssql;
}


function datosEventos( $nId ) { 
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;

	switch( $global_cg ) {
		case "1":
			// Encargado Comunal
			$sId = "EVENTOALFA_ID";
			$nTabla = "EVENTOALFA";
		break;
		case "2":
			// Encargado Provincia
			$sId = "EVENTOPROVINCIA_ID";
			$nTabla = "EVENTOPROVINCIA";
		break;
		case "3":
			// Encargado Region
			$sId = "EVENTOREGION_ID";
			$nTabla = "EVENTOREGION";
		break;
	}
	
	$ssql = "SELECT ". $sId.", TPEVENTO_ID, TPUBICACION_ID, TITULOEVENTO, RESUMEN, FECHA_INICIO, HORA_INICIO, NRO_EVENTOS 
				FROM ".$nTabla." 
				WHERE ".$sId." = ".$nId." ORDER BY FECHA_INICIO DESC";
return $ssql;
}


function nombreInforme() { 
  global $SERVER, $DB, $USER, $PASSWORD;
  global $global_qk, $global_cg;

	switch( $global_cg ) {
		case "1":
			// Encargado Comunal
			$cInforme = "ALFA";
		break;
		case "2":
			// Encargado Provincia
			$cInforme = "Consolidado Provincial";
		break;
		case "3":
			// Encargado Region
			$cInforme = "Consolidado Regional";
		break;
	}
return $cInforme;
}
?>
