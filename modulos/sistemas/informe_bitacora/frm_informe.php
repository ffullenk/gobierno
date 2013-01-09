<? 
include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id,$id2,$usuario,$pass,$busq,$tpo,$mostrar_ingreso,$idusuario,$errorusuario, $idtipo,$seleccion,$hora_inicio,$fecha_inicio;
global $buscar,$campo_blanco,$tpo_busq_blanco,$categoria_usuario,$errorusuario;
global $frm_buqueda,$sel_busqueda,$id_m,$id_sub,$fecha_inf;

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
if (isset($_SESSION['usernameadmin']))
{
	
}
else
{
    echo "Usuario No Autentificado!";
	exit;
}

if($id_m=='')
{
	$id_m=$id_m2;
}
if($id_sub==''){ $id_sub=0; }

/*include ("../../../funciones/bitacora.php");

modulos($id_m,$idusername,$row_permiso['id_subsistema']);
*/


	
if ($id<>''){
  $sql="select * from usuario where id_usuario='".$id."'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);

}

$_pagi_sql= "select * from usuario where id_usuario='".$id."'";
$result_todas=mysql_query($_pagi_sql);
$registros=mysql_num_rows($result_todas);

if($ac_buscar==1)
{
$sql_var = $frm_busqueda;

switch ($sel_busqueda) {
	case 1:
	$_pagi_sql= "select * from usuario where nombre_completo like '%".$sql_var."%'";
	$result_todas=mysql_query($_pagi_sql);
	$registros=mysql_num_rows($result_todas);

	break;
	
	case 2:
	$_pagi_sql= "select * from usuario where usuario like'%".$sql_var."%'";
	$sql= "select * from usuario where usuario like'%".$sql_var."%'";
	$result_todas=mysql_query($sql);
	$registros=mysql_num_rows($result_todas);

	break;
	case 3:
	$sql_var = $busq;
	$_pagi_sql= "select * from usuario where correo_usuario like'%".$sql_var."%'";
	$result_todas=mysql_query($_pagi_sql);
	$registros=mysql_num_rows($result_todas);
	break;
}
	
//acciones('1',' Usuarios',$id_m2,$idusername,$row_permiso['id_subsistema']); 
}					

$_pagi_cuantos = 10; 
include("../../../funciones/paginator.inc.php");
//include("../../../funciones/restricciones.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" language="javascript" src="../../../setup/seleccion.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aplicacion Segura</title>
<link href="../../../css/estilo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../../../funciones/calendario.js"></script>
<script type="text/javascript" src="scripts/firebug.js"></script> 
 <!-- jQuery --> 
<script type="text/javascript" src="scripts/jquery.min.js"></script> 
<!-- required plugins --> 
<script type="text/javascript" src="scripts/date.js"></script> 
<!--[if IE]><script type="text/javascript" src="scripts/jquery.bgiframe.min.js"></script><![endif]--> 
<!-- jquery.datePicker.js --> 
<script type="text/javascript" src="scripts/jquery.datePicker.js"></script> 
<!-- datePicker required styles --> 
<link rel="stylesheet" type="text/css" media="screen" href="styles/datePicker.css"> 
<!-- page specific styles --> 
<link rel="stylesheet" type="text/css" media="screen" href="styles/calendario.css"> 
<!-- page specific scripts --> 
<script type="text/javascript" charset="utf-8"> 
 $(function()
 {
	$('.date-pick').datePicker({startDate:'01/01/1996'});
 });
</script> 

<script language="javascript" type="text/javascript">
var num1 = <? echo $id_m; ?>;
var num2 = <? echo $id_sub; ?>;

function buscar(forma,valor1,valor2)
{	
	if(document.getElementById("frm_busqueda").value==""){ alert ("Debes Ingresar valores en el campo de busqueda"); 	return;}
	if(forma.sel_busqueda.selectedIndex==0){	alert('Debe elegir un Filtro'); 		return;	}
	forma.ac_buscar.value=1;
	forma.action="frm_informe.php?id_m="+valor1+"&id_sub="+valor2;
	forma.submit();
}
function enviar(forma)
{
	var fecha1=document.getElementById('frm_fecha1').value;
	var fecha2=document.getElementById('frm_fecha2').value;
	forma.action="informe.php?id=<? echo $id; ?>&frm_fecha1="+fecha1+"&frm_fecha2="+fecha2;
	forma.submit();
}

