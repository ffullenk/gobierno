<?php  
if (defined(__config__ ) == false )
  define(__config__ , "__config__");
else
 return;
		 
	   
define("_titulo_","Oficina Regional de Emergencias");
define("_cabecera_","Sistema de Generacion de Informes Alfas"); 
define("_imagen_","imagenes/titulo.gif");
		  

define("_bgMenu_","#D6E7F7");
define("_bgMenuFont_","#333333");
define("_bgMenuBorder_","#94bede");
		  
define("_bgMenuSel_","#2171a5");
define("_bgMenuFontSel_","#FFFFFF"); 
define("_bgMenuBorderSel_","#94bede");
		  
define("_colorSelect_","#94BEDE");
		  
define("_direccionSitio_","http://www.gorecoquimbo.gob.cl/oremi");
		  

define("_administrador_","Luis Jimenez Villalobos");
define("_correoAdministrador_","luis.jimenez@sysco.cl");
define("_nombreUsuario_","NaTaN");
define("_contrasenaAdministrador_","Na0N5H6zC12xM");
		  
define("_rutaServidor_","http://192.168.226.2/");
define("_imagenesPanel_","/oremi/imagenes/panel/");
define("_rutaPanel_","/oremi/cpanel/");
define("_rutaoPanel_","/oremi/opanel/");
define("_rutaLibrerias_","/oremi/lib/");

define("_loginFalla_","Error.... Usuario y/o Contrasenya incorrectos.");

define("_nroFilas_",8);

// Definicion de Matrices
$_aAlerta = array("Seleccione Grado de Alerta","Temprana","Amarilla");
$_aVariable = array("Seleccione Variable de Riesgo","Hidrometeorológica","Marejadas","Hidrometeorológicas y Marejadas","Deshielos");
$_aEventoColumna = array ("","Nro. Infomes","Nro. Consolidados","Nro. Consolidados","Nro. Consolidados","Nro. Consolidados");
$_aEventoBoton = array("","Crear Alfa","Consolidar","Consolidar");
$_aEventoPathCrea = array("","informealfa/crea/","consoliprov/crea/","consoliregi/crea/");
$_aEventoPathCierra = array("","../informealfa/cerrar/","../consoliprov/cerrar/","../consoliregi/cerrar/");
$_aEventoPathVe = array("","informealfa/ver/","consoliprov/ver/","consoliregi/ver/","consoliregi/ver/");
$_aEventoPathGene = array("","informealfa/alfa/","consoliprov/consolida/","consoliregi/consolida/");

define("_eventoAbierto_",1);
define("_eventoCreado_",1);
define("_eventoCerrado_",2);
define("_informeGuarda_",3);
define("_informeCierra_",4);
define("_sinconsolidaProvincia_",0);
define("_eventoConsolidado_",3); // x ver el nro de los estado de eventos
define("_sinconsolidaRegion_",0);
$_aEstado = array("","Abierto","Cerrado","Consolidado");

define("_rutaVeAlfa_","/oremi/opanel/informealfa/ver/");

define("_emailOREMI_","rrojas@onemi.gov.cl");
define("_emailCAT_","cat@onemi.gov.cl");
define("_emailjefeturno_","jefedeturno@onemi.gov.cl");

define("_prensaOREMI_","prensacoquimbo@gorecoquimbo.cl");
define("_jefeOREMIIV_","mperez@gorecoquimbo.cl");
define("_onemi04_","ljimenez@onemi.gov.cl");
define("_oficina04_","rgarrido@onemi.gov.cl");


?>