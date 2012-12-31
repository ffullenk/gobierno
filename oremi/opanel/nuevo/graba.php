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
	modOremi("N");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Seteamos, que los campos se hayan completado
  $evento		= $_POST["evento"];
  $ubicacion	= $_POST["ubicacion"];
  $fecha		= $_POST["fecha"];
  $hora			= $_POST["hora"];
  $titulo		= $_POST["titulo"];
  $resumen		= $_POST["resumen"];
  
  $cCont = 0;
  if($evento=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Tipo de Evento."; }
  if($ubicacion=="") { $faltaCampo[$cCont++] = " Debe Seleccionar la Ubicaci&oacute;n del Evento."; }
  if($fecha=="") { $faltaCampo[$cCont++] = " Debe Especificar la fecha de ocurrencia del Evento."; }
  if($hora=="") { $faltaCampo[$cCont++] = " Debe Especificar la hora de ocurrencia del Evento."; }
  if($titulo=="") { $faltaCampo[$cCont++] = " Debe Especificar un T&iacute;tulo para el Evento."; }
  if($resumen=="") { $faltaCampo[$cCont++] = " Debe Especificar un resumen para el Evento."; }

  
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
			<a href=\"javascript:history.back();\"> Volver Atras </a>
          </div>
	  ";
  } else {
      // Procedemos a Grabar la informacion

		/*	Tomamos en consideracion el:
				1. ID del Encargado, mas
				2. El Cargo del Encargado
			Dependiendo del Cargo, ubicamos la Tabla sobre la cual se almacenará el nuevo registro.
		*/
		$fecha_ = convertir_fecha($fecha);
		
        $rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsEvento->FieldByInsert( "ENCARGADO_ID", "'$global_qk'" );
		$rsEvento->FieldByInsert( "TPEVENTO_ID", "'$evento'" );
		$rsEvento->FieldByInsert( "TPUBICACION_ID", "'$ubicacion'" );
		$rsEvento->FieldByInsert( "ESTADOEVENTO_ID", "'"._eventoAbierto_."'" );
		$rsEvento->FieldByInsert( "TITULOEVENTO", "'$titulo'" );
		$rsEvento->FieldByInsert( "RESUMEN", "'$resumen'" );
		$rsEvento->FieldByInsert( "FECHA_INICIO", "'$fecha_'" );
		$rsEvento->FieldByInsert( "HORA_INICIO", "'$hora'" );


		switch( $global_cg ) {
			case "1":
				// Encargado Comunal
				$poneRegistro = $rsEvento->execInsert( "EVENTOALFA" , 1); break;
			case "2":
				// Encargado Provincial
				$poneRegistro = $rsEvento->execInsert( "EVENTOPROVINCIA" , 1); break;
			case "3":
				// Encargado Regional
				$poneRegistro = $rsEvento->execInsert( "EVENTOREGION" , 1); break;
		}

		
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