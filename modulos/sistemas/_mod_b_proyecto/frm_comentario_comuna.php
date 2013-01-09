<? 
include("../../../funciones/conexion_gore_banco.php");

include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id,$campo_blanco,$archivo_vid,$error_flv,$error_doc,$row,$marquesina;

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

if (($tipo=="") or ($tipo=="Nueva"))
{
   $tipo="Nueva";
   $fecha=date("d-m-Y");
}


if ($id<>''){
  $sql="select * from comuna where id_comuna='".$id."'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
}
					
$sql="SELECT * FROM comuna ORDER BY nom_comuna ASC";
$resultado=mysql_query($sql);

include("../../../funciones/bitacora.php");	
include("../../../funciones/restricciones.php");	
modulos($id_m,$idusername,$id_sub);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="formato/estilo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../../../css/calendario.js"></script>
<link rel="stylesheet" type="text/css" href="../../../css/estilo.css">
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
body {
	background-image: url(../../../imagenes/fondo.jpg);
}
.Estilo2 {font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<script language="javascript" type="text/javascript">
function enviar(forma)
{	
	document.getElementById('a_com').value=1;
    forma.action="gr_comentario_comuna.php";
	forma.submit();
}
function eliminar(forma)
{	
	document.getElementById('el_com').value=1;
    forma.action="gr_comentario_comuna.php";
	forma.submit();
}
function volver(forma)
{
	forma.action="administrador.php?id_m=<? echo $id_m;?>";
	forma.submit();
}
</script>
</head>
<body>
<form name="form1" method="post" action=""> 

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
                <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
              </tr>
              <tr>
                <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                <td valign="top" class="stylos"><div align="center">
                  <span class="titulos_noticias">ADMINISTRADOR DESCRIPCION COMUNA  </span>
                  <table width="80%" border="0" align="center" cellspacing="5" bgcolor="#EFEFEF">
                    <tr>
                      <td width="30%" bgcolor="#EFEFEF" class="textos_noticias"><div align="right">Comuna: </div></td>
                        <td width="70%" bgcolor="#EFEFEF"><div align="left">
                          <select name="comuna">
                            <? while($row_p=mysql_fetch_array($resultado)){ ?>
                            <option value="<? echo $row_p['id_comuna']; ?>"<? if($row['id_comuna']==$row_p['id_comuna']){ ?>selected<? } ?>><? echo $row_p['nom_comuna']; ?></option>
                            <? } ?>
                          </select>
                        </div></td>
                      </tr>
                    <tr>
                      <td bgcolor="#EFEFEF" class="textos_noticias"><div align="right">Descripcion: </div></td>
                        <td bgcolor="#EFEFEF"><div align="left">
                          <textarea name="desc_comuna" cols="50" rows="5" id="desc_comuna"><? echo $row['descripcion'];  ?></textarea>
                        </div></td>
                      </tr>
                  </table>
                  <table width="60%" border="0" align="center" cellspacing="5" bgcolor="#FFFFFF">
                        <tr>
                          <th height="35" scope="col">
						  <? if($ing==1 ||$editar==1){ ?>
						  <input type="button" name="Submit" value="Agregar Comentario" onclick="enviar(this.form)" />
						  <? }
						  if($elimina==1){
						   ?>
                              <input type="button" name="Submit2" value="Eliminar Comentario" onclick="eliminar(this.form);" />
							  <? } ?>
                              <input type="button" name="Submit3" value="Volver" onclick="volver(this.form)" /></th>
                        </tr>
                        </table>
                  <input name="id" type="hidden" id="id" value="<? echo $id; ?>" />
                  <input name="a_com" type="hidden" id="a_com" />
                  <input name="el_com" type="hidden" id="el_com" />
                  <input name="id_m" type="hidden" id="id_m" value="<? echo $id_m; ?>" />
                  <input name="id_sub" type="hidden" id="id_sub" value="<? echo $id_sub; ?>" />
                </div></td>
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
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                        <th scope="col">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <th scope="col"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><div align="center" class="titulos_eje_economico">
                                        <table width="100%" border="0" cellspacing="7">
                                          <tr>
                                            <th class="titulos_noticias" scope="col">Descripcion de Comunas Banco de Proyecto </th>
                                          </tr>
                                          <tr>
                                            <td><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                                              <tr>
                                                <td><table width="100%" border="0" cellspacing="5">
                                                    <tr>
                                                      <td width="6%" bgcolor="#EFEFEF" class="textos_noticias"><div align="center">N&ordm;</div></td>
                                                      <td width="25%" bgcolor="#EFEFEF" class="textos_noticias"><div align="center">Comuna</div></td>
                                                      <td width="63%" bgcolor="#EFEFEF" class="textos_noticias"><div align="center">Descripcion</div></td>
                                                      <td width="11%" bgcolor="#EFEFEF" class="textos_noticias"><div align="center">Accion</div></td>
                                                    </tr>
													<? $SQL="SELECT * FROM comuna ORDER BY nom_comuna ASC";
													 $result=mysql_query($SQL);
													 $i=1;
													 while($ROWS=mysql_fetch_array($result)){													   	
													 ?>
                                                    <tr>
                                                      <td class="texto_sub_categorias"><? echo $i; ?></td>
                                                      <td class="texto_sub_categorias"><div align="right" class="textos_noticias">
                                                         <div align="left"><? echo $ROWS['nom_comuna']; ?> </div>
                                                      <div align="center"></div></div></td>
                                                      <td class="texto_sub_categorias"><div align="right" class="textos_noticias">
                                                        <div align="left"><? echo $ROWS['descripcion']; ?></div>
                                                      </div></td>
                                                      <td><div align="center"><a href="frm_comentario_comuna.php?id=<? echo $ROWS['id_comuna']; ?>&id_m=<? echo $id_m;?>&id_sub=<? echo $id_sub;?>"><img src="../../../imagenes/icono_editar.jpg" border="0" /></a></div></td>
                                                    </tr>
													<?
													$i++;
													 } ?>
                                                </table></td>
                                              </tr>
                                            </table></td>
                                          </tr>
                                        </table>
                                        </div></td>
                                    </tr>
                                    <tr>
                                      <th scope="col">&nbsp;</th>
                                    </tr>
                                </table></th>
                              </tr>
                            </table>
                        </th>
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
