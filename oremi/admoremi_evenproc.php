<?
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();
  global $userN, $passN, $Nniv, $id;

  // Constatar logeo previo
  include("admoremi_sesid.inc");

function cabeceraHTML() {
global $id, $userN, $passN, $Nniv;

?>
<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="javascript" src="js/oremi.js"></script>
<script language="javascript" src="js/calendario.js"></script>
<script language="javascript" src="js/vldfecha.js"></script>
<script language="javascript" src="js/utils.js"></script>
<script language="javascript" src="js/vldIAlfa.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="735" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="666666">
  <tr>
    <td><table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
        <tr> 
          <td width="485" height="96" valign="top" bgcolor="#DDE5F2"><img src="imagenes/imgsup-1.gif" width="182" height="95"><img src="imagenes/imgtit-1.gif" width="293" height="95"></td>
          <td width="250" valign="top" bgcolor="eaeaea" > 
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <!--DWLayoutTable-->
              <tr> 
                <td width="101" valign="top" rowspan="3"></td>
                <td width="52" height="29"></td>
                <td width="38"></td>
                <td width="54"></td>
                <td width="5"></td>
              </tr>
              <tr> 
                <td height="15" colspan="2" valign="top"> <a href="admoremi_logout.php"><img src="imagenes/cerrar.gif" width="90" height="15" border="0"></a> 
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr> 
                <td height="32">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="top"></td>
                <td valign="top"></td>
              </tr>
              <tr> 
                <td height="15" valign="top"></td>
                <td></td>
                <td colspan="2" valign="middle" ><a href="administra/index.php" class="under" target="_blank"><img src="imagenes/auto.gif" width="92" height="15" border="0" align="absmiddle"></a></td>
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
          <td width="735" height="20" valign="top">&nbsp; </td>
        </tr>
        <tr> 
          <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
        </tr>
        <tr> 
          <td width="735" height="5" valign="top"></td>
        </tr>
      </table>
      <table width="735" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tablebody">
        <!--DWLayoutTable-->
        <tr> 
          <td width="3" height="411" valign="top">&nbsp;</td>
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
          <!-- Segunda Columna -->
          <td width="9" background="imagenes/lnvert-1.gif"></td>
          <!-- Tercera Columna -->
          <td width="327" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="21" colspan="3" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                    <tr> 
                      <td width="320" height="20" valign="middle" align="left" class="topmenu">&nbsp;Informes 
                        Alfas del Evento</td>
                    </tr>
                    <tr> 
                      <td valign="top" height="1" background="imagenes/vert.gif"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td width="1" height="13"></td>
                <td ></td>
                <td width="1"></td>
              </tr>
              <tr> 
                <td rowspan="3" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="1" height="377" background="imagenes/rayver.gif"></td>
                    </tr>
                  </table></td>
                <td height="1" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="327" height="1" background="imagenes/rayhor.gif"></td>
                    </tr>
                  </table></td>
                <td rowspan="3" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="1" height="377" background="imagenes/rayver.gif"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="375" valign="top"> 
                  <?
}
// FIN Funcion cabeceraHTML   ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
//                            ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...


function CentralPpalHTML(){
global $id,$userN, $passN, $Nniv;

?>
                  <div align="left" style="padding-left: 5px; HEIGHT: 350px; OVERFLOW: auto; WIDTH: 327"> 
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
                      <!-- Mostrar Informes Alfas del Evento Actual, Fecha, Hora, Nro Informe, Descripcion del Informe -->
                      <tr> 
                        <td bgcolor="#F0F6F9">&nbsp;Fecha</td>
                        <td bgcolor="#F0F6F9" align="center">&nbsp;NºInf.</td>
                        <td bgcolor="#F0F6F9">&nbsp;Descripci&oacute;n del Informe</td>
                      </tr>
                      <?
                       // Desplegar Informes Alfas del Evento Actual
                          $con_ninf = mysql_query("SELECT * FROM InformeAlfa WHERE idevento = '$id'") or die(mysql_error());
                          while($row=mysql_fetch_object($con_ninf)) {
                          list($year, $month, $day, $time) = split('[-. ]', $row->alfa_fecha);
                          $fecha = $day ."-". $month ."-". $year;
                          $describe = substr($row->descinforme,0,25) . "...";
?>
                      <tr bgcolor="#FfFfFf"> 
                        <td bgcolor="#F3F7F7"><a href="admoremi_valfac.php?alfa=<?php echo $row->idalfa; ?>&ev=<?php echo $row->idevento; ?>&userN=<?php echo $userN; ?>" class="enlace"><? echo $fecha; ?></a></td>
                        <td bgcolor="#F3F7F7" align="center"><a href="admoremi_valfac.php?alfa=<?php echo $row->idalfa; ?>&ev=<?php echo $row->idevento; ?>&userN=<?php echo $userN; ?>" class="enlace"><? echo $row->idalfa; ?></a></td>
                        <td bgcolor="#F3F7F7"><a href="admoremi_valfac.php?alfa=<?php echo $row->idalfa; ?>&ev=<?php echo $row->idevento; ?>&userN=<?php echo $userN; ?>" class="enlace"><? echo $describe; ?></a></td>
                      </tr>
                      <?                        }
                          mysql_free_result($con_ninf); ?>
                    </table>
                  </div>
                  <!--  COLOCAR NRO PAGINAS SI EXCEDE LOS n REGISTROS LOS INFORMES ALFAS DEL EVENTO -->
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
                    <tr> 
                      <td width="327" height="25">&nbsp;</td>
                    </tr>
                  </table>
                  <!--  FIN COLOCAR NRO PAGINAS SI EXCEDE LOS n REGISTROS LOS INFORMES ALFAS DEL EVENTO -->
                </td>
                <? }
// FIN Funcion CentralPpalHTML   ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
//                               ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...





