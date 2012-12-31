<?
  //Conectar a Base de Datos
  include("conecta/oremi.inc");
  $link = Conexion();
  Global $cCons;

echo <<< HTML
<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/vldfecha.js"></script>
<script language="JavaScript" src="js/oremi.js"></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
  <tr>
    <td width="485" height="95" valign="top" bgcolor="#DDE5F2">&nbsp;</td>
    <td width="250" valign="top">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#eaeaea" class="tablebody">
        <tr>
          <td width="11" height="5"></td>
          <td width="64"></td>
          <td width="13"></td>
          <td width="13"></td>
          <td width="107"></td>
          <td width="10"></td>
          <td width="20"></td>
          <td width="12"></td>
        </tr>
        <tr>
          <td height="15"></td>
          <td colspan="3" valign="top"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td height="3"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td valign="top" colspan="2" rowspan="7">&nbsp;</td>
          <td height="15"></td>
          <td valign="bottom" bgcolor="#eaeaea" colspan="2" class="notainc" align="center"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td height="6"></td>
          <td rowspan="2" colspan="2" valign="top" bgcolor="#eaeaea" align="right">
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td height="9"></td>
          <td></td>
          <td rowspan="2" valign="top" bgcolor="#eaeaea">
          </td>
          <td></td>
        </tr>
        <tr>
          <td height="11"></td>
          <td rowspan="2" valign="bottom" bgcolor="#eaeaea" colspan="2" class="notainc" align="center"></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td height="4"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td height="15"></td>
          <td colspan="2" valign="top" bgcolor="#eaeaea" align="right">
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td height="12"></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>

    </td>
  </tr>
</table>
<table width="735" border="0" cellpadding="0" cellspacing="0">
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
<table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody">
  <tr> 
    <td width="3" height="401" valign="top">&nbsp;</td>
    <td width="127" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
        <tr> 
          <td width="125" height="75" valign="top">&nbsp;</td>
        </tr>
        <tr> 
          <td height="43"></td>
        </tr>
        <tr> 
          <td height="165" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderLinks">
              <tr> 
                <td width="125" height="30" valign="middle" align="center" class="topmenu">Sitios 
                  Relacionados</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.onemi.cl" target="_blank" class="blueone">Onemi</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.gorecoquimbo.cl" target="_blank" class="blueone">GORE 
                  Coquimbo</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" class="blueone">Eventos 
                  S&iacute;smicos</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.meteochile.cl" target="_blank" class="blueone">Meteorolog&iacute;a 
                  Chile</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td height="28"></td>
        </tr>
        <tr> 
          <td height="65" valign="top">&nbsp;</td>
        </tr>
        <tr> 
          <td height="9"></td>
        </tr>
      </table></td>
    <td width="9" background="imagenes/lnvert-1.gif"></td>
    <td width="460" valign="top"> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
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
          <td height="450" valign="top">
             <DIV align="left" style="padding-left: 5px; HEIGHT: 420px; OVERFLOW: auto; WIDTH: 450">
              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
<!-- INFORMACION DEL EVENTO -->
HTML;
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

echo <<< HTML
  <tr><td height="10" ></td></tr>
  <tr><td background="imagenes/lnbot-1.gif"></td></tr>
  <tr><td height="15" ></td></tr>

  <tr >
     <td align="left">
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#DDE5F2">
          <tr bgcolor="#FFFFFF">
             <td bgcolor="#DDE5F2" width="85" class="topmenu">Evento:&nbsp;</td>
             <td bgcolor="#F3F7F7">$tipo</td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
          <tr bgcolor="#FFFFFF"><td height="5"></td></tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#DDE5F2">
          <tr bgcolor="#FFFFFF">
             <td bgcolor="#DDE5F2" width="85" class="topmenu">Fecha:&nbsp;</td>
             <td bgcolor="#F3F7F7">$fecha</td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
          <tr bgcolor="#FFFFFF"><td height="5"></td></tr>
        </table>

        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#DDE5F2">
          <tr bgcolor="#FFFFFF">
             <td bgcolor="#DDE5F2" width="85" class="topmenu">Nro. Evento:&nbsp;</td>
             <td bgcolor="#F3F7F7">$nroevento</td>
          </tr>
        </table>
     </td>
  </tr>

  <tr><td height="5" ></td></tr>
  <tr><td background="imagenes/lnbot-1.gif"></td></tr>
  <tr><td height="15" ></td></tr>
  <tr>
     <td >
        <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#DDE5F2">
          <tr bgcolor="#FFFFFF">
             <td bgcolor="#DDE5F2" width="85" class="topmenu">Resumen:&nbsp;</td>
          </tr>
          <tr  bgcolor="#F3F7F7"> <td>$resumen</td></tr>
        </table>
     </td>
  </tr>
  <tr><td height="15" ></td></tr>
  <tr><td background="imagenes/lnbot-1.gif"></td></tr>
  <tr><td height="5" ></td></tr>

</table>

           </DIV>
          </td>
        </tr>
      </table></td>
    
    <td width="1" valign="top">&nbsp; </td>
    <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
    <td width="126" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
        <tr> 
          <td width="125" height="150" valign="top"> <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderAlerta">
              <tr> 
                <td width="123" height="25" valign="middle" align="center" class="topmenu">Alertas 
                  Vigentes</td>
              </tr>
              <tr> 
                <td valign="top" height="122" bgcolor="#FFFFFF">&nbsp;</td>
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
          <td width="735" height="32" valign="top" align="center" class="notainc"> 
            Desarrollado para la Oficina de Emergencia de la Regi&oacute;n de 
            Coquimbo. Sitio Optimizado para una visualizaci&oacute;n de 800x600. 
            Si usted tiene alg&uacute;n comentario o pregunta acerca de este sitio, 
            cont&aacute;ctenos a oremisite@gorecoquimbo.cl </td>
        </tr>
      </table></td>
  </tr>
</table>
HTML;
mysql_close();
?>
