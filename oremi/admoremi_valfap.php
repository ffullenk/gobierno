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
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>

</head>

<body bgcolor="#f8f8f8">
<?php
                             // Conocer Responsable del Consolidado
                             // Para eso cuento con dos variables que vienen de admoremi_viewconR:
                             //          cCons=$row->idconsreg
                             //          userN=$userN

                             // x cambio en nuevo codigo, sale
                             //$cons = mysql_query("SELECT idconsprov, InfConsProvincia.idfuente, idtipoevento, nombre, cargo, ocurrencia, descinforme, idcapresp, idubicacion, resumen FROM InfConsProvincia INNER JOIN FUENTE ON InfConsProvincia.idfuente = FUENTE.idfuente WHERE idconsprov='$alfa' ORDER BY ocurrencia") or die( mysql_error() );
                               $cons = mysql_query( "SELECT ConsolidaProvincia.idfuente, idconsreg_, ConsolidaProvincia.nrocons, idtipoevento, nombre, cargo, tblconsprov.ocurrencia, tblconsprov.descinforme, tblconsprov.idcapresp, idubicacion, tblconsprov.resumen FROM tblconsprov INNER JOIN ConsolidaProvincia ON tblconsprov.idconsprov = ConsolidaProvincia.idconsprov INNER JOIN FUENTE ON ConsolidaProvincia.idfuente = FUENTE.idfuente WHERE tblconsprov.idconsprov = '$ev' AND tblconsprov.idinfconsprov = '$alfa' ") or die( mysql_error() );
                             if ( $row = mysql_fetch_object( $cons ) ) {
                             // Inicializo Variables
							    $dfuente      = $row->idfuente;
                                $nResponsable = $row->nombre;
								$dinfreg      = $row->idconsreg_;
                                $nCargo       = $row->cargo;
								$nroc         = $row->nrocons;
								$dcapresp     = $row->idcapresp;
                                $nTipoEvento  = $row->idtipoevento;
                                $nFecha       = $row->ocurrencia;
								$dresumen     = $row->resumen;
                             }
                             mysql_free_result( $cons );				
?>

<table width="761" border="0" cellpadding="0" cellspacing="1" bgcolor="666666" align="center" >
<!-- TABLA "1" -->
  <tr>
    <td>
	  <table width="760" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<!-- TABLA "2" -->
        <tr> 
          <td>
		    <table width="99%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center" >
<!-- TABLA "3" -->
              <tr> 
                <td>
				  <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="333333">
<!-- TABLA "4" -->
                    <tr> 
                      <td bgcolor="f7f7f7" class="topmenu"> 
                        <div align="center"><strong>PLAN DEDOS - ONEMI</strong></div>
                        <div align="center"><strong>INFORME CONSOLIDADO PROVINCIAL DE EMERGENCIA Nº <? echo $ev ."/". $nroc; ?></strong></div>
                        <div align="center"><strong>REGI&Oacute;N DE COQUIMBO</strong></div></td>
                    </tr>
                  </table>
<!-- FIN TABLA "4" -->
				</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td>
<!-- TABLA "5" -->
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr> 
                      <td valign="middle" class="date" align="right"> 
                        <!-- INSERTAR FECHA -->
                        <script language="JavaScript">
                        <!--
                        document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
                       // -->
                       </script> </td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td>
<!-- TABLA "6" -->
					    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr> 
                            <td> 
<!-- TABLA "7" -->
                              <table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="#dde5f2" class="topmenu">RESPONSABLE DEL INFORME</td>
                                </tr>
                                <tr> 
                                  <td bgcolor="#FFFFFF" align="center" valign="middle"><strong><? echo $nResponsable ."</strong><br>". $nCargo ?></strong></td>
                                </tr>
                              </table>
<!-- FIN TABLA "7" -->
							</td>
                            <td>
<!-- TABLA "8" -->
							  <table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="#dde5f2" class="topmenu">TIPO DE 
                                    EVENTO</td>
                                </tr>
                                <tr> 
                                  <td bgcolor="#FFFFFF" align="center" valign="middle"><strong> 
                                    <?php
                                    // Consultar x el Tipo de Evento
                                       $conevento = mysql_query( "SELECT tipoevento FROM TipoEvento WHERE idtipoevento = '$nTipoEvento' ") or die( mysql_error() );
                                       if ( $revento = mysql_fetch_object( $conevento ) ) {
                                          echo $revento->tipoevento;
                                       }
                                       mysql_free_result( $conevento );