</script>
<style type="text/css">
<!--
body {
	background-image: url(../../../imagenes/fondo.jpg);
}
.Estilo8 {	color: #666666;
	font-weight: bold;
}
.Estilo10 {color: #666666}
.Estilo11 {color: #FFFFFF}
.Estilo17 {font-size: 12px; color: #666666; }
-->
</style>

</head>

<body>
<form name="form1" action="" method="post">
  <table border="2" cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
    <tr>
      <td width="780" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
                      <td height="10" width="10"><img src="../../../imagenes/g1.gif" width="10" height="10" /></td>
                      <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="../../../imagenes/g2.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td valign="top" class="stylos"><table width="100%" border="0" cellpadding="0" cellspacing="5">
                          <tr>
                            <td colspan="5"><div align="center" class="titulos_noticias"><font size="2" face="Arial, Helvetica, sans-serif">Informes Acciones de Usuarios Activos </font></div></td>
                          </tr>
						  <? if($fecha_inf<>1){ ?>
                          <tr>
                            <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tbody>
                                <tr>
                                  <td height="10" width="10"><img src="../../../imagenes/g1.gif" width="10" height="10" /></td>
                                  <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                                  <td height="10" width="10"><img src="../../../imagenes/g2.gif" width="10" height="10" /></td>
                                </tr>
                                <tr>
                                  <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                                  <td valign="top" class="stylos"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                                      <tr>
                                        <td bgcolor="#EFEFEF"><div align="center" class="Estilo8"><font size="2" face="Arial, Helvetica, sans-serif">Busqueda 
                                          de Usuarios </font></div></td>
                                      </tr>
                                      <tr>
                                        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                            <tr>
                                              <td class="field"><font size="2" face="Arial, Helvetica, sans-serif">
                                                <input name='frm_busqueda' type="text" id="frm_busqueda" value="<? echo $frm_busqueda; ?>" size="50" />
                                              </font></td>
                                              <td class="field"><select name="sel_busqueda" id="sel_busqueda">
                                                  <option value="0" selected="selected">..:: Seleccione ::..</option>
                                                  <option value="1" <? if ($sel_busqueda==1){?> selected<? } ?> >Nombres</option>
                                                  <option value="2" <? if ($sel_busqueda==2){?> selected<? } ?>>Usuario</option>
                                                  <option value="3" <? if ($sel_busqueda==3){?> selected<? } ?>>Correo</option>
                                                </select>
                                              </td>
                                              <td class="field"><table border="0" align="center" cellpadding="0" cellspacing="5">
                                                  <tr>
                                                    <td><input name="SubmitB1" type="button" id="SubmitB1" value="Buscar" onclick="buscar(this.form,num1,num2)" />
                                                        <input name="Submit2" type="button" id="Submit2" value="Cancelar" onclick=" cancelar(this.form,num1,num2);" />
                                                        <input name="id_m2" type="hidden" id="id_m2" value="<? echo $id_m; ?> " />
                                                        <input name="ac_buscar" type="hidden" id="ac_buscar" /></td>
                                                  </tr>
                                              </table></td>
                                            </tr>
                                        </table></td>
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
				<tr>
				<td><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="../../../imagenes/g1.gif" width="10" height="10" /></td>
                      <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="../../../imagenes/g2.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td background="../../../imagenes/vert.gif" height="10" width="10"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td width="100%" valign="top" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><div align="center"><strong><font color="#990000" size="2" face="Arial, Helvetica, sans-serif"> </font></strong><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
                                <?   echo $registros; ?>
                                <span class="fuente_formulario"> Usuario(s) Encontrado(s)</span></font></div></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellspacing="5" cellpadding="0">
                            <tr>
                              <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"></font>&nbsp;&nbsp;</div></td>
                              <td bgcolor="#EFEFEF" class="titulos_general"><div align="center" class="fuente_formulario"><font face="Arial, Helvetica, sans-serif">Nombres</font></div></td>
                              <td bgcolor="#EFEFEF" class="titulos_general"><div align="center" class="Estilo11">
                                  <p class="titulos_general"><font face="Arial, Helvetica, sans-serif">Usuario</font></p>
                              </div></td>
                              <td bgcolor="#EFEFEF" class="titulos_general"><div align="center" class="Estilo11">
                                  <p class="titulos_general"><font face="Arial, Helvetica, sans-serif">Correo</font></p>
                              </div></td>
                              <td bgcolor="#EFEFEF" class="titulos_general"><div align="center" class="fuente_formulario"><font face="Arial, Helvetica, sans-serif">Accion</font></div></td>
                            </tr>
                            <? 
							
							while($row_todas=mysql_fetch_array($_pagi_result))
						{ ?>
                            <tr>
                              <td width="10" bgcolor="#EFEFEF"><div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><strong> </strong></font></div></td>
                              <td><div align="center" class="textos_noticias"><font face="Arial, Helvetica, sans-serif"><? echo $row_todas['nombre_completo']; ?></font> </div></td>
                              <td><div align="center" class="textos_noticias"><font size="1" face="Arial, Helvetica, sans-serif"><strong><? echo $row_todas['usuario']; ?></strong></font></div></td>
                              <td><div align="center" class="textos_noticias"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $row_todas['correo_usuario']; ?></font></div></td>
                              <td><div align="center">
                                
                                  <a href="frm_informe.php?id=<? echo $row_todas['id_usuario']; ?>&amp;tipo=Editar&amp;id_m=<? echo $id_m; ?>&fecha_inf=1" class="textos_noticias"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Informe</strong></font></a>
                            
                              </div></td>
                            </tr>
                            <? } ?>
                          </table>
                        <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F4F4F4">
                            <tr>
                              <td class="parrafo_grande"><div align="center" class="Parrafos Estilo10"> <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
                                  <hr color="#666666" />
                              </font></div></td>
                            </tr>
                            <tr>
                              <td class="parrafo_grande"><div align="center" class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">Pagina&nbsp;<? echo $_pagi_navegacion; ?>&nbsp;</font></div></td>
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
				<? } ?>
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
          <table width="780" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <td>&nbsp;</td>
            </tr>
		<? if($fecha_inf==1){ ?>
            <tr>
              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="../../../imagenes/g1.gif" width="10" height="10" /></td>
                      <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="../../../imagenes/g2.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td width="10" height="10" rowspan="2" background="../../../imagenes/vert.gif"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="5">
                        <tr>
                          <th colspan="4" class="Estilo8" scope="col">Seleccionar Fechas</th>
                        </tr>
                        <tr>
                          <th colspan="4" class="Estilo8" scope="col"><div align="center">
                             <table width="50%" border="0" cellspacing="5">
                              <tr>
                                <th scope="col"><div align="right">Usuario : </div></th>
                                <th scope="col"> <div align="left" class="textos_noticias"><? echo ucwords($row['nombre_completo']); ?></div></th>
                              </tr>
                            </table>
                          </div></th>
                        </tr>
                        <tr>
						  <td width="14%"><div align="right"><span class="Estilo17">Desde : </span></div></td>
                          <td width="26%"><input name="frm_fecha1" id="frm_fecha1" class="date-pick" />
                         </td>
                          <td width="28%"><div align="right"><span class="Estilo17">Hasta : </span></div></td>
                          <td width="32%"><input name="frm_fecha2" id="frm_fecha2" class="date-pick" /></td>
                      
					    </tr>
                        <tr>
                          <td colspan="4"><div align="center">
                            <label>
                            <input type="button" name="Submit" value="Ver" onclick="enviar(this.form);" />
                            </label>
                            <input name="enviado" type="hidden" id="enviado" />
                          </div></td>
                        </tr>
                      </table></td>
                      <td width="10" height="10" rowspan="2" background="../../../imagenes/vert.gif"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td valign="top" bgcolor="#FFFFFF" class="stylos"><input name="id_m" type="hidden" id="id_m" value="<?  echo $id_m; ?>" />
                      <input name="id_sub" type="hidden" id="id_sub" value="<?  echo $id_sub; ?>" />
                      <input name="id" type="hidden" id="id" value="<? echo $id; ?>" />
                      <input name="id" type="hidden" id="id" value="<? echo $id; ?>" /></td>
                    </tr>
                    <tr>
                      <td height="10" width="10"><img src="../../../imagenes/g3.gif" width="10" height="10" /></td>
                      <td background="../../../imagenes/hori.gif" valign="top"><img src="../../../imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="../../../imagenes/g4.gif" width="10" height="10" /></td>
                    </tr>
                  </tbody>
                </table></td></tr>
		
				<? } ?>
				<tr>
				<td>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				</table>
				</td></tr>
				<tr>
				  <td>
				<tr>
				<td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
