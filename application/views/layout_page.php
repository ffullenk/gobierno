<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Gobierno Regional de Coquimbo</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>css/menus.css" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>css/galeria.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/mosaic.css" type="text/css" media="screen" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/example2.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/agenda.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slider.css" >
 
<script type="text/javascript">
document.write('<style type="text/css">.tabber{display:none;}<\/style>'); 
</script>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css" >
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.2.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/mosaic.1.0.1.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/tabber.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jMyCarousel.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>source/jquery.fancybox.js?v=2.1.1" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/swfobject.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/slides.min.jquery.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.fancybox.css" media="screen" >

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/helpers/jquery.fancybox-buttons.css?v=1.0.4" >
<script type="text/javascript" src="<?php echo base_url(); ?>source/helpers/jquery.fancybox-buttons.js?v=1.0.4"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" >
<script type="text/javascript" src="<?php echo base_url(); ?>source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?php echo base_url(); ?>source/helpers/jquery.fancybox-media.js?v=1.0.4"></script>


<!-- carrusel  -->
<script src="<?php echo base_url(); ?>carrusel/jsCarousel-2.0.0.js" type="text/javascript" ></script>
<link href="<?php echo base_url(); ?>carrusel/jsCarousel-2.0.0.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
        $(document).ready(function() {
            $('#carouselhAuto').jsCarousel({ onthumbnailclick: function(src) {  }, autoscroll: true, masked: false, itemstodisplay: 4, orientation: 'h' });
           
            $('#carouselhAuto2').jsCarousel({ onthumbnailclick: function(src) {  }, autoscroll: true, masked: false, itemstodisplay: 4, orientation: 'h' });

            $('.circle').mosaic({
					opacity		:	0.4			//Opacity for overlay (0-1)
				});

        });       

  </script>
<!-- fin carrusel  -->


<script type="text/javascript">  
   
  $(function(){

      $('#slides').slides({
        preload: true,
        play: 5000,
        pause: 2500,
        hoverPause: true,
        animationStart: function(current){
          $('.caption').animate({
            bottom:-35
          },100);
          if (window.console && console.log) {
            // example return of current slide number
            console.log('animationStart on slide: ', current);
          };
        },
        animationComplete: function(current){
          $('.caption').animate({
            bottom:0
          },200);
          if (window.console && console.log) {
            // example return of current slide number
            console.log('animationComplete on slide: ', current);
          };
        },
        slidesLoaded: function() {
          $('.caption').animate({
            bottom:0
          },200);
        }
      });
    }); 
        jQuery(function($){
            $('.circle').mosaic({
              opacity   : 0.4     //Opacity for overlay (0-1)
            });
    });


    $(function() {

        $(".jMyCarousel").jMyCarousel({
            visible: '4',
            eltByElt: true,
            evtStart: 'mousedown',
            evtStop: 'mouseup'
        });

    });


    $(function() {
        $( "#fecha" ).datepicker({ dateFormat: 'yy-mm-dd' } );
    });

$(document).ready(function() { 
  
  $(".fancybox").fancybox({
      'showCloseButton' : true
      
  });


  
});
</script>

</head>
<body>
<div id="wrap">
<div id="header">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="15%" rowspan="2">
      <div id="logo">
      <a href="<?php echo BASE_URI?>">
        <img src="<?php echo base_url(); ?>imagenes/cabecera.jpg" alt="Consejo Regional de Coquimbo" width="151" height="160" border="0" title="Consejo Regional de Coquimbo" />
      </a>
    </div></td>
    <td valign="bottom"><div id="redes-sociales">
<a href="#"><img title="Suíguenos en TWITTER"src="<?php echo base_url(); ?>imagenes/twitter.png"></a>
<a href="#"><img title="Búscanos en FACEBOOK" src="<?php echo base_url(); ?>imagenes/facebook.png"></a>
<a href="#"><img title="Suíguenos mediante RSS" src="<?php echo base_url(); ?>imagenes/rss.png"></a>
<a href="#"><img title="Tu Foto con el Intendente"src="<?php echo base_url(); ?>imagenes/flickr.png"></a>
  
  </div></td>
  </tr>
  <tr>
    <td width="85%" valign="bottom"><div id="nav">
    <div id="menu">
