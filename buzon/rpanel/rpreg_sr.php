<?php
  umask(0);
  include('../bd/conecta.php');
  $link = Conexion();
  $legal_require_php = "bzrrevalidate";
  global $global_qk;
  $global_qk=0;


require('detect.php');
  global $c;

if($loginCorrecto ) {  
	/*se incluyen los archivos*/
	@include("../lib/grbz-sesion.php");
	@include("../lib/bc_lib.php");
	@include("../lib/global.php");
	@include("../lib/recordset.php");
	@include("rfunciones.php");
	@include("../lib/bc_correo.php");
	
	$tipo	= $_GET['tipo'];
	$tema	= $_GET['tema'];

?>
<html>
<head>
<title>Panel de Respuestas - Buzón Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos/rpanel.css" rel="stylesheet" type="text/css">
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
                    <tr valign="top">
                      <td width="160" valign="top">
					    <!-- Menu Principal -->
						<?php MenuRPagina(); ?>
						<!-- Menu Principal -->
					  </td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="98%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"><?php Ruta("S");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								   <td class="texto-ver"><form  id="FMuestra" method="get" action="rpreg_sr.php">
								   <table width="550" border="0" align="center">
  									<tr class="texto-contenido">
    									<td>Tipo Consulta</td>
    									<td><?php
										$rsTipo = new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$qryTipo = "SELECT COD_TIPO, TIPO FROM TIPO;";
										$rsTipo->Open($qryTipo);
										echo "<select name=\"tipo\" tabindex='1' >\n";
										if(!isset($tipo)) {
											echo "<option value=\"0\" selected>Todas</option>\n";
										} else { echo "<option value=\"0\" >Todas</option>\n";}
										while($rsTipo->moveNext() )
										{
                                          if($tipo==$rsTipo->FieldByNumber(0)) {
											echo "<option value=\"".$rsTipo->FieldByNumber(0)."\" selected>".$rsTipo->FieldByNumber(1)."</option>\n";
                                          } else echo "<option value=\"".$rsTipo->FieldByNumber(0)."\" >".$rsTipo->FieldByNumber(1)."</option>\n";
  										}
										echo "</select>\n";
										?>
										</td>
    									<td>&nbsp;</td>
    									<td>Tema</td>
    									<td><?php
										$rsTema = new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$qryTema = "SELECT COD_TEMA, TEMA FROM TEMAS;";
										$rsTema->Open($qryTema);
										echo "<select name=\"tema\" tabindex='2' >\n";
										if(!isset($tema)) {
											echo "<option value=\"0\" selected>Todos</option>\n";
										} else { echo "<option value=\"0\" >Todos</option>\n";}
										while($rsTema->moveNext() )
										{
                                          if($tema==$rsTema->FieldByNumber(0)) {
											echo "<option value=\"".$rsTema->FieldByNumber(0)."\" selected>".$rsTema->FieldByNumber(1)."</option>\n";
                                          } else echo "<option value=\"".$rsTema->FieldByNumber(0)."\" >".$rsTema->FieldByNumber(1)."</option>\n";
  										}
										echo "</select>\n";
										?>
										</td>
										<td><input type="submit" name="muestra" value="Ver" class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'"></td>
	  								</tr>
									</table></form>										
							       </td>
								</tr>
								<tr>
								   <td><!-- INICIO Paginacion -->
								   <table width="550" border="0" align="center">
								   <tr><td height="5"></td></tr>
									<?php
									  /* Limito la busqueda */
									     $TAMANO_PAGINA = 1;
									  /* examino la página a mostrar y el inicio del registro a mostrar */
									     $pg = $_GET["pg"];
									     if (!$pg) {
									         $inicio = 0;
									         $pg=1;
									     } else {
									         $inicio = ($pg - 1) * $TAMANO_PAGINA;
									     }
										$rsSQL=new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$ssql = "SELECT COD_BITC, concat(NOMBRES, \"  \",PATERNO, \"  \", MATERNO), MENSAJE, DATE_FORMAT(FECHA, '%d/%m/%Y %H:%i:%s'), COD_TIPO, COD_TEMA  
													FROM BITACORA_C AS BC, PERSONA AS P  
													WHERE BC.COD_PERS = P.COD_PERS ";
													if($tipo != 0) { $ssql.= " AND BC.COD_TIPO = '". $tipo ."' "; }
													if($tema != 0) { $ssql.= " AND BC.COD_TEMA = '". $tema ."' "; }
										$ssql.= " AND RESPUESTA = 'N'";
										$rsSQL->Open($ssql);

										$num_total_registros = $rsSQL->Recordcount();
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
											<tr>
											  <td style="border-bottom:1px solid #000; font-family:arial, verdana; font-size:10px;">&nbsp;</td>
											</tr>
											<?php
											while($rsSQL->moveNext() ) { 
											
											?>
											<tr><td>
												<table width="100%" border="0" align="center">
												<tr>
													<td width="91" class="texto-tablas"><strong>Fecha</strong></td>
													<td class="texto-contenido"><strong><?php echo $rsSQL->FieldByNumber(3);?></strong></td>
													<td width="178" bgcolor="#FFFFFF" align="right">
														<form id="formlist" method="post" action="rresponder.php">
														<input type="hidden" name="id" value="<?php echo $rsSQL->FieldByNumber(0);?>">
														<input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
										                  <input type="submit" value=" Responder " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
														</form>
													</td>
												</tr>
												<tr> 
												    <td class="texto-tablas"><strong>Usuario</strong></td>
												    <td class="texto-contenido" colspan="2"><strong><?php echo $rsSQL->FieldByNumber(1);?></strong></td>
												</tr>
<?php
$rsTipo=new Recordset($SERVER , $DB , $USER , $PASSWORD);
$sqlTipo = "SELECT TIPO FROM TIPO WHERE COD_TIPO='".$rsSQL->FieldByNumber(4)."'";
$rsTipo->Open($sqlTipo);
while($rsTipo->moveNext()) {
	$Tipo = $rsTipo->fieldByNumber(0);
}
$sqlTema = "SELECT TEMA FROM TEMAS WHERE COD_TEMA='".$rsSQL->FieldByNumber(5)."'";
$rsTema->Open($sqlTema);
while($rsTema->moveNext()) {
	$Tema = $rsTema->fieldByNumber(0);
}

?>												
												<tr class="texto-contenido">
													<td colspan="3" ><strong>Mensaje</strong>&nbsp; [<?php echo $Tipo;?> -> <?php echo $Tema;?>]</td>
												</tr>
												<tr class="texto-tablas"> 
													<td colspan="3">
													<div id="veMensaje">
														<?php echo nl2br($rsSQL->FieldByNumber(2));?>
													</div>
													</td>
												</tr>
												</table>
											</td></tr>
											<tr ><td height="5"></td></tr>
<?php										} ?>
											<tr>
											  <td style="border-bottom:1px solid #000; font-family:arial, verdana; font-size:10px;">&nbsp;</td>
											</tr>							
											<tr> 
												<td style="font-family:verdana; font-size:10px; color:#000;"> 
												<?php
												if ($total_paginas > 1) { echo "<strong>P&aacute;gina </strong>&nbsp;"; }
												/* muestro los distintos índices de las páginas, si es que hay varias páginas */
												if($pg > 1)
												{
													echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".($pg-1)."&tipo=".$tipo."&tema=".$tema."'>";
													echo "<font face='verdana' size='-2'>&laquo;&laquo; anterior</font>";
													echo "</a>&nbsp;";
												}
												if ($total_paginas > 1)
												{
													for ($i=$minimo; $i<$pg; $i++){
														echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".$i."&tipo=".$tipo."&tema=".$tema."'> $i</a>&nbsp;";
													}
													echo "[". $pg. "]&nbsp;";
													for ($i=$pg+1; $i<=$maximo; $i++){
														echo "<a href='".$_SERVER["PHP_SELF"]."?pg=".$i."&tipo=".$tipo."&tema=".$tema."'>$i</a>&nbsp;";
													}
												}
												if($pg<$total_paginas)
												{
													echo "&nbsp;<a href='".$_SERVER["PHP_SELF"]."?pg=" .($pg+1). "&tipo=".$tipo."&tema=".$tema."'>
													<font face=\"verdana\" size=\"-2\">siguiente &raquo;&raquo;</font></a>";
												} ?>
			              				</td>
										</tr>
									<?php } else{ echo "<tr><td> No se encuentran registros para visualizar</td></tr> ";} ?>
									</table> <!-- FIN Paginacion -->
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
<?php
} else {
	// No logeado
	header("Location: index.php");
}
?>