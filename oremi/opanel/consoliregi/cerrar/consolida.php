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
	modOremi("C"); // Crea un Nuevo Informe Alfa/Consolidado
?>
    <div >
       <div >
	   <?php
	    /* Seteamos las variables pasadas*/
		$id			= $_POST["id"];
		$sesAlfa	= $_POST["sesAlfa"];
		
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
		if($ubicacion=="") { $faltaCampo[$cCont++] = " Debe Seleccionar la Ubicaci&oacute;n del Consolidado."; }
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
			$rsConsolida->FieldByInsert( "EVENTOREGION_ID", "'$id'" );
			$rsConsolida->FieldByInsert( "ESTADOEVENTO_ID", "'"._eventoCerrado_."'" );
			$rsConsolida->FieldByInsert( "TPEVENTO_ID", "'$evento'" );
			$rsConsolida->FieldByInsert( "TPUBICACION_ID", "'$ubicacion'" );
			$rsConsolida->FieldByInsert( "TPCAPRESPUESTA_ID", "'$nivel'" );
			$rsConsolida->FieldByInsert( "TITULOEVENTO", "'$titulo'" );
			$rsConsolida->FieldByInsert( "FECHA", "'$fecha_'" );
			$rsConsolida->FieldByInsert( "HORA", "'$hora'" );
			$rsConsolida->FieldByInsert( "OBSERVACIONES", "'$observaciones'" );
			$rsConsolida->FieldByInsert( "NRO_CONSOLIDADO", "'$nroEvento'" );
			$poneRegistro = $rsConsolida->execInsert( "CONSOLIDAREG" , 1);

			if($poneRegistro==true) {
				// Grabamos consolidado
				// --> Vamos a los Informes Alfas para marcarlos como ya consolidados de acuerdo al ID creado recientemente
					$rsConsCreado =  new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$sqlConsCreado = "SELECT CONSOLIDAREG_ID 
										FROM CONSOLIDAREG 
										WHERE EVENTOREGION_ID=\"$id\" AND 
										NRO_CONSOLIDADO=\"$nroEvento\" ";
					$rsConsCreado->Open($sqlConsCreado);
					$nroConsCreado= $rsConsCreado->RecordCount();
					if($nroConsCreado>0) {
						$rsConsCreado->moveNext();
						$IDCons = $rsConsCreado->FieldByNumber(0);
						
						// Actualizamos los Conslidados Provinciales que Consolidamos en esta oportunidad
						$aLista=array_keys($_POST["iaC"]);
						$rsUpEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$ActReg=true;
						
						foreach($aLista as $iId) {
							$rsUpEvento->FieldByUpdate( "CONSOLIDAREG_ID" , "'$IDCons'" );
							$rsUpEvento->FieldByUpdate( "ESTADOEVENTO_ID" , "'"._eventoCerrado_."'" );
							$rsUpEvento->WhereByUpdate( "CONSOLIDAPROV_ID" , "".$iaC[$iId]."" );
							$actualizaRegistro = $rsUpEvento->execUpdate( "CONSOLIDAPROV" , 1);
							if($actualizaRegistro==false) { $ActReg=false;}
						}


						/*
						Situacion por Comunas: 
							Agrupamos las comunas que se encuentran bajo este consolidado para agregarlas a CONSREGSIT
						*/
						$sLista=array_keys($_POST["iaC"]);
						foreach($sLista as $sitID) {
							$rsEncCom = new Recordset($SERVER, $DB, $USER, $PASSWORD);
							$sqlEncCom = "SELECT INFORMEALFA_ID, E.COM_ID 
											FROM INFORMEALFA AS A, ENCARGADOS AS E 
											WHERE A.ENCARGADO_ID=E.ENCARGADO_ID AND 
											A.CONSOLIDAPROV_ID=\"".$iaC[$sitID]."\" ";

							$rsEncCom->Open($sqlEncCom);
							$nroEncCom = $rsEncCom->RecordCount();
							if($nroEncCom>0) {
								$poneSit=true;
								while($rsEncCom->moveNext()) {								
									$rsAlfaD = new Recordset($SERVER, $DB, $USER, $PASSWORD);
									$sqlAlfaD = "SELECT PERSONAS_DAMNIFICADAS, PERSONAS_ALBERGADAS, VIVIENDAS_DANO_MENOR, VIVIENDAS_DANO_MAYOR, VIVIENDAS_DESTRUIDA, VIVIENDAS_NOEVALUADAS 
													FROM ALFADANOS 
													WHERE INFORMEALFA_ID=\"".$rsEncCom->FieldByNumber(0)."\" ";

									$rsAlfaD->Open($sqlAlfaD);
									$nroalfaD=$rsAlfaD->RecordCount();

									
									if($nroalfaD>0) {
									  $rsAlfaD->moveNext();
									  // Grabamos en CONSREGSIT
										$rsConsSit = new Recordset($SERVER, $DB, $USER, $PASSWORD);
										$rsConsSit->FieldByInsert( "CONSOLIDAREG_ID", "'$IDCons'" );
										$rsConsSit->FieldByInsert( "COM_ID", "'".$rsEncCom->FieldByNumber(1)."'" );
										$rsConsSit->FieldByInsert( "PERSONAS_DAMNIFICADAS", "'".$rsAlfaD->FieldByNumber(0)."'" );
										$rsConsSit->FieldByInsert( "PERSONAS_ALBERGADAS", "'".$rsAlfaD->FieldByNumber(1)."'" );
										$rsConsSit->FieldByInsert( "VIVIENDAS_DANO_MENOR", "'".$rsAlfaD->FieldByNumber(2)."'" );
										$rsConsSit->FieldByInsert( "VIVIENDAS_DANO_MAYOR", "'".$rsAlfaD->FieldByNumber(3)."'" );
										$rsConsSit->FieldByInsert( "VIVIENDAS_DESTRUIDA", "'".$rsAlfaD->FieldByNumber(4)."'" );
										$rsConsSit->FieldByInsert( "VIVIENDAS_NOEVALUADAS", "'".$rsAlfaD->FieldByNumber(5)."'" );
										$poneSituacion = $rsConsSit->execInsert( "CONSREGSIT" , 1);
										if($poneSituacion==false) { $poneSit=false;}
									}
								}								
							}
						}
							//
						
						// Si ingreso Puntos Criticos, lo ingresamos
						$ponePuntos=true;
						// Ver si existen Temporales Puntos Criticos
						$rsTpc=new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sqlTpc="SELECT IDENTIFICACION, UBICACION, DANO, ESTADOACTUAL, SOLUCION, GESTION  FROM TMPPC WHERE TPO='".$sesAlfa."'";
						$rsTpc->Open($sqlTpc);
						$nroTpc=$rsTpc->RecordCount();

						if($nroTpc>0) {
							$rsATpc=new Recordset($SERVER, $DB, $USER, $PASSWORD);
							while($rsTpc->moveNext()) {
								$rsATpc->FieldByInsert("CONSOLIDAREG_ID", "'$IDCons'" );
								$rsATpc->FieldByInsert("IDENTIFICACION", "'".$rsTpc->FieldByNumber(0)."'" );
								$rsATpc->FieldByInsert("UBICACION", "'".$rsTpc->FieldByNumber(1)."'" );
								$rsATpc->FieldByInsert("DANO", "'".$rsTpc->FieldByNumber(2)."'" );
								$rsATpc->FieldByInsert("ESTADOACTUAL", "'".$rsTpc->FieldByNumber(3)."'" );
								$rsATpc->FieldByInsert("SOLUCION", "'".$rsTpc->FieldByNumber(4)."'" );
								$rsATpc->FieldByInsert("GESTION", "'".$rsTpc->FieldByNumber(5)."'" );

								$poneAlfaD = $rsATpc->execInsert("CONSREGPUNTOS",1);
								if($poneAlfaD==false){$ponePuntos=false;}
							}
							
							//Una vez traspasadas :S eliminamos desde Temporal las entradas para este Cons
							$rsETpc=new Recordset($SERVER, $DB, $USER, $PASSWORD);
							$sacaRegistro=$rsETpc->Open( "delete from TMPPC WHERE TPO='".$sesAlfa."'");
						}


					} // nroConsCreado > 0 

echo"<div style=\"margin:0 auto;text-align:center;border:1px solid #990000;font:10pt Verdana;color:#333;width:75%;\">";		
					
					if( ($ActReg==true) && ($poneSit==true) && ($ponePuntos==true) ) {
					
						// Actualizamos el Nro de Eventos Consolidados en EVENTOREGION
						$rsUpEvento->FieldByUpdate( "NRO_EVENTOS" , "'$nroEvento'" );
						$rsUpEvento->FieldByUpdate( "ESTADOEVENTO_ID" , "'"._eventoCerrado_."'" );
						$rsUpEvento->WhereByUpdate( "EVENTOREGION_ID" , "'$id'" );
						$poneRegistro = $rsUpEvento->execUpdate( "EVENTOREGION" , 1);
						echo "El Registro ha sido Añadido de forma satisfactoria.";
						
// *************************************************************************** //
// **        ENVIAMOS UN EMAIL AL ENCARGADO REGIONAL MENCIONANDO QUE        ** //
// **         EL CONSOLIDADO REGIONAL HA SIDO GENERADO Y ENVIADO.           ** //
// *************************************************************************** //

// Vemos la region del $global_qk actual
$rsProvCom = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlProvCom = "SELECT REGION_ID FROM ENCARGADOS AS E, COMUNA AS C, PROVINCIA AS P WHERE E.COM_ID=C.COM_ID AND C.PROV_ID=P.PROV_ID AND E.ENCARGADO_ID=\"".$global_qk."\" ";
$rsProvCom->Open($sqlProvCom);
$nroProvCom = $rsProvCom->RecordCount();

if($nroProvCom>0) {
  $rsProvCom->moveNext();
  // Buscamos al Encargado Prensa de la Region
  $rsProv= new Recordset($SERVER, $DB, $USER, $PASSWORD);
  $sqlProv = "SELECT APELLIDOS, NOMBRES, EMAIL, REGION FROM ENCARGADOS AS E, COMUNA AS C, PROVINCIA AS P, REGION AS R WHERE E.COM_ID=C.COM_ID AND C.PROV_ID=P.PROV_ID AND P.REGION_ID=R.REGION_ID AND R.REGION_ID=\"".$rsProvCom->FieldByNumber(0)."\" AND E.CARGO_ID=5";

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
    $asunto="Cierre Consolidado Regional: OREMI ".$nregion;
    $mail = new correo();
    $mail->setEmisor("Cierre Consolidado Regional",$emailEmisor);
$Mensaje_A_Responsables = " 
La Oficina Regional de Protección Civil y Emergencias, informa que se ha Despachado el Cierre para el Consolidado Regional desde la Region de ".$nregion.":  \n\n"
.$titulo."\n\n 

Para su conocimiento y fines. \n\n


Atte.,
Coordinacion Sistema de Generacion de Informes Alfas
OREMI Region de Coquimbo.";

for($i=0; $i<count($email_ep);$i++) {
  $mail->putCorreo($email_ep[$i], "'".$asunto."'", $Mensaje_A_Responsables);
}
$mail->putCorreo(_emailOREMI_, "'".$asunto."'", $Mensaje_A_Responsables);
$mail->putCorreo(_prensaOREMI_, "'".$asunto."'", $Mensaje_A_Responsables);
$mail->sendCorreo();

    }
  }
						
						
						
					} else {
					
						// Ocurrio un error
						// Eliminamos
						$rsEPuntos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaEPuntos=$rsEPuntos->Open( "DELETE FROM CONSREGPUNTOS WHERE CONSOLIDAREG_ID=\"".$IDCons."\" ");
						
						$rsESit = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaESit=$rsEPuntos->Open( "DELETE FROM CONSREGSIT WHERE CONSOLIDAREG_ID=\"".$IDCons."\" ");

						$eLista=array_keys($_POST["iaC"]);
						$rsE = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$cambiaReg=0;
						foreach($eLista as $eId) {
							$rsE->FieldByUpdate( "CONSOLIDAREG_ID" , "'$cambiaReg'" );
							$rsE->FieldByUpdate( "ESTADOEVENTO_ID" , "'"._eventoCreado_."'" );
							$rsE->WhereByUpdate( "CONSOLIDAPROV_ID" , "".$iaC[$eId]."" );
							$eliminaRegistro = $rsE->execUpdate( "CONSOLIDAPROV" , 1);
						}
						
						echo "Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego.";
					}
echo "
<form action=\"http://www.gorecoquimbo.cl/oremi/opanel/inicio.php\" method=\"post\">
<input type=\"submit\" name=\"acepta\" value=\"Aceptar\">
</form>
</div>";

		


			} else { 
echo"<div style=\"margin:0 auto;text-align:center;border:1px solid #990000;font:10pt Verdana;color:#333;width:75%;\">Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego.

<form action=\"http://www.gorecoquimbo.cl/oremi/opanel/inicio.php\" method=\"post\">
<input type=\"submit\" name=\"acepta\" value=\"Aceptar\">
</form>
</div>";
			}
				
					
			
		}
	   
	   ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../../logout.php"); }
?>