<ul>
  <li class="nivel1"><a href="<?php echo BASE_URI?>" class="span" >Portada</a></li>
  <li class="nivel1"><a href="#" class="nivel1">Link a ordenar</a>
	<ul>
		 <li><a href="<?php echo BASE_URI?>intendente/3">Intendente</a></li>
            <li><a href="<?php echo BASE_URI?>parlamentarios/1">Parlamentarios (as)</a></li>
            <li><a href="<?php echo BASE_URI?>gobernadores/1">Gobernadores (as) </a></li>
            <li><a href="<?php echo BASE_URI?>gobierno-regional/1">Gobierno Regional </a></li>
            <li><a href="<?php echo BASE_URI?>consejo-regional/1">Consejo Regional </a></li>
            <li><a href="http://www.gorecoquimbo.gob.cl/" >Acuerdos CORE </a></li>
            <li><a href="<?php echo BASE_URI?>gabinete-regional/1">Gabinete Regional </a></li>
            <li><a href="<?php echo BASE_URI?>municipalidades/1">Municipalidades</a></li>
            <li><a href="<?php echo BASE_URI?>seremis">Seremis</a></li>
            <li><a href="<?php echo BASE_URI?>servicios-publicos">Servicios Públicos  </a></li>
            <li><a href="<?php echo BASE_URI?>enlaces-de-interes">Enlaces</a></li>
            <li><a href="<?php echo BASE_URI?>descarga">Descargas</a></li>
            <li><a href="<?php echo BASE_URI?>descarga-plugins">Descargas Plugins</a></li>
            <li><a href="<?php echo BASE_URI?>buzon/contacto/indexP.php">Buzón Cuidadano</a></li>
            <li><a href="<?php echo BASE_URI?>concursos">Concursos</a></li>
            <li><a href="<?php echo BASE_URI?>fondos-concursables">Fondos </a></li>
            <li><a href="<?php echo BASE_URI?>tesis/">Tesis Regionales </a></li>
            <li><a href="http://www.gorecoquimbo.gob.cl/pgobierno/erd/" >Estratégia Regional de desarrollo</a></li>
            <li><a href="<?php echo base_url(); ?>descargas">Plan Gob. Regional 2011-2014</a></li>
            <li><a href="http://www.gorecoquimbo.gob.cl/pgobierno/sgp/">Coord. Regional de Gasto Público</a></li>
            <li><a href="<?php echo BASE_URI?>informe-empleo">Informe de empleos</a></li>
            <li><a href="<?php echo BASE_URI?>informe-presupuesto">Infor. según Presupuesto</a></li>
            <li><a href="http://www.gorecoquimbo.gob.cl/pgobierno/prot/">Ordenamiento Territorial</a></li>
            <li><a href="http://www.gorecoquimbo.gob.cl/pgobierno/crubc/">Borde Costero</a></li>
            <li><a href="<?php echo BASE_URI?>mesa-rural-campesino">Mesa Rural Campesina</a></li>
            <li><a href="<?php echo BASE_URI?>fondo-innovacion">FIC-R  </a></li>
            <li><a href="<?php echo BASE_URI?>identidad-regional">Identidad Regional </a></li>
            <li><a href="<?php echo BASE_URI?>mesa-snit">Mesa SNIT </a></li>
            <li><a href="<?php echo BASE_URI?>desentralizacion">Descentralización</a></li>
            <li><a  href="http://www.gorecoquimbo.gob.cl/oremi/genero/index.php">Biblioteca PMG Equidad</a></li>
            <li><a href="<?php echo BASE_URI?>cohecho">Cohecho Func. Público</a></li>
            <li><a href="<?php echo BASE_URI?>normas-graficas">Normas Gráficas</a></li>
	</ul>
</li>
  <li class="nivel1"><a href="<?php echo BASE_URI?>noticias">Noticias</a></li>
  <li class="nivel1"><a href="<?php echo BASE_URI?>agenda/<?php echo time()?>">Agenda</a></li>
  <li class="nivel1"><a href="<?php echo BASE_URI?>senal-online">Señal Online</a></li>
  <li class="nivel1"><a href="<?php echo BASE_URI?>banco-de-proyectos">Centro de Documentación</a></li>
  <li class="nivel1"><a href="<?php echo BASE_URI?>contacto">Contacto</a></li>
</ul>
</div>
  </div></td>
  </tr>
  <tr>
    <td colspan="2"></td>
  </tr>
</table>

    
  </div>

<div id="main">
<div id="divisor"></div>
<div id="contenido-izquierda">
  
    <?php echo $content_for_layout; ?>    

</div>

