<? include ("../../../funciones/conexion_comunicaciones.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id,$campo_blanco,$archivo_vid,$error_flv,$error_doc;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 

if (($tipo=="") or ($tipo=="Nueva"))
{
   $tipo="Nueva";
   $fecha=date("d-m-Y");
}
 
session_start();

	$sql_us="SELECT * from usuario where nombre_completo = '".$_SESSION['usernameadmin']."' " ;
	$result_us=mysql_query($sql_us);
  	$row_us=mysql_fetch_array($result_us);
	$id_usuario = $row_us['id_usuario'];
	$nombre= "Mantenedor Video";
	$sql_sist="Select * from sistema where nombre_sistema='".$nombre."'";
	$result_sist=mysql_query($sql_sist);
	$row_sist=mysql_fetch_array($result_sist);
	
if ($id<>''){
  $sql="select * from video_senal where id_vid_senal='".$id."'";
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
<style type="text/css">
<!--
.Estilo1 {
	color: #666666;
	font-size: 12px;
	font-style: normal;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
</head>

<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
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
              <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th scope="col"><table border="0" align="center" cellpadding="0" cellspacing="0">
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
                                de Video </font></div></td>
                            </tr>
                            <tr>
                              <td valign="top">
							  <form action="gr_video.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                  <div align="left">
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#EFEFEF" bgcolor="#EFEFEF">
                                        <tr>
                                          <td bgcolor="#EFEFEF">Fecha :</td>
                                          <td bgcolor="#EFEFEF"><input name='frm_fecha' type="text" id="frm_fecha" value="<? if (($tipo=="") or ($tipo=="Nueva")){ echo $fecha; }else { echo fecha_formato_espanol($row['fecha_vid_senal']);}?>" size="12" /></td>
                                        </tr>
                                        <tr>
                                          <td bgcolor="#EFEFEF">Titulo</td>
                                          <td bgcolor="#EFEFEF"><input name="frm_titulo" type="text" id="frm_titulo" value="<? if($id<>''){ echo $row['titulo_vid_senal']; } ?>" size="50" /></td>
                                        </tr>
						  <? if($campo_blanco==1){ ?>
										<tr>
				                          <td colspan="2" valign="top" bgcolor="#FFFFFF"><div align="center"><span class="parrafomay Estilo3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Debes Ingresar un Titulo</strong></font></span></div></td>
				                        </tr>
						<? }  ?>
                                      <tr>
                                          <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                              <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Archivo Video : </font></div>
                                          </div></td>
                                          <td bgcolor="#EFEFEF" class="field"><label>
                                            <input name="file_video" type="file" id="file_video" value="...Ingresar Video" />
                                          </label></td>
                                        </tr>
										<? if($error_flv==1){ ?>
										<tr>
				                          <td colspan="2" valign="top" bgcolor="#FFFFFF"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Error al Agregar Video</font></strong></div></td>
				                        </tr>
										<? } ?>
										<tr>
                                          <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                              <div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Archivo Documento : </font></div>
                                          </div></td>
                                          <td bgcolor="#EFEFEF" class="field"><label>
                                            <input name="file_doc" type="file" id="file_doc" value="...Ingresar Documento" />
                                          </label></td>
                                        </tr>
										<? if($error_doc==1){ ?>
										<tr>
				                          <td colspan="2" valign="top" bgcolor="#FFFFFF"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Error al Agregar Documento</font></strong></div></td>
				                        </tr>
										<? } ?>
                                    </table>
                                    <table border="0" align="center" cellpadding="0" cellspacing="5">
                                        <tr>
                                          <td><? if ($tipo=="Nueva") { ?>
                                              <input name="Submit1" type="submit" id="Submit1" value="Agregar Video" />
                                              <input name="Submit2" type="submit" id="Submit2" value="Cancelar" />
                                              <? } else { ?>
                                              <input name="Submit1AV" type="submit" id="Submit1AV" value="Agregar Otro Video" />
                                              <input name="Submit2" type="submit" id="Submit2" value="Cancelar" />
                                              <input name="Submit4" type="submit" id="Submit4" value="Eliminar" />
                                            <? } ?>                                      </td>
                                        </tr>
                                            </table>
                                    <input name="id_user" type="hidden" id="id_user" value="<? echo $id_usuario; ?>" />
                                    <input name="id_not" type="hidden" id="id_not" value="<? echo $row['id_vid_senal']; ?>" />
                                    <input name="arch_vid" type="hidden" id="arch_vid" value="<? echo $archivo_vid; ?>" />
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
                  </table>
                    </th>
                </tr>
              </table></th>
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
</table><hr width="90%"/>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
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
					<td><div align="center" class="fuente_formulario">Videos Ingresados
					  </div></td>
					</tr>
                      <tr>
                        <th scope="col"><table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                          <tr>
                            <td><table border="0" align="center" cellpadding="0" cellspacing="2">
                                <tr>
                                  <td width="30" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">N&ordm;</div></td>
                                  <td width="150" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Videos</div></td>
								   <td width="80" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Fecha</div></td>
                                  <td width="80" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Acci&oacute;n</div></td>
                                </tr>
                                <tr>
                                  <?
				   	$sql_vid = "select * from video_senal ORDER BY id_vid_senal ASC";
					$result = mysql_query($sql_vid);
					$i=1;
					$sql_vid_cont = mysql_num_rows($result);
					if($sql_vid_cont==0){
					?>	
					<td colspan="4"><span class="parrafomay Estilo3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>No Hay Videos Ingresados</strong></font></span></td></tr>
					<?
					}
					while($row_vid=mysql_fetch_array($result)){				
				  
				  ?>
                                  <td class="fuente_formulario"><div align="center"><? echo $row_vid['id_vid_senal']; ?></div></td>
                                  <td class="fuente_formulario"><? echo $row_vid['titulo_vid_senal'] ?> </td>
								   <td class="fuente_formulario"><? echo $row_vid['fecha_vid_senal'] ?> </td>
                                  <td><div align="center"><a href="frm_video.php?id=<? echo $row_vid['id_vid_senal']; ?>&tipo=Editar&archivo_vid=<? echo $row_vid['direccion_vid_senal']; ?>"><img src="../../imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td>
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
<hr width="90%"/>
</body>
</html>
