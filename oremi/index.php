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
			    <tr><td class="resumen" colspan="2">Resumen de Eventos </td></tr>
<!-- <tr><td>&nbsp;</td></tr> -->
				<?php 
				// Buscamos los Eventos que el Encargado Regional ha creado
				
				/*
					Parametros globales: 
										Region del Encargado =>
				*/

@include("lib/config.php");
@include("lib/global.php");
@include("lib/recordset.php");
@include("lib/oremi.php");
@include("utiles/utiles.php");
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
				
				?>
				

				</table>
			</td>
		</tr>
<tr><td height="15"></td></tr>

<tr><td height="45"></td></tr>
		<tr><td>
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
				  <tr><td class="subtitulos">Campa&ntilde;as ONEMI (Videos)</td></tr>
                  <tr class="fndsubtitulos">
				      <td>
					     <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
					     <tr><td>				  
				               <ul>
					          <li><a href="videos/EventosMasivos.avi" title="Video Campa&ntilde;a ONEMI para Eventos Masivos">Campa&ntilde;a ONEMI para Eventos Masivos</a></li>
							  <li><a href="videos/OnemiSernatur.avi" title="Video Campa&ntilde;a ONEMI SERNATUR">Campa&ntilde;a ONEMI SERNATUR</a></li>
							  <li><a href="videos/PreparadosTareaTodos.avi" title="Video Campa&ntilde;a ONEMI SERNATUR">Campa&ntilde;a ONEMI Estar Preparados es Tarea de Todos</a></li>
					       </ul>
					    </td>
					</tr>
					</table>
				  </td>
				  </tr>
				</table>
			</td>
		</tr>
<tr><td height="15"></td></tr>



<tr><td height="45"></td></tr>
		<tr><td>
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
				  <tr><td class="subtitulos">Plan Regional de Emergencia </td></tr>
                                  <tr class="fndsubtitulos">
				      <td>
					<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
					<tr><td>				  
				               <ul>
					          <li><a href="descargas/planregional2011.pdf" title="Descargar Documento pdf [4.89MB]">Plan Regional de Emergencia (Actualizado 2011)</a></li>
					       </ul>
					    </td>
					</tr>
					</table>
				  </td>
				  </tr>
				</table>
			</td>
		</tr>
<tr><td height="15"></td></tr>


<tr><td height="45"></td></tr>

<tr><td>
       <table border="0" cellspacing="0" cellpadding="0" width="100%">
          <tr><td class="subtitulos">Estudio: Diagn&oacute;stico &Aacute;reas de Riesgos Localidades Costeras, Regi&oacute;n de Coquimbo</td></tr>
          <tr><td>Encargado por la Secretar&iacute;a Regional Ministerial de Vivienda y Urbanismo Regi&oacute;n de Coquimbo a empresa <a href="http://www.infracon.cl" target="_blank">Infracon S.A.</a></td></tr>
          <tr class="fndsubtitulos">
              <td>
                 <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" >
                    <tr><td>				  
                           <ul>
                              <li>Resumen Ejecutivo &nbsp;<a href="descargas/darc/res_ejecutivo.pdf" title="Descargar Documento PDF [1.85MB]">PDF</a></li>
                           </ul>
                           <br>
                           <b>Carta de Peligros Naturales, V&iacute;as de Evacuaci&oacute;n y Albergues:</b>
                           <ul>
                              <li>Localidad de Punta de Choros: &nbsp; 
                                  <a href="descargas/darc/PuntaDeChoros.pdf" title="Descargar Documento PDF[630 KB]">PDF</a> | 
                                  <a href="descargas/darc/PuntaDeChoros.jpg" title="Descargar Imagen JPG [1.09 MB]">JPG</a>
                              </li>

                              <li>Comuna de La Serena: &nbsp; 
                                  <a href="descargas/darc/LaSerena.pdf" title="Descargar Documento PDF [6.34 MB]">PDF</a> | 
                                  <a href="descargas/darc/LaSerena.jpg" title="Descargar Imagen JPG [10.08 MB]">JPG</a>
                              </li>

                              <li>Comuna de Coquimbo: &nbsp; 
                                  <a href="descargas/darc/Coquimbo.pdf" title="Descargar Documento PDF [10.8 MB]">PDF</a> | 
                                  <a href="descargas/darc/Coquimbo.jpg" title="Descargar Imagen JPG [21 MB]">JPG</a>
                              </li>


                              <li>Localidad de Totoralillo - Las Tacas: &nbsp; 
                                  <a href="descargas/darc/TotoralilloLasTacas.pdf" title="Descargar Documento PDF [900 KB]">PDF</a> | 
                                  <a href="descargas/darc/TotoralilloLasTacas.jpg" title="Descargar Imagen JPG [1.67 MB]">JPG</a>
                              </li>


                              <li>Localidad de Guanaqueros: &nbsp; 
                                  <a href="descargas/darc/Guanaqueros.pdf" title="Descargar Documento PDF [2.15 MB]">PDF</a> | 
                                  <a href="descargas/darc/Guanaqueros.jpg" title="Descargar Imagen JPG [4.24 MB]">JPG</a>
                              </li>


                              <li>Localidad de Tongoy: &nbsp; 
                                  <a href="descargas/darc/Tongoy.pdf" title="Descargar Documento PDF [3.62 MB]">PDF</a> | 
                                  <a href="descargas/darc/Tongoy.jpg" title="Descargar Imagen JPG [3.18 MB]">JPG</a>
                              </li>


                              <li>Localidad de Pichidangui: &nbsp; 
                                  <a href="descargas/darc/Pichidangui.pdf" title="Descargar Documento PDF [9.86 MB]">PDF</a> | 
                                  <a href="descargas/darc/Pichidangui.jpg" title="Descargar Imagen JPG [3.76 MB]">JPG</a>
                              </li>


                              <li>Localidad de Los Vilos: &nbsp; 
                                  <a href="descargas/darc/LosVilos.pdf" title="Descargar Documento PDF [1.68 MB]">PDF</a> | 
                                  <a href="descargas/darc/LosVilos.jpg" title="Descargar Imagen JPG [3.72 MB]">JPG</a>
                              </li>







                           </ul>
                        </td>
                    </tr>
                </table>
              </td>
         </tr>
      </table>
