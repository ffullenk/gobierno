<?
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();

  // Constatar logeo previo
     global $userN, $passN, $Nniv, $id, $cCons;
     include("admoremi_sesid.inc");

function CabeceraHTML() {
global $userN, $passN, $Nniv, $id, $cCons;
?>
<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="735" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="#666666">
  <tr>
    <td><table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
        <tr> 
          <td width="485" height="95" valign="top" bgcolor="#DDE5F2"><img src="imagenes/imgsup-1.gif" width="182" height="95"><img src="imagenes/imgtit-1.gif" width="293" height="95"></td>
          <td width="250" valign="top" bgcolor="#eaeaea"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="90" valign="top" rowspan="4">&nbsp;</td>
                <td width="11" height="29"></td>
                <td width="37"></td>
                <td width="20"></td>
                <td width="33"></td>
                <td width="59"></td>
              </tr>
              <tr> 
                <td height="15" colspan="2" valign="top"> <a href="admoremi_logout.php"><img src="imagenes/cerrar.gif" width="90" height="15" border="0"></a> 
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr> 
                <td height="30"></td>
                <td></td>
                <td></td>
                <td></td>
                <td valign="top"></td>
              </tr>
              <tr> 
                <td height="15" valign="top"></td>
                <td></td>
                <td colspan="2" valign="middle" ><a href="administra/index.php" target="_blank" class="under"><img src="imagenes/auto.gif" width="92" height="15" border="0" align="absmiddle"></a></td>
                <td></td>
              </tr>
              <tr> 
                <td height="2" valign="top"></td>
                <td></td>
                <td></td>
                <td valign="top"></td>
                <td valign="top"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <table width="735" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr> 
          <td width="735" valign="middle" class="date" align="right"> 
            <!-- INSERTAR FECHA -->
            <script language="JavaScript">
    <!--
    document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
    // -->
    </script> </td>
        </tr>
        <tr> 
          <td width="735" height="5" valign="top"></td>
        </tr>
        <tr> 
          <td width="735" height="24" valign="top"></td>
        </tr>
        <tr> 
          <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
        </tr>
        <tr> 
          <td width="735" height="5" valign="top"></td>
        </tr>
      </table>
      <table width="735" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="tablebody">
        <tr> 
          <td width="3" height="401" valign="top">&nbsp;</td>
          <td width="125" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="125" height="25" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td align="center" valign="middle"><a href="index.php"><img src="imagenes/home.gif" alt=" Volver P&aacute;gina de Inicio Sitio Oremi" width="17" height="16" border="0"></a></td>
                      <td align="center" valign="middle"><a href="index.php"><img src="imagenes/consulta.gif" alt=" Preguntas Frecuentes" width="17" height="16" border="0"></a></td>
                      <td align="center" valign="middle"><a href="mailto:oremiiv@gorecoquimbo.cl?subject=Contacto%20desde%20Sitio%20Web%20Oremi%20Regi%F3n%20de%20Coquimbo"><img src="imagenes/contacto.gif" alt=" Cont&aacute;ctese con Oremi Regi&oacute;n de Coquimbo" width="17" height="16" border="0"></a></td>
                      <td align="center" valign="middle"><img src="imagenes/otro.gif" width="17" height="16"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="93" align="center" valign="middle"><img src="imagenes/logogore.jpg" width="75" height="75"></td>
              </tr>
              <tr> 
                <td height="165" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderLinks">
                    <tr> 
                      <td width="125" height="30" valign="middle" align="center" class="topmenu">Sitios 
                        Relacionados</td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.onemi.cl" target="_blank" class="blueone" title="Enlace a Sitio Web de la Oficina Nacional de Emergencia [onemi]">Onemi</a></td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.gorecoquimbo.cl" target="_blank" class="blueone" title=" Enlace a Sitio Web del Gobierno Regional de Coquimbo [www.gorecoquimbo.cl]">GORE 
                        Coquimbo</a></td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" class="blueone" title=" Enlace a Sitio Web con el Informe de los Últimos 30 Sismos Sensibles ">Eventos 
                        S&iacute;smicos</a></td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.meteochile.cl" target="_blank" class="blueone" title=" Enlace a Sitio Web del Servicio de Meteorología de Chile">Meteorolog&iacute;a 
                        Chile</a></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="65" valign="top"> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td colspan="2" class="topmenu">De Su Inter&eacute;s</td>
                    </tr>
                    <tr> 
                      <td height="1" colspan="2" valign="top" background="imagenes/vert.gif"></td>
                    </tr>
                    <tr> 
                      <td><img src="imagenes/flec.gif" border="0"></td>
                      <td><a href="http://www.onemi.cl/pageview.php?file=cat/cat.htm" target="_blank" class="blueone" title=" Centro de Alerta Temprana [onemi] ">Centro 
                        de Alerta Temprana</a></td>
                    </tr>
                    <tr> 
                      <td></td>
                      <td height="1" valign=top background="imagenes/lnbot-1.gif"></td>
                    </tr>
                    <tr> 
                      <td height="5" colspan="2" ></td>
                    </tr>
                    <tr> 
                      <td><img src="imagenes/flec.gif" border="0"></td>
                      <td><a href="http://www.onemi.cl/pageview.php?file=riesgos/riesgos.htm" target="_blank" class="blueone" title=" Guía de Riesgos [onemi] ">Gu&iacute;a 
                        de Riesgos</a></td>
                    </tr>
                    <tr> 
                      <td></td>
                      <td height="1" valign=top background="imagenes/lnbot-1.gif"></td>
                    </tr>
                    <tr> 
                      <td height="5" colspan="2" ></td>
                    </tr>
                    <tr> 
                      <td><img src="imagenes/flec.gif" border="0"></td>
                      <td> <a 
                            href="http://www.onemi.cl/pageview.php?file=orient_ciud/medirsismo.htm"
                            target="_blank"
                            class="blueone"
                            title=" Escala de Mediciones Técnicas [onemi] "> Escalas 
                        de Medici&oacute;n S&iacute;smica </a> </td>
                    </tr>
                    <tr> 
                      <td></td>
                      <td height="1" valign=top background="imagenes/lnbot-1.gif"></td>
                    </tr>
                    <tr> 
                      <td height="5" colspan="2" ></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="3"></td>
              </tr>
            </table></td>
          <td width="9" background="imagenes/lnvert-1.gif"></td>
          <td width="455" valign="top">
<?
}


