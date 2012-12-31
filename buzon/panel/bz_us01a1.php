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
	@include("../lib/bc_correo.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	$TiUs = $_POST["TiUs"];
?>
<html>
<head>
<title>Panel de Respuestas - Buz�n Ciudadano :: Gobierno Regional de Coquimbo</title>
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
                            <td class="textoRuta"><?php Ruta("U".$TiUs);?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Agregar Usuario <?php if($TiUs==1){ echo "Administrador";} else { echo "Responsable Responder Emails";}?></h1>
									    <div align="right">
											<form id="formlist" name="f_agrega" method="post" action="bz_us01a.php">
												<?php echo "<input name=\"TiUs\" type=\"hidden\" value=\"$TiUs\"/>";?> 
												<input type="submit" value=" Agregar " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
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
											echo "
													<table width=\"550\" border=\"0\" align=\"center\">
													<tr><td height=\"5\" colspan=\"2\"></td></tr>
													<tr class=\"informa\">
														<td>
															<img src=\"../imagenes/ic_error.jpg\" align=\"absmiddle\" >&nbsp;Ingreso invalido de datos, los errores son los siguientes: 
														</td>
													</tr>
													<tr>
													    <td class=\"informa-texto\">";
													
											echo "\t\t<ul>\n";	
											for($i=0; $i<$contador_error; $i++)
											{
												echo "\t\t\t<li>",$errores[$i]."</li>\n";
											}
											echo "\t\t</ul>
												      </td>
													</tr>
													<tr>
														<td>";?>
															<div align="center">
															<form action="javascript:window.history.back()" method="post" id="FMuestra">
																<input type="submit" value=" Volver Atr�s " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
															</form>
															</div>
											<?php
											echo "</td>
													</tr>
													</table>";
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
													<tr class="informa">
														<td colspan="2"><img src="../imagenes/ic_ok.jpg">&nbsp;El Registro de usuario se ha realizado con �xito.</td>
													</tr>
													<tr class="informa-texto">
														<td colspan="2">El nombre de usuario y contrase�a ser�n enviado a su email.</td>
													</tr>
													<?php
													echo "
													<tr class='texto-tablas' >
														<td colspan='2' align='center' >Registro de Usuario</td>
													</tr>
													<tr class='texto-contenido'>
														<td>Rut:</td>
														<td><strong>".$_POST['rut_persona']."</strong></td>
													</tr>
													<tr class='texto-contenido'>
														<td>Nombres:</td>
														<td><strong>".$_POST['nombres_persona']."</strong></td>
													</tr>
													<tr class='texto-contenido'>
														<td>Apellido Paterno:</td>
														<td><strong>".$_POST['paterno_persona']."</strong></td>
													</tr>
													<tr class='texto-contenido'>
														<td>Apellido Materno:</td>
														<td><strong>".$_POST['materno_persona']."</strong></td>
													</tr>
													<tr class='texto-contenido'>
														<td>Email:</td>
														<td><strong>".$_POST['email_persona']."</strong></td>
													</tr>
													<tr class='texto-contenido'>
														<td>Nombre de Usuario:</td>
														<td><strong>".$_POST['user_persona']."</strong></td>
													</tr>
													<tr class='texto-contenido'>
														<td>Contrase�a:</td>
														<td><strong>".$_POST['password_persona']."</strong></td>
													</tr>
													";
													
													// Creamos un objeto correo y enviamos el mail a el destinatario.
													//$mail = new correo($email, $tupla["email_persona"], $asunto, $texto);

													$mensaje = "El equipo de desarrollo de Buz�n Ciudadano :: Gobierno Regional de Coquimbo \n";
													$mensaje.=" le da la bienvenida y le recuerda que como Usuario Administrador, usted podr� tener acceso a ";
							
													if($tipo_funcionario == 1 ) { 
														$mensaje.= "todos los m�dulos de administraci�n. \n\n"; }
													elseif($tipo_funcionario == 2 ) { $mensaje.= " responder los emails de acuerdo a la tem�tica y al m�dulo de consultas. \n\n"; }
													else { $mensaje.= " el m�dulo de consultas. \n\n";}
							
													$mensaje.= "Su nombre de usuario es:".$user_persona." \n";
													$mensaje.= "y su password es:".$password_persona."\n\n";
													$mensaje.=" Le saluda \n\n\n";
													$mensaje.=" Administrador Buz�n Ciudadano \n";

													$name="Buz�n Ciudadano :: Gobierno Regional de Coquimbo";
													$emailEmisor="ljimenez@gorecoquimbo.cl";			
													$asunto="Notificaci�n de Registro";
							
													$mail = new correo();
													$mail->setEmisor($name, $emailEmisor);
													$mail->putCorreo($email_persona, $asunto, $mensaje);
													$mail->sendCorreo();							
													?>
													<tr>
														<td colspan="2">
												          <div align='center'> 
												            <form action="bz_us0<?php echo $TiUs;?>.php" id="FMuestra">
												              <input type='submit' value='Volver Inicio'  class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
												            </form>
												          </div>
														</td>
													</tr>
													<tr><td height="5" colspan="2"></td></tr>											
												</table>
									<?php   } else {?>
												<table width="550" border="0" align="center">
													<tr><td height="5"></td></tr>
													<tr class="informa">
														<td>
															<img src="../imagenes/ic_error.jpg" align="absmiddle" >&nbsp;Error al Registrar al Usuario.
														</td>
													</tr>
													<tr class="informa-texto">
														<td>El error pudo deberse a: <br />
														<ul >
														<li>&nbsp; El Rut ya est� registrado.</li>
														<li>&nbsp; El email ya existe.</li>
														<li>&nbsp; El nombre de usuario ya existe.</li>
														<li>&nbsp; Se ha perdido la conexi�n.</li>
														</ul>
														</td>
													</tr>
													<tr>
														<td class="informa-texto">Revise sus datos y vuelva a intentar.</td>
													</tr>
													<tr>
														<td align="center">
															<form action="javascript:window.history.back()" method="post" id="FMuestra">
																<input type="submit" value=" Volver Atr�s " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
															</form>
														</td>
													</tr>
													<tr><td height="5"></td></tr>											
												</table>
									<?php   } 
										}
									?>
									
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
