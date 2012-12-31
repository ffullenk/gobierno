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
	$TiUs = $_POST["TiUs"];
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
                            <td class="textoRuta"><?php Ruta("M".$TiUs);?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Actualizar Datos Usuario <?php if($TiUs==1){ echo  "Administrador";} else { echo "Responsable Responder Emails ";}?></h1>
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
										$rut_persona         		= $_POST["rut_persona"];
										$nombres_persona     		= $_POST["nombres_persona"];
										$paterno_persona     		= $_POST["paterno_persona"];	  
										$materno_persona     		= $_POST["materno_persona"];	  
										$email_persona				= $_POST["email_persona"]; 
										$user_persona				= $_POST["user_persona"]; 
										$password_persona    		= $_POST["password_persona"];
										$confirmarpassword_persona	= $_POST["confirmarpassword_persona"]; 

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
																<input type="submit" value=" Volver Atrás " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
															</form>
															</div><?php
													echo "</td>
													</tr>
													</table>";
											} else {
												$rsTabla =new Recordset($SERVER, $DB, $USER, $PASSWORD);

												$password = crypt($password_persona,$user_persona);
												$rsTabla->FieldByUpdate( "RUT" , "'$rut_persona'" ); 
												$rsTabla->FieldByUpdate( "NOMBRES" , "'$nombres_persona'" ); 
												$rsTabla->FieldByUpdate( "APPAT" , "'$paterno_persona'" ); 
												$rsTabla->FieldByUpdate( "APMAT" , "'$materno_persona'" ); 
												$rsTabla->FieldByUpdate( "EMAIL" , "'$email_persona'" ); 
												$rsTabla->FieldByUpdate( "USER_FUNCIONARIO" , "'$user_persona'" );	
												$rsTabla->FieldByUpdate( "PASS_FUNCIONARIO" , "'$password'" );
					
												$rsTabla->WhereByUpdate( "COD_FUNCIONARIO" , "$CodFunc" );
												$error = $rsTabla->execUpdate( "FUNCIONARIO" , 1);
					
												/*El registro fue modificado corecctamente*/
												if ($error == true ) {
													echo "
														<table width=\"550\ border=\"0\" align=\"center\">
														<tr><td height=\"5\"></td></tr>
														<tr>
															<td class=\"informa\">
															<p><img src=\"../imagenes/ic_ok.jpg\" >&nbsp; La actualización de datos del usuario se ha realizado con éxito.</p>
															<div align=\"center\">";?>
															<form action="<?php if($TiUs==1) { echo "bz_us01.php";} else { echo "bz_us02.php";}?>" method="post" id="FMuestra">
																	<input type="submit" value=" Volver Inicio Usuarios " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
															</form><?php
													echo "</div>
															</td>
														</tr>
														<tr><td height=\"5\"></td></tr>											
													</table>";
												} else {
													echo"
														<table width=\"550\ border=\"0\" align=\"center\">
														<tr><td height=\"5\"></td></tr>
														<tr>
															<td class=\"informa\">
															<p><img src=\"../imagenes/ic_error.jpg\" >&nbsp; Revise sus datos y vuelva a intentar.</p>
															<div align=\"center\">";?>
															<form action="javascript:window.history.back()" method="post" id="FMuestra">
																	<input type="submit" value=" Volver Atrás " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
															</form><?php
													echo "</div>
															</td>
														</tr>
														<tr><td height=\"5\"></td></tr>											
													</table>";
												} // ENDIF ERROR
										} // ENDIF CONTADOR	?>
									
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