<?php
/* header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/

	@include("../../lib/config.php");
	@include("../../lib/oremi.php");
    @include("../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../lib/global.php");
	@include("../../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk;
	$global_qk=0;
	require("../detect.php");

if($loginCorrecto ) { 
    encOremi();
	izqOremi();
	modOremi("A");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Seteamos, que los campos se hayan completado
  $tFecha	= $_POST["fecha"];
  $thora	= $_POST["hora"];
  $cZona	= $_POST["zona"];
  $cGrado	= $_POST["alerta"];
  $cExtension	= $_POST["extension"];
  $cVariable	= $_POST["variable"];
  $cSituacion	= $_POST["situacion"];
  $cOrientacion	= $_POST["orientacion"];
  
  $cCont = 0;
  if($tFecha=="") { $faltaCampo[$cCont++] = " Debe Especificar una Fecha del tipo [dd/mm/aaaa]"; }
  if($thora=="") { $faltaCampo[$cCont++] = " Debe Especificar una Hora del tipo [HH:mm]"; }
  if($cZona=="") { $faltaCampo[$cCont++] = " Debe Especificar la Zona de Riesgo"; }
  if($cGrado=="") { $faltaCampo[$cCont++] = " Debe Seleccionar un Grado de Alerta"; }
  if($cExtension=="") { $faltaCampo[$cCont++] = " Debe Especificar la Extensi&oacute;n de la Alerta"; }
  if($cVariable=="") { $faltaCampo[$cCont++] = " Debe Seleccionar una Variable de Riesgo"; }
  if($cSituacion=="") { $faltaCampo[$cCont++] = " Debe Especificar la Situaci&oacute;n General"; }
  if($cOrientacion=="") { $faltaCampo[$cCont++] = " Debe Especificar la Orientaci&oacute;n para la Gesti&oacute;n de Protecci&oacute;n Civil"; }
  
  if( $cCont > 0 ) {
	echo "
	      <div id=\"errorForm\">
		      <img src=\"../../imagenes/panel/informacion.gif\" /> &nbsp; 
			  <strong>Se han detectado los siguientes errores:</strong> <br />
			  <ul>";
			  for($nError=0; $nError < $cCont; $nError++) {
			     echo "<li>". $faltaCampo[$nError] ."</li>";
			  }
	echo "</ul><br />
			<a href=\"index.php\"> Volver Atras </a>
          </div>
	  ";
  } else {
      // Procedemos a Grabar la informacion
		$nFecha = convertir_fecha($tFecha);

        $rsAlertas = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsAlertas->FieldByInsert( "FECHA", "'$nFecha'" );
		$rsAlertas->FieldByInsert( "TIEMPO", "'$thora'" );
		$rsAlertas->FieldByInsert( "ZONA", "'$cZona'" );
		$rsAlertas->FieldByInsert( "TPALERTA", "'$cGrado'" );
		$rsAlertas->FieldByInsert( "VARIABLE", "'$cVariable'" );
		$rsAlertas->FieldByInsert( "EXTENSION", "'$cExtension'" );
		$rsAlertas->FieldByInsert( "SITUACION", "'$cSituacion'" );
		$rsAlertas->FieldByInsert( "ORIENTACION", "'$cOrientacion'" );
		$poneRegistro = $rsAlertas->execInsert( "ALERTAS" , 1);
		
		if($poneRegistro == true ) { 
		    /*El registro fue agregado corecctamente*/
			 mensaje("okForm","okBD","El Registro ha sido Añadido de forma satisfactoria.");
		} else {
			// Ocurrio un problema y no se ha podido añadir el registro a la Base de Datos
			mensaje("errorForm","errorBD","Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego.");
		}
	}
?>
<!-- Central -->
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>