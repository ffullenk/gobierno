<?php
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

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
	include("rfunciones.php");
?>
<html>
<head>
<title>Panel de Respuestas - Buzón Ciudadano :: Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos/rpanel.css" rel="stylesheet" type="text/css">
</head>

<body onLoad="document.FRespEmail.cMensaje.focus();">
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
						<?php MenuRPagina(); ?>
						<!-- Menu Principal -->
					  </td>
                      <td width="560" valign="top">
					    <!-- Seccion Central -->
					  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="textoRuta"><?php Ruta("R");?></td>
                          </tr>
						  <tr><td height="15"></td></tr>
                          <tr>
                            <td>
							<!-- Parte  Central de la Pagina-->
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>
<?php									$rsTicket = new Recordset($SERVER , $DB , $USER , $PASSWORD);
										$query = "SELECT COD_BITC, concat( NOMBRES, \" \", PATERNO, \" \", MATERNO ) , EMAIL, TIPO, TEMA, MENSAJE, FECHA, GENERO 
													FROM PERSONA AS P, BITACORA_C AS BC, TIPO AS T, TEMAS AS M 
													WHERE BC.COD_PERS = P.COD_PERS AND 
													BC.COD_TIPO = T.COD_TIPO AND 
													BC.COD_TEMA = M.COD_TEMA AND 
													COD_BITC = '". $id ."' AND
													RESPUESTA = 'N';";

										$rsTicket->Open($query);
										while($rsTicket->moveNext())
										{ 
											$fila["id"]			= $rsTicket->FieldByNumber(0);
											$fila["nombre"]		= $rsTicket->FieldByNumber(1);
											$fila["email"]		= $rsTicket->FieldByNumber(2);
											$fila["tipo"]		= $rsTicket->FieldByNumber(3);
											$fila["tema"]		= $rsTicket->FieldByNumber(4);
											$fila["mensaje"]	= nl2br($rsTicket->FieldByNumber(5));
											$fila["fecha"]		= $rsTicket->FieldByNumber(6);
											$Genero				= $rsTicket->FieldByNumber(7);
											$Nombres			= $rsTicket->FieldByNumber(1);
											ListaMensaje("N",$fila);
										} ?>
									</td>
								</tr>
								<tr>
									<td><form action="renviado.php" method="post" name="FRespEmail" id="formlist" enctype="multipart/form-data">
									<table width="550" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffffff">
									<tr class="texto-tablas"> 
										<td width="97">Responder
										</td>
									</tr>
									<tr class="texto-tablas"> 
										<td align="center">
<textarea name="cMensaje" rows="6" cols="50">
<?php if($Genero=="M") { echo "Estimado "; } else { echo "Estimada ";}
echo " $Nombres \n\n"; ?></textarea>
										</td>
									</tr>
<!--									
									<tr class="texto-tablas"><td>Adjuntar Archivo &nbsp; <input type="file" name="archivo"  size="32"></td></tr>
<tr class="texto-tablas"><td style="font-family:Arial, Verdana; font-size:0.8em; color: #990000;">Importante: El archivo adjunto no debe exceder los 2MB.</td></tr>
-->								

									<tr> 
										<td colspan="5" align="right">
										
											<input type="hidden" name="id" value="<?=$id?>">
											<input type="hidden" name="global_qk" value="<?php echo $global_qk;?>">
											
											<input type="hidden" name="action" value="send" />
											<input type="hidden" name="maxTam" value="2000000" />
										
											<input type="submit" name="responde" value=" Enviar Respuesta " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
										</td>
									</tr>
									</table></form>
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