?>
                                    </strong></td>
                                </tr>
                              </table>
<!-- FIN TABLA "8" -->
							</td>
                            <td>
<!-- TABLA "9" -->
							  <table width="95%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="#dde5f2" class="topmenu">FECHA 
                                    DE INICIO DEL EVENTO </td>
                                </tr>
                                <tr> 
                                  <td bgcolor="#FFFFFF" align="center" valign="middle"><strong> 
                                    <?php
									   $cons_p = mysql_query( "SELECT ocurrencia FROM tblconsprov WHERE idconsprov = '$alfa' ") or die( mysql_error() );
                                       if( $rP = mysql_fetch_object( $cons_p ) ) {
                                          // Convertir Fecha $nFecha
                                             list($year, $month, $day, $time) = split('[-. ]', $rP->ocurrencia);
                                             $fecha = $day ."-". $month ."-". $year;
                                             $hora  = $time;
                                       echo $fecha ." a las ". $time;
	                                   }
									   mysql_free_result( $cons_p );
									?>
                                    </strong></td>
                                </tr>
                              </table>
<!-- FIN TABLA "9" -->
							</td>
                          </tr>
                        </table>
<!-- FIN TABLA "6" -->
                      </td>
                    </tr>
                  </table>
<!-- FIN TABLA "5" -->
				</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td valign="top">
<!-- TABLA "10" -->
				  <table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr> 
                      <td class="topmenu"><strong><em>Respaldo:</em></strong></td>
                      <td class="topmenu"><strong><em>Evento Derivado:</em></strong></td>
                    </tr>
                    <tr> 
                      <td>
<!-- TABLA "11" -->
					    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                          <tr align="center" valign="middle" bgcolor="#dde5f2"> 
                            <td class="topmenu">ALFA</td>
                            <td class="topmenu">FECHA</td>
                            <td class="topmenu">COMUNA</td>
                          </tr>
                          <?php
                          // Leer 
                          //$con_reg = mysql_query( "SELECT InfConsProv.idinfconsprov, idalfa, idevento, alfa_fecha FROM InfConsProvincia INNER JOIN InfConsProv ON InfConsProvincia.idconsprov = InfConsProv.idconsprov INNER JOIN InformeAlfa ON InfConsProv.idinfconsprov = InformeAlfa.idinfconsprov WHERE InfConsProvincia.idconsprov = '$alfa' AND InfConsProvincia.idestadoevento = '2' ") or die( mysql_error() );
                            $con_reg = mysql_query( "SELECT idalfa, idevento, alfa_fecha FROM tblconsprov INNER JOIN InformeAlfa ON tblconsprov.idinfconsprov = InformeAlfa.idinfconsprov WHERE tblconsprov.idinfconsprov = '$alfa' AND tblconsprov.idconsprov = '$ev' ") or die( mysql_error() );
                             while ( $rReg = mysql_fetch_object( $con_reg ) ) {
                               $nEvento = $rReg->idevento;
?>
                          <tr  align="center" valign="middle" bgcolor="#ffffff"> 
                            <td><a href="admoremi_valfac.php?alfa=<?php echo $rReg->idalfa. "&ev=". $rReg->idevento."&userN=".$userN; ?>"> 
                              <?php echo $rReg->idalfa; ?> </a> </td>
                            <td> 
                              <?php
                              // Convertir Fecha
                                 list($year, $month, $day, $time) = split('[-. ]', $rReg->alfa_fecha);
                                 $fecha = $day ."-". $month ."-". $year;
?>
                              <a href="admoremi_valfac.php?alfa=<?php echo $rReg->idalfa. "&ev=". $rReg->idevento."&userN=".$userN; ?>"> 
                              <?php echo $fecha; ?> </a> </td>
                            <td> 
                              <?php
                              // Conocer Comuna
                                 $con_id = mysql_query( "SELECT Evento.idfuente FROM Evento WHERE Evento.idevento = '$rReg->idevento' " ) or die( mysql_error() );
                                 if ( $rEv = mysql_fetch_object( $con_id ) ) {
                                      $FuenteRegion = substr( $rEv->idfuente, 0, 2);
                                      $FuenteProvin = substr( $rEv->idfuente, 2, 2);
				                      $FuenteComuna = substr( $rEv->idfuente, 4, 2);
                                 }
                                 mysql_free_result( $con_id );
				   
                                 $con_comuna = mysql_query( "SELECT comuna FROM Comuna WHERE idcom = '$FuenteComuna' AND idpro = '$FuenteProvin' AND idreg = '$FuenteRegion'  ") or die( mysql_error() );
                                 if ( $rCom = mysql_fetch_object( $con_comuna ) ) {
?>
                                    <a href="admoremi_valfac.php?alfa=<?php echo $rReg->idalfa. "&ev=". $rReg->idevento."&userN=".$userN; ?>"> 
                                    <?php echo $rCom->comuna; ?> </a> 
<?php                            }
                                 mysql_free_result( $con_comuna );
?>
                            </td>
                          </tr>
<?php                 }
                      mysql_free_result( $con_reg );
