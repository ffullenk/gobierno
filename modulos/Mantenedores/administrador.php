<? include ("../funciones/conexion_comunicaciones.php"); ?>
<? global $usernameadmin,$idtipo,$idusuario,$sqlRubro,$result2,$row,$cargo,$errorusuario,$x_id,$sw;?>
<? 
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
?>

<html>
<link href="../stilos.css" rel="stylesheet" type="text/css">
<link href="../format/Estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {color: #CC0000}
-->
</style>
<head>
	<title>Aplicación segura</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<link href="file:///D|/jorge/incev/stylos/stylos.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#CCCCCC" topmargin="0">
<table width="751" border="2" align="center" cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#BFBFBF">
  <tr> 
    <td width="747" height="200" valign="top" bgcolor="#FFFFFF"> 
      <div align="center">
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td><div align="center"><span class="Parrafos Estilo1"><strong><font size="2" face="Arial, Helvetica, sans-serif">MODULOS 
                DE CONTENIDOS<br>
            </font></strong></span></div></td>
          </tr>
        </table>
        
      </div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="100%" height="21" align="center" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr> 
                <td width="50%"><div align="center"><img src="imagenes/logo_menu.jpg" width="114" height="65"></div></td>
                <td><table width="100%" border=0 align="center" cellpadding=0 cellspacing=0>
                    <tbody>
                      <tr> 
                        <td width=10 colspan=2 rowspan=2><img height=10 
                  src="imagenes/esquinas_tabla_sup_izq.gif" width=10></td>
                        <td width=180 bgcolor=#990000><img height=1 
                  src="portada_archivos/p.gif" width=1></td>
                        <td colspan=2 rowspan=2><img height=10 
                  src="imagenes/esquinas_tabla_sup_der.gif" 
              width=10></td>
                      </tr>
                      <tr> 
                        <td height=9><img height=9 src="portada_archivos/p.gif" 
                  width=1></td>
                      </tr>
                      <tr> 
                        <td width=1 bgcolor=#990000><img height=1 
                  src="portada_archivos/p.gif" width=1></td>
                        <td width=9><img height=1 src="portada_archivos/p.gif" 
                width=1></td>
                        <td valign=top width="100%"> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
                            <tr> 
                              <td><div align="center"><span class="Parrafos"><strong><font size="2" face="Arial, Helvetica, sans-serif">Usuario 
                                  Activo: <? echo $_SESSION['usernameadmin']; ?></font></strong></span><strong><span class="titulosmenu"><br>
                                  </span></strong></div></td>
                            </tr>
                          </table></td>
                        <td width=9><img height=1 src="../imagenes/transparencia.gif" 
                width=1></td>
                        <td width=1 bgcolor=#990000><img height=1 
                  src="portada_archivos/p.gif" width=1></td>
                      </tr>
                      <tr> 
                        <td width=10 colspan=2 rowspan=2><img height=10 
                  src="imagenes/esquinas_tabla_inf_izq.gif" width=10></td>
                        <td height=9><img height=9 src="portada_archivos/p.gif" 
                  width=1></td>
                        <td colspan=2 rowspan=2><img height=10 
                  src="imagenes/esquinas_tabla_inf_der.gif" 
              width=10></td>
                      </tr>
                      <tr> 
                        <td width=180 bgcolor=#990000><img height=1 
                  src="portada_archivos/p.gif" 
            width=1></td>
                      </tr>
                    </tbody>
                  </table></td>
              </tr>
            </table> 
            <div align="right"></div>
            <div align="center"><font color="#CC9966" size="3" face="Arial, Helvetica, sans-serif"><strong> 
              </strong></font></div>
            
            
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tr>
          <td valign="top">
            <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td width="33%" valign="middle"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                      <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                    </tr>
                    <tr>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                      <td valign="top" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><div align="center"><a href="Mantenedores/Videos/frm_video.php"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Administrador<br>
                              de Videos </strong></font></a></div></td>
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
                <td width="33%" valign="middle"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                      <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                    </tr>
                    <tr>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                      <td valign="top" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><div align="center"><a href="cambio_clave.php"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Cambio<br>
                              de Contrase&ntilde;a</strong></font></a></div></td>
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
                <td width="33%" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                      <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                      <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                    </tr>
                    <tr>
                      <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                      <td valign="top" class="stylos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><div align="center"><a href="usuarios.php"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong>Administrar<br>
                              de Usuarios </strong></font></a></div></td>
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
          <td><div align="center"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Gobierno Regional<br>
Todos Los Derechos Reservados 2009 </font></div></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
