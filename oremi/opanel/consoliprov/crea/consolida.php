<?php

	@include("../../../lib/config.php");
	@include("../../../lib/oremi.php");
    @include("../../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../../lib/global.php");
	@include("../../../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk, $global_cg;
	$global_qk=0;
	$global_cg=0;

	require("../../detect.php");

if($loginCorrecto ) { 
    cabOremi();
	izqOremi();
	modOremi("L"); // Crea un Nuevo Informe Alfa/Consolidado
?>
    <div >
       <div >
	   <?php
	    /* Seteamos las variables pasadas*/
		$id			= $_POST["id"];
		
		$nroEvento		= $_POST["nroEvento"];
		$evento			= $_POST["evento"];
		$titulo			= $_POST["titulo"];
		$ubicacion		= $_POST["ubicacion"];
		$fecha			= $_POST["fecha"];
		$hora			= $_POST["hora"];
		$nivel			= $_POST["nivel"];
		$iaC			= $_POST["iaC"];
		$observaciones	= $_POST["observaciones"];
  
		$cCont = 0;
		if($evento=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Tipo de Evento."; }
		if($titulo=="") { $faltaCampo[$cCont++] = " Debe Especificar un T&iacute;tulo para el Consolidado."; }
		if($ubicacion==0) { $faltaCampo[$cCont++] = " Debe Seleccionar la Ubicaci&oacute;n del Consolidado."; }
		if($fecha=="") { $faltaCampo[$cCont++] = " Debe Especificar la fecha de ocurrencia del Consolidado."; }
		if($hora=="") { $faltaCampo[$cCont++] = " Debe Especificar la hora de ocurrencia del Consolidado."; }
		if($nivel=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Nivel de Capacidad de Respuesta."; }
		if($iaC=="") { $faltaCampo[$cCont++] = " Debe Seleccionar Comunas a Consolidar."; }
		if($observaciones=="") { $faltaCampo[$cCont++] = " Debe Detallar Observaciones."; }

  
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
			// Procedemos a Grabar la informacion del Consolidado
			
			/*
				A saber, 
			*/
			$fecha_ = convertir_fecha($fecha);
			
			// Grabamos la info en CONSOLIDAPROV
			$rsConsolida = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$rsConsolida->FieldByInsert( "ENCARGADO_ID", "'$global_qk'");
			$rsConsolida->FieldByInsert( "EVENTOPROVINCIA_ID", "'$id'" );
			$rsConsolida->FieldByInsert( "ESTADOEVENTO_ID", "'"._eventoConsolidado_."'" );
			$rsConsolida->FieldByInsert( "TPEVENTO_ID", "'$evento'" );
			$rsConsolida->FieldByInsert( "TPUBICACION_ID", "'$ubicacion'" );
			$rsConsolida->FieldByInsert( "TPCAPRESPUESTA_ID", "'$nivel'" );
			$rsConsolida->FieldByInsert( "TITULOEVENTO", "'$titulo'" );
			$rsConsolida->FieldByInsert( "FECHA", "'$fecha_'" );
			$rsConsolida->FieldByInsert( "HORA", "'$hora'" );
			$rsConsolida->FieldByInsert( "OBSERVACIONES", "'$observaciones'" );
			$rsConsolida->FieldByInsert( "NRO_CONSOLIDADO", "'$nroEvento'" );
			$poneRegistro = $rsConsolida->execInsert( "CONSOLIDAPROV" , 1);

echo"<div style=\"margin:0 auto;text-align:center;border:1px solid #990000;font:10pt Verdana;color:#333;width:75%;\">";

			if($poneRegistro==true) {
				// Grabamos consolidado
				// --> Vamos a los Informes Alfas para marcarlos como ya consolidados de acuerdo al ID creado recientemente
					$rsConsCreado =  new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$sqlConsCreado = "SELECT CONSOLIDAPROV_ID 
										FROM CONSOLIDAPROV 
										WHERE EVENTOPROVINCIA_ID=\"$id\" AND 
										NRO_CONSOLIDADO=\"$nroEvento\" ";
					$rsConsCreado->Open($sqlConsCreado);
					$nroConsCreado= $rsConsCreado->RecordCount();
					if($nroConsCreado>0) {
						$rsConsCreado->moveNext();
						$IDCons = $rsConsCreado->FieldByNumber(0);
						
						// Actualizamos los Informes Alfas que Consolidamos en esta oportunidad
						$aLista=array_keys($_POST["iaC"]);
						$rsUpEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						
						foreach($aLista as $iId) {
							$rsUpEvento->FieldByUpdate( "CONSOLIDAPROV_ID" , "'$IDCons'" );
							$rsUpEvento->FieldByUpdate( "ESTADOEVENTO_ID" , "'"._eventoConsolidado_."'" );
							$rsUpEvento->WhereByUpdate( "INFORMEALFA_ID" , "".$iaC[$iId]."" );
							$poneRegistro = $rsUpEvento->execUpdate( "INFORMEALFA" , 1);
						}
						
						// Actualizamos el Nro de Eventos Consolidados en EVENTOPROVINCIA
						$rsUpEvento->FieldByUpdate( "NRO_EVENTOS" , "'$nroEvento'" );
						$rsUpEvento->WhereByUpdate( "EVENTOPROVINCIA_ID" , "'$id'" );
						$poneRegistro = $rsUpEvento->execUpdate( "EVENTOPROVINCIA" , 1);
						
						echo "El Consolidado Provincial se ha efectuado de manera satisfactoria.";


/*

Revisamos Las comunas que incorpora este consolidado provincial

*/
$nombraComunas = array();
foreach($aLista as $iId) {
   $rComu = new Recordset($SERVER, $DB, $USER, $PASSWORD);
   $qComu = "SELECT COMUNA FROM COMUNA AS C, INFORMEALFA AS I, ENCARGADOS AS E WHERE I.ENCARGADO_ID=E.ENCARGADO_ID AND E.COM_ID=C.COM_ID AND I.INFORMEALFA_ID=\"".$iaC[$iId]."\" ";

   $rComu->Open($qComu);
   $nComu = $rComu->RecordCount();

   if($nComu>0) {
      $rComu->moveNext();
      $nombraComunas[] = $rComu->FieldByNumber(0);
   }
}

/*
Revisamos de que EVENTO se trata
*/
$rTEve = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$qTEve = "SELECT TPEVENTO FROM TP_EVENTO WHERE TPEVENTO_ID=\"$evento\" ";

$rTEve->Open($qTEve);
$nTEve = $rTEve->RecordCount();

if($nTEve>0) {
   $rTEve->moveNext();
   $elTipoEventoEs = $rTEve->FieldByNumber(0);
}


// *************************************************************************** //
// **        ENVIAMOS UN EMAIL AL ENCARGADO REGIONAL MENCIONANDO QUE        ** //
// **         EL CONSOLIDADO PROVINCIAL HA SIDO GENERADO Y ENVIADO.         ** //
// *************************************************************************** //

// Vemos la region del $global_qk actual
$rsProvCom = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlProvCom = "SELECT REGION_ID, PROVINCIA FROM ENCARGADOS AS E, COMUNA AS C, PROVINCIA AS P WHERE E.COM_ID=C.COM_ID AND C.PROV_ID=P.PROV_ID AND E.ENCARGADO_ID=\"".$global_qk."\" ";
$rsProvCom->Open($sqlProvCom);
$nroProvCom = $rsProvCom->RecordCount();

if($nroProvCom>0) {
  $rsProvCom->moveNext();
  // Buscamos al Encargado Regional
  $rsProv= new Recordset($SERVER, $DB, $USER, $PASSWORD);
  $sqlProv = "SELECT APELLIDOS, NOMBRES, EMAIL, REGION FROM ENCARGADOS AS E, COMUNA AS C, PROVINCIA AS P, REGION AS R WHERE E.COM_ID=C.COM_ID AND C.PROV_ID=P.PROV_ID AND P.REGION_ID=R.REGION_ID AND R.REGION_ID=\"".$rsProvCom->FieldByNumber(0)."\" AND E.CARGO_ID=3";

  $rsProv->Open($sqlProv);
  $nroProv = $rsProv->RecordCount();

  if($nroProv>0) {
    $email_ep = array();
    while($rsProv->moveNext()) {
    	$nregion= $rsProv->FieldByNumber(3);
      $email_ep[] = $rsProv->FieldByNumber(2);
    }

    // Teniendo cargado a los Encargados Provinciales, les mando el email.
    @include("../../../lib/correo.php");
    $emailEmisor="oremiiv@gorecoquimbo.cl";
    $asunto="Consolidado Provincial: OREMI ".$nregion;
    $mail = new correo();
    $mail->setEmisor("Consolidado Provincial",$emailEmisor);
    $Mensaje_A_Responsables = " 
    El Sistema de Proteccion Civil de la Region de Coquimbo, informa que la Direccion Provincial de ".$rsProvCom->FieldByNumber(1)." ha despachado un Consolidado Provincial correspondiente al EVENTO ".$elTipoEventoEs.", ".$titulo.", informado por el (los) municipio(s) de: \n\n
    ";

    for($f=0; $f<count($nombraComunas);$f++) {

        $Mensaje_A_Responsables.= $nombraComunas[$f] . "\n\n";
    }

    

    $Mensaje_A_Responsables.= "\n\n Para su conocimiento y fines. \n\n


    Atte.,
    Coordinacion Sistema de Generacion de Informes Alfas
    OREMI Region de Coquimbo.";

    for($i=0; $i<count($email_ep);$i++) {
        $mail->putCorreo($email_ep[$i], $asunto, $Mensaje_A_Responsables);
    }
    $mail->putCorreo(_jefeOREMIIV_, $asunto, $Mensaje_A_Responsables);
    $mail->putCorreo(_onemi04_, $asunto, $Mensaje_A_Responsables);
    $mail->putCorreo(_oficina04_, $asunto, $Mensaje_A_Responsables);

    $mail->sendCorreo();

  }
}

						
        }

			} else {
				// Error al grabar consolidado
						echo "Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego. Si el problema persiste, p&oacute;ngase en contacto con el administrador de esta p&aacute;gina.";
			}
echo "
<form action=\"http://www.gorecoquimbo.cl/oremi/opanel/inicio.php\" method=\"post\">
<input type=\"submit\" name=\"acepta\" value=\"Aceptar\">
</form>
</div>";
		}
	   
	   ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../../logout.php"); }
?>