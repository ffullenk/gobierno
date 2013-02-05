<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bcrevalidate";
  global $global_qk;
  $global_qk=0;
  require('bc_detect.php');
  global $c;

if($loginCorrecto ) {  
	@include("rfunciones.php");
	@include("../lib/grbz-sesion.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
?>
<html>
<head>
<title>Panel de Respuestas - Buzón Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/rpanel.css" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px 0px;padding:0px;">
<table width="722" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="1">&nbsp;</td>
    <td width="720">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
		  	<?php
				CabeceraRPagina();
				LineaComando();
			?>
		  </td>
        </tr>
        <tr>
           <td height="25"><table width="720" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="160" valign="top">
					    <!-- Menu Principal -->
						<?php MenuRPagina(TipoFuncionario($global_qk)); ?>
						<!-- Menu Principal -->
					  </td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="98%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"><?php Ruta("UA");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Agregar Usuario Administrador</h1>
									    <div align="right">
											<form id="formlist" name="f_agrega" method="post" action="bz_us01a.php">
												<?php echo "<input name=\"TiUs\" type=\"hidden\" value=\"1\"/>";?> 
												<input type="submit" value=" Agregar " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
											</form>
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
										<!--<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>-->
										<!-- INICIO: Paginacion -->
<?php
										$rut_persona				= $_POST["rut_persona"];
										$nombres_persona			= $_POST["nombres_persona"];
										$paterno_persona			= $_POST["paterno_persona"];	  
										$materno_persona			= $_POST["materno_persona"];	  
										$email_persona				= $_POST["email_persona"]; 
										$user_persona				= $_POST["user_persona"]; 
										$password_persona			= $_POST["password_persona"];
										$confirmarpassword_persona	= $_POST["confirmarpassword_persona"];
										$tipo_funcionario 			= $_POST["TiUs"];

										$contador_error = 0;
										if($rut_persona == '') { $errores[$contador_error++] = "RUT no debe ser vacio."; }
										if($nombres_persona == '') { $errores[$contador_error++] = "Nombres no deben ser vacios."; }
										if($paterno_persona == '') { $errores[$contador_error++] = "Apellido Paterno no debe ser vacio.";}
										if($email_persona == '') { $errores[$contador_error++] = "Email no debe se vacio.";}
										if($user_persona == '') { $errores[$contador_error++] = "Debe ingresar un nombre de usuario distinto de vacio.";}
										if($password_persona == ''|| $confirmarpassword_persona=='') { $errores[$contador_error++] = "Debe ingresar un password distinto de vacio.";}
										if($password_persona != $confirmarpassword_persona) { $errores[$contador_error++] = "Debe confirmar su password.";}

										if($contador_error>0) { 
											echo "Ingreso invalido de datos, los errores son los siguientes: ";  
											echo "\t\t<ul>\n";	
											for($i=0; $i<$contador_error; $i++)
											{
												echo "\t\t\t<li>",$errores[$i]."</li>\n";
											}
											echo "\t\t</ul>";
											echo "\n\n";
											echo('
												<div align="center"><input class="formbutton" name="atras" type="button" value="Volver" onClick="javascript:history.back();"></div>
											');
										} else {
											$rsTabla =new Recordset($SERVER, $DB, $USER, $PASSWORD);

											$password = crypt($password_persona,$user_persona);
											$rsTabla->FieldByInsert( "RUT" , "'$rut_persona'" ); 
											$rsTabla->FieldByInsert( "NOMBRES" , "'$nombres_persona'" ); 
											$rsTabla->FieldByInsert( "APPAT" , "'$paterno_persona'" ); 
											$rsTabla->FieldByInsert( "APMAT" , "'$materno_persona'" ); 
											$rsTabla->FieldByInsert( "EMAIL" , "'$email_persona'" ); 
											$rsTabla->FieldByInsert( "USER_FUNCIONARIO" , "'$user_persona'" );	
											$rsTabla->FieldByInsert( "PASS_FUNCIONARIO" , "'$password'" );
											$rsTabla->FieldByInsert( "TIPO_FUNCIONARIO" , "'$tipo_funcionario'" );
											$error = $rsTabla->execInsert( "FUNCIONARIO" , 1);
					
											/*El registro fue modificado corecctamente*/
											if ($error == true ) { ?>
												<table width="550" border="0" align="center">
													<tr><td height="5" colspan="2"></td></tr>
													<tr>
														<td colspan="2">
														<p class="headerTitulo"> El Registro de usuario se ha realizado con éxito. </p>
														<p class="main"> El nombre de usuario y contraseña serán enviado a su email.</p>
														</td>
													</tr>
													<?php
													echo "
													<tr><td class='formtitulo' colspan='2' align='center' >Registro de Usuario</td></tr>
													<tr><td class='formlabel'>Rut:</td><td class='formlabel'>".$_POST['rut_persona']."</td></tr>
													<tr><td class='formlabel'>Nombres:</td><td class='formlabel'>".$_POST['nombres_persona']."</td></tr>
													<tr><td class='formlabel'>Apellido Paterno:</td><td class='formlabel'>".$_POST['paterno_persona']."</td></tr>
													<tr><td class='formlabel'>Apellido Materno:</td><td class='formlabel'>".$_POST['materno_persona']."</td></tr>
													<tr><td class='formlabel'>Email:</td><td class='formlabel'> ".$_POST['email_persona']."</td></tr>
													<tr><td class='formlabel'>Nombre de Usuario:</td><td class='formlabel'> ".$_POST['user_persona']."</td></tr>
													<tr><td class='formlabel'>Contraseña:</td><td class='formlabel'> ".$_POST['password_persona']."</td></tr>
													";
													
													// Creamos un objeto correo y enviamos el mail a el destinatario.
													//$mail = new correo($email, $tupla["email_persona"], $asunto, $texto);

													$mensaje = "El equipo de desarrollo de Buzón Ciudadano :: Gobierno Regional de Coquimbo \n";
													$mensaje.=" le da la bienvenida y le recuerda que como Usuario Administrador, usted podrá tener acceso a ";
							
													if($tipo_funcionario == 1 ) { 
														$mensaje.= "todos los módulos de administración. \n\n"; }
													elseif($tipo_funcionario == 2 ) { $mensaje.= " responder los emails de acuerdo a la temática y al módulo de consultas. \n\n"; }
													else { $mensaje.= " el módulo de consultas. \n\n";}
							
													$mensaje.= "Su nombre de usuario es:".$user_persona." \n";
													$mensaje.= "y su password es:".$password_persona."\n\n";
													$mensaje.=" Le saluda \n\n\n";
													$mensaje.=" Administrador Buzón Ciudadano \n";

													$name="Buzón Ciudadano :: Gobierno Regional de Coquimbo";
													$emailEmisor="ljimenez@gorecoquimbo.cl";			
													$asunto="Notificación de Registro";
							
													$mail = new correo();
													$mail->setEmisor($name, $emailEmisor);
													$mail->putCorreo($email_persona, $asunto, $mensaje);
													$mail->sendCorreo();							
													?>
													<tr>
														<td colspan="2">
												          <div align='center'> 
												            <form action="bz_us0<?php echo $TiUs;?>.php" target="_parent" id="formlist">
												              <input type='submit' value='Volver Inicio'  class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
												            </form>
												          </div>
														</td>
													</tr>
													<tr><td height="5" colspan="2"></td></tr>											
												</table>
									<?php   } else {?>
												<table width="550" border="0" align="center">
													<tr><td height="5"></td></tr>
													<tr>
														<td>
														<p><img src='../imagenes/ic_error.jpg' >&nbsp; Error al Registrar al Usuario.</p>
														<p>El error pudo deberse a:</p>
														<ol>
														<li>&nbsp; El Rut ya está registrado.</li>
														<li>&nbsp; El email ya existe.</li>
														<li>&nbsp; El nombre de usuario ya existe.</li>
														<li>&nbsp; Se ha perdido la conexión.</li>
														</ol>
														<p> Revise sus datos y vuelva a intentar.</p>
														<div align='center'>
														<input class='formbutton' name='atras' type='button' value='Volver' onClick='javascript:history.back();'>
														</div>
														</td>
													</tr>
													<tr><td height="5"></td></tr>											
												</table>
									<?php   } ?>
									
									<!--<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>-->
									</div>
										<!-- FIN Paginacion -->
										<!-- FIN: Paginacion -->
									</td>
								</tr>
								</table>
							<!-- Parte  Central de la Pagina-->
							</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
					    <!-- Seccion Central -->
					  </td>
                    </tr>
                  </table></td>
              </tr>
        <tr>
          <td><?php PieRPagina();?></td>
        </tr>
      </table></td>
    <td width="1">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php // FIN LoginCorrecto True
} else{
  // No se encuentra logeado el usuario
  header("Location: index.php");
} ?>
