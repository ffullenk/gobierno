<?php
/* header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/

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
    encOremi();
	izqOremi();
	modOremi("C");
?>
    <div >
       <div >
<!-- Central -->
<?php
  // Seteamos, que los campos se hayan completado
  $id			= $_POST["id"];
  $nroEventos	= $_POST["nroEventos"];
  $sesAlfa		= $_POST["sesAlfa"];
  
	$evento		= $_POST["evento"];
	$ubicacion	= $_POST["ubicacion"];
	$fecha		= $_POST["fecha"];
	$hora		= $_POST["hora"];
	$titulo		= $_POST["titulo"];
	$resumen	= $_POST["resumen"];
	$nivel		= $_POST["nivel"];
	$observaciones = $_POST["observaciones"];

	$dp_afectadas		= $_POST["dp_afectadas"];
	$dp_menorhab		= $_POST["dp_menorhab"];
	$dp_damnificadas	= $_POST["dp_damnificadas"];
	$dp_maynhab			= $_POST["dp_maynhab"];
	$dp_heridas			= $_POST["dp_heridas"];
	$dp_destirr			= $_POST["dp_destirr"];
	$dp_muertas			= $_POST["dp_muertas"];
	$dp_noevaluada		= $_POST["dp_noevaluada"];
	$dp_desaparecidas	= $_POST["dp_desaparecidas"];
	$dp_albergados		= $_POST["dp_albergados"];
  
	$servicios	= $_POST["servicios"];
	$montodanos	= $_POST["montodanos"];
  
  
  $cCont = 0;
  if($evento=="") { $faltaCampo[$cCont++] = " Debe Seleccionar el Tipo de Evento."; }
  if($ubicacion=="") { $faltaCampo[$cCont++] = " Debe Seleccionar la Ubicaci&oacute;n del Evento."; }
  if($fecha=="") { $faltaCampo[$cCont++] = " Debe Especificar la fecha de ocurrencia del Evento."; }
  if($hora=="") { $faltaCampo[$cCont++] = " Debe Especificar la hora de ocurrencia del Evento."; }
  if($titulo=="") { $faltaCampo[$cCont++] = " Debe Especificar un T&iacute;tulo para el Evento."; }
  if($resumen=="") { $faltaCampo[$cCont++] = " Debe Especificar un resumen para el Evento."; }
  
  if($dp_afectadas<0) {$faltaCampo[$cCont++] = " Personas Afectadas.";}
  if($dp_menorhab<0) {$faltaCampo[$cCont++] = " Daño Menor Habitable.";}
  if($dp_damnificadas<0) {$faltaCampo[$cCont++] = " Personas Damnificadas.";}
  if($dp_maynhab<0) {$faltaCampo[$cCont++] = " Daño Mayor No Habitable.";}
  if($dp_heridas<0) {$faltaCampo[$cCont++] = " Personas Heridas.";}
  if($dp_destirr<0) {$faltaCampo[$cCont++] = " Viviendas Destruidas Irrecuperable.";}
  if($dp_muertas<0) {$faltaCampo[$cCont++] = " Personas Muertas.";}
  if($dp_noevaluada<0) {$faltaCampo[$cCont++] = " Viviendas No Evaluadas.";}
  if($dp_desaparecidas<0) {$faltaCampo[$cCont++] = " Personas Desaparecidas.";}
  if($dp_albergados<0) {$faltaCampo[$cCont++] = " Personas Albergadas.";}
  
  
  if($servicios=="") { $faltaCampo[$cCont++] = " Debe Especificar una descrioci&oacute;n para los servicios."; }
  if($montodanos<0) { $faltaCampo[$cCont++] = " Debe Especificar monto en daños."; }
  

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

		$fecha_ = convertir_fecha($fecha);
		$nroAlfa = $nroEventos + 1;
		$despacha = "S";

        $rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsEvento->FieldByInsert( "EVENTOALFA_ID", "'$id'" );
		$rsEvento->FieldByInsert( "ENCARGADO_ID", "'$global_qk'" );
		$rsEvento->FieldByInsert( "TPEVENTO_ID", "'$evento'" );
		$rsEvento->FieldByInsert( "TPUBICACION_ID", "'$ubicacion'" );
		$rsEvento->FieldByInsert( "TPCAPRESPUESTA_ID", "'$nivel'" );
		$rsEvento->FieldByInsert( "ESTADOEVENTO_ID", "'"._eventoCerrado_."'" );
		$rsEvento->FieldByInsert( "DESPACHADO", "'$despacha'" );
		$rsEvento->FieldByInsert( "TITULOINFORME", "'$titulo'" );
		$rsEvento->FieldByInsert( "RESUMEN", "'$resumen'" );
		$rsEvento->FieldByInsert( "FECHA", "'$fecha_'" );
		$rsEvento->FieldByInsert( "HORA", "'$hora'" );
		if($observaciones!="") { $rsEvento->FieldByInsert( "OBSERVACIONES", "'$observaciones'" ); }
		$rsEvento->FieldByInsert( "NRO_INFORME", "'$nroAlfa'" );

		$poneRegistro = $rsEvento->execInsert( "INFORMEALFA" , 1);

		if($poneRegistro==true) {
			// Registro ingresado satisfactoriamente
				// Recuperamos el ID del EventoAlfa creado recientemente e incrementaremos el NRO_INFORMES de EVENTOALFA
				$rsUpEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				$rsUpEvento->FieldByUpdate( "NRO_EVENTOS" , "'$nroAlfa'" );
				$rsUpEvento->FieldByUpdate( "ESTADOEVENTO_ID" , "'"._eventoCerrado_."'" );
				$rsUpEvento->FieldByInsert( "FECHA_TERMINO", "'$fecha_'" );
				$rsUpEvento->FieldByInsert( "HORA_TERMINO", "'$hora'" );
				$rsUpEvento->WhereByUpdate( "EVENTOALFA_ID" , "'$id'" );
				$poneRegistro = $rsUpEvento->execUpdate( "EVENTOALFA" , 1);

				if($poneRegistro == true ) { 
					// Ya incrementado los nros alfas para este evento, procedemos a registras los demas itemes del informe alfa, primero, obtenemos el ID del Informe Alfa creado
					$rsIDIA = new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$idiaSQL = "SELECT INFORMEALFA_ID 
								FROM INFORMEALFA 
								WHERE EVENTOALFA_ID='".$id."' AND 
								ENCARGADO_ID='".$global_qk."' 
								ORDER BY INFORMEALFA_ID DESC LIMIT 1";
					$rsIDIA->Open($idiaSQL);
					$nroIDIA= $rsIDIA->RecordCount();
					if($nroIDIA>0) {
						$rsIDIA->moveNext();
						$idAlfa = $rsIDIA->FieldByNumber(0);
					}
					
					// Obtenido el ID Alfa, nos dedicamos a ingresar los restantes itemes
					
					/* Alfa Daños */
			        $rsAlfaDanos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$rsAlfaDanos->FieldByInsert( "INFORMEALFA_ID", "'$idAlfa'" );
					$rsAlfaDanos->FieldByInsert( "PERSONAS_AFECTADAS", "'$dp_afectadas'" );
					$rsAlfaDanos->FieldByInsert( "PERSONAS_DAMNIFICADAS", "'$dp_damnificadas'" );
					$rsAlfaDanos->FieldByInsert( "PERSONAS_HERIDAS", "'$dp_heridas'" );
					$rsAlfaDanos->FieldByInsert( "PERSONAS_MUERTAS", "'$dp_muertas'" );
					$rsAlfaDanos->FieldByInsert( "PERSONAS_DESAPARECIDAS", "'$dp_desaparecidas'" );
					$rsAlfaDanos->FieldByInsert( "PERSONAS_ALBERGADAS", "'$dp_albergados'" );
					$rsAlfaDanos->FieldByInsert( "VIVIENDAS_DANO_MENOR", "'$dp_menorhab'" );
					$rsAlfaDanos->FieldByInsert( "VIVIENDAS_DANO_MAYOR", "'$dp_maynhab'" );
					$rsAlfaDanos->FieldByInsert( "VIVIENDAS_DESTRUIDA", "'$dp_destirr'" );
					$rsAlfaDanos->FieldByInsert( "VIVIENDAS_NOEVALUADAS", "'$dp_noevaluada'" );
					$rsAlfaDanos->FieldByInsert( "SERVICIOS_BASICOS", "'$servicios'" );
					$rsAlfaDanos->FieldByInsert( "MONTO_DANOS", "'$montodanos'" );

					$poneAlfaDanos = $rsAlfaDanos->execInsert( "ALFADANOS" , 1);

					// Grabar Alfas Decisiones, Recursos y Necesidades, y a la vez eliminarlos del Temporal.
					$poneAlfaDecisiones=true;
					$poneAlfaRecursos=true;
					$poneAlfaNecesidades=true;
					
					// Ver si existen Temporales Decisiones
					$rsTDec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$sqlTDec="SELECT ACCION, TIEMPO FROM TEMPDEC WHERE TPO='".$sesAlfa."'";
					$rsTDec->Open($sqlTDec);
					$nroTDec=$rsTDec->RecordCount();

					if($nroTDec>0) {
					 	$rsATdec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
					 	
						while($rsTDec->moveNext()) {
							$rsATdec->FieldByInsert( "INFORMEALFA_ID", "'$idAlfa'" );
							$rsATdec->FieldByInsert( "ACCION", "'".$rsTDec->FieldByNumber(0)."'" );
							$rsATdec->FieldByInsert( "TIEMPO", "'".$rsTDec->FieldByNumber(1)."'" );
							$poneAlfaD = $rsATdec->execInsert("ALFADECISIONES",1);
							if($poneAlfaD==false){$poneAlfaNecesidades=false;}
						}
						//Una vez traspasadas :S eliminamos desde Temporal las entradas para este Alfa
						$rsETdec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaRegistro=$rsETdec->Open( "delete from TEMPDEC WHERE TPO='".$sesAlfa."'");
					}
					
					
					// Ver si existen Temporales Recursos
					$rsTRec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$sqlTRec="SELECT RECURSO_ID, DESCRIPCION, CANTIDAD, GASTO FROM TEMPREC WHERE TPO='".$sesAlfa."'";
					$rsTRec->Open($sqlTRec);
					$nroTRec=$rsTRec->RecordCount();

					if($nroTRec>0) {
					 	$rsATrec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
					 	
						while($rsTRec->moveNext()) {
							$rsATrec->FieldByInsert( "INFORMEALFA_ID", "'$idAlfa'" );
							$rsATrec->FieldByInsert( "RECURSO_ID", "'".$rsTRec->FieldByNumber(0)."'" );
							$rsATrec->FieldByInsert( "DESCRIPCION", "'".$rsTRec->FieldByNumber(1)."'" );
							$rsATrec->FieldByInsert( "CANTIDAD", "'".$rsTRec->FieldByNumber(2)."'" );
							$rsATrec->FieldByInsert( "GASTO", "'".$rsTRec->FieldByNumber(3)."'" );
							$poneAlfaR=$rsATrec->execInsert("ALFARECURSOS",1);
							if($poneAlfaR==false){$poneAlfaRecursos=false;}
						}
						//Una vez traspasadas :S eliminamos desde Temporal las entradas para este Alfa
						$rsETrec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaRegistro=$rsETrec->Open( "delete from TEMPREC WHERE TPO='".$sesAlfa."'");
					}


					// Ver si existen Temporales Necesidades
					$rsTNec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$sqlTNec="SELECT TPNECESIDAD_ID, CANTIDAD, MOTIVO FROM TEMPNEC WHERE TPO='".$sesAlfa."'";
					$rsTNec->Open($sqlTNec);
					$nroTNec=$rsTNec->RecordCount();

					if($nroTNec>0) {
					 	$rsATnec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
					 	
						while($rsTNec->moveNext()) {
							$rsATnec->FieldByInsert( "INFORMEALFA_ID", "'$idAlfa'" );
							$rsATnec->FieldByInsert( "TPNECESIDAD_ID", "'".$rsTNec->FieldByNumber(0)."'" );
							$rsATnec->FieldByInsert( "CANTIDAD", "'".$rsTNec->FieldByNumber(1)."'" );
							$rsATnec->FieldByInsert( "MOTIVO", "'".$rsTNec->FieldByNumber(2)."'" );
							$poneAlfaN=$rsATnec->execInsert("ALFANECESIDADES",1);
							if($poneAlfaN==false){$poneAlfaNecesidades=false;}
						}
						//Una vez traspasadas :S eliminamos desde Temporal las entradas para este Alfa
						$rsETnec=new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaRegistro=$rsETnec->Open( "delete from TEMPNEC WHERE TPO='".$sesAlfa."'");
					}
					

