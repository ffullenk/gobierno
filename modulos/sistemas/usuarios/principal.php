<? include ("../../../funciones/conexion_comunicaciones.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id,$usuario,$pass,$busq,$tpo,$mostrar_ingreso,$idusuario,$errorusuario, $idtipo,$seleccion,$hora_inicio,$fecha_inicio;
global $buscar,$campo_blanco,$tpo_busq_blanco,$categoria_usuario,$errorusuario;
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

$usu = "SELECT * from usuario where nombre_completo = '".$_SESSION['usernameadmin']."' " ;
	$result=mysql_query($usu);
  	$row=mysql_fetch_array($result);
	$user = $row['id_usuario'];
	
	$sql_permiso = "select a1.id_usuario, a1.id_tipo_usuario, a2.ingresar, a2.modificar,a2.eliminar,a2.visualizar,a2.id_usuario,a2.id_sistema from usuario a1, permiso a2 where a1.id_usuario='".$user."' and a2.id_sistema=4 and a1.id_usuario=a2.id_usuario GROUP BY a1.id_usuario";
	$result_permiso = mysql_query($sql_permiso);
	$row_permiso = mysql_fetch_array($result_permiso);
	
	$ing = $row_permiso['ingresar'];
	$editar = $row_permiso['modificar'];
	$elimina = $row_permiso['eliminar'];
	$visual = $row_permiso['visualizar'];
	$tpo_user = $row_permiso['id_tipo_usuario'];

	
		

if ($id<>''){
  $sql="select * from usuario where id_usuario='".$id."'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
}

$_pagi_sql= "select * from usuario where id_usuario='".$id."'";
$sql= "select * from usuario where id_usuario='".$id."'";
$result_todas=mysql_query($sql);
$registros=mysql_num_rows($result_todas);
		
$_pagi_cuantos = 10; 
								  
include("../../../funciones/paginator.inc.php");
							
switch ($tpo) {
	case 1:
	$sql_var = $busq;
	$_pagi_sql= "select * from usuario where nombre_completo like'%".$sql_var."%'";
	$sql= "select * from usuario where nombre_completo like'%".$sql_var."%'";
	$result_todas=mysql_query($sql);
	$registros=mysql_num_rows($result_todas);
															
	$_pagi_cuantos = 10; 
									  
	include("../../../funciones/paginator.inc.php");
	break;
	case 2:
	$sql_var = $busq;	
	$_pagi_sql= "select * from usuario where usuario like'%".$sql_var."%'";
	$sql= "select * from usuario where usuario like'%".$sql_var."%'";
	$result_todas=mysql_query($sql);
	$registros=mysql_num_rows($result_todas);
																								
	$_pagi_cuantos = 10; 
										  
	include("../../../funciones/paginator.inc.php");
	break;
	case 3:
	$sql_var = $busq;
	$_pagi_sql= "select * from usuario where correo_usuario like'%".$sql_var."%'";
	$sql= "select * from usuario where correo_usuario like'%".$sql_var."%'";
	$result_todas=mysql_query($sql);
	$registros=mysql_num_rows($result_todas);
																								
	$_pagi_cuantos = 10; 
									  
	include("../../../funciones/paginator.inc.php");
	break;
}
					


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" language="javascript" src="../../../setup/seleccion.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="../../../stylos/stylos_modulos.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
.Estilo6 {color: #FFFFFF; font-size: 12px; font-weight: bold; }
.Estilo8 {
	color: #666666;
	font-weight: bold;
}
.Estilo10 {color: #666666}
.Estilo11 {
	color: #666666;
	font-weight: bold;
	font-size: 16px;
	font-style: italic;
}
.Estilo12 {font-size: 16px}
-->
</style>
<script type="text/javascript" language="javascript">
function mostrar(forma)
{
	forma.mostrar_ingreso.value=1;
	forma.action="principal.php";
	forma.submit();
}

</script>
</head>

<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="right" class="Estilo11">
      <blockquote>
        <p class="Estilo11">Busqueda</p>
      </blockquote>
    </div></td>
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
              <th scope="col"><table border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td height="10" width="10"><img src="../../imagenes/g1.gif" width="10" height="10" /></td>
                    <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td height="10" width="10"><img src="../../imagenes/g2.gif" width="10" height="10" /></td>
                  </tr>
                  <tr>
                    <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td valign="top" class="stylos"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                        <tr>
                          <td bgcolor="#EFEFEF"><div align="center" class="Estilo8"><font size="2" face="Arial, Helvetica, sans-serif">Busqueda 
                            de Usuarios </font></div></td>
                        </tr>
                        <tr>
                          <td valign="top"><form action="gr_usuarios.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
                              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                  <td class="field"><font size="2" face="Arial, Helvetica, sans-serif">
                                    <input name='frm_busqueda' type="text" id="frm_busqueda" value="<? echo $busq; ?>" size="50" />
                                  </font></td>
                                  <td class="field"><select name="tpo_busq" id="combo1">
                                      <option value="0" selected="selected">..:: Seleccione ::..</option>
                                      <option value="1" <? if ($tpo==1){?> selected<? } ?> >Nombres</option>
                                      <option value="2" <? if ($tpo==2){?> selected<? } ?>>Usuario</option>
                                      <option value="3" <? if ($tpo==3){?> selected<? } ?>>Correo</option>
                                    </select>                                  </td>
                                  <td class="field"><table border="0" align="center" cellpadding="0" cellspacing="5">
                                      <tr>
                                        <td><input name="SubmitB1" type="submit" id="SubmitB1" value="Buscar" />
                                            <input name="Submit2" type="submit" id="$Submit2" value="Cancelar" />
                                            <input name="user" type="hidden" id="user" value="<? echo $user; ?>" />	
											<input name="user" type="hidden" id="inicio" value="<? echo $hora_inicio; ?>" />										</td>
                                      </tr>

                                  </table></td>
                                </tr>
                              </table>
                          </form></td>
                        </tr>
                        <? if($campo_blanco==1){ ?>
						<tr>
                          <td valign="top">
						  <span class="parrafomay Estilo3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Dejaste el Campo Busqueda en Blanco</strong></font></span></td>
                        </tr>
						<? }  ?>
						   <? if($tpo_busq_blanco==1){ ?>
						<tr>
                          <td valign="top">
						  <span class="parrafomay Estilo3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Debes Seleccionar una Categoria de Busqueda</strong></font></span></td>
                        </tr>
						<? }  ?>
                    </table></td>
                    <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  </tr>
                  <tr>
                    <td height="10" width="10"><img src="../../imagenes/g3.gif" width="10" height="10" /></td>
                    <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td height="10" width="10"><img src="../../imagenes/g4.gif" width="10" height="10" /></td>
                  </tr>
                </tbody>
              </table></th>
            </tr>
			<tr>
			<td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><div align="center"><strong></strong></div>
                      <div align="right"></div></td>
                  <td width="80"><div align="right"><img src="imagenes/btn_buscar.jpg" width="80" height="18" /></div></td>
                </tr>
              </table>
			  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td height="10" width="10"><img src="../../imagenes/g1.gif" width="10" height="10" /></td>
                    <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td height="10" width="10"><img src="../../imagenes/g2.gif" width="10" height="10" /></td>
                  </tr>
                  <tr>
                    <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                    <td width="100%" valign="top" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><div align="center"><strong><font color="#990000" size="2" face="Arial, Helvetica, sans-serif"> </font></strong><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
                            <?   echo $registros; ?>
                            <span class="fuente_formulario">                            Usuario(s) Encontrado(s)</span></font></div></td>
                        </tr>
                      </table>
                        <table width="100%" border="0" cellspacing="5" cellpadding="0">
                          <tr>
                            <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"></font>&nbsp;&nbsp;</div></td>
                            <td bgcolor="#EFEFEF" class="Estilo6"><div align="center" class="fuente_formulario"><font face="Arial, Helvetica, sans-serif">Nombres</font></div></td>
                            <td bgcolor="#EFEFEF" class="Estilo6"><div align="center" class="Estilo2">
                                <p class="fuente_formulario"><font face="Arial, Helvetica, sans-serif">Usuario</font></p>
                            </div></td>
                            <td bgcolor="#EFEFEF" class="Estilo6"><div align="center" class="Estilo2">
                                <p class="fuente_formulario"><font face="Arial, Helvetica, sans-serif">Correo</font></p>
                            </div></td>
                            <td bgcolor="#EFEFEF" class="Estilo6"><div align="center" class="fuente_formulario"><font face="Arial, Helvetica, sans-serif">Accion</font></div></td>
                          </tr>
                          <? 
							
							while($row_todas=mysql_fetch_array($_pagi_result))
						{ ?>
                          <tr>
                            <td width="10" bgcolor="#EFEFEF"><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><strong> </strong></font></div></td>
                            <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><? echo $row_todas['nombre_completo']; ?> </strong></font></div></td>
                            <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><? echo $row_todas['usuario']; ?></strong></font></div></td>
                            <td><div align="center" class="fuente_formulario Estilo10"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $row_todas['correo_usuario']; ?></font></div></td>
                           <td><div align="center">
						   <? if(($editar==1) ||($elimina==1) ){ ?>
						   <a href="principal.php?id=<? echo $row_todas['id_usuario']; ?>&amp;tipo=Editar&amp;busq=<? echo $busq; ?>&amp;mostrar_ingreso=1&amp;tpo=<? echo $tpo; ?>&amp;categoria_usuario=<? echo $row_todas["id_tipo_usuario"]; ?>"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Editar</strong></font></a><? } ?></div></td>
                          </tr>
                          <? } ?>
                        </table>
                      <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F4F4F4">
                          <tr>
                            <td class="parrafo_grande"><div align="center" class="Parrafos Estilo10">                                <font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><hr color="#666666" />
                            </font></div></td>
                          </tr>
                          <tr>
                            <td class="parrafo_grande"><div align="center" class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">Pagina&nbsp;<? echo $_pagi_navegacion; ?>&nbsp;</font></div></td>
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
			    </table></td>
			</tr>
          </table></td>
		 <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
        </tr>
		<tr>
        <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
        </tr>
        <tr>
          <td height="10" width="10"><img src="../../../imagenes/g3.gif" width="10" height="10" /></td>
          <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
          <td height="10" width="10"><img src="../../../imagenes/g4.gif" width="10" height="10" /></td>
        </tr>
      
    </table></td>
  </tr>
</table><hr width="90%"/>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="right" class="Estilo11">
      <blockquote>
        <p>Ingreso de Usuarios </p>
      </blockquote>
    </div></td>
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
          <td valign="top" bgcolor="#FFFFFF" class="stylos">
		  <form id="form1" name="form1" method="post" action="gr_usuarios.php">
            <table  border="0" align="center" cellpadding="0" cellspacing="0" >
              <tbody>
                <tr>
                  <td height="10" width="10"><img src="../../imagenes/g1.gif" width="10" height="10" /></td>
                  <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td height="10" width="10"><img src="../../imagenes/g2.gif" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td valign="top" class="stylos"><div align="center">
                      <? 
					  
					  if(($tpo_user==2) || ($tpo_user==3)){
 					  if (($tipo=="Nueva") && ($mostrar_ingreso=='')){	?>
                      <input type="submit" name="btn_nuevo" id="btn_nuevo" value="Nuevo Usuario" onclick="javascript:mostrar(this.form);" />
                      <? 
						
					}	
					}
						 ?>
                      <input name="mostrar_ingreso" type="hidden" id="mostrar_ingreso" />
                    </div>
                      <?
						  if ($mostrar_ingreso<>'')
						  {
						  ?>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                        <tr>
                          <td bgcolor="#EFEFEF"><div align="center" class="fuente_formulario Estilo10"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Ingreso de Usuarios</strong></font></div></td>
                        </tr>
                        <tr>
                          <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                              <tr>
                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                    <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombre 
                                      :</font></div>
                                </div></td>
                                <td bgcolor="#EFEFEF" class="field"><font size="2" face="Arial, Helvetica, sans-serif">
                                  <input name='frm_nombre' type="text" id="frm_nombre"  value="<? if ($tipo<>'Nueva') {echo $row['nombre_completo']; } ?>" size="50" <? if(($ing==0) && ($editar==0)){ ?> disabled="disabled" <? } ?>  />
                                </font></td>
                              </tr>
                              <tr>
                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                    <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">U</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">suario 
                                      :</font></div>
                                </div></td>
                                <td bgcolor="#EFEFEF" class="field"><font size="2" face="Arial, Helvetica, sans-serif">
                                  <input name='frm_usuario'  type="text" id="frm_usuario" value="<? if ($tipo<>'Nueva') { echo $row['usuario']; } ?>" size="50" <? if(($ing==0)  && ($editar==0)){ ?> disabled="disabled" <? } ?> />
                                </font></td>
                              </tr>
							  <? if($errorusuario==1){ ?>
							  <tr>
                                <td bgcolor="#FFFFFF" class="txt" colspan="2"><div class="parrafomay">
			                      <div align="center"><span class="parrafomay Estilo3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Usuario ya Registrado</strong></font></span>		                          </div></td>
                               
                              </tr>
							  <? } ?>
                              <tr>
                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                    <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Correo                                          :</font></div>
                                </div></td>
                                <td bgcolor="#EFEFEF" class="field"><font size="2" face="Arial, Helvetica, sans-serif">
                                  <input name='frm_correo' type="text" id="frm_correo" value="<?  if ($tipo<>'Nueva') { echo $row['correo_usuario']; } ?>" size="50" <? if(($ing==0) && ($editar==0)){ ?> disabled="disabled" <? } ?> />
                                </font></td>
                              </tr>
                              <tr>
                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                    <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Contrase&ntilde;a 
                                      :</font></div>
                                </div></td>
                                <td bgcolor="#EFEFEF" class="field"><font size="2" face="Arial, Helvetica, sans-serif">
                                  <input name='frm_contrasena'  type="password" id="frm_contrasena" value="<? echo $pass ?>" size="50" <? if(($ing==0)  && ($editar==0)){ ?> disabled="disabled" <? } ?> />
                                </font></td>
                              </tr>
							   <tr>
                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                    <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Tipo de Usuario  
                                      :</font></div>
                                </div></td>
                                <td bgcolor="#EFEFEF" class="field"><label>
								 <?
						$sistema="select * from tipo_usuario";
  						$sis=mysql_query($sistema);
  					
						
						
						?>
                                      <select name="tpo_usuario" <? if(($ing==0)  && ($editar==0)){ ?> disabled="disabled" <? } ?> >
                                        <? 
										$i=1;
						if(($tpo_user==2) and ($rows["id_tipo_usuario"]<>3)){
						while($rows=mysql_fetch_array($sis)){
									
		?><option value="<? echo  $rows["id_tipo_usuario"]; ?>" <? if ($categoria_usuario==$rows["id_tipo_usuario"]){?> selected<? } ?>><? echo $rows["nombre_tipo_usuario"]; ?></option><?
				}
				}else{
			while($rows=mysql_fetch_array($sis)){
									
		?><option value="<? echo  $rows["id_tipo_usuario"]; ?>" <? if ($categoria_usuario==$rows["id_tipo_usuario"]){?> selected<? } ?>><? echo $rows["nombre_tipo_usuario"]; ?></option><?
				}
		
		}	  ?>
                                      </select>   
                                  
                                </label></td>
                              </tr>
							
                            </table>
                              <table border="0" align="center" cellpadding="0" cellspacing="5">
                                <tr>
                                  <td align="center"><? if($tipo=="Nueva"){ 
								  if($ing==1){ ?><input name="Submit1" type="submit" id="Submit1" value="Ingresar Usuario" /><? }else{ ?>
								    <span class="parrafomay Estilo3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>No tienes los Privilegios para crear Usuarios</strong></font></span><br /><? } ?>
                                      <input name="Submit2" type="submit" id="Submit4" value="Cancelar" />
                                      <? } else { 
									  if($editar==1){?>
                                      <input name="Submit3" type="submit" value="Aceptar Cambios" />
                                      <input name="Submit2" type="submit" id="Submit2" value="Cancelar" />
                                      <? }  if($elimina==1){?> <input name="Submit4" type="submit" id="Submit4" value="Eliminar" /><? } ?>
                                      <br />
                                      <? }
										
										?>                                  </td>
							    </tr>
								 
                              </table>
							  
                            <input name="id_not" type="hidden" id="id_not" value="<? echo $row['id_usuario']; ?>" />
                              <input name="tipo_op2" type="hidden" id="tipo_op2" value="<? echo $tipo_op; ?>" />
                              <input name="user" type="hidden" id="user" value="<? echo $user; ?>" /></td>
                        </tr>
                      </table>
                    <?
					  }
					  ?>
                  </td>
                  <td background="../../imagenes/vert.gif" height="10" width="10"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                </tr>
                <tr>
                  <td height="10" width="10"><img src="../../imagenes/g3.gif" width="10" height="10" /></td>
                  <td background="../../imagenes/hori.gif" valign="top"><img src="../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                  <td height="10" width="10"><img src="../../imagenes/g4.gif" width="10" height="10" /></td>
                </tr>
              </tbody>
            </table>
              </form>
          </td>
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
    <td class="Estilo11"><div align="right">
      <blockquote>
        <p>Asignar Permisos </p>
      </blockquote>
    </div></td>
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
		  
          <td valign="top" bgcolor="#FFFFFF" class="stylos"> <form name="f1" method="post" action="gr_permisos.php">
		  <? if($mostrar_ingreso<>''){ ?>
		  
		  <table border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td class="fuente_formulario">Selecionar Sistema : </td>
              <td class="fuente_formulario"><label>
               <?
						$sistema="select * from sistema";
  						$sis=mysql_query($sistema);
  					
						?>
                                      <select name="selec_sistema">
                                        <? 
										$i=1;
						while($rows=mysql_fetch_array($sis)){
		?><option value="<? echo  $rows["id_sistema"]; ?>" <? if ($seleccion==$i){?> selected<? } ?>><? echo $rows["nombre_sistema"]; ?></option><?
		$i++;
		}
					$sql_sis = "select * from permiso where id_usuario='".$id."' and id_sistema='".$seleccion."'";
					$result = mysql_query($sql_sis);
					$i=1;
					($row_sis=mysql_fetch_array($result))
						  ?>
                                      </select>    
              </label></td>
              <td class="fuente_formulario"> | Asignar Permisos : </td>
              <td class="fuente_formulario"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="ingresar" type="checkbox" id="ingresar" value="1" <? if ($row_sis['ingresar']==1){?> checked  <? } ?> />
                  </label></td>
                  <td>Ingresar</td>
                </tr>
              </table></td>
              <td class="fuente_formulario"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="modificar" type="checkbox" id="modificar" value="1" <? if ($row_sis['modificar']==1){?> checked  <? } ?>  />
                  </label></td>
                  <td>Modificar</td>
                </tr>
              </table></td>
              <td class="fuente_formulario"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="eliminar" type="checkbox" id="eliminar" value="1" <? if ($row_sis['eliminar']==1){?> checked  <? } ?>/>
                  </label></td>
                  <td>Eliminar</td>
                </tr>
              </table></td>
              <td class="fuente_formulario"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="visualizar" type="checkbox" id="visualizar" value="1" <? if ($row_sis['visualizar']==1){?> checked  <? } ?>/>
                  </label></td>
                  <td>Visualizar</td>
                </tr>
              </table></td>
              <td class="fuente_formulario"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="todas" type="checkbox" id="todas" value="1" onchange="seleccionar_todo()"/>
                  </label></td>
                  <td>Todas</td>
                </tr>
              </table></td>
			  <td class="fuente_formulario"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label><a href="javascript:deseleccionar_todo()">Desmarcar</a> 
                  </label></td>
                
                </tr>
              </table></td>
              <td width="10" class="fuente_formulario"><label>
                <div align="center">|</div>
              </label></td>
              <td class="fuente_formulario"><input type="submit" name="SubmitAs" id="SubmitAs" value="Asignar Permisos" /></td>
            </tr>

          </table><br />
 <input type="hidden" name="user" value="<? echo $user; ?>" />
		  <input name="busq" type="hidden" id="busq" value="<? echo $busq; ?>" />
		  <input name="tpo" type="hidden" id="tpo" value="<? echo $tpo; ?>" />
          <input name="tpo" type="hidden" id="hora" value="<? echo $hora_inicio ?>" />
		   <input name="tpo" type="hidden" id="fecha" value="<? echo $fecha_inicio ?>" />
           <input name="id_not2" type="hidden" id="id_not2" value="<? echo $row['id_usuario']; ?>" />
          </form>
            <table border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
              <tr>
                <td><table border="0" align="center" cellpadding="0" cellspacing="2">
                  <tr>
                    <td width="30" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">N&ordm;</div></td>
                    <td width="150" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Sistema</div></td>
                    <td width="80" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Ingresar</div></td>
                    <td width="80" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Modificar</div></td>
                    <td width="80" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Eliminar</div></td>
                    <td width="80" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Visualizar</div></td>
                    <td width="80" bgcolor="#EFEFEF" class="fuente_formulario"><div align="center">Acci&oacute;n</div></td>
                  </tr>
                  <tr>
				  <?
				   	$sql_sis = "select * from permiso where id_usuario='".$id."'";
					$result = mysql_query($sql_sis);
					$i=1;
					while($row_sis=mysql_fetch_array($result)){				
				  	
					$sistem = $row_sis['id_sistema'];
					$sql_nombre = "select * from sistema where id_sistema='".$sistem."'";
					$resul_nombre = mysql_query($sql_nombre);
					$row_nom =mysql_fetch_array($resul_nombre);
				  ?>
				  
                    <td class="fuente_formulario"><div align="center"><? echo $i++; ?></div></td>
                    <td class="fuente_formulario" align="center"><? echo $row_nom['nombre_sistema'] ?></td>
					
                    <td><div align="center"><? if ($row_sis['ingresar']==1){ ?> <img src="../../imagenes/icono_select.jpg" width="20" height="21" /></div> <? } else { ?><img src="../../imagenes/icono_no_select.jpg" width="20" height="21" /><? }?></td>
                    <td><div align="center"><? if ($row_sis['modificar']==1){ ?><img src="../../imagenes/icono_select.jpg" width="20" height="21" /></div> <? }  else { ?><img src="../../imagenes/icono_no_select.jpg" width="20" height="21" /><? }?></td>
                    <td><div align="center"><? if ($row_sis['eliminar']==1){ ?><img src="../../imagenes/icono_select.jpg" width="20" height="21" /></div><? }  else { ?><img src="../../imagenes/icono_no_select.jpg" width="20" height="21" /><? }?></td>
                    <td><div align="center"><? if ($row_sis['visualizar']==1){ ?><img src="../../imagenes/icono_select.jpg" width="20" height="21" /></div><? }   else { ?><img src="../../imagenes/icono_no_select.jpg" width="20" height="21" /><? }?></td>
                    <td><div align="center"><a href="principal.php?id=<? echo $row_sis['id_usuario']; ?>&amp;tipo=Editar&amp;busq=<? echo $busq; ?>&amp;mostrar_ingreso=1&amp;tpo=<? echo $tpo; ?>&amp;seleccion=<? echo $row_sis['id_sistema']; ?>"><img src="../../imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td>
                  </tr>
				  <? } ?>
                </table></td>
              </tr>
            </table>
			<? } ?>
            </td>
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
