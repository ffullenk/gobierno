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
                            <td class="textoRuta"><?php Ruta("UE");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
									<div id="maincol" >
										<h1>Eliminar Usuario Administrador</h1>
									    <div align="right">
											<form id="formlist" name="f_agrega" method="post" action="bz_us01a.php">
												<?php echo "<input name=\"TiUs\" type=\"hidden\" value=\"1\"/>";?> 
												<input type="submit" value=" Agregar " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
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
											$rsFunc =new Recordset($SERVER, $DB, $USER, $PASSWORD);
											$error=$rsFunc->Open( "DELETE FROM FUNCIONARIO WHERE COD_FUNCIONARIO=$CodFunc");?>
												<table width="550" border="0" align="center">
													<tr><td height="5"></td></tr>
													<tr>
														<td>
														<p><img src='../imagenes/ic_ok.jpg' >&nbsp; El Registro fue eliminado de manera satisfactoria.</p>
														<div align='center'>
														<input class='formbutton' name='atras' type='button' value='Volver' onClick='javascript:history.back();'>
														</div>
														</td>
													</tr>
													<tr><td height="5"></td></tr>											
												</table><?php
										} //ENDIF CODFUNC ?>

									<?php   } ?>
									
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