?>
                        </table>
<!-- FIN TABLA "11" -->
                      </td>
                      <td valign="top"> 
<!-- TABLA "12" -->
					    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                          <tr bgcolor="#dde5f2"> 
                            <td height="13" class="topmenu">TIPO DE EVENTOS DERIVADO</td>
                                                
                            <td class="topmenu">COMUNA</td>
                          </tr>
                          <tr bgcolor="#f8f8f8"> 
						    <?php
                            // Leer 
//                               $con_reg2 = mysql_query( "SELECT InfConsProvincia.idconsprov, InfConsProv.idinfconsprov, idalfa, idevento, alfa_fecha, InformeAlfa.descinforme FROM InfConsProvincia INNER JOIN InfConsProv ON InfConsProvincia.idconsprov = InfConsProv.idconsprov INNER JOIN InformeAlfa ON InfConsProv.idinfconsprov = InformeAlfa.idinfconsprov WHERE InfConsProvincia.idconsprov = '$alfa' AND InfConsProvincia.idestadoevento = '2' ") or die( mysql_error() );
                               $con_reg2 = mysql_query( "SELECT idalfa, idevento, alfa_fecha, InformeAlfa.descinforme FROM tblconsprov INNER JOIN InformeAlfa ON tblconsprov.idinfconsprov = InformeAlfa.idinfconsprov WHERE tblconsprov.idinfconsprov = '$alfa' AND tblconsprov.idconsprov = '$ev' ") or die( mysql_error() );
                               while ( $rReg = mysql_fetch_object( $con_reg2 ) ) {
                                 $nDescri = $rReg->descinforme;
                                 // Conocer Comuna y Desplegar Evento Derivado
                                 $con_id = mysql_query( "SELECT Evento.idfuente FROM Evento WHERE Evento.idevento = '$rReg->idevento' " ) or die( mysql_error() );
                                 if ( $rEv = mysql_fetch_object( $con_id ) ) {
                                      $FuenteRegion = substr( $rEv->idfuente, 0, 2);
                                      $FuenteProvin = substr( $rEv->idfuente, 2, 2);
				                      $FuenteComuna = substr( $rEv->idfuente, 4, 2);
                                 }
                                 mysql_free_result( $con_id );
?>								 
                            <td bgcolor="#FFFFFF">&nbsp; <?php echo $nDescri; ?> 
                            </td>
                            <?php
                            $con_comuna = mysql_query( "SELECT comuna FROM Comuna WHERE idcom = '$FuenteComuna' AND idpro = '$FuenteProvin' AND idreg = '$FuenteRegion'  ") or die( mysql_error() );
                            if ( $rCom = mysql_fetch_object( $con_comuna ) ) {
                                 $Comuna = $rCom->comuna;
                            }
                            mysql_free_result( $con_comuna );
?>
                            <td bgcolor="#FFFFFF">&nbsp;<?php echo $Comuna; ?></td>
                          </tr>
                          <?php
                     }
                     mysql_free_result( $con_reg2 );
?>
                        </table>
<!-- FIN TABLA "12" -->
					</td>
                    </tr>
                  </table>
<!-- FIN TABLA "10" -->
				</td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
			  
              <tr> 
                <td valign="top">
<!-- TABLA "13" -->
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td align="center" class="topmenu"><strong>DA&Ntilde;OS PERSONAS Y VIVIENDAS</strong></td>
                    </tr>
                    <tr> 
                      <td> 
                        <?php
                                 $nRegion    = substr( $dfuente, 0, 2); 
                                 $nProvincia = substr( $dfuente, 2, 2);
								 $nResumen   = str_replace("\n", "<br>", $dresumen);
