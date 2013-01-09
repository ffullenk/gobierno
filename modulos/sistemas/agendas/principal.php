<?
include ("../../../funciones/conexion_bd.php");
include ("../../../funciones/fechas.php");

global $row_titulares,$row_actividades,$frm_fecha,$frm_tipo_agenda,$buscar;

while (list ($key, $val) = each ($_REQUEST))
{
  $$key = $val;
}
conecta_agendas();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../../../stylos/stylos_modulos.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../../../funciones/calendario.js"></script>
<script language="javascript">

function mascara_hora(obj, masque) 
{
var ch = obj.value
var tmp = ""
var j = 0
ch.toString()
if ((window.event.type == "keydown" || window.event.type == "keyup" ) && window.event.keyCode != 8) {
for (i=0; i<ch.length; i++) {
if (!isNaN(ch.charAt(i)) && ch.charAt(i) != " ") { tmp += ch.charAt(i) }
}
ch = ""
for (i=0; i<masque.length; i++) {
if (masque.charAt(i) == "0") { 
if (tmp.charAt(j) != "" ) {
ch += tmp.charAt(j)
j++
}
else { ch += " " }
}
else { ch += masque.charAt(i) }
}
}

obj.value = ch
}

function validarhora(str)
{
	hora=str.value
	if (hora=='') {return}
	a=hora.charAt(0) //<=2
	b=hora.charAt(1) //<4
	c=hora.charAt(2) //:
	d=hora.charAt(3) //<=5
	if ((a==2 && b>3) || (a>2)) 
	{
		 alert("El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23");
		 str.value="";
		 return
	}
	if (d>5) 
	{
		 alert("El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59");
		 str.value="";
		 return
	}	
}

function agregar_titulares(forma)
{
     forma.action ='gr_agenda_titulares.php';
	 forma.submit();
}

function agregar_actividades(forma)
{
     forma.action ='gr_agenda_actividades.php';
	 forma.submit();
}

</script>
</head>

<body>
<form action="principal.php" method="get" name="form">
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="10" width="10"><img src="../../../imagenes/g1.gif" width="10" height="10" /></td>
              <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td height="10" width="10"><img src="../../../imagenes/g2.gif" width="10" height="10" /></td>
            </tr>
            <tr>
              <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="600" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    <td class="fuente_formulario">Seleccione la Agenda </td>
                    <td class="fuente_formulario"><select name="frm_tipo_agenda" id="frm_tipo_agenda">
                        <option value="0">Seleccionar</option>
                        <?
				$sql_tipo_agenda="select * from tipo_agenda where estado=1";  
				$result_tipo_agenda=mysql_query($sql_tipo_agenda);	  
				while($row_tipo_agenda=mysql_fetch_array($result_tipo_agenda))
				{
				?>
                        <option value="<? echo $row_tipo_agenda['id_tipo_agenda'];?>" <? if($frm_tipo_agenda==$row_tipo_agenda['id_tipo_agenda']) {?> selected <? } ?> ><? echo $row_tipo_agenda['descripcion'];?></option>
                        <?
				}
				?>
                      </select>                    </td>
                    <td class="fuente_formulario">Seleccione la Fecha </td>
                    <td class="fuente_formulario"><input name="frm_fecha" type="text" id="txtDateES" size="12" onclick="showCalendar('txtDateES','ES')" value="<? echo $frm_fecha; ?>"/></td>
                    <td class="fuente_formulario"><input name="Buscar" type="submit" id="Buscar" value="Buscar..." /></td>
                  </tr>

              </table></td>
              <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
            </tr>
            <tr>
              <td height="10" width="10"><img src="../../../imagenes/g3.gif" width="10" height="10" /></td>
              <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td height="10" width="10"><img src="../../../imagenes/g4.gif" width="10" height="10" /></td>
            </tr>
          </tbody>
      </table></td>
    </tr>
  </table>
