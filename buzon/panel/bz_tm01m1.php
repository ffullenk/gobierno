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
												<input type="submit" value=" Agregar " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
											</form>
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
									<!-- INICIO: Paginacion -->
							          <?php
									$nombre_tema   	= $_POST["nombre_tema"];
									$email_regist   = $_POST["rowSelector"];
									$email_nuevos	= $_POST["resp_email"];
									$nError = 0;
									$contador_error = 0;
									if($nombre_tema == '') { $errores[$contador_error++] = "Tema no debe ser vacío."; }

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
															<input type="submit" value=" Volver Atrás " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
														</form>
														</div><?php
												echo "</td>
												</tr>
												</table>";
									} else {
										/*echo "Cuanto elimino de los que ya estaban: ".count($email_regist);
										echo "<br />Cuantos agrego: ".count($email_nuevos);*/
				
										$rsTabla =new Recordset($SERVER, $DB, $USER, $PASSWORD);

										$rsTabla->FieldByUpdate( "TEMA" , "'$nombre_tema'" ); 
										$rsTabla->WhereByUpdate( "COD_TEMA" , "$CodTema" );
										$error = $rsTabla->execUpdate( "TEMAS" , 1);
						
										if ($error == true ) {
											if(count($email_regist) > 0 ) { 
											//elimino los emails que estaban registrados y han sido seleccionados
												foreach($email_regist as $email){
													$rsQrespE =new Recordset($SERVER, $DB, $USER, $PASSWORD);
													$error=$rsQrespE->Open( "DELETE FROM QRESPONDE WHERE COD_QRESP='".$email."'");
												}
											}
											if(count($email_nuevos) > 0 ) {
												foreach($email_nuevos as $nuevos){
													$rsAsoc =new Recordset($SERVER, $DB, $USER, $PASSWORD);
													$rsAsoc->FieldByInsert( "COD_FUNCIONARIO" , "'$nuevos'" ); 
													$rsAsoc->FieldByInsert( "COD_TEMA" , "'$CodTema'" ); 
													$error = $rsAsoc->execInsert( "QRESPONDE" , 1);
													if ($error == false ) { $nError = 1; }
												}
											}
										} else { $nError = 1; }
										if($nError == 1 ) { ?>
												<table width="550" border="0" align="center">
												<tr><td height="5"></td></tr>
												<tr class="informa">
													<td>
														<img src="../imagenes/ic_error.jpg" align="absmiddle" >&nbsp;Error al Actualizar Tema.
													</td>
												</tr>
												<tr class="informa-texto">
													<td>El error pudo deberse a: <br />
													<ul >
													<li>&nbsp; El Tema ya está registrado.</li>
													<li>&nbsp; Los Usuarios que escogio ya existen para este Tema.</li>
													<li>&nbsp; Se ha perdido la conexión.</li>
													</ul>
													</td>
												</tr>
												<tr>
													<td class="informa-texto">Revise sus datos y vuelva a intentar.</td>
												</tr>
												<tr>
													<td align="center">
														<form action="javascript:window.history.back()" method="post" id="FMuestra">
															<input type="submit" value=" Volver Atrás " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
														</form>
													</td>
												</tr>
												<tr><td height="5"></td></tr>											
												</table>
<?php										} else {?>
												<table width="550" border="0" align="center">
													<tr><td height="5" colspan="2"></td></tr>
													<tr class="informa">
														<td colspan="2"><img src="../imagenes/ic_ok.jpg">&nbsp;El Tema se ha relacionado con éxito con los funcionarios que ha especificado.</td>
													</tr>
													<tr>
														<td colspan="2">
												          <div align='center'> 
												            <form action="bz_tm01.php" id="FMuestra">
												              <input type='submit' value='Volver Inicio'  class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
												            </form>
												          </div>
														</td>
													</tr>
													<tr><td height="5" colspan="2"></td></tr>											
												</table>
<?php										} 
									}?>

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