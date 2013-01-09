<? global $errorusuario; ?>
<? while (list ($key, $val) = each ($_REQUEST))
 {
  $$key = $val;
 } 
 
session_start();
 
if (isset($_SESSION['usernameadmin']))
{
 	 session_destroy();
 } 
 ?>
<html>
<head>
<title>Administrador de Contenidos - GORE COQUIMBO - Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../stilos.css" rel="stylesheet" type="text/css">
<link href="../format/Estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-image: url(../imagenes/fondo.jpg);
}
.Estilo1 {font-size: 18px}
-->
</style></head>

<body>
<table width="750" border="2" align="center" cellpadding="2" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#CCCCCC">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
          <td height="100" colspan="2" valign="middle"><div align="center"><font color="#999999" face="Arial, Helvetica, sans-serif"><strong><font color="#666666"><span class="Estilo1">Administrador de Contenidos<br>
              Portal de Comunicaciones</span></font></strong></font><font color="#999999" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666"><br>
              <br>
              </font></strong></font></div></td>
        </tr>
      <tr>
        <td valign="middle"><div align="center"><img src="../imagenes/logo.jpg" width="164" height="158"></div></td>
        <td valign="middle">
		<form action="control.php" method="POST">
            <table border="0" align="center" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td height="10" width="10"><img src="imagenes/g1.gif" width="10" height="10"></td>
                  <td background="imagenes/hori.gif" valign="top"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                  <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                </tr>
                <tr>
                  <td background="imagenes/vert.gif" height="10" width="10"><img src="imagenes/blanco_002.gif" width="10" height="10"></td>
                  <td valign="top" class="stylos"><table border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                              <tr> 
                                <td height="25" class="parrafomay"><div align="right"><img src="../imagenes/ico_usuario_login.png" width="18" height="18"></div></td>
                                <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#666666">&nbsp;Usuario:</font> 
                                    </font></div></td>
                                <td><font size="2" face="Arial, Helvetica, sans-serif">
                                  <input name="usuario" type="Text" class="Parrafos" id="usuario" size="20" maxlength="50">
                                  </font></td>
                              </tr>
                              <tr> 
                                <td height="25" class="parrafomay"><div align="right"><img src="../imagenes/ico_clave_login.png" width="18" height="18"></div></td>
                                <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#666666">&nbsp;Contrase&ntilde;a:</font> 
                                    </font></div></td>
                                <td><font size="2" face="Arial, Helvetica, sans-serif">
                                  <input name="contrasena" type="password" class="Parrafos" id="contrasena3" size="20" maxlength="50">
                                  </font></td>
                              </tr>
                            </table></td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF"><div align="center">
                            <input name="Submit2" type="Submit" class="parrafomay" value="ENTRAR">
                            <br>
                            <? if ($errorusuario=="no")
						     {
							   ?>
                            <span class="parrafomay"><font color="#990000" size="2" face="Arial, Helvetica, sans-serif"><strong>Usuario 
                              NO Registrado</strong></font></span>
                            <?
							 }
						  ?>
                        </div></td>
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
        </form>		</td>
      </tr>
      <tr>
        <td height="100" colspan="2" valign="bottom"><div class="Parrafos">
              <div align="center"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><hr>www.gorecoquimbo.cl 
                - Portal de Comunicaciones<br>
                Todos Los Derechos Reservados Gobierno Regional de Coquimbo <br>
              Departamento de Prensa               </font></div>
        </div></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
