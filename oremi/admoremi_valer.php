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
          <td width="250" align="right" valign="top"><img src="imagenes/imgsup-2.gif" width="146" height="95"> 
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
      </script> &nbsp;
	  </td>
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
                <td height="28"></td>
              </tr>
              <tr> 
                <td height="65" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                <td height="9"></td>
              </tr>
            </table></td>
          <td width="9" background="imagenes/lnvert-1.gif"></td>
          <td width="460" valign="top"> <table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="450" height="21" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                    <tr> 
                      <td width="296" height="20" valign="middle" align="left" class="topmenu">&nbsp;Descripci&oacute;n 
                        de la Alerta</td>
                    </tr>
                    <tr> 
                      <td valign="top" height="1" background="imagenes/vert.gif"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="450" valign="top"> <DIV align="left" style="padding-left: 5px; HEIGHT: 420px; OVERFLOW: auto; WIDTH: 450"> 
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
                      <!-- INFORMACION DEL EVENTO -->
                      <?php
  // Consultar a Tabla x Alerta
   
   $con_alerta = mysql_query("SELECT * FROM alerta WHERE id = '$cId'") or DIE(mysql_error());

   if($row=mysql_fetch_object($con_alerta)) {
      $nFecha = $row->fecha;
      $nGrado     = $row->grado;
      $nExtension    = $row->extension;
      $nVariable    = $row->variable;
      $nSituacion  = str_replace("\r\n","<BR>",$row->situacion);
      $nOrientacion  = str_replace("\r\n","<BR>",$row->orientacion);
   }
   mysql_free_result($con_alerta);

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
                              <td width="5%" align="center" bgcolor="#DDE5F2"><strong><?php echo $cId; ?></strong> 
                              </td>
                              <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
                                  <tr bgcolor="#f3f7f7"> 
                                    <td>Fecha:</td>
                                    <td><?php echo $nFecha; ?></td>
                                  </tr>
                                  <tr> 
                                    <td width="20%" bgcolor="#e0e0e0">Extensi&oacute;n:</td>
                                    <td width="82%" bgcolor="#e8e8e8"><?php echo $nExtension; ?></td>
                                  </tr>
                                  <tr> 
                                    <td width="20%" bgcolor="f7f7f7">Variable:</td>
                                    <td bgcolor="f7f7f7"><?php echo $nVariable; ?></td>
                                  </tr>
                                  <tr> 
                                    <td bgcolor="#e0e0e0">Grado:</td>
                                    <td bgcolor="#e8e8e8"><?php
									if ($nGrado == "1" ) { echo "TEMPRANA"; }
									else { echo "AMARILLA"; }
									?>
									</td>
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
                              <td width="85" class="topmenu">&nbsp;Situaci&oacute;n:&nbsp;</td>
                            </tr>
                            <tr> 
                              <td background="imagenes/lnbot-1.gif"></td>
                            </tr>
                            <tr  bgcolor="#Ffffff"> 
                              <td><?php echo $nSituacion; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr> 
                        <td height="7" ></td>
                      </tr>
                      <tr>
                        <td height="7" ></td>
                      </tr>
                      <tr>
                        <td height="15" ><table width="100%" border="0" cellpadding="0" cellspacing="1">
                            <tr> 
                              <td background="imagenes/lnbot-1.gif"></td>
                            </tr>
                            <tr bgcolor="#DDE5F2"> 
                              <td width="85" class="topmenu">&nbsp;Orientaci&oacute;n:&nbsp;</td>
                            </tr>
                            <tr> 
                              <td background="imagenes/lnbot-1.gif"></td>
                            </tr>
                            <tr  bgcolor="#Ffffff"> 
                              <td><?php echo $nOrientacion; ?></td>
                            </tr>
                          </table></td>
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
          <td width="126" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="125" height="150" valign="top">&nbsp; </td>
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
          <td valign="top" height="35" colspan="8"> <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="notainc">
              <tr> 
                <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
              </tr>
              <tr> 
                <td width="735" height="51" valign="top" align="center" class="notainc"> 
                  Desarrollado para la Oficina de Emergencia de la Regi&oacute;n 
                  de Coquimbo. Sitio Optimizado para una visualizaci&oacute;n 
                  de 800x600. Si usted tiene alg&uacute;n comentario o pregunta 
                  acerca de este sitio, cont&aacute;ctenos a oremisite@gorecoquimbo.cl 
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php
  mysql_close();
?>
