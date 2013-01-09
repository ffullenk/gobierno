<?


include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id,$t_fina,$ingr;

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
   $id="";
   
}

if($ingr=='')
{
	$ingr=0;
	
}
if ($id<>'')
	{
	switch($ingr)
	{
	case  1:
	$sql1="SELECT * FROM etapa where id_etapa='".$id."'";
    $result1=mysql_query($sql1);
	$row=mysql_fetch_array($result1);
	$tabla='etapa';
	$campo='etapa';
	break;
	case 2:
	$sql2="SELECT * FROM `financiamiento` WHERE `id_financiamiento`='".$id."'";
	$result2=mysql_query($sql2);
	$row=mysql_fetch_array($result2);
	$tabla='financiamiento';
	$campo='financiamiento';
	break;	
	case 3:
	$sql3="SELECT * FROM `tipo` WHERE `id_tipo`='".$id."'";
	$result3=mysql_query($sql3);
	$row=mysql_fetch_array($result3);
	$tabla='tipo';
 	$campo='tipo';
	break;
	case 4:
	$sql4="SELECT * FROM `sector` WHERE `id_sector`='".$id."'";
	$result4=mysql_query($sql4);
	$row=mysql_fetch_array($result4);
	$tabla='sector';
	$campo='sector';
	break;
	case 5:
	$sql5="SELECT * FROM `unidad_tecnica` WHERE `id_unidad`='".$id."'";
	$result5=mysql_query($sql5);
	$row=mysql_fetch_array($result5);
	$tabla='unidad_tecnica';
	$campo='unidad';
	break;
	}
	} 
if($id=='')
{
switch($ingr){
	case 1:
	$tabla='etapa';
	$campo='etapa';
	break;
	case 2:
	$tabla='financiamiento';
	$campo='financiamiento';
	break;
	case 3:
	$tabla='tipo';
 	$campo='tipo';
	break;
	case 4:
	$tabla='sector';
	$campo='sector';	 
	break;
	case 5:
	$tabla='unidad_tecnica';
	$campo='unidad';
	break;
 }
		
}
	$nom_tabla=str_replace("_"," ",$tabla); 
	