?>
                        <!-- TABLA "14" -->
                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                            <td class="topmenu"><strong> 
                              <?php
                             // Consulta x nombre de la Provincia
                                $cons_nomprov = mysql_query( "SELECT provincia FROM Provincia WHERE idreg = '$FuenteRegion' AND idpro = '$FuenteProvin' ") or die( mysql_error() );
                                if( $nProv = mysql_fetch_object( $cons_nomprov ) ) {
                                    echo "PROVINCIA DE ";
                                    echo $nProv->provincia;
                                }
                                mysql_free_result( $cons_nomprov );
?>
                              </strong></td>
                          </tr>
                          <tr> 
                            <td> 
                              <!-- TABLA "15" -->
                              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr align="center" valign="middle"> 
                                  <td rowspan="2" bgcolor="#dde5f2" class="enctabla">Comuna</td>
                                  <td colspan="6" bgcolor="f7f7f7" class="enctabla">Da&ntilde;os 
                                    Personas</td>
                                  <td colspan="3" bgcolor="f7f7f7" class="enctabla">Nro. 
                                    Viviendas Con</td>
                                  <td rowspan="2" bgcolor="#dde5f2" class="enctabla">Nro. 
                                    Viviendas No Evaluadas</td>
                                </tr>
                                <tr> 
                                  <td align="center" valign="middle" bgcolor="#dde5f2" class="enctabla">Afectadas</td>
                                  <td align="center" valign="middle" bgcolor="#dde5f2" class="enctabla">Damnificadas</td>
                                  <td bgcolor="#dde5f2" class="enctabla">Heridas</td>
                                  <td align="center" valign="middle" bgcolor="#dde5f2" class="enctabla">Desaparecidas</td>
                                  <td align="center" valign="middle" bgcolor="#dde5f2" class="enctabla">Albergadas</td>
                                  <td bgcolor="#dde5f2" class="enctabla">Muertas</td>
                                  <td align="center" valign="middle" bgcolor="#dde5f2" class="enctabla">Da&ntilde;o 
                                    Menor</td>
                                  <td align="center" valign="middle" bgcolor="#dde5f2" class="enctabla">Da&ntilde;o 
                                    Mayor</td>
                                  <td align="center" valign="middle" bgcolor="#dde5f2" class="enctabla">Destruidas</td>
                                </tr>
                                <?php
                                $cpers_afectadas = 0;
                                $cpers_damnifica = 0;
                                $cpers_heridas = 0;
                                $cpers_muertas = 0;
                                $cpers_desaparec = 0;
                                $cpers_albergada = 0;
                                $cviv_danomenor = 0;
                                $cviv_danomayor = 0;
                                $cviv_destruirre = 0;
                                $cviv_noevaluada = 0;

                                // Leo desde ConsProvDanos info WHERE idinfconsprov='$rVcom->idinfconsprov' 
                                   $con_danos = mysql_query( "SELECT * FROM ConsProvDanos WHERE idinfconsprov='$alfa' ") or die( mysql_error() );
                                   while( $rDanos = mysql_fetch_object( $con_danos ) )
                                   {
                                     $cpers_afectadas = $cpers_afectadas + $rDanos->pers_afectadas;
                                     $cpers_damnifica = $cpers_damnifica + $rDanos->pers_damnifica;
                                     $cpers_heridas = $cpers_heridas + $rDanos->pers_heridas;
                                     $cpers_muertas = $cpers_muertas + $rDanos->pers_muertas;
                                     $cpers_desaparec = $cpers_desaparec + $rDanos->pers_desaparec;
                                     $cpers_albergada = $cpers_albergada + $rDanos->pers_albergada;
                                     $cviv_danomenor = $cviv_danomenor + $rDanos->viv_danomenor;
                                     $cviv_danomayor = $cviv_danomayor + $rDanos->viv_danomayor;
                                     $cviv_destruirre = $cviv_destruirre + $rDanos->viv_destruirre;
                                     $cviv_noevaluada = $cviv_noevaluada + $rDanos->viv_noevaluada;				  
?>
                                <tr valign="middle" align="center"> 
                                  <td bgcolor="#FFFFFF">&nbsp; 
                                    <?php
                                    // Consulta Comuna
                                       $con_comu = mysql_query( "SELECT comuna FROM Comuna WHERE idcom = '$rDanos->idcom' AND idreg = '$nRegion' AND idpro = '$nProvincia' ") or die( mysql_error() );
                                       if( $rComu = mysql_fetch_object( $con_comu ) )
                                       {
                                          echo $rComu->comuna;
                                       }
                                       mysql_free_result( $con_comu );
?>
                                  </td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->pers_afectadas; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->pers_damnifica; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->pers_heridas; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->pers_desaparec; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->pers_albergada; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->pers_muertas; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->viv_danomenor; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->viv_danomayor; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->viv_destruirre; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rDanos->viv_noevaluada; ?></td>
                                </tr>
                                <?php
                                  }
                                  mysql_free_result( $con_danos );
