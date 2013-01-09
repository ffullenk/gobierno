<? include ("../../../funciones/conexion_comunicaciones.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id,$campo_blanco,$archivo_vid,$error_flv,$error_doc,$row,$marquesina;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 

if (($tipo=="") or ($tipo=="Nueva"))
{
   $tipo="Nueva";
   $fecha=date("d-m-Y");
}
 
/*session_start();

	$sql_us="SELECT * from usuario where nombre_completo = '".$_SESSION['usernameadmin']."' " ;
	$result_us=mysql_query($sql_us);
  	$row_us=mysql_fetch_array($result_us);
	$id_usuario = $row_us['id_usuario'];
	$nombre= "Mantenedor Video";
	$sql_sist="Select * from sistema where nombre_sistema='".$nombre."'";
	$result_sist=mysql_query($sql_sist);
	$row_sist=mysql_fetch_array($result_sist);
*/
if ($id<>''){
  $sql="select * from marquesina where id_marquesina='".$id."'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
}
					


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../../../stylos/stylos_modulos.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../../../funciones/calendario.js"></script>
<style type="text/css">
<!--
.Estilo1 {
	color: #666666;
	font-size: 12px;
	font-style: normal;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo3 {color: #FF0000}
.Estilo4 {color: #00CC00}
.Estilo6 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td height="10" width="10"><img src="../../../imagenes/g1.gif" width="10" height="10" /></td>
          <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
          <td height="10" width="10"><img src="../../../imagenes/g2.gif" width="10" height="10" /></td>
        </tr>
        <tr>
          <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
          <td valign="top" class="stylos"><table width="100%" border="0" cellpadding="0" cellspacing="5">
              <tr>
                <td><div align="center" class="Estilo1"><font size="2" face="Arial, Helvetica, sans-serif">Administrador 
                  de Destacados Marquesina </font></div></td>
              </tr>
              <tr>
                <td valign="top"><form action="gr_marquesina.php" method="post" name="form1" id="form1">
                    <div align="left">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EFEFEF" bgcolor="#EFEFEF">
                        <tr>
                          <td bgcolor="#EFEFEF" class="Estilo1">Fecha Inicio:</td>
                          <td bgcolor="#EFEFEF" class="Estilo1"><input name='frm_fecha_inicio' type="text" id="frm_fecha_inicio" value="<? if (($tipo=="") or ($tipo=="Nueva")){ echo $fecha; }else { echo fecha_formato_espanol($row['fecha_inicio']);}?>" size="12" onclick="showCalendar('frm_fecha_inicio','ES')"/></td>
                          <td bgcolor="#EFEFEF" class="Estilo1">Fecha Termino:</td>
                          <td bgcolor="#EFEFEF" class="Estilo1"><input name='frm_fecha_termino' type="text" id="frm_fecha_termino" value="<? if (($tipo=="") or ($tipo=="Nueva")){ echo $fecha; }else { echo fecha_formato_espanol($row['fecha_termino']);}?>" size="12" onclick="showCalendar('frm_fecha_termino','ES')"/></td>
                        </tr>
                        <tr>
                          <td bgcolor="#EFEFEF" class="Estilo1">Mensaje</td>
                          <td colspan="3" bgcolor="#EFEFEF" class="Estilo1"><input name="frm_titulo" type="text" id="frm_mensaje" value="<? if($id<>''){ echo $row['mensaje']; } ?>" size="80" /></td>
                        </tr>
                        <tr>
                          <td bgcolor="#EFEFEF" class="Estilo1">Estado</td>
                          <td colspan="3" bgcolor="#EFEFEF" class="Estilo1"><select name="estado" id="estado">
                              <option value="0">Seleccionar</option>
                              <option value="1" <? if($row['estado']==1){?> selected="selected" <? } ?> >Activo</option>
                              <option value="2" <? if($row['estado']==2){?> selected="selected" <? } ?>>Inactivo</option>
                            </select>
                          </td>
                        </tr>
                      </table>
                      <table border="0" align="center" cellpadding="0" cellspacing="5">
                        <tr>
                          <td><? if ($tipo=="Nueva") { ?>
                              <input name="Submit1" type="submit" id="Submit1" value="Agregar Destacado" />
                              <input name="Submit2" type="submit" id="Submit2" value="Cancelar" />
                              <? } else { ?>
                              <input name="Submit1AV" type="submit" id="Submit1AV" value="Agregar Otro Destacado" />
                              <input name="update" type="submit" id="update" value="Aceptar Cambios Destacado" />
                              <input name="Submit4" type="submit" id="Submit4" value="Eliminar" />
                              <input name="Submit2" type="submit" id="Submit2" value="Cancelar" />
                              <? } ?>
                          </td>
                        </tr>
                      </table>
                      <input name="id_user" type="hidden" id="id_user" value="<? echo $id_usuario; ?>" />
                      <input name="id_marquesina" type="hidden" id="id_marquesina" value="<? echo $row['id_marquesina']; ?>" />
                      <input name="sistema" type="hidden" id="sistema" value="<? echo $row_sist['id_sistema']; ?>" />
                    </div>
                </form></td>
              </tr>
          </table></td>
          <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
        </tr>
        <tr>
          <td height="10" width="10"><img src="../../../imagenes/g3.gif" width="10" height="10" /></td>
          <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" border="0" /></td>
          <td height="10" width="10"><img src="../../../imagenes/g4.gif" width="10" height="10" /></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
</table>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="Estilo1">Simulaci&oacute;n Marquesina </td>
  </tr>
  <tr>
    <td class="Estilo1">
	<?
	     $fecha=date('Y-m-d');
	     $sql_marq = "select * from marquesina where (fecha_inicio>='".$fecha."' AND fecha_termino<='".$fecha."') AND estado=1 ORDER BY fecha_inicio,fecha_termino,id_marquesina desc";
		 $result_marq = mysql_query($sql_marq);
		 while($row_marq=mysql_fetch_array($result_marq))
		 {
		      $marquesina=$marquesina." | ".fecha_formato_espanol($row_marq['fecha_inicio'])." '".$row_marq['mensaje']."'";
		 }
		 ?>		
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="right"><img src="../../../imagenes/punta_marquesina.jpg" width="24" height="22" /></div></td>
        <td width="80%" valign="middle" background="../../../imagenes/fondo_marquesina.jpg"><span class="Estilo1">
          <MARQUEE width="100%" scrolldelay="100" class="Estilo6" >
          <? echo $marquesina; ?>
          </MARQUEE></span></td>
      </tr>
    </table>
	</td>
  </tr>
</table>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
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
          <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th scope="col"><form id="form1" name="form1" method="post" action="">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td><div align="center" class="fuente_formulario">Destacados Ingresados</div></td>
					</tr>
                      <tr>
                        <th scope="col"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                          <tr>
                            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                <tr>
                                  <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">N&ordm;</div></td>
                                  <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Destacado</div></td>
								   <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Fecha Inicio </div></td>
                                  <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Fecha Termino </div></td>
                                  <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Estado</div></td>
                                  <td bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Acci&oacute;n</div></td>
                                </tr>
                                <tr>
                                  <?
				   	$sql_vid = "select * from marquesina ORDER BY fecha_inicio,fecha_termino,id_marquesina desc";
					$result = mysql_query($sql_vid);
					$i=1;
					$sql_vid_cont = mysql_num_rows($result);
					if($sql_vid_cont==0){
					?>	
					<td colspan="6"><div align="center"><span class="parrafomay Estilo3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>No Hay Desatacados Ingresados</strong></font></span></div></td>
                                </tr>
					<?
					}
					while($row_vid=mysql_fetch_array($result)){				
				  
				  ?>
                                  <tr><td class="fuente_formulario"><div align="center"><? echo $row_vid['id_marquesina']; ?></div></td>
                                  <td class="fuente_formulario"><div align="left"><? echo $row_vid['mensaje'] ?> </div></td>
								   <td class="fuente_formulario"><div align="center"><? echo $row_vid['fecha_inicio'] ?> </div></td>
                                  <td><div align="center"><a href="frm_marquesina.php?id=<? echo $row_vid['id_marquesina']; ?>&tipo=Editar"></a><span class="fuente_formulario"><? echo $row_vid['fecha_termino'] ?></span></div></td>
                                  <td><div align="center">
                                    <? if($row_vid['estado']==1){?>
                                  </div>
                                    <div align="center" class="Estilo1">
                                      <div align="center"><span class="Estilo4">Activo</span>
                                          <? }else{ ?>
                                        <span class="Estilo1"> Inactivo</span> </div>
                                    </div>
                                    <div align="center">
                                      <? } ?>
                                    </div></td>
                                  <td><div align="center"><a href="frm_marquesina.php?id=<? echo $row_vid['id_marquesina']; ?>&amp;tipo=Editar"><img src="../../imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td>
                                  </tr>
                                <? } ?>
                            </table></td>
                          </tr>
                        </table></th>
                      </tr>
                    </table></th>
                  </tr>
                </table>
              </form></th>
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
</body>
</html>