</td>
</tr>


<tr><td height="15"></td></tr>





<tr><td height="45"></td></tr>
		<tr><td>
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
				  <tr><td class="subtitulos">Plan Integral de Seguridad Escolar</td></tr>
                                  <tr class="fndsubtitulos">
				      <td>
					<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
					<tr><td>				  
				               <ul>
					          <li><a href="descargas/plansegesc.ppt" title="Descargar Presentacion PowerPoint [3.53MB]">Presentaci&oacute;n Plan Integral Seguridad Escolar</a></li>
					       </ul>
					    </td>
					</tr>
					</table>
				  </td>
				  </tr>
				</table>
			</td>
		</tr>
<tr><td height="15"></td></tr>
		<tr><td>
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
				  <tr>
		             <td class="subtitulos">
					 Plan de Protecci&oacute;n Civil Taller Operaciones Coordinadas de Emergencias PACEE
					 </td>
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
					</table>
				  </td>
				  </tr>
				</table>
			</td>
		</tr>
<tr><td height="15"></td></tr>
                        <tr>
                           <td>
                              <table width="100%" border="0" cellspacing="1" cellpadding="3">
                                 <tr><td  class="subtitulos" colspan="2">Capacitaci&oacute;n EMACEC [18 Mayo 2009 - COQUIMBO:Estadio Francisco S&aacute;nchez Rumoroso]</td></tr>
                                 <tr class="fndsubtitulos"><td>
                                    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
				       <tr><td>				  
				           <ul>
                                              <li><a href="descargas/emacec/emacec_001.ppt" target="_blank">Reacciones Humanas en Situaciones de Crisis.</a></li>
                                              <li><a href="descargas/emacec/emacec_002.ppt" target="_blank">Marco Jur&iacute;dico y Administrativo en la Gesti&oacute;n Nacional de Prevenci&oacute;n y Seguridad.</a></li>
                                              <li><a href="descargas/emacec/emacec_003.ppt" target="_blank">Metodolog&iacute;a B&aacute;sica en el Dise&ntilde;o de un Plan Integral de Seguridad en Espacios de Asistencia Masiva.</a></li>
                                              <li><a href="descargas/emacec/emacec_004.ppt" target="_blank">Estrategias de Intervenci&oacute;n.</a></li>
                                              <li><a href="descargas/emacec/emacec_005.ppt" target="_blank">Técnicas y Métodos de Entrenamiento.</a></li>

                                          </ul>
                                          </td>
                                      </tr>
                                    </table>
                                   </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>		
		</table></td>
        <td width="1%" >&nbsp;</td>
        <td width="30%">
           <table width="100%" border="0" cellspacing="1" cellpadding="3">
          	<tr>
		    <td valign="top">
                       <table width="100%" border="0" cellspacing="1" cellpadding="3">
		         <tr>
                            <td class="resumen">Hora Oficial Chile</td>
                         </tr>
			 <tr>
                            <td align="center"><iframe src="http://free.timeanddate.com/clock/i2xl4m8/n232/tles4/fn16/fs18/bacccc/pa3" frameborder="0" width="76" height="31"></iframe>
                            </td>
			 </tr>
			 <tr><td></td></tr>
			 <tr><td class="resumen">Hora Oficial UTC</td></tr>
			 <tr><td align="center"><iframe src="http://free.timeanddate.com/clock/i2xl4m8/tles4/fn16/fs18/bacccc/pa3" frameborder="0" width="76" height="31"></iframe></td></tr>

				<?php
