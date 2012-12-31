<?php
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();

  // Constatar logeo previo
     Global $userN, $passN, $Nniv, $id, $alfa, $ev;
     include("admoremi_sesid.inc");

  if(!$loginCorrecto)
  {
    Header("location: index.php");
  }
  else
  {

?>
<html>
<head>
<title>::... OREMI: Informe Alfa &middot;&middot;&middot;::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>
</head>

<body bgcolor="#f8f8f8">
<table width="761" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="333333">
  <tr>
    <td><table width="760" border="0" cellpadding="0" cellspacing="0" bgcolor="ffffff">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                    <tr>
                      <td>
<?php
	// Ubicar Evento Principal
	   $con_evento = mysql_query( "SELECT idfuente, ocurrencia, nro_infalfas, idtipoevento, desctipoevento, idubicacion FROM Evento WHERE idevento = '$ev' ") or die( mysql_error() );
       if( $rEv = mysql_fetch_object( $con_evento ) ) {
	       $nIdFuente    = $rEv->idfuente;
		   $nOcurrencia  = $rEv->ocurrencia;
		   $nNroAlfas    = $rEv->nro_infalfas;
		   $nIdUbicacion = $rEv->idubicacion;
		   $nTipoEvento  = $rEv->idtipoevento;
		   $nDescEvento  = $rEv->desctipoevento;
       }
	   mysql_free_result( $con_evento );
	   
    // Ubicar el InformeAlfa Actual
	   $con_alfa = mysql_query( "SELECT idemergencia, idcapresp, observaciones, alfa_fecha FROM InformeAlfa WHERE idevento = '$ev' AND idalfa = '$alfa' ") or die( mysql_error() );
       if( $rAlfa = mysql_fetch_object( $con_alfa ) ){
           $nIdEmer = $rAlfa->idemergencia;
		   $nIdCapr = $rAlfa->idcapresp;
		   $nObserv = $rAlfa->observaciones;
		   $nFecha  = $rAlfa->alfa_fecha;
       }
	   mysql_free_result( $con_alfa );
       $fReg = substr( $nIdFuente, 0, 2);
       $fPro = substr( $nIdFuente, 2, 2);
       $fCom = substr( $nIdFuente, 4, 2);
	   
    // Posicionarse el Region, Provincia y Comuna
// "SELECT region, provincia, comuna FROM Region INNER JOIN Provincia ON Region.idreg = Provincia.idreg INNER JOIN Comuna ON Provincia.idpro = Comuna.idpro WHERE Comuna.idreg = '$fReg' AND Comuna.idpro = '$fPro' AND Comuna.idcom = '$fCom' "
	
	   $con_comuna = mysql_query("SELECT Comuna.idcom as idcom, Provincia.idpro as idprov, comuna, provincia, region,  Provincia.idreg as idregion from Provincia inner join Region ON Provincia.idreg = Region.idreg inner join Comuna ON Provincia.idpro = Comuna.idpro AND Provincia.idreg = Comuna.idreg WHERE Comuna.idreg = '$fReg' AND Comuna.idpro = '$fPro' AND Comuna.idcom = '$fCom' " ) or die( mysql_error() );
       if ( $rCom = mysql_fetch_object( $con_comuna ) ) {
            $nComuna = $rCom->comuna;
			$nProvincia = $rCom->provincia;
			$nRegion = $rCom->region;
       }
	   mysql_free_result( $con_comuna );

    // Conocer Nombre de la Fuente del InformeAlfa	   
	   $con_fuente = mysql_query( "SELECT nombre, cargo FROM FUENTE WHERE idfuente = '$nIdFuente' ") or die( mysql_error() );
       if ( $rFuente = mysql_fetch_object( $con_fuente ) ){
	        $nNombre = $rFuente->nombre;
			$nCargo  = $rFuente->cargo;
       }
       mysql_free_result( $con_fuente );
	   

?>
					    <table width="100%" height="35" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                          <tr>
                            <td align="center" bgcolor="f7f7f7"><strong>INFORME 
                              DE INCIDENCIA O EMERGENCIA N&ordm; <?php echo $alfa; ?></strong></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td align="center">&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                    <tr bgcolor="#DDE5F2"> 
                      <td colspan="2">I. Identificaci&oacute;n</td>
                    </tr>
                    <tr> 
                      <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
                      <td valign="top" bgcolor="#FFFFFF">
					     <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                    <tr bgcolor="#DDE5F2"> 
                      <td colspan="2">II. Tipo de Evento</td>
                    </tr>
                    <tr> 
                      <td width="38%" bgcolor="ffffff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td bgcolor="f7f7f7">Evento</td>
                          </tr>
                          <tr> 
                            <td><strong>
<?php
    // Mostrar El Nombre del Tipo de Evento
       $conevento = mysql_query( "SELECT tipoevento FROM TipoEvento WHERE idtipoevento = '$nTipoEvento' ") or die( mysql_error() );
       if ( $revento = mysql_fetch_object( $conevento ) ) {
		     echo $revento->tipoevento;
       }
       mysql_free_result( $conevento );
?>
							</strong></td>
                          </tr>
                          <tr> 
                            <td bgcolor="f7f7f7">Ocurrencia</td>
                          </tr>
                          <tr> 
                            <td><strong><?php 
							list($year, $month, $day, $time) = split('[-. ]', $nOcurrencia);
                            $fecha = $day ."-". $month ."-". $year;
							echo $fecha; ?></strong></td>
                          </tr>
                        </table></td>
                      <td width="62%" bgcolor="ffffff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td bgcolor="f7f7f7">Descripci&oacute;n del Evento:</td>
                          </tr>
                          <tr> 
                            <td><strong><?php echo $nDescEvento; ?></strong></td>
                          </tr>
                          <tr> 
                            <td bgcolor="f7f7f7">Direcci&oacute;n/Ubicaci&oacute;n</td>
                          </tr>
                          <tr> 
                            <td><strong>
<?php
// Ubicacion del Evento
   $con_ubic = mysql_query( "SELECT ubicacion FROM Ubicacion WHERE idubicacion = '$nIdUbicacion' ") or die( mysql_error() );
   if( $rUbic = mysql_fetch_object( $con_ubic ) ) {
       echo $rUbic->ubicacion;
   }
   mysql_free_result( $con_ubic ) ;

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
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                    <tr> 
                      <td colspan="2" bgcolor="#DDE5F2">III. Da&ntilde;os Personas</td>
                    </tr>
                    <tr> 
                      <td width="60%"> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td height="137" bgcolor="#FFFFFF"> 
                              <?php
   // Conocer Personas Afectadas con Tabla AlfaDanos
      $con_danos = mysql_query( "SELECT * FROM AlfaDanos WHERE idemergencia = '$nIdEmer' " ) or die( mysql_error() );
      if( $rDanos = mysql_fetch_object( $con_danos ) ) {
	      $npers_afectadas = $rDanos->pers_afectadas;
		  $npers_damnifica = $rDanos->pers_damnifica;
		  $npers_heridas   = $rDanos->pers_heridas;
		  $npers_muertas   = $rDanos->pers_muertas;
		  $npers_desaparec = $rDanos->pers_desaparec;
		  $npers_albergada = $rDanos->pers_albergada;
		  $nviv_danomenor  = $rDanos->viv_danomenor;
		  $nviv_danomayor  = $rDanos->viv_danomayor;
		  $nviv_destruirre = $rDanos->viv_destruirre;
		  $nviv_noevaluada = $rDanos->viv_noevaluada;
		  $nserviciobasico = $rDanos->serviciobasico;
		  $nmontodanos     = $rDanos->montodanos;
      }
      mysql_free_result( $con_danos );
?>
                              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td width="41%"><table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                      <tr bgcolor="ffffff"> 
                                        <td width="78%">Afectadas</td>
                                        <td width="22%" align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $npers_afectadas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Damnificadas</td>
                                        <td width="22%" align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $npers_damnifica; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Heridas</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $npers_heridas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Muertas</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $npers_muertas; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Desaparecidas</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $npers_desaparec; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Albergados</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $npers_albergada; ?></strong></td>
                                      </tr>
                                    </table></td>
                                  <td width="52%"><table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                      <tr bgcolor="ffffff"> 
                                        <td width="85%">Da&ntilde;o Menor Habitable</td>
                                        <td width="15%" align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $nviv_danomenor; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Da&ntilde;o Mayor No Habitable</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $nviv_danomayor; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>Destruidas Irrecuperable</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $nviv_destruirre; ?></strong></td>
                                      </tr>
                                      <tr bgcolor="ffffff"> 
                                        <td>No Evaluadas</td>
                                        <td align="center" valign="middle" bgcolor="f7f7f7"><strong><?php echo $nviv_noevaluada; ?></strong></td>
                                      </tr>
                                    </table></td>
                                  <td width="1%"></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                      <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr> 
                            <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="f7f7f7">Servicios B&aacute;sicos, 
                                    Infraestructura y Otros:</td>
                                </tr>
                                <tr> 
                                  <td height="18" bgcolor="#FFFFFF"><strong><?php echo $nserviciobasico; ?></strong></td>
                                </tr>
                              </table></td>
                          </tr>
                          <tr> 
                            <td>&nbsp;</td>
                          </tr>
                          <tr> 
                            <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="f7f7f7">Monto Estimado en Da&ntilde;os</td>
                                </tr>
                                <tr> 
                                  <td bgcolor="#FFFFFF"><strong><?php echo $nmontodanos; ?></strong></td>
                                </tr>
                              </table></td>
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
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                    <tr> 
                      <td bgcolor="#DDE5F2">IV. Decisiones</td>
                    </tr>
                    <tr> 
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="666666">
                          <tr> 
                            <td width="63%" bgcolor="f8f8f8">Acciones y Soluciones 
                              Inmediatas</td>
                            <td width="37%" bgcolor="f8f8f8">Oportunidad (Tpo.) 
                              Restablecimiento</td>
                          </tr>
                          <?php
	// Decisiones Tomadas en InformeAlfa
	   $con_dec = mysql_query( "SELECT * FROM AlfaDecisiones WHERE idemergencia = '$nIdEmer' ") or die( mysql_error() );
       while( $rDec = mysql_fetch_object( $con_dec ) ) {
?>
                          <tr bgcolor="#FFFFFF"> 
                            <td><strong><?php echo $rDec->accion; ?></strong></td>
                            <td><strong><?php echo $rDec->tiemporestablece; ?></strong></td>
                          </tr>
                          <?php
       }
?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                    <tr> 
                      <td bgcolor="#DDE5F2">V. Recursos Involucrados</td>
                    </tr>
                    <tr> 
                      <td align="center" valign="middle"> 
                        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                          <tr> 
                            <td width="69%" bgcolor="f8f8f8">Tipo (Humano - Material 
                              - T&eacute;cnico - Monetario)</td>
                            <td width="1%" align="center" bgcolor="f8f8f8">Cantidad</td>
                            <td width="30%" align="center" bgcolor="f8f8f8">Gasto 
                              Estimado ($)</td>
                          </tr>
                          <?php
	// Conocer Recursos 
	   $total = 0;
	   $con_rec = mysql_query( "SELECT recurso, descrirecurso, cantidadrecur, gastoestimado FROM AlfaRecursos INNER JOIN TipoRecurso ON AlfaRecursos.idtiporecurso = TipoRecurso.idtiporecurso WHERE idemergencia = '$nIdEmer' ") or die( mysql_error() );
       while ( $rRec = mysql_fetch_object( $con_rec ) ) {
?>
                          <tr> 
                            <td bgcolor="#FFFFFF"><strong><?php echo $rRec->recurso." - ". $rRec->descrirecurso; ?></strong></td>
                            <td align="center" bgcolor="f7f7f7"><strong><?php echo $rRec->cantidadrecur; ?></strong></td>
                            <td align="center" bgcolor="f7f7f7"><strong><?php echo $rRec->gastoestimado; ?></strong></td>
                          </tr>
                          <?php
        $total = $total + $rRec->gastoestimado;
       }
       mysql_free_result( $con_rec );
?>
                          <tr> 
                            <td colspan="2" bgcolor="f8f8f8">Total</td>
                            <td align="center" bgcolor="f8f8f8"><strong><?php echo $total; ?></strong></td>
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
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                    <tr> 
                      <td width="65%" bgcolor="#DDE5F2">VI. Evaluaci&oacute;n 
                        de Necesidades</td>
                      <td bgcolor="#DDE5F2">VII. Capacidad de Respuesta</td>
                    </tr>
                    <tr> 
                      <td bgcolor="#FFFFFF">
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="ffffff">
                          <tr>
                            <td bgcolor="#FFFFFF"> 
                              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td width="21%" bgcolor="f8f8f8">Tipo</td>
                                  <td width="18%" align="center" bgcolor="f8f8f8">Cantidad</td>
                                  <td width="61%" bgcolor="f8f8f8">Motivo</td>
                                </tr>
                                <?php
	// Necesidades
	   $con_nec = mysql_query( "SELECT * FROM AlfaNecesidades WHERE idemergencia = '$nIdEmer' ") or die( mysql_error() );
       while ( $rNec = mysql_fetch_object( $con_nec ) ) {
?>
                                <tr bgcolor="f7f7f7"> 
                                  <td><strong><?php echo $rNec->tipo; ?></strong></td>
                                  <td align="center"><strong><?php echo $rNec->cantidad; ?></strong></td>
                                  <td><strong><?php echo $rNec->motivo; ?></strong></td>
                                </tr>
                                <?php
       }
?>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td align="center" valign="middle" bgcolor="#FFFFFF"> 
                        <table width="75%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                          <tr> 
                            <?php
	// Capacidad de Respuesta :$nIdCapr
	   $con_cap = mysql_query( "SELECT nivel FROM CapRespuesta WHERE idcapresp = '$nIdCapr' ") or die( mysql_error() );
       if ( $rCap = mysql_fetch_object( $con_cap ) ) {
?>
                            <td width="54%" bgcolor="f7f7f7"><strong><?php echo $rCap->nivel; ?></strong></td>
                            <td width="5%" align="center" bgcolor="f7f7f7"><strong>X</strong></td>
                            <?php
       }
	   mysql_free_result( $con_cap );
?>
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
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                          <tr>
                            <td bgcolor="#DDE5F2">VIII. Observaciones</td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr>
                                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                                      <tr>
                                        <td>&nbsp;<strong><?php echo $nObserv; ?></strong></td>
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
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                          <tr>
                            <td bgcolor="#DDE5F2">IX. Responsable del Informe</td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr>
                                  <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>Identificaci&oacute;n:</td>
                                      </tr>
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr> 
                                        <td><table width="50%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                                            <tr> 
<?php
  // Convierto Fecha
     list($year, $month, $day, $time) = split('[-. ]', $nFecha);
     $fecha = $day ."-". $month ."-". $year;
     $hora  = $time;

?>
                                              <td width="15%" bgcolor="f7f7f7">Fecha</td>
                                              <td width="35%" bgcolor="#FFFFFF">&nbsp;<?php echo $fecha; ?></td>
                                              <td width="15%" bgcolor="f7f7f7">Hora</td>
                                              <td width="35%" bgcolor="#FFFFFF">&nbsp;<?php echo $hora; ?></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                  </td>
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
mysql_close();
}
?>