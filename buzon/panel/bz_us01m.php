<?php
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
<script language="JavaScript" src="../js/valida.js"></script>
<script language="JavaScript" src="../js/funciones.js"></script>
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
									/* Leemos ID Funcionario que viene desde bc_us01.php  */ 
								  	$CodFunc = $_POST["id"];
									/* Verificamos contenido en CodFunc  */
									if(isset($CodFunc)) {
										$rsTabla = new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$query = "SELECT NOMBRES, APPAT, APMAT, EMAIL, RUT, USER_FUNCIONARIO, PASS_FUNCIONARIO, TIPO_FUNCIONARIO 
													FROM FUNCIONARIO 
													WHERE COD_FUNCIONARIO = " . $CodFunc . ";";
			
										$rsTabla->Open($query);
										if($rsTabla->RecordCount()>0)
										{
											$rsTabla->moveNext();
											$rut_persona		= $rsTabla->fieldByName("RUT");
											$nombres_persona	= $rsTabla->fieldByName("NOMBRES");
											$paterno_persona	= $rsTabla->fieldByName("APPAT");	  
											$materno_persona	= $rsTabla->fieldByName("APMAT");	  
											$email_persona		= $rsTabla->fieldByName("EMAIL");
											$user_persona		= $rsTabla->fieldByName("USER_FUNCIONARIO");
										} ?>

										<table width="550" border="0" align="center">
											<tr><td height="5"></td></tr>
											<tr>
												<td>
													<form action="bz_us01m1.php" method="post" name="formulario" id="FMuestra" onSubmit="return vldformUsuario();">
													<?php echo "<input name=\"CodFunc\" type=\"hidden\" value=\"".$CodFunc."\"/>
																<input name=\"TiUs\" type=\"hidden\" value=\"$TiUs\"/>";?> 
													<TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE" align="center">
													<TR class="texto-tablas">
														<TD colspan="2"> &nbsp;<strong>Datos Personales Funcionario</strong></TD></TR>
													<TR class="texto-contenido">
														<TD>&nbsp;Rut</TD>
														<TD width="70%">
														<input name="rut_persona" type="text" id="rut"  tabindex="1" value="<?php echo $rut_persona;?>" size="20" maxlength="12"> 
														<span class="formAsterisco">ej. 15271321-k (*) </span></TD>
													</TR>
													<TR class="texto-contenido"> 
														<TD WIDTH="30%">&nbsp;Nombres</TD>
														<TD>
														<input name="nombres_persona"   type="text"   tabindex="2" value="<?php echo $nombres_persona;?>" title="Primer y segundo nombre" size="45" maxlength="25"> 
														<span class="formAsterisco">(*)</span></TD>
													</TR>
													<TR class="texto-contenido"> 
														<TD WIDTH="30%">&nbsp;Apellido Paterno</TD>
														<TD >
														<INPUT NAME="paterno_persona"   TYPE="text"   TABINDEX="3" value="<?php echo $paterno_persona;?>" TITLE="Apellido paterno" size="45" maxlength="15"> 
														<span class="formAsterisco">(*)</span></TD>
													</TR>
													<TR class="texto-contenido"> 
														<TD WIDTH="30%">&nbsp;Apellido Materno</TD>
														<TD>
														<input name="materno_persona"   type="text"   tabindex="4" value="<?php echo $materno_persona;?>" title="Apellido materno" size="45" maxlength="15"> 
														<span class="formAsterisco">(*)</span></TD>
													</TR>
													<TR class="texto-contenido"> 
														<TD WIDTH="30%"  >&nbsp;Email</TD>
														<TD >
														<input name="email_persona"   type="text" id="email"   tabindex="5" value="<?php echo $email_persona;?>" size="45" maxlength="100"> 
														<span class="formAsterisco">(*)</span></TD>
													</TR>
													<TR> 
														<TD colspan="2">&nbsp;</TD>
													</TR>
													<TR class="texto-tablas"> 
														<TD colspan="2"> &nbsp;<strong>Cuenta de usuario</strong></TD>
													</TR>
													<TR class="texto-contenido"> 
														<TD  >&nbsp;Nombre de usuario</TD>
														<TD >
														<input name="user_persona"  type="text"  tabindex="6" value="<?php echo $user_persona;?>" size="30" maxlength="25"> 
														<span class="formAsterisco">(*)</span></TD>
													</TR>
													<TR class="texto-contenido"> 
														<TD  >&nbsp;Contrase&ntilde;a</TD>
														<TD>
														<input name="password_persona" type="password" tabindex="7" value="<?php echo $password_persona;?>" size="30" maxlength="25"> 
														<span class="formAsterisco">(*)</span></TD>
													</TR>
													<TR class="texto-contenido">
													  <TD  >&nbsp;Confirmar contrase&ntilde;a</TD>
													  <TD><input name="confirmarpassword_persona" type="password" tabindex="8" onBlur="" value="<?php echo $confirmarpassword_persona;?>"  size="30" maxlength="25">
                                                        <span class="formAsterisco">(*)</span></TD>
													  </TR>
													<TR class="texto-contenido">
													  <TD colspan="2"  >&nbsp;</TD>
													  </TR>
													<TR class="texto-tablas">
													  <TD colspan="2"  ><strong>Temas Asociados</strong></TD>
													  </TR>
													<TR class="texto-contenido">
													  <TD colspan="2"  >
                                                       <?php
														$rsTabla = new Recordset($SERVER , $DB , $USER , $PASSWORD);
														$rsTabla->Open("SELECT TEMA FROM `TEMAS` WHERE COD_TEMA IN(SELECT COD_TEMA FROM `QRESPONDE` WHERE COD_FUNCIONARIO = '".$CodFunc."' )");
														for ($i = 0 ; $i < $rsTabla->RecordCount() ; $i++)
														{
															$rsTabla->moveNext();
															echo"".$rsTabla->FieldByNumber(0)."<br />"; 											
													}
													?>                                                      </TD>
													  </TR>
													</TABLE>
                                                 													<div align="center">
													<br>
													<span  class="texto-contenido">(*) Datos obligatorios</span><br>
													<input type="submit" name="enviar" title="Actualizar datos del Funcionario" value=" Actualizar " tabindex="9" class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
													&nbsp; 
													<input type="reset"  name="limpiar" title="Restablecer formulario" value=" Limpiar "  tabindex="10" class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
													</div>
													</FORM>
												</td>
											</tr>
											<tr><td height="5"></td></tr>											
										</table>
									<!--<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>-->
							<?php } // ENDIF ?>
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