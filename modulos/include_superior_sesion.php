<?
global $fecha_ult;

if($_SERVER['PHP_SELF']<>"/gore/modulos/administrador.php")
{
   $imagenes="../../../imagenes/";
}
else
{
   $imagenes="../imagenes/";
}
?>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td width="50%"><div align="center"><img src="<? echo $imagenes;?>logo_horizontal_gr.jpg" width="260" height="52" /></div></td>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td width="10" colspan="2" rowspan="2"><img height="10" 
                  src="<? echo $imagenes;?>esquinas_tabla_sup_izq.gif" width="10" /></td>
          <td width="180" bgcolor="#990000"><img height="1" 
                  src="portada_archivos/p.gif" width="1" /></td>
          <td colspan="2" rowspan="2"><img height="10" 
                  src="<? echo $imagenes;?>esquinas_tabla_sup_der.gif" 
              width="10" /></td>
        </tr>
        <tr>
          <td height="9"><img height="9" src="portada_archivos/p.gif" 
                  width="1" /></td>
        </tr>
        <tr>
          <td width="1" bgcolor="#990000"><img height="1" 
                  src="portada_archivos/p.gif" width="1" /></td>
          <td width="9"><img height="1" src="portada_archivos/p.gif" 
                width="1" /></td>
          <td valign="top" width="100%"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
              <td><div align="center"><span class="Parrafos"><strong><font size="2" face="Arial, Helvetica, sans-serif">Usuario 
                Activo: <? echo ucwords($_SESSION['usernameadmin']); ?></font></strong></span><strong><span class="titulosmenu"><br />
                                                    </span></strong></div></td>
            </tr>
            <tr>
              <td class="texto_comentario_pequenos"><div align="center">Fecha Ult. Ingreso :<? echo fecha_formato_espanol_hora($_SESSION['fecha_ult']);?></div></td>
            </tr>
          </table></td>
          <td width="9"><img height="1" src="<? echo $imagenes;?>transparencia.gif" 
                width="1" /></td>
          <td width="1" bgcolor="#990000"><img height="1" 
                  src="portada_archivos/p.gif" width="1" /></td>
        </tr>
        <tr>
          <td width="10" colspan="2" rowspan="2"><img height="10" 
                  src="<? echo $imagenes;?>esquinas_tabla_inf_izq.gif" width="10" /></td>
          <td height="9"><img height="9" src="portada_archivos/p.gif" 
                  width="1" /></td>
          <td colspan="2" rowspan="2"><img height="10" 
                  src="<? echo $imagenes;?>esquinas_tabla_inf_der.gif" 
              width="10" /></td>
        </tr>
        <tr>
          <td width="180" bgcolor="#990000"><img height="1" 
                  src="portada_archivos/p.gif" 
            width="1" /></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
</table>
