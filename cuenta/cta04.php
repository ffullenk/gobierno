<?php
global $c;
function ctacab() {
global $c;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Cuenta P&uacute;blica 2004 - Gobierno Regional de Coquimbo</title>
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
      <li> 
        <!--<a href="" title="Cuenta P&uacute;blica Gobernador Provincia de Choapa.  ">-->
        Gesti&oacute;n Provincia de Choapa 
        <!--</a>-->
      </li>
		<hr />
		<li><a href="index.php" title="Cuenta P&uacute;blica Gesti&oacute;n 2005  ">
        Cuenta P&uacute;blica Gesti&oacute;n 2005</a>
      </li>	  
	  
    </ul>
    <h3>Descargas</h3>
    <ul id="quickbits">
      <?php if ( $c == "p" || !isset($c) ) { ?>
      <li> <a href="descargas/cta04.pdf" title="Descargar Discurso Intendente. Documento PDF [0.14MB]  " class="more" target="_blank">Discurso 
        Intendente</a> </li>
      <?php }
if ($c == "e") { ?>
      <li> <a href="descargas/ctaelqui04.pdf" title="Descargar Discurso Gobernadora Provincial de Elqui. Documento PDF [133KB]  " class="more" target="_blank">Discurso 
        Gobernadora</a> </li>
      <?php }

if ($c == "l") { ?>
      <li> <a href="descargas/ctalimari04.pdf" title="Descargar documento PDF [101KB]  " class="more" target="_blank">Discurso 
        Gobernador</a> </li>
      <li> <a href="descargas/gobprovlimari.ppt" title=" Descargar Presentaci�n Powerpoint [201KB]  " class="more" target="_blank">Gobernaci&oacute;n 
        Provincial</a> </li>
      <li> <a href="descargas/gabprovlimari.ppt" title=" Descargar Presentaci�n Powerpoint [1.204 KB]  " class="more" target="_blank">Gabinete 
        Provincial</a> </li>
      <li> <a href="descargas/hitos.ppt" title=" Descargar Presentaci�n Powerpoint [209 KB]  " class="more" target="_blank">Hitos 
        y Logros 2004</a> </li>
      <li> <a href="descargas/objetivos.ppt" title=" Descargar Presentaci�n Powerpoint [298 KB]  " class="more" target="_blank">Objetivos 
        de Gesti&oacute;n 2005</a> </li>
      <?php } ?>
    </ul>
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

      <h2 id="recent">Cuenta P&uacute;blica de Gesti&oacute;n:</h2>
      <h1>Intendente invit&oacute; a generar una nueva regi&oacute;n de Coquimbo</h1>
      <!--<p align="center"><img src="imagenes/ctachile.gif" alt="" title="Logo de Chile" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <img src="imagenes/cta04.jpg" alt="" title="Logo Cuenta P&uacute;blica 2004" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <img src="imagenes/ctagore.gif" alt="" title="Logo Gobierno Regional de Coquimbo" /></p>-->
		<p><img src="imagenes/actocta04.jpg"  style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5"/></p>
      <p class="normal">El intendente Del R&iacute;o junto a 28 beneficiarios de las diversas provincias present&oacute;
	  su rendici&oacute;n ciudadana donde enfatiz&oacute; los logros econ&oacute;micos y sociales alcanzados: M&aacute;s 
	  Integraci&oacute;n, M&aacute;s Competitividad, M&aacute;s Emprendedora y con M&aacute;s Calidad de Vida.</p>
	  <p class="normal">&#8220;Hacia una Nueva Regi&oacute;n de Coquimbo&#8221;,  fue el lema con el cual el intendente Felipe
	  del R&iacute;o present&oacute; su Cuenta P&uacute;blica de la gesti&oacute;n del Gobierno en la regi&oacute;n de Coquimbo, 
	  durante el 2004. La ceremonia realizada en el frontis de la Intendencia Regional, cont&oacute; con la presencia de diversas 
	  autoridades de Gobierno, adem&aacute;s de los principales actores y beneficiarios de los programas impulsados por servicios e 
	  instituciones en la zona.</p>
<p class="normal">Del R&iacute;o anunci&oacute; en la rendici&oacute;n ciudadana, la elaboraci&oacute;n del primer &Iacute;ndice Regional 
de Desarrollo Humano en el pa&iacute;s, el cual permitir&aacute; contar con una perspectiva regional econ&oacute;mica y social, respondiendo
a las inquietudes planteadas de parte de la propia comunidad. Este &iacute;ndice es desarrollado por la Universidad Cat&oacute;lica del Norte 
por encargo de la Secretar&iacute;a Regional de Planificaci&oacute;n y Coordinaci&oacute;n junto con el Programa M&aacute;s Regi&oacute;n, y a 
petici&oacute;n expresa de la primera autoridad regional. Los resultados ser&aacute;n dados a conocer durante el primer semestre del presente a&ntildeo. 
Del R&iacute;o adem&aacute;s, invit&oacute; a los presentes a participar de una &#8220;Cumbre para el Desarrollo Regional&#8221;, a realizarse durante el 
mes de junio, donde espera convocar a los l&iacute;deres regionales para repensar la regi&oacute;n al 2010.</p>

<p class="normal"><strong>Crecimiento y Desempleo</strong><br />
El crecimiento econ&oacute;mico fue una de las &aacute;reas en las que se obtuvieron mayores logros durante el 2004, lo que se refleja en el aumento
de las exportaciones y la ampliaci&oacute;n de los mercados. Adem&aacute;s, se logr&oacute; disminuir la desocupaci&oacute;n gracias a la creaci&oacute;n
de 6 mil nuevos puestos de empleo. Este crecimiento se logr&oacute; gracias al funcionamiento de programas como el de Innovaci&oacute;n Tecnol&oacute;gica, 
Atracci&oacute;n de Inversiones y Fondos Concursables, entre otros. Estos han impulsado el sector productivo, atendiendo a que sus resultados tendr&aacute;n
efectos y consecuencias importantes y duraderas en el &aacute;mbito social.</p>



<p class="normal">El intendente Felipe del R&iacute;o inform&oacute; sobre la significativa tendencia a la baja que present&oacute; la pobreza durante 2004, principalmente 
en sectores rurales, cifras que se han logrado reducir gracias a la aplicaci&oacute;n de programas que tienen como principal fin, la integraci&oacute;n de los habitantes de 
la regi&oacute;n de Coquimbo. &#8220;Hace 15 a&ntilde;os un poco menos de la mitad de los habitantes de la regi&oacute;n viv&iacute;an bajo condiciones de pobreza. Es por eso
que el esfuerzo de los Gobiernos de la Concertaci&oacute;n nos hace sentir orgullosos de los logros alcanzados para derrotarla, aunque sabemos que a&uacute;n hay comunas que 
presentan graves problemas&#8221;.

<p class="normal"><strong>Mayor Equidad Social</strong><br />
Fomentar la participaci&oacute;n ciudadana ha sido otro de objetivos del intendente Del R&iacute;o. Tanto hombres como mujeres se han visto beneficiados con los programas y proyectos
implementados en la regi&oacute;n, como Chile Solidario, Mujer y Territorio, y, la Escuela de Negocios y Fomento del Emprendimiento, entre otros. La inserci&oacute;n de la mujer ha ocupado
un importante espacio bajo la gesti&oacute;n del actual Intendente, super&aacute;ndose incluso en un 20 por ciento de lo que se ten&aacute;a proyectado.</p>

<p class="normal">El &aacute;rea educacional no estuvo ausente de la rendici&oacute;n del Intendente, donde se han realizado diversas gestiones para mejorar la calidad de la ense&ntilde;anza en la regi&oacute;n.
Asimismo, las inversiones para la ampliaci&oacute;n de los establecimientos, permiti&oacute; incluir a m&aacute;s centros educacionales a la Jornada Escolar Completa (JEC).</p>

<p class="normal">&#8220;El futuro de la juventud depende de la educaci&oacute;n que le brindemos. S&oacute;lo por medio de una buena educaci&oacute;n rompemos el ciclo de la pobreza y logramos mantener el valor de la equidad&#8221;,
se&ntilde;al&oacute; Felipe del R&iacute;o.

<p class="normal"><strong>Seguridad P�blica</strong><br />
En el &aacute;mbito de la seguridad p&uacute;blica, la primera autoridad regional se refiri&oacute; a la importancia de la participaci&oacute;n activa de la ciudadan&iacute;a. &#8220;As&iacute;, actuando mancomunadamente Gobierno, Carabineros, 
Investigaciones, y por primera vez el Ministerio P&uacute;blico y la Corte de Apelaciones de La Serena, estamos teniendo resultados rotundos contra la delincuencia&#8221;.</p>
<p class="normal">El Plan Antidelincuencia, lanzado el a&ntilde;o pasado por el Presidente Ricardo Lagos, no estuvo exento de la Cuenta P&uacute;blica, ya que ha logrado aumentar la cifra de detenidos en los delitos de mayor frecuencia como robos con violencia, tr&aacute;fico de drogas y hurtos.</p>
<p class="normal">Finalmente, el Intendente recalc&oacute; que &#8220;el Gobierno Regional trabaja con todas las comunas, y con todos los municipios, porque creemos y representamos a todos los habitantes de la regi&oacute;n sin distinci&oacute;n pol&iacute;tica&#8221;. La actividad estuvo acompa&ntilde;ada de actos art&iacute;sticos y ferias de los diversos actores que han participado en la construcci&oacute;n de una nueva regi&oacute;n de Coquimbo.</p>
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
<h2 id="recent">Cuenta P&uacute;blica de Gesti&oacute;n: Gobernaci&oacute;n Provincial de Limar&iacute;</h2>
      <h1>Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Limar&iacute;</h1>
	  <p class="normal">&#8220;Con un esp&iacute;ritu democr&aacute;tico y transparente, rendir Cuenta P&uacute;blica ante la ciudadan&iacute;a, es establecer un contacto directo con la comunidad y el gobierno, af&iacute;n de dar a conocer las acciones que se est&aacute;n desarrollando, junto con conocer las inquietudes de la ciudadan&iacute;a&#8221;.</p>	
<p><img src="imagenes/ctalimari04.jpg" style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5" alt="" title=" Gabinete Gobernaci&oacute;n Provincial de Limar&iacute;  "/></p>

      <p class="normal"><strong>Orgullosos pero no satisfechos.</strong><br />
       Este a�o, estamos orgullosos del gran apoyo ciudadano a nuestro Presidente Lagos con un 76% de apoyo en la encuesta IPSOS.  Estamos orgullosos del 5� lugar obtenido en el �ndice de competitividad regional, que constituye una nueva realidad. Estamos orgullosos, que el desempleo calculado por el INE haya llegado a una cifra hist�rica de 2,6% en verano. Estamos orgullosos, por el aprecio, respeto y cari�o que nos brindan d�a a d�a cuando estamos cara a cara con ustedes. Estamos orgullosos con la disminuci�n de la pobreza rural en casi 10 puntos porcentuales y cerca de 4 puntos en el �rea urbana.			 </p>
       <p class="normal"><strong>Pero nunca vamos a estar satisfechos</strong> mientras exista injusticia social manifestada en la pobreza, el desempleo que rasgu�a los 2 d�gitos, se mantenga la concentraci�n de la riqueza, o si existe dolor o pena ante situaciones de abandono.</p>

<p class="normal"> <strong>INTEGRACION: SELLO DE LA CUENTA P�BLICA.</strong><br />
El sello de esta cuenta p�blica es la Integraci�n.  As� definida porque creemos que promueve un �estilo positivo� que se centra en las personas y la familia como base de la intervenci�n de gobierno. </p>

<p class="normal">Por esta raz�n, esta fiesta ciudadana tiene al centro a ni�os con problemas de aprendizaje y ni�os v�ctimas de abusos. Una franja m�s sensible que los problemas m�s gruesos como son el empleo, la delincuencia, la oportunidad y calidad de la prestaci�n de salud, o la calidad de la educaci�n. </p>

<p class="normal">Queremos que nos vean como UN GOBIERNO PROVINCIAL QUE ABRE SUS BRAZOS, ESCUCHA Y RESPONDE. Que se integra a si mismo, y hoy rinde cuenta con los miembros de este equipo.</p>

<p class="normal"> <strong>SOMOS UN GRAN EQUIPO.</strong><br>
                    Los resultados de nuestra gesti�n de gobierno, son logro de nuestra coalici�n de gobierno de la CONCERTACION DE PARTIDOS POR LA DEMOCRACIA.</p>

<p class="normal">Nos unimos todo el ejecutivo del Presidente Lagos, nuestro senador Jorge Pizarro, nuestros diputados Patricio Walker y Francisco Encina, nuestra Diputada Adriana Mu�oz que juntos a trav�s de consensos aprueban la Ley de Presupuesto de la naci�n donde se define qu�, cuando y donde invertir. Mientras que en nuestra regi�n es nuestro Intendente, Gabinete Regional, Consejeros Regionales, Alcaldes, Concejales y Comunidad, quienes constituimos un equipo para enfrentar nuestras necesidades.</p>


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
<h2 id="recent">Cuenta P&uacute;blica de Gesti&oacute;n: Gobernaci&oacute;n Provincial de Elqui</h2>
      <h1>Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Elqui</h1>
<p class="normal">La gobernadora Sof�a Villalobos, dio a conocer los principales hitos, logros y acciones desarrolladas durante el 2004, en un discurso que estuvo centrado en los lineamientos de la Estrategia de Desarrollo Provincial.</p>
<p><img src="imagenes/ctaelqui04.jpg" style="padding:4px;border:1px solid #ddd;" hspace="5" vspace="5" alt="" title=" Cuenta P&uacute;blica Gobernaci&oacute;n Provincial de Elqui  "/></p>
<p class="normal">El colegio Jos� Gaspar Mar�n de la poblaci�n Juan XXIII de La Antena, en La Serena, fue el lugar elegido para que la gobernadora de Elqui, Sof�a Villalobos, diera a conocer lo m�s importante de la gesti�n realizada en la provincia durante el 2004. En la actividad que comenz� cerca de las seis de la tarde, estuvieron presentes diversas autoridades regionales, provinciales y comunales; adem�s de representantes de las Polic�as, dirigentes vecinales del sector y de las seis comunas que componen la provincia.</p>
<p class="normal">Dentro de los temas abordados en su discurso, la gobernadora de Elqui enfatiz� en los cuatro lineamientos comprendidos en la Estrategia de Desarrollo Provincial con los cuales viene trabajando desde hace un par de a�os, de los cuales se destaca lo econ�mico, la integraci�n del territorio, la modernizaci�n del Estado y el capital humano y social; asimismo que destac� la labor realizada en el �mbito de Seguridad Ciudadana.</p>
<p class="normal">La Estrategia de Desarrollo Provincial que despliega la Gobernaci�n se basa en los lineamientos ya mencionados, y cont� con el apoyo t�cnico y financiero de M�s Regi�n, adem�s de la coparticipaci�n de los provincianos, que, como enfatiz� Villalobos, es �una estrategia hecha con la gente y a la altura de la gente�.</p>
<p class="normal">La gobernadora al comienzo de su discurso se�al� que el trabajo realizado en conjunto con los ciudadanos de La Higuera, Vicu�a, La Serena, Coquimbo, Paihuano y Andacollo, est� basado en los principios que est�n consagrados en la constituci�n, �estos son igualdad, libertad, y justicia; desde los que hemos generado mesas comunales de trabajo, di�logos ciudadanos, comit�s provinciales integrados por la sociedad civil organizada, las polic�as y los funcionarios p�blicos. As� podemos decir que toda acci�n liderada por la Gobernaci�n Provincial de Elqui tiene la impronta de la participaci�n y la legitimidad ciudadana�.</p>
<p class="normal"><strong>LINEAMIENTO ESTRAT�GICO PROVINCIAL</strong><br />
Bajo el alero del eje econ�mico, la gobernadora Villalobos se�al� que es de suma importancia enfrentar el presente con una mirada de futuro que redunde en empleos y emprendimientos que favorezcan el crecimiento sostenido, integrado y sustentable de todas las regiones del pa�s y de las provincias. </p>
<p class="normal">Para puntualizar esta pol�tica econ�mica, la provincia de Elqui ha fijado en su Estrategia de Desarrollo la t�ctica que dinamiza entre la creaci�n de redes gremiales y rubros productivos, la productividad a trav�s del uso eficiente de los recursos en un escenario de alta exigencia y demanda, y, por �ltimo, la diversificaci�n productiva que incrementa la competitividad. Un ejemplo claro de la concreci�n de esta idea es el trabajo realizado con m�s de 52 pescadores artesanales en Caleta Hornos de La Higuera, cuyo monto asciende a los dos millones y medio de pesos.</p>
<p class="normal">Siguiendo con los lineamientos, en la modernizaci�n del Estado encontramos la ejecuci�n de obras de infraestructura p�blica en el �rea educacional, judicial y municipal, la implementaci�n paulatina de sistemas de informaci�n que dan acceso a bases de datos de las distintas tem�ticas del desarrollo provincial y la ampliaci�n de los sistemas de informaci�n en red para acercar a las comunidades m�s alejadas y facilitar el acceso de toda la comunidad.</p>
<p class="normal">Para la concreci�n del lineamiento de capital humano y social, la Gobernaci�n trabaja en el desarrollo de una sociedad libre de marginaciones y exclusiones, ampliando las oportunidades de elevar la calidad de vida de la poblaci�n. Asimismo, busca fortalecer el capital humano de manera de responder a las exigencias productivas y sociales del proceso de desarrollo y por �ltimo vigorizar, renovar o recrear una cultura provincial con identidad, que sirva de soporte a las estrategias de desarrollo. </p>
<p class="normal">Dentro de lo social se distingue la ejecuci�n del programa Barrio M�s Seguro en las poblaciones de El Olivar y .El Progreso en Las Compa��as y San Fernando, en Tierras Blancas, lo cual signific� una inversi�n total de 27 millones de pesos, logrando atender a m�s de tres mil 500 personas con los diversos servicios de las instituciones coordinados en esta iniciativa.</p>
<p class="normal"><strong>SEGURIDAD P�BLICA</strong><br />
En el �rea de seguridad p�blica, la Gobernaci�n realiz� un intenso trabajo en los sectores de El Progreso, El Olivar y H�roes de la Concepci�n en Las Compa��as, adem�s del compromiso plasmado en la Villa San Fernando de Tierras Blancas, acciones que llegaron a m�s de tres mil 500 personas, en el marco del Programa Barrio + Seguro, que fuera reconocido por el Ministerio del Interior, y posesion� a la Gobernaci�n Provincial de Elqui junto a la Gobernaci�n de Cachapoal entre los dos mejores proyectos a nivel nacional.</p>
<p class="normal">Gracias al financiamiento del Fondo Social Presidente de la Rep�blica, en la provincia de Elqui se capitalizaron 27 proyectos orientados a recuperar y habilitar espacios p�blicos e implementar sedes sociales en los barrios mencionados. </p>
<p class="normal">Este a�o, la misi�n de trabajar en equipo ser� con los vecinos de La Antena, espec�ficamente con las juntas vecinales de las poblaciones Juan XXIII y 17 de septiembre, lo que qued� plasmado con el acta de compromiso firmada por Sof�a Villalobos, como representante de los servicios de Gobierno y los respectivos presidentes de las unidades vecinales, adem�s del General de Carabineros, Anselmo Flores y el Prefecto de Investigaciones, Carlos Tapia.</p>
<p class="normal"><strong>PASO DE AGUA NEGRA</strong><br />
Sin duda alguna, el tema de los �ltimos a�os en la regi�n de Coquimbo es la construcci�n del T�nel de Agua Negra, lo cual se liga al Corredor Bioce�nico, la remodelaci�n del Complejo Fronterizo Juntas del Toro y los esfuerzos realizados por las autoridades de la Provincia de San Juan y de la regi�n de Coquimbo para reunirse en los Comit�s de Frontera, lo cual significa un gran progreso econ�mico, tur�stico y social para la provincia y para nuestro pa�s.</p>
<p class="normal">Lo anterior se ver� reflejado en la v�a internacional que permitir� el transporte expedito de mercanc�as desde y hacia los puertos del Oc�ano Pac�fico al Oc�ano Atl�ntico, acortando las rutas mar�timas que actualmente deben alcanzar el extremo sur de Am�rica para lograrlo.</p>
<p class="normal">En este tema de integraci�n que significa la concretizaci�n del T�nel, del Paso y del Corredor, la provincia debe proyectarse con una base s�lida en aspectos sociales, econ�micos, adem�s de ofrecer una buena infraestructura y tener un trabajo interdisciplinario entre los diversos organismos de Gobierno.</p>

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
?>