?>
                                <!-- Para Mostrar eL total x Provincia -->
                                <tr align="center" valign="middle" bgcolor="f7f7f7"> 
                                  <td class="topmenu" ><strong>Total Provincial</strong></td>
                                  <td><?php echo $cpers_afectadas; ?></td>
                                  <td><?php echo $cpers_damnifica; ?></td>
                                  <td><?php echo $cpers_heridas; ?></td>
                                  <td><?php echo $cpers_desaparec; ?></td>
                                  <td><?php echo $cpers_albergada; ?></td>
                                  <td><?php echo $cpers_muertas; ?></td>
                                  <td><?php echo $cviv_danomenor; ?></td>
                                  <td><?php echo $cviv_danomayor; ?></td>
                                  <td><?php echo $cviv_destruirre; ?></td>
                                  <td><?php echo $cviv_noevaluada; ?></td>
                                </tr>
                              </table>
                              <!-- FIN TABLA "15" -->
                            </td>
                          </tr>
                        </table>
                        <!-- FIN TABLA "14" -->
                      </td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td> 
                        <!-- DECISIONES -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
     		  		    <tr >
                            <td height="5" valign="top" background="imagenes/linsup.gif"></td>
                        </tr>

                          <tr> 
                            <td align="center" valign="middle" bgcolor="f0f6f9" class="topmenu"><strong>DECISIONES</strong></td>
                          </tr>
                          <tr> 
                            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="f0f6f9">
                                <tr> 
                                  <td width="10%" bgcolor="#f0f6f9"></td>
                                  <td width="90%">&nbsp;</td>
                                </tr>
                                <?php
                                // Decisiones Consolidado Provincial
                                   $con_comu = mysql_query( "SELECT idcom, comuna FROM Comuna WHERE idpro = '$nProvincia' AND idreg = '$nRegion' ") or die( mysql_error() );
                                   while ( $rCom = mysql_fetch_object( $con_comu ) ){
                                     // Consulta x Comuna
                                        $con_dec = mysql_query( "SELECT * FROM ConsProvDecisiones WHERE idinfconsprov='$alfa' AND idcom = '$rCom->idcom' " ) or die( mysql_error() );
                                        if ($rDec = mysql_num_rows( $con_dec ) > 0 ) {
?>
                                <tr> 
                                  <td bgcolor="#dde5f2" class="topmenu">&nbsp;<?php echo $rCom->comuna; ?></td>
                                  <td> <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                      <tr> 
                                        <td width="62%" bgcolor="#dde5f2">Acciones 
                                          y Soluciones Inmediatas</td>
                                        <td width="38%" bgcolor="#dde5f2">Oportunidad 
                                          (Tpo.) Reestablecimiento</td>
                                      </tr>
                                      <?php                                          while( $rDec = mysql_fetch_object( $con_dec ) )
                                               {
?>
                                      <tr> 
                                        <td bgcolor="#FFFFFF"><?php echo $rDec->accion; ?></td>
                                        <td bgcolor="#FFFFFF"><?php echo $rDec->tiemporestablece; ?></td>
                                      </tr>
                                      <?php                                          }
                                               mysql_free_result( $con_dec ); ?>
                                    </table></td>
                                </tr>
                                <?php                               } ?>
                                <tr> 
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <?php                           }
                                mysql_free_result( $con_comu ); ?>
                              </table></td>
                          </tr>
                          <tr>
                             <td height="5" valign="top" background="imagenes/lininf.gif"></td>
                          </tr>

                        </table></td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td> 
                        <!-- TABLA "16" -->
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="f0f6f9">
                          <tr >
                           <td height="5" ColSpan="2" valign="top" background="imagenes/linsup.gif"></td>
                         </tr>
                          <tr>
                             <td align="center" ColSpan="2" class="topmenu" height="20">RECURSOS INVOLUCRADOS</td>
                          </tr>
                          <tr><td colspan="2" height="10"></td></tr>
                          <tr> 
                            <td width="10%">&nbsp;</td>
                            <td width="90%" bgcolor="f0f6f9">&nbsp;</td>
                          </tr>
                          <?php
	                      // Recursos Consolidado Provincial
                             $con_comu = mysql_query( "SELECT idcom, comuna FROM Comuna WHERE idpro = '$nProvincia' AND idreg = '$nRegion' ") or die( mysql_error() );
                             while ( $rCom = mysql_fetch_object( $con_comu ) ){
                          // Consulta x Comuna
                             $con_rec = mysql_query( "SELECT TipoRecurso.idtiporecurso, descrirecurso, cantidadrecur, recurso FROM ConsProvRecursos INNER JOIN TipoRecurso ON ConsProvRecursos.idtiporecurso = TipoRecurso.idtiporecurso WHERE idinfconsprov='$alfa' AND idcom = '$rCom->idcom' " ) or die( mysql_error() );
                             if ($rRec = mysql_num_rows( $con_rec ) > 0 ) {
?>
                          <tr> 
                            <td bgcolor="#dde5f2" class="topmenu">&nbsp;<?php echo $rCom->comuna; ?></td>
                            <td bgcolor="f0f6f9"> 
                              <!-- TABLA "17" -->
                              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td width="23%" bgcolor="#dde5f2">Tipo</td>
                                  <td width="59%" bgcolor="#dde5f2">Recurso</td>
                                  <td width="18%" bgcolor="#dde5f2">Cantidad</td>
                                </tr>
                                <?php
                                        while( $rRec = mysql_fetch_object( $con_rec ) )
                                        {
?>
                                <tr bgcolor="F8F8F8"> 
                                  <td bgcolor="#FFFFFF"><?php echo $rRec->recurso; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rRec->descrirecurso; ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $rRec->cantidadrecur; ?></td>
                                </tr>
                                <?php                                   } 
                                        mysql_free_result( $con_rec );
?>
                              </table>
                              <!-- FIN TABLA "17" -->
                            </td>
                          </tr>
                          <?php                        } ?>
                          <tr> 
                            <td colspan="2" >&nbsp;</td>
                          </tr>
                          <?php                     } 
                           mysql_free_result( $con_comu );