include ("../../../funciones/bitacora.php");
include("../../../funciones/restricciones.php");

	
modulos($id_m,$idusername,$id_sub);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aplicacion Segura</title>
<link href="CSS/estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(imagenes/fondo.jpg);
}
.Estilo1 {font-size: 12px; font-weight: bold; color: #DA261E;}
.Estilo5 {
	color: #666666;
	font-size: 20px;
}
-->
</style>
<script language="javascript" type="text/javascript">
var num1 = <? echo $id_m; ?>;
var num2 = <? echo $id_sub; ?>;

function validacion_blancos(valor0,control,valor1,valor2)
{
	var sel = document.getElementById(valor0);
	var mensaje = "<? echo ucwords($nom_tabla); ?>";
	if(document.getElementById(control).value=='')
	{
	alert("Debe Ingresar el nombre de "+mensaje);
	return;
	}
	if(sel.options[sel.selectedIndex].value==0)
	{
	 alert("Debe Seleccionar el Estado");
	 return;
	 }
	 else 
	 {

	 var valorF = control+2;
	 document.getElementById(valorF).value = <? echo $ingr; ?>;

	 form1.action="gr_mantenedor_bp.php?&id_m="+valor1+"&id_sub="+valor2;
	 form1.submit(); 
	}
}
function envia(forma,valor1,valor2)
{
	if(document.getElementById('nom').value=='')
	{
	alert("Debe Ingresar el nombre de  <? echo ucwords($nom_tabla); ?>");
	return;
	}
	else
	{	
	 document.getElementById('ac_cambios').value=<? echo $ingr; ?>;	
     form1.action="gr_mantenedor_bp.php?&id_m="+valor1+"&id_sub="+valor2;
	 forma.submit();
	 }
}
function nueva(forma,valor1,valor2)
{
	forma.action="frm_mantenedor_bp2.php?ingr=<? echo $ingr; ?>&id_m="+valor1+"&id_sub="+valor2;
	forma.submit();
}


function cancelar(forma,valor1,valor2)
{
	forma.action="frm_mantenedor_bp2.php?ingr=0&id_m="+valor1+"&id_sub="+valor2;
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
        <table width="780" border="0" align="center" cellpadding="0" cellspacing="2">
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
                      <td><div align="center" class="titulos_noticias"><font size="2" face="Arial, Helvetica, sans-serif">MANTENEDORES BANCO PROYECTO </font></div></td>
                    </tr>
					<? if($ingr==0)
					{ ?>
					<tr>
					<td><div align="center">
					  <table width="100%" align="center" cellspacing="7" bgcolor="#EFEFEF">
                        <tr>
                          <th width="20%" valign="middle" bgcolor="#FFFFFF" class="textos_noticias" scope="col"><a href="frm_mantenedor_bp2.php?ingr=1&amp;id_m=<? echo $id_m;?>&amp;id_sub=<? echo $id_sub; ?>" class="textos_general">Mantenedor<br>
                            Etapas </a></th>
						  <th width="20%" valign="middle" bgcolor="#FFFFFF" class="textos_noticias" scope="col"><a href="frm_mantenedor_bp2.php?ingr=2&amp;id_m=<? echo $id_m;?>&amp;id_sub=<? echo $id_sub; ?>" class="textos_general">Mantenedor Financiamiento</a> </th> 
                          <th width="20%" valign="middle" bgcolor="#FFFFFF" scope="col"><p class="textos_noticias"><a href="frm_mantenedor_bp2.php?ingr=3&amp;id_m=<? echo $id_m;?>&amp;id_sub=<? echo $id_sub; ?>" class="textos_general">Mantenedor Tipo de Proyectos</a></p>                            </th> <th width="20%" bgcolor="#FFFFFF" class="textos_noticias" scope="col"><a href="frm_mantenedor_bp2.php?ingr=4&amp;id_m=<? echo $id_m;?>&amp;id_sub=<? echo $id_sub; ?>" class="textos_general">Mantenedor Sector de los Proyectos </a></th>
						   <th width="20%" bgcolor="#FFFFFF" class="textos_noticias" scope="col"><a href="frm_mantenedor_bp2.php?ingr=5&amp;id_m=<? echo $id_m;?>&amp;id_sub=<? echo $id_sub; ?>" class="textos_noticias">Mantenedor Unidad T&eacute;cnica  Proyectos </a></th>
                        </tr>
                      </table>
					</div>					</td>
					</tr>
					<? } else { ?>
	                <tr>
					 <td valign="top">
                        <div align="center">
                          <table width="75%" align="center" cellspacing="3" bordercolor="#EFEFEF" bgcolor="#EFEFEF">
                            <tr>
                              <th colspan="2" scope="col"><div align="center" class="textos_noticias">Mantenedor <?
								echo ucwords($nom_tabla);
									 ?> </div></th>
                              </tr>
                            <tr>
                              <td class="textos_noticias">Nombre <? echo ucwords($nom_tabla); ?>: </td>
                                <td><div align="left">
                                  <input name="nom" type="text" id="nom" value="<? echo ucwords($row['nom_'.$campo]); ?>" size="50" />
                                </div></td>
                              </tr>
                            <tr bordercolor="#EFEFEF" bgcolor="#EFEFEF">
                              <td class="textos_noticias">Estado: </td>
                              <td bgcolor="#EFEFEF"><label>
                                <div align="left">
                                  <select name="estado" id="estado">
                                    <option value="0" selected>..:: Seleccione ::.</option>
                                    <option value="1"<? if($row['estado']==1){ ?> selected<? } ?>>Activado</option>
                                    <option value="2"<? if($row['estado']==2){ ?> selected<? } ?>>Desactivado</option>
                                  </select>
                                </div>
                              </label></td>
                            </tr>
                            <tr>
                              <td height="38" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><div align="center">
                                <table width="75%" align="center" cellspacing="0">
                                      <tr>
                                        <th bgcolor="#FFFFFF" scope="col"><label>
                                          <div align="center">
                                            <? if ($tipo=="Nueva") {
											if($row_permiso['ingresar']==1){
											 ?>
                                          <input name="Submit0" type="button" id="Submit0" onclick="javascript:validacion_blancos('estado','nom',num1,num2);" value="Agregar" />
											<? } ?><? } else {
											 if($editar==1){
											 ?>
										<input name="Submit03" type="button" id="Submit03" onclick="javascript:envia(this.form,num1,num2);" value="Aceptar Cambios" />
											<? } ?>
                                            <input name="Submit04" type="button" id="Submit04" onclick="javascript:nueva(this.form,num1,num2)" value="Nuevo Ingreso" />
                                            <? } ?>
                                            <input name="id_cambio" type="hidden" id="id_cambio" value="<? echo $row['id_'.$campo]; ?>" />
                                            <input name="nom2" type="hidden" id="nom2" />
                                            <input name="ac_cambios" type="hidden" id="ac_cambios" />
                                            <input name="Submit02" type="button" id="Submit02" onclick="javascript:cancelar(this.form,num1,num2)" value="Volver"  />
                                          </div>
                                        </label></th>
                                      </tr>
                                  </table>
                              </div></td>
                              </tr>
                          </table>
                        </div></td></tr>
						<? } 
						?>
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
	<? if($ingr<>0){ ?>
      <input name="id_m" type="hidden" id="id_m" value="<? echo $id_m; ?>" />
      <input name="id_sub" type="hidden" id="id_sub" value="<? echo $id_sub; ?>" />
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
                                <th scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><div align="center" class="titulos_eje_economico">Mantenedor de 
									<?
									$nom_tabla=str_replace("_"," ",$tabla); 
									echo ucwords($nom_tabla);
									 ?></div></td>
                                  </tr>
                                  <tr>
                                    <th scope="col"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#D6D6D6">
                                        <tr>
                                          <td><table width="60%" border="0" align="center" cellpadding="0" cellspacing="5">
                                              <tr>
                                                <td width="48%" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Nombre</div></td>
                                                <td width="18%" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Estado</div></td>
                                                <td width="34%" bgcolor="#EFEFEF" class="titulos_general"><div align="center">Acci&oacute;n</div></td>
                                              </tr>
                                              <?

					$sqlE="SELECT * FROM ".$tabla."";
					$resultE=mysql_query($sqlE);
					while($row_vid=mysql_fetch_array($resultE)){				
				  
				  ?>
                                              <tr>
                                                <td class="titulos_general">
                                                  <div align="left">
                                                    <? 
												 
												echo  ucwords($row_vid['nom_'.$campo]); ?> 
                                                    </div></td><td>
												   <div align="center" class="texto_menu_eje_social">
                                                    <?  if($row_vid['estado']==1){?>
                                                 
                                                  
                                                      Activo
                                                        <? }else{ ?>
                                                        Inactivo 
                                                  </div>
                                                  <div align="center">
                                                      <?  } ?>
                                                  </div></td>
                                                <td><div align="center"><a href="frm_mantenedor_bp2.php?id=<? echo $row_vid['id_'.$campo]; ?>&amp;tipo=Editar&amp;ingr=<? echo $ingr; ?>&amp;id_m=<? echo $id_m;?>&amp;id_sub=<? echo $id_sub; ?>"><img src="../../imagenes/icono_editar.jpg" alt="editar" width="21" height="20" border="0" /></a></div></td>
                                              </tr>
                                              <? } ?>
                                          </table></td>
                                        </tr>
                                    </table></th>
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
	  <? } ?>
  </tr>
</table>
</form>
</body>
</html>