<div id="contenido-derecha">

  <div id="banners">
      
    <div class="mosaic-block circle">
      <a  href="http://www.gorecoquimbo.gob.cl/pgobierno/erd/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen 2020" src="<?php echo base_url(); ?>imagenes/sidebar/2020.jpg" width="200" height="50" >
      </div>
    </div>
    
    <div class="mosaic-block circle">
      <a  href="http://www.gorecoquimbo.gob.cl/pgobierno/redinnovacion/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img  alt="imagen proyecto red" src="<?php echo base_url(); ?>imagenes/sidebar/proyecto-red.jpg" width="200" height="50" ></div>
    </div>

    <div class="mosaic-block circle">
      <a  href="<?php echo BASE_URI?>renueva" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen micro2012" src="<?php echo base_url(); ?>imagenes/sidebar/micro2012.jpg" width="200" height="50" ></div>
    </div>

    <div class="mosaic-block circle">
      <a  href="<?php echo BASE_URI?>fic" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen ficr" src="<?php echo base_url(); ?>imagenes/sidebar/ficr.jpg" width="200" height="50" ></div>
    </div>

    <div class="mosaic-block circle">
      <a  href="<?php echo BASE_URI?>fondos-editoriales" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen fondo editorial" src="<?php echo base_url(); ?>imagenes/sidebar/fondo-editorial.jpg" width="200" height="50"></div>
    </div>

    <div class="mosaic-block circle">
      <a  href="http://www.gorecoquimbo.gob.cl/pgobierno/snit2/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen mapa snit" src="<?php echo base_url(); ?>imagenes/sidebar/mapas-snit.jpg" width="200" height="50"></div>
    </div>

    <div class="mosaic-block circle">
      <a  href="<?php echo BASE_URI?>feria" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen feria del libro" src="<?php echo base_url(); ?>imagenes/sidebar/feria-del-libro.jpg" width="200" height="50" ></div>
    </div>

    <div class="mosaic-block2 circle">
      <a href="http://www.cdc.gob.cl/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen defensora" src="<?php echo base_url(); ?>imagenes/sidebar/defensora-cuidadana.jpg" width="200" height="50" ></div>
    </div>

    <div class="mosaic-block2 circle">
      <a  href="http://www.familiapreparada.cl/" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen familia preparada" src="<?php echo base_url(); ?>imagenes/sidebar/familia-preparada.jpg" width="200" height="50" ></div>
    </div>

    <div class="mosaic-block2 circle">
      <a  href="http://www.gorecoquimbo.gob.cl/transparencia/index.html" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen gobierno transparente" src="<?php echo base_url(); ?>imagenes/sidebar/gobierno-transparente.jpg" width="200" height="50" ></div>
    </div>
    
    <div class="mosaic-block2 circle">
      <a  href="http://www.gorecoquimbo.gob.cl/transparencia/solicitud_informacion.html" class="mosaic-overlay">&nbsp;</a>
      <div class="mosaic-backdrop">
        <img alt="imagen ley de transparencia" src="<?php echo base_url(); ?>imagenes/sidebar/ley-de-transparencia.jpg" width="200" height="50" ></div>
    </div>

  </div>

 </div>

</div> 
  
  <div id="carrusel">
  <div id="gobierno2">
	<div id="container">	
	<!--thumbnails slideshow begin-->
	<div id="gallery_container">	
		<div id="hWrapperAuto">
        <div id="carouselhAuto2">
		<div><a href="#" title="1/6" target="_blank"><img alt="imagen carrusel" src="<?php echo base_url(); ?>core/imagenes/carrusel-sin-imagen.png" width="222" height="54" /></a></div>
		<div><a href="#" title="2/6" target="_blank"><img alt="imagen carrusel" src="<?php echo base_url(); ?>core/imagenes/carrusel-sin-imagen.png" width="215" height="54" /></a></div>
		<div><a href="#" title="3/6"  target="_blank"><img alt="imagen carrusel" src="<?php echo base_url(); ?>core/imagenes/trabajo-de-comisiones.jpg" width="215" height="54" /></a></div>
		<div><a href="#" title="4/6"  target="_blank"><img alt="imagen carrusel" src="<?php echo base_url(); ?>core/imagenes/carrusel-sin-imagen.png" width="215" height="54" /></a></div>
		<div><a href="#" title="5/6"  target="_blank"><img alt="imagen carrusel" src="<?php echo base_url(); ?>core/imagenes/carrusel-sin-imagen.png" width="215" height="54" /></a></div>
		<div><a href="#"  title="6/6" target="_blank"><img alt="imagen carrusel" src="<?php echo base_url(); ?>core/imagenes/carrusel-sin-imagen.png" width="222" height="54" /></a></div>			
				     
		</div>
		</div>
	</div>
	</div>
</div>
  
  </div>
  <div id="footer">
  <p> Consejo Regional de Coquimbo. <br>
  Dirección: Arturo Prat 350, primer piso, La Serena, República de Chile. <br>
  Fonos: +56 51 207240 - 207263 Correo Electrónico: consejo@gorecoquimbo.cl <br> 
   </p></div>
</div>

</body>

</html>		