?>
                          <tr>
                             <td height="5" ColSpan="2" valign="top" background="imagenes/lininf.gif"></td>
                          </tr>

                        </table>
                        <!-- FIN TABLA "16" -->
                      </td>
                    </tr>

                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td> 
                        <!-- TABLa "20" -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="f0f6f9">
                          <tr >
                             <td height="5" ColSpan="2" valign="top" background="imagenes/linsup.gif"></td>
                          </tr>
                          <tr> 
                            <td height="20" colspan="2" align="center" valign="middle" bgcolor="f0f6f9" class="topmenu"><strong>EVALUACI&Oacute;N 
                              DE NECESIDADES</strong></td>
                          </tr>
						  <tr><td colspan="2" height="10"></td></tr>						  
                          <tr> 
                            <td width="12%"></td>
                            <td width="88%">&nbsp;</td>
                          </tr>
                          <?php
	                      // Recursos Consolidado Provincial
                             $con_comu = mysql_query( "SELECT idcom, comuna FROM Comuna WHERE idpro = '$nProvincia' AND idreg = '$nRegion' ") or die( mysql_error() );
                             while ( $rCom = mysql_fetch_object( $con_comu ) ){
                          // Consulta x Comuna
                             $con_nec = mysql_query( "SELECT * FROM ConsProvNecesidades WHERE idinfconsprov='$alfa' AND idcom = '$rCom->idcom' " ) or die( mysql_error() );
                             if ($rNec = mysql_num_rows( $con_nec ) > 0 ) {
?>
                          <tr> 
                            <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                  <td width="12%" bgcolor="#dde5f2" class="topmenu">&nbsp;<?php echo $rCom->comuna; ?></td>
                                  <td width="88%"> <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
                                      <tr bgcolor="#dde5f2"> 
                                        <td width="17%" bgcolor="#dde5f2">Tipo</td>
                                        <td width="65%">Motivo</td>
                                        <td width="18%" align="center">Cantidad</td>
                                      </tr>
                                      <?php
                                        while( $rNec = mysql_fetch_object( $con_nec ) )
                                        {
?>
                                      <tr> 
                                        <td bgcolor="#FFFFFF"><?php echo $rNec->tipo; ?></td>
                                        <td bgcolor="#FFFFFF"><?php echo $rNec->motivo; ?></td>
                                        <td align="center" bgcolor="#FFFFFF"><?php echo $rNec->cantidad; ?></td>
                                      </tr>
                                      <?php                                    }
mysql_free_result( $con_nec );
?>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
                          <?php                    } ?>
                          <tr> 
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <?php                  }
                       mysql_free_result( $con_comu );
