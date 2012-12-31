<?php
  /*header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  umask(0);*/
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
                            <td class="textoRuta"><?php Ruta("C");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Tipo de Consultas</h1>
									    <div align="right">
											<form id="formlist" name="f_agrega" method="post" action="bz_tc01a.php">
												<input type="submit" value=" Agregar " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
											</form>
										</div>
									</div><!-- FIN MAINCOL -->
									<div id="paginacion">
										<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
										<!-- INICIO: Paginacion -->
										<table width="550" border="0" align="center">
										<!--<tr><td height="5" colspan="3"></td></tr>-->
										<?php
											/* Limito la busqueda */
											$TAMANO_PAGINA = 15;
											/* examino la página a mostrar y el inicio del registro a mostrar */
											$pg = $_GET["pg"];
											if (!$pg) { $inicio = 0; $pg=1;
											} else { $inicio = ($pg - 1) * $TAMANO_PAGINA; }

											$rsSQL=new Recordset($SERVER , $DB , $USER , $PASSWORD);
											/*  */
											$ssql = "SELECT COD_TIPO, TIPO FROM TIPO";
										
											$rsSQL->Open($ssql);

											$num_total_registros = $rsSQL->RecordCount();
											if( $num_total_registros > 0 ) {
												/* calculo el total de páginas */
												$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
												/* pongo el número de registros total, el tamaño de página y la página que se muestraA */
												$maxpags = 15;
												$minimo = $maxpags ? max(1, $pg-ceil($maxpags/2)): 1;
												$maximo = $maxpags ? min($total_paginas, $pg+floor($maxpags/2)): $total_paginas;
												/* construyo la sentencia SQL */
												$ssql.= " LIMIT ". $inicio . "," . $TAMANO_PAGINA .";";
												$rsSQL->Open($ssql); ?>
												<?php
												while($rsSQL->moveNext() ) { 
													$color=($color==""?"#efefef":"");?>
												<tr valign="middle" bgcolor="<?php echo $color;?>">
													<td class="texto-contenido">
														<?php echo $rsSQL->FieldByNumber(1);?></td>
													<td align="center">
														<form id="formlist" method="post" action="bz_tc01m.php">
															<input type="hidden" name="id" value="<?php echo $rsSQL->FieldByNumber(0);?>">
														<input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
															<input type="image" src="../imagenes/ic_edit.gif" align="absmiddle" value=" Editar " size="28,28" border="0" />												
														</form>
													</td>
													<td align="center">
						<form id="formlist" method="post" action="bz_tc01e.php">
						<input type="hidden" name="id" value="<?php echo $rsSQL->FieldByNumber(0);?>">
						<input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
						<input type="image" src="../imagenes/ic_delete.gif" align="absmiddle" value=" Editar " size="28,28" border="0" />												
						</form>
													</td>
												</tr>
<?php										} ?>
											<tr colspan="3"> 
												<td style="font-family:verdana; font-size:10px; color:#000;"> 
												<?php
												if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
												/* muestro los distintos índices de las páginas, si es que hay varias páginas */
												if($pg > 1)
												{
													echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".($pg-1)."'>";
													echo "<font face='verdana' size='-2'>&laquo;&laquo; anterior</font>";
													echo "</a>&nbsp;";
												}
												if ($total_paginas > 1)
												{
													for ($i=$minimo; $i<$pg; $i++){
														echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".$i."'> $i</a>&nbsp;";
													}
													echo "[". $pg. "]&nbsp;";
													for ($i=$pg+1; $i<=$maximo; $i++){
														echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".$i."'>$i</a>&nbsp;";
													}
												}
												if($pg<$total_paginas)
												{
													echo "&nbsp;<a href='".$_SERVER["PHP_SELF"]."?pg=" .($pg+1). "'>
													<font face=\"verdana\" size=\"-2\">siguiente &raquo;&raquo;</font></a>";
												} ?>
			              				</td>
										</tr>
									<?php } else{ echo "<tr><td class=\"texto-contenido\"> No se encuentran registros para visualizar</td></tr> ";} ?>
									</table>
									<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
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