function RestoHTML() {
global $userN, $passN, $Nniv, $id, $cCons;
?>
          </td>
          <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
          <td width="125" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="125" height="150" valign="top"> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" class="tableborderAlerta">
                    <tr> 
                      <td width="123" height="25" valign="middle" align="center" class="topmenu">Alertas 
                        Vigentes</td>
                    </tr>
                    <tr> 
                      <td valign="top" height="122" bgcolor="#FFFFFF"> 
                        <?php
                             $fechadehoy = date('Y-m-d');
                             $last_week = date('Y-m-d', mktime(0,0,0, date(m), date(d)-7, date(Y)));
                            // Chequear Alertas Vigentes en el Transcurso de la Semana Actual
                               $con_alerta = mysql_query( "SELECT id, DATE_FORMAT(fecha,'%d-%m-%y') as fecha, extension, variable FROM alerta WHERE DATE_FORMAT(fecha,'%Y-%m-%d') BETWEEN '$last_week' AND '$fechadehoy' LIMIT 4") or die( mysql_error() );
                        ?>
                        <table width="7%" height="5" border="0" align="center" cellpadding="0" cellspacing="1" >
                          <?php
                            if ( $nrows = mysql_num_rows( $con_alerta ) > 0 ) {
                            while ($rAler = mysql_fetch_object( $con_alerta ) ) {
                            echo "<tr><td><table border=0 cellpadding=0 cellspacing=0 class=alerta>";
                            echo "          <tr><td > Fecha:</td><td class=date><a class=date href=admoremi_valer.php?cId=$rAler->id>" . $rAler->fecha . "</a></td></tr>";
                            echo "          <tr><td >Extensi&oacute;n:</td><td><a class=date href=admoremi_valer.php?cId=$rAler->id>" . $rAler->extension . "</a></td></tr>";
                            echo "          <tr><td >Variable:</td><td><a class=date href=admoremi_valer.php?cId=$rAler->id>" . $rAler->variable . "</a></td></tr>";
                            echo "       </table></td>";
                            echo "</tr>";
                            echo "<tr><td height=5></td></tr>";
                            echo('<tr><td height="1" valign=top background="imagenes/lnbot-1.gif"></td></tr>');
                            echo "<tr><td height=5></td></tr>";
                            }
                            } else {
                              echo "<tr align=center><td><table border=0 cellpadding=0 cellspacing=0 class=alerta>";
                              echo "                       <tr align=center><td>No Existen Alertas Vigentes</td></tr>";
                              echo "                      </tr></table>";
                              echo "</td></tr>";
                            }
?>
                        </table></td>
                        </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="51"></td>
              </tr>
              <tr> 
                <td height="156" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1">
                    <tr> 
                      <td width="123" height="154"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="44"></td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td valign="top" height="52" colspan="8"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="notainc">
              <tr> 
                <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
              </tr>
              <tr> 
                <td width="735" height="32" valign="middle" align="center" class="notainc"> 
                  Desarrollado para la Oficina de Emergencia de la Regi&oacute;n 
                  de Coquimbo. </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
<?
mysql_close();
}

  if( $loginCorrecto ) {

    if( ( !$HTTP_GET_VARS[acc] ) || ($HTTP_GET_VARS[acc] == "dmin" ) ) {
      CabeceraHTML();
?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
           <td width="455" height="21" valign="top">
		     <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
               <tr> 
                  <td width="455" height="20" valign="middle" align="left" class="topmenu"> 
                  <? if( $Nniv == "2") { $msg01 = "Eventos Provinciales por Cerrar"; }
                         echo " $msg01 "; ?>
                  </td>
               </tr>
               <tr> 
                  <td valign="top" height="1" background="imagenes/vert.gif"></td>
               </tr>
             </table>
           </td>
        </tr>
        <tr> 
           <td height="350"> 
              <!-- height="375" -->
              <!-- Listar Ultimos Informes/Consolidados Despachados aun en proceso [no cerrados] -->
              <DIV align="left" style="padding-left: 5px; HEIGHT: 350px; OVERFLOW: auto; WIDTH: 100%">
              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
                <tr><td height="10" ></td></tr>
                <tr>
                    <td>
                       <table border=0 cellspacing=1 cellpadding=0 width=100% bgcolor=#FFFFFF>
                       <?
                          if ($Nniv == "2") {
							  $xst = 0;
                              // Desplegar Consolidados Creados
                                 $con_ninf = mysql_query("SELECT idconsprov, ConsolidaProvincia.idfuente, ocurrencia, descinforme, nrocons FROM ConsolidaProvincia INNER JOIN FUENTE ON ConsolidaProvincia.idfuente = FUENTE.idfuente WHERE (FUENTE.username='$userN') AND (idestadoevento BETWEEN 0 AND 1) ORDER BY ocurrencia DESC LIMIT 7") or die(mysql_error());
                                 if( $nreg = mysql_num_rows( $con_ninf ) > 0 ) { ?>
<?                                 while($row=mysql_fetch_object($con_ninf)) {
                                     list($year, $month, $day, $time) = split('[-. ]', $row->ocurrencia);
                                     $fecha = $day ."-". $month ."-". $year;
                                     $describe = substr($row->descinforme,0,40) . "..."; ?>
									 
                                     <tr bgcolor="#FfFfFf">
                                       <td width="10%" bgcolor="#F0F6F9">&nbsp;Fecha</td>
                                       <td width="63%" bgcolor="#FFFFFF"><a href="<? $PHP_SELF?>?acc=mcons&id=<?php echo $row->idconsprov; ?>&userN=<?php echo $userN; ?>" class="enlace"><?php echo $fecha; ?></a></td>
                                       <td width="10%" bgcolor="#F0F6F9">&nbsp;NºInf.</td>
                                       <td width="17%" align="left" bgcolor="#FFFFFF"><a href="<? $PHP_SELF?>?acc=mcons&id=<?php echo $row->idconsprov; ?>&userN=<?php echo $userN; ?>" class="enlace"><?php echo $row->nrocons; ?></a></td>
                                     </tr>
                                     <tr bgcolor="#FFFFFF">
                                       <td colspan="2" bgcolor="#FFFFFF"> <a href="<? $PHP_SELF?>?acc=mcons&id=<?php echo $row->idconsprov; ?>&userN=<?php echo $userN; ?>" class="enlace"><?php echo $describe; ?></a></td>
                                       <td colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><strong><a href="<? $PHP_SELF?>?acc=cr&id=<? echo $row->idconsprov;?>" class="blueunder">&raquo; Cerrar Evento &laquo;</a></strong></td>
                                     </tr>
						             <tr bgcolor="#FFFFFF"><td colspan="4"></td></tr>
                                     <tr><td colspan="4" background="imagenes/lnbot-1.gif"></td></tr>
                                     <tr><td height=3 colspan="4" bgcolor="#FFFFFF"></td></tr>
<?php                           }
                                mysql_free_result($con_ninf); ?>
<?							} else { $xst = 1; } ?>
                       </table>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr><td height=15></td></tr>
                <tr bgcolor=#F0F6F9>
                    <td align=center height=45 valign=middle bgcolor=#F8F8F8> 
<?                       if ( $xst == 1 ) { 
                            echo "<strong>No Existen Eventos Provinciales por Cerrar</strong>";
						 } ?>
                    </td>
               </tr>

              </table>
			  </DIV>
			  </td>
			  </tr>
			  <tr>
                <td height="15" ></td>
              </tr>
              <tr>
                <td background="imagenes/lnbot-1.gif"></td>
              </tr>

              <tr>
                <td height="5" ></td>
              </tr>
              <tr> 
                <td align="right" valign="middle"> <a href="javascript:history.back();"> 
                  <img src="imagenes/atras.png" width="90" height="15" border="0"> 
                  </a> </td>
              </tr>
            </table>
			
<? 
   RestoHTML();
   }
}


if( $HTTP_GET_VARS[acc] == "cr" ) {
    mysql_query( "UPDATE ConsolidaProvincia SET idestadoevento = '3' WHERE idconsprov = '$id' " ) or die( mysql_error() );
    header("Location: $PHP_SELF?acc=dmin" );
}

} else {    Header("location: index.php"); } ?>