function CreaInformeAlfaHTML(){
global $id,$userN, $passN, $Nniv;

?>
                                                           <!-- &id=<? echo $id; ?>&userN=<? echo $userN; ?> -->
                <form action="<? $PHP_SELF ?>?accion=GrabInfAlfa&id=<? echo $id; ?>&userN=<? echo $userN; ?>" method="post" name="form" onSubmit="return VldIAlfa1();">
                 <input type="hidden" name="id" value="<? echo $id; ?>">
    <!--               <input type="hidden" name="userN" value="<? echo $userN; ?>"> -->				  
                  <div align="left" style="padding-left: 5px; HEIGHT: 350px; OVERFLOW: auto; WIDTH: 327"> 
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                      <tr> 
                        <td width="81" height="13"></td>
                        <td width="58"></td>
                        <td width="3"></td>
                        <td width="12"></td>
                        <td width="62"></td>
                        <td width="80"></td>
                        <td width="7"></td>
                        <td width="10"></td>
                      </tr>
                      <tr> 
                        <td height="59" colspan="2" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <tr> 
                              <td height="15" colspan="2" align="center" valign="middle" bgcolor="F0F6F9">Ocurrencia</td>
                            </tr>
                            <tr> 
                              <td width="50" height="20" valign="top" bgcolor="F0F6F9">Fecha:</td>
                              <td width="86" valign="middle" align="center" bgcolor="#FFFFFF"> 
						<?php
 $fecha = date('d/m/Y');
// Obtener Hora
   $horanow = getdate();
   $hora = $horanow[hours].":".$horanow[minutes];
?>
						 <input name="fecha" type="text" value="<?php echo $fecha;?>" size="14" maxlength="10" onfocus="if(this.value=='<?php echo $fecha;?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo $fecha;?>';" onChange="return validar(this.form.fecha.value);"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="20" valign="top" bgcolor="F0F6F9">Hora:</td>
                              <td  bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input name="hora" type="text" value="<?php echo $hora;?>" size="10" maxlength="5"> 
                              </td>
                            </tr>
                          </table></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="3" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <tr> 
                              <td height="15" colspan="2" align="center" valign="middle" bgcolor="f0f6f9">Direcci&oacute;n/Ubicaci&oacute;n</td>
                            </tr>
                            <tr> 
                              <td width="136" height="20" valign="top" bgcolor="F0F6F9"> 
                                <?                           Veubicacion(); ?>
                              </td>
                            </tr>
                          </table></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="15"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td colspan="7" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <!--DWLayoutTable-->
                            <tr> 
                              <td width="301" height="18" align="center" valign="middle" bgcolor="f0f6f9">Descripci&oacute;n 
                                del Evento</td>
                            </tr>
                            <tr> 
                              <td bgcolor="#FFFFFF" align="center" valign="middle"> 
                                <input type="text" name="infalfa_describe" size="50" maxlength="50"></td>
                            </tr>
                          </table></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="10"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="13" colspan="8" valign="top"> <table border="0" cellpadding="0" cellspacing="0">
                            <!--DWLayoutTable-->
                            <tr> 
                              <td height="6"></td>
                            </tr>
                            <tr> 
                              <td height="1" background="imagenes/rayhor.gif"></td>
                            </tr>
                            <tr> 
                              <td height="6"></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr> 
                        <td height="13"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td colspan="3" rowspan="2" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <!--DWLayoutTable-->
                            <tr> 
                              <td height="15" colspan="2" align="center" valign="middle" bgcolor="F0F6F9">Da&ntilde;os 
                                Personas</td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Afectadas</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dp_afec" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Damnificadas</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dp_dam" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Heridas</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dp_her" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Muertas</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dp_muer" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Desaparecidas</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dp_desp" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Albergados</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dp_albe" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                          </table></td>
                        <td height="125" width="2"></td>
                        <td colspan="3" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <!--DWLayoutTable-->
                            <tr> 
                              <td height="15" colspan="2" align="center" valign="middle" bgcolor="F0F6F9">Da&ntilde;os 
                                Viviendas</td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Da&ntilde;o Menor 
                                Habitable</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dv_dmeh" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Da&ntilde;o Mayor 
                                No Habitable</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dv_dman" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="20" bgcolor="f0f6f9">Destruidas Irrecuperables</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dv_dirr" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                            <tr> 
                              <td height="26" valign="middle" bgcolor="f0f6f9">No 
                                Evaluadas</td>
                              <td bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_dv_noev" size="5" maxlenght="5" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                          </table></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="27"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
					  <TR>
					    <TD height="10" colspan="8">Nota: El Total de Damnificados incluye el Total de <strong>Albergados</strong>.</TD></TR>
                      <tr> 
                        <td height="25"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="83" colspan="7" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <!--DWLayoutTable-->
                            <tr> 
                              <td width="301" height="15" align="center" valign="middle" bgcolor="F0F6F9">Servicios 
                                B&aacute;sicos, Infraestructura y Otros</td>
                            </tr>
                            <tr> 
                              <td height="65" bgcolor="#FFFFFF" align="center" valign="middle"> 
                                <div align="left" style="padding-left: 1px; HEIGHT: 65px; OVERFLOW: auto; WIDTH: 100%"> 
                                  <table  width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr> 
                                      <td align="center" valign="middle"> <textarea name="infalfa_servicios" rows="4" cols="52"></textarea></td>
                                    </tr>
                                  </table>
                                </div></td>
                            </tr>
                          </table></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="15"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="25" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <!--DWLayoutTable-->
                            <tr> 
                              <td width="190" height="23" align="right" valign="middle" bgcolor="F0F6F9">Monto 
                                Estimado de Da&ntilde;os ($)</td>
                              <td width="110" bgcolor="#FFFFFF" valign="middle" align="center"> 
                                <input type="text" name="infalfa_montodanos" size="12" maxlenght="12" value="0" onKeyPress="return numbersonly(this, event)"> 
                              </td>
                            </tr>
                          </table></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="15"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="25" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <!--DWLayoutTable-->
                            <tr> 
                              <td width="153" height="23" align="right" valign="middle" bgcolor="F0F6F9">Cap. 
                                de Respuesta</td>
                              <td width="147" valign="middle" bgcolor="#FFFFFF"> 
                                <?                          VeCapRespuesta(); ?>
                              </td>
                            </tr>
                          </table></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="15"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="83" colspan="7" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                            <!--DWLayoutTable-->
                            <tr> 
                              <td width="301" height="15" align="center" valign="middle" bgcolor="F0F6F9">Observaciones</td>
                            </tr>
                            <tr> 
                              <td height="65" bgcolor="#FFFFFF"> <div align="left" style="padding-left: 1px; HEIGHT: 65px; OVERFLOW: auto; WIDTH: 100%"> 
                                  <table  width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr> 
                                      <td align="center" valign="middle"> <textarea name="infalfa_observa" rows="4" cols="52"></textarea></td>
                                    </tr>
                                  </table>
                                </div></td>
                            </tr>
                          </table></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="18"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <!--                  <td height="37"></td>  -->
                        <td height="5"></td>
                        <td colspan="4" valign="top"> 
                          <!--                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder"> -->
                          <!--DWLayoutTable-->
                          <!--                      <tr> 
                        <td width="134" height="35" align="center" valign="middle" bgcolor="F0F6F9" class="btn_med">Grabar 
                          Informe</td>
                      </tr>
                      </table> -->
                        </td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr> 
                        <td height="5"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5" class="tablebody">
                  <!--DWLayoutTable-->
                  <tr> 
                    <td width="1" height="2"></td>
                    <td width="100"></td>
                    <td width="9"></td>
                    <td width="100"></td>
                    <td width="5"></td>
                    <td width="100"></td>
                    <td width="3"></td>
                  </tr>
                  <tr> 
                    <!-- OPCION A COLOCAR EL BOTON GRABAR INFORME ALFA -->
                    <!--        Luego en este mismo sector aparecen los tres botones: Decisiones, Recursos y Evaluacion -->
                    <td height="20" colspan="7" align="center" valign="middle"> 
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                        <!--DWLayoutTable-->
                        <tr> 
                          <td height="20" align="center" valign="middle" bgcolor="#E0E0E0" > 
                            <input name="saveinfalfa" type="submit" class="btn_med" value=" Siguiente Paso >> "> 
                          </td>
                        </tr>
                      </table></td>
                    <!--                <td align="center" valign="middle" bgcolor="DDE5F2" class="btn_med">
                                              <a href="" class="blueunder">Decisiones</a>
                                        </td>
                                        <td>&nbsp;</td>
                                       <td align="center" valign="middle" bgcolor="DDE5F2" class="btn_med">
                                           <a href="" class="blueunder">Recursos</a>
                                       </td>
                                      <td>&nbsp;</td>
                                     <td align="center" valign="middle" bgcolor="DDE5F2" class="btn_med">
                                         <a href="" class="blueunder">Evaluaci&oacute;n</a>
                                     </td>
                                     <td>&nbsp;</td> -->
                  </tr>
                </table>
                </form>

                <!-- </td>
        </tr> -->
                <? } // FIN CreaInforme()



