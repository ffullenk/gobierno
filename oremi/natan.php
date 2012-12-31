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
    <td colspan="3">Oficina Regional de Emergencias Regi&oacute;n de Coquimbo</td>
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
        </table></td>
        <td width="1%" >&nbsp;</td>
        <td width="30%">
			<table width="100%" border="0" cellspacing="1" cellpadding="3">
          	<tr>
		    <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="3">
			    <tr><td class="resumen">Hora Oficial Chile</td></tr>
				<tr><td align="center"><iframe src="http://free.timeanddate.com/clock/i2xl4m8/n232/tles4/fn16/fs18/bacccc/pa3" frameborder="0" width="76" height="31"></iframe></td>
				</tr>
				<tr><td></td></tr>
				<tr><td class="resumen">Hora Oficial UTC</td></tr>
				<tr><td align="center"><iframe src="http://free.timeanddate.com/clock/i2xl4m8/tles4/fn16/fs18/bacccc/pa3" frameborder="0" width="76" height="31"></iframe></td>
				</tr>
				
				
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
        </table></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3"><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr>
            <td valign="top"><table width="100%" border="0" cellpadding="3" cellspacing="1" >
              <tr>
                <td colspan="3" class="subtitulos">Planes de Inundaci&oacute;n</td>
              </tr>
              <tr class="fndsubtitulos">
                <td>
				<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
					<ul>
                    <tr valign="top">
                      <td><h2>Coquimbo y La Serena</h2>
					  <li><a href="coqboser.pdf" target="_blank" title="Descargar Documento PDF [1.93MB]">Introducci&oacute;n</a></li>
					  
					  <li><a href="CITSU_SerenaNorte.pdf" target="_blank" title="Descargar Documento PDF [1.49MB]">CITSU Sector Norte</a></li>
					  <li><a href="CITSU_SerenaSur.pdf" target="_blank" title="Descargar Documento PDF [3.03MB]">CITSU Sector Sur</a></li>					  </td>
                      <td width="3">&nbsp;</td>
                      <td><h2>Los Vilos</h2>
					  <li><a href="losvilos.pdf" target="_blank" title="Descargar Documento PDF [1.02MB]">Introducci&oacute;n</a></li>
					  <li><a href="CITSU_LosVilos.pdf" target="_blank" title="Descargar Documento PDF [1.91MB]">CITSU Los Vilos</a></li></td>
                    </tr>
					</ul>
                </table></td>
              </tr>
            </table></td>
            <td></td>
            <td valign="top"><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
              <tr>
                <td colspan="3" class="subtitulos">Planes</td>
              </tr>
              <tr class="fndsubtitulos">
                <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" id="listaManuales">
					<ul>
                    <tr valign="top">
                      <td>
					  
					  <li><a href="tsunamisenal.pdf" target="_blank" class="blueone" title=" Se&ntilde;al&eacute;tica Informativa para Zonas con Riesgo de Tsunami [102KB]  ">Se&ntilde;al&eacute;tica Informativa</a></li>

					  <li><a href="http://www.onemi.cl/pageview.php?file=plannacional/index.htm" target="_blank" class="blueone" title="Plan Nacional de Protecci&oacute;n Civil">Plan Nacional de Protecci&oacute;n Civil</a></li>

					  <li><a href="http://www.onemi.cl/pageview.php?file=segescolar/segescolar.htm" target="_blank" class="blueone">Seguridad Escolar</a></li>					  </td>
                      <td width="2%">&nbsp;</td>
                      <td><li><a href="oremi.pdf" target="_blank" class="blueone">Manual 
                        Oremi Coquimbo</a></li>
						
						<li><a href="http://www.onemi.cl/pageview.php?file=orient_ciud/oc.htm" target="_blank" class="blueone">Seguridad en el Hogar</a></li>
						<li><a href="http://www.onemi.cl/pageview.php?file=otrosplanes/otros.htm" target="_blank" class="blueone">Por Riesgos Espec&iacute;ficos</a></li>					  </td>
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
					  <li><a href="http://www.onemi.cl/pageview.php?file=cat/cat.htm" target="_blank" title=" Centro de Alerta Temprana [onemi] ">Centro de Alerta Temprana</a></li>
					  
					  <li><a href="http://www.onemi.cl/pageview.php?file=riesgos/riesgos.htm" target="_blank" title=" Gu&iacute;a de Riesgos [onemi] ">Gu&iacute;a de Riesgos</a></li>
					  
					  <li><a href="tsunamisenal.pdf" target="_blank" title=" Se&ntilde;al&eacute;tica Informativa para Zonas con Riesgo de Tsunami [102KB]  ">Se&ntilde;al&eacute;tica Informativa</a></li>
					  
					  <li><a href="http://ssn.dgf.uchile.cl/cgi-bin/sismo_cab.pl" target="_blank" title=" Enlace a Sitio Web con el Informe de los &Uacute;ltimos 30 Sismos Sensibles ">Eventos S&iacute;smicos</a></li>
					  
					  
					  </td>
                      <td>&nbsp;</td>
                      <td>
					  
					  <li><a href="http://neic.usgs.gov/neis/bulletin/" target="_blank">Sismos del Mundo</a></li>
					  <li><a href="http://www.shoa.cl/" target="_blank">Servicio Hidrogr&aacute;fico y Oceanogr&aacute;fico</a></li>
					  <li><a href="http://www.meteochile.cl" target="_blank" title=" Enlace a Sitio Web del Servicio de Meteorolog&iacute;a de Chile">Meteorolog&iacute;a Chile</a></li>
					  <li><a href="http://www.onemi.cl/pageview.php?file=segescolar/segescolar.htm" target="_blank" >Seguridad Escolar</a></li>
					  </td>
                      <td>&nbsp;</td>
                      <td>
<li><a href="http://www.onemi.cl/pageview.php?file=orient_ciud/medirsismo.htm" target="_blank"                     title=" Escala de Mediciones T&eacute;cnicas [onemi] ">Escalas de Medici&oacute;n S&iacute;smica</a></li>

<li><a href="http://www.onemi.cl/pageview.php?file=plannacional/index.htm" target="_blank" title="Plan Nacional de Protecci&oacute;n Civil">Plan Nacional de Protecci&oacute;n Civil</a></li>
							
<li><a href="http://www.ceaza.cl/Ceaza-Met" target="_blank" class="blueone">Meteorolog&iacute;a Local Elqui</a></li>							

					</td>
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
