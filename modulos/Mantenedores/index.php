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
<title>Administrador de Contenidos - La Serena Convention Berau</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../stilos.css" rel="stylesheet" type="text/css">
<link href="../format/Estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo3 {color: #006600}
.Estilo4 {color: #009900}
-->
</style>
</head>

<body bgcolor="#CCCCCC">
<table width="750" border="2" align="center" cellpadding="2" cellspacing="10" bordercolor="#FFFFFF" bgcolor="#A2A2A2">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
          <td height="100" valign="middle"><div align="center"><font color="#999999" size="2" face="Arial, Helvetica, sans-serif"><strong>
            <br><img src="imagenes/logo2.png" width="263" height="70"><br>
			 <!--//aqui va el logo// <br>-->
			 <br>
              </strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><span class="Estilo4">Administrador de Contenidos<br>
              </span></strong></font><font color="#999999" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666"><br>
              <br>
              </font></strong></font></div></td>
      </tr>
      <tr>
        <td valign="middle"><form action="control.php" method="POST">
            <table border="0" align="center" cellpadding="0" cellspacing="0">
              <tbody>
                <tr>
                  <td height="10" width="10"><img src="/imagenes/g1.gif" width="10" height="10"></td>
                  <td background="/imagenes/hori.gif" valign="top"><img src="/imagenes/blanco_002.gif" width="10" height="10"></td>
                  <td height="10" width="10"><img src="imagenes/g2.gif" width="10" height="10"></td>
                </tr>
                <tr>
                  <td background="/imagenes/vert.gif" height="10" width="10"><img src="/imagenes/blanco_002.gif" width="10" height="10"></td>
                  <td valign="top" class="stylos"><table border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                              <tr> 
                                <td height="25"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#666666">Usuario:</font> 
                                    </font></div></td>
                                <td><font size="2" face="Arial, Helvetica, sans-serif">
                                  <input name="usuario" type="Text" class="Parrafos" id="usuario" size="20" maxlength="50">
                                  </font></td>
                              </tr>
                              <tr> 
                                <td height="25"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><font color="#666666">Contrase&ntilde;a:</font> 
                                    </font></div></td>
                                <td><font size="2" face="Arial, Helvetica, sans-serif">
                                  <input name="contrasena" type="password" class="Parrafos" id="contrasena" size="20" maxlength="50">
                                  </font></td>
                              </tr>
                            </table></td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF"><div align="center">
                            <input name="Submit" type="Submit" class="parrafomay" value="ENTRAR">
                            <br>
                            <? if ($errorusuario=="no")
						     {
							   ?>
                            <span class="parrafomay Estilo3"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Usuario 
                              NO Registrado</strong></font></span>
                            <?
							 }
						  ?>
                        </div></td>
                      </tr>
                  </table></td>
                  <td background="/imagenes/vert.gif" height="10" width="10"><img src="/imagenes/blanco_002.gif" width="10" height="10"></td>
                </tr>
                <tr>
                  <td height="10" width="10"><img src="/imagenes/g3.gif" width="10" height="10"></td>
                  <td background="/imagenes/hori.gif" valign="top"><img src="/imagenes/blanco_002.gif" width="10" height="10"></td>
                  <td height="10" width="10"><img src="/imagenes/g4.gif" width="10" height="10"></td>
                </tr>
                </table>
        </form></td>
      </tr>
      <tr>
        <td height="100" valign="bottom"><div class="Parrafos">
              <div align="center">
                <p><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">Gobierno Regional<br>
                  Todos Los Derechos Reservados 2009 <br>
                </font></p>
              </div>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