?>
                          <tr>
                            <td height="5" ColSpan="2" valign="top" background="imagenes/lininf.gif"></td>
                          </tr>

                        </table>
                        <!-- FIN TABLa "20" -->
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr> 
                      <td> 
                        <!-- TABLa "21" -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="f0f6f9">
                          <tr >
                             <td height="5" ColSpan="2" valign="top" background="imagenes/linsup.gif"></td>
                          </tr>
						  <tr><td colspan="2" height="10"></td></tr>
                          <tr> 
						    <td width="35%" valign="top"> 
                              <!-- TABLa "22" -->
                              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr> 
                                  <td> 
                                    <?php
                                        // Capacidad de Respuesta :$nIdCapr
                                           $con_cap = mysql_query( "SELECT nivel FROM CapRespuesta WHERE idcapresp = '$dcapresp' ") or die( mysql_error() );
                                           if ( $rCap = mysql_fetch_object( $con_cap ) ) {
                                        ?>
                                    <!-- TABLa "23" -->
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1"  bgcolor="666666">
                                      <tr bgcolor="#dde5f2"> 
                                        <td colspan="2" class="topmenu">&nbsp;Capacidad 
                                          de Respuesta</td>
                                      </tr>
                                      <tr> 
                                        <td width="54%" bgcolor="#FFFFFF"><?php echo $rCap->nivel; ?></td>
                                        <td width="5%" align="center" bgcolor="f7f7f7" class="topmenu">X</td>
                                      </tr>
                                    </table>
                                    <!-- FIN TABLa "23" -->
                                    <?php
                                           }
                                           mysql_free_result( $con_cap );
                                        ?>
                                  </td>
                                </tr>
                              </table>
                              <!-- FIN TABLa "22" -->
                            </td>
                            <td valign="top"> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                                <tr> 
                                  <td bgcolor="#dde5f2" class="topmenu">&nbsp;Observaciones</td>
                                </tr>
                                <tr> 
                                  <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td bgcolor="f7f7f7"><?php echo $nResumen; ?></td>
                                      </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
						  <tr><td colspan="2" height="10"></td></tr>
                          <tr>
                            <td height="5" ColSpan="2" valign="top" background="imagenes/lininf.gif"></td>
                          </tr>

                        </table></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
					
                    <tr>
					  <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
                            <td bgcolor="#dde5f2" class="topmenu">&nbsp;Responsable del Informe</td>
                          </tr>
  <tr>
     <td>
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="666666">
           <tr>
              <td bgcolor="#FFFFFF">
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr> 
                                        <td> <table width="50%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
                                            <tr> 
                                              <?php  // Convierto Fecha
                                 list($year, $month, $day, $time) = split('[-. ]', $nFecha);
                                 $fecha = $day ."-". $month ."-". $year;
                                 $hora  = $time;   ?>
                                              <td width="15%" bgcolor="#dde5f2">Fecha</td>
                                              <td width="35%" bgcolor="f7f7f7">&nbsp;<?php echo $fecha; ?></td>
                                              <td width="15%" bgcolor="#dde5f2">Hora</td>
                                              <td width="35%" bgcolor="f7f7f7">&nbsp;<?php echo $hora; ?></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr> 
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
              </td>
           </tr>
        </table>
     </td>
  </tr>
</table>
					  </td>
					</tr>

                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                  </table>
<!-- FIN TABLA "13" -->

              </td>
            </tr>
			
			
              <tr> 
                <td align="center" valign="middle">&nbsp;</td>
              </tr>
         </table>
<!-- FIN TABLA "4" -->
				</td>
              </tr>
            </table>
<!-- FIN TABLA "3" -->
		  </td>
        </tr>
      </table>
<!-- FIN TABLA "2" -->
	  </td>
  </tr>
</table>
<!-- FIN TABLA "1" -->
</body>
</html>
<?php }
mysql_close();
?>