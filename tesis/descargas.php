<?php
include("bd/conecta.php");
$link = conexion();
?>
<html>
<head>
<title>&middot;::&middot; Gobierno Regional de Coquimbo &middot;&middot;&middot;: Tesis :&middot;&middot;&middot;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="imagenes/gore.ico" rel="SHORTCUT ICON">
<link href="estilo/tesis.css" rel="stylesheet" type="text/css">
<script src="js/fecha.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
  function subWin(loc, nom, ancho, alto, posx, posy) {
    var options="toolbar=0,status=0,menubar=0,scrollbars=1,resizable=1,location=0,directories=0,width=" + ancho + ",height=" + alto;      
        
    win = window.open(loc, nom, options);                 
    win.focus();
    win.moveTo(posx, posy);    
  }

function vldstarea () {
  if(document.formstarea.st_area.value == '-') {
     document.formstarea.st_area.focus();
	 alert('Seleccione un Area.');
	 return false;
  } else {
     document.formstarea.submit();
	 return true;
  }
}
function vldsttipo () {
  if(document.formsttipo.st_tipo.value == '-') {
     document.formsttipo.st_tipo.focus();
	 alert('Seleccione un Tipo.');
	 return false;
  } else {
     document.formsttipo.submit();
	 return true;
  }
}
function vldtit () {
  if(document.formtit.ctitulo.value == '') {
     document.formtit.ctitulo.focus();
	 alert('Debe escribir alguna palabra.');
	 return false;
  } else {
     document.formtit.submit();
	 return true;
  }
}
function vldarea () {
  if(document.formarea.carea.value == '-') {
     document.formarea.carea.focus();
	 alert('Seleccione un Area.');
	 return false;
  } else {
     document.formarea.submit();
	 return true;
  }
}
function vldtipo () {
  if(document.formtipo.ctipo.value == '-') {
     document.formtipo.ctipo.focus();
	 alert('Seleccione un Tipo.');
	 return false;
  } else {
     document.formtipo.submit();
	 return true;
  }
}
function vldinst () {
  if(document.forminst.cinst.value == '-') {
     document.forminst.cinst.focus();
	 alert('Seleccione una Institucion.');
	 return false;
  } else {
     document.forminst.submit();
	 return true;
  }
}
</script>
<style type="text/css">

.Estilo10 {font-size: 12px; }
.Estilo13 {
	color: #666666;
	font-size: 11px;
	font-weight: bold;
}
</style>
</head>
<body bgcolor="#eaeaeb">
<table width="750" border="0" cellpadding="0" cellspacing="1" bgcolor="#333333">
  <tr><td>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="75" height="75" bgcolor="#F2F2F2"><img src="imagenes/logogore.png" width="75" height="75"></td>
    <td bgcolor="#C6CFE5"><img src="imagenes/bnppal.png" width="675" height="75"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" height="1"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
          <td bgcolor="#5475C6" align="left" class="texto-peq">&nbsp;<a href="index.php">&laquo; 
            Volver Portada</a></td>
          <td bgcolor="#5475C6" align="right" class="texto-peq"><font color="#FFFFFF"> 
            <!-- INSERTAR FECHA -->
            <script language="JavaScript">
      
document.write( dayNames[now.getDay()] + " " + now.getDate() + " de " + monthNames[now.getMonth()] + " " +" de " + year);
      
      </script>
            &nbsp;&nbsp;</font> </td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td bgcolor="#FFFFFF" height="10"></td>
  </tr>
