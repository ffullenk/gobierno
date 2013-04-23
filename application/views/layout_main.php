<!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
    <td width="85%" valign="bottom">
	<div id="nav">
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
  </div>
  
  </td>
  </tr>
  <tr>
    <td colspan="2"></td>
  </tr>
</table>

    
  </div>


  
    <?php echo $content_for_layout; ?>    


  
  <div id="carrusel">
  <div id="gobierno2">
	<div id="container">	
	<!--thumbnails slideshow begin-->
	<div id="gallery_container">	
		<div id="hWrapperAuto">
        <div id="carouselhAuto2">
		
    <div>
      <a href="#" title="1/6" target="_blank">
        <img alt="imagen carrusel" src="<?php echo base_url(); ?>imagenes/gobierno-de-chile.png" width="222" height="54" />
      </a>
    </div>
		
    <div>
      <a href="#" title="2/6" target="_blank">
        <img alt="imagen carrusel" src="<?php echo base_url(); ?>imagenes/chile-atiende.jpg" width="215" height="54" />
      </a>
    </div>
		
    <div>
      <a href="#" title="3/6"  target="_blank">
        <img alt="imagen carrusel" src="<?php echo base_url(); ?>imagenes/vivir-sano.jpg" width="215" height="54" />
      </a>
    </div>
		
    <div>
      <a href="#" title="4/6"  target="_blank">
        <img alt="imagen carrusel" src="<?php echo base_url(); ?>imagenes/chile-cumple.jpg" width="215" height="54" />
      </a>
    </div>
		
    <div>
      <a href="#" title="5/6"  target="_blank">
        <img alt="imagen carrusel" src="<?php echo base_url(); ?>imagenes/vallas-camineras.jpg" width="215" height="54" />
      </a>
    </div>
		
    <div>
      <a href="#"  title="6/6" target="_blank">
        <img alt="imagen carrusel" src="<?php echo base_url(); ?>imagenes/ley-de-transparencia.jpg" width="222" height="54" />
      </a>
    </div>			
	           

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