function RestoHTML(){
global $id,$userN, $passN, $Nniv;
?>
              </tr>
              <tr> 
                <td height="1" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <!--DWLayoutTable-->
                    <tr> 
                      <td width="318" height="1" background="imagenes/rayhor.gif"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          <!-- Cuarta Columna -->
          <td width="9" background="imagenes/lnvert-1.gif"></td>
          <!-- Quinta Columna -->
          <td width="260" valign="top"> 
            <!-- <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5" class="tablebody">
            <tr> 
              <td height="3"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table> -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="tablebody">
              <tr> 
                <td width="66" height="56">&nbsp;</td>
                <td width="135" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                    <tr> 
                      <td width="133" height="25" valign="middle" align="center" class="topmenu">Informe 
                        Alfa</td>
                    </tr>
                    <tr> 
                      <td height="28" align="center" valign="middle" bgcolor="#FFFFFF" class="bluenunder"> 
					  <? if ($Nniv == "3") { ?>
                           <a href="<? $PHP_SELF ?>?accion=creaalfa&id=<? echo $id; ?>&userN=<? echo $userN; ?>"  class="blueunder">Crear Informe Alfa</a>
                      <? } ?>
                      </td>
                    </tr>
                  </table></td>
                <td width="68">&nbsp;</td>
              </tr>
              <tr> 
                <td height="23">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td height="335" colspan="3" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                    <!-- INFORMACION DEL EVENTO -->
                    <?              // Consultar a Tabla x Evento
                 $con_evento = mysql_query("SELECT desctipoevento, Evento.idubicacion, ubicacion, ocurrencia, nro_infalfas, idestadoevento, resumen FROM Evento INNER JOIN Ubicacion ON Evento.idubicacion = Ubicacion.idubicacion WHERE idevento='$id'") or DIE(mysql_error());
                 if($row=mysql_fetch_object($con_evento)) {
                    $describe = $row->desctipoevento;
                    $ubicado  = $row->ubicacion;
                    $fecha    = $row->ocurrencia;
                    $nroinf   = $row->nro_infalfas;
                    $idestado = $row->idestadoevento;
                    $resumen  = $row->resumen;

                    if ($idestado != "0") {
                        $con_estado = mysql_query("SELECT estadoevento FROM EstadoEvento WHERE idestadoevento='$idestado'") or die(mysql_error());
                        if ($rowstate = mysql_fetch_object($con_estado)){
                            $estado = $rowstate->estadoevento;
                        }
                        mysql_free_result($con_estado);
                    }
                    else
                    {
                            $estado = "Reci&eacute;n creado";
                    }  
                 }  
                 mysql_free_result($con_evento);

?>
                    <tr> 
                      <td height="10" colspan="2" align="center" valign="middle" class="topmenu">Evento</td>
                    </tr>
                    <tr> 
                      <td height="5" colspan="2" valign="top" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr> 
                      <td height="25" align="right" valign="middle">Desc. Evento:</td>
                      <td align="left" valign="middle" bgcolor="#FFFFFF">&nbsp; 
                        <?                    echo $describe; ?>
                      </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="10" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr> 
                      <td height="25" align="right" valign="middle">Ubicaci&oacute;n:</td>
                      <td align="left" valign="middle" bgcolor="#FFFFFF">&nbsp; 
                        <?                    echo $ubicado;?>
                      </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="10" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr> 
                      <td height="25" align="right" valign="middle">Ocurrencia:</td>
                      <td align="left" valign="middle" bgcolor="#FFFFFF">&nbsp; 
                        <?                     echo $fecha; ?>
                      </td>
                    </tr>
                    <tr> 
                      <td height="10" colspan="2" valign="top" bgcolor="#FFFFFF"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr> 
                      <td height="25" align="right" valign="middle">N&ordm; de 
                        Alfas:</td>
                      <td align="left" valign="middle" bgcolor="#FFFFFF">&nbsp; 
                        <?                     echo $nroinf; ?>
                      </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="10" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr> 
                      <td width="80" height="25" align="right" valign="middle">Estado:</td>
                      <td width="186" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp; 
                        <?                    echo $estado;  ?>
                      </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="10" colspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    </tr>
                    <tr> 
                      <td height="25" colspan="2" align="center" valign="middle">Resumen 
                        Evento </td>
                    </tr>
                    <tr bgcolor="#FFFFFF"> 
                      <td height="80" colspan="2" valign="top"> <DIV align="left" style="padding-left: 5px; HEIGHT: 80px; OVERFLOW: auto; WIDTH: 100%"> 
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                            <tr> 
                              <td> 
                                <?                             echo $resumen; ?>
                              </td>
                            </tr>
                          </table>
                        </DIV></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td valign="top" height="35" colspan="6">&nbsp; </td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td valign="top" height="35" colspan="6"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="notainc">
              <tr> 
                <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
              </tr>
              <tr> 
                <td width="735" height="32" valign="top" align="center" class="notainc"> 
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
</body>
</html>
<?
}
// FIN Funcion RestoHTML      ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
//                            ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...


