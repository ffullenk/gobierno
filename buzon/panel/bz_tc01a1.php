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
                            <td class="textoRuta"><?php Ruta("CA");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Agregar Tipo de Consulta</h1>
									    <div align="right">
											<form id="formlist" name="f_agrega" method="post" action="bz_tc01a.php">
												<input type="submit" value=" Agregar " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
											</form>
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
										<!--<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>-->
										<!-- INICIO: Paginacion -->
<?php

				$nombre_tipo   		= $_POST["nombre_tipo"];

				$contador_error = 0;
				if($nombre_tipo == '') { $errores[$contador_error++] = "Tipo de Solicitud no debe ser vacío."; }

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
															</div>
											<?php
											echo "</td>
													</tr>
													</table>";
										} else {
					$rsTabla =new Recordset($SERVER, $DB, $USER, $PASSWORD);

					$rsTabla->FieldByInsert( "TIPO" , "'$nombre_tipo'" ); 
					$error = $rsTabla->execInsert( "TIPO" , 1);
					
											/*El registro fue modificado corecctamente*/
											if ($error == true ) { ?>
												<table width="550" border="0" align="center">
													<tr><td height="5" colspan="2"></td></tr>
													<tr class="informa">
														<td colspan="2"><img src="../imagenes/ic_ok.jpg">&nbsp;El Registro de Tipo de Consulta se ha realizado con éxito.</td>
													</tr>
													<tr>
														<td colspan="2">
												          <div align='center'> 
												            <form action="bz_tc01.php" id="FMuestra">
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
															<img src="../imagenes/ic_error.jpg" align="absmiddle" >&nbsp;Error al Registrar Tipo de Consulta.
														</td>
													</tr>
													<tr class="informa-texto">
														<td>El error pudo deberse a: <br />
														<ul >
														<li>&nbsp; El Tipo de Consulta ya está registrado.</li>
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
																<input type="submit" value=" Volver Atrás " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
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