<? 
include ("../funciones/conexion_gore_banco.php");
include ("../funciones/fechas.php");

global $usernameadmin,$idtipo,$idusuario,$sqlRubro,$result2,$row,$cargo,$errorusuario,$x_id,$sw,$id, $tipo,$frm_mes, $frm_ano,$mes_hoy, $ano_hoy, $idusername;
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
if (isset($_SESSION['usernameadmin']))
{
	
}
else
{
    echo "Usuario No Autentificado!";
	exit;
} 
	
	$sql1="select * from usuario where id_usuario=".$_SESSION['idusername']."";
	$result=mysql_query($sql1);
	$row=mysql_fetch_array($result);
?>
<html>
<link href="../stilos.css" rel="stylesheet" type="text/css">
<link href="../format/Estilos.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/lightbox.css" media="screen,projection" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {font-family: Arial, Helvetica, sans-serif}
.Estilo4 {font-size: 14px}
.Estilo5 {color: #CC0000}
body { 	background-image: url(../imagenes/fondo.jpg);}
-->
</style>
<head>
	<title>Aplicación segura</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script type="text/javascript" src="../comunicaciones/formato/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="scripts/prototype.js"></script>
<script type="text/javascript" src="scripts/lightbox.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
<script language="javascript" type="text/javascript">
function enviar(forma)
{
    if(forma.frm_mes.selectedIndex==0)
	{
		alert('Debe elegir un Mes');
		return;
	}
	if(forma.frm_ano.selectedIndex==0)
	{
		alert('Debe elegir una año');
		return;
	}
	forma.buscar.value="1";
	forma.submit();
}

function validarPasswd ()
{
  var p1 = form1.contrasena.value;
  var p2 = form1.contrasena2.value;
  var espacios = true;
  var cont = 0;
  while (espacios && (cont < p1.length)) {
  
   if (p1.charAt(cont) != " ") {
    espacios = false;
   }
   cont++;
  }
   
  if (espacios) {
   alert ("La Contraseña no puede ser todo espacios en blanco");
   return false;
  }
   
  if (p1.length == 0 || p2.length == 0) {
   alert("Los campos de la Contraseña no pueden quedar vacios");
   return false;
  }
   
  if (p1 != p2) {
   alert("Las Contraseñas deben de coincidir");
   form1.contrasena.value="";
   form1.contrasena2.value="";
   form1.contrasena.focus();
   return false;
  }
 }

</script>
</head>
<body bgcolor="#CCCCCC">
<table width="751" border="2" cellpadding="0" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#BFBFBF">
  <tr> 
    <td width="747" height="200" valign="top" bgcolor="#FFFFFF"> 
      <div align="center"> 
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr> 
            <td><div align="center"><span class="Parrafos Estilo5"><strong><font size="2" face="Arial, Helvetica, sans-serif">MODULO 
                ADMINISTRATIVO DE CONTENIDO</font></strong></span></div></td>
          </tr>
        </table>
      </div>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="100%" height="21" align="center" bgcolor="#FFFFFF"> 
            <div align="right">
              <table width="100%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                  <td width="50%"><div align="center"><img src="../imagenes/logo_horizontal_gr.jpg" width="260" height="52"></div></td>
                  <td><table width="100%" border=0 align="center" cellpadding=0 cellspacing=0>
                      <tbody>
                        <tr>
                          <td width=10 colspan=2 rowspan=2><img height=10 
                  src="../imagenes/esquinas_tabla_sup_izq.gif" width=10></td>
                          <td width=180 bgcolor=#990000><img height=1 
                  src="../portada_archivos/p.gif" width=1></td>
                          <td colspan=2 rowspan=2><img height=10 
                  src="../imagenes/esquinas_tabla_sup_der.gif" 
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
                          <td valign=top width="100%"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="5">
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
                  src="../imagenes/esquinas_tabla_inf_izq.gif" width=10></td>
                          <td height=9><img height=9 src="portada_archivos/p.gif" 
                  width=1></td>
                          <td colspan=2 rowspan=2><img height=10 
                  src="../imagenes/esquinas_tabla_inf_der.gif" 
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
            </div>
           </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tr> 
          <td valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
                              <td><div align="center"><font color="#CC3300" size="2" face="Arial, Helvetica, sans-serif"><strong>Cambio de Clave </strong></font></div></td>
                            </tr>
                            <tr> 
                              <td height="168" valign="top">
								<form name="form1" method="post" action="gr_cambio_clave.php" enctype="multipart/form-data">
                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                    <tr> 
                                      <td class="txt"> <div class="parrafomay"> 
                                          <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Nombres 
                                            :</font></div>
                                        </div></td>
                                      <td class="field"><label>
                                        <input name="nombres" type="text" disabled="disabled" id="nombres" value="<? echo $row['nombre_completo']; ?>" size="60">
                                      </label></td>
                                    </tr>
                                    <tr> 
                                      <td class="txt"> <div class="parrafomay"> 
                                          <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Usuario 
                                            :</font></div>
                                        </div></td>
                                      <td class="field"><input name="usuario" type="text" disabled="disabled" id="usuario" value="<? echo $row['usuario']; ?>"></td>
                                    </tr>
                                    <tr> 
                                      <td class="txt"> <div class="parrafomay"> 
                                          <div align="right"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Contrase&ntilde;a 
                                            :</font></div>
                                        </div></td>
                                      <td class="field"><input name="contrasena" type="password" id="contrasena" value="<? echo $row['password']; ?>"></td>
                                    </tr>
							         <tr> 
                                      <td class="txt"> <div class="parrafomay Estilo1 Estilo4"> 
                                          <div align="right">Repetir Contrase&ntilde;a : </div>
                                        </div></td>
                                      <td class="field"><input name="contrasena2" type="password" id="contrasena2" value="<? echo $row['password']; ?>" onChange="validarPasswd()"></td>
                                    </tr>
                                  </table>
                                  <table border="0" align="center" cellpadding="0" cellspacing="5">
                                    <tr> 
                                      <td><input type="submit" name="Submit2" value="Aceptar Cambios">
                                        <input type="submit" name="Submit4" value="Cancelar"> 
                                      </td>
                                    </tr>
                                  </table>
                                  <input name="id_not" type="hidden" id="id_not2" value="<? echo $row['id_usuario']; ?>">
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
      </table></td>
  </tr>
  <tr> 
    <td><div align="center"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Gobierno Regional<br>
Todos Los Derechos Reservados 2009 </font></div></td>
  </tr>
</table>
    </td>
</tr> </table> 
</body>
</html>