if(!($loginCorrecto))
{
    Header("location: index.php");
}
else
{
    global $id,$userN, $passN, $Nniv;
    include ("calendario/calendario.php");
    include("utils/utils.inc");

    if (!isset($HTTP_GET_VARS['accion']) OR $HTTP_GET_VARS['accion']=="lista"){
        cabeceraHTML();
        CentralPpalHTML();
		//MuestraInforme();
        RestoHTML(); 
    }

    if ($HTTP_GET_VARS['accion']=="creaalfa"){
        global $id,$userN, $passN, $Nniv; 
        cabeceraHTML();
        CreaInformeAlfaHTML();
		//MuestraInforme();
        RestoHTML();
    }



    if ($HTTP_GET_VARS['accion']=="GrabInfAlfa"){
        global $id, $IAlf,$userN, $passN, $Nniv;
        $id = $HTTP_GET_VARS['id'];
		
        if (isset($saveinfalfa)) {
		// Graba Informe Alfa --> significa:
		// 			Incrementar en Tabla Evento el campo nro_infalfas
		//			El incremento de nro_infalfas será el que tendrá el campo idalfa en Tabla InformeAlfa
		//			Se deberá chequear lo último, en el caso que se trate de grabar again en Tabla Evento
		//			El Estado Alfa será "EN PROCESO" o algo similar.
		//			Chequear campo idinfconsprov en Tabla InformeAlfa.


		// Incrementar campo nro_infalfas en Tabla Evento a partir del Evento $id
		   $con_evento = mysql_query("SELECT nro_infalfas FROM Evento WHERE idevento = '$id'") or Die(mysql_error());
 
		   $NroInformes = 0;
           if ($row=mysql_fetch_array($con_evento)) {
              // Rescatar campo nro_infalfas para luego incrementar su valor
              // El valor incrementado será el idalfa.

                 $NroInformes = $row[nro_infalfas] + 1;

              // Transformar Fecha
                 $splfecha = split('[/.-]', $fecha);
                 $day = $splfecha[0];
                 $month = $splfecha[1];
                 $year = $splfecha[2];

                 $splthora = split('[:.]', $hora);
                 $hour = $splthora[0];
                 $minute = $splthora[1];
                 $second = $splthora[2];

                 $fecha_ = date("Y-m-d H:i:s",mktime($hour,$minute,$second,$month,$day,$year));

/*
// Chequeamos Que Ya No Exista idalfa creado, para almacenar primeros datos del InformeAlfa --> alfa_fecha='$fecha_'
$con_infalfa = mysql_query("SELECT idalfa, idevento FROM InformeAlfa WHERE idevento='$id' AND idalfa='$NroInformes'") Or Die(mysql_error());

if ($rslt=mysql_num_rows($con_infalfa) == 0) // No Existe Informe Alfa
{	// Grabar Inmediatamente
    // Incremento nro_infalfas
	   $NroInformes = $NroInformes + 1;
*/

             // Grabo Primera Parte del Informe Alfa para luego incrementar el nro_infalfas en Tabla Evento
                mysql_query("INSERT INTO InformeAlfa(idalfa, idevento, descinforme, idcapresp, observaciones, alfa_fecha) VALUES('$NroInformes','$id','$infalfa_describe','$respuesta','$infalfa_observa','$fecha_')") or Die(mysql_error());

             // Conocer idemergencia de registro creado en InformeAlfa
                $con_emergencia = mysql_query("SELECT idemergencia FROM InformeAlfa WHERE idalfa = '$NroInformes' AND idevento = '$id'") or die(mysql_error());
                if ($row=mysql_fetch_array($con_emergencia)) {
                    $IdEmer = $row[idemergencia];
                }
                mysql_free_result($con_emergencia);

             // Tomar el idemergencia y registrar info en Tabla AlfaDanos
                mysql_query("INSERT INTO AlfaDanos(idemergencia, pers_afectadas, pers_damnifica, pers_heridas, pers_muertas, pers_desaparec, pers_albergada, viv_danomenor, viv_danomayor, viv_destruirre, viv_noevaluada, serviciobasico, montodanos) Values('$IdEmer','$infalfa_dp_afec','$infalfa_dp_dam','$infalfa_dp_her','$infalfa_dp_muer','$infalfa_dp_desp','$infalfa_dp_albe','$infalfa_dv_dmeh','$infalfa_dv_dman','$infalfa_dv_dirr','$infalfa_dv_noev','$infalfa_servicios','$infalfa_montodanos')") or die(mysql_error());
                mysql_query("UPDATE Evento SET nro_infalfas = '$NroInformes' WHERE idevento = '$id'") or Die(mysql_error());
                mysql_close();
/*                       } */

                header("Location: $PHP_SELF?accion=SeccAcc&id=$id&userN=$userN&IAlf=$NroInformes");
           }
           mysql_free_result($con_evento);
        }
     }






    if ($HTTP_GET_VARS['accion']=="SeccAcc"){
        global $id, $IAlf,$userN, $passN, $Nniv;
          cabeceraHTML();
?>
                                               <!-- &id=&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?> -->
        <form action="<? $PHP_SELF ?>?accion=SeccRec&id=&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?>" method="post" name="form">
           <INPUT type="hidden" name="id" value="<? echo $id; ?>">
   <!--       <INPUT type="hidden" name="IAlf" value="<? echo $IAlf; ?>"> -->
          <DIV align="left" style="padding-left: 5px; HEIGHT: 350px; OVERFLOW: auto; WIDTH: 318">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <!--DWLayoutTable-->
                <tr> 
                  <td width="206" height="14"></td>
                  <td width="90"></td>
                  <td width="14"></td>
                  <td width="3"></td>
                </tr>
                <tr> 
                  <td height="20"></td>
                  <td valign="middle"><a href="<? $PHP_SELF ?>?accion=AddAcc&id=<? echo $id; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?>"><img src="imagenes/btn_maspass2.gif" width="90" height="20" border="0" Alt=" Agregar Mas Acciones para Informe Alfa Actual  "></a></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="16"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="20" colspan="3" valign="top">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td width="308" height="18" align="center" valign="middle" bgcolor="f0f6f9" class="topmenu">
                          <strong>Decisiones Acciones y Soluciones Inmediatas</strong></td>
                      </tr>
                    </table>
				  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="17"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="195" colspan="3" valign="top">
                      <!-- Zona DIV Para manejar Acciones ingresadas -->
                       <DIV align="left" style="padding-left: 5px; HEIGHT: 195px; OVERFLOW: auto; WIDTH: 100%">
                       <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                       <!--DWLayoutTable-->
                       <tr> 
                          <td width="215" height="18" valign="middle" bgcolor="#EAEAEA">Acciones y Soluciones en Ejecuci&oacute;n</td>
                          <td width="92" align="center" valign="middle" bgcolor="#EAEAEA">Tpo. Reestab.</td>
                       </tr>
<?
                         /* Limito la busqueda */
                            $TAMANO_PAGINAia2 = 9;

                         /* examino la página a mostrar y el inicio del registro a mostrar */
                            $paginaia2 = $HTTP_GET_VARS["paginaia2"];
                            if (!$paginaia2) {
                                $inicioia2 = 0;
                                $paginaia2=1;
                            } else {
                                $inicioia2 = ($paginaia2 - 1) * $TAMANO_PAGINAia2;
                            }

                            $ssql = "select AlfaDecisiones.idemergencia, accion, tiemporestablece FROM AlfaDecisiones INNER JOIN InformeAlfa ON AlfaDecisiones.idemergencia = InformeAlfa.idemergencia WHERE InformeAlfa.idevento='$id' AND InformeAlfa.idalfa = '$IAlf'";
                            $rs = mysql_query($ssql);

                            $num_total_registrosia2 = mysql_num_rows($rs);
                            /* calculo el total de páginas */
                               $total_paginasia2 = ceil($num_total_registrosia2 / $TAMANO_PAGINAia2);

                            /* pongo el número de registros total, el tamaño de página y la página que se muestra */
                               $maxpagsia2 = 4;
                               $minimoia2 = $maxpagsia2 ? max(1, $paginaia2-ceil($maxpagsia2/2)): 1;
                               $maximoia2 = $maxpagsia2 ? min($total_paginasia2, $paginaia2+floor($maxpagsia2/2)): $total_paginasia2;

                            /* construyo la sentencia SQL */
                               $ssql = "select AlfaDecisiones.idemergencia, accion, tiemporestablece FROM AlfaDecisiones INNER JOIN InformeAlfa ON AlfaDecisiones.idemergencia = InformeAlfa.idemergencia WHERE InformeAlfa.idevento='$id' AND InformeAlfa.idalfa = '$IAlf' LIMIT ". $inicioia2 . "," . $TAMANO_PAGINAia2;
                               $rs = mysql_query($ssql);

                               while ($fila=mysql_fetch_object($rs))
                               {
                                  $accion = substr($fila->accion,0,30) . "... ";
                                  $tiempo = substr($fila->tiemporestablece,0,10);  ?>

                                  <tr>
                                     <td height="15" bgcolor="#F3F7F7"><? echo $accion; ?></td>
                                     <td bgcolor="#F3F7F7"><? echo $tiempo; ?></td>
                                  </tr>
                                  <tr><td ColSpan="2" height="3"></td></tr>
<?                             } // FIN while ?>
<!--                              <tr> 
                                     <td height="174" bgcolor="f3f7f7">&nbsp;</td>
                                     <td bgcolor="f3f7f7">&nbsp;</td>
                                  </tr>   -->
                       </table>
                       </DIV>
                  </td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="5"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="13" colspan="4" valign="top"> 
                      <table border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
                        <tr><td height="6"></td></tr>
                        <tr><td height="1" background="imagenes/rayhor.gif"></td></tr>
                        <tr><td height="6"></td></tr>
                      </table>
				  </td>
                </tr>
                <tr> 
                  <td height="30" colspan="3" valign="top">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--Mostrar Paginacion de Resultados Para Acciones Tomadas En el Informe alfa Actual-->
                      <tr> 
                        <td width="308" height="28" bgcolor="f3f7f7">
                        <?
                          /* cerramos el conjunto de resultados y la conexión con la base de datos */
                             mysql_free_result($rs);
                       //    mysql_close();

                             if ($total_paginasia2 > 1) { echo "P&aacute;gina &nbsp;"; }
                              /* muestro los distintos índices de las páginas, si es que hay varias páginas */
                                 if($paginaia2 > 1)
                                 {
                                    echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccAcc&id=$id&IAlf=$IAlf&paginaia2=".($paginaia2-1)."'>";
                                    echo "<font face='verdana' size='-2'>anterior</font>";
                                    echo "</a>&nbsp;";
                                 }

                                 if ($total_paginasia2 > 1)
                                 {
                                    for ($i=$minimoia2; $i<$paginaia2; $i++){
                                         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccAcc&id=$id&userN=$userN&IAlf=$IAlf&paginaia2=".$i."'> $i</a>&nbsp;";
                                    }
 
                                    for ($i=$paginaia2; $i<=$maximoia2; $i++){
                                         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccAcc&id=$id&userN=$userN&IAlf=$IAlf&paginaia2=".$i."'>$i</a>&nbsp;";
                                    }
                             }

                             if($paginaia2 < $total_paginasia2)
                             {
                                echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccAcc&id=$id&userN=$userN&IAlf=$IAlf&paginaia2=" .($paginaia2+1). "'>";
                                echo "<font face='verdana' size='-2'>siguiente</font></a>";
                             } ?>
                        </td>
                      </tr>
                      </table>
				  </td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="5"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>

              </DIV>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5" class="tablebody">
              <!--DWLayoutTable-->
              <tr>
                <td width="1" height="2"></td>
                <td width="100"></td>
                <td width="9"></td>
                <td width="100"></td>
                <td width="5"></td>
                <td width="100"></td>
                <td width="3"></td>
              </tr>
              <tr>

              <!--        Luego en este mismo sector aparecen los tres botones: Decisiones, Recursos y Evaluacion -->

                <td height="20" ColSpan="7" align="center" valign="middle">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr>
                        <td height="20" align="center" valign="middle" bgcolor="F3F7F7" >
                            <input name="saveinfalfa2" type="submit" class="btn_med" value=" Siguiente Paso >> ">
                        </td>
                      </tr>
                    </table>
                </td>

<!--                <td height="20" ></td>

                <td align="center" valign="middle" bgcolor="DDE5F2" class="btn_med">
                   <a href="" class="blueunder">Decisiones</a>
                </td>
                <td>&nbsp;</td>
                <td align="center" valign="middle" bgcolor="DDE5F2" class="btn_med">
                   <a href="" class="blueunder">Recursos</a>
                </td>
                <td>&nbsp;</td>
                <td align="center" valign="middle" bgcolor="DDE5F2" class="btn_med">
                   <a href="" class="blueunder">Evaluaci&oacute;n</a>
                </td>
                <td>&nbsp;</td>   -->

              </tr>
              <tr>
                <td height="3"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table> 
			             </form>

      </td>
<?
// FIN Funcion Grabar Informe Alfa 2  ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
//                                   ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
          RestoHTML();
          mysql_close(); 

    }







   if ($HTTP_GET_VARS['accion']=="AddAcc"){
      global $id,$IAlf,$userN, $passN, $Nniv;
      cabeceraHTML();
?>
      <form action="<? $PHP_SELF ?>?accion=SavAcc&id=<? echo $id; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?>" method="post" name="form" onsubmit=" return VldIAlfa2();">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" >
        <!--DWLayoutTable-->
        <tr> 
           <td width="310" height="50"></td>
           <td width="3"></td>
        </tr>
        <tr> 
           <td height="20" valign="top">
               <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                  <!--DWLayoutTable-->
                  <tr> 
                     <td width="308" height="18" align="center" valign="middle" bgcolor="f0f6f9" class="topmenu">
                         <strong>Decisiones Acciones y Soluciones Inmediatas</strong>
                     </td>
                  </tr>
               </table>
           </td>
           <td>&nbsp;</td>
        </tr>
        <tr> 
           <td height="17"></td>
           <td></td>
        </tr>
        <tr> 
           <td height="105" valign="top">
             <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                <!--DWLayoutTable-->
                <tr> 
                   <td height="18" colspan="2" valign="middle" bgcolor="#F0F6F9">&nbsp;Acciones y 
                       Soluciones en Ejecuci&oacute;n</td>
                </tr>
                <tr> 
                   <td height="25" colspan="2" valign="middle" align="center" bgcolor="#F3F7F7">
                       <input type="text" name="infalfa_accione" size="58" maxlength="255" tabindex="1"> 
                   </td>
                </tr>
                <tr> 
                   <td height="25" align="center" valign="middle" bgcolor="#F0F6F9" width="55%" >Tiempo Restablecimiento</td>
                   <td valign="middle" bgcolor="#F3F7F7" align="right">
                           <input type="text" name="infalfa_tiempo" size="25" maxlength="50" tabindex="2">&nbsp;
                   </td>
                </tr>
             </table>
           </td>
           <td></td>
        </tr>
        <tr> 
           <td height="5"></td>
           <td></td>
        </tr>
        <tr> 
           <td height="13" colspan="2" valign="top">
		     <table border="0" cellpadding="0" cellspacing="0">
               <!--DWLayoutTable-->
               <tr><td height="6"></td></tr>
               <tr><td height="1" background="imagenes/rayhor.gif"></td></tr>
               <tr><td height="6"></td></tr>
             </table>
           </td>
        </tr>
        <tr> 
           <td height="5"></td>
           <td></td>
        </tr>
        <tr> 
           <td height="30" valign="top">
		     <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                <!--DWLayoutTable-->
                <tr> 
                   <td width="308" height="28" valign="middle" align="center" bgcolor="#f0f6f9">
                       <input type="submit" name="savacc" value="  Grabar Acción  " class="btn_med">
                   </td>
                </tr>
             </table>
           </td>
           <td></td>
        </tr>
        <tr> 
           <td height="15">&nbsp;</td>
           <td></td>
        </tr>
     </table>
     </form>

<?      RestoHTML();
   }







  if ($HTTP_GET_VARS['accion']=="SavAcc"){
      global $id,$IAlf,$userN, $passN, $Nniv;
      if(isset($savacc)) {
	// Chequear Informacion y Grabar en Tabla AlfaDecisiones
	// Luego Volver a Principal de Decisiones.
           
	// Devolver idemergencia de Tabla InformeAlfa Actual
	   $con_infalfa = mysql_query("SELECT idemergencia FROM InformeAlfa WHERE idalfa = '$IAlf' AND idevento = '$id'") or die(mysql_error());

	   if ($row=mysql_fetch_array($con_infalfa)) {
		$IdEmer = $row[idemergencia];

		// Almaceno Accion en Tabla AlfaDecisiones

		// Convertir en Mayusculas
		   $infalfa_accione = strtoupper($infalfa_accione);
		   $infalfa_tiempo  = strtoupper($infalfa_tiempo);

		   mysql_query("INSERT INTO AlfaDecisiones(idemergencia, accion, tiemporestablece) VALUES('$IdEmer','$infalfa_accione','$infalfa_tiempo')") or die(mysql_error());

	   }
	   mysql_close();
	   header("location: $PHP_SELF?accion=SeccAcc&id=$id&userN=$userN&IAlf=$IAlf");
      }
  }







    if ($HTTP_GET_VARS['accion']=="SeccRec"){
        global $id, $IAlf,$userN, $passN, $Nniv;
          cabeceraHTML();
?>        <form action="<? $PHP_SELF ?>?accion=SeccNec&id=<? echo $id; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?>" method="post" name="form">
          <DIV align="left" style="padding-left: 5px; HEIGHT: 350px; OVERFLOW: auto; WIDTH: 318">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <!--DWLayoutTable-->
                <tr> 
                  <td width="206" height="14"></td>
                  <td width="90"></td>
                  <td width="14"></td>
                  <td width="3"></td>
                </tr>
                <tr> 
                  <td height="20"></td>
                  <td valign="middle"><a href="<? $PHP_SELF ?>?accion=AddRec&id=<? echo $id; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf;?>"><img src="imagenes/btn_maspass3.gif" width="90" height="20" border="0" Alt=" Agregar Recursos Humanos/Materiales/Monetarios Involucrados en el Evento  "></a></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="16"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="20" colspan="3" valign="top">
				    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td width="308" height="18" align="center" valign="middle" bgcolor="f0f6f9" class="topmenu">Recursos</td>
                      </tr>
                    </table></td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="17"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="195" colspan="3" valign="top">
                      <DIV align="left" style="padding-left: 5px; HEIGHT: 195px; OVERFLOW: auto; WIDTH: 100%">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td width="176" height="18" valign="middle" bgcolor="#F0F6F9">Recurso</td>
                        <td width="40" align="center" valign="middle" bgcolor="#F0F6F9">Cant.</td>
                        <td width="90" align="center" valign="middle" bgcolor="#F0F6F9">Gasto (M$)</td>
                      </tr>
<?
/* Limito la busqueda */
$TAMANO_PAGINAia3 = 9;

/* examino la página a mostrar y el inicio del registro a mostrar */
   $paginaia3 = $HTTP_GET_VARS["paginaia3"];
   if (!$paginaia3) {
        $inicioia3 = 0;
        $paginaia3=1;
   }
   else {
        $inicioia3 = ($paginaia3 - 1) * $TAMANO_PAGINAia3;
   }


   $ssql = "select AlfaRecursos.idemergencia, descrirecurso, cantidadrecur, gastoestimado FROM AlfaRecursos INNER JOIN InformeAlfa ON AlfaRecursos.idemergencia = InformeAlfa.idemergencia WHERE InformeAlfa.idevento = '$id' AND InformeAlfa.idalfa = '$IAlf'";


   $rs = mysql_query($ssql);

   $num_total_registrosia3 = mysql_num_rows($rs);

/* calculo el total de páginas */
   $total_paginasia3 = ceil($num_total_registrosia3 / $TAMANO_PAGINAia3);

/* pongo el número de registros total, el tamaño de página y la página que se muestra */
   $maxpagsia3 = 4;
   $minimoia3 = $maxpagsia3 ? max(1, $paginaia3-ceil($maxpagsia3/2)): 1;
   $maximoia3 = $maxpagsia3 ? min($total_paginasia3, $paginaia3+floor($maxpagsia3/2)): $total_paginasia3;

/* construyo la sentencia SQL */
 $ssql = "select AlfaRecursos.idemergencia, descrirecurso, cantidadrecur, gastoestimado FROM AlfaRecursos INNER JOIN InformeAlfa ON AlfaRecursos.idemergencia = InformeAlfa.idemergencia WHERE InformeAlfa.idevento = '$id' AND InformeAlfa.idalfa = '$IAlf' LIMIT ". $inicioia3 . "," . $TAMANO_PAGINAia3;

   $rs = mysql_query($ssql);

   while ($fila=mysql_fetch_object($rs))
   {
        $recurso = substr($fila->descrirecurso,0,30) . "... ";
?>            <tr>
              <td height="15" bgcolor="#F3F7F7"><? echo $recurso; ?></td>
              <td bgcolor="#F3F7F7"><? echo $fila->cantidadrecur; ?></td>
              <td bgcolor="#F3F7F7"><? echo $fila->gastoestimado; ?></td>
            </tr>
<?    }
    // FIN while

?>
                    </table>
                    </DIV>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td height="5"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="13" colspan="4" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
                        <tr>
                        <td height="6"></td>
                        </tr>
                        <tr>
                        <td height="1" background="imagenes/rayhor.gif"></td>
                        </tr>
                        <tr>
                        <td height="6"></td>
                        </tr>
                      </table></td>
                </tr>
                <tr>
                  <td height="30" colspan="3" valign="top">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--Mostrar Paginacion de Resultados Para Acciones Tomadas En el Informe alfa Actual-->
                      <tr>
                        <td width="308" height="28" bgcolor="f3f7f7">
<?
 /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
//    mysql_close();

    if ($total_paginasia3 > 1) { echo "P&aacute;gina &nbsp;"; }

/* muestro los distintos índices de las páginas, si es que hay varias páginas */
   if($paginaia3 > 1)
   {
     echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccRec&id=$id&userN=$userN&IAlf=$IAlf&paginaia3=".($paginaia3-1)."'>";
     echo "<font face='verdana' size='-2'>anterior</font>";
     echo "</a>&nbsp;";
   }

   if ($total_paginasia3 > 1)
   {
      for ($i=$minimoia3; $i<$paginaia3; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccRec&id=$id&userN=$userN&IAlf=$IAlf&paginaia3=".$i."'> $i</a>&nbsp;";
      }

      for ($i=$paginaia3; $i<=$maximoia3; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccRec&id=$id&userN=$userN&IAlf=$IAlf&paginaia3=".$i."'>$i</a>&nbsp;";
      }
   }

   if($paginaia3 < $total_paginasia3)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccRec&id=$id&userN=$userN&IAlf=$IAlf&paginaia3=" .($paginaia3+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente</font></a>";
   }
?>                        </td>
                      </tr>
                    </table></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="5"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>

              </DIV>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5" class="tablebody">
              <!--DWLayoutTable-->
              <tr>
                <td width="1" height="2"></td>
                <td width="100"></td>
                <td width="9"></td>
                <td width="100"></td>
                <td width="5"></td>
                <td width="100"></td>
                <td width="3"></td>
              </tr>
              <tr>
              <!--        Luego en este mismo sector aparecen los tres botones: Decisiones, Recursos y Evaluacion -->
                 <td height="20" ColSpan="7" align="center" valign="middle">
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <tr>
                        <td height="20" align="center" valign="middle" bgcolor="F3F7F7" >
                            <input name="saveinfalfa3" type="submit" class="btn_med" value=" Siguiente Paso >> ">
                        </td>
                      </tr>
                    </table>
                </td>
              </tr>
              <tr>
                <td height="3"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
			</form>

      </td>
<? // FIN Funcion Grabar Informe Alfa 3  ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
//                                   ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
          RestoHTML();
          mysql_close();

    }







   if ($HTTP_GET_VARS['accion']=="AddRec"){
      global $id,$IAlf,$userN, $passN, $Nniv;
      cabeceraHTML();
?>
<form action="<? $PHP_SELF ?>?accion=SavRec&id=<? echo $id; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?>" method="post" name="form" onsubmit=" return VldIAlfa3();">
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <!--DWLayoutTable-->
                <tr> 
                  <td width="310" height="50"></td>
                  <td width="3"></td>
                </tr>
                <tr> 
                  <td height="20" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td width="308" height="18" align="center" valign="middle" bgcolor="f0f6f9" class="topmenu">Recursos</td>
                      </tr>
                    </table></td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="17"></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="97" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <tr>
                        <td height="18" valign="middle" bgcolor="#F0F6F9">Tipo de Recurso</td>
                        <td valign="middle" align="right" bgcolor="#F3F7F7">
<?                          VeTipoRecurso(); ?>
                        </td>
                      </tr>

                      <tr> 
                        <td height="18" colspan="2" valign="middle" bgcolor="#F0F6F9">Recurso Humano/Material/Monetario</td>
                      </tr>
                      <tr> 
                        <td height="25" colspan="2" valign="middle" align="center" bgcolor="#F3F7F7">
                           <input type="text" name="infalfa_recurso" size="57" maxlength="255">
                        </td>
                      </tr>
                      <tr> 
                        <td width="110" height="25" valign="middle" bgcolor="#F0F6F9">Cantidad:</td>
                        <td width="197" valign="middle" bgcolor="#F3F7F7">&nbsp;
                           <input type="text" name="infalfa_cantrec" size="12" maxlength="4" onKeyPress="return numbersonly(this, event)">
                        </td>
                      </tr>
                      <tr> 
                        <td height="25" valign="middle" bgcolor="#F0F6F9">Gasto (M$):</td>
                        <td valign="middle" bgcolor="#F3F7F7">&nbsp;
                           <input type="text" name="infalfa_montorec" size="12" maxlength="12" onKeyPress="return numbersonly(this, event)">
                        </td>
                      </tr>
                    </table></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="45">&nbsp;</td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="13" colspan="2" valign="top"> <table border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td height="6"></td>
                      </tr>
                      <tr> 
                        <td height="1" background="imagenes/rayhor.gif"></td>
                      </tr>
                      <tr> 
                        <td height="6"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr> 
                  <td height="5"></td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td width="308" height="28" valign="middle" align="center" bgcolor="#F0F6F9">
                           <input type="submit" name="savrec" value="  Grabar Recurso  ">
                        </td>
                      </tr>
                    </table></td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="30">&nbsp;</td>
                  <td></td>
                </tr>
              </table>
</form>

<?      RestoHTML();
   }




  if ($HTTP_GET_VARS['accion']=="SavRec"){
      global $id,$IAlf,$userN, $passN, $Nniv;
      if(isset($savrec)) {
        // Chequear Informacion y Grabar en Tabla AlfaRecursos
        // Luego Volver a Principal de Recursos.

        // Devolver idemergencia de Tabla InformeAlfa Actual
           $con_infalfa = mysql_query("SELECT idemergencia FROM InformeAlfa WHERE idalfa = '$IAlf' AND idevento = '$id'") or die(mysql_error());

           if ($row=mysql_fetch_array($con_infalfa)) {
                $IdEmer = $row[idemergencia];

                // Almaceno Accion en Tabla AlfaRecursos

                // Convertir en Mayusculas
                   $infalfa_recurso = strtoupper($infalfa_recurso);

                   mysql_query("INSERT INTO AlfaRecursos(idemergencia, idtiporecurso, descrirecurso, cantidadrecur, gastoestimado) VALUES('$IdEmer','$tiporecurso','$infalfa_recurso','$infalfa_cantrec','$infalfa_montorec')") or die(mysql_error());

           }
           mysql_close();
           header("location: $PHP_SELF?accion=SeccRec&id=$id&userN=$userN&IAlf=$IAlf");
      }
  }




    if ($HTTP_GET_VARS['accion']=="SeccNec"){
        global $id, $IAlf,$userN, $passN, $Nniv;
          cabeceraHTML();
?>              <form action="<? $PHP_SELF ?>?accion=SeccRes&id=<? echo $id; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?>" method="post" name="form">
              <DIV align="left" style="padding-left: 5px; HEIGHT: 350px; OVERFLOW: auto; WIDTH: 318">
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <!--DWLayoutTable-->
                <tr>
                  <td width="206" height="14"></td>
                  <td width="90"></td>
                  <td width="14"></td>
                  <td width="3"></td>
                </tr>
                <tr>
                  <td height="20"></td>
                  <td valign="middle"><a href="<? $PHP_SELF ?>?accion=AddNec&id=<? echo $id; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?>"><img src="imagenes/btn_maspass4.gif" width="90" height="20" border="0" Alt=" Agregar Necesidades Involucrados en el Evento  "></a></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="16"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="20" colspan="3" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="308" height="18" align="center" valign="middle" bgcolor="f0f6f9" class="topmenu">Necesidades</td>
                      </tr>
                    </table></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="17"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="195" colspan="3" valign="top">
                      <DIV align="left" style="padding-left: 5px; HEIGHT: 195px; OVERFLOW: auto; WIDTH: 100%">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td width="140" height="18" valign="middle" bgcolor="#F0F6F9">Tipo Elemento</td>
                        <td width="31" align="center" valign="middle" bgcolor="#F0F6F9">Cant.</td>
                        <td width="135" align="center" valign="middle" bgcolor="#F0F6F9">Motivo</td>
                      </tr>
<?
/* Limito la busqueda */
$TAMANO_PAGINAia4 = 9;

/* examino la página a mostrar y el inicio del registro a mostrar */
   $paginaia4 = $HTTP_GET_VARS["paginaia4"];
   if (!$paginaia4) {
        $inicioia4 = 0;
        $paginaia4=1;
   }
   else {
        $inicioia4 = ($paginaia4 - 1) * $TAMANO_PAGINAia4;
   }


   $ssql = "select AlfaNecesidades.idemergencia, cantidad, tipo, motivo FROM AlfaNecesidades INNER JOIN InformeAlfa ON AlfaNecesidades.idemergencia = InformeAlfa.idemergencia WHERE InformeAlfa.idevento = '$id' AND InformeAlfa.idalfa = '$IAlf'";


   $rs = mysql_query($ssql);

   $num_total_registrosia4 = mysql_num_rows($rs);

/* calculo el total de páginas */
   $total_paginasia4 = ceil($num_total_registrosia4 / $TAMANO_PAGINAia4);

/* pongo el número de registros total, el tamaño de página y la página que se muestra */
   $maxpagsia4 = 4;
   $minimoia4 = $maxpagsia4 ? max(1, $paginaia4-ceil($maxpagsia4/2)): 1;
   $maximoia4 = $maxpagsia4 ? min($total_paginasia4, $paginaia4+floor($maxpagsia4/2)): $total_paginasia4;

/* construyo la sentencia SQL */
   $ssql = "select AlfaNecesidades.idemergencia, cantidad, tipo, motivo FROM AlfaNecesidades INNER JOIN InformeAlfa ON AlfaNecesidades.idemergencia = InformeAlfa.idemergencia WHERE InformeAlfa.idevento = '$id' AND InformeAlfa.idalfa = '$IAlf' LIMIT ". $inicioia4 . "," . $TAMANO_PAGINAia4;

   $rs = mysql_query($ssql);

   while ($fila=mysql_fetch_object($rs))
   {
        $tipo = substr($fila->tipo,0,25) . "... ";
        $motivo = substr($fila->motivo,0,20) . "... ";
?>            <tr>
              <td height="15" bgcolor="#F3F7F7"><? echo $tipo; ?></td>
              <td bgcolor="#F3F7F7"><? echo $fila->cantidad; ?></td>
              <td bgcolor="#F3F7F7"><? echo $motivo; ?></td>
            </tr>
<?    }
    // FIN while

?>                    </table>
                    </DIV>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td height="5"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="13" colspan="4" valign="top">
                      <table border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
                        <tr>
                        <td height="6"></td>
                        </tr>
                        <tr>
                        <td height="1" background="imagenes/rayhor.gif"></td>
                        </tr>
                        <tr>
                        <td height="6"></td>
                        </tr>
                      </table></td>
                </tr>
                <tr>
                  <td height="30" colspan="3" valign="top">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--Mostrar Paginacion de Resultados Para Necesidades Tomadas En el Informe alfa Actual-->
                      <tr>
                        <td width="308" height="28" bgcolor="f3f7f7">
<?
 /* cerramos el conjunto de resultados y la conexión con la base de datos */
    mysql_free_result($rs);
//    mysql_close();

    if ($total_paginasia4 > 1) { echo "P&aacute;gina &nbsp;"; }

/* muestro los distintos índices de las páginas, si es que hay varias páginas */
   if($paginaia4 > 1)
   {
     echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccNec&id=$id&userN=$userN&IAlf=$IAlf&paginaia4=".($paginaia4-1)."'>";
     echo "<font face='verdana' size='-2'>anterior</font>";
     echo "</a>&nbsp;";
   }

   if ($total_paginasia4 > 1)
   {
      for ($i=$minimoia4; $i<$paginaia4; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccNec&id=$id&userN=$userN&IAlf=$IAlf&paginaia4=".$i."'> $i</a>&nbsp;";
      }

      for ($i=$paginaia4; $i<=$maximoia4; $i++){
         echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccNec&id=$id&userN=$userN&IAlf=$IAlf&paginaia4=".$i."'>$i</a>&nbsp;";
      }
   }

   if($paginaia4 < $total_paginasia4)
   {
     echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=SeccNec&id=$id&userN=$userN&IAlf=$IAlf&paginaia4=" .($paginaia4+1). "'>";
     echo "<font face='verdana' size='-2'>siguiente</font></a>";
   }
?>                        </td>
                      </tr>
                    </table></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="5"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>

              </DIV>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F5F5F5" class="tablebody">
              <!--DWLayoutTable-->
              <tr>
                <td width="1" height="2"></td>
                <td width="100"></td>
                <td width="9"></td>
                <td width="100"></td>
                <td width="5"></td>
                <td width="100"></td>
                <td width="3"></td>
              </tr>
              <tr>

              <!--        Luego en este mismo sector aparecen los tres botones: Decisiones, Recursos y Evaluacion -->

                <td height="20" ColSpan="7" align="center" valign="middle">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr>
                        <td height="20" align="center" valign="middle" bgcolor="F3F7F7" >
                            <input name="saveinfalfa4" type="submit" class="btn_med" value=" Siguiente Paso >> ">
                        </td>
                      </tr>
                    </table>
                </td>
              </tr>
              <tr>
                <td height="3"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table> 
			</form>

      </td>
<? // FIN Funcion Grabar Informe Alfa 4  ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
//                                   ···:::...···:::...···:::...···:::...···:::...···:::...···:::...···:::...
          RestoHTML();
          mysql_close();

    }




   if ($HTTP_GET_VARS['accion']=="AddNec"){
      global $id,$IAlf,$userN, $passN, $Nniv;
      cabeceraHTML();
?>
<form action="<? $PHP_SELF ?>?accion=SavNec&id=<? echo $id; ?>&userN=<? echo $userN; ?>&IAlf=<? echo $IAlf; ?>" method="post" name="form" onsubmit=" return VldIAlfa4();">
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <!--DWLayoutTable-->
                <tr>
                  <td width="310" height="50"></td>
                  <td width="3"></td>
                </tr>
                <tr>
                  <td height="20" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="308" height="18" align="center" valign="middle" bgcolor="f0f6f9" class="topmenu">Necesidades</td>
                      </tr>
                    </table></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="17"></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="97" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <tr>
                        <td height="18" valign="middle" bgcolor="#F0F6F9" Colspan="2">Tipo Elemento</td>
                      </tr>
                      <tr>
                        <td valign="middle" align="right" bgcolor="#F3F7F7" ColSpan="2">
                           <input type="text" name="infalfa_elemento" size="57" maxlength="255">
                        </td>
                      </tr>

                      <tr>
                        <td height="18" colspan="2" valign="middle" bgcolor="#F0F6F9">Motivo</td>
                      </tr>
                      <tr>
                        <td height="45" colspan="2" valign="middle" align="center" bgcolor="#F3F7F7">
                           <textarea name="infalfa_motivonec" rows="5" cols="50"></textarea>
                           
                        </td>
                      </tr>
                      <tr>
                        <td width="110" height="25" valign="middle" bgcolor="#F0F6F9">Cantidad:</td>
                        <td width="197" valign="middle" bgcolor="#F3F7F7">&nbsp;
                           <input type="text" name="infalfa_cantnec" size="12" maxlength="4" onKeyPress="return numbersonly(this, event)">
                        </td>
                      </tr>

                    </table></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="45">&nbsp;</td>
                  <td></td>
                </tr>
                <tr>
                  <td height="13" colspan="2" valign="top"> <table border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
                      <tr>
                        <td height="6"></td>
                      </tr>
                      <tr>
                        <td height="1" background="imagenes/rayhor.gif"></td>
                      </tr>
                      <tr>
                        <td height="6"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td height="5"></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tablebord
er">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="308" height="28" valign="middle" align="center" bgcolor="#F0F6F9">
                           <input type="submit" name="savnec" value="  Grabar Necesidad  ">
                        </td>
                      </tr>
                    </table></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;</td>
                  <td></td>
                </tr>
              </table>
</form>

<?      RestoHTML();

   }




  if ($HTTP_GET_VARS['accion']=="SavNec"){
      global $id,$IAlf,$userN, $passN, $Nniv;
      if(isset($savnec)) {
        // Chequear Informacion y Grabar en Tabla AlfaNecesidades
        // Luego Volver a Principal de Necesidades.

        // Devolver idemergencia de Tabla InformeAlfa Actual
           $con_infalfa = mysql_query("SELECT idemergencia FROM InformeAlfa WHERE idalfa = '$IAlf' AND idevento = '$id'") or die(mysql_error());

           if ($row=mysql_fetch_array($con_infalfa)) {
                $IdEmer = $row[idemergencia];

                // Almaceno Accion en Tabla AlfaNecesidades

                // Convertir en Mayusculas
                   $infalfa_elemento = strtoupper($infalfa_elemento);

                   mysql_query("INSERT INTO AlfaNecesidades(idemergencia, cantidad, tipo,  motivo) VALUES('$IdEmer','$infalfa_cantnec','$infalfa_elemento','$infalfa_motivonec')") or die(mysql_error());

           }
           mysql_close();
           header("location: $PHP_SELF?accion=SeccNec&id=$id&userN=$userN&IAlf=$IAlf");
      }
  }




   if ($HTTP_GET_VARS['accion']=="SeccRes"){
      global $id,$IAlf,$userN, $passN, $Nniv;
      cabeceraHTML();
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <!--DWLayoutTable-->
                <tr>
                  <td width="310" height="50"></td>
                  <td width="3"></td>
                </tr>
                <tr>
                  <td height="20" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="308" height="18" align="center" valign="middle" bgcolor="f0f6f9" class="topmenu">Responsable del Infome</td>
                      </tr>
                    </table></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="17"></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="97" valign="top">
                      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
                         <tr><td bgcolor="#F0F6F9" align="center"> Responsable del Informe Alfa Nro. <? echo $IAlf; ?> :</td>
                         </tr>
                         <tr><td align="center" valign="middle">
<?
// Mostrar Nombre de la Fuente
   $con_user = mysql_query("SELECT nombre, username FROM FUENTE WHERE username = '$userN'") or Die(mysql_error());

   if ($row = mysql_fetch_array($con_user)) {
       echo " $row[nombre]";
   }
   mysql_free_result($con_user);

?>                             </td>
                         </tr>
 
 
                      </table>
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td height="45">&nbsp;</td>
                  <td></td>
                </tr>
                <tr>
                  <td height="13" colspan="2" valign="top"> <table border="0" cellpadding="0" cellspacing="0">
                      <!--DWLayoutTable-->
                      <tr>
                        <td height="6"></td>
                      </tr>
                      <tr>
                        <td height="1" background="imagenes/rayhor.gif"></td>
                      </tr>
                      <tr>
                        <td height="6"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td height="5"></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="30" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tablebord
er">
                      <!--DWLayoutTable-->
                      <tr>
                        <td width="308" height="28" valign="middle" align="center" bgcolor="#F0F6F9">
                           <a href="admoremi.php?&userN=$userN" class="btn_med"> Volver P&aacute;gina Central </a>
                        </td>
                      </tr>
                    </table></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="30">&nbsp;</td>
                  <td></td>
                </tr>
              </table>
</form>

<?       RestoHTML();
   }
}
?>