// Chequeamos que todas las instancias de Agregar sobre las Tablas de Informes Alfas hayan sido correctas
					if( ($poneAlfaDanos==true) && ($poneAlfaDecisiones==true) && ($poneAlfaNecesidades==true) && ($poneAlfaRecursos==true) ) {
					 
					 	echo "<table border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" >
								<tr><td height=\"15\"></td></tr>
									<tr><td style=\"border:1px solid #cdcdcd; padding:5px; font-family:Arial, Verdana; font-size:10pt;\">Se ha enviado un email al Director Provincial y Regional de Protecci&oacute;n Civil y Emergencias, con el fin de ponerlos en antecedentes que el <strong>Evento ha sido Cerrado</strong>. Presione Aceptar para volver a la p&aacute;gina principal.</td>
								</tr> 
								<tr><td height=\"15\"></td></tr>
								<tr><td style=\"border-top:3px solid #C0D2DC;\">&nbsp;</td></tr>
								<tr><td height=\"25\"><a href=\""._rutaoPanel_."inicio.php\">Aceptar</a></td></tr>								
							  </table>";
					
													
						// *************************************************************************** //
						// **  ENVIAMOS UN EMAIL AL ENCARGADO PROVINCIAL Y REGIONAL MENCIONANDO QUE ** //
						// **              EL INFORMEALFA HA SIDO GENERADO Y ENVIADO.               ** //
						// *************************************************************************** //

						// Vemos la provincia del $global_qk actual
						$rsProvCom = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sqlProvCom = "SELECT P.PROV_ID, COMUNA, PROVINCIA 
											FROM ENCARGADOS AS E, COMUNA AS C, PROVINCIA AS P   
											WHERE E.COM_ID=C.COM_ID AND 
											C.PROV_ID=P.PROV_ID AND 
											E.ENCARGADO_ID=\"".$global_qk."\" ";
						$rsProvCom->Open($sqlProvCom);
						$nroProvCom = $rsProvCom->RecordCount();

						if($nroProvCom>0) {
							$rsProvCom->moveNext();

						// Buscamos al Encargado Provincial
							$rsProv= new Recordset($SERVER, $DB, $USER, $PASSWORD);
							$sqlProv = "SELECT APELLIDOS, NOMBRES, EMAIL 
												FROM ENCARGADOS AS E, COMUNA AS C  
												WHERE E.COM_ID=C.COM_ID AND 
												C.PROV_ID=\"".$rsProvCom->FieldByNumber(0)."\" AND 
												E.CARGO_ID=2";
							$rsProv->Open($sqlProv);
							$nroProv = $rsProv->RecordCount();

							if($nroProv>0) {
								$email_ep = array();
								while($rsProv->moveNext()) {
									$email_ep[] = $rsProv->FieldByNumber(2);
								}

								// Teniendo cargado a los Encargados Provinciales, les mando el email.
								@include("../../../lib/correo.php");
								$emailEmisor="oremiiv@gorecoquimbo.cl";
								$asunto="Informes Alfas:: OREMI Coquimbo";
								$mail = new correo();
								$mail->setEmisor("Informe Alfa Generado",$emailEmisor);
$Mensaje_A_Responsables = " 
La Oficina Comunal de Protección Civil y Emergencias de la comuna de ".$rsProvCom->FieldByNumber(1).", informa que ha Despachado un Informe Alfa [Cerrar Evento] para su consolidacion en la Oficina Provincial de ".$rsProvCom->FieldByNumber(2)." \n\n 

Evento: ".$tipoEvento."\n\n
Titulo: ".$tituloEvento."\n\n

Para su conocimiento y fines. \n\n


Atte.,
Coordinacion Sistema de Generacion de Informes Alfas
OREMI Region de Coquimbo.";

								for($i=0; $i<count($email_ep);$i++) {
									$mail->putCorreo($email_ep[$i], $asunto, $Mensaje_A_Responsables);
								}
								$mail->putCorreo(_emailOREMI_, $asunto, $Mensaje_A_Responsables);
								$mail->sendCorreo();

							}
							
						}

							
							
							
											

					} else {

						// Ocurrio en alguna Tabla un error al momento de Agregar datos, por ende se eliminan todas las instancias para INFORMEALFA_ID actual
						
						/* Eliminar ID desde Alfa Daños */
						$rsAlfaDanos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaAlfaDanos=$rsAlfaDanos->Open( "DELETE FROM ALFADANOS WHERE INFORMEALFA_ID=\"".$idAlfa."\" ");
						
						/* Eliminar ID desde Alfa Decisiones */						
						$rsAlfaDecisiones = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaAlfaDecisiones=$rsAlfaDecisiones->Open( "DELETE FROM ALFADECISIONES WHERE INFORMEALFA_ID=\"".$idAlfa."\" ");

						/* Eliminar ID desde Alfa Necesidades */
						$rsAlfaNecesidades = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaAlfaNecesidades=$rsAlfaNecesidades->Open( "DELETE FROM ALFANECESIDADES WHERE INFORMEALFA_ID=\"".$idAlfa."\" ");

						/* Eliminar ID desde Alfa Recursos */
						$rsAlfaRecursos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaAlfaRecursos=$rsAlfaRecursos->Open( "DELETE FROM ALFARECURSOS WHERE INFORMEALFA_ID=\"".$idAlfa."\" ");


						/* Eliminamos el Informe Alfa */
						$rsAlfa = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sacaAlfa=$rsAlfa->Open( "DELETE FROM INFORMEALFA WHERE INFORMEALFA_ID=\"".$idAlfa."\" ");
						
						/* Volvemos sobre EVENTOALFA para decrementar el NRO_INFORMES */
						$rsDnEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$nroAlfa--;
				
						$rsDnEvento->FieldByUpdate( "NRO_EVENTOS" , "'$nroAlfa'" );
						$rsUpEvento->FieldByUpdate( "ESTADOEVENTO_ID" , "'"._eventoAbierto_."'" );
						$rsDnEvento->WhereByUpdate( "EVENTOALFA_ID" , "$id" );
						$poneRegistro = $rsDnEvento->execUpdate( "EVENTOALFA" , 1);
						if($poneRegistro == true ) { 
							mensajeIA("errorForm","errorBD","Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego.");
						}

					} // FIN chequea todas las instancias

				
			} else {
				// FIN nroInc
				mensajeIA("errorForm","errorBD","Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego. [nroinc] ");
			}

		} else {
			// FIN Pone registro sobre InformeAlfa
			mensajeIA("errorForm","errorBD","Ha ocurrido un problema interno y no se ha podido añadir el registro a la base de datos. Por favor, intente luego. [informealfa]");
		}
		
  } // FIN Contador de Variables

?>
<!-- Central -->
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../logout.php"); }
?>