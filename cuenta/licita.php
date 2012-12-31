<?php
global $c;
function ctacab() {
global $c;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Calendario de Licitaciones - Gobierno Regional de Coquimbo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/licita.css" type="text/css" media="screen" />
</head>

<body id="home">
<div id="wrap"> 
  <p id="theme"></p>
  <div id="logo"></div>
  <div id="title"> 
    <h1>Consultas acerca de Licitaciones Gobierno Regional de Coquimbo&nbsp;&nbsp;&nbsp;</h1>
    <!--<h2>texto dentro de este apartado enunciado</h2>-->
  </div>
  <?php
}	
	


function ctamenu() { 
global $c;?>
  <hr class="hide" />
  <div id="sidebar"> 
    <!-- lado derecho -->
    <h3>&Uacute;ltimas Licitaciones</h3>
    <ul id="quickbits">
      <li> <a href="<?php $PHP_SELF ?>?c=p" title="Cuenta P&uacute;blica Intendente Felipe del R&iacute;o Goudie.  "> 
        Gesti&oacute;n Gobierno Regional </a> </li>
      <li> <a href="<?php $PHP_SELF ?>?c=e" title="Cuenta P&uacute;blica Gobernadora Provincial de Elqui.  "> 
        Gesti&oacute;n Provincia de Elqui </a> </li>
      <li> <a href="<?php $PHP_SELF ?>?c=l" title="Cuenta P&uacute;blica Gobernador Provincia de Limar&iacute;.  "> 
        Gesti&oacute;n Provincia de Limar&iacute; </a> </li>
    </ul>
	
	<br />
    <p align="center"><a href="<?php $PHP_SELF ?>?c=d" title=" Acceso a Usuarios Registrados Sistema Consulta Licitaciones  "><img src="imagenes/lct_bann01.png" width="150" height="79" border="0" alt=" " title=" Acceso a Usuarios Registrados Sistema Consulta Licitaciones "/></a></p>
	<br />
	<p align="center"><img src="imagenes/lct_bann02.png" width="150" height="132" border="0" alt=" " title=" Panel de Administracion Sistema de Consultas Licitaciones GORE-Coquimbo"/></p>
	<br />
  </div>
  <!-- end #sidebar -->
  <?php 
}


  
function ctapie() { 
global $c;?>
  <hr class="hide"/>
  <div id="footer"> 
    <p><strong>www.gorecoquimbo.cl</strong>: Gobierno Regional de Coquimbo.</p>
  </div>
</div>
<!-- end #wrap -->
<br />
</body>
</html>
<?php } 




if ( ( !$HTTP_GET_VARS[c] ) || ( $HTTP_GET_VARS[c] == "p" ) ) {
global $ses, $Nniv;
ctacab();
?>
  <div id="main-body"> 
    <div id="content">
      <h2 id="recent">Sistema Consulta Licitaciones Gobierno Regional de Coquimbo</h2>
      <h1>Informaci&oacute;n acerca de Sistema Licitaciones</h1>
      <p class="normal">El Gobierno Regional de Coquimbo, ha contar de julio de 2005, pone a disposici&oacute;n de los usuarios de Internet, informaci&oacute;n relativa a Licitaciones efectuadas en la regi&oacute;n de Coquimbo.</p>
      <p class="normal">Para ello, podr&aacute; visualizar dos m&oacute;dulos en la que podr&aacute; obtener informaci&oacute;n. A entender, m&oacute;dulo "Licitaciones Abiertas", la cual mostrar&aacute; informaci&oacute;n de las licitaciones que hasta la fecha hayan sido publicadas. Por &uacute;ltimo, m&oacute;dulo "Licitaciones Adjudicadas y/o Cerradas", la cual mostrar&aacute; informaci&oacute;n de las licitaciones que ya hayan sido adjudicadas y/o cerradas.</p>
	  <p align="center"><a href="" title=" Consulta acerca de Licitaciones Abiertas. "><img src="imagenes/lct_open.png" border="0" hspace="5" vspace="5"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" title=" Consultas acerca de Licitaciones Adjudicadas y/o Cerradas. "><img src="imagenes/lct_close.png"  hspace="5" vspace="5"/></a><!-- style="padding:4px;border:1px solid #ddd;" --></p>
     <p></p>
    </div>
    <!-- end #content -->
  </div>
  <!-- end #main-body -->
  
<?php
ctamenu();
ctapie();
}



if( $HTTP_GET_VARS[c] == "d" ) {
global $ses, $Nniv;
ctacab();
?>
  <div id="main-body"> 
    <div id="content">
      <h2 id="recent"><a href="<?php $PHP_SELF ?>?c=p">Inicio</a> &raquo;&nbsp;Acceso &Aacute;rea Restringuida</h2>
      <h1>Control de Acceso</h1>
      <p class="normal"></p>
	  
     <p></p>
    </div>
    <!-- end #content -->
  </div>
  <!-- end #main-body -->
  
<?php
ctamenu();
ctapie();
}
?>
