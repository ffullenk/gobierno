<? 
include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id, $id_tipo, $id_sis, $vacio, $existe,$id_ma,$nuevo_modulo;

while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
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

if ($tipo=="Nueva")
{
   $tipo="Nueva";
   $fecha=date("d-m-Y");
}
 
include ("../../../funciones/bitacora.php");
	
mantenedor($id_ma,$idusername);

if($nuevo_modulo=='')
{
	$nuevo_modulo=0;
}
	
?>

<html>
<head>
<title>Mantenedor sistema</title>
<script language="javascript">
function cambia(){ 
document.form3.url.value==document.form3.frm_nuevo_sistema.value;  
}

function muestra(valor,valor2)
{
	document.getElementById(valor).style.display = "none";
	document.getElementById(valor2).style.display = "block";
}
function ocultar(modulo)
{
	var nuevo=<? echo $nuevo_modulo;?>;
	if(nuevo==0){
//	document.getElementById(modulo).style.display = "none";
	muestra('nuevo_modulo','submitSM');
	}
	else
	{
	muestra('submitSM','nuevo_modulo');
//	document.getElementById(modulo).style.display = "block";
	}
	
}
function carga(valor3)
{
 document.getElementById(valor3).style.display = "none";
}
</script>
<link href="../../../css/estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {
	color: #666666;
	font-style: italic;
	font-weight: bold;
}
.Estilo2 {font-weight: bold; color: #666666;}
.Estilo3 {color: #666666}
body {
	background-image: url(../../../imagenes/fondo.jpg);
}
-->
</style>
</head>

<body onLoad="carga('nuevo_sis'); ocultar('nuevo_modulo');">
<form id="form3" name="form3" method="post" action="gr_sistema.php">

<table width="794" border="2" cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
  <tr>
    <td width="779" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
        </td>
      </tr>
    </table>
      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><div align="center"><br /></div></td>
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
                      <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5" bordercolor="#D6D6D6">
                          <tr>
                            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
							 <tr><td colspan="5"><div align="center" class="titulos_noticias">MANTENEDORES DE SISTEMA</div></td></tr>
                                <tr>
                                  <td width="55" bgcolor="#EFEFEF" class="titulos_general"><div align="center">N&ordm;</div></td>
                                  <td width="133" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Sistema</div></td>
                                  <td width="415" bgcolor="#EFEFEF" class="titulos_general"><div align="center">URL</div></td>
                                  <td width="118" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                                  <td width="148" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Accion</div></td>
                                </tr>
                                <tr>
                                  <?
				   	$sql_sis = "select * from sistema";
					$result = mysql_query($sql_sis);
					$i=1;
					while($row_sis=mysql_fetch_array($result)){				
				  
				  ?>
                                  <td class="textos_noticias"><div align="center"><? echo $i++; ?></div></td>
                                  <td class="textos_noticias"><? echo $row_sis['nombre_sistema'] ?> </td>
                                  <td class="textos_noticias" align="center"><div align="left"><? echo $row_sis['url_sistema'] ?> </div></td>
                                  <td class="textos_noticias" align="center"><? if ($row_sis['estado_sistema']==1){ ?>
                                      <label>Activo</label>
                                    <? }else{ ?>
                                    <label>Desactivo</label>
                                    <? }?>                                  </td>
                                  <td class="textos_noticias"><div align="center"><a href="frm_sistema.php?id_sis=<? echo $row_sis['id_sistema'] ?>&tipo=Nueva2&id_ma=<? echo $id_ma ?>&"><img src="../../../imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td>
                                </tr>
                                <? } ?>
                            </table></td>
                          </tr>
                        </table>
						<div id="btn_nuevo" align="center">
                            <input type="button" name="boton2" value="Nuevo Sistema" onClick="muestra('btn_nuevo','nuevo_sis')" >
                          </div></td>
                      <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                    </tr>
                  <td height="10" width="10"><img src="../../../imagenes/g3.gif" width="10" height="10" /></td>
                      <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td height="10" width="10"><img src="../../../imagenes/g4.gif" width="10" height="10" /></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
		<tr>
		<td><? if ($existe=="uno"){?>
        <script language = "javascript" >
			alert("El sistema ya existe en la Base de Datos")
			window.location.href="frm_sistema.php?tipo=otra";
			</script>
        <?  }?>
        <? if ($existe=="dos"){?>
        <script language = "javascript" >
			alert("Debe ingresar el nombre del sitema")
			window.location.href="frm_sistema.php?tipo=otra";
			</script>
        <?  }?>
        <? if ($tipo =="Nueva2") {?>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                    <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <th scope="col">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <?
				  $sql_sis = "SELECT * FROM sistema where id_sistema = '".$id_sis."'";  
				  $result_sis = mysql_query($sql_sis);
				  $row_sis = mysql_fetch_array($result_sis);
				  ?>
                                  <th scope="col"> <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                                      <tr>
                                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
										<tr><td height="25" colspan="5"><div align="center" class="titulos_noticias">Editar tipo de Sistema </div></td></tr>
										   <tr>
                                              <td width="90" bgcolor="#EFEFEF" class="titulos_general"><div align="center">ID</div></td>
                                              <td width="238" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Sistema</div></td>
                                              <td width="116" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                                              <td width="427" bgcolor="#EFEFEF" class="titulos_general"><div align="center">URL</div></td>
                                            </tr>
                                            <tr>
                                              <td width="90" bgcolor="#FFFFFF" class="textos_noticias"><div align="center"><? echo $row_sis['id_sistema']?></div></td>
                                              <td width="238" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                                  <input type="text" name="frm_nombre3" id="frm_nombre3" value="<? echo ucwords($row_sis['nombre_sistema']);?>"/>
                                              </div></td>
                                              <td width="116" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                                  <? if ($row_sis['id_sistema']>4){?>
                                                  <select name="estado3">
                                                    <option value="1" <? if ($row_sis['estado_sistema']==1){?>selected<? }?> >Activo</option>
                                                    <option value="2" <? if ($row_sis['estado_sistema']==2){?>selected<? }?> >Desactivo</option>
                                                  </select>
                                                  <? }else{
							  if ($row_sis['estado_sistema']==1){
							  ?>
                                                <label>Activo</label>
                                                <? }else{?>
                                                <label>Desactivo</label>
                                                <? }
							  }?>
                                              </div></td>
                                              <td width="427" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                                  <label>
                                                  <div align="center">
                                                    <input name="modifica_url" type="text" id="modifica_url" value="<? echo $row_sis['url_sistema']?> " size="60%">
                                                  </div>
                                                </label>
                                              </div></td>
                                            </tr>
											<tr>
											<td colspan="4"><table width="100%" align="center" bgcolor="#EFEFEF">
                                                <tr>
                                                  <td height="40" bgcolor="#FFFFFF"><div align="center">
                                                      <input type="submit" name="SubmitAS" id="SubmitAS" value="Aceptar Cambios"/>
                                                      <input type="submit" name="SubmitES" id="SubmitES" value="Eliminar"/>
                                                      <input type="submit" name="SubmitC" id="SubmitC2" value="Cancelar"/>
                                                      <input type="button" name="Submit" id="submitSM" value="Ingresar Sub-M&oacute;dulos" onClick="muestra('submitSM','nuevo_modulo')">
                                                  </div>
                                                      <div align="center"></div>
                                                    <div align="center"></div></td>
                                                  <? if ($row_sis['id_sistema']>4){?>
                                                  <? }?>
                                                </tr>
                                              </table></td>
											</tr>
                                        </table></td>
                                      </tr>
                                    </table>
									<br />
									<? 
									$SQL="SELECT * FROM subsistemas WHERE id_sistema='".$id_sis."'";
									$RESULT=mysql_query($SQL);
									$COUNT=mysql_num_rows($RESULT);
									if($COUNT>0){
									?>
									<table width="100%" border="0" align="center" cellpadding="0" cellspacing="5" bordercolor="#D6D6D6">
                                      <tr>
                                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                                            <tr>
                                              <td colspan="5"><div align="center" class="titulos_noticias">SUBSISTEMA (MODULOS) </div></td>
                                            </tr>
                                            <tr>
                                             
                                              <td width="274" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Sub-Modulo</div></td>
                                              <td width="154" bgcolor="#EFEFEF" class="titulos_general"><div align="center">URL</div></td>
                                              <td width="75" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                                              <td width="81" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Accion</div></td>
                                            </tr>
                                            <tr>
                                              <?
				while($row_subsis=mysql_fetch_array($RESULT)){				
				  
				  ?>
                                              
                                              <td class="textos_noticias"><div align="center"><? echo $row_subsis['nombre_subsistema'] ?> </div></td>
                                              <td class="textos_noticias" align="center"><div align="left"><? echo $row_subsis['url_subsistema'] ?> </div></td>
                                              <td class="textos_noticias" align="center"><? if ($row_subsis['estado_subsistema']==1){ ?>
                                                  <label>Activo</label>
                                                  <? }else{ ?>
                                                  <label>Desactivo</label>
                                                  <? }?>                                              </td>
                                              <td class="textos_noticias"><div align="center"><a href="frm_sistema.php?id_sis=<? echo $row_subsis['id_sistema'] ?>&id_subsis=<? echo $row_subsis['id_subsistema'];?>&tipo=Nueva2&id_ma=<? echo $id_ma ?>&EditarSub=1&nuevo_modulo=1"><img src="../../../imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td>
                                            </tr>
                                            <? } ?>
                                        </table></td>
                                      </tr>
                                    </table>
									<br />
									<? }
									
									$SQL_ED="SELECT * FROM subsistemas where id_subsistema='".$id_subsis."'";
									$RESULT_ED=mysql_query($SQL_ED);
									$rows_ED=mysql_fetch_array($RESULT_ED);
									 ?>
									<div id="nuevo_modulo">
									<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                                      <tr>
                                        <td colspan="5"><div align="center" class="titulos_noticias">Nuevo Subsistema(Modulos)</div></td>
                                      </tr>
                                      <tr>
                                        <td width="242" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Nombre Subsistema</div></td>
                                        <td width="139" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                                        <td width="349" bgcolor="#EFEFEF" class="titulos_general"><div align="center">URL</div></td>
                                      </tr>
                                      <tr>
                                        <td width="242" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                            <input type="text" name="frm_modulo" id="frm_modulo" onChange="cambia();" value="<? echo ucwords($rows_ED['nombre_subsistema']);?>"/>
                                        </div></td>
                                        <td width="139" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                            <select name="estado_modulo" id="estado_modulo">
                                              <option value="1" <? if ($rows_ED['estado_subsistema']==1){?>selected<? }?> > Activo</option>
                                              <option value="2"  <? if ($rows_ED['estado_subsistema']==0){?>selected<? }?> >Desactivo</option>
                                            </select>
                                        </div></td>
                                        <td width="349" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                            <label></label>
                                            <input name="url_modulo" type="text" id="url_modulo" value="<? echo $rows_ED['url_subsistema'];  ?>" size="50">
                                        </div></td>
                                      </tr>
									  <tr>
									  <td height="40" colspan="3" bgcolor="#FFFFFF">
									    <div align="center">
									      <? if ($EditarSub<>1){ ?>
										  <input name="SubmitASUB" type="submit" id="SubmitASUB" value="Nuevo Modulo">
									  	<?  } else { ?>										  
									      <input type="submit" name="SubmitACSUB" id="SubmitAS3" value="Aceptar Cambios"/>
										     <input name="SubmitESUB" type="submit" id="SubmitESUB" value="Eliminar">
										  <? } ?>
									      <input type="submit" name="SubmitC" id="SubmitC" value="Cancelar"/>
									    </div></td>
									  </tr>
                                    </table>
									</div>
                                    </th>
                                </tr>
                              </table>
                          </th>
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
        </table></td>
		</tr>
		<tr>
		<td><? }?>
		  <input name="id_ma" type="hidden" id="id_ma" value="<? echo $id_ma; ?>">
		  <input name="id_sis" type="hidden" id="id_sis" value="<? echo $row_sis['id_sistema'] ?>" />
		  <input name="nuevo_modulo" type="hidden" id="nuevo_modulo">
		  <input name="id_sub" type="hidden" id="id_sub" value="<? echo $id_subsis; ?>">
		  <div id="nuevo_sis">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
       
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
                          <th scope="col">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <th scope="col"> <table width="100%" border="1" align="center" cellpadding="0" cellspacing="5" bordercolor="#D6D6D6">
                                      <tr>
                                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
										<tr><td colspan="5"><div align="center" class="titulos_noticias">Nuevo Sistema</div></td></tr>
                                            <tr>
                                              <td width="218" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Nombre Sistema</div></td>
                                              <td width="99" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                                              <td width="409" bgcolor="#EFEFEF" class="titulos_general"><div align="center">URL</div></td>
                                            </tr>
                                            <tr>
                                              <td width="218" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                                  <input type="text" name="frm_nuevo_sistema" id="frm_nuevo_sistema" onChange="cambia();"/>
                                              </div></td>
                                              <td width="99" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                                  <select name="estado_nuevo_sistema">
                                                    <option value="1" >Activo</option>
                                                    <option value="2" >Desactivo</option>
                                                  </select>
                                              </div></td>
                                              <td width="409" bgcolor="#FFFFFF" class="textos_noticias"><div align="center">
                                                  <label>sistemas/ </label>
                                                  <input type="text" name="url" id="url" disabled="disabled" value="nombre del sistema">
                                              </div></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                      <br />
                                      <table width="30%" align="center">
                                        <tr>
                                          <td><div align="center">
                                              <input type="submit" name="SubmitAS2" id="SubmitAS2" value="Ingresar Sistema"/>
                                              <input type="hidden" name="url" value="sistemas/">
                                          </div></td>
                                          <td><div align="center">
                                              <input type="submit" name="SubmitC" id="SubmitC" value="Cancelar"/>
                                          </div></td>
                                        </tr>
                                    </table></th>
                                </tr>
                              </table>
                         </th>
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
		</div>
		</td>
		
		</tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">www.gorecoquimbo.cl</font></div></td>
              </tr>
            </table></td>
        </tr>
    </table></td>
  </tr>
</table>

</form>
</body>
</html>
