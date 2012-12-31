<?
function centroHTML() {
echo <<< HTML
<!-- De Acuerdo A Tabla Escogida -->
    <td width="450" height="355" valign="top">
        <!-- Sección Central - Carga de Actualizaciones -->
      <table width="450" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="450" height="355"></td>
        </tr>
      </table>
          <!-- FIN Sección Central - Carga de Actualizaciones -->
<!-- De Acuerdo A Tabla Escogida -->
HTML;
}


function restoHTML() {
echo <<< HTML
    </td>
    <td width="120" valign="top" rowspan="2">
        <!-- Sección Lateral Derecha  -->
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
          <!-- FIN Sección Lateral Derecha -->
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
    <!-- Sección Central - Carga de Actualizaciones -->
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
    <!-- Sección Central - Carga de Actualizaciones -->
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
    <!-- Sección Central - Carga de Actualizaciones -->
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


function cabeceraTipoEventoHTML() {
echo <<< HTML
    <td width="450" height="355" valign="top">
    <!-- Sección Central - Carga de Actualizaciones -->
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
    <!-- Sección Central - Carga de Actualizaciones -->
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
    <!-- Sección Central - Carga de Actualizaciones -->
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
?>
