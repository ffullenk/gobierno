<? 
include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");



global $usernameadmin,$tipo,$id,$id2,$usuario,$pass,$busq,$tpo,$mostrar_ingreso,$idusuario,$errorusuario, $idtipo,$seleccion,$hora_inicio,$fecha_inicio;
global $buscar,$campo_blanco,$tpo_busq_blanco,$categoria_usuario,$errorusuario;
global $frm_buqueda,$sel_busqueda;
global $opB,$opR,$opP,$ac_cambios,$errorU,$id_m,$id_sub;

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

include ("../../../funciones/bitacora.php");

modulos($id_m,$idusername,$row_permiso['id_subsistema']);


	
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
	
acciones('1',' Usuarios',$id_m2,$idusername,$row_permiso['id_subsistema']); 
}					

$_pagi_cuantos = 10; 
include("../../../funciones/paginator.inc.php");
include("../../../funciones/restricciones.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" language="javascript" src="../../../setup/seleccion.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aplicacion Segura</title>
<link href="formato/estilo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../funciones/calendario.js"></script>
<script language="javascript" src="funciones/acciones.js"></script>
<script language="javascript" type="text/javascript">
var num1 = <? echo $id_m; ?>;
var num2 = <? echo $id_sub; ?>;
</script>
<style type="text/css">
<!--
body {
	background-image: url(imagenes/fondo.jpg);
}
.Estilo8 {	color: #666666;
	font-weight: bold;
}
.Estilo10 {color: #666666}
.Estilo11 {color: #FFFFFF}
.Estilo12 {font-size: 11px}
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
                      <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td valign="top" class="stylos"><table width="100%" border="0" cellpadding="0" cellspacing="5">
                          <tr>
                            <td colspan="5"><div align="center" class="titulos_noticias"><font size="2" face="Arial, Helvetica, sans-serif">Administrador 
                              de Usuarios </font></div></td>
                          </tr>
                          <tr>
                            <td>
							<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td valign="top" bgcolor="#FFFFFF" class="stylos">
					<div align="center"><table width="60%" height="30" align="center" cellspacing="5">
						<tr><td><div align="center"><span class="textos_noticias"><a href="administrador.php?opB=1&amp;id_m=<? echo $id_m; ?>">Buscar Usuarios </a></span></div></td><td><div align="center">|</div></td><td><div align="center"><span class="textos_noticias"><a href="administrador.php?opR=1&amp;id_m=<? echo $id_m; ?>"> Registrar Usuarios </a></span></div></td>
					  </tr>
					  </table>
					  </div>
					  </td>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                    </tr>
                  </tbody>
                </table>
				</td>
				</tr>
				
                      </table></td>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" border="0" /></td>
                      <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                    </tr>
                  </tbody>
              </table></td>
          </tr>
        </table>
          <table width="780" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <td>&nbsp;</td>
            </tr>
			<? if($opB==1){ ?>
            <tr>
              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td width="10" height="10" rowspan="2" background="imagenes/vert.gif"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                            <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                          </tr>
                          <tr>
                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
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
                                          </select>                                        </td>
                                        <td class="field"><table border="0" align="center" cellpadding="0" cellspacing="5">
                                            <tr>
                                              <td><input name="SubmitB1" type="button" id="SubmitB1" value="Buscar" onclick="buscar(this.form)" />
                                                  <input name="Submit2" type="button" id="$Submit2" value="Cancelar" onclick=" cancelar(this.form,num1,num2);" />
                                                  <input name="opB" type="hidden" id="opB" />
                                                  <input name="id_m2" type="hidden" id="id_m2" value="<? echo $id_m; ?> " />
                                                  <input name="ac_buscar" type="hidden" id="ac_buscar" /></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                  </table></td>
                                </tr>
                            </table></td>
                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                          </tr>
                          <tr>
                            <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                            <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                          </tr>
                        </tbody>
                      </table>					  
                      </td>
                      <td width="10" height="10" rowspan="2" background="imagenes/vert.gif"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                          <tr>
                            <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                            <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                          </tr>
                          <tr>
                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
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
                                        <? if($row_todas['id_tipo_usuario']<>0){ ?>
                                        <a href="administrador.php?id=<? echo $row_todas['id_usuario']; ?>&amp;tipo=Editar&amp;busq=<? echo $busq; ?>&amp;mostrar_ingreso=1&amp;tpo=<? echo $tpo; ?>&amp;categoria_usuario=<? echo $row_todas["id_tipo_usuario"]; ?>&amp;opR=1&amp;id_m=<? echo $id_m; ?>" class="textos_noticias"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Editar</strong></font></a>
                                      <? } ?>
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
                            <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                          </tr>
                          <tr>
                            <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                            <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                            <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                          </tr>
                        </tbody>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                    </tr>
                  </tbody>
                </table></td></tr>
				<? }
				
				 if($opR==1){ ?> 
				<tr>
				<td>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <th scope="col"><table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0" >
                              <tbody>
                                <tr>
                                  <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                                  <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                                  <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                                </tr>
                                <tr>
                                  <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                                  <td valign="top" class="stylos"><div align="center"></div>
                   
                                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="6">
                                        <tr>
                                          <td bgcolor="#EFEFEF"><div align="center" class="fuente_formulario Estilo10"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Ingreso de Usuarios</strong></font></div></td>
                                        </tr>
                                        <tr>
                                          <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                              <tr>
                                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                                    <div align="right" class="textos_general"><font size="2" face="Arial, Helvetica, sans-serif"><span class="Estilo10">Nombre </span></font><span class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">:</font></span></div>
                                                </div></td>
                                                <td bgcolor="#EFEFEF" class="field"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
                                                  <input name='frm_nombre' type="text" id="frm_nombre"  value="<? if ($tipo<>'Nueva') {echo $row['nombre_completo']; } ?>" size="50">
                                                </font></div></td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                                    <div align="right" class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">Usuario</font>                                                    <span class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">:</font></span></div>
                                                </div></td>
                                                <td bgcolor="#EFEFEF" class="field"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
                                                  <input name='frm_usuario'  type="text" id="frm_usuario" value="<? if ($tipo<>'Nueva') { echo $row['usuario']; } ?>" size="50"  />
                                                </font></div></td>
                                              </tr>
                                              <? if($errorU==1){ ?>
                                              <tr>
                                                <td bgcolor="#FFFFFF" class="txt" colspan="2"><div class="parrafomay">
                                                    <div align="center"><span class="titulos_noticias_destacados"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Usuario ya Registrado</strong></font></span> </div></td>
                                              </tr>
                                              <? } ?>
                                              <tr>
                                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                                    <div align="right" class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">Correo </font><span class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">:</font></span></div>
                                                </div></td>
                                                <td bgcolor="#EFEFEF" class="field"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
                                                  <input name='frm_correo' type="text" id="frm_correo" value="<?  if ($tipo<>'Nueva') { echo $row['correo_usuario']; } ?>" size="50"  />
                                                </font></div></td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                                    <div align="right" class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">Contrase&ntilde;a 
                                                      :</font></div>
                                                </div></td>
                                                <td bgcolor="#EFEFEF" class="field"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
                                                  <input name='frm_contrasena'  type="password" id="frm_contrasena" value="" size="50"/>
                                                </font></div></td>
                                              </tr>
                                              <tr>
                                                <td bgcolor="#EFEFEF" class="txt"><div class="parrafomay">
                                                    <div align="right" class="Estilo10"><font size="2" face="Arial, Helvetica, sans-serif">Tipo de Usuario  
                                                      :</font></div>
                                                </div></td>
                                                <td bgcolor="#EFEFEF" class="field"><label>
                                                  <div align="left">
             <?
			  $sistema="select * from tipo_usuario where estado_tipo_usuario=1 ORDER BY nombre_tipo_usuario ASC";
  			  $sis=mysql_query($sistema);
			  $sqlusu="SELECT * FROM usuario where id_usuario='".$usernameadmin."'";
			  $exeusu=mysql_query($sqlusu);
			  $rows_exus=mysql_fetch_array($exeusu);
			  
  			 ?>
              <select name="tpo_usuario" >
             <? 
				if(($rows_exus['id_tipo_usuario']==3) || ($rows_exus['id_tipo_usuario']==0)){
				while($rows=mysql_fetch_array($sis)){
			 ?>
         <option value="<? echo  $rows["id_tipo_usuario"]; ?>"  <? if($rows['id_tipo_usuario']==$row['id_tipo_usuario']) {?>selected<? }?>><? echo ucwords($rows["nombre_tipo_usuario"]); ?></option>
             <?
				}
				} else {
			   $sistema="select * from tipo_usuario where estado_tipo_usuario=1 and id_tipo_usuario<>3 ORDER BY nombre_tipo_usuario ASC";
  			  $sis=mysql_query($sistema);
		    	while($rows=mysql_fetch_array($sis)){
				?>
		 		<option value="<? echo  $rows["id_tipo_usuario"]; ?>" <? if($rows['id_tipo_usuario']==$row['id_tipo_usuario']) {?>selected<? }?>><? echo ucwords($rows["nombre_tipo_usuario"]); ?></option>
            	<?
				}
				}	  ?></select>
                                                  </div>
                                                </label></td>
                                              </tr>
                                            </table>
                          <table border="0" align="center" cellpadding="0" cellspacing="5">
                           <tr>
                          <td align="center">
						<? if(($tipo=="Nueva") ){ 
						if($ing==1){?>
                         <input name="Submit1" type="button" id="Submit1" value="Ingresar Usuario" onclick="ingreso(this.form);" />
                         <? } else { ?>
                       <span class="titulos_noticias_destacados"><font size="2" face="Arial, Helvetica, sans-serif"><strong>No tienes los Privilegios para crear Usuarios</strong></font></span><br />
                                                   
                           <input name="Submit22" type="button" id="Submit4" value="Cancelar" onclick="cancelar(this.form,num1,num2);" />        <? 
		}
		} else {  ?>
									 
       <? if($editar==1){ ?><input name="Submit3" type="button" value="Aceptar Cambios" onclick="cambios(this.form);" /><? } ?>
                        <input name="Submit22" type="button" id="Submit2" value="Cancelar" onclick="cancelar(this.form,num1,num2);" />
       <? if($elimina==1){?><input name="Submit4" type="button" id="Submit4" value="Eliminar" onclick="u_eliminar(this.form);" /><? } ?>
                          <br />
        <? }	?>                             </td>
                                            </tr>
                                            </table>
                                              <input name="opR" type="hidden" id="opR" />
                                              <input name="id_us" type="hidden" id="id_us" value="<? echo $row['id_usuario']; ?>" />
                                              <input name="tipo_op2" type="hidden" id="tipo_op2" value="<? echo $tipo_op; ?>" />
                                              <input name="user" type="hidden" id="user" value="<? echo $user; ?>" />
                                              <input name="a_ingresar" type="hidden" id="a_ingresar" />
                                              <input name="ac_cambios" type="hidden" id="ac_cambios" />
                                              <input name="a_eliminar" type="hidden" id="a_eliminar" />
                                              <input name="id_m" type="hidden" id="id_m" value="<? echo $id_m;?>" />
                                              <input name="id_sub" type="hidden" id="id_sub" value="<? echo $id_sub; ?>" /></td>
                                        </tr>
                                      </table>
                  
                                  </td>
                                  <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                                </tr>
                                <tr>
                                  <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                                  <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                                  <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                                </tr>
                              </tbody>
                            </table></th>
                          </tr>
                      </table></td>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                    </tr>
                  </tbody>
                </table>
				</td></tr>
				<tr>
				<td>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td width="10" height="10" rowspan="2" background="imagenes/vert.gif"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td valign="top" bgcolor="#FFFFFF" class="stylos">
					  <table border="0" align="center" cellpadding="0" cellspacing="10">
					  <tr><td colspan="7"><div align="center" class="titulos_eje_territorial">PERMISO A MODULOS</div></td></tr>
			<? if($editar==1){ ?>
            <tr>
			<td colspan="7">
			<table align="center" cellspacing="5">
			<tr>
              <td class="titulos_eje_territorial">Selecionar Sistema : </td>
              <td class="fuente_formulario"><label>
            <?
			$sistema="select * from sistema";
  			$sis=mysql_query($sistema);
  					
			?>
        <select name="selec_sistema" <? if($id_sub<>0){ ?>disabled="disabled"<? } ?>>
         <? 
		while($rows=mysql_fetch_array($sis)){
		?><option value="<? echo  $rows["id_sistema"]; ?>" <? if($rows["id_sistema"]==$seleccion){ ?> selected <? } ?>><? echo $rows["nombre_sistema"]; ?></option>
		<? 	
		}
		$sql_sis="select * from permiso where id_usuario='".$id."' and id_sistema='".$seleccion."'";
		$result=mysql_query($sql_sis);
		$i=1;
		($row_sis=mysql_fetch_array($result))	
	
		 ?>
                                  </select>    
              </label></td>
			  </tr>
			</table>
			<? if($id_sub<>0){ ?>
			<table width="60%" align="center" cellspacing="5">
              <tr>
                <td width="174" class="titulos_eje_territorial">Selecionar Sub-Sistema : </td>
                <td width="74" class="fuente_formulario"><label>
                  <?
			$subsistema="select * from subsistemas where id_sistema='".$seleccion."'";
			$subsis=mysql_query($subsistema);
  					
			?>
                  <select name="subsistema" id="subsistema" <? if($id_sub==0){ ?> disabled="disabled" <? } ?>>
                    <? 
		while($rowssub=mysql_fetch_array($subsis)){
		?>
                    <option value="<? echo  $rowssub["id_subsistema"]; ?>" <? if($rowssub["id_subsistema"]==$id_sub){ ?> selected="selected" <? } ?>><? echo $rowssub["nombre_subsistema"]; ?></option>
                    <? 	
		}
		if($id_sub==0){	$sql_sis="select * from permiso where id_usuario='".$id."' and id_sistema='".$seleccion."'"; } 
		else { $sql_sis="select * from permiso where id_usuario='".$id."' and id_subsistema='".$id_sub."'"; }
		
		$result=mysql_query($sql_sis);
		$i=1;
		($row_sis=mysql_fetch_array($result))	
	
		 ?>
                  </select>
                </label></td>
              </tr>
            </table>		
			<? } ?>	
			</td>
			</tr>
			
			  <tr>
			  
              <td class="titulos_eje_territorial">  Asignar Permisos : </td>
              <td class="titulos_eje_territorial"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="ingresar" type="checkbox" id="ingresar" value="1" <? if ($row_sis['ingresar']==1){?> checked  <? } ?> />
                  </label></td>
                  <td>Ingresar</td>
                </tr>
              </table></td>
              <td class="titulos_eje_territorial"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="modificar" type="checkbox" id="modificar" value="1" <? if ($row_sis['modificar']==1){?> checked  <? } ?>  />
                  </label></td>
                  <td>Modificar</td>
                </tr>
              </table></td>
              <td class="titulos_eje_territorial"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="eliminar" type="checkbox" id="eliminar" value="1" <? if ($row_sis['eliminar']==1){?> checked  <? } ?>/>
                  </label></td>
                  <td>Eliminar</td>
                </tr>
              </table></td>
              <td class="titulos_eje_territorial"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="visualizar" type="checkbox" id="visualizar" value="1" <? if ($row_sis['visualizar']==1){?> checked  <? } ?>/>
                  </label></td>
                  <td>Visualizar</td>
                </tr>
              </table></td>
              <td class="titulos_eje_territorial"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label>
                    <input name="todas" type="checkbox" id="todas" value="1" onclick="seleccionar_todo();"/>
                  </label></td>
                  <td>Todas</td>
                </tr>
              </table></td>
			  <td class="titulos_eje_territorial"><table border="0" align="center" cellpadding="0" cellspacing="2">
                <tr>
                  <td><label><a href="javascript:deseleccionar_todo()">Desmarcar</a> 
                  </label></td>
                </tr>
              </table></td>
				</tr>
			
			<tr>
              <td class="fuente_formulario" colspan="7"><div align="center">
                <input type="button" name="SubmitAs" id="SubmitAs" value="Asignar Permisos" onclick="a_permisos(this.form);" />
                <input name="a_permiso" type="hidden" id="a_permiso" />
                <input name="id_sub" type="hidden" id="id_sub" value="<? echo $id_sub; ?>" />
              </div></td>
            </tr>
			<? } ?>
          </table>					  </td>
                      <td width="10" height="10" rowspan="2" background="imagenes/vert.gif"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td valign="top" bgcolor="#FFFFFF" class="stylos"><table width="100%" border="0" align="center" cellspacing="15">
                        <tr>
                          <th scope="col"><table width="664" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                            <tr>
                              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                                  <tr>
                                    <td width="30" bgcolor="#EFEFEF" class="titulos_eje_territorial"><div align="center">N&ordm;</div></td>
                                    <td width="150" bgcolor="#EFEFEF" class="titulos_eje_territorial"><div align="center">Sistema</div></td>
                                    <td width="80" bgcolor="#EFEFEF" class="titulos_eje_territorial"><div align="center">Ingresar</div></td>
                                    <td width="80" bgcolor="#EFEFEF" class="titulos_eje_territorial"><div align="center">Modificar</div></td>
                                    <td width="80" bgcolor="#EFEFEF" class="titulos_eje_territorial"><div align="center">Eliminar</div></td>
                                    <td width="80" bgcolor="#EFEFEF" class="titulos_eje_territorial"><div align="center">Visualizar</div></td>
              <? if($editar==1){ ?><td width="80" bgcolor="#EFEFEF" class="titulos_eje_territorial"><div align="center">Acci&oacute;n</div></td><? } ?>
                                  </tr>
                                  <tr>
                                    <?
				   	$sql_sis = "select * from permiso where id_usuario='".$id."' AND id_subsistema=0";
					$result = mysql_query($sql_sis);
					$i=1;
					while($row_sis=mysql_fetch_array($result)){				
				  	
					$sistem = $row_sis['id_sistema'];
					$sql_nombre = "select * from sistema where id_sistema='".$sistem."'";
					$resul_nombre = mysql_query($sql_nombre);
					$row_nom =mysql_fetch_array($resul_nombre);
				  ?>
                                    <td class="fuente_formulario"><div align="center" class="titulos_general"><? echo $i; ?></div></td>
                                    <td class="titulos_general" align="center"><div align="left"><? echo $row_nom['nombre_sistema'] ?></div></td>
                                    <td><div align="center">
                                        <? if ($row_sis['ingresar']==1){ ?>
                                        <img src="imagenes/icono_select.jpg" width="20" height="21" /></div>
                                        <? } else { ?>
                                        <img src="imagenes/icono_no_select.jpg" width="20" height="21" />
                                        <? }?></td>
                                    <td><div align="center">
                                        <? if ($row_sis['modificar']==1){ ?>
                                        <img src="imagenes/icono_select.jpg" width="20" height="21" /></div>
                                        <? }  else { ?>
                                        <img src="imagenes/icono_no_select.jpg" width="20" height="21" />
                                        <? }?></td>
                                    <td><div align="center">
                                        <? if ($row_sis['eliminar']==1){ ?>
                                        <img src="imagenes/icono_select.jpg" width="20" height="21" /></div>
                                        <? }  else { ?>
                                        <img src="imagenes/icono_no_select.jpg" width="20" height="21" />
                                        <? }?></td>
                                    <td><div align="center">
                                        <? if ($row_sis['visualizar']==1){ ?>
                                        <img src="imagenes/icono_select.jpg" width="20" height="21" /></div>
                                        <? }   else { ?>
                                        <img src="imagenes/icono_no_select.jpg" width="20" height="21" />
                                        <? }?></td>
                     <? if($editar==1){ ?><td><div align="center"><a href="administrador.php?id=<? echo $row_sis['id_usuario']; ?>&amp;tipo=Editar&amp;mostrar_ingreso=1&amp;seleccion=<? echo $row_sis['id_sistema']; ?>&amp;opR=1&amp;id_m=<? echo $id_m; ?>&id_sub=<? echo $row_sis['id_subsistema']; ?>"><img src="imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td><?  } ?>
					 			<?
								
					$sql_sis2 = "select * from permiso where id_usuario='".$id."'"; 
					$sql_sis2.=" AND id_sistema='".$row_sis['id_sistema']."' AND id_subsistema<>0" ;
					$result2 = mysql_query($sql_sis2);
					$p=1;
					while($row_sis2=mysql_fetch_array($result2)){	
					$SQL="SELECT * FROM subsistemas where id_subsistema='".$row_sis2['id_subsistema']."'";
					$RESULTADO=mysql_query($SQL);
					$rows_n=mysql_fetch_array($RESULTADO);

							 ?>
								</tr><tr>   <td class="fuente_formulario"><div align="center" class="titulos_general"></div></td>
                                    <td class="titulos_general" align="center"><div align="left" class="textos_pie_pagina Estilo12"><? echo $i.".".$p; ?> <? echo $rows_n['nombre_subsistema']; ?></div></td>
                                    <td><div align="center">
                                        <? if ($row_sis2['ingresar']==1){ ?>
                                        <img src="imagenes/icono_select.jpg" width="20" height="21" /></div>
                                        <? } else { ?>
                                        <img src="imagenes/icono_no_select.jpg" width="20" height="21" />
                                        <? }?></td>
                                    <td><div align="center">
                                        <? if ($row_sis2['modificar']==1){ ?>
                                        <img src="imagenes/icono_select.jpg" width="20" height="21" /></div>
                                        <? }  else { ?>
                                        <img src="imagenes/icono_no_select.jpg" width="20" height="21" />
                                        <? }?></td>
                                    <td><div align="center">
                                        <? if ($row_sis2['eliminar']==1){ ?>
                                        <img src="imagenes/icono_select.jpg" width="20" height="21" /></div>
                                        <? }  else { ?>
                                        <img src="imagenes/icono_no_select.jpg" width="20" height="21" />
                                        <? }?></td>
                                    <td><div align="center">
                                        <? if ($row_sis2['visualizar']==1){ ?>
                                        <img src="imagenes/icono_select.jpg" width="20" height="21" /></div>
                                        <? }   else { ?>
                                        <img src="imagenes/icono_no_select.jpg" width="20" height="21" />
                                        <? } ?></td>
                     <? if($editar==1){ ?><td><div align="center"><a href="administrador.php?id=<? echo $row_sis['id_usuario']; ?>&amp;tipo=Editar&amp;mostrar_ingreso=1&amp;seleccion=<? echo $row_sis2['id_sistema']; ?>&amp;opR=1&amp;id_m=<? echo $id_m; ?>&amp;id_sub=<? echo $row_sis2['id_subsistema']; ?>"><img src="imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td><? } ?>
					 
					<?
					$p++;
					}
					$i++; ?>
                                  </tr>
                                  <? } ?>
                              </table></td>
                            </tr>
                          </table></th>
                        </tr>
                      </table>
                      </td>
                    </tr>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10" /></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                      <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10" /></td>
                    </tr>
                  </tbody>
                </table>
				<? } ?>
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
