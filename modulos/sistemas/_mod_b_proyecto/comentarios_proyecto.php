<? include ("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$idtipo,$idusuario,$sqlRubro,$result2,$row,$cargo,$errorusuario,$x_id,$sw,$id, $tipo,$frm_mes, $frm_ano,$mes_hoy, $ano_hoy ; 
global $buscar;
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

if ($id<>'')
{
  $sql="select * from comentarios_proyecto where id_proyecto='".$id."'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
}
include ("../../../funciones/bitacora.php");
include("../../../funciones/restricciones.php");	
modulos($id_m,$idusername,$id_sub);
?>
<html>
<link href="formato/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../../css/estilo.css">
<style type="text/css">
<!--
body {
	background-image: url(imagenes/fondo.jpg);
}
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
<head>
	<title>Aplicación segura</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="../comunicaciones/formato/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>

</head>
<body bgcolor="#CCCCCC">
<table width="751" border="2" cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#BFBFBF">
  <tr> 
    <td width="747" height="200" valign="top" bgcolor="#FFFFFF"> 
      <div align="center"> 
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr> 
            <td><div align="center"><span class="Parrafos"><font color="#990000"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">MODULO 
                ADMINISTRATIVO DE CONTENIDO</font></strong></font></span></div></td>
          </tr>
        </table>
      </div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="100%" height="21" align="center" bgcolor="#FFFFFF"> 
            <div align="right"><? include("../../include_superior_sesion.php");?></div>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tr> 
          <td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td valign="top">
				  <table border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr> 
                        <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                        <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                        <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                      </tr>
                      <tr> 
                        <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                        <td valign="top" class="stylos"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                            <tr> 
                              <td><div align="center"><font color="#CC3300" size="2" face="Arial, Helvetica, sans-serif"><strong>Administrador 
                                  de Comentarios </strong></font></div></td>
                            </tr>
                            <tr> 
                              <td valign="top">
								<form name="form1" method="post" action="gr_comentario_proyecto.php" enctype="multipart/form-data">
                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                    <tr> 
                                      <td class="txt"> <div class="parrafomay"> 
                                          <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Usuario 
                                            :</font></div>
                                        </div></td>
                                      <td colspan="4" class="field"><font size="2" face="Arial, Helvetica, sans-serif"> 
                                        <input name='frm_titulo' type=text id="frm_titulo" value="<? echo $row['usuario']; ?>" size="50" disabled="disabled">
                                        <input name="id_usuario" type="hidden" id="id_usuario" value="<? echo $row_usuario['id_usuario']; ?>">
                                      </font></td>
                                    </tr>
                                    <tr> 
                                      <td class="txt"> <div class="parrafomay"> 
                                          <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Fecha 
                                            :</font></div>
                                        </div></td>
                                      <td colspan="4" class="field"><font size="2" face="Arial, Helvetica, sans-serif"> 
                                        <input name='frm_fecha' type=text id="frm_fecha" value="<? if (($tipo=="") or ($tipo=="Nueva")){ echo $fecha; }else { echo fecha_formato_espanol($row['fecha']);}?>" size="12" disabled="disabled">
                                        </font></td>
                                    </tr>
                                    <tr> 
                                      <td class="txt"> <div class="parrafomay"> 
                                          <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Comentario:</font></div>
                                        </div></td>
                                      <td colspan="4" class="field"><font size="2" face="Arial, Helvetica, sans-serif"> 
                                        <textarea name="frm_descripcion" cols="60" rows="8" id="frm_descripcion"><? echo $row['comentario']; ?></textarea>
                                        </font></td>
                                    </tr>
                                    <tr> 
                                      <td class="txt"> <div class="parrafomay"> 
                                          <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Estado&nbsp;</font></div>
                                        </div></td>
                                      <td colspan="4" valign="middle" class="field"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> 
                                          <select name="frm_estado" class="Parrafos" id="frm_estado">
                                            <? if ($row['estado'] == 1)
							{
									echo "<option value='1' selected>Abierto</option>";
									echo "<option value='0'>Cerrado</option>";
						 }else{
									echo "<option value='1' >Abierto</option>";
									echo "<option value='0'selected>Cerrado</option>";
							 }?>
                                          </select>
                                          </font></div>                                        </td>
                                    </tr>
                                  </table>
                                  <table border="0" align="center" cellpadding="0" cellspacing="5">
                                    <tr> 
                                      <td>
									  <? if($editar==1){?><input type="submit" name="Submit2" value="Aceptar Cambios"> 
									  <? } 
									   if($elimina==1){
									  ?>
                                        <input type="submit" name="Submit3" value="Eliminar">
										<? } ?>
                                        <input type="submit" name="Submit4" value="Cancelar"> 
                                      </td>
                                    </tr>
                                  </table>
                                  <input name="id_not" type="hidden" id="id_not2" value="<? echo $row['id_comentario']; ?>">
                                  <input name="tipo_noticia" type="hidden" id="tipo_noticia2" value="<? echo $tipo ?>">
                                  <input name="tipo_op" type="hidden" id="tipo_op" value="<? echo $tipo_op; ?>">
                                  <input name="id_m" type="hidden" id="id_m" value="<? echo $id_m; ?>">
								  <input name="id_sub" type="hidden" id="id_sub" value="<? echo $id_sub;?>">
								</form></td>
                            </tr>
                          </table></td>
                        <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                      </tr>
                      <tr> 
                        <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10"></td>
                        <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                        <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10"></td>
                      </tr>
                  </table> 
                </td>
              </tr>
              <tr>
                <td> <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td> <div align="center"><strong></strong></div>
                        <DIV align=right></DIV></td>
                      <td width="80"><img src="imagenes/btn_resultados.png" width="80" height="18"></td>
                    </tr>
                  </table>
				  <?
		 				    
							$_pagi_sql= "select * from comentario_proyecto order by fecha desc";
										
							$result_todas=mysql_query($_pagi_sql);
							$registros=mysql_num_rows($result_todas);
							
							$_pagi_cuantos = 10; 
								  
							include("../../../funciones/paginator.inc.php");
							 
				  ?>
				  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr> 
                        <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                        <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                        <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                      </tr>
                      <tr> 
                        <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                        <td width="100%" valign="top" class="stylos"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                              <td><div align="center"><strong><font color="#990000" size="2" face="Arial, Helvetica, sans-serif"> 
                                  </font></strong><font color="#990000" size="2" face="Arial, Helvetica, sans-serif"><? echo $registros;?> 
                                  Registro(s) Encontrado(s)</font></div></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="5" cellpadding="0">
                            <tr> 
                              <td> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"></font>&nbsp;&nbsp;</div></td>
                              <td width="40%" bgcolor="#CCCCCC"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Comentario </strong></font></div></td>
                              <td bgcolor="#CCCCCC"> <div align="center"><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Noticia</font></strong></div></td>
                              <td bgcolor="#CCCCCC"> <div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Fecha</strong></font></div></td>
                              <td bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Estado</strong></font></div></td>
                              
                              <td bgcolor="#CCCCCC"><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Accion</strong></font></div></td>
                            </tr>
                            <? 
							
							while($row_todas=mysql_fetch_array($_pagi_result))
						{ ?>
                            <tr> 
                              <td width="10" bgcolor="#990000"> <div align="left"><font size="1" face="Arial, Helvetica, sans-serif"><strong> 
                                  </strong></font></div></td>
                              <td><div align="justify"><font size="1" face="Arial, Helvetica, sans-serif"><strong><? echo $row_todas['comentario'] ?></strong></font></div></td>
                              <td><div align="center"><a href="foto_aplauso.php?id=<? echo $row_todas['id_foto_aplauso']; ?>&tipo=Editar"><font size="2" face="Arial, Helvetica, sans-serif"></font></a><font size="1" face="Arial, Helvetica, sans-serif"><strong>
							  
							  <? 
							 
							      $sql_not="select * from proyecto where id='".$row_todas['id_proyecto']."'";
							 
							  $result_not=mysql_query($sql_not);
  							  $row_not=mysql_fetch_array($result_not);
							  echo $row_not['nombre']; ?>
							  
							  </strong></font></div></td>
                              <td><div align="center"><a href="foto_aplauso.php?id=<? echo $row_todas['id_foto_aplauso']; ?>&tipo=Editar"><font color="#CC3300" size="2" face="Arial, Helvetica, sans-serif"></font></a><font size="1" face="Arial, Helvetica, sans-serif"><strong><? echo fecha_formato_espanol($row_todas['fecha']); ?></strong></font></div></td>
                              <td><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong>
                              <? if ($row_todas['estado']==1) { echo "<font color=#990000>Abierto</font>";}else { echo "<font color=#333333>Cerrado</font>";} ?>
                              </strong></font></div></td>
                             
                              <td><a href="comentario_proyecto.php?id=<? echo $row_todas['id_comentario']; ?>&tipo=Editar&id_m=<? echo $id_m;?>"><font color="#CC3300" size="2" face="Arial, Helvetica, sans-serif"><strong>Editar</strong></font></a></td>
                            </tr>
                            <? } ?>
                          </table>
                          <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F4F4F4">
                            <tr> 
                              <td class="parrafo_grande"><div align="center" class="Parrafos"><font color="#990000" size="2" face="Arial, Helvetica, sans-serif">
                                  <hr color="#990000">
                                  </font></div></td>
                            </tr>
                            <tr> 
                              <td class="parrafo_grande"><div align="center"><font color="#990000" size="2" face="Arial, Helvetica, sans-serif">Pagina&nbsp;<? echo $_pagi_navegacion; ?>&nbsp;</font></div></td>
                            </tr>
                          </table></td>
                        <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                      </tr>
                      <tr> 
                        <td height="10" width="10"><img src="imagenes/g3.gif" width="10" height="10"></td>
                        <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                        <td height="10" width="10"><img src="imagenes/g4.gif" width="10" height="10"></td>
                      </tr>
                  </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><div align="center"><font color="#000000" size="1" face="Arial, Helvetica, sans-serif">www.gorecoquimbo.cl</font></div></td>
  </tr>
</table>
    </td>
</tr> </table> 
</body>
</html>
