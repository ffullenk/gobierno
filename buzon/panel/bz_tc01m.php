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
                            <td class="textoRuta"><?php Ruta("CM");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Actualizar Tipo de Consultas</h1>
									    <div align="right">
											<form id="formlist" name="f_agrega" method="post" action="bz_tc01a.php">
												<input type="submit" value=" Agregar " class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
											</form>
										</div>
									</div><!-- FIN MAINCOL -->
									<!-- INICIO: Paginacion -->
									<div id="paginacion">
									<?php
									/* Leemos ID Tipo que viene desde bc_tc01.php  */ 
								  	$CodTipo = $_POST["id"];
									/* Verificamos contenido en CodTipo  */
									if(isset($CodTipo)) {
										$rsTabla = new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$query = "SELECT TIPO 
												FROM TIPO 
												WHERE COD_TIPO = " . $CodTipo . ";";
			
										$rsTabla->Open($query);
										if($rsTabla->RecordCount()>0)
										{
											$rsTabla->moveNext();
											$nombre_tipo	= $rsTabla->fieldByName("TIPO");
										} ?>
										<table width="550" border="0" align="center">
										<tr><td height="5"></td></tr>
										<tr><td>
											<FORM ACTION="bz_tc01m1.php" METHOD="post" id="FMuestra" NAME="formulario" onSubmit="return vldformTipo();">
							                  <?php echo "<input name=\"CodTipo\" type=\"hidden\" value=\"".$CodTipo."\"/>";?> 
											<TABLE WIDTH="90%" BORDER="1" CELLPADDING="0" cellspacing="0" bordercolor="#EEEEEE" align="center">
											<TR class="texto-tablas">
												<TD colspan="2"> &nbsp;<strong>Detalle del Tipo de Solicitud</strong></TD></TR>
											<TR class="texto-contenido">
												<TD>&nbsp;Tema</TD>
												<TD width="70%">
												<input name="nombre_tipo" type="text" tabindex="1" value="<?php echo $nombre_tipo;?>" size="45" maxlength="128"> 
												<span class="formAsterisco">(*)</span>
												</TD>
											</TR>
											<TR>
												<TD colspan="2">&nbsp;</TD>
											</TR>
											</TABLE>
											<div align="center">
												<br>
												<span  class="texto-contenido">(*) Datos obligatorios</span><br>
												<input type="submit" name="enviar" title="Actualizar Tipo de Solicitud" value=" Actualizar " tabindex="4" class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
												&nbsp; 
												<input type="reset"  name="limpiar" title="Restablecer formulario" value=" Limpiar "  tabindex="5" class="btn" onMouseOver="this.className='btn btnhov'" onMouseOut="this.className='btn'">
											</div>
											</FORM>
												</td>
											</tr>
											<tr><td height="5"></td></tr>											
										</table>
								<?php } ?>
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