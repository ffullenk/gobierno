<?
include ("../../../bd/conecta.php");
include("../../../funciones/conexion_gore_banco.php");
include("../../../funciones/fechas.php");

global $usernameadmin,$tipo,$id, $id_tipo, $id_sis, $vacio, $existe;


global $usernameadmin,$idtipo,$idusuario,$sqlRubro,$result2,$row,$cargo,$errorusuario,$x_id,$sw,$id_m;


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
if($id_sub==''){ $id_sub=0; }

include ("../../../funciones/bitacora.php");
	
modulos($id_m,$idusername,$id_sub);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../stilos.css" rel="stylesheet" type="text/css">
<link href="../format/Estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../../css/estilo.css">
<style type="text/css">
<!--
body {
	background-image: url(imagenes/fondo.jpg);
}
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
<script language=javascript>
<!---
function enviar(forma)
{
	if(forma.opcion.selectedIndex==0)
	{
		alert('Debe Elegir Opcion');
		return;
	}
		
	if(forma.opcion.selectedIndex==1)
	{
			//	if (forma.name != "clientes")
			//		forma.action=forma.name + '02.php';
			//	else
					forma.action=forma.name + '02.php';
	}
	else
	{
		forma.action=forma.name + '01.php';
	}
	forma.submit();
}
// --->
</script>

</head>

<body topmargin="0">
<form name="form1" action="" method="post">
<table width="751" border="2"  cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#BFBFBF">
  <tr>
    <td width="747" height="200" valign="top" bgcolor="#FFFFFF"><div align="center">
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tr>
          <td><div align="center"><span class="Parrafos Estilo1"><strong><font size="2" face="Arial, Helvetica, sans-serif">MODULOS 
            DE CONTENIDOS<br />
          </font></strong></span></div></td>
        </tr>
      </table>
    </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="100%" height="21" align="center" valign="top"><div align="right"><? include("../../include_superior_sesion.php");?></div>
              <div align="center"><font color="#CC9966" size="3" face="Arial, Helvetica, sans-serif"><strong> </strong></font></div></td>
          </tr>
        </table>
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                  
                  <?  $cont=0;
				  $cuenta=0;
			  	  $modulos=3;	
				  $sql="Select * from subsistemas where estado_subsistema=1 and id_sistema='".$id_m."' ORDER BY nombre_subsistema ASC";

				  $result_sql=mysql_query($sql);
			  while($row_sistema=mysql_fetch_array($result_sql)){

$sql_per_sis="Select * from permiso where id_sistema='".$row_sistema['id_sistema']."' and id_usuario='".$_SESSION['idusername']."'";
$result_per_sis=mysql_query($sql_per_sis);
$row_per_sis=mysql_fetch_array($result_per_sis);

			  if($cont<>$modulos) {
			  if($row_per_sis['visualizar']==1) {
			    ?>
                  <td width="34%" valign="middle"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                          <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                          <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                        </tr>
                        <tr>
                          <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                          <td valign="top" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><div align="center">
                                  
                                  <a href="../../<? echo $row_sistema['url_subsistema'];  ?>?id_m=<? echo $row_sistema['id_sistema'] ?>&id_sub=<? echo $row_sistema['id_subsistema']; ?>">
                                   <font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Administrador<br />
                                    de <? echo $row_sistema['nombre_subsistema'];?></strong></font></a></div></td>
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
                  <? 
				$cuenta++;
				$cont++;
				
				}
				}
				if($cont==$modulos){
				 ?>
                </tr>
              <tr>
                  <?
				 $modulos=$modulos+3; 
				 				 
				}
				 
				} ?>
				  <? if($cuenta==0) { ?>
				  <td width="34%" valign="middle"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                          <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                          <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                        </tr>
                        <tr>
                          <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                          <td valign="top" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><div align="center" class="titulos_noticias">
                                  No Tiene Permiso <br />
                                  a los Modulos
                                  </div></td>
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
				  <? } ?>
				
				
                </tr>
				
            </table></td>
          </tr>
          <? 
		if($row_usuario['id_tipo_usuario']==3){ ?>
          <tr>
            <td colspan="3"><hr color="#CCCCCC" />
            </td>
          </tr>
          <tr>
            <td valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                  <?  
			  $cont=0;
		  	  $mant=3;  
			  $sql_ma="SELECT * FROM mantenedores";
			  $result_sqlMan=mysql_query($sql_ma);
			  
			  while($row_mantenedor=mysql_fetch_array($result_sqlMan)){
			  if($cont<>$mant){  ?>
                  <td width="34%" valign="middle"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10" /></td>
                          <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                          <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10" /></td>
                        </tr>
                        <tr>
                          <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10" /></td>
                          <td valign="top" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td><div align="center"><a href="<? echo $row_mantenedor['url_mantenedor'];  ?>?id_ma=<? echo $row_mantenedor['id_mantenedor'] ?>"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Administrador<br />
                                  de <? echo $row_mantenedor['nombre_mantenedor'];?></strong></font></a></div></td>
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
                  <? 
				$cont++;
				
				}
				if($cont==$mant){
					 ?>
                </tr>
              <tr>
                  <?
				 $mant=$mant+3; 
				 				 
				}
				 
				} ?>
                </tr>
            </table></td>
          </tr>
          <? } ?>
          <tr>
            <td><div align="center"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Gobierno Regional<br />
              Todos Los Derechos Reservados 2009 </font></div></td>
          </tr>
      </table></td>
  </tr>
</table>
</form>
</body>
</html>
