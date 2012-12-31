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
	$nombre_tipo	= $_POST["TIPO"];
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
												<input type="submit" value=" Agregar " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
											</form>
										</div>
									</div><!-- FIN MAINCOL -->
									<!-- INICIO: Paginacion -->
									<div id="paginacion">
										<table width="550" border="0" align="center">
											<tr><td height="5"></td></tr>
											<tr>
												<td>
													<form action="bz_tc01a1.php" method="post" name="formulario" id="FMuestra" onSubmit="return vldformTipo();">
													<TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE" align="center">
													<TR class="texto-tablas">
														<TD colspan="2"> &nbsp;<strong>Formulario de Ingreso Tipo de Solicitud</strong></TD></TR>
													<TR class="texto-contenido">
														<TD>&nbsp;Tipo</TD>
														<TD width="70%">
														<input name="nombre_tipo" type="text" tabindex="1" value="<?php echo $nombre_tipo;?>" size="20" maxlength="12" title=" Nueva Temática a incluir "> 
														<span class="formAsterisco">(*)</span></TD>
													</TR>
													<TR> 
														<TD colspan="2">&nbsp;</TD>
													</TR>
													</TABLE>
													<div align="center">
													<br>
													<span  class="texto-contenido">(*) Datos obligatorios</span><br>
													<input type="submit" name="enviar" title="Agregar datos" value=" Grabar " tabindex="9" class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
													&nbsp; 
													<input type="reset"  name="limpiar" title="Restablecer formulario" value=" Limpiar "  tabindex="10" class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
													</div>
													</FORM>
												</td>
											</tr>
											<tr><td height="5"></td></tr>											
										</table>
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