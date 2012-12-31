<?php
	@include("../config/config.php");
	@include("../../lib/gr-lib.php");
	@include("../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../lib/global.php");
	@include("../../lib/recordset.php");
    umask(0);
	
  $legal_require_php = "r3v15ta";
  global $global_qk;
  $global_qk=0;
  require('../detect.php');

if($loginCorrecto ) { 
  sSuperior(); 
  sRuta("TA"); ?>
              <tr>
                <td>
					<Table border="0" cellpadding="0" cellspacing="0" width="98%">
					  <Tr>
					    <Td class="texto-contenido">
  			<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
<?php
				$titulo_encuesta= $_POST["titulo_encuesta"];
				$nro_preguntas	= $_POST["nro_preguntas"];
				$desde	= $_POST["desde"];
				$hasta	= $_POST["hasta"];

				$contador_error = 0;
				if($titulo_encuesta == '') { $errores[$contador_error++] = "Debe Especificar un Nombre para la Encuesta."; }
				if($desde == '') { $errores[$contador_error++] = "Debe Especificar Desde que Fecha se activara esta Encuesta."; }
				if($hasta == '') { $errores[$contador_error++] = "Debe Especificar Hasta que Fecha se activara esta Encuesta."; }
				if($nro_preguntas == 0) { $errores[$contador_error++] = "El numero de preguntas para esta Encuesta debe ser > 0."; }
				for($nroP=1; $nroP <= $nro_preguntas; $nroP++) {
					//Obtenemos el texto de la pregunta
					$tPreg = preg.$nroP;
					if($$tPreg == '') { $errores[$contador_error++] = "Debe especificar una Posible Respuesta para [".$tPreg."]."; }
				}
								
				
				if($contador_error>0) { 
					echo "
					<table width=\"98%\" border=\"0\" align=\"center\">
						<tr><td height=\"5\" colspan=\"2\"></td></tr>
						<tr class=\"informa\">
					 	<td colspan=\"2\"><img src=\"". _rutaImagenes_ ."ic_error.jpg\" align=\"absmiddle\" >
								Ingreso invalido de datos, los errores son los siguientes:
						</td>
						</tr>
						<tr class=\"informa-texto\">
					 	<td colspan=\"2\"><ul>";	
							for($i=0; $i<$contador_error; $i++)
							{
								echo "\t\t\t<li>",$errores[$i]."</li>\n";
							}
							echo "\t\t</ul>
						</td>
						</tr>
					</table>"; ?>
					<div align='center'> 
						<form action="index.php" id="formlist">
							<input type='submit' value='Volver Inicio'  class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
						</form>
					</div> <?php
				} else {

					$rsAddEncu = new Recordset($SERVER, $DB, $USER, $PASSWORD);
					$t = time();
					$Fdesde = split('[/.-]', $desde);
					$Fddesde = $Fdesde[0];
					$Fmdesde = $Fdesde[1];
					$Fydesde = $Fdesde[2];
					$NFdesde = $Fydesde ."-". $Fmdesde ."-". $Fddesde;

					$Fhasta = split('[/.-]', $hasta);
					$Fdhasta = $Fhasta[0];
					$Fmhasta = $Fhasta[1];
					$Fyhasta = $Fhasta[2];
					$NFhasta = $Fyhasta ."-". $Fmhasta ."-". $Fdhasta;
					$estado="D";
							
					$rsAddEncu->FieldByInsert( "PERSONA_ID" , "'$global_qk'" );
					$rsAddEncu->FieldByInsert( "ENCUESTA_NOMBRE" , "'$titulo_encuesta'" );
					$rsAddEncu->FieldByInsert( "ENCUESTA_INICIO" , "'$NFdesde'" );
					$rsAddEncu->FieldByInsert( "ENCUESTA_TERMINO" , "'$NFhasta'" );
					$rsAddEncu->FieldByInsert( "ENCUESTA_ESTADO" , "'$estado'" );
					$rsAddEncu->FieldByInsert( "TIEMPO_E" , "'$t'" );
					$error = $rsAddEncu->execInsert( "ENCUESTA" , 1);

					if($error==true) { 
						$rsVeEnc = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sqlVeEnc = "SELECT ENCUESTA_ID 
										FROM ENCUESTA 
										WHERE PERSONA_ID='".$global_qk."' AND 
										TIEMPO_E='".$t."'";
						$rsVeEnc->Open($sqlVeEnc);
						while($rsVeEnc->moveNext()) {
							// Recogemos ID de Encuesta y grabamos las preguntas
							$IdEnc = $rsVeEnc->fieldByName("ENCUESTA_ID");
							for($GP=1; $GP <= $nro_preguntas; $GP++) {
								$tPreg = preg.$GP;
								$rsAddEncu->FieldByInsert( "ENCUESTA_ID" , "'$IdEnc'" );
								$rsAddEncu->FieldByInsert( "PREGUNTA" , "'".$$tPreg."'" );
								$error = $rsAddEncu->execInsert( "RESPUESTA" , 1);
							}
						}
						?>
								<table width="98%" border="0" align="center">
								<tr><td height="5" colspan="2"></td></tr>
								<tr class="informa">
									<td colspan="2"><img src="<?php echo _rutaImagenes_ ;?>ic_ok.jpg">&nbsp;Se ha agregado con éxito la informacion.</td>
								</tr>
								<tr>
									<td colspan="2">
									<div align='center'> 
										<form action="<?php echo _AdmPagWeb_ ;?>home.php" id="formlist">
										<input type='submit' value='Volver Inicio'  class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
										</form>
									</div>
									</td>
								</tr>
								<tr><td height="5" colspan="2"></td></tr>											
								</table>

<?php					} else { ?>
								<table width="98%" border="0" align="center">
								<tr><td height="5"></td></tr>
								<tr class="informa">
									<td>
										<img src="<?php echo _rutaImagenes_ ;?>ic_error.jpg" align="absmiddle" >&nbsp;Error al Registrar Encuesta.
									</td>
								</tr>
								<tr class="informa-texto">
									<td>El error pudo deberse a: <br />
									<ul >
										<li>&nbsp; Esta Encuesta ya se encuentra registrada.</li>
										<li>&nbsp; Se ha perdido la conexión.</li>
									</ul>
									</td>
							</tr>
							<tr>
									<td class="informa-texto">Revise sus datos y vuelva a intentar.</td>
							</tr>
							<tr>
									<td align="center">
										<form action="<?php echo _AdmPagWeb_ ;?>home.php" method="post" id="formlist">
										<input type="submit" value=" Volver Atrás " class="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
										</form>
									</td>
							</tr>
							<tr><td height="5"></td></tr>											
							</table>

<?php       		}
			}
						
						
						?>
			<div style="border-bottom:1px dashed #555E77;" align="right">&nbsp;</div>
						</Td>
					  </Tr>
					 </Table>
				</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
<?php
  sSesionActual($global_qk); 
  sModulos($global_qk);
  sPie();
} else {
//No se ha logeado.
	errorConexionGRPanel();
}?>