<?
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();

  Global $cCons;
  $cCons = $HTTP_GET_VARS[cCons];

//  echo "Los valores correpsondientes a cCons: ". $cCons ." y el valor correspondiente a Var: ". $var;

?>
<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>
</head>

<body bgcolor="f7f7f7" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="737" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
  <tr>
    <td><table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
        <tr> 
          <td width="485" height="95" valign="top" bgcolor="#DDE5F2"><img src="imagenes/imgsup-1.gif" width="182" height="95"><img src="imagenes/imgtit-1.gif" width="293" height="95"></td>
          <td width="250" align="right" valign="top" bgcolor="#DDE5F2"><img src="imagenes/imgsup-2.gif" width="146" height="95"> 
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
      <table width="735" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tablebody">
        <tr> 
          <td width="3" height="401" valign="top">&nbsp;</td>
          <td width="127" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
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
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" class="blueone" title=" Enlace a Sitio Web con el Informe de los �ltimos 30 Sismos Sensibles ">Eventos 
                        S&iacute;smicos</a></td>
                    </tr>
                    <tr> 
                      <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.meteochile.cl" target="_blank" class="blueone" title=" Enlace a Sitio Web del Servicio de Meteorolog�a de Chile">Meteorolog&iacute;a 
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
                      <td><a href="http://www.onemi.cl/pageview.php?file=riesgos/riesgos.htm" target="_blank" class="blueone" title=" Gu�a de Riesgos [onemi] ">Gu&iacute;a 
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
                            title=" Escala de Mediciones T�cnicas [onemi] "> Escalas 
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
          <td width="460" valign="top"> <table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="450" height="21" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                    <tr> 
                      <td width="296" height="20" valign="middle" align="left" class="topmenu">&nbsp;Descripci&oacute;n 
                        del Evento</td>
                    </tr>
                    <tr> 
                      <td valign="top" height="1" background="imagenes/vert.gif"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td valign="top"> 
                  <DIV align="left" style="padding-left: 5px; HEIGHT: 420px; OVERFLOW: auto; WIDTH: 450"> 
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
                      <!-- INFORMACION DEL EVENTO -->
                      <?php
  // Consultar a Tabla x Evento
   
   $con_evento = mysql_query("SELECT idconsreg, ConsolidaRegion.idtipoevento, tipoevento, ocurrencia, descinforme, resumen FROM ConsolidaRegion INNER JOIN TipoEvento ON ConsolidaRegion.idtipoevento = TipoEvento.idtipoevento WHERE idconsreg = '$cCons'") or DIE(mysql_error());

   if($row=mysql_fetch_object($con_evento)) {
      $nroevento= $row->idconsreg;
      $describe = $row->descinforme;
      $tipo     = $row->tipoevento;
      $fecha    = $row->ocurrencia;
      $resumen  = str_replace("\r\n","<BR>",$row->resumen);
   }
   mysql_free_result($con_evento);

?>
                      <tr>
                        <td height="10" ></td>
                      </tr>
                      <tr>
                        <td background="imagenes/lnbot-1.gif"></td>
                      </tr>
                      <tr> 
                        <td height="15" ><table width="100%" border="0" cellspacing="1" cellpadding="0">
                            <tr> 
                              <td width="5%" align="center" bgcolor="#DDE5F2"><strong><?php echo $nroevento; ?></strong> 
                              </td>
                              <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
                                  <tr bgcolor="#f3f7f7"> 
                                    <td colspan="2"><?php echo $tipo; ?></td>
                                  </tr>
                                  <tr> 
                                    <td width="20%" bgcolor="#e0e0e0">Ocurrido 
                                      el:</td>
                                    <td width="82%" bgcolor="#e8e8e8"><?php echo $fecha; ?></td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td background="imagenes/lnbot-1.gif"></td>
                      </tr>
                      <tr>
                        <td height="15" ></td>
                      </tr>
                      <tr> 
                        <td > <table width="100%" border="0" cellpadding="0" cellspacing="1">
                            <tr>
                              <td background="imagenes/lnbot-1.gif"></td>
                            </tr>
                            <tr bgcolor="#DDE5F2"> 
                              <td width="85" class="topmenu">&nbsp;Resumen:&nbsp;</td>
                            </tr>
                            <tr>
                              <td background="imagenes/lnbot-1.gif"></td>
                            </tr>
                            <tr  bgcolor="#Ffffff"> 
                              <td><?php echo $resumen; ?></td>
                            </tr>
                          </table></td>
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
                    </table>
                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                      <tr> 
                        <td align="center" valign="middle"><a href="javascript:history.back();"><img src="imagenes/atras.png" width="90" height="15" border="0"></a></td>
                      </tr>
                    </table>
                  </DIV></td>
              </tr>
            </table></td>
          <td width="1" valign="top">&nbsp; </td>
          <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
          <td width="126" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="125" height="150" valign="top">&nbsp; </td>
              </tr>
              <tr> 
                <td height="25"></td>
              </tr>
              <tr> 
                <td height="150" valign="top"> 
                  <table width="100%" border="0" cellpadding="0" cellspacing="1">
                    <tr> 
                      <td width="123" height="150"></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr> 
                <td height="25"></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td valign="top" height="35" colspan="8"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="notainc">
              <tr> 
                <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
              </tr>
              <tr> 
                <td width="735" height="32" valign="middle" align="center" class="notainc"> 
                  Desarrollado para la Oficina de Emergencia de la Regi&oacute;n 
                  de Coquimbo. Sitio Optimizado para una visualizaci&oacute;n 
                  de 800x600.</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php
  mysql_close();
?>
