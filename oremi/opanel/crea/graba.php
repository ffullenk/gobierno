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
	modOremi("S");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Seteamos, que los campos se hayan completado
  $id			= $_POST["id"];
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
			Dependiendo del Cargo, ubicamos la Tabla sobre la cual se almacenar� el nuevo registro.
		*/
		$fecha_ = convertir_fecha($fecha);
		switch( $global_cg ) {
			case "1":
				// Encargado Comunal
				$cCampoID = "EVENTOALFA_ID"; $bTabla = "EVENTOALFA"; break;
			case "2":
				// Encargado Provincial
				$cCampoID = "EVENTOPROVINCIA_ID"; $bTabla = "EVENTOPROVINCIA"; break;
			case "3":
				// Encargado Regional
				$cCampoID = "EVENTOREGION_ID"; $bTabla = "EVENTOREGION"; break;
		}
		
        $rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsEvento->FieldByInsert( "".$cCampoID."", "'$id'" );
		$rsEvento->FieldByInsert( "ENCARGADO_ID", "'$global_qk'" );
		$rsEvento->FieldByInsert( "TPEVENTO_ID", "'$evento'" );
		$rsEvento->FieldByInsert( "TPUBICACION_ID", "'$ubicacion'" );
		$rsEvento->FieldByInsert( "ESTADOEVENTO_ID", "'"._eventoAbierto_."'" );
		$rsEvento->FieldByInsert( "TITULOEVENTO", "'$titulo'" );
		$rsEvento->FieldByInsert( "RESUMEN", "'$resumen'" );
		$rsEvento->FieldByInsert( "FECHA", "'$fecha_'" );
		$rsEvento->FieldByInsert( "HORA", "'$hora'" );


		switch( $global_cg ) {
			case "1":
				// Encargado Comunal
				$poneRegistro = $rsEvento->execInsert( "INFORMEALFA" , 1); break;
			case "2":
				// Encargado Provincial
				$poneRegistro = $rsEvento->execInsert( "CONSOLIDADOPROVINCIA" , 1); break;
			case "3":
				// Encargado Regional
				$poneRegistro = $rsEvento->execInsert( "CONSOLIDADOREGION" , 1); break;
		}

		
		if($poneRegistro == true ) { 
		    /*El registro fue agregado corecctamente*/
			// En Tabla Principal EVENTOxxxx, incrementamos el NRO_INFORMES
			$rsIncEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$incSQL = "SELECT NRO_INFORMES FROM ".$bTabla . " WHERE ".$tCampo."=".$id;
			$rsIncEvento->Open($incSQL);
			$nroInc= $rsIncEvento->RecordCount();
			if($nroInc>0) {
				// Incrementamos el Informe.
				$rsIncEvento->moveNext();
				$tNroInf = $rsIncEvento->FieldByNumber(0) + 1;
				
				$rsUpEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				$rsUpEvento->FieldByUpdate( "NRO_INFORMES" , "'$tNroInf'" );
				$rsUpEvento->WhereByUpdate( "".$cCampoID."" , "$id" );
				$poneRegistro = $rsUpEvento->execUpdate( "".$bTabla."" , 1);

				if($poneRegistro == true ) { 
				 mensaje("okForm","okBD","El Registro ha sido A�adido de forma satisfactoria.");				
				}

		} else {
			// Ocurrio un problema y no se ha podido a�adir el registro a la Base de Datos
			mensaje("errorForm","errorBD","Ha ocurrido un problema interno y no se ha podido a�adir el registro a la base de datos. Por favor, intente luego.");
		}
		
		echo "
		<dl>
		 <dt>Evento</dt><dd>".$evento."</dd>
		 <dt>ubicacion</dt><dd>".$ubicacion."</dd>
 		 <dt>Estado</dt><dd>"._eventoAbierto_."</dd>
		 <dt>titulo</dt><dd>".$titulo."</dd>
		 <dt>resumen</dt><dd>".$resumen."</dd>
		 <dt>fecha_</dt><dd>".$fecha_."</dd>
		 <dt>Hora</dt><dd>".$hora."</dd>
		 
		</dl>
		";
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