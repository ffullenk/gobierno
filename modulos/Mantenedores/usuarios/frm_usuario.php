<? include ("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id, $id_tipo, $id_sis, $vacio, $existe,$nuevotp,$id_ma;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 

if ($tipo=="Nueva")
{
   $tipo="Nueva";
   $fecha=date("d-m-Y");
}
 
session_start();

if (isset($_SESSION['usernameadmin']))
{
	
}
else
{
    echo "Usuario No Autentificado!";
	exit;
} 

include ("../../../funciones/bitacora.php");
	
mantenedor($id_ma,$idusername);

			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {	color: #666666;
	font-style: italic;
	font-weight: bold;
}
.Estilo2 {font-weight: bold; color: #666666;}
body { 
	background-image: url(../../../imagenes/fondo.jpg);
}
-->
</style>
<link href="../../../css/estilo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../../../css/calendario.js"></script>
<script language="javascript">
function mostrar(valor)
{
	document.getElementById(valor).style.display = "block";
}
function oculta(valor)
{
	document.getElementById(valor).style.display = "none";
}
function acancelar(forma)
{
	forma.action="frm_usuario.php";
	forma.submit();
}
function acambios(forma)
{
	forma.a_cambios.value=1;
	forma.action="gr_tipo_usuario.php";
	forma.submit();
}
function aingresa(forma)
{
	forma.a_ingresar.value=1;
	forma.action="gr_tipo_usuario.php";
	forma.submit();
}
function nuevotpu(forma)
{
	forma.nuevotp.value=1;
	forma.action="frm_usuario.php";
	forma.submit();
}
</script>
</head>

<body>
<form name="form1" action="" method="post">
<table border="2" cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
  <tr>
    <td bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><font color="#990000"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">MODULO 
              ADMINISTRATIVO DE CONTENIDO</font></strong></font></div></td>
          </tr>
          <tr>
            <td><? include("../../include_superior_sesion.php");?></td>
          </tr>
        </table>
        <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td height="10" width="10"><img src="../../imagenes/g1.gif" width="10" height="10" /></td>
                <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                <td height="10" width="10"><img src="../../imagenes/g2.gif" width="10" height="10" /></td>
              </tr>
              <tr>
                <td width="10" height="10" rowspan="2" background="../../imagenes/vert.gif"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                <td valign="top" class="stylos"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                  <tr>
                    <td><table width="80%" border="0" align="center" cellpadding="0" cellspacing="5">
                        <tr>
                          <td colspan="4"><div align="center" class="titulos_noticias">MANTENEDOR DE TIPOS USUARIOS </div></td>
                        </tr>
                        <tr>
                          <td width="30" bgcolor="#EFEFEF" class="titulos_general"><div align="center">N&ordm;</div></td>
                          <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Tipos de Usuarios </div></td>
                          <td bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                          <td width="80" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Acci&oacute;n</div></td>
                        </tr>
                        <tr>
                          <?
				   	$sql_us = "select * from tipo_usuario ORDER BY nombre_tipo_usuario ASC";
					$result = mysql_query($sql_us);
					$i=1;
					while($row_us=mysql_fetch_array($result)){				
				  
				  ?>
                          <td class="textos_noticias"><div align="center"><? echo $i++; ?></div></td>
                          <td class="textos_noticias"><div align="center"><? echo strtoupper($row_us['nombre_tipo_usuario']) ?> </div></td>
                          <td class="textos_noticias" align="center"><? if ( $row_us['estado_tipo_usuario']== 1) {?>
                              <label>Activo</label>
                              <? }else{?>
                              <label>Desactivo</label>
                              <? }?>                          </td>
                          <td class="textos_noticias"><div align="center"><a href="frm_usuario.php?id_tipo=<? echo $row_us['id_tipo_usuario'] ?>&amp;tipo=Editar&amp;id_ma=<? echo $id_ma; ?>"><img src="../../imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td>
                        </tr>
                        <? } ?>
                    </table></td>
                  </tr>
                </table>
                  </td>
                <td width="10" height="10" rowspan="2" background="../../imagenes/vert.gif"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
              </tr>
              <tr>
                <td height="35" valign="middle" class="stylos">
                  <div align="center">
                    <input type="button" name="boton" value="Nuevo tipo de Usuario" onclick="nuevotpu(this.form)"/>
                    <input name="nuevotp" type="hidden" id="nuevotp" />
                  </div></td>
              </tr>
              <tr>
                <td height="10" width="10"><img src="../../imagenes/g3.gif" width="10" height="10" /></td>
                <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" border="0" /></td>
                <td height="10" width="10"><img src="../../imagenes/g4.gif" width="10" height="10" /></td>
              </tr>
            </tbody>
        </table></td>
      </tr>
    </table>
      <table width="780" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td><? if ($existe=="uno"){?>
            <script language = "JavaScript" type="text/javascript" >
			alert("El tipo de usuario ya existe en la Base de Datos")
			window.location.href="frm_usuario.php?tipo=otra";
			</script>
            <?  }?>
            <? if ($existe=="dos"){?>
            <script language = "JavaScript" type="text/javascript" >
			alert("Debe ingresar el nombre del nuevo tipo de usuario")
			window.location.href="frm_usuario.php?tipo=otra";
			</script>
            <?  }?>
           </td>
        </tr>
		 <? if ($tipo =="Editar") {?>
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td height="10" width="10"><img src="../../imagenes/g1.gif" width="10" height="10" /></td>
                  <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td height="10" width="10"><img src="../../imagenes/g2.gif" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th scope="col"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <?
				  $sql_tipo = "SELECT * FROM tipo_usuario where id_tipo_usuario = '".$id_tipo."'";  
				  $result_tipo = mysql_query($sql_tipo);
				  $row_tipo = mysql_fetch_array($result_tipo);
				  ?>
                                  <th scope="col"> <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">									
								  <tr>
								  <td>
								    <div align="center" class="titulos_noticias">Editar tipo de Usuario								      </div></td>
								  </tr>
                                      <tr>
                                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                                            <tr>
                                              <td width="19%" bgcolor="#EFEFEF" class="titulos_general"><div align="center">ID</div></td>
                                              <td width="32%" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Nombre tipo de Usuario</div></td>
                                              <td width="49%" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                                            </tr>
                                            <tr>
                                              <td bgcolor="#EFEFEF" class="textos_noticias"><div align="center"><? echo $row_tipo['id_tipo_usuario']?></div></td>
                                              <td bgcolor="#EFEFEF" class="textos_noticias"><div align="center">
                                                  <input type="text" name="frm_nombre" id="frm_nombre" value="<? echo ucwords($row_tipo['nombre_tipo_usuario']); ?>"/>
                                              </div></td>
                                              <td bgcolor="#EFEFEF" class="textos_noticias"><div align="center">
                                                 
                                                  <select name="estado">
                                                    <option value="1" <? if ($row_tipo['estado_tipo_usuario']==1){?>selected<? }?> >Activo</option>
                                                    <option value="0" <? if ($row_tipo['estado_tipo_usuario']==0){?>selected<? }?> >Desactivo</option>
                                                  </select>
                              
                                              </div></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                      <br /></th>
                                </tr>
                                <tr>
                                  <th scope="col"><table width="100%" align="center">
                                    <tr>
                                      <td><div align="center">
                                          <input type="button" name="SubmitA" id="aceptar" value="Aceptar Cambios" onclick="acambios(this.form)"/>
                                          <input type="button" name="SubmitE" id="eliminar" value="Eliminar" style="display:none"/>
                                          <input type="button" name="SubmitC" id="cancelar" value="Cancelar" onclick="acancelar(this.form);"/>
                                          <input name="id_tipo" type="hidden" value="<? echo $row_tipo['id_tipo_usuario'] ?>" />
                                          <input name="a_cambios" type="hidden" id="a_cambios" />
                                      </div>                                        <div align="center"></div>                                      <div align="center"></div></td>
                                      <? if ($row_tipo['id_tipo_usuario']>3){?>
                                      <? }?>
                                      </tr>
                                  </table></th>
                                </tr>
                            </table></th>
                          </tr>
                        </table>
                          </th>
                      </tr>
                  </table></td>
                  <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td height="10" width="10"><img src="../../imagenes/g3.gif" width="10" height="10" /></td>
                  <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td height="10" width="10"><img src="../../imagenes/g4.gif" width="10" height="10" /></td>
                </tr>
              </tbody>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
             
            </table></td>
        </tr>
		<? } ?>
		  <tr>
          <td>&nbsp;</td>
        </tr>
		
		<tr>
          <td>
		  <? if($nuevotp==1){ ?>
		  <div id="nuevo">
		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td height="10" width="10"><img src="../../imagenes/g1.gif" width="10" height="10" /></td>
                  <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td height="10" width="10"><img src="../../imagenes/g2.gif" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="col">
                          <table width="100%" border="0" cellspacing="5">
                            <tr>
                              <th scope="col">
				<?
				  $sql_tipo = "SELECT * FROM tipo_usuario where id_tipo_usuario = '".$id_tipo."'";  
				  $result_tipo = mysql_query($sql_tipo);
				  $row_tipo = mysql_fetch_array($result_tipo);
				 ?></th>
                            </tr>
                            <tr>
                              <td><table width="65%" border="1" align="center" cellpadding="0" cellspacing="5" bordercolor="#D6D6D6" rules="none">
                                <tr>
                                  <td  bgcolor="#EFEFEF" class="titulos_general"><div align="center">Ingrese nuevo tipo usuario</div></td>
                                  <td  bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                                </tr>
                                <tr>
                                  <td class="titulos_general"><div align="center">
                                      <input name="frm_nuevo_tipo" type="text" id="nuevo" size="50" />
                                  </div></td>
                                  <td class="titulos_general"><div align="center">
                                      <select name="estado2">
                                        <option value="1">Activo</option>
                                        <option value="0" selected="selected">Desactivo</option>
                                      </select>
                                  </div></td>
                                </tr>
								<tr>
								<td colspan="2">
								
								<table width="100%" align="center" cellspacing="2">
                                  <tr>
                                    <td height="38"><div align="center">
                                        <input type="button" name="SubmitI" value="Ingresar" onclick="aingresa(this.form)" />
                                        <input type="button" name="SubmitC2" value="Cancelar"  onclick="acancelar(this.form);" />
                                        <input name="a_ingresar" type="hidden" id="a_ingresar" />
                                    </div>                                    </td>
                                    </tr>
                                </table>								</td>
								</tr>
                              </table>
                                </td>
                            </tr>
                            <tr>
                              <td><table align="center" width="100%">
                                <tr>
                                  <td colspan="2">
                                      <div align="center" class="titulos_noticias">Los privilegios deberan ser asignados en el modulo usuarios                                      </div></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
						  </th>
                      </tr>
                  </table></td>
                  <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td height="10" width="10"><img src="../../imagenes/g3.gif" width="10" height="10" /></td>
                  <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td height="10" width="10"><img src="../../imagenes/g4.gif" width="10" height="10" /></td>
                </tr>
              </tbody>
          </table>
		  
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">www.gorecoquimbo.cl</font></div></td>
              </tr>
            </table></div>
			<? } ?> <input name="id_ma" type="hidden" id="id_ma" value="<? echo $id_ma; ?>" /></td>
        </tr>
	
      </table></td>
  </tr>
  
</table>
</form>
</body>
</html>
