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
                            <td class="textoRuta"><?php Ruta("TM");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Actualizar Tema</h1>
									    <div align="right">
											<form id="formlist" name="f_agrega" method="post" action="bz_tm01a.php">
												<input type="submit" value=" Agregar " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
											</form>
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
									<!-- INICIO: Paginacion -->
							          <?php
									/* Leemos ID Tema que viene desde bc_tm01.php  */ 
								  	$CodTema = $_POST["id"];
									/* Verificamos contenido en CodTema  */
									if(isset($CodTema)) {
										$rsTabla = new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$query = "SELECT TEMA 
													FROM TEMAS 
													WHERE COD_TEMA = '".$CodTema."';";
                                        /* ACTIVADO='S' AND  */
										$rsTabla->Open($query);
										if($rsTabla->RecordCount()>0)
										{
											$rsTabla->moveNext();
											$nombre_tema	= $rsTabla->fieldByName("TEMA");
										} ?>
										<table width="550" border="0" align="center">
										<tr><td height="5"></td></tr>
										<tr><td>
											<FORM ACTION="bz_tm01m1.php" METHOD="post" id="FMuestra" NAME="formulario" onSubmit="return vldformTema();">
											<?php echo "<input name=\"CodTema\" type=\"hidden\" value=\"".$CodTema."\"/>";?> 
											<TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE" align="center">
											<TR class="texto-tablas">
												<TD colspan="2"> &nbsp;<strong>Formulario Detalle de Tema</strong></TD></TR>
											<TR class="texto-contenido">
												<TD>&nbsp;Tema</TD>
												<TD width="70%">
												<input name="nombre_tema" type="text" tabindex="1" value="<?php echo $nombre_tema;?>" size="45" maxlength="128"> 
												<span class="formAsterisco">(*)</span>
												</TD>
											</TR>
											<TR><TD colspan="2">&nbsp;</TD></TR>
							                <?php	/*	Seleccionamos los emails de los funcionarios que pueden contestar
														de acuerdo al tema.	*/
											$rsQresp = new Recordset($SERVER , $DB , $USER , $PASSWORD);
											$qQresp = "SELECT COD_QRESP, concat(NOMBRES, ' ', APPAT, ' ', APMAT) 
														FROM QRESPONDE AS Q, FUNCIONARIO AS F 
														WHERE Q.COD_FUNCIONARIO = F.COD_FUNCIONARIO AND 
														COD_TEMA = '".$CodTema."';";
											/* AND ACTIVADO='S'  */
											$rsQresp->Open($qQresp);	
											if($rsQresp->Recordcount() > 0 ) {?>
												<TR class="texto-tablas">
													<TD colspan="2"> &nbsp;<strong>Usuarios Registrados como Responsables de este Tema</strong></TD>
												</TR>
												<TR>
													<TD class="texto-contenido" colspan="2">
													<table align="center">
														<TR><TD height="5" colspan="2"></TD></TR>
														<TR>
															<TD class="texto-tablas">Eliminar</TD>
															<TD class="texto-tablas">Funcionario</TD>
														</TR>
													<?php while($rsQresp->moveNext()) { ?>
														<TR  class="texto-contenido"> 
									                      <TD><?php echo "<input type='checkbox' name='rowSelector[]' value='".$rsQresp->FieldByNumber(0)."'>" ;?></TD>
									                      <TD><?php echo $rsQresp->FieldByNumber(1);?></TD>
									                    </TR>
								                    <?php } ?>												
														<TR><TD height="5" colspan="2"></TD></TR>
													</table>
													</TD>
												</TR>
					                  <?php } ?>
											<TR class="texto-tablas"> 
												<TD colspan="2"> &nbsp;<strong>Selecci&oacute;n de Funcionarios Responsables para Responder Emails</strong></TD>
											</TR>
											<TR class="texto-contenido"> 
												<TD colspan="2" align="center">
												<select multiple name="resp_email[]" class="formlist" tabindex="3" >
							                     <?php
												$rsTabla = new Recordset($SERVER , $DB , $USER , $PASSWORD);
												$rsTabla->Open("SELECT  p.COD_FUNCIONARIO, concat(NOMBRES,' ',APPAT,' ',APMAT)
																FROM FUNCIONARIO p 
																LEFT  JOIN QRESPONDE d 
																ON ( p.COD_FUNCIONARIO = d.COD_FUNCIONARIO AND 
																	d.COD_TEMA = '".$CodTema."')  
																WHERE p.ACTIVADO='S' AND d.COD_FUNCIONARIO IS  NULL ");
												for ($i = 0 ; $i < $rsTabla->RecordCount() ; $i++)
												{
													$rsTabla->moveNext();
													echo"<option value='".$rsTabla->FieldByNumber(0)."'>". $rsTabla->FieldByNumber(1) ."</option>"; 
												}?>
						                        </select></TD>
											</TR>
											<TR class="texto-contenido">
												<TD colspan="2">Utilice la tecla Control (Ctrl) para seleccionar m&aacute;s de uno.</TD>
											</TR>
											</TABLE>
											<div align="center">
												<br>
												<span  class="texto-contenido">(*) Datos obligatorios</span><br>
												<input type="submit" name="enviar" title="Actualizar Nuevo Tema" value=" Actualizar " tabindex="4" class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
												&nbsp; 
												<input type="reset"  name="limpiar" title="Restablecer formulario" value=" Limpiar "  tabindex="5" class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
											</div>
											</FORM>
												</td>
											</tr>
											<tr><td height="5"></td></tr>											
										</table>
					          <?php   } //ENDIF CODFUNC ?>
										
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