/*				$hoy = date("Y-m-d");
				$rsAlerta = new Recordset($SERVER, $DB, $USER, $PASSWORD);
				$sqlAlerta = "SELECT ALERTA_ID, FECHA, TIEMPO, ZONA, TPALERTA, VARIABLE 
								FROM ALERTAS 
								WHERE FECHA=\"$hoy\" ";
				$rsAlerta->Open($sqlAlerta);
				$nroAlerta=$rsAlerta->RecordCount();
				if($nroAlerta>0) {
					$rsAlerta->moveNext();
					$fechaA = split("-", $rsAlerta->FieldByNumber(1) );
					$fechaA = $fechaA[2] . "-" . $fechaA[1] . "-" . $fechaA[0];
					$idA = $rsAlerta->FieldByNumber(0);
					echo "
						<tr><td align=\"center\" class=\"fndsubtitulos\">
								<table >
									<tr><td>Alerta ".$_aAlerta[$rsAlerta->FieldByNumber(4)]."</td></tr>
									<tr><td>Fecha: ".$fechaA."  [".$rsAlerta->FieldByNumber(2)."]</td></tr>
									<tr><td>Zona: ".$rsAlerta->FieldByNumber(3)."</td></tr>
									<tr><td>Variable: ".$_aVariable[$rsAlerta->FieldByNumber(5)]."</td></tr>
								</table>
					";
					
				} else {
					// Hoy No existen Alertas, demos la posibilidad que visualicen el ultimo
					$idA = 0;
					echo "<tr><td align=\"center\">No hay alerta vigente, ver &uacute;ltimo An&aacute;lisis de Riesgo</td></tr>";
				}
*/								
				?>
			<tr><td align="center"><!--<a href="alertas.php?id=<?php echo $idA;?>"><img src="imagenes/io/vealerta.gif" border="0" /></a>--></td></tr>

                        

		     </table>
		   </td>
		</tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellspacing="1" cellpadding="3">
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
</table>
            </td>
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
			  
			  
			  <tr>
            <td colspan="3">
			    <table width="100%" border="0" cellpadding="3" cellspacing="1" >
                   <tr><td colspan="3" class="subtitulos">Campa&ntilde;a Seguridad Infantil</td></tr>
                   <tr class="fndsubtitulos">
                       <td>
					      <table width="100%" border="0" cellspacing="1" cellpadding="3" id="listaManuales">
                             <tr valign="top">
                                 <td>
								    <ul>
                                      <li><a href="descargas/FrasesMP3.rar" title=" Descargar Frases en MP3 ">Descargar Frases en MP3</a></li>
                                      <li><a href="descargas/FrasesWave.rar" title=" Descargar Frases en Wave ">Descargar Frases en Wave</a></li>
									</ul>
					             </td>
                             </tr>
					      </table>
					   </td>
                   </tr>
				   <tr><td colspan="3" class="subtitulos">Campa&ntilde;a Incendios Forestales</td></tr>
                   <tr class="fndsubtitulos">
                       <td>
					      <table width="100%" border="0" cellspacing="1" cellpadding="3" id="listaManuales">
                             <tr valign="top">
                                 <td>
								    <ul>
                                      <li><a href="descargas/IFMP3.rar" title=" Descargar Frases en MP3 ">Descargar Frases en MP3</a></li>
                                      <li><a href="descargas/IFWave.rar" title=" Descargar Frases en Wave ">Descargar Frases en Wave</a></li>
									</ul>
					             </td>
                             </tr>
					      </table>
					   </td>
                   </tr>
			    </table>
			</td>
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
