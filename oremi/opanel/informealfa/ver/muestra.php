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
    @include("../utiles/utiles.php"); ?>

<html>
<head>
<title>::... OREMI: Informe Alfa &middot;&middot;&middot;::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../estilos/oremicons.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>
<style type="text/css">
<!--
.Estilo1 {color: #666}
-->
</style>
</head>

<body bgcolor="#f8f8f8">
<table width="651" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666">
  <tr>
    <td><table width="651" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
        <tr>
          <td class="Estilo1"><table width="650" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td align="center"><table width="95%" border="0" cellpadding="0" cellspacing="1" id="titulo">
                    <tr>
                      <td>
<?php
	// Ubicar Evento Principal
$rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlEvento = "SELECT TITULOINFORME, TITULOEVENTO, I.ENCARGADO_ID, NOMBRES, APELLIDOS, COMUNA, PROVINCIA, REGION, I.TPEVENTO_ID, I.TPUBICACION_ID, FECHA_INICIO, HORA_INICIO, I.RESUMEN, FECHA, HORA, TPCAPRESPUESTA, NRO_INFORME, NRO_EVENTOS, OBSERVACIONES 
				FROM INFORMEALFA AS I, EVENTOALFA AS A, ENCARGADOS AS E, COMUNA AS C, PROVINCIA AS P, REGION AS R, TP_CAPRESPUESTA AS U 
				WHERE I.EVENTOALFA_ID=A.EVENTOALFA_ID AND 
				I.ENCARGADO_ID=E.ENCARGADO_ID AND
				E.COM_ID=C.COM_ID AND
				C.PROV_ID=P.PROV_ID AND 
				P.REGION_ID=R.REGION_ID AND 
				I.TPCAPRESPUESTA_ID=U.TPCAPRESPUESTA_ID AND 
				I.EVENTOALFA_ID = \"$id\" AND 
				I.INFORMEALFA_ID=\"$alfa\" ";
$rsEvento->Open($sqlEvento);
$nroEvento = $rsEvento->RecordCount();
if( $nroEvento > 0 ) {
		$rsEvento->moveNext();
		$tituloInforme	= $rsEvento->FieldByNumber(0);
		$tituloEvento	= $rsEvento->FieldByNumber(1);
		$nRegion		= $rsEvento->FieldByNumber(7);
		$nProvincia		= $rsEvento->FieldByNumber(6);
		$nComuna		= $rsEvento->FieldByNumber(5);
		$nNombre		= $rsEvento->FieldByNumber(3) . " " . $rsEvento->FieldByNumber(4);
		
		$tEvento	= $rsEvento->FieldByNumber(8);
		$tUbicacion	= $rsEvento->FieldByNumber(9);
		
		$nFecha		= $rsEvento->FieldByNumber(10);
		$nHora		= $rsEvento->FieldByNumber(11);
		
		$nResumen	= $rsEvento->FieldByNumber(12);
		
		$iFecha		= $rsEvento->FieldByNumber(13);
		$iHora		= $rsEvento->FieldByNumber(14);
		
		$cCapResp	= $rsEvento->FieldByNumber(15);
		
		$nInfAlfa	= $rsEvento->FieldByNumber(16);
		$nEveAlfa	= $rsEvento->FieldByNumber(17);
		$nObsAlfa	= $rsEvento->FieldByNumber(18);
}		
 // Ubicar el InformeAlfa Actual
?>
					    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                          <tr>
                            <td align="center" class="tit-1">INFORME DE INCIDENCIA NRO <?php echo $nInfAlfa. " de ". $nEveAlfa;?><br />
							<span class="tit-2"><?php echo $tituloEvento;?></span>							</td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td align="center">&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="identifica">
                    <tr> 
                      <td colspan="2" class="ident-1">I. Identificaci&oacute;n</td>
                    </tr>
                    <tr> 
                      <td> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="ident-2">
                          <tr> 
                            <td width="15%">Regi&oacute;n:</td>
                            <td width="85%">&nbsp;<strong><?php echo $nRegion; ?></strong></td>
                          </tr>
                          <tr> 
                            <td>Provincia:</td>
                            <td valign="top">&nbsp;<strong><?php echo $nProvincia; ?></strong></td>
                          </tr>
                          <tr> 
                            <td height="19">Comuna:</td>
                            <td>&nbsp;<strong><?php echo $nComuna; ?></strong></td>
                          </tr>
                        </table></td>
                      <td valign="top">
					     <table width="100%" border="0" cellpadding="0" cellspacing="0" class="ident-2">
                          <tr> 
                            <td>Fuente</td>
                          </tr>
                          <tr> 
                            <td><strong><?php echo $nNombre; ?></strong> </td>
                          </tr>
						  <tr> 
                            <td><strong><?php echo $nCargo; ?></strong></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="tipoev">
                    <tr> 
                      <td colspan="2" class="ev-1">II. Tipo de Evento</td>
                    </tr>
                    <tr> 
                      <td width="38%"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="ev-2">
                          <tr> 
                            <td>Evento</td>
                          </tr>
                          <tr> 
                            <td><strong>
<?php
    // Mostrar El Nombre del Tipo de Evento
$rsTPEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlTPEvento = "SELECT TPEVENTO FROM TP_EVENTO WHERE TPEVENTO_ID = \"$tEvento\" ";
$rsTPEvento->Open($sqlTPEvento);
$nroTPEvento = $rsTPEvento->RecordCount();
if( $nroTPEvento > 0 ) {
		$rsTPEvento->moveNext();
		echo $rsTPEvento->FieldByNumber(0);
}
?>							</strong></td>
                          </tr>
                          <tr> 
                            <td>Ocurrencia</td>
                          </tr>
                          <tr> 
                            <td><strong><?php echo fechaNuestra($nFecha) . " " . $nHora;?></strong></td>
                          </tr>
                        </table></td>
                      <td width="62%" ><table width="100%" border="0" cellspacing="0" cellpadding="0" class="ev-2">
                          <tr> 
                            <td >Descripci&oacute;n del Evento:</td>
                          </tr>
                          <tr> 
                            <td><strong><?php echo $tituloInforme; ?></strong></td>
                          </tr>
                          <tr> 
                            <td >Direcci&oacute;n/Ubicaci&oacute;n</td>
                          </tr>
                          <tr> 
                            <td><strong>
<?php
// Ubicacion del Evento
$rsUbicacion = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlUbicacion = "SELECT TPUBICACION FROM TP_UBICACION WHERE TPUBICACION_ID = \"$tUbicacion\" ";
$rsUbicacion->Open($sqlUbicacion);
$nroUbicacion = $rsUbicacion->RecordCount();
if( $nroUbicacion > 0 ) {
		$rsUbicacion->moveNext();
		echo $rsUbicacion->FieldByNumber(0);
}
?>
							</strong></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="danos">
                    <tr> 
                      <td colspan="2" class="dan-1">III. Da&ntilde;os Personas</td>
                    </tr>
                    <tr> 
                      <td width="60%"> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="dan-2">
                          <tr> 
                            <td height="137"> 
                              <?php
// Conocer Personas Afectadas con Tabla AlfaDanos
// Ubicacion del Evento
$rsDanos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlDanos = "SELECT PERSONAS_AFECTADAS, PERSONAS_DAMNIFICADAS, PERSONAS_HERIDAS, PERSONAS_MUERTAS, PERSONAS_DESAPARECIDAS, PERSONAS_ALBERGADAS, VIVIENDAS_DANO_MENOR, VIVIENDAS_DANO_MAYOR, VIVIENDAS_DESTRUIDA, VIVIENDAS_NOEVALUADAS, SERVICIOS_BASICOS, MONTO_DANOS 
				FROM ALFADANOS 
				WHERE INFORMEALFA_ID = \"$alfa\" ";
$rsDanos->Open($sqlDanos);
$nroDanos = $rsDanos->RecordCount();
if( $nroDanos > 0 ) {
		$rsDanos->moveNext();
$pAfectadas		= $rsDanos->FieldByNumber(0);
$pDamnificadas	= $rsDanos->FieldByNumber(1);
$pHeridas		= $rsDanos->FieldByNumber(2);
$pMuertas		= $rsDanos->FieldByNumber(3);
$pDesaparecidas	= $rsDanos->FieldByNumber(4);
$pAlbergadas	= $rsDanos->FieldByNumber(5);
$vDanMen		= $rsDanos->FieldByNumber(6);
$vDanMay		= $rsDanos->FieldByNumber(7);
$vDestruidas	= $rsDanos->FieldByNumber(8);
$vNoEvaluadas	= $rsDanos->FieldByNumber(9);
$servicios		= $rsDanos->FieldByNumber(10);
$montodanos		= $rsDanos->FieldByNumber(11);
}
?>
                              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td width="41%"><table width="95%" border="0" cellpadding="0" cellspacing="1" class="dan-3">
                                      <tr bgcolor="ffffff"> 
                                        <td width="78%">Afectadas</td>
                                        <td width="22%" align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $pAfectadas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Damnificadas</td>
                                        <td width="22%" align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $pDamnificadas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Heridas</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $pHeridas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Muertas</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $pMuertas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Desaparecidas</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $pDesaparecidas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Albergados</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $pAlbergadas; ?></strong></td>
                                      </tr>
                                    </table></td>
                                  <td width="52%"><table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666" class="dan-4">
                                      <tr bgcolor="ffffff"> 
                                        <td width="85%">Da&ntilde;o Menor Habitable</td>
                                        <td width="15%" align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $vDanMen; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Da&ntilde;o Mayor No Habitable</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $vDanMay; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Destruidas Irrecuperable</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $vDestruidas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>No Evaluadas</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $vNoEvaluadas; ?></strong></td>
                                      </tr>
                                    </table></td>
                                  <td width="1%"></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                      <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="servicios">
                                <tr> 
                                  <td class="serv-1">Servicios B&aacute;sicos, 
                                    Infraestructura y Otros:</td>
                                </tr>
                                <tr> 
                                  <td height="18" class="serv-2"><?php echo $servicios; ?></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;</td>
                          </tr>
                          <tr> 
                            <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="servicios" >
                                <tr> 
                                  <td class="serv-1">Monto Estimado en Da&ntilde;os</td>
                                </tr>
                                <tr> 
                                  <td class="serv-2"><?php echo $montodanos; ?></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>                      </td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="decisiones">
                    <tr> 
                      <td class="des-1">IV. Decisiones</td>
                    </tr>
                          <?php
// Decisiones Tomadas en InformeAlfa
$rsDecisiones = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlDecisiones = "SELECT ACCION, TIEMPO 
				FROM ALFADECISIONES 
				WHERE INFORMEALFA_ID = \"$alfa\" ";
$rsDecisiones->Open($sqlDecisiones);
$nroDecisiones = $rsDecisiones->RecordCount();
if( $nroDecisiones > 0 ) {?>
                    <tr> 
                      <td><table width="98%" border="0" cellpadding="0" cellspacing="1" class="tab-1">
                          <tr class="des-2"> 
                            <td width="63%">Acciones y Soluciones 
                              Inmediatas</td>
                            <td width="37%">Oportunidad (Tpo.) 
                              Restablecimiento</td>
                          </tr>
<?php
	while($rsDecisiones->moveNext()) {
?>
						<tr class="des-3"> 
                            <td class="des-4"><?php echo $rsDecisiones->FieldByNumber(0); ?></td>
                            <td class="des-4"><?php echo $rsDecisiones->FieldByNumber(1); ?></td>
                        </tr>					
<?php } 
} ?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="recursos">
                    <tr> 
                      <td class="rec-1">V. Recursos Involucrados</td>
                    </tr>
                    <?php
						// Conocer Recursos 
							$rsRecursos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
							$sqlRecursos = "SELECT TIPORECURSO, DESCRIPCION, CANTIDAD, GASTO 
											FROM ALFARECURSOS AS A, RECURSOS AS R 
											WHERE A.RECURSO_ID=R.RECURSO_ID AND 
											INFORMEALFA_ID = \"$alfa\" ";
							$rsRecursos->Open($sqlRecursos);
							$nroRecursos = $rsRecursos->RecordCount();
							if( $nroRecursos > 0 ) { ?>
			                    <tr> 
            			          <td align="center" valign="middle"> 
			                        <table width="98%" border="0" cellpadding="0" cellspacing="1" class="rectab-1">
            			              <tr class="rec-2"> 
			                            <td width="70%">Tipo</td>
			                            <td width="10%" >Cantidad</td>
			                            <td width="20%" >Gasto Estimado ($)</td>
			                          </tr>
										<?php
										$total=0;
										while($rsRecursos->moveNext()) { ?>
				                          <tr class="rec-5"> 
				                            <td class="rec-6" ><?php echo $rsRecursos->FieldByNumber(0) . " - " . $rsRecursos->FieldByNumber(1); ?></td>
				                            <td class="rec-6" ><?php echo $rsRecursos->FieldByNumber(2); ?></td>
		        		                    <td class="rec-6" ><?php echo $rsRecursos->FieldByNumber(3); ?></td>
				                          </tr>
										<?php	$total = $total + $rsRecursos->FieldByNumber(3); 
										} ?>
										<tr> 
                            <td colspan="2" bgcolor="f8f8f8" class="rec-2">Total</td>
                            <td  class="rec-6"><?php echo $total; ?></td>
                          </tr>
                        </table> 					
<?php
}
?>
                                               </td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="necesidades">
                    <tr class="nec-1"><td width="65%">VI. Evaluaci&oacute;n de Necesidades</td></tr>
<?php
// Necesidades
$rsNecesidades = new Recordset($SERVER, $DB, $USER, $PASSWORD);
$sqlNecesidades = "SELECT TPNECESIDAD, CANTIDAD, MOTIVO 
				FROM ALFANECESIDADES AS N, TP_NECESIDAD AS T 
				WHERE N.TPNECESIDAD_ID=T.TPNECESIDAD_ID AND 
				INFORMEALFA_ID='$alfa' ";
$rsNecesidades->Open($sqlNecesidades);
$nroNecesidades = $rsNecesidades->RecordCount();
if( $nroNecesidades > 0 ) { ?>
                    <tr> 
                      <td>
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td> 
                              <table width="98%" border="0" cellpadding="0" cellspacing="1" class="nectab-1">
                                <tr class="nec-2"> 
                                  <td width="30%">Tipo</td>
                                  <td width="10%">Cantidad</td>
                                  <td width="60%">Motivo</td>
                                </tr>
<?php							while($rsNecesidades->moveNext()) { ?>
                                	<tr class="nec-5"> 
	                                  <td class="nec-6"><?php echo $rsNecesidades->FieldByNumber(0); ?></td>
	                                  <td class="nec-6"><?php echo $rsNecesidades->FieldByNumber(1); ?></td>
	                                  <td class="nec-6"><?php echo $rsNecesidades->FieldByNumber(2); ?></td>
	                                </tr>
<?php							} ?>
                              </table>
							 </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
<?php } ?>
                  </table></td>
              </tr>

              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" id="capacidad">
                    <tr class="cap-1">
                      <td width="65%">VII. Capactidad de Respuesta </td>
                    </tr>
                    <tr> 
                      <td>
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr class="cap-2">
                            <td><?php echo $cCapResp; ?></td>
                          </tr>
                        </table>
						</td>
                    </tr>
                  </table></td>
              </tr>

              <tr>
                <td>&nbsp;</td>
              </tr>
			  
              <tr>
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" id="observaciones">
                    <tr class="obv-1">
                            <td>VIII. Observaciones</td>
                          </tr>
						  <tr>
                      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" >
                          
                          <tr>
                            <td><table width="100%" border="0" cellpadding="0" cellspacing="1">
                                <tr>
                                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="obv-2">                                   <tr>
                                        <td><?php echo $nObsAlfa; ?></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" id="responsable">
                    <tr>
                      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" >
                          <tr class="res-1">
                            <td>IX. Responsable</td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellpadding="0" cellspacing="1">
                                <tr>
                                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="res-2">                                   <tr><td>Identificaci&oacute;n</td><td></td></tr>
								   <tr><td>Fecha</td><td><?php echo fechaNuestra($iFecha); ?></td></tr>
								   <tr><td>Hora</td><td><?php echo $iHora; ?></td></tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php
} else { header("Location: ../../logout.php"); }
?>