</table>
<table width="750" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="450" height="400" valign="top"><table width="445" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
          <td align="center"><img src="imagenes/secport.png" width="438" height="60"></td>
        </tr>
		<tr>
                <td height="5"></td>
              </tr>
        <tr>
          <td><table width="95%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td height="190"><h4 align="center"><strong>TESIS REGIONALES</strong></h4>
                        <table width="480" border="1">
                          <tr>
                            <td width="32" height="45"><div align="center" class="Estilo10">
                              <div align="center"><strong>A&ntilde;o</strong></div>
                            </div></td>
                            <td width="71"><div align="center" class="Estilo10">
                              <div align="center"><strong>Universidad</strong></div>
                            </div></td>
                            <td width="181"><div align="center" class="Estilo10">
                              <div align="center"><strong>Tema</strong></div>
                            </div></td>
                            <td width="168"><div align="center" class="Estilo10">
                              <div align="center"><strong>Alumnos</strong></div>
                            </div></td>
                          </tr>
                          <tr>
                            <td class="Estilo10">2002</td>
                            <td class="Estilo10">U.C.N</td>
                            <td><a href="../tesis/descarga/2002/TESIS TRUJILLO 2006.pdf" class="Estilo10">Evaluaci&oacute;n t&eacute;cnico - econ&oacute;mica de la tecnolog&iacute;a de engorde de cojinoba del norte (Seriolella violacea Guichenot, 1848) en estanques <span class="Estilo13">(Descargar)</span></a></td>
                            <td align="center"><div align="left" class="Estilo10">Oscar Trujillo B.</div></td>
                          </tr>
                           <tr><td height="43" class="Estilo10">2003</td>
                              <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2003/tesis economia gore.doc">Metodolog&iacute;a    para la valoraci&oacute;n econ&oacute;mica de impactos ambientales y para an&aacute;lisis de las    dimensiones socioculturales del proceso productivo del osti&oacute;n del norte de la    Bah&iacute;a de Tongoy Regi&oacute;n de Coquimbo.</a><a href="../tesis/descarga/2003/tesis economia gore.doc" class="Estilo10"> <span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p align="left">Karina Astudillo L. </p>
                              <p align="left">Carolina    Galeb </p>
                            <p align="left">Carolina Mart&iacute;nez S. &nbsp;</p></td>
                          <tr height="43">
                            <td height="43" class="Estilo10">2004</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2004/Tesis Carolina Olivares V.pdf">Asociaci&oacute;n de    polydora bioccipitalis (Polychaeta :Spionidae) y Mesodesma donasium (Bivalvia    Mesodesmatidae) en Bah&iacute;a Tongoy: su caracterizaci&oacute;n y din&aacute;mica poblacional    del hu&eacute;sped</a><a href="../tesis/descarga/2004/Tesis Carolina Olivares V.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">Carolina    Olivares Varas</div></td>
                          </tr> 
                          <tr height="29">
                            <td height="29" class="Estilo10">2004</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2004/Tesis FACTORES QUE INCIDEN .pdf">Factores    que inciden en el &eacute;xito financiero de las incubadoras de negocios en    Chile&nbsp;</a><a href="../tesis/descarga/2004/Tesis FACTORES QUE INCIDEN .pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Natalia    Alvarado Baeza&nbsp;&nbsp;&nbsp;</p>
                              <p> Jorge    Astudillo Ossandon</p>
                            </div></td>
                          </tr>
                          <tr height="43">
                            <td height="43" class="Estilo10">2004</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2004/Modelo de sustentabilidad.pdf">Modelo    de sustentabilidad financiera para incubadoras de empresas: caso asociaci&oacute;n    universitaria para la incubaci&oacute;n de negocios Regi&oacute;n de Coquimbo</a><a href="../tesis/descarga/2004/Modelo de sustentabilidad.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Ronald Dubó Ite</p>
                              <p> Carlos Henriquez Zepeda&nbsp;&nbsp;&nbsp;</p>
                              <p> Ximena Romero Vivero</p>
                            </div></td>
                          </tr>
                          <tr height="43">
                            <td height="68" class="Estilo10">2004</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2004/Estrategia de marketing .pdf">Estrategia    de marketing para el desarrollo tur&iacute;stico cultural de la ciudad de Coquimbo</a><a href="../tesis/descarga/2002/../tesis/descarga/2004/Estrategia de marketing .pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Juan Jimenez Lagos</p>
                              <p> Jos&eacute; Maureira Schmied&nbsp;&nbsp;&nbsp;</p>
                              <p>    Juan Uribe Cerda</p>
                            </div></td>
                          </tr>
                          <tr height="29">
                            <td height="29" class="Estilo10">2004</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2004/Presentación Lombricultura.ppt">Lombricultura    estudio y evaluaci&oacute;n de proyecto sobre la lombriz roja californiana en la    Provincia del Elqui</a><a href="../tesis/descarga/2002/TESIS TRUJILLO 2006.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Rafael    Carmona P.</p>
                              <p>    Cristian Lanas H.</p>
                            </div></td>
                          </tr>
                          <tr height="43">
                            <td height="43" class="Estilo10">2005</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2005/Plan de marketing .pdf">Plan    de marketing de fidelizaci&oacute;n para el consumidor del comercio de La Serena    centro&nbsp;</a><a href="../tesis/descarga/2005/Plan de marketing .pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Lorena    Parra Rojas&nbsp;</p>
                              <p> Antonieta Pavez Gutierrez&nbsp;&nbsp;</p>
                              <p> Eduardo Vergara L&oacute;pez&nbsp;</p>
                            </div></td>
                          </tr>
                          <tr height="17">
                            <td height="17" class="Estilo10">2005</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2005/Análisis genético.pdf">An&aacute;lisis    gen&eacute;tico poblacional de la macha, Mesodesma&nbsp;    donacium.</a><a href="../tesis/descarga/2005/Análisis genético.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">Nicole    Urriola Urriola</div></td>
                          </tr>
                          <tr height="29">
                            <td height="29" class="Estilo10">2005</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2005/JavierOrmeñoR.pdf">Estrat&eacute;gias    de conservac&oacute;n de Biodiversidad en el humedal costero El Culebr&oacute;n, Coquimbo    Chile desde la perspectiva del uso de suelo y sus impactos sobre el    ecosistema&nbsp;</a><a href="../tesis/descarga/2005/JavierOrmeñoR.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">Javier    Orme&ntilde;o Rojas&nbsp;</div></td>
                          </tr>
                          <tr height="43">
                            <td height="43" class="Estilo10">2005</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2005/Impacto de la aplicación.pdf">Impacto    de la aplicaci&oacute;n del programa filosof&iacute;a para ni&ntilde;os en 5&ordm; b&aacute;sico de la escuela    Miguel de Cervantes sobre el desarrollo del pensamiento cr&iacute;tico y en    funcionamiento de una comunidad de indagaci&oacute;n</a><a href="../tesis/descarga/2005/Impacto de la aplicación.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Javier Araya Acosta&nbsp;&nbsp;</p>
                              <p> Tatiana Escobar&nbsp; Reyes&nbsp;</p>
                            </div></td>
                          </tr>
                          <tr height="29">
                            <td height="29" class="Estilo10">2005</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2005/Mariela Ibacache C.rar">Dise&ntilde;o    y estrategia de desarrollo de productos tur&iacute;sticos asociados al turismo    cultural en la ciudad de Salamanca y el valle del R&iacute;o Chalinga</a><a href="../tesis/descarga/2005/Mariela Ibacache C.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">Mariela    Ibacache C.</div></td>
                          </tr>
                          <tr height="29">
                            <td height="29" class="Estilo10">2005</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2005/Cristian Diaz- osvaldo gonzalez.rar">An&aacute;lisis    y determinaci&oacute;n de la influencia de la variable tiempo en las propiedades de    desempe&ntilde;o de un suelo estabilizado en base a sales&nbsp;</a><a href="../tesis/descarga/2005/Cristian Diaz- osvaldo gonzalez.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Cristian    D&iacute;az Labarca&nbsp;</p>
                              <p> Osvaldo Gonz&aacute;lez Zepeda</p>
                            </div></td>
                          </tr>
                          <tr height="43">
                            <td height="43" class="Estilo10">2006</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2006/MANDARINAS.pdf">Propuesta    de elementos base para un acuerdo de procucci&oacute;n limpia (APL) para el proceso    de cosecha y packing de mandarinas de la Provincia del Limar&iacute;, Regi&oacute;n de    Coquimbo</a><a href="../tesis/descarga/2006/MANDARINAS.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Carolina Hernandez V.</p>
                              <p> Macarena    Loyola Collao&nbsp;&nbsp;&nbsp;</p>
                              <p> Sofia Martinez Vega&nbsp;</p>
                            </div></td>
                          </tr>
                          <tr height="43">
                            <td height="43" class="Estilo10">2006</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2006/Propuesta de una guia.pdf">Propuesta    de una gu&iacute;a metodolog&iacute;a para un adecuado proceso de planificaci&oacute;n estrat&eacute;gica    en la peque&ntilde;a y mediana empresa del sector industrial servicios de la    ciudades de La Serena y Coquimbo</a><a href="../tesis/descarga/2006/Propuesta de una guia.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Michel    Ortiz Bilbao</p>
                              <p> Rosa Rom&aacute;n Gonz&aacute;lez&nbsp;&nbsp;</p>
                              <p> Rodolfo Vilarroel Cort&eacute;s</p>
                            </div></td>
                          </tr>
                          <tr height="43">
                            <td height="43" class="Estilo10">2006</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2006/Valoración Económica .pdf">Valoraci&oacute;n Econ&oacute;mica de los Impactos Producidos por los Pasivos Ambientales Mineros </a><a href="../tesis/descarga/2006/Valoración Económica .pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Francisco Cruzat</p>
                              <p>Nicolas Mu&ntilde;oz Alvarez&nbsp;&nbsp;</p>
                              <p> Roman Ruiz Moreno</p>
                            </div></td>
                          </tr>
                          <tr height="17">
                            <td height="17" class="Estilo10">2006</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2006/José Tapia.pdf">An&aacute;lisis    de aluviones de origen pluvial cuanca R&iacute;o Elqui IV Regi&oacute;n</a><a href="../tesis/descarga/2006/José Tapia.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">Jos&eacute;    Tapia Ugalde</div></td>
                          </tr>
                          <tr height="43">
                            <td height="43" class="Estilo10">2006</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2006/GESTIÓN SUSTENTABLE TONGOY.rar">Propuesta    de gesti&oacute;n sustentable para microempresas de alojamiento tur&iacute;stico de la    localidad de Tongoy, a trav&eacute;s d eun modelo emergente&nbsp;</a><a href="../tesis/descarga/2006/GESTIÓN SUSTENTABLE TONGOY.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><div align="left">
                              <p>Leonel    Ledezma D&iacute;az&nbsp;&nbsp;&nbsp;</p>
                              <p> Pamela Rodriguez Uribe&nbsp;</p>
                              <p> V&iacute;ctor Romo Guti&eacute;rrez</p>
                            </div></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2006</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2006/Producción de pimiento.pdf">Producci&oacute;n de    pimiento H&uacute;ngaro en la Provincia del Limar&iacute;, cuarta Regi&oacute;n de Coquimbo    an&aacute;lisis y propuesta comercial&nbsp;</a><a href="../tesis/descarga/2006/Producción de pimiento.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Marcela G&oacute;mez Guzman </p>
                            <p> Claudia Huerta Gonz&aacute;lez</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2006</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><p><a href="../tesis/descarga/2006/Medición de.ppt">Medici&oacute;n de las ganancias netas de la producci&oacute;n y comercializacion de la uva de mesa de exportaci&oacute;n de la Region de Coquimbo.</a><a href="../tesis/descarga/2006/Medición de.ppt" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></p>                            </td>
                            <td class="Estilo10"><p>Juan Aracena Benavides</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U. Aconcagua</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Fredie Collao.pdf">Caracterizaci&oacute;n    y propuesta para la remoci&oacute;n de pasivos ambientales mineros de la zona urbana    de la comuna de Andacollo,&nbsp; Regi&oacute;n de    Coquimbo</a><a href="../tesis/descarga/2007/Fredie Collao.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Fredie    Collao Vicentelo</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U. CENTRAL</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Perspectivas del mercado.pdf">Perspectivas    del mercado de exportaci&oacute;n de la alcachofa en conservas y congelados para el    mercado de Estados Unidos</a><a href="../tesis/descarga/2002/TESIS TRUJILLO 2006.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Caroll Valenzuela Guzmán</p>
                            <p>Ed&iacute;n    Gaete Vera&nbsp;&nbsp;</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Marketing social .pdf">Marketing    social para la prevenci&oacute;n del consumo de marihuana en escolares de ense&ntilde;anza    media de la Regi&oacute;n de Coquimbo</a><a href="../tesis/descarga/2007/Marketing social .pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Jorge    Vera Vittini&nbsp;&nbsp;</p>
                            <p> Daniel Vergara Ca&ntilde;as</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Propuesta de apoyo.pdf">Propuesta    de apoyo a la micro y peque&ntilde;a empresa de la regi&oacute;n de Coquimbo a trav&eacute;s del    leasing financiero de equipos tecnol&oacute;gicos</a><a href="../tesis/descarga/2007/Propuesta de apoyo.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Luis Moyano Moyano&nbsp;&nbsp; </p>
                              <p>Erwin Risco Tapia&nbsp;</p>
                            <p> Felipe V&eacute;liz    Lizana</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Plan de Marketing.pdf">Plan    de marketing tur&iacute;stico para el valle del Choapa.</a><a href="../tesis/descarga/2007/Plan de Marketing.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Christian    Alfaro D.&nbsp;&nbsp;</p>
                              <p> Sergio Helo V.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <p> Priscila Zambra Z.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Analisis de los efectos.pdf">An&aacute;lisis    de los efectos de la ley N&ordm; 20.123 de subcontrataci&oacute;n en las empresas    constructoras de la Regi&oacute;n de Coquimbo</a><a href="../tesis/descarga/2007/Analisis de los efectos.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Daniel    Altamirano Ahumada&nbsp;</p>
                              <p>Andr&eacute;s Fari&ntilde;a Nu&ntilde;ez&nbsp;</p>
                            <p> Eduardo Quintana    Garc&iacute;a&nbsp;</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Analisis comparativo .pdf">An&aacute;lisis    comparativo en materias de prevenci&oacute;n de riesgos entre empresas mandantes y    contratistas del rubro construcci&oacute;n&nbsp;</a><a href="../tesis/descarga/2007/Analisis comparativo .pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Ximena    Mu&ntilde;oz Dub&oacute;</p>
                            <p> Anastacia Rubina Talandianos</p></td>
                          </tr>
                          
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Determinacion de impacto.pdf">Detserminaci&oacute;n    de impacto ambientales causados por el desarrollo urbano en el estero    culebr&oacute;n, IV Regi&oacute;n Chile aplicando metodolog&iacute;a SIG.</a><a href="../tesis/descarga/2007/Determinacion de impacto.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Mar&iacute;a    Daniela Cerasa A.&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <p> Lorena    Mart&iacute;nez S.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/manejo de Residuos Sólidos Vegetales..pdf">Plan    de manejo de residuos s&oacute;lidos vegetales para la Ilustre Municipalidad de La    Serena</a><a href="../tesis/descarga/2007/manejo de Residuos Sólidos Vegetales..pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Roberto    Andueza N.&nbsp;</p>
                                <p> Ignacio Flores Q.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <p> Fernando Torres G.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Propuesta de un modelo.pdf">Propuesta    de un modelo de calidad de servicio para las &aacute;reas de geriatr&iacute;a y odontolog&iacute;a    del hospital San Juan de Dios de La Serena</a><a href="../tesis/descarga/2007/Propuesta de un modelo.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Paulina    Hervas Figueroa&nbsp;&nbsp;</p>
                              <p> Sebasti&aacute;n Slater Contreras&nbsp;</p>
                            <p> Karen Tapia Rojas&nbsp;</p></td>
                          </tr>
                            <!-- <tr height="80">
                            <td height="80" class="Estilo10"><strong>2007</strong></td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10">Valoraci&oacute;n    econ&oacute;mica de los impactos producidos por los pasivos ambientales mineros</td>
                            <td class="Estilo10"><p>Francisco    Cruzat Su&aacute;rez&nbsp;&nbsp;</p>
                                <p> Nicol&aacute;s    Mu&ntilde;oz &Aacute;lvarez</p>
                              <p> Rom&aacute;n    Ruiz Moreno</p></td>
                          </tr> -->
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Ocupación de terrenos.pdf">Ocupaci&oacute;n    de terrenos aptos para la agricultra por la expansi&oacute;n urbana de la comuna de    La Serena en el a&ntilde;o 2004 respecto del a&ntilde;o 1978. identificaci&oacute;n de principales    impactos negativos mediante metodolog&iacute;a SIG.</a><a href="../tesis/descarga/2007/Ocupación de terrenos.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Marjorie    Meri&ntilde;o A.</p>
                            <p> Mar&iacute;a Eugenia Soto A.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Factibilidad  de un terminal.pdf">Factibilidad    econ&oacute;mica de un terminal de cruceros en el puerto de Coquimbo</a><a href="../tesis/descarga/2007/Factibilidad  de un terminal.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Marisol    Alvear Huilip&aacute;</p>
                              <p>Walter    Flores V&eacute;liz&nbsp;&nbsp;</p>
                            <p> Jorge Y&aacute;&ntilde;ez Iglesias</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Juan Aravena Benavides.pdf">Medici&oacute;n    de las ganancias netas de la producci&oacute;n y comercializaci&oacute;n de la uva de mesa    de exportaci&oacute;n de la Regi&oacute;n de Coquimbo</a><a href="../tesis/descarga/2007/Juan Aravena Benavides.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Juan    Aravena Benavides</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Factoring como herramienta .pdf">Factoring como    herramienta de apoyo a las Mipymes de la Regi&oacute;n de Coquimbo</a><a href="../tesis/descarga/2007/Factoring como herramienta .pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Marjorie Cort&eacute;s    Rodr&iacute;guez</p>
                              <p> V&iacute;ctor Escobar Torres&nbsp;</p>
                            <p> Yanet    Rojas Julio</p></td>
                          </tr>
                          
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Modelo de auditoria.pdf">Modelo    de auditor&iacute;a ambiental para tranques de relave</a><a href="../tesis/descarga/2007/Modelo de auditoria.pdf" class="Estilo10"><span class="Estilo13">.(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Juan    Cort&eacute;s Cort&eacute;s&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <p> Osvaldo Dunstan Pizarro</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Plan de marketing australiano.pdf">Plan    de marketing para la oferta tur&iacute;stica de la Regi&oacute;n de Coquimbo enfocado en el    mercado australiano</a><a href="../tesis/descarga/2002/TESIS TRUJILLO 2006.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Claudia    Araya Molina</p>
                            <p> Marcelo    Olivares Arenas</p></td>
                          </tr>   <!-- 
                          <tr height="80">
                            <td height="80" class="Estilo11">2007</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10">Dise&ntilde;o    y estrategias de desarrollo de productos tur&iacute;sticos asociados a la    valorizaci&oacute;n del patrimonio hist&oacute;rico cultural del pueblo de Guayac&aacute;n, comuna    de Coquimbo</td>
                            <td class="Estilo10">Tamara    Cerda Pinto&nbsp;</td>
                          </tr> -->
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/ECONOMIA MINERA NO METALICA.pdf">Econom&iacute;a    minera no met&aacute;lica en la comuna de Coquimbo sustentabilidad y proyecciones    comeciales de la industria del Carebonato de calcio&nbsp;</a><a href="../tesis/descarga/2007/ECONOMIA MINERA NO METALICA.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Marcela    Zambrano Rodr&iacute;guez&nbsp;</p>
                            <p> Yenny    Zelada Rojas</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Planificación para el desarrollo.rar">Planificaci&oacute;n    para el desarrollo de un turismo sostenible en peque&ntilde;as localidades&nbsp;</a><a href="../tesis/descarga/2007/Planificación para el desarrollo.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Mario    Contreras Godoy&nbsp;&nbsp;</p>
                            <p> Carla Figueroa Vargas&nbsp;</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Carmen Villanueva Meléndez.rar">Propuesta    para la planificaci&oacute;n de un turismo sustentabe desde la comunidad de Tongoy.</a><a href="../tesis/descarga/2007/Carmen Villanueva Meléndez.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Carmen    Villanueva Mel&eacute;ndez</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Ricardo Díaz Gómez.ppt">Diagn&oacute;stico    de la aplicaci&oacute;n de las pr&aacute;cticas de Responsabilidad Social Empresarial (RSE)    en los grandes y medianos hoteles de la ciudad de La Serena, propuesta de un    programa de RSE.</a><a href="../tesis/descarga/2007/Ricardo Díaz Gómez.ppt" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Ricardo    D&iacute;az G&oacute;mez</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Evaluación de un estabilizador de suelos.rar">Evaluaci&oacute;n    de un estabilizador de suelos, en base a pol&iacute;meros como alternativa de    soluci&oacute;n para el mejoramiento de caminos en tierra</a><a href="../tesis/descarga/2007/Evaluación de un estabilizador de suelos.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Juan    Castro Acu&ntilde;a</p>
                            <p> Pablo    Guti&eacute;rrez Araya&nbsp;</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Ariel Rojas Argandoña.pdf">Estudio    de la cin&eacute;tica de tranferencia de materia durante el secado del pimiento rojo    varieda h&uacute;ngaro (Capsicum Annuum)</a><a href="../tesis/descarga/2007/Ariel Rojas Argandoña.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Ariel Rojas Argando&ntilde;a</td>
                          </tr>
                          
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Logan Leyton.rar">Domicilio    Urbano Contempor&aacute;neo</a><a href="../tesis/descarga/2007/Logan Leyton.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Logan    Leyton</td>
                          </tr>  <!-- 
                          <tr height="80">
                            <td height="80" class="Estilo10"><strong>2007</strong></td>
                            <td class="Estilo10">U.S.T.</td>
                            <td class="Estilo10">Expectativas    laborales de familias con hijos con discapacidad intelectual&nbsp;</td>
                            <td class="Estilo10"><p>Mar&iacute;a    Ang&eacute;lica Castro Reyes</p>
                                <p> Corina Varas Varas</p></td>
                          </tr> -->
                          <tr height="80">
                            <td height="80" class="Estilo10">2007</td>
                            <td class="Estilo10">U.S.T.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2007/Características sociales.rar">Caracter&iacute;sticas    sociales de los adultos mayores que se encuentran en proceso de abandono en    la comuna de Andacollo</a><a href="../tesis/descarga/2002/TESIS TRUJILLO 2006.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Janette    Carmona Guerrero&nbsp;</p>
                            <p> Carolina Neira Saavedra&nbsp;</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U. Aconcagua</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Bernardo Carrasco García.rar">Evaluaci&oacute;n    econ&oacute;mica de un proyecto de riego tecnificado, en el secano comunitario de la    Regi&oacute;n de Coquimbo, usando energ&iacute;as alternativas.</a><a href="../tesis/descarga/2008/Bernardo Carrasco García.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Bernardo    Carrasco Garc&iacute;a</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U. Aconcagua</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Luis Bravo Camberes.rar">Evaluaci&oacute;n    t&eacute;cnica de un proyecto de riego en el secano de la Regi&oacute;n de Coquimbo, basado    en el uso de energ&iacute;as alternativas</a><a href="../tesis/descarga/2008/Luis Bravo Camberes.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Luis    Bravo Camberes</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U. Aconcagua</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Evaluacion de la contaminacion.rar">Evaluaci&oacute;n de    la contaminaci&oacute;n por microbasuras en la zona supremareal producto de la    actividad tur&iacute;stica informal e industria acu&iacute;cola en las playas de las bah&iacute;as    Tongoy, Guanaqueros y Barnes Regi&oacute;n de Coquimbo</a><a href="../tesis/descarga/2008/Evaluacion de la contaminacion.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>&Aacute;lvaro    Rodr&iacute;guez Araya&nbsp;&nbsp;&nbsp;</p>
                                <p> Luis Chirino Guajardo&nbsp;&nbsp;&nbsp;</p>
                            <p> Rodolfo Olivares Alca&iacute;no</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U. del Mar</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Estudio descriptivo.pdf">Estudio    descriptivo de la evaluaci&oacute;n a alumnos con necesidades educativas especiales    de segundo ciclo b&aacute;sico en el subsector idioma extranjero ing&eacute;s en    establecimientos municipalizados y particular subvencionados de la comuna de    La Serena y Coquimbo</a><a href="../tesis/descarga/2008/Estudio descriptivo.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Ana    Mar&iacute;a Astudillo Steppes</p>
                              <p> P&iacute;a Garcia Estay</p>
                            <p> Mar&iacute;a Eugenia Ortiz Bonilla&nbsp;</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Plan integral para la gestión.rar">Plan&nbsp; integral para la gesti&oacute;n sustentable de    residuos s&oacute;lidos en la comuna de Coquimbo</a>.<a href="../tesis/descarga/2008/Plan integral para la gestión.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Jimena    Reinoso M&uuml;ller&nbsp;</p>
                            <p> Luis    Henr&iacute;quez Soto</p></td>
                          </tr>
                          
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Medición del conocimiento.rar">U</a>.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Medición del conocimiento.rar">Medici&oacute;n    del conocimiento de la certificaci&oacute;n de competencias laborales en hoteler&iacute;a y    gastronom&iacute;a en las ciudades de La Serena y Coquimbo</a><a href="../tesis/descarga/2008/Medición del conocimiento.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Carola    Gallardo Castex&nbsp;</p>
                            <p> Marcela Zaffiri Guti&eacute;rrez</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Simulación de incendios.rar">Simulaci&oacute;n    de incendios forestales mediante Sig, en el parque nacional bosque Fray    Jorge&nbsp;</a><a href="../tesis/descarga/2008/Simulación de incendios.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Alvaro    Pacheco H.&nbsp;&nbsp;&nbsp;</p>
                            <p> Benjam&iacute;n Cornejo P.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Emerson Galleguillos.rar">Centro    n&aacute;utico Gualliguaica</a><a href="../tesis/descarga/2008/Emerson Galleguillos.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Emerson    Galleguillos Sarmiento&nbsp;</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Elena Alucema Araya .rar">Mejoramiento    de la actual red de monitoreo de aguas subterraneas de la cuenca del r&iacute;o    Elqui&nbsp;</a><a href="../tesis/descarga/2008/Elena Alucema Araya .rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Elena    Alucema Araya&nbsp;</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2008</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2008/Oportunidades comerciales.pdf">Oportunidades    comercialez y de inversi&oacute;n para la regi&oacute;n de Coquimbo a partir del tratado de    libre comercio dentre Chile y Jap&oacute;n</a><a href="../tesis/descarga/2008/Oportunidades comerciales.pdf" class="Estilo10"><span class="Estilo13">.(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Priscilla    Fajardo G.</p>
                            <p> Fabiola    Santa Mar&iacute;a O.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U. Aconcagua</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Sebastián Latrach.rar">Caracterizaci&oacute;n    del agente causal involucrado en la producci&oacute;n de cera en plantas de brea    (pluchea absinthioides ( Hokk. Et Arn.) H. Robinson et Cuatrec.) y su    factibilidad econ&oacute;mica.</a><a href="../tesis/descarga/2009/Sebastián Latrach.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Sebasti&aacute;n    Latrach Torres</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.    del Mar</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Caracterización y evaluación.rar">Caracterizaci&oacute;n    y evaluaci&oacute;n de compost obtenidos a partir de Ulva spp. Var costata    (Lechuguilla)</a><a href="../tesis/descarga/2009/Caracterización y evaluación.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Luis    Espinosa E.&nbsp;&nbsp;&nbsp;</p>
                                <p> Camila Gonz&aacute;lez M.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.    del Mar</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Caracterización y evaluación de extractos.rar">Caracterizaci&oacute;n    y evaluaci&oacute;n&nbsp; de extractos obtenidos a    partir del compostaje de Ulva spp. Var costata (Lechuguilla)</a><a href="../tesis/descarga/2002/TESIS TRUJILLO 2006.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Jean    Pierre Compas&nbsp;</p>
                                <p> Alejandra&nbsp; Rojas B.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.    del Mar</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Evaluación del rendimiento.rar">Evaluaci&oacute;n    del rendimiento y calidad de la cosecha del Hongo Shiitake (Lentinula edodes)    sobre sustratos de disponibilidad en la Regi&oacute;n de Coquimbo.</a><a href="../tesis/descarga/2009/Caracterización y evaluación de extractos.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Pablo    Mart&iacute;nez Hormaz&aacute;bal&nbsp;</p>
                                <p> Jos&eacute;    Pizarro Rojas&nbsp;&nbsp;&nbsp;</p>
                              <p> Alejandra Vega D&iacute;az</p></td>
                          </tr>
                          
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U. del Mar</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Estudio descriptivo de los niveles.pdf">Estudio    descriptivo de los niveles del lenguaje que se presentan descendidos en ni&ntilde;os    y ni&ntilde;as diagnosticados con TEL, cuyas edades son entre 3 a&ntilde;os a 5 a&ntilde;os 11    meses, pertenecientes al sector urbano comuna de La Serena</a>.<a href="../tesis/descarga/2009/Estudio descriptivo de los niveles.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Valentina    Mar&iacute;n Zeballos&nbsp;&nbsp;</p>
                                <p> Paloma Miranda    G&oacute;mez&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                              <p> Karina Rodr&iacute;guez    Cabeza</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Víctor Inostroza.rar">Plan    integral de manejo de residuos s&oacute;lidos generados en el rubro construcci&oacute;n    bajo un enfoque de producci&oacute;n limpia IV regi&oacute;n.</a><a href="../tesis/descarga/2009/Víctor Inostroza.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">V&iacute;ctor    Inostroza Palacios</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Evaluación del impacto económico.rar">Evaluaci&oacute;n    del impacto econ&oacute;mico de la agricultura de precisi&oacute;n en la producci&oacute;n de uva    vin&iacute;fera en la Regi&oacute;n de Coquimbo.</a><a href="../tesis/descarga/2009/Evaluación del impacto económico.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Cristian    Calder&oacute;n Vargas&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <p> Cristian    Henr&iacute;quez Mu&ntilde;oz</p>
                              <p> Jonathan    Jorquera Tapia</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Modelación fisicoquímica.rar">Modelaci&oacute;n    fisicoqu&iacute;mica para calidad de aguas en el sistema h&iacute;drico del embalse    Corrales</a>.<a href="../tesis/descarga/2009/Modelación fisicoquímica.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Enzo    Bonilla P&eacute;rez&nbsp;&nbsp;&nbsp;</p>
                                <p> Marcelo Fuentes Rojas&nbsp;</p>
                              <p> Hugo Maturana P&eacute;rez</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Luis Salfate.rar">An&aacute;lisis    del estado actual de la capacidad de innovaci&oacute;n en las Mipymes del sector    turismo localizadas en la provincia de Elqui</a>.<a href="../tesis/descarga/2009/Luis Salfate.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Luis    Salfate A.</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Evaluación del funcionamiento.rar">Evaluaci&oacute;n    del funcionamiento del programa de capacitaci&oacute;n a las Mypes del Servicio    Nacional de Capacitaci&oacute;n y Empleo.</a><a href="../tesis/descarga/2009/Evaluación del funcionamiento.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Enzo    Altamirano Buono-Core&nbsp;&nbsp;</p>
                                <p> Luis    Mu&ntilde;oz Lenck</p></td>
                          </tr>
                          
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.C.N.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Carolina Torrejón.rar">Diagn&oacute;stico    de la gesti&oacute;n innovadora de las empresas vitivin&iacute;colas en la provincia del    Limar&iacute;, Regi&oacute;n de Coquimbo.</a><a href="../tesis/descarga/2009/Carolina Torrejón.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Carolina    Torrej&oacute;n Castillo</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Estrategia de exportación de uva.rar">Estrategia    de exportaci&oacute;n de uva de mesa a la provincia China de Guangdong, a trav&eacute;s de    una mediana empresa, caso Agrinorth, Regi&oacute;n de Coquimbo.</a><a href="../tesis/descarga/2009/Estrategia de exportación de uva.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Roc&iacute;o    Donozo M.&nbsp;&nbsp;</p>
                                <p> Tamara Flores G.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/telemedicina.rar">Dise&ntilde;o    y desarrollo de un sistema de telemedicina para la monitorizaci&oacute;n remota de    pacientes.</a><a href="../tesis/descarga/2009/telemedicina.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Samuel    L&oacute;pez Miranda&nbsp;&nbsp;&nbsp;</p>
                                <p> Wilber    Villacorta Quispe</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Plan de marketing estratégico.rar">Plan    de marketing estrat&eacute;gico para el &aacute;rea Los Choros como un destino tur&iacute;stico    sustentable.</a><a href="../tesis/descarga/2009/Plan de marketing estratégico.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Paulo    &Aacute;vila Pousa&nbsp;</p>
                                <p> Gabriel V&aacute;squez Opazo&nbsp;&nbsp;&nbsp;&nbsp;</p>
                              <p> Robinson Villalobos Villalobos</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/TESIS_MERLIN_RIVERA.pdf">Producci&oacute;n    de abono org&aacute;nico y biog&aacute;s mediante biodigastaci&oacute;n aner&oacute;bica de lodos activos.</a><a href="../tesis/descarga/2009/TESIS_MERLIN_RIVERA.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Merl&iacute;n    Rivera</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Jorge Rojas.rar">Panel    anal&iacute;tico regional de cata de aceites: importancia del entrenamiento continuo    en la valoraci&oacute;n organol&eacute;ptica de aceites de oliva v&iacute;rgenes.</a><a href="../tesis/descarga/2009/Jorge Rojas.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Jorge    Rojas Olivares</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/bristow-campbel.rar">Utilizaci&oacute;n    del modelo bristow-campbell e incorporaci&oacute;n del efecto topogr&aacute;fico en la    estimaci&oacute;n y mapeo de la radiaci&oacute;n solar en la regi&oacute;n de Coquimbo.</a><a href="../tesis/descarga/2009/bristow-campbel.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Miguel    Carcuro M.&nbsp;</p>
                                <p> Luis de Giorgis M.</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Heidi Herrera.pdf">Perfil    de competencias del agente de desarrollo local, definido mediante el m&eacute;todo    empleo tipo estudiado en su din&aacute;mica ETED.</a><a href="../tesis/descarga/2009/Heidi Herrera.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Heidi    Herrera Ortega</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Johanna Aguilar.rar">Evaluaci&oacute;n    de impacto de programas orientados al sector tur&iacute;stico en las redes    pertenecientes al programa Coquimbo emprende.</a><a href="../tesis/descarga/2009/Johanna Aguilar.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Johanna    Aguilar S.</td>
                          </tr>
                          
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Viviana Arias.rar">Efecto de la    aplicaci&oacute;n de altas presiones hidrost&aacute;ticas sobre los par&aacute;metros de calidad    del jugo de lim&oacute;n (citrus lim&oacute;n) variedad Eureka.</a><a href="../tesis/descarga/2009/Viviana Arias.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Viviana Arias    Araya</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/instrumento financiero.rar">Estudio    de los resultados del instrumento financiero capital semilla Sercotec    entregado a las mipyme de la Regi&oacute;n de Coquimbo</a>.<a href="../tesis/descarga/2009/instrumento financiero.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Sabrina    Vilches Navarro&nbsp;&nbsp;</p>
                                <p> Javiera Rojas    Castillo</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.    L. S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Cristina Caimanque.rar">Aplicaci&oacute;n    de altas presiones hidrost&aacute;ticas al gel de aloe vera (aloe barbadensis    miller): evaluaci&oacute;n de sus propiedades fisicoqu&iacute;micas y capacidad    antioxidante.</a><a href="../tesis/descarga/2009/Cristina Caimanque.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Cristina    Caimanque Olmedo</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U.L.S.</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/audiovisual.rar">Dise&ntilde;o    de un manual audiovisual para docentes y alumnos de ense&ntilde;anza b&aacute;sica que les    permita crear distintos proyectos audiovisuales.</a><a href="../tesis/descarga/2009/audiovisual.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Paz    Toro&nbsp;&nbsp;</p>
                                <p> Jenny Galleguillos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                              <p> Cecilia Lizama</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U. Pedro de Valdivia</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/Daniela Nettle.rar">Elaboraci&oacute;n    y validaci&oacute;n de un instrumento para la detecci&oacute;n de v&iacute;ctimas de bullying en    ni&ntilde;os y ni&ntilde;as de cuarto a octavo b&aacute;sico en cuatro colegios municipales de la    IV Regi&oacute;n.</a><a href="../tesis/descarga/2009/Daniela Nettle.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10">Daniela    Nettle Vacher</td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U. Santo Tom&aacute;s</td>
                            <td class="Estilo10"><a href="../tesis/descarga/2009/ust.pdf">Diagn&oacute;stico y    propuestas de mejoramiento de la comunicaci&oacute;n externa del Gobierno Regional    de Coquimbo.</a><a href="../tesis/descarga/2009/ust.pdf" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></td>
                            <td class="Estilo10"><p>Patricia    Evensen Ortega&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <p> Karen    Soler V&eacute;liz</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2009</td>
                            <td class="Estilo10">U. Santo Tom&aacute;s</td>
                            <td class="Estilo10"><p><a href="../tesis/descarga/2009/region estrella.rar">Estudio,Evalucion y Plaeanmientode propuestas para la mejora en la campa&ntilde;a &quot;Regi&oacute;n de Coquimbo, Region Estrella&quot;<strong>.</strong></a><a href="../tesis/descarga/2009/region estrella.rar" class="Estilo10"><span class="Estilo13">(Descargar)</span></a></p>                              </td>
                            <td class="Estilo10"><p>Bernardita Balta Correa&nbsp;&nbsp;&nbsp;</p>
                                <p>Daniela Morales Alfaro</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" class="Estilo10">2010</td>
                            <td class="Estilo10">U. Aconcagua</td>
                            <td class="Estilo10"><p><a href="../tesis/descarga/2010/Tesis R.olivares.rar">Estudio Comparativo del comportamiento del suelo manejado en cero labranza con residuos y labranza convencional en Vitis vinifera l., Cv Crimson Seedless</a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13">.(Descargar)</span></a></p>                              </td>
                            <td class="Estilo10"><p>Roberto  Olivares Valdes&nbsp;&nbsp;</p>
                            <p>&nbsp;</p></td>
                          </tr>
                          <tr height="80">
                            <td height="80" align="right" class="Estilo10"><div align="left">2010</div></td>
                            <td class="Estilo10"><div align="left">U. del Mar</div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Estudio descriptivo.ppt">Estudio    descriptivo de las enfermedades de la columna vertebral que se presentan en    estudiantes de 7&ordm; a&ntilde;o b&aacute;sico (NB5) del Colegio Andr&eacute;s Bello de La Serena y el    Colegio Santa Familia de Coquimbo.</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Carlos Araya Olivares   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Karla Hofman Quero &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Carol Past&eacute;n Romero&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         Carina Vega Bartra</span></div></td>
                          </tr>
                          <tr height="80">
                            <td height="80" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10">U. del Mar</td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Estudio descriptivo comparativo.ppt">Estudio    descriptivo comparativo, de la limitaci&oacute;n del uso del idioma ingl&eacute;s en    estudiantes de NB6 pertenecientes a establecimientos educacionesles dela    comuna de La Serena y Ovalle</a></span><a href="../tesis/descarga/2010/Estudio descriptivo.ppt"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Francia    Cort&eacute;s Arredondo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Paulina    Protilla Milla&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Claudio    Salinas Salinas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Ricardo Villal&oacute;n Guzm&aacute;n</span></div></td>
                          </tr>
                          <tr height="40">
                            <td height="40" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10">U. del Mar</td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Diagnostico.doc">Diagn&oacute;stico    de la comunicaci&oacute;n interna en la Asociaic&oacute;n Chilena de Seguridad (ACHS)    Agencia La Serena&nbsp;</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Paulina    Araya Gallardo</span></div></td>
                          </tr>
                          <tr height="60">
                            <td height="60" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10">U. del Mar</td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Oportunidades.pdf">Oportunidades    para las empresas exportadoras frut&iacute;colas de la Regi&oacute;n de Coquimbo, derivadas    del tratado de libre comercio entre Chile -&nbsp;    Turquia&nbsp;</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Christian    Ambler Ramos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Carlos    Bassino Castillo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Patricia    Vilches Troncoso</span></div></td>
                          </tr>
                          <tr height="40">
                            <td height="40" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.AC.</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Mejoramiento.rar">Mejoramiento    de los aprendizajes por medio de la estimulaci&oacute;n psicomotriz temprana con    intervenci&oacute;n actva de los padres</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Jocelyn    Araya Araya</span></div></td>
                          </tr>
                          <tr height="60">
                            <td height="60" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.C.N</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Aplicacion.rar">Aplicaci&oacute;n    del &Iacute;ndice de Interidad Bi&oacute;tica (IBI) &Iacute;ndice de Calidad de Agua (ICA) en el    Sistema H&iacute;drico del Embalse Corrales, Salamanca Regi&oacute;n de Coquimbo Chile</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Nicole Maturana    Ram&iacute;rez</span></div></td>
                          </tr>
                          <tr height="60">
                            <td height="60" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.C.N</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/identificacion.rar">Identificaci&oacute;n    de competencias en mujeres microempresarias&nbsp;    de las comunas de La Serena y Coquimbo, Sector Econ&oacute;mico Comercio</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Consuelo    Contreras Gonz&aacute;lez&nbsp;&nbsp;&nbsp; Paulina Pedraza    Obligado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Catalina Romero    Rodr&iacute;guez</span></div></td>
                          </tr>
                          <tr height="80">
                            <td height="80" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.C.N</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Evaluacion de los fac.rar">Evaluaci&oacute;n    de los factores que afectan el &eacute;xito de los beneficiarios de los programas de    apoyo al emprendimiento financiados por el Fondo de Solidaridad e Inversi&oacute;n    Social en la Provincia de Elqui entre los a&ntilde;os 2007- 2009.</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Paulina    Cerenic Godoy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yulie    Leyton Mu&ntilde;oz</span></div></td>
                          </tr>
                          <tr height="80">
                            <td height="80" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.C.N</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Rocio tapia.rar">Dise&ntilde;o    y dimensionamiento de un reactor sintetizador de bicarbonato de calcio    (Ca(HCO3)2) como fuente de biomineralizaci&oacute;n de la concha en moluscos    cultivados en sistemas acu&iacute;colas recirculantes (SAR)</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Roc&iacute;o    Tapia Morgado</span></div></td>
                          </tr>
                          <tr height="60">
                            <td height="60" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.C.N</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/reactivacion.rar">Reactivaci&oacute;n    versus reconversi&oacute;n alternativas de desarrollo para la industria artesanal    del osti&oacute;n del norte.</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Diego    Camus Pizarro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Andr&eacute;s Mu&ntilde;oz    G&aacute;lvez&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jorge Rojas Godoy</span></div></td>
                          </tr>
                          <tr height="60">
                            <td height="60" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.C.N</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Evaluacion.rar">Evaluaci&oacute;n    de la competitividad de sectores productivos de la Regi&oacute;n de Coquimbo (2004 -    2008)</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left">
                              <p class="Estilo10">Rub&eacute;n    L&oacute;pez Cerda</p>
                              <p class="Estilo10"> Marcela Mu&ntilde;oz L&oacute;pez&nbsp;</p>
                              <p class="Estilo10"> Karol Urrutia Lemus</p>
                            </div></td>
                          </tr>
                          <tr height="80">
                            <td height="80" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.C.N</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Roxana Gonzalez.rar">Efecto    de la infecci&oacute;n por la bacteria Candidatus Xenohaliotis californiensis    (Proteobacteria:Rickettsiaceae) en el desempe&ntilde;o fisiol&oacute;gico y da&ntilde;o tisular en    juveniles de los abalones Haliotis rufescens y Haliotis discus hannai</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Roxana    Gonz&aacute;lez Opazo&nbsp;</span></div></td>
                          </tr>
                          <tr height="40">
                            <td height="40" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.P.V.</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Jose Miguel Galleguilo.rar">Adaptaci&oacute;n    y aplicaci&oacute;n del proyecto Roma en ni&ntilde;os autistas en la Escuela Especial El    Tenvil&uacute;, en la ciudad de La Serena</a></span><a href="../tesis/descarga/2010/"><span class="Estilo13">.(Descargar)</span></a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Jos&eacute; Miguel    Galleguilos Blanco</span></div></td>
                          </tr>
                          <tr height="60">
                            <td height="60" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.P.V.</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Priscila Belen.rar">An&aacute;lisis    del valor patog&eacute;nico de las poblaciones bacterianas asociadas a Hatchery de    Osti&oacute;n (Argopecten purpuratus). Fundaci&oacute;n Chile, IV Regi&oacute;n de Coquimbo</a></span><a href="../tesis/descarga/2010/Tesis R.olivares.rar"><span class="Estilo13">.(Descargar)</span></a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Priscila Bel&eacute;n    Pallero Contreras</span></div></td>
                          </tr>
                          <tr height="40">
                            <td height="40" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.P.V.</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Ivo Araya.rar">Eficacia de los    tratamientos en adicciones, fortalezas y limitaciones y una propuesta de    mejora del proceso</a></span><a href="../tesis/descarga/2010/Priscila Belen.rar"><span class="Estilo13">.(Descargar)</span></a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Ivo Araya Tapia</span></div></td>
                          </tr>
                          <tr height="40">
                            <td height="40" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.P.V.</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Leticia Araceli.doc">Rentabilidad    del cultivo de apio fuera de &eacute;poca en la Regi&oacute;n de Coquimbo, Chile</a></span><a href="../tesis/descarga/2010/Ivo Araya.rar"><span class="Estilo13">.(Descargar)</span></a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Leticia Araceli Sola</span></div></td>
                          </tr>
                          <tr height="40">
                            <td height="40" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U.S.T.</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/Makarena Nieto.rar">Programa    de comunicaci&oacute;n interna para los asociados al programa de mejoramiento a la    competitividad del turismo astron&oacute;mino</a></span><a href="../tesis/descarga/2010/Leticia Araceli.doc"><span class="Estilo13">.(Descargar)</span></a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Makarena    Nieto Tabilo</span></div></td>
                          </tr>
						  <tr height="40">
                            <td height="40" align="right" class="Estilo10"><div align="left"><span class="Estilo10">2010</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">U. del Mar</span></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10"><a href="../tesis/descarga/2010/TESIS_intereses_necesidades_adultos_mayores.doc">Estudio descriptivo acerca de los intereses y necesidades de los adultos mayores pertenecientes al programa de actividad física y recreativa de chile deportes de la comuna de Coquimbo.</a></span><a href="../tesis/descarga/2010/Leticia Araceli.doc"><span class="Estilo13">.(Descargar)</span></a><a href="../tesis/descarga/2010/Tesis R.olivares.rar" class="Estilo10"><span class="Estilo13"></span></a></div></td>
                            <td class="Estilo10"><div align="left"><span class="Estilo10">Pedro Araya Ávila  Rosa González Villarreal  Yessica Leguisamon Contreras  Ana María Ramírez Castro</span></div></td>
                          </tr>
                        </table>
                      <p>&nbsp;</p>                      </td>
                    </tr>
                  </table></td>
        </tr>
      </table>
      </td>
    <td width="300" valign="top"><table width="295" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="20" align="center" background="imagenes/bckimg-1.png" bgcolor="#E3E3E3" class="texto-tit"><strong>Disposici&oacute;n 
                  de Tesis </strong></td>
              </tr>
              <tr> 
                <td height="200" valign="top" bgcolor="#F2F2F2" class="texto-tsis"><p>El 
                    Gobierno Regional de Coquimbo, en conjunto con los centros 
                    de estudios superiores de la regi&oacute;n, ponen a disposici&oacute;n 
                    de los estudiantes y usuarios en general, de una completa 
                    biblioteca con los trabajos de tesis que han desarrollado 
                    los estudiantes de las distintas casas de estudios de la regi&oacute;n.</p>
                  <p>En s&iacute;, ser&aacute; posible buscar informaci&oacute;n 
                    de acuerdo a par&aacute;metros de b&uacute;squedas como lo 
                    son: tipo de instituci&oacute;n, tipo de tesis, &aacute;rea 
                    de estudio de la tesis, a&ntilde;o de edici&oacute;n y t&iacute;tulo 
                    de la tesis.</p>
                  <p>Cualquier informaci&oacute;n extra con respecto a la tesis 
                    requerida, se podr&aacute; encontrar con un correo electr&oacute;nico 
                    de contacto de los estudiantes que desarrollaron tal tesis.</p>
                  <p>Cualquier informaci&oacute;n adicional con respecto a esta 
                    p&aacute;gina web, por favor remitirla a <a href="mailto:tesis@gorecoquimbo.cl?subject=Respecto Pagina Tesis">tesis@gorecoquimbo.cl</a></p>
                  <p>&nbsp;</p></td>
              </tr>
              <tr> 
                <td height="15" valign="top" bgcolor="#FFFFFF" class="texto-tsis">&nbsp;</td>
              </tr>
              <tr> 
                <td height="20" align="center" background="imagenes/bckimg-1.png" bgcolor="#E3E3E3" class="texto-tit"><strong>Solicitud 
                  de Temas <img src="imagenes/nuevo.png" width="45" height="10"></strong></td>
              </tr>
              <tr> 
                <td height="200" valign="top" bgcolor="#F2F2F2" class="texto-tsis"><p>Se 
                    dispone de una nueva secci&oacute;n para solicitar por parte 
                    de empresas temas que requieran estudios los cuales podr&aacute;n 
                    ser ingresados a fin que las instituciones y/o estudiantes 
                    de la regi&oacute;n puedan tener la posibilidad de conocer 
                    que ofertas existen para la formulaci&oacute;n de sus tesis.</p>
                  <p>Por lo tanto, si usted desea solicitar temas que requieran 
                    estudios, lo invitamos a ingresar su <strong><a href="tsis_st.php">Solicitud 
                    de Tema</a></strong>.</p>
                  <p>&nbsp;</p></td>
              </tr>
            </table></td>
  </tr>
</table>
<table border="0" width="750" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
   <td><div id="lin-footer"></div></td>
</tr>
</table>
</td>
</tr>
</table>
<img src="imagenes/bnppal.png" width="675" height="75">
<!-- Begin Nedstat Basic code -->
<!-- Title: Gobierno Regional de Coquimbo, Tesis -->
<!-- URL: http://www.gorecoquimbo.cl/tesis -->
<!--<script language="JavaScript" type="text/javascript" src="http://m1.nedstatbasic.net/basic.js">
</script>
<script language="JavaScript" type="text/javascript" >
<!--
  nedstatbasic("AC7hNQUr2AUBUbHV+OnaLewoIaug", 0);
// -->
<!--</script>-->
<noscript>

<!-- End Nedstat Basic code -->
</body>
</html>
