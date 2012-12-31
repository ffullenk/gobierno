<?
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
echo <<< HTML

<html>
<head>
<title>Oficina Regional de Emergencia, Regi&oacute;n de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/oremi.css" type="text/css">
<script language="JavaScript" src="js/oremi.js"></script>
<script language="JavaScript" src="js/calendario.js"></script>
<script language="JavaScript" src="js/vldfecha.js"></script>
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody" bgcolor="#DDE5F2">
  <tr> 
    <td width="485" height="95" valign="top" bgcolor="#DDE5F2">&nbsp;</td>
    <td width="250" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#eaeaea" class="tablebody">
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
          <td height="4" valign="top"></td>
          <td></td>
          <td></td>
          <td valign="top"></td>
          <td valign="top"></td>
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
  <td width="735" height="20" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" width="150">
      <tr>
        <td height="20" width="45"><img src="imagenes/inicio.gif" align="absmiddle" border="0" width="45" height="20"></td>
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
<table width="735" border="0" cellpadding="0" cellspacing="0" class="tablebody">
  <tr> 
    <td width="3" height="401" valign="top">&nbsp;</td>
    <td width="125" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
        <tr> 
          <td width="125" height="75" valign="top">&nbsp;</td>
        </tr>
        <tr> 
          <td height="43"></td>
        </tr>
        <tr> 
          <td height="165" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderLinks">
              <tr> 
                <td width="125" height="30" valign="middle" align="center" class="topmenu">Sitios 
                  Relacionados</td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.onemi.cl" target="_blank" class="blueone">Onemi</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.gorecoquimbo.cl" target="_blank" class="blueone">GORE Coquimbo</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" class="blueone">Eventos S&iacute;smicos</a></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF">&nbsp;<a href="http://www.meteochile.cl" target="_blank" class="blueone">Meteorolog&iacute;a Chile</a></td>
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
            </table>
          </td>
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
      </table>
    </td>
    <td width="9" background="imagenes/lnvert-1.gif"></td>
    <td width="320" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="320" height="21" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
              <tr> 
                <td width="320" height="20" valign="middle" align="left" class="topmenu">&nbsp;Creaci&oacute;n 
                  de Eventos</td>
              </tr>
              <tr> 
                <td valign="top" height="1" background="imagenes/vert.gif"></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td height="13"></td>
        </tr>
        <tr>
   		  
          <td height="368" valign="top"> 
		  <form name="form" method="post" action="">
              <table width="100%" border="1" cellpadding="0" cellspacing="0" class="tablebody">
                <!--DWLayoutTable-->
                <tr> 
                 <td width="130" height="15" valign="bottom">
                     <img src="imagenes/graf_tipeven.gif" width="130" height="15">
                 </td>
                 <td width="58"></td>
                 <td width="130" valign="bottom" align="right">
                     <img src="imagenes/graf_ocurre.gif" width="130" height="15" align="right">
                 </td>
                 <td></td>
                </tr>
                <tr> 
                  <td height="20" colspan="2" align="left" valign="middle" bgcolor="#F7F7F7"> 
                    &nbsp;
HTML;
                    VeTipoEvento();
echo <<< HTML
                  </td>
                  <td align="right" valign="middle" bgcolor="#F7F7F7">
                    <input name="fecha" type="text" value="dd/mm/aaaa" size="10" maxlength="10" onfocus="if(this.value=='dd/mm/aaaa')this.value='';" onblur="if(this.value=='')this.value='dd/mm/aaaa';" onChange="return validar(this.form.fecha.value);">
                    &nbsp;</td>
                  <td></td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="15" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                  <td></td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="15"></td>
                  <td></td>
                  <td valign="top"><img src="imagenes/graf_desceven.gif" width="130" height="15"></td>
                  <td></td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="81" colspan="3" align="center" valign="middle" bgcolor="#F7F7F7"> 
                    <textarea name="describeevento" rows="6" cols="65"></textarea> 
                    &nbsp; </td>
                  <td></td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="15" colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="15" valign="top"><img src="imagenes/graf_ubieven.gif" width="130" height="15"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="20" colspan="3" align="left" valign="middle" bgcolor="#F7F7F7"> 
                    &nbsp;
HTML;
                    VeUbicacion();
echo <<< HTML
                    </td>
                  <td></td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="15" colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="15"></td>
                  <td></td>
                  <td valign="top"><img src="imagenes/graf_reseven.gif" width="130" height="15"></td>
                  <td></td>
                </tr>
                <tr align="right" valign="middle"> 
                  <td height="78" colspan="3" align="center" valign="middle" bgcolor="#F7F7F7"> 
                    <textarea name="describeevento" rows="6" cols="65"></textarea> 
                    &nbsp; </td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="30" valign="middle" align="center" colspan="3"> 
                    <input type="submit" name="Submit" value="Enviar"> &nbsp;&nbsp;&nbsp; 
                    <input type="reset" name="reset" value="Restablecer"> </td>
                  <td></td>
                </tr>
                <tr> 
                  <td height="14" valign="top" colspan="3">&nbsp;</td>
                  <td></td>
                </tr>
              </table>
	  </form>
          </td>
		  
        </tr>
      </table>
    </td>
    <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
    <td width="135" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
        <tr> 
          <td width="135" height="75" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="26"></td>
        </tr>
        <tr> 
          <td height="276" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
              <tr> 
                <td width="133" height="25" valign="middle" align="center" class="topmenu">Eventos 
                  en Proceso</td>
              </tr>
              <tr> 
                <td valign="top" height="248" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td height="25" valign="top">&nbsp;</td>
        </tr>
      </table>
    </td>
    <td width="9" valign="top" background="imagenes/lnvert-1.gif"></td>
    <td width="125" valign="top">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebody">
        <tr> 
          <td width="125" height="150" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborderAlerta">
              <tr> 
                <td width="123" height="25" valign="middle" align="center" class="topmenu">Alertas 
                  Vigentes</td>
              </tr>
              <tr> 
                <td valign="top" height="122" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td height="51"></td>
        </tr>
        <tr>
          <td height="156" valign="top"> 
            <table width="100%" border="0" cellpadding="0" cellspacing="1">
              <tr> 
                <td width="123" height="154"></td>
              </tr>
            </table>
          </td>
          </tr>
        <tr>
          <td height="44"></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td valign="top" height="35" colspan="8"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="notainc">
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
      </table>
    </td>
  </tr>
</table>
</body>
</html>
HTML;
}
?>