</form>
<table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="10" width="10"><img src="../../../imagenes/g1.gif" width="10" height="10" /></td>
              <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td height="10" width="10"><img src="../../../imagenes/g2.gif" width="10" height="10" /></td>
            </tr>
            <tr>
              <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td valign="top" bgcolor="#FFFFFF" class="stylos"><table border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    <td class="fuente_formulario">Titular N&ordm; 1 </td>
                    <td class="fuente_formulario"><textarea name="frm_titular1" cols="60" id="frm_titular1"><? echo $row_titulares['titular1'];?></textarea></td>
                  </tr>
                  <tr>
                    <td class="fuente_formulario"><label>Titular N&ordm; 2 </label></td>
                    <td class="fuente_formulario"><textarea name="frm_titular2" cols="60" id="frm_titular2"><? echo $row_titulares['titular3'];?></textarea></td>
                  </tr>
                  <tr>
                    <td class="fuente_formulario">Titular N&ordm; 3 </td>
                    <td class="fuente_formulario"><textarea name="frm_titular3" cols="60" id="frm_titular3"><? echo $row_titulares['titular3'];?></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="2"><div align="center"><span class="fuente_formulario">
                        <input name="submit" type="button" value="Publicar Titulares" onClick="javascript:agregar_titulares(this.form)"/>
                    </span></div></td>
                  </tr>
              </table></td>
              <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
            </tr>
            <tr>
              <td height="10" width="10"><img src="../../../imagenes/g3.gif" width="10" height="10" /></td>
              <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td height="10" width="10"><img src="../../../imagenes/g4.gif" width="10" height="10" /></td>
            </tr>
          </tbody>
      </table></td>
    </tr>
</table>
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="10" width="10"><img src="../../../imagenes/g1.gif" width="10" height="10" /></td>
              <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td height="10" width="10"><img src="../../../imagenes/g2.gif" width="10" height="10" /></td>
            </tr>
            <tr>
              <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td valign="top" bgcolor="#FFFFFF" class="stylos"><table border="0" cellspacing="3" cellpadding="0">
                  <tr>
                    <td class="fuente_formulario">Hora Inicio: </td>
                    <td class="fuente_formulario"><input name="frm_hora_inicio" type="text" id="frm_hora_inicio" size="6" value="<? echo $row_actividades['hora_inicio'];?>" onkeyup="mascara_hora(this, '00:00');" onblur="validarhora(this)"/></td>
                    <td class="fuente_formulario">Hora Final : </td>
                    <td class="fuente_formulario"><input name="frm_hora_final" type="text" id="frm_hora_final" size="6" value="<? echo $row_actividades['hora_final'];?>"onkeyup="mascara_hora(this, '00:00');" onblur="validarhora(this)"/></td>
                  </tr>
                  <tr>
                    <td valign="top" class="fuente_formulario">Descripci&oacute;n</td>
                    <td colspan="3" class="fuente_formulario"><label>
                      <textarea name="frm_descripcion" cols="60" id="frm_descripcion"><? echo $row_actividades['descripcion'];?></textarea>
                    </label></td>
                  </tr>
                  <tr>
                    <td class="fuente_formulario">Lugar </td>
                    <td class="fuente_formulario"><label>
                      <input name="frm_lugar" type="text" id="frm_lugar" value="<? echo $row_actividades['lugar'];?>" />
                    </label></td>
                    <td class="fuente_formulario">Comuna</td>
                    <td class="fuente_formulario"><input name="frm_comuna" type="text" id="frm_comuna" value="<? echo $row_actividades['comuna'];?>"/></td>
                  </tr>
                  <tr>
                    <td colspan="4" class="fuente_formulario"><div align="center">
                        <input name="submit2" type="button" value="Publicar Actividades" onClick="javascript:agregar_actividades(this.form)"/>
                    </div></td>
                  </tr>
              </table></td>
              <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
            </tr>
            <tr>
              <td height="10" width="10"><img src="../../../imagenes/g3.gif" width="10" height="10" /></td>
              <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              <td height="10" width="10"><img src="../../../imagenes/g4.gif" width="10" height="10" /></td>
            </tr>
          </tbody>
        </table>
          <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
            <tr>
              <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
                  <tr>
                    <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">N&ordm;</div></td>
                    <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Hora Inicio </div></td>
                    <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Hora Final </div></td>
                    <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Descripci&oacute;n</div></td>
                    <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Lugar</div></td>
                    <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Comuna</div></td>
                    <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Acci&oacute;n</div></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
    </tr>
  </table>
</body>
</html>
