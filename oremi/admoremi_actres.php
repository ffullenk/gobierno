<?php
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();

  // Constatar logeo previo
  include("admoremi_sesid.inc");

  if(!($loginCorrecto))
  {
    Header("location: index.php");
  }
  else
  {
    include ("calendario/calendario.php");
    include("utils/utils.inc");

if (isset($actualiza)){
   Global $userN, $tipoevento, $fecha, $describeevento, $ubicacion, $resumenevento;
// Es la Seccion para dejar almacenado el evento creado por el user actual
   $userN = trim($userN);
   $resumen = strtoupper($resumenevento);
   mysql_query("UPDATE ConsolidaRegion SET resumen='$resumen' WHERE idconsreg=$cCons") or die(mysql_error());
   mysql_close();

   Header("Location: admoremi.php");
}

?>
<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/oremi.js"></script>
<script language="JavaScript" src="js/calendario.js"></script>
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/vldevento.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="735" border="0" cellspacing="1" cellpadding="0" align="center" bgcolor="#666666">
  <tr>
    <td>
	
<table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
  <tr> 
    <td width="485" height="95" valign="top" bgcolor="#DDE5F2"><img src="imagenes/imgsup-1.gif" width="182" height="95"><img src="imagenes/imgtit-1.gif" width="293" height="95"></td>
    <td width="250" valign="top" bgcolor="eaeaea"> 
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
          <td height="15" colspan="2" valign="top">
              <a href="admoremi_logout.php"><img src="imagenes/cerrar.gif" width="90" height="15" border="0"></a>
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
          <td colspan="2" valign="middle" ><a href="administra/index.php" class="under"><img src="imagenes/auto.gif" width="92" height="15" border="0" align="absmiddle"></a></td>
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
    </script>
   </td>
</tr>
<tr> 
   <td width="735" heiAght="5" valign="top"></td>
</tr>
<tr> 
  <td width="735" height="20" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" width="150">
      <tr>
          <td height="20" width="45">&nbsp;</td>
	<td width="3"></td>
	<td width="45"></td>
	<td width="3"></td>
      </tr>
    </table>
  </td>
</tr>
<tr> 
  <td width="735" height="1" valign="top" background="imagenes/lnbot-1.gif"></td>
</tr>
<tr> 
  <td width="735" height="5" valign="top"></td>
</tr>
</table>

	
	  <table width="735" border="0" cellpadding="0" cellspacing="1" class="tablebody" bgcolor="#FFFFFF">
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
          <td width="455" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="455" height="21" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
                    <tr> 
                      <td width="455" height="20" valign="middle" align="left" class="topmenu">&nbsp;Actualizaci&oacute;n 
                        de Resumen de Evento</td>
                    </tr>
                    <tr> 
                      <td valign="top" height="1" background="imagenes/vert.gif"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="390" valign="top"> <form name="form" method="post" action="<?php $PHP_SELF ?>" >
				                               <input type="hidden" name="cCons" value="<?php echo $cCons;?>">
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tablebody">
                      <!--DWLayoutTable-->
                      <tr> 
                        <td height="10" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="15"></td>
                      </tr>
<?php
$res=mysql_query("SELECT idconsreg, resumen FROM ConsolidaRegion WHERE idconsreg = $cCons") or die(mysql_error());
if($rCR = mysql_fetch_object($res) ) {
$resumen = str_replace("<br>","\n", $rCR->resumen );
}
?>					  
                      <tr bgcolor="#F7F7F7"> 
                        <td height="80" valign="middle" align="center"> <textarea name="resumenevento" rows="15" cols="65" value="<?php echo $resumen;?>"><?php echo $resumen;?></textarea> 
                          &nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="10" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                      <tr bgcolor="#F7F7F7"> 
                        <td height="30" valign="middle" align="center"> <input type="submit" name="actualiza" value="Actualizar Resumen"> 
                          &nbsp;&nbsp;&nbsp; <input type="reset" name="reset" value="Restablecer"> 
                        </td>
                      </tr>
                      <tr> 
                        <td height="25" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                      </tr>
                    </table>
                  </form></td>
              </tr>
            </table></td>
          <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
          <td width="125" valign="top"> <table width="99%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="124" height="150" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderAlerta">
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
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" >
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
</body>
</html>
<? } ?>