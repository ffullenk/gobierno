<? 
include("../../../funciones/conexion_gore_banco.php");
include ("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id,$id2,$usuario,$pass,$busq,$tpo,$mostrar_ingreso,$idusuario,$errorusuario, $idtipo,$seleccion,$hora_inicio,$fecha_inicio,$id_m,$id_sub,$frm_fecha1,$frm_fecha2;

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

$fecha1= fecha_formato_base_gore($frm_fecha1)." 00:00:00";
$fecha2= fecha_formato_base_gore($frm_fecha2)." 23:59:59";

/*
$_pagi_sql= "select * from usuario where id_usuario='".$id."'";
$result_todas=mysql_query($_pagi_sql);
$registros=mysql_num_rows($result_todas);

$_pagi_cuantos = 10; 
include("../../../funciones/paginator.inc.php");
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" language="javascript" src="../../../setup/seleccion.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aplicacion Segura</title>
<link href="../../../css/estilo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../../../funciones/calendario.js"></script>

<style type="text/css">
<!--
body {
	background-image: url(../../../imagenes/fondo.jpg);
}
.Estilo1 {font-size: 13px}
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
                            <td colspan="5"><div align="center" class="titulos_noticias"><font size="2" face="Arial, Helvetica, sans-serif">Informe, Acciones de Usuarios </font></div></td>
                          </tr>
                          <tr>
                            <td><div align="center">
                              <table width="50%" border="0" align="center" cellspacing="5" bgcolor="#EFEFEF">
                                <tr>
                                  <th width="53%" class="textos_general" scope="col"><div align="right">Nombre Usuario  : </div></th>
                                  <th width="47%" class="textos_noticias" scope="col"><? echo ucwords($row['nombre_completo']); ?></th>
                                </tr>
                                <tr>
                                  <th class="textos_general" scope="col"><div align="right">Usuario :</div></th>
                                  <th class="textos_noticias" scope="col"><? echo $row['usuario']; ?></th>
                                </tr>
                              </table>
							  </div></td>
                          </tr>
					
				
				  <tr>
						  <td height="17">
						  <hr />
						  </td>
					    </tr>
						<tr>
						<td>
						  <div align="center">
			 <? 
				$_pagi_sql= "select * from bitacora where id_usuario='".$id."'  AND  ultima_modificacion>'".$fecha1."' AND ultima_modificacion<'".$fecha2."' ORDER BY ultima_modificacion DESC";
				$result_todas=mysql_query($_pagi_sql);
				$registros=mysql_num_rows($result_todas);
				$_pagi_cuantos = 10; 
				include("../../../funciones/paginator.inc.php");
				  ?>
						    <table width="100%" border="0" cellspacing="5" bordercolor="#EFEFEF">
							<tr><td colspan="6" bgcolor="#EFEFEF"><div align="center" class="titulos_noticias">Acciones Realizadas Entre la fecha <? echo $frm_fecha1; ?> hasta  <? echo $frm_fecha2; ?> </div></td></tr>
                              <tr>
                                <th width="2%" class="textos_noticias Estilo1" scope="col">&nbsp;</th>
                                <th width="22%" bgcolor="#EFEFEF" class="textos_noticias Estilo1" scope="col">Modulo</th>
                                <th width="18%" bgcolor="#EFEFEF" class="textos_noticias Estilo1" scope="col">Submodulo</th>
                                <th width="20%" bgcolor="#EFEFEF" class="textos_noticias Estilo1" scope="col">Fecha</th>
                                <th width="16%" bgcolor="#EFEFEF" class="textos_noticias Estilo1" scope="col">Ip Usuario </th>
                                <th width="22%" bgcolor="#EFEFEF" class="textos_noticias Estilo1" scope="col">Accion</th>
                              </tr>
                              <tr>
							  <? while($rows=mysql_fetch_array($_pagi_result)){		?>
                                <td bgcolor="#EFEFEF" class="textos_noticias">&nbsp;</td>
                                <td class="textos_noticias">
								  <div align="left">
								    <? $sql="SELECT * FROM sistema where id_sistema='".$rows['id_sistema']."'";
								$result=mysql_query($sql);
								$rowst=mysql_fetch_array($result);
								if($rows['id_sistema']<>0){
								echo $rowst['nombre_sistema'];
								}
								else
								{
								echo "Modulo Principal";
								}
								?>
							        </div></td>
                                <td class="textos_noticias"><div align="left">
								<? 
								$sql2="SELECT * FROM subsistemas where id_subsistema='".$rows['id_subsistema']."'";
								$result2=mysql_query($sql2);
								$rowsu=mysql_fetch_array($result2);
								
								echo $rowsu['nombre_subsistema'];
								
								?>
								</div></td>
                                <td class="textos_noticias"><div align="center"><? echo $rows['ultima_modificacion'] ?></div></td>
                                <td class="textos_noticias"><div align="center"><? echo $rows['ip_usuario'] ?></div></td>
                                <td class="textos_noticias"><div align="left"><? echo $rows['accion_realizada']; ?></div></td>
                              </tr>
							  <? } ?>
                              <tr>
                                <td colspan="6" bgcolor="#EFEFEF"><div align="center" class="titulos_eje_economico"><? echo $_pagi_navegacion; ?></div></td>
                                </tr>
                            </table>
						    </div></td>
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
          <table width="780" border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
		
				<tr>
				<td>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				</table>				</td></tr>
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
